<div class="gt-panel gt-panel-default" id="editContactSection">
    <div class="gt-panel-head">
        <span class="pull-left">
            <i class="fa fa-book"></i>Contact Information
        </span>
        <a class="pull-right btn gt-btn-orange" id="editContactBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">EDIT</font>
        </a>
    </div>

    <div class="gt-panel-body">
        <div class="row">
            @php
                $fields = config('formFields.contactDetails');
              
            @endphp
           @foreach ($fields as $field)
           <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
               <div class="row">
                   <div class="col-xs-6">{{ $field['label'] }}:</div>
                   @if ($field['name'] === 'address')
                       <div class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16">
                           <b id="{{ $field['id'] ?? null }}">
                               @php
                                   $fieldName = $field['name'];
                               @endphp
                               {{ $user->contactDetails->{$fieldName} ?? 'N/A ' }}
                           </b>
                       </div>
                   @else
                       <div class="col-xs-10">
                           <b id="{{ $field['id'] ?? null }}">
                               @php
                                   $fieldName = $field['name'];
                               @endphp
                               {{ $user->contactDetails->{$fieldName} ?? 'N/A' }}
                           </b>
                       </div>
                   @endif
               </div>
           </div>
       @endforeach
       


        </div>
    </div>

</div>
