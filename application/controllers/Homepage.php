<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'class.phpmailer.php';
require 'class.smtp.php';
class Homepage extends Public_Controller {
    public function __construct(){
        parent::__construct();
        //Do your magic here
        $this->load->model('creator_model');
        $this->load->model('banner_model');
        $this->load->model('customer_model');
        $this->load->model('post_category_model');
        $this->load->model('post_model');
        $this->load->model('question_model');
        $this->load->helper('email');
    }
    public function index(){
        $this->data['the_view_content'] = 'homepage_view';
        $this->data['result'] = $this->creator_model->get_all();
        $this->data['banner'] = $this->banner_model->get_by_id(37);
        $this->data['customer'] = $this->customer_model->get_all_lang();
        $this->data['division_x'] = $this->post_category_model->get_by_id(1);
        $this->data['influence_marketing'] = $this->post_category_model->get_by_id(2);
        $this->data['services'] = $this->post_model->get_by_category_id(3,0);
        $this->data['job_opportunity'] = (count($this->post_model->get_by_category_id(4,0)) > 0) ? $this->post_model->get_by_category_id(4,0)[0] : array();
        $this->data['question'] = $this->question_model->get_by_id(1);
        $this->data['question']['question'] = json_decode($this->data['question']['question'],true);
        $this->load->view('templates/master_view', $this->data);

//        $this->data['result'] = $this->value;
//        $this->render('homepage_view');
    }
    public function send_mail(){
        $question = $this->question_model->get_by_id(1);
        $question['question'] = json_decode($question['question'],true);
        if ($this->input->post()) {
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            if(!is_numeric(trim($this->input->post('contact_phone')))){
                return $this->return_api(HTTP_SUCCESS,'Số điện thoại phải là chữ số.',$reponse);
            }
            if(empty(trim($this->input->post('contact_name'))) || empty(trim($this->input->post('contact_mail'))) || empty(trim($this->input->post('contact_phone'))) || empty(trim($this->input->post('contact_address')))){
                return $this->return_api(HTTP_SUCCESS,'Vui lòng thao tác lại',$reponse);
            }
            $ip = $this->getRealIPAddress();
            
            if($this->session->has_userdata($ip)){
                return $this->return_api(HTTP_SUCCESS,'Bạn đã đăng ký rồi vui lòng chờ xác nhận.',$reponse);
            }else{
                $content ="
                    <h2>Thông tin đăng ký:</h2>
                    <table><tbody>
                        <tr style='height:30px;'>
                            <th style='text-align: left;'>Họ Tên</th>
                            <td>:  ".$this->input->post('contact_name')."</td>
                        </tr>
                        <tr style='height:30px;'>
                            <th style='text-align: left;'>Địa chỉ Email</th>
                            <td>:  ".$this->input->post('contact_mail')."</td>
                        </tr>
                        <tr style='height:30px;'>
                            <th style='text-align: left;'>Số Điện Thoại</th>
                            <td>:  ".$this->input->post('contact_phone')."</td>
                        </tr>
                        <tr style='height:30px;'>
                            <th style='text-align: left;'>Địa chỉ</th>
                            <td>:  ".$this->input->post('contact_address')."</td>
                        </tr>
                        <tr style='height:30px;'>
                            <th style='text-align: left;'>Lời nhắn</th>
                            <td>:  ".$this->input->post('contact_message')."</td>
                        </tr>
                    </tbody></table>
                    <h3>Lựa chọn:</h3>
                        <table><tbody>
                            <tr style='height:30px;'>
                                <th style='text-align: left;'>Stt</th>
                                <th style='text-align: left;'>Tiêu đề</th>
                                <th style='text-align: left;'>Nội dung</th>
                            </tr>
                ";
                $active = $this->input->post('active');
                foreach ($active as $key => $value) {
                    $content .="
                        <tr style='height:30px;'>
                            <td>  ".($key+1)."</td>
                            <td>".$question['question']['title'][1][trim($value)]."</td>
                            <td>".$question['question']['content'][1][trim($value)]."</td>
                        </tr>
                    ";
                }
                $content .="
                        <tr style='height:30px;'>
                            <th style='text-align: left;'>Team phù hợp</th>
                            <td>:  ".$question['question']['content'][2][trim($this->input->post('team'))]."</td>
                        </tr>
                    </tbody></table>
                ";
                $description = "Thông tin đăng ký 20s.";
                $send_mail = send_mail("20sectionhosting@gmail.com","vkgbvtqxsyrypsgw","minhtruong93gtvt@gmail.com",'trungdung@20section.com','20 Section',$description,$content);
                if($send_mail == 'Success'){
                    $this->session->set_userdata($ip,$ip);
                    $this->session->mark_as_temp($ip, 3600);
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_REGISTRATION_SUCCESS,$reponse);
                }else{
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_REGISTRATION_ERROR,$reponse);
                }
            }
        }else{
            redirect('/', 'refresh');
        }
    }

    function getRealIPAddress(){  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    } 

}

/* End of file Homepage.php */
/* Location: ./application/controllers/Homepage.php */