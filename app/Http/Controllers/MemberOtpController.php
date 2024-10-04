<?php

namespace App\Http\Controllers;

use App\Jobs\UserSendEmailJob;
use App\Models\MemberOtp;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\UserEmailTemplateTrait;
use App\Traits\MemberOtpTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MemberOtpController
{

    use UserEmailTemplateTrait;
    use MemberOtpTrait;





    public function loginWithOtp()
    {
        return view('frontend.users.loginWithOtp');
    }

    public function loginWithSendOtp(Request $request)
    {
        $validateData = $request->validate([
            'mobile' => 'required|digits:10',
        ]);


        $contact = $validateData['mobile'];
        $user = User::where('mobile', $contact)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Mobile number not found!');
        }
        $name = 'UserLoginWithOTP';
        $emailTemplate = $this->userEmailTemplate($name);
        UserSendEmailJob::dispatch($user, $emailTemplate);

        return redirect()->route('', [
            'email' => $user['email'],
            'mobile' => $user['mobile'],
        ]);
    }


    public function validateOtp(Request $request)
    {

        $request->validate([
            'otp' => 'required',
            'mobile' => 'required|digit:10',
            'email' => 'required|email',
        ]);

        $requestOtp = $request->otp;
        $requestMobile = $request->mobile;
        $requestEmail = $request->email;

        $user = User::where('email', $requestEmail)->where('mobile', $requestMobile)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email & Mobile number do not match our records!');
        }
        $otp = MemberOtp::where('otp', $requestOtp)->where('user_id', $user->id)->latest('id')->first();
        if (!$otp) {
            return redirect()->back()->with('error', 'Incorrect OTP or OTP expired!');
        }
        if (now()->greaterThan($otp->expires_at)) {
            return redirect()->back()->with('error', 'OTP has expired');
        }
        if ($user && $otp) {
            $user->update([
                'status' => 1
            ]);
            $otp->delete();
        }
        return response()->json(['success' => 'OTP has been verified successfully!']);
    }


    public function otpResend(Request $request)
    {
        //dd($request->all());

        $validateData = $request->validate([
            'mobile' => 'nullable|digits:10',
            'email' => 'nullable|email',
        ]);
        $requestMobile = $request->mobile;
        $requestEmail = $request->email;
        $user = User::where('email', $requestEmail)->orWhere('mobile', $requestMobile)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Somethning went wrong, please try again!');
        }
        $name = 'UserResendOTP';
        session(['accountInfo' => $validateData]);
        MemberOtp::where('user_id', $user->id)->delete();
        $emailTemplate = $this->userEmailTemplate($name);
        UserSendEmailJob::dispatch($user, $emailTemplate);
        $data = [
            'mobile' => $user['mobile'],
            'email' => $user['email'],
        ];
        return view('frontend.users.otpValidate', compact('data'))
            ->withErrors(['success' => 'Resend OTP sent successfully!']);
    }
    public function forgotPassword(Request $request)
    {

        $validateData = $request->validate([
            'mobile' => 'required',
            'email' => 'required',
        ]);
        $requestMobile = $request->mobile;
        $requestEmail = $request->email;
        $userByEmail = User::where('email', $requestEmail)->first();
        $userByMobile = User::where('mobile', $requestMobile)->first();
        if (!$userByEmail) {
            return redirect()->back()->with('error', 'Email does not match our records!');
        } elseif (!$userByMobile) {
            return redirect()->back()->with('error', 'Mobile number does not match our records!');
        }
        $user = User::where('email', $requestEmail)
            ->where('mobile', $requestMobile)
            ->first();
        $name = 'UserForgotPasswordOTP';
        session(['accountInfo' => $validateData]);
        $emailTemplate = $this->userEmailTemplate($name);
        UserSendEmailJob::dispatch($user, $emailTemplate);
        return redirect()->back()->with('success', 'OTP sent for forgot password successfully!');
    }
}
