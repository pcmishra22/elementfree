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
			if($this->session->flashdata('flash_message') == 'updated')
        	{
				echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Record updated successfully !</strong></div>';
			}
?>
            <?php
                if ($this->_ci_cached_vars['newMembership'] ) {
            ?>
                <a class="fancybox2 fancybox.iframe" id="purchasemembership" href="<?php echo base_url();?>users/filesubscription"></a>

                <script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <script src="https://code.jquery.com/jquery-1.11.0.js"></script>
                <script type="text/javascript" src="<?php echo base_url()?>fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
                <script type="text/javascript" src="<?php echo base_url()?>fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
                <script type="text/javascript" src="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
                <script type="text/javascript" src="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
                <script type="text/javascript" src="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
                <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
                <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
                <script type="text/javascript">
                    $(".fancybox2").fancybox({
			'width' : 1200
                    });
                    $("#purchasemembership").click();
                </script>
            <?php
                }
            ?>
               	       
            <h2 class="account-infomation" style="padding-bottom:0%;">Drag&amp;Drop Multiple Files Upload</h2>
				<div class="image_upload_div">
					<form action="<?php echo base_url();?>users/upload" class="dropzone">
					</form>
				</div> 	
			</div> 
                
    

        </div>
        </div><!--col-lg-10-->
        
        <!--Tabs-->
        


		</div><!--col-lg-12-->
</div><!--middle-->
<!--end of middle section-->