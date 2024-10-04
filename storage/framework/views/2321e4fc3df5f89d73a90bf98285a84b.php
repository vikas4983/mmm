<div class="form-group">
    <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
    <input type="file" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" class="form-control">
    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger" style="font-size: 0.8em;"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\file-component.blade.php ENDPATH**/ ?>