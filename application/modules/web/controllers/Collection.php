<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collection extends Front {

	public $data = array();
	public function __construct()
	{
		parent::__construct();
			$this->load->model('common_model');
			$this->load->model('shop_model');
			$this->load->model('product_model');
			$this->load->model('article_model');
			$this->load->model('Homepage_model');
			$this->load->library('cart');
			$this->load->library(['auth', 'session']);
			$this->data['settings'] = $this->app_config();
			$this->data['cart'] = $this->get_cart();

		//Do your magic here
	}
	public function index(){
		$data = array();
		$data['page'] = 'Wishlist';
		$social_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '';
		$data['social'] = json_decode($social_value, true);

	  $data['setting']=$this->common_model->select('homesetting');

		$data['product_data']=  $this->common_model->select('products');
    $data['cartIvalue'] = $this->cart->contents();
		$data['cartItems'] = $this->cart->contents();
		// echo "<pre>";
		// print_r($data['cartItems']);exit;
		$data['category']=  $this->common_model->select('category');
		$data['main_content'] = $this->load->view('collection/wishlist', $data, true);
		$data['Menu_shop_image'] = $this->Homepage_model->get_menu_by_type('shop');
		$data['Menu_shop_text'] = $this->common_model->get_menu('shop');
		$data['Menu_coll_image'] = $this->Homepage_model->get_menu_by_type('collection');
		$data['Menu_coll_text'] = $this->common_model->get_menu('collection');
		$data['Menu_tech_image'] = $this->Homepage_model->get_menu_by_type('technique');
		$data['Menu_tech_text'] = $this->common_model->get_menu('technique');
		$this->load->view('index', $data);
    }
		public function wishlist($id){
		//	echo $id;
				$data['product_details']=  $this->shop_model->select_product_details($id,'products');
			//	print_r($data['product_details']);exit;
				foreach($data['product_details'] as $value){
					$total = $value['price'];
					$dis = $value['discount'];
					$dis_price =  $value['price'] * ($value['discount'] / 100);
					$regular = $total - $dis_price;
					$data1 = array(
					 'id'    => $value['id'],
					 'qty'    => 1,
					 'price'    => $regular,
					 'name'    => $value['name'],
					 'gst'    => $value['gst'],
					 'image' => $value['profile_pic']
			 );

		$this->cart->insert($data1);
			 // Redirect to the cart page
			  redirect('web/Collection/');
				}

	}
		function updateItemQty(){
				$update = 0;

				// Get cart item info
				$rowid = $this->input->get('rowid');
				$qty = $this->input->get('qty');

				// Update item in the cart
				if(!empty($rowid) && !empty($qty)){
						$data = array(
								'rowid' => $rowid,
								'qty'   => $qty
						);
						$update = $this->cart->update($data);
				}
				// Return response
				echo $update?'ok':'err';
				redirect('web/collection/');
		}

		function removeItem($rowid){
				// Remove item from cart
				$remove = $this->cart->remove($rowid);
				// Redirect to the cart page
				redirect('web/home/');
		}

		function updatecart(){
				$update = 0;

				// Get cart item info
				$rowid = $this->input->get('rowid');
				$qty = $this->input->get('qty');

				// Update item in the cart
				if(!empty($rowid) && !empty($qty)){
						$data = array(
								'rowid' => $rowid,
								'qty'   => $qty
						);
						$update = $this->cart->update($data);
				}
				// Return response
				echo $update?'ok':'err';
				redirect('web/home/');
		}

		public function addtocard() {
			if ($_POST) {

				$pid = $this->security->xss_clean($_POST['pid']);
			$qty = $this->security->xss_clean($_POST['qty']);
			
				
			$unit = $this->security->xss_clean($_POST['unit']);
				if ($pid) {
					if ($this->product_model->exists($pid)) {
					
							$product_details =  $this->shop_model->select_product_details($pid, 'products');
							foreach($product_details as $value){
							$total = $value['price'];
							$dis = $value['discount'];
							$dis_price =  $value['price'] * ($value['discount'] / 100);
							$regular = $total - $dis_price;

							$carddata = array (
								'id'    => $value['id'],
								'qty'   => $qty,
								'price' => $regular,
								'name'  => $value['name'],
								'gst'   => $value['gst'],
								'image' => $value['profile_pic'],
								'unit' => $unit
							);

						if (isset($_POST['size'])) {
							$size = $this->security->xss_clean($_POST['size']);
							$carddata['size'] =  $size;
						}
							$data['value']=$this->cart->insert($carddata);
					pre($this->cart->contents());exit;
							//pre($data['value']);exit;

						}
					}
				}
			}
		}

		public function removetocard() {
			if ($_POST) {
				$pid = $this->security->xss_clean($_POST['pid']);
				if ($pid) {
					if ($this->cart->remove($pid)) {
						echo 1;
					}else{
						echo 0;
					}

				}
			}
		}
	public function quick_view()
	{
		// /pre($_POST) ;exit;
		$pid = $this->security->xss_clean($_POST['pid']);
		$data['product'] = $this->shop_model->select_product_details($pid, 'products');
		// /pre($data['product']);exit;
		$content =$this->load->view('quick_view/quick_view', $data);
		echo $content;
	}


		public function miniCart() {
			$data['cart'] = $this->data['cart'];
			$this->load->view('cart/mini-cart', $data);
		}
		public function cart_count() {
			echo count($this->data['cart']);
		}



		public function cart(){
				$data = array();
	      $data['page'] = 'Cart';
				$social_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '';
				$data['social'] = json_decode($social_value, true);
				$title_value = !empty($this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value : '';
			  $data['setting']=$this->common_model->select('homesetting');
	      $data['cartIvalue'] = $this->cart->contents();
				$data['product_data']=  $this->common_model->select('products');
				$data['user_data']=  $this->common_model->select('user_details');
				$data['category']=  $this->common_model->select('category');
				$data['main_content'] = $this->load->view('collection/cart', $data, true);
		$data['Menu_shop_image'] = $this->Homepage_model->get_menu_by_type('shop');
		$data['Menu_shop_text'] = $this->common_model->get_menu('shop');
		$data['Menu_coll_image'] = $this->Homepage_model->get_menu_by_type('collection');
		$data['Menu_coll_text'] = $this->common_model->get_menu('collection');
		$data['Menu_tech_image'] = $this->Homepage_model->get_menu_by_type('technique');
		$data['Menu_tech_text'] = $this->common_model->get_menu('technique');
				$this->load->view('index', $data);
		}



    public function checkout(){
        $data = array();
        $data['page'] = 'Checkout';
		    $email=$this->session->userdata('email');
				$phone=$this->session->userdata('phone');
			  $username=$this->session->userdata('username');
				$userid=$this->session->userdata('userID');

				if(check()) {
					// echo print_r($check);exit;
        $data['email']=$email;
		  	$data['phone']=$phone;
			  $data['username']=$username;
				$data['userid']=$userid;
			//	echo $data['userid'];exit;

				$social_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '';
				$data['social'] = json_decode($social_value, true);
				$title_value = !empty($this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value : '';
			  $data['setting']=$this->common_model->select('homesetting');
				$data['cartIvalue'] = $this->cart->contents();
        $data['product_data']=  $this->common_model->select('products');
        $data['user_data']=  $this->common_model->select('user_details');
				$data['category']=  $this->common_model->select('category');
		    $data['main_content'] = $this->load->view('collection/checkout',$data, true);
				$data['Menu_shop_image'] = $this->Homepage_model->get_menu_by_type('shop');
				$data['Menu_shop_text'] = $this->common_model->get_menu('shop');
				$data['Menu_coll_image'] = $this->Homepage_model->get_menu_by_type('collection');
				$data['Menu_coll_text'] = $this->common_model->get_menu('collection');
				$data['Menu_tech_image'] = $this->Homepage_model->get_menu_by_type('technique');
				$data['Menu_tech_text'] = $this->common_model->get_menu('technique');
        $this->load->view('index', $data);
			}
			else{
				 $this->load->view('authentication/login');
			}
    }


	function wish($rowid){
			// Remove item from cart
			$remove = $this->cart->remove($rowid);

			// Redirect to the cart page
			redirect('web/collection/');
	}
    public function compare(){
        $data = array();
        $data['page'] = 'Checkout';
				$social_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '';
				$data['social'] = json_decode($social_value, true);
				$data['setting']=$this->common_model->select('homesetting');
				$data['cartIvalue'] = $this->cart->contents();
        $data['product_data']=  $this->common_model->select('products');
        $data['user_data']=  $this->common_model->select('user_details');
				$data['category']=  $this->common_model->select('category');
		$data['main_content'] = $this->load->view('collection/compare', $data, true);
		$data['Menu_shop_image'] = $this->Homepage_model->get_menu_by_type('shop');
		$data['Menu_shop_text'] = $this->common_model->get_menu('shop');
		$data['Menu_coll_image'] = $this->Homepage_model->get_menu_by_type('collection');
		$data['Menu_coll_text'] = $this->common_model->get_menu('collection');
		$data['Menu_tech_image'] = $this->Homepage_model->get_menu_by_type('technique');
		$data['Menu_tech_text'] = $this->common_model->get_menu('technique');
        $this->load->view('index', $data);
    }


}
/* End of file Home.php */
/* Location: ./application/modules/web/controllers/Home.php */ ?>
