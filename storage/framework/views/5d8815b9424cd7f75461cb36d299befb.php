<?php $__env->startSection('title', 'My Profile - Mangal mandap'); ?>
<?php $__env->startSection('content'); ?>
    <script>
        function notification(noti_id) {
            $.ajax({
                url: "web-services/notification",
                type: "POST",
                data: "noti_id=" + noti_id,
                cache: false,
                success: function(response) {
                    location.reload();
                }
            });
            return true;
        }
    </script>
    <div class="container">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <div class="row">
            <div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16 mb-20 text-center">
                <h2 class="inPageTitle fontMerriWeather inThemeOrange">My Profile</h2>
                <p class="inPageSubTitle">This is your all profile detail which you added.You can view your
                    all details and also can edit all your detail from here.</p>
            </div>
            <div class="col-xxl-16 col-xs-16 gt-margin-bottom-20">
                <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="fa fa-times-circle"></i>
                    </button>
                    <article>
                        Edit your profile details is very easy just click on the left pencil button ( <i
                            class="fas fa-pen-square gt-margin-left-5 gt-margin-right-5 font-18"></i> ) and
                        here we go. You can edit your profile detail </article>
                </div>
            </div>
        </div>
    </div>
    <div class="container gt-view-profile">
        <div class="row">
            <div class="col-xxl-3 col-xl-4 col-xs-16 col-sm-16">
                <div class="thumbnail gt-margin-bottom-0">
                    <?php $__currentLoopData = $user->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e(isset($image->display_picture) && $image->display_picture ? asset('storage/users/images/' . $image->display_picture) : ($user->gender == 'male' ? asset('storage/users/images/male-default.jpg') : asset('storage/users/images/female-default.jpg'))); ?>"
                            class="img-responsive gtFullWidth" alt="User Image">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                    <a href="https://matrimonialphpscript.com/premium-demo-2/my-photo" class="gt-view-caption">
                        Edit Profile Picture </a>
                </div>
                <!-- Modal more photos -->
                <div class="modal fade" id="morePhotos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-16">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-16 col-xxl-10 col-xxl-offset-3">
                                        <div id="viewMorePhotos" class="owl-carousel gtImageUpload owl-theme"
                                            style="opacity: 0; display: block;">
                                            <div class="owl-wrapper-outer">
                                                <div class="owl-wrapper" style="width: 200px; left: 0px; display: block;">
                                                    <div class="owl-item" style="width: 100px;">
                                                        <div class="item">
                                                            <a
                                                                href="https://matrimonialphpscript.com/premium-demo-2/view-profile">
                                                                <img src="./Matrimonywebsite123_files/watermark.php"
                                                                    class="img-responsive">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-controls clickable" style="display: none;">
                                                <div class="owl-buttons">
                                                    <div class="owl-prev">PREV</div>
                                                    <div class="owl-next">NEXT</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./ Modal more photos -->
                <!-- Left Panel Mobile Only -->
                <a class="btn gt-btn-orange btn-block gt-margin-bottom-15 gt-margin-top-15 visible-xs visible-sm visible-md visible-lg"
                    role="button" data-toggle="collapse"
                    href="https://matrimonialphpscript.com/premium-demo-2/view-profile#collapseLeftPanel"
                    aria-expanded="false" aria-controls="collapseLeftPanel">
                    Options &nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                </a>
                <div class="collapse gt-padding-bottom-15" id="collapseLeftPanel">
                    <div class="col-xxl-16 col-xl-16">
                        <div class="gt-left-opt-msg">
                            <ul>
                                <li><a href="https://matrimonialphpscript.com/premium-demo-2/sentMessages"><i
                                            class="fas fa-paper-plane gt-margin-right-10"></i>Send
                                        Message</a></li>
                                <li><a href="https://matrimonialphpscript.com/premium-demo-2/my-photo"><i
                                            class="fas fa-image gt-margin-right-10"></i>View Photos</a></li>
                            </ul>
                        </div>
                        <div class="gt-left-opt-msg">
                            <ul>
                                <li>
                                    <a class="gt-bg-orange text-center gt-text-white">MESSAGES</a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/inboxMessages"><span
                                            class="pull-left">Inbox</span><span class="pull-right badge">0</span></a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/sentMessages"><span
                                            class="pull-left">Sent</span><span class="pull-right badge">0</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="gt-left-opt-msg">
                            <ul>
                                <li>
                                    <a class="gt-bg-orange text-center gt-text-white"><i
                                            class="fa fa-star gt-margin-right-10"></i>INTEREST</a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/exp-interest"><span
                                            class="pull-left">Received</span><span class="pull-right badge">5</span></a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/exp-interest"><span
                                            class="pull-left">Sent</span><span class="pull-right badge">13</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="gt-left-opt-msg">
                            <ul>
                                <li>
                                    <a class="gt-bg-orange text-center gt-text-white"><i
                                            class="fas fa-picture gt-margin-right-10"></i>PHOTO REQUEST</a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/photo-request"><span
                                            class="pull-left">Received</span><span class="pull-right badge">0</span></a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/photo-request"><span
                                            class="pull-left">Sent</span><span class="pull-right badge">0</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <a href="https://www.facebook.com/" class="col-xs-16" target="_blank">
                            <div class="row" style="max-width:160px !important;">
                                <img src="./Matrimonywebsite123_files/1626606199.jpg" class="img-responsive"
                                    style="width:100%;max-height:600px !important;">
                            </div>
                        </a>

                    </div>
                </div>
                <!-- /. Left Panel Mobile Only -->
            </div>
            <div id="alert-container-acoountDetails">
            </div>
            <div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16">
                <!-- Basic Details -->
                <div class="gt-panel gt-panel-default inViewProfile" id="edit1">
                    <div class="gt-panel-head">
                        <span class="pull-left"><i class="fa fa-file"></i>Account Details</span>
                        <a class="pull-right btn gt-btn-orange" data-toggle="modal" data-backdrop ="static"
                            data-keyboard="false" data-target="#dynamicUpdateModal" data-info=<?php echo e($user->id); ?>>
                            <i class="fas fa-pencil-alt fa-fw"></i>
                            <font class="gt-margin-left-5">EDIT</font>
                        </a>
                        <?php
                            $fields = config('formFields.accountDetails');

                        ?>
                        <?php if (isset($component)) { $__componentOriginalfc35222c378ee3f03703efab785aaf6e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc35222c378ee3f03703efab785aaf6e = $attributes; } ?>
