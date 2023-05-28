<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class employee extends CI_Controller {
//Validating login
function __construct(){
parent::__construct();
if(!$this->session->userdata('uid'))
redirect('signin');
}
public function index(){
$userfname=$this->session->userdata('fname');	
$this->load->view('employee.html',['firstname'=>$userfname]);
}

}
