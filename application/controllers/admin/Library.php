<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/6/2018
 * Time: 4:41 PM
 */
class Library extends Admin_Controller{
    private $request_language_template = array(
        'title'
    );
    private $author_data = array();

    function __construct() {
        parent::__construct();

        $this->load->model('library_model');
        $this->load->model('image_model');
        $this->load->helper('common');

        $this->author_data = handle_author_common_data();
    }

    public function index(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $images = $this->image_model->get_all_image();
        foreach ($images as $key => $value){
            $image_thumb = explode('.', $value['image']);
            if(count($image_thumb) == 2){
                $images[$key]['image'] = $image_thumb[0] .'_thumb.'. $image_thumb[1];
            }
            $title = explode('|||', $value['image_title']);
            $images[$key]['title_cn'] = $title[0];
            $images[$key]['title_en'] = $title[1];
            $images[$key]['title_vi'] = $title[2];
        }


        $this->data['images'] = $images;
//        print_r($images);die;


        $this->render('admin/library/detail_library_view');
    }

    public function create(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $success = false;

        if ($this->input->post()) {
            if (!empty($_FILES['image_shared']['name'])) {
                $check_upload = true;
                foreach ($_FILES['image_shared']['size'] as $key => $value) {
                    if( $value > 1228800){
                        $check_upload = false;
                    }
                }
                if($check_upload == true){
                    $image = $this->upload_file('./assets/upload/library', 'image_shared', 'assets/upload/library/thumb');
                    foreach ($image as $key => $value) {
                        $shared_request = array(
                            'library_id' => 1,
                            'image' => $value,
                            'created_at' => $this->author_data['created_at'],
                            'created_by' => $this->author_data['created_by'],
                            'updated_at' => $this->author_data['updated_at'],
                            'updated_by' => $this->author_data['updated_by']
                        );
                        $insert = $this->image_model->common_insert($shared_request);

                        if ($insert) {
                            $requests = handle_multi_language_request('image_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
                            $insert_lang = $this->image_model->insert_with_language($requests);
                            if($insert_lang){
                                $success = true;
                            }
                        }
                    }
                    if($success){
                        $this->session->set_flashdata('message_success', 'Thêm mới thành công!');
                        redirect('admin/library');
                    }
                }else{
                    $this->session->set_flashdata('message_error', 'Có hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                    redirect('admin/library');
                }
            }
        }
        $this->render('admin/library/create_library_view');
    }

    public function update(){
        $id = $this->input->post('id');
        $title_vi = $this->input->post('title_vi');
        $title_en = $this->input->post('title_en');
        $title_cn = $this->input->post('title_cn');
        $data =  array(
            'title_vi' => $title_vi,
            'title_en' => $title_en,
            'title_cn' => $title_cn
        );

        $requests = handle_multi_language_request('image_id', $id, $this->request_language_template, $data, $this->page_languages);
        foreach ($requests as $key => $value){
            $update = $this->image_model->update_with_language($id, $requests[$key]['language'], $value);
        }

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

    public function delete(){
        $id = $this->input->post('id');
        $delete = $this->image_model->delete($id);
        if($delete == true){
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

    public function delete_all(){
        $this->db->empty_table('image_lang');
        $this->db->empty_table('image');
        redirect('admin/library');
    }
}