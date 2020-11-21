<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Front {

	public $data = array();

	public function __construct()
	{

		parent::__construct();

			$this->load->model('common_model');
			$this->load->model('product_model');
			$this->load->library('cart');
			$this->load->model('Homepage_model');
			$this->data['settings'] = $this->app_config();
		//Do your magic here
	}
	
		public function index() {
		$uri = $this->security->xss_clean($_GET);
		 if (isset($uri['pid']) && !empty($uri['pid'])) {
			$pid = $uri['pid'];

			if ($this->product_model->exists($pid)) {
				$this->data['product'] = $this->product_model->find($pid);

					$this->data['category'] = $this->product_model->get_categoryName($this->data['product']->category,'category');
					if (!empty($this->data['category'])) {
						// code...
						$cat = $this->data['category']->name;
					}else{
						$cat = '';
					}

					$this->data['related'] = $this->product_model->get_product_by_category($cat);


					$this->data['shopthelook'] = self::shopthelook($this->data['product']->shopthelook);


			    $this->data['size'] = $this->product_model->get_size_data($pid);
				 //print_r($this->data['size']);
				$this->data['attribute'] = $this->product_model->select_attr($pid);
				$this->data['gallery'] = $this->product_model->gallery($pid);
				$this->data['main_content'] = $this->load->view('products/single-product', $this->data, true);
				$this->data['is_script'] = $this->load->view('products/script', $this->data, true);
				$this->load->view('index', $this->data);
			}else{
				$this->session->set_flashdata(array('error' => 0, 'msg' => 'Product Information Not Found'));
				echo json_encode(['errro' => 1, 'msg' => 'Product Not Exists']);
			}
		}
  }
  
		public function shopthelook($keys) {
			if (!empty($keys)) {
				$cate = json_decode($keys);
				if (is_array($cate)) {

					$output = array();
					foreach ($cate as $key => $value) {
						$category = $this->product_model->get_categoryName($value, 'category');
						if (!empty($category)) {
							$cat = $category->name;
						}else{
							$cat = '';
						}
						$data = $this->product_model->get_product_by_category($cat);
						$output = array_merge($output, $data);
					}
					return $output;
				}else{
					return;
				}
			}else{
				return;
			}
		}

		public function product_variable() {
				$this->data = array();
				$this->data['page'] = 'Cart';
				$social_value = !empty($this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value) ? $this->db->get_where('setting', array('setting_name' => 'social_icon'))->row()->setting_value : '';
				$this->data['social'] = json_decode($social_value, true);
			    $this->data['setting']=$this->common_model->select('homesetting');

				$this->data['product_data']=  $this->common_model->select('products');
				$this->data['category']=  $this->common_model->select('category');
				$this->data['user_data']=  $this->common_model->select('user_details');
			    $this->data['main_content'] = $this->load->view('product/product_variable', $this->data, true);
        		$this->data['Menu_shop_image'] = $this->Homepage_model->get_menu_by_type('shop');
        		$this->data['Menu_shop_text'] = $this->common_model->get_menu('shop');
        		$this->data['Menu_coll_image'] = $this->Homepage_model->get_menu_by_type('collection');
        		$this->data['Menu_coll_text'] = $this->common_model->get_menu('collection');
        		$this->data['Menu_tech_image'] = $this->Homepage_model->get_menu_by_type('technique');
        		$this->data['Menu_tech_text'] = $this->common_model->get_menu('technique');
				$this->load->view('index', $this->data);
		}

		public function notifac()
		{

			if($_POST){

		        $data1=$this->security->xss_clean($_POST);

					  $tag=[
							'proId' => $data1['proId'],
							'proName' => $data1['proName'],
							'size' => $data1['size'],
							'name' => $data1['name'],
							'mobile' => $data1['mobile'],
					    ];
					$this->common_model->insert($tag,'notification');
					redirect($_SERVER['HTTP_REFERER']);

			}
		}

    }

/* End of file Home.php */
/* Location: ./application/modules/web/controllers/Home.php */ ?>
