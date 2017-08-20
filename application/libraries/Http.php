<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Http {

    /**
     * 发起一个HTTP/HTTPS的请求
     * @param string $url 接口的URL
     * @param $params 接口参数   array('content'=>'test', 'format'=>'json');
     * @param $method 请求类型    GET|POST
     * @param $multi 图片信息
     * @param $extheaders 扩展的包头信息
     * @param $args 配置信息：timeout请求超时时间
     * @return string
     */
    public static function request($url, $params = array(), $method = 'GET', $multi = false, $extheaders = array(), $args=array()) {
        if (!function_exists('curl_init'))
            exit('Need to open the curl extension');
        $timeout = isset($args['timeout']) ? (int)$args['timeout'] : 3;
        $method = strtoupper($method);
        $ci = curl_init();
        curl_setopt($ci, CURLOPT_USERAGENT, 'SMZDM PHP CURL 1.0');
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ci, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ci, CURLOPT_HEADER, false);
        
        $C_I = &get_instance();
        $extheaders = (array) $extheaders;
        $default_headers = isset($C_I->cat) ? $C_I->cat->curl_start($url) : [];
        $headers = array_merge($default_headers, $extheaders);
        
        
        switch ($method) {
            case 'POST':
                curl_setopt($ci, CURLOPT_POST, TRUE);
                if (!empty($params)) {
                    if ($multi) {
                        foreach ($multi as $key => $file) {
                            $params[$key] = '@' . $file;
                        }
                        curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                        $headers[] = 'Expect: ';
                    } else {
                        if(!empty($args['post_json'])) { 
                            curl_setopt($ci, CURLOPT_POSTFIELDS, json_encode($params));
                        } else {
                            curl_setopt($ci, CURLOPT_POSTFIELDS, http_build_query($params));
                        }
                    }
                }
                break;
            case 'DELETE':
            case 'GET':
                $method == 'DELETE' && curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
                if(!empty($args['post_json'])) {
                    curl_setopt($ci, CURLOPT_POSTFIELDS, json_encode($params));
                } else if (!empty($params)) {
                    $url = $url . (strpos($url, '?') ? '&' : '?')
                            . (is_array($params) ? http_build_query($params) : $params);
                }
                break;
        }
        curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE);
        curl_setopt($ci, CURLOPT_URL, $url);
        if ($headers) {
            curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
        }
        $response = curl_exec($ci);
        $curl_errno = curl_errno($ci);
        if ($curl_errno !== 0) {
            $response_header['http_code'] = $curl_errno;
        } else {
            $response_header = curl_getinfo($ci);
        }
        curl_close($ci);
        if (isset($C_I->cat)) {
           $C_I->cat->curl_end($response_header);
        }
        return $response;
    }

}
