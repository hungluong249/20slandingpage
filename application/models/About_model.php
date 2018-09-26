<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/2/2018
 * Time: 4:58 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class About_model extends MY_Model {

    public $table = 'about';

    public function __construct() {
        parent::__construct();
    }
}