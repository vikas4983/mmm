<div class="gt-panel gt-panel-default" id="updateCarrierSection" style="display: none;">
    <div class="gt-panel-head">
        <span class="pull-left">
            <?php
                $fields = config('formFields.editCarrierDetails');

            ?>
            <i class="fa fa-book"></i>Carrier Information </span>
        <a class="pull-right btn gt-btn-orange" id="updateCarrierBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">Update</font>
        </a>
    </div>
    <form id="carrierDetailsForm" method="POST">
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

        document.getElementById("editCarrierBtn").addEventListener("click", function() {
            console.log('vikas');
            document.getElementById("editCarrierSection").style.display = 'none';
            document.getElementById("updateCarrierSection").style.display = 'block';
        });
        let updateHoroscopeBtn = document.getElementById("updateCarrierBtn");
        let form = document.getElementById("updateCarrierBtn");
        if (updateCarrierBtn) {
            updateCarrierBtn.addEventListener("click", function() {

                const education = document.getElementById('education')?.value;
                const employee = document.getElementById('employee')?.value;
                const occupation = document.getElementById('occupation')?.value;
                const income = document.getElementById('income')?.value;
                const organizationName = document.getElementById('organization_name')?.value;
                const schoolName = document.getElementById('school_name')?.value;
                const collegeName = document.getElementById('college_name')?.value;
                const sittledAbroad = document.getElementById('interested_abroad')?.value;

                $.ajax({
                    url: "<?php echo e(route('update.carrier.details')); ?>",
                    method: "PATCH",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        education: education,
                        employee: employee,
                        occupation: occupation,
                        income: income,
                        organization_name: organizationName,
                        school_name: schoolName,
                        college_name: collegeName,
                        interested_abroad: sittledAbroad,
                    },
                    success: function(response) {
                        $('#updateCarrierBtn').prop('disabled', false);
                        if (response.success) {
                            document.getElementById("updateCarrierSection").style
                                .display = 'none';
                            document.getElementById("editCarrierSection").style.display =
                                'block';

                            $('#userEducation').text(response.user.education);
                            $('#userEmployee').text(response.user.employee);
                            $('#userOccupation').text(response.user.occupation);
                            $('#userIncome').text(response.user.income);
                            $('#userOrganizationName').text(response.user.organization_name);
                            $('#userSchoolName').text(response.user.school_name);
                            $('#userCollegeName').text(response.user.college_name);
                            $('#userInterestedAbroad').text(response.user
                                .interested_abroad);
                            $('#carrierDetailsAlert').get(0).scrollIntoView({
                                behavior: 'smooth',
                                block: 'center',
                                inline: 'nearest' // Ensures the alert is visible at the center of the viewport
                            });
                            $('#carrierDetailsAlert').html(`
    <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
        ${response.message}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
    </div>
`);
                            setTimeout(function() {
                                $('.alert').fadeOut('slow', function() {
                                    $(this).remove();
                                });
                            }, 1500);

                        } else {
                            alert('Failed to update details. Please try again.');
                        }
                    },

                });
            });
        } else {
            console.error("Update Carrier button not found!");
        }
    });
</script>
<script>
    const employee = document.getElementById("employee");
    const occupation = document.getElementById("occupation");
    employee.addEventListener("change", function() {
        const employeeId = employee.value;
       
        if (employeeId) {
        
            $.ajax({
                url: '/get-occupation/' + employeeId,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#occupation").empty();
                    $("#occupation").append();
                    $.each(data, function(key, value) {
                        $('#occupation').append('<option value="' + value.id + '">' + value
                            .occupation + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error Status:', status);
                    console.error('Error Details:', xhr.responseText);
                    alert(
                        'An error occurred while fetching the caste data. Please try again later.'
                    );
                }
            });
        } else {

            $('#occupation').fadeOut();
            $('#occupation').empty();
            $('#occupation').append('<option value="">Select occupation</option>');
        }
    });
</script>

<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\update-carrier-details-component.blade.php ENDPATH**/ ?>