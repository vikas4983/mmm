@foreach ($states as $state)
    <div class="row">
        <label for="state-{{ $state->id }}" class="col-xs-16">
            <div class="col-xs-16" style="text-align: center;">
                <span
                    style="
                    display: inline-block;
                    background-color: #E47203;
                    color: white;
                    padding: 4px 12px;
                    margin: 6px 0;
                    border-radius: 2px;
                    font-size: 11px;
                    font-weight: bold;
                ">
                    {{ $state->state }}
                </span>
            </div>

        </label>
    </div>
    @foreach ($state->cities as $city)
        <div class="col-xs-16" bis_skin_checked="1">
            <label for="city-{{ $city->id }}">
                <input type="checkbox" id="city-{{ $city->id }}" value="{{ $city->id }}" name="city[]"
                    class="city-filter"
                    {{ in_array($city->id, old('city', $basicFilter['city'] ?? [])) ? 'checked' : '' }}>
                <span class="gt-margin-left-10 gt-cursor name">
                    {{ $city->city }}
                </span>
            </label>
        </div>
    @endforeach
@endforeach
<script></script>
