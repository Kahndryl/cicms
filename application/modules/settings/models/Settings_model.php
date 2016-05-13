<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_setting($id = NULL,$page = 0, $limit = 10){
		if($id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('settings',$limit,$from);
			return $query->result();
		}
		// return setting with id
		$query = $this->db->get_where('settings',array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('settings');
	 }
	
	 
	public function set_setting($id = NULL){
		$data = array(
			'title' => $this->input->post('title'),
'image' => $this->input->post('image'),
'Is_active' => $this->input->post('Is_active'),
'description' => $this->input->post('description'),

		);
		if($id == NULL){
			// need to create entery
			return $this->db->insert('settings', $data);
		}
		// need to update entery
		$this->db->where('id',$id);
		return $this->db->update('settings', $data);
	}
	
	public function remove_setting($id){
		$this->db->where('id',$id);
		$this->db->delete('settings');
	}
	 
}