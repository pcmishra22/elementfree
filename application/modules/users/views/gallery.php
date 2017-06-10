<?php  print LeftMenu(); ?>

<!--
<?php     
    //load local variables
    $accountid = $this->session->userdata('accountid');
    $datefilter = $DateFilter; 
    $menufilter = $MenuFilter;
    $menulabel = $MenuLabel;
    
    if(!empty($_REQUEST['monthsFilter'])){
        $monthsFilter= trim($_REQUEST['monthsFilter']);
        $monthsFilter=",$monthsFilter";
        $btnAllMonthsClass="btn-default";
    }else{
        $monthsFilter="";
        $btnAllMonthsClass="btn-primary";
    }
    if(!empty($_REQUEST['yearsFilter'])){
        $yearsFilter= trim($_REQUEST['yearsFilter']);
        $yearsFilter = ",$yearsFilter";
        $btnAllYearsClass="btn-default";
    }else{
        $yearsFilter="";
        $btnAllYearsClass="btn-primary";
    }
    if(!empty($_REQUEST['searchFilter'])){
        $searchFilter=trim($_REQUEST['searchFilter']);
    }else{
        $searchFilter="";
    }
    echo " -- local variables -- \n";
    echo "accountid : [$accountid] \n datefilter : [$datefilter] \n menufilter : [$menufilter] \n menulabel : [$menulabel] \n"; 
    echo "Month Filter [$monthsFilter]\n";
    echo "Year Filter [$yearsFilter]\n";
    echo "Search Filter [$searchFilter]\n";
    echo "Default Filters \n";
    var_dump($defFilters);
    echo "Category Filters \n";
    var_dump($catFilters);
    echo "searchList \n";
    var_dump($searchList);
    echo "\n-fin-";
?>
-->
				
