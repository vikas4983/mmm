
<?php $__env->startSection('title', 'Basic Details'); ?>
<?php $__env->startSection('content'); ?>
    <div id="Horoscope-Details">

    </div>
    <div id="Basic-Details">
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

                <form id="multiStepForm" method="POST">
                    <?php echo csrf_field(); ?>

                    <!-- Step 1: Basic Info -->
                    <div id="basicDetails">
                        <h3 class="gt-text-green mb-10 fontMerriWeather">
                            <i class="fa fa-user mr-10"></i><span id="heading">Bsaic Details</span>
                        </h3>
                        <article>
                            <p>You have many matching profiles based on your details. Completing this page will take you
                                closer to
                                your
                                perfect match.</p>
                        </article>
                        
                        <div id="alertBasic"></div>
                        <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
                        <br><br>
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

                    <!-- Step 2: Horoscope Info (Initially hidden) -->
                    <div id="horoscopeDetails" style="display:none">
                        <h3 class="gt-text-green mb-10 fontMerriWeather">
                            <i class="fa fa-user mr-10"></i><span id="heading">Horoscope Details</span>
                        </h3>
                        <article>
                            <p>You have many matching profiles based on your details. Completing this page will take you
                                closer to
                                your
                                perfect match.</p>
                        </article>
                        
                        <div id="alertHoroscope"></div>
                        <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
                        <br><br>
                        <?php
                            $fields = config('formFields.horoscopeDetails');

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
                                <button type="submit" class="btn gt-btn-green inIndexRegBtn mt-10" id="horoscopeDetailsBtn"
                                    name="horoscopeDetailsBtn">Submit</button>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Career Info (Initially hidden) -->
                    <div id="carrierDetails" style="display:none">
                        <h3 class="gt-text-green mb-10 fontMerriWeather">
                            <i class="fa fa-user mr-10"></i><span id="heading">Carrier Details</span>
                        </h3>
                        <article>
                            <p>You have many matching profiles based on your details. Completing this page will take you
                                closer to
                                your
                                perfect match.</p>
                        </article>
                        
                        <div id="alertCarrier"></div>
                        <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
                        <br><br>
                        
                        <div class="row form-group">
                            <div class="col-xxl-16 text-center">
                                <button type="submit" class="btn gt-btn-green inIndexRegBtn mt-10" id="carrierDetailsBtn"
                                    name="carrierDetailsBtn">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            document.getElementById('basicDetailsBtn').addEventListener('click', function(e) {
                e.preventDefault();
                let formData = new FormData(document.getElementById('multiStepForm'));
                fetch('<?php echo e(route('basicDetails.store')); ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.status === 'success') {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            
                            document.getElementById("alertHoroscope").innerHTML = `
                <div class="alert alert-success">
                    ${data.message}
                </div>
            `;
                            document.getElementById('basicDetailsBtn').disabled = true;
                            document.getElementById('basicDetails').style.display = 'none';
                            document.getElementById('horoscopeDetails').style.display = 'block';
                            // document.getElementById('step2').style.display = 'block';
                        } else {
                            document.getElementById("messagen").innerHTML = `
                <div class="alert alert-error">
                    ${data.message}
                </div>
            `;

                        }
                    });
            });

            document.getElementById('horoscopeDetailsBtn').addEventListener('click', function(e) {
                e.preventDefault();
                let formData = new FormData(document.getElementById('multiStepForm'));
                fetch('<?php echo e(route('horoscopes.store')); ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            document.getElementById("alertCarrier").innerHTML = `
                <div class="alert alert-success">
                    ${data.message}
                </div>
            `;
                            document.getElementById('horoscopeDetailsBtn').disabled = true;
                            document.getElementById('horoscopeDetails').style.display = 'none';
                            document.getElementById('carrierDetails').style.display = 'block';
                        } else {}
                    });
            });
        </script>

        

        <script>
            const religion = document.getElementById("religion");
            const caste = document.getElementById("hiddenCaste");
            caste.style.display = 'none';
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
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            const country = document.getElementById("country");
            const state = document.getElementById("hiddenState");
            state.style.display = 'none';
            country.addEventListener("change", function(e) {
                let countryId = country.value;
                if (countryId) {
                    state.style.display = 'block';
                    $.ajax({
                        url: '/get-state/' + countryId,
                        type: 'GET',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $("#state").empty();
                            $("#state").append('<option value="">Select state</option>');
                            $.each(data, function(key, value) {
                                $('#state').append('<option value="' + value.id + '">' + value
                                    .state + '</option>');
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

                    $('#state').fadeOut();
                    $('#state').empty();
                    $('#state').append('<option value="">Select state</option>');
                }
            });
        </script>
        <script>
            const state1 = document.getElementById("state");
            const city = document.getElementById("hiddenCity");
            city.style.display = 'none';
            state1.addEventListener("change", function(e) {
                let stateId = state1.value;
                if (stateId) {
                    city.style.display = 'block';
                    $.ajax({
                        url: '/get-city/' + stateId,
                        type: 'GET',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $("#city").empty();
                            $("#city").append('<option value="">Select City</option>');
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' + value.id + '">' + value
                                    .city + '</option>');
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
                    $('#city').fadeOut();
                    $('#city').empty();
                    $('#city').append('<option value="">Select City</option>');
                }
            });
        </script>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\signup.blade.php ENDPATH**/ ?>