<?php $component = App\View\Components\EditFormFieldComponent::resolve(['user' => $user,'fields' => $fields,'actionUrl' => route('profile.update'),'id' => $user->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('edit-form-field-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\EditFormFieldComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc35222c378ee3f03703efab785aaf6e)): ?>
<?php $attributes = $__attributesOriginalfc35222c378ee3f03703efab785aaf6e; ?>
<?php unset($__attributesOriginalfc35222c378ee3f03703efab785aaf6e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc35222c378ee3f03703efab785aaf6e)): ?>
<?php $component = $__componentOriginalfc35222c378ee3f03703efab785aaf6e; ?>
<?php unset($__componentOriginalfc35222c378ee3f03703efab785aaf6e); ?>
<?php endif; ?>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Name :
                                    </div>
                                    <div class="col-xs-10">
                                        <b id="userName"><?php echo e($user->name ?? 'NA'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Email :
                                    </div>
                                    <div class="col-xs-10">
                                        <b id="userEmail"><?php echo e($user->email ?? 'NA'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Mobile No :
                                    </div>

                                    <div class="col-xs-10">
                                        <b id="userMobile"><?php echo e($user->mobile ?? 'NA'); ?></b>
                                        <a data-toggle="modal" data-backdrop="static" data-keyboard="false"
                                            data-target="#changeMobileModal" data-info="<?php echo e($user->id); ?>">
                                            <i class="fa fa-edit" style="color: #E47203;"></i>
                                        </a>
                                    </div>
                                    <?php if (isset($component)) { $__componentOriginal2d8ab24393e52c6ef56270234f50ad97 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d8ab24393e52c6ef56270234f50ad97 = $attributes; } ?>
<?php $component = App\View\Components\ChangeMobileVerification::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('change-mobile-verification'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ChangeMobileVerification::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d8ab24393e52c6ef56270234f50ad97)): ?>
<?php $attributes = $__attributesOriginal2d8ab24393e52c6ef56270234f50ad97; ?>
<?php unset($__attributesOriginal2d8ab24393e52c6ef56270234f50ad97); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d8ab24393e52c6ef56270234f50ad97)): ?>
<?php $component = $__componentOriginal2d8ab24393e52c6ef56270234f50ad97; ?>
<?php unset($__componentOriginal2d8ab24393e52c6ef56270234f50ad97); ?>
<?php endif; ?>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Gender :
                                    </div>
                                    <div class="col-xs-10">
                                        <b id="userGender"><?php echo e($user->gender ?? 'NA'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Profile Created By :
                                    </div>
                                    <div class="col-xs-10">
                                        <b id="userProfileFor">
                                            <?php echo e($user->profile_for ?? 'NA'); ?> </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. Basic Details -->
            </div>
        </div>
    </div>
    <div class="container gt-view-profile">
        <div class="row">
            <!-- Left Panel Desktop Only -->
            <div class="col-xxl-3 col-xl-4 hidden-xs hidden-sm hidden-md hidden-lg">
                <div class="gt-left-opt-msg">
                    <ul>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/sentMessages"><i
                                    class="fas fa-paper-plane gt-margin-right-10"></i>Send Message</a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/my-photo"><i
                                    class="fas fa-image gt-margin-right-10"></i>View Photos</a>
                        </li>
                    </ul>
                </div>
                <div class="gt-left-opt-msg">
                    <ul>
                        <li>
                            <a class="gt-bg-orange text-center gt-text-white">MESSAGES</a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/inboxMessages"><span
                                    class="pull-left">Inbox</span><span class="pull-right badge">0</span></a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/sentMessages"><span
                                    class="pull-left">Sent</span><span class="pull-right badge">0</span></a>
                        </li>
                    </ul>
                </div>
                <div class="gt-left-opt-msg">
                    <ul>
                        <li>
                            <a class="gt-bg-orange text-center gt-text-white">INTEREST</a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/exp-interest"><span
                                    class="pull-left">Received</span><span class="pull-right badge">5</span></a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/exp-interest"><span
                                    class="pull-left">Sent</span><span class="pull-right badge">13</span></a>
                        </li>
                    </ul>
                </div>
                <div class="gt-left-opt-msg">
                    <ul>
                        <li>
                            <a class="gt-bg-orange text-center gt-text-white">PHOTO REQUEST</a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/photo-request"><span
                                    class="pull-left">Received</span><span class="pull-right badge">0</span></a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/photo-request"><span
                                    class="pull-left">Sent</span><span class="pull-right badge">0</span></a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <a href="https://www.facebook.com/" class="col-xs-16" target="_blank">
                    <div class="row" style="max-width:160px !important;">
                        <img src="./Matrimonywebsite123_files/1626606199.jpg" class="img-responsive"
                            style="width:100%;max-height:600px !important;">
                    </div>
                </a>
            </div>
            <!-- /. Left Panel Desktop Only -->
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2"
                style="position: fixed; left: 43%; top: 20%; z-index: -1; opacity: 0;" id="loaderID">
                <div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16 btn gt-btn-orange">
                    <font class="gt-margin-left-5">Loading ...&nbsp;&nbsp;</font>
                </div>
            </div>

            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-5"
                style="position: fixed; left: 43%; top: 20%; z-index: -1; opacity: 0;" id="edit_success">
                <div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16 btn gt-btn-green">
                    <font class="gt-margin-left-5">Your Profile Edit Successfully.&nbsp;&nbsp;</font>
                </div>
            </div>

            <div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16">
                <!-- About Me Section -->
                <div id="aboutMeAlert">
                    <?php echo $__env->make('partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                
                    
                    <div id="aboutMeDetailsAlert"></div>
                    <?php if (isset($component)) { $__componentOriginalf435682ed168c90c1b0690ff2d505b58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf435682ed168c90c1b0690ff2d505b58 = $attributes; } ?>
<?php $component = App\View\Components\ViewAboutMeComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('view-about-me-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ViewAboutMeComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf435682ed168c90c1b0690ff2d505b58)): ?>
<?php $attributes = $__attributesOriginalf435682ed168c90c1b0690ff2d505b58; ?>
<?php unset($__attributesOriginalf435682ed168c90c1b0690ff2d505b58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf435682ed168c90c1b0690ff2d505b58)): ?>
<?php $component = $__componentOriginalf435682ed168c90c1b0690ff2d505b58; ?>
<?php unset($__componentOriginalf435682ed168c90c1b0690ff2d505b58); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginaledc00850ef6470a17e73b41c1fcb31a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaledc00850ef6470a17e73b41c1fcb31a0 = $attributes; } ?>
<?php $component = App\View\Components\UpdateAboutMeComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('update-about-me-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\UpdateAboutMeComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaledc00850ef6470a17e73b41c1fcb31a0)): ?>
<?php $attributes = $__attributesOriginaledc00850ef6470a17e73b41c1fcb31a0; ?>
<?php unset($__attributesOriginaledc00850ef6470a17e73b41c1fcb31a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaledc00850ef6470a17e73b41c1fcb31a0)): ?>
<?php $component = $__componentOriginaledc00850ef6470a17e73b41c1fcb31a0; ?>
<?php unset($__componentOriginaledc00850ef6470a17e73b41c1fcb31a0); ?>
<?php endif; ?>
                    
                    
                    <div id="aboutEducationDetailsAlert"></div>
                    <?php if (isset($component)) { $__componentOriginaled949a2946765df1c871540d78657bd0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled949a2946765df1c871540d78657bd0 = $attributes; } ?>
<?php $component = App\View\Components\ViewEducationDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('view-education-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ViewEducationDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled949a2946765df1c871540d78657bd0)): ?>
<?php $attributes = $__attributesOriginaled949a2946765df1c871540d78657bd0; ?>
<?php unset($__attributesOriginaled949a2946765df1c871540d78657bd0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled949a2946765df1c871540d78657bd0)): ?>
<?php $component = $__componentOriginaled949a2946765df1c871540d78657bd0; ?>
<?php unset($__componentOriginaled949a2946765df1c871540d78657bd0); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal689b52780fbb85d4edccf2fe01ac0a68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal689b52780fbb85d4edccf2fe01ac0a68 = $attributes; } ?>
<?php $component = App\View\Components\UpdateEducationDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('update-education-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\UpdateEducationDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal689b52780fbb85d4edccf2fe01ac0a68)): ?>
<?php $attributes = $__attributesOriginal689b52780fbb85d4edccf2fe01ac0a68; ?>
<?php unset($__attributesOriginal689b52780fbb85d4edccf2fe01ac0a68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal689b52780fbb85d4edccf2fe01ac0a68)): ?>
<?php $component = $__componentOriginal689b52780fbb85d4edccf2fe01ac0a68; ?>
<?php unset($__componentOriginal689b52780fbb85d4edccf2fe01ac0a68); ?>
<?php endif; ?>
                   
                    
                    <div id="aboutOccupationDetailsAlert"></div>
                    <?php if (isset($component)) { $__componentOriginal9176e8b0d785153890e0fb35b5696504 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9176e8b0d785153890e0fb35b5696504 = $attributes; } ?>
<?php $component = App\View\Components\ViewOccupationDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('view-occupation-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ViewOccupationDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9176e8b0d785153890e0fb35b5696504)): ?>
<?php $attributes = $__attributesOriginal9176e8b0d785153890e0fb35b5696504; ?>
<?php unset($__attributesOriginal9176e8b0d785153890e0fb35b5696504); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9176e8b0d785153890e0fb35b5696504)): ?>
<?php $component = $__componentOriginal9176e8b0d785153890e0fb35b5696504; ?>
<?php unset($__componentOriginal9176e8b0d785153890e0fb35b5696504); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal4aab825db4fe2fbdf69781d383e5e9aa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4aab825db4fe2fbdf69781d383e5e9aa = $attributes; } ?>
<?php $component = App\View\Components\UpdateOccupationDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('update-occupation-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\UpdateOccupationDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4aab825db4fe2fbdf69781d383e5e9aa)): ?>
<?php $attributes = $__attributesOriginal4aab825db4fe2fbdf69781d383e5e9aa; ?>
<?php unset($__attributesOriginal4aab825db4fe2fbdf69781d383e5e9aa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4aab825db4fe2fbdf69781d383e5e9aa)): ?>
<?php $component = $__componentOriginal4aab825db4fe2fbdf69781d383e5e9aa; ?>
<?php unset($__componentOriginal4aab825db4fe2fbdf69781d383e5e9aa); ?>
<?php endif; ?>
                     
                    
                    <div id="aboutFamilyDetailsAlert"></div>
                    <?php if (isset($component)) { $__componentOriginalaef6d2d7887e12419b54bd32601f135c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaef6d2d7887e12419b54bd32601f135c = $attributes; } ?>
