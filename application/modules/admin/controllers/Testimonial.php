<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			if(check()){
				if(!isAdmin($this->session->userdata('roles')))
					redirect(base_url(), 'refresh');
      }else{
				 	redirect(base_url(), 'refresh');
			}
			$this->load->model('Common_model');
	}
	public function index()
	{
		$data= array();
    $data['page'] ='Testimonial';
    $data['tag']=  $this->Common_model->select('tags');
    $data['testimonial_data']=  $this->Common_model->select('testimonial');
		$data['main_content']= $this->load->view('testimonial/add',$data, true);
		$this->load->view('index',$data);
	}
    public function Add()
		{
			if($_POST){
			 $data1=$this->security->xss_clean($_POST);
			 if(isset($_FILES['profile']['name'])){
				$config['upload_path']          = './uploads/testimonial';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 11264;
				$config['max_width']            = 6000;
				$config['max_height']           = 6000;

			$this->load->library('upload', $config);

			if($this->upload->do_upload('profile')){
				$img=$this->upload->data();
							 // echo "<pre>";
							 // print_r($img);
							 // exit();
				$pic=$img['file_name'];
			//	echo $pic;exit;
			}else{
				echo "file not uploaded"; echo $this->upload->display_errors();exit;
			}

			 }else{
				$pic="";
				echo "file not found"; exit;
			 }

			$data=[
			'name' => $data1['name'],
			'discription' => $data1['discription'],
			'image' => $pic,
			'ratting' => $data1['ratting']

			];
			$this->Common_model->insert($data,'testimonial');
			redirect(base_url() . 'admin/Testimonial', 'refresh');
			}
		}


			public function Delete($id)
			 {
			    $data1=['id'=> $id];
			    $this->Common_model->delete($data1,'testimonial');
			    redirect(base_url() . 'admin/Testimonial', 'refresh');
			  }

    public function Edit($id)
   	{
		if($_POST){

			$data1=$this->security->xss_clean($_POST);

			if(isset($_FILES['profile']['name'])){
			 $config['upload_path']          = './uploads/testimonial';
			 $config['allowed_types']        = 'gif|jpg|png|jpeg';
			 $config['max_size']             = 11264;
			 $config['max_width']            = 6000;
			 $config['max_height']           = 6000;

		 $this->load->library('upload', $config);

		 if($this->upload->do_upload('profile')){
				 $img=$this->upload->data();
							// echo "<pre>";
							// print_r($img);
							// exit();
			 $pic=$img['file_name'];
		 
		 }else{
			 echo "file not uploaded"; echo $this->upload->display_errors();exit;
		 }

			}else{
				$pic="";
				$data=[
				'name' => $data1['name'],
				'discription' => $data1['discription'],

				];
				 $this->Common_model->update($data,'id',$id,'testimonial');
				 	redirect(base_url() . 'admin/Testimonial', 'refresh');
			}

			 $data=[
			 'name' => $data1['name'],
			 'discription' => $data1['discription'],
			 'image' => $pic,

			 ];

       $this->Common_model->update($data,'id',$id,'testimonial');
			redirect(base_url() . 'admin/Testimonial', 'refresh');
	}
	}

}
