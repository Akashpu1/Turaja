<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

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
    $data['page'] ='Tags';
    $data['tag']=  $this->Common_model->select('tags');
    $data['tag_data']=  $this->Common_model->select('tags');
		$data['main_content']= $this->load->view('tags/add',$data, true);
		$this->load->view('index',$data);
	}
    public function Add()
		{
			if($_POST){
			 $data1=$this->security->xss_clean($_POST);
			$data=[
			'title' => $data1['title'],

			];
			$this->Common_model->insert($data,'tags');
			redirect(base_url() . 'admin/Tags', 'refresh');
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
            $this->Common_model->delete($data1,'tags');
            redirect(base_url() . 'admin/tags', 'refresh');
    }
    public function Edit($id)
	{
		if($_POST){
			 $data1=$this->security->xss_clean($_POST);
			 $data=[
			 'title' => $data1['title'],

			 ];
           $this->Common_model->update($data,'id',$id,'tags');
			redirect(base_url() . 'admin/Tags', 'refresh');
	}
	}
}
