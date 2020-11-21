<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller {

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
        $data['page'] ='New Letter';
        $data['letter']=  $this->Common_model->select('news_letter');
        
	    	$data['main_content']= $this->load->view('letter/add',$data, true);
	    	$this->load->view('index',$data);
	}
	public function Delete($id)
			{
		      $data1=['id'=> $id];
		      $this->Common_model->delete($data1,'news_letter');
		      redirect(base_url() . 'admin/newsletter/', 'refresh');
		    }
    
}
