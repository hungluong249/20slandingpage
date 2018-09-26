<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends MY_Model {

    public $table = 'order';

    public function __construct() {
        parent::__construct();
    }

    public function get_all_order_with_pagination_search($active, $limit = NULL, $start = NULL, $keywords = ''){
    	$this->db->from($this->table);
    	$this->db->where('is_deleted', 0);
		$this->db->where('status', $active);
    	$this->db->like('name', $keywords);
    	$this->db->limit($limit, $start);
    	$this->db->order_by("id", "desc");
    	return $result = $this->db->get()->result_array();
    }

    public function count_search_order($keyword = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like($this->table .'.name', $keyword);
        $this->db->where($this->table .'.is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }
}