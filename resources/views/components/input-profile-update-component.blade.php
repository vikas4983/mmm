@switch($name)
    @case('date_of_birth')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
                    value="{{ \Carbon\Carbon::parse($user->basicDetails->dob)->format('Y-m-d') ?? '' }}" disabled>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
    @break

    @case('time_of_birth')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <input type="time" name="{{ $name }}" id="{{ $name }}"
                    value="{{ \Carbon\Carbon::parse($user->horoscopeDetails->time_of_birth)->format('H:i') }}">
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
    @break

    @default
@endswitch
