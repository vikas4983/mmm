<div class="form-group">

    <label for="{{ $name }}">{{ $label }}</label>
    <input
        type="{{ $name === 'password' || $name === 'password_confirmation' ? 'password' : ($name === 'email' ? 'email' : ($name === 'mobile' ? 'number' : 'text')) }}"
        name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        class="form-control @error($name) is-invalid @enderror">
    @if ($name === 'password')
        {{-- <span class="text-danger">Password must include at least 1 uppercase letter, 1 number, and 1 special
            character.</span> --}}
    @endif
    @if ($name === 'password')
    @else
        @error($name)
            <span class="invalid-feedback" role="alert">
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            </span>
        @enderror
    @endif




</div>
