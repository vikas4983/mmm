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

    $fields = config('formFields.accountDetails');
  
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
                        @switch($field['type'])
                            @case('text')
                                <div class="form-group">
                                    <label for="{{ $field['name'] }}"><b
                                            class="text-danger mr-5 gtRegMandatory">*</b>{{ $field['label'] }}</label>
                                    <input type="text" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                                        value="{{ old($field['name'], $user->{$field['name']}) }}"
                                        placeholder="{{ $field['placeholder'] }}"
                                        class="form-control @error($field['name']) is-invalid @enderror" required>
                                    @error($field['name'])
                                        <span class="invalid-feedback" role="alert">
                                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            @break

                            @case('email')
                                <div class="form-group">
                                    <label for="{{ $field['name'] }}"><b
                                            class="text-danger mr-5 gtRegMandatory">*</b>{{ $field['label'] }}</label>
                                    <input type="email" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                                        value="{{ old($field['name'], $user->{$field['name']}) }}"
                                        placeholder="{{ $field['placeholder'] }}"
                                        class="form-control @error($field['name']) is-invalid @enderror" required>
                                    @error($field['name'])
                                        <span class="invalid-feedback" role="alert">
                                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            @break

                            @case('select')
                                <div class="form-group">
                                    <label for="{{ $field['name'] }}"><b
                                            class="text-danger mr-5 gtRegMandatory">*</b>{{ $field['label'] }}</label>
                                    <select name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                                        class="form-control @error($field['name']) is-invalid @enderror" required>
                                        <option value="">Select an option</option>
                                        @foreach ($profileFors as $profileFor)
                                            <option value="{{ $profileFor->id }}"
                                                {{ old($field['name'], $user->{$name}) == $profileFor->id ? 'selected' : '' }}>
                                                {{ $profileFor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error($field['name'])
                                        <span class="invalid-feedback" role="alert">
                                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                                        </span>
                                    @enderror
                                </div>
                            @break

                            @default
                                <div class="form-group">
                                    <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                                    <input type="text" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                                        value="{{ old($field['name'], $user->{$field['name']}) }}"
                                        placeholder="{{ $field['placeholder'] }}"
                                        class="form-control @error($field['name']) is-invalid @enderror" required>
                                    @error($field['name'])
                                        <span class="invalid-feedback" role="alert">
                                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                                        </span>
                                    @enderror
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
