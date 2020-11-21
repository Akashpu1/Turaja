<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size extends CI_Controller {

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
	// public function index()
	// {
	// 	$data= array();
  //   $data['page'] ='Tags';
	// 	$data['category']=  $this->Common_model->select('category');
	// 	$data['main_content']= $this->load->view('size/add',$data, true);
	// 	$this->load->view('index',$data);
	// }
	public function addsize()
	{
		$data= array();
    	$data['page'] ='Tags';
		$data['category']=  $this->Common_model->select('category');
		$data['chart'] =  $this->Common_model->select('size');
		$data['main_content']= $this->load->view('size/add',$data, true);
		$this->load->view('index',$data);
	}

	public function getId()
	{
		$data= array();
	
    if($_POST){

		  $data['product']=  $this->Common_model->select_product($_POST['id'],'indexing');
			

	 }
     	echo json_encode( $data['product']);
	}


    public function Add()
		{
			if($_POST){
			 $data1=$this->security->xss_clean($_POST);
			 if(isset($_FILES['chart']['name'])){

	 		$config['upload_path']          = './uploads/size_chart';
	 		$config['allowed_types']        = 'gif|jpg|png|jpeg';
	 		$config['max_size']             = 11264;
	 		$config['max_width']            = 6000;
	 		$config['max_height']           = 6000;

	 		$this->load->library('upload', $config);

	 		if($this->upload->do_upload('chart')){
	 			$img=$this->upload->data();
	 			$pic= $img['file_name'];

	 			$config['upload_path']          = './uploads/size_chart';
	 			$config['allowed_types']        = 'gif|jpg|png|jpeg';
	 			$config['max_size']             = 11264;
	 			$config['max_width']            = 6000;
	 			$config['max_height']           = 6000;
	 			$this->load->library('upload', $config);
	 			$this->upload->do_upload('image');
	 			$img1 = $this->upload->data();
	 			$pic1 = $img1['file_name'];

	 		}else{
	 			echo "file not uploaded"; echo $this->upload->display_errors();exit;
	 		}

	 		 }
			 else{
	 			$pic="";
	 			// echo "file not found"; exit;
	 		 }
			$data=[
			'productId' => $data1['product'],
			'text' => $data1['body_text'],
			'chart' => $pic,
			'image' => $pic1,
			'text2'=> $data1['garment_text']
			];

			$this->Common_model->insert($data,'size');

			redirect(base_url() . 'admin/Size/addsize', 'refresh');
			}
		}


		public function notification()
		{
			$data= array();
	        $data['page'] ='Notification';
			$data['notification']=  $this->Common_model->select('notification');
			$data['main_content']= $this->load->view('size/notification',$data, true);
			$this->load->view('index',$data);
		}
		
 public function Delete($id)
	{
            $data1=['id'=> $id];
            $this->Common_model->delete($data1,'size');
            redirect(base_url() . 'admin/Size/addsize', 'refresh');
    }
    public function Edit($id)
	{
		if ($_POST) {
			$data1 = $this->security->xss_clean($_POST);
			if (isset($_FILES['chart']['name'])) {

				$config['upload_path']          = './uploads/size_chart';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 11264;
				$config['max_width']            = 6000;
				$config['max_height']           = 6000;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('chart')) {
					$img = $this->upload->data();
					$pic = $img['file_name'];

					$config['upload_path']          = './uploads/size_chart';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$config['max_size']             = 11264;
					$config['max_width']            = 6000;
					$config['max_height']           = 6000;
					$this->load->library('upload', $config);
					$this->upload->do_upload('image');
					$img1 = $this->upload->data();
					$pic1 = $img1['file_name'];
				} else {
					echo "file not uploaded";
					echo $this->upload->display_errors();
					exit;
				}
			} else {
				$pic = "";
				$pic1="";
				// echo "file not found"; exit;
			} 
			$data = [
				'productId' => $data1['product'],
				'text' => $data1['body_text'],
				'chart' => $pic,
				'image' => $pic1,
				'text2' => $data1['garment_text']
			];

			
           $this->Common_model->update($data,'id',$id, 'size');
			redirect(base_url() . 'admin/Size/addsize', 'refresh');
	}
	}
}
