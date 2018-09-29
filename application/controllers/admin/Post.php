<?php 

/**
* 
*/
class Post extends Admin_Controller{
    private $author_data = array();
    private $controller = '';

	function __construct(){
		parent::__construct();
		$this->load->model('post_model');
        $this->load->model('post_category_model');
		$this->load->helper('common');
        $this->load->helper('file');
        $this->controller = 'post';
        $this->data['controller'] = $this->controller;
		$this->author_data = handle_author_common_data();
	}

    public function index(){
        $keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->post_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->post_model->count_search($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/'. $this->controller .'/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $result = $this->post_model->get_all_with_pagination_search('desc', $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->post_model->get_all_with_pagination_search('desc', $per_page, $this->data['page'], $keywords);
        }
        foreach ($result as $key => $value) {
            $parent_title = $this->build_parent_title($value['post_category_id']);
            $result[$key]['parent_title'] = $parent_title;
        }
        $this->data['result'] = $result;
        
        
        $this->render('admin/post/list_post_view');
    }

	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $post_category = $this->post_category_model->get_by_parent_id(null,'asc');
        $this->data['post_category'] = $post_category;

        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('parent_id_shared', 'Danh mục', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/post/create_post_view');
        } else {
        	if($this->input->post()){
            	$slug = $this->input->post('slug_shared');
                $unique_slug = $this->post_model->build_unique_slug($slug);

                if(!empty($_FILES['image_shared']['name'][0])){
                    $this->check_imgs($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
                }
                if(!empty($_FILES['image_shared']['name'][0])){                        
                    $image = $this->upload_file('assets/upload/'.$this->data['controller'], 'image_shared', 'assets/upload/'.$this->data['controller'].'/thumb');
                }
                $shared_request = array(
                    'slug' => $unique_slug,
                    'title' => $this->input->post('title'),
                    'description' => json_encode($this->input->post('description')),
                    'content' => $this->input->post('content'),
                    'post_category_id' => $this->input->post('parent_id_shared'),
                    'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by'],
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
                );
                if(isset($image)){
                    $shared_request['image'] = json_encode($image);
                }
                $insert = $this->post_model->common_insert($shared_request);
                if($insert){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_CREATE_SUCCESS,$reponse);
                }else {
                    return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
                }
        	}
        }
        
	}

    public function detail($id){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $per_page = 5;

        $detail = $this->post_model->get_by_id($id);
        $parent_title = $this->build_parent_title($detail['post_category_id']);
        $detail['parent_title'] = $parent_title;

        $this->data['detail'] = $detail;
        
        

        $this->render('admin/post/detail_post_view');
    }

    public function edit($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->post_model->get_by_id($id);
        $category = $this->post_category_model->get_by_parent_id(null,'asc');
        
        $this->data['category'] = $category;
        
        $this->data['detail'] = $detail;
        $this->form_validation->set_rules('title', 'Tiêu đề', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/post/edit_post_view');
        } else {
            if($this->input->post()){

                $slug = $this->input->post('slug_shared');
                $unique_slug = $this->post_model->build_unique_slug($slug, $id);
                if(!empty($_FILES['image_shared']['name'][0])){
                    $this->check_imgs($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
                }
                if(!empty($_FILES['image_shared']['name'][0])){                        
                    $image = $this->upload_file('assets/upload/'.$this->data['controller'], 'image_shared', 'assets/upload/'.$this->data['controller'].'/thumb');
                }
                $shared_request = array(
                    'slug' => $unique_slug,
                    'title' => $this->input->post('title'),
                    'description' => json_encode($this->input->post('description')),
                    'content' => $this->input->post('content'),
                    'post_category_id' => $this->input->post('parent_id_shared'),
                    'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by'],
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
                );
                if(isset($image)){
                    $detail['image'] = (!empty(json_decode($detail['image']))) ? json_decode($detail['image']) : array();
                    $shared_request['image'] = json_encode(array_merge($detail['image'],$image));
                }
                $update = $this->post_model->common_update($id, $shared_request);
                if($update){
                    // if($image != '' && $image != $detail['image'] && file_exists('assets/upload/'. $this->controller .'/'.$detail['image'])){
                    //     unlink('assets/upload/'. $this->controller .'/'.$detail['image']);
                    // }
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_EDIT_SUCCESS,$reponse);
                }else {
                    return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR);
                }
            }
        }
    }


    public function active(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            $post = $this->post_model->find($id);
            $post_category = $this->post_category_model->find($post['post_category_id']);
            if($post_category['is_activated'] == 1){
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode(array('status' => 404,'message' => MESSAGE_ERROR_ACTIVE_POST)));
            }
            if($this->post_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $update = $this->post_model->common_update($id,array_merge(array('is_activated' => 0),$this->author_data));
                if($update){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,'Bật bài viết thành công',$reponse);
                }
                return $this->return_api(HTTP_BAD_REQUEST);
            }
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ISSET_ERROR);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }
    public function deactive(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->post_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $update = $this->post_model->common_update($id,array_merge(array('is_activated' => 1),$this->author_data));
                if($update){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,'Tắt bài viết thành công',$reponse);
                }
                return $this->return_api(HTTP_BAD_REQUEST);
            }
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ISSET_ERROR);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }

    public function remove(){
        $id = $this->input->post('id');
        $data = array('is_deleted' => 1);
        $update = $this->post_model->common_update($id, $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
    }


    /**
     * [build_parent_title description]
     * @param  [type] $parent_id [description]
     * @return [type]            [description]
     */
    protected function build_parent_title($parent_id){
        $sub = $this->post_category_model->get_by_id($parent_id);
        if($parent_id != 0){
            $title = $sub['title'];
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
    public function img_activated(){
        $id = $this->input->post('id');
        $image = $this->input->post('image');
        $detail = $this->post_model->get_by_id($id);
        $active = json_decode($detail['image'],true);
        $update_activated = "1";
        if($detail['avatar'] != $image){
            $active['avata'] = $image;
        }
        $data = array('avatar' => $image);
        $update = $this->post_model->common_update($id, $data);
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash(),
            'update_activated' => $update_activated
        );
        if($update == 1){
            return $this->return_api(HTTP_SUCCESS,MESSAGE_UPDATE_SUCCESS,$reponse);
        }
        return $this->return_api(HTTP_SUCCESS,MESSAGE_UPDATE_ERROR,$reponse);
    }
    public function remove_image(){
        if($this->input->post()){
            $id = $this->input->post('id');
            $image = $this->input->post('image');
            $detail = $this->post_model->get_by_id($id);
            $upload = [];
            $upload = json_decode($detail['image'],true);
            $key = array_search($image, $upload);
            unset($upload[$key]);
            $upload = array_values($upload);
            if($image == $detail['avatar']){
                $detail['avatar'] = '';
            }
            $update = $this->post_model->common_update($id, array('image' => json_encode($upload),'avatar' => $detail['avatar']));
            if($update == 1){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                if($image != '' && file_exists('assets/upload/post/'.$image)){
                    unlink('assets/upload/post/'.$image);
                }
                return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
            }
            return $this->return_api(HTTP_BAD_REQUEST,MESSAGE_REMOVE_ERROR);
        }else{
            redirect('admin/'. $this->data['controller'] .'/detail', 'refresh');
        }
        
    }

}