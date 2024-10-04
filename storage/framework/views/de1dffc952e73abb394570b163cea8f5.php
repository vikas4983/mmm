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
                <div class="col-lg-8 col-md-10">
                    <div class="card card-default mb-0">
                        <div class="card-header pb-0">
                            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                <h4>Login with OTP</h4>
                            </div>
                            

                        </div>
                       
                     
                        <div class="card-body  px-5 pb-5 pt-0">
                            <h1 class="text-dark mb-6 text-center" style="color:red"></h1>
                            
                            
                            
                           
                            <?php
                                if (!function_exists('obfuscateEmailInline')) {
                                    function obfuscateEmailInline($email)
                                    {
                                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                            return $email; // Return the original email if it's not valid
        }

        $emailParts = explode('@', $email);
        $prefixLength = min(4, strlen($emailParts[0])); // Ensure prefix length does not exceed the length of the email part
        $emailPrefix = substr($emailParts[0], 0, $prefixLength); // Take up to the first 4 characters
        $hiddenLength = max(0, strlen($emailParts[0]) - $prefixLength); // Ensure hidden length is non-negative
        return $emailPrefix . str_repeat('*', $hiddenLength) . '@' . $emailParts[1];
    }
}

if (!function_exists('obfuscateMobileInline')) {
    function obfuscateMobileInline($mobile)
    {
        $visibleLength = 4;
        $hiddenLength = max(0, strlen($mobile) - $visibleLength); // Ensure hidden length is non-negative
        return str_repeat('*', $hiddenLength) . substr($mobile, -$visibleLength); // Keep last 4 characters
                                    }
                                }
                            ?>
                            
                            <?php if(isset($success)): ?>
                                <div class="alert alert-success mt-1">
                                    <?php echo e($success); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(isset($error)): ?>
                                <div class="alert alert-danger mt-1">
                                    <?php echo e($error); ?>

                                </div>
                            <?php endif; ?>
                            <div class="text-center">

                                <p>OTP has been sent to</p>
                                <p>+91<?php echo e(obfuscateMobileInline($admin->mobile ?? '')); ?></p>
                                <p><?php echo e(obfuscateEmailInline($admin->email ?? '')); ?></p>

                            </div>
                            
                            
                            
                            <form action="<?php echo e(url('verify-otp')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="row d-flex justify-content-center mt-1">
                                    <div class="form-group col-lg-8 ">
                                        <div class="text-center mt-3">
                                            <label for="otp">Enter OTP</label>
                                        </div>

                                        <input type="text" name="otp" id="otp"
                                            class="form-control input-lg" aria-describedby="emailHelp"
                                            placeholder="Enter OTP" value="<?php echo e(old('otp')); ?>"
                                            style="text-align: center" maxlength="4" pattern="\d{4}" required>
                                        
                                        <input type="hidden" name="mobile" id="mobile"
                                            value="<?php echo e($admin->mobile ?? ''); ?>">

                                    </div>

                                    <div class="col-md-12">

                                        <div class="d-flex justify-content-center mb-3">
                                            <button type="submit" class="btn btn-primary btn-pill">Verify
                                                OTP</button>
                                        </div>
                                        <p class="mt-3">Don't have an account yet ?
                                            <a class="text-blue" href="<?php echo e(url('admin-create')); ?>">Sign Up</a>
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
</body>

</html>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\admins\verify_otp.blade.php ENDPATH**/ ?>