<?php $component = App\View\Components\ViewFamilyDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('view-family-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ViewFamilyDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaef6d2d7887e12419b54bd32601f135c)): ?>
<?php $attributes = $__attributesOriginalaef6d2d7887e12419b54bd32601f135c; ?>
<?php unset($__attributesOriginalaef6d2d7887e12419b54bd32601f135c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaef6d2d7887e12419b54bd32601f135c)): ?>
<?php $component = $__componentOriginalaef6d2d7887e12419b54bd32601f135c; ?>
<?php unset($__componentOriginalaef6d2d7887e12419b54bd32601f135c); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginale57491951a7bebee93a09e31b3a43446 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale57491951a7bebee93a09e31b3a43446 = $attributes; } ?>
<?php $component = App\View\Components\UpdateFamilyDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('update-family-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\UpdateFamilyDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale57491951a7bebee93a09e31b3a43446)): ?>
<?php $attributes = $__attributesOriginale57491951a7bebee93a09e31b3a43446; ?>
<?php unset($__attributesOriginale57491951a7bebee93a09e31b3a43446); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale57491951a7bebee93a09e31b3a43446)): ?>
<?php $component = $__componentOriginale57491951a7bebee93a09e31b3a43446; ?>
<?php unset($__componentOriginale57491951a7bebee93a09e31b3a43446); ?>
<?php endif; ?>
                     
                    
                   
                    
                    <div id="basicDetailsAlert"></div>
                    <?php if (isset($component)) { $__componentOriginal49afcd653de56e01fcea03b3ec99b49d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49afcd653de56e01fcea03b3ec99b49d = $attributes; } ?>
