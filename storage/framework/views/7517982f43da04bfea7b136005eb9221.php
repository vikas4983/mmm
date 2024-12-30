<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="keyword" content="Welcome to Mangalmandap.com" />
    <meta name="description" content="Welcome to Mangalmandap.com" />
    <link type="image/x-icon" href="img/icon.png" rel="shortcut icon" />

    <!-- Theme Color -->
    <meta name="theme-color" content="#549a11">
    <meta name="msapplication-navbutton-color" content="#549a11">
    <meta name="apple-mobile-web-app-status-bar-style" content="#549a11">

    <!-- Bootstrap & Custom CSS-->
    <link href="<?php echo e(asset('frontend/assets/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/assets/css/custom-responsive.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/assets/css/custom.css')); ?>" rel="stylesheet">

    <!-- Font Awsome -->
    <script src="https://kit.fontawesome.com/48403ccd1a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--GOOGLE FONTS-->
    <link
        href="<?php echo e(isset($favicons->name) && !empty($favicons->name)
            ? asset('storage/admin/logo-favicon/favicons/' . $favicons->name)
            : asset('assets/auth/images/favicon.png')); ?>"
        rel="shortcut icon" />
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700|Source+Sans+Pro:300,400,600,700" rel="stylesheet">-->
    <!-- Owl Carousel CSS-->
    <link href="<?php echo e(asset('frontend/assets/css/owl.carousel.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('frontend/assets/css/owl.theme.css')); ?>" rel="stylesheet">

    <!-- Chosen CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/prism.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/chosen.css')); ?>">

    <!-- Angular JS-->
    <script src="<?php echo e(asset('frontend/assets/js/angular.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/custom-js/select-all-checkbox.js')); ?>"></script>


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
                <header class="container gtHeaderForm">
                    <div class="row">
                        
                        <!-- Logo -->
                        <div class="col-xxl-5 col-xl-4 col-xs-8 col-md-8 col-lg-5">
                            <a href="/" class="ripplelink">
                                <img src="<?php echo e(isset($logos->name) && $logos->name ? asset('storage/admin/logo-favicon/logos/' . $logos->name) : asset('storage/admin/logo-favicon/logos/mangal_logo-removebg-preview.png')); ?>"
                                    class="img-responsive gt-header-logo" max-height="50px">
                            </a>

                        </div>
                        <!-- /. Logo -->
                        <!-- Header login form -->
                        <div
                            class="col-xxl-8 col-xl-10 col-lg-11 col-xs-16 col-sm-16 col-md-16 pull-right mt-20 hidden-xs hidden-sm hidden-md">
                            <div class="row">
                                <form action="<?php echo e(route('login')); ?>" method="post" id="headerloginForm">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 form-group mt-10">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i
                                                    class="fa fa-envelope fa-fw"></i></span>
                                            <input type="text" class="gt-form-control" name="email" id="email"
                                                placeholder="Enter your login id " aria-describedby="basic-addon1"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 form-group mt-10">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon2"><i
                                                    class="fa fa-unlock-alt fa-fw"></i></span>
                                            <input type="password" class="gt-form-control"
                                                placeholder="Enter your password" name="password" id="password"
                                                aria-describedby="basic-addon2" required>
                                        </div>
                                    </div>
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 form-group mt-10">
                                        <input type="submit" class="btn gt-btn-orange btn-block gt-btn-lg"
                                            name="member_login" value="LOGIN">
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-xxl-5 pull-right text-right mb-5">
                                    <a href="<?php echo e(route('user.forgot.password')); ?>" class="gt-text-Grey">Forgot Password
                                        ?</a>
                                </div>
                                <div class="col-xxl-6 pull-right text-right mb-5">
                                    <a href="<?php echo e(route('login.with.otp')); ?>" class="gt-text-Grey">Login with OTP</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.Header login form -->

                        <!-- Header login mobile button-->
                        <div class="col-xs-8 visible-xs visible-sm visible-md text-right">
                            <a class="btn gt-btn-orange mt-15" role="button" data-toggle="collapse"
                                href="#collapseHeadLogin" aria-expanded="false" aria-controls="collapseHeadLogin">
                                Login </a>
                        </div>
                        <!-- /.Header login mobile button -->
                    </div>
                    <!-- Header login form for mobile -->
                    <div class="container">
                        <div class="row">
                            <div class="collapse" id="collapseHeadLogin">
                                <div class="row">
                                    <form action="login" method="post" id="headerloginFormMobile" class="mt-15">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 form-group mt-10">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="username_mobile"><i
                                                        class="fa fa-envelope fa-fw"></i></span>
                                                <input type="text" class="gt-form-control" name="username"
                                                    id="username_mobile" placeholder="Enter your login id"
                                                    aria-describedby="username_mobile" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 form-group mt-10">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="password_mobile"><i
                                                        class="fa fa-unlock-alt fa-fw"></i></span>
                                                <input type="password" class="gt-form-control"
                                                    placeholder="Enter your password" name="password"
                                                    id="password_mobile" aria-describedby="password_mobile" required>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 form-group mt-10">
                                            <input type="submit" class="btn gt-btn-orange btn-block gt-btn-lg"
                                                name="member_login" value="LOGIN">
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-5 pull-right text-right">
                                        <a href="forgot-password-password" class="gt-text-Grey">Forgot Password ?</a>
                                    </div>
                                    <div class="col-xxl-6 pull-right text-right mb-5">
                                        <a href="<?php echo e(route('login.with.otp')); ?>" class="gt-text-Grey"
                                            data-toggle="modal">Login with
                                            OTP</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /. Header login form for mobile -->
                </header>
                <!-- Email id Verification -->
                <!-- /.Email id Verification -->
                <!-- Header & Menu -->
                <nav class="navbar gt-navbar-green flat mb-0">
                    <div class="container">
                        <!-- Mobile Menu Button -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1"
                                style="background-color:rgba(247,247,247,1.00);color:rgba(0,0,0,1.00) !important;">
                                <span>MENU</span>
                            </button>
                        </div>
                        <!-- /.Mobile Menu Button -->

                        <!-- Menu tabs -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left">
                                <li class="active ripplelink"><a href="<?php echo e(url('/')); ?>"><i
                                            class="fas fa-home mr-10 fa-lg"></i>Home</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle ripplelink" data-toggle="dropdown"
                                        role="button" aria-expanded="false">
                                        <span class="mr-5"><i
                                                class="fas fa-search mr-10 fa-lg"></i>Search</span><span
                                            class="fa fa-angle-down"></span>
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

                                <li class="ripplelink"><a href="<?php echo e(url('successStory')); ?>"><i
                                            class="fas fa-users mr-10 fa-lg"></i>Success Story</a></li>

                                <li class="ripplelink"><a href="<?php echo e(url('plans')); ?>"><i
                                            class="fas fa-id-card-alt mr-10 fa-lg"></i>Membership</a></li>

                                <li class="ripplelink"><a href="<?php echo e(url('help')); ?>"><i
                                            class="fa fa-phone-square mr-10 fa-lg"></i>Contact Us</a></li>

                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li
                                    class="active ripplelink gt-border-right-green gt-border-left-green gtBorderRightSMXS0 gtBorderLeftSMXS0">
                                    <a href="<?php echo e(route('login')); ?>"><i class="fas fa-sign-in-alt mr-10 fa-lg"></i>
                                        Login</a>
                                </li>

                                <li class="ripplelink gt-border-right-green gtBorderRightSMXS0">
                                    <a href="<?php echo e(url('/')); ?>"><i class="fas fa-user-plus mr-10 fa-lg"></i>
                                        Signup</a>
                                </li>
                                <?php if(session()->get('registration_step') != '1'): ?>
                                    <li class="ripplelink gt-border-right-green gtBorderRightSMXS0">
                                        <form action="<?php echo e(url('logout')); ?>" method="post" style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit"
                                                class="ripplelink gt-border-right-green gtBorderRightSMXS0"
                                                style="background: none; border: none; color: #ffffff; padding: 15px 13px; font: inherit; cursor: pointer; display: inline-flex; align-items: center;">
                                                <i class="fas fa-sign-out-alt mr-10 fa-lg"></i> Logout
                                            </button>
                                        </form>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <!-- /.Menu tabs -->
                    </div>
                </nav>

            </div>
        </div>
    </div>
    <?php echo $__env->yieldContent('styles'); ?>
    <?php echo $__env->yieldContent('content'); ?>



    <!-- Footer -->
    <footer class="footer-before-login gt-margin-top-25">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                    <h5 class="gt-text-green gt-font-weight-600">
                        Help And Support </h5>
                    <ul class="">
                        <li><a href="<?php echo e(url('help')); ?>">Help</a></li>
                        <li><a href="<?php echo e(url('faq')); ?>">FAQ</a></li>
                        
                        <li><a href="<?php echo e(url('refund')); ?>">Refund Policy</a></li>
                    </ul>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                    <h5 class="gt-text-green gt-font-weight-600">
                        Terms & Policy </h5>
                    <ul class="">
                        <li><a href="<?php echo e(url('refund')); ?>">Terms & Conditions</a></li>
                        <li><a href="<?php echo e(url('refund')); ?>">Privacy Policy</a></li>
                        
                        <li><a href="<?php echo e(url('misuse')); ?>">Report Misuse</a></li>
                    </ul>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                    <h5 class="gt-text-green gt-font-weight-600">
                        Need Help? </h5>
                    <ul class="">
                        <li><a href="<?php echo e(url('login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(url('/')); ?>">Register</a></li>
                        <li><a href="<?php echo e(url('plans')); ?>"><i class="fa fa-star gt-text-orange"></i> Upgrade
                                Plan</a></li>
                    </ul>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                    <h5 class="gt-text-green gt-font-weight-600">
                        Information </h5>
                    <ul class="">
                        <li><a href="<?php echo e(url('successStory')); ?>">Success Story</a></li>
                        
                        <li><a href="<?php echo e(url('about-us')); ?>">About Us</a></li>
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
                    <form id="loginWithOTPForm" action="<?php echo e(route('login.with.otp')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                        <?php endif; ?>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label> Mobile Number</label>
                            <input type="number" name="mobile" class="gt-form-control"
                                placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="GET OTP" class="btn gt-btn-green">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    


    <!-- Right Click Disable -->

    

    <!-- /.Right Click Disable -->

    <!-- Live Chat -->
    <script type="text/javascript">
        var auto_refresh = setInterval(
            function() {
                $('#count').load('parts/online').fadeIn("slow");
            }, 15000
        ); // refresh every 10 second
    </script>
    <script src="<?php echo e(asset('frontend/assets/js/jquery.min.js')); ?>"></script>
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
    <script src="<?php echo e(asset('frontend/assets/js/jquery.min.js')); ?>"></script>

    <!-- Bootstrap & Green Js -->
    <script src="<?php echo e(asset('frontend/assets/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/assets/js/green.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#body').show();
            $('.preloader-wrapper').hide();
        });
    </script>
    <!-- Chosen Js -->
    <script src="<?php echo e(asset('frontend/assets/js/chosen.jquery.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('frontend/assets/js/prism.js')); ?>" type="text/javascript" charset="utf-8"></script>
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
        function validateForm() {
            var a = document.forms["frm"]["profile_by"].value;
            if (a == "") {
                alert("Select Profile Created By");
                return false;
            }
            var b = document.forms["frm"]["gender"].value;
            if (b == "") {
                alert("Select Your Gender");
                return false;
            }
            var c = document.forms["frm"]["nickname"].value;
            if (c == "") {
                alert("First name must be filled out");
                return false;
            }
            var d = document.forms["frm"]["lastname"].value;
            if (c == "") {
                alert("Last name must be filled out");
                return false;
            }
            var g = document.forms["frm"]["day"].value;
            if (g == "") {
                alert("Please select your birthdate");
                return false;
            }
            var h = document.forms["frm"]["month"].value;
            if (h == "") {
                alert("Please select your birth month");
                return false;
            }
            var i = document.forms["frm"]["year"].value;
            if (i == "") {
                alert("Please select your birth year");
                return false;
            }
            var e = document.forms["frm"]["religion"].value;
            if (e == "") {
                alert("Please select religion");
                return false;
            }
            var f = document.forms["frm"]["caste"].value;
            if (f == "") {
                alert("Please select caste");
                return false;
            }
            var j = document.forms["frm"]["m_tongue"].value;
            if (j == "") {
                alert("Please select mother tongue");
                return false;
            }
            var k = document.forms["frm"]["country"].value;
            if (k == "") {
                alert("Please select country");
                return false;
            }
            var l = document.forms["frm"]["code"].value;
            if (l == "") {
                alert("Please select country code");
                return false;
            }
            var m = document.forms["frm"]["mobile"].value;
            if (m == "") {
                alert("Mobile must be filled out.");
                return false;
            }
            var n = document.forms["frm"]["email"].value;
            if (n == "") {
                alert("Email id must be filled out.");
                return false;
            }
        }
    </script>
    <!-- Validation js -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/assets/js/validetta.js')); ?>"></script>
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
    <script src="<?php echo e(asset('frontend/assets/js/owl.carousel.min.js')); ?>"></script>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const country = document.getElementById("country");
    const state = document.getElementById("hiddenState");
    state.style.display = 'none';
    country.addEventListener("change", function(e) {
        let countryId = country.value;
        console.log(countryId);
        if (countryId) {
            state.style.display = 'block';
            $.ajax({
                url: '/get-state/' + countryId,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#state").empty();
                    $("#state").append('<option value="">Select state</option>');
                    $.each(data, function(key, value) {
                        $('#state').append('<option value="' + value.id + '">' + value
                            .state + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error Status:', status);
                    console.error('Error Details:', xhr.responseText);
                    alert(
                        'An error occurred while fetching the caste data. Please try again later.'
                    );
                }
            });
        } else {

            $('#state').fadeOut();
            $('#state').empty();
            $('#state').append('<option value="">Select state</option>');
        }
    });
</script>
<script>
    const state1 = document.getElementById("state");
    const city = document.getElementById("hiddenCity");
    city.style.display = 'none';
    state1.addEventListener("change", function(e) {
        let stateId = state1.value;
        if (stateId) {
            city.style.display = 'block';
            $.ajax({
                url: '/get-city/' + stateId,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#city").empty();
                    $("#city").append('<option value="">Select City</option>');
                    $.each(data, function(key, value) {
                        $('#city').append('<option value="' + value.id + '">' + value
                            .city + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error Status:', status);
                    console.error('Error Details:', xhr.responseText);
                    alert(
                        'An error occurred while fetching the caste data. Please try again later.'
                    );
                }
            });
        } else {
            $('#city').fadeOut();
            $('#city').empty();
            $('#city').append('<option value="">Select City</option>');
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/layouts/frontend/master.blade.php ENDPATH**/ ?>