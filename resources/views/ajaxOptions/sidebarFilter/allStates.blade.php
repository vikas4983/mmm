   @foreach ($states as $state)
        <div class="col-xs-16" bis_skin_checked="1">
            <label for="state">
                <input type="checkbox" id="state" value="{{ $state->id }}" name="state[]"
                    class="statecb"> <span class="gt-margin-left-10 gt-cursor name"
                   >
                    {{ $state->state }}</span>
            </label>
        </div>
    @endforeach