<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {
    public function __construct(){
        parent::__construct();
        //Do your magic here
        $this->load->model('creator_model');
        $this->load->model('banner_model');
        $this->load->model('customer_model');
        $this->load->model('post_category_model');
        $this->value = array(
            [
                'id' => 1,
                'name' => 'Lyly Sury',
                'image' => 'Lyly_Sury.jpeg',
                'job' => 'Creator mảng Game',
                'facebook' => 1,
                'fb_link' => 'facebook.com',
                'youtube' => 1,
                'yt_link' => '',
                'instagram' => 1,
                'in_link' => ''
            ],
            [
                'id' => 2,
                'name' => 'Phương Tân',
                'image' => 'Phuong_Tan.jpeg',
                'job' => 'Creator mảng Game',
                'facebook' => 1,
                'fb_link' => '',
                'youtube' => 1,
                'yt_link' => '',
                'instagram' => 0,
                'in_link' => ''
            ],
            [
                'id' => 3,
                'name' => 'PhươngTQ',
                'image' => 'PhuongTQ.jpg',
                'job' => 'Creator mảng Game',
                'facebook' => 1,
                'fb_link' => '',
                'youtube' => 1,
                'yt_link' => '',
                'instagram' => 0,
                'in_link' => ''
            ],
            [
                'id' => 4,
                'name' => 'Phương Thảo',
                'image' => 'Phuong_thao.jpg',
                'job' => 'Creator mảng Game',
                'facebook' => 1,
                'fb_link' => '',
                'youtube' => 1,
                'yt_link' => '',
                'instagram' => 1,
                'in_link' => ''
            ]

        );

        $this->services = array(
            [
                'id' => 1,
                'title' => 'TVC',
                'desc' => 1,
                'description' => 'Thương hiệu muốn quảng bá TVC thông qua truyền thông xã hội (social media), các hot fanpage, group, các influencer... khi kết hợp với 20section sẽ trải qua các quá trình:',
                'info' => array(
                    'Nghiên cứu đặc tính sản phẩm',
                    'Xác định xu hướng cùng thời điểm trên truyền thông xã hội',
                    'Sản xuất sản phẩm vừa mang tính giải trí, phù hợp với xu hướng, xu thế. Vừa truyền tải được đặc tính sản phẩm.'
                ),
                'image_01' => 'https://images.unsplash.com/photo-1493599588594-dc6ae2c099bf?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=41762eaaa962098f81dcce9ed2297bfb&auto=format&fit=crop&w=675&q=80',
                'image_02' => 'https://images.unsplash.com/photo-1490971588422-52f6262a237a?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=241c14dac2e2ae69e46b3dfb9691e203&auto=format&fit=crop&w=634&q=80'
            ],
            [
                'id' => 2,
                'title' => 'Livestream',
                'desc' => 1,
                'description' => 'Thương hiệu muốn có được sự tương tác của người dùng mạng xã hội với sản phẩm của mình.',
                'info' => array(
                    '20section sẽ lựa chọn các influencer có hình tượng phù hợp với sản phẩm, chiến dịch của nhãn hàng',
                    'Lên kịch bản và tổ chức sản xuất các buổi livestream của các creator có lồng ghép trao đổi về sản phẩm, chiến dịch của nhãn hàng',
                    'Để influencer và người xem trao đổi về sản phẩm của nhãn hàng trên livestream'
                ),
                'image_01' => 'https://images.unsplash.com/photo-1535223289827-42f1e9919769?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=53fbc60d7594ae9a59dd6d41af67cba0&auto=format&fit=crop&w=634&q=80',
                'image_02' => 'https://images.unsplash.com/photo-1531525645387-7f14be1bdbbd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=4a99fc6885bdf5c5e71eaaabffb5561b&auto=format&fit=crop&w=800&q=80'
            ]

        );
    }
    public function index(){
        $this->data['the_view_content'] = 'homepage_view';
        $this->data['result'] = $this->creator_model->get_all();
        $this->data['banner'] = $this->banner_model->get_by_id(37);
        $this->data['customer'] = $this->customer_model->get_all();
        $this->data['division_x'] = $this->post_category_model->get_by_id(1);
        $this->data['influence_marketing'] = $this->post_category_model->get_by_id(2);
        $this->data['post_service'] = $this->post_category_model->get_by_id(3);
        $this->data['job_opportunity'] = $this->post_category_model->get_by_id(4);
        $this->data['services'] = $this->services;

        $this->load->view('templates/master_view', $this->data);

//        $this->data['result'] = $this->value;
//        $this->render('homepage_view');
    }

}

/* End of file Homepage.php */
/* Location: ./application/controllers/Homepage.php */