<?php  print LeftMenu(); ?>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/frontend/jquery.validate.min.js"></script>
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
<!--start of middle section-->
<div class="middle">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding">
		<!--main page content area-->
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 zero-padding">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding dark-yellow-box">
              
            </div><!--dark-yellow-box-->

        <!--end Tandsp-->        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding sign-up-information">
        	<div class="login-form width text-center">
<?php
			if($this->session->flashdata('flash_message') == 'emailsent')
                        {
				echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Invitation Sent !</strong></div>';
			}
                        if($this->session->flashdata('flash_message') == 'emailexists')
                        {
				echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>User already exists !</strong></div>';
			}

?>
         <form action="" method="post" id="register-form" novalidate>
              <h2 class="account-infomation">Invite Friend</h2>
              <input type="text" name="email" placeholder="Email Address" class="input-account-infomation" />
              <input type="text" name="fname" placeholder="First Name" class="input-account-infomation" />
              <br/><input type="submit" class="submitt correction" onclick="myFunction()" value="Invite"/>
                
           </form>
            </div>
        </div>
        </div><!--col-lg-10-->
        
        <!--Tabs-->
        


		</div><!--col-lg-12-->
</div><!--middle-->
<!--end of middle section-->
