<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberOtpController;
use App\Http\Controllers\UserOtpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\countries\CityController;
use App\Http\Controllers\admin\countries\CountryController;
use App\Http\Controllers\admin\countries\StateController;
use App\Http\Controllers\admin\educations\EducationController;
use App\Http\Controllers\admin\educations\OccupationController;
use App\Http\Controllers\admin\employees\EmployeeController;
use App\Http\Controllers\admin\incomes\IncomeController;
use App\Http\Controllers\admin\religions\CasteController;
use App\Http\Controllers\admin\religions\ReligionController;
use App\Http\Controllers\admin_auth\AdminController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CmsPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PayUController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RazorpayPaymentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmailControllerController;
use App\Http\Controllers\EmailSettingController;
use App\Http\Controllers\FaviconController;
use App\Http\Controllers\LoginWithOTPController;
use App\Http\Controllers\LogoFaviconController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentGatewayController;
use App\Http\Controllers\ProfileIdController;
use App\Http\Controllers\SiteConfigController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\SpoteLightController;
use App\Http\Controllers\SuccessStoryController;
use App\Http\Controllers\TextPaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin_auth\MobileLoginController;
use App\Http\Controllers\AdminApiTokenController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AjaxRequestController;
use App\Http\Controllers\BasicDetailController;
use App\Http\Controllers\CarrierDetailController;
use App\Http\Controllers\ContactDetailController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\FamilyDetailController;
use App\Http\Controllers\HoroscopeDetailController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LifeStyleController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LikeDetailController;
use App\Http\Controllers\ModelCountController;
use App\Http\Controllers\RedisController;
use App\Models\CarrierDetail;
use App\Models\City;
use App\Models\Email;
use App\Models\Payment;
use Aws\Middleware;
use Laravel\Telescope\Http\Controllers\RedisController as ControllersRedisController;

// User Routes
Route::get('/', function () {
    if (session()->get('registration_step') === '2') {
        return redirect()->route('verification');
    }
    return view('index');
})->middleware('mobileNumberUpdated');
Route::get('login', function () {
    if (session()->get('registration_step') === '2') {
        return redirect()->route('verification');
    } else {
        // Clear the 'registration_step' session variable
        session()->forget('registration_step');
        return view('auth.login');
    }
})->name('login')->middleware(['checkRegistrationStep','mobileNumberUpdated']);;
Route::post('logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');



Route::get('/get-view', [DemoController::class, 'getView']);
Route::get('signUp', [AjaxRequestController::class, 'signUp'])->name('sign.up');
Route::get('/get-caste/{religionId}', [AjaxRequestController::class, 'getCaste']);
Route::get('/get-state/{countryId}', [AjaxRequestController::class, 'getState']);
Route::get('/get-city/{stateId}', [AjaxRequestController::class, 'getCity']);
Route::get('/get-occupation/{employeeId}', [AjaxRequestController::class, 'getOccupation']);

// Route::get('/localization/{locale}', function (string $locale) {
//     if (!in_array($locale, ['en', 'hi', 'fr'])) {
//         abort(400);
//     }

