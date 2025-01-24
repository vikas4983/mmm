@php

    $optionKeys = [
        'profileFors',
        'heights',
        'motherTongues',
        'religions',
        // 'states',
        //'cities',
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
        'complextions',
        'bloodGroups',
        'habits',
        'physicalStatuses',
        'hobbies',
        'interests',
        'musics',
        'dresses',
        'movies',
        'sports',
        // 'familyTypes',
        // 'familyValues',
        // 'familyStatus',
    ];

    $optionData = [];
    foreach ($optionKeys as $key) {
        $optionData[$key] = Cache::get($key);
    }
    extract($optionData);

@endphp
@php
    use App\Models\State;
    use App\Models\City;
    use App\Models\familyType;
    use App\Models\familyValue;
    use App\Models\familyStatus;
    use App\Models\BodyType;
    use App\Models\Complextion;
    use App\Models\DietaryHabit;
    use App\Models\Habit;
    use App\Models\Challenge;
    use App\Models\BloodGroup;
    use App\Models\LanguageSpeak;
    use App\Models\Relationship;

    $states = State::all();
    $cities = City::all();
    $familyTypes = familyType::all();
    $familyValues = familyValue::all();
    $familyStatus = familyStatus::all();
    $bodyTypes = BodyType::all();
    $complextions = Complextion::all();
    $dietaryHabits = DietaryHabit::all();
    $habits = Habit::all();

    $physicalStatuses = Challenge::all();
    $bloodGroups = BloodGroup::all();
    $languageSpeaks = LanguageSpeak::all();
    $relationships = Relationship::all();

