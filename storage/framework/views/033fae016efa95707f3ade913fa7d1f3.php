<div class="col-xxl-14 col-xxl-offset-1">
    <h3 class="inSearchTitle">Quick Search</h3>
    <?php echo $__env->make('alerts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
        Search profiles and provide you suitable profiles quickly.
    </p>
    <div id="errorMessage" style="color: red; font-size: 14px; margin-top: 5px;">
    </div>
    <?php
        $minAge = session()->get('quickSearch.min_age');
        $maxAge = session()->get('quickSearch.max_age');
        $selectedReligions = session()->get('quickSearch.religion', []);
        $selectedCastes = session()->get('quickSearch.caste', []);
        $castes = \App\Models\Caste::all();
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
                                        <?php echo e(old('min_age', $minAge ?? null) == $age ? 'selected' : ''); ?>>
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
                                        <?php echo e(old('max_age', $maxAge ?? null) == $age ? 'selected' : ''); ?>>
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
                    <select id="religion" name="religion[]" class="religion" multiple style="width:377px">
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

        <div class="form-group" id="caste-div" style="display: none">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Caste </label>
                </div>
                <div class="col-xxl-8 col-xl-8">
                    <select class=" caste" id="caste" name="caste[]" multiple="multiple" style="width:377px">
                        <option id="selectedReligion"></option>
                        
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

    document.addEventListener("DOMContentLoaded", function() {
        const oldReligionValue = Array.from(religion.selectedOptions).map(option => option.value);
        
        if (oldReligionValue.length > 0) {
            $('#caste-div').css('display', 'block');
            $.ajax({
                url: 'get-caste',
                type: 'POST',
                data: {
                    'religions': oldReligionValue
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(castes, religions) {
                    $('#selectedReligion').append(religions);
                    $('#caste').html(castes);

                },
                error: function(xhr, status, error) {
                    console.error('Error Status:', status);
                    console.error('Error Details:', xhr.responseText);

                }
            });
        }else{
            console.log("No religion value selected or available.");
        }
        $('#religion').on('change', function() {

            const religionId = $(this).val();
            if (religionId) {
                $('#caste-div').css('display', 'block');
                $.ajax({
                    url: 'get-caste',
                    type: 'POST',
                    data: {
                        'religions': religionId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(castes, religions) {
                        $('#selectedReligion').append(religions);
                        $('#caste').html(castes);

                    },
                    error: function(xhr, status, error) {
                        console.error('Error Status:', status);
                        console.error('Error Details:', xhr.responseText);

                    }
                });
            } else {
                console.log('ok1')
                $('#caste').fadeOut();
                $('#caste').empty();
                $('#caste').append('<option value="">Select Caste</option>');
            }
        })

    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const quickSearchForm = document.getElementById("quickSearchForm");
        const quickSearchBtn = document.getElementById("quickSearchBtn");
        const errorMessage = document.getElementById("errorMessage");
        const alerts = document.getElementById("alerts");
        const fromAge = document.getElementById("min_age");
        const toAge = document.getElementById("max_age");
        const religionSelect = document.getElementById("religion");
        const casteSelect = document.getElementById("caste");
        const csrfToken = document.querySelector('input[name="_token"]').value;

        if (quickSearchForm) {
            quickSearchForm.addEventListener("submit", function(e) {
                e.preventDefault();
                const fromAgeValue = fromAge.value;
                const toAgeValue = toAge.value;
                const religionValues = Array.from(religionSelect.selectedOptions).map(
                    (option) => option.value
                );
                const casteValues = Array.from(casteSelect.selectedOptions).map(
                    (option) => option.value
                );
                errorMessage.textContent = "";
                if (
                    !fromAgeValue ||
                    !toAgeValue
                ) {
                    errorMessage.textContent = "All fields are required.";
                    return;
                }
                $.ajax({
                    url: "<?php echo e(route('quick.search')); ?>",
                    method: "POST",
                    data: {

                        _token: csrfToken,
                        min_age: fromAgeValue,
                        max_age: toAgeValue,
                        religion: religionValues,
                        caste: casteValues,
                    },
                    success: function(response) {

                        const searchResult = document.getElementById("searchResult");
                        searchResult.innerHTML = response;

                    },
                    error: function(xhr) {
                        errorMessage.innerText = xhr.responseJSON.message;
                        setTimeout(function() {
                            alerts.innerHTML = "";
                        }, 3000);
                    },
                });
            });
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/quick-search-component.blade.php ENDPATH**/ ?>