<?php $component = App\View\Components\ViewBasicDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('view-basic-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ViewBasicDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49afcd653de56e01fcea03b3ec99b49d)): ?>
<?php $attributes = $__attributesOriginal49afcd653de56e01fcea03b3ec99b49d; ?>
<?php unset($__attributesOriginal49afcd653de56e01fcea03b3ec99b49d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49afcd653de56e01fcea03b3ec99b49d)): ?>
<?php $component = $__componentOriginal49afcd653de56e01fcea03b3ec99b49d; ?>
<?php unset($__componentOriginal49afcd653de56e01fcea03b3ec99b49d); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal16545f65a80262a387d3d932ec19aab5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16545f65a80262a387d3d932ec19aab5 = $attributes; } ?>
<?php $component = App\View\Components\UpdateBasicDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('update-basic-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\UpdateBasicDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16545f65a80262a387d3d932ec19aab5)): ?>
<?php $attributes = $__attributesOriginal16545f65a80262a387d3d932ec19aab5; ?>
<?php unset($__attributesOriginal16545f65a80262a387d3d932ec19aab5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16545f65a80262a387d3d932ec19aab5)): ?>
<?php $component = $__componentOriginal16545f65a80262a387d3d932ec19aab5; ?>
<?php unset($__componentOriginal16545f65a80262a387d3d932ec19aab5); ?>
<?php endif; ?>
                  
                    
                    <div id="horoscopeDetailsAlert"></div>
                    <?php if (isset($component)) { $__componentOriginal7cea83cec912e87542c50595182c0452 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7cea83cec912e87542c50595182c0452 = $attributes; } ?>
