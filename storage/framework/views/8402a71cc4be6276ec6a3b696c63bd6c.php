<style>
    .select2-results__group {
       font-weight: bold;
       color: #ffff;
       background-color: #ff6600;
       padding: 5px;
       border-bottom: 1px solid #ddd;
       
    }
</style>

<div class="col-xxl-14 col-xxl-offset-1">
    <h3 class="inSearchTitle">Basic Search</h3>
    <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
        Searches to provide suitable profiles.
    </p>
    <form action="<?php echo e(route('basic.search')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Age </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <div class="row">
                        <div class="col-xs-6">

                            <select class="gt-form-control" name="min_age" id="from_age_basic">
                                <?php for($age = 18; $age <= 60; $age++): ?>
                                    <option value="<?php echo e($age); ?>"><?php echo e($age); ?> Year</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-xs-4 text-center mt-10">To</div>
                        <div class="col-xs-6">
                            <select class="gt-form-control" name="max_age" id="part_to_age_basic">
                                <?php for($age = 18; $age <= 60; $age++): ?>
                                    <option value="<?php echo e($age); ?>"><?php echo e($age); ?> Year</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Height </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <div class="row">
                        <div class="col-xs-6">
                            <select class="gt-form-control flat" name="min_height" id="min_height">
                                <?php $__currentLoopData = $options['heights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $height): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($height->id); ?>"><?php echo e($height->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-xs-4 text-center mt-10">
                            To </div>
                        <div class="col-xs-6">
                            <select class="gt-form-control flat" name="max_height" id="max_height">
                                <?php $__currentLoopData = $options['heights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $height): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($height->id); ?>"><?php echo e($height->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Marital status </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="maritalStatus" name="marital_status[]" class="maritalStatus" multiple
                        style="width: 432px">
                        <option value="0" id="maritalStatusD" selected style="display: none">Doesn't Matter
                        </option>
                        <?php $__currentLoopData = $options['maritalStatuses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maritalStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($maritalStatus->id); ?>">
                                <?php echo e($maritalStatus->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Religion </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="basicReligion" name="religion[]" class="basicReligion" multiple
                        style="width: 432px">
                      <?php $__currentLoopData = $options['religions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($religion->id); ?>">
                                <?php echo e($religion->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <div id="CasteDivloaderbasic"></div>
                </div>
            </div>
        </div>

        <div class="form-group" id="basicCasteDiv" style="display: none">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Caste </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select class=" basicCaste" id="basicCaste" name="caste[]" multiple="multiple"
                        style="width: 432px">
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Country living in </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select class="select2-results__group" id="basicCountry" name="country[]" multiple="multiple"
                        style="width: 432px">
                        <?php $__currentLoopData = $options['countries']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->id); ?>">
                                <?php echo e($country->country); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group" id="basicStateDiv" style="display: none">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        State </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select class=" select2-results__group" id="basicState" name="state[]" multiple="multiple"
                        style="width: 432px">

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group" id="basicCityDiv" style="display: none">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        City </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select class=" select2-results__group" id="basicCity" name="city[]" multiple="multiple"
                        style="width: 432px">

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Profiles </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="basicPhoto" name="photo" style="width: 432px">
                        <option value="0">Doesn't Matter</option>
                        <option value="1">With Photo</option>

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <input type="submit" value="Search Now" name="basic_sub" class="btn gt-btn-green">
            <a class="btn gt-btn-green gt-cursor" href="saved-searches">Saved
                Search</a>

        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#basicReligion').select2({
            placeholder: "Select religion",
            allowClear: true
        });

    });
    $(document).ready(function() {
        $('#basicCaste').select2({
            placeholder: "Select Caste",
            allowClear: true,
            style: "color:red",

        });
    });

    $(document).ready(function() {
        let previousSelectedOptionValue = []; // To track previously selected values

        $('#maritalStatus').select2({
            placeholder: "Select Marital Status",
            allowClear: true,
        });
        $("#maritalStatus").on("change", function(e) {
            const maritalStatus = document.getElementById("maritalStatus");
            const lastSelectedValue = e?.params?.data?.id;
            const doesNotMatter = '0';
            let selectedValues = $(this).val(); // Get selected values

            const addedValue = selectedValues.filter(val => !previousSelectedOptionValue.includes(val));
            if (addedValue.length > 0) {
                console.log("Latest selected value:", addedValue[0]);
            }
            // Find the newly unselected value
            const removedValue = previousSelectedOptionValue.filter(val => !selectedValues.includes(
                val));
            if (removedValue.length > 0) {
                console.log("Latest unselected value:", removedValue[0]);
            }

            previousSelectedOptionValue = selectedValues;


            if (maritalStatus) {
                const selectedOptions = maritalStatus.selectedOptions;

                // if (selectedValues.length > 1 && [selectedValues.length - 1] === 0) {
                //     selectedValues = ['0'];
                //     if ($(maritalStatus).val().toString() !== selectedValues.toString()) {
                //         $(maritalStatus).val(selectedValues).trigger('change');
                //     }
                // } else {
                //     // 
                // }

                if (selectedValues.length > 1 && selectedValues.includes(doesNotMatter)) {
                    selectedValues = selectedValues.filter(value => value !== '0');
                    if ($(maritalStatus).val().toString() !== selectedValues.toString()) {
                        $(maritalStatus).val(selectedValues).trigger('change');
                    }
                }


                // if (selectedValues.includes(doesNotMatter)) {
                //     selectedValues = [doesNotMatter];
                //     if ($(maritalStatus).val().toString() !== selectedValues.toString()) {
                //         $(maritalStatus).val(selectedValues).trigger('change');
                //     }
                // }
            }
        });
    });

    $(document).ready(function() {
        $('#basicCountry').select2({
            placeholder: "Select Country",
            allowClear: true,

        });
        $('#basicState').select2({
            placeholder: "Select State",
            allowClear: true,

        });
        $('#basicCity').select2({
            placeholder: "Select City",
            allowClear: true,

        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const oldBasicReligionValue = Array.from(basicReligion.selectedOptions).map(option => option.value);
        if (oldBasicReligionValue.length > 0) {
            $('#basicCasteDiv').css('display', 'block');
            $.ajax({
                url: 'get-caste',
                type: 'POST',
                data: {
                    'religions': oldBasicReligionValue
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(castes) {
                    $('#caste').html(castes);

                },
                error: function(xhr, status, error) {
                    console.error('Error Status:', status);
                    console.error('Error Details:', xhr.responseText);

                }
            });
        } else {
            console.log("No religion value selected or available.");
        }


        $('#basicReligion').on('change', function() {
          
            const religionId = $(this).val();
            if (religionId) {
              $.ajax({
                    url: 'get-caste',
                    method: 'POST',
                    data: {
                        'religions': religionId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(castes) {
                        $('#basicCasteDiv').css('display', 'block');
                        $('#basicCaste').html(castes);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error Status:', status);
                        console.error('Error Details:', xhr.responseText);
                    }
                });
            } else {
                $('#basicCasteDiv').css('display', 'none');
                $('#basicCaste').fadeOut();
                $('#basicCaste').empty();
                $('#basicCaste').append('<option value="">Select Caste</option>');
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $("#basicCountry").on('change', function() {
            const countryId = $(this).val();
            if (countryId) {

                $.ajax({
                    url: 'get-state',
                    method: 'POST',
                    data: {
                        'countries': countryId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(states) {
                        $('#basicStateDiv').css('display', 'block');
                        $('#basicState').html(states);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error Status:', status);
                        console.error('Error Details:', xhr.responseText);
                    }
                });
            } else {
                $('#basicStateDiv').css('display', 'none');
                $('#basicState').fadeOut();
                $('#basicState').empty();
                $('#basicState').append('<option value="">Select Caste</option>');
            }
        });

        $("#basicState").on('change', function() {
            const StateId = $(this).val();
            if (StateId) {

                $.ajax({
                    url: 'get-city',
                    method: 'POST',
                    data: {
                        'states': StateId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(cities, states) {
                        $('#basicCityDiv').css('display', 'block');
                        $('#basicCity').html(cities);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error Status:', status);
                        console.error('Error Details:', xhr.responseText);
                    }
                });
            } else {
                $('#basicCityDiv').css('display', 'none');
                $('#basicCity').fadeOut();
                $('#basicCity').empty();
                $('#basicCity').append('<option value="">Select Caste</option>');
            }
        });


    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\searches\basic-search-component.blade.php ENDPATH**/ ?>