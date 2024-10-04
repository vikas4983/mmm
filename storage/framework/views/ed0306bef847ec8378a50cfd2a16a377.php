
<?php $__env->startSection('title', 'Members | Admin'); ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <body class="navbar-fixed sidebar-fixed" id="body">
        <script>
            NProgress.configure({
                showSpinner: false
            });
            NProgress.start();
        </script>



        <!-- ====================================
                                                                                                                                                                    ——— WRAPPER
                                                                                                                                                                    ===================================== -->
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="content"><!-- For Components documentaion -->
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-xl-4 col-xxl-4">
                                <div class="card card-default mt-7">
                                    <div class="card-body">
                                        <a class="d-block mb-2" href="javascript:void(0)" data-toggle="modal"
                                            data-target="#modal-contact">
                                            <div class="image mb-3 d-inline-flex mt-n8">
                                                <img src="<?php echo e(asset('storage/admin/admin-images/' . $admin->image)); ?>"
                                                    class="img-fluid rounded-circle d-inline-block" alt="Avatar Image"
                                                    width="100px" width="70px">
                                            </div>
                                            <h5 class="card-title"><?php echo e($admin->name ?? ''); ?> (MM<?php echo e($admin->id); ?>) <i
                                                    class="mdi mdi-security"> </i>
                                                <i class=" mdi mdi-chess-queen"></i> <i class="mdi mdi-eye"></i>
                                            </h5>
                                        </a>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <ul class="list-unstyled d-inline-block mb-5">
                                                        <li class="d-flex mb-1">
                                                            <i class="mdi mdi-gmail mr-1"></i>
                                                            <span><?php echo e($admin->email ?? ''); ?></span>
                                                        </li>
                                                        <li class="d-flex">
                                                            <i class="mdi mdi-phone mr-1"></i>
                                                            <span><?php echo e($admin->mobile ?? ''); ?></span>
                                                        </li>
                                                        <?php if($admin->roll === 'Admin'): ?>
                                                            <li class="d-flex">
                                                                <i class="mdi mdi-account mr-1"></i>
                                                                <span><?php echo e($admin->roll); ?></span>
                                                            </li>
                                                        <?php else: ?>
                                                            <li class="d-flex">
                                                                <i class="mdi mdi-account mr-1"></i>
                                                                <span><?php echo e($admin->roll); ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if($admin->status === 'Active'): ?>
                                                            <li class="d-flex">
                                                                <i class="mdi mdi-thumb-up mr-1"></i>
                                                                <span><?php echo e($admin->status); ?></span>
                                                            </li>
                                                        <?php else: ?>
                                                            <li class="d-flex">
                                                                <i class="mdi mdi-thumb-down mr-1"></i>
                                                                <span><?php echo e($admin->status); ?></span>
                                                            </li>
                                                        <?php endif; ?>

                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="btn-group d-flex flex-row justify-content-between " role="group"
                                                aria-label="Basic example" style="width: 50px">
                                                <div class="d-flex flex-row">
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#exampleModal<?php echo e($admin->id); ?>"
                                                        class="mr-3 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <?php if (isset($component)) { $__componentOriginaldf8dad82159d82b8495c6758fc5363ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8dad82159d82b8495c6758fc5363ec = $attributes; } ?>
