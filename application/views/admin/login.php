<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Mobile first web app theme | first</title>
  <meta name="description" content="mobile first, app, web app, responsive, admin dashboard, flat, flat ui">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/recources/admin/css/bootstrap.css">
  <link rel="stylesheet" href="/recources/admin/css/font-awesome.min.css">
  <link rel="stylesheet" href="/recources/admin/css/style.css">
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
  <header id="header" class="navbar bg bg-black">
    <a href="#" class="btn btn-link pull-right"><i class="icon-question icon-xlarge text-default"></i></a>
    <a class="navbar-brand" href="#">QJKD</a>
  </header>
  <!-- / header -->
  <section id="content">
    <div class="main padder">
      <div class="row">
        <div class="col-lg-4 col-offset-4 m-t-large">
          <section class="panel">
            <header class="panel-heading text-center">
              Sign in
            </header>
            <form class="padder">
              <div class="block">
                <label class="control-label">账号</label>
<!--                <input type="email" placeholder="test@example.com" class="form-control">-->
                <input name="email" type="email" placeholder="test@example.com" required class="form-control">
              </div>
              <div class="block">
                <label class="control-label">密码</label>
                <input type="password" name="password" id="inputPassword" placeholder="Password" required class="form-control">
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Keep me logged in
                </label>
              </div>
<!--              <a href="#" class="pull-right m-t-mini"><small>Forgot password?</small></a>-->
              <button type="submit" class="btn btn-info" onclick="login();return false;">登 录</button>
              <div class="line line-dashed"></div>
<!--              <a href="#" class="btn btn-facebook btn-block m-b-small"><i class="icon-facebook pull-left"></i>Sign in with Facebook</a>-->
<!--              <a href="#" class="btn btn-twitter btn-block"><i class="icon-twitter pull-left"></i>Sign in with Twitter</a>-->
<!--              <div class="line line-dashed"></div>-->
<!--              <p class="text-muted text-center"><small>Do not have an account?</small></p>-->
<!--              <a href="signup.html" class="btn btn-white btn-block">Create an account</a>-->
            </form>
          </section>
        </div>
      </div>
    </div>
  </section>
  <script>
    //action="/admin/admin/index" method="post"
    var login = function(){
      $.ajax({
        url:'/admin/login/check_login',
        data:$('form').serialize(),
        type:'post',
        dataType:'JSON',
        success:function(res){
          if(res.error_code !== 0){
            layer.alert(res.error_msg);
          }else{
            location.href = '/admin/admin/dqkd'
          }
        }
      });
    };
  </script>
  <!-- footer -->
  <footer id="footer">
<!--    <div class="text-center padder clearfix">-->
<!--      <p>-->
<!--      -->
<!--        <a href="#" class="btn btn-mini btn-circle btn-twitter"><i class="icon-twitter"></i></a>-->
<!--        <a href="#" class="btn btn-mini btn-circle btn-facebook"><i class="icon-facebook"></i></a>-->
<!--        <a href="#" class="btn btn-mini btn-circle btn-gplus"><i class="icon-google-plus"></i></a>-->
<!--      </p>-->
<!--    </div>-->
<?php $this->load->view('admin/footer'); ?>