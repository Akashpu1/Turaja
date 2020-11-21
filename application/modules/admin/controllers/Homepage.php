<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (check()) {
            if (!isAdmin($this->session->userdata('roles')))
                redirect(base_url(), 'refresh');
        } else {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('Common_model');
        $this->load->model('Shop_model');
        $this->load->model('Homepage_model');
    }
    

    public function menu()
    {
        $data = array();
        $data['page'] = 'category list';
        $data['menu'] = $this->Homepage_model->get_menu();
        $data['shop_image'] = $this->Homepage_model->get_menu_by_type('shop');
        $data['collect_image'] = $this->Homepage_model->get_menu_by_type('collection');
        $data['tech_image'] = $this->Homepage_model->get_menu_by_type('technique');
        //print_r($data['Lehenga']);exit;
        $data['main_content'] = $this->load->view('homepage/menu/index', $data, true);
        $this->load->view('index', $data);
    }
    public function faq()
    {
        $data = array();
        $data['page'] = 'FAQs';
        $data['faq_main'] = $this->Common_model->select("faq_main");
        $data['faqs'] = $this->Common_model->select("faqs");
        //print_r($data['Lehenga']);exit;
        $data['main_content'] = $this->load->view('faq', $data, true);
        $this->load->view('index', $data);
    }
   
    public function collection()
    {
        $data = array();
        $data['page'] = 'collection list';
        $data['collection'] = $this->Homepage_model->get_collection();
        $data['product_data'] =  $this->Common_model->select('products');
        $data['main_content'] = $this->load->view('homepage/collection/index', $data, true);
        $this->load->view('index', $data);
    }
    public function technique()
    {
        $data = array();
        $data['page'] = 'technique list';
      $data['technique'] = $this->Homepage_model->get_technique();
        // $data['shop_image'] = $this->Homepage_model->get_menu_by_type('shop');
        //print_r($data['Lehenga']);exit;
        $data['main_content'] = $this->load->view('homepage/technique/add', $data, true);
        $this->load->view('index', $data);
    }

    public function Collection_Add()
    {
        if ($_POST) {
           // print_r($_POST);exit;
            $data = $this->security->xss_clean($_POST);
            $data1['title'] = $data['title'];
            $data1['sub_title'] = $data['subtitle'];
            if (isset($data['menu']) == 1) {
                 $data1['menu'] = 1;

            } else {
                $data1['menu'] = 0;
            }
            $id= $this->Homepage_model->insert($data1, 'collection');
            if($data1['menu'] == 1){
                $data2['parent'] = 'collection';
                $data2['type'] = 'text';
                $data2['title'] = $data['title'];
                $data2['url'] =  'Pages/collection/' . $id;
                $this->Homepage_model->add_menu($data2);
            }

            foreach($data['product'] as $row) {

                $data3['collection_id'] = $id;
                $data3['product_id'] = $row;
                $this->Homepage_model->insert($data3, 'collection_product');
            }

            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function technique_Add()
    {
        if ($_POST) {
            // print_r($_POST);exit;
            $data = $this->security->xss_clean($_POST);
            $data1['title'] = $data['title'];
            $data1['sub_title'] = $data['subtitle'];
            $data1['description'] = $data['description'];
            if (isset($data['menu']) == 1) {
                $data1['menu'] = 1;
            } else {
                $data1['menu'] = 0;
            }
            $id = $this->Homepage_model->insert($data1, 'technique');
            if ($data1['menu'] == 1) {
                $data2['parent'] = 'technique';
                $data2['type'] = 'text';
                $data2['title'] = $data['title'];
                $data2['url'] =  'Pages/technique/' . $id;
                $this->Homepage_model->add_menu($data2);
            }



            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function Add($type)
    {
        if ($_POST) {
        //  pre($_POST);exit;
            $data = $this->security->xss_clean($_POST);

                $data1['type']= $type;
                // $data1['sno']= $data['sno'][$i];
                $data1['product_id'] = $data['product'];
                $this->Homepage_model->insert($data1,'carousel');
            
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function Add_menu()
    {
        if ($_POST) {
            $data = $this->security->xss_clean($_POST);
                $data1['parent']= 'shop';
                $data1['type'] = 'text';
                $data1['title'] = $data['title'];
                $data1['url'] = $data['url'];
                $this->Homepage_model->add_menu($data1);

            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function edit_menu_image($id)
    {
        if ($_POST) {
            $data = $this->security->xss_clean($_POST);
            //print_r($_FILES);exit;
            if (isset($_FILES['image']['name'])) {
                $config['upload_path']          = './uploads/product';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 11264;
                $config['max_width']            = 6000;
                $config['max_height']           = 6000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $img = $this->upload->data();
                    //  echo "<pre>";
                    //  print_r($img);
                    //  exit();
                    $pic = $img['file_name'];
                } else {
                    echo "file not uploaded";
                    echo $this->upload->display_errors();
                    exit;
                }
            } else {
                $pic = "";
                echo "file not found";
                exit;
            }
            $data1['image'] = $pic;
            $data1['title'] = $data['title'];
            $data1['url'] = $data['url'];
            $this->Homepage_model->edit_menu_image($data1, $id);

            redirect($_SERVER['HTTP_REFERER']);
        }
    }






}
