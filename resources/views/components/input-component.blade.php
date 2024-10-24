<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input
    
        type="{{ $type }}"
        name="{{ $name }}" id="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        class="form-control @error($name) is-invalid @enderror"
        @if ($type === 'number') minlength="10" maxlength="12" @endif
    >

    @if ($name === 'password')
        {{-- Add any password-specific messages or hints here --}}
    @endif

    @error($name)
        <span class="invalid-feedback" role="alert">
            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
        </span>
    @enderror
</div>
