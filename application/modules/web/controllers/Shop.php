<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends Front {

	public $data = array();
	public function __construct(){
			parent::__construct();
			$this->load->model('common_model');
			$this->load->model('Shop_model');
			$this->load->model('product_model');
			$this->load->model('Homepage_model');
			$this->load->library('cart');
			$this->load->library("pagination");
			$this->data['settings'] = $this->app_config();
			$this->data['cart'] = $this->get_cart();
			$this->load->helper('url');
	}

	public function index() {
		$uri = $this->security->xss_clean($_GET);
		if (isset($uri['cat']) && !empty($uri['cat'])) {
			// pre($uri);exit;
			$cat = $uri['cat'];
          	// $this->data['product']= $this->product_model->get_category_id_by_name($cat);
						// print_r($this->data['product']);exit;
			// if (!empty($this->product_model->get_category_id_by_name($cat))) {
				// $this->data['product'] = $this->product_model->get_product_by_category($cat);
				$this->data['product'] = $this->product_model->get_product_by_sub_category($cat);
				// pre($this->data['product']);
				// $this->data['newarrivals'] = $this->product_model->get_new_newarrivals();

				// print_r($this->data['product']);exit;
				$this->data['listCount'] = $this->product_model->get_count_product_by_category($cat); 
				if($this->data['listCount']==0){
				$this->data['listCount'] = $this->product_model->get_count_product_by_sub_category($cat);
				}
				// pre($this->data['listCount1']);exit;
				$this->data['cat'] = $cat;
				$this->data['main_content'] = $this->load->view('shop/index', $this->data, true);
				$this->data['is_script'] = $this->load->view('shop/script', $this->data, true);
				$this->load->view('index', $this->data);
		
		}else{
			$this->data['product'] =  $this->product_model->getProductList();
			$this->data['listCount'] = count($this->data['product']);
			$this->data['cat'] = "all";
			$this->data['main_content'] = $this->load->view('shop/index', $this->data, true);
			$this->data['is_script'] = $this->load->view('shop/script', $this->data, true);
			$this->load->view('index', $this->data);
		}
  }

	public function load() {
			if ($_POST) {
				$uri = $this->security->xss_clean($_POST);
			} else {
				$uri = $this->security->xss_clean($_GET);
			}
			// pre($_POST);
			// pre($_GET);
			$perPage = 10;
			$page = 1;
			if(!empty($uri["page"])) {
				$page = $uri["page"];
			}
			$start = ($page-1)*$perPage;
			if($start < 0) $start = 0;
			if (isset($uri['filter']) && $uri['filter']) {
				$craft = $color = $price = array();
				$cat = $uri['cat'];
				

					if (isset($uri['craft'])) {
						$craft = $this->product_model->get_product_by_craft($cat, $uri['craft'], $start, $perPage);
						$craft = !empty($craft) ? $craft : [];
					}
					if (isset($uri['color'])) {
						$color = $this->product_model->get_product_by_color($cat, $uri['color'], $start, $perPage);
						$color = !empty($color) ? $color : [];
					}
					if (isset($uri['maximum_price'])) {
						$price = $this->product_model->get_product_by_price($cat, $uri['minimum_price'], $uri['maximum_price'], $start, $perPage);
						$price = !empty($price) ? $price : [];

					}
					
					$product = array_filter(array_merge($craft, $color, $price));
					$product1 = array_filter(array_merge($craft, $color, $price));
			} else {
				if(!empty($uri['cat'])) {
					$cat = $uri['cat'];
				
						$product = $this->product_model->get_product_by_category($cat, $start, $perPage);
						$product1 = $this->product_model->get_product_by_sub_category($cat, $start, $perPage);
						
			// pre($product1);
					
					
				}
		}
		if(!empty($uri["rowcount"])) {
			// $rowcount =$this->product_model->get_count_product_by_category($cat);
		}
		$pages  = ceil($perPage);

		if(!empty($product)) {
			$this->data['output'] = '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';
			$this->data['productlist'] = $product;
			// pre($this->data['productlist']);
			$this->load->view('shop/product-grid', $this->data);
		}
		else if(!empty($product1)) {
			$this->data['output'] = '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';
			$this->data['productlist'] = $product1;
			$this->load->view('shop/product-grid', $this->data);
		}
		else{
				$this->data['productlist'] = "";
				pre("hello1");exit;
			$this->load->view('shop/product-grid', $this->data);
		}
	
	}

	public function load_filter() {
		$uri = $this->security->xss_clean($_GET);
		if (isset($uri['cat']) && !empty($uri['cat'])) {
			$category = $uri['cat'];
			$this->data['cat'] = $category;
			// $this->data['color'] = $this->product_model->get_count_product_by_category_color($category);
			$this->data['craft'] = $this->common_model->select('craft');
			$this->load->view('filter/index', $this->data);
		}
	}


	public function filter_data() {
		$uri = $this->security->xss_clean($_POST);
		if (isset($uri['page']) && !empty($uri['page'])) {
  pre($uri);exit;
			$perPage = 10;
			$page = 1;
			if(!empty($uri["page"])) {
				$page = $uri["page"];
			}
			if(!empty($uri['cat'])) {
				$cat = $uri['cat'];
				$start = ($page-1)*$perPage;
				if($start < 0) $start = 0;
				if (!empty($this->product_model->get_category_id_by_name($cat))) {
					$product = $this->product_model->get_product_by_category($cat, $start, $perPage);
				}else{
					$product = $this->product_model->get_product_by_category('', $start, $perPage);
				}
				if(empty($_GET["rowcount"])) {
					// $rowcount =$this->product_model->get_count_product_by_category($cat);
				}
				$pages  = ceil($rowcount / $perPage);
				if(!empty($product)) {
					$this->data['output'] = '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';
					$this->data['productlist'] = $product;
					$this->load->view('shop/product-grid', $this->data);
				}
			}
		}
	}


		public function shop_by_category($id){
	         $data = array();
					 $data['id']=$id;
					$data1['id'] = $id;
					if($_POST){
						if($_POST['sort']== 'New'){
							$data1['groupby']= 'created_at';
							$data1['order']='desc';
						}else if($_POST['sort'] == 'Discount'){
						$data1['groupby'] = 'discount';
						$data1['order'] = 'desc';
						} elseif ($_POST['sort'] == 'Price_Asc') {
						$data1['groupby'] = 'price';
						$data1['order'] = 'asc';
						} elseif ($_POST['sort'] == 'Price_Desc') {
							$data1['groupby'] = 'price';
							$data1['order'] = 'desc';
								}else{
						$data1['groupby'] = 'created_at';
						$data1['order'] = 'desc';
								}
					} else {
						$data1['groupby'] = 'created_at';
						$data1['order'] = 'desc';
					}
		$config = $this->pagination_Config($id);
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		if ($page == 0) {
			$start =  1;
			$end = ( $config['per_page']  > $config['total_rows']) ? $config['total_rows'] :  $config['per_page'];
		} else {
			$start = ((int) $this->uri->segment(5)) + 1;
			$end = ((int) $this->uri->segment(5) + $config['per_page']  > $config['total_rows']) ? $config['total_rows'] : (int) $this->uri->segment(5) + $config['per_page'];
		}

		$data1['page']=$page;
		$data1['per_page']= $config["per_page"];
		$data['result_count'] = "Showing " . $start . " - " . $end . " of " . $config['total_rows'] . " Results";

		$data["links"] = $this->pagination->create_links();
	        $data['page'] = 'Category wishe product';
					$social_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '';
					$data['social'] = json_decode($social_value, true);
	        $data['cartIvalue'] = $this->cart->contents();
					$data['setting']=$this->common_model->select('homesetting');
	        $data['product_by_category']=  $this->Shop_model->select($data1,'category','indexing');
					 $data['count'] =count($data['product_by_category']);
					 $data['count'];
					 $data['attribute']=  $this->product_model->select_attr($id,'product_attributes');
           $data['fabric']=  $this->Shop_model->select_attr_name('attribute','Fabric');
					 $data['color']=  $this->Shop_model->select_attr_name('attribute','Color');
					 $data['pattern']=  $this->Shop_model->select_attr_name('attribute','Pattern');
	         $data['weaving']=  $this->Shop_model->select_attr_name('attribute','Weaving');
					 $data['category']=  $this->common_model->select('category');
					 if($_POST){
					$this->load->view('shop/list', $data);
					 }else{
			$data['content'] = $this->load->view('shop/list', $data, true);
			$data['main_content'] = $this->load->view('shop/shop', $data, true);
			$data['Menu_shop_image'] = $this->Homepage_model->get_menu_by_type('shop');
			$data['Menu_shop_text'] = $this->common_model->get_menu('shop');
			$data['Menu_coll_image'] = $this->Homepage_model->get_menu_by_type('collection');
			$data['Menu_coll_text'] = $this->common_model->get_menu('collection');
			$data['Menu_tech_image'] = $this->Homepage_model->get_menu_by_type('technique');
			$data['Menu_tech_text'] = $this->common_model->get_menu('technique');
			$this->load->view('index', $data);
					 }

	    }

			function color()
			 {
				$data=array();
				$this->security->xss_clean($_POST);
				if ($_POST) {
				$data['type']=$this->input->post('type');
				$data['searchtype']=$this->input->post('searchtype');
				if(isset($_POST['colorname']) && $_POST['colorname']!=''){
				$data['colorname'] = $this->input->post('colorname');
				}
			if (isset($_POST['fabricname']) && $_POST['fabricname'] != '') {
				$data['fabricname'] = $this->input->post('fabricname');
			}
			if (isset($_POST['weavingname']) && $_POST['weavingname'] != '') {
				$data['weavingname'] = $this->input->post('weavingname');
			}
			if (isset($_POST['parternname']) && $_POST['parternname'] != '') {
				$data['parternname'] = $this->input->post('parternname');
			}
			if (isset($_POST['max']) && isset($_POST['min']) && $_POST['max'] != ''&& $_POST['min'] != '') {
				$data['max'] = $this->input->post('max');
				$data['min'] = $this->input->post('min');
			}


				$data['id']=$this->input->post('id');

				if($data['searchtype']=='search')
				{
			  $data['items']=  $this->Shop_model->select_attr_price($data);
			}else{
				if(!null($_POST['colorname'] && $_POST['colorname']!=""))
				{
					  $data['id']=$this->input->post('id');
						$name=$this->input->post('colorname');
						$data['name'][]=$name;
				}
				if(!null($_POST['fabricname'] && $_POST['fabricname']!=""))
				{
					 $data['id']=$this->input->post('id');
						$name=$this->input->post('fabricname');
						$data['name'][]=$name;
				}
				$data['items']=  $this->Shop_model->select_attr_price($data);
     }

	      $data['cartIvalue'] = $this->cart->contents();
				$data['data'] = $this->load->view('shop/color_pro', $data, true);
				$this->load->view('shop/index', $data);
			}
		}

function filter()
{
	$data=array();
	$this->security->xss_clean($_POST);
	if ($_POST) {
    if (isset($_POST["color"])) {

        $data['color'] = implode("','", $_POST["color"]);
			  $data['name']=$data['color'];
    }

    if (isset($_POST["fabric"])) {
        $data['fabric'] = implode("','", $_POST["fabric"]);
        $data['name']=$data['fabric'];
    }

    if (isset($_POST["patern"])) {
        $data['patern'] = implode("','", $_POST["patern"]);
        $data['name']=$data['patern'];
    }
		$data['id']=$this->input->post('id');
		$data['items']=  $this->Shop_model->select_attr_color($data['id'],$data['name'],'category','indexing');
		$data['data'] = $this->load->view('shop/color_pro', $data, true);
		$this->load->view('shop/index', $data);
	}
}


			public function product_details($id){
				$data = array();
		if ($_POST) {
			if ($_POST['sort'] == 'New') {
				$data1['groupby'] = 'created_at';
				$data1['order'] = 'desc';
			} else if ($_POST['sort'] == 'Discount') {
				$data1['groupby'] = 'discount';
				$data1['order'] = 'desc';
			} elseif ($_POST['sort'] == 'Price_Asc') {
				$data1['groupby'] = 'price';
				$data1['order'] = 'asc';
			} elseif ($_POST['sort'] == 'Price_Desc') {
				$data1['groupby'] = 'price';
				$data1['order'] = 'desc';
			} else {
				$data1['groupby'] = 'created_at';
				$data1['order'] = 'desc';
			}
		} else {
			$data1['groupby'] = 'created_at';
			$data1['order'] = 'desc';
		}
		$config = $this->pagination_Config($id);
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		if ($page == 0) {
			$start =  1;
			$end = ($config['per_page']  > $config['total_rows']) ? $config['total_rows'] :  $config['per_page'];
		} else {
			$start = ((int) $this->uri->segment(5)) + 1;
			$end = ((int) $this->uri->segment(5) + $config['per_page']  > $config['total_rows']) ? $config['total_rows'] : (int) $this->uri->segment(5) + $config['per_page'];
		}

		$data1['page'] = $page;
		$data1['per_page'] = $config["per_page"];
		$data['result_count'] = "Showing " . $start . " - " . $end . " of " . $config['total_rows'] . " Results";

		$data["links"] = $this->pagination->create_links();
		        $data['page'] = 'product details';
						$social_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '';
						$data['social'] = json_decode($social_value, true);
						$data['setting']=$this->common_model->select('homesetting');
	          $data['cartIvalue'] = $this->cart->contents();
            $data['product_details']=  $this->Shop_model->select_product_details_byid($id,'products');
						foreach($data['product_details'] as $value){
						$data['product_details']= $value;
						}
						$data1['id'] = $data['product_details']['port'];
						$data['related_Product']=  $this->Shop_model->select($data1,'category','indexing');
		$data['category']=  $this->common_model->select('category');
		$data['attribute']=  $this->product_model->select_attr($id,'product_attributes');
		$data['pics']=  $this->product_model->select($id,'product_images');
		$data['main_content'] = $this->load->view('product/product_details', $data, true);
		$data['Menu_shop_image'] = $this->Homepage_model->get_menu_by_type('shop');
		$data['Menu_shop_text'] = $this->common_model->get_menu('shop');
		$data['Menu_coll_image'] = $this->Homepage_model->get_menu_by_type('collection');
		$data['Menu_coll_text'] = $this->common_model->get_menu('collection');
		$data['Menu_tech_image'] = $this->Homepage_model->get_menu_by_type('technique');
		$data['Menu_tech_text'] = $this->common_model->get_menu('technique');
		$this->load->view('index', $data);
		    }



		public function shop_list_left(){
				$data = array();
				$data['page'] = 'Cart';
				$social_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '';
				$data['social'] = json_decode($social_value, true);
			$data['setting']=$this->common_model->select('homesetting');
	$data['cartIvalue'] = $this->cart->contents();
				$data['product_data']=  $this->common_model->select('products');
				$data['user_data']=  $this->common_model->select('user_details');
				$data['category']=  $this->common_model->select('category');
			  $data['main_content'] = $this->load->view('shop/shop_list_left', $data, true);
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
				$social_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '';
				$data['social'] = json_decode($social_value, true);
				$data['setting']=$this->common_model->select('homesetting');
					$data['cartIvalue'] = $this->cart->contents();
        $data['product_data']=  $this->common_model->select('products');
        $data['user_data']=  $this->common_model->select('user_details');
				$data['category']=  $this->common_model->select('category');
		$data['main_content'] = $this->load->view('collection/checkout', $data, true);
		$data['Menu_shop_image'] = $this->Homepage_model->get_menu_by_type('shop');
		$data['Menu_shop_text'] = $this->common_model->get_menu('shop');
		$data['Menu_coll_image'] = $this->Homepage_model->get_menu_by_type('collection');
		$data['Menu_coll_text'] = $this->common_model->get_menu('collection');
		$data['Menu_tech_image'] = $this->Homepage_model->get_menu_by_type('technique');
		$data['Menu_tech_text'] = $this->common_model->get_menu('technique');
        $this->load->view('index', $data);
    }
public function pagination_Config($id)
	{
		$config = array();
		$config["base_url"] = base_url() . "web/shop/shop_by_category/". $id.'/';
		$config["total_rows"] = $this->Shop_model->get_count($id, 'category', 'indexing');
		$config["per_page"] = 20;
		$config["uri_segment"] = 5;
		$config['num_links'] =5;

		$config['display_pages'] = TRUE;

		$config['next_link']        = 'Next <i class="pe-7s-angle-right"></i>';
		$config['prev_link']        = 'Prev <i class="pe-7s-angle-left"></i>';
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['full_tag_open']    = '<ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul>';
		$config['attributes']       = ['class' => 'page-link'];
		$config['first_tag_open']   = '<li class="page-item">';
		$config['first_tag_close']  = '</li>';
		$config['prev_tag_open']    = '<li class="page-item">';
		$config['prev_tag_close']   = '</li>';
		$config['next_tag_open']    = '<li class="page-item">';
		$config['next_tag_close']   = '</li>';
		$config['last_tag_open']    = '<li class="page-item">';
		$config['last_tag_close']   = '</li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['num_tag_open']     = '<li class="page-item">';
		$config['num_tag_close']    = '</li>';
		$this->pagination->initialize($config);

		return $config;
	}

}

/* End of file Home.php */
/* Location: ./application/modules/web/controllers/Home.php */ ?>
