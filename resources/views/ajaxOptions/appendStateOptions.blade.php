@php
    //$selectedstates = [];
@endphp

<option value="0" selected >Doesn't Matter</option>
@foreach ($countries as $country)
    <optgroup label={{ $country->country }}>
        @foreach ($states as $state)
            @if ($state->country_id === $country->id)
                <option value="{{ $state->id }}">
                    {{ $state->state }}
            @endif
        @endforeach
    </optgroup>
@endforeach
