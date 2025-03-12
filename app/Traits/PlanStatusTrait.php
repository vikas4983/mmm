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

            return   response()->json([
                'success' => true,
                'action' => 'takePlan',
                'message' => "<span style=\"color: #AF3042;\"><i class=\"fas fa-exclamation-circle\"></i> You don't have any plan, Please purchase a plan</span>",
                'redirect' => route('plan'),
                'html' => view('components.expire-plan-component', compact('user'))->render()
            ]);
        }
        if (Carbon::now()->greaterThanOrEqualTo($planStatus->expiry_date)) {
            $this->clearInvitaions($userId);
            $planStatus->update([
                'is_paid' => 0,
                'contact' => 0
            ]);
            return response()->json([
                'success' => true,
                'action' => 'expirePlan',
                'message' => 'Your plan has expired. Please purchase a new plan',
                'redirect' => route('plan'),
                'html' => view('components.expire-plan-component', compact('user'))->render()
            ]);
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
