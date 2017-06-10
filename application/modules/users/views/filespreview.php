				<?php  print LeftMenu();  ?>

       <!-- BEGIN MAIN CONTENT -->
        <div id="main-content">
            <div class="panel-content">
                <div class="row media-manager">
                    <ul class="media-header">
                        <li>
                            <a href="#" class="c-dark filter active"  data-filter="all"> <strong>All</strong>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="filter" data-filter=".cat-image"><i class="glyphicon glyphicon-camera"></i> Images</a>
                        </li>
                        <li>
                            <a href="#" class="filter" data-filter=".cat-film"><i class="glyphicon glyphicon-film"></i> Videos</a>
                        </li>
                        <li>
                            <a href="#" class="filter" data-filter=".cat-music"><i class="glyphicon glyphicon-music"></i> Audios</a>
                        </li>
                        <li>
                            <a href="#" class="filter" data-filter=".cat-doc"><i class="glyphicon glyphicon-folder-open"></i> Documents</a>
                        </li>
                        <li class="pull-right">
                            <a href="#"  data-toggle="modal" data-target="#add-file"><i class="fa fa-cloud-download c-white"></i> Upload Files</a>
                        </li>
                    </ul>
                    <div class="margin-bottom-30"></div>
                    <div class="col-sm-9">
                        <div class="gallery row" onscroll="scrollData()">
                            
        <!-- Begin automated files -->
        <?php
				$cnt=0;
				foreach($filedetails as $filedata)
				{
					$fn=explode('.',$filedata['uniquename']);
					
					$imgfn=$fn[0].'.jpg';
					$imgfn0=$fn[0].'-0.jpg';
					
					$fullpath=FCPATH."/files_images/".$imgfn;
					$fullpath0=FCPATH."/files_images/".$imgfn0;
					

					if(file_exists($fullpath))
					{
						$filename=$imgfn;
					}
					else
					{
						if(file_exists($fullpath0))
						{
							$filename=$imgfn0;
						}
						else
						{
							$filename='preview_picture.jpg';
						}
						
					}
						
				?>
														<div class="mix cat-doc col-xs-6 col-sm-4 col-md-3" draggable="true" ondragstart="drag(event)">
                                <div class="btn-group media-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu media-menu" role="menu">
                                        <li><a href="#"><i class="fa fa-pencil"></i> Share</a>
                                        </li>
                                        <li><a href="<?php echo base_url();?>users/downloadfile/<?php echo $filedata['id'];?>"><i class="fa fa-download"></i> Download</a>
                                        </li>
                                        <li><a href="<?php echo base_url();?>users/deletefilepreview/<?php echo $filedata['id'];?>"><i class="fa fa-trash-o"></i> Delete</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="thmb">
                                            <div class="thmb-prev">
                                                <img src="<?php echo base_url()?>files_images/<?php echo $filename;?>" class="img-responsive" alt="">
                                            </div>
                                            <h5 class="media-title"><a href="<?php echo base_url();?>users/downloadfile/<?php echo $filedata['id'];?>"><?php echo $filedata['name'];?></a></h5>
                                            <small class="text-muted pull-left">654 Ko</small>
                                            <small class="text-muted pull-right"><?php echo date('m/d/Y',strtotime($filedata['created_date']));?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
        <?php
				$cnt++;
				if($cnt%4==0)
				{
					?>

                    <?php
				}
				}
				?>                    
        <!-- End automated files --> 
        
        <p class="navigation">
        	                   
                        </div>
                    </div>

                    </div>
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
