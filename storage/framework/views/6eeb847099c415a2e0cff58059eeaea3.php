<!DOCTYPE html>



<html lang="en">

<head>

    <head>
        <meta name="theme-name" content="mono" />

        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
        <link href="<?php echo e(asset('assets/auth/plugins/material/css/materialdesignicons.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('assets/auth/plugins/simplebar/simplebar.css')); ?>" rel="stylesheet" />

        <!-- PLUGINS CSS STYLE -->
        <link href="<?php echo e(asset('assets/auth/plugins/nprogress/nprogress.css')); ?>" rel="stylesheet" />

        <?php echo $__env->yieldContent('styles'); ?> <?php echo $__env->yieldContent('font-awesome-cdn'); ?>
        <link href="<?php echo e(asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')); ?>"
            rel="stylesheet" />



        <link href="<?php echo e(asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css')); ?>" rel="stylesheet" />



        <link href="<?php echo e(asset('assets/auth/plugins/daterangepicker/daterangepicker.css')); ?>" rel="stylesheet" />



        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



        <link href="<?php echo e(asset('assets/auth/plugins/toaster/toastr.min.css')); ?>" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- MONO CSS -->
        <link id="main-css-href" rel="stylesheet" href="<?php echo e(asset('assets/auth/css/style.css')); ?>" />




        <!-- FAVICON -->
        <link href="<?php echo e(asset('assets/auth/images/favicon.png')); ?>" rel="shortcut icon" />

        <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
        <script src="<?php echo e(asset('assets/auth/plugins/nprogress/nprogress.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/auth/js/custom-new-js/toastr-notification.js')); ?>"></script>
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

<body class="bg-light-gray" id="body">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="card card-default mb-0">
                        <div class="card-header pb-0">

                            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                <a class="w-auto pl-0 mb-5" href="<?php echo e(route('login')); ?>">
                                    <img src="https://mangalmandap.com/images/mangal_logo.jpg" height="70px"
                                        width="800px" alt="Mono">
                                    <span class="brand-name text-dark"></span>
                                </a>
                            </div>
                            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                <h4>Change Password</h4>
                            </div>

                        </div>
<div class="card-body  px-5 pb-5 pt-0">
                            <h1 class="text-dark mb-6 text-center" style="color:red"></h1>
                            <div id="alert-container-resend" class="mt-3"></div>
                            <?php if(isset($success)): ?>
                                <div id="send-otp-success" class="alert alert-success mt-1">
                                    <?php echo e($success); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php if(isset($error)): ?>
                                <div id="send-otp-error" class="alert alert-danger mt-1">
                                    <?php echo e($error); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                           <form action="<?php echo e(url('admin-change-password')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="row d-flex justify-content-center mt-1">
                                    <div class="form-group col-lg-12">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control input-lg "
                                            aria-describedby="passwordHelp" placeholder="Enter Password"
                                            style="text-align: center" maxlength="16">

                                        

                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="cpassword"
                                            class="form-control input-lg <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            aria-describedby="passwordConfirmationHelp" placeholder="Confirm Password"
                                            style="text-align: center" maxlength="16">

                                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                       <input type="hidden" name="mobile" id="mobile"
                                            value="<?php echo e(old('mobile', $admin->mobile ?? '')); ?>">
                                    </div>

                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-center mt-5">
                                            <button type="submit" class="btn btn-primary btn-pill">
                                                Set Password
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script>
        <?php if(Session::has('success')): ?>


            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "duration": 3000,
            }
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>

        <?php if(Session::has('danger')): ?>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("<?php echo e(session('info')); ?>");
        <?php endif; ?>

        <?php if(Session::has('danger')): ?>
            toastr.options = {
                "closeButton": true,
                "progressBar": true

                    ,

            }
            toastr.warning("<?php echo e(session('danger')); ?>");
        <?php endif; ?>
    </script>
    <script>
        var countdown = 10; // Set initial countdown value
        var timer = setInterval(() => {
            countdown--;
            document.getElementById('resend-otp').innerText = `Resend OTP in ${countdown}s`;
            if (countdown <= 0) {
                clearInterval(timer);
                var resendOtpButton = document.getElementById('resend-otp');
                resendOtpButton.disabled = false; // Enable the button after countdown
                resendOtpButton.innerText = 'Resend OTP'; // Set the button text
                resendOtpButton.style.color = '#9E6DE0'; // Set the text color
            }
        }, 1000); // Decrease countdown every second

        document.getElementById('resend-otp-form').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            fetch('<?php echo e(url('resend-otp')); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    body: JSON.stringify({
                        mobile: document.querySelector('input[name="mobile"]')
                            .value // Ensure this input exists and has a value
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response Data:', data);
                    document.getElementById('send-otp-success')?.remove();
                    document.getElementById('send-otp-error')?.remove();
                    const alertContainer = document.getElementById('alert-container-resend');
                    if (data.success) {

                        alertContainer.innerHTML = `
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${data.message}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `;
                        // setTimeout(() => {
                        //         const successAlert = document.getElementById('alert-container-resend');
                        //         if (successAlert) {
                        //             successAlert.classList.remove('show');
                        //             successAlert.classList.add('fade');
                        //         }
                        //     }, 2000);


                        countdown = 10; // Reset the countdown
                        document.getElementById('resend-otp').disabled = true; // Disable the button again
                        timer = setInterval(() => {
                            countdown--;
                            document.getElementById('resend-otp').innerText =
                                `Resend OTP in ${countdown}s`;

                            if (countdown <= 0) {
                                clearInterval(timer);
                                var resendOtpButton = document.getElementById('resend-otp');
                                resendOtpButton.disabled = false; // Enable the button after countdown
                                resendOtpButton.innerText = 'Resend OTP'; // Set the button text
                                resendOtpButton.style.color = '#9E6DE0'; // Set the text color


                            }
                        }, 1000);
                    } else {
                        alertContainer.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${data.error}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `;
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    const alertContainer = document.getElementById('alert-container');
                    alertContainer.innerHTML = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    An error occurred. Please try again.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            `;
                });
        });
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\change-password-form.blade.php ENDPATH**/ ?>