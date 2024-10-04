<?php if($activeUsers ?? ''): ?>
    <?php $__currentLoopData = $activeUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activeUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-xl-4 col-xxl-4">
            <div class="card card-default mt-7">
                <div class="card-body"
                    <?php
$currentDate = \Carbon\Carbon::now();
    $spotLight = $activeUser->spotelights->last(); ?>
                    <?php if($spotLight && $spotLight->is_spote_light == 'Active'): ?> style="background-color:#E8DAEF ; border-radius: 10px;"
    <?php else: ?>
        style="background-color: transparent;" <?php endif; ?>>
                    <a class="d-block mb-2" href="javascript:void(0)" data-toggle="modal"
                        data-target="#modal-contact-<?php echo e($activeUser->id); ?>">
                        <div class="image mb-3 d-inline-flex mt-n8">
                            <img src="<?php echo e(asset('storage/admin/user-images/' . ($activeUser->image ?? 'male-default.jpg'))); ?>"
                            class="img-fluid rounded-circle d-inline-block" alt="Avatar Image" width="100px"
                            height="100px"
                            style="border: 2px solid #22ff00; padding: 2px; border-radius: 50%; box-sizing: border-box;">
                        </div>
                        <h5 class="card-title"><?php echo e($activeUser->name ?? ''); ?> (<?php echo e($activeUser->id); ?>)
                            <i class="mdi mdi-security"></i>
                            <?php if($activeUser->status == 'Active'): ?>
                                <i class="mdi mdi-eye" style="color:rgb(13, 227, 6)"></i>
                            <?php endif; ?>
                            <?php if($activeUser->payments->isNotEmpty() && $activeUser->payments->last()->is_paid == 'Active'): ?>
                                <i class="mdi mdi-chess-queen" style="color:#e90b0b"></i>
                            <?php endif; ?>
                        </h5>
                    </a>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <ul class="list-unstyled d-inline-block mb-5">
                                    <li class="d-flex mb-1">
                                        <i class="mdi mdi-gmail mr-1"></i>
                                        <span><?php echo e(Str::limit($activeUser->email ?? '', 20)); ?></span>
                                    </li>
                                    <li class="d-flex">
                                        <i class="mdi mdi-phone mr-1"></i>
                                        <span>8770745851</span>
                                    </li>
                                    <li class="d-flex mb-1">
                                        <i class="mdi mdi-led-strip mr-1"></i>
                                        <span>5'10" (120cm)</span>
                                    </li>
                                    <li class="d-flex">
                                        <i class="mdi mdi-heart-half-full mr-1"></i>
                                        <span>Never Married</span>
                                    </li>
                                    <?php if($spotLight && $spotLight->is_spote_light == 'Active'): ?>
                                        <li class="d-flex ">
                                            <i class="mdi mdi-eye-plus mr-1"></i>
                                            <span>
                                                <h6><?php echo e(\Carbon\Carbon::parse($spotLight->duration)->format('d-M-Y') ?? ''); ?>

                                                </h6>
                                            </span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-unstyled d-inline-block mb-5">
                                    <li class="d-flex mb-1">
                                        <i class="mdi mdi-human-male mr-1"></i>
                                        <span>Male</span>
                                    </li>
                                    <li class="d-flex">
                                        <i class="mdi mdi-calendar mr-1"></i>
                                        <span>26 Apr 1994 (29 Years)</span>
                                    </li>
                                    <li class="d-flex mb-1">
                                        <i class="mdi mdi-hinduism mr-1"></i>
                                        <span>Hindu</span>
                                    </li>
                                    <li class="d-flex">
                                        <i class="mdi mdi-star-box mr-1"></i>
                                        <span>Agrawal</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Unique Contact Modal -->
        <div class="modal fade" id="modal-contact-<?php echo e($activeUser->id); ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-end border-bottom-0">
                        <button type="button" class="btn-edit-icon" data-dismiss="modal" aria-label="Close">
                            <i class="mdi mdi-pencil"></i>
                        </button>
                        <div class="dropdown">
                            <button class="btn-dots-icon" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <?php if($activeUser->payments->isNotEmpty()): ?>
                                    <?php
                                        $activePlan = $activeUser->payments->last();
                                        $expiryDate = \Carbon\Carbon::parse($activePlan->expiry_date);
                                        $currentDate = \Carbon\Carbon::now();
                                    ?>

                                    <?php if($expiryDate >= $currentDate): ?>
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#exampleModal-editPlan<?php echo e($activeUser->id); ?>">
                                            <i class="mdi mdi-wallet-membership"></i> Edit Plan
                                        </button>
                                    <?php else: ?>
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#exampleModal-upgradePlan<?php echo e($activeUser->id); ?>">
                                            <i class="mdi mdi-wallet-membership"></i> Upgrade Plan
                                        </button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                        data-target="#exampleModal-upgradePlan<?php echo e($activeUser->id); ?>">
                                        <i class="mdi mdi-wallet-membership"></i> Upgrade Plan
                                    </button>
                                <?php endif; ?>


                                <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                            </div>
                        </div>
                        <button type="button" class="btn-close-icon" data-dismiss="modal" aria-label="Close">
                            <i class="mdi mdi-close"></i>
                        </button>
                    </div>




                    <!-- Upgrade Plan Modal -->
                    <?php if(!empty($activeUser)): ?>
                        <?php if (isset($component)) { $__componentOriginal0159ea5c86db2bbee810ee8cce9b8f10 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0159ea5c86db2bbee810ee8cce9b8f10 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.upgrade-plan-component','data' => ['activeUser' => $activeUser]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('upgrade-plan-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['activeUser' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($activeUser)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0159ea5c86db2bbee810ee8cce9b8f10)): ?>
