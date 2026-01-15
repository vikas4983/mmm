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

@switch($name)
    @case('manglik')
    @case('horoscope_match')
    @case('horoscope_show')
        <div class="col-md-6">
            <div class="radio-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <div class="radio-options">
                    @foreach ($options as $value => $optionLabel)
                        <div class="radio-option">
                            <input type="radio" id="{{ $name }}-{{ $value }}" name="{{ $name }}"
                                value="{{ $value }}" {{ $value == $selected ? 'checked' : '' }}>
                            <label for="{{ $name }}-{{ $value }}">
                                {{ $optionLabel }}
                            </label>
                        </div>
                    @endforeach
                    @error($name)
                        <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
        @break

    @default
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="">Select {{ $label }}</option>
                    @foreach ($rashies as $rashi)
                        <option value="{{ $rashi->id }}"
                            {{ old($name, $user->horoscopeDetails->rashi ?? null) == $rashi->id ? 'selected' : '' }}>
                            {{ $rashi->name }}
                        </option>
                    @endforeach
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
        @break
@endswitch
