@extends('layouts1.app')
@section('title', 'Number-View-By - Mangal Mandap')
@section('content')
    <div class="container">
        <div class="row">
            <aside class="col-xxl-12 col-xxl-offset-4 col-xl-12 col-xl-offset-4 text-center mb-20">
                <h3 class="inPageTitle fontMerriWeather inThemeOrange">Who watched my mobile number</h3>
                <article>
                    <p class="inPageSubTitle">You can check all of Who watched my mobile number list here.</p>
                </article>
            </aside>
           <div class="col-xxl-4 col-xl-4 gt-left-opt-msg">
                <a class="btn gt-btn-green btn-block hidden-xxl hidden-xl gt-margin-bottom-20" role="button"
                    data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Options <i class="fa fa-angle-down"></i>
                </a>
                <div class="collapse mobile-collapse" id="collapseExample">
                    <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                        <div class="gt-panel-head">
                            <div class="gt-panel-title text-center">
                                MESSAGES </div>
                        </div>
                        <div class="gt-left-pan-option">
                            <div class="row">
                                <a href="{{url("messages-inbox")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Inbox </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a>
                                <a href="{{url("messages-sent")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Outbox </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
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
                                <a href="{{url("my-profile")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    Edit Profile </a>
                                <a href="{{url("my-photos")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
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
                                <a href="{{url("my-interest")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Express Interest Received </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a>
                                <a href="{{url("sortlist-profiles")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            My Shortlist Profile </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                3 </div>
                                        </span>
                                    </div>
                                </a>
                                <a href="{{url("blocklist-profiles")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            My Blocklist Profile </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                1 </div>
                                        </span>
                                    </div>
                                </a>

                                <a href="{{url("profiles-view-by")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            My Profile Viewed By </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a>
                                <a href="{{url("i-view-profiles")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            I Visited Profile </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a>
                                <a href="{{url("mobile-numbers-view-by")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Mobile Numbers Viewed By  </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a>
                                <a href="{{url("i-view-mobile-numbers")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Mobile Numbers Viewed By Me </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a>

                                {{-- <a href="{{url("messages-sent")}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Photo Password Request Received
                                        </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-12 col-xs-16" bis_skin_checked="1">
								<div id="loaderID" style="position: fixed; left: 50%; top: 50%; z-index: -1; opacity: 0;" bis_skin_checked="1">
									<div class="col-lg-16 col-md-16 col-sm-16 btn gt-btn-orange" bis_skin_checked="1"><font class="gt-margin-left-5">Loding ...&nbsp;&nbsp;</font></div>
								 </div>	
								 <div id="pagination" bis_skin_checked="1">
<script type="text/javascript">
    function save_search() {
        $('#txt_saved_search_name').val('');
        $("#div_saved_search").show();
        $("#div_success").hide();
    }
    $(document).ready(function(e) {
        $('#sub_saved_search').click(function() {
            if($('#txt_saved_search_name').val() == '') {
                alert('Please fill up the saved search name.');
                return false;
            } else {
                var txt_saved_search_nm = $('#txt_saved_search_name').val();
                $.ajax({
                    type: "POST",
                    url: "saved_search_query",
                    data: 'saved_nm=' + txt_saved_search_nm,
                    success: function(data) {
                        $("#div_saved_search").hide();
                        $('#sub_saved_search').hide();
                        $("#div_success").show();
                        $("#div_success").html(data);
                    }
                });
            }
        });
    });
</script>        
<div class="alert alert-info" role="alert" bis_skin_checked="1">
    <div class="row" bis_skin_checked="1">
        <div class="col-xxl-16 col-xs-16" bis_skin_checked="1">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="col-xxl-16 col-xs-16" bis_skin_checked="1">
            <h4 class="">
                <i class="fa fa-star gt-text-blue gt-margin-right-10" aria-hidden="true"></i>Spotlight Profile            </h4>
            <p>Blue color profile is are spotlight profile which was showing top of the search result.Its gives 10 times faster results.</p>
            <p><span style="color:red;"><b>1</b></span> Profiles found </p>
        </div>
    </div>
</div>    
<li class="gt-panel gt-panel-default gt-panel-default gt-main-profile">
	<a href="member-profile?view_id=IN1" target="_blank" class="gt-panel-head">
    	<div class="row" bis_skin_checked="1">
      		<div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gridFullWidth gt-main-name" bis_skin_checked="1">
        		<h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
          		mokka mohan                ( IN1 )	
				</h4>
      		</div>
      		<div class="col-xxl-11 col-xl-11 col-lg-11 col-xs-16 text-right gridHidden" bis_skin_checked="1">
        		<h5 class="gt-margin-top-5 gt-margin-bottom-0">
         			Register On: 26 Aug 2022 ,03:41 AM        		</h5>
      		</div>
     	</div>
  	</a>
  	<a href="member-profile?view_id=IN1" target="_blank" class="gt-result-panel-body">
    	<div class="row gt-padding-bottom-15" bis_skin_checked="1">
			<div class="col-xxl-2 col-xl-2 col-xs-16 col-lg-3 gridFullWidth" bis_skin_checked="1">
				<div class="thumbnail gt-margin-bottom-0" bis_skin_checked="1">
				  	  
				<img src="./img/app_img/female-no-photo.jpg" title="mokka mohan" alt="IN1" class="img-responsive gtFullWidth">               
				                          						  

				</div>
			</div>
      		<div class="col-xxl-14 col-xl-14 col-xs-16 col-lg-13 gt-margin-top-10 gridFullWidth" bis_skin_checked="1">
        		<div class="row" bis_skin_checked="1">
          			<div class="redirect" bis_skin_checked="1">
            			<div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth" bis_skin_checked="1">
              				<p class="row gt-margin-bottom-0">
               		 			<label class="col-xs-7 ">Age :</label>
								<span class="col-xs-9">
								49 years 1 months  											
								</span>
              				</p>
            			</div>
            			<div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth" bis_skin_checked="1">
              				<p class="row gt-margin-bottom-0">
								<label class="col-xs-7 ">Height :</label>
								<span class="col-xs-9">
								5ft - 152cm								</span>
              				</p>
            			</div>
						<div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden " bis_skin_checked="1">
							<p class="row gt-margin-bottom-0">
								<label class="col-xs-7">Religion :</label>
								<span class="col-xs-9">
							  		Hindu								</span>
						  	</p>
						</div>
            			<div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
              				<p class="row gt-margin-bottom-0">
								<label class="col-xs-7">Caste :</label>
								<span class="col-xs-9">
								  Agarwal								</span>
              				</p>
            			</div>
            			<div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth" bis_skin_checked="1">
              				<p class="row gt-margin-bottom-0 ">
								<label class="col-xs-7 gridHidden">Location :</label>
								<span class="col-xs-9 gridFullWidth">
									Achhayyapalli, India								</span>
              				</p>
            			</div>
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                            <p class="row gt-margin-bottom-0">
                                <label class="col-xs-7">Education :</label>
                                <span class="col-xs-9">
                                     B Arch                                </span>
                            </p>
                        </div>
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                            <p class="row gt-margin-bottom-0">
                                <label class="col-xs-7">Mother Tongue :</label>
                                <span class="col-xs-9">
                                     Hindi                                </span>
                            </p>
                        </div>
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                            <p class="row gt-margin-bottom-0">
                                <label class="col-xs-7">Occupation :</label>
                                <span class="col-xs-9">
                                    Civil Engineer                                </span>
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
                <a href="composeMessages?user_id=IN1" class="btn btn-default btn-block inResultSendMessageBtn">
                    <i class="fas fa-envelope" aria-hidden="true"></i> Send Message                </a>
            </div>
            <div class="col-xxl-11 col-xl-11 col-lg-11 pull-right gridFullWidth" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gt-margin-top-10 gridFullWidth" bis_skin_checked="1">
                        	
                        <a data-toggle="modal" data-target="#myModal1" title="Send Interest" onclick="ExpressInterest('IN1')" class="btn gt-btn-orange btn-block">
                            <i class="fas fa-heart gt-margin-right-5" aria-hidden="true"></i>Send Interest                        </a>
                                            </div>
                                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-xs-16 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                        <a class="btn btn-default btn-block inResultBlockBtn gt-cursor 
                        addToshort-data" id="IN1" title="Add to Blocklist">
                            <i class="fas fa-ban gt-margin-right-5" aria-hidden="true"></i>Add to Blocklist                        </a>
                    </div>
                                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-xs-16 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                        <a class="btn btn-default btn-block inResultShortBtn gt-cursor addToshort-link" id="IN1" title="Add to Shortlist">
                            <i class="fa fa-sort gt-margin-right-5" aria-hidden="true"></i>Add to Shortlist                        </a>
                    </div>
                                    </div>
            </div>
        </div>
    </div>
</li><div class="modal fade-in" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1">
</div>  
<div class="modal fade-in" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1">
</div>   
<div class="modal fade-in" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1">
</div>   
<div class="modal fade-in" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1">
</div>   
<script src="js/function.js" type="text/javascript">
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1">
  <div class="modal-dialog " bis_skin_checked="1">
    <div class="modal-content" bis_skin_checked="1">
      <form name="saved_search_form" id="saved_search_form" method="post" action="">
        <div class="modal-header" bis_skin_checked="1">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">
            Saved Search          </h4>
        </div>
        <div class="modal-body" id="div_saved_search" bis_skin_checked="1">
          <h5 class="margin-bottom-15px" style="text-align:justify;">
          </h5>
          Saved Search Name :
          <div class="" bis_skin_checked="1">
            <input type="text" name="txt_saved_search_name" id="txt_saved_search_name" class="form-control">
          </div>
        </div>
        <div class="modal-body" id="div_success" bis_skin_checked="1">
        </div>
        <div class="modal-footer" bis_skin_checked="1">
          <input type="button" class="btn btn-default pull-right" data-dismiss="modal" value="Close">
          <input type="button" class="btn btn-default pull-right" id="sub_saved_search" value="Submit">
        </div>
      </form>
      <div class="clearfix" bis_skin_checked="1">
      </div>
    </div>
  </div>
</div> 
<style>
  nav.center-text
  {
    background:none;
  }
  .current {
    background: none repeat scroll 0 0 #428bca !important;
    color: #fff !important;
  }
</style>
</div>
								 <div class="clearfix" bis_skin_checked="1"></div>
							</div>
            <div class="col-xxl-12 col-xl-12 col-xs-16">
                <div id="loaderID" style="position:fixed;  left:50%; top:50%; z-index:-1; opacity:0">
                    <div class="col-lg-16 col-md-16 col-sm-16 btn gt-btn-orange">
                        <font class="gt-margin-left-5">Loding ...&nbsp;&nbsp;</font>
                    </div>
                </div>
                <div id="pagination"></div>
            </div>
        </div>
    </div>
    </div>
@endsection
