<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('qdkd_db');
        if(!$this->session->has_userdata('username')){
            redirect('http://weixin.hd/admin/login');
        }
    }

    function index(){

    }

    function dqkd(){
        $this->load->view('admin/dqkd');
    }

    function djkd(){
        $this->load->view('admin/djkd');
    }

    function account(){
        $re = $this->qdkd_db->get_admin_user();
        $view_data['data'] = $re;
        $this->load->view('admin/account',$view_data);
    }
    function create_admin_user(){
        $r = [
            'error_code' => 0,
            'error_msg' => '',
        ];
        $name = $this->input->post('email');
        $password = $this->input->post('password');

        if(empty($name) || empty($password)){
            $r = [
                'error_code' => 1,
                'error_msg' => '邮箱及密码不能为空',
            ];
            goto ANCHOR_RESULT;
        }
        if(strpos($name,'@') === false){
            $r = [
                'error_code' => 1,
                'error_msg' => '请尽量使用邮箱作为账号',
            ];
            goto ANCHOR_RESULT;
        }
        if(strlen($name)>50 || md5($password)>50){
            $r = [
                'error_code' => 1,
                'error_msg' => '账户名或密码过长',
            ];
            goto ANCHOR_RESULT;
        }
        $options = [
            'name' => $name,
            'password' => md5($password),
            'creation_time' => date('Y-m-d H:i:s',time()),
        ];
        $re = $this->qdkd_db->create_admin_user($options);
        if($re === false){
            $r = [
                'error_code' => 1,
                'error_msg' => '网络错误',
            ];
            goto ANCHOR_RESULT;
        }
        ANCHOR_RESULT:
        echo json_encode($r);
    }
    function update_admin_password(){
        $r = [
            'error_code' => 0,
            'error_msg' => '',
        ];
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        if(empty($id)){
            $r = [
                'error_code' => 1,
                'error_msg' => '未知账户',
            ];
            goto ANCHOR_RESULT;
        }
        if(empty($password)){
            $r = [
                'error_code' => 1,
                'error_msg' => '密码不能为空',
            ];
            goto ANCHOR_RESULT;
        }
        if(strlen(md5($password))>50){
            $r = [
                'error_code' => 1,
                'error_msg' => '密码过长',
            ];
            goto ANCHOR_RESULT;
        }
        $re = $this->qdkd_db->update_admin_password($id,$password);
        if($re === false){
            $r = [
                'error_code' => 1,
                'error_msg' => '网络错误',
            ];
            goto ANCHOR_RESULT;
        }
        ANCHOR_RESULT:
        echo json_encode($r);
    }

    function jilu_qkd(){
        $status = !empty($this->input->get('status')) ? $this->input->get('status') : 0;
        $table = 'qkd';
        $page = !empty($this->input->get('page')) ? $this->input->get('page') : 1;
        if($page<=0){
            $page =1;
        }
        $limit = 5;
        if($status == 0){
            $where = [
                'status !='=>0,
            ];
        }
        if($status == 1){
            $where = [
                'status ='=>1,
            ];
        }
        if($status == 2){
            $where = [
                'status ='=>-1,
            ];
        }
        $offset = $limit*($page-1);
        $re = $this->qdkd_db->admin_order_page_list($table,$where,$limit,$offset);
        $num = $this->qdkd_db->admin_order_num($table,$where);
        $view_data['data'] = $re;
        $view_data['page_total'] =ceil($num/$limit);
        $view_data['page'] = $page;

        $this->load->view('admin/jilu_qkd',$view_data);
    }
    function jilu_dkd(){
        $status = !empty($this->input->get('status')) ? $this->input->get('status') : 0;
        $table = 'dkd';
        $page = !empty($this->input->get('page')) ? $this->input->get('page') : 1;
        if($page<=0){
            $page =1;
        }
        $limit = 5;
        if($status == 0){
            $where = [
                'status !='=>0,
            ];
        }
        if($status == 1){
            $where = [
                'status ='=>1,
            ];
        }
        if($status == 2){
            $where = [
                'status ='=>-1,
            ];
        }
        $offset = $limit*($page-1);
        $re = $this->qdkd_db->admin_order_page_list($table,$where,$limit,$offset);
        $num = $this->qdkd_db->admin_order_num($table,$where);
        $view_data['data'] = $re;
        $view_data['page_total'] =ceil($num/$limit);
        $view_data['status'] = $status;
        $view_data['curr'] = $page;
        $this->load->view('admin/jilu_dkd',$view_data);
    }
    function get_qkd_new_list(){
        $table = 'qkd';
        $status = 0;
       $re['data'] = $this->qdkd_db->admin_get_order_list($table,$status);
        echo json_encode($re);
    }
    function get_dkd_new_list(){
        $table = 'dkd';
        $status = 0;
        $re['data'] = $this->qdkd_db->admin_get_order_list($table,$status);
        echo json_encode($re);
    }
    function del_qkd_order(){
        $r = [
            'error_code' => 0,
            'error_msg' => '',
        ];
        $id = $this->input->post('id');
        if(empty($id)){
            $r = [
                'error_code' => 1,
                'error_msg' => '参数缺少',
            ];
            goto ANCHOR_RESULT;
        }
        $re = $this->qdkd_db->qkd_del($id);

        if($re === false){
            $r = [
                'error_code' => 1,
                'error_msg' => '网络错误',
            ];
            goto ANCHOR_RESULT;
        }
        ANCHOR_RESULT:
        echo json_encode($r);
    }
    function del_dkd_order(){
        $r = [
            'error_code' => 0,
            'error_msg' => '',
        ];
        $id = $this->input->post('id');
        if(empty($id)){
            $r = [
                'error_code' => 1,
                'error_msg' => '参数缺少',
            ];
            goto ANCHOR_RESULT;
        }
        $re = $this->qdkd_db->dkd_del($id);

        if($re === false){
            $r = [
                'error_code' => 1,
                'error_msg' => '网络错误',
            ];
            goto ANCHOR_RESULT;
        }
        ANCHOR_RESULT:
        echo json_encode($r);
    }
    function accept_qkd_order(){
        $r = [
            'error_code' => 0,
            'error_msg' => '',
        ];
        $id = $this->input->post('id');
        $table = 'qkd';
        if(empty($id)){
            $r = [
                'error_code' => 1,
                'error_msg' => '参数缺少',
            ];
            goto ANCHOR_RESULT;
        }
        $re = $this->qdkd_db->admin_accept_order($table,$id);

        if($re === false){
            $r = [
                'error_code' => 1,
                'error_msg' => '网络错误',
            ];
            goto ANCHOR_RESULT;
        }
        ANCHOR_RESULT:
        echo json_encode($r);
    }
    function accept_dkd_order(){
        $r = [
            'error_code' => 0,
            'error_msg' => '',
        ];
        $id = $this->input->post('id');
        $table = 'dkd';
        if(empty($id)){
            $r = [
                'error_code' => 1,
                'error_msg' => '参数缺少',
            ];
            goto ANCHOR_RESULT;
        }
        $re = $this->qdkd_db->admin_accept_order($table,$id);

        if($re === false){
            $r = [
                'error_code' => 1,
                'error_msg' => '网络错误',
            ];
            goto ANCHOR_RESULT;
        }
        ANCHOR_RESULT:
        echo json_encode($r);
    }
}