//     App::setLocale($locale);
//     Session::put('locale', $locale);
//     //Gets the translated message and displays it
//     echo trans('auth.msg');
//     // ...
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'authUser',
    

])->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('mobileNumberUpdated');
    Route::resource('users', UserController::class)->middleware('mobileNumberUpdated');
    Route::post('users/userUpdate/{id}', [UserController::class, 'userUpdate'])->name('userUpdate')->middleware('mobileNumberUpdated');
    Route::get('my-profile', [UserController::class, 'myProfile'])->name('my.profile')->middleware('mobileNumberUpdated');
    Route::patch('profile-update', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('mobileNumberUpdated');
    Route::patch('mobile-update', [UserController::class, 'mobileUpdate'])->name('mobile.update')->middleware('mobileNumberUpdated');
    Route::post('request-otp', [UserController::class, 'requestOtpForMobileChange'])->name('request.otp')->middleware('mobileNumberUpdated');
    Route::get('mobile-verification', [UserController::class, 'showMobileVerificationPage'])->name('mobile.verification');
    Route::post('verify-mobile-otp', [UserController::class, 'verifyOtpForMobile'])->name('verify.mobile.otp');
    Route::post('request-otp-again', [UserController::class, 'requestOtpForMobileChangeAgain'])->name('request.otp.again');
    
    Route::get('test', function(){
        return 'Y-m-d H:i:s';
    })->name('test');

    Route::prefix('frontend/registration')->group(function () {
        Route::resource('basicDetails', BasicDetailController::class)->middleware('checkRegistrationStep');
        Route::resource('horoscopes', HoroscopeDetailController::class)->middleware('checkRegistrationStep');
        Route::resource('carrierDetails', CarrierDetailController::class)->middleware('checkRegistrationStep');
        Route::resource('familyDetails', FamilyDetailController::class)->middleware('checkRegistrationStep');
        Route::resource('lifestyleDetails', LifeStyleController::class)->middleware('checkRegistrationStep');
        Route::resource('likeDetails', LikeDetailController::class)->middleware('checkRegistrationStep');
        Route::resource('contactDetails', ContactDetailController::class)->middleware('checkRegistrationStep');
        Route::resource('images', ImageController::class)->middleware('checkRegistrationStep');
    });
});
Route::resource('members', MemberController::class)->middleware('checkRegistrationStep');
Route::get('verification', [MemberOtpController::class, 'verification'])->name('verification')->middleware('checkRegistrationStep');
Route::post('otp-varify', [MemberController::class, 'otpVarify'])->name('otp.varify');
Route::post('otp-again', [MemberController::class, 'otpAgain'])->name('otp.again');

//User Registration
Route::post('registration', [MemberController::class, 'store'])->name('registration')->middleware('checkRegistrationStep');
Route::get('basic-details', [BasicDetailController::class, 'index'])->name('basic.detail');
Route::post('update-password', [MemberController::class, 'updatePassword'])->name('update.password');
// User Forgot Password
Route::get('user-forgot-password', [MemberOtpController::class, 'userForgotPassword'])->name('user.forgot.password');
Route::get('change-password-form', [MemberOtpController::class, 'changePasswordForm'])->name('change.password.form');
Route::post('otp-validate', [MemberOtpController::class, 'otpValidate'])->name('otp.validate');
//User Login System
Route::get('login-with-otp', [MemberOtpController::class, 'loginWithOtp'])->name('login.with.otp');
Route::get('otp-verification', [MemberOtpController::class, 'otpVerification'])->name('otp-verification');
Route::post('login-otp', [MemberOtpController::class, 'loginOtp'])->name('login.otp');
Route::post('login-otp-validate', [MemberOtpController::class, 'loginOtpValidate'])->name('login.otp.validate');
Route::post('otp-resend', [MemberOtpController::class, 'otpResend'])->name('otp.resend');
//Footer
Route::view('aboutUs', 'aboutUs');
Route::view('faq', 'faq');
Route::view('help', 'help');
Route::view('misuse', 'misuse');
Route::view('plans', 'plans');
Route::view('refund', 'refund');
Route::view('successStory', 'successStory');

//After Login
Route::view('frontend.settings.changePassword', 'frontend.settings.changePassword')->name('changePassword');
Route::post('changePassword', [MemberController::class, 'changePassword']);
Route::view('frontend.users.myProfile', 'frontend.users.myProfile')->name('myProfile');

//Settings
Route::resource('logos', LogoFaviconController::class);
Route::resource('favicons', FaviconController::class);
Route::resource('emailTemplates', EmailTemplateController::class);
Route::resource('menus', MenuController::class);
// User Update
//Route::post('userUpdate/{id}', [UserController::class, 'userUpdate']);

//Search
Route::view('frontend.search.quick', 'frontend.search.quick')->name('quickSearch');


//Redis
Route::get('test-redis', [RedisController::class, 'testRedis'])->name('test.redis');




















// Admin Routes
Route::post('admin-logout', function () {
    session()->flush();
    session()->regenerateToken();
    Auth::guard('admin')->logout();
    return view('admin-login');
});
Route::get('send-email', [EmailController::class, 'loginWithOTP']);

