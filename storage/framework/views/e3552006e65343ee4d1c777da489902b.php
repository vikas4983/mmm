<style>
    .radio-group {
        margin-bottom: 1rem;
    }

    .radio-options {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .radio-option {
        display: flex;
        align-items: center;
    }

    .radio-option label {
        margin-left: 0.5rem;
    }
</style>

<div class="radio-group">
    <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
    <div class="radio-options">
        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $optionLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="radio-option">
                <input type="radio" id="<?php echo e($name); ?>-<?php echo e($value); ?>" name="<?php echo e($name); ?>"
                    value="<?php echo e($value); ?>" <?php echo e($value == $selected ? 'checked' : ''); ?> checked>
                <label for="<?php echo e($name); ?>-<?php echo e($value); ?>">
                    <?php echo e($optionLabel); ?>

                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\radio-component.blade.php ENDPATH**/ ?>