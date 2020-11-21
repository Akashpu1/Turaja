<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fba extends CI_Controller {

	function __construct(){
		
		parent::__construct();
		$this->load->library('fba_lib');
	}

	public function index()
	{
		header('Content-Type: application/json');
		// header('Access-Control-Allow-Origin: http://your-domain.com');

		// Load class fba_lib.php


		// Scan direktori
		if(isset($_POST['path'])){

			// Jalankan fungsi scan->('SUB DIR NAME')
			$res = $this->fba_lib->scan($_POST['path']);

			// Output list direktori & file dalam format JSON
			echo json_encode($res);

		}

		// Read file
		else if(!empty($_POST['file'])){

			// Jalankan fungsi scan->('SUB DIR NAME')
			$res = $this->fba_lib->read($_POST['file']);

			// Output isi file
			echo json_encode($res);

		}
	}

}
