<div class="form-group">
    <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
    <textarea  name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" value="<?php echo e(old($name, $value)); ?>" placeholder="<?php echo e($placeholder); ?>"
        class="form-control <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e($placeholder); ?>"></textarea>
    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <span class="text-danger" style="font-size: 0.8em;"><?php echo e($message); ?></span>
        </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\textarea-component.blade.php ENDPATH**/ ?>