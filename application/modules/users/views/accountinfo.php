
<?php
if(!empty($userdetails[0]))
{
	$firstname=$userdetails[0]['firstname'];
	$lastname=$userdetails[0]['lastname'];
	$email=$userdetails[0]['emailid'];
	$phone=$userdetails[0]['phone'];
	$mobile=$userdetails[0]['mobile'];
	$created=$userdetails[0]['create_datetime'];
	$countrycd=$userdetails[0]['countrycd'];
	$address=$userdetails[0]['address'];
	$address1=$userdetails[0]['address1'];
	$city=$userdetails[0]['city'];
	$state=$userdetails[0]['state'];
	$zip=$userdetails[0]['zip'];
	$question=$userdetails[0]['question'];
	$answer=$userdetails[0]['answer'];
	$usertype=$userdetails[0]['usertype'];
        
        foreach($myplan as $plan)
	{
            $planname=$plan->planname;                                       			
             $planfiles=$plan->files;
            $pnousers=$plan->nousers;
            $enddate=$plan->EndDate;
            $nofiles=$plan->NoFiles;
            $balance=$plan->balance;																	
        } 
}
else
{
	$firstname='';
	$lastname='';
	$email='';
	$phone=''; 
	$mobile='';
  $created='';
  $countrycd='';
  $address='';
  $address1='';
  $city='';
  $state='';
  $zip='';
  $question='';
  $answer='';
  $usertype='';
  $firsttime='';
  $firsttimeshare='';
  $planname='';
  $planfiles='';
  $pnousers='';
  $enddate='';
  $nofiles='';
  $balance='';          

}
?>
<!--CQ-->
<!--start of middle section-->