<!-- BEGIN MAIN CONTENT -->
<div id="main-content">        
    <div class="row">
        <div class="col-md-12">
            <form method="post" id="selpreview" name="selpreview" action="<?php echo base_url();?>users/listfiles">                 
            <div class="panel panel-default">
                <div class="panel-heading bg-dark">
                    <h3 class="panel-title"><strong><?php echo $this->session->userdata('activemenu'); ?>'s </strong> Documents from the <?php echo $this->session->userdata('activemenulabel'); ?> category</h3>
                </div>
                <div class="panel-body">
                <!-- Search Box Filter Row-->
                <div class="row">
                    <div class="form-group">
                        <div class="controls btn-group-sm">
                            <div class="input-group">
                                <input class="form-control" id="searchBox" type="text" placeholder="What do you want to search ?" value="<?php echo $searchFilter; ?>">
                                <span class="input-group-addon bg-blue" onClick="applySearchFilter();" >   
                                    <a href="#" onClick="applySearchFilter();">
                                        <span style='color:white;'><span class="arrow">&nbsp;</span>
                                        <i class="fa fa-search"></i>&nbsp;</span></a>
                                </span>
                            </div>
                            <?php
                                if(!empty($searchList[0])){
                                    $i=9;
                                    $favFunction="";
                                    while($i>=0){
                                        $searchItem=$searchList[$i];
                                        if ($searchItem["fav"]=="0")
                                            $favFunction="addFavorite(\"" . $searchItem["value"] . "\",\"" . $searchItem["id"] . "\")' title='Add favorite'><span style='color:white;'><i id='fb" . $searchItem["id"] . "' class='fa fa-heart-o'>";
                                        else
                                            $favFunction="removeFavorite(\"" . $searchItem["id"] . "\")' title='Remove favorite'><span style='color:white;'><i id='fb" . $searchItem["id"] . "' class='fa fa-heart'>";
                                            $searchSpan = "<span><span class='label label-primary'>&nbsp;<a href='#' onClick='" . $favFunction . "</i></span></a>&nbsp;";
                                            $searchSpan = $searchSpan . "<a class='sidebar-text'><button type=button class='text_menu_button' onClick='useSaved(\"" . $searchItem["value"] . "\");' >";
                                            $searchSpan = $searchSpan . "&nbsp;&nbsp;" . $searchItem["label"] . "</button></a>&nbsp;";
                                            //$searchSpan = $searchSpan . " <a href='#' class='label label-primary' onClick='RemoveSearch(this," . $searchItem["id"] . ");'>x</a>";
                                            $searchSpan = $searchSpan . "</span>&nbsp;</span>";
                                            echo $searchSpan;
                                            $i=$i-1;
                                        }
                                }else{
                                    // echo "vacia";
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <!-- Year / Mont Filters Row-->
                <div class="row">
                    <div class="col-md-4">
                        <p>Year :</p>
                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                        <button type="button" year="" class="btn <?php echo $btnAllYearsClass ;?> btnAllYear" onClick='SelYear(this);'>All</button>
                        <?php
                            if(!empty($yearList[0])){
                                foreach($yearList as $yearItem){
                                    $year = trim($yearItem->year);
                                    $yearLabel = $yearItem->label;
                                    if (strpos($yearsFilter,$year) === false){
                                        $btnClass="btn-default";
                                    }else{
                                        $btnClass="btn-primary";
                                    }
                        ?>                        
                        <button type="button" year="<?php echo $year; ?>" class="btn <?php echo $btnClass ;?> btnYear" onClick='SelYear(this);'><?php echo $year; ?></button>
                        <?php
                                }
                            }
                            
                        ?>
                        </div>
                    </div>
                    <div class="col-md-4 btn-group-sm">
                        <p>Month :</p>
                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                        <button type="button" month="" class="btn <?php echo $btnAllMonthsClass ?> btnAllMonth" onClick="SelMonth(this);">All</button>
                        <?php
                            if(!empty($monthList[0])){
                                foreach($monthList as $monthItem){
                                    $month = trim($monthItem->monthname);
                                    $monthLabel = trim($monthItem->label);
                                    if (strpos($monthsFilter,$monthLabel) === false){
                                        $btnClass="btn-default";
                                    }else {
                                        $btnClass="btn-primary";
                                    }
                        ?>                                         
                                <button type="button" month="<?php echo $monthLabel ?>" class="btn <?php echo $btnClass ?> btnMonth" onClick="SelMonth(this);"><?php echo $month ?></button>
                        <?php
                                }
                            }    
                        ?>                                        
                        </div>
                        <button type="button" class="btn btn-primary " onClick="applyDateFilter();" >Apply</button>
                    </div>
                </div>
                <!-- Year / Mont Filters Row End --> 
<?php
    //Add default filters
    if (!empty($defFilters[0]))
    {
        $currentFilter="";
        $col=0;
        $maxCol=3;
        $open=false;
        foreach($defFilters as $filter)
        {
            if($currentFilter!=$filter["filter"])
            {
                if ($open)
                {
                    echo "                      </select>\n";
                    echo "                      <div class='$currentFilter"; echo "FLT'></div>\n";
                    echo "                  </div>\n";
                }
                $currentFilter=$filter["filter"];
                $col++;
                if ($col==1)
                {
                    if ($open)
                        echo "                    </div>\n";
                    echo "                    <div class='row'>\n";
                }
                
                echo "                    <div class='col-md-4'>\n";
                echo "                          $currentFilter :\n";
                echo "                          <select class='form-control slpFilter'  id='$currentFilter' >\n";
                echo "                              <option value=''>Add a $currentFilter"; echo "</option>\n";
                $open=true;                
            }
            echo "                              <option value='"; echo $filter["value"]; echo "'>";
            echo $filter["value"];
            echo "</option>\n";
         
        }
        echo "                          </select>\n";
        echo "                          <div class='$currentFilter"; echo "FLT'></div>\n";
        echo "                      </div>\n";
        echo "                    </div>\n";
    }
    // Add category Filters
    if (!empty($catFilters[0]))
    {
        $currentFilter="";
        $txtName = "";
        $col=0;
        $maxCol=3;
        $open=false;
        foreach($catFilters as $filter)
        {
            if($currentFilter!=$filter["filter"])
            {
                if ($open)
                {
                    $txtName = $currentFilter . "Txt";
                    echo "                      </select>\n";
                    echo "                      <div class='$currentFilter"; echo "FLT'></div>\n";
                    echo "                      <input name='$txtName' class='txtFilter' type='hidden' id='$txtName' value='";
                    if(!empty($_REQUEST[$txtName]))
                    {
                        echo $_REQUEST[$txtName] ;
                    }
                    echo "'>\n";
                    echo "                  </div>\n";
                }
                $currentFilter=$filter["filter"];
                $col++;
                if ($col==1)
                {
                    if ($open)
                        echo "                    </div>\n";
                    echo "                    <div class='row'>\n";
                }
                
                echo "                    <div class='col-md-4'>\n";
                echo "                          $currentFilter :\n";
                echo "                          <select class='form-control slpFilter'  id='$currentFilter' >\n";
                echo "                              <option value=''>Add a $currentFilter"; echo "</option>\n";
                $open=true;                
            }
            echo "                              <option value='"; echo $filter["value"]; echo "'>";
            echo $filter["value"];
            echo "</option>\n";
         
        }
        $txtName = $currentFilter . "Txt";
        echo "                          </select>\n";
        echo "                          <div class='$currentFilter"; echo "FLT'></div>\n";
        echo "                          <input name='$txtName' class='txtFilter' type='hidden' id='$txtName' value='";
        if(!empty($_REQUEST[$txtName]))
        {
            echo $_REQUEST[$txtName] ;
        }
        echo "'>\n";
        echo "                      </div>\n";
        echo "                    </div>\n";
    } 
    if(!empty($_REQUEST["origin"]))
    {
        echo "                    <input type=hidden id=rOrigin name=rOrigin value='" . $_REQUEST["origin"] . "'>" ;
    }
?>
                    <!-- ACA -->                         
                    </div>
                </div>
                
                    <input type="hidden" id="selector" name="selector" value="preview" > 
                    <input type="hidden" id="menufiller" name="menufiller" value="<?php echo $this->session->userdata('activedocumenu');?>" > 
                    <input type="hidden" id="menulabel" name="menulabel" value="<?php echo $this->session->userdata('activemenulabel');?>" >
                    <input type="hidden" id="datefiller" name="datefiller" value="<?php echo $this->session->userdata('activemenu');?>" >
                    <input type="hidden" id="yearsFilter" name="yearsFilter" value="<?php echo $yearsFilter ?>">
                    <input type="hidden" id="monthsFilter" name="monthsFilter" value="<?php echo $monthsFilter ?>">
                    <input type="hidden" id="searchFilter" name="searchFilter" value="">
                    <input type="hidden" id="origin" name="origin" value="preview">
                    <button type="button" class="btn btn-sm btn-info" onclick="documentList();"><i class="fa fa-list"></i> Documents List</button>
                </form>
                <input type="hidden" id="executed" value="0">
                
                <div class="pull-right m-b-20">
                    <div class="btn-group">
                        <span class="btn btn-sm btn-default sort" data-sort="value:asc"><i class="fa fa-sort-numeric-asc"></i></span>
                        <span class="btn btn-sm btn-default sort" data-sort="value:desc"><i class="fa fa-sort-numeric-desc"></i></span>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row">
            &nbsp;
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
        </div>
        <!-- END MESSAGES -->
        
        <div class="row">
            <div class="col-md-12">
                
                <!-- BEGIN GALLERY -->
                <div class="gallery" onscroll="scrollData()">
                    <div class="row" >
                        <input type="hidden" class="pagenum" value="1" />
        <!-- Begin automated files -->
        <?php
				$cnt=0;
        $classFilter="";
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
					$imgfn=$filedata->previewimagename;
					
					//$yearmonthlabel=$this->users_model->yearmonthlabel($uniquename);
          $classFilter = $this->users_model->filefiltervalues($uniquename);
          //$classFilter = str_replace("-"," ",$classFilter);
					
				
					if($imgfn=='')
					{
						$imgfn='preview_picture.jpg';	
					}	
				?>
    <div class="mix <?php echo $classFilter;?> col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="<?php echo $id;?>" draggable="true" ondragstart="drag(event)">
        <div class="thumbnail">
            <div class="overlay">
                <div class="thumbnail-actions">
                    
            <?php
                $this->load->library('awslib');
                
                $appdetails=$this->users_model->getSettings();
						 		//AWS access info
						 		if (!defined('awsAccessKey')) define('awsAccessKey', $appdetails[0]['awsAccessKey']);
						 		if (!defined('awsSecretKey')) define('awsSecretKey', $appdetails[0]['awsSecretKey']);
						 		
                $s3Client = new Aws\S3\S3Client([
                    'region'  => 'us-west-2',
                    'version' => 'latest',
                    'credentials' => [
                        'key'=> $appdetails[0]['awsAccessKey'],
                        'secret' => $appdetails[0]['awsSecretKey']
                    ]
                ]);
            
                $cmd = $s3Client->getCommand('GetObject', [
                    'Bucket' => 'docufilerpreviewimage',
                    'Key'    => $imgfn
                ]);
                
                $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');
                $presignedUrl = (string) $request->getUri();
                
                $cmd = $s3Client->getCommand('GetObject', [
                  /*  'Bucket' => 'docufilerpreviewimage',
                    'Key'    => $imgfn */
                    'Bucket' => 'docufiler',
                    'Key'    => $uniquename
                ]);
                
                $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');
                $presignedDownUrl = (string) $request->getUri();
                                
                echo '<a href="'.$presignedUrl.'" class="btn btn-default btn-icon btn-rounded magnific" title="'.$name.'"><i class="fa fa-search"></i></a>
                    <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                    <a target="_blank" rel="noopener noreferrer" href="'.$presignedDownUrl.'" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                    
                </div>
                </div>';
                /*<a href="'.base_url().'users/downloadfile/'.$id.'" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>                    */
                
                
                //echo '<img src="https://s3-us-west-2.amazonaws.com/docufilerpreviewimage/'.$imgfn.'" class="img-responsive" alt="'.$name.'" />';
                echo '<img src="'.$presignedUrl.'" class="img-responsive" alt="'.$name.'" />'; 
                
            ?>
            <div class="thumbnail-meta">
                <h5>
                <?php echo $name;?> <br>
                <small><i class="fa fa-clock-o"></i> <?php echo date('m/d/Y',strtotime($created_date));?></small>
                </h5>
            </div>
        </div>
    </div>
    <?php
    //    $cnt++;
    //    if($cnt%4==4){}
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
