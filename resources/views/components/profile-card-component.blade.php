@foreach ($searchResults as $searchResult)
    <li class="gt-panel gt-panel-default gt-panel-default gt-main-profile">
        <a href="member-profile?view_id=IN38" target="_blank" class="gt-panel-head">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gridFullWidth gt-main-name" bis_skin_checked="1">
                    <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                        {{ $searchResult->name ?? 'NA' }}({{$prefix->name ?? 'NA'  }}-{{ $searchResult->matrimony_id ?? 'NA' }})
                    </h4>
                </div>
                <div class="col-xxl-11 col-xl-11 col-lg-11 col-xs-16 text-right gridHidden" bis_skin_checked="1">
                    <h5 class="gt-margin-top-5 gt-margin-bottom-0">
                        Register On: {{ $searchResult->created_at ?? 'NA' }} </h5>
                </div>
            </div>
        </a>

        <a href="member-profile?view_id=IN38" target="_blank" class="gt-result-panel-body">
            <div class="row gt-padding-bottom-15" bis_skin_checked="1">
                <div class="col-xxl-2 col-xl-2 col-xs-16 col-lg-3 gridFullWidth" bis_skin_checked="1">
                    <div class="thumbnail gt-margin-bottom-0" bis_skin_checked="1">
                        @if (isset($searchResult->images))
                            @foreach ($searchResult->images as $image)
                                @if ($image->dp_image === '1')
                                    <img src="{{ asset('storage/users/images/' . $image->name) }}"
                                        class="img-responsive gtFullWidth" alt="User Image">
                                @else
                                    <img src="{{ $searchResult->gender === 'male'
                                        ? asset('storage/users/images/male-default.jpg')
                                        : asset('storage/users/images/female-default.jpg') }}"
                                        class="img-responsive gtFullWidth" alt="User Image">
                                @endif
                            @endforeach
                        @else
                            <img src="{{ $searchResult->gender === 'male'
                                ? asset('storage/users/images/male-default.jpg')
                                : asset('storage/users/images/female-default.jpg') }}"
                                class="img-responsive gtFullWidth" alt="User Image">
                        @endif
                    </div>
                </div>
                <div class="col-xxl-14 col-xl-14 col-xs-16 col-lg-13 gt-margin-top-10 gridFullWidth"
                    bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="redirect" bis_skin_checked="1">
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7 ">Age :</label>
                                    <span class="col-xs-9">
                                        {{ $searchResult->basicDetails->age }}

                                    </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7 ">Height :</label>
                                    <span class="col-xs-9">
                                        {{ $searchResult->basicDetails->heights->name ?? '' }} </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden " bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Marital Status :</label>
                                    <span class="col-xs-9">
                                        {{ $searchResult->basicDetails->maritalStatus->name ?? '' }} </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden " bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Religion :</label>
                                    <span class="col-xs-9">
                                        {{ $searchResult->basicDetails->religions->name ?? '' }} </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Caste :</label>
                                    <span class="col-xs-9">
                                        {{ $searchResult->basicDetails->castes->name ?? '' }} </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0 ">
                                    <label class="col-xs-7 gridHidden">Location :</label>
                                    <span class="col-xs-9 gridFullWidth">
                                        {{ $searchResult->carrierDetails->location ?? '' }} </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Education :</label>
                                    <span class="col-xs-9">
                                        {{ $searchResult->carrierDetails->educations->education ?? '' }}</span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Mother Tongue :</label>
                                    <span class="col-xs-9">
                                        {{ $searchResult->basicDetails->motherTongues->name ?? '' }} </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Occupation :</label>
                                    <span class="col-xs-9">
                                        {{ $searchResult->carrierDetails->occupations->occupation ?? '' }} </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Income :</label>
                                    <span class="col-xs-9">
                                        {{ $searchResult->carrierDetails->incomes->income ?? '' }} </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <div class="gt-result-panel-footer" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                    <a href="composeMessages?user_id=IN38" class="btn btn-default btn-block inResultSendMessageBtn">
                        <i class="fas fa-envelope"></i> Send Message </a>
                </div>
                <div class="col-xxl-11 col-xl-11 col-lg-11 pull-right gridFullWidth" bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gt-margin-top-10 gridFullWidth"
                            bis_skin_checked="1">
                            <a title="Send Reminder" onclick="sendreminder(4);" id="reminder4"
                                class="btn gt-btn-orange btn-block">
                                <i class="fas fa-bell gt-margin-right-5"></i>Send Reminder </a>
                        </div>

                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-xs-16 gt-margin-top-10 gridHidden"
                            bis_skin_checked="1">
                            <a class="btn btn-default btn-block inResultBlockBtn gt-cursor addToblock-data"
                                id="IN38" title="Remove Blocklist">
                                <i class="fas fa-ban gt-margin-right-5"></i>Remove Blocklist </a>
                        </div>
                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-xs-16 gt-margin-top-10 gridHidden"
                            bis_skin_checked="1">
                            <a class="btn btn-default btn-block  inResultShortBtn gt-cursor 
                                   addToblock-link"
                                title="Remove From Shortlist" id="IN38">
                                <i class="fa fa-sort gt-margin-right-5"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
@endforeach
