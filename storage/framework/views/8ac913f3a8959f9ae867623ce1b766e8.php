
<?php $__env->startSection('title', 'Members | Admin'); ?>
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
                    <div class="row">
                        <?php if($spotelights ?? ''): ?>
                            <?php $__currentLoopData = $spotelights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spotelight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $payment = $spotelight->user->payments->last();
                                ?>
                                <div class="col-lg-4 col-xl-4 col-xxl-4">
                                    <div class="card card-default mt-7">
                                        <div class="card-body"
                                            <?php
$currentDate = \Carbon\Carbon::now();
    $spotLight = $spotelight->user->spotelights->last(); ?>
                                            <?php if($spotLight && $spotLight->is_spote_light == 'Active'): ?> style="background-color:#E8DAEF ; border-radius: 10px;"
    <?php else: ?>
        style="background-color: transparent;" <?php endif; ?>>
                                            <a class="d-block mb-2" href="javascript:void(0)" data-toggle="modal"
                                                data-target="#modal-contact-<?php echo e($spotelight->user->id); ?>">
                                                <div class="image mb-3 d-inline-flex mt-n8">
                                                    <img src="<?php echo e(asset('storage/admin/user-images/' . ($spotelight->user->image ?? 'male-default.jpg'))); ?>"
                                                        class="img-fluid rounded-circle d-inline-block" alt="Avatar Image"
                                                        width="100px" height="100px"
                                                        style="border: 2px solid #22ff00; padding: 2px; border-radius: 50%; box-sizing: border-box;">
                                                </div>

                                                <h5 class="card-title"><?php echo e($spotelight->user->name ?? ''); ?>

                                                    (<?php echo e($spotelight->user->id); ?>)
                                                    <i class="mdi mdi-security"> </i>
                                                    <?php if($spotelight->user->status == 'Active'): ?>
                                                        <i class="mdi mdi-eye" style="color:rgb(14, 193, 8)"></i>
                                                    <?php else: ?>
                                                    <?php endif; ?>
                                                    <?php if($payment->is_paid == 1): ?>
                                                        <i class="mdi mdi-chess-queen" style="color:#e90b0b"></i>
                                                    <?php else: ?>
                                                    <?php endif; ?>

                                                </h5>
                                            </a>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <ul class="list-unstyled d-inline-block mb-5">
                                                            <li class="d-flex mb-1">
                                                                <i class="mdi mdi-gmail mr-1"></i>
                                                                <span><?php echo e(Str::limit($spotelight->user->email ?? '', 20)); ?></span>
                                                            </li>
                                                            <li class="d-flex mb-1">
                                                                <i class="mdi mdi-phone mr-1"></i>
                                                                <span>8770745851</span>
                                                            </li>
                                                            <li class="d-flex mb-1">
                                                                <i class="mdi mdi-calendar-clock mr-1"></i>
                                                                <span>

                                                                    <h6> <?php echo e(isset($payment) ? \Carbon\Carbon::parse($payment->expiry_date)->format('d-M-Y') : ''); ?>

                                                                    </h6>
                                                                </span>
                                                            </li>
                                                            <li class="d-flex mb-1 ">
                                                                <i class="mdi mdi-chess-queen mr-1"></i>
                                                                <span>
                                                                    <h6><?php echo e($payment->plan->name ?? ''); ?></h6>
                                                                </span>
                                                            </li>
                                                            <li class="d-flex mb-1">
                                                                <i class="mdi mdi-contacts mr-1"></i>
                                                                <span>
                                                                    <h6><?php echo e($payment->contact ?? ''); ?></h6>
                                                                </span>
                                                            </li>

                                                            <?php if($spotLight && $spotLight->is_spote_light == 'Active'): ?>
                                                                <li class="d-flex mb-1">
                                                                    <i class="mdi mdi-eye-plus mr-1"></i>
                                                                    <span>
                                                                        <h6><?php echo e(\Carbon\Carbon::parse($spotLight->duration)->format('d-M-Y')); ?>

                                                                        </h6>
                                                                    </span>
                                                                </li>
                                                            <?php endif; ?>


                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- Contact Modal -->

                                <div class="modal fade" id="modal-contact-<?php echo e($spotelight->user->id); ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-end border-bottom-0">
                                                <button type="button" class="btn-edit-icon" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>

                                                <div class="dropdown">
                                                    <button class="btn-dots-icon" type="button" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="dropdownMenuButton">
                                                        
                                                        <?php if(!empty($spotelight->is_spote_light == 'Active')): ?>
                                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                                data-target="#exampleModal-editSpoteLight<?php echo e($spotelight->user->id); ?>">
                                                                <i class="mdi mdi-wallet-membership"></i>Edit Spote Light
                                                            </button>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                        <a class="dropdown-item" href="javascript:void(0)">Another
                                                            action</a>
                                                        <a class="dropdown-item" href="javascript:void(0)">Something else
                                                            here</a>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="modal fade"
                                                id="exampleModal-editSpoteLight<?php echo e($spotelight->user->id); ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex justify-content-center">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Spote Light
                                                            </h5>
                                                            <button type="button" class="close position-absolute"
                                                                style="right: 1rem;" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="<?php echo e(route('spotelights.update', $spotelight->user->id)); ?>"
                                                                method="post" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('Patch'); ?>
                                                                <input type="hidden" name="user_id"
                                                                    value="<?php echo e($spotelight->user->id); ?>">
                                                                <div class="form-group">
                                                                    <label>Spote Light</label>
                                                                    <p>Enter Days Number</p>
                                                                    <input type="number" class="form-control"
                                                                        name="duration" id="duration" required>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-primary">Submit</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body pt-0">
                                                <div class="row no-gutters">
                                                    <div class="col-md-6">
                                                        <div class="profile-content-left px-4">
                                                            <div class="card text-center px-0 border-0">
                                                                <div class="card-img mx-auto">
                                                                    <img class="rounded-circle"
                                                                        src="<?php echo e(asset('storage/admin/user-images/male-default.jpg')); ?>"
                                                                        alt="user image">
                                                                </div>

                                                                <div class="card-body">
                                                                    <h4 class="py-2">
                                                                        
                                                                        <?php $__currentLoopData = $profilePrefixs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profilePrefix): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php echo e($spotelight->user->name ?? ''); ?>(<?php echo e($profilePrefix->name ?? ''); ?>-<?php echo e($spotelight->user->id ?? ''); ?>)
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </h4>
                                                                    <p><?php echo e(str::limit($spotelight->user->email ?? '', 30)); ?>

                                                                    </p>
                                                                    <p><?php echo e(str::limit($spotelight->user->mobile ?? '', 30)); ?>

                                                                    </p>
                                                                    <a class="btn btn-primary btn-pill btn-lg my-4"
                                                                        href="javascript:void(0)">Follow</a>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex justify-content-between ">
                                                                <div class="text-center pb-4">
                                                                    <h6 class="pb-2">1503</h6>
                                                                    <p>Invitation</p>
                                                                </div>

                                                                <div class="text-center pb-4">
                                                                    <h6 class="pb-2">2905</h6>
                                                                    <p>Received</p>
                                                                </div>

                                                                <div class="text-center pb-4">
                                                                    <h6 class="pb-2">1200</h6>
                                                                    <p>Accepted</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="contact-info px-4">
                                                            <h4 class="mb-1">Basic Details</h4>
                                                            <div class="row">
                                                                <div class="col mt-3">
                                                                    <ul class="list-unstyled d-inline-block mb-5">

                                                                        <li class="d-flex mb-1">
                                                                            <i class="mdi mdi-account-clock mr-1"></i>
                                                                            <span>
                                                                                <h6>
                                                                                    <?php echo e(isset($spotelight->user->created_at) ? \Carbon\Carbon::parse($spotelight->user->created_at)->isoFormat('DD-MMM-YYYY hh:mma') : ''); ?>

                                                                                </h6>
                                                                            </span>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            <i class="mdi mdi-heart-half mr-1"></i>
                                                                            <span>
                                                                                <h6>Never Married</h6>
                                                                            </span>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            <i class="mdi mdi-calendar mr-1"></i>
                                                                            <span>
                                                                                <h6>26 apr 1994</h6>
                                                                            </span>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            <i class="mdi mdi-ruler mr-1"></i>
                                                                            <h6><span>4ft 10in - 147cm</span></h6>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            <i class="mdi mdi-book mr-1"></i>
                                                                            <span>
                                                                                <h6>BA</h6>
                                                                            </span>
                                                                        </li>

                                                                    </ul>

                                                                </div>

                                                                <div class="col mt-3">
                                                                    <ul class="list-unstyled d-inline-block mb-5">
                                                                        <li class="d-flex mb-1">
                                                                            <i class="mdi mdi-human-male mr-1 "></i>
                                                                            <span>
                                                                                <h6>Male</h6>
                                                                            </span>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            <i class="mdi mdi-earth mr-1"></i>
                                                                            <span>
                                                                                <h6>India</h6>
                                                                            </span>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            <i class="mdi mdi-city mr-1"></i>
                                                                            <span>
                                                                                <h6>Delhi</h6>
                                                                            </span>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            <i class="mdi mdi-hinduism mr-1"></i>
                                                                            <span>
                                                                                <h6>Hindu</h6>
                                                                            </span>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            <i class="mdi mdi-star-box mr-1"></i>
                                                                            <span>
                                                                                <h6>Agrawal</h6>
                                                                            </span>
                                                                        </li>

                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="contact-info px-4">
                                                            <h4 class="mb-1">Current Plan</h4>
                                                            <div class="row">
                                                                <div class="col mt-3">
                                                                    <ul class="list-unstyled d-inline-block mb-5">

                                                                        <li class="d-flex mb-1">
                                                                            <i class="mdi mdi-chess-queen mr-1"></i>
                                                                            <span>
                                                                                <h6>Name</h6>
                                                                            </span>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            <i class="mdi mdi-contacts mr-1"></i>
                                                                            <span>
                                                                                <h6>Left Contact</h6>
                                                                            </span>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            <i class="mdi mdi-calendar-clock mr-1"></i>
                                                                            <span>
                                                                                <h6>Expiry Date</h6>
                                                                            </span>
                                                                        </li>

                                                                    </ul>

                                                                </div>

                                                                <div class="col mt-3">
                                                                    <ul class="list-unstyled d-inline-block mb-5">
                                                                        <li class="d-flex mb-1">
                                                                            
                                                                            <span>
                                                                                <h6><?php echo e($payment->plan->name ?? ''); ?></h6>
                                                                            </span>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            
                                                                            <span>
                                                                                <h6><?php echo e($payment->contact ?? ''); ?>

                                                                                </h6>
                                                                            </span>
                                                                        </li>
                                                                        <li class="d-flex mt-2">
                                                                            
                                                                            <span>
                                                                                <h6>
                                                                                    <?php echo e(isset($payment->expiry_date) ? \Carbon\Carbon::parse($payment->expiry_date)->format('d-M-Y') : ''); ?>

                                                                                </h6>
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    .modal {
                                        z-index: 1050;
                                        /* Default for Bootstrap modals */
                                    }

                                    .modal.show {
                                        z-index: 1060;
                                        /* Increase for showing modal */
                                    }
                                </style>
                                <script>
                                    $('#modal-contact-').on('hidden.bs.modal', function() {
                                        $('#exampleModal').modal('show');
                                    });
                                </script>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\spotelights\index.blade.php ENDPATH**/ ?>