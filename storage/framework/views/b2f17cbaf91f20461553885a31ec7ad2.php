<?php
    $selectedCastes = $quickFilter['caste'] ?? [];
    
?>
<?php if($action === 'quickCasteCriteria'): ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views/ajaxOptions/filterCriterias/quickFilterCriteria.blade.php ENDPATH**/ ?>