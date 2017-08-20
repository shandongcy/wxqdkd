<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>取快递</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
    <script src="/recources/layer/mobile/layer.js"></script>

</head>
<body ontouchstart>

<div class="weui-cell">
    <div class="weui-cell__hd">
        <label for="" class="weui-label">姓名</label>
    </div>
    <div class="weui-cell__bd">

        <input class="weui-input" id="qname" type="text" placeholder="请输入您的姓名"/>
    </div>
</div>

<div class="weui-cell weui-cell_vcode">
    <div class="weui-cell__hd">
        <label class="weui-label">手机号</label>
    </div>
    <div class="weui-cell__bd">
        <input class="weui-input" id="qtel" type="tel" placeholder="请输入手机号">
    </div>
</div>
<div class="weui-cell weui-cell_select weui-cell_select-after">
    <div class="weui-cell__hd">
        <label for="" class="weui-label">学校名称</label>
    </div>
    <div class="weui-cell__bd">
        <select class="weui-select" id="school" name="select2">
            <option value="1">理工大</option>
            <option value="2">哈弗大</option>
            <option value="3">青岛大学</option>
        </select>
    </div>
</div>
<div class="weui-cell weui-cell_select weui-cell_select-after">
    <div class="weui-cell__hd">
        <label for="" class="weui-label">寝室楼号</label>
    </div>
    <div class="weui-cell__bd">
        <select class="weui-select" id="floor" name="select2">
            <option value="1">花满楼1号</option>
            <option value="2">花满楼2号</option>
            <option value="3">花满楼3号</option>
        </select>
    </div>
</div>
<div class="weui-cell weui-cell_select weui-cell_select-after">
    <div class="weui-cell__hd">
        <label for="" class="weui-label">快递公司</label>
    </div>
    <div class="weui-cell__bd">
        <select class="weui-select" id="post_from" name="select2">
            <option value="1">顺丰</option>
            <option value="2">圆通</option>
            <option value="3">申通</option>
        </select>
    </div>
</div>
<div class="weui-cell weui-cell_select weui-cell_select-after">
    <div class="weui-cell__hd">
        <label for="" class="weui-label" >快递类型</label>
    </div>
    <div class="weui-cell__bd">
        <select class="weui-select" id="post_type"  name="select2">
            <option value="1">大件</option>
            <option value="2">小件</option>
            <option value="3">其他</option>
        </select>
    </div>
</div>
<div class="weui-cell">
    <div class="weui-cell__hd">
        <label for="" class="weui-label">取件码/货架号/手机尾号</label>
    </div>
    <div class="weui-cell__bd">
        <input class="weui-input" type="text" id="prove_info" placeholder="请输入取件标识"/>
    </div>
</div>

<div class="weui-cell">
    <div class="weui-cell__hd">
        <label for="" class="weui-label">特殊备注</label>
    </div>
    <div class="weui-cell__bd">
        <textarea class="weui-textarea" id="remark" placeholder="请输入" rows="3"></textarea>
        <div class="weui-textarea-counter"><span>0</span>/200</div>
    </div>
</div>
<div class="weui-cell">
    <!--    <div class="weui-cell__bd">设为默认</div>-->
    <!--    <div class="weui-cell__ft">-->
    <!--        <input class="weui-switch" id="is_mr" type="checkbox" />-->
    <!--    </div>-->
    <!--</div>-->
</div>
<a href="javascript:;" id="formSubmitBtn" class="weui-btn weui-btn_primary">提交订单</a>

<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script>

    $("#formSubmitBtn").click(function() {
        var qname = $('#qname').val();
        var qtel = $('#qtel').val();
        var school = $("#school").val();
        var floor = $("#floor").val();
        var post_from = $("#post_from").val();
        var post_type = $('#post_type').val();
        var prove_info = $("#prove_info").val();
        var remark =  $("#remark").val();
        $.ajax({
            'url':'/qdkd/qkd_create',
            'data':{
                'qname': qname,
                'qtel' : qtel,
                'school' : school,
                'floor' : floor,
                'post_from' : post_from,
                'post_type' : post_type,
                'prove_info'   : prove_info,
                'remark' : remark,
                'open_id':'dasd123asd123',
                'user_id':0,
            },
            'type':"post",
            'dataType':'JSON',
            'success':function(res){
                if(res.error_code != 0){
                    $.alert(res.error_msg);
                }else{
                    layer.open({
                        style: 'border:none; background-color:#78BA32; color:#fff;',
                        content:'提交成功',
                        time:1,
                        end:function(){
                            location.reload();
                        }
                    });
                }
            }
        });
    });
</script>
</body>
</html>