<style>
    .accordion-item {
        margin-bottom: 1rem;
        border: none;
    }

    .accordion-header {
        width: 500px;
        margin-left: 250px;

        display: flex;
        justify-content: space-between;
        /* gap: 15px; */
        align-items: center;
    }

    .accordion-button {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 15px;
        border: none;
        /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
        border-radius: 8px;
        background-color: #f8f9fa;
        width: auto;
        /* transition: background-color 0.3s ease, box-shadow 0.3s ease; */
    }

    .accordion-button:not(.collapsed) {
        background-color: #E47203;
        color: rgb(255, 255, 255);
        /* box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);/ */
    }

    .accordion-button:hover {
        /* box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        transform: scale(1.01); */
    }

    .accordion-button:focus {
        outline: none !important;
        /* box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); */
    }

    .accordion-item hr {
        border: 0;
        border-top: 2px solid rgba(0, 0, 0, 0.1);
        margin-left: -83px;
        width: 846px;
    }

    hr {
        margin-top: 0px;
        margin-bottom: 0px;
    }



    .toggle-icon {
        margin-left: 8px;
    }

    .carridionH {
        margin-left: 300px;
    }
</style>

<div class="col-xxl-14 col-xxl-offset-1">
    <h3 class="inSearchTitle">Advanced Search</h3>
    <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
        Advance search contain criteria that helps you to find a suitable profile.
    </p>

    <form action="<?php echo e(route('advance.search')); ?>" method="post">
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
                            <select class="gt-form-control" name="min_age" id="advance_min_age">
                                <?php for($age = 18; $age <= 60; $age++): ?>
                                    <option value="<?php echo e($age); ?>" <?php echo e(old('min_age') == $age ? 'selected' : ''); ?>>
                                        <?php echo e($age); ?> Years</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-xs-4 text-center mt-10">To</div>
                        <div class="col-xs-6">
                            <select class="gt-form-control" name="max_age" id="advance_max_age">
                                <?php for($age = 18; $age <= 60; $age++): ?>
                                    <option value="<?php echo e($age); ?>" <?php echo e(old('max_age') == $age ? 'selected' : ''); ?>>
                                        <?php echo e($age); ?> Years</option>
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
                            <select class="gt-form-control flat" name="min_height" id="advance_min_height">
                                <?php $__currentLoopData = $options['heights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $height): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($height->id); ?>"
                                        <?php echo e(old('height') == $height->id ? 'selected' : ''); ?>><?php echo e($height->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-xs-4 text-center mt-10">
                            To </div>
                        <div class="col-xs-6">
                            <select class="gt-form-control flat" name="max_height" id="advance_max_height">
                                <?php $__currentLoopData = $options['heights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $height): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($height->id); ?>"
                                        <?php echo e(old('height') == $height->id ? 'selected' : ''); ?>><?php echo e($height->name); ?>

                                    </option>
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
                        Religion </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="advance_religion" name="religion[]" style="width: 432px" multiple>
                        <?php $__currentLoopData = $options['religions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($religion->id); ?>"
                                <?php echo e(old('religion') == $religion->id ? 'selected' : ''); ?>><?php echo e($religion->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div id="CasteDivloaderadv"></div>
                </div>
            </div>
        </div>
        <div class="form-group" id="advance_caste_div" style="display: none">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Caste </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select multiple id="advance_caste" name="caste[]" style="width: 432px">

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Mother Tongue </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="advance_mother_tongue" name="mother_tongue[]" style="width: 432px" multiple>
                        <option value="0" selected>Doesn't Matter</option>
                        <?php $__currentLoopData = $options['motherTongues']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motherTongue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($motherTongue->id); ?>"
                                <?php echo e(old('mother_tongue') == $motherTongue->id ? 'selected' : ''); ?>>
                                <?php echo e($motherTongue->name); ?>

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
                        Country </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select class="select2-results__group" id="advance_country" name="country[]" multiple="multiple"
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
        <div class="form-group" id="advance_state_div" style="display: none">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        State </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select class=" select2-results__group" id="advance_state" name="state[]" multiple="multiple"
                        style="width: 432px">

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group" id="advance_city_div" style="display: none">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        City </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select class=" select2-results__group" id="advance_city" name="city[]" multiple
                        style="width: 432px">

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Income </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select class="select2-results__group" id="advance_income" name="income[]" multiple
                        style="width: 432px">
                        <option value="0" selected>Doesn't Matter</option>
                        <?php $__currentLoopData = $options['incomes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($income->id); ?>">
                                <?php echo e($income->income); ?>

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
                        Marital status </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="advance_marital_status" class="ams" name="marital_status[]" multiple
                        style="width: 432px">
                        <option value="0" id="option_marital_status" selected>Doesn't Matter
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
        <div class="form-group" id="children_div">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Children </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="advance_children" name="children[]" style="width: 432px" multiple>
                        <option value="0" id="optionMaritalStatus" selected>Doesn't Matter
                        </option>
                        <option value="1">No</option>
                        <option value="2">Yes, Living together</option>
                        <option value="3">Yes, Not Living together</option>
                    </select>
                </div>
                <script>
                    $(document).ready(function() {


                    });
                </script>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Profiles Show </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="advance_photo" name="photo" style="width: 432px" class="form-control">
                        <option value="0" selected>Doesn't Matter</option>
                        <option value="1">With Photo</option>

                    </select>
                </div>
            </div>
        </div>


        <div class="container mt-5">
            
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <hr>
                    <h5 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Astro <span class="toggle-icon">+</span>
                        </button>
                    </h5>
                    <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne">

                        <div class="accordion-body options">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6">
                                        <label class="mt-10">
                                            Manglik Status </label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10">
                                        <select id="advance_manglik" name="manglik" class="form-control"
                                            style="width: 429px; margin-left: -177px;">
                                            <option value="0" selected>Doesn't Matter</option>
                                            <option value="1">Manglik</option>
                                            <option value="2">Non-Manglik</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6">
                                        <label class="mt-10">
                                            Horoscope Available?
                                        </label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10">
                                        <select id="advance_manglik" name="horoscope" class="form-control"
                                            style="width: 429px;margin-left: -177px;">
                                            <option value="0" selected>Doesn't Matter</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="accordion-item">

                    <h5 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Family <span class="toggle-icon">+</span>
                        </button>
                    </h5>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                        <div class="accordion-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6">
                                        <label class="mt-10">
                                            Family Status </label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10" style="margin-left: -176px;">
                                        <select id="advance_family_status" name="family_status[]"
                                            class="form-control" multiple style="width: 429px; margin-left: -177px;">
                                            <option value="0" selected>Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['familyStatus']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($status->id); ?>">
                                                    <?php echo e($status->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="accordion-item">

                    <h5 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Education & Career<span class="toggle-icon">+</span>
                        </button>
                    </h5>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                        <div class="accordion-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6">
                                        <label class="mt-10">
                                            Education</label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10" style="margin-left: -176px;">
                                        <select id="advance_education" name="education[]" class="form-control"
                                            multiple style="width: 429px; margin-left: -177px;">
                                            <option value="0" selected>Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($education->id); ?>">
                                                    <?php echo e($education->education); ?>

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
                                            Occupation </label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10" style="margin-left: -176px;">
                                        <select id="advance_occupation" name="occupation[]" class="form-control"
                                            multiple style="width: 429px; margin-left: -177px;">
                                            <option value="0" selected>Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['occupations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($occupation->id); ?>">
                                                    <?php echo e($occupation->occupation); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="accordion-item">

                    <h5 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Lifestyle<span class="toggle-icon">+</span>
                        </button>
                    </h5>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                        <div class="accordion-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6">
                                        <label class="mt-10">Physical Status</label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10" style="margin-left: -176px;">
                                        <select id="advance_physical_status" name="physical_status[]"
                                            class="form-control" multiple style="width: 429px; margin-left: -177px;">
                                            <option value="0" selected>Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['physicalStatuses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $physicalStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($physicalStatus->id); ?>">
                                                    <?php echo e($physicalStatus->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6">
                                        <label class="mt-10">HIV+?</label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10" style="margin-left: -176px;">
                                        <select id="advance_hiv" name="hiv[]" class="form-control" multiple
                                            style="width: 429px; margin-left: -177px;">
                                            <option value="0" selected>Doesn't Matter</option>
                                            <option value="1">HIV+</option>
                                            <option value="2">HIV-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6">
                                        <label class="mt-10">Diet</label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10" style="margin-left: -176px;">
                                        <select id="advance_diet" name="diet[]" class="form-control" multiple
                                            style="width: 429px; margin-left: -177px;">
                                            <option value="0" selected>Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['dietaryHabits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($diet->id); ?>">
                                                    <?php echo e($diet->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6">
                                        <label class="mt-10">Drink</label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10" style="margin-left: -176px;">
                                        <select id="advance_drink" name="drink[]" class="form-control" multiple
                                            style="width: 429px; margin-left: -177px;">
                                            <option value="0" selected>Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['habits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($habit->id); ?>">
                                                    <?php echo e($habit->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6">
                                        <label class="mt-10">Smoke</label>
                                    </div>
                                    <div class="col-xxl-10 col-xl-10" style="margin-left: -176px;">
                                        <select id="advance_smoke" name="smoke[]" class="form-control" multiple
                                            style="width: 429px; margin-left: -177px;">
                                            <option value="0" selected>Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['habits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($habit->id); ?>">
                                                    <?php echo e($habit->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            document.querySelectorAll('.accordion-button').forEach(button => {
                button.addEventListener('click', function() {
                    const toggleIcon = this.querySelector('.toggle-icon');

                    // Toggle between "+" and "-"
                    if (this.classList.contains('collapsed')) {
                        toggleIcon.textContent = '+'; // Collapsed state
                    } else {
                        toggleIcon.textContent = '-'; // Expanded state
                    }
                });
            });
        </script>

        <div class="form-group text-center">
            <input type="submit" value="Search Now" name="advance_sub" class="btn gt-btn-green">
            <a class="btn gt-btn-green gt-cursor" href="saved-searches">Saved
                Search</a>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $(document).ready(function() {
            const $maritalStatus = $("#advance_marital_status");
            const selectedMaritalStatus = $maritalStatus.val() || [];
            const $children = $("#advance_children");
            const selectChildren = $children.val() || [];
            // Default Marital Status
            if (selectedMaritalStatus.includes('0') || selectedMaritalStatus.length === 0) {
                $maritalStatus.val('0').trigger("change.select2");
            }
            // Default Children
            if (selectChildren.includes('0') || selectChildren.length === 0) {
                $(this).val('0').trigger("change.select2");
                console.log(selectChildren);
            }
            // Marital Status Select 
            $maritalStatus.on("change", function() {
                let selectOptions = $(this).val() || [];
                let checkZero = $(this).val() || [];
                if (selectOptions.length === 0) {
                    $(this).val(['0']).trigger("change.select2");
                }
                if (selectOptions.length > 1 && selectOptions.includes('0')) {
                    if (selectOptions) {
                        selectOptions = selectOptions.filter(id => id !== '0');
                        $(this).val(selectOptions).trigger("change.select2");
                        if (checkZero.length > 2 && checkZero.includes('0')) {
                            $(this).val('0').trigger("change.select2");
                        }
                    }
                }
                if (selectOptions.length > 1 && selectOptions.includes('0')) {
                    selectOptions = selectOptions.filter(id => id == '0');
                    $(this).val(selectOptions).trigger("change.select2");
                }
                // Show Children Div
                if (selectOptions.includes("1") && selectOptions.length === 1) {
                    $(this).val(["1"]).trigger("change.select2");
                    let $advanceChildren = $("#advance_children");
                    let selectedValuesChildren = $advanceChildren.val() || [];
                    if (selectedValuesChildren.includes('0')) {
                        $advanceChildren.val('0').trigger(
                            "change.select2");

                    } else {
                        $advanceChildren.val('0').trigger(
                            "change.select2");
                    }
                    $("#children_div").hide();
                } else {

                    $("#children_div").show();
                }
            });
            // Children Select 
            $children.on("change", function() {
                let optionChildren = $(this).val() || [];
                let checkChildrenZero = $(this).val() || [];
                if (optionChildren.length === 0) {
                    $(this).val('0').trigger("change.select2");
                }
                if (optionChildren.length > 1) {
                    if (optionChildren) {
                        optionChildren = optionChildren.filter(id => id !== '0');
                        $(this).val(optionChildren).trigger("change.select2");
                        if (checkChildrenZero.length > 2 && checkChildrenZero.includes('0')) {
                            $(this).val(['0']).trigger("change.select2");
                        }
                    }
                }
                if (optionChildren.length > 1 && optionChildren.includes('0')) {
                    optionChildren = optionChildren.filter(id => id == '0');
                    $(this).val(['0']).trigger("change.select2");
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // const oldAdvanceReligionValue = Array.from(advance_religion.selectedOptions).map(option => option.value);
        // if (oldAdvanceReligionValue.length > 0) {
        //     $('#advance_caste_div').css('display', 'block');
        //     $.ajax({
        //         url: 'get-caste',
        //         type: 'POST',
        //         data: {
        //             'religions': oldAdvanceReligionValue
        //         },
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },

        //         success: function(castes) {
        //             $('#advance_caste').html(castes);

        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Error Status:', status);
        //             console.error('Error Details:', xhr.responseText);

        //         }
        //     });
        // } else {
        //     console.log("No religion value selected or available.");
        // }


        $('#advance_religion').on('change', function() {
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
                        $('#advance_caste_div').css('display', 'block');
                        $('#advance_caste').html(castes);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error Status:', status);
                        console.error('Error Details:', xhr.responseText);
                    }
                });
            } else {
                $('#advance_caste_div').css('display', 'none');
                $('#advance_caste').fadeOut();
                $('#advance_caste').empty();
                $('#advance_caste').append('<option value="">Select Caste</option>');
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $("#advance_country").on('change', function() {
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
                        $('#advance_state_div').css('display', 'block');
                        $('#advance_state').html(states);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error Status:', status);
                        console.error('Error Details:', xhr.responseText);
                    }
                });
            } else {
                $('#advance_state_div').css('display', 'none');
                $('#advance_state').fadeOut();
                $('#advance_state').empty();
                $('#advance_state').append('<option value="">Select Caste</option>');
            }
        });




    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $("#advance_state").on('change', function() {
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
                        $('#advance_city_div').css('display', 'block');
                        $('#advance_city').html(cities);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error Status:', status);
                        console.error('Error Details:', xhr.responseText);
                    }
                });
            } else {
                $('#advance_city_div').css('display', 'none');
                $('#advance_city').fadeOut();
                $('#advance_city').empty();
                $('#advance_city').append('<option value="">Select Caste</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#advance_religion').select2({
            placeholder: "Select religion",
            allowClear: true
        });
        $('#advance_caste').select2({
            placeholder: "Select Caste",
            allowClear: true,

        });
        $('#advance_mother_tongue').select2({
            placeholder: "Select Mother Tongue",
            allowClear: true,

        });
        $('#advance_country').select2({
            placeholder: "Select Country",
            allowClear: true,

        });
        $('#advance_state').select2({
            placeholder: "Select State",
            allowClear: true,

        });
        $('#advance_city').select2({
            placeholder: "Select City",
            allowClear: true,

        });
        $('#advance_income').select2({
            placeholder: "Select Income",
            allowClear: true,

        });
        $('#advance_marital_status').select2({
            placeholder: "Select Marital Status",
            allowClear: true,

        });
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
        $('#maritalStatus').select2({
            placeholder: "Select Marital Status",
            allowClear: true,
        });
        $('#advance_family_status').select2({
            placeholder: "Select Family Status",
            allowClear: true,
            closeOnSelect: false
        });
        $('#advance_family_type').select2({
            placeholder: "Select Family Type",
            allowClear: true,
        });
        $('#advance_education').select2({
            placeholder: "Select Education",
            allowClear: true,
        });
        // $('#advance_employee').select2({
        //     placeholder: "Select Sector",
        //     allowClear: true,
        // });
        $('#advance_occupation').select2({
            placeholder: "Select Occupation",
            allowClear: true,
        });
        $('#advance_physical_status').select2({
            placeholder: "Select Status",
            allowClear: true,
        });
        $('#advance_hiv').select2({
            placeholder: "Select HIV Status",
            allowClear: true,
        });
        $('#advance_diet').select2({
            placeholder: "Select Diet Status",
            allowClear: true,
        });
        $('#advance_drink').select2({
            placeholder: "Select Drink Status",
            allowClear: true,
        });
        $('#advance_smoke').select2({
            placeholder: "Select Smoke Status",
            allowClear: true,
        });
        $('#advance_children').select2({
            placeholder: "Select Children",
            allowClear: true,
        });

    });


    $(document).ready(function() {
        let previousSelectedOptionValue = []; // To track previously selected values


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
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/searches/advance-search-component.blade.php ENDPATH**/ ?>