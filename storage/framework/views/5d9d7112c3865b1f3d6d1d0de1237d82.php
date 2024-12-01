<div class="form-group">
    <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
    <input type="<?php echo e($type); ?>" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" value="<?php echo e(old($name, $value)); ?>"
        placeholder="<?php echo e($placeholder); ?>" class="form-control  <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        <?php if($type === 'number'): ?> minlength="10" maxlength="12" <?php endif; ?> required>

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