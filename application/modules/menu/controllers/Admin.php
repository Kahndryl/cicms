<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('menu_model');
		$this->load->helper('url');
		$this->load->helper('login/login');
		if(is_user_login(TRUE) === FALSE){
			redirect('login/admin');
			die();
		}
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->menu_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Menu';
		$data['menu'] = $this->menu_model->get_menu(NULL,$page,$data['per_page']);
         $data['view'] = 'menu/admin/index';
		$this->load->view('backend/layout', $data);
	
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Menu created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Create Menu';
	
		$this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('link', 'Link', 'required');
$this->form_validation->set_rules('parent_id', 'Parent Id', 'required');
$this->form_validation->set_rules('order', 'Order', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->menu_model->set_menu();
			redirect('/menu/admin/create/1');
		}
		
		 $data['view'] = 'menu/admin/create';
		$this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'Menu View';
		$data['menu'] = $this->menu_model->get_menu($id);
		if(empty($data['menu'])){
			show_404();
		}
		 $data['view'] = 'menu/admin/view';
		$this->load->view('backend/layout', $data);
	}
		
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Menu updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['menu'] = $this->menu_model->get_menu($id);
		if(empty($data['menu'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Menu';
	
		$this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('link', 'Link', 'required');
$this->form_validation->set_rules('parent_id', 'Parent Id', 'required');
$this->form_validation->set_rules('order', 'Order', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->menu_model->set_menu($id);
			redirect('/menu/admin/edit/'.$id.'/1');
		}
	 $data['view'] = 'menu/admin/edit';
		$this->load->view('backend/layout', $data);
	}
	
	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->menu_model->remove_menu($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('menu/');
		}
	}
}