<?php  print LeftMenu(); ?>


        <!-- BEGIN MAIN CONTENT -->
        <div id="main-content">
            <div class="page-title"> <i class="icon-custom-left"></i>
                <h2>My Account <small></small></h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="#"  class="form-horizontal" role="form" id="settings" method="post" novalidate>
                            <!-- BEGIN TABS -->
                            <div class="tabbable tabbable-custom form">
                                <ul class="nav nav-tabs">
                                    <!--<li class="active"><a href="#general_settings" data-toggle="tab">Profile</a></li>
                                    <li><a href="#email_settings" data-toggle="tab">Notifications</a></li> -->
                                    <li class="active"><a href="#account_settings" data-toggle="tab">Account</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="space20"></div>
                                    <div class="tab-pane id="general_settings">
                                        <div class="row profile">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <ul class="list-unstyled profile-nav col-md-3">
                                                            <li>
                                                                <img src="<?php echo base_url();?>/images/assets/img/avatars/avatar4_big.png" alt="avatar 4"/>
                                                            </li>
                                                        </ul>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-12 profile-info">
                                                                    <h1><?php echo $firstname; ?> <?php echo $lastname; ?></h1>
                                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.</p>
                                                                    <div class="m-t-10"></div>
                                                                    <ul class="list-unstyled list-inline">
                                                                        <li class="m-r-20"><i class="fa fa-map-marker p-r-5 c-dark"></i> <?php echo $city; ?></li>
                                                                        <li class="m-r-20"><i class="fa fa-calendar p-r-5 c-purple"></i> <?php echo $created; ?></li>
                                                                        <li class="m-r-20"><i class="fa fa-briefcase p-r-5 c-brown"></i> Webmaster</li>
                                                                        <li class="m-r-20"><i class="fa fa-star p-r-5 c-blue"></i> Moderator</li>
                                                                        <li><i class="fa fa-heart p-r-5 c-red"></i> Swimming</li>
                                                                    </ul>
                                                                    <div class="m-t-20"></div>
                                                                    <a href="profil.html" class="btn btn-dark">See my Profile</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-block alert-info fade in width-100p">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <h5>Your profil is visible by all users. <a href="#">Edit my parameters</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row profile-classic">
                                                    <div class="col-md-12 m-t-20">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-phone c-gray m-r-10"></i> CONTACT INFO</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Email:</div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Phone:</div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="phone"  value="<?php echo $phone?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Mobile:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="mobile"  value="<?php echo $mobile?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-info c-gray m-r-10"></i> ABOUT</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label col-md-3 p-t-0">Member since:</div> 
                                                                    <div class="col-md-6"><?php echo $created; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3 p-t-0">Invited by:</div> 
                                                                    <div class="col-md-6"><a href="#">John Pharell</a></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Surname:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" value="Tod"></div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Hobbies:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"  value="football, basket"></div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Fun facts:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"  value="Love to go in space"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-group c-gray m-r-10"></i> FAMILY</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                <div class="control-label col-md-3">Children:</div> 
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" value="William"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Pets:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" value="Marley">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-home c-gray m-r-10"></i> ADDRESS</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Street:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="address"  value="<?php echo $address;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Street:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="address1"  value="<?php echo $address1;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">City:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="city"  value="<?php echo $city;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">State:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="state"  value="<?php echo $state;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Zip Code:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="zip"  value="<?php echo $zip;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">Country:</div> 
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="countrycd" value="<?php echo $countrycd;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row profile-classic">
                                                    <div class="col-md-12 m-t-20">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-lock c-gray m-r-10"></i> SECURITY QUESTION</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Security Question:</div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="question" value="<?php echo $question;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label c-gray col-md-3">Security Answer:</div>
                                                                    <div class="col-md-6">
                                                                        <input type="password" class="form-control" name="answer"  value="<?php echo $answer?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-bar-chart-o c-gray m-r-10"></i> PERSONAL STATS</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="control-label col-md-3 p-t-0">ARTICLES:</div> 
                                                                    <div class="col-md-9">4</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3 p-t-0">ANSWERS:</div> 
                                                                    <div class="col-md-9">2</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3 p-t-0">PICTURES:</div> 
                                                                    <div class="col-md-9">1</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3 p-t-0">EVENTS:</div> 
                                                                    <div class="col-md-9">1</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="col-sm-12">
                                                    <div class="align-center">
                                                        <input type="submit" onclick="myFunction()" value="Validate" class="btn btn-primary m-r-20">
                                                        <button type="reset" class="btn btn-default">Cancel</button>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="email_settings">
                                        <p class="m-t-20">You will receive your notification at <strong><?php echo $email;?></strong></p>
                                        <div class="m-t-10"></div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-3"></th>
                                                    <th class="col-md-3">
                                                    <strong>INSTANTLY</strong><br/>
                                                    <span>Immediate update</span>
                                                    </th>
                                                    <th class="col-md-3"><strong>DAYLY</strong><br/>
                                                    <span>Once a day</span>
                                                    </th>
                                                    <th class="col-md-3"><strong>NO EMAIL</strong><br/>
                                                    <span>No email updates</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4"><strong>MESSAGES</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>My contacts</td>
                                                    <td>
                                                        <input type="radio" name="contacts" value="1" checked/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="contacts" value="2"/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="contacts" value="3"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Other people</td>
                                                    <td>
                                                        <input type="radio" name="people" value="1"/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="people" value="2" checked/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="people" value="3"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Smallads</td>
                                                    <td>
                                                        <input type="radio" name="smallads" value="1"/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="smallads" value="2" checked/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="smallads" value="3" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>News</td>
                                                    <td>
                                                        <input type="radio" name="news" value="1" checked/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="news" value="2"/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="news" value="3"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Recommandations</td>
                                                    <td>
                                                        <input type="radio" name="recommandations" value="1"/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="recommandations" value="2"/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="recommandations" value="3" checked/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Important Alerts (<a href="#" class="c-blue">SMS</a>)</td>
                                                    <td>
                                                        <input type="radio" name="alerts" value="1" checked/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="alerts" value="2"/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="alerts" value="3"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Messages sent by email</td>
                                                    <td colspan="3">
                                                        <label>
                                                            <input type="checkbox" checked>Send me a confirmation when I send an email.
                                                        </label>   
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Welcome message</td>
                                                    <td colspan="3">
                                                        <label>
                                                            <input type="checkbox" checked>Send a message when someone thanks me for my message.
                                                        </label> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"><strong>MEMBERS</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>New members</td>
                                                    <td colspan="3">
                                                        <label>
                                                            <input type="checkbox" checked>Send me a confirmation when I send an email.
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Contacts not verified</td>
                                                    <td colspan="3">
                                                        <label>
                                                            <input type="checkbox" checked>Send me a message.
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"><strong>PICTURES</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>New Pictures</td>
                                                    <td>
                                                        <input type="radio" name="pics" value="option1" checked/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="pics" value="option1"/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="pics" value="option1"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pictures from friends</td>
                                                    <td colspan="3">
                                                        <label>
                                                            <input type="checkbox" checked>Send me an email
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"><strong>ANSWERS</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>New Answer from users</td>
                                                    <td>
                                                        <input type="radio" name="answers" value="1" checked/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="answers" value="2"/>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="answers" value="3"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Answer one of my message</td>
                                                    <td colspan="3">
                                                        <label>
                                                            <input type="checkbox" checked>Send me an email when someone answer one of my message.
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            
                                            <div class="col-sm-12">
                                            <div class="align-center m-t-20">
                                                <input type="submit" onclick="myFunction()" value="Validate" class="btn btn-primary m-r-20">
                                                <button type="reset" class="btn btn-default">Cancel</button>
                                            </div>
                                         </div> 
                                        </div>
                                      </div>
                                    <!-- account setting begin -->
                                    <div class="tab-pane active" id="account_settings">
                                        <div class="row profile-classic">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-title line">
                                                        <div class="caption"><i class="fa fa-info c-gray m-r-10"></i> PLAN</div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="control-label col-md-3 p-t-0">Plan:</div> 
                                                            <div class="col-md-6"><?php echo $planname;?></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="control-label col-md-3 p-t-0">Expiration Date:</div> 
                                                            <div class="col-md-6"><a href="#"><?php echo $enddate;?></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-credit-card c-gray m-r-10"></i> CREDIT CARDS</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                   <div class="row">
                                                                   		<div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-blue filter-right">
                                    																		<table class="table table-striped table-hover table-dynamic">
                                        																	<thead>
                                            																<tr>
                                                																<th>Card Name</th>
                                                																<th>Card Type</th>
                                                																<th>First Name</th>
                                                																<th>Number</th>
                                                																<th>CVV</th>
                                                																<th>Actions</th>
                                                																<th>Primary</th>
                                                            							  </tr>
                                        																	</thead>
                                        																	<tbody class="no-bd-y">
