
<?php $__env->startSection('title', 'Basic Details'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row mt-10 inRegTopTitle">
            <div class="col-xxl-11">
                <div class="row">
                    <div class="col-xxl-2">
                        <img src="<?php echo e(asset('frontend/assets/img/register-img.png')); ?>" class="img-responsive">
                    </div>
                    <div class="col-xxl-14">
                        <h3 class="gt-text-green">Completing this page will take you closer to your perfect match.</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="gtRegister col-xxl-11">
            <div class="row mb-20">
                <img src="<?php echo e(asset('frontend/assets/img/reg-step-1.png')); ?>" class="img-responsive">
            </div>
            <h3 class="gt-text-green mb-10 fontMerriWeather">
                <i class="fa fa-user mr-10"></i>Basic Information
            </h3>
            <article>
                <p>You have many matching profiles based on your details. Completing this page will take you closer to
                    your
                    perfect match.</p>
            </article>
            <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
            <br><br>
            <form action="<?php echo e(route('basicDetails.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php
                    $fields = config('formFields.basicDetails');

                ?>
                <?php if (isset($component)) { $__componentOriginal7a42694a19dc8f5a836f15aa90b268f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8 = $attributes; } ?>
<?php $component = App\View\Components\FormFieldsComponent::resolve(['fields' => $fields] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-fields-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\FormFieldsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8)): ?>
<?php $attributes = $__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8; ?>
<?php unset($__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a42694a19dc8f5a836f15aa90b268f8)): ?>
<?php $component = $__componentOriginal7a42694a19dc8f5a836f15aa90b268f8; ?>
<?php unset($__componentOriginal7a42694a19dc8f5a836f15aa90b268f8); ?>
<?php endif; ?>
                <div class="row form-group">
                    <div class="col-xxl-16 text-center">
                        <button type="submit" class="btn gt-btn-green inIndexRegBtn mt-10" id="basicDetailsBtn"
                            name="basicDetailsBtn">Submit</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
    <script>
        const religion = document.getElementById("religion");
        const maritalStatus = document.getElementById("marital_status");
        const caste = document.getElementById("hiddenCaste");
        const children = document.getElementById("hiddenChildren");
        caste.style.display = 'none';
        children.style.display = 'none';
        religion.addEventListener("change", function(e) {
            let religionId = religion.value;

            if (religionId) {
                caste.style.display = 'block';
                $.ajax({
                    url: '/get-caste/' + religionId,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $("#caste").empty();
                        $("#caste").append('<option value="">Select Caste</option>');
                        $.each(data, function(key, value) {
                            $('#caste').append('<option value="' + value.id + '">' + value
                                .name + '</option>');
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

                $('#caste').fadeOut();
                $('#caste').empty();
                $('#caste').append('<option value="">Select Caste</option>');
            }
        });
        maritalStatus.addEventListener("change", function(e) {
            let maritalStatusId = maritalStatus.value;
            const selectOptions = maritalStatus.options[maritalStatus.selectedIndex].text.trim();
            if (selectOptions === 'Awaiting Divorce' ||
                selectOptions === 'Divorced' ||
                selectOptions === 'Widowed' ||
                selectOptions === 'Annulled') {
                children.style.display = 'block';
            } else {
                children.style.display = 'none';

            }
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views/frontend/registration/basicDetails/create.blade.php ENDPATH**/ ?>