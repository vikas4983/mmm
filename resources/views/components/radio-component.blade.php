<style>
    .radio-options {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 5px;
    }

    .radio-option {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .radio-option input[type="radio"] {
        vertical-align: middle;
        margin: 0;
        accent-color: #007bff;

    }

    .radio-option label {
        margin: 0;
        line-height: 1;
        padding-top: 2px;

    }
</style>

@if ($name === 'manglik')
    <div class="radio-group">
        <label for="{{ $name }}">
            <b class="text-danger mr-1 gtRegMandatory">*</b>&nbsp;{{ $label }}
        </label>
        <div class="radio-options">
            @foreach ($options as $value => $optionLabel)
                <div class="radio-option">
                    <input type="radio" id="{{ $name }}-{{ $value }}" name="{{ $name }}"
                        value="{{ $value }}" {{ old($name, $selected ?? '1') == $value ? 'checked' : '' }}>
                    <label for="{{ $name }}-{{ $value }}">
                        {{ $optionLabel }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="radio-group">
        <label for="{{ $name }}">
            {{ $label }}
        </label>
        <div class="radio-options">
            @foreach ($options as $value => $optionLabel)
                <div class="radio-option">
                    <input type="radio" id="{{ $name }}-{{ $value }}" name="{{ $name }}"
                        value="{{ $value }}" {{ old($name, $selected ?? '1') == $value ? 'checked' : '' }}>
                    <label for="{{ $name }}-{{ $value }}">
                        {{ $optionLabel }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
@endif
