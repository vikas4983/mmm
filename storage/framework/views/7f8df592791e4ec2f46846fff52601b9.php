<?php
    $optionKeys = [
        'profileFors',
        'heights',
        'motherTongues',
        'religions',
        'states',
        'cities',
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
        'complexions',
        'bloodGroups',
        'habits',
        'physicalStatuses',
        'hobbies',
        'interests',
        'musics',
        'dresses',
        'movies',
        'sports',
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
    $states = State::all();
    $cities = City::all();
?>
<?php switch($name):
    case ('country'): ?>
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
        <div class="col-md-6" id="hState">
           
            <div class="form-group">
                <label for="state">
                   State of Birth
                </label>
                <select id="state" name="state" class="form-control">
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

        <div class="col-md-6" id="hCity">
            <div class="form-group">
               
                <label for="city">
                   City of Birth
                </label>
                
                <select id="city" name="city" class="form-control">
                    <option value="">Select City</option>
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city->id); ?>"
                            <?php echo e(old($name, $user->horoscopeDetails->cities->id) == $city->id ? 'selected' : ''); ?>>
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
                    <option value="yes" <?php echo e(old($name, $user->horoscopeDetails->{$name} ?? '') == 'yes' ? 'selected' : ''); ?>>
                        Yes</option>
                    <option value="no" <?php echo e(old($name, $user->horoscopeDetails->{$name} ?? '') == 'no' ? 'selected' : ''); ?>>
                        No</option>
                    <option value="don't know"
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
<script>
    const birthCountry = document.getElementById("country");
    const birthState = document.getElementById("state");
    const birthCity = document.getElementById("city");

    birthCountry.addEventListener("change", function() {
        const birthCountryId = birthCountry.value;
        if (birthCountryId) {
            $.ajax({
                url: '/get-state/' + birthCountryId,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    birthState.innerHTML = '<option value="">Select State</option>';
                    data.forEach(state => {
                        birthState.innerHTML +=
                            `<option value="${state.id}">${state.state}</option>`;
                    });
                    birthCity.innerHTML =
                        '<option value="">Select City</option>'; // Reset city dropdown
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching states:', error);
                    alert('Failed to fetch states. Please try again later.');
                }
            });
        } else {
            birthState.innerHTML = '<option value="">Select State</option>';
            birthCity.innerHTML = '<option value="">Select City</option>';
        }
    });

    birthState.addEventListener("change", function() {
        const birthStateId = birthState.value;

        if (birthStateId) {
            $.ajax({
                url: '/get-city/' + birthStateId,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    birthCity.innerHTML = '<option value="">Select City</option>';
                    data.forEach(city => {
                        birthCity.innerHTML +=
                            `<option value="${city.id}">${city.city}</option>`;
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching cities:', error);
                    alert('Failed to fetch cities. Please try again later.');
                }
            });
        } else {
            birthCity.innerHTML = '<option value="">Select City</option>';
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\select-profile-update-component.blade.php ENDPATH**/ ?>