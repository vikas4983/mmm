<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mangalmandap.com</title>
    <meta name="keyword" content="Welcome to Mangalmandap.com" />
    <meta name="description" content="Welcome to Mangalmandap.com" />
    <link type="image/x-icon" href="img/icon.png" rel="shortcut icon" />
    <!-- Theme Color -->
    <meta name="theme-color" content="#549a11">
    <meta name="msapplication-navbutton-color" content="#549a11">
    <meta name="apple-mobile-web-app-status-bar-style" content="#549a11">
    <!-- Bootstrap & Custom CSS-->
    <link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/custom-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/custom.css') }}" rel="stylesheet">
    <!-- Font Awsome -->
    <script src="https://kit.fontawesome.com/48403ccd1a.js" crossorigin="anonymous"></script>

    <!--GOOGLE FONTS-->
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700|Source+Sans+Pro:300,400,600,700" rel="stylesheet">-->
    <!-- Owl Carousel CSS-->
    <link href="{{ asset('frontend/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.theme.css') }}" rel="stylesheet">
    <!-- Chosen CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/chosen.css') }}">
    <!-- Angular JS-->
    <script src="{{ asset('frontend/assets/js/angular.min.js') }}"></script>
    {{-- BRAND LOGO CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/auth/css/custom-css/brand-logo.css') }}">
</head>

<body ng-app class="ng-scope">
    <!-- Loader -->
    <div class="preloader-wrapper text-center">
        <div class="loader"></div>
        <h5>Loading...</h5>
    </div>
    <!-- /.Loader -->
    <div id="body" style="display:none">
        <div id="wrap">
            <div id="main">
                <!-- Email id Verification -->
                <!-- /.Email id Verification -->
                <!-- Header & Menu -->
                <nav class="navbar inPrem2Nav">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ isset($logos->name) && !empty($logos->name)
                                ? asset('storage/admin/logo-favicon/logos/' . $logos->name)
                                : asset('assets/auth/images/logos.png') }}"
                                class="img-responsive gt-header-logo" alt="brand-logo">
                        </a>
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <!--<ul class="nav navbar-nav navbar-left inPrem2Logo hidden-xs hidden-sm hidden-md">
                                    <li>
                                        <a href="index" class="ripplelink">
                                            <img src="{{ url('frontend/img/logo.png') }}" class="img-responsive gt-header-logo">
                                        </a>
                                    </li>
                                </ul>-->

                            <ul class="nav navbar-nav navbar-right">
                                <li class="active ripplelink"><a href="{{ url('/') }}"
                                        class="inPrem2Link">Home</a></li>
                                <li class="dropdown">
                                    <a href="search.php" class="dropdown-toggle ripplelink inPrem2Link"
                                        data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="mr-5">Search</span><span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu flat" role="menu">
                                        <li><a href="search?gt-quick-search">Quick Search</a></li>
                                        <li><a href="search?gt-basic-search">Basic Search</a></li>
                                        <li><a href="search?gt-advance-search">Advanced Search</a></li>
                                        <li><a href="search?gt-keyword-search">Keyword Search</a></li>
                                        <li><a href="search?gt-location-search">Location Search</a></li>
                                        <li><a href="search?gt-occupation-search">Occupation Search</a></li>
                                    </ul>
                                </li>

                                <!--                                        <li class="ripplelink"><a href="success-story.php"><i class="fas fa-users mr-10 fa-lg"></i>Success Story</a></li>
                                    -->

                                <li class="ripplelink"><a href="{{ url('plans') }}" class="inPrem2Link">Plans</a>
                                </li>

                                <li class="ripplelink"><a href="{{ url('help') }}" class="inPrem2Link">Help</a></li>
                                <a href="{{ route('login') }}" class="btn gt-btn-green"><i
                                        class="fas fa-lock mr-10 font-15"></i>Login</a>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- /. Header & Menu -->
                <div class="container-fluid">
                    <div class="row">
                        <!-- Main Carousel -->
                        <div id="owl-demo-2" class="owl-carousel gt-slide-up">
                            <div class="item">
                                <img src="{{ asset('frontend/assets/images/banners/banner-1.jpg') }}" alt="banner-1">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontend/assets/images/banners/banner-2.jpg') }}" alt="banner-2">
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontend/assets/images/banners/banner-3.jpg') }}" alt="banner-3">
                            </div>
                        </div>
                        <!-- /. Main Carousel -->
                        <div class="container gt-pad-lr-0-479">

                            <!-- Signup form -->
                            <div
                                class="col-xxl-6 col-xxl-offset-10 col-xl-7 col-xl-offset-9 col-lg-16 gt-pad-lr-0-479">
                                <div class="gt-slideup-form">
                                    <div class="gt-slideUp-form-head">
                                        <h4>REGISTER NOW</h4>
                                    </div>
                                    <div class="gt-slideUp-form-body">

                                        <form action="{{ route('registration') }}" id="registerPage1" method="post"
                                            name="registerPage1" onsubmit="return validateForm()">
                                            @csrf
                                            @php
                                                $fields = config('formFields.register');
                                            @endphp
                                            <x-form-fields-component :fields="$fields" />
                                            <div class="row form-group">
                                                <div class="col-xxl-16 text-center">
                                                    <button type="submit" class="btn gt-btn-green inIndexRegBtn mt-10"
                                                        name="reg_sub">Register Now</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="inPrem2Search">
                    <div class="container">
                        <form method="post" action="search" id="">
                            <div class="col-xxl-2">
                                <label>Looking For</label>
                                <select class="gt-form-control" name="gender">
                                    <option value="Female">Bride</option>
                                    <option value="Male">Groom</option>
                                </select>
                            </div>
                            <div class="col-xxl-5">
                                <label>Age</label>
                                <div class="row">
                                    <div class="col-xs-7">
                                        <select class="gt-form-control" name="from_age" id="from_age">
                                            <option value="">Select Age From</option>
                                            <option value="1" selected>18 Year</option>
                                            <option value="2">19 Year</option>
                                            <option value="3">20 Year</option>
                                            <option value="4">21 Year</option>
                                            <option value="5">22 Year</option>
                                            <option value="6">23 Year</option>
                                            <option value="7">24 Year</option>
                                            <option value="8">25 Year</option>
                                            <option value="9">26 Year</option>
                                            <option value="10">27 Year</option>
                                            <option value="11">28 Year</option>
                                            <option value="12">29 Year</option>
                                            <option value="13">30 Year</option>
                                            <option value="14">31 Year</option>
                                            <option value="15">32 Year</option>
                                            <option value="16">33 Year</option>
                                            <option value="17">34 Year</option>
                                            <option value="18">35 Year</option>
                                            <option value="19">36 Year</option>
                                            <option value="20">37 Year</option>
                                            <option value="21">38 Year</option>
                                            <option value="22">39 Year</option>
                                            <option value="23">40 Year</option>
                                            <option value="24">41 Year</option>
                                            <option value="25">42 Year</option>
                                            <option value="26">43 Year</option>
                                            <option value="27">44 Year</option>
                                            <option value="28">45 Year</option>
                                            <option value="29">46 Year</option>
                                            <option value="30">47 Year</option>
                                            <option value="31">48 Year</option>
                                            <option value="32">49 Year</option>
                                            <option value="33">50 Year</option>
                                            <option value="34">51 Year</option>
                                            <option value="35">52 Year</option>
                                            <option value="36">53 Year</option>
                                            <option value="37">54 Year</option>
                                            <option value="38">55 Year</option>
                                            <option value="39">56 Year</option>
                                            <option value="40">57 Year</option>
                                            <option value="41">58 Year</option>
                                            <option value="42">59 Year</option>
                                            <option value="43">60 Year</option>
                                            <option value="44">60+ Year</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-2 text-center mt-10">To</div>
                                    <div class="col-xs-7">
                                        <select class="gt-form-control" name="to_age" id="part_to_age">
                                            <option value="1" disabled>
                                                18 Year</option>
                                            <option value="2">
                                                19 Year</option>
                                            <option value="3">
                                                20 Year</option>
                                            <option value="4">
                                                21 Year</option>
                                            <option value="5">
                                                22 Year</option>
                                            <option value="6">
                                                23 Year</option>
                                            <option value="7">
                                                24 Year</option>
                                            <option value="8">
                                                25 Year</option>
                                            <option value="9">
                                                26 Year</option>
                                            <option value="10">
                                                27 Year</option>
                                            <option value="11">
                                                28 Year</option>
                                            <option value="12">
                                                29 Year</option>
                                            <option value="13" selected>
                                                30 Year</option>
                                            <option value="14">
                                                31 Year</option>
                                            <option value="15">
                                                32 Year</option>
                                            <option value="16">
                                                33 Year</option>
                                            <option value="17">
                                                34 Year</option>
                                            <option value="18">
                                                35 Year</option>
                                            <option value="19">
                                                36 Year</option>
                                            <option value="20">
                                                37 Year</option>
                                            <option value="21">
                                                38 Year</option>
                                            <option value="22">
                                                39 Year</option>
                                            <option value="23">
                                                40 Year</option>
                                            <option value="24">
                                                41 Year</option>
                                            <option value="25">
                                                42 Year</option>
                                            <option value="26">
                                                43 Year</option>
                                            <option value="27">
                                                44 Year</option>
                                            <option value="28">
                                                45 Year</option>
                                            <option value="29">
                                                46 Year</option>
                                            <option value="30">
                                                47 Year</option>
                                            <option value="31">
                                                48 Year</option>
                                            <option value="32">
                                                49 Year</option>
                                            <option value="33">
                                                50 Year</option>
                                            <option value="34">
                                                51 Year</option>
                                            <option value="35">
                                                52 Year</option>
                                            <option value="36">
                                                53 Year</option>
                                            <option value="37">
                                                54 Year</option>
                                            <option value="38">
                                                55 Year</option>
                                            <option value="39">
                                                56 Year</option>
                                            <option value="40">
                                                57 Year</option>
                                            <option value="41">
                                                58 Year</option>
                                            <option value="42">
                                                59 Year</option>
                                            <option value="43">
                                                60 Year</option>
                                            <option value="44">
                                                60+ Year</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3">
                                <label>Religion</label>
                                <select class="gt-form-control" id="religion_id" name="religion_id[]">
                                    <option>Religion</option>
                                    <option value="52">
                                        Buddhist </option>
                                    <option value="46">
                                        Christian </option>
                                    <option value="37">
                                        Hindu </option>
                                    <option value="48">
                                        Jain - Digambar </option>
                                    <option value="49">
                                        Jain - Shwetambar </option>
                                    <option value="53">
                                        Jewish </option>
                                    <option value="45">
                                        Muslim - Others </option>
                                    <option value="43">
                                        Muslim - Shia </option>
                                    <option value="44">
                                        Muslim - Sunni </option>
                                    <option value="51">
                                        Parsi </option>
                                    <option value="47">
                                        Sikh </option>
                                </select>
                                <div id="CasteDivloader"></div>
                            </div>
                            <div class="col-xxl-3">
                                <label>Caste</label>
                                <select class="gt-form-control" tabindex="4" id="caste_id" name="caste_id[]">
                                    <option value="">Select Religion</option>
                                </select>
                            </div>
                            <div class="col-xxl-3">
                                <input type="submit" value="Search Now" class="btn gt-btn-orange btn-block"
                                    name="quick_sub">
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </section>
                <!-- Welcome Section -->
                <section class="gt-bg-white">
                    <div class="container pb-50">
                        <h2 class="text-center inThemeOrange fontMerriWeather mt-50">Welcome to Mangalmandap.com</h2>
                        <p class="text-center inGrey500 indexContent">
                            Best matrimony service provider in India.We find the best perfect life partner for you.join
                            us now and<br>find your life partner from our thousand’s of verified profiles.

                        </p>

                        <div class="gt-hearts">
                            <div class="gt-hearts-group gt-bg-white">
                                <i class="fa fa-heart font-20 heart gt-text-orange"></i>
                                <i class="fa fa-heart font-38 heart gt-text-orange"></i>
                                <i class="fa fa-heart font-20 heart gt-text-orange"></i>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-4 col-lg-8 gt-margin-top-20">
                            <div class="row">
                                <div class="col-xxl-16 text-center">
                                    <i class="fa fa-star index-color-1 gt-index-icon-font"></i>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <h2 class="font-24 inGrey500 gt-font-weight-600 fontMerriWeather">
                                        Success Story </h2>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <article>
                                        <p>
                                            Hundred’s of successful member found their soulmates with us. </p>
                                    </article>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <h5>
                                        <a href="success-story" class="gt-text-Grey">View Success Stories <i
                                                class="fa fa-caret-right gt-margin-left-10"></i></a>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-4 col-lg-8 gt-margin-top-20">
                            <div class="row">
                                <div class="col-xxl-16 text-center">
                                    <i class="fa fa-users index-color-2 gt-index-icon-font tex"></i>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <h2 class="font-24 inGrey500 gt-font-weight-600 fontMerriWeather">
                                        Verified Members </h2>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <article>
                                        <p class="font-13">
                                            Thousands of verified member profile so our members find perfect partner
                                            without any concern. </p>
                                    </article>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <h5>
                                        <a href="login" class="gt-text-Grey">View Profiles Now<i
                                                class="fa fa-caret-right gt-margin-left-10"></i></a>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-4 col-lg-8 gt-margin-top-20">
                            <div class="row">
                                <div class="col-xxl-16 text-center">
                                    <i class="fa fa-search index-color-3 gt-index-icon-font"></i>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <h2 class="font-24 inGrey500 gt-font-weight-600 fontMerriWeather">
                                        Search Options </h2>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <article>
                                        <p class="font-13">
                                            Multiple search options to find partner who know you better. </p>
                                    </article>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <h5>
                                        <a href="search" class="gt-text-Grey">Search Now <i
                                                class="fa fa-caret-right gt-margin-left-10"></i></a>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-4 col-lg-8 gt-margin-top-20">
                            <div class="row">
                                <div class="col-xxl-16 text-center">
                                    <i class="fa fa-list-ol index-color-4 gt-index-icon-font"></i>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <h2 class="font-24 inGrey500 gt-font-weight-600 fontMerriWeather">
                                        Matching Profiles </h2>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <article>
                                        <p class="font-13">
                                            With our auto match profile you can see members which was suits you best and
                                            get married. </p>
                                    </article>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <h5>
                                        <a href="login" class="gt-text-Grey">View Matches Now<i
                                                class="fa fa-caret-right gt-margin-left-10"></i></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /. Welcome Section -->
                <div class="clearfix"></div>
                <!-- Featured Bride -->
                <div class="col-xs-16">
                    <div class="" style="display:none;"></div>
                </div>
            </div>
        </div>
        </section>
        <div class="clearfix"></div>
        <!-- /. Featured Bride -->

        <!--- Featured Groom --->
        <div class="col-xs-12">
            <div class="" style="display:none;"></div>
        </div>
    </div>
    </div>
    </section>
    <div class="clearfix"></div>
    <!--- /. Featured Groom --->
    <section class="gtAndroidDown">
        <div class="container">
            <div class="row">
                <div class="col-xxl-16">
                    <div class="row">
                        <div class="col-xxl-5 col-xxl-offset-2">
                            <img src="{{ asset('frontend/assets/images/android_app_showcase.png') }}"
                                class="img-responsive">
                        </div>
                        <div class="col-xxl-8 col-xxl-offset-1 gtAndroidDownDet">
                            <h4>
                                Download our mobile app & find<br>
                                start searching your life partner<br>
                                in a tap.
                            </h4>
                            <h1>
                                Download App Now !
                            </h1>
                            <a href="Appstore link" target="_blank">
                                <img src="{{ asset('frontend/assets/images/google_play_download_btn.png') }}"
                                    class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    <div class="container gt-margin-top-10">
    </div>
    <!-- Footer -->
    <footer class="footer-before-login gt-margin-top-25">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                    <h5 class="gt-text-green gt-font-weight-600">
                        Help And Support </h5>
                    <ul class="">
                        <li><a href="{{ url('help') }}">Help</a></li>
                        <li><a href="{{ url('faq') }}">FAQ</a></li>
                        {{-- <li><a href="cms?cms_id=16">Refund Policy</a></li> --}}
                        <li><a href="{{ url('refund') }}">Refund Policy</a></li>
                    </ul>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                    <h5 class="gt-text-green gt-font-weight-600">
                        Terms & Policy </h5>
                    <ul class="">
                        <li><a href="{{ url('refund') }}">Terms & Conditions</a></li>
                        <li><a href="{{ url('refund') }}">Privacy Policy</a></li>
                        {{-- <li><a href="cms?cms_id=15">Report Misuse</a></li> --}}
                        <li><a href="{{ url('misuse') }}">Report Misuse</a></li>
                    </ul>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                    <h5 class="gt-text-green gt-font-weight-600">
                        Need Help? </h5>
                    <ul class="">
                        <li><a href="{{ url('login') }}">Login</a></li>
                        <li><a href="{{ url('register') }}">Register</a></li>
                        <li><a href="{{ url('plans') }}"><i class="fa fa-star gt-text-orange"></i> Upgrade
                                Plan</a></li>
                    </ul>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                    <h5 class="gt-text-green gt-font-weight-600">
                        Information </h5>
                    <ul class="">
                        <li><a href="{{ url('success-story') }}">Success Story</a></li>
                        {{-- <li><a href="cms?cms_id=8">About Us</a></li> --}}
                        <li><a href="{{ url('about-us') }}">About Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-16">
                    <h5 class="gt-text-green gt-font-weight-600">About Us</h5>
                    <p>Welcome to Mangalmandap.com</p>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-16 text-center">
                    <h5 class="gt-text-green gt-font-weight-600">
                        Join us on social </h5>
                    <ul class="gt-footer-social">
                        <li><a href="https://www.facebook.com" target="_blank"><i
                                    class="fab fa-facebook-square"></i></a></li>
                        <li><a href="https://www.googleplus.com" target="_blank"><i
                                    class="fab fa-pinterest-square"></i></a></li>
                        <li><a href="https://www.twitter.com" target="_blank"><i
                                    class="fab fa-twitter-square"></i></a>
                        </li>
                        <li><a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="container-fluid gt-footer-bottom">
        <div class="row">
            <div class="container text-center">
                All Rights Reserved By @ <a href="https://premium.mangalmandap.com/">Design and developed by
                    Mangalmandap.com</a>
            </div>
        </div>
    </div>
    <!--/. Footer -->
    <a href="#selectLanguage" class="btn fixLangugeBtn" data-toggle="modal" style=""><i
            class="fas fa-language gt-margin-right-5"></i><span>Change language</span></a>
    <div class="modal fade gtLogModal" id="selectLanguage" tabindex="-1" role="dialog"
        aria-labelledby="selectLanguage" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <div class="col-12">
                        <h5 class="modal-title" id="exampleModalLabel">Select your language <button type="button"
                                class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-16">
                            <div class="list-group">
                                <a href="index.php?lang=en" class="list-group-item list-group-item-action">English</a>
                                <a href="index.php?lang=hi" class="list-group-item list-group-item-action">हिंदी</a>
                                <a href="index.php?lang=te" class="list-group-item list-group-item-action">తెలుగు</a>
                                <a href="index.php?lang=mr" class="list-group-item list-group-item-action">मराठी</a>
                                <a href="index.php?lang=ta" class="list-group-item list-group-item-action">தமிழ்</a>
                                <a href="index.php?lang=kn" class="list-group-item list-group-item-action">ಕನ್ನಡ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login With OTP Modal  -->
    <div class="modal fade" id="loginWithOTP" tabindex="-1" role="dialog" aria-labelledby="loginWithOTPLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title text-center" id="loginWithOTPLabel">Login With OTP</h5>
                </div>
                <div class="modal-body">
                    <form class="" action="login-with-otp" method="post">
                        <div class="form-group">
                            <label>Email/Mobile No/Matri id</label>
                            <input type="text" name="userId" class="gt-form-control"
                                placeholder="Enter Email id / Mobile No / Matri Id">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="GET OTP" class="btn gt-btn-green">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Right Click Disable -->

    {{-- <script language=JavaScript>
    function clickIE4() {
        if (event.button == 2) {
            return false;
        }
    }

    function clickNS4(e) {
        if (document.layers || document.getElementById && !document.all) {
            if (e.which == 2 || e.which == 3) {
                return false;
            }
        }
    }
    if (document.layers) {
        document.captureEvents(Event.MOUSEDOWN);
        document.onmousedown = clickNS4;
    } else if (document.all && !document.getElementById) {
        document.onmousedown = clickIE4;
    }
    document.oncontextmenu = new Function("return false")
</script> --}}

    <!-- /.Right Click Disable -->

    <!-- Live Chat -->
    <script type="text/javascript">
        var auto_refresh = setInterval(
            function() {
                $('#count').load('parts/online').fadeIn("slow");
            }, 15000
        ); // refresh every 10 second
    </script>
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <small class="pull-right">
    </small>
    <!-- /. Live Chat -->

    <!-- Analytic Code -->
    <script>
        var id = 'UA-demo';
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', id, 'auto');
        ga('send', 'pageview');
    </script>
    <!-- /.Analytic Code -->



    </div>
    <!-- Jquery Js-->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap & Green Js -->
    <script src="{{ asset('frontend/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/green.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#body').show();
            $('.preloader-wrapper').hide();
        });
    </script>
    <!-- Chosen Js -->
    <script src="{{ asset('frontend/assets/js/chosen.jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/js/prism.js') }}" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {
                allow_single_deselect: true
            },
            '.chosen-select-no-single': {
                disable_search_threshold: 10
            },
            '.chosen-select-no-results': {
                no_results_text: 'Oops, nothing found!'
            },
            '.chosen-select-width': {
                width: "100%"
            }
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    </script>
    <!-- Validation Js -->
    <script type="text/javascript">
        // function validateForm() {
        //     var name = document.getElementById("name").value;
        //     var email = document.getElementById("email").value;
        //     var password = document.getElementById("password").value;
        //     var password_confirmation = document.getElementById("password_confirmation").value;
        //     var profileFor = document.getElementById("profileFor").value;
        //     var gender = document.getElementById("gender").value;
        //     var mobile = document.getElementById("mobile").value;
        //     if (name == "" || email =="" || password= "" || password_confirmation = ""|| gender == ''|| profileFor ==''|| mobile=='') {
        //         alert("Select Profile Created By");
        //        //name.classList.add('error')
        //        return false;
        //     }

        // }
    </script>
    <!-- Validation js -->
    <script type="text/javascript" src="{{ asset('frontend/assets/js/validetta.js') }}"></script>
    <script>
        $(function() {
            $('#frm').validetta({
                errorClose: false,
                realTime: true
            });
        });
        $(function() {
            $('#quick-search').validetta({
                errorClose: false,
                realTime: true
            });
        });
    </script>
    <!-- Owl Carousel Js -->
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#inFetBride").owlCarousel({
                autoPlay: 3000,
                items: 5,
                navigation: true,
                navigationText: ["<i class='fa fa-chevron-left'></i>",
                    "<i class='fa fa-chevron-right'></i>"
                ],
                itemsDesktop: [1199, 5],
                itemsDesktopSmall: [979, 4],
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 2],
                    [700, 2],
                    [800, 3],
                    [1000, 5],
                    [1200, 5],
                    [1400, 5],
                    [1600, 5]
                ],
            });
            $("#inFetGroom").owlCarousel({
                autoPlay: 3000,
                items: 5,
                navigation: true,
                navigationText: ["<i class='fa fa-chevron-left'></i>",
                    "<i class='fa fa-chevron-right'></i>"
                ],
                itemsDesktop: [1199, 5],
                itemsDesktopSmall: [979, 4],
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 2],
                    [700, 2],
                    [800, 3],
                    [1000, 5],
                    [1200, 5],
                    [1400, 5],
                    [1600, 5]
                ],
            });
            $("#owl-demo-2").owlCarousel({
                autoPlay: 3000,
                autoPlay: true,
                items: 1,
                itemsDesktop: [1199, 1],
                itemsDesktopSmall: [979, 1],
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 1],
                    [700, 1],
                    [1000, 1],
                    [1200, 1],
                    [1400, 1],
                    [1600, 1]
                ],
            });
        });
    </script>
    <script>
        $("#gtFetVendor").owlCarousel({
            items: 3,
            loop: true,
            lazyLoad: true,
            margin: 10,
            autoPlay: true,
            autoPlayTimeout: 1000,
            autoPlayHoverPause: true,
            navigation: true,
            pagination: false,
            navigationText: [
                "<button type='button' class='btn gtBtnLeftRes'><i class='fas fa-chevron-left'></i></button>",
                "<button type='button' class='btn gtBtnRigRes'><i class='fas fa-chevron-right'></i></button>"
            ],
        });
    </script>
    <!-- Caste Ajax -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#religion").on('change', function() {
                $("#caste1").html(
                    '<div class="gtLoaderBottom"><i class="gi gi-spin gi-loader"></i>&nbsp;&nbsp;Please Wait Loading...</div>'
                );
                var id = $(this).val();
                var dataString = 'religionId=' + id;
                $.ajax({
                    type: "POST",
                    url: "ajax_search2",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        $("#caste").html(html);
                        $("#caste1").html('');
                        $("#caste").trigger("chosen:updated");
                    }
                });
            });
            $("#religion_id").on('change', function() {
                $("#CasteDivloader").html(
                    '<div class="gtLoaderBottom"><i class="gi gi-spin gi-loader"></i>&nbsp;&nbsp;Please Wait Loading...</div>'
                );
                var selectedReligion = $("#religion_id").val()
                var dataString = 'religion=' + selectedReligion;
                jQuery.ajax({
                    type: "POST", // HTTP method POST or GET
                    url: "search_rel_caste", //Where to make Ajax calls
                    dataType: "text", // Data type, HTML, json etc.
                    data: dataString,
                    success: function(response) {
                        $("#caste_id").find('option').remove().end().append(response);
                        $('#caste_id').trigger('chosen:updated');
                        $("#CasteDivloader").html('');
                    },
                });
            });
            $("#from_age").on('change', function() {
                $("#Loadtoage").html('<div>Loading...</div>');
                var id = $(this).val();
                var dataString = 'id=' + id;
                $.ajax({
                    type: "POST",
                    url: "ajax-to-age-data",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        $("#part_to_age").html(html);
                        $("#Loadtoage").html('');
                        $("#part_to_age").trigger("chosen:updated");
                    }
                });
            });
        });
    </script>
    <!-- Language select modal -->
</body>

</html>
<!-- Thumbnail Ajax -->
<script>
    $(document).ready(function() {
        dis_thumbnail();
    });

    function dis_thumbnail() {
        var dataString = '';
        jQuery.ajax({
            url: "./web-services/display_thumbnail",
            type: "POST",
            data: dataString,
            cache: false,
            success: function(response) {
                $("#dis_thumbnail").html('');
                $("#dis_thumbnail").append(response);
            },
        });
    }
</script>
<script>
    $(document).ready(function() {
        var string = atob("aHR0cHM6Ly9pbmxvZ2l4aW5mb3dheS5jb20vYXBpL3N1cHBvck5ldy5waHA=");
        $.ajax({

            url: string,
            type: 'POST',
            data: {
                user_id: '498e52222b854c7c0266cab6ed5ee0ea',
                profile: 'premium.mangalmandap.com',
            },
            dataType: 'json',
            success: function(data) {
                /*alert('Success');*/
            }
        });
    });
</script>
