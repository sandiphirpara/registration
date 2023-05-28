<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
public function index()
{			
		$this->load->view('signup.html');			
}
public function register(){
		
		$this->form_validation->set_rules('firstname','First Name','required');
		$this->form_validation->set_rules('lastname','Last Name','required');
		$this->form_validation->set_rules('emailid','Email','required');
		$this->form_validation->set_rules('password','Password','required');		
		if($this->form_validation->run())
		{
			$data=array(
			'FirstName'=>$this->input->post('firstname'),
			'LastName'=>$this->input->post('lastname'),
			'Email'=>$this->input->post('emailid'),
			'Password'=>$this->input->post('password'),
			'user_type'=>$this->input->post('user_type'));				
			
			$this->load->model('Signup_Model');
			$res=$this->Signup_Model->index($data);
			if($res){
				echo json_encode(array("flag"=>true,"message"=>"Register successfully."));exit;				
			}else{
				echo json_encode(array("flag"=>false,"message"=>"Register faild..!"));exit;						
			}
		}else{
			echo json_encode(array("flag"=>false,"message"=>"Please Enter Valid Data..!"));exit;	
		}		
}

public function verifyEmail(){
				
		$emailid=$this->input->post('emailid');
		
		$this->load->model('Signup_Model');
		$res=$this->Signup_Model->verifyEmail($emailid);		
		if($res){
			echo json_encode(array("flag"=>true,"message"=>"Email Is Already Exist."));exit;			
		}else{
			echo json_encode(array("flag"=>false,"message"=>"Eamil Not Exist."));exit;									
		}		
}

}