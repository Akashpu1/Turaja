<?php

class Contact_model extends CI_Model{

    public function __construct()
        {
                $this->load->database();
        }
    public function putdata($data){

        $this->db->insert('details', $data);

    }

    public function getdata(){
        $this->db->order_by("id", "desc");
       $query= $this->db->get('details');
      // echo "<pre>"; print_r($query->result_array());exit;
        return $query->result_array();
    }

    public function delete($id){
        $this->db->delete('details',array('id'=>$id));
    }

    public function update($id,$data){
        $this->db->where('id',$id);
        $this->db->update('details',$data);
    }

    public function getSingleData($id){
        $this->db->where('id',$id);
        $query= $this->db->get('details');
        return $query->result_array();
    }
    public function newcontact($table,$id,$value){
      $this->db->select('status');
      $this->db->from($table);
      $this->db->where($id,$value);
      $id = $this->db->get()->num_rows();
      return $id;
    }
    public function newcustomer($table){
      $this->db->select('email');
      $this->db->from($table);
      $id = $this->db->get()->num_rows();
      return $id;
    }

    function contact_list($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('status','New');
        $this->db->order_by('id','decs');
        $this->db->limit(10);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
}
