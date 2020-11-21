<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends CI_Controller {

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
        $data['page'] ='Attribute';
        $data['attribute']=  $this->Common_model->select('attribute');
				
		$data['main_content']= $this->load->view('attribute/add',$data, true);
		$this->load->view('index',$data);
	}
    public function Add()
		{
			if($_POST){
			 $data1=$this->security->xss_clean($_POST);
			$attribute=[
			'name' => $data1['name'],
			
			];
			$this->Common_model->insert($attribute,'attribute');
			redirect(base_url() . 'admin/Attribute', 'refresh');
			}
		}

 public function Delete($id)
	{
            $data1=['id'=> $id];
            $this->Common_model->delete($data1,'attribute');
            redirect(base_url() . 'admin/attribute', 'refresh');
    }
    public function Edit($id)
	{
		if($_POST){
			 $data1=$this->security->xss_clean($_POST);
             $aim=[
            'name' => $data1['name'],
            
        ];
           $this->Common_model->update($aim,'id',$id,'attribute');
			redirect(base_url() . 'admin/attribute', 'refresh');
	}
	}
}
