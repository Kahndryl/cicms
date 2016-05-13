<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/login_model');
		$this->load->helper('url');
		$this->load->helper('login/login');
		$method = $this->router->fetch_method();
		//echo is_user_login();
		if(is_user_login(TRUE) === FALSE){
			redirect('login/admin');
			die();
		}
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->login_model->get_row_count();
		$data['per_page'] = 1;
		$data['current_page'] = $page;
	
		$data['title'] = 'Admin List';
		$data['tbl_login'] = array();
		$data['view'] = 'index';
		$this->load->view('backend/layout', $data);
	}
	public function ajaxlist(){
		$request = $_REQUEST;
		$page = 0;
		$per_page = 10;
		$search_string = '';
		if ( isset($request['start']) && count($request['start']) ) {
			$page = $request['start'];
		}
		if ( isset($request['length']) && count($request['length']) ) {
			$per_page = $request['length'];
		}
		if ( isset($request['search']['value']) && count($request['search']['value']) ) {
			$search_string = $request['search']['value'];
		}
		$search = array(
			'firstname' => $search_string,
			'lastname' => $search_string,
		);
		$this->load->library('table');
		
		$data['data'] = $this->login_model->get_tbl_login(NULL,$page,$per_page,$search);
		$records = $data['data'];
		$data['data'] = array();
		$data['recordsTotal'] = $this->login_model->get_row_count();
		$data['recordsFiltered'] = $per_page;
		foreach($records as $record){
			$links = anchor('admin/view/'.$record->user_id,'view',array('title'=>'View admin','class'=>'btn btn-sm btn-success'));
				$links .= ' | '.anchor('admin/edit/'.$record->user_id,'edit',array('title'=>'Edit admin','class'=>'btn btn-sm btn-warning'));
				$links .= ' | '.anchor('admin/remove/'.$record->user_id,'remove',array('title'=>'Remove admin','class'=>'btn btn-sm btn-danger'));
			$data['data'][] = array(
				$record->firstname,
				$record->lastname,
				$record->email,
				$record->date_created,
				$links
			);
		}
		echo json_encode($data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'Tbl_login created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Admin Create';
	
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->login_model->set_tbl_login();
			redirect('/admin/create/1');
		}
		
		$data['view'] = 'create';
		$this->load->view('backend/layout', $data);
	}
	
	public function view($user_id = NULL){
		if($user_id == NULL){
			show_404();
		}
		$data['title'] = 'Admin View';
		$data['tbl_login'] = $this->login_model->get_tbl_login($user_id);
		if(empty($data['tbl_login'])){
			show_404();
		}
		
		$data['view'] = 'view';
		$this->load->view('backend/layout', $data);
	}
		
	public function edit($user_id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'Admin updated';
		}
		if($user_id == NULL){
			show_404();
		}
		$data['tbl_login'] = $this->login_model->get_tbl_login($user_id);
		if(empty($data['tbl_login'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify Tbl_login';
	
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->login_model->set_tbl_login($user_id);
			redirect('/admin/edit/'.$user_id.'/1');
		}
		$data['view'] = 'edit';
		$this->load->view('backend/layout', $data);
	}
	
	
	public function remove($user_id = NULL){
		if($user_id== NULL || !is_numeric($user_id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->login_model->remove_tbl_login($user_id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('admin/');
		}
	}
}
