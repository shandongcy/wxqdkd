<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qdkd extends CI_Controller {
    private $redirect_url = 'http://xxxxx/index';
    private $appid = 'wx4dba6c3348101ae7';
    private $appsecret = '80d6a58fdf8c7996027cba4e0bd7674b';
    private $scope = 'snsapi_base';
    private $access_token = '';
    private $refresh_token = '';
    function __construct(){
        parent::__construct();
        $this->load->library('http');
        $this->load->model('qdkd_db');
    }
    public function error(){
        $this->load->view('error');
    }
    public function index(){
        $code = $this->input->get('code');
        $re= $this->get_code($code);
        if($re['errcode'] !== 0){
            show_404('error');
        }
        $view_data = $re['data'];
        $this->load->view('index',$view_data);
	}
    public function qkd(){
        $code = $this->input->get('code');
        $re= $this->get_code($code);
        if($re['errcode'] !== 0){
            exit();
        }
        $view_data = $re['data'];
        $this->load->view('qkd',$view_data);
    }
    public function dkd(){
        $code = $this->input->get('code');
        $re= $this->get_code($code);
        if($re['errcode'] !== 0){
            exit();
        }
        $view_data = $re['data'];
        $this->load->view('dkd',$view_data);
    }


    public function dkd_create(){
        $r = [
            'error_code' => 0,
            'error_msg' => '',
        ];
        $user_id = $this->input->post('user_id');
        $jname = $this->input->post('jname');
        $jtel = $this->input->post('jtel');
        $sch_name = $this->input->post('sch_name');
        $fl_name = $this->input->post('fl_name');
        $sname = $this->input->post('sname');
        $stel = $this->input->post('stel');
        $post_type = $this->input->post('post_type');
        $address = $this->input->post('address');

        if(empty($user_id)){
            $r = [
                'error_code' => 1,
                'error_msg' => '未知用户',
            ];
            goto ANCHOR_RESULT;
        }
        if(empty($jname) || empty($jtel) || empty($sch_name) || empty($fl_name) || empty($sname) || empty($stel) || empty($post_type) || empty($address) || empty($is_mr)){
            $r = [
                'error_code' => 1,
                'error_msg' => '缺少必填项',
            ];
            goto ANCHOR_RESULT;
        }
        $rd = rand(100,999) ;
        $order_id = 'JK'.time().$rd;
        $params = [
            'user_id' => $user_id,
            'order_id' => $order_id,
            'jname' => $jname,
            'jtel' => $jtel,
            'school_name' => $sch_name,
            'floor_name' => $fl_name,
            'sname' => $sname,
            'stel' => $stel,
            'post_type' => $post_type,
            'address' => $address,
        ];
        $re = $this->qdkd_db->dkd_create($params);
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
    public function dkd_list(){
        $user_id = $this->input->get('user_id');
        $re = $this->qdkd_db->get_dkd_order_list($user_id);
        if($re === false){
            $view_data['list'] = '网络错误' ;
        }else{
            $view_data['list'] = $re;
            if(!empty($view_data['list'])){
                foreach($view_data['list'] as $k=>$row){
                    if($row['status'] == 0){
                        $view_data['list'][$k]['status_str'] = '未开始';
                    }elseif($row['status'] == 1){
                        $view_data['list'][$k]['status_str'] = '进行中';
                    }else{
                        $view_data['list'][$k]['status_str'] = '已完成';
                    }
                }
            }
        }

        $this->load->view('dkdlist',$view_data);

    }
    public function dkd_del(){
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
        if($re == false){
            $r = [
                'error_code' => 1,
                'error_msg' => '网络错误',
            ];
            goto ANCHOR_RESULT;
        }
        ANCHOR_RESULT:
        echo json_encode($r);
    }
    public function qkd_create(){
        $r = [
            'error_code' => 0,
            'error_msg' => '',
        ];
        $user_id = $this->input->post('user_id');
        $qname = $this->input->post('qname');
        $qtel = $this->input->post('qtel');
        $sch_name = $this->input->post('school');
        $fl_name = $this->input->post('floor');
        $post_from = $this->input->post('post_from');
        $post_type = $this->input->post('post_type');
        $prove_info = $this->input->post('prove_info');
        $remark = !empty($this->input->post('remark')) ? $this->input->post('remark') : '';
        if(empty($user_id)){
            $r = [
                'error_code' => 1,
                'error_msg' => '未知用户',
            ];
            goto ANCHOR_RESULT;
        }
        if(empty($qname) || empty($qtel) || empty($sch_name) || empty($fl_name) || empty($post_from) || empty($post_type) || empty($prove_info)){
            $r = [
                'error_code' => 1,
                'error_msg' => '缺少必填项',
            ];
            goto ANCHOR_RESULT;
        }
        $rd = rand(100,999) ;
        $order_id = 'QK'.time().$rd;
        $params = [
            'user_id' => $user_id,
            'order_id' => $order_id,
            'qname' => $qname,
            'qtel' => $qtel,
            'school_name' => $sch_name,
            'floor_name' => $fl_name,
            'post_from' => $post_from,
            'post_type' => $post_type,
            'prove_info' => $prove_info,
            'remark'    => $remark,
        ];
        $re = $this->qdkd_db->qkd_create($params);
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
    public function qkd_list(){
        $user_id = $this->input->get('user_id');
        $re = $this->qdkd_db->get_qkd_order_list($user_id);
        if($re === false){
            $view_data['list'] = '网络错误' ;
        }else{
            $view_data['list'] = $re;
            if(!empty($view_data['list'])){
                foreach($view_data['list'] as $k=>$row){
                    if($row['status'] == 0){
                        $view_data['list'][$k]['status_str'] = '未开始';
                    }elseif($row['status'] == 1){
                        $view_data['list'][$k]['status_str'] = '进行中';
                    }else{
                        $view_data['list'][$k]['status_str'] = '已完成';
                    }
                }
            }
        }

        $this->load->view('qkdlist',$view_data);
    }
    public function qkd_del(){
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
        if($re == false){
            $r = [
                'error_code' => 1,
                'error_msg' => '网络错误',
            ];
            goto ANCHOR_RESULT;
        }
        ANCHOR_RESULT:
        echo json_encode($r);
    }

    public function get(){
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

    //获取用户openid？传入跳转
    public function get_info(){
        $redirect_url = $this->input->get('url');
        //https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$this->appid."&redirect_uri=".urlencode($redirect_url)."&response_type=code&scope=".$this->scope."&state=STATE#wechat_redirect";
        $re= Http::request($url);
        var_dump($url);
    }

    public function get_code($code){
        $result = [
            'errcode' => 0,
            'errmsg' => '',
            'data'=>[],
        ];
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->appid.'&secret='.$this->appsecret.'&code='.$code.'&grant_type=authorization_code';
        $res = Http::request($url);
        if(empty($res)){
            $result['errcode'] = 1;
            $result['errmsg'] = '系统错误';
            goto  ANCHOR_RESULT;
        }
        $re = json_decode($res,true);

        if(!empty($re['errcode'])){
            $result = $re;
            goto ANCHOR_RESULT;
        }
//        $access_token = $re['access_token'];
//        $refresh_token = $re['refresh_token'];
//        $openid = $re['openid'];
//        $scope = $re['scope'];
        $this->access_token = $re['access_token'];
        $this->refresh_token = $re['refresh_token'];

        $re = $this->qdkd_db->get_user_by_openid($re['openid']);
        if(empty($re)){
            $user = $this->qdkd_db->insert_uer_info($re['openid']);
            $re = $this->qdkd_db->get_user_by_openid($re['openid']);
        }
        if(!empty($re['user_id'])){
            $result['data']['user_id'] = $re['user_id'];
        }else{
            //todo
            show_404('error');
        }

        $result['data']['scope'] = $re['scope'];

        ANCHOR_RESULT:
        var_dump($result);
        return $result;
    }

    public function refresh_token(){
        $url='https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=APPID&grant_type=refresh_token&refresh_token=REFRESH_TOKEN';

    }
}
