<?php $this->load->view('admin/header'); ?>

<section id="content">
    <section class="main padder">

      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">代取订单 <i class="icon-info-sign text-muted" data-toggle="popover" data-html="true" data-placement="top" data-content="未接单列表." title="" data-trigger="hover" ></i> </header>
            <div class="pull-out">
              <table id="MyStretchGrid" class="table table-striped datagrid m-b-small">
                <thead>
                  <tr>
                    <th>

                    </th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th class="row">
                      <div class="datagrid-footer-left col col-lg-6 text-center-sm" style="display:none;">
                        <div class="grid-controls m-t-small">
                          <span>
                            <span class="grid-start"></span> -
                            <span class="grid-end"></span> of
                            <span class="grid-count"></span>
                          </span>
                          <div class="select grid-pagesize dropup" data-resize="auto">
                            <button data-toggle="dropdown" class="btn btn-small btn-white dropdown-toggle">
                              <span class="dropdown-label"></span>
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li data-value="5" data-selected="true"><a href="#">5</a></li>
                              <li data-value="10"><a href="#">10</a></li>
                              <li data-value="20"><a href="#">20</a></li>
                              <li data-value="50"><a href="#">50</a></li>
                              <li data-value="100"><a href="#">100</a></li>
                            </ul>
                          </div>
                          <span>Per Page</span>
                        </div>
                      </div>
                      <div class="datagrid-footer-right col col-lg-6 text-right text-center-sm" style="display:none;">
                        <div class="grid-pager">
                          <button type="button" class="btn btn-small btn-white grid-prevpage"><i class="icon-chevron-left"></i></button>
                          <span>Page</span>
                          <div class="inline">
                            <div class="input-group dropdown combobox">
                              <input class="input-small form-control" type="text">
                              <div class="input-group-btn dropup">
                                <button class="btn btn-small btn-white" data-toggle="dropdown"><i class="caret"></i></button>
                                <ul class="dropdown-menu pull-right"></ul>
                              </div>
                            </div>
                          </div>
                          <span>of <span class="grid-pages"></span></span>
                          <button type="button" class="btn btn-small btn-white grid-nextpage"><i class="icon-chevron-right"></i></button>
                        </div>
                      </div>
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </section>

        </div>
      </div>
    </section>
  </section>
<script type="text/javascript">
    var accept = function(e){
      var id = $(e).attr('data-id');
      $.ajax({
        'url':'/admin/admin/accept_qkd_order',
        'data':{
          'id':id
        },
        'type':"post",
        'dataType':'JSON',
        'success':function(res){
          if(res.error_code != 0){
            layer.alert(res.error_msg);
          }else{
            layer.msg('接单成功', {
              time:1000,
            },function(){
              location.reload();
            });
          }
        }
      });
    };
  var del = function(e){
      layer.confirm('确定删除订单吗？', {
      btn: ['确定','取消'] //按钮
    }, function(){
        var id = $(e).attr('data-id');
        $.ajax({
          'url':'/admin/admin/del_qkd_order',
          'data':{
            'id':id
          },
          'type':"post",
          'dataType':'JSON',
          'success':function(res){
            if(res.error_code != 0){
              layer.alert(res.error_msg);
            }else{
              layer.msg('删除成功', {
                time:1000,
              },function(){
                  location.reload();
              });
            }
          }
        });
    });
  };
</script>
  <script src="/recources/admin/js/dqkd.data.js"></script>
<?php $this->load->view('admin/footer'); ?>