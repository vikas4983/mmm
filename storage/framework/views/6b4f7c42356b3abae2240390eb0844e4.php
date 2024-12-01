<style>
    .radio-group {
        margin-bottom: 1rem;
    }

    .radio-options {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .radio-option {
        display: flex;
        align-items: center;
    }

    .radio-option label {
        margin-left: 0.5rem;
    }
</style>

<?php switch($name):
    case ('manglik'): ?>
    <?php case ('horoscope_match'): ?>
    <?php case ('horoscope_show'): ?>
        <div class="col-md-6">
            <div class="radio-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <div class="radio-options">
                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $optionLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="radio-option">
                            <input type="radio" id="<?php echo e($name); ?>-<?php echo e($value); ?>" name="<?php echo e($name); ?>"
                                value="<?php echo e($value); ?>" <?php echo e($value == $selected ? 'checked' : ''); ?>>
                            <label for="<?php echo e($name); ?>-<?php echo e($value); ?>">
                                <?php echo e($optionLabel); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
        <?php break; ?>

    <?php default: ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <option value="">Select <?php echo e($label); ?></option>
                    <?php $__currentLoopData = $rashies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rashi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($rashi->id); ?>"
                            <?php echo e(old($name, $user->horoscopeDetails->rashi ?? null) == $rashi->id ? 'selected' : ''); ?>>
                            <?php echo e($rashi->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
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
<?php endswitch; ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\radio-profile-update-component.blade.php ENDPATH**/ ?>