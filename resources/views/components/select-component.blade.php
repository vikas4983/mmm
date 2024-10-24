@php
    $profileFors = \App\Models\ProfileFor::where('status', 1)->get();
    $heights = \App\Models\Height::where('status', 1)->get();
    $motherTongues = \App\Models\MotherTongue::where('status', 1)->get();
    $religions = \App\Models\Religion::with('castes')->where('status', 1)->get();
    $maritalStatuses = \App\Models\MaritalStatus::where('status', 1)->get();
    $rashies = \App\Models\Rashi::where('status', 1)->get();
    $countries = \App\Models\Country::where('status', 1)->get();
    $educations = \App\Models\Education::where('status', 1)->get();
    $employees = \App\Models\Employee::where('status', 1)->get();
    $occupations = \App\Models\Occupation::where('status', 1)->get();
    $incomes = \App\Models\Income::where('status', 1)->get();
    $fatherOccupations = \App\Models\FatherOccupation::where('status', 1)->get();
    $motherOccupations = \App\Models\MotherOccupation::where('status', 1)->get();
    $bodyTypes = \App\Models\BodyType::where('status', 1)->get();
    $complexions = \App\Models\Complextion::where('status', 1)->get();
    $bloodGroups = \App\Models\BloodGroup::where('status', 1)->get();
    $habits = \App\Models\Habit::where('status', 1)->get();
    $physicalStatuses = \App\Models\Challenge::where('status', 1)->get();
    $hobbies = \App\Models\Hobby::where('status', 1)->get();
    $interests = \App\Models\Interest::where('status', 1)->get();
    $musics = \App\Models\Music::where('status', 1)->get();
    $dresses = \App\Models\Dress::where('status', 1)->get();
    $movies = \App\Models\Movie::where('status', 1)->get();
    $sports = \App\Models\Sport::where('status', 1)->get();

@endphp


