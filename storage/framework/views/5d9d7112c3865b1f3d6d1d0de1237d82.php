<div class="form-group">
    <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>

    <input
        type="<?php echo e($name === 'password' || $name === 'password_confirmation'
            ? 'password'
            : ($name === 'email'
                ? 'email'
                : ($name === 'mobile'
                    ? 'number'
                    : ($name === 'time_of_birth'
                        ? 'time'
                        : ($name === 'dob'
                            ? 'date'
                            : 'text'))))); ?>"
        name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" value="<?php echo e(old($name, $value)); ?>"
        class="form-control <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

    <?php if($name === 'password'): ?>
        
    <?php endif; ?>

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
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\input-component.blade.php ENDPATH**/ ?>