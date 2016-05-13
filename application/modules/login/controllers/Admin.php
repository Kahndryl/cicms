<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/login_model');
		$this->load->helper('url');
		$this->load->helper('login');
		$this->load->helper('form');
	
	}

	public function index(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$data = array();
		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$records = $this->login_model->get_admin_email($this->input->post('email'));
			if(!empty($records)){
				if($records->password == md5($this->input->post('password'))){
					start_session($records->user_id,$records->email,TRUE);
					redirect('admin');
				}else{
					$data['message'] = 'Wrong Credential!';
				}
			}else{
				$data['message'] = 'Wrong Credential!';
			}
	
		}
		$this->load->view('login/admin', $data);
	}

	public function logout(){
		remove_session();
		redirect('login/admin');
	}

}