<?php
				$primarycheck="unchecked";
				foreach($cardlist as $card)
				{ 
					if ($card['primary']==1)
					 $primarycheck="checked";
?>
                                           																  <tr>
                                           																     <td><?php echo $card['cardname'];?></td>
                                           																     <td><?php echo $card['cardtype'];?></td>
                                           																     <td><?php echo $card['cardholderfname'];?></td>
                                           																     <td><?php echo $card['cardno'];?></td>
                                           																     <td><?php echo $card['cardcvv'];?></td>
                                           																     <td><span class="Download"><a href="<?php echo base_url()?>users/deletecard/<?php echo $card['id'];?>"><i class="fa fa-trash-o"></i></a></span><span class="Download"> <a href="<?php echo base_url()?>users/cardinfo/<?php echo $card['id'];?>"><i class="fa fa-download"></i></a></span></td>
                                           																     <td class="text-center">
                                                                                   <input type="checkbox" class="switch" <?php echo $primarycheck;?> data-size="small">
                                                                               </td>                                                            
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
                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">
                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-home c-gray m-r-10"></i> BILLING ADDRESS</div>
                                                            </div>
                                                            <div class="panel-body">
                                                                   <div class="row">
                                                                   		<div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-blue filter-right">
                                    																		<table class="table table-striped table-hover table-dynamic">
                                        																	<thead>
                                            																<tr>
                                                																<th>Card Name</th>
                                                																<th>Address</th>
                                                																<th>Address1</th>
                                                																<th>City</th>
                                                																<th>State</th>
                                                																<th>Zip</th>
                                                																<th>Country</th>
                                                																<th>Actions</th>
                                                            							  </tr>
                                        																	</thead>
                                        																	<tbody class="no-bd-y">
<?php
				foreach($cardlist as $card)
				{
?>
                                           																  <tr>
                                           																     <td><?php echo $card['cardname'];?></td>
                                           																     <td><?php echo $card['baddress'];?></td>
                                           																     <td><?php echo $card['baddress1'];?></td>
                                           																     <td><?php echo $card['bcity'];?></td>
                                           																     <td><?php echo $card['bstate'];?></td>
                                           																     <td><?php echo $card['bzip'];?></td>
                                           																     <td><?php echo $card['bcountry'];?></td>
                                           																     <td><span class="Download"> <a href="<?php echo base_url()?>users/billingaddress/<?php echo $card['id'];?>"><i class="fa fa-download"></i></a></span></td>                                                           
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
                                                <div class="col-sm-12">
                                                    <div class="align-center">
                                                        <input type="submit" onclick="myFunction()" value="Validate" class="btn btn-primary m-r-20">
                                                        <button type="reset" class="btn btn-default">Cancel</button>
                                                    </div>
                                                </div> 
                                    </div>
                                </div>
                            </div>      <!-- end -->                                  
                            <!--END TABS-->
                        </form>
                </div>
            </div>
 
        </div>
  
        <!-- END MAIN CONTENT -->
<!--end of middle section-->



