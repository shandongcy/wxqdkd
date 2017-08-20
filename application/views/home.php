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
<div class="weui-cells__title">带说明的列表项</div>
<div class="weui-cells">
    <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>标题文字</p>
        </div>
        <div class="weui-cell__ft">说明文字</div>
    </div>
</div>
<div class="weui-cells__title">带图标、说明的列表项</div>
<div class="weui-cells">
    <div class="weui-cell">
        <div class="weui-cell__hd"><img src="..." alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui-cell__bd">
            <p>标题文字</p>
        </div>
        <div class="weui-cell__ft">说明文字</div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd"><img src="..." alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui-cell__bd">
            <p>标题文字</p>
        </div>
        <div class="weui-cell__ft">说明文字</div>
    </div>
</div>

<div class="weui-cells__title">带跳转的列表项</div>
<div class="weui-cells">
    <a class="weui-cell weui-cell_access" href="javascript:;">
        <div class="weui-cell__bd">
            <p>cell standard</p>
        </div>
        <div class="weui-cell__ft">
        </div>
    </a>
    <a class="weui-cell weui-cell_access" href="javascript:;">
        <div class="weui-cell__bd">
            <p>cell standard</p>
        </div>
        <div class="weui-cell__ft">
        </div>
    </a>
</div>

<div class="weui-cells__title">带说明、跳转的列表项</div>
<div class="weui-cells">
    <a class="weui-cell weui-cell_access" href="javascript:;">
        <div class="weui-cell__bd">
            <p>cell standard</p>
        </div>
        <div class="weui-cell__ft">说明文字</div>
    </a>
    <a class="weui-cell weui-cell_access" href="javascript:;">
        <div class="weui-cell__bd">
            <p>cell standard</p>
        </div>
        <div class="weui-cell__ft">说明文字</div>
    </a>

</div>

<div class="weui-cells__title">带图标、说明、跳转的列表项</div>
<div class="weui-cells">

    <a class="weui-cell weui-cell_access" href="javascript:;">
        <div class="weui-cell__hd"><img src="..." alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui-cell__bd">
            <p>cell standard</p>
        </div>
        <div class="weui-cell__ft">说明文字</div>
    </a>
    <a class="weui-cell weui-cell_access" href="javascript:;">
        <div class="weui-cell__hd"><img src="..." alt="" style="width:20px;margin-right:5px;display:block"></div>
        <div class="weui-cell__bd">
            <p>cell standard</p>
        </div>
        <div class="weui-cell__ft">说明文字</div>
    </a>
</div>
</body>
</html>