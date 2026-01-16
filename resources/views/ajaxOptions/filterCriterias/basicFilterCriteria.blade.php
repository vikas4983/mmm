@php
    $selectedCastes = $basicFilter['caste'] ?? [];
    $selectedStates = $basicFilter['state'] ?? [];
    $selectedcities = $basicFilter['city'] ?? [];

@endphp
@if ($action === 'basicCasteCriteria')
    <option value="0" {{ in_array(0, $selectedCastes) ? 'selected' : '' }}>Doesn't Matter</option>
    @foreach ($religions as $religion)
        <optgroup label={{ $religion->name }} class="select2-results__group">
            @foreach ($castes as $caste)
                @if ($caste->religion_id === $religion->id)
                    <option value="{{ $caste->id }}" {{ in_array($caste->id, $selectedCastes) ? 'selected' : '' }}>
                        {{ $caste->name }} </option>
                @endif
            @endforeach
        </optgroup>
    @endforeach
@endif
@if ($action === 'basicStateCriteria')
    <option value="0" {{ in_array(0, $selectedStates) ? 'selected' : '' }}>Doesn't Matter</option>
    @foreach ($countries as $country)
        <optgroup label="{{ $country->country }}">
            @foreach ($states as $state)
                @if ($state->country_id === $country->id)
                    <option value="{{ $state->id }}" {{ in_array($state->id, $selectedStates) ? 'selected' : '' }}>
                        {{ $state->state }}
                    </option>
                @endif
            @endforeach
        </optgroup>
    @endforeach
@endif
@if ($action === 'basicCityCriteria')
    <option value="0" {{ in_array(0, $selectedcities) ? 'selected' : '' }} >Doesn't Matter</option>
    @foreach ($states as $state)
        <optgroup label="{{ $state->state }}">
            @foreach ($cities as $city)
                @if ($city->state_id === $state->id)
                    <option value="{{ $city->id }}" {{ in_array($city->id, $selectedcities) ? 'selected' : '' }}>
                        {{ $city->city }}
                    </option>
                @endif
            @endforeach
        </optgroup>
    @endforeach
@endif
