<div class="gt-panel gt-panel-default" id="updateUserFamilySection" style="display: none;">
    <div class="gt-panel-head">
        <span class="pull-left">
            <?php
                $fields = config('formFields.editUserFamilyDetails');

            ?>
            <i class="fa fa-book"></i>Family Information </span>
        <a class="pull-right btn gt-btn-orange" id="updateUserFamilyBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">Update</font>
        </a>
    </div>
    <form id="userFamilyDetailsForm" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <div class="gt-panel-body">
            <div class="row">
                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php switch($field['type']):
                        case ('select'): ?>
                            <?php if (isset($component)) { $__componentOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb = $attributes; } ?>
<?php $component = App\View\Components\SelectProfileUpdateComponent::resolve(['user' => $user,'name' => $field['name'],'label' => $field['label'],'options' => $field['options']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select-profile-update-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SelectProfileUpdateComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($field['rules'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb)): ?>
<?php $attributes = $__attributesOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb; ?>
<?php unset($__attributesOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb)): ?>
<?php $component = $__componentOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb; ?>
<?php unset($__componentOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb); ?>
<?php endif; ?>
                        <?php break; ?>

                        

                        <?php default: ?>
                            <?php if (isset($component)) { $__componentOriginal8f7e6025eb2c56b8cc3e102acac9cb35 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8f7e6025eb2c56b8cc3e102acac9cb35 = $attributes; } ?>
<?php $component = App\View\Components\InputProfileUpdateComponent::resolve(['user' => $user,'name' => $field['name'],'label' => $field['label'],'type' => 'text'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-profile-update-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\InputProfileUpdateComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($field['rules'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8f7e6025eb2c56b8cc3e102acac9cb35)): ?>
<?php $attributes = $__attributesOriginal8f7e6025eb2c56b8cc3e102acac9cb35; ?>
<?php unset($__attributesOriginal8f7e6025eb2c56b8cc3e102acac9cb35); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8f7e6025eb2c56b8cc3e102acac9cb35)): ?>
<?php $component = $__componentOriginal8f7e6025eb2c56b8cc3e102acac9cb35; ?>
<?php unset($__componentOriginal8f7e6025eb2c56b8cc3e102acac9cb35); ?>
<?php endif; ?>
                    <?php endswitch; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById("editUserFamilyBtn").addEventListener("click", function() {

            document.getElementById("editUserFamilySection").style.display = 'none';
            document.getElementById("updateUserFamilySection").style.display = 'block';
        });
        let updateUserFamilyBtn = document.getElementById("updateUserFamilyBtn");
        let form = document.getElementById("updateUserFamilyBtn");
        if (updateUserFamilyBtn) {
            updateUserFamilyBtn.addEventListener("click", function() {
                const fatherOccupation = document.getElementById('father_occupation')?.value;
                const motherOccupation = document.getElementById('mother_occupation')?.value;
                const brother = document.getElementById('brother')?.value;
                const brotherMarried = document.getElementById('brother_married')?.value;
                const sister = document.getElementById('sister')?.value;
                const sisterMarried = document.getElementById('sister_married')?.value;
                const familyType = document.getElementById('family_type')?.value;
                const familyValue = document.getElementById('family_value')?.value;
                const familyStatus = document.getElementById('family_status')?.value;
                const fatherGotra = document.getElementById('father_gotra')?.value;
                const motherGotra = document.getElementById('mother_gotra')?.value;
               
                const familyCountry = document.getElementById('family_living')?.value;
                const familyState = document.getElementById('family_state')?.value;
                const familyCity = document.getElementById('family_city')?.value;
                const familyAddress = document.getElementById('contact_address')?.value;


                $.ajax({
                    url: "<?php echo e(route('update.user.family.details')); ?>",
                    method: "PATCH",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        father_occupation: fatherOccupation,
                        mother_occupation: motherOccupation,
                        brother: brother,
                        brother_married: brotherMarried,
                        sister: sister,
                        sister_married: sisterMarried,
                        family_type: familyType,
                        family_value: familyValue,
                        family_status: familyStatus,
                        father_gotra: fatherGotra,
                        mother_gotra: motherGotra,
                        family_state: familyState,
                        family_city: familyCity,
                        family_living: familyCountry,
                        contact_address: familyAddress,
                    },
                    success: function(response) {
                        $('#updateUserFamilyBtn').prop('disabled', false);
                        if (response.success) {
                            document.getElementById("updateUserFamilySection").style
                                .display = 'none';
                            document.getElementById("editUserFamilySection").style.display =
                                'block';

                            $('#userFatherOccupation').text(response.user
                            .father_occupation);
                            $('#userMotherOccupation').text(response.user
                            .mother_occupation);
                            $('#userBrother').text(response.user.brother);
                            $('#userBrotherMarried').text(response.user.brother_married);
                            $('#userSister').text(response.user.sister);
                            $('#userSisterMarried').text(response.user.sister_married);
                            $('#userFamilyType').text(response.user.family_type);
                            $('#userFamilyStatus').text(response.user.family_status);
                            $('#userFamilyValue').text(response.user.family_value);
                            $('#userFatherGotra').text(response.user.father_gotra);
                            $('#userMotherGotra').text(response.user.mother_gotra);
                            $('#userFamilyLocation').text(response.user.family_city +
                             ' '  +  '(' + response.user.family_state + ')');
                            $('#userFamilyAddress').text(response.user.contact_address);

                            $('#userFamilyDetailsAlert').get(0).scrollIntoView({
                                behavior: 'smooth',
                                block: 'center',
                                inline: 'nearest' // Ensures the alert is visible at the center of the viewport
                            });
                            $('#userFamilyDetailsAlert').html(`
    <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
        ${response.message}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
    </div>
`);
                            setTimeout(function() {
                                $('.alert').fadeOut('slow', function() {
                                    $(this).remove();
                                });
                            }, 10000);

                        } else {
                            alert('Failed to update details. Please try again.');
                        }
                    },

                });
            });
        } else {
            console.error("Update User Family button not found!");
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/update-user-family-details-component.blade.php ENDPATH**/ ?>