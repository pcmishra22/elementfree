<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="Document Organization Solutions" name="description" />
    <title>DocuFiler</title>
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="<?php echo base_url();?>images/assets/img/favicon.png">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="<?php echo base_url();?>css/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/plugins.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/colors/color-green.css" rel="stylesheet">
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link rel="stylesheet" href="<?php echo base_url();?>plugins/assets/plugins/datatables/dataTables.css">
    <!-- END PAGE LEVEL STYLE -->
    <script src="<?php echo base_url();?>plugins/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="<?php echo base_url();?>js/frontend/TreeMenu.js" type="text/javascript"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>plugins/assets/plugins/magnific/magnific-popup.css">
    <!-- END PAGE LEVEL STYLE -->
    <script src="<?php echo base_url();?>plugins/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body data-page="<?php echo $this->session->userdata('firstname');?>">
 
<!--=====================Yellow Header Section================================-->


    <!-- BEGIN TOP MENU -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="menu-medium" class="sidebar-toggle tooltips">
                    <i class="fa fa-outdent"></i>
                </a>
                <a class="navbar-brand" href="<?php echo base_url();?>users/dashboard"></a>
            </div>
            <div class="navbar-center">DocuFiler</div>
            <div class="navbar-collapse collapse">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right header-menu">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown" id="notifications-header">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="glyph-icon flaticon-notifications"></i>
                            <span class="badge badge-danger badge-header">6</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header clearfix">
                                <p class="pull-left">Notifications</p>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list withScroll" data-height="220">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star p-r-10 f-18 c-orange"></i>
                                            Steve have rated your photo
                                            <span class="dropdown-time">Just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-heart p-r-10 f-18 c-red"></i>
                                            John added you to his favs
                                            <span class="dropdown-time">15 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-file-text p-r-10 f-18"></i>
                                            New document available
                                            <span class="dropdown-time">22 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                                            New picture added
                                            <span class="dropdown-time">40 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-bell p-r-10 f-18 c-orange"></i>
                                            Meeting in 1 hour
                                            <span class="dropdown-time">1 hour</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-bell p-r-10 f-18"></i>
                                            Server 5 overloaded
                                            <span class="dropdown-time">2 hours</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-comment p-r-10 f-18 c-gray"></i>
                                            Bill comment your post
                                            <span class="dropdown-time">3 hours</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                                            New picture added
                                            <span class="dropdown-time">2 days</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-footer clearfix">
                                <a href="#" class="pull-left">See all notifications</a>
                                <a href="#" class="pull-right">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN MESSAGES DROPDOWN -->
                    <li class="dropdown" id="messages-header">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="glyph-icon flaticon-email"></i>
                            <span class="badge badge-primary badge-header">
                             8
                        </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header clearfix">
                                <p class="pull-left">
                                    Messages
                                </p>
                            </li>
                            <li class="dropdown-body">
                                <ul class="dropdown-menu-list withScroll" data-height="220">
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="<?php echo base_url();?>assets/img/avatars/avatar3.png" alt="avatar 3">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>Alexa Johnson</strong> 
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>12 mins ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="<?php echo base_url();?>assets/img/avatars/avatar4.png" alt="avatar 4">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>John Smith</strong> 
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>47 mins ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="<?php echo base_url();?>assets/img/avatars/avatar5.png" alt="avatar 5">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>Bobby Brown</strong> 
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>1 hour ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="<?php echo base_url();?>assets/img/avatars/avatar6.png" alt="avatar 6">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>James Miller</strong> 
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>2 days ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-footer clearfix">
                                <a href="<?php echo base_url();?>mailbox.html" class="pull-left">See all messages</a>
                                <a href="#" class="pull-right">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END MESSAGES DROPDOWN -->
                    <!-- BEGIN USER DROPDOWN -->
                    <li class="dropdown" id="user-header">
                        <a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img src="<?php echo base_url();?>assets/img/avatars/avatar2.png" alt="user avatar" width="30" class="p-r-5">
                            <span class="username"><?php echo $this->session->userdata('firstname');?></span>
                            <i class="fa fa-angle-down p-r-10"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url();?>profil.html">
                                    <i class="glyph-icon flaticon-account"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>calendar.html">
                                    <i class="glyph-icon flaticon-calendar"></i> My Calendar
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>profile_edit.html">
                                    <i class="glyph-icon flaticon-settings21"></i> Account Settings
                                </a>
                            </li>
                            <li class="dropdown-footer clearfix">
							<a href="<?php echo base_url();?>javascript:;" class="toggle_fullscreen" title="Fullscreen">
								<i class="glyph-icon flaticon-fullscreen3"></i>
							</a>
							<a href="<?php echo base_url();?>lockscreen.html" title="Lock Screen">
								<i class="glyph-icon flaticon-padlock23"></i>
							</a>
							<a href="<?php echo base_url();?>users/logout" title="Logout">
								<i class="fa fa-power-off"></i>
							</a>
						</li>
                        </ul>
                    </li>
                    <!-- END USER DROPDOWN -->
                    <!-- BEGIN CHAT HEADER -->
                    <li id="chat-header">
                        <a href="#" class="c-white" id="chat-toggle">
                            <i class="glyph-icon flaticon-speech76 f-24"></i>
                            <span id="chat-notification" class="notification notification-danger hide" data-delay="2000"></span>
                        </a>
                        <div id="chat-popup" class="chat-popup hide" data-delay="2000">
                            <div class="arrow-up"></div>
                            <div class="chat-popup-inner bg-blue">
                                <div>
                                    <div class="clearfix w-600">
                                        <img src="<?php echo base_url();?>assets/img/avatars/avatar3.png" alt="avatar 3" width="30" class="pull-left img-circle p-r-5">Alexa Johnson</div>
                                    <div class="message m-t-5">Hey you there?</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- END CHAT HEADER -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
    </nav>
    <!-- END TOP MENU -->
        <!-- BEGIN WRAPPER -->
    <div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
        <nav id="sidebar">
            <div id="main-menu">
                <ul class="sidebar-nav">
                    <li>
                        <a href="<?php echo base_url();?>users/dashboard"><i class="fa fa-dashboard"></i><span class="sidebar-text">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-circular116"></i><span class="sidebar-text">Upload Date</span>
                        <span class="fa arrow"></span><span class="label label-danger pull-right m-r-20 w-300">New</span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="<?php echo base_url();?>ecommerce_dashboard.html"><span class="sidebar-text">Today<span class="label label-dark pull-right">Hot</span></span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>ecommerce_products.html"><span class="sidebar-text">Yesterday</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>ecommerce_product_view.html"><span class="sidebar-text">This Week</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>ecommerce_orders.html"><span class="sidebar-text">This Month</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>ecommerce_order_view.html"><span class="sidebar-text">This Year</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>ecommerce_invoice.html"><span class="sidebar-text">Last Week</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>ecommerce_pricing.html"><span class="sidebar-text">Last Month</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>shopping_cart.html"><span class="sidebar-text">Last Year<span class="label label-danger pull-right">New</span></span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i><span class="sidebar-text">Docufiler</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="<?php echo base_url();?>files_list.html"><span class="sidebar-text">Document list<span class="label label-dark pull-right">Hot</span></span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>posts.html"><span class="sidebar-text">Folder2</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>post_edit.html"><span class="sidebar-text">Folder3</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>events.html"><span class="sidebar-text">Folder4</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>event_edit.html"><span class="sidebar-text">Folder5</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>blog-list.html"><span class="sidebar-text">Folder6</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>blog-single.html"><span class="sidebar-text">Folder7</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.html" target="_blank"><i class="glyph-icon flaticon-three91"></i><span class="sidebar-text">Miscelaneous</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-star105"></i><span class="sidebar-text">Extra</span>
                        <span class="fa arrow"></span><span class="label label-primary pull-right m-r-20 w-300">Hot</span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="<?php echo base_url();?>widgets.html"><i class="halflings-icon glass"></i><span class="sidebar-text">Widgets</span></a>
                                <ul class="submenu collapse">
                                	<li> 
                                	<a href="<?php echo base_url();?>widgets.html"><span class="sidebar-text">Widgets_sub1</span></a>
                                  </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>intro.html"><span class="sidebar-text">Intro</span></a>
                                <ul class="submenu collapse">
                                	<li> 
                                	<a href="<?php echo base_url();?>widgets.html"><span class="sidebar-text">Widgets_sub1</span></a>
                                  </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>coming_soon.html"><span class="sidebar-text">Coming Soon</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>notes.html"><span class="sidebar-text">Notes</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>calendar.html"><span class="sidebar-text">Calendar</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>maps.html"><span class="sidebar-text">Google Maps</span></a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-forms"></i><span class="sidebar-text">Upload Files</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                
                                <a href="<?php echo base_url();?>users/uploadfiles"><span class="sidebar-text">File Upload</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
  
                        <a href="#"><i class="glyph-icon flaticon-account"></i><span class="sidebar-text">Account</span><span class="fa arrow"></span></a>
                          <ul class="submenu collapse">
                            <li>
                                <a href="<?php echo base_url();?>profile_edit.html"><span class="sidebar-text">Profile Edit</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>login.html"><span class="sidebar-text">Login</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>signup.html"><span class="sidebar-text">Signup</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>password_forgot.html"><span class="sidebar-text">Password recover</span></a>
                            </li>
                       </ul>
                    </li>
                    <li class="current active hasSub">
                        <a href="#"><i class="glyph-icon flaticon-gallery"></i><span class="sidebar-text">Documents</span><span class="fa arrow"></span></a>
                         <ul class="submenu collapse">
                            <li>
                                <a href="<?php echo base_url();?>users/gallery"><span class="sidebar-text">Gallery</span></a>
                            </li>
                            <li >
                                <a href="<?php echo base_url();?>users/filespreview"><span class="sidebar-text">Files Preview</span></a>
                            </li>
                        </ul>    
                    </li>
                   
                </ul>                 
            </div>
            <div class="footer-widget">
                <div class="footer-gradient"></div>
                <div id="sidebar-charts">
                    <div class="sidebar-charts-inner">
                        <div class="sidebar-charts-left">
                            <div class="sidebar-chart-title">Total Documents</div>
                            <div class="sidebar-chart-number"><?php echo $this->session->userdata('totalfiles');?></div>
                        </div>
                        <div class="sidebar-charts-right" data-type="bar" data-color="theme">
                            <span class="dynamicbar1"></span>
                        </div>
                    </div>
                    <hr class="divider">
                    <div class="sidebar-charts-inner">
                        <div class="sidebar-charts-left">
                            <div class="sidebar-chart-title">Income</div>
                            <div class="sidebar-chart-number">$47,564</div>
                        </div>
                        <div class="sidebar-charts-right" data-type="bar" data-color="theme">
                            <span class="dynamicbar2"></span>
                        </div>
                    </div>
                    <hr class="divider">
                    <div class="sidebar-charts-inner">
                        <div class="sidebar-charts-left">
                            <div class="sidebar-chart-title">Visits</div>
                            <div class="sidebar-chart-number" id="number-visits">147,687</div>
                        </div>
                        <div class="sidebar-charts-right" data-type="bar" data-color="theme">
                            <span class="dynamicbar3"></span>
                        </div>
                    </div>
                </div>
                <div class="sidebar-footer clearfix">
                    <a class="pull-left" href="<?php echo base_url();?>profile_edit.html" data-rel="tooltip" data-placement="top" data-original-title="Settings"><i class="glyph-icon flaticon-settings21"></i></a>
                    <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen"><i class="glyph-icon flaticon-fullscreen3"></i></a>
                    <a class="pull-left" href="<?php echo base_url();?>users/logout" data-rel="tooltip" data-placement="top" data-original-title="Lockscreen"><i class="glyph-icon flaticon-padlock23"></i></a>
                    <a class="pull-left" href="<?php echo base_url();?>users/logout" data-rel="tooltip" data-placement="top" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
                </div> 
            </div>
        </nav>
        <!-- END MAIN SIDEBAR -->
    
