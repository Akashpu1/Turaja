<?php
defined('BASEPATH') or exit('No direct script access allowed');

class faq extends CI_Controller
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
        $this->load->model('Product_model');
    }
   



    public function Delete($id)
    {
        $data1 = ['id' => $id];
        $this->Common_model->delete($data1, 'faqs');
        redirect(base_url() . 'admin/homepage/faq', 'refresh');
    }
    public function add()
    {
        if ($_POST) {
            $data1 = $this->security->xss_clean($_POST);
            $faq = [
                'question' => $data1['title'],
                'answer' => $data1['content'],
            ];
            $this->Common_model->insert($faq,  'faqs');
            redirect(base_url() . 'admin/homepage/faq', 'refresh');
        }
    }
    public function update()
    {
        if ($_POST) {
            $data1 = $this->security->xss_clean($_POST);
            $faq = [
                'heading' => $data1['title'],
                'content' => $data1['content'],
            ];
            $this->Common_model->update($faq,'id',1,  'faq_main');
            redirect(base_url() . 'admin/homepage/faq', 'refresh');
        }
    }
   
}
