<?php
    $profileFors = \App\Models\ProfileFor::where('status', 1)->get();
    $heights = \App\Models\Height::where('status', 1)->get();
    $motherTongues = \App\Models\MotherTongue::where('status', 1)->get();
    $religions = \App\Models\Religion::with('castes')->where('status', 1)->get();
    $maritalStatuses = \App\Models\MaritalStatus::where('status', 1)->get();
    $rashies = \App\Models\Rashi::where('status', 1)->get();
    $countries = \App\Models\Country::where('status', 1)->get();
    $educations = \App\Models\Education::where('status', 1)->get();
    $employees = \App\Models\Employee::where('status', 1)->get();
    $occupations = \App\Models\Occupation::where('status', 1)->get();
    $incomes = \App\Models\Income::where('status', 1)->get();

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

        <?php case ('country'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" >
                <option value="">Select </option>
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>" <?php echo e(old($name) == $country->id ? 'selected' : ''); ?>>
                        <?php echo e($country->country); ?>

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
            <div class="form-group" id="hiddenState" style="display: none">
                <label for="state">State of birth</label>
                <select id="state" name="state" class="form-control" >
                </select>
                <?php $__errorArgs = ['state'];
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
            <div class="form-group" id="hiddenCity" style="display: none">
                <label for="city">City of birth</label>
                <select id="city" name="city" class="form-control" >
                </select>
                <?php $__errorArgs = ['city'];
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

        <?php case ('rashi'): ?>
            <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                <option value="">Select <?php echo e($label); ?></option>
                <?php $__currentLoopData = $rashies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rashi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($rashi->id); ?>" <?php echo e(old($name) == $rashi->id ? 'selected' : ''); ?>>
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
        <?php break; ?>

        <?php case ('education'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select</option>
                <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($education->id); ?>" <?php echo e(old($name) == $education->id ? 'selected' : ''); ?>>
                        <?php echo e($education->education); ?>

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

        <?php case ('employee'): ?>
        <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select </option>
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($employee->id); ?>" <?php echo e(old($name) == $employee->id ? 'selected' : ''); ?>>
                        <?php echo e($employee->employee); ?>

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
            <div class="form-group" id="hiddenOccupation" style="display: none">
                <label for="occupation"><b class="text-danger mr-5 gtRegMandatory">*</b>Occupation</label>
                <select id="occupation" name="occupation" class="form-control" required>
                </select>
                <?php $__errorArgs = ['occupation'];
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

        <?php case ('income'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select </option>
                <?php $__currentLoopData = $incomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($income->id); ?>" <?php echo e(old($name) == $income->id ? 'selected' : ''); ?>>
                        <?php echo e($income->income); ?>

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
            <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                <option value="">Select</option>
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
    <?php endswitch; ?>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\select-component.blade.php ENDPATH**/ ?>