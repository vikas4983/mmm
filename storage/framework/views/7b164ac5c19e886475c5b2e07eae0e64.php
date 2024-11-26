<?php switch($name):
    case ('date_of_birth'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <input type="<?php echo e($type); ?>" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                    value="<?php echo e(\Carbon\Carbon::parse($user->basicDetails->dob)->format('Y-m-d') ?? ''); ?>" disabled>
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
        </div>

        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
    <?php break; ?>

    <?php case ('time_of_birth'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <input type="time" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                    value="<?php echo e(\Carbon\Carbon::parse($user->horoscopeDetails->time_of_birth)->format('H:i')); ?>">
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
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
    <?php break; ?>

    <?php default: ?>
<?php endswitch; ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\input-profile-update-component.blade.php ENDPATH**/ ?>