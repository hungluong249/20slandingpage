<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Our_food extends Admin_Controller {

	private $request_language_template = array(
		'title', 'content'
    );
    private $author_data = array();

    function __construct() {
        parent::__construct();

        $this->load->model('our_food_model');
        $this->load->helper('common');

        $this->author_data = handle_author_common_data();
    }

    public function index(){
    	$this->load->helper('form');
        $this->load->library('form_validation');

        $our_food = $this->our_food_model->get_our_food_by_id(1);

        $title = explode('|||', $our_food['our_food_title']);
        $our_food['title_cn'] = $title[0];
        $our_food['title_en'] = $title[1];
        $our_food['title_vi'] = $title[2];

        $content = explode('|||', $our_food['our_food_content']);
        $our_food['content_cn'] = $content[0];
        $our_food['content_en'] = $content[1];
        $our_food['content_vi'] = $content[2];


        $this->data['our_food'] = $our_food;

        $this->render('admin/our_food/detail_our_food_view');
    }

    public function edit(){
        $id = 1;
        $our_food = $this->our_food_model->get_our_food_by_id($id);

        $title = explode('|||', $our_food['our_food_title']);
        $our_food['title_cn'] = $title[0];
        $our_food['title_en'] = $title[1];
        $our_food['title_vi'] = $title[2];

        $content = explode('|||', $our_food['our_food_content']);
        $our_food['content_cn'] = $content[0];
        $our_food['content_en'] = $content[1];
        $our_food['content_vi'] = $content[2];

        $this->data['our_food'] = $our_food;

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_en', 'Title', 'required');
        $this->form_validation->set_rules('title_cn', '标题', 'required');
        if($this->form_validation->run() == false){
            $this->render('admin/our_food/edit_our_food_view');
        }else{
            if ($this->input->post()) {
                $check_upload = true;
                foreach ($_FILES['image_shared']['size'] as $key => $value) {
                    if( $value > 1228800){
                        $check_upload = false;
                    }
                }
                if($check_upload == true){
                    $image = $this->upload_file('./assets/upload/our_food', 'image_shared', 'assets/upload/our_food/thumb');
                    $image_json = json_encode($image);
                     $shared_request = array(
                        'slug' => $this->input->post('slug_shared'),
                        'created_at' => $this->author_data['created_at'],
                        'created_by' => $this->author_data['created_by'],
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );
                    if($image){
                        $shared_request['image'] = $image_json;
                        $shared_request['avatar'] = $image[0];
                    }
                    $this->db->trans_begin();
                    $update = $this->our_food_model->common_update($id, $shared_request);
                    if($update){
                        $requests = handle_multi_language_request('our_food_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                        // echo "<pre>";
                        // print_r($requests);die;
                        foreach ($requests as $key => $value){
                            $this->our_food_model->update_with_language($id, $value['language'], $value);
                        }
                    }
                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $this->load->libraries('session');
                        $this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
                        $this->render('admin/our_food');
                    } else {
                        $this->db->trans_commit();
                        
                        $this->session->set_flashdata('message_success', 'Cập nhật thành công!');
                        if($image != '' && $image != $our_food['image']){
                            $old_image = json_decode($our_food['image']);
                            if(is_array($old_image)){
                                foreach ($old_image as $key => $value) {
                                    if(file_exists('assets/upload/our_food/'.$value)){
                                        unlink('assets/upload/our_food/'.$value);
                                    }
                                }
                            }
                            
                        }
                        redirect('admin/our_food', 'refresh');
                        
                    }
                }else{
                    $this->session->set_flashdata('message_error', 'Có hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                    redirect('admin/our_food');
                }
            }
        }
    }

    public function active_avatar(){
        $image = $this->input->post('image');
        $data = array('avatar' => $image);

        $update = $this->our_food_model->common_update(1, $data);
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