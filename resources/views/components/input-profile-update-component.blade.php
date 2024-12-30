@switch($name)
    @case('name')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <br>
                <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
                    value="{{ old($name, $user->name ?? '') }}" placeholder="{{ $placeholder }} ">
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
    @break

    @case('user_email')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <br>
                <input type="email" class="form-control" name="user_email" id="user_email"
                    value="{{ old($name, $user->email ?? '') }}" placeholder="{{ $placeholder }} ">
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
    @break

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

    @case('organization_name')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <br>
                <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
                    value="{{ old($name, $user->carrierDetails->organization_name ?? '') }}"
                    placeholder="{{ $placeholder }} ">
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
    @break

    @case('school_name')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <br>
                <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
                    value="{{ old($name, $user->carrierDetails->school_name ?? '') }}" placeholder="{{ $placeholder }} ">
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
    @break

    @case('college_name')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <br>
                <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
                    value="{{ old($name, $user->carrierDetails->college_name ?? '') }}" placeholder="{{ $placeholder }} ">
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
    @break

    @case('father_gotra')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <br>
                <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
                    value="{{ old($name, $user->familyDetails->father_gotra ?? '') }}" placeholder="{{ $placeholder }} ">
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
    @break

    @case('mother_gotra')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <br>
                <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
                    value="{{ old($name, $user->familyDetails->mother_gotra ?? '') }}" placeholder="{{ $placeholder }} ">
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <!-- Spacer column -->
        </div>
    @break

    @case('contact_address')
        <div class="col-md-13">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <br>
                <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
                    value="{{ old($name, $user->familyDetails->contact_address ?? '') }}"
                    placeholder="{{ $placeholder }} ">
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
                    {{ $label }}
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
    @case('alternate_mobile')
    <div class="col-md-6">
        <div class="form-group">
            <label for="{{ $name }}">
                {{ $label }}
            </label>
            <br>
            <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
            value="{{ old($name, $user->contactDetails->alternate_mobile ?? '') }}"
            placeholder="{{ $placeholder }}" maxlength="10" pattern="\d{10}" 
            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" >
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-1 d-flex align-items-center justify-content-center">
        <!-- Spacer column -->
    </div>
@break
    @case('landline_number')
    <div class="col-md-6">
        <div class="form-group">
            <label for="{{ $name }}">
                {{ $label }}
            </label>
            <br>
            <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
            value="{{ old($name, $user->contactDetails->landline_number ?? '') }}"
            placeholder="{{ $placeholder }}" maxlength="10" pattern="\d{10}" 
            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" >
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-1 d-flex align-items-center justify-content-center">
        <!-- Spacer column -->
    </div>
@break
    @case('address')
    <div class="col-md-13">
        <div class="form-group">
            <label for="{{ $name }}">
                {{ $label }}
            </label>
            <br>
            <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
            value="{{ old($name, $user->contactDetails->address ?? '') }}"
            placeholder="{{ $placeholder }}">
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
