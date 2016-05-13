<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_admin_email($email){
		$query = $this->db->get_where('tbl_login',array('email' => $email));
		return $query->first_row();
	 }

	 public function get_tbl_login($user_id = NULL,$page = 0, $limit = 10,$search = array()){
		if($user_id == NULL){
			// return all users
			$from = $limit*$page;
			foreach($search as $key => $value){
				$this->db->or_where($key.' LIKE ','%'.$value.'%');
			}
			$query = $this->db->get('tbl_login',$limit,$from);
			return $query->result();
		}
		// return tbl_login with user_id
		$query = $this->db->get_where('tbl_login',array('user_id' => $user_id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('tbl_login');
	 }
	
	 
	public function set_tbl_login($user_id = NULL){
		$data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'salt' => $this->input->post('salt'),
			'email' => $this->input->post('email'),
			'date_created' => date('Y-m-d'),
		);
		if(isset($_POST['password']) AND !empty($_POST['password'])){
			$data['password'] = md5($this->input->post('password'));
		}
		if($user_id == NULL){
			// need to create entery
			return $this->db->insert('tbl_login', $data);
		}
		// need to update entery
		$this->db->where('user_id',$user_id);
		return $this->db->update('tbl_login', $data);
	}
	
	public function remove_tbl_login($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_login');
	}
	 
}
