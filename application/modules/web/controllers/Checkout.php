<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends Front
{

  public $data = array();

  public function __construct()
  {
    parent::__construct();
    $this->load->model('common_model');
    $this->load->model('shop_model');
    $this->load->model('Product_model');
    $this->load->model('article_model');
    $this->load->model('user');
    $this->load->library('cart');
    $this->data['settings'] = $this->app_config();
    $this->data['cart'] = $this->get_cart();
    //Do your magic here

  }

  public function index()
  {

    if ($this->cart->total_items() <= 0) {
      redirect('web/home');
    }

    if (check()) {
      $this->data['customer'] = $this->common_model->get_customer($_SESSION["userID"], 'customers');
    }
    //pre($this->data['customer']);exit;
    $this->data['main_content'] = $this->load->view('checkout/customer-details', $this->data, true);
    $this->load->view('index', $this->data);
  }

  function gopayment()
  {

    // Redirect if the cart is empty
    if ($this->cart->total_items() <= 0) {
      redirect(base_url('home'));
    }

    $post = $this->security->xss_clean($_POST);
    //pre($post);exit;
    if (!check()) {
      $logme = array(
        'logid'     => getCustomId($this->common_model->get_last_id('logme'), USER_PRE),
        'email'     => $post['email'],
        'phone'     => $post['phone'],
        'role'      => "u",
        'status'    => "active",
        'password'   => password_hash($post["password"], PASSWORD_DEFAULT),  // Password Default,
        'joindate'   => current_datetime()
      );
      if ($this->common_model->insert($logme, 'logme')) {
        $custData = array(
          'user_id' => $logme['logid'],
          'first_name' => $post['first_name'],
          'last_name' => $post['last_name'],
          'email'     => $post['email'],
          'phone'     => $post['phone'],
          'address'   => $post['address'],
          'street'    => $post['street'],
          'pincode'   => $post['pincode'],
          'city'      => $post['city'],
          'states'    => $post['states'],
          'created'   => current_datetime()
        );
      }
    } else {
      $custData = array(
        'user_id' => $this->session->userdata('userID'),
        'first_name' => $post['first_name'],
        'last_name' => $post['last_name'],
        'email'     => $post['email'],
        'phone'     => $post['phone'],
        'address'   => $post['address'],
        'street'    => $post['street'],
        'pincode'   => $post['pincode'],
        'city'      => $post['city'],
        'states'    => $post['states'],
        'created'   => current_datetime()
      );
    }
    if (!empty($custData)) {
      if ($this->common_model->insert($custData, 'customers')) {
        // pre($_POST); exit;
        $custData = array(
         
          'user_id' => $this->session->userdata('userID'),
        

          'address'   => $post['address'],
          'street'    => $post['street'],
          'pincode'   => $post['pincode'],
          'city'      => $post['city'],
          'state'    => $post['states'],
          'created'   => current_datetime()
        );
        $this->common_model->insert($custData, 'address');
        $result = $this->placeOrder($this->common_model->get_last_id('customers'));
        if ($result) {
          $order = $this->shop_model->get_order($result);
          $data['payby_paytm'] = [
            'ORDER_ID' => $order->id,
            'TXN_AMOUNT' => $order->grand_total,
            'CUST_ID' => $order->customer_id,
          ];
          $this->session->set_userdata($data);
          redirect(base_url('payment'));
        }
      }
    }
  }

  function placeOrder($custID)
  {
    if ($this->user->customerExist($custID)) {
      $customer = $this->user->customerFind($custID);
      $ordData = array(
        'customer_id' => $customer->user_id,
        'totalPrice' => 0,
        'grand_total' => 0,
      );
      if ($this->common_model->insert($ordData, 'orders')) {
        // Retrieve cart data from the session
        $grand_total = 0;
        $cartItems = $this->cart->contents();
        $insertOrder = $this->common_model->get_last_id('orders');
        // Cart items
        foreach ($cartItems as $item) {
          $ordItemData = array(
            'order_id'  => $insertOrder,
            'product_id'  => $item['id'],
            'quantity'   => $item['qty'],
            'sub_total'   => $item["subtotal"]
          );

          if (!empty($ordItemData)) {
            // Insert order items
            $insertOrderItems = $this->common_model->insert($ordItemData, 'order_items');

            $grand_total += $grand_total + $item["subtotal"];
          }
        }

        if ($insertOrderItems) {

          if ($this->common_model->update(['grand_total' => $grand_total], 'id', $insertOrder, 'orders')) {
            // Remove items from the cart
            $this->cart->destroy();
            // Return order ID
            return $insertOrder;
          }
        } else {
          return FALSE;
        }
      } else {
        return FALSE;
      }
    } else {
      return FALSE;
    }
  }

  function orderSuccess($ordID)
  {
    // Fetch order data from the database
    $data['order'] = $this->Product_model->getOrder($ordID);
    // echo "<pre>";
    // print_r($data['order']);exit;
    // echo $data['order']['id'].$data['order']['grand_total'].$data['order']['grand_total'];
    $data['setting'] = $this->common_model->select('homesetting');

    // echo $data['logo']['source'];exit;
    // Load order details view
    $this->load->view('collection/razorpay', $data);
  }

  public function payment_url()
  {
    $data = array();
    if ($_POST) {
      $data1 = array(
        'payment' => $_POST['payment_id'],
        'transaction' => $_POST['amount'],
        'userid' => $_POST['user_id'],
        'orderid' => $_POST['order_id'],
      );
      //print_r($data);exit;
      $payment = $this->common_model->insert($data1, 'payments');
      if ($payment) {
        $email = $this->input->post('email');
        $subject = 'payment Done';

        $config = array(
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
        $this->email->from($email); // change it to yours
        $this->email->to('artisinghh11@gmail.com'); // change it to yours
        $this->email->subject($subject);
        $this->email->set_mailtype('html');
        // $msg=$this->load->view('join/email');
        $this->email->message($this->load->view('web/collection/email', $data, TRUE));
        $this->email->send();
      }
      $arr = array('msg' => 'Payment successfully credited', 'status' => true);
    }
  }



  public function congratulations()
  {
    $data = array();
    $data['massege'] = 'Your Payment Successfully Done';
    // $data['main_content'] = $this->load->view('web/collection/congratulation', $data, TRUE);
    $this->load->view('web/collection/congratulation', $data);
  }
}
