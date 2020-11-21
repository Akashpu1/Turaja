<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class setting extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			if(check()){
				if(!isAdmin($this->session->userdata('roles')))
					redirect(base_url(), 'refresh');
      }else{
				 	redirect(base_url(), 'refresh');
			}
            $this->load->model('common_model');
            $this->load->model('article_model');
	}
  public function index(){

  }

	public function slider(){
		$data= array();
		$data['page'] ='Slider';
		$data['slider'] = json_decode($this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value, true);
		$data['main_content']= $this->load->view('setting/slider',$data, true);
		$this->load->view('index',$data);
	}

	public function addslider(){
		if($_POST){
			$slider=$this->security->xss_clean($_POST);
			// echo print_r($slider);exit;
			if(isset($_FILES['favicon']['name'])){
			$config['upload_path']          = './uploads/slider';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 11264;
			$config['max_width']            = 6000;
			$config['max_height']           = 6000;

			$this->load->library('upload', $config);
			$this->upload->do_upload('favicon');
			$img=$this->upload->data();

			$favicon=$img['file_name'];

				 			$data = [
				 				'heading' => $slider['heading'],
				 				'details' => $slider['details'],
				 				'buttonUrl' => $slider['url'],
				 				'source' =>  $favicon,
				 			];

			$slider_value = !empty($this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value : '[]';
	//echo print_r($slider_value);exit;
			$arr_data = json_decode($slider_value, true);
			//echo print_r($arr_data);exit;
			// Push user data to array
			array_push($arr_data, $data);

			$jsondata = json_encode($arr_data);
			$data = [
				"setting_value" => $jsondata,
			];
			$this->common_model->update($data, 'setting_name', 'home_slider', 'setting');

			$data['slider'] = $this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value;

			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Slider Added Done'));

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
}
	public function editslider($id){
		if($_POST){
			$slider=$this->security->xss_clean($_POST);
			if(isset($_FILES['favicon']['name'])){
			$config['upload_path']          = './uploads/slider';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 11264;
			$config['max_width']            = 6000;
			$config['max_height']           = 6000;

			$this->load->library('upload', $config);
			$this->upload->do_upload('favicon');
			$img=$this->upload->data();

			$favicon=$img['file_name'];
    if($favicon!=''){
				 			$data = [
				 				'heading' => $slider['heading'],
				 				'details' => $slider['details'],
				 				'buttonUrl' => $slider['url'],
				 				'source' =>  $favicon,
				 			];
						}
						else {
							$data = [
								'heading' => $slider['heading'],
								'details' => $slider['details'],
								'buttonUrl' => $slider['url'],

							];
						}
			$slider_value = !empty($this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value : '[]';
	//echo print_r($slider_value);exit;
			$arr_data = json_decode($slider_value, true);
			//echo print_r($arr_data);exit;
			// Push user data to array
			unset($arr_data[$id]);

			array_push($arr_data, $data);

			$jsondata = json_encode($arr_data);
			$data = [
				"setting_value" => $jsondata,
			];
			$this->common_model->update($data, 'setting_name', 'home_slider', 'setting');

			$data['slider'] = $this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value;

			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Slider Added Done'));

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
}
	public function deleteslider($id){
		$slider_value = !empty($this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'home_slider'))->row()->setting_value : '[]';

		$arr_data = json_decode($slider_value, true);

		unset($arr_data[$id]);

		$jsondata = json_encode($arr_data);

		$data = [
			"setting_value" => $jsondata,
		];
		$this->common_model->update($data, 'setting_name', 'home_slider', 'setting');

		$this->session->set_flashdata(array('error' => 0, 'msg' => 'Slider Deleted Done'));

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	// Add contact Us details
	public function contact(){
		$data= array();
		$data['page'] ='Footer contact';
		$data['contact'] = json_decode($this->db->get_where('setting', array('setting_name' => 'contact_us'))->row()->setting_value, true);
		$data['main_content']= $this->load->view('setting/contact',$data, true);
		$this->load->view('index',$data);
	}
	public function addcontact(){
		if($_POST){
			$contact_us=$this->security->xss_clean($_POST);
			//echo print_r($slider);exit;
			$data = [
				'address' => $contact_us['address'],
				'email' => $contact_us['email'],
				'phone' => $contact_us['phone'],
			];
			$contact_value = !empty($this->db->get_where('setting', array('setting_name' => 'contact_us'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'contact_us'))->row()->setting_value : '[]';
			$arr_data = json_decode($contact_value, true);
			array_push($arr_data, $data);

			$jsondata = json_encode($arr_data);
			$data = [
				"setting_value" => $jsondata,
			];
			$this->common_model->update($data, 'setting_name', 'contact_us', 'setting');

			$data['slider'] = $this->db->get_where('setting', array('setting_name' => 'contact_us'))->row()->setting_value;

			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Contact Added Done'));

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
	public function editcontact($id){
		if($_POST){
			$contact_us=$this->security->xss_clean($_POST);
			//echo print_r($slider);exit;
			$data = [
				'address' => $contact_us['address'],
				'email' => $contact_us['email'],
				'phone' => $contact_us['phone'],
			];
			$contact_value = !empty($this->db->get_where('setting', array('setting_name' => 'contact_us'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'contact_us'))->row()->setting_value : '[]';
			$arr_data = json_decode($contact_value, true);
			unset($arr_data[$id]);
			array_push($arr_data, $data);

			$jsondata = json_encode($arr_data);
			$data = [
				"setting_value" => $jsondata,
			];
			$this->common_model->update($data, 'setting_name', 'contact_us', 'setting');

			$data['slider'] = $this->db->get_where('setting', array('setting_name' => 'contact_us'))->row()->setting_value;

			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Contact Added Done'));

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
	public function deletecontact($id){
		$slider_value = !empty($this->db->get_where('setting', array('setting_name' => 'contact_us'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'contact_us'))->row()->setting_value : '[]';

		$arr_data = json_decode($slider_value, true);

		unset($arr_data[$id]);

		$jsondata = json_encode($arr_data);

		$data = [
			"setting_value" => $jsondata,
		];
		$this->common_model->update($data, 'setting_name', 'contact_us', 'setting');

		$this->session->set_flashdata(array('error' => 0, 'msg' => 'contact Deleted Done'));

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
		//end  Add contact Us details

// ========================================================


		// Add Title details
		public function Title(){
			$data= array();
			$data['page'] ='Slider';
			$data['app_title'] = json_decode($this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value, true);
			$data['main_content']= $this->load->view('setting/app_title',$data, true);
			$this->load->view('index',$data);
		}
		public function addtitle(){
			if($_POST){
				$pp_title=$this->security->xss_clean($_POST);
				//echo print_r($slider);exit;
				$data = [
					'title' => $pp_title['title'],
					'source' => $pp_title['featureImage']
				];
				$title_value = !empty($this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value : '[]';
				$arr_data = json_decode($title_value, true);
				array_push($arr_data, $data);

				$jsondata = json_encode($arr_data);
				$data = [
					"setting_value" => $jsondata,
				];
				$this->common_model->update($data, 'setting_name', 'application_title', 'setting');

				$data['slider'] = $this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value;

				$this->session->set_flashdata(array('error' => 0, 'msg' => 'Title Added Done'));

				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}
		public function edittitle($id){
			if($_POST){
				$pp_title=$this->security->xss_clean($_POST);
				//echo print_r($slider);exit;
				$data = [
					'title' => $pp_title['title'],
					'source' => $pp_title['featureImage']
				];
				$contact_value = !empty($this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value : '[]';
				$arr_data = json_decode($contact_value, true);
				unset($arr_data[$id]);
				array_push($arr_data, $data);

				$jsondata = json_encode($arr_data);
				$data = [
					"setting_value" => $jsondata,
				];
				$this->common_model->update($data, 'setting_name', 'application_logo', 'setting');

				$data['slider'] = $this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value;

				$this->session->set_flashdata(array('error' => 0, 'msg' => 'Contact Added Done'));

				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}
		public function deletetitle($id){
			$title_value = !empty($this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value : '[]';

			$arr_data = json_decode($title_value, true);

			unset($arr_data[$id]);

			$jsondata = json_encode($arr_data);

			$data = [
				"setting_value" => $jsondata,
			];
			$this->common_model->update($data, 'setting_name', 'application_title', 'setting');

			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Title Deleted Done'));

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}

// ==================================================================================
		// Add logo
		public function logo(){
			$data= array();
			$data['page'] ='Logo';
			$data['app_logo'] = json_decode($this->db->get_where('setting', array('setting_name' => 'application_logo'))->row()->setting_value, true);
			$data['main_content']= $this->load->view('setting/add_logo',$data, true);
			$this->load->view('index',$data);
		}
		public function addlogo(){
			if($_POST){
				$logo=$this->security->xss_clean($_POST);
				 // echo print_r($logo);exit;
				$data = [
					'discription' => $logo['discription'],
					'source' => $logo['featureImage']
				];
				// pre($data);exit;
				$logo_value = !empty($this->db->get_where('setting', array('setting_name' => 'application_logo'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'application_logo'))->row()->setting_value : '[]';
				$arr_data = json_decode($logo_value, true);
				array_push($arr_data, $data);

				$jsondata = json_encode($arr_data);
				$data = [
					"setting_value" => $jsondata,
				];
				$this->common_model->update($data, 'setting_name', 'application_logo', 'setting');

				$data['slider'] = $this->db->get_where('setting', array('setting_name' => 'application_logo'))->row()->setting_value;

				$this->session->set_flashdata(array('error' => 0, 'msg' => 'Title Added Done'));

				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}
		public function editlogo($id){
			if($_POST){
				$pp_title=$this->security->xss_clean($_POST);
			echo print_r($pp_title);exit;
			$data = [
				'discription' => $logo['discription'],
				'source' => $logo['featureImage']
			];
				$contact_value = !empty($this->db->get_where('setting', array('setting_name' => 'application_logo'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'application_logo'))->row()->setting_value : '[]';
				$arr_data = json_decode($contact_value, true);
				unset($arr_data[$id]);
				array_push($arr_data, $data);

				$jsondata = json_encode($arr_data);
				$data = [
					"setting_value" => $jsondata,
				];
				$this->common_model->update($data, 'setting_name', 'application_logo', 'setting');

				$data['slider'] = $this->db->get_where('setting', array('setting_name' => 'application_logo'))->row()->setting_value;

				$this->session->set_flashdata(array('error' => 0, 'msg' => 'Contact Added Done'));

				redirect($_SERVER['HTTP_REFERER'], 'refresh');
			}
		}
		public function deletelogo($id){
			$title_value = !empty($this->db->get_where('setting', array('setting_name' => 'application_logo'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'application_logo'))->row()->setting_value : '[]';

			$arr_data = json_decode($title_value, true);

			unset($arr_data[$id]);

			$jsondata = json_encode($arr_data);

			$data = [
				"setting_value" => $jsondata,
			];
			$this->common_model->update($data, 'setting_name', 'application_logo', 'setting');

			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Title Deleted Done'));

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}

		public function SettingData(){
			$data= array();
			$data['page'] ='Setting Data';
			$data['setting']=$this->common_model->get_setting('homesetting');
			// $data['app_logo'] = json_decode($this->db->get_where('setting', array('setting_name' => 'application_logo'))->row()->setting_value, true);
			$data['main_content']= $this->load->view('setting/editsetting',$data, true);
			$this->load->view('index',$data);
		}

		public function update($id)
		{
		 //echo $id;exit;
		 if($_POST){
		$data1=$this->security->xss_clean($_POST);
		// pre($data1);exit;
		 if(isset($_FILES['favicon']['name'])){
		$config['upload_path']          = './uploads/product';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 11264;
		$config['max_width']            = 6000;
		$config['max_height']           = 6000;

		$this->load->library('upload', $config);
		$this->upload->do_upload('favicon');
		$img=$this->upload->data();
						//  echo "<pre>";
						//  print_r($img);
						//  exit();
		$favicon=$img['file_name'];

		 if($favicon!='' )
		 {

			 $data=[
			 'address' => $data1['address'],
			 'email' => $data1['email'],
			 'phone' => $data1['phone'],
			 'title' => $data1['title'],
			 'headertitle' => $data1['headertitle'],
			 'favicon' => $favicon,
			 'about' => $data1['about'],
     ];

			$this->common_model->update($data,'id',$id,'homesetting');
		}
	}
		else{
			$data=[ 'address' => $data1['address'],
			'email' => $data1['email'],
			'phone' => $data1['phone'],
			'title' => $data1['title'],
			'about' => $data1['about'],
			'headertitle' => $data1['headertitle'],
			// 'profile_pic' => $pic,
		];
			$this->common_model->update($data,'id',$id,'homesetting');
		}

		if(isset($_FILES['logo']['name'])){
		$config['upload_path']          = './uploads/product';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 11264;
		$config['max_width']            = 6000;
		$config['max_height']           = 6000;

		$this->load->library('upload', $config);
		$this->upload->do_upload('logo');
		$img=$this->upload->data();
					  // echo "<pre>";
					  // print_r($img);
					  // exit();
		$logo=$img['file_name'];

		if($logo!='' )
		{

			$data=[

			'logo' => $logo,
			'about' => $data1['about'],
		];
		 $this->common_model->update($data,'id',$id,'homesetting');

		}
		}
}
redirect(base_url() . 'admin/setting/SettingData', 'refresh');
}
}
