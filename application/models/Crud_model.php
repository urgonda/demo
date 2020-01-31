<?php

class Crud_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function create($first,$last,$email,$gender,$age){
		$query = $this->db->query("insert into crud (first_name,last_name,gender,age,email_id) values('$first','$last','$gender','$age','$email')");
			if($query){
				return "success";
			}else{
				return "failed";
			}
	}
	
	public function delete_failed(){
		echo "Delete operation failed";
	}	
	// public function read(){
	// 	$query = $this->db->query("select * from crud");
	// 	return $query;
	// }
	public function get_record_byID($id){
		$query = $this->db->query("select * from crud where id='$id'");
		return $query->row();
	}
}