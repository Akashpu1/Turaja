<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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
    $data['page'] ='Gallery';
    $data['tag']=  $this->Common_model->select('tags');
    $data['image_data']=  $this->Common_model->select('gallery');
		$data['main_content']= $this->load->view('gallery/add',$data, true);
		$this->load->view('index',$data);
	}

public function add()
{
		if ($_POST)
		{
		$config['upload_path']          = './uploads/images';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 11264;
		$config['max_width']            = 3840;
		$config['max_height']           = 2160;

		$this->load->library('upload', $config);
		$this->upload->do_upload('image');
		$img=$this->upload->data();
						 // echo "<pre>";
						 // print_r($img);
						 // exit();
			$pic=$img['file_name'];
			$data=array(
				'image'=>$pic,
			);
			//print_r($data); exit();
		  $this->Common_model->insert($data,'gallery');
			redirect(base_url('admin/Gallery'));
				}
  }


      public function AddTag()
			{
				if($_POST){
			 $data1=$this->security->xss_clean($_POST);
		         $tag=[
		            'title' => $data1['name'],
		        ];
            $this->Common_model->insert($tag,'tags');
			redirect(base_url() . 'admin/category', 'refresh');
				}
			}
 public function Delete($id)
	{
            $data1=['id'=> $id];
            $this->Common_model->delete($data1,'category');
            redirect(base_url() . 'admin/category', 'refresh');
    }
    public function Edit($id)
	{
		if($_POST){
			 $data1=$this->security->xss_clean($_POST);
             $aim=[
            'name' => $data1['name'],
            'parent' => $data1['parent'],
        ];
           $this->Common_model->update($aim,'id',$id,'category');
			redirect(base_url() . 'admin/category', 'refresh');
	}
	}
}
