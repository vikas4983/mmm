@extends('layouts.frontend.master')
@section('title', 'Change Password')
@section('styles')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/green.js') }}"></script>
@endsection
@section('content')
    <div id="body">
        <div id="wrap">
            <div id="main">
                <div class="container" id="container"> <!-- Added ID for targeting -->
                    <div class="row">
                        <div
                            class="col-xxl-6 col-xs-16 col-xl-6 col-xs-offset-0 col-xxl-offset-5 col-sm-offset-0 col-md-offset-0 col-xl-offset-5 col-lg-10 col-lg-offset-3">
                            <form class="gt-login-form gtLogin" action="{{ route('update.password') }}" method="post"
                                id="forgot_form">
                                <input type="hidden" name="email" id="email" value="{{ $data['email'] }}">
                                <input type="hidden" name="mobile" id="mobile" value="{{ $data['mobile'] }}">
                                @csrf

                                <h2 class="inPageTitle fontMerriWeather text-center mt-15 inThemeOrange">Change Password?
                                </h2>
                                <p class="inPageSubTitle text-center mb-30">We are always happy to help.</p>
                                @if ($errors->has('error'))
                                    <div class="alert alert-error" role="alert">
                                        {{ $errors->first('error') }}
                                    </div>
                                @endif
                                @if ($errors->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ $errors->first('success') }}
                                    </div>
                                @endif
                                <div class="gt-margin-top-30 form-group">
                                    <label for="contactInput">Password</label>
                                    <input type="password" id="password" class="gt-form-control" name="password"
                                        placeholder="Enter strong password" required>
                                    <span style="color:red">Password should be letters,numbers & special charectors.</span>
                                </div>
                                <div class="gt-margin-top-30 form-group">
                                    <label for="contactInput">Confirm Password</label>
                                    <input type="password" id="password_confirmation" class="gt-form-control"
                                        name="password_confirmation" placeholder="Enter confirm strong password" required>
                                </div>
                                <div class="form-group gt-margin-top-30">
                                    <button class="btn gt-btn-orange btn-block" type="submit">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container gt-margin-top-10">
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


    @endsection
























































    {{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
