<?php

class Shop_model extends CI_Model{

    public function __construct()
        {
                $this->load->database();
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

    public function update($id,$data,$table){
        $this->db->where('id',$id);
        $this->db->update($table,$data);
    }

    public function getSingleData($id){
        $this->db->where('id',$id);
        $query= $this->db->get('details');
        return $query->result_array();
    }
    function select($id,$type,$table){
      //echo $id;
        $this->db->select();
        $this->db->from($table);
        $this->db->where('port',$id);
        $this->db->where('type',$type);
        $this->db->join('products','products.id=indexing.root','inner');
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }



    function select_attr_color($id,$name,$type,$table){
      //echo $id;
        $this->db->select();
        $this->db->from($table);
        $this->db->where('port',$id);
        $this->db->where('type',$type);
        $this->db->join('products','products.id=indexing.root','inner');
        $this->db->join(' product_attributes as p', 'indexing.root=p.product_id', 'inner');
        $this->db->where('p.value', $name);
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
       $query = $query->result_array();
       return $query;

    }
    function select_attr_price($id,$min,$max,$type,$table){
      //echo $id;
        $this->db->select();
        $this->db->from($table);
        $this->db->where('port',$id);
        $this->db->where('type',$type);
        $this->db->join('products','products.id=indexing.root','inner');
        // $this->db->join(' product_attributes as p', 'indexing.root=p.product_id', 'inner');
        $this->db->where('products.price >=',$min );
        $this->db->where('products.price <=', $max);
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
       $query = $query->result_array();
       return $query;

    }

       function select_attr_name($table,$name){
      //echo $id;
        $this->db->select('product_attributes.value as fab_name');
        $this->db->from($table);
        $this->db->where('attribute.name',$name);
        $this->db->join('product_attributes ','product_attributes.attribute_id=attribute.id','inner');
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
       $query = $query->result_array();
       return $query;

    }


    function select_product_details($id,$table){
      //echo $id;
        $this->db->select('products.id,products.quantity,products.name,products.price,products.profile_pic,');
        $this->db->from($table);
        $this->db->where('products.id',$id);
        $this->db->join('indexing','products.id=indexing.root','left');
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }
    function select_product_details_byid($id,$table){
      //echo $id;
        $this->db->select('products.id,products.quantity,products.discount,products.description,products.name,products.price,products.profile_pic,indexing.port');
        $this->db->from($table);
        $this->db->where('products.id',$id);
        $this->db->join('indexing','products.id=indexing.root','left');
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }
}
