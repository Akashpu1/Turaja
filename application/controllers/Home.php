<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  	public function __construct() {
  		parent::__construct();
  	}
    public function index() {

    }

    function logout() {
        $this->session->sess_destroy();
        redirect(base_url() . 'auth', 'refresh');
    }
}

/* End of file Home.php */
/* Location: ./application/modules/web/controllers/Home.php */ ?>
