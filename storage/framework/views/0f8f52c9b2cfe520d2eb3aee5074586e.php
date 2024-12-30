<div class="gt-panel gt-panel-default" id="editLifestyleSection">
    <div class="gt-panel-head">
        <span class="pull-left">
            <i class="fa fa-book"></i>Lifestyle Information
        </span>
        <a class="pull-right btn gt-btn-orange" id="editLifestyleBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">EDIT</font>
        </a>
    </div>

    <div class="gt-panel-body">
        <div class="row">
            <?php
                $fields = config('formFields.editLifestyleDetails');
               
            ?>
            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                    <div class="row">
                        <div class="col-xs-6"><?php echo e($field['label']); ?>:</div>
                        <div class="col-xs-10">
                            <b id="<?php echo e($field['id'] ?? null); ?>">
                                <?php
                                    $relation = $field['relation'] ?? null;
                                    $fieldName = $field['name'];
                                ?>
                                <?php if($relation && isset($user->lifestyleDetails->{$relation})): ?>
                                    <?php if(is_iterable($user->lifestyleDetails->{$relation})): ?>
                                        <?php $__currentLoopData = $user->lifestyleDetails->{$relation}; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($relatedItem->name ?? 'N/A'); ?>

                                            <?php if(!$loop->last): ?>
                                                ,
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php echo e($user->lifestyleDetails->{$relation}->name ?? 'N/A'); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(is_array($user->lifestyleDetails->{$fieldName})): ?>
                                        <?php echo e(implode(', ', $user->lifestyleDetails->{$fieldName})); ?>

                                    <?php else: ?>
                                        <?php echo e($user->lifestyleDetails->{$fieldName} ?? 'N/A'); ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </b>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\view-lifestyle-details-component.blade.php ENDPATH**/ ?>