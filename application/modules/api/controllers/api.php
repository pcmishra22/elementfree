<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MX_Controller{
	
	  //constructor call	
	  function __construct()
	  {
        parent::__construct();
		session_start();
		$this->load->model('api/api_model');
		$this->load->model('users/users_model');
	  }
	 //Default access stopped...........
	 public function index($msg = NULL)
	 {
     	 die('STOP HERE :)');
     }
	 //error message 
	 public function message($message)
	 {
		 $arr = array('message' => $message);
		 return $arr;
	 }
	 //get aws credential
	 function getCredential()
	 {
		
		//input user and password
		$username=$this->input->post('username'); 
		$password=$this->input->post('password'); 	
                //update log table
                        $logdata=array(
                                'apiname' => 'getCredential',
                                'value' => $username.' '.$password
                        );
                        //save data to server.
                        $this->users_model->saveData('apilog', $logdata);

		//check for user and password exist
		$result=$this->users_model->checkUser($username,$password);
			if(!empty($result[0]['emailid']))
			{
			//get accesskey from database
			$appdetails=$this->users_model->getSettings();
			//$bucket = 'docufiler/'.$result[0]['accountid'];
			$bucket = 'docufiler';
			//result array to return
			$result = array(
			'awsAccessKey' => $appdetails[0]['awsAccessKey'],
			'awsSecretKey' => $appdetails[0]['awsSecretKey'],
			'bucketname' => $bucket,
			'uniquevalue' => uniqid('', true).'_'
			);
			}	
			else
			{
			print_r(json_encode($this->message('Username and password did not match, please enter them again.')));
			}
			//print json 
			print_r(json_encode($result));
	 }
	 //save data
	 function saveData()
	 {
		
		//input user and password
		$username=$this->input->post('username'); 
		$password=$this->input->post('password'); 	
		
		$logdata=array(
      'apiname' => 'saveData',
			'value' => $username.'--'.$password.'--'.$alldata
      );
    //save data to server.
    $this->users_model->saveData('apilog', $logdata);

		//check for user and password exist
		$result=$this->users_model->checkUser($username,$password);
		if(!empty($result[0]['emailid']))
		{
		$alldata=$this->input->post('alldata'); 
			 print_r($alldata);

			
                                
			$fn='';
                        $fileuniquename='';
                        $fcdt='1/1/1901';
                        $fldt='1/1/1901';
                        $filesize='0';
                        $hostname='';
                        $filetype='';
                        $userid='';
                        $folder='';
                        $devicedetails='';
                        $location='';

				$datatoarray=json_decode($alldata,true);                         
				//set variables to save in database
				$accountid=$result[0]['accountid'];
				$fn=$datatoarray[0]['setName'];
				$fileuniquename=$datatoarray[0]['uniqueFileName'];
				$fcdt=$datatoarray[0]['ownFileCreated'];
				$fldt=$datatoarray[0]['ownFileUpdate'];
				$filesize=$datatoarray[0]['ownSize'];
				$hostname=$datatoarray[0]['ownComputerName'];
				$filetype=$datatoarray[0]['setExtencion'];
				$userid=$result[0]['id'];
				$folder=$datatoarray[0]['ownFolder'];
				$devicedetails=$datatoarray[0]['ownDeviceDetails'];
				$location=$datatoarray[0]['ownLocation'];			
				//save data to table
					$data_to_store=array(
						'accountid' => $accountid ,
						'userid' => $userid,
						'name' => $fn,
						'uniquename' => $fileuniquename,
						'folder' => $folder,
						'device' => $hostname,
						'devicedetails' => $devicedetails,
						'filetype' =>$filetype,
						'location' => $location,
						'file_created_date' => $fcdt,
						'file_last_modified_date' => $fldt,
						'size' => $filesize,
						'created_date' => date("Y-m-d H:i:s")	
					);
    	print_r($data_to_store);
					//save data to server.
					$this->users_model->saveData('files', $data_to_store);
					
			$data_to_store_categorization=array(
					'menuid' => $this->users_model->getMenuId($accountid,'Miscellaneous'),
					'fileid' => $this->users_model->getfileid($fileuniquename),
					'accountid' => $accountid,
					'type'=> "Docufiler",
				);
				$this->users_model->saveData('filescategory', $data_to_store_categorization);
					//message
					print_r(json_encode($this->message('File Saved.')));
		}	
			else
			{
			print_r(json_encode($this->message('Username and password did not match, please enter them again.')));
			}
	 }
    function setFavorite()
    {
        //input user and password
        $search=$this->input->get('search'); 
        $searchId=$this->input->get('id'); 
        
        $searchData= array('timestamp' => date("Y-m-d H:I:s"),'userid' => $this->session->userdata('userid'),'label' => substr($search,0,15),'value' => $search,'fav' => 1);  
        $idSearch=$this->users_model->saveData('usersearches',$searchData);
        
        print_r(json_encode($this->message($idSearch)));
    }
    function delFavorite()
    {
        //input user and password
        $search=$this->input->get('search'); 
        $searchId=$this->input->get('id'); 
        
        $idSearch=$this->users_model->removeFavoriteSearch($searchId);
        
        print_r(json_encode($this->message($idSearch)));
    }	
	  //get account information
	  function getAccount()
	  {
		//input user and password
		$username=$this->input->post('username'); 
		$password=$this->input->post('password'); 	
		
                //update the log table
                $logdata=array(
                                'apiname' => 'getAccount',
                                'value' => $username.'--'.$password
                        );
                        //save data to server.
                        $this->users_model->saveData('apilog', $logdata);

		//check for user and password exist
		if($username=='' || $password=='')
		{
			print_r(json_encode($this->message('Enter user and password')));
		}
		else
		{
			$result=$this->users_model->checkUser($username,$password);
			//check result
			if(count($result)>0)
			{
				//total processing files
				$nooffilesprocessing=$this->users_model->record_count_total_files_processing($result[0]['accountid']);
				//no of devices
                                $nodevices=$this->users_model->NoDevices($result[0]['accountid']);
                                //no of Accounts
                                $noaccounts=$this->users_model->NoAccounts($result[0]['accountid']);
                                $plan=$this->users_model->myplan($result[0]['accountid']);
                                $planname=$plan[0]->planname;
                                $files=$plan[0]->files;
                                $filesbal=$plan[0]->balance;
                                if ($filesbal < 0)
                                        $filesbal=0;
                                $totalfiles=$plan[0]->NoFiles;
                                $message = 'You still have 50 more files you can auto-organize. Too Few? We understand, you can easily change your plan at <a href="http://xuite.org/plan">Change my Plan</a>';	

                                //added in array
				$result[0]['nooffiles']=$totalfiles;
				$result[0]['nooffilesprocessing']=$nooffilesprocessing;	
                                $result[0]['noaccounts']=$noaccounts;	
                                $result[0]['nodevices']=$nodevices;	
                                $result[0]['planname']=$planname;	
                                $result[0]['filesbalance']=$filesbal;
                                $result[0]['message']=$message;
				//return json value
				print_r(json_encode($result));	
			}
			else
			{
				print_r(json_encode($this->message('User does not exist.'.$username)));
			}
			
		}
		
		
	  }
	  
}  
