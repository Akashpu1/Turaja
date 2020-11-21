<?php
class Article_model extends CI_Model {
        public function __construct()
        {
          $this->load->database();
        }

        public function getArticleMaxId(){
          $query = $this->db->select("MAX(postid) AS postid")->from('article')->get()->row()->postid;
          if ($query) {
            return $query;
          }else {
            return '001';
          }
        }

        public function select_published(){
             $this->db->select("*");
             $this->db->from('article');
             $this->db->where('is_publish','1');
             $this->db->order_by('created_at','ASC');
             $query = $this->db->get();
             $query = $query->result_array();
             return $query;
         }
         public function select_article_data(){
              $this->db->select("*");
              $this->db->from('article');
              $this->db->join('thumbnail', 'thumbnail.root=article.postid');
              $this->db->where('is_publish','1');
              $this->db->order_by('created_at','ASC');
              $query = $this->db->get();
            // echo   $this->db->last_query();exit;
              $query = $query->result_array();
              return $query;
          }
        public  function select_draft(){
             $this->db->select();
             $this->db->from('article');
             $this->db->where('is_publish','0');
             $this->db->order_by('created_at','ASC');
             $query = $this->db->get();
             $query = $query->result_array();
             return $query;
         }
         function select_by_id($id){
           $this->db->select("*");
           $this->db->from('article');
           $this->db->where('id', $id);
           $query = $this->db->get();
           return $query->row();
       }

        public  function select_deleted(){
           $this->db->select();
           $this->db->from('article');
           $this->db->where('deleted','1');
           $this->db->order_by('created_at','ASC');
           $query = $this->db->get();
           $query = $query->result_array();
           return $query;
       }

        public  function getArticleByRoot($id){
             $this->db->select('*');
             $this->db->from('article');
             $this->db->where('deleted','1');
             $this->db->order_by('created_at','ASC');
             $query = $this->db->get();
             $query = $query->result_array();
             return $query;
         }

}
