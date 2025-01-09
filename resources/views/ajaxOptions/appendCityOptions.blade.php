@php
    $selectedCities = [];
@endphp
@foreach ($states as $state)
    <optgroup label={{ $state->state }}>
        @foreach ($cities as $city)
            @if ($city->state_id === $state->id)
                <option value="{{ $city->id }}" {{ in_array($city->id, $selectedCities) ? 'selected' : '' }}>
                    {{ $city->city }} 
            @endif
        @endforeach
    </optgroup>
@endforeach
