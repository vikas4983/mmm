@php
    $selectedCastes = $quickFilter['caste'] ?? [];
    
@endphp
@if ($action === 'quickCasteCriteria')
    <option value="0" {{ in_array(0, $selectedCastes) ? 'selected' : '' }}>Doesn't Matter</option>
    @foreach ($religions as $religion)
        <optgroup label={{ $religion->name }} class="select2-results__group">
            @foreach ($castes as $caste)
                @if ($caste->religion_id === $religion->id)
                    <option value="{{ $caste->id }}" {{ in_array($caste->id, $selectedCastes) ? 'selected' : '' }}>
                        {{ $caste->name }} </option>
                @endif
            @endforeach
        </optgroup>
    @endforeach
@endif