<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\CreateMessageRequest;
use App\Http\Requests\invitations\InvitationRequest;
use App\Models\ContactViewByMe;
use App\Models\ContactViewByOther;
use App\Models\Invitation;
use App\Models\Message;
use App\Models\User;
use App\Models\UserBlock;
use App\Models\UserSetting;
use App\Models\ViewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\OptionService;
use App\Traits\UserActionTrait;
use App\Traits\LoginUserTrait;
use App\Traits\PlanStatusTrait;
use Illuminate\Http\JsonResponse;
use App\View\Components\ViewContact as ComponentsViewContact;
use Carbon\Carbon;

class UserActionController extends Controller
{
    protected $optionService;
    use UserActionTrait;
    use LoginUserTrait;
    use PlanStatusTrait;

    public function sendInterest(InvitationRequest $request)
    {
        $userId = Auth::user()->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $userId;
        $validatedData['sender_id'] = $userId;
        if ($validatedData) {
            $planStatusResponse = $this->planStatus($userId);
            if ($planStatusResponse instanceof JsonResponse) {
                return $planStatusResponse;
            }

            $sendRequest = $this->send($validatedData);
            return response()->json([
                'success' => true,
                'action' => 'sendInterest',
                'message' => '<span style="font-size: 14px; padding-left: 59px;">
                <i class="fas fa-check gt-margin-right-5"></i> Interest Sent
             </span>',
                'button' =>
                '<div id="cancel-request-' .
                    $validatedData['receiver_id'] .
                    '" data-id="' .
                    $validatedData['receiver_id'] .
                    '">
    <a data-id="' .
                    $validatedData['receiver_id'] .
                    '" class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn" style="color: #AF3042;">
        <i class="fas fa-times gt-margin-right-5 text-danger"></i> Cancel
    </a>
</div>',
            ]);
        }
    }
    public function cancelInterest(InvitationRequest $request)
    {

        $loginuserId = Auth::user()->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $loginuserId;
        $validatedData['sender_id'] = $loginuserId;
        if ($validatedData) {
            $cancelRequest = $this->cancel($validatedData);
            return response()->json([
                'success' => true,
                'action' => 'sendInterest',
                'message' => '<span style="font-size: 14px; padding-left: 59px; color: #A0061C;">
                <i class="fas fa-times gt-margin-right-5"></i> Interest Cancel
             </span>',
                'button' =>
                '<div id="send-request' .
                    $validatedData['receiver_id'] .
                    '" data-id="' .
                    $validatedData['receiver_id'] .
                    '">
    <a data-id="' .
                    $validatedData['receiver_id'] .
                    '" class="btn btn-default btn-block inResultSendMessageBtn send-interest-btn" >
       <i class="fas fa-heart gt-margin-right-5"></i> Interest
    </a>
</div>',
            ]);
        }
    }
    public function sendMessage(CreateMessageRequest $request)
    {
       
        $userId = $this->loginUser()->id;
        $validatedData = $request->validated();
        if (!$userId) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Kindly login first',
                ],
                401,
            );
        }
        $planStatusResponse = $this->planStatus($userId);
        if ($planStatusResponse instanceof \Illuminate\Http\JsonResponse) {
            return $planStatusResponse;
        }

        Message::create([
            'sender_id' => $userId,
            'receiver_id' => $validatedData['receiver_id'],
            'message' => $validatedData['message'],
        ]);
        return response()->json([
            'success' => true,
            'action' => 'sendMessage',
            'message' => '<h1><i class="fas fa-check-circle" style="color: green;"></i></h1><h4 style="color: green;">Message Sent</h4>',
        ]);
    }
    private function send($validatedData)
    {

        if ($validatedData) {
            $existingRequest = $this->getUserData($validatedData);
            if (!empty($existingRequest) && $existingRequest->is_decline === 0 && $existingRequest->is_sent === 1) {
                $existingRequest->destroy($existingRequest->id);
                Invitation::create([
                    'user_id' => $validatedData['user_id'],
                    'sender_id' => $validatedData['user_id'],
                    'receiver_id' => $validatedData['receiver_id'],
                    'is_sent' => 1,
                ]);
            }
            if (!$existingRequest) {
                $sendRequest = Invitation::create($validatedData);
                $sendRequest->update(['is_sent' => 1]);
                return $sendRequest;
            }

            $existingRequest->update(['is_sent' => 1]);
            return $existingRequest;
        }
    }
    private function cancel($validatedData)
    {
        if ($validatedData) {
            $existingrequest = $this->getUserData($validatedData);
            $existingrequest->destroy($existingrequest->id);
            return $existingrequest;
        }
    }
    function blockUser(InvitationRequest $request)
    {
        $loginuserId = Auth::user()->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $loginuserId;
        $validatedData['sender_id'] = $loginuserId;
        $blockRequest = UserBlock::create([
            'blocker_id' => $validatedData['user_id'],
            'blocked_id' => $validatedData['receiver_id'],
        ]);
        return response()->json([
            'success' => true,
            'action' => 'blockUser',
            'message' => '<span style="font-size: 14px; padding-left: 59px; color: #AF3042;" >
                             <i class="fas fa-lock gt-margin-right-5"></i>Block Profile
                             </span>',
            'button' =>
            '<div id="block-user-' .
                $blockRequest->blocked_id .
                '">
                            <a data-id="' .
                $blockRequest->blocked_id .
                '" class="btn btn-default btn-block inResultSendMessageBtn unBlock-btn" style="color: #AF3042;">
                                <i class="fas fa-unlock gt-margin-right-5"></i> Unblock
                            </a>
                        </div>',
        ]);
    }
    function unBlockUser(InvitationRequest $request)
    {
        $loginuserId = Auth::user()->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $loginuserId;
        $validatedData['sender_id'] = $loginuserId;
        $blockerId = $validatedData['receiver_id'];

        $unBlockUser = $this->getBlockUser($validatedData);
        $unBlockUser->destroy($unBlockUser->id);
        return response()->json([
            'success' => true,
            'action' => 'blockUser',
            'message' => '<span style="font-size: 14px; padding-left: 59px; color: #AF3042;" >
         <i class="fas fa-unlock gt-margin-right-5"></i>Unblock Profile
         </span>',
            'button' =>
            '<div id="block-user' .
                $blockerId .
                '">
        <a data-id="' .
                $blockerId .
                '" class="btn btn-default btn-block inResultSendMessageBtn block-btn" style="color: #AF3042;">
           <i class="fas fa-lock gt-margin-right-5"></i> Block
        </a>
    </div>',
        ]);
    }
    private function getBlockUser($validatedData)
    {
        $user = Auth::user();
        // $blockByOther = UserBlock::where('blocker_id', $validatedData['receiver_id'])
        //     ->where('blocked_id', $user->id)
        //     ->exists();

        // if ($blockByOther) {
        //     return response()->json([
        //         'success' => false,
        //         'action' => 'block',
        //         'message' => 'You have been blocked by this user.',
        //     ]);
        // }
        $existingRequest = UserBlock::where('blocker_id', $user->id)->where('blocked_id', $validatedData['receiver_id'])->first();

        return $existingRequest;
    }
    private function isFriend()
    {
        // $unBlockUser = $this->getUserData();
    }
    private function checkUserSetting($validatedData)
    {
        return UserSetting::where('user_id', $validatedData['receiver_id'])->first();
    }

    function viewContact(InvitationRequest $request)
    {
        $user = $this->loginUser();
        $userId = $user->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $user->id;
        $validatedData['sender_id'] = $user->id;
        if ($validatedData) {
            $userSetting = $this->checkUserSetting($validatedData);
            $planStatusResponse = $this->planStatus($userId);
            if ($planStatusResponse instanceof \Illuminate\Http\JsonResponse) {
                return $planStatusResponse;
            }
            $existingRequest = $this->getUserData($validatedData);
            $contactDetails = $this->getContact($validatedData);

            if (!empty($userSetting) && $userSetting->mobile === 0) {
                return response()->json([
                    'success' => true,
                    'action' => 'hide',
                    'message' => 'Mobile number is hidden ',
                    // 'html' => view('components.view-contact')->render()
                ]);
            } elseif (!empty($userSetting) && $userSetting->mobile === 1) {
                $contactViewLogResponse = $this->ContactViewLog($validatedData);
                if ($contactViewLogResponse instanceof \Illuminate\Http\JsonResponse) {
                    return $contactViewLogResponse;
                }
                return response()->json([
                    'success' => true,
                    'action' => 'viewContact',
                    'message' => 'Contact Details ',
                    'html' => view('components.view-contact', compact('contactDetails', 'user'))->render(),
                ]);
            } elseif (!empty($userSetting) && $userSetting->mobile === 2 && !empty($existingRequest) && $existingRequest->is_friend === 1) {
                $contactViewLogResponse = $this->ContactViewLog($validatedData);
                if ($contactViewLogResponse instanceof \Illuminate\Http\JsonResponse) {
                    return $contactViewLogResponse;
                }

                return response()->json([
                    'success' => true,
                    'action' => 'viewContact',
                    'message' => 'View contact details of friend ',
                    'html' => view('components.view-contact', compact('contactDetails', 'user'))->render(),
                ]);
            } elseif (!empty($userSetting) && $userSetting->mobile === 2) {
                return response()->json([
                    'success' => true,
                    'action' => 'friend',
                    'message' => 'Visible to friends only ',
                    // 'html' => view('components.view-contact', compact('contactDetails','user'))->render()
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
            ]);
        }
    }
    private function getContact($validatedData)
    {
        $contactDetails = User::where('id', $validatedData['receiver_id'])->where('status', 1)->first();
        return $contactDetails ?? [];
    }
    private function ContactViewLog($validatedData)
    {
        $planStatus = $this->planStatus($validatedData['user_id']);
        if (!empty($planStatus && $planStatus->contact > 0)) {
            $existingViewContact = ViewContact::where('view_id', $validatedData['user_id'])->where('viewed_id', $validatedData['receiver_id'])->first();
            if (!$existingViewContact) {
                ViewContact::create([
                    'view_id' => $validatedData['user_id'],
                    'viewed_id' => $validatedData['receiver_id'],
                ]);
                $leftMobileNumber = (int) $planStatus->contact - 1;
                $planStatus->update(['contact' => $leftMobileNumber]);
            }
            return $existingViewContact;
        } else {
            return response()->json([
                'success' => false,
                'action' => 'exceededContact',
                'message' => '<h4 style="color: #AF3042;">
                                    <i class="fas fa-exclamation-circle"></i>
                                    You have exceeded your contact limit.
                                  </h4>',
                'redirect' => route('plan'),
            ]);
        }
    }
    public function interest(OptionService $optionService)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('/');
        }
        $sentByMeIds =  $user->senderInvitation->where('is_sent', 1)->where('is_friend', 0)->where('is_decline', 0)->pluck('receiver_id')->toArray();
        $searchResults = User::whereIn('id', $sentByMeIds)->where('status', 1)->orderBy('id', 'desc')->get();
        $heading = 'All Interest Sent';
        return view('frontend.users.interests.interest', compact('searchResults', 'heading'));
    }
    public function acceptByOther(OptionService $optionService)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('/');
        }
        $acceptByOtherIds =  $user->senderInvitation->where('is_sent', 1)->where('is_friend', 1)->where('is_decline', 0)->pluck('receiver_id')->toArray();
        $searchResults = User::whereIn('id', $acceptByOtherIds)->where('status', 1)->orderBy('id', 'desc')->get();
        $heading = 'All Interest Sent Accepted';
        return view('frontend.users.interests.interest', compact('searchResults', 'heading'));
    }




    public function SentByOther()
    {
        $user = Auth::user();
        if (!$user) {
            redirect()->route()->back()->with('error', 'Something went wrong!');
        }
        $searchResults = $this->interestSentByOther($user);
        $heading = 'All Interest Received';
        return view('frontend.users.interests.interest', compact('searchResults', 'heading'));
    }
    private function interestSentByOther($user)
    {
        $sentByOtherIds =  $user->receiverInvitation->where('is_friend', 0)->where('is_sent', 1)->where('is_decline', 0)->pluck('sender_id')->toArray();
        return User::with('senderInvitation')->whereIn('id', $sentByOtherIds)->where('status', 1)->orderBy('id', 'desc')->get();
    }
    public function acceptByMe(InvitationRequest $request)
    {
        $validatedData = $request->validated();
        $user = Auth::user();
        if (!$user) {
            redirect()->route()->back()->with('error', 'Something went wrong!');
        }
        $acceptedUser = Invitation::where('sender_id',  $validatedData['receiver_id'])->first();
        if ($acceptedUser) {
            $acceptedUser->update([
                'is_friend' => 1,
                'is_sent' => 1
            ]);
        }
        $receiverId = $acceptedUser->id;
        $button = view('userAction.buttons.friendButton', compact('receiverId'))->render();
        return response()->json([
            'success' => true,
            'action' => 'acceptByMe',
            'message' => 'Now you are friend',
            'button' => $button
        ]);
    }

    public function acceptByMeList()
    {
        $user = Auth::user();
        if (!$user) {
            redirect()->route()->back()->with('error', 'Something went wrong!');
        }
        $acceptedByMe = $user->receiverInvitation->where('is_friend', 1)->pluck('sender_id')->toArray();
        $searchResults = User::whereIn('id', $acceptedByMe)->where('status', 1)->get();
        $heading = 'All Interest Received Accepted';
        return view('frontend.users.interests.interest', compact('searchResults', 'heading'));
    }
    public function declineByMe(InvitationRequest $request)
    {
        $validatedData = $request->validated();
        $user = Auth::user();
        if (!$user) {
            redirect()->route()->back()->with('error', 'Something went wrong!');
        }
        $declineByMe = Invitation::where('sender_id',  $validatedData['receiver_id'])->where('is_decline', 0)->first();

        if ($declineByMe) {
            $declineByMe->update([
                'is_decline' => 1,

            ]);
        }
        $receiverId = $declineByMe->id;
        $button = view('userAction.buttons.interestButton', compact('receiverId'))->render();
        return response()->json([
            'success' => true,
            'action' => 'declineByMe',
            'message' => '<span style="color: #AF3042;"><i class="fas fa-times-circle"></i> Interest request declined</span>',
            'button' => $button
        ]);
    }
    public function declineByList(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            redirect()->route()->back()->with('error', 'Something went wrong!');
        }
        $declineByMeIds = $user->receiverInvitation->where('is_decline', 1)->pluck('sender_id')->toArray();
        $searchResults = User::whereIn('id', $declineByMeIds)->where('status', 1)->get();
        $heading = 'All Interest Received Rejected';
        return view('frontend.users.interests.interest', compact('searchResults', 'heading'));
    }
    public function declineByOtherList(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            redirect()->route()->back()->with('error', 'Something went wrong!');
        }
        $declineByOtherIds = $user->senderInvitation->where('is_decline', 1)->pluck('receiver_id')->toArray();

        $searchResults = User::whereIn('id', $declineByOtherIds)->where('status', 1)->get();

        $heading = 'All Interest Sent Rejected';
        return view('frontend.users.interests.interest', compact('searchResults', 'heading'));
    }
    public function declined(InvitationRequest $request)
    {
        $validatedData = $request->validated();

        $user = Auth::user();
        if (!$user) {
            redirect()->route()->back()->with('error', 'Something went wrong!');
        }
        $declined = Invitation::where('sender_id',  $validatedData['receiver_id'])->where('is_decline', 1)->first();

        if ($declined) {
            $declined->update([
                'is_decline' => 0,

            ]);
        }
        $receiverId = $validatedData['receiver_id'];
        $button = view('userAction.buttons.interestButton', compact('receiverId'))->render();
        return response()->json([
            'success' => true,
            'action' => 'declined',
            'message' => '<span style="color: #AF3042;"><i class="fas fa-times-circle"></i> Decline cancel</span>',
            'button' => $button
        ]);
    }
    public function accessControl(Request $request)
    {
        $searchResults = [];
        return view('userAction.accessControll', compact('searchResults'));
    }
    public function blockByMe(Request $request)
    {
        $user = Auth::user();
        $blockByMeIds = $user->blockedUser->pluck('blocked_id')->toArray();
        $searchResults = User::whereIn('id', $blockByMeIds)->where('status', 1)->get();
        $heading = 'All Blocked By You';
        return view('userAction.accessControll', compact('searchResults', 'heading'));
    }
    public function blockByOther(Request $request)
    {
        $user = Auth::user();
        $blockByOtherIds = $user->blockedByUsers->pluck('blocker_id')->toArray();
        $searchResults = User::whereIn('id', $blockByOtherIds)->where('status', 1)->get();
        $heading = 'All Blocked By Others';
        return view('userAction.accessControll', compact('searchResults', 'heading'));
    }
    public function viewContactByMe(Request $request)
    {
        $user = Auth::user();
        $viewByMeIds = $user->viewUser->pluck('viewed_id')->toArray();
        $searchResults = User::whereIn('id', $viewByMeIds)->where('status', 1)->get();
        $heading = 'All Contact View By You';
        return view('userAction.accessControll', compact('searchResults', 'heading'));
    }

    public function viewContactByOther(Request $request)
    {
        $user = Auth::user();
        $viewByOtherIds = $user->viewByUsers->pluck('view_id')->toArray();
        $searchResults = User::whereIn('id', $viewByOtherIds)->where('status', 1)->get();
        $heading = 'All Contact View By Others';
        return view('userAction.accessControll', compact('searchResults', 'heading'));
    }
    public function viewProfile(Request $request)
    {
        $user = Auth::user();
        $viewProfileIds = $user->viewProfileByMe->pluck('viewed_user_id')->toArray();
        $searchResults = User::whereIn('id', $viewProfileIds)->where('status', 1)->get();
        $heading = 'All Profile View By Me';
        return view('userAction.accessControll', compact('searchResults', 'heading'));
    }
    public function viewProfileByOther(Request $request)
    {
        $user = Auth::user();
        $viewProfileIds = $user->viewProfileByOther->pluck('viewer_id')->toArray();
        $searchResults = User::whereIn('id', $viewProfileIds)->where('status', 1)->get();
        $heading = 'All Profile View By Other';
        return view('userAction.accessControll', compact('searchResults', 'heading'));
    }
    public function message(Request $request)
    {
        $user = Auth::user();
        $userIds = array_unique($user->senderMessage->pluck('receiver_id')->toArray());
        $users = User::whereIn('id', $userIds)->get();
        return view('frontend.users.messages.message', compact('users'));
    }
    private function getInvitation()
    {
        $loginUserId = Auth::user()->id;
        $user = User::where('id', $loginUserId)->where('status', 1)->get();
        return $user;
    }
}
