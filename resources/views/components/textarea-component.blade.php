<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea  name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" placeholder="{{$placeholder}}"
        class="form-control @error($name) is-invalid @enderror" placeholder="{{$placeholder}}"></textarea>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
        </span>
    @enderror
</div>
