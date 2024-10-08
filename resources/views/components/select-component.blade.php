@php
    $profileFors = \App\Models\ProfileFor::all();
    $heights = \App\Models\Height::all();
    $motherTongues = \App\Models\MotherTongue::all();
    $religions = \App\Models\Religion::with('castes')->get();
    $maritalStatuses = \App\Models\MaritalStatus::all();

@endphp

<div class="form-group ">
    @switch($name)
        @case('profileFor')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                <option value="">Select {{ $label }}</option>
                @foreach ($profileFors as $profileFor)
                    <option value="{{ $profileFor->id }}" {{ old($name) == $profileFor->id ? 'selected' : '' }}>
                        {{ $profileFor->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('gender')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                <option value="">Select {{ $label }}</option>
                @foreach ($options as $option)
                    <option value="{{ $option }}" {{ old($name) == $option ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('height')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                <option value="">Select {{ $label }}</option>
                @foreach ($heights as $height)
                    <option value="{{ $height->id }}" {{ old($name) == $height->id ? 'selected' : '' }}>
                        {{ $height->height }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('mother_tongue')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                <option value="">Select {{ $label }}</option>
                @foreach ($motherTongues as $motherTongue)
                    <option value="{{ $motherTongue->id }}" {{ old($name) == $motherTongue->id ? 'selected' : '' }}>
                        {{ $motherTongue->mother_tongue }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('religion')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                <option value="">Select {{ $label }}</option>
                @foreach ($religions as $religion)
                    <option value="{{ $religion->id }}" {{ old($name) == $religion->id ? 'selected' : '' }}>
                        {{ $religion->religion }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
            <div class="form-group" id="hiddenCaste" style="display: none">
                <label for="caste"><b class="text-danger mr-5 gtRegMandatory">*</b>Caste</label>
                <select id="caste" name="caste" class="form-control">


                </select>
                @error('caste')
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>

            <script>
                const religion = document.getElementById("religion");
                const caste = document.getElementById("hiddenCaste");

                caste.style.display = 'none';

                religion.addEventListener("change", function(e) {
                    let religionId = religion.value;
                    console.log(religionId);

                    if (religionId) {

                        caste.style.display = 'block';


                        $.ajax({
                            url: '/get-caste/' + religionId,
                            type: 'GET',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                $("#caste").empty();
                                $("#caste").append('<option value="">Select Caste</option>');
                                $.each(data, function(key, value) {
                                    $('#caste').append('<option value="' + value.id + '">' + value
                                        .caste + '</option>');
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error Status:', status);
                                console.error('Error Details:', xhr.responseText);
                                alert(
                                    'An error occurred while fetching the caste data. Please try again later.'
                                );
                            }
                        });
                    } else {

                        $(caste).fadeOut();
                        $('#caste').empty();
                        $('#caste').append('<option value="">Select Caste</option>');
                    }
                });
            </script>
        @break

        @case('marital_status')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                <option value="">Select {{ $label }}</option>
                @foreach ($maritalStatuses as $maritalStatuse)
                    <option value="{{ $maritalStatuse->id }}" {{ old($name) == $maritalStatuse->id ? 'selected' : '' }}>
                        {{ $maritalStatuse->marital_status }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @default
            <p>{{ $label }} not recognized.</p>
    @endswitch
</div>
