<?php

filebillingorder()
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
          
          filebillingorder()
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
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

          
          public function filebillingaddress()
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
				
				$this->users_model->updateData('id',$this->input->post('cc'),'user_cardinfo',$data1);
				//redirected to login page
				$this->session->set_flashdata('flash_message', 'updated');
				//get user details by id
		  		$data['carddetails']=$this->users_model->userCardList($this->session->userdata('userid'));
				//redirect to billing order page
				redirect('users/filebillingorder');
			}
			else
			{	//total files by user
		  		$data['totalfiles']=count($this->users_model->allUserFilesByUserId($this->session->userdata('userid')));		
				//get user details by id
		  		$data['carddetails']=$this->users_model->userCardList($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front1');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','filebillingaddress',$data);
				$this->template->render();
			}
	  
	  
	  }
