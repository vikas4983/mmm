@extends('layouts.frontend.main-master')
@section('title', 'Mangal Mandap - Access Controll')
@section('content')
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
                    <div class="collapse mobile-collapse in" id="collapseExample" bis_skin_checked="1">
                        <div class="col-xs-16 gt-margin-bottom-10" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">
                                <a href="composeMessages.php" class="btn gt-btn-orange btn-block gt-btn-lg"
                                    data-toggle="popover" title="" data-content="" data-html="enabled"
                                    data-original-title=""><i class="fa fa-envelope gt-margin-right-10"></i>Send Message</a>
                            </div>
                        </div>
                        {{-- <ul>
                            <li class="">
                                <a href="inboxMessages.php"><span class="pull-left">Inbox</span><span
                                        class="pull-right badge">0</span></a>
                            </li>
                            <li class="active">
                                <a href="sentMessages.php"><span class="pull-left">Sent</span><span
                                        class="pull-right badge">2</span></a>
                            </li>
                            <li class="">
                                <a href="importantMessages.php"><span class="pull-left">Important</span><span
                                        class="pull-right badge">0</span></a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
                <div class="col-xxl-13 col-xl-12 col-xs-16 col-sm-16 col-md-16 gt-msg-board" id="test-list"
                    bis_skin_checked="1">
                    {{-- <div class="col-xxl-16 col-xl-16 col-xs-16 col-sm-16 col-md-16" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-xxl-6 col-lg-8 col-xl-8 col-xs-16 col-sm-16 col-md-16 pull-right"
                                bis_skin_checked="1">
                                <p class="demo demo4_top pull-right">
                                <ul class="pagination bootpag">
                                    <li class="active"><a class="page"
                                            href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
                                </ul>
                                </p>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-xxl-16 col-xl-16 col-xs-16 col-sm-16 col-md-16 gt-msg-top-strip" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            {{-- <div class="col-xxl-1 col-xl-1 col-lg-2 col-xs-2 col-sm-2 col-md-2 gt-margin-top-5 gt-margin-bottom-5"
                                bis_skin_checked="1">
                                <input type="checkbox" onchange="checkAll(this);">
                            </div>
                            <div class="dropdown col-xxl-2 col-lg-4 col-xl-3 col-xs-7 col-sm-7 col-md-7 gt-margin-bottom-5"
                                bis_skin_checked="1">
                                <button id="dLabel" class="btn btn-default btn-block" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li>
                                        <a class="gt-cursor" title="Read" id="read_id">Read</a>
                                    </li>
                                    <li>
                                        <a class="gt-cursor" title="Unread" id="unread_id">Unreaded</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="gt-cursor" title="All" id="read_all">All</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown col-xxl-2 col-xl-3 col-lg-4 col-xs-7 col-sm-7 col-md-7 gt-margin-bottom-5"
                                bis_skin_checked="1">
                                <button id="dLabel" class="btn btn-default btn-block" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li>
                                        <a class="gt-cursor" title="Reply" id="replay_msg">Reply</a>
                                    </li>
                                    <li>
                                        <a class="gt-cursor" title="Forward" id="forward_msg">Forward</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="gt-cursor" title="Mark as Important" id="important_msg">Mark As
                                            Important</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="gt-cursor" title="Delete" id="delete_msg">Delete</a>
                                    </li>
                                </ul>
                            </div> --}}
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
                    <div class="content4 col-xs-16 col-xxl-16 col-xl-16 gt-msg-dash" bis_skin_checked="1">
                        <div id="msg_result_data" class="row" bis_skin_checked="1">
                            <form method="post" action="" id="msg_data_form">
                                <div class="d-flex flex-wrap mb-3 fw-bold">
                                    <div class="col-xxl-4 col-xs-10 col-sm-10 col-md-8 col-lg-4">
                                        <strong>Matri ID</strong>
                                    </div>

                                    <div class="col-xxl-8 col-xs-16 col-sm-16 col-md-16 col-lg-8">
                                        <strong> Message</strong>
                                    </div>

                                    <div class="col-xxl-2 col-xs-16 col-sm-16 col-md-16 col-lg-2">
                                        <strong> Date</strong>
                                    </div>
                                </div>
                                <ul class="list">

                                    @foreach ($users as $user)
                                        <li class="d-flex flex-wrap align-items-start mb-3">

                                            <div class="col-xxl-4 col-xs-10 col-sm-10 col-md-8 col-lg-4"
                                                style="display: flex; align-items: center;">
                                                <a href="javascript:void(0);" data-toggle="modal"
                                                    data-target="#messageModal{{ $user->id }}"><i
                                                        class="fa fa-envelope gt-margin-right-10 sendMessage"
                                                        style="margin-right: 10px;color:#FF7E00"></i></a>

                                                <a href="javascript:void(0);" data-toggle="modal"
                                                    data-target="#messageModal{{ $user->id }}" title="Matri ID"
                                                    style="text-decoration: none;">
                                                    <span class="name">{{ $prefix->name }}{{ $user->id ?? 'NA' }}</span>
                                                </a>
                                            </div>


                                            <div class="col-xxl-8 col-xs-16 col-sm-16 col-md-16 col-lg-8 gt-margin-top-8">
                                                <a href="javascript:void(0);" data-toggle="modal"
                                                    data-target="#messageModal{{ $user->id }}" title="Message">
                                                    <h4 class="name1">{{ $user->receiverMessage->last()->message ?? 'NA' }}
                                                    </h4>
                                                </a>
                                            </div>

                                            <div class="col-xxl-2 col-xs-16 col-sm-16 col-md-16 col-lg-2">
                                                <a href="javascript:void(0);" data-toggle="modal"
                                                    data-target="#messageModal{{ $user->id }}" title="Date">
                                                    <h4 class="name2">
                                                        {{ \Carbon\Carbon::parse($user->receiverMessage->last()->created_at ?? now())->format('d M Y') }}
                                                    </h4>
                                                </a>
                                            </div>

                                        </li>
                                        <x-user-actions.show-message-component :user="$user" />
                                        <hr class="my-2" />
                                    @endforeach



                                </ul>



                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


