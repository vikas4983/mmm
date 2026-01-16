
<form action="{{ route('settings.image.update') }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        {{-- <label class="form-label fw-bold ">Name Privacy Setting</label> <!-- Large heading --> --}}
        <div class="form-check mt-5">
            <input class="form-check-input" type="radio" name="image_privacy" id="privacyAll" value="1"
                {{ old('image_privacy', $settingData->image) == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="privacyAll">Show for All</label>
        </div>

        <div class="form-check mt-5">
            <input class="form-check-input" type="radio" name="image_privacy" id="privacyFriends" value="2"
                {{ old('image_privacy', $settingData->image) == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="privacyFriends">Show Only Friends</label>
        </div>

        <div class="form-check mt-5">
            <input class="form-check-input" type="radio" name="image_privacy" id="privacyHidden" value="0"
                {{ old('image_privacy', $settingData->image) == 0 ? 'checked' : '' }}>
            <label class="form-check-label" for="privacyHidden">Hide from All</label>
        </div>

    </div>
    <div class="row mt-5" style="margin-left: 18rem;">
        <button type="submit" class="btn btn-primary" style="background-color: #E47203; border:none">Update</button>
    </div>
</form>
