<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	private $redirect_url = 'http://xxxxx/index';
	private $appid = '';
	private $appsecret = '';
	private $scope = 'snsapi_base';
	function __construct(){
        echo 1233333;
//		$this->load->library('Http');
	}


	public function index(){
//		$code = $_GET['code'];
//		$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appid.'&secret='.$this->appsecret.'&code='.$code.'&grant_type=authorization_code';
//		$res = Http::request($url);
//		if(empty($res)){
//			show_404('errors/html/error_404');
//		}
//		$re = json_decode($res);
//		if(!empty($res['errcode'])){
//			show_404('errors/html/error_404');
//		}
//
//		$access_token = $re['access_token'];
//		$refresh_token = $re['refresh_token'];
//		$openid = $re['openid'];
//		$scope = $re['scope'];
//		$data['openid']=$openid;
		$this->load->view('index/index');
	}

	public function get_token(){
		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->appid.'&secret='.$this->appsecret;
		$res = Http::request($url);
		return $res;
	}

	//获取用户openid
	public function get_info(){
		//https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect
		$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$this->appid."&redirect_uri=".urlencode($this->redirect_url)."&response_type=code&scope=".$this->scope."&state=STATE#wechat_redirect";
		Http::request($url);
	}

	public function get_code(){
		$result = [
			'errcode' => 0,
			'errmsg' => '',
		];
		$code = $_GET['code'];
		$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appid.'&secret='.$this->appsecret.'&code='.$code.'&grant_type=authorization_code';
		$res = Http::request($url);
		if(empty($res)){
			$result['errcode'] = 1;
			$result['errmsg'] = '系统错误';
			goto  ANCHOR_RESULT;
		}
		$re = json_decode($res);
		if(!empty($res['errcode'])){
			$result = $res;
			goto ANCHOR_RESULT;
		}
		$access_token = $re['access_token'];
		$refresh_token = $re['refresh_token'];
		$openid = $re['openid'];
		$scope = $re['scope'];


		ANCHOR_RESULT:
		return $result;
	}

	public function refresh_token(){
		$url='https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=APPID&grant_type=refresh_token&refresh_token=REFRESH_TOKEN';

	}
}
