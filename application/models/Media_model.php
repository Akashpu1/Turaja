<?php
class Media_model extends CI_Model {
public function __construct()
        {
                $this->load->database();
        }
    //-- insert function
	public function insert($data,$table){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    public function get_last_id($table){
      return $this->db->select('MAX(id) AS id')
      ->from($table)
      ->get()->row()->id;
    }

  
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
                $source             = UPLOAD_FILE . "/\images/" . $data['file_name'] ;
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
      if ( isset($data['tag']) ||  isset($data['category']) ) {
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
        return;
      }else {
        return;
      }
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

    public function addLacture($data, $rootid){
        $table = 'videos';
        foreach ($data as $value) {
          $temp = getFileInfo($value);
          if ($temp['status']) {
            $video = [
              'videoid' => getUniqidId('W'),
              'nodeid' => $rootid,
              'type' => 'paid',
              'name' => $temp['basename'],
              'url' => $value,
              'size' => $temp['size'],
              'videotype' => $temp['extension'],
              'time' => getDuration($value)
            ];
            $this->db->insert($table, $video);
          }
        }
        return true;
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

    public function getThumByRoot($id){
      $this->db->select('thumb', 'image');
      return $this->db->get_where("thumbnail", array('root' => $id))->row();
    }

    public function getVideoByRoot($id){
      return $this->db->select('videoid, nodeid, name, url, size, videotype')
      ->from("videos")
      ->where('nodeid', $id)
      ->get()
      ->result_array();
    }




}
