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
                        case ('profile_for'): ?>
                            <label for="<?php echo e($name); ?>"><b
                                    class="text-danger mr-5 gtRegMandatory">*</b><?php echo e($label); ?></label>
                            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                                <option value="">Select <?php echo e($label); ?></option>
                                <?php $__currentLoopData = $profileFors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profileFor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($profileFor->id); ?>"
                                        <?php echo e(old($name) == $profileFor->id ? 'selected' : ''); ?>>
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

                        <?php default: ?>
                            <div class="form-group">
                                <label><?php echo e(ucfirst($field)); ?></label>
                                <input type="text" class="form-control" name="<?php echo e($field); ?>"
                                    value="<?php echo e($data[$field] ?? ''); ?>" placeholder="Enter <?php echo e(ucfirst($field)); ?>">
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
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\dynamic-update-modal.blade.php ENDPATH**/ ?>