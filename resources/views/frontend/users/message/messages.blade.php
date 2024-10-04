@extends('layouts1.app')
@section('title', 'Messages - Mangal Mandap')
@section('content')
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
                <a href="{{url('messages-inbox')}}"><span class="pull-left">Inbox</span><span class="pull-right badge">1</span></a>
            </li>
            <li class="">
                <a href="{{url('messages-sent')}}"><span class="pull-left">Sent</span><span class="pull-right badge">2</span></a>
            </li>
            {{-- <li class="">
                <a href="importantMessages.php"><span class="pull-left">Important</span><span class="pull-right badge">0</span></a>
            </li> --}}
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
				<script type="text/javascript">
	var auto_refresh = setInterval(
		function (){
			$('#count').load('parts/online').fadeIn("slow");
		},15000 
	); // refresh every 10 second
</script>
<script src="js/jquery.min.js"></script>
<small class="pull-right">
        <link rel="stylesheet" type="text/css" href="who-is-online/widget.css" />
    <script type="text/javascript" src="who-is-online/widget.js"></script>
    <div class="onlineWidget">
	    <div class="channel">
            <img class="preloader" src="who-is-online/img/preloader.gif" alt="Loading.." width="22" height="22" />
        </div>
	    <div class="count" id="count"></div>
        <div class="label">online member</div>
        <div class="arrow"></div>
    </div>
</small>
<!-- /. Live Chat -->

<!-- Analytic Code -->
<script>
	var id = 'UA-demo';
  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	ga('create', id, 'auto');
  	ga('send', 'pageview');
