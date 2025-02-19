<?php

    $optionKeys = [
        'profileFors',
        'heights',
        'motherTongues',
        'religions',
        // 'states',
        //'cities',
        'maritalStatuses',
        'rashies',
        'countries',
        'educations',
        'employees',
        'occupations',
        'incomes',
        'fatherOccupations',
        'motherOccupations',
        'bodyTypes',
        'complextions',
        'bloodGroups',
        'habits',
        'physicalStatuses',
        'hobbies',
        'interests',
        'musics',
        'dresses',
        'movies',
        'sports',
        // 'familyTypes',
        // 'familyValues',
        // 'familyStatus',
    ];

    $optionData = [];
    foreach ($optionKeys as $key) {
        $optionData[$key] = Cache::get($key);
    }
    extract($optionData);

?>
<?php
    use App\Models\State;
    use App\Models\City;
    use App\Models\familyType;
    use App\Models\familyValue;
    use App\Models\familyStatus;
    use App\Models\BodyType;
    use App\Models\Complextion;
    use App\Models\DietaryHabit;
    use App\Models\Habit;
    use App\Models\Challenge;
    use App\Models\BloodGroup;
    use App\Models\LanguageSpeak;
    use App\Models\Relationship;

    $states = State::all();
    $cities = City::all();
    $familyTypes = FamilyType::all();
    $familyValues = FamilyValue::all();
    $familyStatus = FamilyStatus::all();
    $bodyTypes = BodyType::all();
    $complextions = Complextion::all();
    $dietaryHabits = DietaryHabit::all();
    $habits = Habit::all();

    $physicalStatuses = Challenge::all();
    $bloodGroups = BloodGroup::all();
    $languageSpeaks = LanguageSpeak::all();
    $relationships = Relationship::all();

