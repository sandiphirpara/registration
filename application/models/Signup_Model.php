<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_Model extends CI_Model{
	public function index($data){		
		$query=$this->db->insert('tblusers',$data);
		if($query){
			return true;
		} else {
			return false;
		}
	}

	public function verifyEmail($emailid){
		$this->db->where('Email',$emailid);
		$query = $this->db->get('tblusers');		
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
}