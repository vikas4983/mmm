<div class="col-xxl-14 col-xxl-offset-1">
    <h3 class="inSearchTitle">Quick Search</h3>
    <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
        Search profiles and provide you suitable profiles quickly.
    </p>
    <div id="errorMessage" style="color: red; font-size: 14px; margin-top: 5px;">
    </div>
    @php
        $minAge = session()->get('quickSearch.min_age');
        $maxAge = session()->get('quickSearch.max_age');
        $selectedReligions = session()->get('quickSearch.religion', []);
        $selectedCastes = session()->get('quickSearch.caste', []);
        $castes = \App\Models\Caste::all();
    @endphp
    <form id="quickSearchForm" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-xxl-6 col-xl-6">
                    <label class="mt-10">Age</label>
                </div>
                <div class="col-xxl-10 col-xl-10">
                    <div class="row">
                        <div class="col-xs-6">

                            <select class="gt-form-control" name="min_age" id="min_age" style="width: 89px">
                                @for ($age = 18; $age <= 60; $age++)
                                    <option value="{{ $age }}"
                                        {{ old('min_age', $minAge ?? null) == $age ? 'selected' : '' }}>
                                        {{ $age }} Year
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-xs-4 text-center mt-10">To</div>
                        <div class="col-xs-4">
                            <select class="gt-form-control" name="max_age" id="max_age" style="width: 89px">
                                @for ($age = 18; $age <= 60; $age++)
                                    <option value="{{ $age }}"
                                        {{ old('max_age', $maxAge ?? null) == $age ? 'selected' : '' }}>
                                        {{ $age }} Year
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
                        Religion </label>
                </div>
                <div class="col-xxl-8 col-xl-8">
                    <select id="religion" name="religion[]" class="form-control" multiple multiselect-search="true"
                        multiselect-select-all="true" style="width:377px">
                        @foreach ($options['religions'] as $religion)
                        <option value="{{ $religion->id }}"
                            @if(in_array($religion->id, $selectedReligions)) 
                                selected style="
                                background-color: #E27103;
                                color: white;" 
                            @endif>
                            {{ $religion->name }}
                        </option>
                                {{ $religion->name }}
                            </option>
                        @endforeach
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
                    <select class="js-example-basic-multiple" id="caste" name="caste[]" multiple="multiple"
                        style="width:377px">
                        @foreach ($castes as $caste)
                        <option value="{{ $caste->id }}"
                            {{ in_array($caste->id, $selectedCastes) ? 'selected' : '' }}>
                            {{ $caste->name }}
                        </option>
                        @endforeach
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
    const religion = document.getElementById("religion");
    religion.addEventListener("click", function(e) {
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
                    document.getElementById("caste-div").style.display = "block";
                    $("#caste").append('<option value="">Select Caste </option>');
                    
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
                    url: "{{ route('quick.search') }}",
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