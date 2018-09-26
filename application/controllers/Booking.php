<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include "class.phpmailer.php";
include "class.smtp.php";
class Booking extends Public_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('banner_model');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');

        $this->load->helper('url');
        $this->load->model('order_model');
    }

    public function index() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->data['current_link'] = 'booking';

        /**
         * Get Banner
         */
        $banner = $this->banner_model->get_all_banner();
        $this->data['banner'] = $banner;

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('contact_name', 'Your name', 'required');
        $this->form_validation->set_rules('contact_mail', 'Your email', 'required');
        $this->form_validation->set_rules('contact_phone', 'Your phone number', 'required');
        //$this->form_validation->set_rules('contact_address', 'Your address', 'required');
        $this->form_validation->set_rules('contact_date', 'Date', 'required');
        $this->form_validation->set_rules('contact_time', 'Time', 'required');
        $this->form_validation->set_rules('contact_quantity', 'Number of people', 'required');

        if ($this->form_validation->run() == true) {
            if($this->input->post()){
                $data = array();
                $data['name'] = $this->input->post('contact_name');
                $data['email'] = $this->input->post('contact_mail');
                $data['phone'] = $this->input->post('contact_phone');
                //$data['address'] = $this->input->post('contact_address');
                $data['time'] = $this->input->post('contact_time') .' - '. $this->input->post('contact_date');
                $data['quantity'] = $this->input->post('contact_quantity');
            }
            $this->order_model->common_insert($data);
            $send = $this->send_mail($data);

            if($send == false){
                $this->output->set_status_header(404)
                    ->set_output(json_encode(array('message' => 'Fail', 'data' => $data)));
            }else{
                redirect('booking');
            }
        }else{
            $this->render('booking_view');
        }
    }

    public function send_mail($data) {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // set mailer to use SMTP
        $mail->Host = "smtp.gmail.com"; // specify main and backup server
        $mail->Port = 465; // set the port to use
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->SMTPSecure = 'ssl';
        $mail->Username = "nghemalao@gmail.com"; // your SMTP username or your gmail username
        $mail->Password = "Huongdan1"; // your SMTP password or your gmail password
        $from = "minhtruong93gtvt@gmail.com"; // Reply to this email
        $to = "truong.do@matocreative.vn"; // Recipients email ID
        $name = 'WEBMAIL'; // Recipient's name
        $mail->From = $from;
        $mail->FromName = $name; // Name to indicate where the email came from when the recepient received
        $mail->AddAddress($to, $name);
        $mail->CharSet = 'UTF-8';
        $mail->WordWrap = 50; // set word wrap
        $mail->IsHTML(true); // send as HTML
        $mail->Subject = "Mail từ " . strip_tags($data['name']);

        $mail->Body = $this->email_template($data); //HTML Body

        //$mail->SMTPDebug = 2;

        if(!$mail->Send()){
            return false;
        } else {
            return true;
        }
    }

    public function email_template($data){
        $message = '<html><body>';
        $message .= '<p>Chào Admin, bạn có order mới từ người dùng trên website</p>';
        $message .= '<p>Thông tin như sau:</p>';
        $message .= '<p>Họ tên: ' . $data['name'] . '</p>';
        $message .= '<p>Email: ' . $data['email'] . '</p>';
        $message .= '<p>Số điện thoại: ' . $data['phone'] . '</p>';
        //$message .= '<p>Địa chỉ: ' . $data['address'] . '</p>';
        $message .= '<p>Thời gian: ' . $data['time'] . '</p>';
        $message .= '<p>Số người: ' . $data['quantity'] . '</p>';
        $message .= "</body></html>";

        return $message;
    }

}