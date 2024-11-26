@php
    $optionKeys = [
        'profileFors',
        'heights',
        'motherTongues',
        'religions',
        'maritalStatuses',
        'rashies',
        'countries',
        'educations',
        'employees',
        'occupations',
        'incomes',
        'fatherOccupations',
        'motherOccupations',
        'bodyTypes',
        'complexions',
        'bloodGroups',
        'habits',
        'physicalStatuses',
        'hobbies',
        'interests',
        'musics',
        'dresses',
        'movies',
        'sports',
    ];

    $optionData = [];
    foreach ($optionKeys as $key) {
        $optionData[$key] = Cache::get($key);
    }
    extract($optionData);
@endphp
<div class="modal fade" id="dynamicUpdateModal" tabindex="-1" role="dialog" aria-labelledby="dynamicModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ $actionUrl }}">
                    @csrf
                    @method('PUT')
                    @foreach ($fields as $field)
                        @case('profile_for')
                            <label for="{{ $name }}"><b
                                    class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
                            <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                                <option value="">Select {{ $label }}</option>
                                @foreach ($profileFors as $profileFor)
                                    <option value="{{ $profileFor->id }}"
                                        {{ old($name) == $profileFor->id ? 'selected' : '' }}>
                                        {{ $profileFor->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error($name)
                                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                            @enderror
                        @break

                        @default
                            <div class="form-group">
                                <label>{{ ucfirst($field) }}</label>
                                <input type="text" class="form-control" name="{{ $field }}"
                                    value="{{ $data[$field] ?? '' }}" placeholder="Enter {{ ucfirst($field) }}">
                            </div>
                    @endswitch
                @endforeach

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
