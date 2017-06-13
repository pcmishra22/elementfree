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
			$sql = "SELECT A.*, B.emailid as remailid, B.Firstname as rfirstname, B.lastname as rlastname FROM users A left outer join users B 
                        on A.referredby = B.id
                        where A.id='$id'" ; 
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
		    $sql = "SELECT `id`, `emailid`,`firstname`,`lastname`,`signup`,`firsttime`,`firsttimeshare`,`phone`,`mobile`,`address`,`address1`,`city`,`state`,`zip`,`countrycd`,`usertype`,`create_datetime`,`accountid` FROM users where emailid='$user' and password=md5('$pass')"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	//promotional discount
	
	function searchwordsdocument($document)
	{
            $sql = "SELECT words
                    FROM content
                    WHERE fileid = ".$document; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result[0]['words'];
	}

	function saveategorizationdocument($category, $subcategory, $document, $selectedwords, $account, $wordorganized, $noselectedwords, $value)
	{
            // alias
            $words = explode(",",$selectedwords);
            $selectedwords = "";
            foreach ( $words as $word ) {
                if ( $word != "" ) {
                    $selectedwords .= $word." ";
                }
            }
            $selectedwords = substr($selectedwords, 0, -1);
            
            // exception
            $wordsE = explode(",",$noselectedwords);
            $exceptionwords = "";
            foreach ( $wordsE as $wordE ) {
                if ( $wordE != "" ) {
                    $exceptionwords .= $wordE." ";
                }
            }
            $exceptionwords = substr($exceptionwords, 0, -1);
            
            // userid
            $sql = "SELECT id
                    FROM users
                    WHERE accountid = ".$account; 
            $query = $this->db->query($sql);
            $userid = $query->result_array();
            $userid = $userid[0]['id'];

            $sql = "SELECT subcat
                    FROM org
                    WHERE accountid = ".$account."
                    AND label = '".$category."'
                    AND subcat = '".$subcategory."'
                    AND fileid = ".$document;
            $query = $this->db->query($sql);
            $result = $query->result_array();
            
            if ( empty($result) || $result[0]['subcat'] == "" || $result[0]['subcat'] == "null" ) {
                $sql = "INSERT INTO org (accountid, label, subcat, value, alias, exception, fileid, userid)
                        VALUES (".$account.", '".$category."', '".$subcategory."', '".$value."', '".$selectedwords."', '".$exceptionwords."', ".$document.", ".$userid.")"; 
                print_r($sql);
                $query = $this->db->query($sql);
            } else {
                $sql = "UPDATE org
                        SET alias = '".$selectedwords."', exception = '".$exceptionwords."', userid = '".$userid."', value = '".$value."'
                        WHERE accountid = ".$account."
                        AND label = '".$category."'
                        AND subcat = '".$subcategory."'
                        AND fileid = ".$document; 
                $query = $this->db->query($sql);
            }

            return $query;
	}

	function saveNewCategory($category, $account, $value)
	{
            $sql = "INSERT INTO org(accountid, label, subcat, value)
                    VALUES (".$account.", '".$category."', '', '".$value."')"; 
            $query = $this->db->query($sql);
            return $query;
	}

	function deletecategory($category)
	{
            $sql = "UPDATE org
                    SET status=1
                    WHERE orgid=".$category; 
            $query = $this->db->query($sql);
            return $query;
	}
        
        function saveCategorySubCategory($category, $subcategory, $value, $account)
	{
            $sql = "INSERT INTO org(accountid, label, subcat, value)
                    VALUES (".$account.", '".$category."', '".$subcategory."', '".$value."')"; 
            $query = $this->db->query($sql);
            return $query;
	}

        function editCategorySubCategory($id, $category, $subcategory, $value, $account)
	{
            $sql = "UPDATE org
                    SET accountid=".$account.", label='".$category."', subcat='".$subcategory."', value='".$value."'
                    WHERE orgid=".$id; 
            $query = $this->db->query($sql);
            return $query;
	}

	function saveNewSubCategory($category, $subcategory, $account, $value)
	{
            $sql = "SELECT subcat
                    FROM org
                    WHERE accountid = ".$account."
                    AND label = '".$category."'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            
            if ( $result[0]['subcat'] != "" && $result[0]['subcat'] != "null" ) {
                $sql = "INSERT INTO org(accountid, label, subcat, value)
                        VALUES (".$account.", '".$category."', '".$subcategory."', '".$value."')"; 
                $query = $this->db->query($sql);
            } else {
                $sql = "UPDATE org
                        SET subcat = '".$subcategory."', value = '".$value."'
                        WHERE accountid = ".$account."
                        AND label = '".$category."'"; 
                $query = $this->db->query($sql);
            }

            return $query;
	}

	function searchsubcategories($category)
	{
            $sql = "SELECT DISTINCT(subcat)
                    FROM org
                    WHERE label = '".$category."'
                    ORDER BY subcat"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
        
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
			$sql = "SELECT `id`, `emailid`,`firstname`,`lastname`,`signup`,`firsttime`,`firsttimeshare`,`phone`,`mobile`,`address`,`address1`,`city`,`state`,`zip`,`countrycd`,`usertype`,`create_datetime`,`accountid` FROM users where passwordreset='$code'"; 
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

	function userAllFilesbyAcctId($accountid ,$datefilter,$menufilter,$searchval='dflt',$docuyearval='dflt',$documonthval='dflt')
	{
  $limit = 'limit 100';
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
        //this function decides on what parameters to pass to filter by date in the document.
        //$docuyearval="'2006','2009','2007'";
        //$documonthval="'05','08','10'";
        switch (true) {
        case ($docuyearval!='dflt' && $documonthval!='dflt' ):
  		$docudateclause="and A.uniquename in (select DDD.uniquename from filedatesstg DDD where year(DDD.pkdate) in ($docuyearval) and month(DDD.pkdate) in ($documonthval) )";
  	break;
  	case ($docuyearval!='dflt' && $documonthval='dflt' ):
  		$docudateclause="and A.uniquename in (select DDD.uniquename from filedatesstg DDD where year(DDD.pkdate) in ($docuyearval))";
  	break;  
  	case ($docuyearval='dflt' && $documonthval!='dflt' ):
  		$docudateclause="and A.uniquename in (select DDD.uniquename from filedatesstg DDD where month(DDD.pkdate) in ($documonthval) )";
  	break;	  	
  	default:
  		$docudateclause="";
	}
        //Creates a new AND clause if there is a seach value
	//$searchval="Statement";
        $searchclause="";
	if ($searchval != "dflt" )
		{ $searchclause="and A.id in (select distinct AA.fileid from content AA
					where match (AA.content,AA.words)
					against ('$searchval' IN NATURAL LANGUAGE MODE))";
		}        
		//full SQL select
		$sql = "SELECT distinct A.id,A.userid,A.name,A.uniquename,A.folder,A.device,A.filetype,A.location,A.size,A.created_date, "
                        . "A.processing, A.previewimagename "
                        . "FROM files A, filescategory B "
                        . "where A.accountid=B.accountid "
                        . "and A.id = B.fileid and A.name not like '%~%' "
                        . "and A.accountid='$accountid'".$whereclause." ".$searchclause." ".$docudateclause." ".$whereclausemenu." ".$limit; 
//    die($sql);
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
			$sql = "SELECT count(*) as total FROM files where accountid='$id' and name like '%$fn%' and  name not like '%~%'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result[0]['total'];
	}
        function number_files_available_and_used( $id ) {
            $sql = "SELECT
                            p.files available,
                            (SELECT count(*)
                            FROM files
                            WHERE accountid = b.accountno) used
                    FROM billing b, billingline bl, plans p
                    WHERE b.accountno = bl.accountno
                    AND b.transactionid = bl.transactionid
                    AND p.name = bl.product
                    AND b.created_date = (SELECT max(ZZ.created_date) FROM billing ZZ WHERE ZZ.accountno = b.accountno)
                    AND b.accountno = ".$id;
            $query = $this->db->query($sql);
            $result = $query->result_array();

            return ($result[0]['used'] > $result[0]['available']) ? true : false;
        }
        // total files	
	function record_count_total_files_bydate($id,$fn='')
	{
			$sql = "SELECT total FROM filesdates_vw where accountid='$id' and dateresult = '$fn'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result[0]['total'];
	}
	// total files Processing
	function record_count_total_files_processing($id)
	{
			$sql = "SELECT count(*) as total FROM files where accountid='$id' and  name not like '%~%' and processing < '2'"; 
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
			$sql = "select A.menuid, A.label, count(*) as total from dynmenu A, filescategory B where A.accountid = B.accountid and A.menuid = B.menuid and A.parentid = (select KK.menuid from dynmenu KK where KK.label = 'Docufiler' and KK.accountid = A.accountid) and A.accountid = ".$acctid." and B.fileid in (select id from files where 1=1 ".$whereclause." and name not like '%~%') group by A.menuid, A.label order by A.label"; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
//	die($sql);
			return @$result;
	}
	//get org table info
	function getOrg($acctid)
	{
            $sql = "SELECT * FROM org where accountid=".$acctid ; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	//get categories table org
	function getCategories($acctid)
	{
            $sql = "SELECT DISTINCT(label)
                    FROM org
                    WHERE accountid = ".$acctid."
                    ORDER BY label"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
        //Get user plan details
        function myplan($accountid )
	{
  	$sql = "Select  A.created_date, B.Product as planname, B.Promotionalcode, C.files, C.nousers, C.filesize, date_add(A.created_date, interval 1 YEAR) as EndDate,
                (select count(*) as NoFiles from files where accountid = A.accountno) as NoFiles, files - (select count(*) as NoFiles from files where accountid = A.accountno) as balance
                from billing A, billingline B, plans C #, (select count(*) as NoFiles from files where accountid = A.accountno) as D
                where A.accountno = B.accountno
                and A.transactionid = B.transactionid
                and C.name = B.product
                and A.created_date = (select max(ZZ.created_date) from billing ZZ 
				where ZZ.accountno = A.accountno)
                and A.accountno = '$accountid'"; 
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
		else
		{
                    $sql = "Select  A.createddate, 'Free' as planname, 'None' as Promotionalcode, '50' as files, '1' as nousers, '2' as filesize, date_add(A.createddate, interval 1 YEAR) as EndDate,
                    (select count(*) as NoFiles from files where accountid = A.account) as NoFiles, 50 - (select count(*) as NoFiles from files where accountid = A.account) as balance
                    from accounts A 
                    where A.account ='$accountid'"; 
			$query = $this->db->query($sql);
				foreach ($query->result() as $row)
			{
				$data1[] = $row;
			}
		}	
		return $data1;
	}
//get organization filtername and values by file for category filtering
	function filefiltervalues($fileid)
	{
            $sql = "select KKK.fileid, group_concat(distinct  KKK.value separator ' ') as label , group_concat(distinct  replace(replace(replace(KKK.value,' ','-'),'.','-'),'&','-') separator ' ') as code from filescategorystg KKK where KKK.fileid = '$fileid'"; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result[0]['code'];
	}
        //get organization filters and values by category
	function filtersbycategory($acctid,$category,$docuyearval='dflt',$documonthval='dflt')
	{
    switch (true) {
    case ($docuyearval!='dflt' && $documonthval!='dflt' ):
    	$docudateclause="and A.uniquename in (select DDD.uniquename from filedatesstg DDD where year(DDD.pkdate) in ($docuyearval) and month(DDD.pkdate) in ($documonthval) )";
  	break;
  	case ($docuyearval!='dflt' && $documonthval='dflt' ):
  		$docudateclause="and A.uniquename in (select DDD.uniquename from filedatesstg DDD where year(DDD.pkdate) in ($docuyearval))";
  	break;  
  	case ($docuyearval='dflt' && $documonthval!='dflt' ):
  		$docudateclause="and A.uniquename in (select DDD.uniquename from filedatesstg DDD where month(DDD.pkdate) in ($documonthval) )";
  	break;	  	
  	default:
  		$docudateclause="";
  	}
            $sql = "select distinct  KKK.label as category, KKK.connection as filter, KKK.value, replace(replace(replace(KKK.value,' ','-'),'.','-'),'&','-') as code from filescategorystg KKK,files A
                where KKK.fileid =  A.id 
                and KKK.label= '$category' 
                and A.accountid =$acctid ".$docudateclause."
                order by category, filter, value "; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
        // function to display last 10 user searches 
        function searchsaves($userid)
	{
            $sql = "select * from usersearches where userid ='$userid' order by fav desc, timestamp desc limit 10 "; 
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return @$result;
	}
	function removeFavoriteSearch($searchid)
  {
            $sql = "update usersearches set fav=0 where id =$searchid"; 
            $query = $this->db->query($sql);
            //$result = $query->result_array();
            return $query;
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
        $sql = "select count(distinct device) as total from files where accountid ='$accountid'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['total'];
        }
        function NoInvitations($userid)
        {
        $sql = "select count(*) as total from users where referredby = '$userid'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['total'];
        }
        function dateResultMenuDash($acctid,$filter='%')
	{
			$sql = "SELECT total from filesdates_vw WHERE `accountid` = ".$acctid." and dateresult like '".$filter."' order by id"; 
			$query = $this->db->query($sql);
			$result = $query->result_array();
		if ($query->num_rows() > 0) 
		{	
                    //$data1=$result;
                    foreach ($query->result() as $row)
                    {
			$data1=$row->total; 
                    }
                }
                else
                {
                    $data1=0; 
		}
		return $data1;
        }     
}

?>
