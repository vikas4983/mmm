<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUpdateRequest;
use App\Jobs\UserSendEmailJob;
use App\Models\BloodGroup;
use App\Models\BodyType;
use App\Models\Caste;
use App\Models\Challenge;
use App\Models\City;
use App\Models\Complextion;
use App\Models\Country;
use App\Models\DietaryHabit;
use App\Models\Education;
use App\Models\Employee;
use App\Models\FamilyStatus;
use App\Models\FamilyType;
use App\Models\FamilyValue;
use App\Models\FatherOccupation;
use App\Models\Habit;
use App\Models\Height;
use App\Models\Image;
use App\Models\Income;
use App\Models\LanguageSpeak;
use App\Models\MemberOtp;
use App\Models\MotherOccupation;
use App\Models\MotherTongue;
use App\Models\Occupation;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\ProfileId;
use App\Models\Rashi;
use App\Models\Religion;
use App\Models\State;
use App\Models\User;
use App\Models\ViewProfile;
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
use App\Traits\ProfileTrait;
use App\Traits\SpoteLightUsersTrait;
use App\Traits\ModelCountsTrait;
use App\Traits\UserEmailTemplateTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Services\OptionService;

class UserController extends Controller
{
    use ModelCountsTrait;
    /**
     * Display a listing of the resource.
     */
    use PaidUsersTrait;
    use ProfileTrait;
    use ActiveUsersTrait;
    use InActiveUsersTrait;
    use SpoteLightUsersTrait;
    use UserEmailTemplateTrait;
    use MemberOtpTrait;

