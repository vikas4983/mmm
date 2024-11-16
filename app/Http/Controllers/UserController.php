<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUpdateRequest;
use App\Jobs\UserSendEmailJob;
use App\Models\MemberOtp;
use App\Models\Payment;
use App\Models\ProfileId;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use app\Services\UserService;
use App\Traits\PaidUsersTrait;
use App\Traits\ActiveUsersTrait;
use App\Traits\InActiveUsersTrait;
use App\Traits\MemberOtpTrait;
use App\Traits\profileTrait;
use App\Traits\SpoteLightUsersTrait;
use App\Traits\ModelCountsTrait;
use App\Traits\UserEmailTemplateTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    use ModelCountsTrait;
    /**
     * Display a listing of the resource.
     */
    use PaidUsersTrait;
    use profileTrait;
    use ActiveUsersTrait;
    use InActiveUsersTrait;
    use SpoteLightUsersTrait;
    use UserEmailTemplateTrait;
    use MemberOtpTrait;
    public function dashboard()
    {
        session(['login' => 'yes']);
        return view('dashboard');
    }
    public function index(Request $request)
    {
        $fullUrl = $request->fullUrl();
        $segments = explode('/', $fullUrl);
        $lastSegment = end($segments);
        $urlName = '/' . $lastSegment;
        $active = User::where('status', 1)->count();
        $inActive = User::where('status', 0)->count();
        $countAll = User::count();
        $premiumUsersCount = count($this->paidUsers());
        $profilePrefixs = $this->profilePrefix();
        $paidUsers = $this->paidUsers();
        $spotlightUsers = $this->spotlightUsers();

        $users = User::with(['payments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->where('status', 1)->orderBy('created_at', 'desc')->get();
        if ($request->paidUsers) {
            $this->paidUsersCount(User::class, $urlName, $premiumUsersCount);
            return view('admin.users.index', compact('paidUsers', 'premiumUsersCount', 'profilePrefixs', 'active', 'inActive', 'countAll'));
        }
        if ($request->activeUsers) {
            $activeUsers = $this->activeUsers();
            $this->activeUsersCount(User::class, $urlName, $active);
            return view('admin.users.index', compact('activeUsers', 'profilePrefixs', 'premiumUsersCount', 'active', 'inActive', 'countAll'));
        }
        if ($request->inactiveUsers) {
            $inActiveUsers = $this->inActiveUsers();
            $this->inActiveUsersCount(User::class, $urlName, $inActive);
            return view('admin.users.index', compact('inActiveUsers', 'profilePrefixs', 'premiumUsersCount', 'active', 'inActive', 'countAll'));
        }
        $users = User::with(['payments', 'approvals', 'successStories'])
            ->orderByDesc('created_at')
            ->paginate(10);

        $count = ($users->currentPage() - 1) * $users->perPage();
        $this->indexCount(User::class, $urlName);
        return view('admin.users.index', compact('users', 'paidUsers', 'premiumUsersCount', 'active', 'inActive', 'countAll'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {
            $user = auth()->user();
            if (!$user) {
                return redirect()->route('login')->with('error', 'Please log in to continue.');
            }

            $user = User::with(
                'basicDetails',
                'horoscopeDetails',
                'carrierDetails',
                'familyDetails',
                'lifestyleDetails',
                'likeDetails',
                'contactDetail',
                'images'
            )->where('id', $user->id)->first();

            if (!$user) {
                return redirect()->route('login')->with('error', 'User not found.');
            }

            return view('frontend.users.show', compact('user'));
        } catch (\Exception $e) {
            Log::error('Error fetching user data: ' . $e->getMessage());
            return redirect()->route('error')->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }


    public function myProfile()
    {

        try {
            if (!$user = auth()->user()) {
                return redirect()->route('login');
            }
            $user = User::with(
                'basicDetails',
                'horoscopeDetails',
                'carrierDetails',
                'familyDetails',
                'lifestyleDetails',
                'likeDetails',
                'contactDetail',
                'images'
            )->where('id', $user->id)->first();

            return view('frontend.users.show', compact('user'));
        } catch (\Exception $e) {
            Log::error('Error fetching user data: ' . $e->getMessage());
            return redirect()->route('error')->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) {}

    /**
     * Update the specified resource in storage.
     */


    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        try {
            $fields = config('formFields.accountDetails');

            $validationRules = [];
            foreach ($fields as $key => $field) {
                $validationRules[$field['name']] = $field['rules'];
            }
            $validateData = $request->validate($validationRules);
            $user->update([
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'profile_for' => $validateData['profile_for'],
            ]);
            return response()->json([
                'success' => 'User information updated successfully!',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'There was an error updating the user information. Please try again later.',
            ], 500);
        }
    }

    public function mobileUpdate(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        try {

            $validateData = $request->validate([
                'mobile' => 'required|numeric|digits:10'
            ]);
            // $name='mobileVerification';
            // $emailTemplate = $this->userEmailTemplate($name);
            // UserSendEmailJob::dispatch($user, $emailTemplate);
            // return redirect('verification')->with(['success' =>  'OTP has been sent to your email & mobile number!']);
            $user->update([
                'mobile' => $validateData['mobile'],

            ]);

            return response()->json([
                'success' => 'User mobile number updated successfully!',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'There was an error updating the user information. Please try again later.',
            ], 500);
        }
    }



    public function requestOtpForMobileChange(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'mobile' => 'required|numeric|digits:10',
                'action' => 'required|string',
            ]);

            $mobile = $validatedData['mobile'];
            $user = Auth::user();

            if (!$user) {
                return response()->json([
                    'error' => 'Login First!'
                ], 401);
            }

            $user = User::where('id', $user->id)->first();
            MemberOtp::where('user_id', $user->id)->delete();
            $name = $request->action;
            $emailTemplate = $this->userEmailTemplate($name);
            UserSendEmailJob::dispatch($user, $emailTemplate);

            $data = [
                'mobile' => $validatedData['mobile'],
                'email' => $user['email'],
                'action' => $validatedData['action'],

            ];

            session(['mobileVerification' => 'pending']);
            session()->put('data', $data);

            return redirect()->route('mobile.verification')->with('success', 'OTP has been sent to your mobile number!');
        } catch (\Exception $e) {
            Log::error('Error during OTP resend: ' . $e->getMessage());
            return redirect()->route('mobile.verification')->with('error', 'An error occurred while processing your request. Please try again.');
        }
    }


    public function showMobileVerificationPage()
    {
        $data = session()->get('data');
        return view('frontend.users.mobile-verification', compact('data'));
    }

    public function verifyOtpForMobile(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'otp' => 'required|numeric|digits:6',
                'mobile' => 'required|numeric|digits:10',
                'email' => 'required|email',
                'action' => 'required|string',
            ]);

            $otp = $validatedData['otp'];
            $mobile = $validatedData['mobile'] ?? null;

            $user = Auth::user();
            if (!$user) {
                return redirect()->route('login');
            }

            $user = User::where('id', $user->id)->first();
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
                return redirect()->route('mobile.verification')->with('error', 'Oops! Incorrect OTP.');
            }

            if (now()->greaterThan($otps->expires_at)) {
                $data = [
                    'mobile' => $user['mobile'],
                    'email' => $user['email'],
                    'action' => $request->action,
                    'error' => 'Oops! OTP has expired.'
                ];
                session()->put('data', $data);
                return redirect()->route('mobile.verification')->with('error', 'Oops! OTP has expired.');
            }

            $otps->delete();
            $user->update([
                'mobile' => $mobile,
                'status' => 1
            ]);

            session()->forget('mobileVerification');
            return redirect()->route('my.profile')->with('success', 'Mobile number has been updated successfully!!');
        } catch (\Exception $e) {
            Log::error('Error during OTP validation: ' . $e->getMessage());
            return redirect()->route('mobile.verification')->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function requestOtpForMobileChangeAgain(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'mobile' => 'required|digits:10',
                'email' => 'required|email',
                'action' => 'required|string',
            ]);

            $email = $validatedData['email'] ?? null;
            $mobile = $validatedData['mobile'] ?? null;
            $name = $validatedData['action'] ?? null;

            $user = User::where('email', $email)->orWhere('mobile', $mobile)->first();
            if (!$user) {
                return redirect()->back()->with('error', 'Something went wrong, please try again!');
            }

            MemberOtp::where('user_id', $user->id)->delete();
            $emailTemplate = $this->userEmailTemplate($name);
            UserSendEmailJob::dispatch($user, $emailTemplate);

            $data = [
                'mobile' => $user['mobile'],
                'email' => $user['email'],
                'action' => $name,
            ];

            session()->put('data', $data);
            return redirect()->route('mobile.verification')->with('success', 'OTP Resend sent successfully!');
        } catch (\Exception $e) {
            Log::error('Error during OTP resend: ' . $e->getMessage());
            return redirect()->route('mobile.verification')->with('error', 'An unexpected error occurred. Please try again.');
        }
    }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}

    public function checkBoxDelete(Request $request)
    {
        $selectedDeleteAdminIds = $request->input('selectedDeleteAdminIds');
        if (!empty($selectedDeleteAdminIds)) {
            $ids = explode(',', $selectedDeleteAdminIds[0]);
            foreach ($ids as $id) {
                $User = User::find($id);
                if ($User) {
                    $User->delete();
                }
            }
            return redirect()->back()->with('error', 'Admin Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'No items selected.');
        }
    }
    public function activeItem(Request $request)
    {
        $selectedActiveAdminIds = $request->input('selectedActiveAdminIds');
        if (!empty($selectedActiveAdminIds)) {
            $ids = explode(',', $selectedActiveAdminIds[0]);

            foreach ($ids as $id) {
                $User = User::find($id);
                if ($User) {
                    $User->update([
                        'status' => 1
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Selected items Activated successfully.');
        } else {
            return redirect()->back()->with('error', 'No items selected.');
        }
    }
    public function inActiveItem(Request $request)
    {
        //dd($request->all());
        $selectedInactiveAdminIds = $request->input('selectedInactiveAdminIds');
        if (!empty($selectedInactiveAdminIds)) {
            $ids = explode(',', $selectedInactiveAdminIds[0]);

            // Check if you're receiving an array of selected IDs
            foreach ($ids as $id) {
                //dd($id); // Check if each ID is being processed correctly
                $User = User::find($id);
                if ($User) {
                    $User->update([
                        'status' => 0
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Selected items inActivated successfully.');
        } else {
            return redirect()->back()->with('error', 'No items selected.');
        }
    }

    public function profilePrefix()
    {
        $profilePrefixes = ProfileId::orderBy('created_at', 'desc')->get();
        return $profilePrefixes;
    }

    public function premiumForAdmin()
    {
        $paymentStatus = User::with(['payments', 'approvals', 'successStories'])
            ->orderBy('created_at', 'desc')
            ->get();
        //dd($paymentStatus);
        return $paymentStatus;
    }

    public function paidusersorders()
    {
        $profilePrefixs = $this->profilePrefix();
        $orders = User::whereHas('payments', function ($query) {
            $query->where('is_paid', 1);
        })->with(['payments' => function ($query) {
            $query->orderBy('is_paid', 'desc')
                ->orderBy('created_at', 'desc')->count();
        }])->get();

        // $freeUsersOrders = User::whereDoesntHave('payments', function ($query) {
        //     $query->where('is_paid', 1);
        // })->with(['payments' => function ($query) {
        //     $query->where('is_paid', 0);
        // }])->get();

        $freeUsersOrders = User::whereDoesntHave('payments', function ($query) {
            $query->where('is_paid', 1);
        })->whereHas('payments', function ($query) {
            $query->where('is_paid', 0);
        })->with(['payments' => function ($query) {
            $query->where('is_paid', 0);
        }])->withCount('payments')->get();
        // dd($freeUsersOrders);

        return view('admin.users.orders', compact('orders', 'profilePrefixs', 'freeUsersOrders'));
    }
}
