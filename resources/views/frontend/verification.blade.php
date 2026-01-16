@extends('layouts.frontend.master')
@section('title', 'Account Verfication')
@section('styles')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap & Green Js -->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/green.js') }}"></script>
@endsection
@section('content')
    <div id="body">
        <div id="wrap">
            <div id="main">
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
                </script> <!-- /. Header & Menu -->

                <div class="container">
                    <div class="gtMobileVerification col-xxl-10 col-xxl-offset-3 col-xs-16 col-xs-offset-0">
                        <div class="text-center inThemeOrange">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h2 class="inPageTitle fontMerriWeather text-center mt-15 inThemeOrange">Account Verfication
                        </h2>
                        <p class="inPageSubTitle text-center mb-20">Verify Account now to activate your
                            profile.</p>
                        <article class="text-center text-danger">
                            It is mandatory to verify your mobile number otherwise your profile will not be displayed to
                            other members.
                        </article>
                        @php
                            $mobile = session('accountInfo.mobile');
                            $email = session('accountInfo.email');

                        @endphp
                        <div class="gtSMSVerification col-xxl-10 col-xxl-offset-3">
                            @include('alerts.alert')
                            
                            <h4>Verify Account through SMS</h4>
                            <p class="font-12">An SMS with verification PIN has been sent to </p>
                            <h5 class="gtMobileNo">+91-{{ $mobile ?? 'NA' }}</h5>
                            <div class="col-xxl-16">
                                <a href="#myModal" data-toggle="modal" class="btn gt-btn-orange gt-margin-top-5">Edit
                                    Mobile No</a>
                            </div>

                            <div class="clearfix"></div>
                            <div class="form-group mt-30">
                                @if (session()->has('registration_step'))
                                    <form action="{{ route('otp.varify') }}" method="post">
                                    @else
                                        <form action="{{ route('otp.validate') }}" id="resendForm" method="post">
                                @endif

                                @csrf
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <!-- Centered Text Box -->
                                    <div class="mb-3 text-center">
                                        <input type="text" class="form-control text-center" name="otp" id="otp"
                                            placeholder="Enter OTP" maxlength="6" required>

                                        <input type="hidden" name="email" id="email" value="{{ $email }}">
                                        <input type="hidden" name="mobile" id="mobile" value="{{ $mobile }}">
                                    </div>
                                    <!-- Centered Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn gt-btn-green btnVerify mt-10">Verify</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="col-xs-16">
                                @if (session()->has('registration_step'))
                                    <form action="{{ route('otp.again') }}" id="resendForm" method="post">
                                    @else
                                        <form action="{{ route('otp.resend') }}" id="resendForm" method="post">
                                @endif
                                @csrf
                                <input type="hidden" name="mobile" id="mobile" value="{{ $mobile }}">
                                <input type="hidden" name="email" id="email" value="{{ $email }}">
                                <input type="hidden" name="action" id="action" value="UserResendOTP">
                                <div class="row">
                                    <div class="col-xs-16 font-12">Not received verification code yet? <span
                                            id="countVerify"></span><b>s</b></div>
                                </div>
                                <button type="submit" class="btn gt-btn-orange mt-10" id="resendOTPBtn" disabled>
                                    Resend OTP
                                </button>
                                </form>
                               
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <form action="" method="post" class="inMobileVerifyChange gt-search-opt">
                            @csrf
                            <div class="row">
                                <div class="col-xxl-16 text-center">
                                    <h4 class="fontMerriWeather">Edit Mobile No</h4>
                                </div>
                                <div class="col-xxl-16 mt-20">
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input type="text" class="gt-form-control" name="change_mobile"
                                            placeholder="Enter Mobile No">
                                    </div>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <div class="form-group">
                                        <input type="submit" class="btn gt-btn-orange gt-margin-top-5" name="Submit"
                                            class="gt-form-control" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container gt-margin-top-10">
        </div>

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
                            @csrf
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
        
        
        <script src="js/jquery.min.js"></script>
        <small class="pull-right">
        </small>
        
    </div>
    <script>
        $(document).ready(function() {
            $('#body').show();
            $('.preloader-wrapper').hide();
        });
    </script>

    <script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap-pincode-input.js') }}"></script>
    
    <script>
        var spn = document.getElementById("countVerify");
        var resendOTPBtn = document.getElementById("resendOTPBtn");
        var resendForm = document.getElementById("resendForm");

        var count = 20;
        var timer = null;

        function countDown() {
            spn.textContent = count;

            if (count > 0) {
                count--;
                resendOTPBtn.setAttribute("disabled", true);
                timer = setTimeout(countDown, 1000);
            } else {
                resendOTPBtn.removeAttribute("disabled");
                clearTimeout(timer);
            }
        }
        resendOTPBtn.addEventListener("click", function(e) {
            resendForm.submit();
            this.disabled = true;
            count = 20;
            countDown();
        });
        window.onload = function() {
            countDown();
        };
    </script>
    
    
@endsection
