<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Order extends Admin_Controller{

    private $author_data = array();

    function __construct() {
        parent::__construct();

        $this->load->model('order_model');
        $this->load->helper('common');

        $this->author_data = handle_author_common_data();
    }

    public function index(){
    	$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->order_model->count_search_order();
        if($keywords != ''){
            $total_rows  = $this->order_model->count_search_order($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/order/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->order_model->get_all_order_with_pagination_search(0, $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->order_model->get_all_order_with_pagination_search(0, $per_page, $this->data['page'], $keywords);
        }

    	$this->data['order'] = $result;
    	$this->render('admin/order/list_order_view');
    }

    public function success(){
    	$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->order_model->count_search_order();
        if($keywords != ''){
            $total_rows  = $this->order_model->count_search_order($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/order/success');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->order_model->get_all_order_with_pagination_search(1, $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->order_model->get_all_order_with_pagination_search(1, $per_page, $this->data['page'], $keywords);
        }

    	$this->data['order'] = $result;
    	$this->render('admin/order/list_order_view');
    }

    public function cancel(){
    	$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->order_model->count_search_order();
        if($keywords != ''){
            $total_rows  = $this->order_model->count_search_order($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/order/cancel');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->order_model->get_all_order_with_pagination_search(2, $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->order_model->get_all_order_with_pagination_search(2, $per_page, $this->data['page'], $keywords);
        }

    	$this->data['order'] = $result;
    	$this->render('admin/order/list_order_view');
    }

    public function active(){
        $id = $this->input->post('id');
        $data = array('status' => 1);
        $update = $this->order_model->common_update($id, $data);
        if($update == 1){
        	$reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'success' => true, 'reponse' => $reponse)));
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(HTTP_SUCCESS)
            ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'success' => false)));
    }

    public function deactive(){
        $id = $this->input->post('id');
        $data = array('status' => 2);
        $update = $this->order_model->common_update($id, $data);
        if($update == 1){
        	$reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'success' => true, 'reponse' => $reponse)));
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(HTTP_SUCCESS)
            ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'success' => false)));
    }
}