<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('gallery_model');
		$this->load->helper('url');
		$this->load->helper('login/login');
		if(is_user_login(TRUE) === FALSE){
			redirect('login/admin');
			die();
		}
	}
	
	public function index($page = 0){
		$this->load->library('table');
		$data['total_rows'] = $this->gallery_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Media Galleries';
		$data['gallerys'] = $this->gallery_model->get_gallery(NULL,$page,$data['per_page']);

		$data['view'] = 'gallery/admin/index';
		$this->load->view('backend/layout', $data);
	}
	
	public function create($status = 0){
		if($status == 1){
			$data['message'] = 'page created';
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Add Media';
	
		$this->form_validation->set_rules('gallery_title', 'Page Title', 'required');
$this->form_validation->set_rules('short_content', 'Short Content', 'required');
$this->form_validation->set_rules('content', 'Content', 'required');
$this->form_validation->set_rules('status', 'Status', 'required');
		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->gallery_model->set_gallery();
			redirect('/gallery/admin/create/1');
		}
		
		$data['view'] = 'gallery/admin/create';
		$this->load->view('backend/layout', $data);
	}
	
	public function view($id = NULL){
		if($id == NULL){
			show_404();
		}
		$data['title'] = 'page View';
		$data['page'] = $this->gallery_model->get_gallery($id);
		if(empty($data['page'])){
			show_404();
		}
		
		$data['view'] = 'gallery/admin/view';
		$this->load->view('backend/layout', $data);
	}
	public function gallery($page = 0){
		$data['total_rows'] = $this->gallery_model->get_row_count();
		$data['per_page'] = 5;
		$data['current_page'] = $page;
	
		$data['title'] = 'Media Galleries';
		$data['gallerys'] = $this->gallery_model->get_gallery(NULL,$page,$data['per_page']);

		$this->load->view('gallery', $data);
	}
	public function removeFile(){
		if(isset($_POST['file'])){
			$images = $this->gallery_model->get_byname($this->input->post('file'));
			foreach($images as $image){
				 unlink($image->path);
				 $this->gallery_model->remove_gallery($image->id);
			}
		}
	}
	public function upload(){
		
		
		$upload_path = 'assets/upload/';
		$output = array();
		if(isset($_FILES['files']) AND !empty($_FILES['files'])){
			$file_len = count($_FILES['files']['tmp_name']);
			$output['files'] = array();
			$output['metas'] = array();
			$output['filelen'] = $file_len;
			for($i=0;$i<$file_len;$i++){
				$imageFileType = pathinfo(basename($_FILES["files"]["name"][$i]),PATHINFO_EXTENSION);
				$temp_name = $_FILES['files']['tmp_name'][$i];
				 $check = getimagesize($_FILES["files"]["tmp_name"][$i]);
				if($check !== false) {
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
						$output['error'] = "$imageFileType extension is not allowed";	
					}else{
						$filepath = $upload_path.time().rand(383,939393933).".".$imageFileType;
						if(move_uploaded_file($_FILES["files"]["tmp_name"][$i], $filepath)){
							$data = array(
								'path' => $filepath
							);
							$data['file_name'] = "";
							$data['description'] = "";
							$this->gallery_model->set_gallery(NULL,$data);
							$output['files'][] = $filepath;
							$output['metas'][] = array(
								'date' => date(DATE_RFC2822),
								"extension" => $imageFileType,
								"file"=> $filepath,
								"name"=> basename($_FILES["files"]["name"][$i]),
								"old_name"=> basename($_FILES["files"]["name"][$i]),
								"replaced"=> false,
								"size"=> $check,
								"size2"=> "53.06 KB",
								"type"=> array(
									"image",
									"jpeg"
								)
							);
						}else{
							$output['metas'][] = array(
								'date' => date(DATE_RFC2822),
								"extension" => $imageFileType,
								"file"=> $filepath,
								"name"=> basename($_FILES["files"]["name"][$i]),
								"old_name"=> basename($_FILES["files"]["name"][$i]),
								"replaced"=> false,
								"size"=> $check,
								"size2"=> "53.06 KB",
								"type"=> array(
									"image",
									"jpeg"
								)
							);
							$output['error'] ="error uploading file";
						}
						
					}
				}else{
					$output['error'] = "$check file is not image";
				} 
			}
		}else{
			$output['error'] ="No file received";
		}
		echo json_encode($output);
	}
	public function edit($id= NULL,$status = NULL){
		if($status == 1){
			$data['message'] = 'page updated';
		}
		if($id == NULL){
			show_404();
		}
		$data['page'] = $this->gallery_model->get_gallery($id);
		if(empty($data['page'])){
			show_404();
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Modify page';
	
		$this->form_validation->set_rules('gallery_title', 'Page Title', 'required');
$this->form_validation->set_rules('short_content', 'Short Content', 'required');
$this->form_validation->set_rules('content', 'Content', 'required');
$this->form_validation->set_rules('status', 'Status', 'required');

		
		if ($this->form_validation->run() === FALSE){	
			
		}else{
			$this->gallery_model->set_gallery($id);
			redirect('/gallery/admin/edit/'.$id.'/1');
		}
		$data['view'] = 'gallery/admin/edit';
		$this->load->view('backend/layout', $data);
	}
	
	
	public function remove($id = NULL){
		if($id== NULL || !is_numeric($id)){
			show_404();
		}
		
		$this->load->library('user_agent');
		$url =  $this->agent->referrer();
		$this->gallery_model->remove_gallery($id);
		// return to referrer url if not from other site.
		if (!$this->agent->is_referral() && !empty($url)){
			redirect($url);
		}else{
			redirect('gallery/admin/');
		}
	}
}
