<div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16">
    <!-- Basic Details -->
    <div class="gt-panel gt-panel-default inViewProfile" id="editAccountSection">
        <div class="gt-panel-head">
            <span class="pull-left"><i class="fa fa-file"></i>Account Details({{ $prefix->name }} -
                {{ $user->id }})</span>
            <a class="pull-right btn gt-btn-orange" data-toggle="modal" data-backdrop ="static" data-keyboard="false"
                data-target="#dynamicUpdateModal" data-info={{ $user->id }} id="editAccountBtn">
                <i class="fas fa-pencil-alt fa-fw"></i>
                <font class="gt-margin-left-5">EDIT</font>
            </a>
            <a class="pull-right btn gt-btn-orange mr-5" data-toggle="modal" data-backdrop ="static"
                data-keyboard="false" data-target="#changeMobileModal" data-info={{ $user->id }}>
                <i class="fas fa-mobile-alt fa-fw"></i>{{ $user->mobile ?? '' }}
                <font class="gt-margin-left-5"> <i class="fas fa-pencil-alt fa-fw"></i>EDIT</font>
            </a>

            <x-change-mobile-verification :user="$user" />
            {{-- <x-edit-form-field-component :user="$user" :fields="$fields" :actionUrl="route('profile.update')" :id="$user->id" /> --}}
        </div>
        <div class="gt-panel-body">
            <div class="row">

                @foreach ($fields as $field)
                    @php
                        $fieldName = $field['name']; // Field to display, e.g., 'name'
                        $relation = $field['relation'] ?? null; // Direct relation, e.g., 'carrierDetails'
                        $nestedRelation = $field['nestedRelation'] ?? null; // Nested relation, e.g., 'countries'

                    @endphp
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                        <div class="row">
                            <div class="col-xs-6">
                                {{ $field['label'] }} :
                            </div>
                            <div class="col-xs-10">
                                @if ($relation && $nestedRelation)
                                    @if (isset($user->$relation) && isset($user->$relation->$nestedRelation))
                                        <b id="{{ $field['id'] }}">
                                            {{ $user->$relation->$nestedRelation->$fieldName ?? 'N/A' }}
                                        </b>
                                    @else
                                        <b id="{{ $field['id'] }}">N/A</b>
                                    @endif
                                @elseif ($relation)
                                    @if (isset($user->$relation) && isset($user->$relation->$fieldName))
                                        <b id="{{ $field['id'] }}">
                                            {{ $user->$relation->$fieldName ?? 'N/A' }}
                                        </b>
                                    @else
                                        <b id="{{ $field['id'] }}">N/A</b>
                                    @endif
                                @elseif (isset($user->$fieldName))
                                    <b id="{{ $field['id'] }}">
                                        {{ $user->$fieldName }}
                                    </b>
                                @else
                                    <b id="{{ $field['id'] }}">N/A</b>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                    <div class="row">
                        <div class="col-xs-6">
                            Last Login :
                        </div>
                        <div class="col-xs-10">
                            <b id="{{ $field['id'] }}">
                                12-Apr-2024, 12:05:45 Am
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. Basic Details -->
    <div id="accountDetailsAlert"></div>
</div>
