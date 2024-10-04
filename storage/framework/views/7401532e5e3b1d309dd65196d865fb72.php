<?php $__currentLoopData = $subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($sub->id); ?>"> <?php echo e($parent); ?> - >  <?php echo e($sub->name); ?></option>

<?php if(count($sub->childrenRecursive) > 0 ): ?>

<?php
$parents = $parent. '->'.$sub->name
?>

<?php echo $__env->make('menus',['subMenus' => $sub->childrenRecursive, 'parent' => $parents], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\menus.blade.php ENDPATH**/ ?>