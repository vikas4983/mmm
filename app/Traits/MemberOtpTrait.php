<?php

namespace App\Traits;

use App\Models\MemberOtp;
use Carbon\Carbon;

trait MemberOtpTrait
{
    public function generateOTP($userId)
    {
        $otp = rand(100000, 999999);
        MemberOtp::create([
            'user_id' => $userId,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(5),
            'status' => 1,
        ]);
        return $otp;
    }
}
