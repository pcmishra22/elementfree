<?php  print LeftMenu(); ?>

<!-- BEGIN MAIN CONTENT -->
<div id="main-content">
    <div class="page-title"> <i class="icon-custom-left"></i>
    <h3><strong>This is the search </strong> location</h3>
    <form method="post" id="selpreview" name="selpreview" action="<?php echo base_url();?>users/listfiles"> 
        <input type="hidden" name="selector" value="preview" > 
        <input type="hidden" name="menufiller" value="<?php echo $this->session->userdata('activedocumenu');?>" > 
        <input type="hidden" name="menulabel" value="<?php echo $this->session->userdata('activemenulabel');?>" >
        <input type="hidden" name="datefiller" value="<?php echo $this->session->userdata('activemenu');?>" >
        <a class="sidebar-text"> <input type="submit" class="text_button" value="Documents Preview"> </a>
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
                    <h3 class="panel-title"><strong><?php echo $this->session->userdata('activemenu'); ?>'s </strong> Documents from the <?php echo $this->session->userdata('activemenulabel'); ?> category</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-blue filter-right">
                            <table class="table table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Document Name</th>
                                        <th>Date Uploaded</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                        <th>Actions</th>
                                        <th>Unique Name</th>
                                        <?php
                                        if ($this->session->userdata('activedocumenu')=="processing")
                                        {
                                         echo "<th>Processing</th>";
                                        }
                                        ?>                                         
                                    </tr>
                                </thead>
                                <tbody class="no-bd-y">

 			<?php
			if(!empty($filedetails[0]))
			{
				foreach($filedetails as $userfiles)
				{
					$id=$userfiles->id;
					$userid=$userfiles->userid;
					$name=$userfiles->name;
					$uniquename=$userfiles->uniquename;
					$folder=$userfiles->folder;
					$device=$userfiles->device;
					$filetype=$userfiles->filetype;
					$location=$userfiles->location;
					$size=$userfiles->size;
					$created_date=$userfiles->created_date;
					$procstat=$userfiles->processing;
					
				switch (true) {
			  	case ($procstat == "0" ):
			  		$procstat="25";
			  	break;
			  	case ($procstat == "1" ):
			  		$procstat="50";
			  	break;  
			  	default:
			  		$procstat="100";
				}
					
			?>
                                            <tr>
                                                <td><?php echo $name;?></td>
                                                <td><?php echo date('Y-m-d h:i:s',strtotime($created_date));?></td>
                                                <td><?php echo $filetype;?></td>
                                                <td><?php echo $size;?></td>
                                                <td><span class="Download"><a href="<?php echo base_url();?>users/deletefile/<?php echo $id;?>"><i class="fa fa-trash-o"></i></a></span><span class="Download"> <a href="<?php echo base_url();?>users/downloadfile/<?php echo $id;?>"><i class="fa fa-download"></i></a></span></td>
                                                <td><?php echo $uniquename;?></td>
       <?php
       if ($this->session->userdata('activedocumenu')=="processing")
       {
        echo '<td class="color-success">';
        echo '<div class="progress">';
        if ($procstat <=49)
        echo '<div class="progress-bar progress-bar-danger" data-aria-valuetransitiongoal="'.$procstat.'" aria-valuenow="'.$procstat.'" style="width: '.$procstat.'%;">'.$procstat.'%</div>';
        else
        echo '<div class="progress-bar progress-bar-success" data-aria-valuetransitiongoal="'.$procstat.'" aria-valuenow="'.$procstat.'" style="width: '.$procstat.'%;">'.$procstat.'%</div>';
        echo '</div>';
        echo '</td>';
       }
       ?>
                                            
      <?php
				}
			}
			else
			{
				//echo '<br/><br/><br/><br/><div  style="color:red;" align="center" class="alert alert-danger"><strong>No File Uploaded Yet !</strong></div>';
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
    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <!-- END  PAGE LEVEL SCRIPTS -->