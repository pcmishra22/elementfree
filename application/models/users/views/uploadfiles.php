<?php  print LeftMenu();  ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/dropzone.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/frontend/dropzone.js"></script>
<!--start of middle section-->
<div class="middle">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding">
    	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 zero-padding grey">

        </div>
   
   
   
		<!--main page content area-->

        <!--end Tandsp-->
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding sign-up-information">
        <div class="login-form width text-center">
        <?php
            if($this->session->flashdata('flash_message') == 'updated'){
                echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Record updated successfully !</strong></div>';
            }
        ?>
               	       
        <h2 class="account-infomation" style="padding-bottom:0%;">Drag&amp;Drop Multiple Files Upload</h2>
            <div class="image_upload_div">
                <form action="<?php echo base_url();?>users/upload" class="dropzone"></form>
            </div> 	
        </div> 

        </div>
        </div><!--col-lg-10-->
        
        <!--Tabs-->


		</div><!--col-lg-12-->
</div><!--middle-->
<!--end of middle section-->