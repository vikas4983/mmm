<div class="gt-panel gt-panel-default" id="editLifestyleSection">
    <div class="gt-panel-head">
        <span class="pull-left">
            <i class="fa fa-book"></i>Lifestyle Information
        </span>
        <a class="pull-right btn gt-btn-orange" id="editLifestyleBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">EDIT</font>
        </a>
    </div>

    <div class="gt-panel-body">
        <div class="row">
            @php
                $fields = config('formFields.editLifestyleDetails');
               
            @endphp
            @foreach ($fields as $field)
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                    <div class="row">
                        <div class="col-xs-6">{{ $field['label'] }}:</div>
                        <div class="col-xs-10">
                            <b id="{{ $field['id'] ?? null }}">
                                @php
                                    $relation = $field['relation'] ?? null;
                                    $fieldName = $field['name'];
                                @endphp
                                @if ($relation && isset($user->lifestyleDetails->{$relation}))
                                    @if (is_iterable($user->lifestyleDetails->{$relation}))
                                        @foreach ($user->lifestyleDetails->{$relation} as $relatedItem)
                                            {{ $relatedItem->name ?? 'N/A' }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    @else
                                        {{ $user->lifestyleDetails->{$relation}->name ?? 'N/A' }}
                                    @endif
                                @else
                                    @if (is_array($user->lifestyleDetails->{$fieldName}))
                                        {{ implode(', ', $user->lifestyleDetails->{$fieldName}) }}
                                    @else
                                        {{ $user->lifestyleDetails->{$fieldName} ?? 'N/A' }}
                                    @endif
                                @endif
                            </b>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

</div>
