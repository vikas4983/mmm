<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\CreateMessageRequest;
use App\Http\Requests\invitations\InvitationRequest;
use App\Http\Requests\UpdateUserSettingRequest;
use App\Models\ContactViewByMe;
use App\Models\ContactViewByOther;
use App\Models\Invitation;
use App\Models\Message;
use App\Models\Shortlist;
use App\Models\User;
use App\Models\UserBlock;
use App\Models\UserSetting;
use App\Models\ViewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\OptionService;
use App\Services\RecentJoinProfile;
use App\Traits\UserActionTrait;
use App\Traits\LoginUserTrait;
use App\Traits\PlanStatusTrait;
use Illuminate\Http\JsonResponse;
use App\View\Components\ViewContact as ComponentsViewContact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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
            $this->send($validatedData);
            $response = $this->getPreviousUrlForInterest($validatedData);
            if ($response instanceof \Illuminate\Http\JsonResponse) {
                return $response;
            }
            $action = 'sendInterest';
            $receiverId = $validatedData['receiver_id'];
            $button = view('userAction.buttons.button', compact('action', 'receiverId'))->render();
            $message = view('userAction.messages.message', compact('action'))->render();
            return response()->json([
                'success' => true,
                'action' =>  $action,
                'message' => $message,
                'button' => $button
            ]);
        }
    }
    private function getPreviousUrlForInterest($validatedData)
    {
        $previousUrl = url()->previous();
        $parsedPath = parse_url($previousUrl, PHP_URL_PATH);
        $Path = ltrim($parsedPath, '/');
        $uuid = User::findOrFail($validatedData['receiver_id'])->uuid;
        if ($Path == 'profile/' . $uuid) {
            $receiverId = $validatedData['receiver_id'];
            $html = view('userAction.buttons.profiles.cancelInterest', compact('receiverId'))->render();
            $message = view('userAction.buttons.profiles.sentMessage', compact('receiverId'))->render();
            return response()->json(
                [
                    'success' => true,
                    'action' => 'profileSendInterest',
                    'message' =>  $message,
                    'button' => $html,
                ]
            );
        }
    }
    public function cancelInterest(InvitationRequest $request)
    {
        $loginuserId = Auth::user()->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $loginuserId;
        $validatedData['sender_id'] = $loginuserId;
        if ($validatedData) {
            $this->cancel($validatedData);
            $response = $this->getPreviousUrlForCancelInterest($validatedData);
            if ($response instanceof \Illuminate\Http\JsonResponse) {
                return $response;
            }
            $action = 'cancelInterest';
            $receiverId = $validatedData['receiver_id'];
            $button = view('userAction.buttons.button', compact('action', 'receiverId'))->render();
            $message = view('userAction.messages.message', compact('action'))->render();
            return response()->json([
                'success' => true,
                'action' =>  $action,
                'message' => $message,
                'button' => $button
            ]);
        }
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
                'is_sent' => 1,
                'is_decline' => 0,
            ]);
        }
        $response = $this->getPreviousUrlForAcceptInterest($validatedData);
        if ($response instanceof \Illuminate\Http\JsonResponse) {
            return $response;
        }

        $action = 'friend';
        $receiverId = $validatedData['receiver_id'];
        $button = view('userAction.buttons.button', compact('action', 'receiverId'))->render();
        $message = view('userAction.messages.message', compact('action'))->render();
        return response()->json([
            'success' => true,
            'action' =>  $action,
            'message' => $message,
            'button' => $button
        ]);
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
                'is_friend' => 0,
            ]);
        }
        $response = $this->getPreviousUrlForDeclineInterest($validatedData);
        if ($response instanceof \Illuminate\Http\JsonResponse) {
            return $response;
        }
        $action = 'declineByMe';
        $receiverId = $validatedData['receiver_id'];
        $button = view('userAction.buttons.button', compact('action', 'receiverId'))->render();
        $message = view('userAction.messages.message', compact('action'))->render();
        return response()->json([
            'success' => true,
            'action' =>  $action,
            'message' => $message,
            'button' => $button
        ]);
    }
    public function cancelFriend(InvitationRequest $request)
    {
        $validatedData = $request->validated();
        $user = Auth::user();
        if (!$user) {
            redirect()->route()->back()->with('error', 'Something went wrong!');
        }
        $declineByMe = Invitation::where('sender_id',  $validatedData['receiver_id'])->where('is_decline', 0)->first();
        if ($declineByMe) {
            $declineByMe->update([
                'is_sent' => 1,
                'is_decline' => 0,
                'is_friend' => 0,
            ]);
        }
        $response = $this->getPreviousUrlForCancelFriend($validatedData);
        if ($response instanceof \Illuminate\Http\JsonResponse) {
            return $response;
        }
    }
    private function getPreviousUrlForCancelFriend($validatedData)
    {
        $previousUrl = url()->previous();
        $parsedPath = parse_url($previousUrl, PHP_URL_PATH);
        $Path = ltrim($parsedPath, '/');
        $uuid = User::findOrFail($validatedData['receiver_id'])->uuid;
        if ($Path == 'profile/' . $uuid) {
            $receiverId = $validatedData['receiver_id'];
            $html = view('userAction.buttons.profiles.acceptDeclineBtn', compact('receiverId'))->render();
            $message = view('userAction.buttons.profiles.cancelfriendMessage', compact('receiverId'))->render();
            return response()->json(
                [
                    'success' => true,
                    'action' => 'profileCancelFriend',
                    'message' =>  $message,
                    'button' => $html,
                ]
            );
        }
    }
    public function cancelDeclineByMe(InvitationRequest $request)
    {
        $validatedData = $request->validated();
        $user = Auth::user();
        if (!$user) {
            redirect()->route()->back()->with('error', 'Something went wrong!');
        }
        $cancelDeclineByMe = Invitation::where('sender_id',  $validatedData['receiver_id'])->where('is_decline', 1)->first();
        if ($cancelDeclineByMe) {
            $cancelDeclineByMe->update([
                'is_decline' => 0,
                'is_friend' => 0,
                'is_sent' => 1,
            ]);
        }
        $response = $this->getPreviousUrlForCancelDeclineRequest($validatedData);
        if ($response instanceof \Illuminate\Http\JsonResponse) {
            return $response;
        }
        $action = 'cancelDeclineByMe';
        $receiverId = $validatedData['receiver_id'];
        $button = view('userAction.buttons.button', compact('action', 'receiverId'))->render();
        $message = view('userAction.messages.message', compact('action'))->render();
        return response()->json([
            'success' => true,
            'action' =>  $action,
            'message' => $message,
            'button' => $button
        ]);
    }
    private function getPreviousUrlForCancelInterest($validatedData)
    {
        $previousUrl = url()->previous();
        $parsedPath = parse_url($previousUrl, PHP_URL_PATH);
        $Path = ltrim($parsedPath, '/');
        $uuid = User::findOrFail($validatedData['receiver_id'])->uuid;
        if ($Path == 'profile/' . $uuid) {
            $receiverId = $validatedData['receiver_id'];
            $html = view('userAction.buttons.profiles.sendInterest', compact('receiverId'))->render();
            $message = view('userAction.buttons.profiles.cancelMessage', compact('receiverId'))->render();
            return response()->json(
                [
                    'success' => true,
                    'action' => 'profileCancelInterest',
                    'message' =>  $message,
                    'button' => $html,
                ]
            );
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
    public function replyMessage(CreateMessageRequest $request)
    {
        $validatedData = $request->validated();
        $userId = $this->loginUser()->id;
        if (!$userId) {
            return redirect()->route('/')->with('error', 'Login First!');
        }
        Message::create([
            'sender_id' => $userId,
            'receiver_id' => $validatedData['receiver_id'],
            'message' => $validatedData['message'],
        ]);
        return redirect()->back()->with('success', 'Message sent successfully');
    }
    private function send($validatedData)
    {
        if ($validatedData) {
            $existingRequest = $this->getUserData($validatedData);
            if (!empty($existingRequest) && $existingRequest->is_decline === 1 && $existingRequest->is_sent === 1) {

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
        $response = $this->getPreviouseUrlForBlock($validatedData);
        if ($response instanceof \Illuminate\Http\JsonResponse) {
            return $response;
        }
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
    private function getPreviouseUrlForBlock($validatedData)
    {
        $previousUrl = url()->previous();
        $parsedPath = parse_url($previousUrl, PHP_URL_PATH);
        $Path = ltrim($parsedPath, '/');
        $uuid = User::findOrFail($validatedData['receiver_id'])->uuid;
        if ($Path == 'profile/' . $uuid) {
            $receiverId = $validatedData['receiver_id'];

            $html = view('userAction.buttons.profiles.unBlockBtn', compact('receiverId'))->render();
            return response()->json(
                [
                    'success' => true,
                    'action' => 'profileUnblock',
                    'button' => $html

                ]
            );
        }
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
        $response = $this->getPreviouseUrlForUnblock($validatedData);
        if ($response instanceof \Illuminate\Http\JsonResponse) {
            return $response;
        }
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
    private function getPreviouseUrlForUnblock($validatedData)
    {
        $previousUrl = url()->previous();
        $parsedPath = parse_url($previousUrl, PHP_URL_PATH);
        $Path = ltrim($parsedPath, '/');
        $uuid = User::findOrFail($validatedData['receiver_id'])->uuid;
        if ($Path == 'profile/' . $uuid) {
            $receiverId = $validatedData['receiver_id'];
            $html = view('userAction.buttons.profiles.blockBtn', compact('receiverId'))->render();
            return response()->json(
                [
                    'success' => true,
                    'action' => 'profileBlock',
                    'button' => $html

                ]
            );
        }
    }
    private function getBlockUser($validatedData)
    {
        $user = Auth::user();
        $existingRequest = UserBlock::where('blocker_id', $user->id)->where('blocked_id', $validatedData['receiver_id'])->first();
        return $existingRequest;
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
                $response = $this->getPreviousUrlForMessageMobileSetting0($validatedData);
                if ($response instanceof \Illuminate\Http\JsonResponse) {
                    return $response;
                }
                return response()->json([
                    'success' => true,
                    'action' => 'hide',
                    'message' => 'Mobile number is hidden ',
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
                $response = $this->getPreviousUrlForMessageMobileSetting2($validatedData);
                if ($response instanceof \Illuminate\Http\JsonResponse) {
                    return $response;
                }
                return response()->json([
                    'success' => true,
                    'action' => 'friend',
                    'message' => 'Visible to friends only ',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
            ]);
        }
    }
    private function getPreviousUrlForMessageMobileSetting2($validatedData)
    {
        $previousUrl = url()->previous();
        $parsedPath = parse_url($previousUrl, PHP_URL_PATH);
        $Path = ltrim($parsedPath, '/');
        $uuid = User::findOrFail($validatedData['receiver_id'])->uuid;
        if ($Path == 'profile/' . $uuid) {
            $receiverId = $validatedData['receiver_id'];
            $message = view('userAction.viewContacts.messageForMobileSetting2', compact('receiverId'))->render();
            return response()->json(
                [
                    'success' => true,
                    'action' => 'messageForMobileSetting2',
                    'message' => $message

                ]
            );
        }
    }
    private function getPreviousUrlForMessageMobileSetting0($validatedData)
    {
        $previousUrl = url()->previous();
        $parsedPath = parse_url($previousUrl, PHP_URL_PATH);
        $Path = ltrim($parsedPath, '/');
        $uuid = User::findOrFail($validatedData['receiver_id'])->uuid;
        if ($Path == 'profile/' . $uuid) {
            $receiverId = $validatedData['receiver_id'];
            $message = view('userAction.viewContacts.messageForMobileSetting0', compact('receiverId'))->render();
            return response()->json(
                [
                    'success' => true,
                    'action' => 'messageForMobileSetting0',
                    'message' => $message

                ]
            );
        }
    }

    public function shortlist(InvitationRequest $request)
    {
        $validatedData = $request->validated();
        $userId  = Auth::user()->id;
        if ($validatedData) {
            $shortlisted = Shortlist::where('shortlisted_by_id', $userId)->where('shortlisted_user_id',  $validatedData['receiver_id'])->first();
            if (!$shortlisted) {
                Shortlist::create([
                    'shortlisted_by_id' => $userId,
                    'shortlisted_user_id' => $validatedData['receiver_id'],
                ]);
            }
            $button = 'add-to-shortlist';
            $receiverId = $validatedData['receiver_id'];
            $html = view('userAction.buttons.profiles.shortlist', compact('button', 'receiverId'))->render();
            return response()->json([
                'success' => true,
                'action' => 'addToShortlist',
                'message' => '',
                'button' =>  $html,
            ]);
        }
    }
    public function shortlistedUser(InvitationRequest $request)
    {
        $validatedData = $request->validated();
        $userId  = Auth::user()->id;
        if ($validatedData) {
            $shortlisted = Shortlist::where('shortlisted_by_id', $userId)->where('shortlisted_user_id',  $validatedData['receiver_id'])->first();
            if ($shortlisted) {
                $shortlisted->destroy($shortlisted->id);
            }
            $button = 'remove-to-shortlist';
            $receiverId = $validatedData['receiver_id'];
            $html = view('userAction.buttons.profiles.shortlist', compact('button', 'receiverId'))->render();
            return response()->json([
                'success' => true,
                'action' => 'removeToShortlist',
                'message' => '',
                'button' =>  $html,
            ]);
        }
    }

    public function myShortlist()
    {
        $user = Auth::user();
        if (!$user) {
            redirect()->route()->back()->with('error', 'Something went wrong!');
        }
        $myShortlistedIds = $user->shortlisted->pluck('shortlisted_user_id')->toArray();
        $searchResults = User::whereIn('id', $myShortlistedIds)->where('status', 1)->get();
        $heading = 'All My Shortlisted';
        return view('userAction.accessControll', compact('searchResults', 'heading'));
    }
    public function shortlistedByOther()
    {
        $user = Auth::user();
        if (!$user) {
            redirect()->route()->back()->with('error', 'Something went wrong!');
        }
        $shortlistedByOtherIds = $user->shortlistedUser->pluck('shortlisted_by_id')->toArray();
        $searchResults = User::whereIn('id', $shortlistedByOtherIds)->where('status', 1)->get();
        $heading = 'All Shortlisted by Others';
        return view('userAction.accessControll', compact('searchResults', 'heading'));
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


    private function getPreviousUrlForAcceptInterest($validatedData)
    {
        $previousUrl = url()->previous();
        $parsedPath = parse_url($previousUrl, PHP_URL_PATH);
        $Path = ltrim($parsedPath, '/');
        $uuid = User::findOrFail($validatedData['receiver_id'])->uuid;
        if ($Path == 'profile/' . $uuid) {
            $receiverId = $validatedData['receiver_id'];
            $message = view('userAction.buttons.profiles.friendMessage', compact('receiverId'))->render();
            return response()->json(
                [
                    'success' => true,
                    'action' => 'friendProfile',
                    'message' =>  $message,
                    // 'button' => $html,
                ]
            );
        }
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
    private function getPreviousUrlForDeclineInterest($validatedData)
    {
        $previousUrl = url()->previous();
        $parsedPath = parse_url($previousUrl, PHP_URL_PATH);
        $Path = ltrim($parsedPath, '/');
        $uuid = User::findOrFail($validatedData['receiver_id'])->uuid;
        if ($Path == 'profile/' . $uuid) {
            $receiverId = $validatedData['receiver_id'];
            $message = view('userAction.buttons.profiles.declineMessage', compact('receiverId'))->render();
            $html = view('userAction.buttons.profiles.interestDeclineBtn', compact('receiverId'))->render();
            return response()->json(
                [
                    'success' => true,
                    'action' => 'profileDeclineInterest',
                    'message' =>  $message,
                    'button' => $html,
                ]
            );
        }
    }
    private function getPreviousUrlForCancelDeclineRequest($validatedData)
    {
        $previousUrl = url()->previous();
        $parsedPath = parse_url($previousUrl, PHP_URL_PATH);
        $Path = ltrim($parsedPath, '/');
        $uuid = User::findOrFail($validatedData['receiver_id'])->uuid;
        if ($Path == 'profile/' . $uuid) {
            $receiverId = $validatedData['receiver_id'];
            $message = view('userAction.buttons.profiles.declineMessage', compact('receiverId'))->render();
            $html = view('userAction.buttons.profiles.acceptDeclineBtn', compact('receiverId'))->render();
            return response()->json(
                [
                    'success' => true,
                    'action' => 'profileCancelDecline',
                    'message' =>  $message,
                    'button' => $html,
                ]
            );
        }
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
    public function recentJoinProfile(Request $request, RecentJoinProfile $recentJoinProfile)
    {
        $path =  $request->path() ?? '';
        $searchResults =  $recentJoinProfile->getProfile($path);
        $heading = 'Recent Join Profiles';
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
        $priorityUserId = Message::where('sender_id', $user->id)->latest('created_at')->pluck('receiver_id')->first();
        $users = User::whereIn('id', $userIds)
            ->orderByRaw("FIELD(id, ?) DESC",  [$priorityUserId])
            ->orderBy('id', 'desc')
            ->get();
        return view('frontend.users.messages.message', compact('users'));
    }
    public function privacySetting()
    {
        $heading = 'Profile Name Setting';
        $settingData = '';
        return view('frontend.settings.privacySetting', compact('heading', 'settingData'));
    }
    public function nameSetting(UpdateUserSettingRequest $request)
    {
        $userId = Auth::user()->id;
        if (!$userId) {
            return redirect()->back()->with('error', 'Login first!');
        }
        $validatedData = $request->validated();
        $settingData = $this->userSetting($userId);
        $heading = 'Profile Name Setting';
        return view('frontend.settings.privacySetting', compact('heading', 'settingData'));
    }

    private function namePrivacy() {}
    public function imageSetting(UpdateUserSettingRequest $request)
    {
        $userId = Auth::user()->id;
        if (!$userId) {
            return redirect()->back()->with('error', 'Login first!');
        }
        $validatedData = $request->validated();
        $settingData = $this->userSetting($userId);
        $heading = 'Profile Photo Setting';
        return view('frontend.settings.privacySetting', compact('heading', 'settingData'));
    }
    public function horoscopeSetting(UpdateUserSettingRequest $request)
    {
        $userId = Auth::user()->id;
        if (!$userId) {
            return redirect()->back()->with('error', 'Login first!');
        }
        $validatedData = $request->validated();
        $settingData = $this->userSetting($userId);
        $heading = 'Profile Horoscope Setting';
        return view('frontend.settings.privacySetting', compact('heading', 'settingData'));
    }
    public function mobileNumberSetting(UpdateUserSettingRequest $request)
    {
        $userId = Auth::user()->id;
        if (!$userId) {
            return redirect()->back()->with('error', 'Login first!');
        }
        $validatedData = $request->validated();
        $settingData = $this->userSetting($userId);
        $heading = 'Profile Mobile Number Setting';
        return view('frontend.settings.privacySetting', compact('heading', 'settingData'));
    }

    public function nameUpdate(UpdateUserSettingRequest $request)
    {
        $userId = Auth::user()->id;
        if (!$userId) {
            return redirect()->back()->with('error', 'Login first!');
        }
        $validatedData = $request->validated();
        $settingData = $this->userSetting($userId);
        if ($settingData) {
            $settingData->update([
                'name' => $validatedData['name_privacy']
            ]);
        }
        $heading = 'Profile Name Setting';
        return redirect()->back()->with([
            'success' => 'Profile Name Setting Updated Successfully',
            'heading' => $heading,
            'settingData' => $settingData,
        ]);
    }
    public function imageUpdate(UpdateUserSettingRequest $request)
    {
        $userId = Auth::user()->id;
        if (!$userId) {
            return redirect()->back()->with('error', 'Login first!');
        }
        $validatedData = $request->validated();
        $settingData = $this->userSetting($userId);
        if ($settingData) {
            $settingData->update([
                'image' => $validatedData['image_privacy']
            ]);
        }
        $heading = 'Profile Photo Setting';
        return redirect()->back()->with([
            'success' => 'Profile Photo Setting Updated Successfully',
            'heading' => $heading,
            'settingData' => $settingData,
        ]);
    }
    public function horoscopeUpdate(UpdateUserSettingRequest $request)
    {
        $userId = Auth::user()->id;
        if (!$userId) {
            return redirect()->back()->with('error', 'Login first!');
        }
        $validatedData = $request->validated();
        $settingData = $this->userSetting($userId);
        if ($settingData) {
            $settingData->update([
                'horoscope' => $validatedData['horoscope_privacy']
            ]);
        }
        $heading = 'Profile Horoscope Setting';
        return redirect()->back()->with([
            'success' => 'Profile Horoscope Setting Updated Successfully',
            'heading' => $heading,
            'settingData' => $settingData,
        ]);
    }
    public function mobileNumberUpdate(UpdateUserSettingRequest $request)
    {
        $userId = Auth::user()->id;
        if (!$userId) {
            return redirect()->back()->with('error', 'Login first!');
        }
        $validatedData = $request->validated();
        $settingData = $this->userSetting($userId);
        if ($settingData) {
            $settingData->update([
                'mobile' => $validatedData['mobile_number_privacy']
            ]);
        }
        $heading = 'Profile Mobile Number Setting';
        return redirect()->back()->with([
            'success' => 'Profile Mobile Number Setting Updated Successfully',
            'heading' => $heading,
            'settingData' => $settingData,
        ]);
    }
    private function userSetting($userId)
    {
        return UserSetting::where('user_id', $userId)->first();
    }
    private function getInvitation()
    {
        $loginUserId = Auth::user()->id;
        $user = User::where('id', $loginUserId)->where('status', 1)->get();
        return $user;
    }
}
