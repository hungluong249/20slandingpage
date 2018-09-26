<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/7/2018
 * Time: 9:48 AM
 */

class Banner_model extends MY_Model {

    public $table = 'banner';

    public function __construct() {
        parent::__construct();
    }

    public function get_all_banner(){
        $this->db->from('banner');
        $this->db->where('is_deleted', 0);
        return $result = $this->db->get()->result_array();
    }
}