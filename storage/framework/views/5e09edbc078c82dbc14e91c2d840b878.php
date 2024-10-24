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
    $fatherOccupations = \App\Models\FatherOccupation::where('status', 1)->get();
    $motherOccupations = \App\Models\MotherOccupation::where('status', 1)->get();
    $bodyTypes = \App\Models\BodyType::where('status', 1)->get();
    $complexions = \App\Models\Complextion::where('status', 1)->get();
    $bloodGroups = \App\Models\BloodGroup::where('status', 1)->get();
    $habits = \App\Models\Habit::where('status', 1)->get();
    $physicalStatuses = \App\Models\Challenge::where('status', 1)->get();
    $hobbies = \App\Models\Hobby::where('status', 1)->get();
    $interests = \App\Models\Interest::where('status', 1)->get();
    $musics = \App\Models\Music::where('status', 1)->get();
    $dresses = \App\Models\Dress::where('status', 1)->get();
    $movies = \App\Models\Movie::where('status', 1)->get();
    $sports = \App\Models\Sport::where('status', 1)->get();

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
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
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
                <label for="state">State</label>
                <select id="state" name="state" class="form-control">
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
                <label for="city">City</label>
                <select id="city" name="city" class="form-control">
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
            <div class="form-group" id="hiddenChildren" style="display: none">
                <label for="children"><b class="text-danger mr-5 gtRegMandatory">*</b>Children</label>
                <select id="children" name="children" class="form-control" >
                    <option value="">Select</option>
                    <option value="0">None</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                </select>
                <?php $__errorArgs = ['children'];
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

        <?php case ('father_occupation'): ?>
            <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select </option>
                <?php $__currentLoopData = $fatherOccupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fatherOccupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($fatherOccupation->id); ?>"
                        <?php echo e(old($name) == $fatherOccupation->id ? 'selected' : ''); ?>>
                        <?php echo e($fatherOccupation->name); ?>

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

        <?php case ('mother_occupation'): ?>
            <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select </option>
                <?php $__currentLoopData = $motherOccupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motherOccupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($motherOccupation->id); ?>"
                        <?php echo e(old($name) == $motherOccupation->id ? 'selected' : ''); ?>>
                        <?php echo e($motherOccupation->name); ?>

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

        <?php case ('body_type'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select </option>
                <?php $__currentLoopData = $bodyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bodyType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($bodyType->id); ?>" <?php echo e(old($name) == $bodyType->id ? 'selected' : ''); ?>>
                        <?php echo e($bodyType->name); ?>

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

        <?php case ('complexion'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select </option>
                <?php $__currentLoopData = $complexions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complexion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($complexion->id); ?>" <?php echo e(old($name) == $complexion->id ? 'selected' : ''); ?>>
                        <?php echo e($complexion->name); ?>

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

        <?php case ('blood_group'): ?>
            <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select </option>
                <?php $__currentLoopData = $bloodGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($bloodGroup->id); ?>" <?php echo e(old($name) == $bloodGroup->id ? 'selected' : ''); ?>>
                        <?php echo e($bloodGroup->name); ?>

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

        <?php case ('dietary_habit'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select </option>
                <?php $__currentLoopData = $habits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($habit->id); ?>" <?php echo e(old($name) == $habit->id ? 'selected' : ''); ?>>
                        <?php echo e($habit->name); ?>

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

        <?php case ('smoking_habit'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select </option>
                <?php $__currentLoopData = $habits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($habit->id); ?>" <?php echo e(old($name) == $habit->id ? 'selected' : ''); ?>>
                        <?php echo e($habit->name); ?>

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

        <?php case ('drinking_habit'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select </option>
                <?php $__currentLoopData = $habits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($habit->id); ?>" <?php echo e(old($name) == $habit->id ? 'selected' : ''); ?>>
                        <?php echo e($habit->name); ?>

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
        <?php case ('physical_status'): ?>
            <label for="<?php echo e($name); ?>"><b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                <option value="">Select </option>
                <?php $__currentLoopData = $physicalStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $physicalStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($physicalStatus->id); ?>" <?php echo e(old($name) == $physicalStatus->id ? 'selected' : ''); ?>>
                        <?php echo e($physicalStatus->name); ?>

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

        <?php case ('hobby'): ?>
            <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>[]" class="form-control" multiple
            multiselect-search="true" multiselect-select-all="true" >
                
                <?php $__currentLoopData = $hobbies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hobby): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($hobby->id); ?>" <?php echo e(old($name) == $hobby->id ? 'selected' : ''); ?>>
                        <?php echo e($hobby->name); ?>

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

        <?php case ('interest'): ?>
            <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>[]" class="form-control" multiple
            multiselect-search="true" multiselect-select-all="true" >
                
                <?php $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($interest->id); ?>" <?php echo e(old($name) == $interest->id ? 'selected' : ''); ?>>
                        <?php echo e($interest->name); ?>

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

        <?php case ('music'): ?>
            <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>[]" class="form-control" multiple
            multiselect-search="true" multiselect-select-all="true" >
                
                <?php $__currentLoopData = $musics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $music): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($music->id); ?>" <?php echo e(old($name) == $music->id ? 'selected' : ''); ?>>
                        <?php echo e($music->name); ?>

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

        <?php case ('dress'): ?>
            <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>[]" class="form-control" multiple
            multiselect-search="true" multiselect-select-all="true" >
               
                <?php $__currentLoopData = $dresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dresse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($dresse->id); ?>" <?php echo e(old($name) == $dresse->id ? 'selected' : ''); ?>>
                        <?php echo e($dresse->name); ?>

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

        <?php case ('movie'): ?>
            <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>[]" class="form-control"  multiple
            multiselect-search="true" multiselect-select-all="true" >
              
                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($movie->id); ?>" <?php echo e(old($name) == $movie->id ? 'selected' : ''); ?>>
                        <?php echo e($movie->name); ?>

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

        <?php case ('sport'): ?>
            <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>[]" class="form-control" multiple
                multiselect-search="true" multiselect-select-all="true" >
              
                <?php $__currentLoopData = $sports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($sport->id); ?>" <?php echo e(old($name) == $sport->id ? 'selected' : ''); ?>>
                        <?php echo e($sport->name); ?>

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
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/select-component.blade.php ENDPATH**/ ?>