<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	 public function get_menu($id = NULL,$page = 0, $limit = 10){
		if($id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('menu',$limit,$from);
			return $query->result();
		}
		// return menu with id
		$query = $this->db->get_where('menu',array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('menu');
	 }
	
	 
	public function set_menu($id = NULL){
		$data = array(
			'name' => $this->input->post('name'),
'link' => $this->input->post('link'),
'parent_id' => $this->input->post('parent_id'),
'order' => $this->input->post('order'),

		);
		if($id == NULL){
			// need to create entery
			return $this->db->insert('menu', $data);
		}
		// need to update entery
		$this->db->where('id',$id);
		return $this->db->update('menu', $data);
	}
	
	public function remove_menu($id){
		$this->db->where('id',$id);
		$this->db->delete('menu');
	}
	 
}