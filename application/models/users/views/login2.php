<!DOCTYPE html>
<html>
<head>
    <!-- BEGIN META SECTION -->
    	<title>DocuFiler</title>
		<meta charset="utf-8">
		<link href="<?php echo base_url();?>css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
		<script type="application/x-javascript"> 
        <link rel="shortcut icon" href="images/assets/img/favicon.png">
		addEventListener("load", function() 
		{ setTimeout(hideURLbar, 0); }, false); 
		function hideURLbar(){ window.scrollTo(0,1); } 
        </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/frontend/jquery.validate.min.js"></script>
        <style>
		#login label.error {
		color: #FB3A3A;
		display: inline-block;
		margin: 0px 0px 10px;
		padding: 0px;
		text-align: left;
		width: 330px;
		}
		</style>
        <script type="text/javascript">

/**
  * Basic jQuery Validation Form Demo Code
  * Copyright Sam Deering 2012
  * Licence: http://www.jquery4u.com/license/
  */
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#login").validate({
                rules: {
                    username: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
					 captcha: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
					username: "Please enter a valid email address",
                    password: {
                        required: "Please provide password",
                        minlength: "Your password must be at least 5 characters long"
                    },
					 captcha: {
                        required: "Please provide captcha",
                        minlength: "Your captcha must be at least 8 characters long"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>
   <!-- END META SECTION -->
 <!-- BEGIN MANDATORY STYLE -->
    <link href="css/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="css/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/assets/css/plugins.min.css" rel="stylesheet">
    <link href="plugins/assets/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    <link href="css/assets/css/style.min.css" rel="stylesheet">
    <link href="#" rel="stylesheet" id="theme-color">
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="css/assets/css/animate-custom.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
    <script src="plugins/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>   
</head>

<body class="login fade-in" data-page="login">
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="images/assets/img/account/user-icon.png" alt="Key icon">
                    </div>
                    <div class="login-logo">
                        <a href="#?login-theme-3">
                            <img src="images/assets/img/account/login-logo.png" alt="Company Logo">
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
                        <?php
					    if($this->session->flashdata('flash_message') == 'invaliduser')
        				{
							echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Email or Password mismatch !</strong></div>';
						}
                         if($this->session->flashdata('flash_message') == 'changedpassword')
        				{
							echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Password changed successfully !</strong></div>';
						}
					   ?>
                        <!-- END ERROR BOX -->
                        <form action="<?php echo base_url()?>users/dashboard" method="post"  name="login" id="login">
                            <input type="text" placeholder="Username" class="input-field form-control user" />
                            <input type="password" placeholder="Password" class="input-field form-control password" />

                        <div class="captche">
                            <?php echo $captcha['image']; ?>
                            <div class="type-box">
                            	<p class="information-text">Match the text below:</p>
                                <input type="text" name="captcha" id="captcha" class="text-box">
                            </div>
                            
                        <?php
						if($this->session->flashdata('flash_message') == 'mismatch')
        				{
							echo '<label for="captcha" generated="true" class="error">Captcha Mismatch !</label>';
						}
					    ?>
                            <button id="submit-form" class="btn btn-login ladda-button" data-style="expand-left"><span class="ladda-label">login</span></button>
                        </form>
                        <div class="login-links">
                            <a href="<?php echo base_url();?>users/forgetpassword">Forgot Password ?</a>
                            <br>
                            <a href="<?php echo base_url();?>users/signup">Sign UP</a>
                        </div>
                    </div>
                </div>
                <div class="social-login row">
                    <div class="fb-login col-lg-6 col-md-12 animated flipInX">
                        <a href="#" class="btn btn-facebook btn-block">Connect with <strong>Facebook</strong></a>
                    </div>
                    <div class="twit-login col-lg-6 col-md-12 animated flipInX">
                        <a href="#" class="btn btn-twitter btn-block">Connect with <strong>Twitter</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOCKSCREEN BOX -->
    <!-- BEGIN MANDATORY SCRIPTS -->
    <script src="plugins/assets/plugins/jquery-1.11.js"></script>
    <script src="plugins/assets/plugins/jquery-migrate-1.2.1.js"></script>
    <script src="plugins/assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
    <script src="plugins/assets/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>
    <script src="plugins/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="plugins/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
    <!-- END MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/assets/plugins/backstretch/backstretch.min.js"></script>
    <script src="plugins/assets/plugins/bootstrap-loading/lada.min.js"></script>
    <script src="js/assets/js/account.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <script>
    $(function() {
    $('#submit-form').click(function(e){
        e.preventDefault();
        var l = Ladda.create(this);
        l.start();
        setTimeout(function () {
            window.location.href = "index.html";
        }, 2000);

    });
});
    </script>
</body>


</html>