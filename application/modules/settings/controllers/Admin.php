<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('settings_model');
		$this->load->helper('url');
		$this->load->helper('login/login');
		if(is_user_login(TRUE) === FALSE){
			redirect('login/admin');
			die();
		}
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->settings_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Settings';
		$data['settings'] = $this->settings_model->get_setting(NULL,$page,$data['per_page']);

		$data['view'] = 'settings/admin/index';
		$this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Setting created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Setting';
	
		$this->form_validation->set_rules('title', 'Title', 'required');
$this->form_validation->set_rules('image', 'Image', 'required');
$this->form_validation->set_rules('Is_active', 'Is Active', 'required');
$this->form_validation->set_rules('description', 'Description', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->settings_model->set_setting();
			redirect('/settings/create/1');
		}
		
		$data['view'] = 'settings/admin/create';
		$this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Setting View';
		$data['setting'] = $this->settings_model->get_setting($id);
		if(empty($data['setting'])){
			show_404();
		}
		
		$data['view'] = 'settings/admin/view';
		$this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Setting updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['setting'] = $this->settings_model->get_setting($id);
		if(empty($data['setting'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Setting';
	
		$this->form_validation->set_rules('title', 'Title', 'required');
$this->form_validation->set_rules('image', 'Image', 'required');
$this->form_validation->set_rules('Is_active', 'Is Active', 'required');
$this->form_validation->set_rules('description', 'Description', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->settings_model->set_setting($id);
			redirect('/settings/edit/'.$id.'/1');
		}
		$data['view'] = 'settings/admin/edit';
		$this->load->view('backend/layout', $data);
	}
	
	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->settings_model->remove_setting($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('settings/');
		}
	}
}