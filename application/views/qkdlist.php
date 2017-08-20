<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>代取订单列表</title>
    <link rel="stylesheet" type="text/css" href="//res.wx.qq.com/open/libs/weui/1.1.2/weui.min.css">
    <script src="/recources/layer/mobile/layer.js"></script>

</head>
<body ontouchstart>
<div style="float: left;margin-left: 10px;"><a><label><</label> </a></div>
<div style="text-align:center;margin-top: 20px;margin-right: 10px; "><p>代取订单列表</p></div>
<div class="weui-panel">
    <?php if(!is_array($list)): ?>
        <div class="weui-panel__hd"><p><?php echo $list; ?></p></div>
    <?php elseif(empty($list)):?>
        <div class="weui-panel__hd"><p>暂无订单</p></div>
    <?php else: ?>
        <?php foreach($list as $row ): ?>
            <div class="weui-panel__bd">
                <div class="weui-media-box weui-media-box_text">
                    <ul class="weui-media-box__info">
                        <li class="weui-media-box__info__meta" style="color: #0d0d0d">订单编号</li>
                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra" style="color: #0d0d0d"><?php echo $row['order_id'] ?></li>
                        <li class="weui-media-box__info__meta" style="color: #0d0d0d;float: right"><?php echo $row['status_str'] ?></li>
                    </ul>
                    <ul class="weui-media-box__info">
                        <li class="weui-media-box__info__meta" style="color: #0d0d0d">代取订单</li>
                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra" style="color: #0d0d0d">下单时间：<?php echo $row['creation_time'] ?></li>
                    </ul>
                    <?php if($row['status']==0): ?>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta" style="color: #0d0d0d;"><a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default del" data-id="<?php echo $row['id'];?>" >删除订单</a></li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script>
    $(".del").click(function() {
        var id = $(this).attr('data-id');
        $.ajax({
            'url':'/qdkd/qkd_del',
            'data':{
                'id':id,
            },
            'type':"post",
            'dataType':'JSON',
            'success':function(res){
                if(res.error_code != 0){
                    $.alert(res.error_msg);
                }else{
                    layer.open({
                        style: 'border:none; background-color:#78BA32; color:#fff;',
                        content:'删除成功',
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