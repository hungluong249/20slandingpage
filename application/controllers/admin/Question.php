<?php 

/**
* 
*/ 
class Question extends Admin_Controller{
	private $request_language_template = array(
        'title', 'description'
    );
    private $author_data = array();

	function __construct(){
		parent::__construct();
		$this->load->model('question_model');
		$this->load->helper('common');
        $this->load->helper('file');
        $this->data['controller'] = $this->question_model->table;
		$this->author_data = handle_author_common_data();

	}

    public function index(){
        redirect('admin/question/detail', 'refresh');
        $this->data['keyword'] = '';
        if($this->input->get('search')){
            $this->data['keyword'] = $this->input->get('search');
        }
        $this->load->library('pagination');
        $per_page = 10;
        $total_rows  = $this->question_model->count_searchs($this->data['keyword']);
        $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/index'), $total_rows, $per_page, 4);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['result'] = $this->question_model->get_all_with_pagination_searchs('desc',$per_page, $this->data['page'], $this->data['keyword']);
        $this->render('admin/question/list_question_view');
    }
    public function create(){
        redirect('admin/question/detail', 'refresh');
        $this->load->helper('form');
        if($this->input->post()){
                if(!empty($_FILES['image_shared_top']['name'])){
                    $this->check_img($_FILES['image_shared_top']['name'], $_FILES['image_shared_top']['size']);
                }
                if(!empty($_FILES['image_shared_bottom']['name'])){
                    $this->check_img($_FILES['image_shared_bottom']['name'], $_FILES['image_shared_bottom']['size']);
                }
                if(!empty($_FILES['image_shared_top']['name'])){
                    $image_top = $this->upload_image('image_shared_top', $_FILES['image_shared_top']['name'], 'assets/upload/'.$this->data['controller'], 'assets/upload/'.$this->data['controller'].'/thumb');
                }
                if(!empty($_FILES['image_shared_bottom']['name'])){
                    $image_bottom = $this->upload_image('image_shared_bottom', $_FILES['image_shared_bottom']['name'], 'assets/upload/'.$this->data['controller'], 'assets/upload/'.$this->data['controller'].'/thumb');
                }
                $content = array('question' => [],'title' => [], 'content' => []);
                foreach ($this->input->post('question') as $key => $value) {
                    $content['question'][$key] = $value;
                    $content['content'][$key] = $this->input->post('content'.($key+1));
                    if ($this->input->post('title'.($key+1)) != null) {
                        $content['title'][$key] = $this->input->post('title'.($key+1));
                    }else{
                        $content['title'][$key] = array();
                    }
                }
                $shared_request = array(
                    'question' => json_encode($content)
                );
                if (isset($image_top)) {
                    $shared_request['image_top'] = $image_top;
                }
                if (isset($image_bottom)) {
                    $shared_request['image_bottom'] = $image_bottom;
                }
                $insert = $this->question_model->common_insert(array_merge($shared_request,$this->author_data));
                if($insert){
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/'. $this->data['controller'] .'', 'refresh');
                }else {
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    $this->render('admin/question/create_question_view');
                }
        }
        $this->render('admin/question/create_question_view');
    }
    public function active(){
        redirect('admin/question/detail', 'refresh');
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            $update = $this->question_model->common_update($id,array_merge(array('is_activated' => 0),$this->author_data));
            if($update){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->return_api(HTTP_SUCCESS,'',$reponse);
            }
            return $this->return_api(HTTP_BAD_REQUEST);
        }
        return $this->return_api(HTTP_BAD_REQUEST);
    }
    public function deactive(){
        redirect('admin/question/detail', 'refresh');
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            $update = $this->question_model->common_update($id,array_merge(array('is_activated' => 1),$this->author_data));
            if($update){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->return_api(HTTP_SUCCESS,'',$reponse);
            }
            return $this->return_api(HTTP_BAD_REQUEST);
        }
        return $this->return_api(HTTP_BAD_REQUEST);
    }

    public function detail(){
        $id = 1;
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->question_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $this->load->helper('form');
                $this->load->library('form_validation');
                $detail = $this->question_model->get_by_id($id);
                $detail['question'] = json_decode($detail['question'],true);
                $this->data['detail'] = $detail;
                $this->render('admin/question/detail_question_view');
            }else{
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/question', 'refresh');
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            return redirect('admin/'.$this->data['controller'],'refresh');
        }
    }
    function remove(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->question_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode(array('status' => 404,'message' => MESSAGE_ISSET_ERROR)));
            }
            $data = array('is_deleted' => 1);
            $update = $this->question_model->common_update($id, $data);
            if($update){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
            }
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }

    public function edit(){
        $id = 1;
        if($id &&  is_numeric($id) && ($id > 0)){
            $this->load->helper('form');
            if($this->question_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/question', 'refresh');
            }
            $detail = $this->question_model->get_by_id($id);
            $detail['question'] = json_decode($detail['question'],true);
            $this->data['detail'] = $detail;
            if($this->input->post()){
                if(!empty($_FILES['image_shared_top']['name'])){
                    $this->check_img($_FILES['image_shared_top']['name'], $_FILES['image_shared_top']['size']);
                }
                if(!empty($_FILES['image_shared_bottom']['name'])){
                    $this->check_img($_FILES['image_shared_bottom']['name'], $_FILES['image_shared_bottom']['size']);
                }
                if(!empty($_FILES['image_shared_top']['name'])){
                    $image_top = $this->upload_image('image_shared_top', $_FILES['image_shared_top']['name'], 'assets/upload/'.$this->data['controller'], 'assets/upload/'.$this->data['controller'].'/thumb');
                }
                if(!empty($_FILES['image_shared_bottom']['name'])){
                    $image_bottom = $this->upload_image('image_shared_bottom', $_FILES['image_shared_bottom']['name'], 'assets/upload/'.$this->data['controller'], 'assets/upload/'.$this->data['controller'].'/thumb');
                }
                $content = array('question' => [],'title' => [], 'content' => []);
                foreach ($this->input->post('question') as $key => $value) {
                    $content['question'][$key] = $value;
                    $content['content'][$key] = $this->input->post('content'.($key+1));
                    if ($this->input->post('title'.($key+1)) != null) {
                        $content['title'][$key] = $this->input->post('title'.($key+1));
                    }else{
                        $content['title'][$key] = array();
                    }
                }
                $shared_request = array(
                    'question' => json_encode($content)
                );
                if(isset($image_top)){
                    $shared_request['image_top'] = $image_top;
                }
                if(isset($image_bottom)){
                    $shared_request['image_bottom'] = $image_bottom;
                }
                $update = $this->question_model->common_update($id,array_merge($shared_request,$this->author_data));
                if($update){
                    $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);

                    if(isset($image_top) && !empty($this->data['detail']['image_top'])){
                        $this->remove_img($id,$this->data['detail']['image_top'],1,'image_top');
                    }
                    if(isset($image_bottom) && !empty($this->data['detail']['image_bottom'])){
                        $this->remove_img($id,$this->data['detail']['image_bottom'],1,'image_bottom');
                    }
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_EDIT_SUCCESS,$reponse);
                }else {
                    return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR);
                }
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            redirect('admin/'. $this->data['controller'] .'', 'refresh');
        }
        $this->render('admin/question/edit_question_view');
    }

    public function remove_image(){
        $id = $this->input->post('id');
        $image = $this->input->post('image');
        $detail = $this->question_model->get_by_id($id);
        $upload = [];
        $upload = json_decode($detail['image']);
        $key = array_search($image, $upload);
        unset($upload[$key]);
        $newUpload = [];
        foreach ($upload as $key => $value) {
            $newUpload[] = $value;
        }
        
        $image_json = json_encode($newUpload);
        $data = array('image' => $image_json);

        $update = $this->question_model->common_update($id, $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            if($image != '' && file_exists('assets/upload/product/'.$detail['slug'].'/'.$image)){
                unlink('assets/upload/product/'.$detail['slug'].'/'.$image);
            }
            return $this->return_api(HTTP_SUCCESS,'',$reponse);
        }
        return $this->return_api(HTTP_BAD_REQUEST);
    }

    function remove_img($id = '',$image= '',$check =0,$name = 'image'){
        if($check == 0){
            $image = $this->input->post('image');
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $update = $this->question_model->common_update($id,array($name => ''));
        }else{
            $update = true;
        }
        if ($update) {
            if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$image)){
                unlink('assets/upload/'. $this->data['controller'] .'/'.$image);
                $new_array = explode('.', $image);
                $typeimg = array_pop($new_array);
                $nameimg = str_replace(".".$typeimg, "", $image);
                if(file_exists('assets/upload/'. $this->data['controller'] .'/thumb/'.$nameimg.'_thumb.'.$typeimg)){
                    unlink('assets/upload/'. $this->data['controller'] .'/thumb/'.$nameimg.'_thumb.'.$typeimg);
                }
            }
        }
        if($check == 0){
            return $this->return_api(HTTP_SUCCESS,'Xóa thành công!');
        }
    }

    /**
     * [build_parent_title description]
     * @param  [type] $parent_id [description]
     * @return [type]            [description]
     */
    protected function build_parent_title($parent_id){
        $sub = $this->product_category_model->get_by_id($parent_id, array('title'));

        if($parent_id != 0){
            $title = explode('|||', $sub['product_category_title']);
            $sub['title_en'] = $title[0];
            $sub['title_vi'] = $title[1];

            $title = $sub['title_vi'];
        }else{
            $title = 'Danh mục gốc';
        }
        return $title;
    }
    protected function check_img($filename, $filesize){
        $map = strripos($filename, '.')+1;
        $fileextension = substr($filename, $map,(strlen($filename)-$map));
        if(!($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png' || $fileextension == 'gif')){
            $this->session->set_flashdata('message_error', MESSAGE_FILE_EXTENSION_ERROR);
            redirect('admin/'.$this->data['controller']);
        }
        if ($filesize > 1228800) {
            $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
            redirect('admin/'.$this->data['controller']);
        }
    }
    function build_new_category($categorie, $parent_id = 0,&$result, $id = "",$char=""){
        $cate_child = array();
        foreach ($categorie as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $cate_child[] = $item;
                unset($categorie[$key]);
            }
        }
        if ($cate_child){
            foreach ($cate_child as $key => $value){
            $select = ($value['id'] == $id)? 'selected' : '';
            $result.='<option value="'.$value['id'].'"'.$select.'>'.$char.$value['title'].'</option>';
            $this->build_new_category($categorie, $value['id'],$result, $id, $char.'---|');
            }
        }
    }
}