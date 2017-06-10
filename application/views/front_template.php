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
    <title>ElementFree</title>
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="<?php echo base_url();?>images/assets/img/favicon.png">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="<?php echo base_url();?>css/assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/plugins.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/colors/color-green.css" rel="stylesheet">
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link rel="stylesheet" href="<?php echo base_url();?>plugins/assets/plugins/datatables/dataTables.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>plugins/assets/plugins/datatables/dataTables.tableTools.css"> -->
    <!-- END PAGE LEVEL STYLE -->
    <script src="<?php echo base_url();?>plugins/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!--		<script src="<?php echo base_url();?>js/frontend/TreeMenu.js" type="text/javascript"></script> -->
    <link href="<?php echo base_url();?>plugins/assets/plugins/magnific/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo base_url();?>plugins/assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>plugins/assets/plugins/metrojs/metrojs.css" rel="stylesheet">          
    <link href="<?php echo base_url();?>plugins/assets/plugins/intro/introjs.css" rel="stylesheet">           
    <script src="<?php echo base_url();?>js/assets/js/intro.js"></script>
     <!-- END PAGE LEVEL STYLE -->
     <!-- Start of elementfree Zendesk Widget script -->
    <script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(e){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var o=this.createElement("script");n&&(this.domain=n),o.id="js-iframe-async",o.src=e,this.t=+new Date,this.zendeskHost=t,this.zEQueue=a,this.body.appendChild(o)},o.write('<body onload="document._l();">'),o.close()}("https://assets.zendesk.com/embeddable_framework/main.js","elementfree.zendesk.com");
    /*]]>*/</script>
    <!-- End of elementfree Zendesk Widget script -->
    <style>
        .infotour:before { color: #fff; font-size: 22px; }
        .infotour { margin-top: -1px; }
    </style>
    <script>
        function callintrotour() {
            $("html, body").animate({
                scrollTop: 0
            }, 100);
            var intro = introJs();
            intro.setOptions({
                showBullets : true,
                exitOnEsc : true,
                steps: [
                    {
                        element: '#sidebar', position: "right",
                        intro: "Use this menu to navigate through your categories."
                    },{
                        element: '#panel-plan', position: "bottom",
                        intro: "This panel shows your plan, plan status, and how many more documents you can add."
                    },{
                        element: '#panel-devices', position: "bottom",
                        intro: "This panel shows you how many devices, accounts and invitations you have."
                    },{
                        element: '#panel-docstats', position: "bottom",
                        intro: "Here you can see your documents statistics compared to last week."
                    },{
                        element: '#panel-account', position: "bottom",
                        intro: "This panel shows your account status, autosync status, and how many files were synced automatically."
                    }
                ]
            });
            intro.start();
        }
    </script>
</head>

<body data-page="<?php echo $this->session->userdata('firstname');?>">

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
                <a class="navbar-brand" href="<?php echo base_url();?>users/intro"></a>
            </div>
            <div class="navbar-center"><img src="<?php echo base_url();?>images/assets/img/account/login-logo.png" style="height: 1.8vw; width: 20%;"></div>
            <div class="navbar-collapse collapse">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right header-menu">
                    <!-- BEGIN TOUR DROPDOWN -->
                    <li class="dropdown" id="notifications-header">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" onclick="callintrotour();">
                            <i class="glyphicon glyphicon-info-sign infotour" data-title="Tour" title="Tour"></i>
                            <span class="badge badge-danger badge-header">Tour</span>
                        </a>
                    </li>
                    <!-- END TOUR DROPDOWN -->
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
                  <!-- /*  <li class="dropdown" id="messages-header">
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
                                            <img src="<?php echo base_url();?>images/assets/img/avatars/avatar3.png" alt="avatar 3">
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
                                            <img src="<?php echo base_url();?>images/assets/img/avatars/avatar4.png" alt="avatar 4">
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
                                            <img src="<?php echo base_url();?>images/assets/img/avatars/avatar5.png" alt="avatar 5">
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
                                            <img src="<?php echo base_url();?>images/assets/img/avatars/avatar6.png" alt="avatar 6">
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
                   */ -->
                    <!-- END MESSAGES DROPDOWN -->
                    <!-- BEGIN USER DROPDOWN E-->
                    <li class="dropdown" id="user-header">
                        <a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img src="<?php echo base_url();?>images/assets/img/avatars/avatar2.png" alt="user avatar" width="30" class="p-r-5">
                            <span class="username"><?php echo $this->session->userdata('firstname');?></span>
                            <i class="fa fa-angle-down p-r-10"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url();?>users/myprofile">
                                    <i class="glyph-icon flaticon-account"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>profile_edit.html">
                                    <i class="glyph-icon flaticon-settings21"></i> Account Settings
                                </a>
                            </li>
                            <li class="dropdown-footer clearfix">
							<!-- <a href="<?php echo base_url();?>javascript:;" class="toggle_fullscreen" title="Fullscreen">
								<i class="glyph-icon flaticon-fullscreen3"></i>
							</a>
							<a href="<?php echo base_url();?>lockscreen.html" title="Lock Screen">
								<i class="glyph-icon flaticon-padlock23"></i>
							</a> -->
                                <a><i></i></a> <a><i></i></a>
							<a href="<?php echo base_url();?>users/logout" title="Logout">
								<i class="fa fa-power-off"></i>
							</a>
						</li>
                        </ul>
                    </li>
                    <!-- END USER DROPDOWN -->
                    <!-- BEGIN CHAT HEADER -->
                    <li id="chat-header">
                     <!--   <a href="#" class="c-white" id="chat-toggle">
                            <i class="glyph-icon flaticon-speech76 f-24"></i>
                            <span id="chat-notification" class="notification notification-danger hide" data-delay="2000"></span>
                        </a>
                        <div id="chat-popup" class="chat-popup hide" data-delay="2000">
                            <div class="arrow-up"></div>
                            <div class="chat-popup-inner bg-blue">
                                <div>
                                    <div class="clearfix w-600">
                                        <img src="<?php echo base_url();?>images/assets/img/avatars/avatar3.png" alt="avatar 3" width="30" class="pull-left img-circle p-r-5">Alexa Johnson</div>
                                    <div class="message m-t-5">Hey you there?</div>
                                </div>
                            </div>
                        </div> -->
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
        
        <!-- END MAIN SIDEBAR -->
    
<!--start of middle section-->

<?php echo $content;?>

<!--end of middle section--> 


    </div>
    <!-- END WRAPPER -->
    
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
    <script src="<?php echo base_url();?>plugins/assets/plugins/bootstrap-switch/bootstrap-switch.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/datatables/dynamic/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/datatables/dataTables.tableTools.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/datatables/table.editable.js"></script> 
    <!--<script src="<?php echo base_url();?>js/assets/js/table_editable.js"></script>-->
    <script src="<?php echo base_url();?>js/assets/js/table_dynamic.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jstree/jstree.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jstree/jstree.types.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jstree/jstree.dnd.js"></script>
    <script src="<?php echo base_url();?>js/assets/js/tree_view.js"></script>
        <!-- END  PAGE LEVEL SCRIPTS -->  
    <script src="<?php echo base_url();?>js/assets/js/application.js"></script>

    <!-- BEGIN INTRO SCRIPTS -->
    <script src="<?php echo base_url();?>plugins/assets/plugins/metrojs/metrojs.min.js"></script>
    <script src='<?php echo base_url();?>plugins/assets/plugins/fullcalendar/moment.min.js'></script>
    <script src='<?php echo base_url();?>plugins/assets/plugins/fullcalendar/fullcalendar.min.js'></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/google-maps/markerclusterer.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/google-maps/gmaps.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/charts-flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/charts-flot/jquery.flot.animator.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/charts-flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/charts-flot/jquery.flot.time.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/charts-morris/raphael.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/charts-morris/morris.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo base_url();?>js/assets/js/calendar.js"></script>
    <script src="<?php echo base_url();?>js/assets/js/dashboard.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/intro/intro.js"></script>
    <script src="<?php echo base_url();?>js/assets/js/intro.js"></script>
    <!-- END INTRO SCRIPTS -->
    <script src="<?php echo base_url();?>js/assets/js/application.js"></script>
</body>
</html>
