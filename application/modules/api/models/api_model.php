 <?php

class Api_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	//update marks of user
	function updateMarksofUser($subject,$roll,$marks)
	{
		$sql = "SELECT * FROM exam_student where rollno=".$roll; 
		$query = $this->db->query($sql);
        $result = $query->result_array();

        if($subject=='aptitude')
        {
        	if($result[0]['aptitude_marks']=='')
        	{
        		$data=array('aptitude_marks'=>$marks);
				$this->db->where('rollno',$roll);
				$this->db->update('exam_student',$data);
        	}
        }
        else
        {
        	if($result[0]['technical_marks']=='')
        	{
        		$data=array('technical_marks'=>$marks);
				$this->db->where('rollno',$roll);
				$this->db->update('exam_student',$data);
        	}
        }

	}
	//get dynamic menu
	function dynamicSubMenu($menuid)
	{
		$this->db->select('*');
		$this->db->from('dynnmic_menu');
		$this->db->where('parent_id',$menuid);
		$query = $this->db->get();
		return $query->result_array();
	}
	//get payment details by user id
	function paymentDetailsById($userid)
	{
		$this->db->select('*');
		$this->db->from('billing');
		$this->db->where('userid',$userid);
		$this->db->where('status','Success');
		$query = $this->db->get();
		return $query->result_array();	
	}
	//get dynamic menu
	function dynamicMenu($userid)
	{
		$this->db->select('*');
		$this->db->from('dynnmic_menu');
		$this->db->where('accountid',$userid);
		$this->db->where('parent_id','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	//get menu details
	function dynamicMenuSQL()
	{
			$sql = "SELECT * FROM dynnmic_menu where parent_id=0";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;	
	}
	//all user files by user id
	function allUserFilesByUserId($userid)
	{
		$this->db->select('*');
		$this->db->from('files');
		$this->db->where('userid',$userid);
		$query = $this->db->get();
		return $query->result_array();
	}
	//get user file
	function userFilesByUserId($id)
	{
			$sql = "SELECT * FROM files where userid='$id' order by id limit 0,4" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//userfiles data by userid
	function userFilesDataByUserId($userid,$id)
	{
		//$start=($id-1)*4;
		$start=0;
		$end=$id*4;
		$sql = "SELECT * FROM files where userid='$userid' order by id limit $start,$end" ; 
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
	//get files whose image is not created yet
	function imageNotConvertedFiles()
	{
			$sql = "SELECT id,uniquename FROM files where is_image_created='0'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//get file details by id
	function getFile($id)
	{
			$sql = "SELECT * FROM files where id='$id'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//all invited user by user id
	function invitedUserById($id)
	{
			$sql = "SELECT * FROM user_details where user_id='$id'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//cardinfo by user
	//sobscription details
	function subscriptionDetails()
	{
		$sql = "SELECT * FROM plans"; 
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;	
	}	
	//check user details by id
	function userDetailsById($id)
	{
			$sql = "SELECT * FROM users where id='$id'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//email checks in account table
	function register_email_exists_account($email)
	{
			$sql = "SELECT * FROM accounts where owneremailid='$email'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//check email exists
	function register_email_exists($email)
	{
			$sql = "SELECT * FROM users where emailid='$email'" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//fetch settings data
	
	function fetchSettingsData()
	{
			$sql = "SELECT * FROM exam_settings" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//update data
	function updateData($field,$value,$tablename,$data)
	{
		$this->db->where($field, $value);
		$this->db->update($tablename, $data);
		$id = $this->db->insert_id(); 
		return @$id;
	}	
	//save data
	function saveData($tablename,$data)
	{
		$this->db->insert($tablename, $data);
		$id = $this->db->insert_id(); 
		return @$id;
	}
	//check user
	function checkUser($user,$pass)
	{
		    $sql = "SELECT * FROM users where emailid='$user' and password=md5('$pass')"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	//promotional discount
	
	function promoDiscount($code)
	{
			$sql = "SELECT * FROM promotionalcode where codename='$code'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	//check user details
	function checkcodedata($code)
	{
			$sql = "SELECT * FROM users where passwordreset='$code'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	//user all files list

	function userAllFiles($id,$limit,$start,$fn)
	{
		$this->db->select('id,userid,name,uniquename,folder,device,filetype,location,size,created_date');
		$this->db->from('files');
		$this->db->limit($limit, $start);
		$this->db->where('userid', $id);
		$this->db->like('name', $fn); 
		$this->db->order_by("id","desc");
		$query = $this->db->get("");
		
		$data1=array();
		if ($query->num_rows() > 0) 
		{
			
		foreach ($query->result() as $row)
		{
			$data1[] = $row;
		}
		}
		return $data1;
	}

// total files	
	function record_count_total_files($id,$fn='')
	{
			$sql = "SELECT count(*) as total FROM files where userid='$id' and name like '%$fn%'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result[0]['total'];
	}
	//delete card
	function deleteCard($id)
	{
		$this->db->delete('user_cardinfo', array('id' => $id));
	}	
	//delete file
	function deleteFile($id)
	{
		$this->db->delete('files', array('id' => $id));
	}
	//setting details
	function getSettings()
	{
			$sql = "SELECT * FROM settings" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}	
	//user card list 
	function userCardList($userid)
	{
			$sql = "SELECT * FROM user_cardinfo where userid=".$userid ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//card details by id 
	function cardDetailsById($id)
	{
			$sql = "SELECT * FROM user_cardinfo where id=".$id ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//get menuid
	function getMiscMenuid($accountid)
	{
			$sql = "select menuid from dynmenu where label = 'Miscellaneous' and accountid = '$accountid'"; 
      $query = $this->db->query($sql);
      $result = $query->result_array();
      return $result[0]['menuid'];		
	}
	//get menuid
	function getMenuId($accountid,$label)
	{
			$sql = "select menuid from dynmenu where label = '$label' and accountid = '$accountid'"; 
      $query = $this->db->query($sql);
      $result = $query->result_array();
      return $result[0]['menuid'];		
	}
	//get file id
	function getfileid($uniquename)
	{
			$sql = "select id from files where uniquename = '$uniquename'"; 
      $query = $this->db->query($sql);
      $result = $query->result_array();
      return $result[0]['id'];
	}
        function NoAccounts($accountid)
	{
        $sql = "select count(distinct emailid) as total from users where accountid = '$accountid'"; 
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['total'];
	}
        function NoDevices($accountid)
	{
	$sql = "select count(distinct device) as total from user_files where accountid ='$accountid'"; 
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['total'];
	}
        function plandetails($accountid)
	{
	$sql = "select max(A.created_date) as transdate, B.product as planname, C.files from billing A, billingline B, plans C
where A.transactionid = B.transactionid
and B.product=C.`name`
and A.accountno ='$accountid'"; 
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if(count($result)>0)
	{
        return @$result;
	}
        else
        {
        $arr = array('planname' => 'Free','files' => '50' );
        return @$arr;   
        }
	}
}

?>
