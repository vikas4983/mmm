
    @foreach ($religions as $religion)
        <div class="row">
            <label for="religion-{{ $religion->id }}" class="col-xs-16">
                <div class="row">
                    <div class="col-xs-16" style="text-align: center;">
                        <span
                            style="
                    display: inline-block;
                    background-color: #E47203;
                    color: white;
                    padding: 4px 12px;
                    margin: 6px 0;
                    border-radius: 2px;
                    font-size: 11px;
                    font-weight: bold;
                ">
                            {{ $religion->name }}
                        </span>
                    </div>
                </div>
            </label>
        </div>
        @foreach ($religion->castes as $caste)
            <div class="row">
                <label for="filter-{{ $caste->id }}" class="col-xs-16">
                    <div class="row">
                        <span class="col-xs-3">
                            <input type="checkbox"
                                class="castecb caste-checkbox  gt-cursor pull-left gt-margin-right-10" name="caste[]"
                                value="{{ $caste->id }}"
                                
                                {{in_array($caste->id, old('caste', $basicFilter['caste'] ?? [])) ? 'checked' : ''}}>
                        </span>
                        <span style="margin-left: -5px">
                            {{ $caste->name ?? '' }}
                        </span>
                    </div>
                </label>
            </div>
        @endforeach
    @endforeach
