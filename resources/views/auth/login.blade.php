@extends('layouts.frontend.master')
@section('title', 'Login')
@section('styles')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap & Green Js -->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/green.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

@endsection
@section('content')
    <div id="body" style="display">
        <div id="wrap" class="gtLogin">
            <div id="main">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-xxl-6 col-xs-16 col-xl-6 col-xs-offset-0 col-xxl-offset-5 col-sm-offset-0 col-md-offset-0 col-xl-offset-5 col-lg-10 col-lg-offset-3 ">
                            <form class="gt-login-form" action="{{ route('login') }}" name="login_form" id="login_form"
                                method="post">
                                @csrf
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                
                                <h2 class="inPageTitle fontMerriWeather text-center mt-15 inThemeOrange">
                                    {{ trans('auth.login') }}
                                </h2>
                                <p class="inPageSubTitle text-center mb-30">And search your life partner</p>

                                @if ($errors->any())
                                    <div class="alert alert-success">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @php
                                    $fields = config('formFields.login');
                                @endphp

                                <x-form-fields-component :fields="$fields" />
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xxl-8">
                                            <label for="keep_login">
                                                <input type="checkbox" class="" name="keep_login"
                                                    id="keep_login">&nbsp;&nbsp;Keep me logged in </label>
                                        </div>
                                        <div class="col-xxl-8 text-right">
                                            <a href="{{ route('user.forgot.password') }}" class="inForgotText">Forgot Password ?
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" class="btn gt-btn-orange btn-block" name="member_login"
                                        value="Login Now">
                                </div>
                                <h5 class="text-center">OR</h5>
                                <div class="form-group text-center">
                                    <a href="{{route('login.with.otp')}}"  class="btn gt-btn-green btn-block">Login
                                        With OTP</a>
                                </div>
                                <div class="clearfix"></div>
                                <h5 class="text-center gt-margin-top-20">Not received email verification link?</h5>
                                <div class="form-group text-center">
                                    <a href="resend_email_verify" class="btn gt-btn-blue btn-block">Resend Email
                                        Verification</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
