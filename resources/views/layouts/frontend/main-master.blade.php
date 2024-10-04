<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta -->
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="keyword" content="Welcome to Matrimonywebsite" />
    <meta name="description" content="Welcome to Matrimonywebsite" />
    <link type="image/x-icon" href="img/Logo.PNG" rel="shortcut icon" />

    <!-- Theme Color -->
    <meta name="theme-color" content="#549a11">
    <meta name="msapplication-navbutton-color" content="#549a11">
    <meta name="apple-mobile-web-app-status-bar-style" content="#549a11">

    <!-- Bootstrap & Custom CSS-->

    <link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/custom-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/custom.css') }}" rel="stylesheet">
    <link
        href="{{ isset($favicons->name) && !empty($favicons->name)
            ? asset('storage/admin/logo-favicon/favicons/' . $favicons->name)
            : asset('assets/auth/images/favicon.png') }}"
        rel="shortcut icon" />
    <!-- Font Awsome -->
    @yield('styles') @yield('font-awesome-cdn')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/48403ccd1a.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700|Source+Sans+Pro:300,400,600,700" rel="stylesheet">-->
    <!-- Owl Carousel CSS -->
    <link href="{{ asset('frontend/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/owl.theme.css') }}" rel="stylesheet">

    <!-- Chosen CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/chosen.css') }}">
</head>