<?php $component = App\View\Components\ViewHoroscopeDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('view-horoscope-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ViewHoroscopeDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7cea83cec912e87542c50595182c0452)): ?>
<?php $attributes = $__attributesOriginal7cea83cec912e87542c50595182c0452; ?>
<?php unset($__attributesOriginal7cea83cec912e87542c50595182c0452); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7cea83cec912e87542c50595182c0452)): ?>
<?php $component = $__componentOriginal7cea83cec912e87542c50595182c0452; ?>
<?php unset($__componentOriginal7cea83cec912e87542c50595182c0452); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal64e71e731725413d927db76f3c1beedb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal64e71e731725413d927db76f3c1beedb = $attributes; } ?>
<?php $component = App\View\Components\UpdateHoroscopeDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('update-horoscope-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\UpdateHoroscopeDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal64e71e731725413d927db76f3c1beedb)): ?>
<?php $attributes = $__attributesOriginal64e71e731725413d927db76f3c1beedb; ?>
<?php unset($__attributesOriginal64e71e731725413d927db76f3c1beedb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal64e71e731725413d927db76f3c1beedb)): ?>
<?php $component = $__componentOriginal64e71e731725413d927db76f3c1beedb; ?>
<?php unset($__componentOriginal64e71e731725413d927db76f3c1beedb); ?>
<?php endif; ?>
                   
                    
                    <div id="carrierDetailsAlert"></div>
                    <?php if (isset($component)) { $__componentOriginal43ca17b3cb5bf2dc58b0853643ad87d0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal43ca17b3cb5bf2dc58b0853643ad87d0 = $attributes; } ?>
