        <!-- BEGIN MAIN SIDEBAR -->
        <nav id="sidebar">
            <div id="main-menu">
                <ul class="sidebar-nav">
                    <li>
                        <a href="<?php echo base_url();?>users/intro"><i class="fa fa-dashboard"></i><span class="sidebar-text">Dashboard</span></a>
                    </li>
 
                       
        <?php
				$cnt=0;
				$activemen="";
				$activemen=$this->session->userdata('activemenu');
				$limain="";
				$badgemain='';
				$datefilter_1=$this->session->userdata('activemenu');
				$menufilter_1=$this->session->userdata('activedocumenu');
				$menulabel_1=$this->session->userdata('activemenulabel');
				if ($totalfiles >= 1)
				{
						if ($datefilter_1 == $this->session->userdata('firstname'))
								{
										echo "<li>";
								}	
						else
								{
										echo "<li class=\"current active hasSub\">";
								}
        ?>
                        <a href="#"><i class="glyph-icon flaticon-circular116"></i><span class="sidebar-text">Upload Date </span>
        <?php         
            if ($datefilter_1 == "Today")
								{
										echo "<span class=\"fa arrow\"></span><span class=\"label label-danger pull-right m-r-20 w-300\">New</span></a>";
								}	
						else
								{
										echo "<span class=\"fa arrow\"></span></a>";
								}     
                      //  <!-- <span class="fa arrow"></span><span class="label label-danger pull-right m-r-20 w-300">New</span></a> -->
        ?>     
                        <ul class="submenu collapse">



				<?php
				foreach($dateresult as $result)
				{
						$badge="badge badge-primary badge-header";
						$new="";
						$li="";
						$header=$result['dateresult'];					
						if ($header == "Today")
								{
										$badge= "badge badge-danger badge-header";
										$new="<span class=\"label label-danger pull-right\">New</span>";
								}	
						else
								{
										$badge= "badge badge-primary badge-header";
										$new="";
								}					
						if ($activemen == $result['dateresult'])
								{
										$li="class=\"current active\"";
								}	
						else
								{
										$li="";
								}

				?>
				
                            <li <?php echo $li;?>>
																<form method="post" id="menuform" name="menuform" action="<?php echo base_url();?>users/listfiles"> 
																<input type="hidden" name="datefiller" value="<?php echo $result['dateresult'];?>" > 
																<input type="hidden" name="menufiller" value="<?php echo $menufilter_1;?>" >
																<input type="hidden" name="menulabel" value="<?php echo $menulabel_1;?>" >
																<a class="sidebar-text"> <input type="submit" class="text_menu_button" value="<?php echo $result['dateresult'];?> (<?php echo $result['total'];?>)"> <?php echo $new;?></a>
																</form>
                            </li>                           
                           
                 <?php
				$cnt++;
				if($cnt%4==0)
					{
					?>                  
           <?php
					}
				}
				?>                          
                            <li>
																<form method="post" id="menuform" name="menuform" action="<?php echo base_url();?>users/listfiles"> 
																<input type="hidden" name="datefiller" value="<?php echo $this->session->userdata('firstname');?>" > 
																<input type="hidden" name="menufiller" value="<?php echo $menufilter_1;?>" >
																<input type="hidden" name="menulabel" value="<?php echo $menulabel_1;?>" >
																<a class="sidebar-text"> <input type="submit" class="text_menu_button" value="All Dates"> <span class="badge badge-primary badge-header"><?php echo $totalfiles;?></span></a>
																</form>
                            </li> 
                        </ul>
                    </li>
        <?php
        				
        						if ($datefilter_1 == $this->session->userdata('firstname') && $menulabel_1 == "default")
								{
										echo "<li>";
								}	
						else
								{
										echo "<li class=\"current active hasSub\">";
								}
        ?>
                    
                        <a href="#"><i class="fa fa-tags" ></i><span class="sidebar-text" >Categories</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse">

<?php
				$cnt=0;
				foreach($documenu as $menuitem)
				{
						$badge="badge badge-primary badge-header";
						$new="";
						$li1="";
						$header=$menuitem['label'];					
						if ($header == "Today")
								{
										$badge= "badge badge-danger badge-header";
										$new="<span class=\"label label-danger pull-right\">New</span>";
								}	
						else
								{
										$badge= "badge badge-primary badge-header";
										$new="";
								}					
					/*	if ($activemen == $result['dateresult'])
								{
										$li1="class=\"current active\"";
								}	
						else
								{
										$li1="";
								}
					*/
				?>
                            <li <?php echo $li1;?>>
																<form method="post" id="documenuform" name="documenuform" action="<?php echo base_url();?>users/listfiles"> 
																<input type="hidden" name="menufiller" value="<?php echo $menuitem['menuid'];?>" > 
																<input type="hidden" name="menulabel" value="<?php echo $menuitem['label'];?>" >
																<input type="hidden" name="datefiller" value="<?php echo $datefilter_1;?>" >
																<a class="sidebar-text"> <input type="submit" class="text_menu_button" value="<?php echo $menuitem['label'];?> (<?php echo $menuitem['total'];?>)"> <?php echo $new;?></a>
																</form>
                            </li>                           
                           
                 <?php
				$cnt++;
				if($cnt%4==0)
					{
					?>                  
           <?php
					}
				}
				?> 
				                    <li>
																<form method="post" id="documenuform" name="documenuform" action="<?php echo base_url();?>users/listfiles"> 
																<input type="hidden" name="menufiller" value="default" > 
																<input type="hidden" name="menulabel" value="default" >
																<input type="hidden" name="datefiller" value="<?php echo $datefilter_1;?>" >
																<a class="sidebar-text"> <input type="submit" class="text_menu_button" value="All categories"> <span class="<?php echo $badge;?>"><?php echo $totalfiles;?></span></a>
																</form>
                            </li> 
                        </ul>
                    </li>
                    <li>
                        <form method="post" id="documenuform" name="documenuform" action="<?php echo base_url();?>users/listfiles"> 
													<input type="hidden" name="menufiller" value="pictures" > 
													<input type="hidden" name="menulabel" value="pictures" >
													<input type="hidden" name="datefiller" value="<?php echo $this->session->userdata('firstname');?>" >
													<a class="sidebar-text"> <i class="glyph-icon flaticon-images11"></i> <input type="submit" class="text_menu_button" value="Pictures"> (<?php echo $this->users_model->record_count_total_files_filetype($this->session->userdata('accountid'),'image');?>)</a>
												</form>
												
                        <!-- <a href="<?php echo base_url();?>users/listfiles" target="_blank"><i class="glyph-icon flaticon-images11"></i><span class="sidebar-text">Pictures (<?php echo $this->users_model->record_count_total_files($this->session->userdata('accountid'),'image');?>)</span></a> -->
                    </li>
                    <li>
                        <form method="post" id="documenuform" name="documenuform" action="<?php echo base_url();?>users/listfiles"> 
													<input type="hidden" name="menufiller" value="processing" > 
													<input type="hidden" name="menulabel" value="processing" >
													<input type="hidden" name="datefiller" value="<?php echo $this->session->userdata('firstname');?>" >
													<a class="sidebar-text"> <i class="glyph-icon flaticon-three91"></i> <input type="submit" class="text_menu_button" value="Processing"> (<?php echo $this->users_model->record_count_total_files_processing($this->session->userdata('accountid'));?>)</a>
												</form>
                        
                        
                     <!--   <a href="<?php echo base_url();?>users/listfiles" target="_blank"><i class="glyph-icon flaticon-three91"></i><span class="sidebar-text">Processing (<?php echo $this->users_model->record_count_total_files_processing($this->session->userdata('accountid'));?>)</span></a> -->
                    </li>
        <?php
      }
      	?>
                    <li>
                        <a href="<?php echo base_url();?>users/uploadfiles"><i class="fa fa-cloud-upload"></i><span class="sidebar-text">Upload Documents</span></a>
                    </li>
                    <li>
                        <a href="<?php echo URL_PAGE_VIEW;?>downloadApp.html" target="__blank"><i class="fa fa-cloud-download"></i><span class="sidebar-text">Download App</span></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.html" target="_blank"><i class="glyph-icon flaticon-settings21"></i><span class="sidebar-text">Settings</span><span class="fa arrow"></span></a>
                    			<ul class="submenu collapse">
                            <li>
                                <a href="<?php echo base_url();?>users/myprofile"><i class="glyph-icon flaticon-bust"></i><span class="sidebar-text">My Profile</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>users/accountinfo"><i class="fa fa-credit-card"></i><span class="sidebar-text">Account</span></a>
                            </li>
                            <li >
                                <a href="<?php echo base_url();?>users/categories"><i class="fa fa-edit"></i><span class="sidebar-text">Edit Categories</span></a>
                            </li>
                            <li >
                                <a href="<?php echo base_url();?>users/listfiles"><i class="fa fa-power-off"></i><span class="sidebar-text">Log Out</span></a>
                            </li>                       
                        	</ul>
                    
                    </li>
                 </ul>                 
            </div>
            <div class="footer-widget">
                <div class="footer-gradient"></div>
                <div id="sidebar-charts">
                    <div class="sidebar-charts-inner">
                        <div class="sidebar-charts-left">
                            <div class="sidebar-chart-title">Total Documents</div>
                            <div class="sidebar-chart-number"><?php echo number_format($totalfiles);?></div>
                        </div>
                        <div class="sidebar-charts-right" data-type="bar" data-color="theme">
                            <span class="dynamicbar2"></span>
                        </div>
                    </div>
