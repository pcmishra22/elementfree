<?php
if(isset($promotiondetails))
{

	$id=$promotiondetails[0]['id'];	
	$code=$promotiondetails[0]['codename'];
	$percent=$promotiondetails[0]['percent'];
	$disena=$promotiondetails[0]['status'];
	
	$title='Update';
	$btn='Update';
}
else
{
	$id='';
	$code='';
	$percent='';
	$disena='';
	$title='Add';
	$btn='Save';
}
?>
<div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><span><?php echo $title;?> Promotion</span></h4>
                                </div>
                                <div class="panel-body">
                                   
                                    <form class="form-horizontal" method="post" id="form-validate" action="<?php echo  base_url(); ?>admin/addpromotion" role="form" >

<input type='hidden' name='id' value="<?php echo $id;?>" />

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Code Name :</label>
                                            <div class="col-lg-8">
                                                <input id="title" type="text" name="codename" class="form-control" placeholder="Enter your Code" value="<?php echo $code;?>"/>
                                            </div>

                                        </div><!-- End .form-group  --> 
                                      <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Percent :</label>
                                            <div class="col-lg-8">
                                                <input id="con" type="text" name="percent" class="form-control" placeholder="Enter discount percent" value="<?php echo $percent;?>"/>
                                            </div>

                                        </div><!-- End .form-group  --> 
                                    					
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Status :</label>
                                            <div class="col-lg-8">
                                            
												<select class="form-control" name="settingdiscount" id="settingdiscount">
                                                    <option value="active" <?php if($disena=='active'){ echo 'selected="selected"';}?>>Active</option>
                                                    <option value="inactive" <?php if($disena=='inactive'){ echo 'selected="selected"';}?>>Inactive</option>
                                                </select>
											</div>
                                        </div><!-- End .form-group  --> 

                                        <div class="form-group">
                                            <div class="col-lg-offset-2">
                                                <button type="submit" name="submit" class="btn btn-default marginR10"><?php echo $btn;?></button>
                                                <button class="btn btn-danger" onclick="goBack()">Cancel</button>
                                            </div>
                                        </div><!-- End .form-group  -->                                      
                                    </form>
                                </div>
                            </div><!-- End .panel -->
                        </div><!-- End .span12 -->
                    </div><!-- End .row -->  


<script>
function goBack() {
    window.history.back();
}
</script>




  