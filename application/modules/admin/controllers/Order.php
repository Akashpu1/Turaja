<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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
	}

	public function index()
	   {
		    $data= array();
        $data['page'] ='order';
        $data['tag']=  $this->Common_model->select('tags');
        $data['order_data']=  $this->Product_model->getAllOrder();
				// echo "<pre>";
				// print_r($data['order_data']);exit;
		    $data['main_content']= $this->load->view('order/order_list',$data, true);
		    $this->load->view('index',$data);
	  }

	public function invoice($id)
	{
		    $data= array();
        $data['page'] ='invoice';
        $data['order_data']=  $this->Product_model->invoice($id);
				foreach($data['order_data'] as $value){
				$data['order_data']=$value;
				}
			//	print_r($data['order_data']);exit;
				$data['allorder_data'] =  $this->Product_model->invoiceOrder($id);
				// pre($data['allorder_data']);exit;
				$data['main_content'] = $this->load->view('order/invoice',$data, true);
 	      $this->load->view('index',$data);
	}


    public function Delete($id)
      	{
            $data1=['id'=> $id];
            $this->Common_model->delete($data1,'orders');
            redirect(base_url() . 'admin/order', 'refresh');
       }


		 public function update_status1($id)
			 {

					$data['order_data']=  $this->Product_model->select_product($id,'orders');
					foreach($data['order_data'] as $value){
					$data['order_data']=$value;
					}
					  //pre($data['order_data']);exit;

					if($data['order_data']['status']==1)
					{
						$data1=[
						'status'=>'2'
					];

					}
				 $this->Common_model->update($data1,'id',$id,'orders');
					redirect(base_url() . 'admin/order', 'refresh');
			}



			public function update_status2($id)
				{
						$data['order_data']=  $this->Product_model->select_product($id,'orders');
						foreach($data['order_data'] as $value){
						$data['order_data']=$value;
						}
						// echo $data['product_data']['status'];exit;
						if($data['order_data']['status']==2)
						{
							$data1=[
							'status'=>'3'
						];
						}
					 $this->Common_model->update($data1,'id',$id,'orders');
						redirect(base_url() . 'admin/order', 'refresh');
				}

				public function update_status3($id)
					{

							$data['order_data']=  $this->Product_model->select_product($id,'orders');
							foreach($data['order_data'] as $value){
							$data['order_data']=$value;
							}
							// echo $data['product_data']['status'];exit;
							if($data['order_data']['status']==3)
							{
								$data1=[
								'status'=>'4'
							];
							}
						 $this->Common_model->update($data1,'id',$id,'orders');
							redirect(base_url() . 'admin/order', 'refresh');
					}


}