<!--                    <hr class="divider">
                    <div class="sidebar-charts-inner">
                        <div class="sidebar-charts-left">
                            <div class="sidebar-chart-title">Income</div>
                            <div class="sidebar-chart-number">$47,564</div>
                        </div>
                        <div class="sidebar-charts-right" data-type="bar" data-color="theme">
                            <span class="dynamicbar2"></span>
                        </div>
                    </div>
                    <hr class="divider">
                    <div class="sidebar-charts-inner">
                        <div class="sidebar-charts-left">
                            <div class="sidebar-chart-title">Visits</div>
                            <div class="sidebar-chart-number" id="number-visits">147,687</div>
                        </div>
                        <div class="sidebar-charts-right" data-type="bar" data-color="theme">
                            <span class="dynamicbar3"></span>
                        </div>
                    </div>
 -->                   
                </div>
                <div class="sidebar-footer clearfix">
                    <a class="pull-left" href="<?php echo base_url();?>users/myprofile" data-rel="tooltip" data-placement="top" data-original-title="Settings"><i class="glyph-icon flaticon-settings21"></i></a>
                    <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen"><i class="glyph-icon flaticon-fullscreen3"></i></a>
                    <a class="pull-left" href="<?php echo base_url();?>users/uploadfiles" data-rel="tooltip" data-placement="top" data-original-title="Upload Files"><i class="fa fa-cloud-upload"></i></a>
                    <a class="pull-left" href="<?php echo base_url();?>users/logout" data-rel="tooltip" data-placement="top" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
                </div> 
            </div>
        </nav>
        <!-- END MAIN SIDEBAR -->