<?php
class Docuapp extends CI_Controller{
function index()
{
     $data['page_title'] = "CI Hello World App!";
     $this->load->view('login',$data);
}
}
?>