<?php $attributes = $__attributesOriginal0159ea5c86db2bbee810ee8cce9b8f10; ?>
<?php unset($__attributesOriginal0159ea5c86db2bbee810ee8cce9b8f10); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0159ea5c86db2bbee810ee8cce9b8f10)): ?>
<?php $component = $__componentOriginal0159ea5c86db2bbee810ee8cce9b8f10; ?>
<?php unset($__componentOriginal0159ea5c86db2bbee810ee8cce9b8f10); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <div class="modal-body pt-0">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <div class="profile-content-left px-4">
                                    <div class="card text-center px-0 border-0">
                                        <div class="card-img mx-auto">
                                            <img class="rounded-circle"
                                                src="<?php echo e(asset('storage/admin/user-images/' . ($activeUser->image ?? 'male-default.jpg'))); ?>"
                                                alt="user image">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="py-2"><?php echo e($activeUser->name ?? ''); ?></h4>
                                            <p><?php echo e($activeUser->email ?? ''); ?></p>
                                            <a class="btn btn-primary btn-pill btn-lg my-4"
                                                href="javascript:void(0)">Follow</a>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <div class="text-center pb-4">
                                            <h6 class="pb-2">1503</h6>
                                            <p>Request</p>
                                        </div>
                                        <div class="text-center pb-4">
                                            <h6 class="pb-2">2905</h6>
                                            <p>Accepted</p>
                                        </div>
                                        <div class="text-center pb-4">
                                            <h6 class="pb-2">1200</h6>
                                            <p>Sent</p>
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
                                                            <?php echo e(isset($activeUser->created_at) ? \Carbon\Carbon::parse($activeUser->created_at)->isoFormat('DD-MMM-YYYY hh:mma') : ''); ?>

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
                                <?php if($activeUser->payments->isNotEmpty()): ?>
                                    <?php
                                        $activePlan = $activeUser->payments->last();
                                        $expiryDate = \Carbon\Carbon::parse($activePlan->expiry_date);
                                    ?>

                                    <?php if($expiryDate->isFuture()): ?>
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
                                                                <h6><?php echo e($activePlan->plan->name ?? 'No plan info'); ?>

                                                                </h6>
                                                            </span>
                                                        </li>
                                                        <li class="d-flex mt-2">
                                                            <span>
                                                                <h6><?php echo e($activePlan->contact ?? 'No contact info'); ?>

                                                                </h6>
                                                            </span>
                                                        </li>
                                                        <li class="d-flex mt-2">
                                                            <span>
                                                                <?php echo e($activePlan->expiry_date ? $expiryDate->format('d-M-Y') : ''); ?>

                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal-upgradePlan<?php echo e($activeUser->id); ?>">
                                                <i class="mdi mdi-wallet-membership"></i> Upgrade Plan
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal-upgradePlan<?php echo e($activeUser->id); ?>">
                                            <i class="mdi mdi-wallet-membership"></i> Upgrade Plan
                                        </button>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\active-users-component.blade.php ENDPATH**/ ?>