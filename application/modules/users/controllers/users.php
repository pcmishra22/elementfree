<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MX_Controller{
	
	  //constructor call	
	  function __construct()
	  {
        parent::__construct();
		session_start();
		$this->load->helper(array('form', 'url'));
		$this->load->model('users/users_model');
		$this->load->library("pagination");
		$this->load->library('s3');
                //
	  }
	  //checking cron
	  public function cron()
	  {
		  $files=$this->users_model->imageNotConvertedFiles();

		  $filepath=FCPATH."files_images/";
		  if(count($files)>0)
		  {
			  foreach($files as $file)
			  {
				//check file type	
				$farray = pathinfo($file['uniquename']);
				$fextension = $farray['extension'];
				echo 'extension='.$fextension;
				$fn=$farray['filename'];
				echo ' fn= '.$fn;
				//filepath
				$filename=$filepath.$file['uniquename'];
				echo ' filename= '.$filename;
				//check file extension
				if($fextension!='jpg')
				{ 
						if($fextension!='pdf')  
						{
						  //convert to pdf
						  $cmd='unoconv -f pdf ';
						  $command=$cmd.$filename;
						  exec($command);
						}
				  //convert -density 300 p.pdf -quality 100 o.jpg
				  //convert to jpg
				  //$cmd='unoconv -f jpg ';
				  $cmd='convert ';
				  $filename=$filepath.$fn.'.pdf';
				  $filename2=$filepath.$fn.'.jpg';
				  $cmd2=' -thumbnail \'600x800!\' ';
				  $command=$cmd.$filename.$cmd2.'    '.$filename2;
				  echo ' command= '.$command;
				  exec($command);
				}
				//check which file is created...............            
				$fullpath=FCPATH."files_images/".$fn.'.jpg';
				echo ' fullpath = '.$fullpath;
				$previewfile='';                                  
				if(file_exists($fullpath))
				{
					$previewfile=$fn.'.jpg';
					echo ' previewfile jpg = '.$previewfile;
				}                        
				if($previewfile=='')
				{
					$fullpath=FCPATH."files_images/".$fn.'-0.jpg';
					if(file_exists($fullpath))
					{
						$previewfile=$fn.'-0.jpg';
						echo ' previewfile jpg -0 = '.$previewfile;
					}	
				}
				echo ' previewfile = '.$previewfile;
				//update table field to set image is created
				$data=array(
					'is_image_created' =>'1',
					'previewimagename' =>$previewfile
				);
				//update query
				$this->users_model->updateData('id',$file['id'],'files',$data);

				// Bucket Name
				$bucket="docufilerpreviewimage";
				//get accesskey from database
				$appdetails=$this->users_model->getSettings();
				//AWS access info
				if (!defined('awsAccessKey')) define('awsAccessKey', $appdetails[0]['awsAccessKey']);
				if (!defined('awsSecretKey')) define('awsSecretKey', $appdetails[0]['awsSecretKey']);
				//instantiate the class
				$s3 = new S3(awsAccessKey, awsSecretKey);
				//Source path
				$sourcePath = FCPATH."files_images/"; 			// Storing source path of the file in a variable
				//FILE UNIQUE NAME
				$fileuniquename=$previewfile;
				$sourcePathname=$sourcePath.$fileuniquename;
				echo ' S3 command = '.$sourcePathname.'-'.$bucket.'-'.$fileuniquename;
				if($s3->putObjectFile($sourcePathname, $bucket , $fileuniquename, S3::ACL_PUBLIC_READ) )
				{
					//delete files from temp folder....				  
					$cmd='rm -f ';
					$filename=$sourcePath.$fn[0].'.*';
					$command=$cmd.$filename;
					//exec($command);
				}
							else
							{
								echo 'File not uploaded on S3.';
							}
			  }
		  }
	  }

	  //save menu 
	  public function savedynamicmenu()
	  {
		$fileid=$this->input->post('fileid'); 
		$folderid=$this->input->post('folderid'); 
		//data to store
		$data = array(
                    'menuid' => $folderid,
                    'fileid' => $fileid,
					'accountid' => $this->session->userdata('userid')
        ); 	
		//save 
		$this->users_model->saveData('filescategory', $data);
		//message
		echo 'File save in this category.';
	  }
	  //dynamic menu
	  public function dynamicmenu()
	  {
	    //variable assignments.................................................
	    $pstr='';
        //get data from database...............................................
        $result=$this->users_model->dynamicSubMenu($this->input->post('id'));
        //check counter
        if(count($result)>0)
	  	{
            $pstr='<ul class="nav nav-list nav-left-ml nested">';
            foreach($result as $resultdata)
            {
                $submenuid= $this->users_model->dynamicSubMenu($resultdata['menuid']);
                $pstr.='<li id="'.$resultdata['menuid'].'" ondrop="drop(event,this.id)" ondragover="allowDrop(event)"><a onclick="submenu('.$resultdata['menuid'].');" class="color" href="javascript:void(0);">'.$resultdata['label'].'('.count($submenuid).')</a><span id="'.$resultdata['menuid'].'"></span></li>';
            }
            $pstr.='</ul>';
	  	}
        //echo string........................................................
        echo $pstr;
	  }
	  //select subscription
	  public function subscription()
	  {
		$data=array();
		$data['subscriptiondetails']=$this->users_model->subscriptionDetails();
		$this->load->view('subscription',$data);
	  }
	  //select subscription 
	  public function filesubscription()
	  {
		$data=array();
		$data['subscriptiondetails']=$this->users_model->subscriptionDetails();
		$this->load->view('filesubscription',$data);
	  }

        //select add category 
        public function addcategorypopup()
        {
            $data = array();

            $this->load->library('awslib');

            $s3Client = new Aws\S3\S3Client([
                'region'  => 'us-west-2',
                'version' => 'latest',
                'credentials' => [
                    'key'=> 'AKIAIO4ZT23JPOTAFWOQ',
                    'secret' => '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'
                ]
            ]);

            $imgfn = ($imgfn != "") ? $imgfn : 'preview_picture.jpg';

            $cmd = $s3Client->getCommand('GetObject', [
                'Bucket' => 'docufilerpreviewimage',
                'Key'    => $this->input->get('img')
            ]);

            $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');
            $presignedUrl = (string) $request->getUri();

            $data['id_document'] = $this->input->get('id');
            $data['img_preview'] = $presignedUrl;
            $this->load->view('addcategorypopup',$data);
        }

        //search words document
        public function searchwordsdocument()
        {
            $result = $this->users_model->searchwordsdocument( $this->input->post('document') );
            $wordsdocument = explode(" ", $result);
            $wordsfound = array();
            foreach ( $wordsdocument as $word ) {
                $pos = strpos($word, $this->input->post('word'));
                if ($pos === false) {} else {
                    $wordsfound[] = $word;
                }
            }
            echo json_encode($wordsfound);
        }
        
        //search subcategories
        public function searchcategories()
        {
            $result = $this->users_model->getCategories($this->session->userdata('accountid'));
            echo json_encode($result);
        }
        
        //save Categorization Document 
        public function saveategorizationdocument()
        {
            $result = $this->users_model->saveategorizationdocument($this->input->post('category'), $this->input->post('subcategory'), $this->input->post('document'), $this->input->post('selectedwords'), $this->session->userdata('accountid'), $this->input->post('wordorganized'), $this->input->post('noselectedwords'), $this->input->post('valuecategory'));
            echo json_encode($result);
        }

        //search subcategories
        public function searchsubcategories()
        {
            $result = $this->users_model->searchsubcategories( $this->input->post('category') );
            echo json_encode($result);
        }
        
        //save new category
        public function saveNewCategory()
        {
            $result = $this->users_model->saveNewCategory( $this->input->post('namecategory') , $this->session->userdata('accountid') , $this->input->post('wordorganized') );
            echo json_encode($result);
        }
        
        //save new subcategory
        public function saveNewSubCategory()
        {
            $result = $this->users_model->saveNewSubCategory( $this->input->post('namecategory'), $this->input->post('namesubcategory') , $this->session->userdata('accountid') , $this->input->post('wordorganized') );
            echo json_encode($result);
        }

	  //promo details
	  public function promodiscount()
	  {
		$details=$this->users_model->promoDiscount($this->input->post('code'));
		$percent=$details[0]['percent'];
		$total=$this->input->post('total');
		$discount=($total*$percent)/100;
		$dis=$total-$discount;
		$str1="<div><div id='inner_1'>$".$discount."</div><div id='inner_2'>$".$dis."</div></div>";
		echo $str1;
	  }
	  //signup page calling
	  public function signup($id='')
	  {
		//if($id=='')
			//redirect('users/subscription');
		
		
		$planname='';
				
		if($id==1)
			$planname='personal';
		if($id==2)
			$planname='household';
		if($id==3)
			$planname='business';
				
		if($this->session->userdata('userid')>0)
		{
			$this->session->set_userdata('planname',$planname);
			//check for referal
			if(strpos(@$_SERVER['HTTP_REFERER'],'filesubscription'))
			{
				$usercardlist=count($this->users_model->userCardList($this->session->userdata('userid')));
				//user card list
				if($usercardlist>0)
					redirect('users/filebillingorder');
				else
					redirect('users/filecardinfo');
			}
			else
			{
				//redirect('users/billingorder');
			}
		}
						
		if(isset($_REQUEST['submit']))
		{
		$data_to_store_account = array(
                    'owneremailid' => $this->input->post('email'),
                    'planname' => $planname,
                    'createddate' => date("Y-m-d H:i:s")
         );
                        // Validate complete fields
                        $this->session->set_flashdata('flash_message_complete_fields', false);
			if ( $this->input->post('firstname') == "" ||
                            $this->input->post('lastname') == "" ||
                            $this->input->post('email') == "" ||
                            $this->input->post('password') == "" ||
                            $this->input->post('conpass') == ""
                        ) {
                            $this->session->set_flashdata('flash_message_complete_fields', true);
                            redirect('users/signup/'.$id);
                        }
			
                        // validate password
                        $this->session->set_flashdata('flash_message_pass', false);
			if ( !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@_.(){}|$!%#+*=¿?&])[A-Za-z\d$@_.(){}|$!%#+*=¿?&]{8,}/",$this->input->post('password')) ) {
                            $this->session->set_flashdata('flash_message_pass', true);
                            redirect('users/signup/'.$id);
                        }
                        
                        // validate password confirm
                        $this->session->set_flashdata('flash_message_pass_confirm', false);
			if ( $this->input->post('password') != $this->input->post('conpass') ) {
                            $this->session->set_flashdata('flash_message_pass_confirm', true);
                            redirect('users/signup/'.$id);
                        }
                        
			//check email exists	 
				$checkEmailAccount = $this->users_model->register_email_exists_account($this->input->post('email'));
			//save data to table account
				if(!empty($checkEmailAccount[0]))
				{
					$this->session->set_flashdata('flash_message', 'emailexists');
					redirect('users/signup/'.$id);
				}
				else
				{
					$this->users_model->saveData('accounts', $data_to_store_account);
				}
				
			//save data in users table		
			$data_to_store = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'emailid' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'create_datetime' => date("Y-m-d H:i:s"),
                    'accountid' => $this->users_model->getAcct($this->input->post('email'))
                 ); 
			
			//check email exists	 
				$checkEmail = $this->users_model->register_email_exists($this->input->post('email'));
			
			//save data to table	
				if(!empty($checkEmail[0]))
				{
					$this->session->set_flashdata('flash_message', 'emailexists');
					redirect('users/signup');
				}
				else
				{
					$this->session->set_flashdata('flash_message', 'success');
					//save data in user table
					$uid=$this->users_model->saveData('users', $data_to_store);
					//save data in menu table

					//record two
					$data2 = array(
						'label' =>'Docufiler',
						'accountid' =>$this->users_model->getAcct($this->input->post('email')),
						'parentid' => '0',
						'filescount' => '0'
					 );					 
					$uid2=$this->users_model->saveData('dynmenu', $data2);
					//record three
					$data3 = array(
						'label' =>'Miscellaneous',
						'accountid' =>$this->users_model->getAcct($this->input->post('email')),
						'parentid' => $this->users_model->getMenuId($this->users_model->getAcct($this->input->post('email')),'Docufiler'),
						'filescount' => '0'
					 );					 
					 $uid3=$this->users_model->saveData('dynmenu', $data3);
				                                        
                                        $enddate = date("Y-m-d H:i:s", strtotime("+1 months", strtotime(date("Y-m-d"))));
                                        $userid = $this->users_model->register_email_exists($this->input->post('email'));
                                        $data_to_store=array(
                                        'transactionid' => '0',
                                        'accountno' => $this->users_model->getAcct($this->input->post('email')), 
                                        'userid' => $userid[0]['id'],
                                        'created_date' => date("Y-m-d H:i:s"),
                                        'ccno' => '00000000000000000',
                                              'ccname' => 'None',
                                        'amt' => '0',
                                        'status' => 'Success',
                                        'promocodename' => 'None',
                                        'promodiscountamt' => '0',
                                        'frequency' => 'Annually',
                                        'end_date' => $enddate
                                        );
                                        //save transaction to database 
                                        $this->users_model->saveData('billing', $data_to_store);
                                        //save data to billingline table
                                        $data_to_store1=array(
                                        'accountno' => $this->users_model->getAcct($this->input->post('email')),
                                        'transactionid' => '0',
                                        'product' => 'Free',
                                        'unitamount' => '0',
                                        'promotionalcode' => 'None'
                                        );
                                        //save transaction to database 
                                        $this->users_model->saveData('billingline', $data_to_store1);

                                        $body = '<html>
                                                    <body>
                                                        <table width="700" border="0" cellpadding="7" cellspacing="7" align="center" style="font-family:arial;font-size:14px;font-weight:normal;">
                                                            <tr>
                                                                <td align="left"><img src="https://s3.amazonaws.com/ingenio/elementfree.jpg" width="500"></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    Hey '.$this->input->post('firstname').',
                                                                    <br>
                                                                    <br>
                                                                    Thanks for signing up for a trial, and welcome to ElementFree! You can start using ElementFree by using the link below.
                                                                </td>
                                                            </tr>
                                                            <tr style="text-align: center;">
                                                                <td align="center"><br><a style="background-color: #66CBFF; font-weight: bold; color: #222; padding: 10px 40px; text-decoration: none; letter-spacing: 1px; border: 1px solid #333E50;" href="https://app.elementfree.com/users/login">ElementFree App</a><br><br></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">We are here to support you every step of your ElementFree journey. When logged click the light blue help button (<img src="https://s3-us-west-2.amazonaws.com/docudownloads/help.png" width="75px">) any time if you have questions or suggestions.</td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left">
                                                                    We are here to help you!!!
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    Cheers,
                                                                    <br>
                                                                    Team ElementFree
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </body>
                                                </html>';

                                        //email sender
                                        $from = 'team@elementfree.com';
                                        $email = $this->input->post('email');
                                        $subject = 'Welcome to ElementFree!';
                                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                        $headers .= "From: ".$from."\r\nReply-To: ".$from;
                                        @mail($email,$subject,$body,$headers);

					//redirect to login page
					redirect('users/login');
				}
		  }
		  else
		  {
		  	$this->load->view('signup');
		  }
	  }
	  //billing order
	  public function filebillingorder()
	  {
		  $name=$this->session->userdata('planname');
		  if($name=='')
			  redirect("users/subscription");

			$data=array();
			$data['subscriptiondetails']=$this->users_model->subscriptionDetails();	
			$data['cardinfo']=$this->users_model->userCardList($this->session->userdata('userid'));				
			$this->template->set_template('front1');
			$this->template->write('title', 'Welcome to the Docufiler Billing !');
			$this->template->write_view('content','filebillingorder',$data);
			$this->template->render();  
	  }
	  public function filebillingaddress()
	  {
		  //check for user login
			$this->loginCheck();
			//check for user login end here

		  if(isset($_REQUEST['address']) || isset($_REQUEST['address1']) ||isset($_REQUEST['city']) || isset($_REQUEST['state']) || isset($_REQUEST['zip']))
			{
				//update password
				$data1=array(
					'baddress' => $this->input->post('address'),
					'baddress1' => $this->input->post('address1'),
					'bcity' => $this->input->post('city'),
					'bstate' => $this->input->post('state'),
					'bzip' => $this->input->post('zip')
					);
				
				$this->users_model->updateData('id',$this->input->post('cc'),'cardinfo',$data1);
				//redirected to login page
				$this->session->set_flashdata('flash_message', 'updated');
				//get user details by id
		  		$data['carddetails']=$this->users_model->userCardList($this->session->userdata('userid'));
				//redirect to billing order page
				redirect('users/filebillingorder');
			}
			else
			{	//total files by user
		  		$data['totalfiles']=count($this->users_model->userAllFilesbyAcctId($this->session->userdata('accountid'),'',''));		
				//get user details by id
		  		$data['carddetails']=$this->users_model->userCardList($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front1');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','filebillingaddress',$data);
				$this->template->render();
			}
	  
	  
	  }
	  //login page calling
	  public function login()
	  {
		  
		  $this->load->helper('captcha');
		  $random_number = substr(number_format(time() * rand(),0,'',''),0,8);
                  //$random_number = '12345678' ; // for testing purposes
      	  // setting up captcha config
      	  $vals = array(
             'word' => $random_number,
             'img_path' => './captcha/',
             'img_url' => base_url().'captcha/',
			 'font_path'	=>base_url().'fonts/Raleway-SemiBold.ttf',
			 'img_url' => base_url().'captcha/',
             'img_width' => 304,
             'img_height' => 61,
             'expiration' => 7200
            );
      	
			$data['captcha'] = create_captcha($vals);
      		$this->session->set_userdata('captchaWord',$data['captcha']['word']);
		  	$this->load->view('login',$data);
	  }
	  //reset password
	  public function resetpassword($code)
	  {
		  
			if(isset($_REQUEST['email']) && $_REQUEST['email']!='')
			{
				//update password
				$data=array(
					'password' => md5($this->input->post('password')),
					'passwordreset' =>''
					);
					
				$this->users_model->updateData('emailid',$this->input->post('email'),'users',$data);
				//redirected to login page
				$this->session->set_flashdata('flash_message', 'changedpassword');
				redirect('users/login');
			}
			else
			{
					$data['checkdetails'] = $this->users_model->checkcodedata($code);
			
					if(!empty($data['checkdetails'][0]))
					{
						$this->session->set_flashdata('flash_message', 'mismatch');
						$this->load->view('resetpassword',$data);
					}
					else
					{
						$this->session->set_flashdata('flash_message', 'unauthrisedaccess');
						$this->load->view('resetpassword');
					}				
			}

	  }