<?php $component = App\View\Components\DestroyActionButtonComponent::resolve(['destroyRoute' => route('admins.destroy', $admin->id),'id' => $admin->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('destroy-action-button-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\DestroyActionButtonComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8dad82159d82b8495c6758fc5363ec)): ?>
<?php $attributes = $__attributesOriginaldf8dad82159d82b8495c6758fc5363ec; ?>
<?php unset($__attributesOriginaldf8dad82159d82b8495c6758fc5363ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8dad82159d82b8495c6758fc5363ec)): ?>
<?php $component = $__componentOriginaldf8dad82159d82b8495c6758fc5363ec; ?>
<?php unset($__componentOriginaldf8dad82159d82b8495c6758fc5363ec); ?>
<?php endif; ?>
                                                </div>



                                            </div>
                                            <div class="modal fade" id="exampleModal<?php echo e($admin->id); ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel<?php echo e($admin->id); ?>"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-header d-flex justify-content-center">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel<?php echo e($admin->id); ?>">Admin Update</h5>
                                                            <button type="button" class="close position-absolute"
                                                                style="right: 1rem;" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>


                                                        <div class="modal-body">
                                                            <form id="adminForm"
                                                                action="<?php echo e(route('admins.update', $admin->id)); ?>"
                                                                method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="admin_id"
                                                                    value="<?php echo e($admin->id ?? ''); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('PATCH'); ?>
                                                                <div class="row ">
                                                                    <div class="form-group col-lg-6">
                                                                        <label for="image"> Image</label>
                                                                        <input type="file" name="image"
                                                                            class=" form-control input-lg" id="image"
                                                                            aria-describedby="nameHelp"
                                                                            value="<?php echo e($admin->image ?? ''); ?>">

                                                                    </div>
                                                                    <div class="form-group col-lg-6  mb-4">
                                                                        <label for="name"> Name</label>
                                                                        <input type="text" name="name"
                                                                            value="<?php echo e($admin->name ?? ''); ?>"
                                                                            class=" form-control input-lg"
                                                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e(Session::has('error')); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            id="name" aria-describedby="nameHelp"
                                                                            placeholder="Name">
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
                                                                    <div class="form-group col-lg-6 mb-4">
                                                                        <label for="email"> Email</label>
                                                                        <input type="email" name="email"
                                                                            value="<?php echo e($admin->email ?? ''); ?>"
                                                                            class="form-control input-lg" id="email"
                                                                            aria-describedby="emailHelp"
                                                                            placeholder="Username">
                                                                    </div>
                                                                    <div class="form-group col-lg-6 mb-4">
                                                                        <label for="number"> Mobile Number</label>
                                                                        <input type="text" name="mobile"
                                                                            class="form-control input-lg" id="mobile"
                                                                            placeholder="Mobile Number"
                                                                            value="<?php echo e($admin->mobile ?? ''); ?>">

                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <label for="password">Password</label>
                                                                        <input type="password" name="password"
                                                                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                            id="password" placeholder="Password">
                                                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <p class="invalid-feedback"><?php echo e($message); ?>

                                                                            </p>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                    </div>

                                                                    <div class="form-group col-lg-6">
                                                                        <label for="confirm-password">Confirm
                                                                            Password</label>
                                                                        <input type="password"
                                                                            name="password_confirmation"
                                                                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                            id="cpassword" placeholder="Confirm Password">
                                                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <p class="invalid-feedback"><?php echo e($message); ?>

                                                                            </p>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                        <p id="password-error-message"
                                                                            class="invalid-feedback"
                                                                            style="display: none;">Confirmation Passwords
                                                                            do not match!
                                                                        </p>
                                                                    </div>

                                                                    <div class="form-group col-lg-6">
                                                                        <div><label class="mr-3">Roll</label></div>
                                                                        <select name="status" class="form-control"
                                                                            id="status">
                                                                            <option value="1"
                                                                                <?php echo e($admin->roll == 'Admin' ? 'selected' : ''); ?>>
                                                                                Admin</option>
                                                                            <option value="0"
                                                                                <?php echo e($admin->roll == 'Sub-Admin' ? 'selected' : ''); ?>>
                                                                                Sub-Admin</option>
                                                                        </select>

                                                                    </div>

                                                                    <div class="form-group col-lg-6 mb-4">
                                                                        <div><label class="mr-3">Status</label></div>
                                                                        <select name="status" class="form-control"
                                                                            id="status">
                                                                            <option value="1"
                                                                                <?php echo e($admin->status == 'Active' ? 'selected' : ''); ?>>
                                                                                Active</option>
                                                                            <option value="0"
                                                                                <?php echo e($admin->status == 'Inactive' ? 'selected' : ''); ?>>
                                                                                InActive</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="d-flex justify-content-between mb-3">
                                                                        </div>
                                                                        <div class="text-center">
                                                                            <button type="submit" id="adminFormBtn"
                                                                                class="btn btn-primary mb-4">
                                                                                Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                        <!-- Contact Modal -->
                        <div class="modal fade" id="modal-contact" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Something else
                                                    here</a>
                                            </div>
                                        </div>

                                        <button type="button" class="btn-close-icon" data-dismiss="modal"
                                            aria-label="Close">
                                            <i class="mdi mdi-close"></i>
                                        </button>
                                    </div>

                                    <div class="modal-body pt-0">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <div class="profile-content-left px-4">
                                                    <div class="card text-center px-0 border-0">
                                                        <div class="card-img mx-auto">
                                                            <img class="rounded-circle" src="images/user/u6.jpg"
                                                                alt="user image">
                                                        </div>

                                                        <div class="card-body">
                                                            <h4 class="py-2">Albrecht Straub</h4>
                                                            <p>Albrecht.straub@gmail.com</p>
                                                            <a class="btn btn-primary btn-pill btn-lg my-4"
                                                                href="javascript:void(0)">Follow</a>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-between ">
                                                        <div class="text-center pb-4">
                                                            <h6 class="pb-2">1503</h6>
                                                            <p>Friends</p>
                                                        </div>

                                                        <div class="text-center pb-4">
                                                            <h6 class="pb-2">2905</h6>
                                                            <p>Followers</p>
                                                        </div>

                                                        <div class="text-center pb-4">
                                                            <h6 class="pb-2">1200</h6>
                                                            <p>Following</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="contact-info px-4">
                                                    <h4 class="mb-1">Contact Details</h4>
                                                    <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
                                                    <p>Albrecht.straub@gmail.com</p>
                                                    <p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
                                                    <p>+99 9539 2641 31</p>
                                                    <p class="text-dark font-weight-medium pt-4 mb-2">Birthday</p>
                                                    <p>Nov 15, 1990</p>
                                                    <p class="text-dark font-weight-medium pt-4 mb-2">Event</p>
                                                    <p>Lorem, ipsum dolor</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                

            </div>
        </div>





        <!-- Card Offcanvas -->
        





        <!--  -->







    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\admins\index.blade.php ENDPATH**/ ?>