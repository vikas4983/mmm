
<?php $__env->startSection('title', 'MM - Active Plan'); ?>
<?php $__env->startSection('styles'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/green.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16 text-center" bis_skin_checked="1">
        <h2 class="inPageTitle fontMerriWeather inThemeOrange">Current Plan Details</h2>
        <p class="inPageSubTitle">You can check your current membership plan detail and also recommanded plan suggestion with
            that.</p>
    </div>
    <div class="col-xxl-16 col-xl-16 col-md-16 col-sm-16 col-lg-16" bis_skin_checked="1">
        <div class="gt-panel gt-panel-default inCurrentPlan" bis_skin_checked="1">
            <div class="gt-panel-head" bis_skin_checked="1">
                <div class="gt-panel-title" bis_skin_checked="1">
                    
                </div>
            </div>
            <div class="gt-panel-body" bis_skin_checked="1" >
                <div class="row" bis_skin_checked="1" style="display: flex">
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Plan Name</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                                <?php echo e($activePlanDetails['name'] ?? 'NA'); ?> </b>
                        </p>
                        
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Expired</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                              <?php echo e(\Carbon\Carbon::parse($activePlanDetails['expiry_date'])->format('d M Y h:ia') ?? 'NA'); ?>

                            </b>
                        </p>
                       
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Paid</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                              <?php echo e($activePlanDetails['offer_price'] ?? 'NA'); ?></b>
                        </p>
                        
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Left Contact</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                              <?php echo e($activePlanDetails['contact'] ?? 'NA'); ?> </b>
                        </p>
                        
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Send Interest</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                              <?php echo e($activePlanDetails['interest'] ?? 'Yes'); ?> </b>
                        </p>
                        
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Send Message</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                              <?php echo e($activePlanDetails['message'] ?? 'NA'); ?> </b>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\users\plans\activePlan.blade.php ENDPATH**/ ?>