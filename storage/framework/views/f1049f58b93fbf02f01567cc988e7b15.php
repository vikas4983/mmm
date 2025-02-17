<div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16">
    <!-- Basic Details -->
    <div class="gt-panel gt-panel-default inViewProfile" id="editAccountSection">
        <div class="gt-panel-head">
            <span class="pull-left"><i class="fa fa-file"></i>Account Details(<?php echo e($prefix->name); ?> -
                <?php echo e($user->id); ?>)</span>
            <a class="pull-right btn gt-btn-orange" data-toggle="modal" data-backdrop ="static" data-keyboard="false"
                data-target="#dynamicUpdateModal" data-info=<?php echo e($user->id); ?> id="editAccountBtn">
                <i class="fas fa-pencil-alt fa-fw"></i>
                <font class="gt-margin-left-5">EDIT</font>
            </a>
            <a class="pull-right btn gt-btn-orange mr-5" data-toggle="modal" data-backdrop ="static"
                data-keyboard="false" data-target="#changeMobileModal" data-info=<?php echo e($user->id); ?>>
                <i class="fas fa-mobile-alt fa-fw"></i><?php echo e($user->mobile ?? ''); ?>

                <font class="gt-margin-left-5"> <i class="fas fa-pencil-alt fa-fw"></i>EDIT</font>
            </a>

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
        <div class="gt-panel-body">
            <div class="row">

                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $fieldName = $field['name']; // Field to display, e.g., 'name'
                        $relation = $field['relation'] ?? null; // Direct relation, e.g., 'carrierDetails'
                        $nestedRelation = $field['nestedRelation'] ?? null; // Nested relation, e.g., 'countries'

                    ?>
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                        <div class="row">
                            <div class="col-xs-6">
                                <?php echo e($field['label']); ?> :
                            </div>
                            <div class="col-xs-10">
                                <?php if($relation && $nestedRelation): ?>
                                    <?php if(isset($user->$relation) && isset($user->$relation->$nestedRelation)): ?>
                                        <b id="<?php echo e($field['id']); ?>">
                                            <?php echo e($user->$relation->$nestedRelation->$fieldName ?? 'N/A'); ?>

                                        </b>
                                    <?php else: ?>
                                        <b id="<?php echo e($field['id']); ?>">N/A</b>
                                    <?php endif; ?>
                                <?php elseif($relation): ?>
                                    <?php if(isset($user->$relation) && isset($user->$relation->$fieldName)): ?>
                                        <b id="<?php echo e($field['id']); ?>">
                                            <?php echo e($user->$relation->$fieldName ?? 'N/A'); ?>

                                        </b>
                                    <?php else: ?>
                                        <b id="<?php echo e($field['id']); ?>">N/A</b>
                                    <?php endif; ?>
                                <?php elseif(isset($user->$fieldName)): ?>
                                    <b id="<?php echo e($field['id']); ?>">
                                        <?php echo e($user->$fieldName); ?>

                                    </b>
                                <?php else: ?>
                                    <b id="<?php echo e($field['id']); ?>">N/A</b>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                    <div class="row">
                        <div class="col-xs-6">
                            Last Login :
                        </div>
                        <div class="col-xs-10">
                            <b id="<?php echo e($field['id']); ?>">
                                12-Apr-2024, 12:05:45 Am
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. Basic Details -->
    <div id="accountDetailsAlert"></div>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/view-account-details-component.blade.php ENDPATH**/ ?>