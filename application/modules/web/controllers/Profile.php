<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Front {


		public $data = array();
		public $profile;

		public function __construct()
		{
			parent::__construct();
			$this->load->model('common_model');
			$this->load->model('user');
			$this->load->model('yourorder_model');
			$this->load->library('cart');
			$this->load->model('Homepage_model');
			$this->data['settings'] = $this->app_config();
			$this->profile = (object)$this->user_profile();
		}

	  function index() {
				$this->data['profile'] = $this->profile;
				$this->data['address'] = $this->user->address($this->profile->userID);
				$this->data['orders'] = $this->yourorder_model->getuserorder($this->profile->userID);
				$this->data['main_content'] = $this->load->view('profile/details-view', $this->data, true);
				$this->data['is_script'] = $this->load->view('auth/script', $this->data, true);
				$this->load->view('index', $this->data);
	  }
	function cancel($id)
	{
		if ($this->common_model->update(array("status"=>'cancel'), 'id', $id, 'orders')) {
			$this->session->set_flashdata(array('msg' => 'Profile Update Successfull', 'status' => 1));
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		} else {
			$this->session->set_flashdata(array('msg' => 'Profile Update Successfull', 'status' => 1));
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
	function order_details()
	{
		$data=array();
		if ($_POST) {
			$data['id'] =  $this->security->xss_clean($_POST['id']);
		$data['orders'] = $this->yourorder_model->get_oder_by_id($data['id']);
		$data['main_content'] = $this->load->view('profile/order', $data, true);
		echo $data['main_content'];
		}

	}
		function update() {
			if($_POST) {
				$data =  $this->security->xss_clean($_POST);
				if($data) {
					$profile = [
					  "email" => $data["email"],
					  "phone" => $data["phone"],
					  "password" => password_hash($data["password"], PASSWORD_DEFAULT),
					];
					if($this->common_model->update($profile , 'logid', $this->profile->userID, 'logme')) {
						$user = [
							"name" => $data["fullname"],
						];
						$this->session->set_userdata(array(
							"username" => $data["fullname"],
							"email" => $data["email"],
							"phone" => $data["phone"],
						));
						if($this->common_model->update($user , 'user_id', $this->profile->userID, 'user_details')) {
							$this->session->set_flashdata(array('msg' => 'Profile Update Successfull', 'status' => 1));
							redirect($_SERVER['HTTP_REFERER'], 'refresh');
						}else{
							$this->session->set_flashdata(array('msg' => 'Profile Update Successfull', 'status' => 1));
							redirect($_SERVER['HTTP_REFERER'], 'refresh');
						}
					}
				}
			}
		}

	  function address() {
				$this->data['main_content'] = $this->load->view('profile/add-address-view', $this->data, true);
				$this->data['is_script'] = $this->load->view('auth/script', $this->data, true);
				$this->load->view('index', $this->data);
	  }
	  function address_save() {
			if($_POST) {
				$data =  $this->security->xss_clean($_POST);
				if($data) {
					$address = [
						"user_id" 	=> $this->profile->userID,
						"street" 	=> $data["street"],
				    "pincode" 	=> $data["pincode"],
				    "post" 	=> $data["post"],
				    "city" 	=> $data["city"],
				    "state" 	=> $data["states"],
				    "address" 	=> $data["address"],
					];
					if ($this->common_model->insert($address , 'address')) {
						$this->session->set_flashdata(array('msg' => 'Address Update Successfull', 'status' => 1));
						redirect($_SERVER['HTTP_REFERER'], 'refresh');
					}
				}
			}
	  }

		function edit_address($id) {
				$this->data['address'] = $this->user->findaddress($id);
				$this->data['main_content'] = $this->load->view('profile/edit-address-view', $this->data, true);
				$this->data['is_script'] = $this->load->view('auth/script', $this->data, true);
				$this->load->view('index', $this->data);
	  }
}
