<?php
class Common_model extends CI_Model {
public function __construct()
        {
                $this->load->database();
        }
    //-- insert function
	public function insert($data,$table){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    public function Login_check($data){
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'AND role='".$data['role']."'" ;
            $this->db->select('*');
            $this->db->from('logme');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
            return $query->result_array();
            } else {
            return false;
            }
        }

    public function Login_check_mobile($data){
        $condition = "phone =" . "'" . $data['mobile']."'AND role='s'" ;
            $this->db->select('*');
            $this->db->from('logme');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
            return $query->result_array();
            } else {
            return false;
            }
        }
         public function check_user($data){

            $this->db->select('*');
            $this->db->from('logme');
            $this->db->where('email',$data['username']);
            $this->db->or_where('phone',$data['username']);
            $this->db->limit(1);
            $query = $this->db->get();
        //    echo $this->db->last_query();exit;
            if ($query->num_rows() == 1) {
              return $query->row();
            } else {
              return false;
            }
        }
        public function last_update($table){

           $this->db->select('id');
           $this->db->from($table);
            $this->db->order_by('modified','desc');
           $this->db->limit(1);
           $query = $this->db->get();
          //echo $this->db->last_query();exit;
          if ($query->num_rows() == 1) {
          return $query->row();
          } else {
          return false;
          }

       }

        public function get_otp($data){

            $this->db->select('*');
            $this->db->from('message');
            $this->db->where('key',$data['mobile']);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
            return $query->result_array();
            } else {
            return false;
            }
        }