?>
<?php switch($name):
    case ('profile_for'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <option value="">Select <?php echo e($label); ?></option>
                    <?php $__currentLoopData = $profileFors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profileFor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($profileFor->id); ?>"
                            <?php echo e(old($name, $user->profile_for ?? null) == $profileFor->name ? 'selected' : ''); ?>>
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
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    <?php break; ?>

    <?php case ('country'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>

                <select id="country" name="<?php echo e($name); ?>" class="form-control">
                    <option value="">Select Country</option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"
                            <?php echo e(old($name, $user->carrierDetails->countries->id) == $country->id ? 'selected' : ''); ?>>
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
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="state">
                    State
                </label>
                <select id="hstate" name="state" class="form-control">
                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>"
                            <?php echo e(old($name, $user->carrierDetails->states->id) == $state->id ? 'selected' : ''); ?>>
                            <?php echo e($state->state); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
        <?php if($label === 'Country of birth'): ?>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city">
                        City Of Birth
                    </label>
                    <select id="hcity" name="city" class="form-control">
                        <option value="">Select City</option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city->id); ?>"
                                <?php echo e(old($name, $user->horoscopeDetails->cities->id ?? '') == $city->id ? 'selected' : ''); ?>>
                                <?php echo e($city->city); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            </div>
        <?php else: ?>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city">
                        City
                    </label>
                    <select id="hcity" name="city" class="form-control">
                        <option value="">Select City</option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city->id); ?>"
                                <?php echo e(old('city', $user->carrierDetails->cities->id ?? '') == $city->id ? 'selected' : ''); ?>>
                                <?php echo e($city->city); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            </div>
        <?php endif; ?>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    <?php break; ?>

    <?php case ('rashi'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

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
        </div>
    <?php break; ?>

    <?php case ('manglik'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
               
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <option value="1" <?php echo e(old($name, $user->horoscopeDetails->{$name} ?? '') == 'yes' ? 'selected' : ''); ?>>
                        Yes</option>
                    <option value="2" <?php echo e(old($name, $user->horoscopeDetails->{$name} ?? '') == 'no' ? 'selected' : ''); ?>>
                        No</option>
                    <option value="0"
                        <?php echo e(old($name, $user->horoscopeDetails->{$name} ?? '') == "don't know" ? 'selected' : ''); ?>>Don't Know
                    </option>
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
        </div>
    <?php break; ?>

    <?php case ('horoscope_match'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <option value="yes" <?php echo e(old($name, $user->horoscopeDetails->{$name} ?? '') == 'yes' ? 'selected' : ''); ?>>
                        Yes</option>
                    <option value="no" <?php echo e(old($name, $user->horoscopeDetails->{$name} ?? '') == 'no' ? 'selected' : ''); ?>>
                        No</option>
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
        </div>
    <?php break; ?>

    <?php case ('horoscope_show'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>

                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <option value="1" <?php echo e(old($name, $user->horoscopeDetails->{$name} ?? '') == 'yes' ? 'selected' : ''); ?>>
                        Yes</option>
                    <option value="0" <?php echo e(old($name, $user->horoscopeDetails->{$name} ?? '') == 'no' ? 'selected' : ''); ?>>
                        No</option>
                    <option value="2"
                        <?php echo e(old($name, $user->horoscopeDetails->{$name} ?? '') == 'only accept member' ? 'selected' : ''); ?>>Only
                        Accept Member</option>
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
        </div>
    <?php break; ?>

    <?php case ('education'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($education->id); ?>"
                            <?php echo e(old($name, $user->carrierDetails->{$name} ?? '') == $education->id ? 'selected' : ''); ?>>
                            <?php echo e($education->{$name}); ?>

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
        </div>
    <?php break; ?>

    <?php case ('employee'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($employee->id); ?>"
                            <?php echo e(old($name, $user->carrierDetails->{$name} ?? '') == $employee->id ? 'selected' : ''); ?>>
                            <?php echo e($employee->{$name}); ?>

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
        </div>
    <?php break; ?>

    <?php case ('occupation'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($occupation->id); ?>"
                            <?php echo e(old($name, $user->carrierDetails->{$name} ?? '') == $occupation->id ? 'selected' : ''); ?>>
                            <?php echo e($occupation->{$name}); ?>

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
        </div>
    <?php break; ?>

    <?php case ('income'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $incomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($income->id); ?>"
                            <?php echo e(old($name, $user->carrierDetails->{$name} ?? '') == $income->id ? 'selected' : ''); ?>>
                            <?php echo e($income->{$name}); ?>

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
        </div>
    <?php break; ?>

    <?php case ('interested_abroad'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                    <option value="1" <?php echo e(old($name, $user->carrierDetails->{$name} ?? '') == 'Yes' ? 'selected' : ''); ?>>
                        Yes</option>
                    <option value="0" <?php echo e(old($name, $user->carrierDetails->{$name} ?? '') == 'No' ? 'selected' : ''); ?>>
                        No</option>

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
        </div>
    <?php break; ?>

    <?php case ('father_occupation'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $fatherOccupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fatherOccupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($fatherOccupation->id); ?>"
                            <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == $fatherOccupation->id ? 'selected' : ''); ?>>
                            <?php echo e($fatherOccupation->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('mother_occupation'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $motherOccupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motherOccupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($motherOccupation->id); ?>"
                            <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == $motherOccupation->id ? 'selected' : ''); ?>>
                            <?php echo e($motherOccupation->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('brother'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <option value="None" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'None' ? 'selected' : ''); ?>>
                        None</option>
                    <option value="One" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'One' ? 'selected' : ''); ?>>
                        One
                    </option>
                    <option value="Two" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Two' ? 'selected' : ''); ?>>
                        Two
                    </option>
                    <option value="Three"
                        <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Three' ? 'selected' : ''); ?>>
                        Three</option>
                    <option value="Four" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Four' ? 'selected' : ''); ?>>
                        Four</option>

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
        </div>
    <?php break; ?>

    <?php case ('brother_married'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <option value="None" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'None' ? 'selected' : ''); ?>>
                        None</option>
                    <option value="One" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'One' ? 'selected' : ''); ?>>
                        One
                    </option>
                    <option value="Two" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Two' ? 'selected' : ''); ?>>
                        Two
                    </option>
                    <option value="Three"
                        <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Three' ? 'selected' : ''); ?>>
                        Three</option>
                    <option value="Four" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Four' ? 'selected' : ''); ?>>
                        Four</option>

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
        </div>
    <?php break; ?>

    <?php case ('sister'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <option value="None" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'None' ? 'selected' : ''); ?>>
                        None</option>
                    <option value="One" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'One' ? 'selected' : ''); ?>>
                        One
                    </option>
                    <option value="Two" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Two' ? 'selected' : ''); ?>>
                        Two
                    </option>
                    <option value="Three"
                        <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Three' ? 'selected' : ''); ?>>
                        Three</option>
                    <option value="Four" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Four' ? 'selected' : ''); ?>>
                        Four</option>

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
        </div>
    <?php break; ?>

    <?php case ('sister_married'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>

                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <option value="None" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'None' ? 'selected' : ''); ?>>
                        None</option>
                    <option value="One" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'One' ? 'selected' : ''); ?>>
                        One
                    </option>
                    <option value="Two" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Two' ? 'selected' : ''); ?>>
                        Two
                    </option>
                    <option value="Three"
                        <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Three' ? 'selected' : ''); ?>>
                        Three</option>
                    <option value="Four" <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == 'Four' ? 'selected' : ''); ?>>
                        Four</option>

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
        </div>
    <?php break; ?>

    <?php case ('family_type'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $familyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $familyType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($familyType->id); ?>"
                            <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == $familyType->id ? 'selected' : ''); ?>>
                            <?php echo e($familyType->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('family_status'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $familyStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $familyStatuse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($familyStatuse->id); ?>"
                            <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == $familyStatuse->id ? 'selected' : ''); ?>>
                            <?php echo e($familyStatuse->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('family_value'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $familyValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $familyValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($familyValue->id); ?>"
                            <?php echo e(old($name, $user->familyDetails->{$name} ?? '') == $familyValue->id ? 'selected' : ''); ?>>
                            <?php echo e($familyValue->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('family_living'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    Family Country
                </label>
                <select id="family_living" name="<?php echo e($name); ?>" class="form-control" required>
                    <option value="">Select Country</option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>">
                            <?php echo e($country->country); ?>

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
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="family_state">
                    Family State
                </label>
                <select id="family_state" name="family_state" class="form-control" required>

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
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="state">
                    Family City
                </label>
                <select id="family_city" name="family_city" class="form-control" required>

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
        </div>
    <?php break; ?>

    <?php case ('body_type'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $bodyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bodyType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($bodyType->id); ?>"
                            <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == $bodyType->id ? 'selected' : ''); ?>>
                            <?php echo e($bodyType->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('complextion'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $complextions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complextion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($complextion->id); ?>"
                            <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == $complextion->id ? 'selected' : ''); ?>>
                            <?php echo e($complextion->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('dietary_habit'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $dietaryHabits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dietaryHabit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($dietaryHabit->id); ?>"
                            <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == $dietaryHabit->id ? 'selected' : ''); ?>>
                            <?php echo e($dietaryHabit->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('drinking_habit'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $habits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($habit->id); ?>"
                            <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == $habit->name ? 'selected' : ''); ?>>
                            <?php echo e($habit->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('smoking_habit'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $habits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($habit->id); ?>"
                            <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == $habit->name ? 'selected' : ''); ?>>
                            <?php echo e($habit->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('physical_status'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <b class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $physicalStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $physicalStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($physicalStatus->id); ?>"
                            <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == $physicalStatus->id ? 'selected' : ''); ?>>
                            <?php echo e($physicalStatus->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('blood_group'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $bloodGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($bloodGroup->id); ?>"
                            <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == $bloodGroup->id ? 'selected' : ''); ?>>
                            <?php echo e($bloodGroup->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('open_to_pet'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>

                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                    <option value="Yes"
                        <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == 'Yes' ? 'selected' : ''); ?>>Yes
                    </option>
                    <option value="No"
                        <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == 'No' ? 'selected' : ''); ?>>No
                    </option>
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
        </div>
    <?php break; ?>

    <?php case ('own_house'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                    <option value="Yes"
                        <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == 'Yes' ? 'selected' : ''); ?>>Yes
                    </option>
                    <option value="No"
                        <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == 'No' ? 'selected' : ''); ?>>No
                    </option>
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
        </div>
    <?php break; ?>

    <?php case ('own_car'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                    <option value="Yes"
                        <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == 'Yes' ? 'selected' : ''); ?>>Yes
                    </option>
                    <option value="No"
                        <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == 'No' ? 'selected' : ''); ?>>No
                    </option>
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
        </div>
    <?php break; ?>

    <?php case ('language_speak'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <br/>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>[]" multiple
                    class="form-control js-example-basic-multiple">
                    <?php $__currentLoopData = $languageSpeaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $languageSpeak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($languageSpeak->id); ?>"
                            <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == $languageSpeak->id ? 'selected' : ''); ?>>
                            <?php echo e($languageSpeak->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('hiv'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                    <option value="Yes"
                        <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == 'Yes' ? 'selected' : ''); ?>>Yes
                    </option>
                    <option value="No"
                        <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == 'No' ? 'selected' : ''); ?>>No
                    </option>
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
        </div>
    <?php break; ?>

    <?php case ('thalassemia'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                    <option value="Yes"
                        <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == 'Yes' ? 'selected' : ''); ?>>Yes
                    </option>
                    <option value="No"
                        <?php echo e(old($name, $user->lifestyleDetails->{$name} ?? '') == 'No' ? 'selected' : ''); ?>>No
                    </option>
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
        </div>
    <?php break; ?>

    <?php case ('alternate_owned_by'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $profileFors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profileFor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($profileFor->name); ?>"
                            <?php echo e(old($name, $user->contactDetails->{$name} ?? '') == $profileFor->name ? 'selected' : ''); ?>>
                            <?php echo e($profileFor->name); ?>

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
        </div>
    <?php break; ?>

    <?php case ('landline_owned_by'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control" required>
                    <?php $__currentLoopData = $profileFors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profileFor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($profileFor->name); ?>"
                            <?php echo e(old($name, $user->contactDetails->{$name} ?? '') == $profileFor->name ? 'selected' : ''); ?>>
                            <?php echo e($profileFor->name); ?>

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
        </div>
    <?php break; ?>

    <?php default: ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>

                <input type="text" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control"
                    value="<?php echo e(old($name, $user->horoscopeDetails->{$name} ?? '')); ?>" required>
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
        </div>
    <?php break; ?>

<?php endswitch; ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/select-profile-update-component.blade.php ENDPATH**/ ?>