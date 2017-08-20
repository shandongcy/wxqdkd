<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>寄快递</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
    <script src="/recources/layer/mobile/layer.js"></script>

</head>
<body ontouchstart>
<header id="header" class="navbar bg bg-black">
    <a href="#" class="btn btn-link pull-right" data-toggle="class:bg-inverse" data-target="html"><i class="icon-lightbulb icon-xlarge text-default"></i></a>
    <a class="navbar-brand" href="#">QJKD</a>
</header>
<div class="weui-cell">
    <div class="weui-cell__hd">
        <label for="" class="weui-label">寄件人姓名</label>
    </div>
    <div class="weui-cell__bd">
        <input class="weui-input" type="text" id="jname" placeholder="请输入您的姓名"/>
    </div>
</div>

<div class="weui-cell weui-cell_vcode">
    <div class="weui-cell__hd">
        <label class="weui-label">寄件人手机号</label>
    </div>
    <div class="weui-cell__bd">
        <input class="weui-input" type="tel" id="jtel" placeholder="请输入手机号">
    </div>
</div>
<div class="weui-cell weui-cell_select weui-cell_select-after">
    <div class="weui-cell__hd">
        <label for="" class="weui-label">学校名称</label>
    </div>
    <div class="weui-cell__bd">
        <select class="weui-select" id="sch_select" name="sch_select">
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
        <select class="weui-select" id="fl_select" name="fl_select">
            <option value="1">花满楼1号</option>
            <option value="2">花满楼2号</option>
            <option value="3">花满楼3号</option>
        </select>
    </div>
</div>
<div class="weui-cell">
    <div class="weui-cell__hd">
        <label for="" class="weui-label">收件人姓名</label>
    </div>
    <div class="weui-cell__bd">
        <input class="weui-input" type="text" id="sname" placeholder="请输入您的姓名"/>
    </div>
</div>

<div class="weui-cell weui-cell_vcode">
    <div class="weui-cell__hd">
        <label class="weui-label">收件人手机号</label>
    </div>
    <div class="weui-cell__bd">
        <input class="weui-input tel-input" id="stel" type="tel"  placeholder="请输入手机号">
    </div>
</div>

<div class="weui-cell weui-cell_select weui-cell_select-after">
    <div class="weui-cell__hd">
        <label for="" class="weui-label">快递类型</label>
    </div>
    <div class="weui-cell__bd">
        <select class="weui-select" id="post_type" name="post_type">
            <option value="1">大件</option>
            <option value="2">小件</option>
            <option value="3">其他</option>
        </select>
    </div>
</div>

    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label for="" class="weui-label">收件地址</label>
        </div>
        <div class="weui-cell__bd">
            <textarea class="weui-textarea"  id="address" placeholder="请填写详细收件地址" rows="3"></textarea>
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
//    $("#is_mr").click(function(){
//        //console.log($("#is_mr").val());
//        if($("#is_mr").val()=="off"){
//            $("#is_mr").val("on");
//        }else{
//            $("#is_mr").val("off");
//        }
//    })
    $("#formSubmitBtn").click(function() {
        var jname = $('#jname').val();
        var jtel = $('#jtel').val();
        var sch_name = $("#sch_select").val();
        var fl_name = $("#fl_select").val();
        var sname = $("#sname").val();
        var stel = $('#stel').val();
        var post_type = $("#post_type").val();
        var address =  $("#address").val();
//        var is_mr = $("#is_mr").val();
        $.ajax({
            'url':'/qdkd/dkd_create',
            'data':{
                'jname': jname,
                'jtel' : jtel,
                'sch_name' : sch_name,
                'fl_name' : fl_name,
                'sname' : sname,
                'stel' : stel,
                'post_type' : post_type,
                'address'   : address,
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