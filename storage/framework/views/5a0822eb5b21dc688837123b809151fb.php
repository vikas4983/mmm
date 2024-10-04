<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('styles'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap & Green Js -->
    <script src="<?php echo e(asset('assets/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/green.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="body" style="display">
        <div id="wrap" class="gtLogin">
            <div id="main">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-xxl-6 col-xs-16 col-xl-6 col-xs-offset-0 col-xxl-offset-5 col-sm-offset-0 col-md-offset-0 col-xl-offset-5 col-lg-10 col-lg-offset-3 ">
                            <form class="gt-login-form" action="<?php echo e(route('login')); ?>" name="login_form" id="login_form"
                                method="post">
                                <?php echo csrf_field(); ?>
                                
                                
                                <h2 class="inPageTitle fontMerriWeather text-center mt-15 inThemeOrange">
                                    <?php echo e(trans('auth.login')); ?>

                                </h2>
                                <p class="inPageSubTitle text-center mb-30">And search your life partner</p>

                                <?php if($errors->any()): ?>
                                    <div class="alert alert-success">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php if(session('success')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo e(session('success')); ?>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php
                                    $fields = config('formFields.login');
                                ?>

                                <?php if (isset($component)) { $__componentOriginal7a42694a19dc8f5a836f15aa90b268f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8 = $attributes; } ?>
<?php $component = App\View\Components\FormFieldsComponent::resolve(['fields' => $fields] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-fields-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\FormFieldsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8)): ?>
<?php $attributes = $__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8; ?>
<?php unset($__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a42694a19dc8f5a836f15aa90b268f8)): ?>
<?php $component = $__componentOriginal7a42694a19dc8f5a836f15aa90b268f8; ?>
<?php unset($__componentOriginal7a42694a19dc8f5a836f15aa90b268f8); ?>
<?php endif; ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xxl-8">
                                            <label for="keep_login">
                                                <input type="checkbox" class="" name="keep_login"
                                                    id="keep_login">&nbsp;&nbsp;Keep me logged in </label>
                                        </div>
                                        <div class="col-xxl-8 text-right">
                                            <a href="<?php echo e(route('user.forgot.password')); ?>" class="inForgotText">Forgot Password ?
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
                                    <a href="<?php echo e(route('login.with.otp')); ?>"  class="btn gt-btn-green btn-block">Login
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
    <?php $__env->stopSection(); ?>
























































    

<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views/auth/login.blade.php ENDPATH**/ ?>