//invite friend
public function invitefriend()
{
				//check for user login
			$this->loginCheck();
			//check for user login end here
	if(isset($_REQUEST['email']) && isset($_REQUEST['fname']) && !empty($this->input->post('email')))
            
	{
	//check email exists	 
		$checkEmail = $this->users_model->register_email_exists($this->input->post('email'));
	
	//save data to table	
	if(empty($checkEmail))
	{
		//email code 
		$resetid='userid/'.$this->session->userdata('userid');		
		//update user table
		
		$data=array(
			'emailid' => $this->input->post('email'),
                        'firstname' => $this->input->post('fname'),
                        'usertype' => '1',
			'create_datetime' => date("Y-m-d H:i:s"),
                        'referredby' => $this->session->userdata('userid')
			
		);
        //update user table
		$this->users_model->saveData('users',$data);
        //update user details table 
		$data=array(
			'emailid' => $this->input->post('email'),
			'id' => $this->session->userdata('userid'),
			'create_datetime' => date("Y-m-d H:i:s")
			
		);       
     //   $this->users_model->saveData('user_details',$data);
		//update user table
		$body='';
		$activation_url=base_url().'users/signup/'.urlencode($resetid);
			   
		$url_logo=base_url().'images/img/u134.png';
		$body.='<html><body><table width="700" border="0" cellpadding="7" cellspacing="7" bgcolor="#E6F0EF" align="center" style="font-family:arial;font-size:14px; font-weight:normal;">
		  <tr><td align="left" bgcolor="#BAA786"><a href=""><img title="" alt="" src="'.$url_logo.'"></a></td>
		  </tr>
		  <tr>
			<td align="left">Hi '.$this->input->post('fname').',</td>
		  </tr>
		 
		  <tr>
			<td align="left">You are invited by '.$this->session->userdata('firstname').'.</td>
		  </tr>
		  <tr>
			<td align="left">to connect using ElementFree</td>
		  </tr>
		  <tr>
			<td align="left">Please click the link below to see the documents.</td>
		  </tr>
		  <tr>
			<td align="left"><a href="'.$activation_url.'">Click here</a></td>
		  </tr>
		  <tr>
			<td align="left">Thanks,<br/>Team ElementFree</td>
		  </tr>
		</table>
		</body>
		</html>';

		//email sender
                $from=$this->session->userdata('email');
                

				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: ".$from."\r\nReply-To: ".$from; 
				
				  
				$email = $this->input->post('email');
				$subject = 'Invite User';
				
				echo $body;exit;
				
				if(mail($email,$subject,$body,$headers)){
						echo "email send";             
				}
				else
				{
					echo "email  not send ";
				}
					//email code
					$this->session->set_flashdata('flash_message', 'emailsent');
					redirect('users/invitefriend');
				}
				else
				{
					$this->session->set_flashdata('flash_message', 'emailexists');
					redirect('users/invitefriend');
				}
		  }
		  else
		  {
		  	//total files by user
			$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('accountid'));
			//Get menu dates
			$data['dateresult']=$this->users_model->dateResultMenu($this->session->userdata('accountid'));	
			//Get ElementFree Menu
                        $datefilter =$this->session->userdata('firstname');
			$data['documenu']=$this->users_model->docuMenu($this->session->userdata('accountid'),$datefilter);
                        //set data in session
			$this->template->set_template('front');
			$this->template->write('title', 'Welcome to ElementFree | invitefriend !');
			$this->template->write_view('content','invitefriend',$data);
			$this->template->render();
		  }
		 

}
	  //forget password calling
	  public function forgetpassword()
	  {

		  if(isset($_REQUEST['email']) && !empty($this->input->post('email')))
		  {
			  //check email exists	 
				$checkEmail = $this->users_model->register_email_exists($this->input->post('email'));
			  //save data to table	
				if(!empty($checkEmail[0]))
				{
					//email code 
					$resetid=time();		
			   		//update user table
					$data=array('passwordreset' => $resetid);
					$this->users_model->updateData('emailid',$this->input->post('email'),'users',$data);
					//update user table
					$body='';
			   		$activation_url=base_url().'users/resetpassword/'.$resetid;
			   
			   $url_logo=base_url().'/images/frontend/logo.png';
			   $body .= '<html>
                                        <body>
                                            <table width="700" border="0" cellpadding="7" cellspacing="7" align="center" style="font-family:arial;font-size:14px;font-weight:normal;">
                                                <tr>
                                                    <td align="left"><img src="https://s3.amazonaws.com/ingenio/elementfree.jpg" width="500"></td>
                                                </tr>
                                                <tr>
                                                    <td align="left">
                                                        Hi '.$checkEmail[0]['firstname'].',
                                                        <br>
                                                        <br>
                                                        Please click below link to reset your password
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left"><a href="'.$activation_url.'">Click here</a></td>
                                                </tr>
                                                <tr>
                                                    <td align="left">
                                                        Thanks,
                                                        <br>
                                                        <br>
                                                        <br>
                                                        Team ElementFree
                                                    </td>
                                                </tr>
                                            </table>
                                        </body>
                                    </html>';
				
				 $admin=$this->config->item('adminEmail');
                 $from="team@docufiler.com@docufiler.com";
                

				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: ".$from."\r\nReply-To: ".$admin; 
				
				  
				$email = $this->input->post('email');
				$subject = 'Reset Password';
				//echo $body;exit;
				
				if(mail($email,$subject,$body,$headers)){
						echo "email send";             
				}
				else
				{
					echo "email  not send ";
				}
					//email code
					$this->session->set_flashdata('flash_message', 'emailsent');
					redirect('users/forgetpassword');
				}
				else
				{
					$this->session->set_flashdata('flash_message', 'emailnotexists');
					redirect('users/forgetpassword');
				}
		  }
		  else
		  {
			   $this->load->view('forgetpassword');
		  }
		 
	  }
	  //account information
	  public function accountinfo()
	  {
		  			//check for user login
			$this->loginCheck();
			//check for user login end here
		 if( isset($_REQUEST['phone']) || isset($_REQUEST['mobile']) || isset($_REQUEST['countrycd']) || isset($_REQUEST['address']) || isset($_REQUEST['address1']) || isset($_REQUEST['city']) || isset($_REQUEST['state']) || isset($_REQUEST['zip']) || isset($_REQUEST['question']) || isset($_REQUEST['answer']) || isset($_REQUEST['usertype']) || isset($_REQUEST['firsttime']) || isset($_REQUEST['firsttimeshare']))
			{
				//update password
				$data1=array(
/*					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'emailid' => $this->input->post('email'), */
					'phone' => $this->input->post('phone'),
					'mobile'=> $this->input->post('mobile'),        
                                        'countrycd'=> $this->input->post('countrycd'),     
                                        'address'=> $this->input->post('address'),       
                                        'address1'=> $this->input->post('address1'),      
                                        'city'=> $this->input->post('city'),          
                                        'state'=> $this->input->post('state'),         
                                        'zip'=> $this->input->post('zip'),           
                                        'question'=> $this->input->post('question'),      
                                        'answer'=> $this->input->post('answer'),        
                                        'usertype'=> $this->input->post('usertype'),      
                                        'firsttime'=> $this->input->post('firsttime'),     
                                        'firsttimeshare'=> $this->input->post('firsttimeshare')
					);
				
				$this->users_model->updateData('id',$this->session->userdata('userid'),'users',$data1);
				//redirected to login page
				$this->session->set_flashdata('flash_message', 'updated');

			}
			  //Get menu dates
			  $data['dateresult']=$this->users_model->dateResultMenu($this->session->userdata('accountid'));	
			  //Get ElementFree Menu
			  $data['documenu']=$this->users_model->docuMenu($this->session->userdata('accountid'),"default");
		    //total files by user
			  $data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('accountid'));
			  //get user details by id
		  	$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  	// Get CC list
		  	$data['cardlist']=$this->users_model->userCardList($this->session->userdata('userid'));
                        // Get CC list
		  	$data['myplan']=$this->users_model->myplan($this->session->userdata('accountid'));
		  	//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','accountinfo',$data);
				$this->template->render();
	  }
	   //mailingaddress information
	  public function mailingaddress()
	  {
			//check for user login
			$this->loginCheck();
			//check for user login end here		 
		 if(isset($_REQUEST['address']) || isset($_REQUEST['city']) || isset($_REQUEST['state']) || isset($_REQUEST['zip']))
			{
				//update password
				$data1=array(
					'address' => $this->input->post('address'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'zip' => $this->input->post('zip')
					);
				
				$this->users_model->updateData('id',$this->session->userdata('userid'),'users',$data1);
				//redirected to login page
				$this->session->set_flashdata('flash_message', 'updated');
				//get user details by id
		  		$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to ElementFree  | Mailing Address');
				$this->template->write_view('content','mailingaddress',$data);
				$this->template->render();
			}
			else
			{
		  		//get user details by id
		  		$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','mailingaddress',$data);
				$this->template->render();
			}
	  
	  }
	  // Function to convert NTP string to an array
		function NVPToArray($NVPString)
		{
				$proArray = array();
				while(strlen($NVPString))
				{
					// name
					$keypos= strpos($NVPString,'=');
					$keyval = substr($NVPString,0,$keypos);
					// value
					$valuepos = strpos($NVPString,'&') ? strpos($NVPString,'&'): strlen($NVPString);
					$valval = substr($NVPString,$keypos+1,$valuepos-$keypos-1);
					// decoding the respose
					$proArray[$keyval] = urldecode($valval);
					$NVPString = substr($NVPString,$valuepos+1,strlen($NVPString));
				}
				return $proArray;
		}
		//
		public function test()
		{
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Billing !');
				$this->template->write_view('content','payment');
				$this->template->render();	
		}	
		//payment
	  public function payment()
	  {
		//set data array	
		
		$carddetails=$this->users_model->cardDetailsById($_REQUEST['cardname']);
		$substype=$_REQUEST['Annually'];
		$price=$_REQUEST['dataprice'];
		$discount=$_REQUEST['datadiscount'];
		$total=$_REQUEST['datatotal'];
		$total=number_format($total, 2, '.', '');
		$promocodename=$_REQUEST['promocodename'];
		$promodiscountamt=$_REQUEST['promodiscountamt'];
		//set data in session
		
		// Set sandbox (test mode) to true/false.
		$sandbox = TRUE;

		// Set PayPal API version and credentials.
		$api_version = '85.0';
		$api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
		$api_username = $sandbox ? 'sonam92_api1.gmail.com' : 'LIVE_USERNAME_GOES_HERE';
		$api_password = $sandbox ? '1401035965' : 'LIVE_PASSWORD_GOES_HERE';
		$api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31AgxPwfg-5AkhPp7C2E5vTUhEpjX6' : 'LIVE_SIGNATURE_GOES_HERE';
		// Store request params in an array
		$request_params = array
					(
					'METHOD' => 'DoDirectPayment', 
					'USER' => $api_username, 
					'PWD' => $api_password, 
					'SIGNATURE' => $api_signature, 
					'VERSION' => $api_version, 
					'PAYMENTACTION' => 'Sale', 					
					'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
					'CREDITCARDTYPE' => $carddetails[0]['cardtype'], 
					'ACCT' => $carddetails[0]['cardno'], 						
					'EXPDATE' => $carddetails[0]['expirymonth'].$carddetails[0]['expiryyear'], 			
					'CVV2' => $carddetails[0]['cardcvv'], 
					'FIRSTNAME' => $carddetails[0]['cardholderfname'], 
					'LASTNAME' => $carddetails[0]['cardholderlname'], 
					'STREET' => $carddetails[0]['baddress'], 
					'CITY' => $carddetails[0]['bcity'], 
					'STATE' => $carddetails[0]['bstate'], 					
					'COUNTRYCODE' => 'US', 
					'ZIP' => $carddetails[0]['bzip'], 
					'AMT' => $total, 
					'CURRENCYCODE' => 'USD', 
					'DESC' => 'DocuFiler subscription payment' 
					);

		// Loop through $request_params array to generate the NVP string.
		
		$nvp_string = '';
		foreach($request_params as $var=>$val)
		{
			$nvp_string .= '&'.$var.'='.urlencode($val);	
		}

		// Send NVP string to PayPal and store response
		$curl = curl_init();
				curl_setopt($curl, CURLOPT_VERBOSE, 1);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($curl, CURLOPT_TIMEOUT, 30);
				curl_setopt($curl, CURLOPT_URL, $api_endpoint);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);

		$result = curl_exec($curl);
		//echo $result.'<br /><br />';
		curl_close($curl);
		// Parse the API response
		$data['result_array'] = $this->NVPToArray($result);
		//save data to billing table
		$tid='';
		$tid=@$data['result_array']['TRANSACTIONID'];
                
                if ($substype == 'annually')
                    $enddate = date("Y-m-d H:i:s", strtotime("+1 years", strtotime(date("Y-m-d"))));
                else
                    $enddate = date("Y-m-d H:i:s", strtotime("+1 months", strtotime(date("Y-m-d"))));
		$data_to_store=array(
			'transactionid' => $tid,
			'accountno' => $this->session->userdata('accountid'), 
			'userid' => $this->session->userdata('userid'),
			'created_date' => date("Y-m-d H:i:s"),
			'ccno' => $carddetails[0]['cardno'],
			'ccname' => $carddetails[0]['cardname'],
			'ccname' => $carddetails[0]['cardname'],
			'amt' => $total,
			'status' => $data['result_array']['ACK'],
			'promocodename' => $promocodename,
			'promodiscountamt' => $promodiscountamt,
                        'frequency' => $substype,
                        'end_date' => $enddate
		);
		//save transaction to database 
		$this->users_model->saveData('billing', $data_to_store);
		//save data to billingline table
		$data_to_store1=array(
			'accountno' => $this->session->userdata('accountid'), 
			'transactionid' => $tid,
			'product' => $this->session->userdata('planname'),
			'unitamount' => $total,
			'promotionalcode' => $promocodename
		);
		//save transaction to database 
		$this->users_model->saveData('billingline', $data_to_store1);
		//email code
		$body='';
		$body.='<html>
                            <body>
                                <table width="700" border="0" cellpadding="7" cellspacing="7" align="center" style="font-family:arial;font-size:14px;font-weight:normal;">
                                    <tr>
                                        <td align="left"><img src="https://s3.amazonaws.com/ingenio/elementfree.jpg" width="500"></td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Hi '.$this->session->userdata('firstname').',
                                            <br>
                                            Thank you! We have received your order.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">You can start using your system automatically by going to https://app.elementfree.com/</td>
                                    </tr>
                                    <tr>
                                        <td align="left">Should you have any questions do not hesitate to reach out to us by either opening a case on the top right corner of the application or by email at team@elementfree.com, (please make sure you use the same email you have on your account to open the case.)</td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            To learn more about ElementFree features you can access the documentation by going to https://app.elementfree.com/
                                            <br>
                                            <br>
                                            <br>
                                            Team ElementFree
                                        </td>
                                    </tr>
                                </table>
                            </body>
                        </html>';

		//email sender
                $from='team@elementfree.com';
                
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= "From: ".$from."\r\nReply-To: ".$from;
                $email = $this->session->userdata('email');
                $subject = 'Thanks for your order';

                if(@mail($email,$subject,$body,$headers)){
                        //echo "email send";             
                }
                else
                {
                        //echo "email  not send ";
                }
		
		//template


		if(strpos(@$_SERVER['HTTP_REFERER'],'filebillingorder'))
		{
			$this->template->set_template('front1');
		}
		else
		{
			$this->template->set_template('front');
		}
		$this->template->write('title', 'Welcome to the ElementFree Billing !');
		$this->template->write_view('content','payment',$data);
		$this->template->render();	

	  }
	  //billing order
	  public function billingorder()
	  {
		  $name=$this->session->userdata('planname');
		  if($name=='')
			  //redirect("users/subscription");

			$data=array();
			$data['subscriptiondetails']=$this->users_model->subscriptionDetails();	
			$data['cardinfo']=$this->users_model->userCardList($this->session->userdata('userid'));				
			$this->template->set_template('front');
			$this->template->write('title', 'Welcome to the ElementFree Billing !');
			$this->template->write_view('content','billingorder',$data);
			$this->template->render();  
	  }
	  //billing address data
	  public function billingaddressdata()
	  {
			$id=$this->input->post('id'); 
			$carddetails=$this->users_model->cardDetailsById($id);
			//initialize variables
			$address='';
			$city='';
			$state='';
			$zip='';
			//
			if(!empty($carddetails[0]))
			{		
				$address=$carddetails[0]['baddress'];
				$city=$carddetails[0]['bcity'];
				$state=$carddetails[0]['bstate'];
				$zip=$carddetails[0]['bzip'];
			}
		?>
			  <input type="text" name="address" placeholder="Enter your Address" class="input-account-infomation"  value="<?php echo $address?>"/>
        <input type="text" name="city" placeholder="Enter Your City" class="input-account-infomation"  value="<?php echo $city?>"/>
        <input type="text" name="state" placeholder="Enter Your State" class="input-account-infomation"  value="<?php echo $state?>"/>
        <input type="text" name="zip" placeholder="Enter Your Zip" class="input-account-infomation"  value="<?php echo $zip?>"/>
		
		<?php
	  }
	  //billing address information
	  public function billingaddress()
	  {
		  	//check for user login
			$this->loginCheck();
			//check for user login end here

		  	if(isset($_REQUEST['address']) || isset($_REQUEST['city']) || isset($_REQUEST['state']) || isset($_REQUEST['zip']))
			{
				//update password
				$data1=array(
					'baddress' => $this->input->post('address'),
					'bcity' => $this->input->post('city'),
					'bstate' => $this->input->post('state'),
					'bzip' => $this->input->post('zip')
					);
				
				$this->users_model->updateData('id',$this->input->post('cc'),'cardinfo',$data1);
				//redirected to login page
				$this->session->set_flashdata('flash_message', 'updated');
				//get user details by id
		  		$data['carddetails']=$this->users_model->userCardList($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','billingaddress',$data);
				$this->template->render();
			}
			else
			{	//total files by user
		  		$data['totalfiles']=count($this->users_model->allUserFilesByUserId($this->session->userdata('userid')));		
				//get user details by id
		  		$data['carddetails']=$this->users_model->userCardList($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','billingaddress',$data);
				$this->template->render();
			}
	  
	  
	  }
	  //test upload
	  public function testupload()
	  {
		$this->load->view('testupload');  
	  }
	  //file upload ajax call
	  public function upload()
	  {
		if(!empty($_FILES))
		{
			// Bucket Name
			$bucket="docufiler";
			
			//get accesskey from database
			$appdetails=$this->users_model->getSettings();
			//AWS access info
			if (!defined('awsAccessKey')) define('awsAccessKey', $appdetails[0]['awsAccessKey']);
			if (!defined('awsSecretKey')) define('awsSecretKey', $appdetails[0]['awsSecretKey']);
			
			//instantiate the class
			$s3 = new S3(awsAccessKey, awsSecretKey);

			//$s3->putBucket($bucket, S3::ACL_PUBLIC_READ);
			$sourcePath = $_FILES['file']['tmp_name']; 			// Storing source path of the file in a variable
			//$fileuniquename=time().'_'.$_FILES['file']['name'];	//fileuniquename
			$fileuniquename=uniqid('', true).'_'.$_FILES['file']['name'];	//fileuniquename
			$targetPath = "files_images/".$fileuniquename; 			// Target path where file is to be stored
			copy($sourcePath,$targetPath);
			//move_uploaded_file($sourcePath,$targetPath); 	
			// Moving Uploaded file
			$uniqfn=explode('.',$fileuniquename);
			//data variable defined here
			$folder='';
			$devicedetails=$_SERVER['HTTP_USER_AGENT'];
			
			$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			$srvname='https://s3-us-west-2.amazonaws.com/';
			$location=$srvname.$bucket.'/'.$fileuniquename;
			
			$fcdt=date ("F d Y h:i:s.", filectime($_FILES['file']['name']));
			$fldt=date ("F d Y h:i:s.", filemtime($_FILES['file']['name']));
			
			if($s3->putObjectFile($sourcePath, $bucket , $fileuniquename, S3::ACL_PUBLIC_READ) )
			{
				//save data to table
				$data_to_store=array(
					'userid' => $this->session->userdata('userid'),
					'name' => $_FILES['file']['name'],
					'uniquename' => $fileuniquename,
					'folder' => $folder,
					'device' => $hostname,
					'devicedetails' => $devicedetails,
					'filetype' =>$_FILES["file"]["type"],
					'location' => $location,
					'file_created_date' => $fcdt,
					'file_last_modified_date' => $fldt,
					'size' => $_FILES["file"]["size"],
					'created_date' => date("Y-m-d H:i:s"),
					'accountid' => $this->session->userdata('accountid')	
				);
				//save data to server.
				$this->users_model->saveData('files', $data_to_store);
				
				$data_to_store_categorization=array(
					'menuid' => $this->users_model->getMenuId($this->session->userdata('accountid'),'Miscellaneous'),
					'fileid' => $this->users_model->getfileid($fileuniquename),
					'accountid' => $this->session->userdata('accountid'),
					'type'=> "Docufiler",
				);
				$this->users_model->saveData('filescategory', $data_to_store_categorization);
			}
			else
			{
				echo 'File not uploaded on S3.';
			}
			//s3 upload code here
		}
	  }
	  //delete card
	  public function deletecard($id)
	  {
		$this->users_model->deleteCard($id);
		$this->session->set_flashdata('flash_message', 'deleted'); 
		redirect('users/cardlist');		
	  }
	  //delete file preview
	  public function deletefilepreview($id)
	  {
		  	//check for user login
			$this->loginCheck();
			//get file details by id
			$filedetails=$this->users_model->getFile($id);
			$filename=$filedetails[0]['uniquename'];
			// Bucket Name
			$bucket="docufiler";
			//get accesskey from database
			$appdetails=$this->users_model->getSettings();
			//AWS access info
			if (!defined('awsAccessKey')) define('awsAccessKey', $appdetails[0]['awsAccessKey']);
			if (!defined('awsSecretKey')) define('awsSecretKey', $appdetails[0]['awsSecretKey']);
							
			//instantiate the class
			$s3 = new S3(awsAccessKey, awsSecretKey);

			if ($s3->deleteObject($bucket, $filename))
			{
				$this->users_model->deleteFile($id);
				$this->session->set_flashdata('flash_message', 'deleted');
			}
			else
			{
				$this->session->set_flashdata('flash_message', 'filenotfound');
			}

			redirect('users/listfiles');
	  }
	  //delete files
	  public function deletefile($id)
	  {
		  	//check for user login
			$this->loginCheck();
			//get file details by id
			$filedetails=$this->users_model->getFile($id);
			$filename=$filedetails[0]['uniquename'];
			//remove file from preview folder
			$foldername='files_images/';
			unlink($foldername.$filename);
			//remove file from preview folder
			// Bucket Name
			$bucket="docufiler";
			//get accesskey from database
			$appdetails=$this->users_model->getSettings();
			//AWS access info
			if (!defined('awsAccessKey')) define('awsAccessKey', $appdetails[0]['awsAccessKey']);
			if (!defined('awsSecretKey')) define('awsSecretKey', $appdetails[0]['awsSecretKey']);
							
			//instantiate the class
			$s3 = new S3(awsAccessKey, awsSecretKey);

			if ($s3->deleteObject($bucket, $filename))
			{
				$this->users_model->deleteFile($id);
				$this->session->set_flashdata('flash_message', 'deleted');
			}
			else
			{
				$this->session->set_flashdata('flash_message', 'filenotfound');
			}

			redirect('users/listfiles');
	  }
	  //df
	  public function df()
	  { 
	  
			$file=FCPATH."downloaded/1462026746_IMG_2015.JPG"; //file location 
			if(file_exists($file)) {
			
			header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
			}
			else {
				die('The provided file path is not valid.');
			}
	  }
	  //download file
	  public function downloadfile($id)
	  {
	  	 if ($this->session->userdata('email')){
                    // Bucket Name
			$bucket="docufiler";
			//get accesskey from database
			$appdetails=$this->users_model->getSettings();
			//AWS access info
			if (!defined('awsAccessKey')) define('awsAccessKey', $appdetails[0]['awsAccessKey']);
			if (!defined('awsSecretKey')) define('awsSecretKey', $appdetails[0]['awsSecretKey']);
							
			//instantiate the class
			$s3 = new S3(awsAccessKey, awsSecretKey);
			$filedetails=$this->users_model->getFile($id);	 
			$file=$filedetails[0]['location'];
			$fname=$filedetails[0]['name'];
			$filesize=$filedetails[0]['size'];
			$filename=$filedetails[0]['uniquename'];				
			$objInfo = $s3->getObjectInfo($bucket, $filename);
			
			if($objInfo['type']=='image/jpeg')
				$mime='image/jpg';
			else
				$mime='application/octet-stream';
			
			//$obj = $s3->getObject($bucket, $filename);

			 header( 'Expires: 0' );
			 header( 'Pragma: public' );
			 header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
			 header('Content-Description: File Transfer');
			 header('Content-Type: application/octet-stream');
			 header( 'Content-Length: '.$objInfo['size'] );
//			 header( 'Content-Disposition: attachment; filename="'.basename($file).'"' );
			 header( 'Content-Disposition: attachment; filename="'.$fname.'"' );
			 header( 'Content-Transfer-Encoding: binary' );
			 ob_clean();
			 flush();
			 readfile( $file );  
			 exit();
                 }
	  }
	  //preview files
	  public function previewfiles()
	  {
		  		//check for user login
				$this->loginCheck();
				//set data in session
				$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		
				//user files details
				$data['filedetails']=$this->users_model->userFilesByUserId($this->session->userdata('userid'));
				//template settings
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','previewfiles',$data);
				$this->template->render();
	  }
	  //user list files
		public function listfiles()
	  {

			//check for user login
			$this->loginCheck();
			//check for user login end here	
			$filename='';
			if(isset($_REQUEST['searchfile']))
			$filename=$_REQUEST['searchfile'];
			if(isset($_REQUEST['datefiller']))
			{
				$datefilter=$_REQUEST['datefiller'];
				$this->session->set_userdata('activemenu',$datefilter);
			}
			else
			{
					$datefilter =$this->session->userdata('firstname');
			}	
			//echo $datefilter;
			if(isset($_REQUEST['menufiller']))
			{$menufilter=$_REQUEST['menufiller'];
			$this->session->set_userdata('activedocumenu',$menufilter);
			}
			else
			{
					$menufilter ='default';
			}
			//echo $menufilter;
			if(isset($_REQUEST['menulabel']))
			{
				$menulabel=$_REQUEST['menulabel'];
				$this->session->set_userdata('activemenulabel',$menulabel);
			}
			else
			{
				$menulabel ='default';
			}
                        
                        //get Year list for filter;
			if(isset($_REQUEST['yearsFilter']))
			{
				$yearsFilter=trim($_REQUEST['yearsFilter']);
                                if (empty($yearsFilter))
                                    $yearsFilter="dflt";
			}
			else
			{
				$yearsFilter ='dflt';
                                //$yearsFilter =' 2009';
			}
                        
                        //get months list for filter;
                        if(isset($_REQUEST['monthsFilter']))
			{
				$monthsFilter=trim($_REQUEST['monthsFilter']);
                                if (empty($monthsFilter))
                                        $monthsFilter="dflt";
			}
			else
			{
				$monthsFilter ='dflt';
                                //$monthsFilter =' 3';
			}
                        
                        $accId = $this->session->userdata('accountid');
                        
                        //get search input for filter;
                        if(!empty($_REQUEST['searchFilter']))
			{
				$searchFilter=trim($_REQUEST['searchFilter']);
                                //$searchData = [time(),$accId,substr($searchFilter,0,15),$searchFilter,"0"];
                                $searchData= array('timestamp' => date("Y-m-d H:I:s"),'userid' => $this->session->userdata('userid'),'label' => substr($searchFilter,0,15),'value' => $searchFilter,'fav' => 0);  
                                $idSearch=$this->users_model->saveData('usersearches',$searchData);
			}
			else
			{
				$searchFilter ='dflt';
			}
                                           
			//echo $menulabel;
			if(isset($_REQUEST['selector']))
			//$selector=$_REQUEST['selector'];
			$this->session->set_userdata('listpreview',$_REQUEST['selector']);
			//setting for pagination
			$config = array();
			$config["base_url"] = base_url() . "users/listfiles";
			$config["total_rows"] = $this->users_model->record_count_total_files($this->session->userdata('userid'),$filename);
			//$config["per_page"] = 10;
			$config["uri_segment"] = 3;
			//pagination initialization
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			//echo $datefilter;
			//echo $menufilter;
			
                        //set Menu Variables
                        $data["DateFilter"] = $datefilter;
			$data["MenuFilter"] = $menufilter;
                        $data["MenuLabel"]= $menulabel;
                        
                        //get years for filter
                        $data["yearList"]=$this->users_model->yearlist($this->session->userdata('accountid'),$datefilter,$menufilter);
                        $data["monthList"]=$this->users_model->monthlist($this->session->userdata('accountid'),$datefilter,$menufilter);
                        
                        //get Default filters
                        $data["defFilters"] = $this->users_model->filtersbycategory($this->session->userdata('accountid'),'');
                                
                        //get Category specific filters
			$data["catFilters"] = $this->users_model->filtersbycategory($this->session->userdata('accountid'),$menulabel);
                        
                        // get the saved searches
                        $data["searchList"]=$this->users_model->searchsaves($this->session->userdata('userid'));
                        
			//get user details by id			
			//$data['userdetails']=$this->users_model->userAllFilesbyAcctId($this->session->userdata('accountid'),$datefilter,$menufilter); //,$config["per_page"], $page,$filename);
			$data['filedetails']=$this->users_model->userAllFilesbyAcctId($this->session->userdata('accountid'),$datefilter,$menufilter,$searchFilter,$yearsFilter,$monthsFilter);
                        //$data['filedetails']=$this->users_model->userAllFilesbyAcctId($this->session->userdata('accountid'),$datefilter,$menufilter);
                        //total files by user
			//$data["links"] = $this->pagination->create_links();
			//echo $this->session->userdata('listpreview');

			//total files by user
			$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('accountid'));
			//Get menu dates
			$data['dateresult']=$this->users_model->dateResultMenu($this->session->userdata('accountid'));	
			//Get ElementFree Menu
			$data['documenu']=$this->users_model->docuMenu($this->session->userdata('accountid'),$datefilter);
			//get the list of Years 
			$data['yearlist']=$this->users_model->yearlist($this->session->userdata('accountid'),$datefilter,$menufilter);
			//Get the list of months
			$data['monthlist']=$this->users_model->monthlist($this->session->userdata('accountid'),$datefilter,$menufilter);
			//set data in session
			$this->template->set_template('front');
			$this->template->write('title', 'ElementFree | List of files!');

			if ($this->session->userdata('listpreview') == "list")
			{
			 $this->template->write_view('content','listfiles',$data);
			}
			else
			{
			$this->template->write_view('content','gallery',$data);
			}
			$this->template->render();
		}
			

		public function CategoryFilters()
        {
			//check for user login
			$this->loginCheck();
			//check for user login end here	
			$filename='';
			if(isset($_REQUEST['searchfile']))
                $filename=$_REQUEST['searchfile'];
			if(isset($_REQUEST['datefiller']))
			{
				$datefilter=$_REQUEST['datefiller'];
				$this->session->set_userdata('activemenu',$datefilter);
			}
			else
			{
                $datefilter =$this->session->userdata('firstname');
			}	
			//echo $datefilter;
			if(isset($_REQUEST['menufiller']))
			{
                $menufilter=$_REQUEST['menufiller'];
                $this->session->set_userdata('activedocumenu',$menufilter);
			}
			else
			{
                $menufilter ='default';
			}
			//echo $menufilter;
			if(isset($_REQUEST['menulabel']))
			{
				$menulabel=$_REQUEST['menulabel'];
				$this->session->set_userdata('activemenulabel',$menulabel);
			}
			else
			{
				$menulabel ='default';
			}
			//echo $menulabel;
			if(isset($_REQUEST['selector']))
                //$selector=$_REQUEST['selector'];
                $this->session->set_userdata('listpreview',$_REQUEST['selector']);
			//setting for pagination
			$config = array();
			$config["base_url"] = base_url() . "users/CategoryFilters";
			$config["total_rows"] = $this->users_model->record_count_total_files($this->session->userdata('userid'),$filename);
			//$config["per_page"] = 10;
			$config["uri_segment"] = 3;
			//pagination initialization
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			//echo $datefilter;
			//echo $menufilter;
			
			//get user details by id			
			//$data['userdetails']=$this->users_model->userAllFilesbyAcctId($this->session->userdata('accountid'),$datefilter,$menufilter); //,$config["per_page"], $page,$filename);
			$data['filedetails']=$this->users_model->userAllFilesbyAcctId($this->session->userdata('accountid'),$datefilter,$menufilter);
            //total files by user
			$data["links"] = $this->pagination->create_links();
			//echo $this->session->userdata('listpreview');

			//total files by user
			$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('accountid'));
			//Get menu dates
			$data['dateresult']=$this->users_model->dateResultMenu($this->session->userdata('accountid'));	
			//Get Docufiler Menu
			$data['documenu']=$this->users_model->docuMenu($this->session->userdata('accountid'),$datefilter);
			//get the list of Years 
			$data['yearlist']=$this->users_model->yearlist($this->session->userdata('accountid'),$datefilter,$menufilter);
			//Get the list of months
			$data['monthlist']=$this->users_model->monthlist($this->session->userdata('accountid'),$datefilter,$menufilter);
			//set data in session
			$this->template->set_template('front');
			$this->template->write('title', 'Docufiler | List of files!');
			if ($this->session->userdata('listpreview') == "list")
			{
                $this->template->write_view('content','Categoryfilters',$data);
			}
			else
			{
                $this->template->write_view('content','gallery',$data);
			}
			$this->template->render();
		}


