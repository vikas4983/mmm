<?php
    $selectedCastes = $basicFilter['caste'] ?? [];
    $selectedStates = $basicFilter['state'] ?? [];
    $selectedcities = $basicFilter['city'] ?? [];

?>
<?php if($action === 'basicCasteCriteria'): ?>
    <option value="0" <?php echo e(in_array(0, $selectedCastes) ? 'selected' : ''); ?>>Doesn't Matter</option>
    <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <optgroup label=<?php echo e($religion->name); ?> class="select2-results__group">
            <?php $__currentLoopData = $castes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($caste->religion_id === $religion->id): ?>
                    <option value="<?php echo e($caste->id); ?>" <?php echo e(in_array($caste->id, $selectedCastes) ? 'selected' : ''); ?>>
                        <?php echo e($caste->name); ?> </option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </optgroup>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if($action === 'basicStateCriteria'): ?>
    <option value="0" <?php echo e(in_array(0, $selectedStates) ? 'selected' : ''); ?>>Doesn't Matter</option>
    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <optgroup label="<?php echo e($country->country); ?>">
            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($state->country_id === $country->id): ?>
                    <option value="<?php echo e($state->id); ?>" <?php echo e(in_array($state->id, $selectedStates) ? 'selected' : ''); ?>>
                        <?php echo e($state->state); ?>

                    </option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </optgroup>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if($action === 'basicCityCriteria'): ?>
    <option value="0" <?php echo e(in_array(0, $selectedcities) ? 'selected' : ''); ?> >Doesn't Matter</option>
    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <optgroup label="<?php echo e($state->state); ?>">
            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($city->state_id === $state->id): ?>
                    <option value="<?php echo e($city->id); ?>" <?php echo e(in_array($city->id, $selectedcities) ? 'selected' : ''); ?>>
                        <?php echo e($city->city); ?>

                    </option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </optgroup>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\ajaxOptions\filterCriterias\basicFilterCriteria.blade.php ENDPATH**/ ?>