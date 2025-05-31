<style>
    .select2-results__group {
        font-weight: bold;
        color: #ffff;
        background-color: #ff6600;
        padding: 5px;
        border-bottom: 1px solid #ddd;

    }
</style>
@php
    $minAge = $basicFilter['min_age'] ?? [];
    $maxAge = $basicFilter['max_age'] ?? [];
    $minHeight = $basicFilter['min_height'] ?? [];
    $maxHeight = $basicFilter['max_height'] ?? [];
    $basicMaritalStatus = $basicFilter['marital_status'] ?? ['0'];
    $basicReligion = $basicFilter['religion'] ?? ['0'];
    $basicCountry = $basicFilter['country'] ?? ['0'];
    $profileShow = $basicFilter['profile_show'] ?? ['0'];

@endphp
<div class="col-xxl-14 col-xxl-offset-1">
    <h3 class="inSearchTitle">Basic Search</h3>
    <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
        Searches to provide suitable profiles.
    </p>
    <form action="{{ route('basic.search') }}" method="post">
        <input hidden name="for" value="basicSearch" >
        @csrf
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
                                @for ($age = 18; $age <= 60; $age++)
                                    <option value="{{ $age }}"
                                        {{ old('min_age', $minAge) == $age ? 'selected' : '' }}>{{ $age }} Year
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-xs-4 text-center mt-10">To</div>
                        <div class="col-xs-6">
                            <select class="gt-form-control" name="max_age" id="part_to_age_basic">
                                @for ($age = 18; $age <= 60; $age++)
                                    <option value="{{ $age }}"
                                        {{ old('min_age', $maxAge) == $age ? 'selected' : '' }}>{{ $age }} Year
                                    </option>
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
                            <select class="gt-form-control flat" name="min_height" id="min_height">
                                @foreach ($options['heights'] as $height)
                                    <option value="{{ $height->id }}"
                                        {{ old('min_height', $minHeight) == $height->id ? 'selected' : '' }}>
                                        {{ $height->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-4 text-center mt-10">
                            To </div>
                        <div class="col-xs-6">
                            <select class="gt-form-control flat" name="max_height" id="max_height">
                                @foreach ($options['heights'] as $height)
                                    <option value="{{ $height->id }}"
                                        {{ old('max_height', $maxHeight) == $height->id ? 'selected' : '' }}>
                                        {{ $height->name }}</option>
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
                        Marital status </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    
                    <select id="basicMaritalStatus" name="marital_status[]" class="custom-select2 basicMaritalStatus"
                        multiple style="width: 432px">
                        
                        <option value="0" {{ in_array(0, $basicMaritalStatus) ? 'selected' : '' }}
                            id="basicMaritalStatus">Doesn't Matter
                        </option>
                        @foreach ($options['maritalStatuses'] as $maritalStatus)
                            <option value="{{ $maritalStatus->id }}"
                                {{ in_array($maritalStatus->id, old('marital_status', $basicMaritalStatus)) ? 'selected' : '' }}>
                                {{ $maritalStatus->name }}
                            </option>
                        @endforeach
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
                    <select id="basic_children" class="form-control custom-select2 " name="children[]"
                        style="width: 432px" multiple>
                        <option value="0" id="optionMaritalStatus" selected>Doesn't Matter
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
                        Religion </label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select id="basicReligion" name="religion[]" class="basicReligion custom-select2" multiple
                        style="width: 432px">
                        <option value="0" {{ in_array(0, $basicReligion) ? 'selected' : '' }}>Doesn't Matter
                        </option>
                        @foreach ($options['religions'] as $religion)
                            <option value="{{ $religion->id }}"
                                {{ in_array($religion->id, old('religion', $basicReligion)) ? 'selected' : '' }}>
                                {{ $religion->name }}
                            </option>
                        @endforeach
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
                    <select class="basicCaste custom-select2" id="basicCaste" name="caste[]" multiple="multiple"
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
                    <select class="basicCountry custom-select2 form-control" id="basicCountry" name="country[]"
                        multiple="multiple" style="width: 432px">
                        <option value="0" {{ in_array(0, $basicCountry) ? 'selected' : '' }}>Doesn't Matter
                        </option>
                        @foreach ($options['countries'] as $country)
                            <option value="{{ $country->id }}"
                                {{ in_array($country->id, old('country', $basicCountry)) ? 'selected' : '' }}>
                                {{ $country->country }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group" id="basicStateDiv" style="display: none">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">State</label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <select class="basicState123 custom-select2  form-control" id="basicState" name="state[]"
                        multiple="multiple" style="width: 432px">

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
                    <select class="custom-select2 form-control" id="basicCity" name="city[]" multiple="multiple"
                        style="width: 432px">

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
                    <select id="basicPhoto" class="form-control" name="profile_show[]" style="width: 432px">
                        <option value="0" {{ in_array(0, $profileShow) ? 'selected' : '' }}>Doesn't Matter
                        </option>
                        <option value="1" {{ in_array(1, $profileShow) ? 'selected' : '' }}>With Photo</option>

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
        $('#basicMaritalStatus').select2({
            placeholder: "Select Marital Status",
            allowClear: true,
        });
        $('#basic_children').select2({
            placeholder: "Select Children",
            allowClear: true,

        });
        $('#basicReligion').select2({
            placeholder: "Select religion",
            allowClear: true
        });

        $('#basicCaste').select2({
            placeholder: "Select Caste",
            allowClear: true,
            style: "color:red",

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
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $(document).ready(function() {
            const $select = $('.basicMaritalStatus');
            const selectedOptions = $select.val();
            if (selectedOptions && selectedOptions.length === 1 && selectedOptions.includes('0') ||
                selectedOptions.includes('1')) {
                $('#children_div').hide();
            } else {
                $('#children_div').show();
            }

            $select.on('change', function() {
                const selected = $(this).val();
                if (
                    selected &&
                    selected.length === 1 &&
                    (selected.includes('0') || selected.includes('1'))
                ) {
                    $('#children_div').hide();
                } else {
                    $('#children_div').show();
                }
            });

            function defaultCaste() {
                const casteCaste = $('#basicCaste');
                const selectedCasteIds = casteCaste.val();
                if (selectedCasteIds === null) {
                    $('#basicCaste').val('0');
                }
            }

            function casteList(route, religionId, action) {
                $.ajax({
                    url: route,
                    method: 'POST',
                    data: {
                        'ids': religionId,
                        'action': action
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        if (response.action === 'casteList') {
                            $('#basicCasteDiv').css('display', 'block');
                            $('#basicCaste').html(response.data);
                        }

                        if (response.action === 'hideCasteDiv') {
                            $('#basicCasteDiv').hide();

                        } else {
                            $('#basicCasteDiv').show();
                        }
                    },

                    complete: function(response) {
                        defaultCaste();
                    },

                    error: function(xhr, status, error) {
                        console.error('Error Status:', status);
                        console.error('Error Details:', xhr.responseText);
                    }
                });
            }



            const $basicReligion = $('.basicReligion');
            const selectedReligion = $basicReligion.val();
            let route = 'get-caste';
            let action = 'basicCasteCriteria';
            if (selectedReligion) {
                $('#basicCasteDiv').css('display', 'none');
                casteList(route, selectedReligion, action);
            }
            $('#basicReligion').on('change', function() {
                const religionId = $(this).val();

                if (religionId) {
                    casteList(route, religionId, action);
                } else {
                    $('#basicCasteDiv').css('display', 'none');
                    $('#basicCaste').fadeOut();
                    $('#basicCaste').empty();
                    $('#basicCaste').append('<option value="">Select Caste</option>');
                }
            });
        });
    });
</script>

<script>
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
                        console.log(stateIds);
                        loadList(route, stateIds, action)
                    }

                }
                if (response.action === 'cityList') {
                    $('#basicCity').html(response.data);
                    $('#basicCityDiv').css('display', 'block');
                }
                if (response.action === 'hide') {
                    $('#basicStateDiv').hide();
                    $('#basicCityDiv').hide();
                }

            },
            error: function(xhr, status, error) {
                console.error('Error Status:', status);
                console.error('Error Details:', xhr.responseText);
            }
        });
    }

    $(document).ready(function() {
        const basicCountry = $('.basicCountry');
        const countryId = basicCountry.val();
        if (countryId) {
            let action = 'basicStateCriteria'
            loadList('get-state', countryId, action)
        }

    });
    document.addEventListener("DOMContentLoaded", function() {
        $("#basicCountry").on('change', function() {
            const selectedId = $(this).val();
            if (selectedId) {
                let action = 'stateList'
                loadList('get-state', selectedId, action);
            } else {
                $('#basicStateDiv').css('display', 'none');
                $('#basicState').fadeOut();
                $('#basicState').empty();
                $('#basicState').append('<option value="">Select Caste</option>');
            }
        });
        $("#basicState").on('change', function() {
            const selectedId = $(this).val();
            if (selectedId) {
                let action = 'cityList'
                loadList('get-city', selectedId, action);

            } else {
                $('#basicCityDiv').css('display', 'none');
                $('#basicCity').fadeOut();
                $('#basicCity').empty();
                $('#basicCity').append('<option value="">Select Caste</option>');
            }
        });


    });
</script>