<!--start of middle section-->

<?php echo $content;?>

<!--end of middle section--> 


    </div>
    <!-- END WRAPPER -->
    <!-- BEGIN CHAT MENU -->
    <nav id="menu-right">
        <ul>
            <li class="mm-label label-big">ONLINE</li>
            <li class="img no-arrow have-message">
                <span class="inside-chat">
                    <i class="online"></i>
                    <img src="<?php echo base_url();?>assets/img/avatars/avatar3.png" alt="avatar 3"/>
                    <span class="chat-name">Alexa Johnson</span>
                    <span class="pull-right badge badge-danger hide">3</span>
                    <span>Los Angeles</span>
                </span>
                <ul class="chat-messages">
                    <li class="img">
                        <span>
                            <span class="chat-detail">
                                <img src="<?php echo base_url();?>assets/img/avatars/avatar3.png" alt="avatar 3"/>
                                <span class="chat-bubble"><span class="bubble-inner">Hi you!</span></span>
                            </span>
                        </span>
                    </li>
                    <li class="img">
                        <span>
                            <span class="chat-detail">
                                <img src="<?php echo base_url();?>assets/img/avatars/avatar3.png" alt="avatar 3"/>
                                <span class="chat-bubble"><span class="bubble-inner">You there?</span></span>
                            </span>
                        </span>
                    </li>
                    <li class="img">
                        <span>
                            <span class="chat-detail">
                                <img src="<?php echo base_url();?>assets/img/avatars/avatar3.png" alt="avatar 3"/>
                                <span class="chat-bubble">
                                    <span class="bubble-inner">Let me know when you come back</span>
                                </span>
                            </span>
                        </span>
                    </li>
                    <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
            <li class="img no-arrow">
                <span class="inside-chat">
                    <i class="online"></i>
                    <img src="<?php echo base_url();?>assets/img/avatars/avatar2.png" alt="avatar 2"/>
                    <span class="chat-name">Bobby Brown</span>
                    <span>New York</span>
                </span>
                <ul class="chat-messages">
                    <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
            <li class="img no-arrow">
                <span class="inside-chat">
                    <i class="busy"></i>
                    <img src="<?php echo base_url();?>assets/img/avatars/avatar13.png" alt="avatar 13"/>
                    <span class="chat-name">Fred Smith</span>
                    <span>Atlanta</span>
                </span>
                <ul class="chat-messages">
                    <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
            <li class="img no-arrow">
                <span class="inside-chat">
                    <i class="away"></i>
                    <img src="<?php echo base_url();?>assets/img/avatars/avatar4.png" alt="avatar 4"/>
                    <span class="chat-name">James Miller</span>
                    <span>Seattle</span>
                </span>
                <ul class="chat-messages">
                    <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
            <li class="img no-arrow">
                <span class="inside-chat">
                    <i class="online"></i>
                    <img src="<?php echo base_url();?>assets/img/avatars/avatar5.png" alt="avatar 5"/>
                    <span class="chat-name">Jefferson Jackson</span>
                    <span>Los Angeles</span>
                </span>
                <ul class="chat-messages">
                    <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
            <li class="mm-label label-big m-t-30">OFFLINE</li>

            <li class="img no-arrow">
                <span class="inside-chat">
                    <i class="offline"></i>
                    <img src="<?php echo base_url();?>assets/img/avatars/avatar6.png" alt="avatar 6"/>
                    <span class="chat-name">Jordan</span>
                    <span>Savannah</span>
                </span>
                <ul class="chat-messages">
                   <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
            <li class="img no-arrow">
                <span class="inside-chat">
                    <i class="offline"></i>
                    <img src="<?php echo base_url();?>assets/img/avatars/avatar7.png" alt="avatar 7"/>
                    <span class="chat-name">Kim Addams</span>
                    <span>Birmingham</span>
                </span>
                <ul class="chat-messages">
                    <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
            <li class="img no-arrow">
                <span class="inside-chat">
                    <i class="offline"></i>
                    <img src="<?php echo base_url();?>assets/img/avatars/avatar8.png" alt="avatar 8"/>
                    <span class="chat-name">Meagan Miller</span>
                    <span>San Francisco</span>
                </span>
                <ul class="chat-messages">
                    <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
            <li class="img no-arrow">
                <span class="inside-chat">
                        <i class="offline"></i>
                        <img src="<?php echo base_url();?>assets/img/avatars/avatar9.png" alt="avatar 9"/>
                        <span class="chat-name">Melissa Johnson</span>
                        <span>Austin</span>
                    </span>
                <ul class="chat-messages">
                    <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
            <li class="img no-arrow">
                <span class="inside-chat">
                    <i class="offline"></i>
                    <img src="<?php echo base_url();?>assets/img/avatars/avatar12.png" alt="avatar 12"/>
                    <span class="chat-name">Nicole Smith</span>
                    <span>San Diego</span>
                </span>
                <ul class="chat-messages">
                    <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
            <li class="img no-arrow">
                <span class="inside-chat">
                    <i class="offline"></i>
                    <img src="<?php echo base_url();?>assets/img/avatars/avatar11.png" alt="avatar 11"/>
                    <span class="chat-name">Samantha Harris</span>
                    <span>Salt Lake City</span>
                </span>
                <ul class="chat-messages">
                    <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
            <li class="img no-arrow">
                <span class="inside-chat">
                    <i class="offline"></i>
                    <img src="<?php echo base_url();?>assets/img/avatars/avatar10.png" alt="avatar 10"/>
                    <span class="chat-name">Scott Thomson</span>
                    <span>Los Angeles</span>
                </span>
                <ul class="chat-messages">
                    <li>
                        <span class="chat-input">
                            <input type="text" class="form-control send-message" placeholder="Type your message" />
                        </span>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- END CHAT MENU -->
 
    <!-- BEGIN MANDATORY SCRIPTS -->
    <script src="<?php echo base_url();?>plugins/assets/plugins/jquery-1.11.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jquery-migrate-1.2.1.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/mmenu/js/jquery.mmenu.min.all.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/nprogress/nprogress.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/charts-sparkline/sparkline.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/breakpoints/breakpoints.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/numerator/jquery-numerator.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
    <!-- END MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url();?>plugins/assets/plugins/magnific/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/gallery-mixitup/jquery.mixitup.js"></script>
    <script src="<?php echo base_url();?>js/assets/js/gallery.js"></script>
        <!-- END  PAGE LEVEL SCRIPTS -->  
    <script src="<?php echo base_url();?>js/assets/js/application.js"></script>




</body>
</html>
