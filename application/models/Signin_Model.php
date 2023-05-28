<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signin_Model extends CI_Model{

public function index($data){
    $query=$this->db->where($data);
    $login=$this->db->get('tblusers');
    if($login!=NULL){
    return $login->row();
    }  
}

public function verifyLogin($emailid){
    $this->db->where('Email',$emailid);        
    $query = $this->db->get('tblusers');    
    $type=$query->row();
    
    if($type->user_type==1){
        return true;
    }

    if($type->IsLogin==1){
        return true;
    }else{
        return false;
    }   
}

public function Update($data,$id){
    $query=$this->db->where('id',$id);
    $login=$this->db->update('tblusers',$data);    
    if($login!=NULL){
        return true;
    }else{
        return false;
    }
}

}