 <?php

class Users_model extends CI_Model {

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
		$this->db->from('dynmenu');
		$this->db->where('parent_id',$menuid);
		$query = $this->db->get();
		return $query->result_array();
	}
	//get payment details by user id
	function paymentDetailsById($accountid)
	{
		$this->db->select('*');
		$this->db->from('billing');
		$this->db->where('accountno',$accountid);
		$this->db->where('status','Success');
		$query = $this->db->get();
		return $query->result_array();	
	}	
	//get dynamic menu
	function dynamicMenu($userid)
	{
		$this->db->select('*');
		$this->db->from('dynmenu');
		$this->db->where('accountid',$userid);
		//$this->db->where('parent_id','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	//get menu details
	function dynamicMenuSQL()
	{
			$sql = "SELECT * FROM dynmenu where parent_id=0";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;	
	}
	//get user file
	function userFilesByUserId($id)
	{
			$sql = "SELECT * FROM files where userid='$id' order by id" ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	function userFilesByAcctId($id)
	{
			$sql = "SELECT * FROM files where accountid='$id' order by name" ; 
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
	function getAcct($emailid)
	{
			$sql = "SELECT account FROM accounts where owneremailid='$emailid'" ; 
			$query = $this->db->query($sql);
		  $result = $query->result_array();
			return $result[0]['account'];
	}
	//all invited user by user id
	function invitedUserById($id)
	{
			$sql = "SELECT * FROM users where user_id='$id'" ; 
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
		$this->db->where('accountid', $id);
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
	
		//user all files list by acctid

	function userAllFilesbyAcctId($accountid ,$datefilter,$menufilter)
	{
  $whereclause="";
  switch (true) {
  	case ($datefilter == "Today" ):
  		$whereclause = "and date(A.created_date) = date(curdate())";
  	break;
  	case ($datefilter == "Yesterday" ):
  		$whereclause = "and date(A.created_date) = date(curdate()-1)";
  	break;
  	case ($datefilter == "This Week" ):
  		$whereclause = "and week(A.created_date) = week(curdate()) and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Week" ):
  		$whereclause = "and week(A.created_date) = week(curdate())-1 and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "This Month" ):
  		$whereclause = "and month(A.created_date) = month(curdate()) and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Month" ):
  		$whereclause = "and month(A.created_date) = month(curdate())-1 and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "This Year" ):
  		$whereclause = "and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Year" ):
  		$whereclause = "and year(A.created_date) = year(curdate())-1";
  	break;
  	case ($datefilter == "Older than 2 Years" ):
  		$whereclause = "and year(A.created_date) < year(curdate())-1";
  	break;  	  	
  	default:
  		$whereclause="";
	}	
	switch (true) {
  	case ($menufilter == "default" ):
  		$whereclausemenu="";
  	break;
  	case ($menufilter == "processing" ):
  		$whereclausemenu="and A.processing<2 order by A.processing desc";
  	break;  
  	case ($menufilter == "pictures" ):
  		$whereclausemenu="and A.filetype like '%image%'";
  	break;	  	
  	default:
  		$whereclausemenu="and B.menuid = '$menufilter'";
	}	
		//$this->db->select('id,userid,name,uniquename,folder,device,filetype,location,size,created_date');
		$sql = "SELECT distinct A.id,A.userid,A.name,A.uniquename,A.folder,A.device,A.filetype,A.location,A.size,A.created_date, A.processing FROM files A, filescategory B where A.accountid=B.accountid and A.id = B.fileid and A.accountid='$accountid'".$whereclause." ".$whereclausemenu; 
    $query = $this->db->query($sql);
		//$query = $this->db->get("");
		
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

function yearlist($accountid ,$datefilter,$menufilter)
	{
  $whereclause="";
  switch (true) {
  	case ($datefilter == "Today" ):
  		$whereclause = "and date(A.created_date) = date(curdate())";
  	break;
  	case ($datefilter == "Yesterday" ):
  		$whereclause = "and date(A.created_date) = date(curdate()-1)";
  	break;
  	case ($datefilter == "This Week" ):
  		$whereclause = "and week(A.created_date) = week(curdate()) and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Week" ):
  		$whereclause = "and week(A.created_date) = week(curdate())-1 and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "This Month" ):
  		$whereclause = "and month(A.created_date) = month(curdate()) and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Month" ):
  		$whereclause = "and month(A.created_date) = month(curdate())-1 and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "This Year" ):
  		$whereclause = "and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Year" ):
  		$whereclause = "and year(A.created_date) = year(curdate())-1";
  	break;
  	case ($datefilter == "Older than 2 Years" ):
  		$whereclause = "and year(A.created_date) < year(curdate())-1";
  	break;  	  	
  	default:
  		$whereclause="";
	}	
	if ($menufilter=="default")
	{
		$whereclausemenu="";	
	}
	else
	{
		$whereclausemenu="and B.menuid = '$menufilter'";
	}
		//$this->db->select('id,userid,name,uniquename,folder,device,filetype,location,size,created_date');
		//$sql = "SELECT distinct A.id,A.userid,A.name,A.uniquename,A.folder,A.device,A.filetype,A.location,A.size,A.created_date, A.processing FROM files A, filescategory B where A.accountid=B.accountid and A.id = B.fileid and A.accountid='$accountid'".$whereclause." ".$whereclausemenu; 
		$sql = "select  E.year ,group_concat(distinct concat('.',E.yearmonth )) as label from filedatesstg  D, docufiler.ST_dates E, files A, filescategory B where D.pkdate = E.pkdate and D.uniquename = A.uniquename and A.accountid = B.accountid and A.id=B.fileid and A.accountid='$accountid'".$whereclause." ".$whereclausemenu." group by E.year order By E.year";
    $query = $this->db->query($sql);
		//$query = $this->db->get("");
		
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
	function monthlist($accountid ,$datefilter,$menufilter)
	{
  $whereclause="";
  switch (true) {
  	case ($datefilter == "Today" ):
  		$whereclause = "and date(A.created_date) = date(curdate())";
  	break;
  	case ($datefilter == "Yesterday" ):
  		$whereclause = "and date(A.created_date) = date(curdate()-1)";
  	break;
  	case ($datefilter == "This Week" ):
  		$whereclause = "and week(A.created_date) = week(curdate()) and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Week" ):
  		$whereclause = "and week(A.created_date) = week(curdate())-1 and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "This Month" ):
  		$whereclause = "and month(A.created_date) = month(curdate()) and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Month" ):
  		$whereclause = "and month(A.created_date) = month(curdate())-1 and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "This Year" ):
  		$whereclause = "and year(A.created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Year" ):
  		$whereclause = "and year(A.created_date) = year(curdate())-1";
  	break;
  	case ($datefilter == "Older than 2 Years" ):
  		$whereclause = "and year(A.created_date) < year(curdate())-1";
  	break;  	  	
  	default:
  		$whereclause="";
	}	
	if ($menufilter=="default")
	{
		$whereclausemenu="";	
	}
	else
	{
		$whereclausemenu="and B.menuid = '$menufilter'";
	}
		//$this->db->select('id,userid,name,uniquename,folder,device,filetype,location,size,created_date');
		//$sql = "SELECT distinct A.id,A.userid,A.name,A.uniquename,A.folder,A.device,A.filetype,A.location,A.size,A.created_date, A.processing FROM files A, filescategory B where A.accountid=B.accountid and A.id = B.fileid and A.accountid='$accountid'".$whereclause." ".$whereclausemenu; 
		$sql = "select  substring(E.monthname,1,3) as monthname ,group_concat(distinct concat('.',E.yearmonth )) as label from filedatesstg  D, docufiler.ST_dates E, files A, filescategory B where D.pkdate = E.pkdate and D.uniquename = A.uniquename and A.accountid = B.accountid and A.id=B.fileid and A.accountid='$accountid'".$whereclause." ".$whereclausemenu." group by E.monthname order By E.Month";
    $query = $this->db->query($sql);
		//$query = $this->db->get("");
		
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
	//get year month combination by file for filtering
	function yearmonthlabel($uniquename)
	{
			$sql = "select  A.uniquename, group_concat(distinct B.yearmonth separator ' ') as label from filedatesstg  A, docufiler.ST_dates B where A.pkdate = B.pkdate and A.uniquename = '$uniquename'"; 
      $query = $this->db->query($sql);
      $result = $query->result_array();
      return $result[0]['label'];
	}	