public function previewfilesdata($id)
	  {
		  $filedetails=$this->users_model->userAllFilesbyAcctId($this->session->userdata('accountid'),$this->session->userdata('activemenu'),$this->session->userdata('activedocumenu'));
		  if(count($filedetails)>0)
		  {
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
						
						$filename='default.jpg';
					}
				?>	
                            <div class="mix <?php echo $yearmonthlabel;?> Mar col-lg-3 col-md-6 col-sm-6 col-xs-12" data-value="<?php echo $id;?>" draggable="true" ondragstart="drag(event)">
                                <div class="thumbnail">
                                    <div class="overlay">
                                        <div class="thumbnail-actions">
                                            <a href="<?php echo base_url()?>files_images/<?php echo $filename;?>" class="btn btn-default btn-icon btn-rounded magnific" title="<?php echo $name;?>"><i class="fa fa-search"></i></a>
                                            <a href="#" class="btn btn-default btn-icon btn-rounded favorite" title="love this picture"><i class="fa fa-heart"></i></a>
                                            <a href="<?php echo base_url();?>users/downloadfile/<?php echo $id;?>" class="btn btn-blue btn-icon btn-rounded" title="download this picture"><i class="fa fa-cloud-download"></i></a>
                                        </div>
                                    </div>
                                    <img src="<?php echo base_url()?>files_images/<?php echo $filename;?>" class="img-responsive" alt="<?php echo $filename;?>" />
                                    <div class="thumbnail-meta">
                                        <h5>
                                        <?php echo $name;?> <br>
                                        <small><i class="fa fa-clock-o"></i> <?php echo date('m/d/Y',strtotime($created_date));?></small>
                                      </h5>
                                    </div>
                                </div>

				
				  <?php
				$cnt++;
				if($cnt%4==0)
				{
					
				}
				}					
		  }		
	  }		
			
	  //file upload 
	  public function uploadfiles()
	  {
		  //check for user login
			$this->loginCheck();
			//set environment variables
			if(isset($_REQUEST['datefiller']))
			{
				$datefilter=$_REQUEST['datefiller'];
				$this->session->set_userdata('activemenu',$datefilter);
			}
			else
			{
					$datefilter =$this->session->userdata('firstname');
			}	
			//get user details by id
		  $data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  //Get menu dates
			$data['dateresult']=$this->users_model->dateResultMenu($this->session->userdata('accountid'));
			//Get ElementFree Menu
			$data['documenu']=$this->users_model->docuMenu($this->session->userdata('accountid'),$datefilter);
			//Total files
			//$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('accountid'));
			//Total files
			$totalfiles=$this->users_model->record_count_total_files($this->session->userdata('accountid'));
			//Check for payment details
			$payment=$this->users_model->paymentDetailsById($this->session->userdata('accountid'));
			//$totalfiles=55; //used for testing purposes only
			$data['totalfiles']=$totalfiles;

			$newMembership = $this->users_model->number_files_available_and_used($this->session->userdata('accountid'));
                        $data['newMembership'] = $newMembership;

			if($newMembership)
			{
                                if ( $newMembership ) {
                                        //free user
                                        //set template
                                        $this->template->set_template('front');
                                        $this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
                                        $this->template->write_view('content','warninguploadfilemaxlicense',$data);
                                        $this->template->render();
                                }
                                elseif(count($payment)>0)
                                {
                                        //paid user
                                        //set template
                                        $this->template->set_template('front');
                                        $this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
                                        $this->template->write_view('content','uploadfiles',$data);
                                        $this->template->render();
                                }
                                else
                                {
                                        //free user
                                        //set template
                                        $this->template->set_template('front');
                                        $this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
                                        $this->template->write_view('content','warninguploadfiles',$data);
                                        $this->template->render();	
                                }
			}
			else
			{
				//set template
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','uploadfiles',$data);
				$this->template->render();	
			}	
	  }
	  //cardinfo from file
	  public function filecardinfo($id='')
	  {
		$data=array();
			//check for user login
			$this->loginCheck();
			//check for user login end here cardtype
		  	if(isset($_REQUEST['cardname']) || isset($_REQUEST['cardtype']) ||isset($_REQUEST['cardno']) || isset($_REQUEST['cardcvv']) || isset($_REQUEST['expirymonth']) || isset($_REQUEST['expiryyear']))
			{
				//update card
				$cardnewname = $this->input->post('cardtype').'-';
				$cardnewname = $cardnewname.substr($this->input->post('cardno'),strlen($this->input->post('cardno')) -4, strlen($this->input->post('cardno')));
				$data1=array(
					'userid' => $this->session->userdata('userid'),
					'cardname' => $cardnewname,
					'cardtype' => $this->input->post('cardtype'),
					'cardholderfname' => $this->input->post('fname'),
					'cardholderlname' => $this->input->post('lname'),
					'cardno' => $this->input->post('cardno'),
					'cardcvv' => $this->input->post('cvv'),
					'expirymonth' => $this->input->post('expirymonth'),
					'expiryyear' => $this->input->post('expiryyear'),
					'create_datetime' => date("Y-m-d H:i:s")	
					#'cardname' => echo 'cardtype'.'-'.substr
					);
				
				if($_REQUEST['id']!='')
				{
					//update data to table
					$this->users_model->updateData('id',$id,'cardinfo',$data1);
					//redirected to login page
					$this->session->set_flashdata('flash_message', 'updated');
				}
				else
				{
					//save data to table
					$this->users_model->saveData('cardinfo',$data1);
					//redirected to login page
					$this->session->set_flashdata('flash_message', 'added');
				}

				redirect('users/filebillingaddress');
			}
			else
			{
				//card details by id
				if($id!='')
					$data['carddetails']=$this->users_model->cardDetailsById($id);
		  		//total files by user
				 $data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('userid'));
				//set data in session
				$this->template->set_template('front1');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','filecardinfo',$data);
				$this->template->render();
			}
	  
	    
	  }	  
	  //cardinfo information
	  public function cardinfo($id='')
	  {
			$data=array();
			//check for user login
			$this->loginCheck();
			//check for user login end here cardtype
		  	if(isset($_REQUEST['cardname']) || isset($_REQUEST['cardno']) || isset($_REQUEST['cardcvv']) || isset($_REQUEST['expirymonth']) || isset($_REQUEST['expiryyear']))
			{
				//update password
				$data1=array(
					'userid' => $this->session->userdata('userid'),
					'cardname' => $this->input->post('cardtype'),
					'cardholderfname' => $this->input->post('fname'),
					'cardholderlname' => $this->input->post('lname'),
					'cardno' => $this->input->post('cardno'),
					'cardcvv' => $this->input->post('cvv'),
					'expirymonth' => $this->input->post('expirymonth'),
					'expiryyear' => $this->input->post('expiryyear'),
					'create_datetime' => date("Y-m-d H:i:s")	
					);
				
				if($_REQUEST['id']!='')
				{
					//update data to table
					$this->users_model->updateData('id',$id,'cardinfo',$data1);
					//redirected to login page
					$this->session->set_flashdata('flash_message', 'updated');
				}
				else
				{
					//save data to table
					$this->users_model->saveData('cardinfo',$data1);
					//redirected to login page
					$this->session->set_flashdata('flash_message', 'added');
				}

				redirect('users/cardlist');
			}
			else
			{
				//card details by id
				if($id!='')
					$data['carddetails']=$this->users_model->cardDetailsById($id);
		  		//total files by user
				 $data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('userid'));
				//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','cardinfo',$data);
				$this->template->render();
			}
	  
	  
	  }
	  //cardlist
	  public function cardlist()
	  {
				if($this->session->userdata('userid')=='')
					redirect('users/login');
				
				$data=array();
				$data['cardlist']=$this->users_model->userCardList($this->session->userdata('userid'));
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content', 'cardlist',$data);
				$this->template->render();  
	  }
	  //accesspermission information
	  public function accesspermission()
	  {
			//check for user login
			$this->loginCheck();
			//check for user login end here
			
			if(isset($_REQUEST))
			{
				foreach($_REQUEST as $key=>$value)
				{
					$val= explode('_',$key);
					$data=array('rights' => $value);
					$this->users_model->updateData('id',$val[1],'users',$data);
					$this->session->set_flashdata('flash_message', 'updated');
				}
				
			}	
				//get user details by id
				$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
				//all invited user list
				$data['inviteduser']=$this->users_model->invitedUserById($this->session->userdata('userid'));
				//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content', 'accesspermission',$data);
				$this->template->render();
			

	  }
	  //accesspermission information
	  public function securityquestion()
	  {
			//check for user login
			$this->loginCheck();
			//check for user login end here

		  	if(isset($_REQUEST['question']) || isset($_REQUEST['answer']))
			{
				//update password
				$data1=array(
					'question' => $this->input->post('question'),
					'answer' => $this->input->post('answer')
					);
				
				$this->users_model->updateData('id',$this->session->userdata('userid'),'users',$data1);
				//redirected to login page
				
				//get user details by id
		  		$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		//set data in session
				$this->session->set_flashdata('flash_message', 'updated');
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','securityquestion',$data);
				$this->template->render();
			}
			else
			{
		  		//get user details by id
		  		$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','securityquestion',$data);
				$this->template->render();
			}
	  
	  
	  
	  }
	  
	  //logout method calling
	  public function logout()
	  {
		  $this->session->unset_userdata('firstname');
		  $this->session->unset_userdata('lastname');
		  $this->session->unset_userdata('email');
		  redirect('users/login');
	  }

	  //verify login
	  public function loginverify()
	  {
	  		$result=$this->users_model->checkUser($this->input->post('username'),$this->input->post('password'));

	  
			if(!empty($result[0]['emailid']))
			{
				//set data in session
				$this->session->set_userdata('userid', $result[0]['id']);
				$this->session->set_userdata('email', $result[0]['emailid']);
				$this->session->set_userdata('firstname',$result[0]['firstname']);
				$this->session->set_userdata('lastname', $result[0]['lastname']);

				redirect('users/dashboard');

			}
			else
			{
				$this->session->set_flashdata('flash_message', 'invaliduser');
				redirect('users/login');
					
			}
	  }
	  //dashboard method calling
	  public function dashboard()
	  {
			//check for user login
			//$this->loginCheck();
			//check for user login end here
		 	if($this->session->userdata('captchaWord')==$_REQUEST['captcha'])
			{
				$result=$this->users_model->checkUser($this->input->post('username'),$this->input->post('password'));
				if(!empty($result[0]['emailid']))
				{
					//set data in session
						$this->session->set_userdata('userid', $result[0]['id']);
						$this->session->set_userdata('email', $result[0]['emailid']);
						$this->session->set_userdata('firstname',$result[0]['firstname']);
						$this->session->set_userdata('lastname', $result[0]['lastname']);
						$this->session->set_userdata('accountid',$result[0]['accountid']);
						$this->session->set_userdata('activemenu',$this->session->userdata('firstname'));
						$this->session->set_userdata('listpreview',"list");
						$this->session->set_userdata('activedocumenu',"default");
						$this->session->set_userdata('activemenulabel',"default");
					//set data in session
					
					
					//total files by user
					$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('accountid'));
					//total files
					$this->session->set_userdata('totalfiles', $data['totalfiles']);
					//set data in session
				  $data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
				  //user files details
				  $data['filedetails']=$this->users_model->userFilesByAcctId($this->session->userdata('accountid'));
				  //Get menu dates
				  $data['dateresult']=$this->users_model->dateResultMenu($this->session->userdata('accountid'));
				  //Get ElementFree Menu
			    $data['documenu']=$this->users_model->docuMenu($this->session->userdata('accountid'),$this->session->userdata('activemenu'));
                            //set dashboard data
                            $data['myplan']=$this->users_model->myplan($this->session->userdata('accountid'));
                            $newMembership = $this->users_model->number_files_available_and_used($this->session->userdata('accountid'));
                            $data['newMembership'] = $newMembership;
                            //set template
					$this->template->set_template('front');
					$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
					$this->template->write_view('content', 'intro',$data);
					$this->template->render();
							 
				}
				else
				{
					$this->session->set_flashdata('flash_message', 'invaliduser');
					redirect('users/login');
				}

			}
			else
			{
				$this->session->set_flashdata('flash_message', 'mismatch');
				redirect('users/login');
			}

	  }
	 	//file preview gallery
	  public function gallery()
	  {
		  //check for user login
			$this->loginCheck();
			//get user details by id
		  $data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  //user files details
		  $data['filedetails']=$this->users_model->userFilesByAcctId($this->session->userdata('accountid'));
		  //total files by user
			$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('userid'));
			//total files
			//$this->session->set_userdata('totalfiles', $data['totalfiles']);
		  //Get menu dates
			$data['dateresult']=$this->users_model->dateResultMenu($this->session->userdata('accountid'));			
			//Get ElementFree Menu
			$data['documenu']=$this->users_model->docuMenu($this->session->userdata('accountid'),$this->session->userdata('activemenu'));
		  //set data in session
			$this->template->set_template('front');
			$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
			$this->template->write_view('content','gallery',$data);
			$this->template->render();
	  }
	 
	 	 	//file preview 
	  public function filespreview()
	  {
		  //check for user login
			$this->loginCheck();
			//get user details by id
		  $data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  //user files details
		  $data['filedetails']=$this->users_model->userFilesByUserId($this->session->userdata('userid'));
		  //total files by user
			$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('userid'));
			//total files
			$this->session->set_userdata('totalfiles', $data['totalfiles']);
			//Get menu dates
			$data['dateresult']=$this->users_model->dateResultMenu($this->session->userdata('accountid'));
			//Get ElementFree Menu
			$data['documenu']=$this->users_model->docuMenu($this->session->userdata('accountid'),$this->session->userdata('activemenu'));			
		  //set data in session
			$this->template->set_template('front');
			$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
			$this->template->write_view('content','filespreview',$data);
			$this->template->render();
	  }
	 
	  //details category page
	  public function details()
	  {
		  	//check for user login
			$this->loginCheck();
			//check for user login end here
		  $this->load->view('categorydetails');
	  }
	  //
	  	public function loginCheck(){
		//echo $_SERVER['REQUEST_URI'];exit;
	    if(empty($this->session->userdata('email')))
		redirect('users/login');

	}
	//categories
	  public function categories()
	  {
		  //check for user login
			$this->loginCheck();
			//set environment variables
			if(isset($_REQUEST['datefiller']))
			{
				$datefilter=$_REQUEST['datefiller'];
				$this->session->set_userdata('activemenu',$datefilter);
			}
			else
			{
					$datefilter =$this->session->userdata('firstname');
			}	
			//get user details by id
		  $data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  //Get menu dates
			$data['dateresult']=$this->users_model->dateResultMenu($this->session->userdata('accountid'));
			//Get ElementFree Menu
			$data['documenu']=$this->users_model->docuMenu($this->session->userdata('accountid'),$datefilter);
			//Total files
			$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('accountid'));
			//Check for payment details
			$data['org']=$this->users_model->getOrg($this->session->userdata('accountid'));
			//set template
			$this->template->set_template('front');
			$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
			$this->template->write_view('content','categories',$data);
			$this->template->render();	
			
		}  
                 public function intro()
	  {
			//check for user login
			$this->loginCheck();
                        //set data in session
					
					
			//total files by user
			$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('accountid'));
			//total files
			$this->session->set_userdata('totalfiles', $data['totalfiles']);
			//set data in session
			$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
			//user files details
			$data['filedetails']=$this->users_model->userFilesByAcctId($this->session->userdata('accountid'));
			//Get menu dates
			$data['dateresult']=$this->users_model->dateResultMenu($this->session->userdata('accountid'));
			//Get ElementFree Menu
			$data['documenu']=$this->users_model->docuMenu($this->session->userdata('accountid'),$this->session->userdata('activemenu'));
			//set dashboard data
                        $data['myplan']=$this->users_model->myplan($this->session->userdata('accountid'));
                        // set devices and accounts dashboard
                        $data['mydevices']=$this->users_model->NoDevices($this->session->userdata('accountid'));
                        $data['myusers']=$this->users_model->NoAccounts($this->session->userdata('accountid'));
                        //set templaaccountste
			$this->template->set_template('front');
			$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');

                        $newMembership = $this->users_model->number_files_available_and_used($this->session->userdata('accountid'));
                        $data['newMembership'] = $newMembership;

			$this->template->write_view('content', 'intro',$data);
			$this->template->render();
	  }
          public function myprofile()
	  {
		  			//check for user login
			$this->loginCheck();
			//check for user login end here
		 if( isset($_REQUEST['phone']) || isset($_REQUEST['mobile']) || isset($_REQUEST['countrycd']) || isset($_REQUEST['address']) || isset($_REQUEST['address1']) || isset($_REQUEST['city']) || isset($_REQUEST['state']) || isset($_REQUEST['zip']) || isset($_REQUEST['question']) || isset($_REQUEST['answer']) || isset($_REQUEST['usertype']) || isset($_REQUEST['firsttime']) || isset($_REQUEST['firsttimeshare']))
			{
				//update password
				$data1=array(
/*					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'emailid' => $this->input->post('email'), */
					'phone' => $this->input->post('phone'),
					'mobile'=> $this->input->post('mobile'),        
                                        'countrycd'=> $this->input->post('countrycd'),     
                                        'address'=> $this->input->post('address'),       
                                        'address1'=> $this->input->post('address1'),      
                                        'city'=> $this->input->post('city'),          
                                        'state'=> $this->input->post('state'),         
                                        'zip'=> $this->input->post('zip'),           
                                        'question'=> $this->input->post('question'),      
                                        'answer'=> $this->input->post('answer'),        
                                        'usertype'=> $this->input->post('usertype'),      
                                        'firsttime'=> $this->input->post('firsttime'),     
                                        'firsttimeshare'=> $this->input->post('firsttimeshare')
					);
				
				$this->users_model->updateData('id',$this->session->userdata('userid'),'users',$data1);
				//redirected to login page
				$this->session->set_flashdata('flash_message', 'updated');

			}
			  //Get menu dates
			  $data['dateresult']=$this->users_model->dateResultMenu($this->session->userdata('accountid'));	
			  //Get ElementFree Menu
			  $data['documenu']=$this->users_model->docuMenu($this->session->userdata('accountid'),"default");
		    //total files by user
			  $data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('accountid'));
			  //get user details by id
		  	$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  	// Get CC list
		  	$data['cardlist']=$this->users_model->userCardList($this->session->userdata('userid'));
		  	//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the ElementFree Admin Dashboard !');
				$this->template->write_view('content','myprofile',$data);
				$this->template->render();
	  }
}
 /* End of file member.php */
/* Location: ./application/controllers/welcome.php */
