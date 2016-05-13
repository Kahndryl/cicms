<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model{
	 public function __construct(){
		$this->load->database();
	 }
	 
	  public function get_user_email($email){
		$query = $this->db->get_where('users',array('email' => $email));
		//echo $this->db->last_query();die();
		return $query->first_row();
	 }
	 
	 public function get_user($user_id = NULL,$page = 0, $limit = 10){
		if($user_id == NULL){
			// return all users
			$from = $limit*$page;
			$query = $this->db->get('users',$limit,$from);
			return $query->result();
		}
		// return user with user_id
		$query = $this->db->get_where('users',array('user_id' => $user_id));
		return $query->first_row();
	 }
	 
	 public function get_row_count(){
		return $this->db->count_all('users');
	 }
	
	 
	public function set_user($user_id = NULL,$password = -1){
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get('users');
		
		$data = array(
			'name' => $this->input->post('firstname').' '.$this->input->post('surname'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'firstname' => $this->input->post('firstname'),
			'surname' => $this->input->post('surname'),
			'guider_contact' => $this->input->post('guider_contact'),
			'stret_no' => $this->input->post('stret_no'),
			'building_name' => $this->input->post('building_name'),
			'street' => $this->input->post('street'),
			'suburb' => $this->input->post('suburb'),
			'city' => $this->input->post('city'),
			'country' => $this->input->post('country'),
			'balance' => $this->input->post('balance'),

		);

		if($password != -1){
			$data['password'] = md5($password);
		}
		if($user_id == NULL){
			// need to create entery
			if($query->num_rows() <= 0){
				$this->db->insert('users', $data);
				return $this->db->insert_id();
			}
			return FALSE;
		}
		// need to update entery
		$this->db->where('user_id',$user_id);
		return $this->db->update('users', $data);
	}

	/* get login user detail */
	public function getDetail(){
		$this->db->select('*');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->get('users')->row();
	}
	
	/* user detail */
	public function getDetailedit($image_name=false){
		if($image_name !=''){
			$data = array(
				'name' 	=> $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'contact' => $this->input->post('contact'),			
				'guider_contact' => $this->input->post('guider_contact'),
				'stret_no' => $this->input->post('stret_no'),
				'building_name' => $this->input->post('building_name'),
				'street' => $this->input->post('street'),
				'suburb' => $this->input->post('suburb'),
				'city' => $this->input->post('city'),
				'country' => $this->input->post('country'),
				'image'  => $image_name,
			);
		}else{
			$data = array(
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'contact' => $this->input->post('contact'),			
				'guider_contact' => $this->input->post('guider_contact'),
				'stret_no' => $this->input->post('stret_no'),
				'building_name' => $this->input->post('building_name'),
				'street' => $this->input->post('street'),
				'suburb' => $this->input->post('suburb'),
				'city' => $this->input->post('city'),
				'country' => $this->input->post('country'),
			);
		}
		//print"<pre>"; print_r($data);die;
		$this->db->where('user_id',$this->session->userdata('user_id'));
		return $this->db->update('users', $data);
	}
	
	public function getBankAccountDetail(){
		$this->db->select('*');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->get('bank_info')->row();
	}
	
	public function editBank(){
		$acc_info = $this->getBankAccountDetail();
		if($acc_info->user_id ==''){
			$data = array(
                                'user_id'      => $this->session->userdata('user_id'),
				'account_holder' => $this->input->post('account_holder'),
				'bank_name' => $this->input->post('bank_name'),
				'account_number' => $this->input->post('account_number'),			
				'branch_code' => $this->input->post('branch_code'),
				'branch_name' => $this->input->post('branch_name'),
				'saveing_current' => $this->input->post('saveing_current'),
			);
			return $this->db->insert('bank_info', $data);
		}else{
		$data = array(
			'account_holder' => $this->input->post('account_holder'),
			'bank_name' => $this->input->post('bank_name'),
			'account_number' => $this->input->post('account_number'),			
			'branch_code' => $this->input->post('branch_code'),
			'branch_name' => $this->input->post('branch_name'),
			'saveing_current' => $this->input->post('saveing_current'),
		);
		$this->db->where('user_id',$this->session->userdata('user_id'));
		return $this->db->update('bank_info', $data);
		}
	}
	
	public function remove_user($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->delete('users');
	}
	 
	/* display profile */
	/* get login user detail */
	public function getProfileDetail(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('users.user_id', $this->session->userdata('user_id'));
		$this->db->join('offers', 'offers.user_id = users.user_id');
		$this->db->order_by('offers.created_on', 'asc');
		return $this->db->get()->row();
	}
	
	/* Get bit coin */
	public function getBitCoin(){
		
		//print"<pre>"; print_r($this->session->all_userdata()); die;
		$this->db->select('*');
		$this->db->from('tbl_bitcoin');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->get()->row();
	}
	
	public function updateBitCoin(){
		$checkUserId = $this->getBitCoin();
		//print"<pre>"; print_r($checkUserId->user_id); die;
		if($checkUserId->user_id ==''){
			$data = array(
				'user_id'         => $this->session->userdata('user_id'),
				'bitcoin_address' => $this->input->post('bitcoin_address'),
				'send_btc' 		  => $this->input->post('send_btc'),
				'receive_btc'     => $this->input->post('receive_btc'),	
				'created_on'	  => date('Y:m:d H:i:s'),
			);
			return $this->db->insert('tbl_bitcoin', $data);
		}
		else{
			$data = array(
				'bitcoin_address' => $this->input->post('bitcoin_address'),
				'send_btc' 		  => $this->input->post('send_btc'),
				'receive_btc' 	  => $this->input->post('receive_btc'),	
				'updated_on'      => date('Y:m:d H:i:s')
			);
			$this->db->where('user_id',$this->session->userdata('user_id'));
			return $this->db->update('tbl_bitcoin', $data);
		}
		
	}
	
	/* Reload Card */
	
	public function getReloadCard(){
		//print"<pre>"; print_r($this->session->all_userdata()); die;
		$this->db->select('*');
		$this->db->from('tbl_reload_card');
		$this->db->where('user_id', $this->session->userdata('user_id'));
		return $this->db->get()->row();
	}
	
	public function updateReloadCard(){
		$checkUserId = $this->getReloadCard();
		//print"<pre>"; print_r($checkUserId->user_id); die;
		if($checkUserId->user_id ==''){
			$data = array(
				'user_id'         => $this->session->userdata('user_id'),
				'card_no' 		  => $this->input->post('card_no'),
				'receive_card'     => $this->input->post('receive_card'),	
				'created_on'	  => date('Y:m:d H:i:s'),
			);
			return $this->db->insert('tbl_reload_card', $data);
		}
		else{
			$data = array(
				'card_no' => $this->input->post('card_no'),
				'receive_card' 		  => $this->input->post('receive_card'),
				'updated_on'      => date('Y:m:d H:i:s')
			);
			$this->db->where('user_id',$this->session->userdata('user_id'));
			return $this->db->update('tbl_reload_card', $data);
		}
		
	}
	
}