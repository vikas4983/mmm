@php
    $selectedstates = [];
@endphp
@foreach ($countries as $country)
    <optgroup label={{ $country->country }}>
        @foreach ($states as $state)
            @if ($state->country_id === $country->id)
                <option value="{{ $state->id }}" {{ in_array($state->id, $selectedstates) ? 'selected' : '' }}>
                    {{ $state->state }}
            @endif
        @endforeach
    </optgroup>
@endforeach
