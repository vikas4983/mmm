<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css"
            rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    </head>

</head>



<body class="bg-light-gray" id="body">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-5 col-md-10 ">
                    <div class="card card-default mb-0">
                        <div class="card-header pb-0">
                            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                <a class="w-auto pl-0" href="">
                                    <img src="https://mangalmandap.com/images/mangal_logo.jpg" height="70px"
                                        width="800px" alt="Mono">
                                    <span class="brand-name text-dark"></span>
                                </a>
                            </div>
                        </div>

                        <div class="card-body px-5 pb-5 pt-0">
                            <h4 class="text-dark text-center mb-5"></h4>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo e(route('admins.store')); ?>" method="post" enctype="multipart/form-data">
                                 <?php echo csrf_field(); ?>
                                 <input type="hidden" name="Registration" id="Registration" value="Registration">
                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="file" name="image" class=" form-control input-lg"
                                            id="image" aria-describedby="nameHelp">

                                    </div>
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                                            class=" form-control input-lg"
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e(Session::has('error')); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> id="name"
                                            aria-describedby="nameHelp" placeholder="Name">
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p><?php echo e(Session::has('error')); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                                            class="form-control input-lg" id="email" aria-describedby="emailHelp"
                                            placeholder="Username">
                                    </div>
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="mobile" name="mobile" value="<?php echo e(old('mobile')); ?>"
                                            class="form-control input-lg" id="mobile" aria-describedby="emailHelp"
                                            placeholder="Mobile Number">
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-12 ">
                                        <input type="password" name="password" class="form-control input-lg"
                                            id="password" placeholder="Password">

                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <input type="password" name="password_confirmation"
                                            class=" form-control input-lg" id="cpassword"
                                            placeholder="Confirm Password">


                                    </div>
                                    <div class="form-group col-md-12 mb-4">
                                        <div><label class="mr-3">Roll</label></div>
                                                                        <div
                                                                            class="custom-control custom-radio d-inline-block mr-3 mb-3">

                                                                            <input type="radio" id="customRadioRoll1"
                                                                                name="roll"
                                                                                class="custom-control-input"
                                                                                value="1">
                                                                            <label class="custom-control-label"
                                                                                for="customRadioRoll1">Admin</label>
                                                                        </div>

                                                                        <div
                                                                            class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                                            <input type="radio" id="customRadioRoll2"
                                                                                name="roll"
                                                                                class="custom-control-input"
                                                                                checked="checked" value="0">
                                                                            <label class="custom-control-label"
                                                                                for="customRadioRoll2">Sub Admin</label>
                                                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 mb-4">
                                         <div><label class="mr-3">Status</label></div>
                                                                        <div
                                                                            class="custom-control custom-radio d-inline-block mr-3 mb-3">

                                                                            <input type="radio" id="customRadio1"
                                                                                name="status"
                                                                                class="custom-control-input"
                                                                                value="0">
                                                                            <label class="custom-control-label"
                                                                                for="customRadio1">Active</label>
                                                                        </div>

                                                                        <div
                                                                            class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                                            <input type="radio" id="customRadio2"
                                                                                name="status"
                                                                                class="custom-control-input"
                                                                                checked="checked" value="0">
                                                                            <label class="custom-control-label"
                                                                                for="customRadio2">InActive</label>
                                                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between mb-3">

                                            


                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mb-4">Sign Up</button>
                                        </div>

                                        <p>Already have an account?
                                            <a class="text-blue" href="<?php echo e(url('admin-login')); ?>">Sign in</a>
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

</body>
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

</html>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin-create.blade.php ENDPATH**/ ?>