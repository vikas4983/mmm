@php
    $optionKeys = [
        'profileFors',
        'heights',
        'motherTongues',
        'religions',
        'states',
        'cities',
        'maritalStatuses',
        'rashies',
        'countries',
        'educations',
        'employees',
        'occupations',
        'incomes',
        'fatherOccupations',
        'motherOccupations',
        'bodyTypes',
        'complexions',
        'bloodGroups',
        'habits',
        'physicalStatuses',
        'hobbies',
        'interests',
        'musics',
        'dresses',
        'movies',
        'sports',
    ];

    $optionData = [];
    foreach ($optionKeys as $key) {
        $optionData[$key] = Cache::get($key);
    }
    extract($optionData);
@endphp

@switch($name)
    @case('country')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="country" name="{{ $name }}" class="form-control">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}"
                            {{ old($name, $user->carrierDetails->countries->id) == $country->id ? 'selected' : '' }}>
                            {{ $country->country }}
                        </option>
                    @endforeach
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
        <div class="col-md-6" id="hState">
            <div class="form-group">
                <label for="state">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>State of Birth
                </label>
                <select id="state" name="state" class="form-control">
                    <option value="{{ $user->carrierDetails->states->id }}"
                        {{ old($name, $user->carrierDetails->states->id) == $user->carrierDetails->states->id ? 'selected' : '' }}>
                        {{ $user->carrierDetails->states->state }}
                    </option>

                </select>
                @error('state')
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>

        <div class="col-md-6" id="hCity">
            <div class="form-group">
                <label for="city">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>City of Birth
                </label>
                <select id="city" name="city" class="form-control">
                    <option value="">Select City</option>
                    <option value="{{ $user->horoscopeDetails->cities->id }}"
                        {{ old($name, $user->horoscopeDetails->cities->id) == $user->horoscopeDetails->cities->id ? 'selected' : '' }}>
                        {{ $user->horoscopeDetails->cities->city }}
                    </option>
                </select>
                @error('city')
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('rashi')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="">Select {{ $label }}</option>
                    @foreach ($rashies as $rashi)
                        <option value="{{ $rashi->id }}"
                            {{ old($name, $user->horoscopeDetails->rashi ?? null) == $rashi->id ? 'selected' : '' }}>
                            {{ $rashi->name }}
                        </option>
                    @endforeach
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('manglik')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="yes" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'yes' ? 'selected' : '' }}>
                        Yes</option>
                    <option value="no" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'no' ? 'selected' : '' }}>
                        No</option>
                    <option value="don't know"
                        {{ old($name, $user->horoscopeDetails->{$name} ?? '') == "don't know" ? 'selected' : '' }}>Don't Know
                    </option>
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('horoscope_match')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="yes" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'yes' ? 'selected' : '' }}>
                        Yes</option>
                    <option value="no" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'no' ? 'selected' : '' }}>
                        No</option>
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('horoscope_show')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
               
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="1" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'yes' ? 'selected' : '' }}>
                        Yes</option>
                    <option value="0" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'no' ? 'selected' : '' }}>
                        No</option>
                    <option value="2"
                        {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'only accept member' ? 'selected' : '' }}>Only
                        Accept Member</option>
                </select>

                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @default
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">{{ $label }}</label>
                <input type="text" id="{{ $name }}" name="{{ $name }}" class="form-control"
                    value="{{ old($name, $user->horoscopeDetails->{$name} ?? '') }}" required>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

@endswitch
<script>
    const birthCountry = document.getElementById("country");
    const birthState = document.getElementById("state");
    const birthCity = document.getElementById("city");

    birthCountry.addEventListener("change", function() {
        const birthCountryId = birthCountry.value;
        if (birthCountryId) {
            $.ajax({
                url: '/get-state/' + birthCountryId,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    birthState.innerHTML = '<option value="">Select State</option>';
                    data.forEach(state => {
                        birthState.innerHTML +=
                            `<option value="${state.id}">${state.state}</option>`;
                    });
                    birthCity.innerHTML =
                        '<option value="">Select City</option>'; // Reset city dropdown
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching states:', error);
                    alert('Failed to fetch states. Please try again later.');
                }
            });
        } else {
            birthState.innerHTML = '<option value="">Select State</option>';
            birthCity.innerHTML = '<option value="">Select City</option>';
        }
    });

    birthState.addEventListener("change", function() {
        const birthStateId = birthState.value;

        if (birthStateId) {
            $.ajax({
                url: '/get-city/' + birthStateId,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    birthCity.innerHTML = '<option value="">Select City</option>';
                    data.forEach(city => {
                        birthCity.innerHTML +=
                            `<option value="${city.id}">${city.city}</option>`;
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching cities:', error);
                    alert('Failed to fetch cities. Please try again later.');
                }
            });
        } else {
            birthCity.innerHTML = '<option value="">Select City</option>';
        }
    });
</script>
