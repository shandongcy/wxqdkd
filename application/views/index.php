<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="//res.wx.qq.com/open/libs/weui/1.1.2/weui.min.css">
</head>
<body ontouchstart>

<!--    <div class="weui-cells__title">个人信息</div>-->
<!--    <div class="weui-cells">-->
<!--        <a class="weui-cell weui-cell_access" href="javascript:;">-->
<!--            <div class="weui-cell__bd">-->
<!--                <p>默认代取信息</p>-->
<!--            </div>-->
<!--            <div class="weui-cell__ft">-->
<!--            </div>-->
<!--        </a>-->
<!--        <a class="weui-cell weui-cell_access" href="javascript:;">-->
<!--            <div class="weui-cell__bd">-->
<!--                <p>默认代寄信息</p>-->
<!--            </div>-->
<!--            <div class="weui-cell__ft">-->
<!--            </div>-->
<!--        </a>-->
<!--    </div>-->

<div class="weui-cells__title">我的订单</div>
    <div class="weui-cells">
        <a class="weui-cell weui-cell_access" href="http://weixin.hd/qdkd/qkd_list">
            <div class="weui-cell__bd">
                <p>代取订单</p>
            </div>
            <div class="weui-cell__ft">
            </div>
        </a>
        <a class="weui-cell weui-cell_access" href="http://weixin.hd/qdkd/dkd_list">
            <div class="weui-cell__bd">
                <p>代寄订单</p>
            </div>
            <div class="weui-cell__ft">
            </div>
        </a>
    </div>


<script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.1.1/weui.min.js"></script>
</body>
</html>