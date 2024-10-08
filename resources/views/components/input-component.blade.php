<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    
    <input 
        type="{{ 
            $name === 'password' || $name === 'password_confirmation' ? 'password' : 
            ($name === 'email' ? 'email' : 
            ($name === 'mobile' ? 'number' : 
            ($name === 'dob' ? 'date' : 'text')))
        }}"
        name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        class="form-control @error($name) is-invalid @enderror">
    
    @if ($name === 'password')
        {{-- You can add a password hint or validation message here if needed --}}
    @endif
    
    @error($name)
        <span class="invalid-feedback" role="alert">
            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
        </span>
    @enderror
</div>
