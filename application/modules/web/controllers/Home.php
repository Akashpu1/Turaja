<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front {

	public $data = array();
	public function __construct()
	{
		parent::__construct();

			$this->load->model('Common_model');
			$this->load->model('article_model');
			$this->load->model('Product_model');
			$this->load->model('Shop_model');
	  	$this->load->model('Homepage_model');
			$this->data['settings'] = $this->app_config();
			$this->data['cart'] = $this->get_cart();
      $this->load->library('cart');
		//Do your magic here
	}

	// public function cat(){
	// 	$data = $this->Product_model->cat();
	// 	$this->data['main_content'] = $this->load->view('home', $this->data, true);
    //     $this->load->view('index', $this->data);
	// 	pre($data);exit;
	// }





	public function index() {
				// $this->data['product'] =  $this->Product_model->getProductList();

				$this->data['newarrivals'] = $this->Product_model->get_new_newarrivals();

				$this->data['ready_to_wear'] = $this->Product_model->get_product_by_category(15);

				$this->data['fabric'] = $this->Product_model->get_product_by_category(14);
				$this->data['Saree'] = $this->Product_model->get_product_by_category(12);
				// pre($this->data['Saree'] );exit;
				$this->data['hedtitle'] = $this->Product_model->get_setiing('homesetting');
			   $this->data['cat'] =  $this->Product_model->cat();
			 
			//    pre($this->data['cat']);exit;

				$this->data['main_content'] = $this->load->view('home', $this->data, true);
        $this->load->view('index', $this->data);
	}

	// public function new_product(){
	// 	$this->data['newarrivals'] = $this->Product_model->get_new_newarrivals();
		
	// }


	public function faqs()
	{
		$this->data['page'] = 'FAQs';
		$data['faq_main'] = $this->Common_model->select("faq_main");
		$data['faqs'] = $this->Common_model->select("faqs");
		$this->data['main_content'] = $this->load->view('faqs', $data, true);
		$this->load->view('index', $this->data);
	}
	
	public function newsletter() {
			if($_POST) {
			    
			    	$this->Common_model->insert(array('email' =>$_POST['email'] ),'news_letter');
			    	redirect($_SERVER['HTTP_REFERER']);
			}
			redirect($_SERVER['HTTP_REFERER']);
    }

							public function view()
								{
									if($_POST) {
										//echo $_POST['id'];exit;
										$this->data['product_details']=  $this->Shop_model->select_product_details_byid($_POST['id'],'products');
										foreach($this->data['product_details'] as $value){
										$this->data['product_details']= $value;
										}
													//echo print_r($this->data['product_details']);exit;
										$this->data['attribute']=  $this->Product_model->select_attr($_POST['id'],'product_attributes');
										$this->data['pics']=  $this->Product_model->select($_POST['id'],'product_images');
									//	echo print_r($this->data['pics']);exit;
										// $this->data['data'] = $this->load->view('quickview/quickview', $this->data, true);
										$this->load->view('quickview/quickview1', $this->data);
                 }
								}



							    public function about() {
							        $this->data['page'] = 'About Us';
											$this->data['main_content'] = $this->load->view('about', $this->data, true);
							        $this->load->view('index', $this->data);
								}
								
								  public function embroidery() {
							        $this->data['page'] = 'Embroidery';
											$this->data['main_content'] = $this->load->view('embroidery', $this->data, true);
							        $this->load->view('index', $this->data);
								}
								
								  public function weaving() {
							        $this->data['page'] = 'weaving';
											$this->data['main_content'] = $this->load->view('weaving', $this->data, true);
							        $this->load->view('index', $this->data);
								}
								public function printing() {
							        $this->data['page'] = 'printing';
											$this->data['main_content'] = $this->load->view('printing', $this->data, true);
							        $this->load->view('index', $this->data);
								}
								
								public function surface() {
							        $this->data['page'] = 'surface';
											$this->data['main_content'] = $this->load->view('surface', $this->data, true);
							        $this->load->view('index', $this->data);
								}
								
								

								public function privacy(){
							        $this->data['page'] = 'Privacy policy';
											$this->data['main_content'] = $this->load->view('privacypolicy', $this->data, true);
							        $this->load->view('index', $this->data);
								}
								public function term(){

							        $this->data['page'] = 'Terms & Conditions';
									$this->data['main_content'] = $this->load->view('term', $this->data, true);
							        $this->load->view('index', $this->data);
								}

								public function return(){
							    $this->data['page'] = 'Refund/Exchange Policy';
									$this->data['main_content'] = $this->load->view('return', $this->data, true);
							    $this->load->view('index', $this->data);
							    }

							    public function contact(){
								  $this->data['page'] = 'contact Us';
		//  
		 $setting=json_decode($this->data['settings']->contact_us);
		 $this->data['contact']=$setting->{4};
										$this->data['main_content'] = $this->load->view('contact', $this->data, true);
							      $this->load->view('index', $this->data);
							    }
		public function my_account(){
				$this->data['page'] = 'Order';
				$this->data['product_data']=  $this->Common_model->select('products');
				$this->data['user_data']=  $this->Common_model->select('user_details');
				$this->data['main_content'] = $this->load->view('my_account', $this->data, true);
		$this->data['Menu_shop_image'] = $this->Homepage_model->get_menu_by_type('shop');
		$this->data['Menu_shop_text'] = $this->Common_model->get_menu('shop');
		$this->data['Menu_coll_image'] = $this->Homepage_model->get_menu_by_type('collection');
		$this->data['Menu_coll_text'] = $this->Common_model->get_menu('collection');
		$this->data['Menu_tech_image'] = $this->Homepage_model->get_menu_by_type('technique');
		$this->data['Menu_tech_text'] = $this->Common_model->get_menu('technique');
				$this->load->view('index', $this->data);
		}
	



}

/* End of file Home.php */
/* Location: ./application/modules/web/controllers/Home.php */
