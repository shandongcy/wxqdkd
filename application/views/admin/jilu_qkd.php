<?php $this->load->view('admin/header'); ?>

<section id="content">

      <div class="row">

        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              代取订单记录
            </header>
            <div class="row text-small">
              <div class="col-lg-4 m-b-mini">
                <select class="input-small inline form-control status" style="width:130px" name="status">
                  <option value="0">全部订单</option>
                  <option value="1">已完成订单</option>
                  <option value="2">已删除订单</option>
                </select>
                <button class="btn btn-small btn-white search">查找</button>
              </div>


            </div>
            <div class="pull-out m-t-small">
              <table class="table table-striped b-t text-small">
                <thead>
                  <tr>
                    <th >订单编号</th>
                    <th class="th-sortable" data-toggle="class">姓名
                    </th>
                    <th>电话</th>
                    <th>学校</th>
                    <th>楼栋</th>
                    <th>快递公司</th>
                    <th>快递类型</th>
                    <th>取件码</th>
                    <th>备注</th>
                    <th>订单状态</th>
                    <th>订单时间</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($data as $row): ?>
                  <tr>
                      <td><?php echo $row['order_id']; ?></td>
                      <td><?php echo $row['qname']; ?></td>
                      <td><?php echo $row['qtel']; ?></td>
                      <td><?php echo $row['school_name']; ?></td>
                      <td><?php echo $row['floor_name']; ?></td>
                      <td><?php echo $row['post_from']; ?></td>
                      <td><?php echo $row['post_type']; ?></td>
                      <td><?php echo $row['prove_info']; ?></td>
                      <td><?php echo $row['remark']; ?></td>
                      <td><?php echo $row['status']; ?></td>
                      <td><?php echo $row['creation_time']; ?></td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
            <footer class="panel-footer">
              <div class="row">
                <div class="col-lg-8 text-center"></div>
                <div class="col-lg-4 text-right text-center-sm">
                  <ul class="pagination pagination-small m-t-none m-b-none">

                    <li><a href="#"  class="prev"><i class="icon-chevron-left "></i></a></li>
                     <?php
                         for($i=1;$i<=$page_total;$i++){
                            echo "<li><a href='#' class='page_now'>$i</a></li>";
                         }
                     ?>
                    <li><a href="#" class="next"><i class="icon-chevron-right "></i></a></li>

                  </ul>
                </div>
              </div>
            </footer>
          </section>
        </div>
      </div>
    </section>
  </section>
  <script>
      $('.search').click(function(){
        var status = $('.status').val();
        location.href='http://weixin.hd/admin/admin/jilu_qkd?status='+status;
        console.log(status);
      });
  </script>
<?php $this->load->view('admin/footer'); ?>