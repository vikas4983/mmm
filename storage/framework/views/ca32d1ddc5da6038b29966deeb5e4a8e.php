
<?php $__env->startSection('title', 'Mangal Mandap - Plans'); ?>
<?php $__env->startSection('styles'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap & Green Js -->
    <script src="<?php echo e(asset('assets/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/green.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2 class="text-center inPageTitle fontMerriWeather">Membership Plans</h2>
        <p class="inPageSubTitle text-center mb-20">Select from our multiple membership plan and find your best life partner
            with membership benefits.</p>
        <div class="row">
            <div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16">
                <div class="row mb-20">
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label for="gt-plan-28" class="col-xxl-4 col-xl-4 col-xs-16 col-lg-8"
                            style="<?php echo e($plan->id === $activePlan->plan_id ? '' : ''); ?>">
                            <div class="gt-plan" id="setselected28">
                                <div class="gt-plan-header">
                                    
                                    <h4>
                                        FLAT
                                        <span style="color: #021def">
                                            <?php echo e($plan->offer ?? ''); ?>%
                                        </span>
                                        OFF ON

                                        <input type="radio" id="gt-plan-28" name="plan" onChange="getselected('28');"
                                            class="Table_Details inDisplayNone">
                                        <span id="planname28">
                                            <?php echo e($plan->name ?? ''); ?> </span>
                                    </h4>
                                    <div class="gt-plan-price">
                                        <h4 id="planamount28">
                                            Rs. <?php echo e($plan->price ?? ''); ?> </h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <!-- Plan display for mobile -->
                                <a class="btn btn-primary gtMobPlan visible-xs visible-sm visible-md" role="button"
                                    data-toggle="collapse" href="#<?php echo e($plan->id); ?>" aria-expanded="false"
                                    aria-controls="<?php echo e($plan->id); ?>">
                                    View Plan Detail <div class="clearfix"></div>
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                <div class="collapse" id="<?php echo e($plan->id); ?>">
                                    <form action="#" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="planId" value="<?php echo e($plan->id); ?>">
                                        <div class="well">
                                            <div class="gt-plan-body">
                                                <ul class="gt-plan-desc">
                                                    <li>
                                                        <h3>Duration</h3>
                                                        <h5 id="planduration28">
                                                            <?php echo e($plan->duration ?? ''); ?>

                                                        </h5>
                                                    </li>
                                                    <li>
                                                        <h3>Messages</h3>
                                                        <h5>
                                                            <?php echo e($plan->unlimited ?? 'Unlimited'); ?>

                                                        </h5>
                                                    </li>

                                                    <li>
                                                        <h3>Contact Views</h3>
                                                        <h5>
                                                            <?php echo e($plan->allow_contact); ?> </h5>
                                                    </li>
                                                    <li>
                                                        <h3>Live Chat</h3>
                                                        <h5>
                                                            <?php echo e($plan->chat ?? 'Unlimited'); ?> </h5>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit" style="width: 263px;"
                                            class="gt-plan-footer hidden-xs hidden-sm hidden-md">
                                            Continue
                                        </button>
                                    </form>

                                </div>
                                <!-- /. Plan display for mobile -->
                                <!-- Plan for desktop -->
                                <?php if(!empty($plan) && !empty($activePlan) && $plan->id === $activePlan->plan_id): ?>
                                    <div class="gt-plan-body hidden-xs hidden-sm hidden-md">
                                        <ul class="gt-plan-desc">
                                            <li>
                                                <h3>Duration</h3>
                                                <h5 id="planduration28">
                                                    <?php echo e($plan->duration ?? ''); ?>

                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Messages</h3>
                                                <h5>
                                                    <?php echo e($plan->message ?? 'Unlimited'); ?>

                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Contact Views</h3>
                                                <h5>
                                                    <?php echo e($plan->allow_contact ?? ''); ?> </h5>
                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Live Chat</h3>
                                                <h5>
                                                    <?php echo e($plan->chat ?? 'Unlimited'); ?> </h5>
                                            </li>

                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div class="gt-plan-body hidden-xs hidden-sm hidden-md">
                                        <ul class="gt-plan-desc">
                                            <li>
                                                <h3>Duration</h3>
                                                <h5 id="planduration28">
                                                    <?php echo e($plan->duration ?? ''); ?>

                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Messages</h3>
                                                <h5>
                                                    <?php echo e($plan->message ?? 'Unlimited'); ?>

                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Contact Views</h3>
                                                <h5>
                                                    <?php echo e($plan->allow_contact ?? ''); ?> </h5>
                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Live Chat</h3>
                                                <h5>
                                                    <?php echo e($plan->chat ?? 'Unlimited'); ?> </h5>
                                            </li>

                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <form action="<?php echo e(route('order')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="planId" value="<?php echo e($plan->id ?? ''); ?>">

                                    <button type="submit" style="width: 263px;"
                                        class="gt-plan-footer hidden-xs hidden-sm hidden-md">
                                        Net Payable: ₹ <?php echo e($plan->offer_price > 0 ? $plan->offer_price : $plan->price); ?>

                                    </button>
                                </form>
                            </div>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="container gt-margin-top-10">
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\users\plans\plan.blade.php ENDPATH**/ ?>