    public function dashboard()
    {
        session(['login' => 'yes']);
        $dashboardConstacts = config('constants.dashboard');
        //dump( $dashboardConstacts );
        return view('dashboard', compact('dashboardConstacts'));
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

        $users = User::with([
            'payments' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
        ])
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
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

            $user = User::with('basicDetails', 'horoscopeDetails', 'carrierDetails', 'familyDetails', 'lifestyleDetails', 'likeDetails', 'contactDetails', 'images')
                ->where('id', $user->id)
                ->first();

            if (!$user) {
                return redirect()->route('login')->with('error', 'User not found.');
            }

            return view('frontend.users.show', compact('user'));
        } catch (\Exception $e) {
            Log::error('Error fetching user data: ' . $e->getMessage());
            return redirect()->route('error')->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function showProfile($uuid)
    {
        $profile = User::where('uuid', $uuid)->where('status', 1)->first();
        if (!$profile) {
            return redirect()->route('dashboard')->with('error', 'Something went wrong!');
        }
        $this->viewProfile($profile->id);
        return view('frontend.users.profiles.profile', compact('profile'));
    }
    private function viewProfile($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
        $viewPrfile = ViewProfile::where('viewed_user_id', $id)->first();
        if (!$viewPrfile) {
            $viewPrfile = ViewProfile::create([
                'viewer_id' => Auth::user()->id,
                'viewed_user_id' => $id,
            ]);
        }
    }

    public function myProfile()
    {
        try {
            if (!($user = auth()->user())) {
                return redirect()->route('login');
            }

            $user = User::with(['basicDetails.heights', 'basicDetails.motherTongues', 'basicDetails.religions', 'basicDetails.religions.castes', 'basicDetails.maritalStatus', 'horoscopeDetails.rashies', 'carrierDetails.educations', 'carrierDetails.occupations', 'carrierDetails.employees', 'carrierDetails.incomes', 'carrierDetails.countries', 'carrierDetails.states', 'carrierDetails.cities', 'familyDetails', 'familyDetails.familyCity', 'lifestyleDetails', 'likeDetails', 'contactDetails', 'images'])
                ->where('id', $user->id)
                ->where('status', 1)
                ->first();

            return view('frontend.users.show', compact('user'));
        } catch (\Exception $e) {
            Log::error('Error fetching user data: ' . $e->getMessage());
            return redirect()->route('error')->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function plan()
    {
        $activePlan = Payment::where('user_id', Auth::user()->id)->where('is_paid', 1)->latest('created_at')->first();
        if (! $activePlan) {
            return view('frontend.users.plans.plan');
        }
        return view('frontend.users.plans.plan', compact('activePlan'));
    }
    public function activePlan()
    {
        $activePlan = Payment::where('user_id', Auth::user()->id)
            ->where('is_paid', 1)
            ->latest('created_at')
            ->first();

        if (!$activePlan) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
        $plan = Plan::where('id', $activePlan->plan_id)
            ->where('status', 1)
            ->first();

        if (!$plan) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
        $activePlanArray = $activePlan->toArray();
        $planArray = $plan->toArray();
        $activePlanDetails = array_merge($activePlanArray, $planArray);
        return view('frontend.users.plans.activePlan', compact('activePlanDetails'));
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
            return response()->json(
                [
                    'error' => 'There was an error updating the user information. Please try again later.',
                ],
                500,
            );
        }
    }
    public function updateAccountDetail(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        // try {
        $fields = config('formFields.editAccountDetails');

        $validationRules = [];
        foreach ($fields as $key => $field) {
            $validationRules[$field['name']] = $field['rules'];
        }
        $validationRules['state'] = ['required', 'integer'];
        $validationRules['city'] = ['required', 'integer'];
        $validateData = $request->validate($validationRules);

        $user->update([
            'name' => $validateData['name'],
            'email' => $validateData['user_email'],
            'profile_for' => $validateData['profile_for'],
        ]);
        $user->carrierDetails->update([
            'country' => $validateData['country'],
            'state' => $validateData['state'],
            'city' => $validateData['city'],
        ]);
        $country = Country::find($request->country)->country;
        $state = State::find($request->state)->state;
        $city = City::find($request->city)->city;
        return response()->json([
            'success' => 'true',
            'message' => 'User account deatils updated successfully!',
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'profile_for' => $user->profile_for,
                'country' => $country,
                'state' => $state,
                'city' => $city,
            ],
        ]);
        // } catch (\Exception $e) {
        return response()->json(
            [
                'error' => 'There was an error updating the user information. Please try again later.',
            ],
            500,
        );
        // }
    }

    public function mobileUpdate(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        try {
            $validateData = $request->validate([
                'mobile' => 'required|numeric|digits:10',
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
            return response()->json(
                [
                    'error' => 'There was an error updating the user information. Please try again later.',
                ],
                500,
            );
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
                return response()->json(
                    [
                        'error' => 'Login First!',
                    ],
                    401,
                );
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
                    'error' => 'Oops! Incorrect OTP.',
                ];
                session()->put('data', $data);
                return redirect()->route('mobile.verification')->with('error', 'Oops! Incorrect OTP.');
            }

            if (now()->greaterThan($otps->expires_at)) {
                $data = [
                    'mobile' => $user['mobile'],
                    'email' => $user['email'],
                    'action' => $request->action,
                    'error' => 'Oops! OTP has expired.',
                ];
                session()->put('data', $data);
                return redirect()->route('mobile.verification')->with('error', 'Oops! OTP has expired.');
            }

            $otps->delete();
            $user->update([
                'mobile' => $mobile,
                'status' => 1,
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

    public function updateAboutMe(Request $request)
    {
        $validatedData = $request->validate(
            [
                'about_me' => ['required', 'string', 'regex:/^[a-zA-Z\s,.\?!]+$/', 'max:1000'],
            ],
            [
                'about_me.required' => 'The education details field is required.',
                'about_me.regex' => 'The education details must only contain alphabetic characters, spaces, and common punctuation marks (.,?!)',
                'about_me.max' => 'The education details must not exceed 1000 characters.',
            ],
        );
        $user = Auth::user();

        $user->carrierDetails->update($validatedData);
        return response()->json([
            'success' => 'true',
            'message' => 'User about me details updated successfully!',
            'user' => [
                'about_me' => $user->carrierDetails->about_me,
            ],
        ]);
    }
    public function educationDetail(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate(
            [
                'education_detail' => ['required', 'string', 'regex:/^[a-zA-Z\s,.\?!]+$/', 'max:1000'],
            ],
            [
                'education_detail.required' => 'The education details field is required.',
                'education_detail.regex' => 'The education details must only contain alphabetic characters, spaces, and common punctuation marks (.,?!)',
                'education_detail.max' => 'The education details must not exceed 1000 characters.',
            ],
        );

        $user->carrierDetails->update($validatedData);
        return response()->json([
            'success' => 'true',
            'message' => 'User about education details updated successfully!',
            'user' => [
                'education_detail' => $user->carrierDetails->education_detail,
            ],
        ]);
    }
    public function occupationDetail(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate(
            [
                'occupation_detail' => ['required', 'string', 'regex:/^[a-zA-Z\s,.\?!]+$/', 'max:1000'],
            ],
            [
                'occupation_detail.required' => 'The occupation details field is required.',
                'occupation_detail.regex' => 'The occupation details must only contain alphabetic characters, spaces, and common punctuation marks (.,?!)',
                'occupation_detail.max' => 'The occupation details must not exceed 1000 characters.',
            ],
        );

        $user->carrierDetails->update($validatedData);
        return response()->json([
            'success' => 'true',
            'message' => 'User about occupation details updated successfully!',
            'user' => [
                'about_family' => $user->carrierDetails->about_family,
            ],
        ]);
    }
    public function familyDetail(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate(
            [
                'about_family' => ['required', 'string', 'regex:/^[a-zA-Z\s,.\?!]+$/', 'max:1000'],
            ],
            [
                'about_family.required' => 'The family details field is required.',
                'about_family.regex' => 'The family details must only contain alphabetic characters, spaces, and common punctuation marks (.,?!)',
                'about_family.max' => 'The family details must not exceed 1000 characters.',
            ],
        );

        $user->familyDetails->update($validatedData);
        return response()->json([
            'success' => 'true',
            'message' => 'User about family details updated successfully!',
            'user' => [
                'about_family' => $user->familyDetails->about_family,
            ],
        ]);
    }

    public function updateBasicDetails(Request $request)
    {
        try {
            $user = auth()->user();
            $fields = config('formFields.editBasicDetails');
            $validationRules = [];
            foreach ($fields as $key => $field) {
                $validationRules[$field['name']] = $field['rules'];
            }
            $validationRules['caste'] = ['required', 'integer', 'exists:castes,id'];
            $validationRules['children'] = ['nullable', 'integer', 'min:0'];
            $validationRules['other_caste_marriage'] = ['nullable', 'integer', 'min:0', 'max:1'];
            $validateData = $request->validate($validationRules);

            $user->basicDetails->update($validateData);

            $heightName = Height::find($request->height)->name ?? 'Not provided';
            $motherTongueName = MotherTongue::find($request->mother_tongue)->name ?? 'Not provided';
            $casteName = Caste::find($request->caste)->name ?? 'Not provided';

            return response()->json([
                'success' => 'true',
                'message' => 'User basic details updated successfully!',
                'user' => [
                    'height' => $heightName,
                    'mother_tongue' => $motherTongueName,
                    'caste' => $casteName,
                    'children' => $user->basicDetails->children,
                    'otherCasteMarriage' => $user->basicDetails->other_caste_marriage,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => 'false',
                    'message' => 'An error occurred while updating user basic details.',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }
    public function updateHoroscopeDetails(Request $request)
    {
        $user = auth()->user();
        $fields = config('formFields.editHoroscopeDetails');
        $validationRules = [];
        foreach ($fields as $key => $field) {
            $validationRules[$field['name']] = $field['rules'];
        }
        $validationRules['place_of_birth'] = ['nullable', 'integer'];
        $validateData = $request->validate($validationRules);
        $user->horoscopeDetails->update($validateData);
        $city = City::find($validateData['place_of_birth']) ?? 'Not provided';
        $placeOfBirth = $city->city;
        $rashi = Rashi::find($request->rashi) ?? 'Not provided';
        $updatedRashi = $rashi->name;
        return response()->json([
            'success' => 'true',
            'message' => 'User Horoscope details updated successfully!',
            'user' => [
                'time_of_birth' => $user->horoscopeDetails->time_of_birth,
                'manglik' => $user->horoscopeDetails->manglik,
                'place_of_birth' => $placeOfBirth,
                'rashi' => $updatedRashi,
                'horoscope_match' => $user->horoscopeDetails->horoscope_match,
                'horoscope_show' => $user->horoscopeDetails->horoscope_show,
            ],
        ]);
    }
    public function updateCarrierDetails(Request $request)
    {
        try {
            $user = auth()->user();
            $fields = config('formFields.editCarrierDetails');
            $validationRules = [];

            foreach ($fields as $key => $field) {
                $validationRules[$field['name']] = $field['rules'];
            }

            $validateData = $request->validate($validationRules);
            $user->carrierDetails->update($validateData);
            $education = Education::find($validateData['education'])->education ?? 'NA';
            $employee = Employee::find($validateData['employee'])->employee ?? 'NA';
            $occupation = Occupation::find($validateData['occupation'])->occupation ?? 'NA';
            $income = Income::find($validateData['income'])->income ?? 'NA';

            return response()->json([
                'success' => 'true',
                'message' => 'User Carrier details updated successfully!',
                'user' => [
                    'education' => $education,
                    'employee' => $employee,
                    'occupation' => $occupation,
                    'income' => $income,
                    'organization_name' => $user->carrierDetails->organization_name,
                    'school_name' => $user->carrierDetails->school_name,
                    'college_name' => $user->carrierDetails->college_name,
                    'interested_abroad' => $user->carrierDetails->interested_abroad,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => 'false',
                    'message' => 'An error occurred while updating user carrier details.',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }
    public function updateUserFamilyDetails(Request $request)
    {
        try {
            $user = auth()->user();
            $fields = config('formFields.editUserFamilyDetails');
            $validationRules = [];

            foreach ($fields as $key => $field) {
                $validationRules[$field['name']] = $field['rules'];
            }
            $validationRules['family_state'] = ['nullable', 'integer'];
            $validationRules['family_city'] = ['nullable', 'integer'];
            $validateData = $request->validate($validationRules);
            $user->familyDetails->update($validateData);
            $fatherOccupation = FatherOccupation::find($validateData['father_occupation'])->name ?? 'NA';
            $motherOccupation = MotherOccupation::find($validateData['mother_occupation'])->name ?? 'NA';
            $familyType = FamilyType::find($validateData['family_type'])->name ?? 'NA';
            $familyValue = FamilyValue::find($validateData['family_value'])->name ?? 'NA';
            $familyStatus = FamilyStatus::find($validateData['family_status'])->name ?? 'NA';
            $familyState = State::find($validateData['family_state'])->state ?? 'NA';
            $familyCity = City::find($validateData['family_city'])->city ?? 'NA';

            return response()->json([
                'success' => 'true',
                'message' => 'User Family details updated successfully!',
                'user' => [
                    'father_occupation' => $fatherOccupation,
                    'mother_occupation' => $motherOccupation,
                    'brother' => $user->familyDetails->brother,
                    'brother_married' => $user->familyDetails->brother_married,
                    'sister' => $user->familyDetails->sister,
                    'sister_married' => $user->familyDetails->sister_married,
                    'family_type' => $familyType,
                    'family_value' => $familyValue,
                    'family_status' => $familyStatus,
                    'father_gotra' => $user->familyDetails->father_gotra,
                    'mother_gotra' => $user->familyDetails->mother_gotra,
                    'family_state' => $familyState,
                    'family_city' => $familyCity,
                    'contact_address' => $user->familyDetails->contact_address,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => 'false',
                    'message' => 'An error occurred while updating user carrier details.',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }
    public function updateLifestyleDetails(Request $request)
    {
        try {
            $user = auth()->user();
            $fields = config('formFields.editLifestyleDetails');
            $validationRules = [];

            foreach ($fields as $key => $field) {
                $validationRules[$field['name']] = $field['rules'];
            }

            $validateData = $request->validate($validationRules);
            $user->lifestyleDetails->update($validateData);
            $bodyType = BodyType::find($validateData['body_type'])->name ?? 'NA';
            $complextion = Complextion::find($validateData['complextion'])->name ?? 'NA';
            $dietaryHabit = DietaryHabit::find($validateData['dietary_habit'])->name ?? 'NA';
            $habit = Habit::find($validateData['drinking_habit'])->name ?? 'NA';
            $habit = Habit::find($validateData['smoking_habit'])->name ?? 'NA';
            $physicalStatus = Challenge::find($validateData['physical_status'])->name ?? 'NA';
            $bloodGroup = BloodGroup::find($validateData['blood_group'])->name ?? 'NA';
            $languageSpeak = LanguageSpeak::find($validateData['language_speak'])->name ?? 'NA';

            return response()->json([
                'success' => 'true',
                'message' => 'User Lifestyles details updated successfully!',
                'user' => [
                    'body_type' => $bodyType,
                    'complextion' => $complextion,
                    'dietary_habit' => $dietaryHabit,
                    'drinking_habit' => $habit,
                    'smoking_habit' => $habit,
                    'physical_status' => $physicalStatus,
                    'weight' => $user->lifestyleDetails->weight,
                    'blood_group' => $bloodGroup,
                    'open_to_pet' => $user->lifestyleDetails->open_to_pet,
                    'own_house' => $user->lifestyleDetails->own_house,
                    'own_car' => $user->lifestyleDetails->own_car,
                    'language_speak' => $languageSpeak,
                    'hiv' => $user->lifestyleDetails->hiv,
                    'thalassemia' => $user->lifestyleDetails->thalassemia,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => 'false',
                    'message' => 'An error occurred while updating user lifestyle details.',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }
    public function updateContactDetails(Request $request)
    {
        try {
            $user = auth()->user();
            $fields = config('formFields.editContactDetails');
            $validationRules = [];

            foreach ($fields as $key => $field) {
                $validationRules[$field['name']] = $field['rules'];
            }

            $validateData = $request->validate($validationRules);
            $user->contactDetails->update($validateData);

            return response()->json([
                'success' => 'true',
                'message' => 'User Contact details updated successfully!',
                'user' => [
                    'alternate_mobile' => $user->contactDetails->alternate_mobile,
                    'alternate_owned_by' => $user->contactDetails->alternate_owned_by,
                    'landline_number' => $user->contactDetails->landline_number,
                    'landline_owned_by' => $user->contactDetails->landline_owned_by,
                    'address' => $user->contactDetails->address,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => 'false',
                    'message' => 'An error occurred while updating user lifestyle details.',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }
    public function myPhotos(Request $request)
    {
        return view('frontend.users.photo');
    }

    public function uploadImages(Request $request)
    {
        $validateData = $request->validate([
            'photo1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = Auth::user();
        if (!$user) {
            return redirect('error', 'Please Login your account!');
        }
        // $image = Image::where('user_id', $user->id)->first();
        if ($request->hasFile('photo1')) {
            $file = $request->file('photo1');
            $fileName = rand(100, 1000) . time() . '.' . $file->getClientOriginalExtension();
            $filePath = public_path('storage/users/images/');
            $file->move($filePath, $fileName);
            Image::create([
                'user_id' => $user->id,
                'name' => $fileName,
            ]);

            return redirect()->back()->with('success', 'Display Picture has been uploaded successfully!');
        }
    }

    private function createImage($image, $fileName, $filePath)
    {
        if (is_null($image->display_picture)) {
            $image->update([
                'display_picture' => $fileName,
                'status' => 1,
            ]);
        }
    }

    private function updateImage($image, $fileName, $filePath)
    {
        if (!is_null($image->display_picture)) {
            $previousFilePath = $filePath . $image->display_picture;
            if (File::exists($previousFilePath)) {
                File::delete($previousFilePath);
            }
        }

        $image->update([
            'display_picture' => $fileName,
            'status' => 1,
        ]);
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
                        'status' => 1,
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
                        'status' => 0,
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
        })
            ->with([
                'payments' => function ($query) {
                    $query->orderBy('is_paid', 'desc')->orderBy('created_at', 'desc')->count();
                },
            ])
            ->get();

        // $freeUsersOrders = User::whereDoesntHave('payments', function ($query) {
        //     $query->where('is_paid', 1);
        // })->with(['payments' => function ($query) {
        //     $query->where('is_paid', 0);
        // }])->get();

        $freeUsersOrders = User::whereDoesntHave('payments', function ($query) {
            $query->where('is_paid', 1);
        })
            ->whereHas('payments', function ($query) {
                $query->where('is_paid', 0);
            })
            ->with([
                'payments' => function ($query) {
                    $query->where('is_paid', 0);
                },
            ])
            ->withCount('payments')
            ->get();
        // dd($freeUsersOrders);

        return view('admin.users.orders', compact('orders', 'profilePrefixs', 'freeUsersOrders'));
    }
}
