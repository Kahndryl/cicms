<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('gallery_model');
		$this->load->helper('url');
		$this->load->helper('login/login');
		if(is_user_login(TRUE) === FALSE){
			redirect('login/admin');
			die();
		}
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->gallery_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Media Galleries';
		$data['gallerys'] = $this->gallery_model->get_gallery(NULL,$page,$data['per_page']);

		$data['view'] = 'gallery/admin/index';
		$this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'page created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Add Media';
	
		$this->form_validation->set_rules('gallery_title', 'Page Title', 'required');
$this->form_validation->set_rules('short_content', 'Short Content', 'required');
$this->form_validation->set_rules('content', 'Content', 'required');
$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->gallery_model->set_gallery();
			redirect('/gallery/admin/create/1');
		}
		
		$data['view'] = 'gallery/admin/create';
		$this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'page View';
		$data['page'] = $this->gallery_model->get_gallery($id);
		if(empty($data['page'])){
			show_404();
		}
		
		$data['view'] = 'gallery/admin/view';
		$this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'page updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['page'] = $this->gallery_model->get_gallery($id);
		if(empty($data['page'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify page';
	
		$this->form_validation->set_rules('gallery_title', 'Page Title', 'required');
$this->form_validation->set_rules('short_content', 'Short Content', 'required');
$this->form_validation->set_rules('content', 'Content', 'required');
$this->form_validation->set_rules('status', 'Status', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->gallery_model->set_gallery($id);
			redirect('/gallery/admin/edit/'.$id.'/1');
		}
		$data['view'] = 'gallery/admin/edit';
		$this->load->view('backend/layout', $data);
	}
	
	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->gallery_model->remove_gallery($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('gallery/admin/');
		}
	}
}
