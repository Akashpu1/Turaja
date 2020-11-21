<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends Front {

  public $data = array();

    public function __construct() {
        parent::__construct();
        @session_start();

        //===================================================
        // Loads Paytm Authorized Files
        //===================================================
      	header("Pragma: no-cache");
      	header("Cache-Control: no-cache");
      	header("Expires: 0");
        $this->load->model('common_model');
        $this->data['settings'] = $this->app_config();
        $this->data['cart'] = $this->get_cart();
        $this->load->library('cart');
        $this->load->library('Stack_web_gateway_paytm_kit');
	//===================================================
    }
    public function index()
    {
    }
    public function payby_paytm()  {
    	if(!empty($this->session->userdata('payby_paytm'))) {
    		$posted = $this->session->userdata('payby_paytm');
        $this->session->unset_userdata('payby_paytm');
    		$paytmParams = array();
    		$paytmParams['ORDER_ID'] 		= $posted['ORDER_ID'];
    		$paytmParams['TXN_AMOUNT'] 		= $posted['TXN_AMOUNT'];
    		$paytmParams["CUST_ID"] 		= $posted['CUST_ID'];
    		$paytmParams["EMAIL"] 			= (!empty($email)) ? $email : "" ;

		    $paytmParams["MID"] 			= PAYTM_MERCHANT_MID;
		    $paytmParams["CHANNEL_ID"] 		= PAYTM_CHANNEL_ID;
		    $paytmParams["WEBSITE"] 		= PAYTM_MERCHANT_WEBSITE;
		    $paytmParams["CALLBACK_URL"] 	= PAYTM_CALLBACK_URL;
		    $paytmParams["INDUSTRY_TYPE_ID"]= PAYTM_INDUSTRY_TYPE_ID;

		    $paytmChecksum = $this->stack_web_gateway_paytm_kit->getChecksumFromArray($paytmParams, PAYTM_MERCHANT_KEY);
		    $paytmParams["CHECKSUMHASH"] = $paytmChecksum;

		    $transactionURL = PAYTM_TXN_URL;
    		// p($posted);
    		// p($paytmParams,1);

    		$data = array();
    		$data['paytmParams'] 	= $paytmParams;
    		$data['transactionURL'] = $transactionURL;

    		$this->load->view('payment/payby_paytm', $data);
    	}
    }

    public function paytm_response() {
      $paytmChecksum 	= "";
  		$paramList 		= array();
  		$isValidChecksum= "FALSE";
      if ($_POST) {
        // code...
        $paramList = $_POST;
        //pre($paramList);exit;
        unset($_POST);
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

        $order = [
          "orderid" => $paramList["ORDERID"],
          "mid" => $paramList["MID"],
          // "txnid" => $paramList["TXTID"],
          "txnamount" => $paramList["TXNAMOUNT"],
          // "paymentmode" => $paramList["PAYMENTMODE"],
          "currency" => $paramList["CURRENCY"],
          // "txndate" => $paramList["TXNDATE"],
          "status" => $paramList["STATUS"],
          "respcode" => $paramList["RESPCODE"],
          "respmsg" => $paramList["RESPMSG"],
          // "gatewayname" => $paramList["GATEWAYNAME"],
          // "banktxnid" => $paramList["BANKTXNID"],
          // "bankname" => $paramList["BANKNAME"],
          "checksumhash" => $paramList["CHECKSUMHASH"],
        ];

        if ($this->common_model->insert($order, 'payments')) {
          $this->data['order'] = $order;
          $this->data['main_content'] = $this->load->view('checkout/congratulation', $this->data, true);
          $this->load->view('index', $this->data);
        }
      }else{
        echo json_encode(['error' => 1, 'msg' => 'access denied']);
      }
    }
}
?>
