@foreach ($fields as $field)
    @switch($field['type'])
        @case('email')
            <x-input-component :name="$field['name']" :label="$field['label']" :rules="$field['rules']" type="email" />
        @break

        @case('password')
            <x-input-component :name="$field['name']" :label="$field['label']" :rules="$field['rules']" type="password" />
        @break

        @case('textarea')
            <x-textarea-component :name="$field['name']" :label="$field['label']" :rules="$field['rules']" type="text" />
        @break

        @case('select')
            <x-select-component :name="$field['name']" :label="$field['label']" :options="$field['options']" :rules="$field['rules']" />
        @break

        @case('radio')
            <x-radio-component :name="$field['name']" :label="$field['label']" :options="$field['options']" :selected="old($field['name'])" />
        @break

        @case('file')
            <x-file-component :name="$field['name']" :label="$field['label']" :rules="$field['rules']" />
        @break

        @default
            <x-input-component :name="$field['name']" :label="$field['label']" :rules="$field['rules']" type="text" />
    @endswitch
@endforeach





































{{-- @foreach ($fields ?? [] as $field)
    @if (is_array($field))
        @switch($field['type'])
            @case('email')
                <x-input-component 
                    :name="$field['name']" 
                    :label="$field['label']" 
                    :placeholder="$field['placeholder']" 
                    :rules="$field['rules']" 
                    type="email" 
                />
                @break

            @case('password')
                <x-input-component 
                    :name="$field['name']" 
                    :label="$field['label']" 
                    :placeholder="$field['placeholder']" 
                    :rules="$field['rules']" 
                    type="password" 
                />
                @break

            @case('text')
                <x-input-component 
                    :name="$field['name']" 
                    :label="$field['label']" 
                    :placeholder="$field['placeholder']" 
                    :rules="$field['rules']" 
                />
                @break

            @case('select')
                <x-select-component 
                    :name="$field['name']" 
                    :label="$field['label']" 
                    :options="$field['options']" 
                    :rules="$field['rules']" 
                />
                @break

            @case('file')
                <x-file-component 
                    :name="$field['name']" 
                    :label="$field['label']" 
                    :rules="$field['rules']" 
                />
                @break

            @default
                <p>Unexpected field type</p>
        @endswitch
    @else
        <p>Field is not an array</p>
    @endif
@endforeach


 --}}
