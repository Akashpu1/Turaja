<?php

class Yourorder_model extends CI_Model{

    public function __construct() {
      $this->load->database();
    }

  public function getuserorder($id) {
    $sql = "SELECT orders.*, SUM(order_items.quantity) AS quantity, SUM(order_items.sub_total) AS total FROM orders
            INNER JOIN order_items ON orders.id = order_items.order_id
            WHERE customer_id = '{$id}' GROUP BY orders.id ";

    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }
  
  public function get_oder_by_id($id)
  {
    $sql = "SELECT order_items.*,products.name,products.price ,products.profile_pic  FROM order_items
            INNER JOIN products ON products.id = order_items.product_id
            WHERE order_items.order_id = '{$id}' GROUP BY order_items.id ";

    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }
public function getLimitOrder(){
  $this->db->select('c.customer_name, c.email, c.phone,c.postcode,c.address,o.id,o.created,o.status');
  $this->db->from('orders as o');
  $this->db->join('customers as c', 'c.id =o.customer_id', 'inner');
  $this->db->where('o.status',1);
  $this->db->limit(10);
  $query = $this->db->get();
//  echo $this->db->last_query($query);exit;
  $query = $query->result_array();
  return $query;
}

public function invoice($id){
  $this->db->select('c.customer_name, c.email, c.phone,c.postcode,c.address,o.id,o.created,payments.payment,payments.transaction,payments.created_date');
  $this->db->from('orders as o');
  $this->db->where('o.id',$id);
  $this->db->join('customers as c', 'c.id =o.customer_id', 'left');
  $this->db->join('payments', 'payments.userid=c.id','left');
  $query = $this->db->get();
//  echo $this->db->last_query($query);exit;
  $query = $query->result_array();
  return $query;
}
public function orderItems(){
  $this->db->select('o.grand_total,payments.payment,o.created,o.id,o.status,p.name,p.price,p.profile_pic,order_items.quantity,order_items.sub_total');
  $this->db->from('orders as o');
  $this->db->where('o.user_id',$this->session->userdata('userID'));
  $this->db->join('order_items', 'order_items.order_id =o.id', 'left');
  $this->db->join('products as p', 'p.id=order_items.product_id','left');
  $this->db->join('payments', 'payments.orderid=o.id','left');

  $query = $this->db->get();
//  echo $this->db->last_query($query);exit;
  $query = $query->result_array();
  return $query;
}


}
