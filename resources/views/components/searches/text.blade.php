
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
$(".ams").on('change', function() {
const maritalStatusId = $(this).val();
if (maritalStatusId == '1' || maritalStatusId == '0') {
$('#children_div').css('display', 'none');
} else {
$('#children_div').css('display', 'block');
}
});
$("#advance_marital_status").on('change', function() {
let selectedIds = $(this).val();
selectedIds = Array.isArray(selectedIds) ? selectedIds : [];


if (selectedIds.includes('0') && selectedIds.length > 1) {
selectedIds = selectedIds.filter(id => id !== '0');
$(this).val(selectedIds);

}


if (selectedIds.includes('0') && selectedIds.length === 1) {
$(this).val(['0']);
}


$(this).trigger('change.select2');

console.log('Selected IDs:', selectedIds);
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
  
<div class="form-group text-center">
    <input type="submit" value="Search Now" name="advance_sub" class="btn gt-btn-green">
    <a class="btn gt-btn-green gt-cursor" href="saved-searches">Saved
        Search</a>
</div>
</form>
</div>
<form action="" id="baisc_search_form" method="post">
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
                                @for ($age = 18; $age <= 60; $age++)
                                    <option value="{{ $age }}" {{ old('min_age') == $age ? 'selected' : '' }}>
                                        {{ $age }} Years</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-xs-4 text-center mt-10">To</div>
                        <div class="col-xs-6">
                            <select class="gt-form-control" name="max_age" id="advance_max_age">
                                @for ($age = 18; $age <= 60; $age++)
                                    <option value="{{ $age }}" {{ old('max_age') == $age ? 'selected' : '' }}>
                                        {{ $age }} Years</option>
                                @endfor
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
                            <select class="gt-form-control flat" name="height" id="advance_min_height">
                                @foreach ($options['heights'] as $height)
                                    <option value="{{ $height->id }}"
                                        {{ old('height') == $height->id ? 'selected' : '' }}>{{ $height->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-4 text-center mt-10">
                            To </div>
                        <div class="col-xs-6">
                            <select class="gt-form-control flat" name="height" id="advance_max_height">
                                @foreach ($options['heights'] as $height)
                                    <option value="{{ $height->id }}"
                                        {{ old('height') == $height->id ? 'selected' : '' }}>{{ $height->name }}
                                    </option>
                                @endforeach
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
                        @foreach ($options['religions'] as $religion)
                            <option value="{{ $religion->id }}"
                                {{ old('religion') == $religion->id ? 'selected' : '' }}>{{ $religion->name }}
                            </option>
                        @endforeach
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
                        @foreach ($options['motherTongues'] as $motherTongue)
                            <option value="{{ $motherTongue->id }}"
                                {{ old('religion') == $motherTongue->id ? 'selected' : '' }}>{{ $motherTongue->name }}
                            </option>
                        @endforeach
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
                        @foreach ($options['countries'] as $country)
                            <option value="{{ $country->id }}">
                                {{ $country->country }}
                            </option>
                        @endforeach
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
                        @foreach ($options['incomes'] as $income)
                            <option value="{{ $income->id }}">
                                {{ $income->income }}
                            </option>
                        @endforeach
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
                        @foreach ($options['maritalStatuses'] as $maritalStatus)
                            <option value="{{ $maritalStatus->id }}">
                                {{ $maritalStatus->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group" id="children_div" style="display: none">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">
                        Children </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="children" name="children" style="width: 432px">
                        <option value="0" id="optionMaritalStatus" selected>Doesn't Matter
                        </option>
                        <option value="1" id="maritalStatus">Don't Accept
                        </option>

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
                    <select id="advance_photo" name="photo" style="width: 432px" class="form-control">
                        <option value="0" selected>Doesn't Matter</option>
                        <option value="1">With Photo</option>

                    </select>
                </div>
            </div>
        </div>


       
        
            <div class="container mt-5">
                {{-- <h4 class="carridionH">Add More</h4> --}}
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
                                            <select id="advance_manglik" name="manglik" class="form-control"
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
                                                class="form-control" multiple
                                                style="width: 429px; margin-left: -177px;">
                                                <option value="0" selected>Doesn't Matter</option>
                                                @foreach ($options['familyStatus'] as $status)
                                                    <option value="{{ $status->id }}">
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6">
                                            <label class="mt-10">
                                                Family Status </label>
                                        </div>
                                        <div class="col-xxl-10 col-xl-10" style="margin-left: -176px;">
                                            <select id="advance_family_type" name="family_type[]"
                                                class="form-control" multiple
                                                style="width: 429px; margin-left: -177px;">
                                                <option value="0" selected>Doesn't Matter</option>
                                                @foreach ($options['familyTypes'] as $type)
                                                    <option value="{{ $status->id }}">
                                                        {{ $type->name }}
                                                    </option>
                                                @endforeach

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
                                                @foreach ($options['educations'] as $education)
                                                    <option value="{{ $education->id }}">
                                                        {{ $education->education }}
                                                    </option>
                                                @endforeach

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
                                                @foreach ($options['occupations'] as $occupation)
                                                    <option value="{{ $occupation->id }}">
                                                        {{ $occupation->occupation }}
                                                    </option>
                                                @endforeach

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
                                                @foreach ($options['physicalStatuses'] as $physicalStatus)
                                                    <option value="{{ $physicalStatus->id }}">
                                                        {{ $physicalStatus->name }}
                                                    </option>
                                                @endforeach
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
                                            <select id="advance_hiv" name="hiv[]" class="form-control" multiple style="width: 429px; margin-left: -177px;">
                                                <option value="0" selected>Doesn't Matter</option>
                                                <option value="Yes">HIV+</option>
                                                <option value="No">HIV-</option>
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
                                            <select id="advance_diet" name="diet[]" class="form-control" multiple style="width: 429px; margin-left: -177px;">
                                                <option value="0" selected>Doesn't Matter</option>
                                                @foreach ($options['dietaryHabits'] as $diet)
                                                    <option value="{{ $diet->id }}">
                                                        {{ $diet->name }}
                                                    </option>
                                                @endforeach
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
                                            <select id="advance_drink" name="drink[]" class="form-control" multiple style="width: 429px; margin-left: -177px;">
                                                <option value="0" selected>Doesn't Matter</option>
                                                @foreach ($options['habits'] as $habit)
                                                    <option value="{{ $habit->id }}">
                                                        {{ $habit->name }}
                                                    </option>
                                                @endforeach
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
                                            <select id="advance_smoke" name="smoke[]" class="form-control" multiple style="width: 429px; margin-left: -177px;">
                                                <option value="0" selected>Doesn't Matter</option>
                                                @foreach ($options['habits'] as $habit)
                                                    <option value="{{ $habit->id }}">
                                                        {{ $habit->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            
           
