@php
    $user = Auth::user();
    $selectedCastes = old(
        'caste',
        isset($user->basicDetails->castes)
            ? (array) $user->basicDetails->castes->pluck('id')->toArray()
            : [(int) $user->basicDetails->castes->id],
    );
@endphp

@foreach ($countries as $country)
    <div class="row">
        <label for="religion-{{ $country->id }}" class="col-xs-16">

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
                    {{ $country->country }}
                </span>
            </div>

        </label>
    </div>
   
    @foreach ($country->state as $staten)
        <div class="col-xs-16" bis_skin_checked="1">
            <label for="state">
                <input type="checkbox" id="state" value="{{ $staten->id }}" name="state[]"
                    class="statecb"> <span class="gt-margin-left-10 gt-cursor name"
                    {{ old('state', $user->carrierDetails->states->state) === $staten->id ? 'checked' : '' }}>
                    {{ $staten->state }}-{{ $staten->id }}</span>
            </label>
        </div>
    @endforeach
@endforeach

