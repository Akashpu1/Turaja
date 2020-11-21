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
    function select($data,$type,$table){

        $this->db->select();
        $this->db->from($table);
        $this->db->limit($data['per_page'], $data['page']);
        $this->db->where('port',$data['id']);
        $this->db->where('type',$type);
        $this->db->join('products','products.id=indexing.root','inner');
         $this->db->order_by($data['groupby'], $data['order']);
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }
    function select_corosel($port,$type,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('type',$type);
        $this->db->where('port',$port);
        $this->db->join('products','products.id=indexing.root','inner');
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }
  function get_count($id, $type, $table)
  {
    //echo $id;
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where('port', $id);
    $this->db->where('type', $type);
    $this->db->join('products', 'products.id=indexing.root', 'inner');
    $query = $this->db->get();
    //print_r($query->num_rows()) ;exit;
    return $query->num_rows();

  }


    function select_attr_color($id,$name,$type,$table){
       // echo $id.$name;exit;
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

    function select_attr_price($data){
       if($data['type']=='price'){

        $this->db->select();
        $this->db->from('indexing');
        $this->db->where('port',$data['id']);
        $this->db->where('type','category');
        $this->db->where('products.price >=',$data['min'] );
        $this->db->where('products.price <=', $data['max']);
        $this->db->join('products','products.id=indexing.root','inner');
      //  $this->db->join(' product_attributes as p', 'indexing.root=p.product_id', 'inner');

    }else{

      $this->db->select();
      $this->db->from('indexing');
      $this->db->where('port',$data['id']);
      $this->db->where('type','category');
      $this->db->join('products','products.id=indexing.root','inner');
      $this->db->join(' product_attributes as p', 'indexing.root=p.product_id', 'inner');

      if($data['type']=='Fabric' ){
       if(!is_array($data['fabricname'])){
         if($data['fabricname']!="")
         {
           $this->db->where('p.value', $data['fabricname']);
         }
     }
   }
   elseif($data['type']=='Color'){
    if(!is_array($data['colorname'])){
      if($data['colorname']!="")
      {
        $this->db->where('p.value', $data['colorname']);
      }
  }
}
elseif($data['type']=='Pattern'){
 if(!is_array($data['parternname'])){
   if($data['parternname']!="")
   {
     $this->db->where('p.value', $data['parternname']);
   }
}
}
elseif($data['type']=='Weaving'){
 if(!is_array($data['weavingname'])){
   if($data['weavingname']!="")
   {
     $this->db->where('p.value', $data['weavingname']);
   }
}
}
else{
       $count =count($data['name']);
       for($i=0;$i<$count;$i++){
       $this->db->where('p.value', $data['name']);
     }
   }

}
    $query = $this->db->get();
//echo $this->db->last_query($query);exit;
    $query = $query->result_array();
    return $query;

    }


    function select_attr_name($table,$name){
      //echo $id;
        $this->db->distinct();
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
        return $this->db->get_where($table, array('id' => $id))->result_array();
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


    public function get_order($id){
      return $this->db->get_where('orders', array('id' => $id))->row();
    }
}
