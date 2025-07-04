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

    <form action="<?php echo e(route('advance.search')); ?>" method="get">
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
                                    <option value="<?php echo e($age); ?>"
                                        <?php echo e(in_array($age, $selectedAdvanceFilters['min_age']) ? 'selected' : ''); ?>>
                                        <?php echo e($age); ?> Years
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-xs-4 text-center mt-10">To</div>
                        <div class="col-xs-6">
                            <select class="gt-form-control" name="max_age" id="advance_max_age">
                                <?php for($age = 18; $age <= 60; $age++): ?>
                                    <option value="<?php echo e($age); ?>"
                                        <?php echo e(in_array($age, $selectedAdvanceFilters['max_age']) ? 'selected' : ''); ?>>
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
                                        <?php echo e(in_array($height->id, $selectedAdvanceFilters['min_height']) ? 'selected' : ''); ?>>
                                        <?php echo e($height->name); ?>

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
                                        <?php echo e(in_array($height->id, $selectedAdvanceFilters['max_height']) ? 'selected' : ''); ?>>
                                        <?php echo e($height->name); ?>

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
                    <select id="advance_religion" class="custom-select2" name="religion[]" style="width: 432px"
                        multiple>
                        <option value="0"
                            <?php echo e(in_array(0, old('religion', $selectedAdvanceFilters['religion'])) ? 'selected' : ''); ?>>
                            Does't Matter </option>
                        <?php $__currentLoopData = $options['religions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($religion->id); ?>"
                                <?php echo e(in_array($religion->id, old('religion', $selectedAdvanceFilters['religion'])) ? 'selected' : ''); ?>>
                                <?php echo e($religion->name); ?>

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
                    <select multiple id="advance_caste" class="custom-select2 advance_caste" name="caste[]"
                        multiple="multiple" style="width: 432px">

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
                    <select id="advance_mother_tongue" class="custom-select2" name="mother_tongue[]"
                        style="width: 432px" multiple>
                        <option value="0"
                            <?php echo e(in_array(0, $selectedAdvanceFilters['mother_tongue']) ? 'selected' : ''); ?>>Doesn't
                            Matter</option>
                        <?php $__currentLoopData = $options['motherTongues']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motherTongue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($motherTongue->id); ?>"
                                <?php echo e(in_array($motherTongue->id, $selectedAdvanceFilters['mother_tongue']) ? 'selected' : ''); ?>>
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
                    <select class="custom-select2" id="advance_country" name="country[]" multiple="multiple"
                        style="width: 432px">
                        <option value="0" <?php echo e(in_array(0, $selectedAdvanceFilters['country']) ? 'selected' : ''); ?>>
                            Doesn't Matter</option>
                        <?php $__currentLoopData = $options['countries']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->id); ?>"
                                <?php echo e(in_array($country->id, $selectedAdvanceFilters['country']) ? 'selected' : ''); ?>>
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
                    <select class="custom-select2" id="advance_state" name="state[]" multiple="multiple"
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
                    <select class="custom-select2" id="advance_city" name="city[]" multiple style="width: 432px">

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
                    <select class="custom-select2" id="advance_income" name="income[]" multiple
                        style="width: 432px">
                        <option value="0" <?php echo e(in_array(0, $selectedAdvanceFilters['income']) ? 'selected' : ''); ?>>
                            Doesn't Matter</option>
                        <?php $__currentLoopData = $options['incomes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($income->id); ?>"
                                <?php echo e(in_array($income->id, $selectedAdvanceFilters['income']) ? 'selected' : ''); ?>>
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
                    <select id="advance_marital_status" class="form-control custom-select2" name="marital_status[]"
                        multiple style="width: 432px">
                        <option value="0"
                            <?php echo e(in_array(0, $selectedAdvanceFilters['marital_status']) ? 'selected' : ''); ?>>Doesn't
                            Matter
                        </option>
                        <?php $__currentLoopData = $options['maritalStatuses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maritalStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($maritalStatus->id); ?>"
                                <?php echo e(in_array($maritalStatus->id, $selectedAdvanceFilters['marital_status']) ? 'selected' : ''); ?>>
                                <?php echo e($maritalStatus->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group children" id="children_div">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Children </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="advance_children" class="form-control custom-select2 " name="children[]"
                        style="width: 432px" multiple>
                        <option value="0" id="advance_children" selected>Doesn't Matter
                        </option>
                        <option value="00">No</option>
                        <option value="1">Yes, Living together</option>
                        <option value="2">Yes, Not Living together</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Profiles Show </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="advance_photo" name="profile_show[]" style="width: 432px" class="form-control">
                        <option value="0" <?php echo e(in_array(0, $selectedAdvanceFilters['profile_show']) ? 'selected' : ''); ?>>
                            Doesn't Matter</option>
                        <option value="1" <?php echo e(in_array(1, $selectedAdvanceFilters['profile_show']) ? 'selected' : ''); ?>>
                            With Photo</option>

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
                                        <select id="advance_manglik" name="manglik[]"
                                            class="custom-select2 form-control"
                                            style="width: 429px; margin-left: -177px;">
                                            <option value="0"
                                                <?php echo e(in_array(0, $selectedAdvanceFilters['manglik']) ? 'selected' : ''); ?>>
                                                Doesn't Matter</option>
                                            <option value="1"
                                                <?php echo e(in_array(1, $selectedAdvanceFilters['manglik']) ? 'selected' : ''); ?>>
                                                Manglik</option>
                                            <option value="2"
                                                <?php echo e(in_array(2, $selectedAdvanceFilters['manglik']) ? 'selected' : ''); ?>>
                                                Non-Manglik</option>

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
                                        <select id="advance_manglik" name="horoscope[]"
                                            class="form-control custom-select2"
                                            style="width: 429px;margin-left: -177px;">
                                            <option value="0"
                                                <?php echo e(in_array(0, $selectedAdvanceFilters['horoscope']) ? 'selected' : ''); ?>>
                                                Doesn't Matter</option>
                                            <option value="1"
                                                <?php echo e(in_array(1, $selectedAdvanceFilters['horoscope']) ? 'selected' : ''); ?>>
                                                Yes</option>
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
                                            class="form-control custom-select2" multiple
                                            style="width: 429px; margin-left: -177px;">
                                            <option value="0"
                                                <?php echo e(in_array(0, $selectedAdvanceFilters['family_status']) ? 'selected' : ''); ?>>
                                                Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['familyStatus']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($status->id); ?>"
                                                    <?php echo e(in_array($status->id, $selectedAdvanceFilters['family_status']) ? 'selected' : ''); ?>>
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
                                        <select id="advance_education" name="education[]"
                                            class="form-control custom-select2" multiple
                                            style="width: 429px; margin-left: -177px;">
                                            <option value="0"
                                                <?php echo e(in_array(0, $selectedAdvanceFilters['education']) ? 'selected' : ''); ?>>
                                                Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($education->id); ?>"
                                                    <?php echo e(in_array($education->id, $selectedAdvanceFilters['education']) ? 'selected' : ''); ?>>
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
                                        <select id="advance_occupation" name="occupation[]"
                                            class="form-control custom-select2" multiple
                                            style="width: 429px; margin-left: -177px;">
                                            <option value="0"
                                                <?php echo e(in_array(0, $selectedAdvanceFilters['occupation']) ? 'selected' : ''); ?>>
                                                Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['occupations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($occupation->id); ?>"
                                                    <?php echo e(in_array($occupation->id, $selectedAdvanceFilters['occupation']) ? 'selected' : ''); ?>>
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
                                            class="form-control custom-select2" multiple
                                            style="width: 429px; margin-left: -177px;">
                                            <option value="0"
                                                <?php echo e(in_array(0, $selectedAdvanceFilters['physical_status']) ? 'selected' : ''); ?>>
                                                Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['physicalStatuses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $physicalStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($physicalStatus->id); ?>"
                                                    <?php echo e(in_array($physicalStatus->id, $selectedAdvanceFilters['physical_status']) ? 'selected' : ''); ?>>
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
                                        <select id="advance_hiv" name="hiv[]" class="form-control custom-select2"
                                            multiple style="width: 429px; margin-left: -177px;">
                                            <option value="0"
                                                <?php echo e(in_array(0, $selectedAdvanceFilters['hiv']) ? 'selected' : ''); ?>>
                                                Doesn't Matter</option>
                                            <option value="1"
                                                <?php echo e(in_array(1, $selectedAdvanceFilters['hiv']) ? 'selected' : ''); ?>>
                                                HIV+</option>
                                            <option value="2"
                                                <?php echo e(in_array(2, $selectedAdvanceFilters['hiv']) ? 'selected' : ''); ?>>
                                                HIV-</option>
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
                                        <select id="advance_diet" name="diet[]" class="form-control custom-select2"
                                            multiple style="width: 429px; margin-left: -177px;">
                                            <option value="0"
                                                <?php echo e(in_array(0, $selectedAdvanceFilters['diet']) ? 'selected' : ''); ?>>
                                                Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['dietaryHabits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($diet->id); ?>"
                                                    <?php echo e(in_array($diet->id, $selectedAdvanceFilters['diet']) ? 'selected' : ''); ?>>
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
                                        <select id="advance_drink" name="drink[]" class="form-control custom-select2"
                                            multiple style="width: 429px; margin-left: -177px;">
                                            <option value="0"
                                                <?php echo e(in_array(0, $selectedAdvanceFilters['drink']) ? 'selected' : ''); ?>>
                                                Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['habits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($habit->id); ?>"
                                                    <?php echo e(in_array($habit->id, $selectedAdvanceFilters['drink']) ? 'selected' : ''); ?>>
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
                                        <select id="advance_smoke" name="smoke[]" class="form-control custom-select2"
                                            multiple style="width: 429px; margin-left: -177px;">
                                            <option value="0"
                                                <?php echo e(in_array(0, $selectedAdvanceFilters['smoke']) ? 'selected' : ''); ?>>
                                                Doesn't Matter</option>
                                            <?php $__currentLoopData = $options['habits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($habit->id); ?>"
                                                    <?php echo e(in_array($habit->id, $selectedAdvanceFilters['smoke']) ? 'selected' : ''); ?>>
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
            const advanceReligion = $('#advance_religion');
            const selectedReligionIds = advanceReligion.val();
            if (selectedReligionIds) {
                loadList('get-caste', selectedReligionIds, 'advanceCasteCriteria')
            }
        });
        $('#advance_religion').on('change', function() {
            const religionId = $(this).val();
            // if(religionId.length === 1 && religionId.includes('0')){
            //      $('#advance_caste_div').hide();
            // }else{
            //      $('#advance_caste_div').show();
            // }
            if (religionId) {
                // $.ajax({
                //     url: 'get-caste',
                //     method: 'POST',
                //     data: {
                //         'ids': religionId
                //     },
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     },
                //     success: function(castes) {
                //         $('#advance_caste_div').css('display', 'block');
                //         $('#advance_caste').html(castes);
                //     },
                //     error: function(xhr, status, error) {
                //         console.error('Error Status:', status);
                //         console.error('Error Details:', xhr.responseText);
                //     }
                // });
                loadList('get-caste', religionId, 'advanceCasteCriteria')
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
    function defaultCity() {
        const advanceCity = $('#advance_city');
        const selectedCityIds = advanceCity.val();
        if (selectedCityIds === null) {
            $('#advance_city').val('0');
        }
    }

    function defaultCaste() {
        const advanceCaste = $('#advance_caste');
        const selectedCasteIds = advanceCaste.val();
        if (selectedCasteIds === null) {
            $('#advance_caste').val('0');
        }
    }



    function loadList(route, selectedId, action) {
        $.ajax({
            url: route,
            method: 'POST',
            data: {
                'ids': selectedId,
                'action': action,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                if (response.action === 'advanceCasteList') {
                    $('#advance_caste').html(response.data);
                    $('#advance_caste_div').css('display', 'block');

                }


                if (response.action === 'stateList') {
                    $('#basicState').html(response.data);
                    $('#basicStateDiv').show();
                    const stateIds = $('#basicState').val();
                    if (stateIds) {
                        if (stateIds.length === 0 && stateIds.includes('0')) {
                            $('#basicCityDiv').hide();
                        } else {
                            $('#basicCityDiv').show();
                        }
                        let route = 'get-city'
                        let action = 'basicCityCriteria'

                        loadList(route, stateIds, action)
                    }

                }
                if (response.action === 'advanceStateList') {

                    $('#advance_state').html(response.advanceState);
                    $('#advance_state_div').show();
                    const stateIds = $('#advance_state').val();

                    if (stateIds) {
                        if (stateIds.length === 0 && stateIds.includes('0')) {
                            $('#advance_state_div').hide();
                        } else {
                            $('#advance_state_div').show();
                        }
                        loadList('get-city', stateIds, 'advanceCityCriteria')
                    }

                }
                if (response.action === 'advanceCityList') {
                    $('#advance_city').html(response.advanceCity);
                    $('#advance_city_div').show();
                }


                if (response.action === 'cityList') {
                    $('#basicCity').html(response.data);
                    $('#basicCityDiv').css('display', 'block');
                }

                if (response.action === 'hide') {
                    $('#basicStateDiv').hide();
                    $('#basicCityDiv').hide();
                }
                if (response.action === 'hideAdvanceCity') {
                    $('#advance_city_div').hide();

                }

            },
            complete: function(response) {
                defaultCity();
                defaultCaste();

            },
            error: function(xhr, status, error) {
                console.error('Error Status:', status);
                console.error('Error Details:', xhr.responseText);
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        $(document).ready(function() {
            const advanceCountry = $('#advance_country');
            const selectedCountryIds = advanceCountry.val();
            if (selectedCountryIds) {
                loadList('get-state', selectedCountryIds, 'advanceStateCriteria')
            }
        });

        $("#advance_country").on('change', function() {
            const countryId = $(this).val();
            if (countryId) {

                if (countryId.length === 1 && countryId.includes('0')) {
                    $('#advance_state_div').hide();
                    $('#advance_city_div').hide();
                } else {
                    $('#advance_state_div').show();
                    $('#advance_city_div').show();
                }
                loadList('get-state', countryId, 'advanceStateCriteria')

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
    $(document).ready(function() {
        const advanceState = $('#advance_state');
        const selectedStateIds = advanceState.val();
        if (selectedStateIds) {
            loadList('get-city', selectedStateIds, 'advanceCityCriteria')
        }
    });


    document.addEventListener("DOMContentLoaded", function() {
        $("#advance_state").on('change', function() {
            const StateId = $(this).val();
            if (StateId) {
                loadList('get-city', StateId, 'advanceCityCriteria')

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
        // $('#maritalStatus').select2({
        //     placeholder: "Select Marital Status",
        //     allowClear: true,
        // });
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
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\searches\advance-search-component.blade.php ENDPATH**/ ?>