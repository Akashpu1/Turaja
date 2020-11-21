<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

 private $filedata = array();
	public function __construct()
  {
    parent::__construct();
		if(check()){
			if(!isAdmin($this->session->userdata('roles')))
				{redirect(base_url(), 'refresh');}
		}else{
				redirect(base_url(), 'refresh');
		}
		$this->load->model('common_model');
		$this->load->helper('directory');
  }

	public function index() {
        $fileData = array('file');
        $data = $this->common_model->gallerys(10, 0);
        foreach ($data as $key => $value) {
        $fileData['file'][$key] = (array)json_decode($value['details']);
        $fileData['file'][$key]['id'] = $value['id'];
      }
       $data['main_content'] = $this->load->view('media/lazy-loading', $fileData, TRUE);
       $this->load->view('index', $data);
	}

	public function videos() {
      $fileData = array('file');
			$data['main_content'] = $this->load->view('media/lazy-loading-video', $fileData, TRUE);
			$this->load->view('index', $data);
	}

	public function others() {
      $result = $this->common_model->others();
      foreach ($result as $value) {
        $data['file'][$value['id']] = json_decode($value['details']);
      }
			$data['main_content'] = $this->load->view('media/list-view', $data, TRUE);
			$this->load->view('index', $data);
	}

 public function get_file_refrace() {
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

	public function get_gallery()
	{
    $page = $_POST['id'];
    $output = array('html'=>'');
    // Set pagination
    $total_rows = $this->common_model->get_count('gallery', IMAGE_EXT);
    if ($total_rows > $page) {
        // code...
      $config = array();
      $config['per_page'] = 5;
      $postID = ($config['per_page'] + $page);


      $data = $this->common_model->gallerys($config["per_page"], $page);

      foreach ($data as $value) {
            $id = $value['id'];
            $value = json_decode($value['details']);
            $output['html'] .= '<img data-sizes="auto" data-src="'.base_url($value->dirname.'/'.$value->basename).'" data-id="'.$id.'" class="lazyload info" alt="'. $value->filename .'">';

      }
      $output['loadmore'] = '<div lastID="'. $postID .'"name="image" id="loadmore"><img src="'. base_url('assets/images/preloder-0.2s-200px.svg') .'" width="60" height="40" alt=""></div>';
      $output['is_end'] = 0;
      echo json_encode($output);
    } else {
      echo json_encode(array('is_end' => 1));
    }
	}


	public function add(){
		$data['main_content'] = $this->load->view('media/add-view', '', TRUE);
		$this->load->view('index', $data);
	}


  	public function save() {
  		if ($_POST) {

  			// Get File Information
  			$file = getFileInfo($_POST['file']);

  			if ($file['status']) {
  				// check file exist...
  				$data = [
  					'status' => $file['status'],
  					'name' => $file['filename'],
  					'filetype' => $file['extension'],
  					'details' => json_encode($file)
  				];
  				$result = $this->common_model->insert($data, 'gallery');
  				if ($result) {
  					echo json_encode(array('error' => 0, 'msg' => 'Document saved'));
  				}
  			} else {
  				echo json_encode(array('error' => 1, 'msg' =>  base_url($_POST['image']).' file path not found.'));
  			}
  		}else{
  			echo json_encode(array('error' => 1, 'msg' => 'Request not allowed'));
  		}
  	}

	public function get_model()
	{
        $fileData = array('file');
        $data = $this->common_model->gallerys(10, 0);
        foreach ($data as $key => $value) {
        $fileData['file'][$key] = (array)json_decode($value['details']);
        $fileData['file'][$key]['id'] = $value['id'];
      }
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
			if ( preg_match('/(\.m4v|\.mp4|\.avi|\.MP4|\.AVI)$/i', $value) ) {$filedata['video'][] = $value;}
			}
		return $filedata;
	}


public function delete($id){

  $result = $this->common_model->get_gallery($id, 'gallery');
  if (!empty($result)) {
    // code...
    $file = json_decode($result->details);
    try {
      if (unlink($file->dirname.'/'.$file->basename)) {
        $this->common_model->delete(['id' => $id], 'gallery');
        $this->session->set_flashdata(array('error' => 0, 'msg' => 'File Deleted Success'));
        redirect($_SERVER['HTTP_REFERER'], 'refresh');

      }else{
        $this->session->set_flashdata(array('error' => 1, 'msg' => 'File Deleted Failds'));
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
      }
    } catch (\Exception $e) {
      $this->session->set_flashdata(array('error' => 1, 'msg' => $e->getMessage()));
      redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
  }else{
    $this->session->set_flashdata(array('error' => 1, 'msg' => 'File Not Found'));
    redirect($_SERVER['HTTP_REFERER'], 'refresh');
  }
}

}
