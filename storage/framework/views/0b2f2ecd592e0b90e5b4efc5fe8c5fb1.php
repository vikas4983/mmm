
<?php $__env->startSection('title', 'Setting'); ?>
<?php $__env->startSection('content'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        nav.center-text,
        nav {
            background: none;
        }

        .pagination {
            margin: -6px 0px;
        }

        .current {
            background: none repeat scroll 0 0 rgba(236, 236, 236, 1) !important;
            color: #000 !important;
            padding: 4px 8px;
        }

        .pagination>li>a {
            padding: 8px 12px;
        }

        .page-numbers1 {
            display: none;
        }

        .ne-success-story ul {
            border-bottom: none !important;
        }

        .ne-success-story li {
            background: none !important;
            border-bottom: none !important;
        }
    </style>
    <div class="container gt-margin-top-20">
        <div class="row">
            <div class="col-xxl-4 col-xl-4 gt-left-exp">
                <a class="btn gt-btn-orange btn-block gt-margin-bottom-15 visible-xs visible-sm visible-md btn-md"
                    role="button" data-toggle="collapse" href="#collapseLeftPanel" aria-expanded="false"
                    aria-controls="collapseLeftPanel">
                    Options &nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                </a>
                <style>
                    .panel-title a::after {
                        content: '\f105';
                        font-family: 'FontAwesome';
                        float: right;
                        font-size: 25px;
                        color: #333;
                        font-weight: bold;
                        transition: transform 0.3s ease;
                    }

                    .panel-title a[aria-expanded="true"]::after {
                        content: '\f107';
                        transform: rotate(0deg);
                    }

                    .panel-title a[aria-expanded="false"]::after {
                        content: '\f105';
                    }
                </style>

                <div class="collapse mobile-collapse gt-padding-bottom-15" id="collapseLeftPanel">
                    <a href="exp-interest.php" class="btn gt-btn-orange gt-btn-xl mb-20 btn-block">
                        <i class="fa fa-star gt-margin-right-10 fa-spin"></i> Setting
                    </a>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- Name -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a href="<?php echo e(route('setting.name')); ?>">
                                        <i class="fas fa-tag"></i>
                                        Name
                                    </a>
                                </h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a href="<?php echo e(route('setting.image')); ?>">
                                        <i class="fas fa-image"></i> Photo
                                    </a>
                                </h4>
                            </div>

                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a href="<?php echo e(route('setting.horoscope')); ?>">
                                        <i class="fas fa-moon"></i>
                                        Horoscope
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a href="<?php echo e(route('setting.mobile.number')); ?>">
                                        <i class="fas fa-mobile-alt"></i>
                                        Mobile Number
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-12 col-xs-16 col-sm-16 col-md-16 gt-exp-main" bis_skin_checked="1">
                <div class="col-xxl-16 col-xl-16 col-xs-16 col-sm-16 col-md-16" bis_skin_checked="1">
                    <div class="row active" id="exp-1" bis_skin_checked="1">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"
                                class="col-xxl-8 col-xs-16 col-sm-16 col-md-8 col-xl-8 col-lg-8 text-center xyz active"
                                id="sent_all">
                                <a href="#exp-tab-2" aria-controls="exp-tab-2" role="tab" data-toggle="tab"
                                    style="color:#E47203 ">
                                    <h4> <strong> <?php echo e($heading ?? 'Na'); ?></strong></h4>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" bis_skin_checked="1">
                            <div role="tabpanel" class="tab-pane fade in active " id="exp-tab-2" bis_skin_checked="1">

                                <?php echo $__env->make('alerts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php switch($heading ?? ''):
                                    case ('Profile Name Setting'): ?>
                                        <?php if (isset($component)) { $__componentOriginalca5f724d31a0e8dde83d2d54196718a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalca5f724d31a0e8dde83d2d54196718a1 = $attributes; } ?>
<?php $component = App\View\Components\Settings\NameSettingComponent::resolve(['settingData' => $settingData] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('settings.name-setting-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Settings\NameSettingComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalca5f724d31a0e8dde83d2d54196718a1)): ?>
<?php $attributes = $__attributesOriginalca5f724d31a0e8dde83d2d54196718a1; ?>
<?php unset($__attributesOriginalca5f724d31a0e8dde83d2d54196718a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalca5f724d31a0e8dde83d2d54196718a1)): ?>
<?php $component = $__componentOriginalca5f724d31a0e8dde83d2d54196718a1; ?>
<?php unset($__componentOriginalca5f724d31a0e8dde83d2d54196718a1); ?>
<?php endif; ?>
                                    <?php break; ?>

                                    <?php case ('Profile Photo Setting'): ?>
                                        <?php if (isset($component)) { $__componentOriginale252ffc812b7879e8ae3724f78c5b4cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale252ffc812b7879e8ae3724f78c5b4cb = $attributes; } ?>
<?php $component = App\View\Components\Settings\ImageSettingComponent::resolve(['settingData' => $settingData] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('settings.image-setting-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Settings\ImageSettingComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale252ffc812b7879e8ae3724f78c5b4cb)): ?>
<?php $attributes = $__attributesOriginale252ffc812b7879e8ae3724f78c5b4cb; ?>
<?php unset($__attributesOriginale252ffc812b7879e8ae3724f78c5b4cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale252ffc812b7879e8ae3724f78c5b4cb)): ?>
<?php $component = $__componentOriginale252ffc812b7879e8ae3724f78c5b4cb; ?>
<?php unset($__componentOriginale252ffc812b7879e8ae3724f78c5b4cb); ?>
<?php endif; ?>
                                    <?php break; ?>

                                    <?php case ('Profile Horoscope Setting'): ?>
                                        <?php if (isset($component)) { $__componentOriginalc98d887ff60d34237674a7a6f6f40372 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc98d887ff60d34237674a7a6f6f40372 = $attributes; } ?>
<?php $component = App\View\Components\Settings\HoroscopeSettingComponent::resolve(['settingData' => $settingData] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('settings.horoscope-setting-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Settings\HoroscopeSettingComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc98d887ff60d34237674a7a6f6f40372)): ?>
<?php $attributes = $__attributesOriginalc98d887ff60d34237674a7a6f6f40372; ?>
<?php unset($__attributesOriginalc98d887ff60d34237674a7a6f6f40372); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc98d887ff60d34237674a7a6f6f40372)): ?>
<?php $component = $__componentOriginalc98d887ff60d34237674a7a6f6f40372; ?>
<?php unset($__componentOriginalc98d887ff60d34237674a7a6f6f40372); ?>
<?php endif; ?>
                                    <?php break; ?>

                                    <?php case ('Profile Mobile Number Setting'): ?>
                                        <?php if (isset($component)) { $__componentOriginalee5c411975cf8522dac52d3830990d91 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee5c411975cf8522dac52d3830990d91 = $attributes; } ?>
<?php $component = App\View\Components\Settings\MobileNumberSettingComponent::resolve(['settingData' => $settingData] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('settings.mobile-number-setting-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Settings\MobileNumberSettingComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee5c411975cf8522dac52d3830990d91)): ?>
<?php $attributes = $__attributesOriginalee5c411975cf8522dac52d3830990d91; ?>
<?php unset($__attributesOriginalee5c411975cf8522dac52d3830990d91); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee5c411975cf8522dac52d3830990d91)): ?>
<?php $component = $__componentOriginalee5c411975cf8522dac52d3830990d91; ?>
<?php unset($__componentOriginalee5c411975cf8522dac52d3830990d91); ?>
<?php endif; ?>
                                    <?php break; ?>

                                    <?php default: ?>
                                <?php endswitch; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\settings\privacySetting.blade.php ENDPATH**/ ?>