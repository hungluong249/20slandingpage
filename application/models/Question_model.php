<?php 

/**
* 
*/
class Question_model extends MY_Model{
    
    public $table = 'question';
    public function get_by_parent_id($parent_id, $order = 'desc'){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        if(is_numeric($parent_id)){
            $this->db->where('id', $parent_id);
        }
        $this->db->group_by('id');
        $this->db->order_by("id", $order);

        return $result = $this->db->get()->row_array();
    }
    public function get_all($order="desc") {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('is_deleted', 0);
        $this->db->where('is_activated', 0);
        $this->db->group_by("id");
        $this->db->order_by("id", $order);
        return $this->db->get()->result_array();
    }
    public function get_all_with_pagination_searchs($order = 'desc',$limit = NULL, $start = NULL, $keywords = '',$activated = 1) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('name', $keywords);
        $this->db->where('is_deleted', 0);
        if($activated == 0){
            $this->db->where('is_activated', $activated);
        }
        $this->db->limit($limit, $start);
        $this->db->group_by('id');
        $this->db->order_by("id", $order);
        return $result = $this->db->get()->result_array();
    }

    public function count_searchs($keyword = '',$activated = 1){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('name', $keyword);
        $this->db->group_by('id');
        $this->db->where('is_deleted', 0);
        if($activated == 0){
            $this->db->where('is_activated', $activated);
        }
        return $result = $this->db->get()->num_rows();
    }
}