<!DOCTYPE html>



<html lang="en">

<head>

    <head>
        <meta name="theme-name" content="mono" />

        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
        <link href="{{ asset('assets/auth/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/auth/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

        <!-- PLUGINS CSS STYLE -->
        <link href="{{ asset('assets/auth/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

        @yield('styles') @yield('font-awesome-cdn')
        <link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
            rel="stylesheet" />



        <link href="{{ asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />



        <link href="{{ asset('assets/auth/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />



        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



        <link href="{{ asset('assets/auth/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- MONO CSS -->
        <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}" />
        {{-- BRAND LOGO CSS --}}
        <link rel="stylesheet" href="{{asset('assets/auth/css/custom-css/brand-logo.css')}}">
        <!-- FAVICON -->
        <link
            href="{{ isset($favicons->name) && !empty($favicons->name)
                ? asset('storage/admin/logo-favicon/favicons/' . $favicons->name)
                : asset('assets/auth/images/favicon.png') }}"
            rel="shortcut icon" />
        {{-- <link href="{{ asset('assets/auth/images/favicon.png') }}" rel="shortcut icon" /> --}}

        <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
        <script src="{{ asset('assets/auth/plugins/nprogress/nprogress.js') }}"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css"
            rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <style>
            .modal-header {
                border-bottom: none;
            }
        </style>

    </head>
</head>
{{-- login --}}

<body class="bg-light-gray" id="body">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="card card-default mb-0">
                        <div class="card-header pb-0">
                            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                <a class="w-auto pl-0" href="{{ url('admin-login') }}">
                                    <img src="{{ isset($logos->name) && !empty($logos->name)
                                        ? asset('storage/admin/logo-favicon/logos/' . $logos->name)
                                        : asset('assets/auth/images/logos.png') }}"
                                        class="brand-logo" alt="brand-logo">
                                </a>
                                
                                <link href="" rel="shortcut icon" />
                            </div>
                        </div>
                        <div class="card-body px-5 pb-5 pt-0">

                            <h4 class="text-dark mb-6 text-center"></h4>
                            {{-- Bootstrap Alert --}}
                            @if (session('error'))
                                <div id="send-otp-error" class="alert alert-danger " role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- Toastr Alert --}}
                            {{-- @if ($errors->any())
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                            <form action="{{ url('admin-validate') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">

                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control input-lg" id="email" aria-describedby="emailHelp"
                                            placeholder="email">

                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <input type="password" name=" password" class="form-control input-lg"
                                            id="password" placeholder="Password">


                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="custom-control custom-checkbox mr-3 mb-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Remember
                                                    me</label>
                                            </div>
                                            <a class="text-color" href="#" data-toggle="modal"
                                                data-target="#exampleModal-forgot-password"> Forgot password? </a>
                                        </div>

                                        <div class="d-flex justify-content-center mb-3">
                                            <button type="submit" class="btn btn-primary btn-pill">Sign In</button>
                                        </div>
                                        <div class="d-flex justify-content-center mb-3">
                                            OR
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-primary btn-pill" data-toggle="modal"
                                                data-target="#exampleModal">
                                                Login With OTP
                                            </button>
                                        </div>
                                        <p class="mt-3">Don't have an account yet ?
                                            <a class="text-blue" href="{{ url('admin-create') }}">Sign Up</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title" id="exampleModalLabel">Login with OTP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; right: 1rem;">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @if (isset($success))
                    <div class="alert alert-success mt-3">
                        {{ $success }}
                    </div>
                @endif
                @if (isset($error))
                    <div class="alert alert-danger mt-3">
                        {{ $error }}
                    </div>
                @endif
                {{-- abc d --}}
                <div class="modal-body">
                    <form action="{{ url('send-otp') }}" method="post" id="otp-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12 mb-4">
                                <label for="mobile-email">Mobile No. / Email ID</label>
                                <input type="text" id="otp-input" name="mobile" value="{{ old('mobile') }}"
                                    class="form-control col-lg-12" id="mobile" aria-describedby="mobileHelp"
                                    placeholder="Enter Mobile Number Or Email">
                                <input type="hidden" name="LoginWithOTP" value="LoginWithOTP">
                                <span id="error-message-input" style="color: red; display: none;">Enter 10 digit
                                    Number.</span>
                                <span id="error-message" style="color: red; display: none;">Enter 10 digit Valid
                                    Number.</span>
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="text-center w-100">
                                <button type="submit" class="btn btn-primary btn-pill mb-4">Send OTP</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Forgot Password --}}
    <div class="modal fade" id="exampleModal-forgot-password" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title" id="exampleModal-forgot-password">Forgot Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; right: 1rem;">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                {{-- abc d --}}
                <div class="modal-body">
                    <form action="{{ url('forgot-password') }}" method="post" id="otp-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12 mb-4">
                                <label for="mobile-email">Mobile No. / Email ID</label>
                                <input type="text" id="otp-input" name="mobile" value="{{ old('mobile') }}"
                                    class="form-control col-lg-12" id="mobile" aria-describedby="mobileHelp"
                                    placeholder="Enter Mobile Number Or Email">
                                <input type="hidden" name="ForgotPassword" value="ForgotPassword">
                                <span id="error-message-input" style="color: red; display: none;">Enter 10 digit
                                    Number.</span>
                                <span id="error-message" style="color: red; display: none;">Enter 10 digit Valid
                                    Number.</span>
                                @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="text-center w-100">
                                <button type="submit" class="btn btn-primary btn-pill mb-4">Send OTP</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    {{-- <script>
        @if (Session::has('success'))


            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "duration": 3000,
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('danger'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('danger'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true

                    ,

            }
            toastr.warning("{{ session('danger') }}");
        @endif
    </script> --}}
    <script>
        document.getElementById("otp-form").addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var otpInput = document.getElementById("otp-input").value;
            var errorMessage = document.getElementById("error-message");
            var errorMessageInput = document.getElementById("error-message-input");

            // Clear previous error messages
            errorMessage.style.display = 'none';
            errorMessageInput.style.display = 'none';

            // Check if OTP input is empty
            if (otpInput === '') {
                errorMessageInput.style.display = 'inline';
            }
            // Check if OTP input length is greater than 10
            else if (otpInput.length > 10) {
                errorMessage.style.display = 'inline';
            } else {
                this.submit(); // Submit the form if validation passes
            }
        });
    </script>

</body>

</html>