// Admin Login with email & Password
Route::middleware('admin-redirect')->group(function () {
    Route::view('admin-login', 'admin-login')->name('admin-login');
    Route::view('admin-create', 'admin-create')->name('admin-create');

    // Login With OTP
    Route::middleware(['CheckOTPSession'])->group(function () {
        Route::view('admin-login', 'admin-login');
    });
    Route::post('send-otp', [MobileLoginController::class, 'loginWithOTP']);
    Route::post('resend-otp', [MobileLoginController::class, 'resendOTP']);
    Route::get('verify-otp-form', [MobileLoginController::class, 'showForm']);
    Route::post('forgot-password', [MobileLoginController::class, 'forgetOTP']);
    // verify account
    Route::post('verify-account', [AdminController::class, 'verifyAccount']);
});
// Validate with Email & Password
Route::post('admin-validate', [AdminController::class, 'login']);

// Validate with Otp
Route::post('verify-otp', [MobileLoginController::class, 'verifyOtp']);
Route::post('verify-otp-forgot-password', [MobileLoginController::class, 'verifyOtpForgotPassword']);
Route::get('verify-otp-forgot-password', [MobileLoginController::class, 'showVerifyOtpForm']);
Route::post('admin-change-password', [MobileLoginController::class, 'changePassword']);

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/api-tokens', [AdminApiTokenController::class, 'index']);
    // Other admin routes...
});
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::post('logout', [AdminController::class, 'logout'])->name('admins.logout');
    Route::get('plan', [PlanController::class, 'plan']);
    Route::resource('admins', AdminController::class);
    Route::view('/banners', 'banners');
    Route::resource('countries', CountryController::class);
    Route::resource('states', StateController::class);
    Route::resource('cities', CityController::class);
    Route::resource('religions', ReligionController::class);
    Route::resource('castes', CasteController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('occupations', OccupationController::class);
    Route::resource('incomes', IncomeController::class);
    Route::resource('plans', PlanController::class);
    Route::resource('banners', BannerController::class);
    Route::get('dashboard', [DashboardController::class, 'dashboard']);
    Route::resource('cmsPages', CmsPageController::class);
    Route::resource('profileids', ProfileIdController::class);
    Route::resource('emailSettings', EmailSettingController::class);
    Route::resource('siteSettings', SiteSettingController::class);
    Route::resource('siteConfigs', SiteConfigController::class);
    Route::resource('approvals', ApprovalController::class);
    Route::resource('successStories', SuccessStoryController::class);
    // Route::resource('users', UserController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('spotelights', SpoteLightController::class);
    Route::get('user-orders', [UserController::class, 'paidusersorders']);
    Route::resource('paymentgateways', PaymentGatewayController::class);
    Route::resource('modelCounts', ModelCountController::class);
    Route::resource('adminMenus', AdminMenuController::class);
    // CMS Delete,Active,InActive  Route
    Route::post('cms-destroy', [CmsPageController::class, 'checkBoxDelete']);
    Route::post('cms-active', [CmsPageController::class, 'activeItem']);
    Route::post('cms-inActive', [CmsPageController::class, 'inActiveItem']);
    //  User Active InActive Delete Route
    // Route::post('admin-destroy', [UserController::class, 'checkBoxDelete']);
    // Route::post('admin-active', [UserController::class, 'activeItem']);
    // Route::post('admin-inActive', [UserController::class, 'inActiveItem']);

    //  Country Active InActive Delete Route
    Route::post('countries-destroy', [CountryController::class, 'checkBoxDelete']);
    Route::post('countries-active', [CountryController::class, 'activeItem']);
    Route::post('countries-inActive', [CountryController::class, 'inActiveItem']);
    //  State Active InActive Delete Route
    Route::post('states-destroy', [StateController::class, 'checkBoxDelete']);
    Route::post('states-active', [StateController::class, 'activeItem']);
    Route::post('states-inActive', [StateController::class, 'inActiveItem']);
    //  City Active InActive Delete Route
    Route::post('cities-destroy', [CityController::class, 'checkBoxDelete']);
    Route::post('cities-active', [CityController::class, 'activeItem']);
    Route::post('cities-inActive', [CityController::class, 'inActiveItem']);
    //  Religion Active InActive Delete Route
    Route::post('religions-destroy', [ReligionController::class, 'checkBoxDelete']);
    Route::post('religions-active', [ReligionController::class, 'activeItem']);
    Route::post('religions-inActive', [ReligionController::class, 'inActiveItem']);
    //  Caste Active InActive Delete Route
    Route::post('castes-destroy', [CasteController::class, 'checkBoxDelete']);
    Route::post('castes-active', [CasteController::class, 'activeItem']);
    Route::post('castes-inActive', [CasteController::class, 'inActiveItem']);
    //  Employee Active InActive Delete Route
    Route::post('employees-destroy', [EmployeeController::class, 'checkBoxDelete']);
    Route::post('employees-active', [EmployeeController::class, 'activeItem']);
    Route::post('employees-inActive', [EmployeeController::class, 'inActiveItem']);
    //  Occupation Active InActive Delete Route
    Route::post('occupations-destroy', [OccupationController::class, 'checkBoxDelete']);
    Route::post('occupations-active', [OccupationController::class, 'activeItem']);
    Route::post('occupations-inActive', [OccupationController::class, 'inActiveItem']);
    //  Education Active InActive Delete Route
    Route::post('educations-destroy', [EducationController::class, 'checkBoxDelete']);
    Route::post('educations-active', [EducationController::class, 'activeItem']);
    Route::post('educations-inActive', [EducationController::class, 'inActiveItem']);
    //  Income Active InActive Delete Route
    Route::post('incomes-destroy', [IncomeController::class, 'checkBoxDelete']);
    Route::post('incomes-active', [IncomeController::class, 'activeItem']);
    Route::post('incomes-inActive', [IncomeController::class, 'inActiveItem']);
    //  Plan Active InActive Delete Route
    Route::post('plans-destroy', [PlanController::class, 'checkBoxDelete']);
    Route::post('plans-active', [PlanController::class, 'activeItem']);
    Route::post('plans-inActive', [PlanController::class, 'inActiveItem']);
    //  Logo Active InActive Delete Route
    Route::post('logos-destroy', [LogoFaviconController::class, 'checkBoxDelete']);
    Route::post('logos-active', [LogoFaviconController::class, 'activeItem']);
    Route::post('logos-inActive', [LogoFaviconController::class, 'inActiveItem']);
    //  Favicon Active InActive Delete Route
    Route::post('favicons-destroy', [FaviconController::class, 'checkBoxDelete']);
    Route::post('favicons-active', [FaviconController::class, 'activeItem']);
    Route::post('favicons-inActive', [FaviconController::class, 'inActiveItem']);
    //  Banner Active InActive Delete Route
    Route::post('banners-destroy', [BannerController::class, 'checkBoxDelete']);
    Route::post('banners-active', [BannerController::class, 'activeItem']);
    Route::post('banners-inActive', [BannerController::class, 'inActiveItem']);
    //  Menu Active InActive Delete Route
    Route::post('menus-destroy', [MenuController::class, 'checkBoxDelete']);
    Route::post('menus-active', [MenuController::class, 'activeItem']);
    Route::post('menus-inActive', [MenuController::class, 'inActiveItem']);
    //  ProfileId Active InActive Delete Route
    Route::post('profileids-destroy', [MenuController::class, 'checkBoxDelete']);
    Route::post('profileids-active', [MenuController::class, 'activeItem']);
    Route::post('profileids-inActive', [MenuController::class, 'inActiveItem']);
    // RazorPay
    Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
    Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
});

// Route::post('logout', function () {
//     Auth::logout();
//     return view('myprofile.login');
// });
Route::get('create', [AdminController::class, 'create']);
Route::get('profile', [AdminController::class, 'twoFactor']);
route::middleware('auth')->group(function () {});
Route::get('home', function () {
    return view('index');
});

Route::prefix('admin')->group(function () {
    // Admin Auth
    Route::middleware(['admin'])->group(function () {});
});

Route::get('/mail', [EmailController::class, 'sendWelcomeEmail']);
