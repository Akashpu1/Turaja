<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
    $data['page'] ='Products';
    $data['tag']=  $this->Common_model->select('tags');
    $data['product_data']=  $this->Common_model->select('products');
		$data['attribute']=  $this->Common_model->select('attribute');
    $data['main_content']= $this->load->view('product/list',$data, true);
		$this->load->view('index',$data);
	}

	public function product_details($id)
	{
		$data= array();
		$data['page'] ='Products';
		$data['tag']=  $this->Product_model->select_tag($id,'tag');
		$data['category']=  $this->Product_model->select_cat($id,'category');
		$data['tag_data']=  $this->Common_model->select('tags');
		$data['attribute_data']=  $this->Common_model->select('attribute');
		$data['category_data']=  $this->Common_model->select('category');
		$data['tag_data']=  $this->Common_model->select('tags');
		$data['product_data']=  $this->Product_model->select_product($id,'products');
		$data['gstValue']=  $this->Common_model->select('gst');
		// echo "<pre>";
		// print_r($data['gstValue']);exit;
		$data['attribute']=  $this->Product_model->select_attr($id,'product_attributes');
		$data['pics']=  $this->Product_model->select($id,'product_images');
		$data['pro_id'] =$id;
		//echo print_r(	$data['attribute']);exit;
		$data['main_content']= $this->load->view('product/edit',$data, true);
		$this->load->view('index',$data);
	}

	public function attribute()
	{
		$data= array();
		$data['page'] ='attribute';
		$data['attribute']=  $this->Common_model->select('attribute');
		$data['tag']=  $this->Common_model->select('tags');
		$data['craft']=  $this->Common_model->select('craft');
		$data['gstValue']=  $this->Common_model->select('gst');
		$data['category']=  $this->Common_model->select('category');
		$data['main_content']= $this->load->view('product/add_attribute',$data, true);
		$this->load->view('index',$data);
	}


	public function Add_attribute()
	{
		 if($_POST){
		 $data1=$this->security->xss_clean($_POST);

		if(isset($_FILES['profile']['name'])){
		$config['upload_path']          = './uploads/product';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 11264;
		$config['max_width']            = 6000;
		$config['max_height']           = 6000;

		$this->load->library('upload', $config);

		if($this->upload->do_upload('profile')){
			$img=$this->upload->data();
			$pic= $img['file_name'];
			$config['upload_path']          = './uploads/product';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 11264;
			$config['max_width']            = 6000;
			$config['max_height']           = 6000;
			$this->load->library('upload', $config);
			$this->upload->do_upload('profile1');
			$img1 = $this->upload->data();
			$pic1 = $img1['file_name'];

		}else{
			echo "file not uploaded"; echo $this->upload->display_errors();exit;
		}

		 }else{
			$pic="";
			echo "file not found"; exit;
		 }
            $masurment = implode(" ",$data1['masurment']);
			$shopthelook = !empty($data1['shopthelook']) ? json_encode($data1['shopthelook']) : null;
			$data=[ 'name' => $data1['product'],
			'description' => $data1['desc'],
			'price' => $data1['price'],
			'quantity' => $data1['quantity'],
			'discount' => $data1['discount'],
			'inrgst' => $data1['inrgst'],
			'profile_pic' => $pic,
			'profile_pic1' => $pic1,
			'craft' => $data1['craft'],
	   	    'care' => $data1['care'],
		    'usd' => $data1['usd'],
		    'usdgst' => $data1['usdgst'],
			'product_code' => $data1['product_code'],
            'masurment' => $masurment,
            'shopthelook' => $shopthelook,
			'category' => $data1['category'],
		];

		  $id=$this->Common_model->insert($data,'products');
			if($id){
			if(isset($data1['category'])){

			 $this->Common_model->indexing($data1['category'], $id);
			}
		 //add attributes
				if(isset($data1['attribute']) && count($data1['attribute'])>0)
				{
							for($i = 0; $i < count($data1['attribute']); $i++){
								$data=[
	  							'product_id' => $id,
									'attribute_id' => $data1['attribute'][$i],
									'value' => $data1['value'][$i]

										];
									$this->Common_model->insert($data,'product_attributes');
								}

								// add product images
				if(isset($_FILES['pics']['name'])){
				// Count total files
     					 $countfiles = count($_FILES['pics']['name']);

     			 	// Looping all files
     			 	for($i=0;$i<$countfiles;$i++){

       					if(!empty($_FILES['pics']['name'][$i])){

        				  // Define new $_FILES array - $_FILES['file']
         					 $_FILES['file']['name'] = $_FILES['pics']['name'][$i];
         					 $_FILES['file']['type'] = $_FILES['pics']['type'][$i];
         					 $_FILES['file']['tmp_name'] = $_FILES['pics']['tmp_name'][$i];
							     $_FILES['file']['error'] = $_FILES['pics']['error'][$i];
         					 $_FILES['file']['size'] = $_FILES['pics']['size'][$i];

         					 // Set preference
         						 $config['upload_path'] = './uploads/product';
         						 $config['allowed_types'] = 'jpg|jpeg|png|gif';
         						 $config['max_size'] = '5000'; // max_size in kb
         						 $config['file_name'] = $_FILES['pics']['name'][$i];

         					 //Load upload library
         					 $this->load->library('upload',$config);

         					 // File upload
         				 if($this->upload->do_upload('file')){
         			   		// Get data about the file
         			 $uploadData = $this->upload->data();
          		 $filename = $uploadData['file_name'];
							 $data = array();
							 // Initialize array
							 $data['product_id'] =$id;
							 $data['image'] = $filename;
							 $data['color'] = $_POST['color'][$i];
							 $this->Common_model->insert($data,'product_images');
          						}
        				}

      				}
				}
			}
		redirect(base_url() . 'admin/Product', 'refresh');
		}
	}
	}



      public function Delete($id)
       	{
            $data1=['id'=> $id];
            $this->Common_model->delete($data1,'products');
            redirect(base_url() . 'admin/Product', 'refresh');
	     	}

      public function Delete_tag()
       	{
            $data1=['id'=> $_POST['id']];
            $this->Common_model->delete($data1,'indexing');
            redirect(base_url() . 'admin/Product', 'refresh');
		}
		 public function Delete_attr()
       	{
            $data1=['product_attribute_id'=> $_POST['id']];
            $this->Common_model->delete($data1,'product_attributes');
            redirect(base_url() . 'admin/Product', 'refresh');
        }
    public function update($id)
   	{
		 //echo $id;exit;
	   if($_POST){
		 $data1=$this->security->xss_clean($_POST);
		//  echo "<pre>";
		// 				 print_r($_FILES);
		// 				 exit();

		$config['upload_path']          = './uploads/product';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 11264;
		$config['max_width']            = 6000;
		$config['max_height']           = 6000;

		$this->load->library('upload', $config);
		$this->upload->do_upload('profile');
		$img=$this->upload->data();
						//  echo "<pre>";
						//  print_r($img);
						//  exit();
		$pic=$img['file_name'];

		 if($pic!='')
		 {

			$data=[ 'name' => $data1['product'],
			'description' => $data1['desc'],
			'price' => $data1['price'],
			'quantity' => $data1['quantity'],
			'discount' => $data1['discount'],
			'gst' => $data1['gst'],
			'profile_pic' => $pic,
		];
		  $this->Common_model->update($data,'id',$id,'products');

		}
		else{
			$data=[ 'name' => $data1['product'],
			'description' => $data1['desc'],
			'price' => $data1['price'],
			'quantity' => $data1['quantity'],
			'discount' => $data1['discount'],
			'gst' => $data1['gst'],
			// 'profile_pic' => $pic,
		];
		  $this->Common_model->update($data,'id',$id,'products');
		}
		 //add attributes
			if($id )
			//echo $id;exit;
			{
				if(isset($data1['attribute']) && count($data1['attribute'])>0)
				{
							for($i = 0; $i < count($data1['attribute']); $i++){
								$data=[
	  							'product_id' => $id,
									'attribute_id' => $data1['attribute'][$i],
									'value' => $data1['value'][$i]

										];
									$this->Common_model->insert($data,'product_attributes');
									// $this->Common_model->update($data,'product_id',$id,'product_attributes');
								}
						if(isset($data1['tag']) && count($data1['tag'])>0 && isset($data1['category']) && count($data1['category'])>0 ){
								//add tag and category
							 try {
								 $this->Common_model->indexing($data1, $id);
							 } catch (\Exception $e) {
								 echo 'error :  ' .  $e->getMessage();
							 }
						}
								// add product images
				if(isset($_FILES['pics']['name'])){
				// Count total files
     					 $countfiles = count($_FILES['pics']['name']);

     			 	// Looping all files
     			 	for($i=0;$i<$countfiles;$i++){

       					if(!empty($_FILES['pics']['name'][$i])){

        				  // Define new $_FILES array - $_FILES['file']
         					 $_FILES['file']['name'] = $_FILES['pics']['name'][$i];
         					 $_FILES['file']['type'] = $_FILES['pics']['type'][$i];
         					 $_FILES['file']['tmp_name'] = $_FILES['pics']['tmp_name'][$i];
						      	$_FILES['file']['error'] = $_FILES['pics']['error'][$i];
         					 $_FILES['file']['size'] = $_FILES['pics']['size'][$i];

         					 // Set preference
         						 $config['upload_path'] = './uploads/product';
         						 $config['allowed_types'] = 'jpg|jpeg|png|gif';
         						 $config['max_size'] = '5000'; // max_size in kb
         						 $config['file_name'] = $_FILES['pics']['name'][$i];

         					 //Load upload library
         					 $this->load->library('upload',$config);

         					 // File upload
         				 if($this->upload->do_upload('file')){
         			   		// Get data about the file
         				    $uploadData = $this->upload->data();
          				  $filename = $uploadData['file_name'];
							      $data = array();
							// Initialize array
										$data['product_id'] =$id;
										$data['image'] = $filename;
										$this->Common_model->insert($data,'product_images');
							// $this->Common_model->update($data,'product_id',$id,'product_images');

          						}
        				}

      				}
				}
			}
		}
			     redirect(base_url() . 'admin/Product', 'refresh');
	    }
	}

                     public function update_notifi($id)
	       	            {
							{
								$data1=[
								'status'=>'1'
							];
							}
    	               $this->Common_model->update($data1,'id',$id,'notification');
    	               redirect(base_url() . 'admin/Size/notification', 'refresh');
		     	   }
		     	


	      public function update_status1($id)
	       	{

							$data['product_data']=  $this->Product_model->select_product($id,'products');
					   	foreach($data['product_data'] as $value){
							$data['product_data']=$value;
						  }
							// echo $data['product_data']['status'];exit;
							if($data['product_data']['status']=='On_Sell')
							{
								$data1=[
								'status'=>'Best_Sell'
							];
							}
	           $this->Common_model->update($data1,'id',$id,'products');
	            redirect(base_url() . 'admin/Product', 'refresh');
		     	}
		     	
		     	
					public function update_status2($id)
		       	{
                $data=array();
								$data['product_data']=  $this->Product_model->select_product($id,'products');
						   	foreach($data['product_data'] as $value){
								$data['product_data']=$value;
							  }
								// echo $data['product_data']['status'];exit;
									if($data['product_data']['status']=='Best_Sell')
									{
										$data1=[
										'status'=>'On_Sell'
									];
									}
						    $this->Common_model->update($data1,'id',$id,'products');
		            redirect(base_url() . 'admin/Product', 'refresh');
			     	}

					public function Gst(){
						{
							$data= array();
					    $data['page'] ='GST';
						 $data['gstValue']=  $this->Common_model->select('GST');
					    $data['main_content']= $this->load->view('gst/add',$data, true);
							$this->load->view('index',$data);
						}
					}

					public function EditGst($id)
					{
						if($_POST){
					 $data1=$this->security->xss_clean($_POST);
								 $gst=[
										'gstName' => $data1['gstName'],
										'gstValue' => $data1['gstValue'],
								];

								$this->Common_model->update($gst,'id',$id,'GST');
								redirect(base_url() . 'admin/product/Gst', 'refresh');
						}
					}

}
