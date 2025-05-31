<?php
    $selectedCities = [];
?>
<option value="0" selected>Doesn't Matter</option>
<?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <optgroup label=<?php echo e($state->state); ?>>
        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($city->state_id === $state->id): ?>
                <option value="<?php echo e($city->id); ?>" >
                    <?php echo e($city->city); ?> 
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </optgroup>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\ajaxOptions\appendCityOptions.blade.php ENDPATH**/ ?>