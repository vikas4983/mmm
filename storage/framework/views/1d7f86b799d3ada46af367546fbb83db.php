<?php
      $selectedCastes = session()->get('quickSearch.caste', []);
?>
<?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<optgroup label=<?php echo e($religion->name); ?> class="select2-results__group">
    <?php $__currentLoopData = $castes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php if($caste->religion_id === $religion->id): ?>
       <option value="<?php echo e($caste->id); ?>"
                <?php echo e(in_array($caste->id, $selectedCastes) ? 'selected' : ''); ?>>
                <?php echo e($caste->name); ?> </option>
        <?php endif; ?>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</optgroup>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH C:\xampp\htdocs\mmm\resources\views/ajaxOptions/appendCasteOptions.blade.php ENDPATH**/ ?>