<div class="form-group ">
    @switch($name)
        @case('profileFor')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
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
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
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

        @case('height')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select {{ $label }}</option>
                @foreach ($heights as $height)
                    <option value="{{ $height->id }}" {{ old($name) == $height->id ? 'selected' : '' }}>
                        {{ $height->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('mother_tongue')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select {{ $label }}</option>
                @foreach ($motherTongues as $motherTongue)
                    <option value="{{ $motherTongue->id }}" {{ old($name) == $motherTongue->id ? 'selected' : '' }}>
                        {{ $motherTongue->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('religion')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select {{ $label }}</option>
                @foreach ($religions as $religion)
                    <option value="{{ $religion->id }}" {{ old($name) == $religion->id ? 'selected' : '' }}>
                        {{ $religion->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
            <div class="form-group" id="hiddenCaste" style="display: none" required>
                <label for="caste"><b class="text-danger mr-5 gtRegMandatory">*</b>Caste</label>
                <select id="caste" name="caste" class="form-control">
                </select>
                @error('caste')
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        @break

        @case('country')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                <option value="">Select </option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ old($name) == $country->id ? 'selected' : '' }}>
                        {{ $country->country }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
            <div class="form-group" id="hiddenState" style="display: none">
                <label for="state">State</label>
                <select id="state" name="state" class="form-control">
                </select>
                @error('state')
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group" id="hiddenCity" style="display: none">
                <label for="city">City</label>
                <select id="city" name="city" class="form-control">
                </select>
                @error('city')
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        @break

        @case('marital_status')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select {{ $label }}</option>
                @foreach ($maritalStatuses as $maritalStatuse)
                    <option value="{{ $maritalStatuse->id }}" {{ old($name) == $maritalStatuse->id ? 'selected' : '' }}>
                        {{ $maritalStatuse->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
            <div class="form-group" id="hiddenChildren" style="display: none">
                <label for="children"><b class="text-danger mr-5 gtRegMandatory">*</b>Children</label>
                <select id="children" name="children" class="form-control" >
                    <option value="">Select</option>
                    <option value="0">None</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                </select>
                @error('children')
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        @break

        @case('rashi')
            <label for="{{ $name }}">{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                <option value="">Select {{ $label }}</option>
                @foreach ($rashies as $rashi)
                    <option value="{{ $rashi->id }}" {{ old($name) == $rashi->id ? 'selected' : '' }}>
                        {{ $rashi->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('education')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select</option>
                @foreach ($educations as $education)
                    <option value="{{ $education->id }}" {{ old($name) == $education->id ? 'selected' : '' }}>
                        {{ $education->education }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('employee')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select </option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old($name) == $employee->id ? 'selected' : '' }}>
                        {{ $employee->employee }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
            <div class="form-group" id="hiddenOccupation" style="display: none">
                <label for="occupation"><b class="text-danger mr-5 gtRegMandatory">*</b>Occupation</label>
                <select id="occupation" name="occupation" class="form-control" required>
                </select>
                @error('occupation')
                    <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                @enderror
            </div>
        @break

        @case('income')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select </option>
                @foreach ($incomes as $income)
                    <option value="{{ $income->id }}" {{ old($name) == $income->id ? 'selected' : '' }}>
                        {{ $income->income }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('father_occupation')
            <label for="{{ $name }}">{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select </option>
                @foreach ($fatherOccupations as $fatherOccupation)
                    <option value="{{ $fatherOccupation->id }}"
                        {{ old($name) == $fatherOccupation->id ? 'selected' : '' }}>
                        {{ $fatherOccupation->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('mother_occupation')
            <label for="{{ $name }}">{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select </option>
                @foreach ($motherOccupations as $motherOccupation)
                    <option value="{{ $motherOccupation->id }}"
                        {{ old($name) == $motherOccupation->id ? 'selected' : '' }}>
                        {{ $motherOccupation->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('body_type')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select </option>
                @foreach ($bodyTypes as $bodyType)
                    <option value="{{ $bodyType->id }}" {{ old($name) == $bodyType->id ? 'selected' : '' }}>
                        {{ $bodyType->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('complexion')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select </option>
                @foreach ($complexions as $complexion)
                    <option value="{{ $complexion->id }}" {{ old($name) == $complexion->id ? 'selected' : '' }}>
                        {{ $complexion->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('blood_group')
            <label for="{{ $name }}">{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select </option>
                @foreach ($bloodGroups as $bloodGroup)
                    <option value="{{ $bloodGroup->id }}" {{ old($name) == $bloodGroup->id ? 'selected' : '' }}>
                        {{ $bloodGroup->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('dietary_habit')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select </option>
                @foreach ($habits as $habit)
                    <option value="{{ $habit->id }}" {{ old($name) == $habit->id ? 'selected' : '' }}>
                        {{ $habit->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('smoking_habit')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select </option>
                @foreach ($habits as $habit)
                    <option value="{{ $habit->id }}" {{ old($name) == $habit->id ? 'selected' : '' }}>
                        {{ $habit->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('drinking_habit')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select </option>
                @foreach ($habits as $habit)
                    <option value="{{ $habit->id }}" {{ old($name) == $habit->id ? 'selected' : '' }}>
                        {{ $habit->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break
        @case('physical_status')
            <label for="{{ $name }}"><b class="text-danger mr-5 gtRegMandatory">*</b>{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control" required>
                <option value="">Select </option>
                @foreach ($physicalStatuses as $physicalStatus)
                    <option value="{{ $physicalStatus->id }}" {{ old($name) == $physicalStatus->id ? 'selected' : '' }}>
                        {{ $physicalStatus->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('hobby')
            <label for="{{ $name }}">{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}[]" class="form-control" multiple
            multiselect-search="true" multiselect-select-all="true" >
                
                @foreach ($hobbies as $hobby)
                    <option value="{{ $hobby->id }}" {{ old($name) == $hobby->id ? 'selected' : '' }}>
                        {{ $hobby->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('interest')
            <label for="{{ $name }}">{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}[]" class="form-control" multiple
            multiselect-search="true" multiselect-select-all="true" >
                
                @foreach ($interests as $interest)
                    <option value="{{ $interest->id }}" {{ old($name) == $interest->id ? 'selected' : '' }}>
                        {{ $interest->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('music')
            <label for="{{ $name }}">{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}[]" class="form-control" multiple
            multiselect-search="true" multiselect-select-all="true" >
                
                @foreach ($musics as $music)
                    <option value="{{ $music->id }}" {{ old($name) == $music->id ? 'selected' : '' }}>
                        {{ $music->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('dress')
            <label for="{{ $name }}">{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}[]" class="form-control" multiple
            multiselect-search="true" multiselect-select-all="true" >
               
                @foreach ($dresses as $dresse)
                    <option value="{{ $dresse->id }}" {{ old($name) == $dresse->id ? 'selected' : '' }}>
                        {{ $dresse->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('movie')
            <label for="{{ $name }}">{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}[]" class="form-control"  multiple
            multiselect-search="true" multiselect-select-all="true" >
              
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}" {{ old($name) == $movie->id ? 'selected' : '' }}>
                        {{ $movie->name }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @case('sport')
            <label for="{{ $name }}">{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}[]" class="form-control" multiple
                multiselect-search="true" multiselect-select-all="true" >
              
                @foreach ($sports as $sport)
                    <option value="{{ $sport->id }}" {{ old($name) == $sport->id ? 'selected' : '' }}>
                        {{ $sport->name }}
                    </option>
                @endforeach
            </select>
           
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
        @break

        @default
            <label for="{{ $name }}">{{ $label }}</label>
            <select id="{{ $name }}" name="{{ $name }}" class="form-control">
                <option value="">Select</option>
                @foreach ($options as $option)
                    <option value="{{ $option }}" {{ old($name) == $option ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                @endforeach
            </select>
            @error($name)
                <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
            @enderror
    @endswitch
</div>
