<?php


	function start_session($user_id,$user_email,$admin = FALSE){
		$hash = md5($user_id.ADMIN_KEY);
		if($admin !== FALSE){
			$hash = md5($user_id.USER_KEY);
		}
		$session = array(
			'session_id' => $hash,
			'user_id' => $user_id,
			'user_email' => $user_email
		);
		$ci =& get_instance();
		$ci->session->set_userdata($session);
	}

	function is_user_login($admin = FALSE){
		$ci =& get_instance();
		$session = $ci->session->all_userdata();
		if(empty($session)){
			return FALSE;
		}
		if(!isset($session['user_id'])){
			return FALSE;
		}
		$hash = md5($session['user_id'].USER_KEY);
		if($admin === FALSE){
			$hash = md5($session['user_id'].ADMIN_KEY);
		}
	
		if($hash == $session['session_id']){
			return TRUE;
		}
		return FALSE;
	}

	function remove_session(){
		
		$ci =& get_instance();
		
		$ci->session->sess_destroy();
	}

	function get_loged_user_email(){
		$ci =& get_instance();
		$session = $ci->session->all_userdata();
		if(!isset($session['user_email'])){
			return FALSE;
		}
		return $session['user_email'];
	}
	function get_loged_user_id(){
		$ci =& get_instance();
		$session = $ci->session->all_userdata();
		if(!isset($session['user_id'])){
			return FALSE;
		}
		
		return $session['user_id'];
	}
?>