<style>
    .radio-group {
        margin-bottom: 1rem;
    }

    .radio-options {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .radio-option {
        display: flex;
        align-items: center;
    }

    .radio-option label {
        margin-left: 0.5rem;
    }
</style>

<div class="radio-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="radio-options">
        @foreach ($options as $value => $optionLabel)
            <div class="radio-option">
                <input type="radio" id="{{ $name }}-{{ $value }}" name="{{ $name }}"
                    value="{{ $value }}" {{ $value == $selected ? 'checked' : '' }} checked>
                <label for="{{ $name }}-{{ $value }}">
                    {{ $optionLabel }}
                </label>
            </div>
        @endforeach
    </div>
</div>
