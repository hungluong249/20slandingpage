<?php 
/**
* 
*/
class Upload_model extends MY_Model{
	
	public $table = 'upload';

	public function get_all_upload($type = 0){
        $this->db->from('upload');
        $this->db->where('type', $type);
        return $result = $this->db->get()->result_array();
    }

    public function delete($id){
    	$this->db->where('id', $id);
    	if($this->db->delete('upload')){
    		return true;
    	}
    	return false;
    }

    public function get_by_id_with_upload($id){
    	$this->db->from('upload');
    	$this->db->where('id', $id);
    	return $result = $this->db->get()->row_array();
    }

    public function get_active($type){
        $query = $this->db->from($this->table)->where(array('is_activated' => 1, 'type' => $type))->get();
        return $query->row_array();
    }

    public function count_active_with_upload($type){
        $query = $this->db->from($this->table)->where(array('is_activated' => 1, 'type' => $type))->get();
        return $query->num_rows();
    }
}