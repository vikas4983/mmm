@foreach ($searchResults as $searchResult)
    <li id="abcV{{ $searchResult->id }}" class="gt-panel gt-panel-default gt-panel-default gt-main-profile ">
        <a href="{{ route('profile', $searchResult->uuid) }}" target="_blank" class="gt-panel-head">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gridFullWidth gt-main-name" bis_skin_checked="1">
                    <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                        {{ $searchResult->name ?? 'NA' }}({{ $prefix->name ?? 'NA' }}-{{ $searchResult->matrimony_id ?? 'NA' }})
                        - {{ $searchResult->id }}
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
        <div class="gt-result-panel-footer" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden interest-btn-container"
                    bis_skin_checked="1">
                    @if (!empty($user))
                        @php
                            $invitationFound = false;
                            $isDecline = false;

                        @endphp

                        @foreach ($user->senderInvitation as $sender)
                            @if (
                                $sender->receiver_id === $searchResult->id &&
                                    $sender->is_sent === 1 &&
                                    $sender->is_friend === 1 &&
                                    $sender->is_decline === 0)
                                @php $invitationFound = true; @endphp
                                <div id="send-request{{ $searchResult->id }}">
                                    <a class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn"
                                        data-id="{{ $searchResult->id }}">
                                        <span>
                                            <i class="fas fa-check gt-margin-right-5"
                                                style="color: #28a745; transition: transform 0.3s;"></i>Friend
                                        </span>
                                    </a>
                                </div>
                            @elseif (
                                $sender->receiver_id === $searchResult->id &&
                                    $sender->is_sent === 1 &&
                                    $sender->is_friend === 0 &&
                                    $sender->is_decline === 0)
                                @php $invitationFound = true; @endphp
                                <div id="send-request{{ $searchResult->id }}">
                                    <a class="btn btn-default btn-block inResultSendMessageBtn decline-interest-btn-by-other"
                                        data-id="{{ $searchResult->id }}">
                                        <span style="color:#A0061C">
                                            <i class="fas fa-times gt-margin-right-5 text-danger"></i>Cancel
                                        </span>
                                    </a>
                                </div>
                            @elseif (
                                $sender->receiver_id === $searchResult->id &&
                                    $sender->is_sent === 1 &&
                                    $sender->is_friend === 0 &&
                                    $sender->is_decline === 1)
                                @php $invitationFound = true; @endphp
                                <div class="row" id="accept-by-me{{ $searchResult->id }}"
                                    style="display: flex; margin-left: 35px;">
                                    <a class="btn btn-default inResultSendMessageBtn " style="margin-right: 1.5rem"
                                        data-id="{{ $searchResult->id }}">
                                        <span style="color:#A0061C; margin-left:-1.5rem;">
                                            <i class="fas fa-exclamation-circle text-danger gt-margin-right-5"></i>Your
                                            request rejected
                                        </span>
                                    </a>
                                </div>
                            @endif
                        @endforeach

                        @foreach ($user->receiverInvitation as $receiver)
                            @if ($receiver->sender_id === $searchResult->id && $receiver->is_sent === 1 && $receiver->is_friend === 1)
                                @php $invitationFound = true; @endphp
                                <div id="send-request{{ $searchResult->id }}">
                                    <a class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn"
                                        data-id="{{ $searchResult->id }}">
                                        <span>
                                            <i class="fas fa-check gt-margin-right-5"
                                                style="color: #28a745; transition: transform 0.3s;"></i>Friend
                                        </span>
                                    </a>
                                </div>
                            @elseif (
                                $receiver->sender_id === $searchResult->id &&
                                    $receiver->is_sent === 1 &&
                                    $receiver->is_friend === 0 &&
                                    $receiver->is_decline === 0)
                                @php $invitationFound = true; @endphp
                                <div class="row" id="accept-by-me{{ $searchResult->id }}"
                                    style="display: flex; margin-left: 35px;">
                                    <a class="btn btn-default inResultSendMessageBtn accept-interest-btn-by-me"
                                        style="margin-left: 1.5rem" data-id="{{ $searchResult->id }}">
                                        <i class="fas fa-handshake gt-margin-right-5"></i>Accept <span
                                            style="color: #E47203">|</span>
                                    </a>
                                    <a class="btn btn-default inResultSendMessageBtn decline-interest-btn-by-me"
                                        style="margin-right: 1.5rem" data-id="{{ $searchResult->id }}">
                                        <span style="color:#A0061C; margin-left:-1.5rem;">
                                            <i class="fas fa-times gt-margin-right-5"></i>Decline
                                        </span>
                                    </a>
                                </div>
                            @elseif (
                                $receiver->sender_id === $searchResult->id &&
                                    $receiver->is_sent === 1 &&
                                    $receiver->is_friend === 0 &&
                                    $receiver->is_decline === 1)
                                @php $invitationFound = true; @endphp
                                <div class="row" id="accept-by-me{{ $searchResult->id }}"
                                    style="display: flex; margin-left: 35px;">
                                    <a class="btn btn-default inResultSendMessageBtn decline-btn "
                                        data-id="{{ $searchResult->id }}">
                                        <span
                                            style="color:#A0061C; text-align: center;border: none; padding: 7px 10px 7px 10px;border-radius: 5px;margin-bottom: 0px;font-size: 14px; background: none;transition: all 0.3sease">
                                            <i class="fas fa-times gt-margin-right-5"></i>Decline
                                        </span>
                                    </a>
                                </div>
                            @endif
                        @endforeach

                        @if (!$invitationFound)
                            <div id="send-request{{ $searchResult->id }}">
                                <a class="btn btn-default btn-block inResultSendMessageBtn send-interest-btn"
                                    data-id="{{ $searchResult->id }}">
                                    <i class="fas fa-heart gt-margin-right-5"></i>Interest
                                </a>
                            </div>
                        @endif
                    @endif

                    <style>
                        .fa-check:hover {
                            transform: scale(1.5);
                        }
                    </style>
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
                            <i class="fas fa-lock gt-margin-right-5"></i>Unblock
                        </a>
                    </div>
                @else
                    <div id="block-user{{ $searchResult->id }}"
                        class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                        <a data-id="{{ $searchResult->id }}"
                            class="btn btn-default btn-block inResultBlockBtn block-btn">
                            <i class="fas fa-lock gt-margin-right-5"></i>Block
                        </a>
                    </div>
                @endif
                <div id="view-contact{{ $searchResult->id }}"
                    class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                    <a data-id="{{ $searchResult->id }}"
                        class="btn btn-default btn-block inResultSendMessageBtn view-contact-btn">
                        <i class="fas fa-mobile-alt"></i> View Contact </a>
                </div>
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
                    if (response.action === 'takePlan') {
                        $("#expireMessage" + receiver_id).html(response.message);
                        setTimeout(function() {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        }, 2000);

                    }


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
        '.send-interest-btn, .cancel-interest-btn, .block-btn, .unBlock-btn, .view-contact-btn, .accept-interest-btn-by-me, .decline-interest-btn-by-me, .decline-btn',
        function() {
            const receiver_id = $(this).data('id');
            const sendInterest = $(this).hasClass('send-interest-btn');
            const cancelInterest = $(this).hasClass('cancel-interest-btn');
            const blockUser = $(this).hasClass('block-btn');
            const unBlock = $(this).hasClass('unBlock-btn');
            const viewContact = $(this).hasClass('view-contact-btn');
            const acceptByMe = $(this).hasClass('accept-interest-btn-by-me');
            const declineByMe = $(this).hasClass('decline-interest-btn-by-me');
            const declined = $(this).hasClass('decline-btn');
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
                acceptByMe ?
                '/interest-accept-by-me' :
                declineByMe ?
                '/interest-decline-by-me' :
                declined ?
                '/declined' :
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
                    $("#accept-by-me" + receiver_id).html(response.button)
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
                if (response.action === 'acceptByMe') {
                    $("#success-alert" + receiver_id).html(response.message);
                    $("#accept-by-me" + receiver_id).html(response.button);

                }
                if (response.action === 'declineByMe') {
                    $("#success-alert" + receiver_id).html(response.message);
                    $("#accept-by-me" + receiver_id).html(response.button);

                }
                if (response.action === 'declined') {
                    $("#success-alert" + receiver_id).html(response.message);
                    $("#accept-by-me" + receiver_id).html(response.button);

                }
                if (response.action === 'takePlan') {
                    // $("body").append(response.html);
                    // $("#expireModal").modal("show");
                    $("#success-alert" + receiver_id).html(response.message);

                    setTimeout(function() {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    }, 2000);
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
            },
            error: function(xhr) {
                alert(xhr.responseJSON.message);
            },
        });

    }
</script>
