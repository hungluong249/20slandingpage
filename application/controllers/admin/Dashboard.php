<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    function __construct(){
        parent::__construct();
		$this->load->model('post_model');
		$this->load->model('creator_model');
		$this->load->model('customer_model');
    }

    public function index(){
    	$this->data['post'] = $this->post_model->find_rows(array('is_deleted' => 0));
    	$this->data['creator'] = $this->creator_model->find_rows(array('is_deleted' => 0));
    	$this->data['customer'] = $this->customer_model->find_rows(array('is_deleted' => 0));
        $this->render('admin/dashboard_view');
    }
}