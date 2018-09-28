<?php 

/**
* 
*/
class Banner extends Admin_Controller{
	private $request_language_template = array(
        'title', 'description'
    );
    private $author_data = array();

	function __construct(){
		parent::__construct();
		$this->load->model('banner_model');
		$this->load->helper('common');
        $this->load->helper('file');
        $this->data['controller'] = $this->banner_model->table;
		$this->author_data = handle_author_common_data();

	}

    public function index(){
        redirect('admin/banner/detail', 'refresh');
        $this->data['keyword'] = '';
        if($this->input->get('search')){
            $this->data['keyword'] = $this->input->get('search');
        }
        $this->load->library('pagination');
        $per_page = 10;
        $total_rows  = $this->banner_model->count_search($this->data['keyword']);
        $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/index'), $total_rows, $per_page, 4);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['result'] = $this->banner_model->get_all_with_pagination_search('desc',$per_page, $this->data['page'], $this->data['keyword']);
        $this->render('admin/banner/list_banner_view');
    }
    public function create(){
        redirect('admin/banner/detail', 'refresh');
        $this->load->helper('form');
        if($this->input->post()){
            $this->load->library('form_validation');
            // $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
            // if($this->form_validation->run() == TRUE){
                if(empty($_FILES['image_shared']['name'])){
                    $this->session->set_flashdata('message_error', MESSAGE_EMPTY_IMAGE_ERROR);
                    redirect('admin/'.$this->data['controller']);
                }
                if(!empty($_FILES['image_shared']['name'])){
                    $this->check_imgs($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
                }
                if(!empty($_FILES['image_shared']['name'])){
                    $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/'.$this->data['controller'], 'assets/upload/'.$this->data['controller'].'/thumb');
                }
                $shared_request = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description')
                );
                $shared_request['image'] = $image;
                $insert = $this->banner_model->common_insert(array_merge($shared_request,$this->author_data));
                if($insert){
                    $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                    redirect('admin/'. $this->data['controller'] .'', 'refresh');
                }else {
                    $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                    $this->render('admin/banner/create_banner_view');
                }
            // }
        }
        $this->render('admin/banner/create_banner_view');
    }
    public function active(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->banner_model->find_rows(array('is_activated' => 0,'is_deleted' => '0')) == 0){
                $update = $this->banner_model->common_update($id,array('is_activated' => 0));
                if($update){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS, 'Bật banner thành công',$reponse);
                }
            }
            return $this->return_api(HTTP_NOT_FOUND,'Bạn chỉ được sử dụng 1 banner, Vui lòng tắt banner đang sử dụng để sử dụng banner hiện tại');
        }
        return $this->return_api(HTTP_NOT_FOUND);
    }
    public function deactive(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            $update = $this->banner_model->common_update($id,array('is_activated' => 1));
            if($update){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->return_api(HTTP_SUCCESS, 'Tắt banner thành công',$reponse);
            }
            return $this->return_api(HTTP_NOT_FOUND,'Lỗi tắt banner, Vui lòng thao tác lại');
        }
        return $this->return_api(HTTP_NOT_FOUND);
    }

    public function detail(){
        $id = 37;
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->banner_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $this->load->helper('form');
                $this->load->library('form_validation');
                $detail = $this->banner_model->get_by_id($id);
                $detail['image'] = json_decode($detail['image'],true);
                $this->data['detail'] = $detail;
                $this->render('admin/banner/detail_banner_view');
            }else{
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/banner', 'refresh');
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            return redirect('admin/'.$this->data['controller'],'refresh');
        }
    }
    function remove(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->banner_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode(array('status' => 404,'message' => MESSAGE_ISSET_ERROR)));
            }
            $data = array('is_deleted' => 1);
            $update = $this->banner_model->common_update($id, $data);
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
        $id = 37;
        if($id &&  is_numeric($id) && ($id > 0)){
            $this->load->helper('form');
            if($this->banner_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/banner', 'refresh');
            }
            $detail = $this->banner_model->get_by_id($id);
            $detail['image'] = json_decode($detail['image'],true);
            $this->data['detail'] = $detail;
            if($this->input->post()){
                $this->load->library('form_validation');
                // $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
                // if($this->form_validation->run() == TRUE){
                    if(!empty($_FILES['image_shared']['name'][0])){
                        $this->check_imgs($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
                    }
                    if(!empty($_FILES['image_shared']['name'][0])){                        
                        $image = $this->upload_file('assets/upload/'.$this->data['controller'], 'image_shared', 'assets/upload/'.$this->data['controller'].'/thumb');
                    }
                    $shared_request = array(
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description')
                    );
                    if(isset($image)){
                        $img_data = array(
                            'avata' => empty($detail['image']['avata']) ? array_merge($detail['image']['image'],$image)[0] : $detail['image']['avata'],
                            'image' => array_merge($detail['image']['image'],$image)
                        );
                        $shared_request['image'] = json_encode($img_data);
                    }
                    $update = $this->banner_model->common_update($id,array_merge($shared_request,$this->author_data));
                    if($update){
                        $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                        // if(isset($image) && !empty($this->data['detail']['image'])){
                        //     if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$this->data['detail']['image']))
                        //     unlink('assets/upload/'. $this->data['controller'] .'/'.$this->data['detail']['image']);
                        // }
                        redirect('admin/'. $this->data['controller'] .'/detail', 'refresh');
                    }else {
                        $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                        $this->render('admin/'. $this->data['controller'] .'/edit_product_category_view');
                    }
                // }
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            redirect('admin/'. $this->data['controller'] .'', 'refresh');
        }
        $this->render('admin/banner/edit_banner_view');
    }

    public function remove_image(){
        if($this->input->post()){
            $id = 37;
            $image = $this->input->post('image');
            $detail = $this->banner_model->get_by_id($id);
            $upload = [];
            $upload = json_decode($detail['image'],true);
            $key = array_search($image, $upload['image']);
            unset($upload['image'][$key]);
            $upload['image'] = array_values($upload['image']);
            if($image == $upload['avata']){
                $upload['avata'] = '';
            }
            $update = $this->banner_model->common_update($id, array('image' => json_encode($upload)));
            if($update == 1){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                if($image != '' && file_exists('assets/upload/banner/'.$image)){
                    unlink('assets/upload/banner/'.$image);
                }
                return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
            }
            return $this->return_api(HTTP_BAD_REQUEST,MESSAGE_REMOVE_ERROR);
        }else{
            redirect('admin/'. $this->data['controller'] .'/detail', 'refresh');
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
    protected function check_imgs($filename, $filesize){
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash()
        );
        // print_r($filesize);die;
        $images = array('jpg', 'jpeg', 'png', 'gif');
        foreach ($filename as $key => $value) {
            $map[] = explode('.',$value);
        }
        foreach ($map as $key => $value) {
            $new_map[] = $value[1];
        }
        if(array_diff($new_map, $images) != null){
            return $this->return_api(HTTP_SUCCESS,MESSAGE_FILE_EXTENSION_ERROR,$reponse);
        }
        $image_size = array('success');

        foreach ($filesize as $key => $value) {
            if ($value > 1228800) {
                $check_size[] = 'error';
            }else{
                $check_size[] = 'success';
            }
        }
        if (array_diff($check_size, $image_size) != null) {
            return $this->return_api(HTTP_SUCCESS,sprintf(MESSAGE_PHOTOS_ERROR, 1200),$reponse);
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

    protected function remove_img($image= ''){
        if(file_exists('assets/upload/'. $this->data['controller'].'/'.$image)){
            unlink('assets/upload/'. $this->data['controller'].'/'.$image);
            $new_array = explode('.', $image);
            $typeimg = array_pop($new_array);
            $nameimg = str_replace(".".$typeimg, "", $image);
            if(file_exists('assets/upload/'. $this->data['controller'] .'/thumb/'.$nameimg.'_thumb.'.$typeimg)){
                unlink('assets/upload/'. $this->data['controller'] .'/thumb/'.$nameimg.'_thumb.'.$typeimg);
            }
        }
    }

    public function img_activated(){
        $id = 37;
        $image = $this->input->post('image');
        $detail = $this->banner_model->get_by_id($id);
        $active = json_decode($detail['image'],true);
        if($active['avata'] != $image){
            $active['avata'] = $image;
            $update_activated = "1";
        }else{
            $active['avata'] = "";
            $update_activated = "0";
        }
        $data = array('image' => json_encode($active));
        $update = $this->banner_model->common_update($id, $data);
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash(),
            'update_activated' => $update_activated
        );
        if($update == 1){
            return $this->return_api(HTTP_SUCCESS,MESSAGE_UPDATE_SUCCESS,$reponse);
        }
        return $this->return_api(HTTP_SUCCESS,MESSAGE_UPDATE_ERROR,$reponse);
    }
}