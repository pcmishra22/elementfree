<!DOCTYPE html>
<html>
<head>
	<title>DocuFiler</title>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="<?php echo base_url();?>images/assets/img/favicon.png">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="<?php echo base_url();?>css/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/plugins.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>#" rel="stylesheet" id="theme-color">

    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="<?php echo base_url();?>css/assets/css/animate-custom.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/frontend/jquery.validate.min.js"></script>		
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
            $("#register-form").validate({
                rules: {

                    email: {
                        required: true,
                        email: true
                    }

                },
                messages: {
                    email: "Please enter a valid email address"
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
</head>	
	<body class="login fade-in" data-page="password">
    <!-- BEGIN PASSWORD BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="<?php echo base_url();?>images/assets/img/account/login-questionmark-icon.png" alt="Questionmark icon" />
                    </div>
                    <div class="login-logo">
                        <a href="#">
                            <img class="img-responsive" src="<?php echo base_url();?>images/assets/img/account/login-logo.png" alt="Company Logo" />
                        </a>
                    </div>
                    <hr />
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
            <?php
					    if($this->session->flashdata('flash_message') == 'emailsent')
        				{
							echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Please check your email, Click the link to reset your password</strong></div>';
								}
						if($this->session->flashdata('flash_message') == 'emailnotexists')
        				{
							echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Email not exist !</strong></div>';
								}
					  ?>
                        <!-- END ERROR BOX -->
                        <form action="" method="post" id="register-form" novalidate>
                            <p>Enter your email address below and we'll send a special reset password link to your inbox.</p>
                            <input type="email" class="input" name="email" id="email" placeholder="Email" class="input-field" required/>
                            <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-login btn-reset">Reset password</button>
                        </form>
                        <div class="login-links">
                            <a href="<?php echo base_url();?>users/login">Already have an account?  <strong>Sign In</strong></a>
                            <br>
                            <a href="<?php echo base_url();?>users/signup"> Don't have an account? <strong>Sign Up</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PASSWORD BOX -->
    <!-- BEGIN MANDATORY SCRIPTS -->
    <script src="<?php echo base_url();?>plugins/assets/plugins/jquery-1.11.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jquery-migrate-1.2.1.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>plugins/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
    <!-- END MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url();?>plugins/assets/plugins/backstretch/backstretch.min.js"></script>
    <script src="<?php echo base_url();?>js/assets/js/account.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>
		
		
		
		
		
		
		
		
		