<body>
    <!-- Loader -->
    <div class="preloader-wrapper text-center">
        <div class="loader"></div>
        <h5>Loading...</h5>
    </div>
    <!-- /.Loader -->
    <div id="body" style="display:none">
        <div id="wrap">
            <div id="main">
                <!-- Header & Menu -->
                <!-- Font Awsome -->
                <link href="{{ asset('frontend/assets/css/font/css/fontawesome.min.css') }}" rel="stylesheet">
                <link href="{{ asset('frontend/assets/css/font/css/all.min.css') }}" rel="stylesheet">

                <!-- MENU AFTER LOGIN STARTS HERE -->
                <header class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-xxl-5 col-xl-4 col-xs-8 col-md-8 col-lg-5">
                            <a href="{{ url('dashboard') }}" class="ripplelink">
                                <img src="{{ asset('frontend/assets/images/logos/mangal_logo-removebg-preview.png') }}"
                                    class="img-responsive gt-header-logo">
                            </a>
                        </div>
                        <!-- /. Logo -->
                        <!-- Header mobile button-->
                        <div
                            class="col-sm-10 col-xs-10 col-md-10 visible-xs visible-sm visible-md pull-right text-right gt-padding-top-10">
                            <a class="btn gt-btn-orange" role="button" data-toggle="collapse"
                                href="#collapseHeadDetails" aria-expanded="false" aria-controls="collapseHeadDetails">
                                <p class="gt-margin-bottom-0 gt-margin-top-0">
                                    {{ $user->name ?? 'Gaust' }}</b>&nbsp;&nbsp;<i class="fa fa-angle-down"></i></p>
                            </a>
                        </div>

                        <!-- /. Header mobile button-->
                        <div class="collapse mobile-collapse" id="collapseHeadDetails">
                            <div class="col-xxl-5 col-sm-16 col-xs-16 col-md-10 col-lg-8 pull-right gt-margin-top-10">
                                <div class="row">

                                    <!-- User thumbnail Image -->
                                    <div class="col-xxl-4 col-xs-4 col-md-5">
                                        <div id="dis_thumbnail"></div>
                                    </div>
                                    <!-- /.User thumbnail Image-->

                                    <!-- Username & last login details -->
                                    @php

                                        $latestPayment = $user->payments()->orderBy('id', 'desc')->first();
                                    @endphp

                                    <div class="col-xxl-11 col-xs-12 col-md-11">
                                        <h5 class="gt-margin-bottom-5 gt-margin-top-5">
                                            <b>{{ $user->name ?? 'Gaust' }}</b> : <b><span
                                                    class="gt-text-orange">{{ $prefix->name ?? 'NA' }}-{{ $user->id }}</span></b>
                                        </h5>
                                        <p class="gt-margin-bottom-5 font-13">Last Login:
                                            <span class="gt-text-orange">
                                                {{ $user->created_at ?? 'NA' }} </span>
                                        </p>
                                        @if (isset($latestPayment))
                                            <p class="gt-margin-bottom-5 font-13">Membership :
                                                {{ $latestPayment->is_paid == 'Active' ? 'Paid' : 'Free' }} <span
                                                    class="gt-text-orange"></span>
                                            </p>
                                            <p class="gt-margin-bottom-5 font-13">Contact :
                                                {{ $latestPayment->contact ?? 'NA' }} <span
                                                    class="gt-text-orange"></span>
                                            </p>
                                        @else
                                            <p class="gt-margin-bottom-5 font-13">Membership :
                                                Free <span class="gt-text-orange"></span>
                                            </p>
                                        @endif


                                        <h6 class="gt-margin-bottom-0 gt-margin-top-5">
                                        </h6>

                                    </div>
                                    <!-- Username & last login details END-->
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!--MENU AFTER LOGIN END HERE -->
                <!-- Menu after login -->
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
                        <!-- /. Mobile Menu Button -->

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left">
                                <li class="active ripplelink"><a href="{{ url('dashboard') }}">My Home</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle ripplelink" data-toggle="dropdown"
                                        role="button" aria-expanded="false">
                                        <span class="mr-5">My Profile</span><span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu flat" role="menu">
                                        <li><a href="{{ route('myProfile') }}">View Profile</a></li>
                                        {{-- <li><a href="#">Edit Profile</a></li> --}}
                                        <li><a href="{{ url('saved-search') }}">My Saved Searches</a></li>
                                        <li><a href="{{ url('messages') }}">My Messages</a></li>
                                        <li><a href="{{ url('my-interest') }}">My Express Interest</a></li>
                                        <li><a href="{{ url('my-photos') }}">Manage Photo</a></li>
                                        <li><a href="{{ url('my-horoscope') }}">Manage Horoscope</a></li>
                                        <li><a href="{{ url('document') }}">Manage Document</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle ripplelink" data-toggle="dropdown"
                                        role="button" aria-expanded="false">
                                        <span class="mr-5">Search</span><span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu flat" role="menu">
                                        <li><a href="{{ route('quickSearch') }}">Quick Search</a></li>
                                        <li><a href="{{ url('basic-search') }}">Basic Search</a></li>
                                        <li><a href="{{ url('advance-search') }}">Advanced Search</a></li>
                                        <li><a href="{{ url('keyword-search') }}">Keyword Search</a></li>
                                        <li><a href="{{ url('location-search') }}">Location Search</a></li>
                                        <li><a href="{{ url('occupation-search') }}">Occupation Search</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle ripplelink" data-toggle="dropdown"
                                        role="button" aria-expanded="false">
                                        <span class="mr-5">My Matches</span><span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu flat" role="menu">
                                        <li><a href="one-way-matches">One Way Matches</a></li>
                                        <li><a href="two-way-matches">Two Way Matches</a></li>
                                        <li><a href="broader-matches">Broader Matches</a></li>
                                        <li><a href="preferred-matches">Preferred Matches</a></li>
                                        <li><a href="custom-matches">Custom Matches</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle ripplelink" data-toggle="dropdown"
                                        role="button" aria-expanded="false">
                                        <span class="mr-5">Membership</span><span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu flat" role="menu">
                                        <li><a href="{{ url('plan') }}">Membership Plans</a></li>
                                        <li><a href="{{ url('active-plan') }}">Current Plan</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle ripplelink" data-toggle="dropdown"
                                        role="button" aria-expanded="false">
                                        <span class="mr-5">Profile Details</span><span
                                            class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu flat" role="menu">
                                        <li><a href="{{ url('sortlist-profiles') }}">Shortlisted Profile</a></li>
                                        <li><a href="{{ url('blocklist-profiles') }}">Blocked Profile</a></li>
                                        <li><a href="{{ url('profiles-view-by') }}">My Profile Viewed By</a></li>
                                        <li><a href="{{ url('i-view-profiles') }}">I Visited Profile</a></li>
                                        <li><a href="{{ url('mobile-numbers-view-by') }}">My Mobile No Viewed By</a>
                                        </li>
                                        <li><a href="{{ url('i-view-mobile-numbers') }}">I View Mobile No </a></li>
                                        {{-- <li><a href="photo-request">Photo Password Request</a></li> --}}
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown gt-border-right-green gt-border-left-green">
                                    <a href="#" class="dropdown-toggle ripplelink pl-30 pr-30"
                                        data-toggle="dropdown" role="button" aria-expanded="false">
                                        <i class="fas fa-cog"></i> <span
                                            class="hidden-xxl hidden-xl hidden-lg">Settings</span>
                                    </a>
                                    <ul class="dropdown-menu flat" role="menu">
                                        <li><a href="{{ url('privacy') }}">Privacy Setting </a></li>
                                        <li><a href="settings?contactdiv">Contact View Setting</a></li>
                                        <li><a href="{{ Route('changePassword') }}">Change Password</a></li>
                                        <li>
                                            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                            </form>
                                            <a href="#"
                                                onclick="document.getElementById('logoutForm').submit()">Logout</a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="dropdown gt-border-right-green">
                                    <a href="#" class="dropdown-toggle ripplelink pl-30 pr-30"
                                        data-toggle="dropdown" role="button" aria-expanded="false">
                                        <i class="fa fa-bell"></i> <span
                                            class="hidden-xxl hidden-xl hidden-lg">Notification</span>
                                        <span class="badge" style="position:absolute;top:8px;right: 16px;">
                                            0 </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a>No New Notification</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- MENU ITEMS END -->
                    </div>
                </nav>
                <!-- /. Menu after login -->

                <!-- To decrese notification count when click on notification -->
                <script>
                    function notification(noti_id) {
                        $.ajax({
                            url: "web-services/notification",
                            type: "POST",
                            data: "noti_id=" + noti_id,
                            cache: false,
                            success: function(response) {
                                location.reload();
                            }
                        });
                        return true;
                    }
                </script>

                @yield('styles')
                @yield('content')


                <!-- Footer -->
                <footer class="footer-before-login gt-margin-top-25">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                                <h5 class="gt-text-green gt-font-weight-600">
                                    Help And Support </h5>
                                <ul class="">
                                    <li><a href="contactUs.php">Contact Us</a></li>
                                    <li><a href="cms?cms_id=13">FAQ</a></li>
                                    <li><a href="cms?cms_id=16">Refund Policy</a></li>
                                </ul>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                                <h5 class="gt-text-green gt-font-weight-600">
                                    Terms & Policy </h5>
                                <ul class="">
                                    <li><a href="cms?cms_id=7">Terms & Conditions</a></li>
                                    <li><a href="cms?cms_id=6">Privacy Policy</a></li>
                                    <li><a href="cms?cms_id=15">Report Misuse</a></li>
                                </ul>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                                <h5 class="gt-text-green gt-font-weight-600">
                                    Need Help? </h5>
                                <ul class="">
                                    <li><a href="membershipplans"><i class="fa fa-star gt-text-orange"></i> Upgrade
                                            Membership</a></li>
                                </ul>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
                                <h5 class="gt-text-green gt-font-weight-600">
                                    Information </h5>
                                <ul class="">
                                    <li><a href="success-story">Success Story</a></li>
                                    <li><a href="cms?cms_id=8">About Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-16">
                                <h5 class="gt-text-green gt-font-weight-600">About Us</h5>
                                <p>Welcome to Matrimonywebsite</p>
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
                                                class="fab fa-twitter-square"></i></a></li>
                                    <li><a href="https://www.linkedin.com" target="_blank"><i
                                                class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <div class="container-fluid gt-footer-bottom">
                    <div class="row">
                        <div class="container text-center">
                            All Rights Reserved By @ <a href="https://matrimonialphpscript.com/premium-demo-2/">Design
                                and developed by Matrimonywebsite</a>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Select your language <button
                                            type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </h5>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-16">
                                        <div class="list-group">
                                            <a href="index.php?lang=en"
                                                class="list-group-item list-group-item-action">English</a>
                                            <a href="index.php?lang=hi"
                                                class="list-group-item list-group-item-action">हिंदी</a>
                                            <a href="index.php?lang=te"
                                                class="list-group-item list-group-item-action">తెలుగు</a>
                                            <a href="index.php?lang=mr"
                                                class="list-group-item list-group-item-action">मराठी</a>
                                            <a href="index.php?lang=ta"
                                                class="list-group-item list-group-item-action">தமிழ்</a>
                                            <a href="index.php?lang=kn"
                                                class="list-group-item list-group-item-action">ಕನ್ನಡ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Login With OTP Modal  -->
                <div class="modal fade" id="loginWithOTP" tabindex="-1" role="dialog"
                    aria-labelledby="loginWithOTPLabel" aria-hidden="true">
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
                <!--
