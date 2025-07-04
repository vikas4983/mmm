<style>
    .radio-options {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 5px;
    }

    .radio-option {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .radio-option input[type="radio"] {
        vertical-align: middle;
        margin: 0;
        accent-color: #007bff;

    }

    .radio-option label {
        margin: 0;
        line-height: 1;
        padding-top: 2px;

    }
</style>

<?php if($name === 'manglik'): ?>
    <div class="radio-group">
        <label for="<?php echo e($name); ?>">
            <b class="text-danger mr-1 gtRegMandatory">*</b>&nbsp;<?php echo e($label); ?>

        </label>
        <div class="radio-options">
            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $optionLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="radio-option">
                    <input type="radio" id="<?php echo e($name); ?>-<?php echo e($value); ?>" name="<?php echo e($name); ?>"
                        value="<?php echo e($value); ?>" <?php echo e(old($name, $selected ?? '1') == $value ? 'checked' : ''); ?>>
                    <label for="<?php echo e($name); ?>-<?php echo e($value); ?>">
                        <?php echo e($optionLabel); ?>

                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php else: ?>
    <div class="radio-group">
        <label for="<?php echo e($name); ?>">
            <?php echo e($label); ?>

        </label>
        <div class="radio-options">
            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $optionLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="radio-option">
                    <input type="radio" id="<?php echo e($name); ?>-<?php echo e($value); ?>" name="<?php echo e($name); ?>"
                        value="<?php echo e($value); ?>" <?php echo e(old($name, $selected ?? '1') == $value ? 'checked' : ''); ?>>
                    <label for="<?php echo e($name); ?>-<?php echo e($value); ?>">
                        <?php echo e($optionLabel); ?>

                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/radio-component.blade.php ENDPATH**/ ?>