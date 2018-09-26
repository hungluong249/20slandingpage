<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Upload extends Admin_Controller{
	private $request_language_template = array();
	private $author_data = array();
	
	function __construct(){
		parent::__construct();
        $this->load->helper('file');
        $this->load->helper('common');
        $this->load->model('upload_model');
        $this->author_data = handle_author_common_data();
	}

	public function list_food(){
		$result = $this->upload_model->get_all_upload();
        $this->data['result'] = $result;

		$this->render('admin/upload/list_upload_food_view');
	}

	public function list_floor(){
		$result = $this->upload_model->get_all_upload(1);
        $this->data['result'] = $result;

		$this->render('admin/upload/list_upload_food_view');
	}

	public function create_food(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        if($this->input->post()){
            $check_upload = true;
            if ($_FILES['link_shared']['size'] > 20971520) {
                $check_upload = false;
            }
            if ($check_upload == true) {
            	// print_r($_FILES['link_shared']['name']);die;
                if(!empty($_FILES['link_shared']['name'])){
                    $link = upload_pdf_file('link_shared', $_FILES['link_shared']['name'], 'assets/upload/pdf');
                    $shared_request = array(
                        'link' => $link,
                        'type' => 0,
                        'created_at' => $this->author_data['created_at'],
                        'created_by' => $this->author_data['created_by'],
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );
                    $insert = $this->upload_model->common_insert($shared_request);
                    if($insert){
                        $this->session->set_flashdata('message_success', 'Thêm mới Menu thành công!');
                        redirect('admin/upload/list_food');
                    }
                }else{
                    $this->session->set_flashdata('message_error', 'Vui lòng chọn file upload!');
                    redirect('admin/upload/create_food');
                }
            }else{
                $this->session->set_flashdata('message_error', 'File vượt quá 20 Mb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                redirect('admin/upload/list_food');
            }
        }

		$this->render('admin/upload/create_upload_food_view');
	}

	public function create_floor(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        if($this->input->post()){
            $check_upload = true;
            if ($_FILES['link_shared']['size'] > 20971520) {
                $check_upload = false;
            }
            if ($check_upload == true) {
            	// print_r($_FILES['link_shared']['name']);die;
                if(!empty($_FILES['link_shared']['name'])){
                    $link = upload_pdf_file('link_shared', $_FILES['link_shared']['name'], 'assets/upload/pdf');
                    $shared_request = array(
                        'link' => $link,
                        'type' => 1,
                        'created_at' => $this->author_data['created_at'],
                        'created_by' => $this->author_data['created_by'],
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );
                    $insert = $this->upload_model->common_insert($shared_request);
                    if($insert){
                        $this->session->set_flashdata('message_success', 'Thêm mới Floor thành công!');
                        redirect('admin/upload/list_floor');
                    }
                }else{
                    $this->session->set_flashdata('message_error', 'Vui lòng chọn file upload!');
                    redirect('admin/upload/create_floor');
                }
            }else{
                $this->session->set_flashdata('message_error', 'File vượt quá 20 Mb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                redirect('admin/upload/list_floor');
            }
        }

		$this->render('admin/upload/create_upload_food_view');
	}

	public function remove(){
        $id = $this->input->post('id');
        $upload = $this->upload_model->get_by_id_with_upload($id);
        $this->db->trans_begin();

        $delete = $this->upload_model->delete($id);
        if($delete){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
        }

        if ($this->db->trans_status() === false) {
        	$this->db->trans_rollback();
        	return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(HTTP_BAD_REQUEST)
                    ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
        } else {
        	$this->db->trans_commit();
        	if(file_exists('assets/upload/pdf/'. $upload['link'])){
            	unlink('assets/upload/pdf/'. $upload['link']);
            }
        	return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse)));
            }
    }


    public function active(){
        $id = $this->input->post('id');
        $upload = $this->upload_model->get_by_id_with_upload($id);
        $count = $this->upload_model->count_active_with_upload($upload['type']);
        $data = array('is_activated' => 1);
        if($count < 1){
            $update = $this->upload_model->common_update($id, $data);
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
        $update = $this->upload_model->common_update($id, $data);
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