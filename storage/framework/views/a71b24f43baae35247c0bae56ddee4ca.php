<?php
    $selectedstates = [];
?>
<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <optgroup label=<?php echo e($country->country); ?>>
        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($state->country_id === $country->id): ?>
                <option value="<?php echo e($state->id); ?>" <?php echo e(in_array($state->id, $selectedstates) ? 'selected' : ''); ?>>
                    <?php echo e($state->state); ?>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </optgroup>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/ajaxOptions/appendStateOptions.blade.php ENDPATH**/ ?>