<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('users/users_model');
		$this->load->helper('url');
		$this->load->helper('login');
		$this->load->helper('form');
	
	}

	public function index(){
		$this->form_validation->set_rules('contact', 'Mobile', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$data = array();
		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$records = $this->users_model->get_user_email($this->input->post('contact'));
			if(!empty($records)){
				if($records->password == md5($this->input->post('password'))){
					start_session($records->user_id,$records->email,FALSE);
					redirect('offers/user');
				}else{
					$data['message'] = 'Wrong Credential!';
				}
			}else{
				$data['message'] = 'Wrong Credential!';
			}
	
		}
		$this->load->view('login/user', $data);
	}

	public function logout(){
		remove_session();
		redirect('login/user');
	}

}