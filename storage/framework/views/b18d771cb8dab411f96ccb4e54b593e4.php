
<?php $__env->startSection('title', 'Change Password'); ?>
<?php $__env->startSection('styles'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/green.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="body">
        <div id="wrap">
            <div id="main">
                <div class="container" id="container"> <!-- Added ID for targeting -->
                    <div class="row">
                        <div
                            class="col-xxl-6 col-xs-16 col-xl-6 col-xs-offset-0 col-xxl-offset-5 col-sm-offset-0 col-md-offset-0 col-xl-offset-5 col-lg-10 col-lg-offset-3">
                            <form class="gt-login-form gtLogin" action="<?php echo e(route('update.password')); ?>" method="post"
                                id="forgot_form">
                                <input type="hidden" name="email" id="email" value="<?php echo e($data['email']); ?>">
                                <input type="hidden" name="mobile" id="mobile" value="<?php echo e($data['mobile']); ?>">
                                <?php echo csrf_field(); ?>

                                <h2 class="inPageTitle fontMerriWeather text-center mt-15 inThemeOrange">Change Password?
                                </h2>
                                <p class="inPageSubTitle text-center mb-30">We are always happy to help.</p>

                                <?php if($errors->has('error')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo e($errors->first('error')); ?>

                                    </div>
                                <?php endif; ?>
                                <?php if($errors->has('success')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e($errors->first('success')); ?>

                                    </div>
                                <?php endif; ?>
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


    <?php $__env->stopSection(); ?>
























































    

<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\users\changePasswordForm.blade.php ENDPATH**/ ?>