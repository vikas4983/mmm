@extends('layouts.frontend.main-master')
@section('title', 'Mangal Mandap - Profile')
@section('content')
    <style>
        .image-frame {
            position: relative;
            width: 250px;
            height: 260px;
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
            filter: blur(7px);
            transition: filter 0.3s ease;
        }

        .blurred-image-frame {
            position: relative;
            overflow: hidden;
        }

        .center-text {
            position: absolute;
            /* transform: translate(-50%, -50%); */
            /* background-color: rgba(0, 0, 0, 0.5); */
            color: #ffffff;
            /* padding: 5px 10px; */
            border-radius: 5px;
            font-size: 20px;
            margin-left: -0.2rem;
            margin-top: 16rem;
        }

        .friend-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 6px;
            width: 100px;
            background: white;
            border: 1px solid #ccc;
            /* Ensures border remains visible */
            transition: all 0.3s ease-in-out;
            position: relative;
        }

        /* Remove the black border when clicking but keep the default border */
        .friend-btn:focus,
        .friend-btn:active {
            outline: none !important;
            box-shadow: none !important;
            border: 1px solid #ccc !important;
            /* Retains the border */
        }

        /* Initially hide the cancel text */
        .cancel-text {
            opacity: 0;
            visibility: hidden;
            position: absolute;
        }

        /* When hovering, fade out the friend text and fade in the cancel text */
        .friend-btn:hover .friend-text {
            opacity: 0;
            visibility: hidden;
        }

        .friend-btn:hover .cancel-text {
            opacity: 1;
            visibility: visible;
        }
    </style>
    @php
        $user = Auth::user();
        $userPayment = $user->payments->last()->is_paid ?? 0;
        $sender = $user->senderInvitation;
        $receiver = $user->receiverInvitation;
        $friends = $sender->merge($receiver);
        $isFriend = $friends->contains(function ($friend) use ($profile) {
            return ($friend->sender_id === $profile->id || $friend->receiver_id === $profile->id) &&
                $friend->is_friend === 1;
        });
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-xxl-14 col-xxl-offset-1 col-xl-16 col-xl-offset-0 col-lg-16 col-md-16 col-sm-16">
                <h3 class="gt-text-orange">
                    {{ $prefix->name ?? 'NA' }}{{ $profile->matrimony_id ?? '' }} -
                    {{ $profile->name ?? '' }} </h3>
            </div>
        </div>
    </div>
    <div id="loaderID"></div>
    <div class="container gt-view-profile gt-margin-top-15">
        <div class="row">
            <div class="col-xxl-14 col-xxl-offset-1 col-xl-16 col-xl-offset-0 col-lg-16 col-md-16 col-sm-16">
                <div class="row">

                    <div
                        class="col-xxl-4 col-xxl-offset-0 col-xl-4 col-xl-offset-0 col-xs-16 col-sm-16 col-md-8 col-md-offset-4 col-lg-4 col-lg-offset-0">
                        @foreach ($profile->userSettings as $imageSetting)
                            @if ($imageSetting->image === 1 && $userPayment === 'Active')
                                @if ($profile->images->isNotEmpty())
                                    @foreach ($profile->images as $image)
                                        @if ($image->dp_image === '1')
                                            <a class="image-frame" data-toggle="modal"
                                                data-target="#photoModal{{ $image->id }}">
                                                <img src="{{ asset('storage/users/images/' . $image->name) }}"
                                                    class="img-responsive gtFullWidth main-image" alt="User Image">
                                                <div class="viewPhotosModal">
                                                    {{ $profile->images->count() }}
                                                </div>
                                            </a>
                                            <x-modals.view-photos-modal-component :photos="$profile->images" />
                                        @endif
                                    @endforeach
                                @else
                                    <div class="image-frame">
                                        <img src="{{ $profile->gender === 'male'
                                            ? asset('storage/users/images/male-default.jpg')
                                            : asset('storage/users/images/female-default.jpg') }}"
                                            class="img-responsive gtFullWidth main-image" alt="User Image">
                                    </div>
                                @endif
                            @elseif($imageSetting->image === 2)
                                @if ($isFriend && $userPayment === 'Active')
                                    @if ($profile->images->isNotEmpty())
                                        @foreach ($profile->images as $image)
                                            @if ($image->dp_image === '1')
                                                <a class="image-frame" data-toggle="modal"
                                                    data-target="#photoModal{{ $image->id }}">
                                                    <img src="{{ asset('storage/users/images/' . $image->name) }}"
                                                        class="img-responsive gtFullWidth main-image" alt="User Image">
                                                    <div class=" viewPhotosModal">
                                                        {{-- <span
                                                            style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                            {{ $profile->images->count() ?? '' }}
                                                        </span> --}}

                                                    </div>
                                                </a>
                                                <x-modals.view-photos-modal-component :photos="$profile->images" />
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="image-frame">
                                            <img src="{{ $profile->gender === 'male'
                                                ? asset('storage/users/images/male-default.jpg')
                                                : asset('storage/users/images/female-default.jpg') }}"
                                                class="img-responsive gtFullWidth main-image" alt="User Image">
                                        </div>
                                    @endif
                                @else
                                    @if ($profile->images->isNotEmpty())
                                        @foreach ($profile->images as $image)
                                            @if ($image->dp_image === '1')
                                                <a class="image-frame blurred-image-frame">
                                                    <img src="{{ asset('storage/users/images/' . $image->name) }}"
                                                        class="img-responsive gtFullWidth main-image blurred-image"
                                                        alt="User Image">
                                                    <div class="viewPhotosModal">
                                                        {{-- <span
                                                            style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                            {{ $profile->images->count() ?? '' }}
                                                        </span> --}}

                                                    </div>
                                                    <div class="center-text" title="Show Visible on Accept">Visible on
                                                        Accept</div>
                                                </a>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="image-frame">
                                            <img src="{{ $profile->gender === 'male'
                                                ? asset('storage/users/images/male-default.jpg')
                                                : asset('storage/users/images/female-default.jpg') }}"
                                                class="img-responsive gtFullWidth main-image" alt="User Image">
                                        </div>
                                    @endif
                                @endif
                            @elseif($imageSetting->image === 0)
                                @if ($profile->images->isNotEmpty())
                                    @foreach ($profile->images as $image)
                                        @if ($image->dp_image === '1')
                                            <a class="image-frame blurred-image-frame">
                                                <img src="{{ asset('storage/users/images/' . $image->name) }}"
                                                    class="img-responsive gtFullWidth main-image blurred-image"
                                                    alt="User Image">
                                                <div class=" viewPhotosModal">
                                                    {{-- <span
                                                        style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                        {{ $profile->images->count() ?? '' }}
                                                    </span> --}}

                                                </div>
                                                <div class="center-text"><i class="fas fa-eye-slash" title="Photo Hide"></i>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="image-frame">
                                        <img src="{{ $profile->gender === 'male'
                                            ? asset('storage/users/images/male-default.jpg')
                                            : asset('storage/users/images/female-default.jpg') }}"
                                            class="img-responsive gtFullWidth main-image" alt="User Image">
                                    </div>
                                @endif
                            @else
                                <div class="image-frame">
                                    <img src="{{ $profile->gender === 'male'
                                        ? asset('storage/users/images/male-default.jpg')
                                        : asset('storage/users/images/female-default.jpg') }}"
                                        class="img-responsive gtFullWidth main-image" alt="User Image">
                                </div>
                            @endif
                        @endforeach
                        <span class="gtMemAlbum">
                            {{ $profile->images->count() ?? '' }} </span>
                    </div>
                    <div class="col-xxl-12 col-xl-12 col-xs-16 col-sm-16 col-lg-12">
                        <div class="gt-panel gt-panel-default">
                            <div class="gt-panel-head">
                                <span class="pull-left">
                                    <i class="fa fa-file"></i>Basic Details </span>
                            </div>
                            <div class="gt-panel-body">
                                <div class="row">
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-7">Name:</div>
                                            <div class="col-xs-9">
                                                <b>{{ $profile->name ?? '' }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    @switch($profile->basicDetails->maritalStatus->name)
                                        @case('Never Married')
                                            <div
                                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                                <div class="row">
                                                    <div class="col-xs-7"> Marital Status: </div>
                                                    <div class="col-xs-9">
                                                        <b>
                                                            {{ $profile->basicDetails->maritalStatus->name ?? '' }} </b>
                                                    </div>
                                                </div>
                                            </div>
                                        @break

                                        @default
                                            <div
                                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                                <div class="row">
                                                    <div class="col-xs-7"> Marital Status: </div>
                                                    <div class="col-xs-9">
                                                        <b>
                                                            {{ $profile->basicDetails->maritalStatus->name ?? '' }} </b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                                <div class="row">
                                                    <div class="col-xs-7"> Children Living Status: </div>
                                                    <div class="col-xs-9">
                                                        <b>
                                                            {{ $profile->basicDetails->children ?? '' }} </b>
                                                    </div>
                                                </div>
                                            </div>
                                    @endswitch
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-7"> Mother Tongue : </div>
                                            <div class="col-xs-9">

                                                <b>
                                                    {{ $profile->basicDetails->motherTongues->name ?? '' }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-7"> Profile Created By : </div>
                                            <div class="col-xs-9">
                                                <b>
                                                    {{ $profile->profile_for ?? '' }} </b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gt-panel gt-panel-default gt-margin-top-10">
                            <div class="gt-panel-head">
                                <span class="pull-left">
                                    <i class="fa fa-star"></i>About Me </span>
                            </div>
                            <div class="gt-panel-body">
                                <div class="row">
                                    <div
                                        class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <article>
                                            <p style="word-wrap: break-word;">
                                                {{ $profile->carrierDetails->about_me ?? '' }}</p>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-group btn-group-justified gt-margin-bottom-15 gtMemProfileBtn" role="group">
                    @php
                        $matched = false;
                        $shortlist = false;

                    @endphp

                    @foreach ($user->senderInvitation as $sender)
                        @if (
                            $sender->receiver_id === $profile->id &&
                                $sender->is_sent === 1 &&
                                $sender->is_friend === 1 &&
                                $sender->is_decline === 0)
                            <div id="send-request{{ $profile->id }}" class="btn-group" role="group">
                                <a title="Send Interest" class="gt-cursor btn btn-default">
                                    <i class="fa fa-heart"></i>
                                    <p class="hidden-xs hidden-sm hidden-md"> Friend </p>
                                </a>
                            </div>
                            @php $matched = true; @endphp
                            @break

                        @elseif (
                            $sender->receiver_id === $profile->id &&
                                $sender->is_sent === 1 &&
                                $sender->is_friend === 0 &&
                                $sender->is_decline === 0)
                            <div id="send-request{{ $profile->id }}" class="btn-group" role="group">
                                <a title="Cancel Interest" class="gt-cursor btn btn-default cancel-interest-btn"
                                    data-id="{{ $profile->id }}">
                                    <i class="fa fa-heart"></i>
                                    <p class="hidden-xs hidden-sm hidden-md"> Cancel Express Interest </p>
                                </a>
                            </div>
                            @php $matched = true; @endphp
                            @break

                        @elseif (
                            $sender->receiver_id === $profile->id &&
                                $sender->is_sent === 1 &&
                                $sender->is_friend === 0 &&
                                $sender->is_decline === 1)
                            <div id="send-request{{ $profile->id }}" class="btn-group" role="group">
                                <a title="Rejected" class="gt-cursor btn btn-default " data-id="{{ $profile->id }}">
                                    <i class="fas fa-exclamation-circle text-danger gt-margin-right-5"></i>
                                    <p class="hidden-xs hidden-sm hidden-md"> Your
                                        request rejected </p>
                                </a>
                            </div>
                            @php $matched = true; @endphp
                            @break
                        @endif
                    @endforeach

                    @foreach ($user->receiverInvitation as $receiver)
                        @if (
                            $receiver->sender_id === $profile->id &&
                                $receiver->is_sent === 1 &&
                                $receiver->is_friend === 0 &&
                                $receiver->is_decline === 0)
                            <div id="accept-decline{{ $profile->id }}" class="btn-group" role="group">
                                <div style="display: flex; width: 100%;">
                                    <a title="Accept Interest" class="gt-cursor btn btn-default accept-interest-by-me-btn"
                                        data-id="{{ $profile->id }}"
                                        style="flex: 1;text-align: border-radius:0px; center; padding: 0px;height:64px;align-content: center;">
                                        <i class="fas fa-handshake" style="color:#499202;"></i>
                                        <span class="hidden-xs hidden-sm hidden-md">Accept</span>
                                    </a>

                                    <a title="Cancel Interest"
                                        class="gt-cursor btn btn-default decline-interest-by-me-btn"
                                        data-id="{{ $profile->id }}"
                                        style="flex: 1;text-align: center; border-radius:0px; padding: 0px;height: 64px;align-content: center;">
                                        <i class="fas fa-times-circle" style="color:#A0061C;"></i>
                                        <span class="hidden-xs hidden-sm hidden-md">Decline</span>
                                    </a>
                                </div>
                            </div>
                            @php $matched = true; @endphp
                            @break

                        @elseif(
                            $receiver->sender_id === $profile->id &&
                                $receiver->is_sent === 1 &&
                                $receiver->is_friend === 1 &&
                                $receiver->is_decline === 0)
                            <div id="profile-cancel-friend{{ $profile->id }}" class="btn-group" role="group">
                                <button id="friend-btn{{ $profile->id }}" title="You are Friend"
                                    class="gt-cursor btn btn-default friend-btn" data-id="{{ $profile->id }}">
                                    <span class="friend-text">
                                        <i class="fas fa-check-circle"></i>
                                        <p class="hidden-xs hidden-sm hidden-md">
                                            <span style="color: #499202;">Friend</span>
                                        </p>
                                    </span>
                                    <span class="cancel-text" title="Cancel Friend">
                                        <i class="fas fa-times-circle" style="color: red;"></i>
                                        <p class="hidden-xs hidden-sm hidden-md cancel-friend-btn"
                                            data-id="{{ $profile->id }}">
                                            Cancel Friend
                                        </p>
                                    </span>
                                </button>
                            </div>
                            @php $matched = true; @endphp
                            @break

                        @elseif(
                            $receiver->sender_id === $profile->id &&
                                $receiver->is_sent === 1 &&
                                $receiver->is_friend === 0 &&
                                $receiver->is_decline === 1)
                            <div class="btn-group btn-group-justified gt-margin-bottom-15 gtMemProfileBtn" role="group">
                                <div id="cancel-decline{{ $profile->id }}" class="btn-group" role="group">
                                    <a title="Cancel Decline Request"
                                        class="gt-cursor btn btn-default cancel-decline-by-me-btn"
                                        data-id="{{ $profile->id }}" style="margin-left: 1rem;">
                                        <i class="fas fa-times-circle"></i>
                                        <p class="hidden-xs hidden-sm hidden-md">
                                            <span style="color: #FF6D00;">Cancel Decline Request</span>
                                        </p>
                                    </a>
                                </div>
                            </div>
                            @php $matched = true; @endphp
                            @break
                        @endif
                    @endforeach
                    @if (!$matched)
                        <div id="send-request{{ $profile->id }}" class="btn-group" role="group">
                            <a title="Send Interest" class="gt-cursor btn btn-default send-interest-btn"
                                data-id="{{ $profile->id }}">
                                <i class="fa fa-heart"></i>
                                <p class="hidden-xs hidden-sm hidden-md"> Send Express Interest </p>
                            </a>
                        </div>
                    @endif

                    <div id="viewContact{{ $profile->id }}" class="btn-group" role="group">
                        <a title="View Contact Details" data-id="{{ $profile->id }}"
                            class="gt-cursor btn btn-default view-contact-btn"> <i class="fas fa-phone-alt"></i>
                            <p class="hidden-xs hidden-sm hidden-md"> View Contact Details </p>
                        </a>
                    </div>
                    @if (
                        !$user->blockedUser->contains('blocked_id', $profile->id) &&
                            !$profile->blockedUser->contains('blocked_id', $user->id))
                        <div id="block-user{{ $profile->id }}" class="btn-group" role="group">
                            <a class="btn btn-default gt-cursor block-btn" data-id="{{ $profile->id }}"
                                title="Add to Blocklist">
                                <i class="fa fa-ban"></i>
                                <p class="hidden-xs hidden-sm hidden-md"> Add to Blocklist </p>
                            </a>
                        </div>
                    @endif

                    @if ($user->shortlisted->contains('shortlisted_user_id', $profile->id))
                        <div id="remove-to-shorlist{{ $profile->id }}" class="btn-group" role="group">
                            <a class="btn btn-default gt-cursor remove-to-shortlist-btn" data-id="{{ $profile->id }}"
                                title="Add to Shortlist">
                                <i class="fas fa-heart-broken"></i>
                                <p class="hidden-xs hidden-sm hidden-md" style="color: #499202"> Remove from Shortlist
                                </p>
                            </a>
                        </div>
                        @php
                            $shortlist = true;
                        @endphp
                    @elseif($user->shortlistedUser->contains('shortlisted_by_id', $profile->id))
                        <div id="add-to-shorlist{{ $profile->id }}" class="btn-group" role="group">
                            <a class="btn btn-default gt-cursor remove-to-shortlist-btn" data-id="{{ $profile->id }}"
                                title="Add to Shortlist">
                                <i class="fas fa-bookmark"></i>
                                <p class="hidden-xs hidden-sm hidden-md" style="color: #499202"> You are shortlisted</p>
                            </a>
                        </div>
                        @php
                            $shortlist = true;
                        @endphp
                    @endif
                    @if (!$shortlist)
                        <div id="add-to-shortlist{{ $profile->id }}" class="btn-group" role="group">
                            <a class="btn btn-default gt-cursor add-to-shortlist-btn" data-id="{{ $profile->id }}"
                                title="Add to Shortlist">
                                <i class="fas fa-star"></i>
                                <p class="hidden-xs hidden-sm hidden-md"> Add to Shortlist </p>
                            </a>
                        </div>
                    @endif

                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fas fa-running"></i>Physical Attributes </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Height : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->basicDetails->heights->name ?? '' }}

                                        </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Weight : </div>
                                    <div class="col-xs-10">
                                        <b> {{ $profile->lifestyleDetails->weight ?? '' }}</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Body type : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->bodyTypes->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Complexion : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->complextions->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Physical status : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->physicalStatus->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Blood Group : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->bloodgroups->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Blood Group : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->bloodgroups->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Hiv+ : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->hiv ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Own House : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->own_house ?? 'NA' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Own Car : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->own_car ?? 'NA' }} </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-book"></i>Religion Information </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Religion : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->basicDetails->religions->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Caste : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->basicDetails->castes->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Willing To marry in other caste? : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->basicDetails->other_caste_marriage ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Speak Language : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->speaklanguages->name ?? 'NA' }} </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-university"></i>Education / Profession Information </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Highest Education : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->educations->education ?? '' }}
                                        </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Additional Degree : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            MCA
                                        </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Employed in : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->employees->employee ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Occupation : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->occupations->occupation ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Annual Income : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->incomes->income ?? '' }}

                                        </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-users"></i>Family Details </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Family Type : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->familyTypes->name ?? '' }}</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Family Status : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->familystatus->name ?? '' }}</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Family Value : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->familyValues->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Father Occupation : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->fatherOccupations->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Mother Occupation : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->motherOccupations->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> No. of Brothers : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->brother ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Married Brothers : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->brother_married ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> No. of Sisters : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->sister ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Married Sisters : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->sister_married ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                @php
                    $user = Auth::user();
                    $userPayment = $user->payments->last()->is_paid ?? 0;
                    $sender = $user->senderInvitation;
                    $receiver = $user->receiverInvitation;
                    $friends = $sender->merge($receiver);
                    $isFriend = $friends->contains(function ($friend) use ($profile) {
                        return ($friend->sender_id === $profile->id || $friend->receiver_id === $profile->id) &&
                            $friend->is_friend === 1;
                    });

                @endphp
                @foreach ($profile->userSettings as $horoscopeSetting)
                    @if ($horoscopeSetting->horoscope === 1 && $userPayment === 'Active')
                        <div class="gt-panel gt-panel-default">
                            <div class="gt-panel-head">
                                <span class="pull-left">
                                    <i class="fas fa-moon"></i>Horoscope Information </span>
                            </div>
                            <div class="gt-panel-body">
                                <div class="row">
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-6"> Manglik : </div>
                                            <div class="col-xs-10">
                                                <b>
                                                    {{ $profile->horoscopeDetails->manglik ?? '' }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-6"> Star : </div>
                                            <div class="col-xs-10">
                                                <b>
                                                    {{ $profile->horoscopeDetails->rashies->name ?? '' }}

                                                </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-6"> Birth Time : </div>
                                            <div class="col-xs-10">
                                                <b>
                                                    {{ $profile->horoscopeDetails->time_of_birth ?? '' }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-6"> Birth Place : </div>
                                            <div class="col-xs-10">
                                                <b>
                                                    {{ $profile->horoscopeDetails->cities->city ?? '' }} </b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($horoscopeSetting->horoscope === 2)
                        @if ($isFriend && $userPayment === 'Active')
                            <div class="gt-panel gt-panel-default">
                                <div class="gt-panel-head">
                                    <span class="pull-left">
                                        <i class="fas fa-moon"></i>Horoscope Information </span>
                                </div>
                                <div class="gt-panel-body">
                                    <div class="row">
                                        <div
                                            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                            <div class="row">
                                                <div class="col-xs-6"> Manglik : </div>
                                                <div class="col-xs-10">
                                                    <b>
                                                        {{ $profile->horoscopeDetails->manglik ?? '' }} </b>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                            <div class="row">
                                                <div class="col-xs-6"> Star : </div>
                                                <div class="col-xs-10">
                                                    <b>
                                                        {{ $profile->horoscopeDetails->rashies->name ?? '' }}

                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                            <div class="row">
                                                <div class="col-xs-6"> Birth Time : </div>
                                                <div class="col-xs-10">
                                                    <b>
                                                        {{ $profile->horoscopeDetails->time_of_birth ?? '' }} </b>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                            <div class="row">
                                                <div class="col-xs-6"> Birth Place : </div>
                                                <div class="col-xs-10">
                                                    <b>
                                                        {{ $profile->horoscopeDetails->cities->city ?? '' }} </b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="gt-panel gt-panel-default">
                                <div class="gt-panel-head">
                                    <span class="pull-left">
                                        <i class="fas fa-moon"></i>Horoscope Information : <i
                                            class="fas fa-lock text-center" style="color: #670311"
                                            title="Visible on Friend"></i> </span>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="gt-panel gt-panel-default">
                            <div class="gt-panel-head">
                                <span class="pull-left">
                                    <i class="fas fa-moon"></i>Horoscope Information : <i class="fas fa-eye-slash"
                                        style="color: #670311" title="Hide by User"></i> </span>
                            </div>
                        </div>
                    @endif
                @endforeach


                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-map-marker"></i>Location Information </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Country : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->countries->country ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> State : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->states->state ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> City : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->cities->city ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fas fa-utensils"></i>Habits And Hobbies </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Eating Habits : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->dietary_habit ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Drinking Habits : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->drinking_habit ?? '' }}</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Smoking Habits : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->smoking_habit ?? '' }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 inPartnerDivider">
                    <div class="row">
                        <h4 class="text-center gt-bg-green pt-15 pb-15">
                            <i class="fas fa-heart gt-margin-right-10"></i>Partner Preference
                        </h4>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 col-xl-16">
                    <div class="row">
                        <div class="col-xs-3">

                            <img src="my_photos/watermark.php?image=1695538456.jpg&watermark=watermark.png"
                                title="Surbhi Sharma" alt="MM2" class="img-thumbnail">
                        </div>
                        <div class="col-xs-10 text-center gt-margin-top-30">
                            <h4>
                                Your profile matches with <b>3 / 19</b> of <b class="gt-text-orange">shubhi's</b>
                                preferences!
                            </h4>
                        </div>
                        <div class="col-xs-3">
                            <a class="btn btn-primary btn-lg thumbnail" data-toggle="modal" data-target="#myModal5"
                                onClick="photoview('MM11');">
                                <img src="my_photos/watermark.php?image=1695554242.png&watermark=watermark.png"
                                    class="img-responsive gtFullWidth" title="shubhi khanna" title="shubhi khanna"
                                    alt="MM11">



                                <span class="gtMemAlbum">
                                    1 </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 gt-margin-top-15">
                    <h3 class="pb-15 inBorderExtraLightGrey font-15">
                        <i class="fa fa-file gt-margin-right-10 gt-text-orange"></i>Basic Preferences
                    </h3>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13">
                                    <b>Marital Status :</b>
                                </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style="">
                                    <i class="fa fa-check gt-text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Age :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                35&nbsp;&nbsp;Years &nbsp;&nbsp;&nbsp;&nbsp;To &nbsp;&nbsp;&nbsp;&nbsp;
                                47&nbsp;&nbsp;Years
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-match" style="">
                                    <i class="fa fa-check gt-text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13">
                                    <b>Height :</b>
                                </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                4ft 8in - 142cm &nbsp;&nbsp;&nbsp;&nbsp;To &nbsp;&nbsp;&nbsp;&nbsp;
                                4ft 9in - 144cm
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style="">
                                    <i class="fa fa-check gt-text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13">
                                    <b>Eating Habits :</b>
                                </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                Not Available </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"><b>Smoking Habits :</b></label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                Not Available </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""><i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Drinking Habits :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                Not Available </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""><i
                                        class="fa fa-check gt-text-white"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Physical status :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                No </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""><i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 gt-margin-top-15">
                    <h3 class="pb-15 inBorderExtraLightGrey font-15">
                        <i class="fa fa-university gt-margin-right-10 gt-text-orange"></i>Education /
                        Profession Preference
                    </h3>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Education :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Annual Income:</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">

                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Employed in :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                No </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Occupation :</b> </label>
                            </div>
                            <div class="col-xxl-8 col-xs-11 font-13 pt-10 inThemeGreen">
                                Not Available </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 gt-margin-top-15">
                    <h3 class="pb-15 inBorderExtraLightGrey font-15">
                        <i class="fa fa-book gt-margin-right-10 gt-text-orange"></i>Religion Preference
                    </h3>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Religion :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""><i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Caste :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b> :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                Not Available </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Mother Tongue :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Star :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                Not Available
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 gt-margin-top-15">
                    <h3 class="pb-15 inBorderExtraLightGrey font-15">
                        <i class="fa fa-map-marker gt-margin-right-10 gt-text-orange"></i>Location
                        Preference
                    </h3>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"><b>Country :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>State :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                No </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>City :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                No </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 gt-margin-top-15">
                    <h3 class="pb-15 inBorderExtraLightGrey font-15">
                        <i class="fa fa-star gt-margin-right-10 gt-text-orange"></i>Partner Expectation
                    </h3>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-16 col-xs-16">
                            <div class="col-xxl-3 col-xs-5 pt-5">
                                <label class="font-13"> <b>Expectations :</b> </label>
                            </div>
                            <div class="col-xxl-13 col-xs-11 font-13 pt-10 inThemeGreen">
                                <p style="word-wrap: break-word;">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- For Photo Album Display--->
    <!-- For Photo Album Display--->
    <div class="container gt-margin-top-10">
    </div>
@endsection
