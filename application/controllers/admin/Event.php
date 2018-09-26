<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property  event_model
 */
class Event extends Admin_Controller {

    private $request_language_template = array(
        'title', 'description', 'content'
    );
    private $author_data = array();

    function __construct() {
        parent::__construct();

        $this->load->model('event_model');
        $this->load->model('event_lang_model');
        $this->load->helper('common');

        $this->author_data = handle_author_common_data();
    }

    public function index() {
        $keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->event_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->event_model->count_search($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/event/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->event_model->get_all_with_pagination_search($per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->event_model->get_all_with_pagination_search($per_page, $this->data['page'], $keywords);
        }
        $this->data['events'] = $result;
        $this->render('admin/event/list_event_view');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'trim|required');
        $this->form_validation->set_rules('title_en', 'Title', 'trim|required');
        $this->form_validation->set_rules('title_cn', '标题', 'trim|required');

        if ($this->form_validation->run() === false) {
            $this->render('admin/event/create_event_view');
        } else {
            if ($this->input->post()) {
                $check_upload = true;
                if ($_FILES['image_shared']['size'] > 1228800) {
                    $check_upload = false;
                }
                if ($check_upload == true) {
                    $slug = $this->input->post('slug_shared');
                    $unique_slug = $this->event_model->build_unique_slug($slug);

                    $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/event', 'assets/upload/event/thumb');
                    $shared_request = array(
                        'image' => $image,
                        'slug' => $unique_slug,
                        'meta_keywords' => $this->input->post('metakeywords_shared'),
                        'meta_description' => $this->input->post('metadescription_shared'),
                        //'private_rooms' => $this->input->post('privaterooms_shared'),
                        //'private_floors' => $this->input->post('privatefloors_shared'),
                        //'full_restaurant' => $this->input->post('fullrestaurant_shared'),
                        'created_at' => $this->author_data['created_at'],
                        'created_by' => $this->author_data['created_by'],
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );

                    $this->db->trans_begin();

                    $insert = $this->event_model->common_insert($shared_request);
                    if($insert){
                        $requests = handle_multi_language_request('event_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
                        $this->event_model->insert_with_language($requests);
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $this->load->libraries('session');
                        $this->session->set_flashdata('message_error', 'Thêm mới thất bại!');
                        $this->render('admin/event/create_event_view');
                    } else {
                        $this->db->trans_commit();
                        $this->session->set_flashdata('message_success', 'Thêm mới thành công!');
                        redirect('admin/event', 'refresh');
                    }
                }else{
                    $this->session->set_flashdata('message_error', 'Hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                    redirect('admin/event');
                }
            }
        }
    }

    public function edit($id = null){
        $event = $this->event_model->get_by_id($id);
        if(!$event){
            redirect('admin/event/index','refresh');
        }

        $title = explode('|||', $event['event_title']);
        $event['title_cn'] = $title[0];
        $event['title_en'] = $title[1];
        $event['title_vi'] = $title[2];

        $description = explode('|||', $event['event_description']);
        $event['description_cn'] = $description[0];
        $event['description_en'] = $description[1];
        $event['description_vi'] = $description[2];

        $content = explode('|||', $event['event_content']);
        $event['content_cn'] = $content[0];
        $event['content_en'] = $content[1];
        $event['content_vi'] = $content[2];
        $this->data['event'] = $event;

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_en', 'Title', 'required');
        $this->form_validation->set_rules('title_cn', '标题', 'required');

        if($this->form_validation->run() === true){
            if($this->input->post()){
                $check_upload = true;
                if ($_FILES['image_shared']['size'] > 1228800) {
                    $check_upload = false;
                }
                if ($check_upload == true) {
                    $slug = $this->input->post('slug_shared');
                    $unique_slug = $this->event_model->build_unique_slug($slug);
                    $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/event', 'assets/upload/event/thumb');
                    $shared_request = array(
                        'slug' => $unique_slug,
                        'meta_keywords' => $this->input->post('metakeywords_shared'),
                        'meta_description' => $this->input->post('metadescription_shared'),
                        //'private_rooms' => $this->input->post('privaterooms_shared'),
                        //'private_floors' => $this->input->post('privatefloors_shared'),
                        //'full_restaurant' => $this->input->post('fullrestaurant_shared'),
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );
                    if($image){
                        $shared_request['image'] = $image;
                    }
                    $this->db->trans_begin();

                    $update = $this->event_model->common_update($id, $shared_request);
                    if($update){
                        $requests = handle_multi_language_request('event_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                        foreach ($requests as $key => $value){
                            $this->event_model->update_with_language($id, $requests[$key]['language'], $value);
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $this->load->libraries('session');
                        $this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
                        $this->render('admin/event/edit/'.$id);
                    } else {
                        $this->db->trans_commit();
                        $this->session->set_flashdata('message_success', 'Cập nhật thành công!');
                        if($image != '' && $image != $event['image'] && file_exists('assets/upload/event/'.$event['image'])){
                            unlink('assets/upload/event/'.$event['image']);
                        }
                        redirect('admin/event', 'refresh');
                    }
                }else{
                    $this->session->set_flashdata('message_error', 'Hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                    redirect('admin/event');
                }
            }
        }
        $this->render('admin/event/edit_event_view');
    }

    public function detail($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $event = $this->event_model->get_by_id($id);

        $title = explode('|||', $event['event_title']);
        $event['title_cn'] = $title[0];
        $event['title_en'] = $title[1];
        $event['title_vi'] = $title[2];

        $description = explode('|||', $event['event_description']);
        $event['description_cn'] = $description[0];
        $event['description_en'] = $description[1];
        $event['description_vi'] = $description[2];

        $content = explode('|||', $event['event_content']);
        $event['content_cn'] = $content[0];
        $event['content_en'] = $content[1];
        $event['content_vi'] = $content[2];

        $this->data['event'] = $event;

        $this->render('admin/event/detail_event_view');
    }

    public function remove(){
        $id = $this->input->post('id');
        $data = array('is_deleted' => 1);
        $update = $this->event_model->common_update($id, $data);
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

    public function active(){
        $id = $this->input->post('id');
        $count = $this->event_model->count_active();
        $data = array('is_activated' => 1);
        if($count < 1){
            $update = $this->event_model->common_update($id, $data);
            if($update == 1){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(HTTP_SUCCESS)
                    ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'success' => true, 'reponse' => $reponse)));
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(HTTP_SUCCESS)
            ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'success' => false)));
    }

    public function deactive(){
        $id = $this->input->post('id');
        $data = array('is_activated' => 0);
        $update = $this->event_model->common_update($id, $data);
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

}