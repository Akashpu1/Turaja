<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

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
		$data= array();
		$data['page'] ='Social Icon';
		$data['social'] = json_decode($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value, true);
		$data['main_content']= $this->load->view('setting/social',$data, true);
		$this->load->view('index',$data);
  }

	public function socail(){

	}
	public function addsocial(){
		if($_POST){
			$data1=$this->security->xss_clean($_POST);
			//echo print_r($slider);exit;
			$data = [
				'link' => $data1['link'],
				'icon' => $data1['icon']
			];
			$social_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '[]';
	//echo print_r($slider_value);exit;
			$arr_data = json_decode($social_value, true);
			//echo print_r($arr_data);exit;
			// Push user data to array
			array_push($arr_data, $data);

			$jsondata = json_encode($arr_data);
			$data = [
				"setting_value" => $jsondata,
			];
			$this->common_model->update($data, 'setting_name', 'social_icon', 'setting');

			$data['slider'] = $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value;

			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Slider Added Done'));

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
	public function editsocail($id){
		if($_POST){
			$data1=$this->security->xss_clean($_POST);
			//echo print_r($slider);exit;
			$data = [
				'link' => $data1['link'],
				'icon' => $data1['icon']
			];
			$slider_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '[]';
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
			$this->common_model->update($data, 'setting_name', 'social_icon', 'setting');

			$data['slider'] = $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value;

			$this->session->set_flashdata(array('error' => 0, 'msg' => 'Edit socail Done'));

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
	public function deletesocial($id){
		$slider_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '[]';

		$arr_data = json_decode($slider_value, true);

		unset($arr_data[$id]);

		$jsondata = json_encode($arr_data);

		$data = [
			"setting_value" => $jsondata,
		];
		$this->common_model->update($data, 'setting_name', 'social_icon', 'setting');

		$this->session->set_flashdata(array('error' => 0, 'msg' => 'Social Deleted Done'));

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}


	public function icons(){
		header('Content-Type: text/html; charset=UTF-8');
		echo $this->load->view('setting/icons');
	}
}
