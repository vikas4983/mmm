<?php

namespace App\Http\Controllers;

use App\Jobs\UserSendEmailJob;
use App\Models\MemberOtp;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\UserEmailTemplateTrait;
use App\Traits\MemberOtpTrait;
use App\Traits\RegistrationStepsTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MemberOtpController
{

    use UserEmailTemplateTrait;
    use MemberOtpTrait;
    use RegistrationStepsTrait;




    public function verification()

    {

        return view('frontend.users.verification');
    }
    public function otpVerification(Request $request)

    {

        $data = session()->get('data');
        return view('frontend.users.otpValidate', compact('data'));
    }
    public function otpValidate(Request $request)
    {

        $validatedData = $request->validate([
            'otp' => 'required|numeric|digits:6',
            'mobile' => 'required|numeric|digits:10',
            'email' => 'required|email',
        ]);

        $otp = $validatedData['otp'];
        $mobile = $validatedData['mobile'] ?? null;
        $email = $validatedData['email'] ?? null;
        $userByMobile = User::where('mobile', $mobile)->first();
        $userByEmail = User::where('email', $email)->first();
        if (!$userByMobile) {
            return redirect()->back()->with('error', 'Mobile number not found!');
        }
        if (!$userByEmail) {
            return redirect()->back()->with('error', 'Email not found!');
        }
        $user = User::where('mobile', $mobile)->where('email', $email)->first();
        $otp = MemberOtp::where('otp', $otp)
            ->where('user_id', $user->id)
            ->latest('id')
            ->first();
        if (!$otp) {
            return redirect()->back()->with('error', 'Incorrect OTP!');
        }
        dd('ok');
        if (now()->greaterThan($otp->expires_at)) {
            return redirect()->back()->with('error', 'OTP has expired');
        }

        Auth::login($user);
        session(['registration_step' => '1']);
        return redirect()->route('basicDetails.create');
    }
    public function loginWithOtp()
    {
        return view('frontend.users.loginWithOtp');
    }
    public function forgotPasswordForm()
    {
        return view('forgotPassword');
    }
    public function loginOtp(Request $request)
    {

        if ($request->contactMethod == 'email') {
            $validatedData = $request->validate([
                'contact' => 'required|email',
            ]);
        } elseif ($request->contactMethod == 'mobile') {
            $validatedData = $request->validate([
                'contact' => 'required|numeric|digits:10',
            ]);
        } else {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Invalid contact method specified.']);
        }

        $user = User::where('email', $validatedData['contact'])
            ->orWhere('mobile', $validatedData['contact'])
            ->first();
        if (!$user) {
            $errorMessage = $request->contactMethod == 'email' ? 'Email id does not match our records!' : 'Mobile number does not match our records!';
            return redirect()
                ->back()
                ->withErrors(['error' => $errorMessage]);
        }
        MemberOtp::where('user_id', $user->id)->delete();

        switch ($request->action) {
            case 'UserLoginWithOTP':
                $name = 'UserLoginWithOTP';
                break;

            default:
                $name = 'UserForgotPasswordOTP';
        }
        $emailTemplate = $this->userEmailTemplate($name);
        UserSendEmailJob::dispatch($user, $emailTemplate);
        $data = [
            'mobile' => $user['mobile'],
            'email' => $user['email'],
            'action' => $request->action,
            'success' => 'OTP has sent successfully!',
        ];
        session()->put('data', $data);
        return redirect('otp-verification');
    }
    public function otpResend(Request $request)
    {

        $validateData = $request->validate([
            'mobile' => 'required|digits:10',
            'email' => 'required|email',
            'action' => 'required|string',
        ]);
        $requestMobile = $request->mobile;
        $requestEmail = $request->email;
        $user = User::where('email', $requestEmail)->orWhere('mobile', $requestMobile)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Somethning went wrong, please try again!');
        }
        $name = 'UserResendOTP';
        MemberOtp::where('user_id', $user->id)->delete();
        $emailTemplate = $this->userEmailTemplate($name);
        UserSendEmailJob::dispatch($user, $emailTemplate);


        if ($request['action'] == 'UserResendOTP') {

            return redirect('verification')->with(
                [
                    'success' => 'OTP Resend sent successfully!',

                ],
            );
        }
        $data = [
            'mobile' => $user['mobile'],
            'email' => $user['email'],
            'action' => $request->action,
            'success' => 'OTP Resend sent successfully!',

        ];

        session()->put('data', $data);
        return redirect('otp-verification');
    }
    public function loginOtpValidate(Request $request)
    {

        $validatedData = $request->validate([
            'otp' => 'required|numeric|digits:6',
            'mobile' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'action' => 'required|string',
        ]);
        $otp = $validatedData['otp'];
        $mobile = $validatedData['mobile'] ?? null;
        $email = $validatedData['email'] ?? null;
        $userByMobile = User::where('mobile', $mobile)->first();
        $userByEmail = User::where('email', $email)->first();

        if (!$userByMobile) {
            return redirect()->back()->with('error', 'Mobile number not found!');
        }
        if (!$userByEmail) {
            return redirect()->back()->with('error', 'Email not found!');
        }

        $user = User::where('mobile', $mobile)->orWhere('email', $email)->first();
        $otps = MemberOtp::where('otp', $otp)
            ->where('user_id', $user->id)
            ->latest('id')
            ->first();
        $data = $validatedData;

        if (!$otps) {
            $data = [
                'mobile' => $user['mobile'],
                'email' => $user['email'],
                'action' => $request->action,
                'error' => 'Oops! Incorrect OTP.'

            ];
            session()->put('data', $data);
            return redirect('otp-verification');
        }
        if (now()->greaterThan($otps->expires_at)) {
            $data = [
                'mobile' => $user['mobile'],
                'email' => $user['email'],
                'action' => $request->action,
                'error' => 'Oops! OTP has expired.'

            ];
            session()->put('data', $data);
            return redirect('otp-verification');
        }

        $otps->delete();
        if ($request->action == 'UserLoginWithOTP') {
            Auth::login($user);
            session()->forget('data');
            $userId = $user->id;
            $redirect = $this->registrationStep($userId);
            if ($redirect) {
                return $redirect;
            }
            session(['login' => 'yes']);
            return redirect('dashboard')->with('success', 'LoggedIn successfully!');
        }
        if ($request->action == 'accountVerification') {
            $user->update(['status' => 1]);
            Auth::login($user);
            $userId = $user->id;
            $redirect = $this->registrationStep($userId);
            if ($redirect) {
                return $redirect;
            }
            session(['login' => 'yes']);
            return redirect('dashboard')->with('success', 'LoggedIn successfully!');
        }

        return view('frontend.users.changePasswordForm', compact('data'))->withErrors(['success' => 'OTP verified, Now Set the new password!']);
    }
    public function userForgotPassword()
    {
        return view('frontend.users.forgotPassword');
    }
}