@endphp
@switch($name)
    @case('profile_for')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="">Select {{ $label }}</option>
                    @foreach ($profileFors as $profileFor)
                        <option value="{{ $profileFor->id }}"
                            {{ old($name, $user->profile_for ?? null) == $profileFor->name ? 'selected' : '' }}>
                            {{ $profileFor->name }}
                        </option>
                    @endforeach
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('country')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>

                <select id="country" name="{{ $name }}" class="form-control">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}"
                            {{ old($name, $user->carrierDetails->countries->id) == $country->id ? 'selected' : '' }}>
                            {{ $country->country }}
                        </option>
                    @endforeach
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="state">
                    State
                </label>
                <select id="hstate" name="state" class="form-control">
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}"
                            {{ old($name, $user->carrierDetails->states->id) == $state->id ? 'selected' : '' }}>
                            {{ $state->state }}
                        </option>
                    @endforeach

                </select>
                @error('state')
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
        @if ($label === 'Country of birth')
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city">
                        City Of Birth
                    </label>
                    <select id="hcity" name="city" class="form-control">
                        <option value="">Select City</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}"
                                {{ old($name, $user->horoscopeDetails->cities->id ?? '') == $city->id ? 'selected' : '' }}>
                                {{ $city->city }}
                            </option>
                        @endforeach
                    </select>
                    @error('city')
                        <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @else
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city">
                        City
                    </label>
                    <select id="hcity" name="city" class="form-control">
                        <option value="">Select City</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}"
                                {{ old('city', $user->carrierDetails->cities->id ?? '') == $city->id ? 'selected' : '' }}>
                                {{ $city->city }}
                            </option>
                        @endforeach
                    </select>
                    @error('city')
                        <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endif
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('rashi')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="">Select {{ $label }}</option>
                    @foreach ($rashies as $rashi)
                        <option value="{{ $rashi->id }}"
                            {{ old($name, $user->horoscopeDetails->rashi ?? null) == $rashi->id ? 'selected' : '' }}>
                            {{ $rashi->name }}
                        </option>
                    @endforeach
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('manglik')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
               
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="1" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'yes' ? 'selected' : '' }}>
                        Yes</option>
                    <option value="2" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'no' ? 'selected' : '' }}>
                        No</option>
                    <option value="0"
                        {{ old($name, $user->horoscopeDetails->{$name} ?? '') == "don't know" ? 'selected' : '' }}>Don't Know
                    </option>
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('horoscope_match')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="yes" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'yes' ? 'selected' : '' }}>
                        Yes</option>
                    <option value="no" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'no' ? 'selected' : '' }}>
                        No</option>
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('horoscope_show')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>

                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="1" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'yes' ? 'selected' : '' }}>
                        Yes</option>
                    <option value="0" {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'no' ? 'selected' : '' }}>
                        No</option>
                    <option value="2"
                        {{ old($name, $user->horoscopeDetails->{$name} ?? '') == 'only accept member' ? 'selected' : '' }}>Only
                        Accept Member</option>
                </select>

                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('education')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($educations as $education)
                        <option value="{{ $education->id }}"
                            {{ old($name, $user->carrierDetails->{$name} ?? '') == $education->id ? 'selected' : '' }}>
                            {{ $education->{$name} }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('employee')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}"
                            {{ old($name, $user->carrierDetails->{$name} ?? '') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->{$name} }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('occupation')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($occupations as $occupation)
                        <option value="{{ $occupation->id }}"
                            {{ old($name, $user->carrierDetails->{$name} ?? '') == $occupation->id ? 'selected' : '' }}>
                            {{ $occupation->{$name} }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('income')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($incomes as $income)
                        <option value="{{ $income->id }}"
                            {{ old($name, $user->carrierDetails->{$name} ?? '') == $income->id ? 'selected' : '' }}>
                            {{ $income->{$name} }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('interested_abroad')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                    <option value="1" {{ old($name, $user->carrierDetails->{$name} ?? '') == 'Yes' ? 'selected' : '' }}>
                        Yes</option>
                    <option value="0" {{ old($name, $user->carrierDetails->{$name} ?? '') == 'No' ? 'selected' : '' }}>
                        No</option>

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('father_occupation')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($fatherOccupations as $fatherOccupation)
                        <option value="{{ $fatherOccupation->id }}"
                            {{ old($name, $user->familyDetails->{$name} ?? '') == $fatherOccupation->id ? 'selected' : '' }}>
                            {{ $fatherOccupation->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('mother_occupation')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($motherOccupations as $motherOccupation)
                        <option value="{{ $motherOccupation->id }}"
                            {{ old($name, $user->familyDetails->{$name} ?? '') == $motherOccupation->id ? 'selected' : '' }}>
                            {{ $motherOccupation->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('brother')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="None" {{ old($name, $user->familyDetails->{$name} ?? '') == 'None' ? 'selected' : '' }}>
                        None</option>
                    <option value="One" {{ old($name, $user->familyDetails->{$name} ?? '') == 'One' ? 'selected' : '' }}>
                        One
                    </option>
                    <option value="Two" {{ old($name, $user->familyDetails->{$name} ?? '') == 'Two' ? 'selected' : '' }}>
                        Two
                    </option>
                    <option value="Three"
                        {{ old($name, $user->familyDetails->{$name} ?? '') == 'Three' ? 'selected' : '' }}>
                        Three</option>
                    <option value="Four" {{ old($name, $user->familyDetails->{$name} ?? '') == 'Four' ? 'selected' : '' }}>
                        Four</option>

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('brother_married')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="None" {{ old($name, $user->familyDetails->{$name} ?? '') == 'None' ? 'selected' : '' }}>
                        None</option>
                    <option value="One" {{ old($name, $user->familyDetails->{$name} ?? '') == 'One' ? 'selected' : '' }}>
                        One
                    </option>
                    <option value="Two" {{ old($name, $user->familyDetails->{$name} ?? '') == 'Two' ? 'selected' : '' }}>
                        Two
                    </option>
                    <option value="Three"
                        {{ old($name, $user->familyDetails->{$name} ?? '') == 'Three' ? 'selected' : '' }}>
                        Three</option>
                    <option value="Four" {{ old($name, $user->familyDetails->{$name} ?? '') == 'Four' ? 'selected' : '' }}>
                        Four</option>

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('sister')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="None" {{ old($name, $user->familyDetails->{$name} ?? '') == 'None' ? 'selected' : '' }}>
                        None</option>
                    <option value="One" {{ old($name, $user->familyDetails->{$name} ?? '') == 'One' ? 'selected' : '' }}>
                        One
                    </option>
                    <option value="Two" {{ old($name, $user->familyDetails->{$name} ?? '') == 'Two' ? 'selected' : '' }}>
                        Two
                    </option>
                    <option value="Three"
                        {{ old($name, $user->familyDetails->{$name} ?? '') == 'Three' ? 'selected' : '' }}>
                        Three</option>
                    <option value="Four" {{ old($name, $user->familyDetails->{$name} ?? '') == 'Four' ? 'selected' : '' }}>
                        Four</option>

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('sister_married')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>

                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    <option value="None" {{ old($name, $user->familyDetails->{$name} ?? '') == 'None' ? 'selected' : '' }}>
                        None</option>
                    <option value="One" {{ old($name, $user->familyDetails->{$name} ?? '') == 'One' ? 'selected' : '' }}>
                        One
                    </option>
                    <option value="Two" {{ old($name, $user->familyDetails->{$name} ?? '') == 'Two' ? 'selected' : '' }}>
                        Two
                    </option>
                    <option value="Three"
                        {{ old($name, $user->familyDetails->{$name} ?? '') == 'Three' ? 'selected' : '' }}>
                        Three</option>
                    <option value="Four" {{ old($name, $user->familyDetails->{$name} ?? '') == 'Four' ? 'selected' : '' }}>
                        Four</option>

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('family_type')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($familyTypes as $familyType)
                        <option value="{{ $familyType->id }}"
                            {{ old($name, $user->familyDetails->{$name} ?? '') == $familyType->id ? 'selected' : '' }}>
                            {{ $familyType->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('family_status')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($familyStatus as $familyStatuse)
                        <option value="{{ $familyStatuse->id }}"
                            {{ old($name, $user->familyDetails->{$name} ?? '') == $familyStatuse->id ? 'selected' : '' }}>
                            {{ $familyStatuse->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('family_value')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($familyValues as $familyValue)
                        <option value="{{ $familyValue->id }}"
                            {{ old($name, $user->familyDetails->{$name} ?? '') == $familyValue->id ? 'selected' : '' }}>
                            {{ $familyValue->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('family_living')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    Family Country
                </label>
                <select id="family_living" name="{{ $name }}" class="form-control" required>
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">
                            {{ $country->country }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="family_state">
                    Family State
                </label>
                <select id="family_state" name="family_state" class="form-control" required>

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="state">
                    Family City
                </label>
                <select id="family_city" name="family_city" class="form-control" required>

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('body_type')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($bodyTypes as $bodyType)
                        <option value="{{ $bodyType->id }}"
                            {{ old($name, $user->lifestyleDetails->{$name} ?? '') == $bodyType->id ? 'selected' : '' }}>
                            {{ $bodyType->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('complextion')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($complextions as $complextion)
                        <option value="{{ $complextion->id }}"
                            {{ old($name, $user->lifestyleDetails->{$name} ?? '') == $complextion->id ? 'selected' : '' }}>
                            {{ $complextion->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('dietary_habit')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($dietaryHabits as $dietaryHabit)
                        <option value="{{ $dietaryHabit->id }}"
                            {{ old($name, $user->lifestyleDetails->{$name} ?? '') == $dietaryHabit->id ? 'selected' : '' }}>
                            {{ $dietaryHabit->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('drinking_habit')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($habits as $habit)
                        <option value="{{ $habit->id }}"
                            {{ old($name, $user->lifestyleDetails->{$name} ?? '') == $habit->name ? 'selected' : '' }}>
                            {{ $habit->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('smoking_habit')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($habits as $habit)
                        <option value="{{ $habit->id }}"
                            {{ old($name, $user->lifestyleDetails->{$name} ?? '') == $habit->name ? 'selected' : '' }}>
                            {{ $habit->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('physical_status')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    <b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($physicalStatuses as $physicalStatus)
                        <option value="{{ $physicalStatus->id }}"
                            {{ old($name, $user->lifestyleDetails->{$name} ?? '') == $physicalStatus->id ? 'selected' : '' }}>
                            {{ $physicalStatus->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('blood_group')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($bloodGroups as $bloodGroup)
                        <option value="{{ $bloodGroup->id }}"
                            {{ old($name, $user->lifestyleDetails->{$name} ?? '') == $bloodGroup->id ? 'selected' : '' }}>
                            {{ $bloodGroup->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('open_to_pet')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>

                <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                    <option value="Yes"
                        {{ old($name, $user->lifestyleDetails->{$name} ?? '') == 'Yes' ? 'selected' : '' }}>Yes
                    </option>
                    <option value="No"
                        {{ old($name, $user->lifestyleDetails->{$name} ?? '') == 'No' ? 'selected' : '' }}>No
                    </option>
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('own_house')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                    <option value="Yes"
                        {{ old($name, $user->lifestyleDetails->{$name} ?? '') == 'Yes' ? 'selected' : '' }}>Yes
                    </option>
                    <option value="No"
                        {{ old($name, $user->lifestyleDetails->{$name} ?? '') == 'No' ? 'selected' : '' }}>No
                    </option>
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('own_car')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                    <option value="Yes"
                        {{ old($name, $user->lifestyleDetails->{$name} ?? '') == 'Yes' ? 'selected' : '' }}>Yes
                    </option>
                    <option value="No"
                        {{ old($name, $user->lifestyleDetails->{$name} ?? '') == 'No' ? 'selected' : '' }}>No
                    </option>
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('language_speak')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <br/>
                <select id="{{ $name }}" name="{{ $name }}[]" multiple
                    class="form-control js-example-basic-multiple">
                    @foreach ($languageSpeaks as $languageSpeak)
                        <option value="{{ $languageSpeak->id }}"
                            {{ old($name, $user->lifestyleDetails->{$name} ?? '') == $languageSpeak->id ? 'selected' : '' }}>
                            {{ $languageSpeak->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('hiv')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                    <option value="Yes"
                        {{ old($name, $user->lifestyleDetails->{$name} ?? '') == 'Yes' ? 'selected' : '' }}>Yes
                    </option>
                    <option value="No"
                        {{ old($name, $user->lifestyleDetails->{$name} ?? '') == 'No' ? 'selected' : '' }}>No
                    </option>
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('thalassemia')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                    <option value="Yes"
                        {{ old($name, $user->lifestyleDetails->{$name} ?? '') == 'Yes' ? 'selected' : '' }}>Yes
                    </option>
                    <option value="No"
                        {{ old($name, $user->lifestyleDetails->{$name} ?? '') == 'No' ? 'selected' : '' }}>No
                    </option>
                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('alternate_owned_by')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($profileFors as $profileFor)
                        <option value="{{ $profileFor->name }}"
                            {{ old($name, $user->contactDetails->{$name} ?? '') == $profileFor->name ? 'selected' : '' }}>
                            {{ $profileFor->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @case('landline_owned_by')
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">
                    {{ $label }}
                </label>
                <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                    @foreach ($profileFors as $profileFor)
                        <option value="{{ $profileFor->name }}"
                            {{ old($name, $user->contactDetails->{$name} ?? '') == $profileFor->name ? 'selected' : '' }}>
                            {{ $profileFor->name }}
                    @endforeach

                </select>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

    @default
        <div class="col-md-6">
            <div class="form-group">
                <label for="{{ $name }}">{{ $label }}</label>

                <input type="text" id="{{ $name }}" name="{{ $name }}" class="form-control"
                    value="{{ old($name, $user->horoscopeDetails->{$name} ?? '') }}" required>
                @error($name)
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-1 d-flex align-items-center justify-content-center">
        </div>
    @break

@endswitch
