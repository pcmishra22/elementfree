<?php  print LeftMenu();  ?>

<!--start of middle section-->
<div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <form method="post" id="selpreview" name="selpreview" action="<?php echo base_url();?>users/listfiles"> 
								<input type="hidden" name="selector" value="preview" > 
								<input type="hidden" name="menufiller" value="<?php echo $this->session->userdata('activedocumenu');?>" > 
								<input type="hidden" name="menulabel" value="<?php echo $this->session->userdata('activemenulabel');?>" >
								<input type="hidden" name="datefiller" value="<?php echo $this->session->userdata('activemenu');?>" >
								<!-- <a class="sidebar-text"> <input type="submit" class="text_button" value="Documents Preview"> </a> -->
								</form>
            </div>
            <!-- BEGIN MESSAGES -->
								<?php
								if($this->session->flashdata('flash_message') == 'filenotfound')
        				{			
								echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>File not found. !</strong></div>';
								}
								if($this->session->flashdata('flash_message') == 'deleted')
      					  {
									echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>File deleted successfully !</strong></div>';
									}
								?>
								<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-dark">
                            <h3 class="panel-title"><strong>Categories | </strong> This page shows how your data is connected</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            	 <div class="col-md-12 m-b-20">
                                    <div class="btn-group">
                                        <button id="table-edit_new" class="btn btn-success">
                                            Add New <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-blue filter-right">
                                    <table class="table table-striped table-hover dataTable" id="table-editable">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>Value</th>
                                                <th class="text-center">Actions</th>
                                                </tr>
                                        </thead>
                                        <tbody class="no-bd-y">
        <?php
        foreach($org as $category)
				{
				?>	
																								<tr>
                                                <td><?php echo $category['label'];?></td>
                                                <td><?php echo $category['subcat'];?></td>
                                                <td><?php echo $category['value'];?></td>
                                                <td class="text-center"><a class="edit btn btn-dark" href="javascript:;"><i class="fa fa-pencil-square-o"></i>Edit</a>  <a class="delete btn btn-danger" href="javascript:;"><i class="fa fa-times-circle"></i> Remove</a>
                                               <!-- <td><span class="Download"><a href="<?php echo base_url();?>users/delcat/<?php echo $category['orgid'];?>"><i class="fa fa-trash-o"></i></a></span><span class="Download"> <a href="<?php echo base_url();?>users/editcat/<?php echo $category['orgid'];?>"><i class="fa fa-download"></i></a></span></td> -->
                                                </tr>
         <?php
      }
      ?>                                               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                      </div>
                   </div>
                </div>

