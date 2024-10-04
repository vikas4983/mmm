<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="form-control">
    @error($name)
        <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
    @enderror
</div>
