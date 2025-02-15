<?php

namespace App\Traits;

use App\Models\Invitation;
use App\Models\Payment;
use App\Models\UserBlock;
use App\Models\ViewContact;
use Carbon\Carbon;
use App\Traits\LoginUserTrait;

trait PlanStatusTrait
{
    use LoginUserTrait;

    public function planStatus($userId)
    {
        $planStatus = Payment::where('user_id', $userId)->latest('created_at')->first();
        $user = $this->loginUser();
        if (!$planStatus) {
            response()->json([
                'success' => true,
                'message' => "You don't have any plan, Please purchase a plan",
                'html' => view('components.expire-plan-component', compact('user'))->render()
            ])->send();
            exit();
        }
        if (Carbon::now()->greaterThanOrEqualTo($planStatus->expiry_date)) {
            $this->clearInvitaions($userId);
            $planStatus->update([
                'is_paid' => 0,
                'contact' => 0
            ]);
            response()->json([
                'success' => true,
                'action' => 'expirePlan',
                'message' => 'Your plan has expired. Please purchase a new plan',
                'html' => view('components.expire-plan-component', compact('user'))->render()
            ])->send();
            exit();
        }
        return $planStatus;
    }
    private function clearInvitaions($userId)
    {
        return Invitation::where('user_id', $userId)->delete();
    }
    private function clearViewContacts($userId)
    {
        return ViewContact::where('view_id', $userId)->delete();
    }
    private function clearUserBlocks($userId)
    {
        return UserBlock::where('bloker_id', $userId)->delete();
    }
}