<?php $component = App\View\Components\ViewCarrierDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('view-carrier-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ViewCarrierDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal43ca17b3cb5bf2dc58b0853643ad87d0)): ?>
<?php $attributes = $__attributesOriginal43ca17b3cb5bf2dc58b0853643ad87d0; ?>
<?php unset($__attributesOriginal43ca17b3cb5bf2dc58b0853643ad87d0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal43ca17b3cb5bf2dc58b0853643ad87d0)): ?>
<?php $component = $__componentOriginal43ca17b3cb5bf2dc58b0853643ad87d0; ?>
<?php unset($__componentOriginal43ca17b3cb5bf2dc58b0853643ad87d0); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal034d26457e504563c601e168446619c4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal034d26457e504563c601e168446619c4 = $attributes; } ?>
<?php $component = App\View\Components\UpdateCarrierDetailsComponent::resolve(['user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('update-carrier-details-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\UpdateCarrierDetailsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal034d26457e504563c601e168446619c4)): ?>
<?php $attributes = $__attributesOriginal034d26457e504563c601e168446619c4; ?>
<?php unset($__attributesOriginal034d26457e504563c601e168446619c4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal034d26457e504563c601e168446619c4)): ?>
<?php $component = $__componentOriginal034d26457e504563c601e168446619c4; ?>
<?php unset($__componentOriginal034d26457e504563c601e168446619c4); ?>
<?php endif; ?>

                    <div class="gt-panel gt-panel-default" id="edit5">
                        <div class="gt-panel-head">
                            <span class="pull-left">
                                <i class="fa fa-users"></i>Family Details </span>
                            <a class="pull-right btn gt-btn-orange" onclick="return edit5();">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                                <font class="gt-margin-left-5 ">EDIT</font>
                            </a>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Family Type :</div>
                                        <div class="col-xs-10">
                                            <b>
                                                Nuclear </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Family Status :</div>
                                        <div class="col-xs-10">
                                            <b>
                                                Middle class </b>
                                        </div>
                                    </div>
                                </div>


                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Family Value :</div>
                                        <div class="col-xs-10">
                                            <b>
                                                Traditional </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Father Occupation :</div>
                                        <div class="col-xs-10">
                                            <b>
                                                No </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Mother Occupation :</div>
                                        <div class="col-xs-10">
                                            <b>
                                                No </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">No. of Brothers :</div>
                                        <div class="col-xs-10">
                                            <b>
                                                No brother </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Married Brothers :</div>
                                        <div class="col-xs-10">
                                            <b>
                                                No brother </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">No. of Sisters :</div>
                                        <div class="col-xs-10">
                                            <b>
                                                1 Sister </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Married Sisters :</div>
                                        <div class="col-xs-10">
                                            <b>
                                                1 married sister </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-default" id="edit6">
                        <div class="gt-panel-head">
                            <span class="pull-left"><i class="fa fa-map-marker"></i>Location Information</span>
                            <a class="pull-right btn gt-btn-orange" onclick="return edit6();">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                                <font class="gt-margin-left-5">EDIT</font>
                            </a>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Country Living In :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>India</b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            State Living In :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>Andhra Pradesh</b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            City Living In :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>Achhayyapalli</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-default" id="edit7">
                        <div class="gt-panel-head">
                            <span class="pull-left">
                                <i class="fa fa-users"></i>Habits And Hobbies </span>
                            <a class="pull-right btn gt-btn-orange" onclick="return edit7();">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                                <font class="gt-margin-left-5">EDIT</font>
                            </a>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Eating Habits :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Non Vegetarian </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Drinking Habits :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                No </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Smoking Habits :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                No </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-default" id="edit9">
                        <div class="gt-panel-head">
                            <span class="pull-left">
                                <i class="fa fa-star"></i>Physical Attributes </span>
                            <a class="pull-right btn gt-btn-orange" onclick="return edit9();">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                                <font class="gt-margin-left-5">EDIT</font>
                            </a>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Height:</div>
                                        <div class="col-xs-10">
                                            <b>
                                                5ft - 152cm
                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Weight :</div>
                                        <div class="col-xs-10">
                                            <b> 48 Kg </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Body type:</div>
                                        <div class="col-xs-10">
                                            <b>Slim</b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Complexion:</div>
                                        <div class="col-xs-10">
                                            <b>Fair</b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">Physical Status:</div>
                                        <div class="col-xs-10">
                                            <b>Normal</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-16">
                        <div class="row">
                            <h4 class="text-center gt-bg-green pt-15 pb-15 inViewProSection">
                                <i class="fa fa-heart gt-margin-right-10"></i>Partner Preference
                            </h4>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-default" id="editpref1">
                        <div class="gt-panel-head">
                            <span class="pull-left">
                                <i class="fa fa-file"></i>Basic Preferences </span>
                            <a class="pull-right btn gt-btn-orange" onclick="return part_edit_1();">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                                <font class="gt-margin-left-5">EDIT</font>
                            </a>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Marital Status :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Never Married </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Age :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                18&nbsp;&nbsp;Years &nbsp;&nbsp;&nbsp;&nbsp;To
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                30&nbsp;&nbsp;Years </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Height :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                5ft 1in - 154cm &nbsp;&nbsp;&nbsp;&nbsp;To
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                5ft 3in - 160cm </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Eating Habits :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Vegetarian </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Smoking Habits :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                No </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Drinking Habits :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                No </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Physical status :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Normal </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-default" id="editpref2">
                        <div class="gt-panel-head">
                            <span class="pull-left">
                                <i class="fa fa-university"></i>Education / Professional Preference </span>
                            <a class="pull-right btn gt-btn-orange" onclick="return part_edit_2();">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                                <font class="gt-margin-left-5">EDIT</font>
                            </a>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Education :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                B Arch, B.Pharm </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Occupation :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Civil Engineer , Cost Accountant ,
                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Employed in :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Private </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Annual Income:
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Rs.2,00,000,&nbsp;Rs.4,00,000,&nbsp; </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-default" id="editpref3">
                        <div class="gt-panel-head">
                            <span class="pull-left"><i class="fa fa-book"></i>Religion Preference</span>
                            <a class="pull-right btn gt-btn-orange" onclick="return part_edit_3();">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                                <font class="gt-margin-left-5">EDIT</font>
                            </a>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Religion :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Christian, Hindu </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Caste :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Ad Dharmi
                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Mother Tongue :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Angika, English, Hindi </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Star :
                                        </div>
                                        <div class="col-xs-10">
                                            <b> Ardra </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-default" id="editpref4">
                        <div class="gt-panel-head">
                            <span class="pull-left">
                                <i class="fa fa-map-marker"></i>Location Preference </span>
                            <a class="pull-right btn gt-btn-orange" onclick="return part_edit_4();">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                                <font class="gt-margin-left-5">EDIT</font>
                            </a>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Country :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Antigua And Barbuda, India </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            State :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Parish of Saint Paul </b>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            City :
                                        </div>
                                        <div class="col-xs-10">
                                            <b>
                                                Bedpa </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-default" id="editpref5">
                        <div class="gt-panel-head">
                            <span class="pull-left">
                                <i class="fa fa-star"></i>Partner Expectation </span>
                            <a class="pull-right btn gt-btn-orange" onclick="return part_edit_5();">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                                <font class="gt-margin-left-5">EDIT</font>
                            </a>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <div
                                    class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                    <div class="row">
                                        <div class="col-xs-16">
                                            <b>
                                                Write some of about you.for example which kind of person you are
                                                ,about your Personality,Hobbies,About your family ect.

                                                jhcjhchgc </b>
                                        </div>
                                        <div
                                            class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                            <h5 class="text-center inViewApproveStripe">
                                                Approval Status:&nbsp;Pending </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    </div>
    <div class="container gt-margin-top-10">
    </div>
    <!-- Login With OTP Modal  -->
    <div class="modal fade" id="loginWithOTP" tabindex="-1" role="dialog" aria-labelledby="loginWithOTPLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title text-center" id="loginWithOTPLabel">Login With OTP</h5>
                </div>
                <div class="modal-body">
                    <form class="" action="https://matrimonialphpscript.com/premium-demo-2/login-with-otp"
                        method="post">
                        <div class="form-group">
                            <label>Email/Mobile No/Matri id</label>
                            <input type="text" name="userId" class="gt-form-control"
                                placeholder="Enter Email id / Mobile No / Matri Id">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="GET OTP" class="btn gt-btn-green">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#accountDetailsForm').on('submit', function(e) {
                e.preventDefault();
                $('#accountDetailsBtn').prop('disabled',
                    true);
                const name = $('#name').val();
                const email = $('#email').val();
                const profile_for = $('#profile_for').val();
                if (!name || !email || !profile_for) {
                    alert('All fields are required.');
                    $('#accountDetailsBtn').prop('disabled', false);
                    return;
                }
                $.ajax({
                    url: "<?php echo e(route('profile.update')); ?>",
                    method: "PATCH",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        name: name,
                        email: email,
                        profile_for: profile_for,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#userName').text(response.user.name);
                        $('#userEmail').text(response.user.email);
                        $('#userProfileFor').text(response.user.profile_for);

                        $('#dynamicUpdateModal').modal('hide');
                        $('#accountDetailsBtn').prop('disabled', false);
                        $('#alert-container-acoountDetails').get(0).scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        $('#alert-container-acoountDetails').html(`
        <div class="alert alert-success col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16 role="alert">
            ${response.success}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
        </div>
    `);
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Error updating data');
                        $('#accountDetailsBtn').prop('disabled',
                            false);
                    }
                });
            });
        });
    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\users\show.blade.php ENDPATH**/ ?>