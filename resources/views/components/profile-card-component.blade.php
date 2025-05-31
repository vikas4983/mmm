

<style>
    .image-frame {
        position: relative;
        width: 100px;
        height: 120px;
        overflow: hidden;
        border-radius: 8px;
        border: 1px solid #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f9f9f9;
    }

    .main-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .eye-icon {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);

        display: flex;
        align-items: center;
        justify-content: center;

        background-color: rgba(255, 255, 255, 0.8);
        color: #E47203;
        width: 25px;
        height: 25px;
        border-radius: 50%;

        cursor: pointer;
        transition: background 0.3s ease;
    }

    .eye-icon:hover {
        background-color: rgba(228, 114, 3, 0.8);
        color: #fff;
    }

    .blurred-image {
        filter: blur(2px);
        transition: filter 0.3s ease;
    }

    .blurred-image-frame {
        position: relative;
        overflow: hidden;
    }

    .center-text {
        position: absolute;
        /* top: 50%; */
        /* left: 50%; */
        /* transform: translate(-50%, -50%); */
        /* background-color: rgba(0, 0, 0, 0.5); */
        color: #ffffff;
        /* padding: 5px 10px; */
        border-radius: 5px;
        font-size: 15px;
        margin-top: 3rem;

    }

    .friend-btn {
        position: relative;
        display: inline-block;
        text-align: center;
        color: #670311;
        transition: background-color 0.3s;
    }

    .friend-btn .hover-text {
        display: none;
    }

    .friend-btn:hover .default-text {
        display: none;
    }

    .friend-btn:hover .hover-text {
        display: inline;
    }
</style>

@php
    $user = Auth::user();
    $userPayment = $user->payments->last()->is_paid ?? 0;
    $sender = $user->senderInvitation;
    $receiver = $user->receiverInvitation;
    $friends = $sender->merge($receiver);
