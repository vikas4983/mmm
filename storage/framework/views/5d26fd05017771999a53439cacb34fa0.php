
<?php $__env->startSection('title', 'Members | Admin'); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <style>
        /* Ensure the nav container uses Flexbox and centers its items */
        .nav-custom-pills {
            display: flex;
            justify-content: center;
            /* Center horizontally */
            flex-wrap: nowrap;
            /* Prevent wrapping */
        }

        .nav-custom-pills .nav-item {
            margin: 0 5px;
            /* Adjust spacing between nav items */
        }

        .nav-custom-pills .nav-link {
            padding: 10px 20px;
            /* Adjust padding if needed */
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <body class="navbar-fixed sidebar-fixed" id="body">
        <script>
            NProgress.configure({
                showSpinner: false
            });
            NProgress.start();
        </script>
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="content">
                    
                    <ul class="nav nav-custom-pills mb-3" id="pills-tab-custom" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active " id="pills-home-tab" data-toggle="pill" href="#pills-home-custom-pill"
                                role="tab" aria-controls="pills-home" aria-selected="true"> <?php echo e($order->payments_count ?? ''); ?> Premium Users Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#pills-profile-custom-pill"
                                role="tab" aria-controls="pills-profile" aria-selected="false">Free Users Orders</a>
                        </li>
                       
                    </ul>
                    <div class="tab-content mt-5" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="pills-home-custom-pill" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <?php if($orders ?? ''): ?>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                                <div class="accordion" id="accordion<?php echo e($order->id ?? ''); ?>">
                                    <div class="card">
                                        <div class="card-header" id="heading<?php echo e($order->id ?? ''); ?>">
                                            <h2>
                                                <?php $__currentLoopData = $profilePrefixs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profilePrefix): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse<?php echo e($order->id ?? ''); ?>" aria-expanded="false"
                                                    aria-controls="collapse<?php echo e($order->id ?? ''); ?>">
                                                    <i class="mdi mdi-account-card-details"></i>
                                                    <span><?php echo e($order->name ?? ''); ?>(<?php echo e($profilePrefix->name ?? ''); ?>-<?php echo e($order->id ?? ''); ?>)
                                                        | <?php echo e($order->mobiles ?? '30 Years'); ?> |
                                                        <?php echo e($order->mobiles ?? "5'10'"); ?> |
                                                        <?php echo e($order->email ?? ''); ?> | <?php echo e($order->mobile ?? ''); ?> |
                                                        <?php echo e($order->mobiles ?? 'Male'); ?> |
                                                        <?php echo e($order->mobiles ?? 'Never Married'); ?>

                                                        | <?php echo e($order->mobiles ?? 'Delhi'); ?> |</span>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapse<?php echo e($order->id ?? ''); ?>" class="collapse"
                                            aria-labelledby="heading<?php echo e($order->id ?? ''); ?>"
                                            data-parent="#accordion<?php echo e($order->id ?? ''); ?>">
                                            <div class="card-body">
                                                <table id="productsTable" class="table table-hover table-product"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Image</th>
                                                            <th>Status</th>
                                                            <th>Mode</th>
                                                            <th>Amount</th>
                                                            <th>Offer</th>
                                                            <th>Plan</th>
                                                            <th>Start</th>
                                                            <th>End</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $order->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr
                                                                <?php if($payment->is_paid == 'Active'): ?> style="background-color: #6effbb" <?php endif; ?>>
                                                                <td class="py-0">
                                                                    <?php echo e($payment->id ?? ''); ?> <img
                                                                        src="<?php echo e(asset('storage/admin/user-images/' . ($order->image ?? 'male-default.jpg'))); ?>"
                                                                        alt="Product Image">
                                                                </td>
                                                                <td>
                                                                    <?php if($payment->is_paid == 'Active'): ?>
                                                                        Active
                                                                    <?php else: ?>
                                                                        InActive
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if($payment->plan->razorpays->isNotEmpty()): ?>
                                                                        <?php echo e($payment->plan->razorpays->first()->method ?? 'Null'); ?>

                                                                    <?php else: ?>
                                                                        Null
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e($payment->plan->offer_price ?? ''); ?></td>
                                                                <td><?php echo e($payment->plan->saving ?? ''); ?></td>
                                                                <td><?php echo e($payment->plan->name ?? ''); ?></td>
                                                                <td><?php echo e(\Carbon\Carbon::parse($payment->created_at)->format('d-M-Y') ?? ''); ?>

                                                                </td>
                                                                <td><?php echo e(\Carbon\Carbon::parse($payment->expiry_date)->format('d-M-Y') ?? ''); ?>

                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane fade" id="pills-profile-custom-pill" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <?php if($freeUsersOrders ?? ''): ?>
                            <?php $__currentLoopData = $freeUsersOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freeUsersOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="accordion" id="accordion-freeUsersOrder<?php echo e($freeUsersOrder->id); ?>">
                                    <div class="card">
                                        <div class="card-header" id="heading-freeUsersOrder<?php echo e($freeUsersOrder->id ?? ''); ?>">
                                            <h2>
                                                
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse-freeUsersOrder<?php echo e($freeUsersOrder->id ?? ''); ?>" aria-expanded="false"
                                                    aria-controls="collapse-freeUsersOrder<?php echo e($freeUsersOrder->id ?? ''); ?>">
                                                    <i class="mdi mdi-account-card-details"></i>
                                                    <span><?php echo e($freeUsersOrder->name ?? ''); ?>(<?php echo e($profilePrefix->name ?? ''); ?>-<?php echo e($freeUsersOrder->id ?? ''); ?>)
                                                        | <?php echo e($freeUsersOrder->mobiles ?? '30 Years'); ?> |
                                                        <?php echo e($freeUsersOrder->mobiles ?? "5'10'"); ?> |
                                                        <?php echo e($freeUsersOrder->email ?? ''); ?> | <?php echo e($freeUsersOrder->mobile ?? ''); ?> |
                                                        <?php echo e($freeUsersOrder->mobiles ?? 'Male'); ?> |
                                                        <?php echo e($freeUsersOrder->mobiles ?? 'Never Married'); ?>

                                                        | <?php echo e($freeUsersOrder->mobiles ?? 'Delhi'); ?> |</span>
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapse-freeUsersOrder<?php echo e($freeUsersOrder->id ?? ''); ?>" class="collapse"
                                            aria-labelledby="heading-freeUsersOrder<?php echo e($freeUsersOrder->id ?? ''); ?>"
                                            data-parent="#accordion-freeUsersOrder<?php echo e($freeUsersOrder->id ?? ''); ?>">
                                            <div class="card-body">
                                                <table id="productsTable" class="table table-hover table-product"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Image</th>
                                                            <th>Status</th>
                                                            <th>Mode</th>
                                                            <th>Amount</th>
                                                            <th>Offer</th>
                                                            <th>Plan</th>
                                                            <th>Start</th>
                                                            <th>End</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php $__currentLoopData = $freeUsersOrder->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freepayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr
                                                               
                                                                <?php if($freepayment->is_paid == 'Active'): ?> style="background-color: #6effbb" <?php endif; ?>>
                                                                <td class="py-0">
                                                                    <?php echo e($freepayment->id ?? ''); ?> <img
                                                                        src="<?php echo e(asset('storage/admin/user-images/' . ($order->image ?? 'male-default.jpg'))); ?>"
                                                                        alt="Product Image">
                                                                </td>
                                                                <td>
                                                                    <?php if($freepayment->is_paid == 'Active'): ?>
                                                                        Active
                                                                    <?php else: ?>
                                                                        InActive
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if($freepayment->plan->razorpays->isNotEmpty()): ?>
                                                                        <?php echo e($freepayment->plan->razorpays->first()->method ?? 'Null'); ?>

                                                                    <?php else: ?>
                                                                        Null
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e($freepayment->plan->offer_price ?? ''); ?></td>
                                                                <td><?php echo e($freepayment->plan->saving ?? ''); ?></td>
                                                                <td><?php echo e($freepayment->plan->name ?? ''); ?></td>
                                                                <td><?php echo e(\Carbon\Carbon::parse($freepayment->created_at)->format('d-M-Y') ?? ''); ?>

                                                                </td>
                                                                <td><?php echo e(\Carbon\Carbon::parse($freepayment->expiry_date)->format('d-M-Y') ?? ''); ?>

                                                                </td>
                                                            </tr>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\users\orders.blade.php ENDPATH**/ ?>