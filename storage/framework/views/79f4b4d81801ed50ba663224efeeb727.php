<?php
    $optionKeys = [
        'profileFors',
        'heights',
        'motherTongues',
        'religions',
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

    $fields = config('formFields.accountDetails');
  
?>

<div class="modal fade" id="dynamicUpdateModal" tabindex="-1" role="dialog" aria-labelledby="dynamicModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e($actionUrl); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php switch($field['type']):
                            case ('text'): ?>
                                <div class="form-group">
                                    <label for="<?php echo e($field['name']); ?>"><b
                                            class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($field['label']); ?></label>
                                    <input type="text" name="<?php echo e($field['name']); ?>" id="<?php echo e($field['name']); ?>"
                                        value="<?php echo e(old($field['name'], $user->{$field['name']})); ?>"
                                        placeholder="<?php echo e($field['placeholder']); ?>"
                                        class="form-control <?php $__errorArgs = [$field['name']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    <?php $__errorArgs = [$field['name']];
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
                            <?php break; ?>

                            <?php case ('email'): ?>
                                <div class="form-group">
                                    <label for="<?php echo e($field['name']); ?>"><b
                                            class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($field['label']); ?></label>
                                    <input type="email" name="<?php echo e($field['name']); ?>" id="<?php echo e($field['name']); ?>"
                                        value="<?php echo e(old($field['name'], $user->{$field['name']})); ?>"
                                        placeholder="<?php echo e($field['placeholder']); ?>"
                                        class="form-control <?php $__errorArgs = [$field['name']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    <?php $__errorArgs = [$field['name']];
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
                            <?php break; ?>

                            <?php case ('select'): ?>
                                <div class="form-group">
                                    <label for="<?php echo e($field['name']); ?>"><b
                                            class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($field['label']); ?></label>
                                    <select name="<?php echo e($field['name']); ?>" id="<?php echo e($field['name']); ?>"
                                        class="form-control <?php $__errorArgs = [$field['name']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                        <option value="">Select an option</option>
                                        <?php $__currentLoopData = $profileFors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profileFor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($profileFor->id); ?>"
                                                <?php echo e(old($field['name'], $user->{$name}) == $profileFor->id ? 'selected' : ''); ?>>
                                                <?php echo e($profileFor->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = [$field['name']];
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
                            <?php break; ?>

                            <?php default: ?>
                                <div class="form-group">
                                    <label for="<?php echo e($field['name']); ?>"><?php echo e($field['label']); ?></label>
                                    <input type="text" name="<?php echo e($field['name']); ?>" id="<?php echo e($field['name']); ?>"
                                        value="<?php echo e(old($field['name'], $user->{$field['name']})); ?>"
                                        placeholder="<?php echo e($field['placeholder']); ?>"
                                        class="form-control <?php $__errorArgs = [$field['name']];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    <?php $__errorArgs = [$field['name']];
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
                        <?php endswitch; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\edit-modal-component.blade.php ENDPATH**/ ?>