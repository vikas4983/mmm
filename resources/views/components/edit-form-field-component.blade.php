{{-- @foreach ($fields as $field) --}}
{{-- <x-edit-input-component :name="$field['name']" :label="$field['label']" :id="$id" :actionUrl="$actionUrl" :user="$user" /> --}}

{{-- <x-edit-modal-component :name="$field['name']" :label="$field['label']" id="$id" :actionUrl="$actionUrl" :user="$user" /> --}}
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
                {{-- <form id="accountDetailsForm" method="POST" action="{{ $actionUrl }}"> --}}
                <form id="accountDetailsForm">
                    @csrf
                    @method('PATCH')
                    @foreach ($fields as $field)
                    @switch($field['type'])
                    @case('email')
                    <x-edit-input-component :name="$field['name']" :label="$field['label']" :id="$id" :actionUrl="$actionUrl" :user="$user" />
                    @break
            
                    @case('password')
                        <x-input-component :name="$field['name']" :label="$field['label']" :rules="$field['rules']" type="password" />
                    @break
            
                    @case('textarea')
                        <x-textarea-component :name="$field['name']" :label="$field['label']" :rules="$field['rules']" type="text" />
                    @break
            
                    @case('select')
                        <x-edit-select-component :name="$field['name']" :label="$field['label']" :options="$field['options']" :user="$user" :rules="$field['rules']" />
                    @break
            
                    @case('radio')
                        <x-radio-component :name="$field['name']" :label="$field['label']" :options="$field['options']" :selected="old($field['name'])" />
                    @break
            
                    @case('file')
                        <x-file-component :name="$field['name']" :label="$field['label']" :rules="$field['rules']" />
                    @break
            
                    @default
                    
                    <x-edit-input-component :name="$field['name']" :label="$field['label']" :id="$id" :actionUrl="$actionUrl" :user="$user" />
                @endswitch
                    @endforeach

                    <div class="form-group text-center">
                        <button type="submit"  id="accountDetailsBtn" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- @endforeach --}}