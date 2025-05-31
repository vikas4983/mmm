<?php $__env->startSection('title', 'Mangal Mandap - Access Controll'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .profile-circle {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            transition: transform 1s ease;
            display: block;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);

        }
    </style>
    <div class="container gt-margin-top-20">
        <div class="row">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-13 col-xxl-offset-3 col-xl-13 col-xl-offset-3 text-center" bis_skin_checked="1">
                    <h2 class="inPageTitle fontMerriWeather inThemeOrange">
                        <span class="gt-font-weight-300">Message</span>
                    </h2>
                    <p class="inPageSubTitle">Check all your messages from here.</p>
                </div>
                <div class="col-xxl-3 col-xl-4 gt-left-opt-msg" bis_skin_checked="1">
                    <a class="btn gt-btn-green btn-block hidden-xxl hidden-xl gt-margin-bottom-20" role="button"
                        data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                        aria-controls="collapseExample">
                        Options <i class="fa fa-angel-down"></i>
                    </a>
                    
                </div>
                <div class="col-xxl-13 col-xl-12 col-xs-16 col-sm-16 col-md-16 gt-msg-board" id="test-list"
                    bis_skin_checked="1">
                    

                    <div class="col-xxl-16 col-xl-16 col-xs-16 col-sm-16 col-md-16 gt-msg-top-strip" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            
                            <?php echo $__env->make('alerts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="col-xxl-5 col-xl-6 col-md-16 col-lg-6 pull-right" bis_skin_checked="1">
                                <div class="input-group" bis_skin_checked="1">
                                    <input type="text" class="gt-form-control flat search"
                                        placeholder="Search Message By Matri Id">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default gt-btn-lg flat" type="button"><i
                                                class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(count($users) > 0): ?>
                        <div class="content4 col-xs-16 col-xxl-16 col-xl-16 gt-msg-dash" bis_skin_checked="1">
                            <div id="msg_result_data" class="row" bis_skin_checked="1">
                                <div class="d-flex flex-wrap mb-3 fw-bold">
                                    <div class="col-xxl-2 col-xs-4 col-sm-4 col-md-4 col-lg-2">
                                        <strong> Image </strong>
                                    </div>

                                    <div class="col-xxl-4 col-xs-10 col-sm-10 col-md-8 col-lg-4">
                                        <strong> Name </strong>
                                    </div>

                                    <div class="col-xxl-6 col-xs-16 col-sm-16 col-md-16 col-lg-6">
                                        <strong> Message </strong>
                                    </div>

                                    <div class="col-xxl-4 col-xs-16 col-sm-16 col-md-16 col-lg-4">
                                        <strong> Date </strong>
                                    </div>
                                </div>

                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <ul class="list">
                                        <li class="d-flex flex-wrap align-items-start mb-3" style="display: flex;">
                                            <div class="col-xxl-2 col-xs-4 col-sm-4 col-md-4 col-lg-2"
                                                style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                                <a href="<?php echo e(route('profile', $user->uuid ?? 'NA')); ?>" title="View Profile">
                                                    <div class="user-name"
                                                    style="font-size: 14px; font-weight: 600; color: #FF7E00;">
                                                    <?php echo e($prefix->name ?? 'NA'); ?><?php echo e($user->id ?? 'NA'); ?>

                                                </div>
                                                <?php $__currentLoopData = $user->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($image->dp_image === '1'): ?>
                                                        <a href="<?php echo e(route('profile', $user->uuid ?? 'NA')); ?>"  class="image-frame">
                                                            <img src="<?php echo e(asset('storage/users/images/' . $image->name)); ?>"
                                                                class="profile-circle" alt="User Image"
                                                                style="margin-bottom: 5px;" title="View Profile">
                                                        </a>
                                                    <?php else: ?>
                                                        <div class="image-frame">
                                                            <img src="<?php echo e($user->gender === 'male'
                                                                ? asset('storage/users/images/male-default.jpg')
                                                                : asset('storage/users/images/female-default.jpg')); ?>"
                                                                class="profile-circle" alt="User Image"
                                                                style="margin-bottom: 5px;">
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </a>
                                            </div>
                                            <div class="col-xxl-4 col-xs-10 col-sm-10 col-md-8 col-lg-4"
                                                style="display: flex; align-items: center;">
                                                <a data-toggle="modal" data-target="#messageModal<?php echo e($user->id); ?>">
                                                    <i class="fa fa-envelope gt-margin-right-10 sendMessage"
                                                        style="margin-right: 10px; color:#FF7E00" title="View Message"></i>
                                                </a>
                                                <a data-toggle="modal" data-target="#messageModal<?php echo e($user->id); ?>"
                                                    title="Name" style="text-decoration: none;">
                                                    <span class="name"><?php echo e($user->name ?? 'NA'); ?></span>
                                                </a>
                                            </div>
                                            <div class="col-xxl-6 col-xs-16 col-sm-16 col-md-16 col-lg-6 gt-margin-top-8">
                                                <a data-toggle="modal" data-target="#messageModal<?php echo e($user->id); ?>"
                                                    title="Message">
                                                    <h4 class="name1">
                                                        <?php echo e(Str::limit($user->receiverMessage->last()->message ?? 'NA', 35)); ?>

                                                    </h4>
                                                </a>
                                            </div>

                                            <div class="col-xxl-4 col-xs-16 col-sm-16 col-md-16 col-lg-4">
                                                <a data-toggle="modal" data-target="#messageModal<?php echo e($user->id); ?>"
                                                    title="Date">
                                                    <h4 class="name2">
                                                        <?php echo e(\Carbon\Carbon::parse($user->receiverMessage->last()->created_at ?? now())->format('d M Y, h:i A')); ?>

                                                    </h4>
                                                </a>
                                            </div>
                                        </li>
                                        <hr class="my-2" />
                                    </ul>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if (isset($component)) { $__componentOriginalfa1c88d4e9af14c7da7ae1a0dda475b1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfa1c88d4e9af14c7da7ae1a0dda475b1 = $attributes; } ?>
<?php $component = App\View\Components\UserActions\ShowMessageComponent::resolve(['users' => $users] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('user-actions.show-message-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\UserActions\ShowMessageComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfa1c88d4e9af14c7da7ae1a0dda475b1)): ?>
<?php $attributes = $__attributesOriginalfa1c88d4e9af14c7da7ae1a0dda475b1; ?>
<?php unset($__attributesOriginalfa1c88d4e9af14c7da7ae1a0dda475b1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfa1c88d4e9af14c7da7ae1a0dda475b1)): ?>
<?php $component = $__componentOriginalfa1c88d4e9af14c7da7ae1a0dda475b1; ?>
<?php unset($__componentOriginalfa1c88d4e9af14c7da7ae1a0dda475b1); ?>
<?php endif; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <img src="<?php echo e(asset('storage/users/images/nodata-available.jpg')); ?>" class="img-responsive">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views/frontend/users/messages/message.blade.php ENDPATH**/ ?>