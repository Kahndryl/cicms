<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->helper('url');
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->admin_model->get_row_count();
		$data['per_page'] = 100;
		$data['current_page'] = $page;
	
		$data['title'] = 'Users';
		$data['users'] = $this->admin_model->get_user(NULL,$page,$data['per_page']);

		$data['view'] = 'users/admin/index';
		$this->load->view('backend/layout', $data);
	}
	
	public function list_ajax($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->admin_model->get_row_count();
		$data['per_page'] = 100;

		$data['users'] = $this->admin_model->get_user(NULL,$page,$data['per_page']);
		$this->load->view('users/admin/list_ajax', $data);
	}
	
	public function view($user_id = NULL){
		if($user_id == NULL){
			show_404();
		}
		$data['title'] = 'User View';
		$data['user'] = (array)$this->admin_model->get_user($user_id);
		
		$result = (array)$this->admin_model->getBankAccountDetail($user_id);
		$data['user'] = (object)array_merge($data['user'],$result);
		//print_r($data['user']);die;
		if(empty($data['user'])){
			show_404();
		}
		
		$data['view'] = 'users/admin/view';
		$this->load->view('backend/layout', $data);
	}
		
	public function edit($user_id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'User updated';
		}
		if($user_id == NULL){
			show_404();
		}
		$data['user'] = $this->admin_model->get_user($user_id);
		if(empty($data['user'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify User';
	
		$this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('contact', 'Contact', 'required');


		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->admin_model->set_user($user_id);
			redirect('/users/admin/edit/'.$user_id.'/1');
		}
		
		$data['view'] = 'users/admin/edit';
		$this->load->view('backend/layout', $data);
	}
	
	
	public function remove($user_id = NULL){
		if($user_id== NULL || !is_numeric($user_id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->admin_model->remove_user($user_id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('admin/');
		}
	}
	
	
	public function is_manager(){
		
		$user_id = (isset($_GET['user_id'])?$_GET['user_id']:'X');
		$value =  (isset($_GET['value'])?$_GET['value']:'X');
		//$reason = 11;
		if($value == 1){
			 $this->admin_model->update_manager($user_id,$value);
		
		}
		else{
			$this->admin_model->update_manager($user_id,$value);
		}
		/* 
		wait changing status...
		<script>
		
			setTimeout(function(){
				location.href="<?php echo base_url('users/admin?st='.$reason);?>";
			},2000);
			
		</script>
		*/ 
		redirect('users/admin');
    }
}
