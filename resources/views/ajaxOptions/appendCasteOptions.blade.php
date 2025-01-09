@php
      $selectedCastes = session()->get('quickSearch.caste', []);
@endphp
@foreach ($religions as $religion)
<optgroup label={{ $religion->name }} class="select2-results__group">
    @foreach ($castes as $caste)
   @if ($caste->religion_id === $religion->id)
       <option value="{{ $caste->id }}"
                {{ in_array($caste->id, $selectedCastes) ? 'selected' : '' }}>
                {{ $caste->name }} </option>
        @endif
   @endforeach
</optgroup>
@endforeach

