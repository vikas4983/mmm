<?php $__env->startSection('title', 'Dashboard - Mangal Mandap'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container mt-20">
        <div class="row">
            <div class="col-xxl-4 col-xs-16 col-sm-16 mb-30">
                <div class="thumbnail gt-margin-bottom-0 inHomeMainThumb">
                    <img src="<?php echo e(asset('storage/users/images/' . ($user->image ?? 'male-default.jpg'))); ?>" alt="User Image"
                        class="img-responsive gtFullWidth">
                    <a href="my-photo" class="gt-myhome-caption ripplelink">
                        <i class="fa fa-camera gt-margin-right-10"></i><span class="">Change Profile Picture</span>
                    </a>
                </div>
                <div id="loaderID"></div>
            </div>
            <div class="clearfix visible-xs visible-sm mb-10"></div>
            <div class="col-xxl-12 col-sm-16 col-xs-16">
                <div class="gt-body mb-20 gtHomeBody">
                    <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-lg-10">
                            <h4>
                                Hello <span class="gt-text-orange"><?php echo e($user->name); ?></span>
                                <small class="text-muted gt-margin-left">( <?php echo e($prefix->name); ?>-<?php echo e($user->id); ?> )</small>
                            </h4>
                            <h5 class="mt-30">
                                Your profile is 95% complete </h5>
                            <div class="progress mb-10">
                                <div class="progress-bar progress-bar-warning progress-bar-striped active"
                                    role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 95%;"></div>
                            </div>
                            <div class="font-12">
                                Tip : insert all details which can help you to find perfect life partner </div>
                            <div class="mt-10">
                                <a href="view-profile" class="gt-text-green">
                                    Complete Your Profile <i class="fa fa-caret-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Recent Login -->
                        <div class="col-xxl-8 col-xl-8 col-lg-16 inHomeRecent">
                            <h4 class="text-center mb-20 pb-15">RECENT LOGIN</h4>
                            <div id="owl-demo" class="owl-carousel">
                                <div class="item">
                                    <div class="col-xxl-16 col-xs-16 col-lg-16">
                                        <a href="member-profile?view_id=IN2" target="_blank" class="gt-result">
                                            <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                <div class="thumbnail">

                                                    <img src="./img/app_img/male-no-photo.jpg" title="Aarav Acharya"
                                                        alt="IN2" class="img-responsive gtFullWidth">


                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-xxl-10 col-lg-10 col-xs-16">
                                            <a href="member-profile?view_id=IN2" target="_blank" class="gt-result">
                                                <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                    Aarav Acharya&nbsp;&nbsp;(IN2)
                                                </h5>
                                                <article class="text-center">
                                                    29 Years, 5ft 5in - 165cm , Clerical Official
                                                </article>
                                                <article class="text-center">
                                                    Achencoil,India </article>
                                            </a>

                                            <button class="btn gt-btn-green btn-block mt-5" onclick="ExpressInterest('IN2')"
                                                title="Send Interest" data-target="#myModal1" data-toggle="modal"
                                                data-backdrop="static" data-keyboard="false">
                                                <i class="fa fa-heart"></i> Send Interest </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-xxl-16 col-xs-16 col-lg-16">
                                        <a href="member-profile?view_id=IN24" target="_blank" class="gt-result">
                                            <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                <div class="thumbnail">

                                                    <img src="./img/app_img/male-no-photo.jpg" title="Ayaan Banerjee"
                                                        alt="IN24" class="img-responsive gtFullWidth">


                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-xxl-10 col-lg-10 col-xs-16">
                                            <a href="member-profile?view_id=IN24" target="_blank" class="gt-result">
                                                <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                    Ayaan Banerjee&nbsp;&nbsp;(IN24)
                                                </h5>
                                                <article class="text-center">
                                                    30 Years, 5ft 11in - 180cm , Engineer
                                                </article>
                                                <article class="text-center">
                                                    Mumbai,India </article>
                                            </a>
                                            <button class="btn gt-btn-green btn-block mt-5" onClick="sendreminder(3);"
                                                id="reminder3" title="Send Reminder">
                                                <i class="fa fa-bell gt-margin-right-5"></i>Send Reminder </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-xxl-16 col-xs-16 col-lg-16">
                                        <a href="member-profile?view_id=IN25" target="_blank" class="gt-result">
                                            <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                <div class="thumbnail">

                                                    <img src="./img/app_img/male-no-photo.jpg" title="Yuvaan Burman"
                                                        alt="IN25" class="img-responsive gtFullWidth">


                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-xxl-10 col-lg-10 col-xs-16">
                                            <a href="member-profile?view_id=IN25" target="_blank" class="gt-result">
                                                <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                    Yuvaan Burman&nbsp;&nbsp;(IN25)
                                                </h5>
                                                <article class="text-center">
                                                    30 Years, 5ft 11in - 180cm , Event Manager
                                                </article>
                                                <article class="text-center">
                                                    Alappakkam,India </article>
                                            </a>

                                            <button class="btn gt-btn-green btn-block mt-5"
                                                onclick="ExpressInterest('IN25')" title="Send Interest"
                                                data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                data-keyboard="false">
                                                <i class="fa fa-heart"></i> Send Interest </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-xxl-16 col-xs-16 col-lg-16">
                                        <a href="member-profile?view_id=IN26" target="_blank" class="gt-result">
                                            <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                <div class="thumbnail">

                                                    <img src="./img/app_img/male-no-photo.jpg" title="Rudra Bhatt"
                                                        alt="IN26" class="img-responsive gtFullWidth">


                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-xxl-10 col-lg-10 col-xs-16">
                                            <a href="member-profile?view_id=IN26" target="_blank" class="gt-result">
                                                <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                    Rudra Bhatt&nbsp;&nbsp;(IN26)
                                                </h5>
                                                <article class="text-center">
                                                    30 Years, 5ft 7in - 170cm , Factory worker
                                                </article>
                                                <article class="text-center">
                                                    Aithar,India </article>
                                            </a>

                                            <button class="btn gt-btn-green btn-block mt-5"
                                                onclick="ExpressInterest('IN26')" title="Send Interest"
                                                data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                data-keyboard="false">
                                                <i class="fa fa-heart"></i> Send Interest </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-xxl-16 col-xs-16 col-lg-16">
                                        <a href="member-profile?view_id=IN27" target="_blank" class="gt-result">
                                            <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                <div class="thumbnail">

                                                    <img src="./img/app_img/male-no-photo.jpg" title="Kabir Basu"
                                                        alt="IN27" class="img-responsive gtFullWidth">


                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-xxl-10 col-lg-10 col-xs-16">
                                            <a href="member-profile?view_id=IN27" target="_blank" class="gt-result">
                                                <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                    Kabir Basu&nbsp;&nbsp;(IN27)
                                                </h5>
                                                <article class="text-center">
                                                    31 Years, 5ft 10in - 177cm , Designer
                                                </article>
                                                <article class="text-center">
                                                    Jaipur,India </article>
                                            </a>

                                            <button class="btn gt-btn-green btn-block mt-5"
                                                onclick="ExpressInterest('IN27')" title="Send Interest"
                                                data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                data-keyboard="false">
                                                <i class="fa fa-heart"></i> Send Interest </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-xxl-16 col-xs-16 col-lg-16">
                                        <a href="member-profile?view_id=IN28" target="_blank" class="gt-result">
                                            <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                <div class="thumbnail">

                                                    <img src="./img/app_img/male-no-photo.jpg" title="Madhav Bedi"
                                                        alt="IN28" class="img-responsive gtFullWidth">


                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-xxl-10 col-lg-10 col-xs-16">
                                            <a href="member-profile?view_id=IN28" target="_blank" class="gt-result">
                                                <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                    Madhav Bedi&nbsp;&nbsp;(IN28)
                                                </h5>
                                                <article class="text-center">
                                                    31 Years, 5ft 6in - 167cm , Flight Attendant
                                                </article>
                                                <article class="text-center">
                                                    Ahmadabad,India </article>
                                            </a>

                                            <button class="btn gt-btn-green btn-block mt-5"
                                                onclick="ExpressInterest('IN28')" title="Send Interest"
                                                data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                data-keyboard="false">
                                                <i class="fa fa-heart"></i> Send Interest </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-xxl-16 col-xs-16 col-lg-16">
                                        <a href="member-profile?view_id=IN29" target="_blank" class="gt-result">
                                            <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                <div class="thumbnail">

                                                    <img src="./img/app_img/male-no-photo.jpg" title="Aarush Varma"
                                                        alt="IN29" class="img-responsive gtFullWidth">


                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-xxl-10 col-lg-10 col-xs-16">
                                            <a href="member-profile?view_id=IN29" target="_blank" class="gt-result">
                                                <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                    Aarush Varma&nbsp;&nbsp;(IN29)
                                                </h5>
                                                <article class="text-center">
                                                    32 Years, 5ft 9in - 175cm , Executive
                                                </article>
                                                <article class="text-center">
                                                    Bakudi,India </article>
                                            </a>

                                            <button class="btn gt-btn-green btn-block mt-5"
                                                onclick="ExpressInterest('IN29')" title="Send Interest"
                                                data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                data-keyboard="false">
                                                <i class="fa fa-heart"></i> Send Interest </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-xxl-16 col-xs-16 col-lg-16">
                                        <a href="member-profile?view_id=IN30" target="_blank" class="gt-result">
                                            <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                <div class="thumbnail">

                                                    <img src="./img/app_img/male-no-photo.jpg" title="Ryan Dalal"
                                                        alt="IN30" class="img-responsive gtFullWidth">


                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-xxl-10 col-lg-10 col-xs-16">
                                            <a href="member-profile?view_id=IN30" target="_blank" class="gt-result">
                                                <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                    Ryan Dalal&nbsp;&nbsp;(IN30)
                                                </h5>
                                                <article class="text-center">
                                                    31 Years, 5ft 6in - 167cm , Doctor
                                                </article>
                                                <article class="text-center">
                                                    Alangudi,India </article>
                                            </a>

                                            <button class="btn gt-btn-green btn-block mt-5"
                                                onclick="ExpressInterest('IN30')" title="Send Interest"
                                                data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                data-keyboard="false">
                                                <i class="fa fa-heart"></i> Send Interest </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-xxl-16 col-xs-16 col-lg-16">
                                        <a href="member-profile?view_id=IN31" target="_blank" class="gt-result">
                                            <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                <div class="thumbnail">

                                                    <img src="./img/app_img/male-no-photo.jpg" title="Kartik Chowdhury"
                                                        alt="IN31" class="img-responsive gtFullWidth">


                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-xxl-10 col-lg-10 col-xs-16">
                                            <a href="member-profile?view_id=IN31" target="_blank" class="gt-result">
                                                <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                    Kartik Chowdhury&nbsp;&nbsp;(IN31)
                                                </h5>
                                                <article class="text-center">
                                                    31 Years, 6ft 2in - 187cm , Defense Employee
                                                </article>
                                                <article class="text-center">
                                                    Bhadson,India </article>
                                            </a>

                                            <button class="btn gt-btn-green btn-block mt-5"
                                                onclick="ExpressInterest('IN31')" title="Send Interest"
                                                data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                data-keyboard="false">
                                                <i class="fa fa-heart"></i> Send Interest </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-xxl-16 col-xs-16 col-lg-16">
                                        <a href="member-profile?view_id=IN23" target="_blank" class="gt-result">
                                            <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                <div class="thumbnail">

                                                    <img src="./img/app_img/male-no-photo.jpg" title="Dhruv  Balakrishnan"
                                                        alt="IN23" class="img-responsive gtFullWidth">


                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-xxl-10 col-lg-10 col-xs-16">
                                            <a href="member-profile?view_id=IN23" target="_blank" class="gt-result">
                                                <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                    Dhruv Balakrishnan&nbsp;&nbsp;(IN23)
                                                </h5>
                                                <article class="text-center">
                                                    30 Years, 5ft 5in - 165cm , Contractor
                                                </article>
                                                <article class="text-center">
                                                    Kozhikode,India </article>
                                            </a>
                                            <button class="btn gt-btn-green btn-block mt-5" onClick="sendreminder(2);"
                                                id="reminder2" title="Send Reminder">
                                                <i class="fa fa-bell gt-margin-right-5"></i>Send Reminder </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /. Recent Login -->
                    </div>
                </div>
                <div class="gt-body gtHomeBody inHomeIdSearch mb-20">
                    <form action="search_result" method="post" class="mb-0">
                        <div class="row">
                            <div class="col-xxl-4">
                                <h4>Search By Id</h4>
                            </div>
                            <div class="col-xxl-8">
                                <div class="form-group clearfix mb-0">
                                    <input type="text" class="gt-form-control" name="id_search"
                                        placeholder="Enter matri id to search">
                                </div>
                            </div>
                            <div class="col-xxl-4">
                                <button type="submit" class="btn gt-btn-orange">
                                    Search Now </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <aside class="col-xxl-4 col-xl-4 col-xs-16">
                <a class="btn gt-btn-orange btn-block gt-margin-bottom-15 visible-xs visible-sm visible-md btn-md"
                    role="button" data-toggle="collapse" href="#collapseLeftPanel" aria-expanded="false"
                    aria-controls="collapseLeftPanel">
                    Options &nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                </a>
                <div class="clearfix"></div>
                <div class="collapse mobile-collapse mb-15" id="collapseLeftPanel">
                    <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                        <div class="gt-panel-head">
                            <div class="gt-panel-title text-center">
                                MESSAGES </div>
                        </div>
                        <div class="gt-left-pan-option">
                            <div class="row">
                                <a href="inboxMessages" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Inbox </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a>
                                <a href="sentMessages" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Outbox </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                4 </div>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                        <div class="gt-panel-head">
                            <div class="gt-panel-title text-center">
                                MY PROFILE </div>
                        </div>
                        <div class="gt-left-pan-option">
                            <div class="row">
                                <a href="view-profile" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    Edit Profile </a>
                                <a href="my-photo" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                                    Manage Photos </a>
                            </div>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                        <div class="gt-panel-head">
                            <div class="gt-panel-title text-center">
                                PROFILE DETAILS </div>
                        </div>
                        <div class="gt-left-pan-option">
                            <div class="row">
                                <a href="exp-interest" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Express Interest Received </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                1 </div>
                                        </span>
                                    </div>
                                </a>
                                <a href="shortlisted-members" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            My Shortlist Profile </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                1 </div>
                                        </span>
                                    </div>
                                </a>
                                <a href="blocklisted-members" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            My Blocklist Profile </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a>

                                <a href="member-visited-me" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            My Profile Viewed By </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                1 </div>
                                        </span>
                                    </div>
                                </a>
                                <a href="i-visited-members" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            I Visited Profile </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                5 </div>
                                        </span>
                                    </div>
                                </a>
                                <a href="who-watch-mobileno" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Mobile Numbers Viewed By Me </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a>

                                <a href="photo-request" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Photo Password Request Received
                                        </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="col-xxl-12 col-xl-12 col-xs-16">
                <!-- Recently Joined -->
                <div class="gt-panel inHomePanel">
                    <div class="gt-panel-border-green">
                        <div class="gt-panel-title inPanelGreenTitle">
                            RECENTLY JOINED </div>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                <a href="member-profile?view_id=IN38" target="_blank" class="gt-result">
                                    <div class="thumbnail">

                                        <img src="./img/app_img/male-no-photo.jpg" title="Anika Bedi" alt="IN38"
                                            class="img-responsive gtFullWidth">


                                    </div>
                                    <h5 class="text-center gt-text-orange">
                                        Anika Bedi(IN38)
                                    </h5>
                                    <article class="gt-margin-bottom-5 text-center">
                                        33 Years, 5ft 3in - 160cm , Clerical Official </article>
                                    <article class="text-center">
                                        Mandhela Khurd,India </article>
                                </a>


                                <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                    onClick="sendreminder(1);" id="reminder1" title="Send Reminder">
                                    <i class="fa fa-bell gt-margin-right-5"></i>Send Reminder </button>


                            </div>
                            <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                <a href="member-profile?view_id=IN31" target="_blank" class="gt-result">
                                    <div class="thumbnail">

                                        <img src="./img/app_img/male-no-photo.jpg" title="Kartik Chowdhury"
                                            alt="IN31" class="img-responsive gtFullWidth">


                                    </div>
                                    <h5 class="text-center gt-text-orange">
                                        Kartik Chowdhury(IN31)
                                    </h5>
                                    <article class="gt-margin-bottom-5 text-center">
                                        31 Years, 6ft 2in - 187cm , Defense Employee </article>
                                    <article class="text-center">
                                        Bhadson,India </article>
                                </a>


                                <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                    onclick="ExpressInterest('IN31')" title="Send Interest" data-target="#myModal1"
                                    data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                    <i class="fa fa-heart"></i> Send Interest </button>


                            </div>
                            <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                <a href="member-profile?view_id=IN30" target="_blank" class="gt-result">
                                    <div class="thumbnail">

                                        <img src="./img/app_img/male-no-photo.jpg" title="Ryan Dalal" alt="IN30"
                                            class="img-responsive gtFullWidth">


                                    </div>
                                    <h5 class="text-center gt-text-orange">
                                        Ryan Dalal(IN30)
                                    </h5>
                                    <article class="gt-margin-bottom-5 text-center">
                                        31 Years, 5ft 6in - 167cm , Doctor </article>
                                    <article class="text-center">
                                        Alangudi,India </article>
                                </a>


                                <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                    onclick="ExpressInterest('IN30')" title="Send Interest" data-target="#myModal1"
                                    data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                    <i class="fa fa-heart"></i> Send Interest </button>


                            </div>
                            <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                <a href="member-profile?view_id=IN29" target="_blank" class="gt-result">
                                    <div class="thumbnail">

                                        <img src="./img/app_img/male-no-photo.jpg" title="Aarush Varma" alt="IN29"
                                            class="img-responsive gtFullWidth">


                                    </div>
                                    <h5 class="text-center gt-text-orange">
                                        Aarush Varma(IN29)
                                    </h5>
                                    <article class="gt-margin-bottom-5 text-center">
                                        32 Years, 5ft 9in - 175cm , Executive </article>
                                    <article class="text-center">
                                        Bakudi,India </article>
                                </a>


                                <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                    onclick="ExpressInterest('IN29')" title="Send Interest" data-target="#myModal1"
                                    data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                    <i class="fa fa-heart"></i> Send Interest </button>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. Recently Joined -->

                <!-- Featured Profiles -->
                <div class="gt-panel inHomePanel">
                    <div class="gt-panel-border-green">
                        <div class="gt-panel-title inPanelGreenTitle">
                            FEATURED PROFILES
                        </div>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                <a href="member-profile?view_id=IN31" target="_blank" class="gt-result">
                                    <div class="thumbnail">

                                        <img src="./img/app_img/male-no-photo.jpg" title="Kartik Chowdhury"
                                            alt="IN31" class="img-responsive gtFullWidth">


                                    </div>
                                    <h5 class="text-center gt-text-orange">
                                        Kartik Chowdhury(IN31)
                                    </h5>
                                    <article class="gt-margin-bottom-5 text-center">
                                        31 Years, 6ft 2in - 187cm , Defense Employee </article>
                                    <article class="text-center">
                                        Bhadson,India </article>
                                </a>


                                <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                    onclick="ExpressInterest('IN31')" title="Send Interest" data-target="#myModal1"
                                    data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                    <i class="fa fa-heart"></i> Send Interest </button>


                            </div>
                            <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                <a href="member-profile?view_id=IN30" target="_blank" class="gt-result">
                                    <div class="thumbnail">

                                        <img src="./img/app_img/male-no-photo.jpg" title="Ryan Dalal" alt="IN30"
                                            class="img-responsive gtFullWidth">


                                    </div>
                                    <h5 class="text-center gt-text-orange">
                                        Ryan Dalal(IN30)
                                    </h5>
                                    <article class="gt-margin-bottom-5 text-center">
                                        31 Years, 5ft 6in - 167cm , Doctor </article>
                                    <article class="text-center">
                                        Alangudi,India </article>
                                </a>


                                <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                    onclick="ExpressInterest('IN30')" title="Send Interest" data-target="#myModal1"
                                    data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                    <i class="fa fa-heart"></i> Send Interest </button>


                            </div>
                            <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                <a href="member-profile?view_id=IN29" target="_blank" class="gt-result">
                                    <div class="thumbnail">

                                        <img src="./img/app_img/male-no-photo.jpg" title="Aarush Varma" alt="IN29"
                                            class="img-responsive gtFullWidth">


                                    </div>
                                    <h5 class="text-center gt-text-orange">
                                        Aarush Varma(IN29)
                                    </h5>
                                    <article class="gt-margin-bottom-5 text-center">
                                        32 Years, 5ft 9in - 175cm , Executive </article>
                                    <article class="text-center">
                                        Bakudi,India </article>
                                </a>


                                <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                    onclick="ExpressInterest('IN29')" title="Send Interest" data-target="#myModal1"
                                    data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                    <i class="fa fa-heart"></i> Send Interest </button>


                            </div>
                            <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                <a href="member-profile?view_id=IN28" target="_blank" class="gt-result">
                                    <div class="thumbnail">

                                        <img src="./img/app_img/male-no-photo.jpg" title="Madhav Bedi" alt="IN28"
                                            class="img-responsive gtFullWidth">


                                    </div>
                                    <h5 class="text-center gt-text-orange">
                                        Madhav Bedi(IN28)
                                    </h5>
                                    <article class="gt-margin-bottom-5 text-center">
                                        31 Years, 5ft 6in - 167cm , Flight Attendant </article>
                                    <article class="text-center">
                                        Ahmadabad,India </article>
                                </a>


                                <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                    onclick="ExpressInterest('IN28')" title="Send Interest" data-target="#myModal1"
                                    data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                    <i class="fa fa-heart"></i> Send Interest </button>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. Featured Profiles -->

                <!-- My Matches -->
                <div class="gt-panel inHomePanel">
                    <div class="gt-panel-border-green">
                        <div class="gt-panel-title inPanelGreenTitle">
                            MY MATCHES </div>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div class="col-xl-16">
                                <div class="thumbnail">
                                    <img src="img/nodata-available.jpg" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. My Matches -->

                <!-- Recently Visited -->
                <div class="gt-panel inHomePanel">
                    <div class="gt-panel-border-green">
                        <div class="gt-panel-title inPanelGreenTitle">
                            RECENTLY VISITED </div>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <a href="member-profile?view_id=IN2" target="_blank"
                                class="col-xxl-4 col-xl-4 col-xs-8 col-lg-4 gt-margin-bottom-10 gt-result">
                                <div class="row">
                                    <div class="col-xs-16">
                                        <div class="thumbnail gt-margin-bottom-0">

                                            <img src="./img/app_img/male-no-photo.jpg" title="Aarav Acharya"
                                                alt="IN2" class="img-responsive gtFullWidth">


                                        </div>
                                    </div>
                                    <div class="col-xs-16 text-center">
                                        <h5 class="text-center text-center gt-text-orange mt-5 mb-5">
                                            Aarav Acharya (IN2)
                                        </h5>
                                        <p>29 Years, Never Married</p>
                                    </div>
                                </div>
                            </a>
                            <a href="member-profile?view_id=IN38" target="_blank"
                                class="col-xxl-4 col-xl-4 col-xs-8 col-lg-4 gt-margin-bottom-10 gt-result">
                                <div class="row">
                                    <div class="col-xs-16">
                                        <div class="thumbnail gt-margin-bottom-0">

                                            <img src="./img/app_img/male-no-photo.jpg" title="Anika Bedi" alt="IN38"
                                                class="img-responsive gtFullWidth">


                                        </div>
                                    </div>
                                    <div class="col-xs-16 text-center">
                                        <h5 class="text-center text-center gt-text-orange mt-5 mb-5">
                                            Anika Bedi (IN38)
                                        </h5>
                                        <p>33 Years, Never Married</p>
                                    </div>
                                </div>
                            </a>
                            <a href="member-profile?view_id=IN31" target="_blank"
                                class="col-xxl-4 col-xl-4 col-xs-8 col-lg-4 gt-margin-bottom-10 gt-result">
                                <div class="row">
                                    <div class="col-xs-16">
                                        <div class="thumbnail gt-margin-bottom-0">

                                            <img src="./img/app_img/male-no-photo.jpg" title="Kartik Chowdhury"
                                                alt="IN31" class="img-responsive gtFullWidth">


                                        </div>
                                    </div>
                                    <div class="col-xs-16 text-center">
                                        <h5 class="text-center text-center gt-text-orange mt-5 mb-5">
                                            Kartik Chowdhury (IN31)
                                        </h5>
                                        <p>31 Years, Never Married</p>
                                    </div>
                                </div>
                            </a>
                            <a href="member-profile?view_id=IN6" target="_blank"
                                class="col-xxl-4 col-xl-4 col-xs-8 col-lg-4 gt-margin-bottom-10 gt-result">
                                <div class="row">
                                    <div class="col-xs-16">
                                        <div class="thumbnail gt-margin-bottom-0">

                                            <img src="./img/app_img/male-no-photo.jpg" title="Atharv Khatri"
                                                alt="IN6" class="img-responsive gtFullWidth">


                                        </div>
                                    </div>
                                    <div class="col-xs-16 text-center">
                                        <h5 class="text-center text-center gt-text-orange mt-5 mb-5">
                                            Atharv Khatri (IN6)
                                        </h5>
                                        <p>28 Years, Never Married</p>
                                    </div>
                                </div>
                            </a>
                            <a href="member-profile?view_id=IN4" target="_blank"
                                class="col-xxl-4 col-xl-4 col-xs-8 col-lg-4 gt-margin-bottom-10 gt-result">
                                <div class="row">
                                    <div class="col-xs-16">
                                        <div class="thumbnail gt-margin-bottom-0">

                                            <img src="./img/app_img/male-no-photo.jpg" title="Advik Agarwal"
                                                alt="IN4" class="img-responsive gtFullWidth">


                                        </div>
                                    </div>
                                    <div class="col-xs-16 text-center">
                                        <h5 class="text-center text-center gt-text-orange mt-5 mb-5">
                                            Advik Agarwal (IN4)
                                        </h5>
                                        <p>29 Years, Never Married</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /. Recently Visited -->
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="container gt-margin-top-10">
    </div>
<?php $__env->stopSection(); ?>

























































<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\dashboard.blade.php ENDPATH**/ ?>