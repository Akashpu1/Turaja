<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Authentication extends Front {

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
      if($_POST) {
        $temp = $this->auth->login($_POST);
        if($temp['status']) {
          $this->get_location();
        } else {
          $this->session->set_flashdata(array('msg' => 'Login Failed', 'status' => 0));
          $this->data['main_content'] = $this->load->view('auth/login-view', $this->data, true);
          $this->data['is_script'] = $this->load->view('auth/script', $this->data, true);
          $this->load->view('index', $this->data);

        }
      }else {
        $this->data['main_content'] = $this->load->view('auth/login-view', $this->data, true);
        $this->data['is_script'] = $this->load->view('auth/script', $this->data, true);
        $this->load->view('index', $this->data);
      }
    }



    public function forgotten() {
      $this->data['main_content'] = $this->load->view('auth/forgot-view', $this->data, true);
      $this->data['is_script'] = $this->load->view('auth/script', $this->data, true);
      $this->load->view('index', $this->data);
    }

    public function newpassword() {
      if($_POST) {
        $data =  $this->security->xss_clean($_POST);
        $data['username'] = $data['check-email'];
        $check = $this->common_model->check_user($data);
        if($check) {
          $this->data['phone'] = $check->phone;
          $this->data['email'] = $check->email;
          $this->data['logid'] = $check->logid;
          $this->data['main_content'] = $this->load->view('auth/reset-password-view', $this->data, true);
          $this->data['is_script'] = $this->load->view('auth/script', $this->data, true);
          $this->load->view('index', $this->data);
        }
      }
    }

    public function reset() {
      if($_POST) {
        $data =  $this->security->xss_clean($_POST);
        $data['username'] = $data['email'];
        $check = $this->common_model->check_user($data);
        if($check) {
          $password = [
            'password' => password_hash($data["password"], PASSWORD_DEFAULT),
          ];
          if ($this->common_model->update($password , 'logid', $data['logid'], 'logme')) {
            $this->session->set_flashdata(array('msg' => 'Password Update Successfull', 'status' => 1));
            redirect(base_url() . 'auth', 'refresh');
          }
        }
      }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url() . 'auth', 'refresh');
    }

    public function send_email($email = '', $password = '') {
         $data=array();
        $data['email']=$email;

        $data['password']=$password;
        //  echo print_r($data['value']);
        //  echo print_r($email);exit;
        //   $email = $email;
           $subject = 'Password Reset!!';

          $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@rectorsol.com', // change it to yours
            'smtp_pass' => 'shash#13', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
            );
          $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('info@rectorsol.com'); // change it to yours
          $this->email->to($email);// change it to yours
          $this->email->subject($subject);
          $this->email->set_mailtype('html');
         // $msg=$this->load->view('join/email');
          $this->email->message($this->load->view('email',$data,TRUE));
          $this->email->send();
    }
    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
