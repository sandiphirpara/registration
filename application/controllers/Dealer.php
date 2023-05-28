<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class dealer extends CI_Controller {
//Validating login
function __construct(){
parent::__construct();
if(!$this->session->userdata('uid'))
    redirect('signin');
}
public function index(){
    $userfname=$this->session->userdata('fname');	
    $this->load->view('dealer.html',['firstname'=>$userfname]);
}

public function fetch_user(){  
    $this->load->model("Dealer_Model");  
    $fetch_data = $this->Dealer_Model->make_datatables();  
     //print_r($fetch_data);exit;
    $data = array();  
    foreach($fetch_data as $row)  
    {  
         $sub_array = array();           
         $sub_array[] = $row->FirstName;  
         $sub_array[] = $row->LastName;  
         $sub_array[] = $row->Email;  
         $sub_array[] = $row->City;  
         $sub_array[] = $row->State;  
         $sub_array[] = $row->Zipcode;  
         $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">Edit</button>';  
         $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';  
         $data[] = $sub_array;  
    }  
    $output = array(  
         "draw"                    =>     intval($_POST["draw"]),  
         "recordsTotal"          =>      $this->Dealer_Model->get_all_data(),  
         "recordsFiltered"     =>     $this->Dealer_Model->get_filtered_data(),  
         "data"                    =>     $data  
    );  
    echo json_encode($output);  
}

public function fetchSingleUser()  
{  
    $output = array();  
    $this->load->model("Dealer_Model");  
    $data = $this->Dealer_Model->fetchSingleUser($_POST["user_id"]);  
    foreach($data as $row)  
    {  
        $output['City'] = $row->City;  
        $output['State'] = $row->State;
        $output['Zipcode'] = $row->Zipcode;         
    }  
    echo json_encode($output);  
}  
public function deleteUser(){ 
    $data=array(
    'id'=>$this->input->post('user_id'));
    $this->load->model("Dealer_Model");  
    $res = $this->Dealer_Model->deleteUser($data);
    if($res){
        echo json_encode(array("flag"=>true,"message"=>"Delete successfully."));exit;				
    }else{
        echo json_encode(array("flag"=>false,"message"=>"Delete faild..!"));exit;						
    }

}

public function userUpdate(){
    $this->form_validation->set_rules('City','City','required');
    $this->form_validation->set_rules('State','State','required');
    $this->form_validation->set_rules('Zipcode','Zipcode','required');
    if($this->form_validation->run())
	{
        $updated_data = array(  
            'City'=>$this->input->post('City'),  
            'State'=>$this->input->post('State'),  
            'Zipcode'=>$this->input->post('Zipcode')  
        );  
        $this->load->model('Dealer_Model');  
        $res = $this->Dealer_Model->updateUser($this->input->post("user_id"), $updated_data);  
        if($res){
                echo json_encode(array("flag"=>true,"message"=>"Update successfully."));exit;				
            }else{
                echo json_encode(array("flag"=>false,"message"=>"Update faild..!"));exit;						
        }
    }else{
        echo json_encode(array("flag"=>false,"message"=>"Something Is Missing..!"));exit;						
    }
}
}
