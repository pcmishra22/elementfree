        <?php  print LeftMenu();  ?>
         
        <!-- BEGIN MAIN CONTENT -->
        <div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h3><strong>Dashboard</strong> |  <small> filtering and sorting documents</small></h3>
            </div>
            <div class="m-b-30"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <div class="btn-group m-b-20">
                            <span class="btn btn-default filter active" data-filter="all">All</span>
                            <span class="btn btn-default filter" data-filter=".category-1">Animals</span>
                            <span class="btn btn-default filter" data-filter=".category-2">Nature</span>
                            <span class="btn btn-default filter" data-filter=".category-3">Transport</span>
                        </div>
                        <div class="pull-right m-b-20">
                            <div class="btn-group">
                                <span class="btn btn-default sort" data-sort="value:asc"><i class="fa fa-sort-numeric-asc"></i></span>
                                <span class="btn btn-default sort" data-sort="value:desc"><i class="fa fa-sort-numeric-desc"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN GALLERY -->
                    <div class="gallery">
                        <div class="row">
                            <div class="mix category-1 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="1">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/animal1.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Animal 1"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/animal1.jpg" class="img-responsive" alt="animal1" />
                                    <div class="thumbnail-meta">
                                        <h5>animal1.jpg<br>
                                            <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="2">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/nature1.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Nature 1"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/nature1.jpg" class="img-responsive" alt="nature1" />
                                    <div class="thumbnail-meta">
                                        <h5>nature1.jpg<br>
                                            <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mix category-3 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="3">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/transport1.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Transport 1"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/transport1.jpg" class="img-responsive" alt="transport1" />
                                    <div class="thumbnail-meta">
                                        <h5>transport1.jpg <br>
                                            <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="5">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/nature2.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Nature 2"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/nature2.jpg" class="img-responsive" alt="nature2" />
                                    <div class="thumbnail-meta">
                                        <h5>nature2.jpg <br>
                                            <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mix category-1 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="4">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/animal2.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Animal 2"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/animal2.jpg" class="img-responsive" alt="animal2" />
                                    <div class="thumbnail-meta">
                                        <h5>animal2.jpg <br>
                                            <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="8">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/nature3.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Nature 3"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/nature3.jpg" class="img-responsive" alt="nature3" />
                                    <div class="thumbnail-meta">
                                        <h5>nature3.jpg <br>
                                            <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mix category-3 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="6">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/transport2.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Transport 2"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/transport2.jpg" class="img-responsive" alt="transport2" />
                                    <div class="thumbnail-meta">
                                        <h5>transport2.jpg <br>
                                            <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="10">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/nature4.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Nature 4"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/nature4.jpg" class="img-responsive" alt="nature4" />
                                    <div class="thumbnail-meta">
                                        <h5>nature4.jpg <br>
                                            <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mix category-1 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="7">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/animal3.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Animal 3"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/animal3.jpg" class="img-responsive" alt="animal3" />
                                    <div class="thumbnail-meta">
                                        <h5>
                                          animal3.jpg <br>
                                          <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="12">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/nature6.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Nature 6"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/nature6.jpg" class="img-responsive" alt="nature6" />
                                    <div class="thumbnail-meta">
                                        <h5>
                                          nature6.jpg <br>
                                          <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mix category-2 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="11">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/nature5.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Nature 5"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/nature5.jpg" class="img-responsive" alt="nature5" />
                                    <div class="thumbnail-meta">
                                        <h5>
                                          nature5.jpg <br>
                                          <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="mix category-1 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="9">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url();?>images/assets/img/gallery/animal4.jpg" class="btn btn-default btn-icon btn-rounded magnific" title="Animal 4"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url();?>images/assets/img/gallery/animal4.jpg" class="img-responsive" alt="animal4" />
                                    <div class="thumbnail-meta">
                                        <h5>
                                        animal4.jpg <br>
                                        <small><i class="fa fa-clock-o"></i> 23 Minute ago</small>
                                      </h5>
                                    </div>
                                </div>
                            </div>
                        



        <!-- Begin automated files -->
                            <?php
				$cnt=0;
				foreach($filedetails as $filedata)
				{
					$fn=explode('.',$filedata['uniquename']);
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
                            <div class="mix category-1 col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="<?php echo $filedata['id'];?>" draggable="true" ondragstart="drag(event)">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url()?>files_images/<?php echo $filename;?>" class="btn btn-default btn-icon btn-rounded magnific" title="<?php echo $filedata['name'];?>"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="<?php echo base_url();?>users/downloadfile/<?php echo $filedata['id'];?>" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url()?>files_images/<?php echo $filename;?>" class="img-responsive" alt="<?php echo $filename;?>" />
                                    <div class="thumbnail-meta">
                                        <h5>
                                        <?php echo $filedata['name'];?> <br>
                                        <small><i class="fa fa-clock-o"></i> <?php echo date('m/d/Y',strtotime($filedata['created_date']));?></small>
                                      </h5>
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
											</div>
                    </div>
                    <!-- END GALLERY -->
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
        
