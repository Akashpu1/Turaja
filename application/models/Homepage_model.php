<?php

class Homepage_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function update_carousel($data)
    {
        $this->db->where('type', $data['type']);
        $this->db->where('sno', $data['sno']);
        $this->db->update('carousel', array('product_id' => $data['product_id']));
        return 0;
    }

    public function edit_menu_image($data,$id)
    {
        $this->db->where('menu_id', $id);

        $this->db->update('megamenu', $data );

        return 0;
    }

    function select_carousel_by_type($type)
    {
        $this->db->select('*');
        $this->db->from('carousel');
        $this->db->where('type', $type);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    public function add_menu($data)
    {
        $this->db->insert('megamenu', $data);


    }
     public function get_menu()
    {
        $this->db->select('*');
        $this->db->from('megamenu');
        $this->db->where('type', 'text');
        $this->db->where('parent', 'shop');
        $query = $this->db->get();
        return $query->result_array();

    }
    public function get_collection()
    {
        $this->db->select('*');
        $this->db->from('collection');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_technique()
    {
        $this->db->select('*');
        $this->db->from('technique');

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_menu_by_type($type)
    {
        $this->db->select('*');
        $this->db->from('megamenu');
        $this->db->where('type', 'pic');
        $this->db->where('parent', $type);
        $query = $this->db->get();
        return $query->result_array();
    }


}
