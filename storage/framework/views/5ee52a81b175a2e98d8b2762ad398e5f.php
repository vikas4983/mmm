<div class="col-xxl-14 col-xxl-offset-1">
    <h3 class="inSearchTitle">Quick Search</h3>
    <?php echo $__env->make('alerts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
        Search profiles and provide you suitable profiles quickly.
    </p>
    <div id="errorMessage" style="color: red; font-size: 14px; margin-top: 5px;">
    </div>
    <?php
        $minAge = $quickFilter['min_age'] ?? [];
        $maxAge = $quickFilter['max_age'] ?? [];
        $selectedReligions = $quickFilter['religion'] ?? [];
    ?>
    <form action="<?php echo e(route('quick.search')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">Age</label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <div class="row">
                        <div class="col-xs-6">

                            <select class="gt-form-control" name="min_age" id="min_age" style="width: 89px">
                                <?php for($age = 18; $age <= 60; $age++): ?>
                                    <option value="<?php echo e($age); ?>"
                                        <?php echo e(old('min_age', $minAge ?? 18) == $age ? 'selected' : ''); ?>>
                                        <?php echo e($age); ?> Year
                                    </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-xs-4 text-center mt-10">To</div>
                        <div class="col-xs-4">
                            <select class="gt-form-control" name="max_age" id="max_age" style="width: 89px">
                                <?php for($age = 18; $age <= 60; $age++): ?>
                                    <option value="<?php echo e($age); ?>"
                                        <?php echo e(old('max_age', $maxAge ?? 60) == $age ? 'selected' : ''); ?>>
                                        <?php echo e($age); ?> Year
                                    </option>
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
                        Religion </label>
                </div>

                <div class="col-xxl-8 col-xl-8">
                    <select id="religion" name="religion[]" class="religion custom-select2" multiple
                        style="width:377px">
                        <option value="0"
                            <?php if(in_array(0, $selectedReligions)): ?> selected style="
                            background-color: #E27103;
                            color: white;" <?php endif; ?>>
                            Doesn't Matter</option>
                        <?php $__currentLoopData = $options['religions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($religion->id); ?>"
                                <?php if(in_array($religion->id, $selectedReligions)): ?> selected style="
                                background-color: #E27103;
                                color: white;" <?php endif; ?>>
                                <?php echo e($religion->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div id="CasteDivloader"></div>
                </div>
            </div>
        </div>
        <div class="form-group" id="caste-div">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Caste </label>
                </div>
                <div class="col-xxl-8 col-xl-8">
                    <select class="caste custom-select2 " id="caste" name="caste[]" multiple="multiple"
                        style="width:377px">

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <input type="submit" value="Search Now" name="quick_sub" class="btn gt-btn-green">
            <a class="btn gt-btn-green gt-cursor" href="saved-searches">Saved
                Search</a>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('.religion').select2({
            placeholder: "Select religion",
            allowClear: true
        });
    });
    $(document).ready(function() {
        $('.caste').select2({
            placeholder: "Select Caste",
            allowClear: true,

        });
    });

    function loadCatseList(url, selectedValues, action) {
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'ids': selectedValues,
                'action': action
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(response) {
                if (response.action === 'hideQuickCaste') {
                    $('#caste-div').hide();
                }
                if (response.action === 'casteList') {
                    $('#caste').html(response.data);
                }


            },
            error: function(xhr, status, error) {
                console.error('Error Status:', status);
                console.error('Error Details:', xhr.responseText);

            }
        });
    }
    document.addEventListener("DOMContentLoaded", function() {
        const selectedValues = Array.from(religion.selectedOptions).map(option => option.value);
        if (selectedValues.length > 0) {
            if (selectedValues.length === 1 && selectedValues[0] === '0') {
                $('#caste-div').css('display', 'none');
            }
            loadCatseList('get-caste', selectedValues, 'quickCasteCriteria');
        } else {
            console.log("No religion value selected or available.");
        }
        $('#religion').on('change', function() {
            const selectedValues = $(this).val();
            if (selectedValues) {
                $('#caste-div').css('display', 'block');
                loadCatseList('get-caste', selectedValues, 'quickCasteCriteria');
            } else {
                $('#caste').fadeOut();
                $('#caste').empty();
                $('#caste').append('<option value="">Select Caste</option>');
            }
        })

    });
</script>

<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\quick-search-component.blade.php ENDPATH**/ ?>