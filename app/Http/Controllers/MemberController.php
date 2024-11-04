<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Jobs\UserSendEmailJob;
use App\Models\Member;
use App\Models\MemberOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Traits\UserEmailTemplateTrait;
use App\Traits\MemberOtpTrait;

class MemberController extends Controller
{
    use UserEmailTemplateTrait;
    use MemberOtpTrait;

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }


    public function store(Request $request)
    {
        $fields = config('formFields.register');
        $validationRules = [];
        foreach ($fields as $key => $field) {
            $validationRules[$field['name']] = $field['rules'];
        }
        $validateData = $request->validate($validationRules);
        $validateData['password'] = Hash::make($validateData['password']);
        if ($validateData) {
            $user = User::create($validateData);
            session(['registration_step' => '2']);
            $userId = $user->id;
            $name = 'AccountVerification';
            $accountInfo = [
                'name' => $validateData['name'],
                'mobile' => $validateData['mobile'],
                'email' => $validateData['email'],
            ];
            session(['accountInfo' => $accountInfo]);

            $emailTemplate = $this->userEmailTemplate($name);
            UserSendEmailJob::dispatch($user, $emailTemplate);
           
            return redirect('verification')->with(['success' =>  'OTP has been sent to your email & mobile number!']);
        } else {
            return redirect()
                ->back()
                ->withErrors(['error' => 'Fill the all fields correctly']);
        }
    }



    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'mobile' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/|confirmed',
        ]);
        $user = User::where('email', $validatedData['email'])
            ->orWhere('mobile', $validatedData['mobile'])
            ->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found!');
        }
        $user->update([
            'password' => Hash::make($validatedData['password']),
        ]);
        return redirect('/login')->withErrors(['success' => 'Password change successfully!!']);
    }
    public function changePassword(ChangePasswordRequest $request)
    {
        if ($user = Auth()->user()) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect']);
            }
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password changed successfully!');
        } else {
            return redirect()->back()->with('success', 'Something went wrong, please try again!');
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
    public function otpVarify(Request $request)
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
        session(['registration_step' => '4']);
        return redirect()->route('basicDetails.create')->with('success', 'Congratulations! Your account has been verified. Please complete the form.');
    }

    public function otpAgain(Request $request)
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
            session()->forget('registration_step');
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
}
