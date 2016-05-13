<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_user($user_id = NULL,$page = 0, $limit = 10){
		if($user_id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('users',$limit,$from);
			return $query->result();
		}
		
		// return user with user_id
		//$query = $this->db->get_where('users',array('user_id' => $user_id));
		
			$this->db->select('*');
		    $this->db->from('users');
	        //$this->db->join('bank_info', 'users.user_id = bank_info.user_id');
			$query = $this->db->where('users.user_id', $user_id);
			$query = $this->db->get();
		//print'<pre>'; print_r($query);die;
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('users');
	 }
	 
	 public function getBankAccountDetail($user_id){
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		return $this->db->get('bank_info')->row();
	}
	
	 
	public function set_user($user_id = NULL){
		$data = array(
		//	'name' => $this->input->post('name'),
//'email' => $this->input->post('email'),
'password' => md5($this->input->post('password')),
//'contact' => $this->input->post('contact'),
// 'firstname' => $this->input->post('firstname'),
// 'surname' => $this->input->post('surname'),
// 'guider_contact' => $this->input->post('guider_contact'),
// 'stret_no' => $this->input->post('stret_no'),
// 'building_name' => $this->input->post('building_name'),
// 'street' => $this->input->post('street'),
// 'suburb' => $this->input->post('suburb'),
// 'city' => $this->input->post('city'),
// 'country' => $this->input->post('country'),
// 'balance' => $this->input->post('balance'),
// 'image' => $this->input->post('image'),

		);
		if($user_id == NULL){
			// need to create entery
			return $this->db->insert('users', $data);
		}
		// need to update entery
		$this->db->where('user_id',$user_id);
		return $this->db->update('users', $data);
	}
	
	public function remove_user($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->delete('users');
	}
	public function update_manager($user_id,$value){
		
		$data = array(
			'is_manager' => $value,
		);
		$this->db->where('user_id',$user_id);
		return $this->db->update('users', $data);
		
		
		
	}
	 
}