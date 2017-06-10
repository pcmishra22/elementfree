				<?php  print LeftMenu(); ?>
				
        <!-- BEGIN MAIN CONTENT -->
        <div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h3><strong>This is the search </strong> location</h3>
                <h3><strong><?php echo $this->session->userdata('activemenu'); ?>'s </strong> Documents from the <strong> <?php echo $this->session->userdata('activemenulabel'); ?> </strong> category</h3>
                <form method="post" id="selpreview" name="selpreview" action="<?php echo base_url();?>users/listfiles"> 
								<input type="hidden" name="selector" value="list" > 
								<input type="hidden" name="menufiller" value="<?php echo $this->session->userdata('activedocumenu');?>" > 
								<input type="hidden" name="menulabel" value="<?php echo $this->session->userdata('activemenulabel');?>" >
								<input type="hidden" name="datefiller" value="<?php echo $this->session->userdata('activemenu');?>" >
								<a class="sidebar-text"> <input type="submit" class="text_button" value="Documents List"> </a>
								</form>
            </div>
            <div class="m-b-30"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <div class="btn-group m-b-15">
                            <span class="btn btn-primary filter active" data-filter="all">All</span>
				<?php
				foreach($yearlist as $yeardata)
				{
					$label=$yeardata->label;
					$yearname=$yeardata->year;
				?>	
                            <span class="btn btn-primary filter" data-filter="<?php echo $label;?>"><?php echo $yearname;?></span>

        <?php
      }
        ?>                    
                        </div>
                        <br>
                        <div class="btn-group m-b-5">
                            <span class="btn btn-default filter active" data-filter="all">All</span>
				<?php
				foreach($monthlist as $monthdata)
				{
					$label=$monthdata->label;
					$monthname=$monthdata->monthname;
				?>                            
                            <span class="btn btn-default filter" data-filter="<?php echo $label;?>"><?php echo $monthname;?></span>
        <?php
      }
        ?>                         
                        </div>


                        <div class="pull-right m-b-20">
                            <div class="btn-group">
                                <span class="btn btn-default sort" data-sort="value:asc"><i class="fa fa-sort-numeric-asc"></i></span>
                                <span class="btn btn-default sort" data-sort="value:desc"><i class="fa fa-sort-numeric-desc"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN GALLERY -->
                    <div class="gallery" onscroll="scrollData()">
                        <div class="row" >
												<input type="hidden" class="pagenum" value="1" />
        <!-- Begin automated files -->
        <?php
				$cnt=0;
				foreach($filedetails as $filedata)
				{
					$id=$filedata->id;
					$userid=$filedata->userid;
					$name=$filedata->name;
					$uniquename=$filedata->uniquename;
					$folder=$filedata->folder;
					$device=$filedata->device;
					$filetype=$filedata->filetype;
					$location=$filedata->location;
					$size=$filedata->size;
					$created_date=$filedata->created_date;
					
					$yearmonthlabel=$this->users_model->yearmonthlabel($uniquename);
					
					$fn=explode('.',$uniquename);
					$imgfn=$fn[0].'.jpg';
					$fullpath=FCPATH."/files_images/".$imgfn;
					if(file_exists($fullpath))
					{
					$filename=$imgfn;
					}
					else
					{
						$filename='preview_picture.jpg';
					}
				?>
                            <div class="mix <?php echo $yearmonthlabel;?> col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="<?php echo $id;?>" draggable="true" ondragstart="drag(event)">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url()?>files_images/<?php echo $filename;?>" class="btn btn-default btn-icon btn-rounded magnific" title="<?php echo $name;?>"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="<?php echo base_url();?>users/downloadfile/<?php echo $id;?>" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url()?>files_images/<?php echo $filename;?>" class="img-responsive" alt="<?php echo $filename;?>" />
                                    <div class="thumbnail-meta">
                                        <h5>
                                        <?php echo $name;?> <br>
                                        <small><i class="fa fa-clock-o"></i> <?php echo date('m/d/Y',strtotime($created_date));?></small>
                                      </h5>
                                    </div>
                                </div>
                            </div>
        <?php
				$cnt++;
				if($cnt%4==4)
				{

				}
				}
				?>                    
        <!-- End automated files -->                    
<p class="navigation">
<span id="loader-icon" style="margin-left:500px;display:none;"><img src="<?php echo base_url()?>images/loader.gif" /></span>
</p>
											</div>

                    </div>
                    <!-- END GALLERY -->
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->

<script src="<?php echo base_url();?>js/frontend/jquery.min.js"></script>
<script>
$(window).scroll(function(){
if ($(window).scrollTop() >= $(document).height() - $(window).height()-100){
//if($(".pagenum:last").val() <= $(".rowcount").val()) {
var pagenum = parseInt($(".pagenum:last").val()) + 1;
getresult('<?php echo base_url();?>users/previewfilesdata/'+pagenum);
//}
}
});

//function getresult
function getresult(url) {
$.ajax({
url: url,
type: "GET",
data:  {rowcount:$("#rowcount").val()},
beforeSend: function(){
$('#loader-icon').show();
},
complete: function(){
$('#loader-icon').hide();
},
success: function(data){
$("#faq-result").append(data);
},
error: function(){} 	        
});
}
</script>
