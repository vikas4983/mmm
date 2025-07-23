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
use App\Http\Controllers\CmsPageViewController;
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
use App\Http\Controllers\PayUMoneyController;
use App\Http\Controllers\RedisController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserActionController;
use App\Mail\TestingMail;
use App\Mail\UserEmail;
use App\Models\CarrierDetail;
use App\Models\City;
use App\Models\Email;
use App\Models\Payment;
use Aws\Middleware;
use Illuminate\Support\Facades\Cache;
use Laravel\Telescope\Http\Controllers\RedisController as ControllersRedisController;
use App\Services\OptionService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Artisan;

Route::get('refresh', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('event:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    Artisan::call('optimize');
    return 'refresh project';
});

Route::get('/send-test-mail', function () {
    Mail::raw('This is a test mail using server SMTP settings.', function ($message) {
        $message->to('mmmdata2022@gmail.com')
            ->subject('Test Mail from Server SMTP');
    });

    return 'Sent!';
});



Route::get('/test', function () {
    return view('modals.modal');
});
Route::get('/email', function (Request $request) {
    $user = auth()->user();
    Mail::to($user->email)->queue(new TestingMail($user));

    return "Email sent";
});



Route::middleware('checkRegistrationStep')->group(function () {
    Route::get('login', function () {
        if (session()->get('login') === 'yes') {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    })->name('login');
    Route::get('/', function () {
        $user = Auth::user();
        if (!$user) {
            return view('index');
        } else {
            return redirect()->route('dashboard');
        }
        return view('index');
    });
});
Route::post('logout', function () {
    session()->flush();
    return view('index');
})->name('logout');

Route::get('flush', function () {
    session()->flush();
    return view('index');
});

Route::get('/refresh-cache', function () {
    $optionService = new OptionService();
    $optionService->getOptions();
    return 'Cache repopulated!';
});

// User Registration 
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
// After Login
Route::get('/get-caste/{religionId}', [AjaxRequestController::class, 'getCaste']);
Route::get('/get-state/{countryId}', [AjaxRequestController::class, 'getState']);
Route::get('/get-city/{stateId}', [AjaxRequestController::class, 'getCity']);
Route::get('/get-occupation/{employeeId}', [AjaxRequestController::class, 'getOccupation']);
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'authUser', 'mobileNumberUpdated', 'checkRegistrationStep'])->group(function () {
    Route::get('/get-view', [DemoController::class, 'getView']);
    Route::get('signUp', [AjaxRequestController::class, 'signUp'])->name('sign.up');
    Route::post('/get-caste', [AjaxRequestController::class, 'getCastes']);
    Route::post('get-state', [AjaxRequestController::class, 'getStates']);
    Route::post('get-city', [AjaxRequestController::class, 'getCities']);
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', UserController::class)->middleware('mobileNumberUpdated');
    Route::post('users/userUpdate/{id}', [UserController::class, 'userUpdate'])->name('userUpdate');
    Route::get('my-profile', [UserController::class, 'myProfile'])->name('my.profile');
    Route::get('plan', [UserController::class, 'plan'])->name('plan');
    Route::get('active-plan', [UserController::class, 'activePlan'])->name('active.plan');
    Route::patch('mobile-update', [UserController::class, 'mobileUpdate'])->name('mobile.update');
    Route::post('request-otp', [UserController::class, 'requestOtpForMobileChange'])->name('request.otp');
    Route::get('mobile-verification', [UserController::class, 'showMobileVerificationPage'])->name('mobile.verification');

    Route::post('request-otp-again', [UserController::class, 'requestOtpForMobileChangeAgain'])->name('request.otp.again');
    //Update User Profile
    Route::view('frontend.settings.changePassword', 'frontend.settings.changePassword')->name('changePassword');
    Route::post('changePassword', [MemberController::class, 'changePassword']);
    Route::view('frontend.users.myProfile', 'frontend.users.myProfile')->name('myProfile');
    Route::patch('profile-update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::patch('account-details-update', [UserController::class, 'updateAccountDetail'])->name('account.details.update');
    Route::patch('about-me-update', [UserController::class, 'updateAboutMe'])->name('about.me.update');
    Route::patch('education-details', [UserController::class, 'educationDetail'])->name('education.details');
    Route::patch('occupation-details', [UserController::class, 'occupationDetail'])->name('occupation.details');
    Route::patch('family-details', [UserController::class, 'familyDetail'])->name('family.details');
    Route::patch('basic-details-update', [UserController::class, 'updateBasicDetails'])->name('update.basic.details');
    Route::patch('horoscope-details-update', [UserController::class, 'updateHoroscopeDetails'])->name('update.horoscope.details');
    Route::patch('carrier-details-update', [UserController::class, 'updateCarrierDetails'])->name('update.carrier.details');
    Route::patch('user-family-details-update', [UserController::class, 'updateUserFamilyDetails'])->name('update.user.family.details');
    Route::patch('user-lifestyle-details-update', [UserController::class, 'updateLifestyleDetails'])->name('update.lifestyle.details');
    Route::patch('user-contact-details-update', [UserController::class, 'updateContactDetails'])->name('update.contact.details');
    Route::get('my-photos', [UserController::class, 'myPhotos'])->name('my.photos');
    Route::post('upload-image', [UserController::class, 'uploadImages'])->name('upload.image');
    Route::post('add-image', [ImageController::class, 'addImage'])->name('add.image');
    Route::post('dp-image', [ImageController::class, 'dpImage'])->name('dp.image');
    Route::post('change-profile-image', [ImageController::class, 'changeProfileImage'])->name('change.profile.image');
    Route::post('change-image', [ImageController::class, 'changeImage'])->name('change.image');
    Route::post('delete-image', [ImageController::class, 'deleteImage'])->name('delete.image');
    //Search
    Route::get('search', [SearchController::class, 'search'])->name('search');
    Route::post('search-result', [SearchController::class, 'searchById'])->name('search.by.id');
    Route::get('quick-search-result', [SearchController::class, 'quickSearch'])->name('quick.search');
    Route::get('basic-search-result', [SearchController::class, 'basicSearch'])->name('basic.search');
    Route::get('advance-search-result', [SearchController::class, 'advanceSearch'])->name('advance.search');
    Route::post('sidebar-filter', [SearchController::class, 'sidebarFilter'])->name('sidebar.filter');
    Route::post('sidebar-maritalStatus-filter', [SearchController::class, 'maritalStatusFilter'])->name('sidebar.maritalStatus.filter');

    // Show User in new page
    Route::get('profile/{uuid}', [UserController::class, 'showProfile'])->name('profile');
    // Send Interst,Message,Block and View Contact
    Route::post('send-interest', [UserActionController::class, 'sendInterest'])->name('send.interest');
    Route::post('cancel-interest', [UserActionController::class, 'cancelInterest'])->name('cancel.interest');
    Route::post('send-message', [UserActionController::class, 'sendMessage'])->name('send.message');
    Route::post('reply-message', [UserActionController::class, 'replyMessage'])->name('reply.message');
    Route::post('block-user', [UserActionController::class, 'blockUser'])->name('block.user');
    Route::post('unblock-user', [UserActionController::class, 'unBlockUser'])->name('unblock-user');
    Route::post('view-contact', [UserActionController::class, 'viewContact'])->name('view.contact');
    Route::post('add-to-shortlist', [UserActionController::class, 'shortlist'])->name('add-to-shortlist');
    Route::post('remove-to-shortlist', [UserActionController::class, 'shortlistedUser'])->name('remove.to.shortlist');
    Route::get('my-shortlist', [UserActionController::class, 'myShortlist'])->name('my.shortlist');
    Route::get('shortlisted-by-other', [UserActionController::class, 'shortlistedByOther'])->name('shortlisted.by.other');
    Route::get('my-interest', [UserActionController::class, 'interest'])->name('my.interest');
    Route::get('interest-sent-by-other', [UserActionController::class, 'SentByOther'])->name('interest.sent.by.other');
    Route::post('interest-accept-by-me', [UserActionController::class, 'acceptByMe'])->name('interest.accept.by.me');
    Route::get('interest-accepted-by-me', [UserActionController::class, 'acceptByMeList'])->name('interest.accepted.by.me');
    Route::get('interest-accept-by-other', [UserActionController::class, 'acceptByOther'])->name('interest.accept.by.other');
    Route::post('interest-decline-by-me', [UserActionController::class, 'declineByMe'])->name('interest.decline.by.me');
    Route::post('cancel-decline-by-me', [UserActionController::class,  'cancelDeclineByMe'])->name('cancel.decline.by.me');
    Route::post('cancel-friend', [UserActionController::class,  'cancelFriend'])->name('cancel.friend');
    Route::get('interest-declined-by-me', [UserActionController::class, 'declineByList'])->name('interest.declined.by.me');
    Route::get('interest-declined-by-other', [UserActionController::class, 'declineByOtherList'])->name('interest.declined.by.other');
    Route::post('declined', [UserActionController::class, 'declined'])->name('declined');
    Route::get('access-control', [UserActionController::class, 'accessControl'])->name('access.control');
    Route::get('block-by-me', [UserActionController::class, 'blockByMe'])->name('block.by.me');
    Route::get('block-by-other', [UserActionController::class, 'blockByOther'])->name('block.by.other');
    Route::get('view-contact-by-me', [UserActionController::class, 'viewContactByMe'])->name('view.contact.by.me');
    Route::get('view-contact-by-other', [UserActionController::class, 'viewContactByOther'])->name('view.contact.by.other');
    Route::get('view-profile', [UserActionController::class, 'viewProfile'])->name('view.profile');
    Route::get('recent-join', [UserActionController::class, 'recentJoinProfile'])->name('recent.join');
    Route::get('view-profile-by-other', [UserActionController::class, 'viewProfileByOther'])->name('view.profile.by.other');
    Route::get('my-message', [UserActionController::class, 'message'])->name('message');
    // Setting
    Route::get('setting', [UserActionController::class, 'privacySetting'])->name('setting');
    Route::get('setting-name', [UserActionController::class, 'nameSetting'])->name('setting.name');
    Route::get('setting-image', [UserActionController::class, 'imageSetting'])->name('setting.image');
    Route::get('setting-horoscope', [UserActionController::class, 'horoscopeSetting'])->name('setting.horoscope');
    Route::get('setting-mobile-number', [UserActionController::class, 'mobileNumberSetting'])->name('setting.mobile.number');
    // Setting Update
    Route::Patch('setting-name-update', [UserActionController::class, 'nameUpdate'])->name('settings.name.update');
    Route::Patch('setting-image-update', [UserActionController::class, 'imageUpdate'])->name('settings.image.update');
    Route::Patch('setting-horoscope-update', [UserActionController::class, 'horoscopeUpdate'])->name('settings.horoscope.update');
    Route::Patch('setting-mobile-number-update', [UserActionController::class, 'mobileNumberUpdate'])->name('settings.mobile.number.update');
    // PayuMoney
    Route::post('order', [PayUMoneyController::class, 'order'])->name('order');
    Route::any('success', [PayUMoneyController::class, 'success'])->name('success');
    Route::any('failure', [PayUMoneyController::class, 'failure'])->name('failure');
    // RazorPay
    // Route::post('payment', [RazorpayPaymentController::class, 'index'])->name('payment');
    // Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

});
Route::post('verify-mobile-otp', [UserController::class, 'verifyOtpForMobile'])->name('verify.mobile.otp');

Route::resource('members', MemberController::class)->middleware('checkRegistrationStep');
Route::get('verification', [MemberOtpController::class, 'verification'])->name('verification');
Route::post('otp-varify', [MemberController::class, 'otpVarify'])->name('otp.varify');
Route::post('otp-again', [MemberController::class, 'otpAgain'])->name('otp.again');

Route::middleware('checkRegistrationStep')->group(function () {
    Route::post('registration', [MemberController::class, 'store'])->name('registration');
    Route::get('basic-details', [BasicDetailController::class, 'index'])->name('basic.detail');
    // Forgot Password
    Route::get('user-forgot-password', [MemberOtpController::class, 'userForgotPassword'])->name('user.forgot.password');
    Route::get('change-password-form', [MemberOtpController::class, 'changePasswordForm'])->name('change.password.form');
    Route::post('otp-validate', [MemberOtpController::class, 'otpValidate'])->name('otp.validate');
    // OTP Login
    Route::get('login-with-otp', [MemberOtpController::class, 'loginWithOtp'])->name('login.with.otp');
    Route::get('otp-verification', [MemberOtpController::class, 'otpVerification'])->name('otp-verification');
    Route::post('login-otp-validate', [MemberOtpController::class, 'loginOtpValidate'])->name('login.otp.validate');
    Route::post('otp-resend', [MemberOtpController::class, 'otpResend'])->name('otp.resend');
    // Routes without middleware
    Route::post('update-password', [MemberController::class, 'updatePassword'])->name('update.password');
    Route::post('login-otp', [MemberOtpController::class, 'loginOtp'])->name('login.otp');
});

//Settings
Route::resource('logos', LogoFaviconController::class);
Route::resource('favicons', FaviconController::class);
Route::resource('emailTemplates', EmailTemplateController::class);
Route::resource('menus', MenuController::class);


//Redis
Route::get('test-redis', [RedisController::class, 'testRedis'])->name('test.redis');

Route::get('clear-cache', function () {
    $optionKeys = ['profileFors', 'heights', 'motherTongues', 'religions', 'castes', 'maritalStatuses', 'rashies', 'countries', 'states', 'cities', 'educations', 'employees', 'occupations', 'incomes', 'fatherOccupations', 'motherOccupations', 'bodyTypes', 'complextions', 'bloodGroups', 'habits', 'physicalStatuses', 'hobbies', 'interests', 'musics', 'dresses', 'movies', 'sports', 'familyTypes', 'familyValues', 'familyStatus', 'relationships', 'dietaryHabits', 'languageSpeaks'];
    foreach ($optionKeys as $key) {
        Cache::forget($key);
    }
    Cache::flush();
    return view('dashboard');
});




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

Route::prefix('admin')
    ->middleware(['auth:admin'])
    ->group(function () {
        Route::get('/api-tokens', [AdminApiTokenController::class, 'index']);
        // Other admin routes...
    });
Route::prefix('admin')
    ->middleware(['admin'])
    ->group(function () {
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

        Route::resource('profileids', ProfileIdController::class);
        Route::resource('emailSettings', EmailSettingController::class);
        Route::resource('siteSettings', SiteSettingController::class);
        Route::resource('siteConfigs', SiteConfigController::class);
        Route::resource('approvals', ApprovalController::class);
        Route::resource('successStories', SuccessStoryController::class);
        //  Route::resource('users', UserController::class);
        Route::resource('payments', PaymentController::class);
        Route::resource('spotelights', SpoteLightController::class);
        Route::get('user-orders', [UserController::class, 'paidusersorders']);
        Route::get('all-user', [UserController::class, 'getUser'])->name('all.user');
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
        // Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index'])->name('payment');
        // Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
    });

// Route::post('logout', function () {
//     Auth::logout();
//     return view('myprofile.login');
// });
Route::resource('cmsPages', CmsPageController::class);
Route::get('create', [AdminController::class, 'create']);
Route::get('profile', [AdminController::class, 'twoFactor']);
route::middleware('auth')->group(function () {});
// Route::get('home', function () {
//     return view('index');
// });

Route::prefix('admin')->group(function () {
    // Admin Auth
    Route::middleware(['admin'])->group(function () {});
});

Route::get('/mail', [EmailController::class, 'sendWelcomeEmail']);
Route::get('{slug}', [CmsPageViewController::class, 'show'])->name('contact');
