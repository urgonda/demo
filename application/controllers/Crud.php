<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('crud_model');
	}
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }
	 
	public function create(){
		$this->load->view("create");
	}
	 
	public function create_post(){
		$res = $this->crud_model->create($first_name,$last_name,$email,$gender,$age);
		if($res == "success"){
			redirect(site_url('crud/read'));
		}else{
			redirect(site_url('crud/create_failed'));
		}
	}
	public function create_failed(){
		echo "create operation failed";
	}
	public function read(){
		$data['res_id'] = $this->crud_model->read();
		$this->load->view('view',$data);
	}
	public function update($id){
		$data['crud_data'] = $this->crud_model->get_record_byID($id);
		if(!empty($data['crud_data'])){
			$this->load->view('update',$data);
		}else{
			redirect(site_url());
		}
	}
	public function update_failed(){
		echo "Update operation failed";
	}
	public function delete($id){
		$query = $this->db->query("delete from crud where id ='$id'");
		if($query){
			return "success";
		}else{
			return "failed";
		}
	}
}