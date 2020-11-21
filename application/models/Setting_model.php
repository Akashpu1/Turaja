<?php

class Setting_model extends CI_Model{

  public $tbl_setting;
  public function __construct()
  {
          $this->load->database();
          $this->tbl_setting = 'setting';
  }

  public function settings() {
    $data = array();
    $result = $this->db->select('setting_name, setting_value')->get_where($this->tbl_setting, array('autoload' => 'yes'))->result();
    foreach ($result as $value) {
      $data[$value->setting_name] = $value->setting_value;
    }
    return (object)$data;
  }

  public function get_contacts() {

    return $this->db->select('setting_value')
      ->from($this->tbl_setting)
      ->where('setting_name', 'contacts')
      ->get()->row();
  }

  public function logo(){
    return $this->db->get_where($this->tbl_setting, array('setting_name', 'application_logo'))->row(0);
  }
  public function get_slider(){

    return $this->db->select('setting_value')
      ->from($this->tbl_setting)
      ->where('setting_name', 'home_slider')
      ->get()->row();
  }
  public function get_price(){

    return $this->db->select('setting_value')
      ->from($this->tbl_setting)
      ->where('setting_name', 'prices')
      ->get()->row();
  }
  public function get_address(){

    return $this->db->select('setting_value')
      ->from($this->tbl_setting)
      ->where('setting_name', 'address')
      ->get()->row();
  }

}
