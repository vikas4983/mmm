<?php
    $profileFors = \App\Models\ProfileFor::all();
    $heights = \App\Models\Height::all();
    $motherTongues = \App\Models\MotherTongue::all();
    $religions = \App\Models\Religion::with('castes')->get();
    $maritalStatuses = \App\Models\MaritalStatus::all();

?>

<div class="form-group ">
    <?php switch($name):
        case ('profileFor'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                <option value="">Select <?php echo e($label); ?></option>
                <?php $__currentLoopData = $profileFors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profileFor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($profileFor->id); ?>" <?php echo e(old($name) == $profileFor->id ? 'selected' : ''); ?>>
                        <?php echo e($profileFor->name); ?>

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
        <?php break; ?>

        <?php case ('gender'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                <option value="">Select <?php echo e($label); ?></option>
                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($option); ?>" <?php echo e(old($name) == $option ? 'selected' : ''); ?>>
                        <?php echo e($option); ?>

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
        <?php break; ?>

        <?php case ('height'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select <?php echo e($label); ?></option>
                <?php $__currentLoopData = $heights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $height): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($height->id); ?>" <?php echo e(old($name) == $height->id ? 'selected' : ''); ?>>
                        <?php echo e($height->name); ?>

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
        <?php break; ?>

        <?php case ('mother_tongue'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select <?php echo e($label); ?></option>
                <?php $__currentLoopData = $motherTongues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motherTongue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($motherTongue->id); ?>" <?php echo e(old($name) == $motherTongue->id ? 'selected' : ''); ?>>
                        <?php echo e($motherTongue->name); ?>

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
        <?php break; ?>

        <?php case ('religion'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select <?php echo e($label); ?></option>
                <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($religion->id); ?>" <?php echo e(old($name) == $religion->id ? 'selected' : ''); ?>>
                        <?php echo e($religion->name); ?>

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
            <div class="form-group" id="hiddenCaste" style="display: none" required>
                <label for="caste"><b class="text-danger mr-5 gtRegMandatory">*</b>Caste</label>
                <select id="caste" name="caste" class="form-control">
                </select>
                <?php $__errorArgs = ['caste'];
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
        <?php break; ?>

        <?php case ('marital_status'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select <?php echo e($label); ?></option>
                <?php $__currentLoopData = $maritalStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maritalStatuse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($maritalStatuse->id); ?>" <?php echo e(old($name) == $maritalStatuse->id ? 'selected' : ''); ?>>
                        <?php echo e($maritalStatuse->name); ?>

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
        <?php break; ?>

        <?php default: ?>
            <p><?php echo e($label); ?> not recognized.</p>
    <?php endswitch; ?>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\select-component.blade.php ENDPATH**/ ?>