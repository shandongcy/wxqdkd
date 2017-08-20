<?php $this->load->view('admin/header'); ?>
  <section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="icon-table"></i>账户列表</h4>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <div class="pull-out m-t-small">
              <table class="table table-striped b-t text-small">
                <thead>
                  <tr>
                    <th width="20"></th>
                    <th class="th-sortable" data-toggle="class">ID</th>
                    <th>Email</th>
                    <th>Date</th>

                  </tr>
                </thead>
                <tbody>
                <?php foreach($data as $row): ?>
                  <tr>
                    <td><input type="radio" name="post" value="<?php echo $row['id']; ?>"></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['creation_time']; ?></td>

                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <footer class="panel-footer">
              <div class="row">
                <div class="col-lg-4 hidden-sm">
                  <button class="btn btn-small btn-white create">创建</button>
                  <button class="btn btn-small btn-white change">修改密码</button>
                </div>
              </div>
            </footer>
          </section>
        </div>
      </div>
    </section>
  </section>
  <script>
    //Demo
    $('.create').click(function(){
      var content = '<section class="panel"><form class="form-horizontal" method="post" href="/admin/admin/create_admin_user" data-validate="parsley"><div class="form-group"> <label class="col-lg-3 control-label">Email</label> <div class="col-lg-8"> <input type="text" name="email" placeholder="test@example.com" class="bg-focus form-control email" data-required="true" data-type="email"> </div> </div> <div class="form-group"> <label class="col-lg-3 control-label">Password</label> <div class="col-lg-8"> <input type="password" name="password" placeholder="Password" class="bg-focus form-control password"> <div class="line line-dashed m-t-large"></div> </div> </div> <div class="form-group"> </div> </form></section>';
      layer.open({
        type : 1,
        btn:['提交','取消'],
        title:'创建管理员账户',
        skin: 'layui-layer-rim', //加上边框
        area: ['400px', '290px'], //宽高
        content:content,
        yes:function(){
          var email = $('.email').val();
          var password = $('.password').val();
          $.ajax({
            'url':'/admin/admin/create_admin_user',
            'data':{
              'email':email,
              'password':password,
            },
            'type':"post",
            'dataType':'JSON',
            'success':function(res){
              if(res.error_code != 0){
                layer.alert(res.error_msg);
              }else{
                layer.msg('创建成功', {
                  time:1000,
                },function(){
                  location.reload();
                });
              }
            }
          });
        }
      });
    });
    $('.change').click(function(){
      var id = $("input[type='radio']:checked").val();
      if (id == null){
        layer.alert('必须先选中要修改的用户');
        return false;
      }
      layer.prompt({
        formType: 1,
        title: '请输入密码',
        maxlength: 20,
      }, function(value, index){
        $.ajax({
          'url':'/admin/admin/update_admin_password',
          'data':{
            'id':id,
            'password':value,
          },
          'type':"post",
          'dataType':'JSON',
          'success':function(res){
            if(res.error_code != 0){
              layer.alert(res.error_msg);
            }else{
              layer.msg('修改成功', {
                time:1000,
              },function(){
                location.reload();
              });
            }
          }
        });

      });
    });


  </script>

  <!--<script>-->
<!--  layer.open({-->
<!--    type: 1,-->
<!--    skin: 'layui-layer-rim', //加上边框-->
<!--    area: ['420px', '240px'], //宽高-->
<!--    content: 'html内容'-->
<!--  });-->
<!--</script>-->
<?php $this->load->view('admin/footer'); ?>