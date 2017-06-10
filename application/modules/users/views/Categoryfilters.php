<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>Pixit - Responsive Boostrap3 Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/plugins.min.css" rel="stylesheet">
    <link href="assets/css/style.min.css" rel="stylesheet">
    <link href="#" rel="stylesheet" id="theme-color">
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="assets/plugins/datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
    <link href="assets/plugins/pickadate/themes/default.css" rel="stylesheet">
    <link href="assets/plugins/pickadate/themes/default.date.css" rel="stylesheet">
    <link href="assets/plugins/pickadate/themes/default.time.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
    <script src="assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body data-page="forms">
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
                <a class="navbar-brand" href="index.html"></a>
            </div>
            <div class="navbar-center">Forms</div>
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
                                            <img src="assets/img/avatars/avatar3.png" alt="avatar 3">
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
                                            <img src="assets/img/avatars/avatar4.png" alt="avatar 4">
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
                                            <img src="assets/img/avatars/avatar5.png" alt="avatar 5">
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
                                            <img src="assets/img/avatars/avatar6.png" alt="avatar 6">
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
                                <a href="mailbox.html" class="pull-left">See all messages</a>
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
                            <img src="assets/img/avatars/avatar2.png" alt="user avatar" width="30" class="p-r-5">
                            <span class="username">Bob Nilson</span>
                            <i class="fa fa-angle-down p-r-10"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="profil.html">
                                    <i class="glyph-icon flaticon-account"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="calendar.html">
                                    <i class="glyph-icon flaticon-calendar"></i> My Calendar
                                </a>
                            </li>
                            <li>
                                <a href="profil_edit.html">
                                    <i class="glyph-icon flaticon-settings21"></i> Account Settings
                                </a>
                            </li>
                            <li class="dropdown-footer clearfix">
                                <a href="javascript:;" class="toggle_fullscreen" title="Fullscreen">
                                    <i class="glyph-icon flaticon-fullscreen3"></i>
                                </a>
                                <a href="lockscreen.html" title="Lock Screen">
                                    <i class="glyph-icon flaticon-padlock23"></i>
                                </a>
                                <a href="login.html" title="Logout">
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
                                        <img src="assets/img/avatars/avatar3.png" alt="avatar 3" width="30" class="pull-left img-circle p-r-5">Alexa Johnson</div>
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
                        <a href="index.html"><i class="fa fa-dashboard"></i><span class="sidebar-text">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-shopping80"></i><span class="sidebar-text">eCommerce</span>
                        <span class="fa arrow"></span><span class="label label-danger pull-right m-r-20 w-300">New</span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="ecommerce_dashboard.html"><span class="sidebar-text">Dashboard<span class="label label-dark pull-right">Hot</span></span></a>
                            </li>
                            <li>
                                <a href="ecommerce_products.html"><span class="sidebar-text">Products</span></a>
                            </li>
                            <li>
                                <a href="ecommerce_product_view.html"><span class="sidebar-text">Product View</span></a>
                            </li>
                            <li>
                                <a href="ecommerce_orders.html"><span class="sidebar-text">Orders</span></a>
                            </li>
                            <li>
                                <a href="ecommerce_order_view.html"><span class="sidebar-text">Order View</span></a>
                            </li>
                            <li>
                                <a href="ecommerce_invoice.html"><span class="sidebar-text">Invoice</span></a>
                            </li>
                            <li>
                                <a href="ecommerce_pricing.html"><span class="sidebar-text">Pricing Tables</span></a>
                            </li>
                            <li>
                                <a href="shopping_cart.html"><span class="sidebar-text">Shopping Cart<span class="label label-danger pull-right">New</span></span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i><span class="sidebar-text">Blogging</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="blog_dashboard.html"><span class="sidebar-text">Dashboard<span class="label label-dark pull-right">Hot</span></span></a>
                            </li>
                            <li>
                                <a href="posts.html"><span class="sidebar-text">Articles</span></a>
                            </li>
                            <li>
                                <a href="post_edit.html"><span class="sidebar-text">Article View</span></a>
                            </li>
                            <li>
                                <a href="events.html"><span class="sidebar-text">Events</span></a>
                            </li>
                            <li>
                                <a href="event_edit.html"><span class="sidebar-text">Event View</span></a>
                            </li>
                            <li>
                                <a href="blog-list.html"><span class="sidebar-text">Blog List</span></a>
                            </li>
                            <li>
                                <a href="blog-single.html"><span class="sidebar-text">Blog Single</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../frontend/index.html" target="_blank"><i class="glyph-icon flaticon-frontend"></i><span class="sidebar-text">Frontend</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-star105"></i><span class="sidebar-text">Extra</span>
                        <span class="fa arrow"></span><span class="label label-primary pull-right m-r-20 w-300">Hot</span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="widgets.html"><span class="sidebar-text">Widgets</span></a>
                            </li>
                            <li>
                                <a href="intro.html"><span class="sidebar-text">Intro</span></a>
                            </li>
                            <li>
                                <a href="coming_soon.html"><span class="sidebar-text">Coming Soon</span></a>
                            </li>
                            <li>
                                <a href="notes.html"><span class="sidebar-text">Notes</span></a>
                            </li>
                            <li>
                                <a href="calendar.html"><span class="sidebar-text">Calendar</span></a>
                            </li>
                            <li>
                                <a href="maps.html"><span class="sidebar-text">Google Maps</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-pencil"></i><span class="sidebar-text">Colors Options</span>
                            <span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="#" data-style="dark" class="theme-color"><span class="sidebar-text">Dark Skin</span></a>
                            </li>
                            <li>
                                <a href="#" data-style="light" class="theme-color"><span class="sidebar-text">Light Skin</span></a>
                            </li>
                            <li>
                                <a href="#" data-style="cafe" class="theme-color"><span class="sidebar-text">Cafe Skin</span></a>
                            </li>
                            <li>
                                <a href="#" data-style="blue" class="theme-color"><span class="sidebar-text">Blue Skin</span></a>
                            </li>
                            <li>
                                <a href="#" data-style="red" class="theme-color"><span class="sidebar-text">Red Skin</span></a>
                            </li>
                            <li>
                                <a href="#" data-style="green" class="theme-color"><span class="sidebar-text">Green Skin</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-email"></i><span class="sidebar-text">Email</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="mailbox.html"><span class="sidebar-text">Inbox</span></a>
                            </li>
                            <li>
                                <a href="email_compose.html"><span class="sidebar-text">Write a Message</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="active current hasSub">
                        <a href="#"><i class="glyph-icon flaticon-forms"></i><span class="sidebar-text">Forms</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li class="current">
                                <a href="forms.html"><span class="sidebar-text">Form Elements</span></a> 
                            </li>
                            <li>
                                <a href="form_validation.html"><span class="sidebar-text">Form Validation</span></a>
                            </li>
                            <li>
                                <a href="form_wizards.html"><span class="sidebar-text">Form Wizards</span></a>
                            </li>
                            <li>
                                <a href="sliders.html"><span class="sidebar-text">Sliders</span></a>
                            </li>
                            <li>
                                <a href="wysiwyg.html"><span class="sidebar-text">Editors</span></a>
                            </li>
                            <li>
                                <a href="file_upload.html"><span class="sidebar-text">File Upload</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-ui-elements2"></i><span class="sidebar-text">UI Elements</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="components.html"><span class="sidebar-text">Components</span></a>
                            </li>
                            <li>
                                <a href="animations.html"><span class="sidebar-text">Animations CSS3</span></a>
                            </li>
                            <li>
                                <a href="buttons.html"><span class="sidebar-text">Buttons</span></a>
                            </li>
                            <li>
                                <a href="icons.html"><span class="sidebar-text">Icons</span></a>
                            </li>
                            <li>
                                <a href="typography.html"><span class="sidebar-text">Typography</span></a>
                            </li>
                            <li>
                                <a href="modals.html"><span class="sidebar-text">Modals</span></a>
                            </li>
                            <li>
                                <a href="notifications.html"><span class="sidebar-text">Notifications</span></a>
                            </li>
                            <li>
                                <a href="tabs_accordion.html"><span class="sidebar-text">Tabs &amp; Accordion</span></a>
                            </li>
                            <li>
                                <a href="nestable-list.html"><span class="sidebar-text">Nestable &amp; Sortable lists</span></a>
                            </li>
                            <li>
                                <a href="tree.html"><span class="sidebar-text">Tree View</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-pages"></i><span class="sidebar-text">Pages</span><span class="fa arrow"></span>
                            <span class="label label-danger pull-right m-r-20 w-300">New</span>
                        </a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="timeline.html"><span class="sidebar-text">Timeline</span></a>
                            </li>
                            <li>
                                <a href="forum.html"><span class="sidebar-text">Forum<span class="label label-dark pull-right">New</span></span></a>
                            </li>
                            <li>
                                <a href="members.html"><span class="sidebar-text">Members</span></a>
                            </li>
                            <li>
                                <a href="search_results.html"><span class="sidebar-text">Search Results<span class="label label-danger pull-right">New</span></span></a>
                            </li>
                            <li>
                                <a href="contact.html"><span class="sidebar-text">Contact<span class="label label-danger pull-right">New</span></span></a>
                            </li>
                            <li>
                                <a href="comments.html"><span class="sidebar-text">Comments</span></a>
                            </li>
                            <li>
                                <a href="faq.html"><span class="sidebar-text">FAQ</span></a>
                            </li>
                            <li>
                                <a href="404.html"><span class="sidebar-text">404 Error Page</span></a>
                            </li>
                            <li>
                                <a href="500.html"><span class="sidebar-text">500 Error Page</span></a>
                            </li>
                            <li>
                                <a href="blank_page.html"><span class="sidebar-text">Blank Page</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-panels"></i><span class="sidebar-text">Panels</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="panels.html"><span class="sidebar-text">Custom Panels</span></a>
                            </li>
                            <li>
                                <a href="panels_draggable.html"><span class="sidebar-text">Draggable Panels</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i><span class="sidebar-text">Tables</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="tables.html"><span class="sidebar-text">Style Tables</span></a>
                            </li>
                            <li>
                                <a href="tables_editable.html"><span class="sidebar-text">Editable Tables</span></a>
                            </li>
                            <li>
                                <a href="tables_dynamic.html"><span class="sidebar-text">Dynamic Tables</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-account"></i><span class="sidebar-text">Account</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="profil.html"><span class="sidebar-text">User Profile</span></a>
                            </li>
                            <li>
                                <a href="profil_edit.html"><span class="sidebar-text">Profil Edit</span></a>
                            </li>
                            <li>
                                <a href="login.html"><span class="sidebar-text">Login</span></a>
                            </li>
                            <li>
                                <a href="signup.html"><span class="sidebar-text">Signup</span></a>
                            </li>
                            <li>
                                <a href="password_forgot.html"><span class="sidebar-text">Password recover</span></a>
                            </li>
                            <li>
                                <a href="lockscreen.html"><span class="sidebar-text">Lockscreen</span></a>
                            </li>
                            <li>
                                <a href="session_timeout.html"><span class="sidebar-text">Session Timeout</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyph-icon flaticon-gallery"></i><span class="sidebar-text">Images Manager</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">
                            <li>
                                <a href="gallery.html"><span class="sidebar-text">Gallery</span></a>
                            </li>
                            <li>
                                <a href="medias.html"><span class="sidebar-text">Medias</span></a>
                            </li>
                            <li>
                                <a href="image_croping.html"><span class="sidebar-text">Image Croping</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="m-b-245">
                        <a href="charts.html"><i class="glyph-icon flaticon-charts2"></i><span class="sidebar-text">Charts</span><span class="pull-right label label-primary">6</span></a>
                    </li>
                </ul>
            </div>
            <div class="footer-widget">
                <div class="footer-gradient"></div>
                <div id="sidebar-charts">
                    <div class="sidebar-charts-inner">
                        <div class="sidebar-charts-left">
                            <div class="sidebar-chart-title">Orders</div>
                            <div class="sidebar-chart-number">1,256</div>
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
                    <a class="pull-left" href="profil_edit.html" data-rel="tooltip" data-placement="top" data-original-title="Settings"><i class="glyph-icon flaticon-settings21"></i></a>
                    <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen"><i class="glyph-icon flaticon-fullscreen3"></i></a>
                    <a class="pull-left" href="lockscreen.html" data-rel="tooltip" data-placement="top" data-original-title="Lockscreen"><i class="glyph-icon flaticon-padlock23"></i></a>
                    <a class="pull-left" href="login.html" data-rel="tooltip" data-placement="top" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
                </div>
            </div>
        </nav>
        <!-- END MAIN SIDEBAR -->
        <!-- BEGIN MAIN CONTENT -->
        <div id="main-content" class="form-page">
            <div class="page-title">
                <h3><strong>Beautiful</strong> Form Elements</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Checkbox</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3><strong>Normal</strong> style</h3>
                                    <p>You want beautiful and original checkbox mobile friendly?</p>
                                    <br>
                                    <div class="row-fluid">
                                        <label>
                                            <input type="checkbox" checked>Checkbox checked
                                        </label>                                    
                                    </div>
                                    <div class="row-fluid">
                                        <label>
                                            <input type="checkbox">Checkbox unchecked
                                        </label>
                                    </div>
                                    <div class="row-fluid">
                                        <label>
                                            <input type="checkbox" disabled>Disabled
                                        </label>
                                    </div>
                                    <div class="row-fluid">
                                         <label>
                                            <input type="checkbox" checked disabled>Checked disabled
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h3><strong>Black</strong> skin</h3>
                                    <p>You can easily customize color adding <code>data-theme</code> attribute to an input</p>
                                    <br>
                                    <div class="row-fluid">
                                        <label>
                                            <input type="checkbox" data-theme="b" checked>Checkbox checked
                                        </label>
                                    </div>
                                    <div class="row-fluid">
                                        <label>
                                            <input type="checkbox" data-theme="b">Check uncheched
                                        </label>
                                    </div>
                                    <div class="row-fluid">
                                        <label>
                                            <input type="checkbox" disabled data-theme="b">Disabled
                                        </label>
                                    </div>
                                    <div class="row-fluid">
                                         <label>
                                            <input type="checkbox" checked disabled data-theme="b">Checked disabled
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="skin skin-minimal">
                                        <h3><strong>Horizontal</strong> group</h3>
                                        <p>Simple and beautiful checkbox for your forms.</p>
                                        <br>
                                        <div>
                                            <form>
                                                <fieldset data-role="controlgroup" data-type="horizontal">
                                                    <input type="checkbox" name="checkbox-h-1" id="checkbox-h-2a" value="on">
                                                    <label for="checkbox-h-2a">One</label>
                                                    <input type="checkbox" name="checkbox-h-1" id="checkbox-h-2b" value="off" checked="checked">
                                                    <label for="checkbox-h-2b">Two</label>
                                                    <input type="checkbox" name="checkbox-h-1" id="checkbox-h-2c" value="other">
                                                    <label for="checkbox-h-2c">Three</label>
                                                </fieldset>
                                            </form>
                                            <form class="m-t-30">
                                                <fieldset data-role="controlgroup" data-theme="b" data-type="horizontal">
                                                    <input type="checkbox" name="checkbox-h-2" id="radio-choice-t-6a" value="on" checked="checked">
                                                    <label for="radio-choice-t-6a">One</label>
                                                    <input type="checkbox" name="checkbox-h-2" id="radio-choice-t-6b" value="off">
                                                    <label for="radio-choice-t-6b">Two</label>
                                                    <input type="checkbox" name="checkbox-h-2" id="radio-choice-t-6c" value="other">
                                                    <label for="radio-choice-t-6c">Three</label>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Text Inputs</strong> Elements</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-label"><strong>Short text</strong> element</label>
                                        <span class="tips"> like "name, email, address"</span>
                                        <div class="controls">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"><strong>Password</strong>
                                        </label>
                                        <span class="tips">to hide content for security</span>
                                        <div class="controls">
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"><strong>Placeholder</strong>
                                        </label>
                                        <span class="tips">to explain element</span>
                                        <div class="controls">
                                            <input type="text" placeholder="What you want" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"><strong>Disabled</strong> element</label>
                                        <span class="tips">you can't edit me!</span>
                                        <div class="controls">
                                            <input type="text" placeholder="What you want" class="form-control" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Radio <strong>Button</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 m-b-40">
                                    <h3>Choose your skin</h3>
                                    <p class="m-b-60">You can change color too adding <code>data-theme</code> attribute.</p>
                                    <div class="skin">
                                        <div class="form-group">
                                            <div class="skin-section">
                                                <ul class="list col-md-6">
                                                    <li class="m-b-20">
                                                        <label>
                                                            <input type="radio" name="radio-choice-0" checked>One
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label>
                                                            <input type="radio" name="radio-choice-1" data-theme="b">One
                                                        </label>
                                                    </li>
                                                </ul>

                                                <ul class="list col-md-6">
                                                    <li class="m-b-20">
                                                        <label>
                                                            <input type="radio" name="radio-choice-0">One
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label>
                                                            <input type="radio" name="radio-choice-1" data-theme="b" checked>Two
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Size</strong> Inputs</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row-fluid">
                                <div class="span8">
                                    <h3><strong>3 Sizes</strong> different </h3>
                                    <p>You can change input size by adding a class such as <code>input-lg</code> for a big input size.</p>
                                    <br>
                                    <br>
                                    <input class="form-control input-lg" type="text" placeholder="Large size">
                                    <br>
                                    <br>
                                    <input class="form-control" type="text" placeholder="Medium size">
                                    <br>
                                    <br>
                                    <input class="form-control input-sm" type="text" placeholder="Small size">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Before / After</strong> components</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row-fluid">
                                <h3><strong>Customize</strong> Your Inputs</h3>
                                <p>Adding on top of existing browser controls, Bootstrap includes other useful form components. Add text or buttons before or after any text-based input. Do note that select elements are not supported here.</p>
                                <br>
                                <div class="input-group transparent">
                                    <span class="input-group-addon bg-blue">
                                      <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Enter your name">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon bg-blue">           
                                      <i class="fa fa-sign-in"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Sign in">
                                </div>
                                <br>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password">
                                    <span class="input-group-addon bg-blue">     
                                        <span class="arrow"></span>
                                        <i class="fa fa-lock"></i> 
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Select</strong> Dropdowns</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3><strong>Size</strong> Options</h3>
                                    <p>Customize the size of your select input.</p>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12 m-b-20">
                                            <p class="m-b-20"><strong>Small Input</strong> with data-style <code>input-sm</code>.</p>
                                            <select class="form-control" data-style="input-sm btn-default">
                                                <option>Hot Dog, Fries and Soda</option>
                                                <option>Burger, Shake and Smile</option>
                                                <option>Sugar, Spice and ketchup</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <p class="m-b-20"><strong>Normal input</strong>
                                            </p>
                                            <select class="form-control">
                                                <option>Hot Dog, Fries and Soda</option>
                                                <option>Burger, Shake and Smile</option>
                                                <option>Sugar, Spice and ketchup</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="m-b-20"><strong>Large input</strong> with data-style <code>input-lg</code>.</p>
                                            <select class="form-control" data-style="input-lg btn-default">
                                                <option>Hot Dog, Fries and Soda</option>
                                                <option>Burger, Shake and Smile</option>
                                                <option>Sugar, Spice and ketchup</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h3><strong>Color</strong> Options</h3>
                                    <p>Change color very easily to desgin your input.</p>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="m-b-20"><strong>Customize color with</strong>  <code>data-style="btn-yourcolor"</code>
                                            </p>
                                        </div>
                                        <div class="col-md-6 m-b-20">
                                            <select class="form-control" data-style="btn-primary">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 m-b-20">
                                            <select class="form-control" data-style="btn-danger">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 m-b-20">
                                            <select class="form-control" data-style="btn-success">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 m-b-20">
                                            <select class="form-control" data-style="btn-info">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 m-b-20">
                                            <select class="form-control" data-style="btn-warning">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 m-b-20">
                                            <select class="form-control" data-style="btn-dark">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h3><strong>Options</strong> available</h3>
                                    <p>You can add various options to your select input.</p>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12 m-b-20">
                                            <p class="m-b-20"><strong>Options group</strong>
                                            </p>
                                            <select class="form-control">
                                                <optgroup label="Picnic">
                                                    <option>Mustard</option>
                                                    <option>Ketchup</option>
                                                    <option>Relish</option>
                                                </optgroup>
                                                <optgroup label="Camping">
                                                    <option>Tent</option>
                                                    <option>Flashlight</option>
                                                    <option>Toilet Paper</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <p class="m-b-20"><strong>Search input</strong> by passing <code>data-live-search="true"</code>
                                            </p>
                                            <select class="form-control" data-live-search="true">
                                                <option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                <option value="South Sudan">South Sudan</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan, Republic of China">Taiwan, Republic of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <p><strong>Arrow style</strong> for dropdown menu</p>
                                            <select class="form-control show-menu-arrow">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top m-t-40">
                                <div class="col-md-4">
                                    <h3><strong>Multiple</strong> Selection</h3>
                                    <p>Multiple selection with check icon.</p>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12 m-b-20">
                                            <p class="m-b-20"><strong>Multiple titles</strong>
                                            </p>
                                            <select class="form-control" multiple title="Choose one or more">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                                <option>Tent</option>
                                                <option>Flashlight</option>
                                                <option>Toilet Paper</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <p class="m-b-20"><strong>Counter style</strong>
                                            </p>
                                            <select class="form-control" multiple data-selected-text-format="count">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                                <option>Tent</option>
                                                <option>Flashlight</option>
                                                <option>Toilet Paper</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="m-b-20"><strong>Mix titles and counter</strong>
                                            </p>
                                            <select class="form-control" multiple data-selected-text-format="count>3">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                                <option>Tent</option>
                                                <option>Flashlight</option>
                                                <option>Toilet Paper</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h3><strong>Labels</strong> &amp; Subtext</h3>
                                    <p>You can add labels and subtitles to each option.</p>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12 m-b-20">
                                            <p class="m-b-20"><strong>Bootstrap Icons</strong> with <code>data-icon</code>
                                            </p>
                                            <select class="form-control">
                                                <option data-icon="fa-glass">Mustard</option>
                                                <option data-icon="fa-heart c-red">Ketchup</option>
                                                <option data-icon="fa-film c-blue">Relish</option>
                                                <option data-icon="fa-home">Mayonnaise</option>
                                                <option data-icon="fa-print">Barbecue Sauce</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <p class="m-b-20"><strong>Labels style</strong> with <code>data-content</code>
                                            </p>
                                            <select class="form-control">
                                                <option data-content="<span class='label label-warning'>Mustard</span>">Mustard</option>
                                                <option data-content="<span class='label label-danger'>Ketchup</span>">Ketchup</option>
                                                <option data-content="<span class='label label-success'>Relish</span>">Relish</option>
                                                <option data-content="<span class='label label-primary'>Relish</span>">Mayonnaise</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="m-b-20"><strong>Subtext</strong> with <code>data-subtext</code>
                                            </p>
                                            <select class="form-control" title="Select a condiment...">
                                                <option>&nbsp;</option>
                                                <option data-subtext="French's">Mustard</option>
                                                <option data-subtext="Heinz">Ketchup</option>
                                                <option data-subtext="Sweet">Relish</option>
                                                <option data-subtext="Miracle Whip">Mayonnaise</option>
                                                <option data-divider="true">&nbsp;</option>
                                                <option data-subtext="Honey">Barbecue Sauce</option>
                                                <option data-subtext="Ranch">Salad Dressing</option>
                                                <option data-subtext="Sweet &amp; Spicy">Tabasco</option>
                                                <option data-subtext="Chunky">Salsa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h3><strong>Options</strong> available</h3>
                                    <p>You can add various options to your select input.</p>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="m-b-20"><strong>Disabled</strong> all or options</p>
                                        </div>
                                        <div class="col-md-6 m-b-20">
                                            <select class="form-control" disabled>
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Tent</option>
                                                <option>Flashlight</option>
                                                <option>Toilet Paper</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 m-b-20">
                                            <select class="form-control">
                                                <option>Mustard</option>
                                                <option disabled="disabled">Ketchup</option>
                                                <option>Tent</option>
                                                <option disabled="disabled">Flashlight</option>
                                                <option>Toilet Paper</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <p class="m-b-20"><strong>Divider</strong> option with <code>data-divider="true"</code>
                                            </p>
                                            <select class="form-control">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                                <option>Mayonnaise</option>
                                                <option data-divider="true">&nbsp;</option>
                                                <option>Barbecue Sauce</option>
                                                <option>Salad Dressing</option>
                                                <option>Tabasco</option>
                                                <option>Salsa</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="m-b-20"><strong>Width</strong> adjust adding <code>data-width</code> (px, % or auto)</p>
                                            <select class="selectpicker" data-width="60%">
                                                <option>Mustard</option>
                                                <option>Ketchup</option>
                                                <option>Relish</option>
                                                <option>All of the above (and much, much more!)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Switch</strong> Controls</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h3><strong>Size</strong> Options</h3>
                                    <p>Cool switch input. To change size, add <code>data-size</code> attribute.</p>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div>
                                                <input type="checkbox" checked data-size="large" class="switch">
                                                <input type="checkbox" class="switch" checked>
                                                <input type="checkbox" class="switch" checked data-size="small">
                                                <input type="checkbox" class="switch" checked data-size="mini">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-lg-4">
                                    <h3><strong>Color</strong> Options</h3>
                                    <p>You can customize color with <code>data-on-color</code> &amp; <code>data-off-color</code>.</p>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="checkbox" checked data-on-color="primary" data-off-color="info" class="switch">
                                            <input type="checkbox" checked data-on-color="warning" data-off-color="danger" class="switch">
                                            <input type="checkbox" checked data-on-color="danger" data-off-color="default" class="switch">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h3><strong>Icons</strong> Label</h3>
                                    <p>A cool iOS7 slide toggle. These are cutomize for all boostrap colors</p>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6 m-b-20">
                                            <input type="checkbox" class="switch" checked data-size="large" data-label-text="<span class='fa fa-facebook-square fa-lg'></span>" data-on-text="<span class='fa fa-smile-o fa-lg'></span>" data-off-text="<span class='fa fa-frown-o fa-lg'></span>">
                                        </div>
                                        <div class="col-md-6 m-b-20">
                                            <input type="checkbox" class="switch" checked data-size="large" data-label-text="<span class='fa fa-youtube fa-lg'></span>" data-on-text="<span class='fa fa-thumbs-up fa-lg'></span>" data-off-text="<span class='fa fa-thumbs-down fa-lg'></span>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Date and Time</strong> Elements</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h3><strong>Rich</strong> Date Picker</h3>
                                    <p>Rich Datepicker with time selection option!</p>
                                    <br>
                                    <div>
                                        <input type="text" class="datetimepicker" data-inline="true" />
                                    </div>
                                    <br>
                                    <br>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-lg-4">
                                    <h3><strong>Bootstrap</strong> Date Picker</h3>
                                    <p>Rich Datepicker with time selection option!</p>
                                    <br>
                                    <div>
                                        <div class="datepicker" data-inline="true"></div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-lg-4">
                                    <h3><strong>Modal</strong> Date and Time Picker </h3>
                                    <p>Some advance setting that you can do with this calender, like to start from years an disable sections of dates</p>
                                    <div class="row">
                                        <div class="col-md-12 m-b-40">
                                            <p><strong>Modal Calendar</strong>
                                            </p>
                                            <input class="pickadate form-control" type="text" placeholder="Click me to see modal calendar" />
                                        </div>
                                        <div class="col-md-12">
                                            <p><strong>Modal Time Picker</strong>
                                            </p>
                                            <input class="pickatime form-control" type="text" placeholder="Click me to see modal Time selector" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->


    </div>
    <!-- END WRAPPER -->
    <!-- BEGIN CHAT MENU -->
    <nav id="menu-right">
        <ul>
            <li class="mm-label label-big">ONLINE</li>
            <li class="img no-arrow have-message">
                <span class="inside-chat">
                    <i class="online"></i>
                    <img src="assets/img/avatars/avatar3.png" alt="avatar 3"/>
                    <span class="chat-name">Alexa Johnson</span>
                    <span class="pull-right badge badge-danger hide">3</span>
                    <span>Los Angeles</span>
                </span>
                <ul class="chat-messages">
                    <li class="img">
                        <span>
                            <span class="chat-detail">
                                <img src="assets/img/avatars/avatar3.png" alt="avatar 3"/>
                                <span class="chat-bubble"><span class="bubble-inner">Hi you!</span></span>
                            </span>
                        </span>
                    </li>
                    <li class="img">
                        <span>
                            <span class="chat-detail">
                                <img src="assets/img/avatars/avatar3.png" alt="avatar 3"/>
                                <span class="chat-bubble"><span class="bubble-inner">You there?</span></span>
                            </span>
                        </span>
                    </li>
                    <li class="img">
                        <span>
                            <span class="chat-detail">
                                <img src="assets/img/avatars/avatar3.png" alt="avatar 3"/>
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
                    <img src="assets/img/avatars/avatar2.png" alt="avatar 2"/>
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
                    <img src="assets/img/avatars/avatar13.png" alt="avatar 13"/>
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
                    <img src="assets/img/avatars/avatar4.png" alt="avatar 4"/>
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
                    <img src="assets/img/avatars/avatar5.png" alt="avatar 5"/>
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
                    <img src="assets/img/avatars/avatar6.png" alt="avatar 6"/>
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
                    <img src="assets/img/avatars/avatar7.png" alt="avatar 7"/>
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
                    <img src="assets/img/avatars/avatar8.png" alt="avatar 8"/>
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
                        <img src="assets/img/avatars/avatar9.png" alt="avatar 9"/>
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
                    <img src="assets/img/avatars/avatar12.png" alt="avatar 12"/>
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
                    <img src="assets/img/avatars/avatar11.png" alt="avatar 11"/>
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
                    <img src="assets/img/avatars/avatar10.png" alt="avatar 10"/>
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
    <script src="assets/plugins/jquery-1.11.js"></script>
    <script src="assets/plugins/jquery-migrate-1.2.1.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
    <script src="assets/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.js"></script>
    <script src="assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/plugins/mmenu/js/jquery.mmenu.min.all.js"></script>
    <script src="assets/plugins/nprogress/nprogress.js"></script>
    <script src="assets/plugins/charts-sparkline/sparkline.min.js"></script>
    <script src="assets/plugins/breakpoints/breakpoints.js"></script>
    <script src="assets/plugins/numerator/jquery-numerator.js"></script>
    <script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
    <!-- END MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/datetimepicker/jquery.datetimepicker.js"></script>
    <script src="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="assets/plugins/pickadate/picker.js"></script>
    <script src="assets/plugins/pickadate/picker.date.js"></script>
    <script src="assets/plugins/pickadate/picker.time.js"></script>
    <script src="assets/plugins/bootstrap-switch/bootstrap-switch.js"></script>
    <script src="assets/plugins/bootstrap-progressbar/bootstrap-progressbar.js"></script>
    <!-- END  PAGE LEVEL SCRIPTS -->
    <script src="assets/js/application.js"></script>
</body>
</html>
