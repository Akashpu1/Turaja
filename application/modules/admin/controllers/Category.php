<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (check()) {
			if (!isAdmin($this->session->userdata('roles')))
				redirect(base_url(), 'refresh');
		} else {
			redirect(base_url(), 'refresh');
		}
		$this->load->model('Common_model');
	}
	public function index()
	{
		$data = array();
		$data['page'] = 'category';
		$data['tag'] =  $this->Common_model->select('tags');
		$data['category'] =  $this->Common_model->select('category');
		$data['aim'] =  $this->Common_model->select('category');
		$data['main_content'] = $this->load->view('category/add', $data, true);
		$this->load->view('index', $data);
	}
	public function Add()
	{
		if ($_POST) {
			$data1 = $this->security->xss_clean($_POST);
			$aim = [
				'name' => $data1['name'],
				'parent' => $data1['parent'],
			];
			$this->Common_model->insert($aim, 'category');
			redirect(base_url() . 'admin/category', 'refresh');
		}
	}

	public function AddTag()
	{
		if ($_POST) {
			$data1 = $this->security->xss_clean($_POST);
			$tag = [
				'title' => $data1['name'],
			];
			$this->Common_model->insert($tag, 'tags');
			redirect(base_url() . 'admin/category', 'refresh');
		}
	}
	public function Delete($id)
	{
		$data1 = ['id' => $id];
		$this->Common_model->delete($data1, 'category');
		redirect(base_url() . 'admin/category', 'refresh');
	}


	public function Edit($id)
	{
		if ($_POST) {
			


			$config['upload_path']          = './uploads/cat';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 6000;
			$config['max_height']           = 6000;


			$this->load->library('upload', $config);
			$data = array('upload_data' => $this->upload->data());
			$image =  $data['upload_data']['file_name'];
			$data1 = $this->security->xss_clean($_POST);

			if ($this->upload->do_upload('images')) {
				$error = array('error' => $this->upload->display_errors());

				pre($error);
				exit;
				// $this->load->view('upload_form', $error);
			} 
				
        //  $image = $id;
		// 		pre($image);
		// 		exit;
			    elseif(!$image==null){
				
				$aim = [
					'name' => $data1['name'],
					'parent' => $data1['parent'],
					'images' => $image,
				];}
				else{
					
				$aim = [
					'name' => $data1['name'],
					'parent' => $data1['parent']
				];
				}
				$this->Common_model->update($aim, 'id', $id, 'category');

				redirect(base_url() . 'admin/category', 'refresh');

				// $this->load->view('upload_success', $data);
			//}
		}
	}
}
