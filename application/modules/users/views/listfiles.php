<?php print LeftMenu(); ?>

<!--
<?php     
    //load local variables
    $accountid = $this->session->userdata('accountid');
    $datefilter = $DateFilter; 
    $menufilter = $MenuFilter;
    $menulabel = $MenuLabel;
    
    if(!empty($_REQUEST['monthsFilter']))
    {
        $monthsFilter= trim($_REQUEST['monthsFilter']);
        $monthsFilter=",$monthsFilter";
        $btnAllMonthsClass="btn-default";
    }else{
        $monthsFilter="";
        $btnAllMonthsClass="btn-primary";
    }
    if(!empty($_REQUEST['yearsFilter']))
    {
        $yearsFilter= trim($_REQUEST['yearsFilter']);
        $yearsFilter = ",$yearsFilter";
        $btnAllYearsClass="btn-default";
    }else{
        $yearsFilter="";
        $btnAllYearsClass="btn-primary";
    }
    if(!empty($_REQUEST['searchFilter']))
    {
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
                                        <a href="#" onClick="applySearchFilter();"><span style='color:white;'><span class="arrow">&nbsp;</span>
                                                <i class="fa fa-search"></i>&nbsp;</span></a>
                                    </span>
                                </div>
<?php
    if(!empty($searchList[0]))
    {
        //echo "entro \n";
        $i=9;
        $favFunction="";
        while($i>=0)
        {
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
    }else
    {
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
                                <button type="button" year="" class="btn <?php echo $btnAllYearsClass ?> btnAllYear" onClick='SelYear(this);'>All</button>
<?php
    if(!empty($yearList[0]))
    {
        foreach($yearList as $yearItem)
        {
            $year = trim($yearItem->year);
            $yearLabel = $yearItem->label;
            if (strpos($yearsFilter,$year) === false)
            {
                $btnClass="btn-default";
            }else {
                $btnClass="btn-primary";
            }
?>                        
                                <button type="button" year="<?php echo $year; ?>" class="btn <?php echo $btnClass ?> btnYear" onClick='SelYear(this);'><?php echo $year; ?></button>
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
    if(!empty($monthList[0]))
    {
        foreach($monthList as $monthItem)
        {
            $month = trim($monthItem->monthname);
            $monthLabel = trim($monthItem->label);
            if (strpos($monthsFilter,$monthLabel) === false)
            {
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
                echo "                          <select class='form-control slFilter'  id='$currentFilter' >\n";
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
        $txtName="";
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
                echo "                          <select class='form-control slFilter'  id='$currentFilter' >\n";
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
                

                <input type="hidden" id="selector" name="selector" value="list" > 
                <input type="hidden" id="menufiller" name="menufiller" value="<?php echo $this->session->userdata('activedocumenu');?>" > 
                <input type="hidden" id="menulabel" name="menulabel" value="<?php echo $this->session->userdata('activemenulabel');?>" >
                <input type="hidden" id="datefiller" name="datefiller" value="<?php echo $this->session->userdata('activemenu');?>" >
                <input type="hidden" id="yearsFilter" name="yearsFilter" value="<?php echo $yearsFilter ?>">
                <input type="hidden" id="monthsFilter" name="monthsFilter" value="<?php echo $monthsFilter ?>">
                <input type="hidden" id="searchFilter" name="searchFilter" value="">
                <input type="hidden" id="origin" name="origin" value="list">
                <button type="button" class="btn btn-sm btn-info" onclick="documentPreview();"><i class="fa fa-picture-o"></i> Documents Preview</button>
            </form>
            <input type="hidden" id="executed" value="0">
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
                    <div class="panel panel-default">
<!--encabezado-->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-blue filter-left">
                                    <table class="table table-striped table-hover table-dynamic" id="tblFiles">
                                        <thead>
                                            <tr>
                                                <th>Actions</th>
                                                <th>Document Name</th>
                                                <th>Date Uploaded</th>
                                                <th>Type</th>
                                                <th>Size</th>
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
    $classFilter = "";
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
            $imgfn=$userfiles->previewimagename;

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
            
            $classFilter = $this->users_model->filefiltervalues($id);
            $classFilter = str_replace("-"," ",$classFilter);
?>
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
                
                $imgfn = ($imgfn != "") ? $imgfn : 'preview_picture.jpg';
                
                $cmd = $s3Client->getCommand('GetObject', [
                  /*  'Bucket' => 'docufilerpreviewimage',
                    'Key'    => $imgfn */
                    'Bucket' => 'docufiler',
                    'Key'    => $uniquename
                ]);
                
                $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');
                $presignedUrl = (string) $request->getUri();
            ?>
                                            <tr class="TRDocuments ">
                                                <td>
                                                    <?php if( $this->session->userdata('activemenulabel') == "Miscellaneous" ) { ?><span class="AddCategory" title="Add Category"><a class="fancybox5 fancybox.iframe" id="openAddCategoryPopup" href="<?php echo base_url();?>users/addcategorypopup?id=<?php echo $id;?>&img=<?php echo $imgfn;?>"><i class="fa fa-tags"></i></a></span><?php } ?>
                                                    <span class="Preview" title="Preview"> <a href="<?php echo $presignedUrl;?>" class="magnific"><i class="fa fa-search"></i></a></span>
                                                    <span class="Delete" title="Delete"><a href="<?php echo base_url();?>users/deletefile/<?php echo $id;?>"><i class="fa fa-trash-o"></i></a></span>
                                                    <span class="Download" title="Download"> <a target="_blank" rel="noopener noreferrer" href="<?php echo $presignedUrl ;?>"><i class="fa fa-download"></i></a></span>
<!--                                                    <span class="Download" title="Download"> <a href="<?php base_url(); ?>users/downloadfile/  <?php echo $id;?>"><i class="fa fa-download"></i></a></span> -->
                                                </td>
                                                <td><?php echo $name;?></td>
                                                <td><?php echo date('Y-m-d h:i:s',strtotime($created_date));?></td>
                                                <td><?php echo $filetype;?></td>
                                                <td><?php echo $size;?></td>

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
             echo "                                             </tr>\n";
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
        </div>
        <!-- END MAIN CONTENT -->

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
    $(".fancybox5").fancybox({
        'width' : 1200
    });
</script>

<style>
    .dataTables_filter {
        display: none!important;
    }
    .table-responsive div div div:first-child{
        float: right;
    }
    .table-responsive div div div:first-child div{
        float: right;
    }
    .table-responsive div div div:last-child{
        float: left;
    }
</style>            
