<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('qdkd_db');
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	function check_login(){
		$r = [
			'error_code' => 0,
			'error_msg' => '',
		];
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if(empty($email) || empty($password)){
			$r = [
				'error_code' => 1,
				'error_msg' => '邮箱及密码不能为空',
			];
			goto ANCHOR_RESULT;
		}
		$re = $this->qdkd_db->get_admin_login($email,md5($password));
		if($re === 0){
			$r = [
				'error_code' => 1,
				'error_msg' => '账号或密码错误',
			];
			goto ANCHOR_RESULT;
		}

		$this->session->set_userdata('username', $email);

		ANCHOR_RESULT:
		echo json_encode($r);
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('http://weixin.hd/admin/login');
		//$this->load->view('admin/login');
	}
}
