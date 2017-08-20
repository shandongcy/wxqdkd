<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>代取代寄 | QJKD</title>
    <meta name="description" content="mobile first, app, web app, responsive, admin dashboard, flat, flat ui">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/recources/admin/css/bootstrap.css">
    <link rel="stylesheet" href="/recources/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="/recources/admin/css/style.css">
    <link rel="stylesheet" href="/recources/admin/css/plugin.css">
    <link rel="stylesheet" href="/recources/admin/css/landing.css">
    <link rel="stylesheet" href="/recources/layui/css/layui.css">
    <!--[if lt IE 9]>
    <script src="/recources/admin/js/ie/respond.min.js"></script>
    <script src="/recources/admin/js/ie/html5.js"></script>
    <![endif]-->
    <script src="/recources/admin/js/jquery.min.js"></script>
    <script src="/recources/layer/layer.js"></script>
    <script src="/recources/layui/layui.js"></script>
</head>
<body>
<!-- header -->
<header id="header" class="navbar">
    <ul class="nav navbar-nav navbar-avatar pull-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-sm-only">张三丰</span>
                <span class="thumb-small avatar inline"><img src="/recources/admin/images/avatar.jpg" alt="个人中心" class="img-circle"></span>
                <b class="caret hidden-sm-only"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="/admin/admin/account">账户设置</a></li>
                <li class="divider"></li>
                <li><a href="/admin/login/logout">登出</a></li>
            </ul>
        </li>
    </ul>
    <a class="navbar-brand" href="#">QJKD</a>
    <button type="button" class="btn btn-link pull-left nav-toggle hidden-lg" data-toggle="class:slide-nav slide-nav-left" data-target="body">
        <i class="icon-reorder icon-xlarge text-default"></i>
    </button>
</header>
<!-- / header -->
<!-- nav -->
<nav id="nav" class="nav-primary visible-lg nav-vertical">
    <ul class="nav" data-spy="affix" data-offset-top="50">

        <li class="dropdown-submenu">
            <a href="#"><i class="icon-list icon-xlarge"></i>新订单</a>
            <ul class="dropdown-menu">
                <li><a href="/admin/admin/dqkd">代取订单</a></li>
                <li><a href="/admin/admin/djkd">代寄订单</a></li>
            </ul>
        </li>
        <li><a href="/admin/admin/account"><i class="icon-edit icon-xlarge"></i>账户设置</a></li>
        <li class="dropdown-submenu">
            <a href="#"><i class="icon-list icon-xlarge"></i>订单记录</a>
            <ul class="dropdown-menu">
                <li><a href="/admin/admin/jilu_qkd">代取记录</a></li>
                <li><a href="/admin/admin/jilu_dkd">代寄记录</a></li>
            </ul>
        </li>
    </ul>
</nav>
<!-- / nav -->