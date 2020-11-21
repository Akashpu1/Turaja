<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Register extends Front {

  public $data = array();

    public function __construct(){
          parent::__construct();
         $this->load->model('common_model');
         $this->load->library(['auth', 'session']);
         $this->load->library('form_validation');
         $this->data['settings'] = $this->app_config();
   			 $this->data['cart'] = $this->get_cart();
         $this->load->library('cart');
         if (check()) {
           $this->get_location();
         }
    }


    public function index() {
      $this->data['main_content'] = $this->load->view('auth/join-view', $this->data, true);
      $this->data['is_script'] = $this->load->view('auth/script', $this->data, true);
      $this->load->view('index', $this->data);
    }


     public function signup() {

      if($_POST) {
          $data =  $this->security->xss_clean($_POST); // cleaning proccess for POST data from view
    //  pre($data);exit;
          $phone = $data['phone'];

          $email = $data['email'];

          $pass = password_hash($data["password"], PASSWORD_DEFAULT);  // Password Default

          $text = getCustomId($this->common_model->get_last_id('logme'), 'EDO');
          //echo $text;exit;
          $message = [
            'logid' => $text, // Automatically generated by the model
            'email' => $email,
            'phone' => $phone,
            'password' => $pass,
            'status' => 'active',
            'role' => 'u',
            'joindate' => current_datetime(),
          ];
          if($this->common_model->insert($message, 'logme')) {
            $details = [
              "user_id" => $text,
              "first_name" => $data['fname'],
              "last_name"=> $data['lname']
            ];

              $this->common_model->insert($details, 'user_details');
              $this->session->set_flashdata(array('msg' => 'Registration Success', 'status' => 1));
              redirect(base_url() . 'auth', 'refresh');

          } else {
            $temp="Try again";
            $this->session->set_flashdata(array('msg' => 'Registration Faild. check your Email or Phone or try again.', 'status' => 0));
            redirect(base_url() . 'join', 'refresh');
        }
      }
    }


    public function user_exist() {
      if($_POST) {
        $data =  $this->security->xss_clean($_POST); // cleaning proccess for POST data from view
        $check = $this->common_model->check_user($data); // check if user is aleady exist
        if ($check) {
          echo json_encode(['status' => 1, 'msg' => 'User Already Exists Try another email']);
        }else{
          echo json_encode(['status' => 0, 'msg' => 'User Not Matched']);
        }
      }
    }

     public function subscribe() {
      if($_POST){
          $data =  $this->security->xss_clean($_POST); // cleaning proccess for POST data from view
          $check = $this->common_model->check_user($data); // check if user is aleady exist
        if($check) {
          $data['user'] = $check;
          $this->load->view('user',$data);
        } else {
          if(ctype_digit($data['username'])) {
            $phone = $data['username'];
            $email = null;
          } else {
            $phone = null;
            $email = $data['username'];
          }
          $text = getCustomId($this->common_model->get_last_id('logme'), 'EDO');

          $pass = password_hash('kalka@' . $text, PASSWORD_DEFAULT);  // Password Default  kalka@$text
          $message = [
            'logid' => $text, // Automatically generated by the model
            'email' => $email,
            'phone' => $phone,
            'password' => $pass,
            'status' => 'active',
            'role' => 's',
            'joindate' => current_datetime(),
          ];
          $str = $this->common_model->insert($message,'logme');
          if($str!='') {
            $lead = [
              'city' => $data['city'],
              'request_course' =>  $data['course']
            ];
            $details = [
              "user_id" => $text,
              "name" => $data['fullname'],
              "details" => json_encode($lead),
            ];
            $this->common_model->insert($details,'user_details');
            $this->common_model->insert(array('user_id' => $text, 'role_id' => 2),'roles_users');
            $this->common_model->insert(array('root' => $text), 'thumbnail');
            $_POST = [
              'username' => ($email != null) ? $email : $phone,
              'password' => 'kalka@'.$text,
            ];
            $temp = $this->auth->login($_POST);
            if($temp['status']) {
              $this->session->set_flashdata(array('massege' => 'Registration', 'status' => 1));
              redirect(base_url() . 'join', 'refresh');
            }
          } else {
            $temp="Try again";
            $this->session->set_flashdata(array('massege' => 'Registration Faild. check your Email or Phone or try again.', 'status' => 0));
            redirect(base_url() . 'authentication', 'refresh');
          }
        }
      }
    }
}