<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>ElementFree | Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="<?php echo base_url();?>images/assets/img/favicon.png">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
 
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script type="text/javascript" src="<?php echo base_url();?>js/frontend/jquery.validate.min.js"></script>
    <link href="<?php echo base_url();?>css/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/plugins.css" rel="stylesheet">
    <link href="<?php echo base_url();?>plugins/assets/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/assets/css/style.min.css" rel="stylesheet">
    <!-- END  MANDATORY STYLE -->
    <script src="<?php echo base_url();?>plugins/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<style>
		#register-form label.error {
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
            $("#register-form").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },

                     phone: {
                        required: true,
                        minlength: 10
                    },
		          conpass: {
                        required: true,
                        minlength: 5,
						equalTo: "#password"
                    }
                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    password: {
                        required: "Please provide password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    phone: {
                        required: "Please provide phone no.",
                        minlength: "Your phone no must be at least 10 characters long"
                    },
					conpass: {
                        required: "Please provide confirmed password",
                        minlength: "Your password must be at least 5 characters long",
						equalTo: "Password and confirmed password should be same"
                    },
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

<body class="login fade-in" data-page="signup">
    <!-- START SIGNUP BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="<?php echo base_url();?>images/assets/img/account/register-icon.png" alt="Register icon" />
                    </div>
                    <div class="login-logo">
                        <a href="<?php echo base_url();?>#">
                            <img src="<?php echo base_url();?>images/assets/img/account/login-logo.png" alt="Company Logo" />
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- Start Error box -->
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
                        <!-- End Error box -->
            <?php
					    if($this->session->flashdata('flash_message') == 'emailexists')
        				{
							echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Email already exist !</strong></div>';
								}
					  ?>
                        <?php
                            if($this->session->flashdata('flash_message_complete_fields'))
                            {
                                echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Empty Fields !</strong><br><span style="font-size: 11px;">Fields marked with (*) are required</span></div>';
                            }
                            if($this->session->flashdata('flash_message_pass'))
                            {
                                echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Unsecured password !</strong><br><span style="font-size: 11px;">Minimum 8 characters, one uppercase letter, one lowercase letter, one number and one special character ($@_.(){}|$!%#+*=¿?&)</span></div>';
                            }
                            if($this->session->flashdata('flash_message_pass_confirm'))
                            {
                                echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Passwords do not match !</strong><br><span style="font-size: 11px;"></span></div>';
                            }
                        ?>
                        <form action="" method="post" id="register-form" novalidate>
                            <input type="text" placeholder="First Name (*)" name="firstname" id="firstname" class="input-field" required/>
                            <input type="text" placeholder="Last Name (*)" name="lastname" id="lastname" class="input-field" required/>
                            <input type="email" placeholder="E-mail (*)" name="email" id="email" class="input-field" required/>
                            <input type="password" placeholder="Password (*)" name="password" id="password" class="input-field" required/>
                            <input type="password" placeholder="Confirm Password (*)" name="conpass" id="conpass" class="input-field" required/>
                  

                            <input type="text"  placeholder="Enter your mobile no (*)" name="mobile" id="mobile" class="input"  >
          
<!--                            <button id="submit-form" class="btn btn-login ladda-button" data-style="expand-left"><span class="ladda-label">Sign Up</span></button> -->
												<div class="submit">
													<input type="submit" class="submitt" name="submit" id="submit" value="SIGN UP" >
												</div>
                        </form>
                        <div class="login-links">
                        <a href="<?php echo base_url();?>users/forgetpassword">Forgot password?</a>
                            <br>
                            <a href="<?php echo base_url();?>users/login">Already have an account? <strong>Sign In</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SIGNUP BOX -->
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
</body>

</html>
