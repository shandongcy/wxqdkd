<?php $this->load->view('admin/header'); ?>

<section id="content">
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              代递订单记录
            </header>
            <div class="row text-small">
              <div class="col-lg-4 m-b-mini">
                <select class="input-small inline form-control status" style="width:130px" name="status">
                  <option value="0" <?php if($status==0) echo 'selected' ?> >全部订单</option>
                  <option value="1" <?php if($status==1) echo 'selected' ?>>已完成订单</option>
                  <option value="2" <?php if($status==2) echo 'selected' ?>>已删除订单</option>
                </select>
                <button class="btn btn-small btn-white search">查找</button>
              </div>


            </div>
            <div class="pull-out m-t-small">
              <table class="table table-striped b-t text-small">
                <thead>
                  <tr>
                    <th >订单编号</th>
                    <th class="th-sortable" data-toggle="class">寄件人姓名
                    </th>
                    <th>寄件人电话</th>
                    <th>学校</th>
                    <th>楼栋</th>
                    <th>收件人姓名</th>
                    <th>收件人电话</th>
                    <th>快递类型</th>
                    <th>地址</th>
                    <th>订单状态</th>
                    <th>订单时间</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($data as $row): ?>
                  <tr>
                      <td><?php echo $row['order_id']; ?></td>
                      <td><?php echo $row['jname']; ?></td>
                      <td><?php echo $row['jtel']; ?></td>
                      <td><?php echo $row['school_name']; ?></td>
                      <td><?php echo $row['floor_name']; ?></td>
                      <td><?php echo $row['sname']; ?></td>
                      <td><?php echo $row['stel']; ?></td>
                      <td><?php echo $row['post_type']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo $row['status']; ?></td>
                      <td><?php echo $row['creation_time']; ?></td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
            <footer class="panel-footer">
              <div class="row">
              <input type="hidden" id="page_total" value="<?php echo $page_total; ?>">
              <input type="hidden" id="status" value="<?php echo $status; ?>">
              <input type="hidden" id="curr" value="<?php echo $curr; ?>">
                <div class="col-lg-12 text-right text-center-sm" id="pagenation">
                </div>
              </div>
            </footer>
          </section>
        </div>
      </div>
    </section>
  </section>
  <script>
            layui.use(['laypage','layer'],function(){
             layui.laypage({
                         cont: 'pagenation',//容器。值支持id名、原生dom对象，jquery对象。【如该容器为】：<div id="page1"></div>
                         pages: $('#page_total').val(),//总页数
                         groups: 5, //连续显示分页数
                         curr: $('#curr').val(),
                         skip: false, //是否开启跳页
                         jump: function (obj, first) {//触发分页后的回调
                             var curr = obj.curr;
                             var status = $('#status').val();
                              if(!first) {
                                   //layer.msg('第 '+ obj.curr +' 页');
                                  window.location.href='/admin/admin/jilu_dkd?status='+status+'&page='+curr;
                              }
                         }
                     });
            });

</script>
  <script>
      $('.search').click(function(){
        var status = $('.status').val();
        location.href='/admin/admin/jilu_dkd?status='+status;
        console.log(status);
      });
  </script>
<?php $this->load->view('admin/footer'); ?>