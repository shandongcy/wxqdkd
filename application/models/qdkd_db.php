<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/12
 * Time: 14:33
 */
class qdkd_db extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function insert_uer_info($openid){
        $params = [
            'open_id'=>$openid,
            'creation_time'=>date('Y-m-d H:i:s',time()),
        ];
        $re = $this->db->insert('user', $params);
        return $re;
    }
    function get_user_by_openid($openid){
        $where = [
            'open_id =' => $openid,
        ];
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where($where);
        $query = $this->db->get();
        $return = $query->row_array();
        return $return;
    }
    function get_admin_login($name,$password){
        $where = [
            'name' => $name,
            'password'=>$password,
        ];
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where($where);
        $query = $this->db->get();
        $return = $query->num_rows();
        return $return;
    }
    function dkd_create($params){
        $option = [
            'user_id' => $params['user_id'],
            'order_id' => $params['order_id'],
            'jname' => $params['jname'],
            'jtel' => $params['jtel'],
            'school_name' => $params['school_name'],
            'floor_name' => $params['floor_name'],
            'sname' => $params['sname'],
            'stel' => $params['stel'],
            'post_type' => $params['post_type'],
            'address' => $params['address'],
            'creation_time' => date('Y-m-d H:i:s',time()),
        ];
        $re = $this->db->insert('dkd', $option);
        return $re;
    }

    function dkd_del($id){
        $option = [
            'status' => -1,
        ];
        $re = $this->db->update('dkd',$option,'id='.$id);
        return $re;
    }

    function get_dkd_order_list($user_id){
        $time_limit = date('Y-m-d H:i:s',time()-30*86400);
        $where = [
            'user_id ='=>$user_id,
            'status >=' => 0,
            'creation_time >=' => $time_limit,
        ];
        $this->db->select('*');
        $this->db->from('dkd');
        $this->db->where($where);
        $this->db->order_by('creation_time');
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }

    function qkd_create($params){
        $option = [
            'user_id' => $params['user_id'],
            'order_id' => $params['order_id'],
            'qname' => $params['qname'],
            'qtel' => $params['qtel'],
            'school_name' => $params['school_name'],
            'floor_name' => $params['floor_name'],
            'post_from' => $params['post_from'],
            'post_type' => $params['post_type'],
            'prove_info' => $params['prove_info'],
            'remark' => $params['remark'],
            'creation_time' => date('Y-m-d H:i:s',time()),
        ];
        $re = $this->db->insert('qkd', $option);
        return $re;
    }

    function qkd_del($id){
        $option = [
            'status' => -1,
        ];
        $re = $this->db->update('qkd',$option,'id='.$id);
        return $re;
    }

    function get_qkd_order_list($user_id){
        $time_limit = date('Y-m-d H:i:s',time()-30*86400);
        $where = [
            'user_id ='=>$user_id,
            'status >=' => 0,
            'creation_time >=' => $time_limit,
        ];
        $this->db->select('*');
        $this->db->from('qkd');
        $this->db->where($where);
        $this->db->order_by('creation_time');
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }

    function admin_get_order_list($table,$status){
        $where = [
            'status =' => $status,
        ];
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('creation_time DESC');
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }
    function admin_order_page_list($table,$where,$limit,$offset){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('creation_time DESC');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }
    function admin_order_num($table,$where){
        $this->db->select('id');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('creation_time DESC');
        $query = $this->db->get();
        $return = $query->num_rows();
        return $return;
    }
    function admin_accept_order($table,$id){
        $option = [
            'status' => 1,//已接单
        ];
        $re = $this->db->update($table,$option,'id='.$id);
        return $re;
    }

    function admin_over_order($table,$id){
        $option = [
            'status' => 2,//完成订单
        ];
        $re = $this->db->update($table,$option,'id='.$id);
        return $re;
    }
    function get_admin_user(){
        $table = 'admin';
        $this->db->select('id,name,status,creation_time');
        $this->db->from($table);
        $this->db->order_by('creation_time');
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }
    function create_admin_user($options){
        $re = $this->db->insert('admin', $options);
        return $re;
    }
    function update_admin_password($id,$password){
        $table = 'admin';
        $option = [
            'password' => md5($password),
        ];
        $re = $this->db->update($table,$option,'id='.$id);
        return $re;
    }

}