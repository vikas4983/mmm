<div class="gt-panel gt-panel-default" id="updateContactSection" style="display: none;">
    <div class="gt-panel-head">
        <span class="pull-left">
            <?php
                $fields = config('formFields.editContactDetails');

            ?>
            <i class="fa fa-book"></i>Contact Information </span>
        <a class="pull-right btn gt-btn-orange" id="updateContactBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">Update</font>
        </a>
    </div>
    <form id="userContactDetailsForm" method="POST">
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

        document.getElementById("editContactBtn").addEventListener("click", function() {

            document.getElementById("editContactSection").style.display = 'none';
            document.getElementById("updateContactSection").style.display = 'block';
        });
        let updateUserFamilyBtn = document.getElementById("updateContactBtn");
        let form = document.getElementById("updateContactBtn");
        if (updateUserFamilyBtn) {
            updateUserFamilyBtn.addEventListener("click", function() {
                const alternateMobile = document.getElementById('alternate_mobile')?.value;
                const alternateOwned = document.getElementById('alternate_owned_by')?.value;
                const landlineNumber = document.getElementById('landline_number')?.value;
                const landlineOwned = document.getElementById('landline_owned_by')?.value;
                const address = document.getElementById('address')?.value;
                $.ajax({
                    url: "<?php echo e(route('update.contact.details')); ?>",
                    method: "PATCH",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        alternate_mobile: alternateMobile,
                        alternate_owned_by: alternateOwned,
                        landline_number: landlineNumber,
                        landline_owned_by: landlineOwned,
                        address: address,
                        
                    },
                    success: function(response) {
                        $('#updateContactBtn').prop('disabled', false);
                        if (response.success) {
                            document.getElementById("updateContactSection").style
                                .display = 'none';
                            document.getElementById("editContactSection").style.display =
                                'block';

                            $('#userAlternateMobile').text(response.user.alternate_mobile);
                            $('#userAlternateOwned').text(response.user.alternate_owned_by);
                            $('#userLandlineNumber').text(response.user.landline_number);
                            $('#userLandlineOwned').text(response.user.landline_owned_by);
                            $('#userAddress').text(response.user.address);
                         
                         


                            $('#userContactDetailsAlert').get(0).scrollIntoView({
                                behavior: 'smooth',
                                block: 'center',
                                inline: 'nearest' // Ensures the alert is visible at the center of the viewport
                            });
                            $('#userContactDetailsAlert').html(`
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
            console.error("Update User Contact button not found!");
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\update-contact-details-component.blade.php ENDPATH**/ ?>