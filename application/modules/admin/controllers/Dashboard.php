<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


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
			$this->load->model('Product_model');
			$this->load->model('Contact_model');
  }
	public function index()
	{
		$data= array();
		$data['page'] ='Dashboard';
		$data['newOrder']=  $this->Product_model->newAllOrder();
		$data['pending']=  $this->Product_model->pending();
		$data['accepted']=  $this->Product_model->accepted();
		$data['cancle']=  $this->Product_model->cancle();
		$data['totalOrder']=  $this->Product_model->totalOrder();
		$data['new_contact']=  $this->Contact_model->newcontact('contact','status','New');
		$data['new_customer']=  $this->Contact_model->newcustomer('customers');
		$data['orderlimit']= $this->Product_model->getLimitOrder();
	  $data['contact_data']= $this->Contact_model->contact_list('contact');
		$data['main_content']= $this->load->view('home',$data, true);
		$this->load->view('index',$data);
	}


}