</script>
<!-- /.Analytic Code -->


 		</div>
    		<!-- Jquery Js-->
			<script src="js/jquery.min.js"></script>
			<!-- Bootstrap & Green Js -->
			<script src="js/bootstrap.js"></script>
			<script src="js/green.js"></script>
			<script>
				$(document).ready(function() {
				  $('#body').show();
				  $('.preloader-wrapper').hide();
				});
			</script>
    		<script>
      			$('[data-toggle="popover"]').popover({
        			trigger: 'click',
        			'placement': 'top'
      			});
    		</script>
     		<!-- Mobile Side Panel Collapse -->
			<script>
				(function($) {
				var $window = $(window),
					$html = $('.mobile-collapse');
						$window.width(function width(){
							if ($window.width() > 767) {
							return $html.addClass('in');
						}
						$html.removeClass('in');
						});
					})(jQuery);
			</script>
    		<script src="{{asset('assets/js/jquery.bootpag.js')}}"></script>
    		<script>
      			$('.demo4_top,.demo4_bottom').bootpag({
					total: 50,
					page: 1,
					maxVisible: 4,
					leaps: true,
					firstLastUse: true,
					first: '←',
					last: '→',
					wrapClass: 'pagination',
					activeClass: 'active',
					disabledClass: 'disabled',
					nextClass: 'next',
					prevClass: 'prev',
					lastClass: 'last',
					firstClass: 'first'
      			}).on("page", function(event, num){
        			$(".content4").html("Page " + num);
        			// or some ajax content loading...
					});
    		</script>
	  		<script type="text/javascript">
				function checkAll(ele) {
					var checkboxes = document.getElementsByTagName('input');
					if (ele.checked) {
				  		for (var i = 0; i < checkboxes.length; i++) {
							if (checkboxes[i].type == 'checkbox') {
								checkboxes[i].checked = true;
							}
						} 
					}else {
					  	for (var i = 0; i < checkboxes.length; i++) {
							console.log(i)
							if (checkboxes[i].type == 'checkbox') {
								checkboxes[i].checked = false;
							}
					  	}
					}
			  	}
			</script>
	  		<script type="text/javascript">
				$(document).ready(function() {
	 				$('#replay_msg').click(function(){
						var selectedOrderBy = new Array();
						$('input[name="msg_id"]:checked').each(function() {
							selectedOrderBy.push(this.value);
						});
						if(selectedOrderBy!=''){
							if(selectedOrderBy.length=='1'){
			  					$.ajax({
			  						url: 'msg_result_inbox',
			  						type: 'POST',
			  						data: 'msg_status=replay_msg&msg_id='+selectedOrderBy,
			  						success: function(data) {
										$('#msg_result_data').html(data);
										var monkeyList = new List('test-list', {
									  		valueNames: ['name','name1','name2'],
									  		page: 5,
												plugins: [ ListPagination({}) ] 
										});
			  						},
								  	error: function() {
										//called when there is an error
										//console.log(e.message);
									}
								});
							}else{
								alert('Please select only one message to complete message reply.');	
								return false;		
							}
						}else{
							alert('Please select at list one message to complete message reply.');	
							return false;
						}
					});
	 				$('#forward_msg').click(function(){
						var selectedOrderBy = new Array();
						$('input[name="msg_id"]:checked').each(function() {
							selectedOrderBy.push(this.value);
						});
						if(selectedOrderBy!=''){
							if(selectedOrderBy.length=='1'){
								$.ajax({
									url: 'msg_result_inbox',
									type: 'POST',
									data: 'msg_status=forward_msg&msg_id='+selectedOrderBy,
									success: function(data) {
										$('#msg_result_data').html(data);
										var monkeyList = new List('test-list', {
											valueNames: ['name','name1','name2'],
											page: 5,
											plugins: [ ListPagination({}) ] 
										});
									},
									error: function() {
										//called when there is an error
										//console.log(e.message);
									}
								});
							}else{
								alert('Please select only one message to complete message forward.');	
								return false;		
							}
						}else{
							alert('Please select at list one message to complete message forward.');	
							return false;
						}
					});
					$('#refresh_msg').click(function(){
						$('#msg_result_data').empty();
						$.ajax({
							url: 'msg_result_inbox',
							type: 'POST',
							success: function(data) {
								$('#msg_result_data').html(data);
								var monkeyList = new List('test-list', {
									valueNames: ['name','name1','name2'],
									page: 5,
									plugins: [ ListPagination({}) ] 
								});
							},
							error: function() {
								//called when there is an error
								//console.log(e.message);
							}
						});
					});
					$('#delete_msg').click(function(){
						var selectedOrderBy = new Array();
						$('input[name="msg_id"]:checked').each(function() {
							selectedOrderBy.push(this.value);
						});
						if(selectedOrderBy!=''){
							$.ajax({
							url: 'msg_result_inbox',
							type: 'POST',
							data: 'msg_status=trash&msg_id='+selectedOrderBy,
								success: function(data) {
									$('#msg_result_data').html(data);
									var monkeyList = new List('test-list', {
										valueNames: ['name','name1','name2'],
										page: 5,
										plugins: [ ListPagination({}) ] 
									});
								},
								error: function() {
									//called when there is an error
									//console.log(e.message);
								}
							});
						}else{
							alert('Please select at list one message to complete trash action.');	
							return false;
						}
					});
					$('#important_msg').click(function(){
						var selectedOrderBy = new Array();
						$('input[name="msg_id"]:checked').each(function() {
							selectedOrderBy.push(this.value);
						});
						if(selectedOrderBy!=''){
							$.ajax({
								url: 'msg_result_inbox',
								type: 'POST',
								data: 'msg_status=important&msg_id='+selectedOrderBy,
								success: function(data) {
									$('#msg_result_data').html(data);
									var monkeyList = new List('test-list', {
										valueNames: ['name','name1','name2'],
										page: 5,
										plugins: [ ListPagination({}) ] 
									});
								},
								error: function() {
									//called when there is an error
									//console.log(e.message);
								}
							});
						}else{
							alert('Please select at list one message to complete important action.');	
							return false;
						}
					});
					$('#read_id').click(function(){
						$.ajax({
							url: 'msg_result_inbox',
							type: 'POST',
							data: 'msg_read_type=read',
							success: function(data) {
								$('#msg_result_data').html(data);
								var monkeyList = new List('test-list', {
									valueNames: ['name','name1','name2'],
									page: 5,
									plugins: [ ListPagination({}) ] 
								});
							},
							error: function() {
								//called when there is an error
								//console.log(e.message);
							}
						});
					});
					$('#unread_id').click(function(){
						$.ajax({
							url: 'msg_result_inbox',
							type: 'POST',
							data: 'msg_read_type=unread',
							success: function(data) {
								$('#msg_result_data').html(data);
								var monkeyList = new List('test-list', {
									valueNames: ['name','name1','name2'],
									page: 5,
									plugins: [ ListPagination({}) ] 
								});
							},
							error: function() {
								//called when there is an error
								//console.log(e.message);
							}
						});
					});
					$('#read_all').click(function(){
						$.ajax({
							url: 'msg_result_inbox',
							type: 'POST',
							data: 'msg_read_type=read_all',
							success: function(data) {
								$('#msg_result_data').html(data);
								var monkeyList = new List('test-list', {
									valueNames: ['name','name1','name2'],
									page: 5,
									plugins: [ ListPagination({}) ] 
								});
							},
							error: function() {
								//called when there is an error
								//console.log(e.message);
							}
						});
					});
				});
				$('[data-toggle="tooltip"]').tooltip({
					trigger: 'hover',
					'placement': 'top'
				});
			</script>
	  		<script src="js/listpagination_search/list.js"></script>
			<script src="js/listpagination_search/list.pagination.js"></script>
			<script type="text/javascript">
				var monkeyList = new List('test-list', {
					valueNames: ['name','name1','name2'],
					page: 10,
					plugins: [ ListPagination({}) ] 
				});
			</script>
			<script type="text/javascript">
				function importantfun(msg_id,msg_imp_status){
					if(msg_imp_status=='Yes'){
						var msg_imp='Yes';
					}else if(msg_imp_status=='No'){
						var msg_imp='No';
					}
					$.ajax({
						url: 'msg_result_inbox',
						type: 'POST',
						data: 'msg_important_status='+msg_imp+'&msg_id='+msg_id,
						success: function(data) {
							$('#msg_result_data').html(data);
							var monkeyList = new List('test-list', {
								valueNames: ['name','name1','name2'],
								page: 5,
								plugins: [ ListPagination({} ) ] 
							});
						},
						error: function() {
							//called when there is an error
							//console.log(e.message);
						}
					});
				}
			</script>
@endsection
