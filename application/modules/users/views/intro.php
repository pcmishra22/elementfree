		<?php  print LeftMenu(); ?>
		
		   <!-- BEGIN MAIN CONTENT -->
        <div id="main-content" class="dashboard">
            <div class="row m-t-20">
                
                <div class="col-md-3 col-sm-12">
                    <div class="panel no-bd bd-3 panel-stat" id="panel-plan">
                        <div class="panel-body bg-green p-15">
                            <div class="row m-b-0">
                                <div class="col-xs-3">
                                    <i class="glyph-icon flaticon-orders"></i>
                                </div>
                                <?php 
                                            		foreach($myplan as $plan)
							{
								$planname=$plan->planname;                                       			
                                            			$planfiles=$plan->files;
                                            			$pnousers=$plan->nousers;
                                                                $enddate=$plan->EndDate;
                                                                $nofiles=$plan->NoFiles;
                                                                $balance=$plan->balance;																	
                                                        }                                            	
                                            	?>
                                <div class="col-xs-9">
                                    <small class="stat-title">MY CURRENT PLAN</small>
                                    <div class="live-tile" data-delay="4000" data-animation-easing="fade" data-height="47">
                                        <div>
                                            <h1 class="m-0 w-500 bg-green"><?php echo $planname; ?> </h1>
                                        </div>
                                        <div>
                                            <h1 class="m-0 w-500 bg-green"><?php echo number_format($planfiles); ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <small class="stat-title">Used</small>
                                    <div class="live-tile" data-delay="4000" data-animation-easing="fade" data-height="30">
                                        <div class="bg-green">
                                            <h3 class="m-0 w-500"><?php echo number_format($nofiles); ?></h3>
                                        </div>
                                        <div class="bg-green">
                                            <h3 class="m-0 w-500"><?php echo number_format(($nofiles*100)/$planfiles,2); ?>%</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <small class="stat-title">Available</small>
                                    <div class="live-tile" data-delay="4000" data-animation-easing="fade" data-height="30">
                                        <div class="bg-green">
                                            <h3 class="m-0 w-500"><?php echo number_format($balance); ?></h3>
                                        </div>
                                        <div class="bg-green">
                                            <h3 class="m-0 w-500"><?php echo number_format(100-(($nofiles*100)/$planfiles),2); ?>%</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                 <div class="col-md-3 col-sm-12">
                    <div class="panel no-bd bd-3 panel-stat" id="panel-devices">
                        <div class="panel-body bg-dark p-15">
                            <div class="row m-b-6">
                                <div class="col-xs-3">
                                    <i class="glyph-icon flaticon-responsive4"></i>
                                </div>
                                <div class="col-xs-9">
                                    <small class="stat-title">Devices</small>
                                    <h1 class="m-0 w-500"><span class="animate-number" data-value="<?php echo $this->users_model->NoDevices($this->session->userdata('accountid')); ?>" data-animation-duration="1400">0</span></h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <small class="stat-title">Users</small>
                                    <h3 class="m-0 w-500"><span class="animate-number" data-value="<?php echo $this->users_model->NoAccounts($this->session->userdata('accountid')); ?>" data-animation-duration="1400">0</span></h3>
                                </div>
                                <div class="col-xs-6">
                                    <small class="stat-title">Invitations</small>
                                    <h3 class="m-0 w-500"><span class="animate-number" data-value="<?php echo $this->users_model->NoInvitations($this->session->userdata('userid')); ?>" data-animation-duration="1400">0</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php    
                
                //$DashQtyThisWeek = "-1";
                $DashQtyThisWeek=$this->users_model->dateResultMenuDash($this->session->userdata('accountid'),'This Week');
                $DashQtyLastWeek=$this->users_model->dateResultMenuDash($this->session->userdata('accountid'),'Last Week');
                $DashQtyThisMonth=$this->users_model->dateResultMenuDash($this->session->userdata('accountid'),'This Month'); 
                $DashQtyThisYear=$this->users_model->dateResultMenuDash($this->session->userdata('accountid'),'This Year'); 
            ?>
                <div class="col-md-3 col-sm-12">
                    <div class="panel no-bd bd-3 panel-stat" id="panel-docstats">
                        <div class="panel-body bg-blue p-15">
                            <div class="row m-b-10">
                                <div class="col-xs-3">
                                    <i class="glyph-icon  flaticon-curriculum"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="3500" data-height="56">
                                        <div>
                
                                            <small class="stat-title">Documents this Week</small>
                                            <h1 class="m-0 w-300"><?php echo $DashQtyThisWeek; ?></h1>
                                        </div>
                                        <div>
                                            <small class="stat-title">Documents Last Week</small>
                                            <h1 class="m-0 w-300"><?php echo $DashQtyLastWeek; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <small class="stat-title">This Month</small>
                                    <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="3500" data-height="30">
                                        <div>
                                            <h3 class="m-0 w-300"><?php echo $DashQtyThisMonth; ?></h3>
                                        </div>
                                        <div>
                                            <h3 class="m-0 w-300"><?php echo $DashQtyThisMonth; ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <small class="stat-title">This Year</small>
                                    <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="3500" data-height="30">
                                        <div>
                                            <h3 class="m-0 w-500"><?php echo $DashQtyThisYear; ?></h3>
                                        </div>
                                        <div>
                                            <h3 class="m-0 w-500"><?php echo $DashQtyThisYear; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="panel no-bd bd-3 panel-stat" id="panel-account">
                        <div class="panel-body bg-red p-15">
                            <div class="row m-b-6">
                                <div class="col-xs-3">
                                    <i class="glyph-icon flaticon-information33"></i>
                                </div>
                                <div class="col-xs-9">
                                    <small class="stat-title">Account Status</small>
                                    <h1 class="m-0 w-500">Active</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <small class="stat-title">AutoSync</small>
                                    <h3 class="m-0 w-500">Active</h3>
                                </div>
                                <div class="col-xs-6">
                                    <small class="stat-title">Files Synced</small>
                                    <h3 class="m-0 w-500">21</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <!--    <div class="col-md-3 col-sm-12">
                    <div class="panel no-bd bd-3 panel-stat"  id="panel-pages">
                        <div class="panel-body bg-white p-15">
                            <div class="row m-b-6">
                                <div class="col-xs-3">
                                    <i class="glyph-icon flaticon-educational"></i>
                                </div>
                                <div class="col-xs-9">
                                    <h4 class="c-dark">CLICK HERE TO SEE HOW IT WORKS</h4>
                                    <a href="javascript:void(0);" id="start-intro" class="btn btn-dark btn-lg m-t-20">How it works!</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                </div>
                                <div class="col-xs-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            -->

           
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    
                                    <div id="graph-wrapper" style="display: none;">
                                        
                                        <div class="graph-info p-r-10">
                                            <a href="javascript:void(0)" class="btn bg-green">Monthly Documents</a>
                                            <a href="javascript:void(0)" class="btn bg-blue">Total Documents</a>
                                            <button id="bars" class="btn" disabled><span></span>
                                            </button>
                                            <button id="lines" class="btn active" disabled><span></span>
                                            </button>
                                        </div>
                                        
                                        <div class="h-300">
                                            <div class="h-300" id="graph-lines" style="width:100%"></div>
                                            <div class="h-300" id="graph-bars" style="width:100%"></div>
                                        </div>
                                    </div>
                                    
                                </div>
            
                                <div class="col-md-4" id="donut-chart1">
                                    <!--
                                <div class="col-md-4" id="browser-stats">    
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <h4 class="text-center c-gray">Bounce rate</h4>
                                            <div class="spark-chart-1"></div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 hidden-md hidden-sm hidden-xs">
                                            <h4 class="text-center c-gray">Unique visitors</h4>
                                            <div class="spark-chart-2"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-12">
                                            <h4 class="m-b-m50 m-t-30 text-center c-gray">Browsers</h4>
                                            <div id="donut-chart1" class="m-b-m30"></div>
                                        </div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4" id="chart_revenue">
                   
                </div>
                <div class="col-md-4">
                  <!--  <div class="panel panel-stat bg-purple-gradient">
                        <div class="panel-heading text-center p-10 p-b-0">
                            <div class="pos-abs t-10 l-15 f-18 c-white"> <i class="fa fa-dollar"></i>
                            </div> 
                            <h2 class="panel-title c-white">Revenue</h2>
                            <div class="pos-abs t-5 r-5 f-18 c-white cursor-pointer">
                                <div class="glyph-icon flaticon-plus16 f-32"></div>
                            </div>
                        </div>
                        <div class="panel-body p-0 bg-transparent">
                            <div id="chart_revenue" style="height: 340px;"></div>
                        </div>
                    </div>
                  -->
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->


<?php
    if ($this->_ci_cached_vars['newMembership'] ) {
?>
    <a class="fancybox3 fancybox.iframe" id="purchasemembership" href="<?php echo base_url();?>users/filesubscription"></a>

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
        $(".fancybox3").fancybox({
            'width' : 1200
        });
        $("#purchasemembership").click();
    </script>
<?php
    }
?>