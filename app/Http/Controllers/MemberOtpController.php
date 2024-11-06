<?php

namespace App\Http\Controllers;

use App\Jobs\UserSendEmailJob;
use App\Models\BasicDetail;
use App\Models\CarrierDetail;
use App\Models\ContactDetail;
use App\Models\FamilyDetail;
use App\Models\HoroscopeDetail;
use App\Models\Image;
use App\Models\LifeStyle;
use App\Models\LikeDetail;
use App\Models\Member;
use App\Models\MemberOtp;
use App\Models\User;
use App\Traits\CheckRegistrationStepTrait;
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

    public function accountVerification()
    {
        $data = session()->get('data');
        return view('account-verification', compact('data'));
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
        //dd($request->all());
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

        $userStatus = User::where('email', $user->email)->where('mobile', $user->mobile)->where('status', 0)->first();

        if ($userStatus && $userStatus->status === 'Inactive') {
            $name = 'accountVerification';
            $emailTemplate = $this->userEmailTemplate($name);
            UserSendEmailJob::dispatch($user, $emailTemplate);
            $data = [
                'mobile' => $user['mobile'],
                'email' => $user['email'],
                'action' =>  $name,
                'success' => 'OTP has sent successfully!',
            ];
            session()->put('data', $data);
            return redirect()->route('account.verification')->with('info', 'Verified your account first!');
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
        // dd($request->all());
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
        $name = $request->action;
        //dd($name);
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
        // dd($request->all());
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
        $userId = $user->id;
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

    private function checkRegistrationStep($user)
    {
        $user->update(['status' => 1]);
        Auth::login($user);
        $userId = $user->id;
        $basicDetails = BasicDetail::where('user_id', $userId)->first();
        $horoscopeDetails = HoroscopeDetail::where('user_id', $userId)->first();
        $carrierDetails = CarrierDetail::where('user_id', $userId)->first();
        $familyDetails = FamilyDetail::where('user_id', $userId)->first();
        $lifestyleDetails = LifeStyle::where('user_id', $userId)->first();
        $likeDetails = LikeDetail::where('user_id', $userId)->first();
        $contactDetails = ContactDetail::where('user_id', $userId)->first();
        $images = Image::where('user_id', $userId)->first();

        if ($basicDetails === null || $basicDetails->status === 0) {
            session(['registration_step' => 4]);
            return redirect()->route('basicDetails.create');
        }

        if ($horoscopeDetails === null || $horoscopeDetails->status === 0) {
            session(['registration_step' => 5]);
            return redirect()->route('horoscopes.create');
        }

        if ($carrierDetails === null || $carrierDetails->status === 0) {
            session(['registration_step' => 6]);
            return redirect()->route('carrierDetails.create');
        }
        if ($familyDetails === null || $familyDetails->status === 0) {
            session(['registration_step' => 7]);
            return redirect()->route('familyDetails.create');
        }
        if ($lifestyleDetails === null || $lifestyleDetails->status === 0) {
            session(['registration_step' => 8]);
            return redirect()->route('lifestyleDetails.create');
        }
        if ($likeDetails === null || $likeDetails->status === 0) {
            session(['registration_step' => 9]);
            return redirect()->route('likeDetails.create');
        }
        if ($contactDetails === null || $contactDetails->status === 0) {
            session(['registration_step' => 10]);
            return redirect()->route('contactDetails.create');
        }
        if ($images === null || $images->status === 0) {
            session(['registration_step' => 11]);
            return redirect()->route('images.create');
        }
    }
}
