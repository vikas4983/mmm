<div class="gt-panel gt-panel-default" id="updateLifestyleSection" style="display: none;">
    <div class="gt-panel-head">
        <span class="pull-left">
            <?php
                $fields = config('formFields.editLifestyleDetails');

            ?>
            <i class="fa fa-book"></i>Lifestyle Information </span>
        <a class="pull-right btn gt-btn-orange" id="updateLifestyleBtn">
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

        document.getElementById("editLifestyleBtn").addEventListener("click", function() {

            document.getElementById("editLifestyleSection").style.display = 'none';
            document.getElementById("updateLifestyleSection").style.display = 'block';
        });
        let updateUserFamilyBtn = document.getElementById("updateLifestyleBtn");
        let form = document.getElementById("updateLifestyleBtn");
        if (updateUserFamilyBtn) {
            updateUserFamilyBtn.addEventListener("click", function() {
                const bodyType = document.getElementById('body_type')?.value;
                const complextion = document.getElementById('complextion')?.value;
                const dietaryHabit = document.getElementById('dietary_habit')?.value;
                const drinkingHabit = document.getElementById('drinking_habit')?.value;
                const smokingHabit = document.getElementById('smoking_habit')?.value;
                const physicalStatus = document.getElementById('physical_status')?.value;
                const weight = document.getElementById('weight')?.value;
                const bloodGroup = document.getElementById('blood_group')?.value;
                const openToPet = document.getElementById('open_to_pet')?.value;
                const ownHouse = document.getElementById('own_house')?.value;
                const ownCar = document.getElementById('own_car')?.value;
                const languageSpeak = document.getElementById('language_speak')?.value;
                const hiv = document.getElementById('hiv')?.value;
                const thalassemia = document.getElementById('thalassemia')?.value;



                $.ajax({
                    url: "<?php echo e(route('update.lifestyle.details')); ?>",
                    method: "PATCH",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        body_type: bodyType,
                        complextion: complextion,
                        dietary_habit: dietaryHabit,
                        drinking_habit: drinkingHabit,
                        smoking_habit: smokingHabit,
                        physical_status: physicalStatus,
                        weight: weight,
                        blood_group: bloodGroup,
                        open_to_pet: openToPet,
                        own_house: ownHouse,
                        own_car: ownCar,
                        language_speak: languageSpeak,
                        hiv: hiv,
                        thalassemia: thalassemia,

                    },
                    success: function(response) {
                        $('#updateLifestyleBtn').prop('disabled', false);
                        if (response.success) {
                            document.getElementById("updateLifestyleSection").style
                                .display = 'none';
                            document.getElementById("editLifestyleSection").style.display =
                                'block';

                            $('#userBodyType').text(response.user.body_type);
                            $('#userComplextion').text(response.user.complextion);
                            $('#userDietaryHabit').text(response.user.dietary_habit);
                            $('#userDrinkingHabit').text(response.user.drinking_habit);
                            $('#userSmokingHabit').text(response.user.smoking_habit);
                            $('#userPhysicalStatus').text(response.user.physical_status);
                            $('#userWeights').text(response.user.weight);
                            $('#userBloodGroup').text(response.user.blood_group);
                            $('#userOpenToPet').text(response.user.open_to_pet);
                            $('#userOwnHouse').text(response.user.own_house);
                            $('#userOwnCar').text(response.user.own_car);
                            $('#userLanguageSpeak').text(response.user.language_speak);
                            $('#userHiv').text(response.user.hiv);
                            $('#userThalassemia').text(response.user.thalassemia);


                            $('#userLifestyleDetailsAlert').get(0).scrollIntoView({
                                behavior: 'smooth',
                                block: 'center',
                                inline: 'nearest' // Ensures the alert is visible at the center of the viewport
                            });
                            $('#userLifestyleDetailsAlert').html(`
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
            console.error("Update User Lifestyle button not found!");
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/update-lifestyle-details-component.blade.php ENDPATH**/ ?>