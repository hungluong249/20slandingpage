<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Break_list extends Admin_Controller{

	private $request_language_template = array(
        'title'
    );

    private $author_data = array();
	
	function __construct(){
		parent::__construct();

        $this->load->model('break_model');
        $this->load->helper('common');

        $this->author_data = handle_author_common_data();
	}

	public function index(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $break = $this->break_model->get_break_by_id(1);
        

        $title = explode('|||', $break['break_title']);
        $break['title_cn'] = $title[0];
        $break['title_en'] = $title[1];
        $break['title_vi'] = $title[2];

        $this->data['break'] = $break;

        $this->render('admin/break/detail_break_view');
        
	}

    public function break_2(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $break = $this->break_model->get_break_by_id(2);
        

        $title = explode('|||', $break['break_title']);
        $break['title_cn'] = $title[0];
        $break['title_en'] = $title[1];
        $break['title_vi'] = $title[2];

        $this->data['break'] = $break;

        $this->render('admin/break/detail_break_view');
        
    }

	public function edit($id){
        $break = $this->break_model->get_break_by_id($id);

        $title = explode('|||', $break['break_title']);
        $break['title_cn'] = $title[0];
        $break['title_en'] = $title[1];
        $break['title_vi'] = $title[2];

        $this->data['break'] = $break;

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_en', 'Title', 'required');
        $this->form_validation->set_rules('title_cn', '标题', 'required');

        if($this->form_validation->run() == false){
            $this->render('admin/break/edit_break_view');
        }else{
            if($this->input->post()){
                $check_upload = true;
                if( $_FILES['image_shared']['size'] > 1228800){
                    $check_upload = false;
                }
                if($check_upload == true){
                    $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/break', 'assets/upload/break/thumb');
                    // $image_json = json_encode($image);
                     $shared_request = array(
                        'created_at' => $this->author_data['created_at'],
                        'created_by' => $this->author_data['created_by'],
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );
                    if($image){
                        $shared_request['image'] = $image;
                    }
                    $this->db->trans_begin();

                    $update = $this->break_model->common_update($id, $shared_request);
                    if($update){
                        $requests = handle_multi_language_request('break_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                        foreach ($requests as $key => $value){
                            $this->break_model->update_with_language($id, $value['language'], $value);
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $this->load->libraries('session');
                        $this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
                        $this->render('admin/break_list/edit/'. $break['id']);
                    } else {
                        $this->db->trans_commit();
                        
                        $this->session->set_flashdata('message_success', 'Cập nhật thành công!');
                        redirect('admin/break_list', 'refresh');
                        
                    }
                }else{
                    $this->session->set_flashdata('message_error', 'Có hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                    redirect('admin/break_list');
                }
            }
        }
    }
}