@endphp
@foreach ($searchResults as $searchResult)
    <li id="abcV{{ $searchResult->id }}" class="gt-panel gt-panel-default gt-panel-default gt-main-profile ">
        <a href="{{ route('profile', $searchResult->uuid) }}" target="_blank" class="gt-panel-head">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gridFullWidth gt-main-name" bis_skin_checked="1">

                    @foreach ($searchResult->userSettings as $nameSetting)
                        @if ($nameSetting->name === 1 && $userPayment === 'Active')
                            <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                                {{ $searchResult->name ?? 'NA' }}
                               
                            </h4>
                        @elseif ($nameSetting->name === 2)
                            @php
                                $isFriend = $friends->contains(function ($friend) use ($searchResult) {
                                    return ($friend->sender_id === $searchResult->id ||
                                        $friend->receiver_id === $searchResult->id) &&
                                        $friend->is_friend === 1;
                                });
                            @endphp
                            @if ($isFriend && $userPayment === 'Active')
                                <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                                    {{ $searchResult->name ?? 'NA' }}
                                    ({{ $prefix->name ?? 'NA' }}-{{ $searchResult->matrimony_id ?? 'NA' }})
                                    
                                </h4>
                            @else
                                <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                                    <i class="far fa-id-card" title="Visible to Friends Only"
                                        style="color: #3A7303"></i>
                                    {{ $prefix->name ?? 'NA' }}-{{ $searchResult->matrimony_id ?? 'NA' }}
                                    
                                </h4>
                            @endif
                        @elseif ($nameSetting->name === 0)
                            <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                                <i class="fas fa-lock" title="Name Hidden" style="color: #670311"></i>
                                {{ $prefix->name ?? 'NA' }}-{{ $searchResult->matrimony_id ?? 'NA' }}
                                
                            </h4>
                        @endif
                    @endforeach

                </div>
                <span id="success-alert{{ $searchResult->id }}"></span>

                {{-- <div class="col-xxl-11 col-xl-11 col-lg-11 col-xs-16 text-right gridHidden" bis_skin_checked="1">
                    <h5 class="gt-margin-top-5 gt-margin-bottom-0">
                        Register On: {{ $searchResult->created_at ?? 'NA' }} </h5>
                </div> --}}
            </div>
        </a>
        <div class="gt-result-panel-body">
            <div class="row gt-padding-bottom-15" bis_skin_checked="1">
                <div class="col-xxl-2 col-xl-2 col-xs-16 col-lg-3 gridFullWidth " bis_skin_checked="1">
                    <div>
                        @foreach ($searchResult->userSettings as $imageSetting)
                            @if ($imageSetting->image === 1 && $userPayment === 'Active')
                                @if ($searchResult->images->isNotEmpty())
                                    @foreach ($searchResult->images as $image)
                                        @if ($image->dp_image === '1')
                                            <a class="image-frame" data-toggle="modal"
                                                data-target="#photoModal{{ $image->id }}">
                                                <img src="{{ asset('storage/users/images/' . $image->name) }}"
                                                    class="img-responsive gtFullWidth main-image" alt="User Image">
                                                <div class="eye-icon viewPhotosModal">
                                                    <span
                                                        style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                        {{ $searchResult->images->count() ?? '' }}
                                                    </span>
                                                </div>
                                            </a>
                                            <x-modals.view-photos-modal-component :photos="$searchResult->images" />
                                        @endif
                                    @endforeach
                                @else
                                    <div class="image-frame">
                                        <img src="{{ $searchResult->gender === 'male'
                                            ? asset('storage/users/images/male-default.jpg')
                                            : asset('storage/users/images/female-default.jpg') }}"
                                            class="img-responsive gtFullWidth main-image" alt="User Image">
                                    </div>
                                @endif
                            @elseif($imageSetting->image === 2)
                                @php
                                    $isFriend = $friends->contains(function ($friend) use ($searchResult) {
                                        return ($friend->sender_id === $searchResult->id ||
                                            $friend->receiver_id === $searchResult->id) &&
                                            $friend->is_friend === 1;
                                    });
                                @endphp

                                @if ($isFriend && $userPayment === 'Active')
                                    @if ($searchResult->images->isNotEmpty())
                                        @foreach ($searchResult->images as $image)
                                            @if ($image->dp_image === '1')
                                                <a class="image-frame" data-toggle="modal"
                                                    data-target="#photoModal{{ $image->id }}">
                                                    <img src="{{ asset('storage/users/images/' . $image->name) }}"
                                                        class="img-responsive gtFullWidth main-image" alt="User Image">
                                                    <div class="eye-icon viewPhotosModal">
                                                        <span
                                                            style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                            {{ $searchResult->images->count() ?? '' }}
                                                        </span>

                                                    </div>
                                                </a>
                                                <x-modals.view-photos-modal-component :photos="$searchResult->images" />
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="image-frame">
                                            <img src="{{ $searchResult->gender === 'male'
                                                ? asset('storage/users/images/male-default.jpg')
                                                : asset('storage/users/images/female-default.jpg') }}"
                                                class="img-responsive gtFullWidth main-image" alt="User Image">
                                        </div>
                                    @endif
                                @else
                                    @if ($searchResult->images->isNotEmpty())
                                        @foreach ($searchResult->images as $image)
                                            @if ($image->dp_image === '1')
                                                <a class="image-frame blurred-image-frame">
                                                    <img src="{{ asset('storage/users/images/' . $image->name) }}"
                                                        class="img-responsive gtFullWidth main-image blurred-image"
                                                        alt="User Image">
                                                    <div class="eye-icon viewPhotosModal">
                                                        <span
                                                            style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                            {{ $searchResult->images->count() ?? '' }}
                                                        </span>

                                                    </div>
                                                    <div class="center-text" title="Show Only Friend">Only Friend</div>
                                                </a>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="image-frame">
                                            <img src="{{ $searchResult->gender === 'male'
                                                ? asset('storage/users/images/male-default.jpg')
                                                : asset('storage/users/images/female-default.jpg') }}"
                                                class="img-responsive gtFullWidth main-image" alt="User Image">
                                        </div>
                                    @endif
                                @endif
                            @elseif($imageSetting->image === 0)
                                @if ($searchResult->images->isNotEmpty())
                                    @foreach ($searchResult->images as $image)
                                        @if ($image->dp_image === '1')
                                            <a class="image-frame blurred-image-frame">
                                                <img src="{{ asset('storage/users/images/' . $image->name) }}"
                                                    class="img-responsive gtFullWidth main-image blurred-image"
                                                    alt="User Image">
                                                <div class="eye-icon viewPhotosModal">
                                                    <span
                                                        style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                        {{ $searchResult->images->count() ?? '' }}
                                                    </span>

                                                </div>
                                                <div class="center-text"><i class="fas fa-eye-slash"
                                                        title="Photo Hide"></i></div>
                                            </a>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="image-frame">
                                        <img src="{{ $searchResult->gender === 'male'
                                            ? asset('storage/users/images/male-default.jpg')
                                            : asset('storage/users/images/female-default.jpg') }}"
                                            class="img-responsive gtFullWidth main-image" alt="User Image">
                                    </div>
                                @endif
                            @else
                                <div class="image-frame">
                                    <img src="{{ $searchResult->gender === 'male'
                                        ? asset('storage/users/images/male-default.jpg')
                                        : asset('storage/users/images/female-default.jpg') }}"
                                        class="img-responsive gtFullWidth main-image" alt="User Image">
                                </div>
                            @endif
                        @endforeach


                    </div>
                </div>
                <a href="{{ route('profile', $searchResult->uuid) }}" target="_blank"
                    class="col-xxl-14 col-xl-14 col-xs-16 col-lg-13 gt-margin-top-10 gridFullWidth"
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
                </a>
            </div>
        </div>
        <div class="gt-result-panel-footer" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden interest-btn-container"
                    bis_skin_checked="1">
                    @if (!empty($user))
                        @php
                            $invitationFound = false;
                        @endphp
                        @foreach ($user->senderInvitation as $sender)
                            @if (
                                $sender->receiver_id === $searchResult->id &&
                                    $sender->is_sent === 1 &&
                                    $sender->is_friend === 1 &&
                                    $sender->is_decline === 0)
                                @php $invitationFound = true; @endphp
                                <div id="send-interest{{ $searchResult->id }}">
                                    <a class="btn btn-default btn-block inResultSendMessageBtn friend-btn"
                                        data-id="{{ $searchResult->id }}">

                                        <span class="default-text">
                                            <i class="fas fa-check gt-margin-right-5" style="color: #28a745;"></i>
                                            Friend
                                        </span>

                                        <span class="hover-text cancel-interest-btn"
                                            data-id="{{ $searchResult->id }}" style="color: #dc3545;">
                                            <i class="fas fa-times gt-margin-right-5"></i> Cancel
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
                                    <a class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn"
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
                                <div id="friend{{ $searchResult->id }}">
                                    <a class="btn btn-default btn-block inResultSendMessageBtn friend-btn"
                                        data-id="{{ $searchResult->id }}">
                                        <span class="default-text">
                                            <i class="fas fa-check gt-margin-right-5"
                                                style="color: #28a745; transition: transform 0.3s;"></i>
                                            Friend
                                        </span>
                                        <span class="hover-text decline-interest-by-me-btn"
                                            data-id="{{ $searchResult->id }}" style="color: #dc3545;">
                                            <i class="fas fa-times gt-margin-right-5"></i>
                                            Decline
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
                                    style="display: flex; margin-left: 3.5rem;">
                                    <a class="btn btn-default inResultSendMessageBtn accept-interest-by-me-btn"
                                        style="margin-left: 1.5rem" data-id="{{ $searchResult->id }}">
                                        <i class="fas fa-handshake gt-margin-right-5"></i>Accept <span
                                            style="color: #E47203">|</span>
                                    </a>
                                    <a class="btn btn-default inResultSendMessageBtn decline-interest-by-me-btn"
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
                                <div class="row" id="cancel-decline-by-me{{ $searchResult->id }}"
                                    style="display: flex; margin-left: 35px;">
                                    <a class="btn btn-default inResultSendMessageBtn cancel-decline-by-me-btn"
                                        data-id="{{ $searchResult->id }}">
                                        <span style="color: #A0061C; font-size: 14px;margin-left: 1.5rem; ">
                                            <i class="fas fa-times gt-margin-right-5"></i>Cancel Decline
                                        </span>
                                    </a>
                                </div>
                            @elseif (
                                $receiver->sender_id === $searchResult->id &&
                                    $receiver->is_sent === 1 &&
                                    $receiver->is_friend === 1 &&
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
                            <div id="send-interest{{ $searchResult->id }}">
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


















{{-- <script>
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
</script> --}}