// total files	
	function record_count_total_files($id,$fn='')
	{
			$sql = "SELECT count(*) as total FROM files where accountid='$id' and name like '%$fn%'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result[0]['total'];
	}
	// total files Processing
	function record_count_total_files_processing($id)
	{
			$sql = "SELECT count(*) as total FROM files where accountid='$id' and processing < '2'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result[0]['total'];
	}
	// total files Pictures
	function record_count_total_files_filetype($id,$fn='')
	{
			$sql = "SELECT count(*) as total FROM files where accountid='$id' and filetype like '%$fn%'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result[0]['total'];
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
	//delete card
	function deleteCard($id)
	{
		$this->db->delete('cardinfo', array('id' => $id));
	}	
	//delete file
	function deleteFile($id)
	{
		$this->db->delete('files', array('id' => $id));
		$this->db->delete('filescategory', array('fileid' => $id));
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
			$sql = "SELECT * FROM cardinfo where userid=".$userid ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	//card details by id 
	function cardDetailsById($id)
	{
			$sql = "SELECT * FROM cardinfo where id=".$id ; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
	function dateResultMenu($acctid)
	{
			$sql = "SELECT * from filesdates_vw WHERE `accountid` = ".$acctid." order by id"; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
		function docuMenu($acctid,$datefilter)
	{
	  switch (true) {
  	case ($datefilter == "Today" ):
  		$whereclause = "and date(created_date) = date(curdate())";
  	break;
  	case ($datefilter == "Yesterday" ):
  		$whereclause = "and date(created_date) = date(curdate()-1)";
  	break;
  	case ($datefilter == "This Week" ):
  		$whereclause = "and week(created_date) = week(curdate()) and year(created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Week" ):
  		$whereclause = "and week(created_date) = week(curdate())-1 and year(created_date) = year(curdate())";
  	break;
  	case ($datefilter == "This Month" ):
  		$whereclause = "and month(created_date) = month(curdate()) and year(created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Month" ):
  		$whereclause = "and month(created_date) = month(curdate())-1 and year(created_date) = year(curdate())";
  	break;
  	case ($datefilter == "This Year" ):
  		$whereclause = "and year(created_date) = year(curdate())";
  	break;
  	case ($datefilter == "Last Year" ):
  		$whereclause = "and year(created_date) = year(curdate())-1";
  	break;
  	case ($datefilter == "Older than 2 Years" ):
  		$whereclause = "and year(created_date) < year(curdate())-1";
  	break;  	  	
  	default:
  		$whereclause="";
	}
			$sql = "select A.menuid, A.label, count(*) as total from dynmenu A, filescategory B where A.accountid = B.accountid and A.menuid = B.menuid and A.parentid = (select KK.menuid from dynmenu KK where KK.label = 'Docufiler' and KK.accountid = A.accountid) and A.accountid = ".$acctid." and B.fileid in (select id from files where 1=1 ".$whereclause." ) group by A.menuid, A.label order by A.label"; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
			return @$result;
	}
}

?>
