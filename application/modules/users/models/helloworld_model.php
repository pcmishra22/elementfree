<?php
class Helloworld_model extends CI_Model {
 
/*    function Helloworld_model()
    {
        // Call the Model constructor
        parent::Model();
    }
 */   
    function getData()
        {
            //Query the data table for every record and row
            $query = $this->db->get('data');
             
            if ($query->num_rows() < 0)
            {
                //show_error('Database is empty!');
                return "no data";
            }else{
                return $query->result();
            }
        }
}
?>

