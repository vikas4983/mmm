@php
    $profileFors = \App\Models\ProfileFor::all();
@endphp

<div class="form-group">
    @switch($name)
        @case('profileFor')
            <label for="{{ $name }}">{{ $label }}</label>
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
            <label for="{{ $name }}">{{ $label }}</label>
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

        @default
            <p>{{ $label }} not recognized.</p>
    @endswitch
</div>
