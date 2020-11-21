<?php

class Product_model extends CI_Model{

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

    public function get_setiing($table){
        $this->db->select('');
        $query= $this->db->get($table);
      // echo "<pre>"; print_r($query->result_array());exit;
        return $query->row();
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
    public function get_size_data($id){
        $this->db->select('*');
        $this->db->where('productId	',$id);
        $query= $this->db->get('size');
        //echo $this->db->last_query($query);exit;
        return $query->result_array();
    }

    public function exists($id) {
      return $this->db->get_where('products', array('id' => $id) )->num_rows();
    }
    public function find($id) {
      return $this->db->get_where('products', array('id' => $id) )->row();
    }
    public function gallery($id) {
      return $this->db->select('image')->get_where('product_images', array('product_id' => $id) )->result_array();
    }
    function select($id,$table) {
      //echo $id;
        $this->db->select();
        $this->db->from($table);
        $this->db->where('product_id',$id);
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }
    function select_product($id,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }
    function get_categoryName($id,$table){
        $this->db->select('name');
        $this->db->from($table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        
        $query = $query->row();
        return $query;
    }

    function select_tag($id,$type){
      //echo $id;
        $this->db->select('indexing.id,tags.title');
        $this->db->from('indexing');
        $this->db->where('root',$id);
        $this->db->where('type',$type);
        $this->db->join('tags','tags.id=indexing.port','inner');
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }
    function select_cat($id,$type){
      //echo $id;
        $this->db->select('indexing.id,category.name');
        $this->db->from('indexing');
        $this->db->where('root',$id);
        $this->db->where('type',$type);
        $this->db->join('category','category.id=indexing.port','inner');
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }
    
    
    function select_attr($id){
      //echo $id;
        $this->db->select('attribute.name,product_attributes.product_attribute_id as id,product_attributes.value as value');
        $this->db->from('product_attributes');
        $this->db->where('product_id',$id);
        $this->db->join('attribute','attribute.id=product_attributes.attribute_id','inner');
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }
    function select_color($id,$table){
      //echo $id;
        $this->db->select('value');
        $this->db->from($table);
        $this->db->where('product_id',$id);
        $this->db->where('attribute_id',20);
        $this->db->join('attribute','attribute.id=product_attributes.attribute_id','inner');
        $query = $this->db->get();
      //  echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }

    function select_all_product($table){
      //echo $id;
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('product_attributes','product_attributes.product_id = products.id');
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }

    function select_attribute($table,$attribute_id){
      //echo $id;
        $this->db->select('name');
        $this->db->from($table);
        $this->db->where('id',$attribute_id);
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }
    function select_best_product($status,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('status',$status);
        $query = $this->db->get();
        //echo $this->db->last_query($query);exit;
        $query = $query->result_array();
        return $query;
    }
    public function getOrder($id){
      $this->db->select('orders.*, customers.customer_name, customers.email, customers.phone, customers.address');
      $this->db->from('orders');
      $this->db->join('customers', 'customers.id = orders.customer_id', 'left');
      $this->db->where('orders.id', $id);
      $query = $this->db->get();
      $result = $query->row_array();

      // Get order items
      $this->db->select('i.*, p.profile_pic, p.name, p.price');
      $this->db->from('order_items as i');
      $this->db->join('products as p', 'p.id = i.product_id', 'left');
      $this->db->where('i.order_id', $id);
      $query2 = $this->db->get();
      $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();

      // Return fetched data
      return !empty($result)?$result:false;
  }
  public function getAllOrder(){
    $this->db->select('orders.*,customers.*');
    $this->db->from('orders');
    $this->db->join('customers', 'customers.id = orders.customer_id', 'inner');
    $query = $this->db->get();
//   echo $this->db->last_query($query);exit;
    $query = $query->result_array();
    return $query;
}


public function getLimitOrder(){
  $this->db->select('orders.*,customers.*');
  $this->db->from('orders');
  $this->db->join('customers', 'customers.id = orders.customer_id', 'inner');

  $this->db->limit(10);
  $query = $this->db->get();
//  echo $this->db->last_query($query);exit;
  $query = $query->result_array();
  return $query;
}


public function invoice($id){
  $this->db->select('orders.*,customers.*');
  $this->db->from('orders');
  $this->db->join('customers', 'customers.id = orders.customer_id', 'inner');
  $this->db->join('payments', 'payments.orderid=customers.id','left');
  $query = $this->db->get();
//  echo $this->db->last_query($query);exit;
  $query = $query->result_array();
  return $query;
}
public function invoiceOrder($id){
  $this->db->select('o.grand_total,p.name,p.price,order_items.quantity,order_items.sub_total');
  $this->db->from('orders as o');
  $this->db->where('o.id',$id);
  $this->db->join('order_items', 'order_items.order_id =o.id', 'left');
  $this->db->join('products as p', 'p.id=order_items.product_id','left');

  $query = $this->db->get();
//  echo $this->db->last_query($query);exit;
  $query = $query->result_array();
  return $query;
}
public function newAllOrder(){
  $this->db->select('status');
  $this->db->from('orders');
  $this->db->where('status',1);
  $id = $this->db->get()->num_rows();
  return $id;
}
public function totalOrder(){
  $this->db->select('status');
  $this->db->from('orders');
  $id = $this->db->get()->num_rows();
  return $id;
}
public function pending(){
  $this->db->select('status');
  $this->db->from('orders');
  $this->db->where('status',3);
  $id = $this->db->get()->num_rows();
  return $id;
}
public function accepted(){
  $this->db->select('status');
  $this->db->from('orders');
  $this->db->where('status',2);
  $id = $this->db->get()->num_rows();
  return $id;
}
public function cancle(){
  $this->db->select('status');
  $this->db->from('orders');
  $this->db->where('status',4);
  $id = $this->db->get()->num_rows();
  return $id;
}

public function get_product_by_craft($category, $craft, $start = 0, $end = 0) {
  $product = array();
  $catlist = array();
  $cate = self::get_category_id_by_name($category);
  if (!empty($cate)) {
    self::subcategory_by_root($cate->id, $catlist);
    if (is_array($catlist)) {
      foreach ($catlist as $value) {
        if ($end > 0) {
          $productlist[] = self::get_product_list_by_index($value, $start, $end);
        }else{
          $productlist[] = self::get_product_list_by_index($value);
        }
      }
    }else{
      if ($end > 0) {
        $productlist = self::get_product_list_by_index($value, $start, $end);
      }else{
        $productlist = self::get_product_list_by_index($value);
      }
    }
    if (!empty($productlist)) {
      foreach (array_flatten($productlist) as $value) {
        if ($this->exists($value)) {

          if (is_array($craft)) {
            foreach ($craft as $temp) {
              $sql = "SELECT * FROM products WHERE id = '{$value}' AND craft = '{$temp}'";
              $product[] = $this->db->query($sql)->row();
            }
          }
        }
      }
      return $product;
    }
  }
}

public function get_product_by_price($category, $min, $max, $start = 0, $end = 0) {
  $product = array();
  $catlist = array();
  $cate = self::get_category_id_by_name($category);
  if (!empty($cate)) {
    self::subcategory_by_root($cate->id, $catlist);
    if (is_array($catlist)) {
      foreach ($catlist as $value) {
        if ($end > 0) {
          $productlist[] = self::get_product_list_by_index($value, $start, $end);
        }else{
          $productlist[] = self::get_product_list_by_index($value);
        }
      }
    }else{
      if ($end > 0) {
        $productlist = self::get_product_list_by_index($value, $start, $end);
      }else{
        $productlist = self::get_product_list_by_index($value);
      }
    }
    if (!empty($productlist)) {
      foreach (array_flatten($productlist) as $value) {
        if ($this->exists($value)) {

            $sql = "SELECT * FROM products WHERE id = {$value} AND price > {$min} AND price < {$max}";

          $product[] = $this->db->query($sql)->row();
        }
      }
      return $product;
    }
  }
}

public function get_product_by_color($category, $color, $start = 0, $end = 0) {
  $product = array();
  $catlist = array();
  $cate = self::get_category_id_by_name($category);
  if (!empty($cate)) {
    self::subcategory_by_root($cate->id, $catlist);
    if (is_array($catlist)) {
      foreach ($catlist as $value) {
        if ($end > 0) {
          $productlist[] = self::get_product_list_by_index($value, $start, $end);
        }else{
          $productlist[] = self::get_product_list_by_index($value);
        }
      }
    }else{
      if ($end > 0) {
        $productlist = self::get_product_list_by_index($value, $start, $end);
      }else{
        $productlist = self::get_product_list_by_index($value);
      }
    }
    if (!empty($productlist)) {
      foreach (array_flatten($productlist) as $value) {
        if ($this->exists($value)) {
          if (is_array($color)) {
            foreach ($color as $temp) {
              $sql = "SELECT products.* FROM products
              INNER JOIN product_attributes ON products.id = product_attributes.product_id
              WHERE products.id = {$value} AND product_attributes.value = '{$temp}' ";

              $product[] = $this->db->query($sql)->row();
            }
          }
        }
      }
      return $product;
    }
  }
}

public function get_product_by_category($category, $start = 0, $end = 0) {
  $product = array();
  $catlist = array();
  $cate = self::get_category_id_by_name($category);
  if (!empty($cate)) {
    self::subcategory_by_root($cate->id, $catlist);
    if (is_array($catlist)) {
      foreach ($catlist as $value) {
        if ($end > 0) {
          $productlist[] = self::get_product_list_by_index($value, $start, $end);
        }else{
          $productlist[] = self::get_product_list_by_index($value);
        }
      }
    }else{
      if ($end > 0) {
        $productlist = self::get_product_list_by_index($value, $start, $end);
      }else{
        $productlist = self::get_product_list_by_index($value);
      }
    }
    if (!empty($productlist)) {
      foreach (array_flatten($productlist) as $value) {
        if ($this->exists($value)) {

            $sql = "SELECT * FROM products WHERE id = {$value}";

          $product[] = $this->db->query($sql)->row();
        }
      }
      return $product;
    }
  }
}

public function get_count_product_by_category($category) {
  $product = array();
  $catlist = array();
  $cate = self::get_category_id_by_name($category);
  if (!empty($cate)) {
    self::subcategory_by_root($cate->id, $catlist);
    if (is_array($catlist)) {
      foreach ($catlist as $value) {
        $productlist[] = self::get_product_list_by_index($value);
      }
    }else{
      $productlist = self::get_product_list_by_index($value);
    }
    return count(array_count_values(array_flatten($productlist)));
  }else{
    return 0;
  }
}

public function subcategory_by_root($cat, &$catlist) {
  if (self::subcategoryexist($cat)) {
    $catlist[] = $cat;
    $subcate = self::get_subcategory_id_by_root($cat);
    foreach ($subcate as $value) {
      $catlist[] = $value->id;
      if (self::subcategoryexist($value->id)) {
        self::subcategory_by_root($value->id, $catlist);
      }
    }
  } else {
    $catlist[] = $cat;
  }
}

public function get_count_product_by_category_color($category) {
  $product = array();
  $catlist = array();
  $cate = self::get_category_id_by_name($category);
  if (!empty($cate)) {
    self::subcategory_by_root($cate->id, $catlist);
    if (is_array($catlist)) {
      foreach ($catlist as $value) {
        $productlist[] = self::get_product_list_by_index($value);
      }
    }else{
      $productlist = self::get_product_list_by_index($value);
    }
// Get Return Color Count
    return self::color_by_product(implode("," , array_flatten($productlist)));

  }else{
    return 0;
  }
}

public function color_by_product($product) {
  $sql = "SELECT product_attributes.value AS color, COUNT(product_attributes.product_attribute_id) AS colorCount FROM attribute
          INNER JOIN product_attributes ON attribute.id = product_attributes.attribute_id
          WHERE attribute.name = 'Color' AND product_attributes.product_id IN ({$product})
          GROUP BY product_attributes.value";
  return $this->db->query($sql)->result_array();
}

public function subcategoryexist($cat){
  return $this->db->get_where('category', array('parent' => $cat))->num_rows();
}


public function get_category_id_by_name($name) {
  //echo $name;exit;
  return $this->db->select('id')->from('category')->where('name LIKE ', '%'.$name)->get()->row();

}

public function get_subcategory_id_by_root($id) {
  return $this->db->select('id')->get_where('category', array('parent' => $id))->result();
}

public function get_product_list_by_index($id, $start = 0, $end = 0){
  if ($end > 0) {
    return $this->db->select('root')->from('indexing')->where('port', $id)->where('type', 'category')->limit($end, $start)->get()->result_array();
  }else{
    return $this->db->select('root')->get_where('indexing', array('port' => $id, 'type' => 'category'))->result_array();
  }
}



public function getProductList(){
  $sql = "SELECT products.*, category.name AS category_name FROM products
          INNER JOIN indexing ON products.id = indexing.root AND indexing.type = 'category'
          LEFT JOIN category ON indexing.port = category.id
          GROUP BY products.id";
    return $this->db->query($sql)->result_array();
}
}
