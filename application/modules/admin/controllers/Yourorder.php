<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yourorder extends CI_Controller {

	public function __construct()
	{
			parent::__construct();

			$this->load->model('Common_model');
			$this->load->model('Yourorder_model');
	}

	public function index()
	   {
		     $data= array();
         $data['page'] = 'Your order';
         $data['order_data']=  $this->Yourorder_model->getuserorder();
         if($data['order_data']){
         foreach($data['order_data'] as $value){
         $data['order_data']=$value;
         }
       // print_r($data['order_data']);exit;
          $data['order_item']=  $this->Yourorder_model->orderItems();

          }
		      $data['main_content']= $this->load->view('yourorder/yourOrder',$data, true);
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
					// echo $data['product_data']['status'];exit;
					if($data['order_data']['status']==1)
					{
						$data1=[
						'status'=>'0'
					];
					}
				 $this->Common_model->update($data1,'id',$id,'orders');
					redirect(base_url() . 'admin/order', 'refresh');
			}


}
