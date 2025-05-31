@extends('layouts.frontend.main-master')
@section('title', 'Mangal Mandap - Access Controll')
@section('content')
    <style>
        .image-frame {
            position: relative;
            display: inline-block;
        }

        .profile-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .circle-number {
            position: absolute;
            top: 61%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 17px;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 50%;
            padding: 7px;
            margin-top: 2rem;
        }
    </style>
    <div class="container gt-margin-top-20">
        <div class="row">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-13 col-xxl-offset-3 col-xl-13 col-xl-offset-3 text-center" bis_skin_checked="1">
                    <h2 class="inPageTitle fontMerriWeather inThemeOrange">
                        <span class="gt-font-weight-300">Message</span>
                    </h2>
                    <p class="inPageSubTitle">Check all your messages from here.</p>
                </div>
                <div class="col-xxl-3 col-xl-4 gt-left-opt-msg" bis_skin_checked="1">
                    <a class="btn gt-btn-green btn-block hidden-xxl hidden-xl gt-margin-bottom-20" role="button"
                        data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                        aria-controls="collapseExample">
                        Options <i class="fa fa-angel-down"></i>
                    </a>
                </div>
                <div class="col-xxl-13 col-xl-12 col-xs-16 col-sm-16 col-md-16 gt-msg-board" id="test-list"
                    bis_skin_checked="1">
                    <div class="col-xxl-16 col-xl-16 col-xs-16 col-sm-16 col-md-16 gt-msg-top-strip" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            @include('alerts.alert')
                            <div class="col-xxl-5 col-xl-6 col-md-16 col-lg-6 pull-right" bis_skin_checked="1">
                                <div class="input-group" bis_skin_checked="1">
                                    <input type="text" class="gt-form-control flat search"
                                        placeholder="Search Message By Matri Id">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default gt-btn-lg flat" type="button"><i
                                                class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (count($users) > 0)
                        <div class="content4 col-xs-16 col-xxl-16 col-xl-16 gt-msg-dash" bis_skin_checked="1">
                            <div id="msg_result_data" class="row" bis_skin_checked="1">
                                <div class="d-flex flex-wrap mb-3 fw-bold">
                                    <div class="col-xxl-2 col-xs-4 col-sm-4 col-md-4 col-lg-2">
                                        <strong> Image </strong>
                                    </div>

                                    <div class="col-xxl-4 col-xs-10 col-sm-10 col-md-8 col-lg-4">
                                        <strong> Name </strong>
                                    </div>

                                    <div class="col-xxl-6 col-xs-16 col-sm-16 col-md-16 col-lg-6">
                                        <strong> Message </strong>
                                    </div>

                                    <div class="col-xxl-4 col-xs-16 col-sm-16 col-md-16 col-lg-4">
                                        <strong> Date </strong>
                                    </div>
                                </div>
                                @foreach ($users as $user)
                                    <ul class="list">
                                        <li class="d-flex flex-wrap align-items-start mb-3" style="display: flex;">
                                            <div class="col-xxl-2 col-xs-4 col-sm-4 col-md-4 col-lg-2"
                                                style="display: flex; flex-direction: column; align-items: center; text-align: center;">


                                                <a href="{{ route('profile', $user->uuid ?? 'NA') }}" title="View Profile">
                                                    <div class="user-name"
                                                        style="font-size: 14px; font-weight: 600; color: #FF7E00;">
                                                        {{ $prefix->name ?? 'NA' }}{{ $user->id ?? 'NA' }}
                                                    </div>
                                                </a>
                                                @foreach ($user->images as $image)
                                                    @if ($image->dp_image === '1')
                                                        <div class="image-frame"
                                                            style="position: relative; display: inline-block;">
                                                            <a data-toggle="modal"
                                                                data-target="#photoModal{{ $image->id }}">
                                                                <img src="{{ asset('storage/users/images/' . $image->name) }}"
                                                                    class="profile-circle" alt="User Image"
                                                                    style="margin-bottom: 5px;">
                                                                <span
                                                                    class="circle-number">{{ $user->images->count() }}</span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                @if ($user->images->count() === 0)
                                                    <div class="image-frame"
                                                        style="position: relative; display: inline-block;">
                                                        <img src="{{ $user->gender === 'male'
                                                            ? asset('storage/users/images/male-default.jpg')
                                                            : asset('storage/users/images/female-default.jpg') }}"
                                                            class="profile-circle" alt="User Image"
                                                            style="margin-bottom: 5px;">
                                                    </div>
                                                @endif
                                                <x-modals.view-photos-modal-component :photos="$user->images" />
                                            </div>
                                            <div class="col-xxl-4 col-xs-10 col-sm-10 col-md-8 col-lg-4"
                                                style="display: flex; align-items: center;">
                                                <a data-toggle="modal" data-target="#messageModal{{ $user->id }}">
                                                    <i class="fa fa-envelope gt-margin-right-10 sendMessage"
                                                        style="margin-right: 10px; color:#FF7E00" title="View Message"></i>
                                                </a>
                                                <a data-toggle="modal" data-target="#messageModal{{ $user->id }}"
                                                    title="Name" style="text-decoration: none;">
                                                    <span class="name">{{ $user->name ?? 'NA' }}</span>
                                                </a>
                                            </div>
                                            <div class="col-xxl-6 col-xs-16 col-sm-16 col-md-16 col-lg-6 gt-margin-top-8">
                                                <a data-toggle="modal" data-target="#messageModal{{ $user->id }}"
                                                    title="Message">
                                                    <h4 class="name1">
                                                        {{ Str::limit($user->receiverMessage->last()->message ?? 'NA', 35) }}
                                                    </h4>
                                                </a>
                                            </div>
                                            <div class="col-xxl-4 col-xs-16 col-sm-16 col-md-16 col-lg-4">
                                                <a data-toggle="modal" data-target="#messageModal{{ $user->id }}"
                                                    title="Date">
                                                    <h4 class="name2">
                                                        {{ \Carbon\Carbon::parse($user->receiverMessage->last()->created_at ?? now())->format('d M Y, h:i A') }}
                                                    </h4>
                                                </a>
                                            </div>
                                        </li>
                                        <hr class="my-2" />
                                    </ul>
                                @endforeach
                                <x-user-actions.show-message-component :users="$users" />
                            </div>
                        </div>
                    @else
                        <img src="{{ asset('storage/users/images/nodata-available.jpg') }}" class="img-responsive">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
