<?php $__env->startSection('content'); ?>
    
    <div class="content-wrapper">
        <div class="content">
            
            

            <div class="row">
                <div class="col-xl-3">
                    <!-- Settings -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>Settings</h2>
                        </div>

                        <div class="card-body pt-0">

                            <ul class="nav nav-settings">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('myprofile.index')); ?>">
                                        <i class="mdi mdi-account-outline mr-1"></i> Profile
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link active" href="user-planing-settings.html">
                                        <i class="mdi mdi-currency-usd mr-1"></i> Planing
                                    </a>
                                </li>
                                
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-xl-9">
                    <!-- Choose Your Plan -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h2 class="mb-5">Choose Your Plan</h2>
                        </div>

                        <div class="card-body">
                            <div class="row justify-content-center">
                                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="card card-default">
                                            <?php if($latestPayment ?? ''): ?>
                                                <?php if($latestPayment->plan_id === $plan->id): ?>
                                                    <?php if($expiryDate > $currentDate): ?>
                                                        <div class="btn btn-primary">
                                                            Your Active plan
                                                        </div>
                                                    <?php else: ?>
                                                        <!-- Plan is not active -->
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <div class="card-header align-items-center flex-column">
                                                <h5 class="h4 mb-2"><i
                                                        class="mdi mdi-chess-queen text-primary"></i><?php echo e($plan->name); ?>

                                                </h5>

                                                <p class="text-right">For - <?php echo e($plan->duration); ?> Days</p>
                                                <p class="text-center"><strong style="color: rgb(255, 99, 71)">
                                                        <?php echo e($plan->offer); ?> Off </strong>
                                                    ₹<?php echo e($plan->price); ?></p>
                                            </div>
                                            <div class="card-body d-flex flex-column" style="min-height: 350px">
                                                <ul class="d-flex flex-column align-items-center">
                                                    <li class="h2 text-primary mb-5">
                                                        ₹<?php echo e(number_format($plan->offer_price, 0, '.', ',')); ?>

                                                        <p class="text-center h6 " style="color: rgb(138,154,195)">
                                                            ₹<?php echo e(number_format($plan->per_month, 0, '.', ',')); ?> Per Day</p>
                                                    </li>
                                                </ul>

                                                <ul>
                                                    <li class=" text-center mb-3 text-dark font-weight-bold">
                                                        <i class="mdi mdi-phone text-primary"></i>
                                                        View Contacts
                                                        <p class=" h4 d-flex flex-column align-items-center"><strong
                                                                style="color: rgb(255, 99, 71)">
                                                                <?php echo e($plan->allow_contact); ?> </strong></p>
                                                    </li>
                                                    <li class=" text-center mb-3 text-dark font-weight-bold">
                                                        <i class="mdi mdi-message-text text-primary"></i>
                                                        Send Messages
                                                        <p class=" h4 d-flex flex-column align-items-center"><strong
                                                                style="color: rgb(255, 99, 71)">
                                                                <?php echo e($plan->message); ?> </strong></p>

                                                    </li>
                                                    <li class=" text-center mb-3 text-dark font-weight-bold">
                                                        <i class="mdi mdi-chat text-primary"></i>
                                                        Unlimited Chat
                                                        <p class=" h4 d-flex flex-column align-items-center"><strong
                                                                style="color: rgb(255, 99, 71)">
                                                                <?php echo e($plan->chat); ?> </strong></p>
                                                    </li>
                                                    <li class=" text-center mb-3 text-dark font-weight-bold">
                                                        <i class="mdi mdi-video text-primary"></i>
                                                        Video Call
                                                        <p class=" h4 d-flex flex-column align-items-center"><strong
                                                                style="color: rgb(255, 99, 71)">
                                                                <?php echo e($plan->video_call); ?> </strong></p>
                                                    </li>
                                                </ul>
                                                <div class="d-flex justify-content-center mt-auto">
                                                    
                                                    <form action="<?php echo e(route('razorpay.payment.store')); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="plan_id" id="plan_id"
                                                            value="<?php echo e($plan->id); ?>">
                                                        <input type="hidden" name="admin_id" id="admin_id"
                                                            value="<?php echo e(Auth::user()->id); ?>">
                                                        <input type="hidden" name="order_id" id="order_id"
                                                            value="<?php echo e(rand(1000, 99999)); ?>">
                                                        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo e(env('RAZORPAY_KEY')); ?>"
                                                            data-amount="<?php echo e($plan->offer_price * 100 ?? ''); ?>" data-prefill.contact="<?php echo e($admin->contact ?? '8770745845'); ?>"
                                                            data-buttontext="Pay <?php echo e($plan->offer_price); ?> INR" data-name="Mangal Mandap" data-description="Rozerpay"
                                                            data-image="https://mangalmandap.com/images/mangal_logo.jpg" data-prefill.name=<?php echo e($admin->name ?? ''); ?>

                                                            data-prefill.email=<?php echo e($admin->email ?? ''); ?> data-theme.color="#ff7529"></script>
                                                    </form>
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            // Wait for the document to be ready

                                                            // Get the element
                                                            var elements = document.getElementsByClassName('razorpay-payment-button');
                                                            console.log("DOMContentLoaded razorpay-payment-button: ", elements);

                                                            // Replace the source class with the target class
                                                            if (elements) {
                                                                for (var i = 0; i < elements.length; i++) {
                                                                    var element = elements[i];

                                                                    // Replace the source class with the target classes
                                                                    if (element) {
                                                                        element.classList.remove('razorpay-payment-button');
                                                                        element.classList.add('btn', 'btn-outline-primary', 'btn-pill');
                                                                    }
                                                                }
                                                            }


                                                        });
                                                    </script>


                                                    <div class="modal fade" id="<?php echo e($plan->id); ?>" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalFormTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header"
                                                                    style="background-color: #9E6DE0 ">
                                                                    <h5 class="modal-title" id="exampleModalFormTitle">
                                                                        <p style="color: rgb(255, 255, 255)">Order Summary
                                                                        </p>
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true"
                                                                            style="color: rgb(255, 250, 249)">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div
                                                                        style="display: flex; justify-content: space-between; align-items: center;  padding: 10px; margin-bottom: 10px;">
                                                                        <div style="flex-grow: 1;">
                                                                            <h5><strong><?php echo e($plan->name); ?>

                                                                                    (<?php echo e($plan->duration); ?>

                                                                                    Days)
                                                                                </strong></h5>
                                                                            <p>
                                                                            <h5 style="color: green">Saving
                                                                                (<?php echo e($plan->offer); ?>% Off)
                                                                            </h5>
                                                                            </p>
                                                                        </div>
                                                                        <div style="margin-left: 10px; color:black">
                                                                            <p>
                                                                            <h5>₹<?php echo e(number_format($plan->price, 0, '.', ',')); ?>

                                                                            </h5>
                                                                            </p>
                                                                            <p>
                                                                            <h5>-₹<?php echo e(number_format($plan->saving, 0, '.', ',')); ?>

                                                                            </h5>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div
                                                                        style="display: flex; justify-content: space-between; align-items: center;  padding: 10px; margin-bottom: 10px;">
                                                                        <div style="flex-grow: 1;">
                                                                            <h5><strong style="color: #9E6DE0">Total Amount
                                                                                </strong></h5>
                                                                            
                                                                        </div>
                                                                        <div style="margin-left: 10px; color:black">
                                                                            <h5> ₹<?php echo e(number_format($plan->offer_price, 0, '.', ',')); ?>

                                                                            </h5>
                                                                        </div>


                                                                    </div>


                                                                    <i class="mdi mdi-emoticon-happy"
                                                                        style="color: #9E6DE0"></i> You are saving
                                                                    <span style="color: green">
                                                                        ₹<?php echo e(number_format($plan->saving, 0, '.', ',')); ?></span>
                                                                    on this order

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="<?php echo e(url('admin/razorpay-payment')); ?>"
                                                                        method="get">
                                                                        <?php echo csrf_field(); ?>

                                                                        
                                                                        
                                                                        <input type="hidden" name="plan_id"
                                                                            value="<?php echo e($plan->id ?? ''); ?>">

                                                                        <button type="submit "
                                                                            class="btn btn-primary btn-pill">
                                                                            Continue
                                                                        </button>
                                                                    </form>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\plans\plan.blade.php ENDPATH**/ ?>