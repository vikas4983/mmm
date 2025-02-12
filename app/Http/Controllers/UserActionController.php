<?php

namespace App\Http\Controllers;

use App\Http\Requests\invitations\InvitationRequest;
use App\Models\ContactViewByMe;
use App\Models\ContactViewByOther;
use App\Models\Invitation;
use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\OptionService;
use App\Traits\UserActionTrait;
use App\Traits\LoginUserTrait;
use App\Traits\PlanStatusTrait;
use Carbon\Carbon;

class UserActionController extends Controller
{
    protected $optionService;
    use UserActionTrait;
    use LoginUserTrait;
    use PlanStatusTrait;

    public function sendInterest(InvitationRequest $request)
    {
        $loginuserId = Auth::user()->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $loginuserId;
        $validatedData['sender_id'] = $loginuserId;
        if ($validatedData) {
            $sendRequest = $this->send($validatedData);

            return response()->json([
                'success' => true,
                'action' => 'sendInterest',
                'message' => '<span style="font-size: 14px; padding-left: 59px;">
                <i class="fas fa-check gt-margin-right-5"></i> Interest Sent
             </span>',
                'button' =>
                '<div id="cancel-request-' .
                    $sendRequest->receiver_id .
                    '" data-id="' .
                    $sendRequest->receiver_id .
                    '">
    <a data-id="' .
                    $sendRequest->receiver_id .
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

    private function send($validatedData)
    {
        if ($validatedData) {
            $existingrequest = $this->getUserData($validatedData);

            if (!$existingrequest) {
                $sendRequest = Invitation::create($validatedData);
                $sendRequest->update(['is_sent' => 1]);
                return $sendRequest;
            }

            $existingrequest->update(['is_sent' => 1]);
            return $existingrequest;
        }
    }

    private function cancel($validatedData)
    {
        if ($validatedData) {
            $existingrequest = $this->getUserData($validatedData);
            $existingrequest->update(['is_sent' => 1]);
            return $existingrequest;
        }
    }

    function blockUser(InvitationRequest $request)
    {
        $loginuserId = Auth::user()->id;
        $validatedData = $request->validated();
        $validatedData['user_id'] = $loginuserId;
        $validatedData['sender_id'] = $loginuserId;
        $existingrequest = $this->getUserData($validatedData);
        if (!$existingrequest) {
            $blockRequest = Invitation::create($validatedData);
            $blockRequest->update(['status' => 0]);
            return response()->json([
                'success' => true,
                'action' => 'blockUser',
                'message' => '<span style="font-size: 14px; padding-left: 59px; color: #AF3042;" >
             <i class="fas fa-lock gt-margin-right-5"></i>Block Profile
             </span>',
                'button' =>
                '<div id="block-user-' .
                    $blockRequest->receiver_id .
                    '">
            <a data-id="' .
                    $blockRequest->receiver_id .
                    '" class="btn btn-default btn-block inResultSendMessageBtn unBlock-btn" style="color: #AF3042;">
                <i class="fas fa-unlock gt-margin-right-5"></i> Unblock
            </a>
        </div>',
            ]);
        }
        $existingrequest->update([
            'status' => 0,
        ]);
        return response()->json([
            'success' => true,
            'action' => 'blockUser',
            'message' => '<span style="font-size: 14px; padding-left: 59px; color: #AF3042;" >
         <i class="fas fa-lock gt-margin-right-5"></i>Block Profile
         </span>',
            'button' =>
            '<div id="block-user-' .
                $existingrequest->receiver_id .
                '">
        <a data-id="' .
                $existingrequest->receiver_id .
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
        $unBlockUser = $this->getUserData($validatedData);
        $unBlockUser->update([
            'status' => 1,
        ]);
        return response()->json([
            'success' => true,
            'action' => 'blockUser',
            'message' => '<span style="font-size: 14px; padding-left: 59px; color: #AF3042;" >
         <i class="fas fa-unlock gt-margin-right-5"></i>Unblock Profile
         </span>',
            'button' =>
            '<div id="block-user' .
                $unBlockUser->receiver_id .
                '">
        <a data-id="' .
                $unBlockUser->receiver_id .
                '" class="btn btn-default btn-block inResultSendMessageBtn block-btn" style="color: #AF3042;">
           <i class="fas fa-lock gt-margin-right-5"></i> Block
        </a>
    </div>',
        ]);
    }


    private function isFriend()
    {
        // $unBlockUser = $this->getUserData();
    }
    private function checkUserSetting($validatedData)
    {
        return  UserSetting::where('user_id', $validatedData['receiver_id'])->first();
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
            $planStatus = $this->planStatus($userId);
            $existingRequest = $this->getUserData($validatedData);
            $contactDetails = $this->getContact($validatedData);
            if (! empty($userSetting) && $userSetting->mobile === 0) {
                return response()->json([
                    'success' => true,
                    'action' => 'hide',
                    'message' => 'Mobile number is hidden ',
                    // 'html' => view('components.view-contact')->render()
                ]);
            } elseif (! empty($userSetting) && $userSetting->mobile === 1) {
                $viewLog = $this->ContactViewLog($validatedData);

                return response()->json([
                    'success' => true,
                    'action' => 'viewContact',
                    'message' => 'Contact Details ',
                    'html' => view('components.view-contact', compact('contactDetails', 'user'))->render()
                ]);
            } elseif (! empty($userSetting) && $userSetting->mobile === 2 && !empty($existingRequest) && $existingRequest->is_friend === 1) {
                $viewLog = $this->ContactViewLog($validatedData);

                return response()->json([
                    'success' => true,
                    'action' => 'viewContact',
                    'message' => 'View contact details of friend ',
                    'html' => view('components.view-contact', compact('contactDetails', 'user'))->render()
                ]);
            } elseif (! empty($userSetting) && $userSetting->mobile === 2) {
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
                'message' => 'No data',
            ]);
        }
    }

    private function getContact($validatedData)
    {
        $contactDetails =   User::where('id', $validatedData['receiver_id'])->where('status', 1)->first();
        return $contactDetails;
    }
    private function ContactViewLog($validatedData)
    {
        $previouseBYMe = ContactViewByMe::where('view_profile', $validatedData['receiver_id'])->first();
        $previouseRecordByOther = ContactViewByOther::where('view_profile', $validatedData['receiver_id'])->first();
        if (!$previouseBYMe) {
            $planStatus = $this->planStatus($validatedData['user_id']);
            $mobile = ContactViewByMe::create([
                'user_id' => $validatedData['user_id'],
                'view_profile' => $validatedData['receiver_id']
            ]);
            $leftMobileNumber = (int) $planStatus->contact - (int)1;
            $planStatus->update(['contact' => $leftMobileNumber]);
        } else {
            return $previouseBYMe;
        }
        if (!$previouseRecordByOther) {
            $mobile = ContactViewByOther::create([
                'user_id' => $validatedData['user_id'],
                'view_profile' => $validatedData['receiver_id']
            ]);
        } else {
            return $previouseRecordByOther;
        }
    }

    public function interest(OptionService $optionService)
    {
        $searchResults = $this->getInvitation();
        $options = $optionService->getOptions();
        return view('frontend.users.interests.interest', compact('searchResults', 'options'));
    }
    private function getInvitation()
    {
        $loginUserId = Auth::user()->id;
        $user = User::where('id', $loginUserId)->where('status', 1)->get();
        return $user;
    }
}
