<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dealer_Model extends CI_Model{
    //get users table data with all fields filter/search
    var $table = "tblusers";  
    var $select_column = array('id', 'FirstName', 'LastName', "Email",'City','State','Zipcode');  
    var $order_column = array(null, 'FirstName', 'LastName','Email','City','State','Zipcode', null, null);  
    public function make_query()  
    {  
         $this->db->select($this->select_column);  
         $this->db->from($this->table);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("FirstName", $_POST["search"]["value"]);  
              $this->db->or_like("LastName", $_POST["search"]["value"]);  
              $this->db->or_like("Email", $_POST["search"]["value"]);  
              $this->db->or_like("City", $_POST["search"]["value"]);  
              $this->db->or_like("State", $_POST["search"]["value"]);  
              $this->db->or_like("Zipcode", $_POST["search"]["value"]);  
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('id', 'DESC');  
         }  
    }  
    public function make_datatables(){  
         $this->make_query();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         //print_r($this->db->last_query());exit;
         return $query->result();  
    }  
    public function get_filtered_data(){  
         $this->make_query();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    public function get_all_data()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table);  
         return $this->db->count_all_results();  
    }  

    //get single user
    public function fetchSingleUser($user_id){
        $this->db->where("id", $user_id);  
        $query=$this->db->get('tblusers');  
        return $query->result(); 
    }

    //update user
    public function updateUser($user_id, $data)  
    {  
        $this->db->where("id", $user_id);  
        $update=$this->db->update("tblusers", $data);  
        if($update!=NULL){
            return true;
        }else{
            return false;
        }
    }  

    //delete user    
    public function deleteUser($data){		
        $query=$this->db->where($data);
		$query=$this->db->delete('tblusers');
		if($query){
			return true;
		} else {
			return false;
		}
	}
}