<?php
    $profileFors = \App\Models\ProfileFor::all();
    $heights = \App\Models\Height::all();
    $motherTongues = \App\Models\MotherTongue::all();
    $religions = \App\Models\Religion::with('castes')->get();

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
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                <option value="">Select <?php echo e($label); ?></option>
                <?php $__currentLoopData = $heights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $height): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($height->id); ?>" <?php echo e(old($name) == $height->id ? 'selected' : ''); ?>>
                        <?php echo e($height->height); ?>

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
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                <option value="">Select <?php echo e($label); ?></option>
                <?php $__currentLoopData = $motherTongues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motherTongue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($motherTongue->id); ?>" <?php echo e(old($name) == $motherTongue->id ? 'selected' : ''); ?>>
                        <?php echo e($motherTongue->mother_tongue); ?>

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
            <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" class="form-control">
                <option value="">Select <?php echo e($label); ?></option>
                <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($religion->id); ?>" <?php echo e(old($name) == $religion->id ? 'selected' : ''); ?>>
                        <?php echo e($religion->religion); ?>

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
            <div class="form-group">
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
            <script>
                const religion = document.getElementById("religion");
                religion.addEventListener("change", function(e) {
                    let religionId = religion.value; // Get the selected value
                    alert('hello'); // Debugging alert
                    console.log(religionId); // Log the selected value

                    // Call AJAX only when the religionId is valid
                    if (religionId) {
                        $.ajax({
                            url: '/get-caste/' + religionId, // Use the correct variable name
                            type: 'GET', // Ensure the request type is a string
                            dataType: 'json', // Ensure the dataType is a string
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token here
                            },
                            success: function(data) { // Handle successful response
                                $("#caste").empty(); // Clear previous options
                                $("#caste").append('<option value="">Select Caste</option>');
                                $.each(data, function(key, value) { // Loop through data
                                    $('#caste').append('<option value="' + value.id + '">' + value
                                        .caste + '</option>');
                                });
                            },
                            error: function(xhr, status, error) {
                                // Log the error response for debugging
                                console.error('Error Status:', status);
                                console.error('Error Details:', xhr.responseText);

                                // Notify the user of the error
                                alert(
                                    'An error occurred while fetching the caste data. Please try again later.');
                            }
                        });
                    } else {
                        $('#caste').empty();
                        $('#caste').append('<option value="">Select Caste</option>');
                    }
                });
            </script>
        <?php break; ?>

        <?php case ('caste'): ?>
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

        <?php case ('marital_status'): ?>
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

        <?php default: ?>
            <p><?php echo e($label); ?> not recognized.</p>
    <?php endswitch; ?>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\select-component.blade.php ENDPATH**/ ?>