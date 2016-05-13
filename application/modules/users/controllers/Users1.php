<?php
error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('url');
		$this->load->helper('login/login');
		$method = $this->router->fetch_method();
		//echo is_user_login();
		if(!in_array($method,array('register'))){
			if(is_user_login(FALSE) === FALSE){
				redirect('login/user');
				die();
			}
		}
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->users_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Users';
		$data['users'] = $this->users_model->get_user(NULL,$page,$data['per_page']);

		$data['view'] = 'index';
		$this->load->view('userend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'User created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Register Your Self';
	
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('surname', 'Surname', 'required');
		$this->form_validation->set_rules('guider_contact', 'Guider Contact', 'required');
		$this->form_validation->set_rules('stret_no', 'Stret No', 'required');
		$this->form_validation->set_rules('building_name', 'Building Name', 'required');
		$this->form_validation->set_rules('street', 'Street', 'required');
		$this->form_validation->set_rules('suburb', 'Suburb', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('balance', 'Balance', 'required');
		
		if ($this->form_validation->run() === FALSE){			
		}else{
			$this->users_model->set_user();
			redirect('/users/create/1');
		}

		$data['view'] = 'create';
		$this->load->view('frontend/layout', $data);
	}
	
	public function register(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Register Your Self';
	
		$this->form_validation->set_rules('DecisionBox', 'You must agree to terms and conditions', 'required');		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('surname', 'Surname', 'required');
		$this->form_validation->set_rules('guider_contact', 'Introducer Contact', 'required');

		$this->form_validation->set_rules('scheme_id', 'Scheme Id', 'required|numeric');
		$this->form_validation->set_rules('initial_amount', 'Initial Amount', 'required');

		$this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
		$this->form_validation->set_rules('account_holder', 'Account Holder', 'required');
		$this->form_validation->set_rules('account_number', 'Account Number', 'required');
		$this->form_validation->set_rules('branch_name', 'Branch Name', 'required');
		$this->form_validation->set_rules('branch_code', 'Branch Code', 'required');
		$this->form_validation->set_rules('deposit_method', 'Deposit Method', 'required');

		if ($this->form_validation->run() === FALSE){	
			//$this->session->set_flashdata('error', validation_errors());
		}else{
			$password = rand(324,2342343);

			$user_id = $this->users_model->set_user(NULL,$password);
		
			if($user_id > 0){
				$this->load->model('offers/offers_model');
				$this->offers_model->set_offer($user_id);
				$header = 'test';
				$message = "Your Password ".$password;
				@send_mail($this->input->post('email'),$header,$message);
				$this->session->set_flashdata('message', 'Registered Successfully! please check your mail for further steps');
                  ?>
wait! processing your request...
<script>
setTimeout(function(){
location.href="<?php echo base_url('user/register');?>";
},2000);
</script>
<?php
die();
			}else{
				$this->session->set_flashdata('error', 'Your Email may be already registered with us.');
			}
		        
			redirect('/users/register/');
		}

		$data['view'] = 'register';
		$this->load->view('frontend/layout', $data);
	}
	
	public function bankinfo(){
		$user_id = get_loged_user_id();
		echo 'under construction...';
	}
	
	public function view($user_id = NULL){
		if($user_id == NULL){
			show_404();
		}
		$data['title'] = 'User View';
		$data['user'] = $this->users_model->get_user($user_id);
		if(empty($data['user'])){
			show_404();
		}
		
		$this->load->view('common/header', $data);
		$this->load->view('users/view',$data);
		$this->load->view('common/footer');
	}
		
	public function edit($user_id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'User updated';
		}
		if($user_id == NULL){
			show_404();
		}
		$data['user'] = $this->users_model->get_user($user_id);
		if(empty($data['user'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify User';
	
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('surname', 'Surname', 'required');
		$this->form_validation->set_rules('guider_contact', 'Guider Contact', 'required');
		$this->form_validation->set_rules('stret_no', 'Stret No', 'required');
		$this->form_validation->set_rules('building_name', 'Building Name', 'required');
		$this->form_validation->set_rules('street', 'Street', 'required');
		$this->form_validation->set_rules('suburb', 'Suburb', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('balance', 'Balance', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->users_model->set_user($user_id);
			redirect('/users/edit/'.$user_id.'/1');
		}
		$this->load->view('common/header', $data);
		$this->load->view('users/edit',$data);
		$this->load->view('common/footer');
	}
	
	public function detail(){
		//print_r($this->session->all_userdata()); die;
		$detail = $this->users_model->getDetail();
	
		$data['detail'] = $detail;
		$data['title'] = 'Detail';

		$data['view'] = 'detail';
		$this->load->view('userend/layout', $data);
	}
	
	public function edit_detail(){
		$this->form_validation->set_rules('name', 'First Name', 'required');
		$this->form_validation->set_rules('surname', 'Last Name', 'required');
		$this->form_validation->set_rules('contact', 'Cell Number', 'required');
		$detail = $this->users_model->getDetail();	
		if ($this->form_validation->run() === FALSE){	
			validation_errors();
		}else{
		
			
			$image_name = $this->input->post('image');
			//print_r($image_name); die;
			$data = array();
			if(isset($_FILES)&&$_FILES['file']['error']==0){	
				$imagePath = 'assets/upload/profile';
				$config['upload_path'] = $imagePath;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				$config['file_name'] = time() . date('Ymd');

				if (!$this->upload->do_upload('file')) {
					$error = array('error' => $this->upload->display_errors());
					$this->data['error'] = $error;
				}else{
					$data['file'] = (object) array('upload_data' => $this->upload->data());
					$this->load->library('image_lib');
					$source_path = $data['file']->upload_data['full_path'];
					/* for home Page */
					$new_path='assets/upload/profile/display/'.$data['file']->upload_data['file_name'];
					$this->resize($source_path,'150','150',$new_path);
					$image_name = $data['file']->upload_data['file_name'];
				} 
			}	
			
			$banner = $this->users_model->getDetailedit($image_name);
			//print"<pre>"; print_r($detail); die;
			redirect('users');
		}
		$data['detail'] = $detail;
		$data['title'] = 'Detail';
		$data['view'] = 'detail';
		$this->load->view('userend/layout', $data);
	}
	
	/* get user bank account detail */
	public function bank_detail(){
		$editdetail = $this->users_model->getBankAccountDetail();
		//print"<pre>"; print_r($editdetail); die;
		$data['editdetail'] = $editdetail;
		$data['title'] = 'Bank Detail';
		$data['view'] = 'bank_detail';
		$this->load->view('userend/layout', $data);
	}
	
	/* edit bank detail */
	public function edit_bank(){
                //print"<pre>"; print_r($_POST); die;
		$detail = $this->users_model->getDetail();
		$this->form_validation->set_rules('account_holder', 'Account Holder Name', 'required');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
		$this->form_validation->set_rules('branch_code', 'Branch Code', 'required');
		$this->form_validation->set_rules('account_number', 'Account Number', 'required');
		$this->form_validation->set_rules('branch_name', 'Branch Name', 'required');
		$this->form_validation->set_rules('saveing_current', 'Account Type Saving Or Current', 'required');
		if ($this->form_validation->run() === FALSE){	
			validation_errors();
		}else{
			$editBankDetail = $this->users_model->editBank();
			redirect('users');
		}
		$editdetail = $this->users_model->getBankAccountDetail();
		$data['editdetail'] = $editdetail;
		$data['title'] = 'Bank Detail';
		$data['view'] = 'bank_detail';
		$this->load->view('userend/layout', $data);
	}
	
	/* display profile detail */
	public function profile(){
		$profileDetail = $this->users_model->getProfileDetail();	
		$data['profileDetail'] = $profileDetail;
		$data['title'] = 'Profile';
		$data['view'] = 'profile';
		$this->load->view('userend/layout', $data);
	}
	
	public function remove($user_id = NULL){
		if($user_id== NULL || !is_numeric($user_id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->users_model->remove_user($user_id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('users/');
		}
	}
	
	/* Bit coin */
	public function bitcoin(){
		$bitCoin = $this->users_model->getBitCoin();
	    //print_r($bitCoin); die;
		$data['bitCoin'] = $bitCoin;
		$data['title'] = 'Bit Coin';
		$data['view'] = 'bitcoin';
		$this->load->view('userend/layout', $data);
	}
	
	/* update or insert bitcoin address */
	public function update_bitcoin(){
		$updateBitCoin = $this->users_model->updateBitCoin();
		redirect('users');
	}
	
	/* Reload card */
	public function reload_card(){
		$reloadCard = $this->users_model->getReloadCard();
		$data['reloadCard'] = $reloadCard;
		$data['title'] = 'Reload Card';
		$data['view'] = 'reload_card';
		$this->load->view('userend/layout', $data);
	}
	
	public function update_reloadCard(){
		$updateReloadCard = $this->users_model->updateReloadCard();
		redirect('users');
	}
	
	/* Profile Resize Function */
	public function resize($source_path,$width,$height,$path){
       $config['source_image']     = $source_path;
       $config['maintain_ratio']   = false;
       $config['width']            = $width;
       $config['height']           = $height;   
       $config['new_image']        = $path;
       $this->image_lib->clear();
       $this->image_lib->initialize($config);
       $this->image_lib->resize();
       return true;
    }

}