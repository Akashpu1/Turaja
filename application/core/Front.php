<?php (defined('BASEPATH')) OR exit('No direct script access allowed');



class Front extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('setting_model');
    $this->load->library('cart');
  }

  public function app_config() {
    return $this->setting_model->settings();
  }

  public function get_cart(){
    return $this->cart->contents();
  }

  public function get_location() {
    if (check()) {
      $role = $this->session->userdata('roles');
      if (isAdmin($role)) {
        redirect(base_url('admin'), 'refresh');
      }else{
        redirect(base_url('profile'), 'refresh');
      }
    }else{
      redirect(base_url('auth'), 'refresh');
    }
  }
  public function user_profile() {
    if (check()) {
      return $this->session->userdata();
    }
  }
}
