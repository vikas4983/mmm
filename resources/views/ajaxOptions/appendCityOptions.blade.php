@php
    $selectedCities = [];
@endphp
<option value="0" selected>Doesn't Matter</option>
@foreach ($states as $state)
    <optgroup label={{ $state->state }}>
        @foreach ($cities as $city)
            @if ($city->state_id === $state->id)
                <option value="{{ $city->id }}" >
                    {{ $city->city }} 
            @endif
        @endforeach
    </optgroup>
@endforeach
