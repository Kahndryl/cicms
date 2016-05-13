<?php

function get_user_name($user_id = -1){
	$ci = & get_instance();
	$sql = "SELECT firstname FROM users WHERE user_id = ".$user_id;
	$query = $ci->db->query($sql);
	$result = $query->row();
	if(empty($result)){
		return '';
	}
	return $result->firstname;
}

function get_user_profile($user_id = -1){
	$ci = & get_instance();
	$sql = "SELECT image FROM users WHERE user_id = ".$user_id;
	$query = $ci->db->query($sql);
	$result = $query->row();
	if(empty($result)){
		return base_url('assets/admin/images/wo.jpg');
	}
	return base_url('assets/upload/profile/display/'.$result->image);
}

function get_user_balance($user_id = -1){
	$ci = & get_instance();
	$sql = "SELECT balance FROM users WHERE user_id = ".$user_id;
	$query = $ci->db->query($sql);
	$result = $query->row();
	if(empty($result) OR $result->balance == NULL){
		return 0;
	}
	return $result->balance;
}

function get_user_help_received($user_id = -1){
	$ci = & get_instance();
	$sql = "SELECT SUM(amount) as amount FROM withdrawls WHERE user_id = ".$user_id." AND status = 1";
	$query = $ci->db->query($sql);
	$result = $query->row();
	if(empty($result)){
		return 0;
	}
	return $result->amount;
	
}

function get_user_offer_help_received($user_id = -1){
	$ci = & get_instance();
	$sql = "SELECT SUM(initial_amount) as initial_amount FROM offers WHERE user_id = ".$user_id." AND status = 1";
	$query = $ci->db->query($sql);
	$result = $query->row();
	if(empty($result)){
		return 0;
	}
	return $result->initial_amount;
	
}

function get_user_contact($user_id = -1){
	$ci = & get_instance();
	$sql = "SELECT contact	FROM users WHERE user_id = ".$user_id;
	$query = $ci->db->query($sql);
	$result = $query->row();
	if(empty($result)){
		return 0;
	}
	return $result->contact;
}

