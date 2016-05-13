<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gallery_model extends CI_Model{
	public $table_gallery = 'media';
	
	 public function __construct(){
		$this->load->database();
	 }
	 
	  public function get_gallery_by_slug($slug = NULL){
		
		// return page with id

		$query = $this->db->get_where($this->table_gallery,array('slug' => $slug));
		return $query->first_row();
	 }

	 public function gallery_exist($slug = NULL){
		
		// return page with id
		$query = $this->db->get_where($this->table_gallery,array('slug' => $slug));
		$result =  $query->first_row();
		
		if(empty($result)){
			return FALSE;
		}
		return TRUE;
	 }

	 public function get_gallery($id = NULL,$page = 0, $limit = 10){
		if($id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get($this->table_gallery,$limit,$from);
			return $query->result();
		}
		// return page with id
		$query = $this->db->get_where($this->table_gallery,array('id' => $id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all($this->table_gallery);
	 }
	
	 
	public function set_gallery($id = NULL){
		$data = array(
			'gallery_title' => $this->input->post('gallery_title'),
'slug' => url_title($this->input->post('gallery_title'), 'dash', true),
'short_content' => $this->input->post('short_content'),
'content' => $this->input->post('content'),
'meta_keyword' => $this->input->post('meta_keyword'),
'meta_description' => $this->input->post('meta_description'),
'status' => $this->input->post('status'),
'updated_on' => date('Y-m-d H:i:s'),

		);
		if($id == NULL){
			$data['created_on'] = date('Y-m-d H:i:s');
			// need to create entery
			return $this->db->insert($this->table_gallery, $data);
		}
		// need to update entery
		$this->db->where('id',$id);
		return $this->db->update($this->table_gallery, $data);
	}
	
	public function remove_gallery($id){
		$this->db->where('id',$id);
		$this->db->delete($this->table_gallery);
	}
	 
}
