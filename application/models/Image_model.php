<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image_model extends MY_Model {

    public $table = 'image';
    public function __construct() {
        parent::__construct();
    }

    public function get_all_image($lang = '') {
        $this->db->select('image.*, GROUP_CONCAT(image_lang.title ORDER BY image_lang.language separator \' ||| \') as image_title');
        $this->db->from('image');
        $this->db->join('image_lang', 'image_lang.image_id = image.id');
        $this->db->group_by('image_lang.image_id');
        if($lang != ''){
            $this->db->where('image_lang.language', $lang);
        }
        $this->db->order_by("image.id", "ASC");

        return $result = $this->db->get()->result_array();
    }

    public function delete($id){
        $this->db->delete('image_lang', array('image_id' => $id));
        $this->db->delete('image', array('id' => $id));
        return true;
    }

}