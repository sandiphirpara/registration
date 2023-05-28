<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signin extends CI_Controller{
public function index(){
    $this->load->view('signin.html');	
}

public function login(){
        
    $this->form_validation->set_rules('emailid','Email','required');
    $this->form_validation->set_rules('password','Password','required');
    if($this->form_validation->run())
	{

        $data=array(
        'Email'=>$this->input->post('emailid'),
        'Password'=>$this->input->post('password'));
    
        $this->load->model('Signin_Model');
        $validate=$this->Signin_Model->index($data);
        if($validate){
            $this->session->set_userdata('uid',$validate->id);	
            $this->session->set_userdata('fname',$validate->FirstName);	
            $this->session->set_userdata('userType',$validate->user_type);	   
            if($validate->user_type==1){
                //redirect to Employee
                echo json_encode(array("flag"=>true,"message"=>"Login Successfully.","url"=>base_url()."index.php/employee"));exit;
            }else{
                //Redirect to dealer
                if($validate->IsLogin==0){
                $data=array(
                    'City'=>$this->input->post('City'),
                    'State'=>$this->input->post('State'),
                    'Zipcode'=>$this->input->post('Zipcode'),
                    'IsLogin'=>1);       

                $this->Signin_Model->Update($data,$validate->id);            
                }
                echo json_encode(array("flag"=>true,"message"=>"Login Successfully.","url"=>base_url()."index.php/dealer"));exit;
            }
        } else {
            echo json_encode(array("flag"=>false,"message"=>"Invalid login details.Please try again."));exit;	
        } 
    }else{
        echo json_encode(array("flag"=>false,"message"=>"Invalid login details.Please try again."));exit;
    }   
}

//check dealer login first time or not
public function verifyLogin(){
    $emailid=$this->input->post('emailid');		
    $this->load->model('Signin_Model');
    $res=$this->Signin_Model->verifyLogin($emailid);	    
    if($res){
        echo json_encode(array("flag"=>true,"message"=>"Exist."));exit;			
    }else{
        echo json_encode(array("flag"=>false,"message"=>"Not Exist."));exit;									
    }	
}

}