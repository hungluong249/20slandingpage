<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Food extends Admin_Controller {
	private $request_language_template = array(
        'title', 'description', 'content'
    );
    private $author_data = array();

    function __construct() {
        parent::__construct();

        $this->load->model('food_model');
        $this->load->helper('common');

        $this->author_data = handle_author_common_data();
    }

    public function index(){
    	$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->food_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->food_model->count_search($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/food/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->food_model->get_all_with_pagination_search($per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->food_model->get_all_with_pagination_search($per_page, $this->data['page'], $keywords);
        }
        if($result){
        	foreach ($result as $key => $value) {
        		$result[$key]['image'] = json_decode($value['image']);
        	}
        }
        $this->data['keywords'] = $keywords;
        $this->data['foods'] = $result;

    	$this->render('admin/food/list_food_view');
    }

    public function create(){
    	$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'trim|required');
        $this->form_validation->set_rules('title_en', 'Title', 'trim|required');
        $this->form_validation->set_rules('title_cn', '标题', 'trim|required');

        if ($this->form_validation->run() === false) {
            $this->render('admin/food/create_food_view');
        }else{
        	if($this->input->post()){
        		$slug = $this->input->post('slug_shared');
            	$unique_slug = $this->food_model->build_unique_slug($slug);
            	if(!file_exists("assets/upload/food/".$unique_slug)){
                    mkdir("assets/upload/food/".$unique_slug, 0755);
                    mkdir("assets/upload/food/".$unique_slug.'/thumb', 0755);
                }
                $image = $this->upload_file('./assets/upload/food/'.$unique_slug, 'image_shared', 'assets/upload/food/'. $unique_slug .'/thumb');
                $image_json = json_encode($image);
                $shared_request = array(
                    'image' => $image_json,
                    'slug' => $unique_slug,
                    'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by'],
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
                );
                $this->db->trans_begin();

                $insert = $this->food_model->common_insert($shared_request);
                if($insert){
                    $requests = handle_multi_language_request('food_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
                    $this->food_model->insert_with_language($requests);
                }

                if ($this->db->trans_status() === false) {
                    $this->db->trans_rollback();
                    $this->load->libraries('session');
                    $this->session->set_flashdata('message', 'Cannot add item!');
                    $this->render('admin/food/create_food_view');
                } else {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('message', 'Item added!');
                    redirect('admin/food', 'refresh');
                }
        	}
        }
    }

    public function edit($id){
    	$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'trim|required');
        $this->form_validation->set_rules('title_en', 'Title', 'trim|required');
        $this->form_validation->set_rules('title_cn', '标题', 'trim|required');

        $food = $this->food_model->get_by_id($id);
        $title = explode('|||', $food['food_title']);
        $food['title_cn'] = $title[0];
        $food['title_en'] = $title[1];
        $food['title_vi'] = $title[2];

        $description = explode('|||', $food['food_description']);
        $food['description_cn'] = $description[0];
        $food['description_en'] = $description[1];
        $food['description_vi'] = $description[2];

        $content = explode('|||', $food['food_content']);
        $food['content_cn'] = $content[0];
        $food['content_en'] = $content[1];
        $food['content_vi'] = $content[2];

        if($food){
    		$food['image'] = json_decode($food['image']);
        }
        $this->data['food'] = $food;

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/food/edit_food_view');
        }else{
        	if ($this->input->post()) {
        		$slug = $this->input->post('slug_shared');
            	$unique_slug = $this->food_model->build_unique_slug($slug, $id);
            	if(file_exists("assets/upload/food/".$food['slug'])){
                    rename("assets/upload/food/".$food['slug'], "assets/upload/food/".$unique_slug);
                }
            	if(!file_exists("assets/upload/food/".$unique_slug)){
                    mkdir("assets/upload/food/".$unique_slug, 0755);
                    mkdir("assets/upload/food/".$unique_slug.'/thumb', 0755);
                }
        		$image = $this->upload_file('./assets/upload/food/'.$unique_slug, 'image_shared', 'assets/upload/food/'. $unique_slug .'/thumb');
        		$image_array = array();
        		$image_array = $food['image'];
        		if($image){
        			foreach ($image as $key => $value) {
        				$image_array[] = $value;
        			}
        		}
        		$shared_request = array(
                    'slug' => $unique_slug,
                    'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by'],
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
                );
                if($image){
                	$shared_request['image'] = json_encode($image_array);
                }

                $this->db->trans_begin();

                $update = $this->food_model->common_update($id, $shared_request);
                if($update){
                    $requests = handle_multi_language_request('food_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                    foreach ($requests as $key => $value){
                        $this->food_model->update_with_language($id, $requests[$key]['language'], $value);
                    }
                }

                if ($this->db->trans_status() === false) {
                    $this->db->trans_rollback();
                    $this->load->libraries('session');
                    $this->session->set_flashdata('message', 'Cannot add item!');
                    $this->render('admin/food/edit/'.$id);
                } else {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('message', 'Item added!');
                    redirect('admin/food', 'refresh');
                }
        	}
        }
        
    }

    public function detail($id){
    	$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'trim|required');
        $this->form_validation->set_rules('title_en', 'Title', 'trim|required');
        $this->form_validation->set_rules('title_cn', '标题', 'trim|required');

        $food = $this->food_model->get_by_id($id);
        $title = explode('|||', $food['food_title']);
        $food['title_cn'] = $title[0];
        $food['title_en'] = $title[1];
        $food['title_vi'] = $title[2];

        $description = explode('|||', $food['food_description']);
        $food['description_cn'] = $description[0];
        $food['description_en'] = $description[1];
        $food['description_vi'] = $description[2];

        $content = explode('|||', $food['food_content']);
        $food['content_cn'] = $content[0];
        $food['content_en'] = $content[1];
        $food['content_vi'] = $content[2];

        if($food){
    		$food['image'] = json_decode($food['image']);
        }
        $this->data['food'] = $food;

        $this->render('admin/food/detail_food_view');
    }

    public function remove(){
        $id = $this->input->post('id');
        $data = array('is_deleted' => 1);
        $update = $this->food_model->common_update($id, $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse)));
        }
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(HTTP_BAD_REQUEST)
                    ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
    }

    public function remove_image(){
    	$id = $this->input->post('id');
    	$image = $this->input->post('image');
    	$food = $this->food_model->get_by_id($id);

    	$upload = [];
        $upload = json_decode($food['image']);
        $key = array_search($image, $upload);
        unset($upload[$key]);
        $newUpload = [];
        foreach ($upload as $key => $value) {
            $newUpload[] = $value;
        }
        
        $image_json = json_encode($newUpload);
        $data = array('image' => $image_json);

        $update = $this->food_model->common_update($id, $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            if($image != '' && file_exists('assets/upload/food/'.$food['slug'].'/'.$image)){
            	unlink('assets/upload/food/'.$food['slug'].'/'.$image);
            }
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse)));
        }
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(HTTP_BAD_REQUEST)
                    ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
    }
}