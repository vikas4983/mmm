
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
                        <!-- Frist box -->
                        <div class="col-xl-3 col-md-6">
                              <a href="<?php echo e(route('users.index')); ?>" class="text-decoration-none">
                            <div class="card card-default bg-secondary">
                                <div class="d-flex p-5">
                                    <div class="icon-md bg-white rounded-circle mr-3">
                                        <i class="mdi mdi-account-plus-outline text-secondary"></i>
                                    </div>
                                    <div class="text-left">
                                        <span class="h2 d-block text-white"><?php echo e($countAll ?? ''); ?></span>
                                        <p class="text-white">All Users</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Second box -->
                        <div class="col-xl-3 col-md-6">
                              <a href="<?php echo e(route('users.index',['paidUsers' => 'users'])); ?>" class="text-decoration-none">
                            <div class="card card-default bg-success">
                                <div class="d-flex p-5">
                                    <div class="icon-md bg-white rounded-circle mr-3">
                                        <i class="mdi mdi-chess-queen" style="color:#FD5190"></i>
                                    </div>
                                    <div class="text-left">
                                        <span class="h2 d-block text-white"><?php echo e($premiumUsersCount ?? ''); ?></span>
                                        <p class="text-white">Premium Users</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Third box -->
                        <div class="col-xl-3 col-md-6">
                              <a href="<?php echo e(route('users.index', ['activeUsers' => 'Users'])); ?>" class="text-decoration-none">
                            <div class="card card-default bg-primary">
                                <div class="d-flex p-5">
                                    <div class="icon-md bg-white rounded-circle mr-3">
                                        <i class="mdi mdi-account-multiple-check" style="color:#FD5190"></i>
                                    </div>
                                    <div class="text-left">
                                        <span class="h2 d-block text-white"><?php echo e($active ?? ''); ?></span>
                                        <p class="text-white">Active Users</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Fourth box -->
                        <div class="col-xl-3 col-md-6">
                              <a href="<?php echo e(route('users.index', ['inActiveUsers' => 'Users'])); ?>" class="text-decoration-none">
                            <div class="card card-default bg-info">
                                <div class="d-flex p-5">
                                    <div class="icon-md bg-white rounded-circle mr-3">
                                        <i class="mdi mdi-account-off" style="color:#FD5190"></i>
                                    </div>
                                    <div class="text-left">
                                        <span class="h2 d-block text-white"><?php echo e($inActive ?? ''); ?></span>
                                        <p class="text-white">InActive Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>


                    <div class="row">
                        <?php if(!empty($users)): ?>
                            <?php if (isset($component)) { $__componentOriginalf337082bbea5993ce28f7d15b2ae1c40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf337082bbea5993ce28f7d15b2ae1c40 = $attributes; } ?>
<?php $component = App\View\Components\UsersComponent::resolve(['users' => $users] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('users-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\UsersComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf337082bbea5993ce28f7d15b2ae1c40)): ?>
<?php $attributes = $__attributesOriginalf337082bbea5993ce28f7d15b2ae1c40; ?>
<?php unset($__attributesOriginalf337082bbea5993ce28f7d15b2ae1c40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf337082bbea5993ce28f7d15b2ae1c40)): ?>
<?php $component = $__componentOriginalf337082bbea5993ce28f7d15b2ae1c40; ?>
<?php unset($__componentOriginalf337082bbea5993ce28f7d15b2ae1c40); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <?php if(!empty($paidUsers) && !empty($profilePrefixs)): ?>
                            <?php if (isset($component)) { $__componentOriginal06cbaa3bf7efdcb46efa12e812c5c135 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06cbaa3bf7efdcb46efa12e812c5c135 = $attributes; } ?>
<?php $component = App\View\Components\PaidUsersComponent::resolve(['paidUsers' => $paidUsers,'profilePrefixs' => $profilePrefixs] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('paid-users-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\PaidUsersComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal06cbaa3bf7efdcb46efa12e812c5c135)): ?>
<?php $attributes = $__attributesOriginal06cbaa3bf7efdcb46efa12e812c5c135; ?>
<?php unset($__attributesOriginal06cbaa3bf7efdcb46efa12e812c5c135); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal06cbaa3bf7efdcb46efa12e812c5c135)): ?>
<?php $component = $__componentOriginal06cbaa3bf7efdcb46efa12e812c5c135; ?>
<?php unset($__componentOriginal06cbaa3bf7efdcb46efa12e812c5c135); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <?php if(!empty($activeUsers) && !empty($profilePrefixs)): ?>
                            <?php if (isset($component)) { $__componentOriginald90602ce8f48c6d19d99895c65cc1376 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald90602ce8f48c6d19d99895c65cc1376 = $attributes; } ?>
<?php $component = App\View\Components\ActiveUsersComponent::resolve(['activeUsers' => $activeUsers,'profilePrefixs' => $profilePrefixs] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('active-users-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ActiveUsersComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald90602ce8f48c6d19d99895c65cc1376)): ?>
<?php $attributes = $__attributesOriginald90602ce8f48c6d19d99895c65cc1376; ?>
<?php unset($__attributesOriginald90602ce8f48c6d19d99895c65cc1376); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald90602ce8f48c6d19d99895c65cc1376)): ?>
<?php $component = $__componentOriginald90602ce8f48c6d19d99895c65cc1376; ?>
<?php unset($__componentOriginald90602ce8f48c6d19d99895c65cc1376); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <?php if(!empty($inActiveUsers) && !empty($profilePrefixs)): ?>
                            <?php if (isset($component)) { $__componentOriginal949bdb69976b861218e5c3a705df08bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal949bdb69976b861218e5c3a705df08bb = $attributes; } ?>
<?php $component = App\View\Components\InActiveUsersComponent::resolve(['inActiveUsers' => $inActiveUsers] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('in-active-users-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\InActiveUsersComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['profilePrefixs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($profilePrefixs)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal949bdb69976b861218e5c3a705df08bb)): ?>
<?php $attributes = $__attributesOriginal949bdb69976b861218e5c3a705df08bb; ?>
<?php unset($__attributesOriginal949bdb69976b861218e5c3a705df08bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal949bdb69976b861218e5c3a705df08bb)): ?>
<?php $component = $__componentOriginal949bdb69976b861218e5c3a705df08bb; ?>
<?php unset($__componentOriginal949bdb69976b861218e5c3a705df08bb); ?>
<?php endif; ?>
                        <?php endif; ?>

                    </div>


                </div>
            </div>
        </div>
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\users\index.blade.php ENDPATH**/ ?>