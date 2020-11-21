<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

 private $filedata = array();
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
		$this->load->helper('directory');
  }


	

	public function index()
	{
			$fileData['file'] = readJSON();
      //echo print_r($fileData['file'] );exit;
			$data['main_content'] = $this->load->view('media/lazy-loading', $fileData, TRUE);
			$this->load->view('index', $data);
	}

	public function videos()
	{
			$fileData['file'] = readJSON();
			$data['main_content'] = $this->load->view('media/lazy-loading-video', $fileData, TRUE);
			$this->load->view('index', $data);
	}

 public function get_file_refrace(){
    $map = directory_map(UPLOAD_FILE, FALSE, TRUE);
    $files = self::Concatenate_Filepaths($map);
    $fileData = self::getFileWithInfo($files);
    $json_data = json_encode($fileData);
    $info = writeJSON($fileData);
    if ($info) {
      redirect(base_url('admin/media/'), 'refresh');
    }else{
      echo base_url('admin/media/get_file_refrace');
    }
 }

	public function get_load()
	{
			if ($_POST) {
				$map = directory_map(UPLOAD_FILE, FALSE, TRUE);
				$files = self::Concatenate_Filepaths($map);
				$fileData = self::getFileWithExt($files);
				pre($_POST);
			}

	}


	public function add(){
    $data['page']='upload gallery';
		$data['main_content'] = $this->load->view('media/add-view', $data, TRUE);
		$this->load->view('index', $data);
	}


	public function get_model()
	{
			$map = directory_map(UPLOAD_FILE, FALSE, TRUE);
			$files = self::Concatenate_Filepaths($map);
			$fileData = self::getImageonly($files);
			echo $this->load->view('media/model-box', $fileData, TRUE);
	}

	public function get_video_model()
	{
			$map = directory_map(UPLOAD_FILE, FALSE, TRUE);
			$files = self::Concatenate_Filepaths($map);
			$fileData = self::getVideoonly($files);
			echo $this->load->view('media/video-model-box', $fileData, TRUE);
	}

	public function Concatenate_Filepaths ($upload, $prefix = UPLOAD_FILE) {
		$return = array();
		foreach ($upload as $key => $file) {
	    if (is_array($file)) {
	    	$return = array_merge($return, self::Concatenate_Filepaths($file, $prefix . '/' . $key));
	    }
	    else {
					$return[] = $prefix . '/' . $file;
	    }
		}

		return $return;
	}


	public function getFileWithExt($path)
	{
		$filedata = array();

		usort($path, function($x, $y) {
			return filemtime($x) < filemtime($y);
		});

		foreach ($path as $value) {
			if ( preg_match('/(\.jpg|\.jpeg|\.png|\.bmp|\.gif)$/i', $value) )
				$filedata['image'][] = getFileInfo($value);
			else if( preg_match('/(\.mp4|\.mkv|\.avi|\.webm)$/i', $value ) )
				$filedata['video'][] = $value;
			else
				$filedata['other'][] = $value;
		}
		return $filedata;
	}

	public function getFileWithInfo($path)
	{
		$filedata = array();

		usort($path, function($x, $y) {
			return filemtime($x) < filemtime($y);
		});

		foreach ($path as $value) {
			$filedata[] = getFileInfo($value);
		}
		return $filedata;
	}

	public function getImageonly($path)
	{
		$filedata = array();
		foreach ($path as $value) {
			if ( preg_match('/(\.jpg|\.jpeg|\.png|\.bmp|\.gif)$/i', $value) )
				$filedata['image'][] = $value;
			}
		return $filedata;
	}

	public function getVideoonly($path)
	{
		$filedata = array();
		foreach ($path as $value) {
			if ( preg_match('/(\.m4v|\.mp4|\.avi|\.MP4|\.AVI)$/i', $value) )
				$filedata['video'][] = $value;
			}
		return $filedata;
	}




}
