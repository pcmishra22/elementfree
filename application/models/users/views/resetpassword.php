<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>Docufiler | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="<?php echo base_url();?>images/assets/img/favicon.png">
		<script type="application/x-javascript"> 
		addEventListener("load", function() 
		{ setTimeout(hideURLbar, 0); }, false); 
		function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/frontend/jquery.validate.min.js"></script>
    <link href="<?php echo base_url();?>css/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/plugins.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>plugins/assets/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>#" rel="stylesheet" id="theme-color">
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
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="<?php echo base_url();?>css/assets/css/animate-custom.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
    <script src="<?php echo base_url();?>plugins/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    
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
</head>
<?php
if(isset($checkdetails) && ($checkdetails[0]['emailid']!=''))
{
?>
<body class="login fade-in" data-page="login">
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="<?php echo base_url();?>images/assets/img/account/user-icon.png" alt="Key icon">
                    </div>
                    <div class="login-logo">
                        <a href="<?php echo base_url();?>#?login-theme-3">
                            <img src="<?php echo base_url();?>images/assets/img/account/login-logo.png" alt="Company Logo">
                        </a>
                        <br>
												<a> Reset your Password  </a>
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
					    					if($this->session->flashdata('flash_message') == 'emailexists')
        									{
														echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Email already exist !</strong></div>';
													}
					   						?>
                        <!-- END ERROR BOX -->
                        <form action="" method="post" id="register-form" novalidate>
                            <input type="text" placeholder="Enter your email" class="input-field form-control user" name="email" id="email" value="<?php echo $checkdetails[0]['emailid'];?>" readonly />
                            <input type="password" placeholder="Enter your password" class="input-field form-control password" name="password" id="password" />
                            <input type="password" placeholder="Enter Confirmed Password"" class="input-field form-control password" name="conpass" id="conpass" />

                            
                        <!-- <button id="submit-form" class="btn btn-login ladda-button" data-style="expand-left" value="LOGIN" ><span class="ladda-label">login</span></button> -->
                        <div class="submit">
													<input type="submit" class="submitt" name="submit" id="submit" value="Submit">
												</div>
                        </form>
                        <div class="login-links">
                            <a href="<?php echo base_url();?>users/forgetpassword">Forgot password?</a>
                            <br>
                            <a href="<?php echo base_url();?>users/signup">Don't have an account? <strong>Sign Up</strong></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php
}
else
{
?>
										<div class="page-icon animated bounceInDown">
                        <img src="<?php echo base_url();?>images/assets/img/account/user-icon.png" alt="Key icon">
                    </div>
                    <div class="login-logo">
                        <a href="<?php echo base_url();?>#?login-theme-3">
                            <img src="<?php echo base_url();?>images/assets/img/account/login-logo.png" alt="Company Logo">
                        </a>
                        <br>
												<a>   </a>
                    </div>
<?php
	echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Unauthorized access !</strong></div>';
}
?>	
                        <div class="login-links">
                            <a href="<?php echo base_url();?>users/forgetpassword">Forgot password?</a>
                            <br>
                            <a href="<?php echo base_url();?>users/signup">Don't have an account? <strong>Sign Up</strong></a>
                        </div>
    <!-- END LOCKSCREEN BOX -->
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
    <script src="<?php echo base_url();?>plugins/assets/plugins/bootstrap-loading/lada.min.js"></script>
    <script src="<?php echo base_url();?>js/assets/js/account.js"></script>
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