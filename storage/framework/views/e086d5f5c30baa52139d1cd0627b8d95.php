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
<div class="gt-panel gt-panel-default" id="updateBasicSection" style="display: none">
    <div class="gt-panel-head">
        <span class="pull-left"><i class="fa fa-book"></i>Basic Information</span>
        <a class="pull-right btn gt-btn-orange" id="updateBasicBtn">
            <i class="fas fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">Update</font>
        </a>
    </div>

    <form id="basicDetailsForm">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <div class="gt-panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="height"><b class="text-danger mr-5 gtRegMandatory">*</b>Height</label>

                        <select id="height" name="height" class="form-control" required>
                            <option value="">Select Height</option>
                            <?php $__currentLoopData = $heights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $height): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($height->id); ?>"
                                    <?php echo e(old('height', $user->basicDetails->heights->id) == $height->id ? 'selected' : ''); ?>>
                                    <?php echo e($height->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['height'];
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

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mother_tongue"><b class="text-danger mr-5 gtRegMandatory">*</b>Mother Tongue</label>
                        <select id="mother_tongue" name="mother_tongue" class="form-control" required>
                            <option value="">Select Mother Tongue</option>
                            <?php $__currentLoopData = $motherTongues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motherTongue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($motherTongue->id); ?>"
                                    <?php echo e(old('mother_tongue', $user->basicDetails->motherTongues->id) == $motherTongue->id ? 'selected' : ''); ?>>
                                    <?php echo e($motherTongue->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['mother_tongue'];
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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="religion"><b class="text-danger mr-5 gtRegMandatory">*</b>Religion</label>
                        <select id="religion" name="religion" class="form-control" disabled required>
                            <option value="">Select Religion</option>
                            <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($religion->id); ?>"
                                    <?php echo e(old('religion', $user->basicDetails->religions->id) == $religion->id ? 'selected' : ''); ?>>
                                    <?php echo e($religion->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['religion'];
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
                <div class="col-md-6" id="editCaste">
                    <div class="form-group">
                        <label for="caste"><b class="text-danger mr-5 gtRegMandatory">*</b>Caste</label>
                        <select id="caste" name="caste" class="form-control" required>
                            
                            <?php $__currentLoopData = $user->basicDetails->religions->castes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($caste->id); ?>"
                                    <?php echo e(old('caste', $user->basicDetails->castes->id) == $caste->id ? 'selected' : ''); ?>>
                                    <?php echo e($caste->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="marital_status"><b class="text-danger mr-5 gtRegMandatory">*</b>Marital
                            Status</label>
                        <select id="marital_status" name="marital_status" class="form-control" required disabled>
                            <?php $__currentLoopData = $maritalStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maritalStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($maritalStatus->id); ?>"
                                    <?php echo e(old('marital_status', $user->basicDetails->maritalStatus->id) == $maritalStatus->id ? 'selected' : ''); ?>>
                                    <?php echo e($maritalStatus->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['marital_status'];
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
                <div class="col-md-6" id="editCaste">
                    <div class="form-group">
                        <label for="children"><b class="text-danger mr-5 gtRegMandatory">*</b>Children</label>
                        <select id="children" name="children" class="form-control">
                            <option value="0"
                                <?php echo e(old('children', $user->basicDetails->children ?? 'None') == 'None' ? 'selected' : ''); ?>>
                                None
                            </option>
                            <option value="1"
                                <?php echo e(old('children', $user->basicDetails->children ?? 'One') == 'One' ? 'selected' : ''); ?>>
                                One
                            </option>
                            <option value="2"
                                <?php echo e(old('children', $user->basicDetails->children ?? 'Two') == 'Two' ? 'selected' : ''); ?>>
                                Two
                            </option>
                            <option value="3"
                                <?php echo e(old('children', $user->basicDetails->children ?? 'Three') == 'Three' ? 'selected' : ''); ?>>
                                Three
                            </option>
                            <option value="4"
                                <?php echo e(old('children', $user->basicDetails->children ?? 'Four') == 'Four' ? 'selected' : ''); ?>>
                                Four
                            </option>
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
                </div>
                <div class="col-md-6" id="editCaste">
                    <div class="form-group">
                        <label for="other_caste_marriage"><b class="text-danger mr-5 gtRegMandatory">*</b>Willing To marry in other caste?</label>
                        <select id="other_caste_marriage" name="other_caste_marriage" class="form-control">
                            <option value="1"
                                <?php echo e(old('other_caste_marriage', $user->basicDetails->other_caste_marriage ?? 'Yes') == 'Yes' ? 'selected' : ''); ?>>
                                Yes
                            </option>
                            <option value="0"
                                <?php echo e(old('other_caste_marriage', $user->basicDetails->other_caste_marriage ?? 'No') == 'No' ? 'selected' : ''); ?>>
                                No
                            </option>

                        </select>
                        <?php $__errorArgs = ['other_caste_marriage'];
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


        </div>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let editBasic = document.getElementById("editBasic");
        let editBasicSection = document.getElementById("editBasicSection");
        let updateBasicSection = document.getElementById("updateBasicSection");
        let updateBasicBtn = document.getElementById("updateBasicBtn");
        if (editBasic) {
            editBasic.addEventListener("click", function() {
                console.log('Edit button clicked');
                if (updateBasicSection && editBasicSection) {
                    updateBasicSection.style.display = "block";
                    editBasicSection.style.display = "none";
                }
            });
        }
        if (updateBasicBtn) {
            updateBasicBtn.addEventListener("click", function(e) {
                e.preventDefault();
                const height = document.getElementById('height')?.value;
                const motherTongue = document.getElementById('mother_tongue')?.value;
                const caste = document.getElementById('caste')?.value;
                const children = document.getElementById('children')?.value;
                const otherCasteMarriage = document.getElementById('other_caste_marriage')?.value;
                $.ajax({
                    url: "<?php echo e(route('update.basic.details')); ?>",
                    method: "PATCH",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        height: height,
                        mother_tongue: motherTongue,
                        children: children,
                        caste: caste,
                        other_caste_marriage: otherCasteMarriage,
                    },
                    success: function(response) {
                        $('#updateBasicBtn').prop('disabled', false);
                        if (response.success) {
                            updateBasicSection.style.display = "none";
                            editBasicSection.style.display = "block";
                            $('#userHeight').text(response.user.height);
                            $('#userMotherTongue').text(response.user.mother_tongue);
                            $('#userCaste').text(response.user.caste);
                            $('#userChildren').text(response.user.children);
                            $('#userOtherCasteMarrige').text(response.user.otherCasteMarriage);
                            $('#basicDetailsAlert').get(0).scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                            $('#basicDetailsAlert').html(`
                             <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 role="alert">
                                 ${response.message}
                              <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
                                  `);
                            setTimeout(function() {
                                $('.alert').fadeOut('slow', function() {
                                    $(this)
                                        .remove();
                                });
                            }, 1500);

                        } else {
                            alert('Failed to update details. Please try again.');
                        }
                    },

                });
            });
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\update-basic-details-component.blade.php ENDPATH**/ ?>