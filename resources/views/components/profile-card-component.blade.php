@foreach ($searchResults as $searchResult)
    <li id="abcV{{ $searchResult->id }}" class="gt-panel gt-panel-default gt-panel-default gt-main-profile ">
        <a href="{{ route('profile', $searchResult->uuid) }}" target="_blank" class="gt-panel-head">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gridFullWidth gt-main-name" bis_skin_checked="1">
                    <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                        {{ $searchResult->name ?? 'NA' }}({{ $prefix->name ?? 'NA' }}-{{ $searchResult->matrimony_id ?? 'NA' }})
                    </h4>
                </div>
                <span id="success-alert{{ $searchResult->id }}"></span>
                {{-- <div class="col-xxl-11 col-xl-11 col-lg-11 col-xs-16 text-right gridHidden" bis_skin_checked="1">
                    <h5 class="gt-margin-top-5 gt-margin-bottom-0">
                        Register On: {{ $searchResult->created_at ?? 'NA' }} </h5>
                </div> --}}
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
                                        {{ $searchResult->basicDetails->age ?? '' }}

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
        <style>

        </style>
        <div class="gt-result-panel-footer" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden interest-btn-container"
                    bis_skin_checked="1">
                    @if (
                        !empty($user) &&
                            !empty($user->invitationDetails) &&
                            $user->invitationDetails->where('receiver_id', $searchResult->id)->where('is_sent', 1)->isNotEmpty())
                        <div id="send-request{{ $searchResult->id }}">
                            <a class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn"
                                data-id="{{ $searchResult->id }}">
                                <span style="color:#A0061C">
                                    <i class="fas fa-times gt-margin-right-5 text-danger"></i> Cancel
                                </span>
                            </a>
                        </div>
                    @else
                        <div id="send-request{{ $searchResult->id }}">
                            <a class="btn btn-default btn-block inResultSendMessageBtn send-interest-btn"
                                data-id="{{ $searchResult->id }}">
                                <i class="fas fa-heart gt-margin-right-5"></i> Interest
                            </a>
                        </div>
                    @endif
                </div>
                <div id="send-message{{ $searchResult->id }}"
                    class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                    <a data-id="{{ $searchResult->id }}"
                        class="btn btn-default btn-block inResultSendMessageBtn send-message-modal ">
                        <i class="fas fa-envelope"></i> Send Message</a>
                </div>

                @if (!empty($user) && !empty($user->blockedUser->contains('blocked_id', $searchResult->id)))
                    <div id="block-user{{ $searchResult->id }}"
                        class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                        <a data-id="{{ $searchResult->id }}"
                            class="btn btn-default btn-block inResultBlockBtn unBlock-btn">
                            <i class="fas fa-lock gt-margin-right-5"></i> Unblock
                        </a>
                    </div>
                @else
                    <div id="block-user{{ $searchResult->id }}"
                        class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                        <a data-id="{{ $searchResult->id }}"
                            class="btn btn-default btn-block inResultBlockBtn block-btn">
                            <i class="fas fa-lock gt-margin-right-5"></i> Block
                        </a>
                    </div>
                @endif

                {{-- <div id="block-user{{ $searchResult->id }}"
                    class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                    <a data-id="{{ $searchResult->id }}"
                        class="btn btn-default btn-block inResultBlockBtn block-btn">
                        <i class="fas fa-lock gt-margin-right-5"></i> Block </a>
                </div> --}}
                {{-- <div id="block-user-{{ $searchResult->id }}"
                    class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                    <a data-id="{{ $searchResult->id }}"
                        class="btn btn-default btn-block inResultBlockBtn unBlock-btn">
                        <i class="fas fa-lock gt-margin-right-5"></i> Unblock </a>
                </div> --}}
                <div id="view-contact{{ $searchResult->id }}"
                    class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                    <a data-id="{{ $searchResult->id }}"
                        class="btn btn-default btn-block inResultSendMessageBtn view-contact-btn">
                        <i class="fas fa-mobile-alt"></i> View Contact </a>
                </div>
                {{-- <div class="col-xxl-11 col-xl-11 col-lg-11 pull-right gridFullWidth" bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gt-margin-top-10 gridFullWidth"
                            bis_skin_checked="1">
                            <a title="Send Reminder" onclick="sendreminder(4);" id="reminder4"
                                class="btn gt-btn-orange btn-block">
                                <i class="fas fa-bell gt-margin-right-5"></i>Send Interest </a>
                        </div>

                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-xs-16 gt-margin-top-10 gridHidden"
                            bis_skin_checked="1">
                            <a class="btn btn-default btn-block inResultBlockBtn gt-cursor addToblock-data"
                                id="IN38" title="Remove Blocklist">
                                <i class="fas fa-ban gt-margin-right-5"></i> Block </a>
                        </div>
                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-xs-16 gt-margin-top-10 gridHidden"
                            bis_skin_checked="1">
                            <a class="btn btn-default btn-block  inResultShortBtn gt-cursor 
                                   addToblock-link"
                                title="Remove From Shortlist" id="IN38">
                                <i class="fa fa-sort gt-margin-right-5"></i>View Contact </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </li>
@endforeach
<x-modals.message-modal-component :searchResults="$searchResults" />
<script>
    $(document).ready(function() {
        $('.send-message-modal').click(function(e) {
            e.preventDefault();
            let receiver_id = $(this).data('id');
            console.log("Receiver ID:", receiver_id);
            let modal = $('#messageModal' + receiver_id);
            if (modal.length) {
                modal.modal('show');
            } else {
                console.error("Modal not found for ID:", receiver_id);
            }
        });

        $(document).on('submit', '.send-message-form', function(e) {
            e.preventDefault();

            let form = $(this);
            let receiver_id = form.attr('data-id');
            let message = form.find('textarea[name="message"]').val().trim();

            if (!receiver_id) {
                alert("Error: Receiver ID is missing!");
                return;
            }

            if (!message) {
                alert("Please enter a message.");
                return;
            }

            $.ajax({
                url: '/send-message',
                method: 'POST',
                data: {
                    receiver_id: receiver_id,
                    message: message,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.action === 'sendMessage') {
                        $("#successMessage" + receiver_id).html(response.message);
                    }
                    $("#message" + receiver_id).val('');
                    setTimeout(function() {
                        $("#successMessage" + receiver_id).html("");
                    }, 2000);
                    if (response.action === 'expirePlan') {
                        $("#expireMessage" + receiver_id).html(response.message);
                        setTimeout(function() {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        }, 2000);

                    }
                    // $("#message" + receiver_id).val('');
                    // setTimeout(function() {
                    //     $("#successMessage" + receiver_id).html("");
                    // }, 2000);

                },
                error: function(xhr) {
                    console.error("AJAX Error:", xhr.responseText);
                    alert("Error: " + (xhr.responseJSON?.message ||
                        "Something went wrong!"));
                }
            });
        });


        $(document).on('click', '.modal-close-btn', function() {
            $(this).closest('.modal').modal('hide');
        });
    });
</script>
<script>
    $(document).on('click',
        '.send-interest-btn, .cancel-interest-btn, .block-btn, .unBlock-btn, .view-contact-btn',
        function() {
            const receiver_id = $(this).data('id');
            const sendInterest = $(this).hasClass('send-interest-btn');
            const cancelInterest = $(this).hasClass('cancel-interest-btn');
            const blockUser = $(this).hasClass('block-btn');
            const unBlock = $(this).hasClass('unBlock-btn');
            const viewContact = $(this).hasClass('view-contact-btn');

            let action = sendInterest ?
                '/send-interest' :
                cancelInterest ?
                '/cancel-interest' :
                blockUser ?
                '/block-user' :
                unBlock ?
                '/unblock-user' :
                viewContact ?
                '/view-contact' :
                '';

            sendRequest(receiver_id, action);

        });

    function sendRequest(receiver_id, action) {
        $.ajax({
            url: action,
            method: 'POST',
            data: {
                receiver_id: receiver_id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.action === 'sendInterest') {
                    $("#success-alert" + receiver_id).html(response.message);
                    $("#send-request" + receiver_id).html(response.button)
                }
                if (response.action === 'blockUser') {
                    $("#success-alert" + receiver_id).html(response.message);
                    $("#block-user" + receiver_id).html(response.button);
                }
                if (response.action === 'block') {
                    $("#success-alert" + receiver_id).html(response.message);
                    // $("#block-user" + receiver_id).html(response.button);
                }
                if (response.action === 'viewContact') {
                    //$("#success-alert" + receiver_id).html(response.message);
                    $("body").append(response.html);
                    $("#contactModal" + receiver_id).modal("show");
                    
                }
                if (response.action === 'exceededContact') {
                    $("#success-alert" + receiver_id).html(response.message);
                   setTimeout(function() {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        }, 2000);

                   }
                if (response.action === 'hide') {
                    $("#success-alert" + receiver_id).html(response.message);
                    //  $("body").append(response.html); 
                    //  $("#contactModal" + receiver_id).modal("show");
                }
                if (response.action === 'friend') {
                    $("#success-alert" + receiver_id).html(response.message);
                    //  $("body").append(response.html); 
                    //  $("#contactModal" + receiver_id).modal("show");
                }
                if (response.action === 'expirePlan') {
                    $("body").append(response.html);
                    $("#expireModal").modal("show");
                    if (response.action === 'expirePlan') {
                        setTimeout(function() {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        }, 2000);

                    }
                }
               

                // }
            },
            error: function(xhr) {
                alert(xhr.responseJSON.message);
            },
        });

    }
</script>
