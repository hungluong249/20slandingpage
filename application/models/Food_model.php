<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Food_model extends MY_Model {

    public $table = 'food';

    public function __construct() {
        parent::__construct();
    }
}