<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('page_model');
		$this->load->helper('url');
	}
	
	public function index(){
		$data = array();
		$this->load->view('frontend/home', $data);
	}
	public function view($slug = NULL){
		if($slug == NULL){
			show_404();
		}
		if($this->page_model->page_exist($slug) === FALSE){
			show_404();
		}
		$data = array();
		$data['content'] = $this->page_model->get_page_by_slug($slug);

		$data['title'] = $data['content']->page_title;

		$this->load->view('frontend/layout', $data);
	}

	public function show_404(){
		$data['title'] = '404 Page Not Found';
		$this->load->view('frontend/404', $data);
	}
	
	
}