<script language=JavaScript>
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
</script>
-->
                <!-- /.Right Click Disable -->

                <!-- Live Chat -->
                <script type="text/javascript">
                    var auto_refresh = setInterval(
                        function() {
                            $('#count').load('parts/online').fadeIn("slow");
                        }, 15000
                    );

                    // refresh every 10 second
                </script>
                <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
                {{-- <small class="pull-right">
        <link rel="stylesheet" type="text/css" href="mmm/who-is-online/widget.css" />
    <script type="text/javascript" src="mmm/who-is-online/widget.js"></script>
    <div class="onlineWidget">
	    <div class="channel">
            <img class="preloader" src="{{asset('frontend/assets/images/preloader.gif')}}" alt="Loading.." width="22" height="22" />
        </div>
	    <div class="count" id="count"></div>
        <div class="label">online member</div>
        <div class="arrow"></div>
    </div>
</small> --}}
                <!-- /. Live Chat -->

                <!-- Analytic Code -->
                <!-- Google tag (gtag.js) -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142522590-1"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];

                    function gtag() {
                        dataLayer.push(arguments);
                    }
                    gtag('js', new Date());

                    gtag('config', 'UA-142522590-1');
                </script>

                <!-- /.Analytic Code -->


                <!-- MODAL function+send_interest+admit_interest--->
                <div class="modal fade-in" id="myModal1" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true"></div>
                <!-- MODAL END --->
            </div>

            <!-- Jquery Js-->

            <!-- Bootstrap & Green Js -->
            <script src="{{ asset('frontend/assets/js/bootstrap.js') }}"></script>
            <script src="{{ asset('frontend/assets/js/green.js') }}"></script>
            <script>
                $(document).ready(function() {
                    $('#body').show();
                    $('.preloader-wrapper').hide();
                });
            </script>
            <!-- Mobile Side Panel Collapse -->
            <script>
                (function($) {
                    var $window = $(window),
                        $html = $('.mobile-collapse');
                    $window.width(function width() {
                        if ($window.width() > 767) {
                            return $html.addClass('in');
                        }
                        $html.removeClass('in');
                    });
                })(jQuery);
            </script>

            <!-- Owl Carousel Js -->
            <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
            <script>
                $(document).ready(function() {
                    $("#owl-demo").owlCarousel({
                        autoPlay: 3000,
                        items: 1,
                        navigation: true,
                        navigationText: ["<i class='fa fa-chevron-left'></i>",
                            "<i class='fa fa-chevron-right'></i>"
                        ],
                        itemsDesktop: [1199, 1],
                        itemsDesktopSmall: [979, 1]
                    });
                });
            </script>
            <script src="{{ asset('frontend/assets/js/function.js') }}" type="text/javascript"></script>
</body>

</html>
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
                user_id: 'aa749e90834b6a14bfd426f718d455fd',
                profile: 'Hello',
            },
            dataType: 'json',
            success: function(data) {
                // alert('Success');
            }
        });
    });
</script>

{{-- <script src="{{ asset('frontend/assets/js/custom-js/user-update-modal.js') }}"></script> --}}
