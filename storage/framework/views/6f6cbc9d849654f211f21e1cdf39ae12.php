<?php $__env->startSection('title', 'Messages-Inbox - Mangal Mandap'); ?>
<?php $__env->startSection('content'); ?>
<div class="container gt-margin-top-20">
    					<div class="row">
        					<div class="col-xxl-13 col-xxl-offset-3 col-xl-13 col-xl-offset-3 text-center">
            					<h2 class="inPageTitle fontMerriWeather inThemeOrange">
                       				<span class="gt-font-weight-300">Message</span> - Inbox                				</h2>
                				<p class="inPageSubTitle">You can see all of your inbox messages here.</p>
            				</div>
        					<div class="col-xxl-3 col-xl-4 gt-left-opt-msg">
    <a class="btn gt-btn-green btn-block hidden-xxl hidden-xl gt-margin-bottom-20" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" >
        Options <i class="fa fa-angel-down"></i>
    </a>
    <div class="collapse mobile-collapse" id="collapseExample">
        <div class="col-xs-16 gt-margin-bottom-10">
            <div class="row">
                <a href="composeMessages.php" class="btn gt-btn-orange btn-block gt-btn-lg" data-toggle="popover" title=""  data-content="" data-html="enabled"><i class="fa fa-envelope gt-margin-right-10"></i>Send Message</a>
            </div>
        </div>
        <ul>
            <li class="active">
                <a href="<?php echo e(url('messages-inbox')); ?>"><span class="pull-left">Inbox</span><span class="pull-right badge">1</span></a>
            </li>
            <li class="">
                <a href="<?php echo e(url('messages-sent')); ?>"><span class="pull-left">Sent</span><span class="pull-right badge">2</span></a>
            </li>
            
        </ul>
            </div>
</div>            				<div class="col-xxl-13 col-xl-12 col-xs-16 col-sm-16 col-md-16 gt-msg-board" id="test-list">
              					<div class="col-xxl-16 col-xl-16 col-xs-16 col-sm-16 col-md-16">
                					<div class="row">
										<div class="col-xxl-6 col-lg-8 col-xl-8 col-xs-16 col-sm-16 col-md-16 pull-right">
											<p class="demo demo4_top pull-right"></p>
										</div>
                    				</div>
               					</div>
              					<div class="col-xxl-16 col-xl-16 col-xs-16 col-sm-16 col-md-16 gt-msg-top-strip">
                  					<div class="row">
										<div class="col-xxl-1 col-xl-1 col-lg-2 col-xs-2 col-sm-2 col-md-2 gt-margin-top-5 gt-margin-bottom-5">
											<input type="checkbox">
										</div>
										<div class="dropdown col-xxl-2 col-lg-4 col-xl-3 col-xs-7 col-sm-7 col-md-7 gt-margin-bottom-5">
											<button id="dLabel" class="btn btn-default btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
										<div class="dropdown col-xxl-2 col-xl-3 col-lg-4 col-xs-7 col-sm-7 col-md-7 gt-margin-bottom-5">
											<button id="dLabel" class="btn btn-default btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
													<a class="gt-cursor" title="Mark as Important" id="important_msg">Mark As Important</a>
												</li>
												<li class="divider"></li>
												<li>
													<a class="gt-cursor" title="Delete" id="delete_msg">Delete</a>
												</li>
											</ul>
										</div>
                        				<div class="col-xxl-5 col-xl-6 col-md-16 col-lg-6 pull-right">
                        					<div class="input-group">
      											<input type="text" class="gt-form-control flat search" placeholder="Search Message By Matri Id">
      											<span class="input-group-btn">
        											<button class="btn btn-default gt-btn-lg flat" type="button"><i class="fa fa-search"></i></button>
     					   						</span>
    										</div>
                   						</div>
                  					</div>
              					</div>
              					<div class="content4 col-xs-16 col-xxl-16 col-xl-16 gt-msg-dash">
                 					<div id="msg_result_data" class="row">
                      					<form method="post" action="" id="msg_data_form">
    <ul class="list">
        <li>
    <div class="col-xxl-2 col-xs-6 col-sm-6 col-md-8 col-lg-2 gt-margin-top-5">
        <input type="checkbox" class="display-inline" name="msg_id" id="msg_id" value="13" >
        <a class="gt-margin-left-10 font-18 gt-cursor" onClick="importantfun(13,'Yes');">
            <i class="fa fa-star "></i>
        </a>
    </div>

    <a href="inbox_main_msg.php?msg_id=13&inb=1" class="col-xxl-4 col-xs-10 col-sm-10 col-md-8 col-lg-4" data-toggle="tooltip" data-placement="left" title="MM228" >
        <h4 class="name">MM228</h4>
    </a>

    <a href="inbox_main_msg.php?msg_id=13&inb=1" class="col-xxl-8 col-xs-16 col-sm-16 col-md-16 col-lg-8 gt-margin-top-8" title="MM223">
        <span class="font-12">
            <b class="name1">
                drsttnrtgfjntdmn            </b>
        </span>
    </a>
    <div class="col-xxl-2 col-xs-16 col-sm-16 col-md-16 col-lg-2 ">
        <h4 class="name2">19 Mar 2024</h4>
    </div>
</li>

    </ul>
</form>
                       
                 					</div>
               					</div>
             				</div>
        				</div>
    				</div>
				</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts1.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\users\message\inbox.blade.php ENDPATH**/ ?>