public function check_otp($data){

            $this->db->select('*');
            $this->db->from('message');
            $this->db->where('key',$data['mobile']);
            $this->db->where('code',$data['code']);
            $this->db->limit(1);
            $query = $this->db->get();
          // echo $this->db->last_query();exit;
            if ($query->num_rows() == 1) {
            return true;
            }
        }
    //-- edit function
     function edit_option($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    }

    //-- update function
    function update($action,$field, $id, $table){
        $this->db->where($field,$id);
        $this->db->update($table,$action);

        return true;
    }

    //-- delete function
    function delete($data,$table){

        $this->db->delete($table, $data);
        return;
    }

    function select_value($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where(array('id' => $id));
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $query = $query->result_array();
        return $query;
    }

    //-- user role delete function
      function delete_user_role($id,$table){
        $this->db->delete($table, array('user_id' => $id));
        return;
    }
  function select_user(){
        $this->db->select();
        $this->db->from('logme l');
        $this->db->order_by('logid','ASC');
        $this->db->join('user_details u','l.logid = u.user_id','INNER');

        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
function select_user_option($id){
        $this->db->select();
        $this->db->from('logme l');
        $this->db->order_by('logid','ASC');
        $this->db->join('user_details u','l.logid = u.user_id','INNER');

        $this->db->where('logid', $id);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
    //-- select function
    function select($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('id','ASC');
        $query = $this->db->get();

        $query = $query->result_array();
        return $query;
    }
  function select_carousel_by_type($type)
  {
    $this->db->select('*');
    $this->db->from('carousel');
    $this->db->where('type', $type);
    $this->db->join('products', 'products.id=carousel.product_id');
    $query = $this->db->get();
    $query = $query->result_array();
    return $query;
  }
  public function get_menu($type)
  {
    $this->db->select('*');
    $this->db->from('megamenu');
    $this->db->where('type', 'text');
    $this->db->where('parent', $type);
    $query = $this->db->get();
    return $query->result_array();
  }
    function select_limit_value($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('id','ASC');
        $this->db->limit(1);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
    // function select_attribute($table){
    //     $this->db->select('distinct(attribute),value');
    //     //$this->db->select('value');
    //     $this->db->from($table);
    //     $this->db->order_by('id','ASC');
    //     $query = $this->db->get();
    //     $query = $query->result_array();
    //     return $query;
    // }
function getMaxUserId(){
        $this->db->select('max(logid) as id');
        $this->db->from('logme');

        $query = $this->db->get();
        return $query->row('id');

    }
    //-- select by id
    function select_option($id,$field,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where($field, $id);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
  function get_collection($id)
  {
    $this->db->select();
    $this->db->from('collection');
    $this->db->where('collection.collection_id', $id);
    $query = $this->db->get();
    $query = $query->result_array();
    return $query;
  }
  function get_collection_product($id)
  {
    $this->db->select();
    $this->db->from('collection_product');
    $this->db->where('collection_product.collection_id', $id);
    $this->db->join('products', 'products.id=collection_product.product_id');
    $query = $this->db->get();
    $query = $query->result_array();
    return $query;
  }

    // File Upload




  function upload_image($max_size){

          //-- set upload path
          $config['upload_path']  = UPLOAD_FILE . '/' . 'images';
          $config['allowed_types']= 'gif|jpg|png|jpeg';
          $config['max_size']     = '920000';
          $config['max_width']    = '92000';
          $config['max_height']   = '92000';

          $this->load->library('upload', $config);
          if ($this->upload->do_upload("file")) {

              $data = $this->upload->data();

              //-- set upload path
              $source             = UPLOAD_FILE . "/images/" . $data['file_name'] ;
              $destination_thumb  = UPLOAD_FILE . "/images/thumbnail/" ;
              $destination_medium = UPLOAD_FILE . "/images/medium/" ;
              $main_img = $data['file_name'];
              // Permission Configuration
              chmod($source, 0777) ;

              /* Resizing Processing */
              // Configuration Of Image Manipulation :: Static
              $this->load->library('image_lib') ;
              $img['image_library'] = 'GD2';
              $img['create_thumb']  = TRUE;
              $img['maintain_ratio']= TRUE;

              /// Limit Width Resize
              $limit_medium   = $max_size ;
              $limit_thumb    = 200;

              // Size Image Limit was using (LIMIT TOP)
              $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

              // Percentase Resize
              if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                  $percent_medium = $limit_medium/$limit_use ;
                  $percent_thumb  = $limit_thumb/$limit_use ;
              }

              //// Making THUMBNAIL ///////
              $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
              $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

              // Configuration Of Image Manipulation :: Dynamic
              $img['thumb_marker'] = '_thumb-'.floor($img['width']).'x'.floor($img['height']) ;
              $img['quality']      = ' 100%' ;
              $img['source_image'] = $source ;
              $img['new_image']    = $destination_thumb ;

              $thumb_nail = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
              // Do Resizing
              $this->image_lib->initialize($img);
              $this->image_lib->resize();
              $this->image_lib->clear() ;

              ////// Making MEDIUM /////////////
              $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
              $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

              // Configuration Of Image Manipulation :: Dynamic
              $img['thumb_marker'] = '_medium-'.floor($img['width']).'x'.floor($img['height']) ;
              $img['quality']      = '100%' ;
              $img['source_image'] = $source ;
              $img['new_image']    = $destination_medium ;

              $mid = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
              // Do Resizing
              $this->image_lib->initialize($img);
              $this->image_lib->resize();
              $this->image_lib->clear() ;

              //-- set upload path
              $images = UPLOAD_FILE . "/images/medium/" . $mid;
              $thumb  = UPLOAD_FILE . "/images/thumbnail/" . $thumb_nail;
              unlink($source);

              return array(
                  'image' => $images,
                  'thumb' => $thumb
              );
          }
          else {
              echo "Failed! to upload images" ;
          }

  }

    public function indexing($data, $rootid) {
      // echo $data;
    //  echo $rootid;exit;
      $temp = array();
      $table = 'indexing';
      if (is_array($data['tag'])) {
          foreach ($data['tag'] as $value) {
            $temp['root'] = $rootid;
            $temp['port'] = $value;
            $temp['type'] = 'tag';
            $this->db->insert($table, $temp);
          }
      }
      if (is_array($data['category'])) {
        foreach ($data['category'] as $value) {
          $temp['root'] = $rootid;
          $temp['port'] = $value;
          $temp['type'] = 'category';
          $this->db->insert($table, $temp);
        }
      }
    }

    public function updateThumb($data, $rootid){
          $table = 'thumbnail';
          $this->db->delete($table, array('root' => $rootid));
          $data = [
            'root' => $rootid,
            'thumb' => $data,
            'image' => $data,
          ];
          return $this->db->insert($table, $data);
        }
        public function updateIndexing($data, $rootid) {
      if ( isset($data['tag']) ||  isset($data['category']) ) {
        $temp = array();
        $table = 'indexing';
        $this->db->delete($table, array('root' => $rootid));
        if ( is_array($data['tag']) ) {
          foreach ($data['tag'] as $value) {
            $temp['root'] = $rootid;
            $temp['port'] = $value;
            $temp['type'] = 'tag';
            $this->db->insert($table, $temp);
          }
        }
        if ( is_array($data['category']) ) {
          foreach ($data['category'] as $value) {
            $temp['root'] = $rootid;
            $temp['port'] = $value;
            $temp['type'] = 'category';
            $this->db->insert($table, $temp);
          }
        }
        return;
      }else{
        return;
      }
    }
    public function get_last_id($table){
      return $this->db->select('MAX(id) AS id')
      ->from($table)
      ->get()->row()->id;
    }
    public function getThumByRoot($id){
      $this->db->select('thumb', 'image');
      return $this->db->get_where("thumbnail", array('root' => $id))->row();
    }
    public function getThumByRootvale($id){
    $this->db->from('thumbnail');
    $this->db->where('root',$id);
    $query = $this->db->get();
    //echo $this->db->last_query($query);exit;
    return $query->row();

  }


    public function getIndexCategorys($root){
    $data = array();
    $this->db->select('port');
    $this->db->from('indexing');
    $this->db->WHERE('root', $root);
    $this->db->WHERE('type', 'category');
    $query = $this->db->get();
    $query = $query->result_array();
    foreach ($query as $value) {
      $data[] = $value['port'];
    }
    return $data;
  }
  public function getIndexTags($root){
      $data = array();
      $this->db->select('port');
      $this->db->from('indexing');
      $this->db->WHERE('root', $root);
      $this->db->WHERE('type', 'tag');
      $query = $this->db->get();
      $query = $query->result_array();
      foreach ($query as $value) {
        $data[] = $value['port'];;
      }
      return $data;
    }
    public function addThumb($data, $rootid){
          $table = 'thumbnail';
          $data = [
            'root' => $rootid,
            'thumb' => $data,
            'image' => $data,
          ];
          return $this->db->insert($table, $data);
        }
        public function get_count($table, $filetype) {
    $this->db->select("COUNT(*) AS count")->from($table);
    foreach ($filetype as  $value) {
      $this->db->or_where('filetype', $value);
    }
    $this->db->where('deleted', 0);
    $result = $this->db->get();
   return !empty($result->row()) ? $result->row()->count : 0;
 }

  public function get_table_count($table) {
    $this->db->select("COUNT(*) AS count")->from($table);
    $result = $this->db->get();
   return !empty($result->row()) ? $result->row()->count : 0;
 }

 public function gallerys($limit, $start) {
    $this->db->select('*');
    $this->db->from('gallery');
    foreach (IMAGE_EXT as  $value) {
      $this->db->or_where('filetype', $value);
    }
    $this->db->order_by('id', 'DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get();
   return $query->result_array();
  }
  public function get_setting($key) {
      return $this->db->select('setting_value')->get_where('setting', array('setting_name' => $key))->row();
    }

}
