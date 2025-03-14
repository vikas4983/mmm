<?php switch($name):
    case ('name'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <br>
                <input type="<?php echo e($type); ?>" class="form-control" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                    value="<?php echo e(old($name, $user->name ?? '')); ?>" placeholder="<?php echo e($placeholder); ?> ">
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

    <?php case ('user_email'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <br>
                <input type="email" class="form-control" name="user_email" id="user_email"
                    value="<?php echo e(old($name, $user->email ?? '')); ?>" placeholder="<?php echo e($placeholder); ?> ">
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

    <?php case ('date_of_birth'): ?>
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

    <?php case ('organization_name'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <br>
                <input type="<?php echo e($type); ?>" class="form-control" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                    value="<?php echo e(old($name, $user->carrierDetails->organization_name ?? '')); ?>"
                    placeholder="<?php echo e($placeholder); ?> ">
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

    <?php case ('school_name'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <br>
                <input type="<?php echo e($type); ?>" class="form-control" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                    value="<?php echo e(old($name, $user->carrierDetails->school_name ?? '')); ?>" placeholder="<?php echo e($placeholder); ?> ">
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

    <?php case ('college_name'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <br>
                <input type="<?php echo e($type); ?>" class="form-control" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                    value="<?php echo e(old($name, $user->carrierDetails->college_name ?? '')); ?>" placeholder="<?php echo e($placeholder); ?> ">
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

    <?php case ('father_gotra'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <br>
                <input type="<?php echo e($type); ?>" class="form-control" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                    value="<?php echo e(old($name, $user->familyDetails->father_gotra ?? '')); ?>" placeholder="<?php echo e($placeholder); ?> ">
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

    <?php case ('mother_gotra'): ?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <br>
                <input type="<?php echo e($type); ?>" class="form-control" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                    value="<?php echo e(old($name, $user->familyDetails->mother_gotra ?? '')); ?>" placeholder="<?php echo e($placeholder); ?> ">
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

    <?php case ('contact_address'): ?>
        <div class="col-md-13">
            <div class="form-group">
                <label for="<?php echo e($name); ?>">
                    <?php echo e($label); ?>

                </label>
                <br>
                <input type="<?php echo e($type); ?>" class="form-control" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                    value="<?php echo e(old($name, $user->familyDetails->contact_address ?? '')); ?>"
                    placeholder="<?php echo e($placeholder); ?> ">
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
                    <?php echo e($label); ?>

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
    <?php case ('alternate_mobile'): ?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="<?php echo e($name); ?>">
                <?php echo e($label); ?>

            </label>
            <br>
            <input type="<?php echo e($type); ?>" class="form-control" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
            value="<?php echo e(old($name, $user->contactDetails->alternate_mobile ?? '')); ?>"
            placeholder="<?php echo e($placeholder); ?>" maxlength="10" pattern="\d{10}" 
            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" >
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
    <?php case ('landline_number'): ?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="<?php echo e($name); ?>">
                <?php echo e($label); ?>

            </label>
            <br>
            <input type="<?php echo e($type); ?>" class="form-control" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
            value="<?php echo e(old($name, $user->contactDetails->landline_number ?? '')); ?>"
            placeholder="<?php echo e($placeholder); ?>" maxlength="10" pattern="\d{10}" 
            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" >
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
    <?php case ('address'): ?>
    <div class="col-md-13">
        <div class="form-group">
            <label for="<?php echo e($name); ?>">
                <?php echo e($label); ?>

            </label>
            <br>
            <input type="<?php echo e($type); ?>" class="form-control" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
            value="<?php echo e(old($name, $user->contactDetails->address ?? '')); ?>"
            placeholder="<?php echo e($placeholder); ?>">
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
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/input-profile-update-component.blade.php ENDPATH**/ ?>