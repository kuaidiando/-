<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>订单详情</title>
    <link rel="stylesheet" href="/kuaidian/Public/home/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/dingdanxiangqing.css">
    <!-- <script type="text/javascript" src="/kuaidian/Public/home/js/jquery.js"></script> -->
    <script type="text/javascript" src="/kuaidian/Public/home/js/jquery-1.12.4.js"></script>


</head>
<body style="font-size: 12px">
    <div class="header">
        <span>订单详情</span>
    </div>
    <?php if($is_use == 0): ?><div class="hao jc">
        <div class="dd">
            <div class="dd1">
                <span>D</span>
            </div>

            <div class="shuzi">
                <span></span>
            </div>
        </div>

        <div class="jiu">
            <span>就餐号</span>
        </div>

        <div class="an">
            <span>下单后自取小票&nbsp;或&nbsp;向服务员可对订单</span>
        </div>
    </div>
    <?php else: ?>
    <div class="hao">
        <div class="dd">
            <div class="dd1">
                <span>D</span>
            </div>

            <div class="shuzi">
                <span><?php echo ($jc_code); ?></span>
            </div>
        </div>

        <div class="jiu">
            <span>就餐号</span>
        </div>

        <div class="an">
            <span>下单后自取小票&nbsp;或&nbsp;向服务员可对订单</span>
        </div>
    </div><?php endif; ?>
    <div class="ding0">
        <div class="dding">
            <div class="dan0">
                <span>订单号码:</span>
            </div>

            <div class="hhao">
                <span><?php echo ($order_code); ?></span>
            </div>
        </div>

        <div class="zhuang">
            <div class="tai">
                <span>订单状态:</span>
            </div>

            <div class="yi">
            <?php if($order_status == 1): ?><span>未支付</span>
            <?php elseif($order_status == 5): ?>
                <span>已支付</span>
            <?php elseif($order_status == 10): ?>
                <span>待评价</span>
            <?php elseif($order_status == 15): ?>
                <span>已完成</span>
            <?php elseif($order_status == 20): ?>
                <span>已取消</span>
            <?php else: ?>
                <span>未知</span><?php endif; ?>
            </div>

        </div>

        <div class="aa">
            <div class="aa2">
                <span>使用状态:</span>
            </div>

            <div class="aa3">
            <?php if($is_use == 0 ): if($order_status == 20): ?><span>已取消</span>
                <?php else: ?>
                <span id="use">待使用</span><?php endif; ?>
            </div>   
            <div class="tet">
                <?php if($order_status == 5): ?><div class="wenben" id="wenben">
                        <span id="qx">取消订单</span>
                        <input type="hidden" id="order_id" name="order_id" value="<?php echo ($order_id); ?>">
                    </div>
                <?php else: endif; ?>  
            </div>
            <?php elseif($is_use == 1): ?>
                <span>已使用</span>
            </div>
            <div class="tet">
                <div >
                    <span></span>
                </div>
            </div>    
            <?php else: endif; ?>    


        </div>
    </div>

    <div class="mming">
        <span>订单明细</span>
    </div>

    <div class="big">
        <div class="caiming">
            <div class="cai">
                <div class="pin">
                    <span>菜品名称</span>
                </div>

                <div class="num">
                    <span>数量</span>
                </div>

                <div class="dan">
                    <span>单价</span>
                </div>
            </div>
        </div>

        <div class="center">
        <?php if(is_array($goods_info)): foreach($goods_info as $key=>$one_good): ?><div class="cai2">
                <div class="qq">
                    <span><?php echo ($one_good["goodsname"]); ?></span>
                </div>

                <div class="liang">
                    <span>X<?php echo ($one_good["goods_num"]); ?></span>
                </div>

                <div class="jiage">
                    <span>￥<?php echo ($one_good["goods_price"]); ?></span>
                </div>
            </div><?php endforeach; endif; ?>


            <div class="canju">
                <div class="ju">
                    <span>餐具</span>
                </div>

                <div class="ju2">
                    <span>X<?php echo ($info["order_pnum"]); ?></span>
                </div>

                <div class="ju3">
                    <span>￥<?php echo ($info["order_pnum"]); ?></span>
                </div>
            </div>
        </div>

        <div class="xiang">
            <div class="xxiang">
                <div class="sui">
                    <div class="ssui">
                        <span>随机立减</span>
                        <input type="hidden" id="store_id" name="store_id" value="<?php echo ($store_id); ?>">
                    </div>

                    <div class="jian">
                        <span>-&nbsp;￥<?php echo ($money_info["lj"]); ?></span>
                    </div>
                </div>

                <div class="zongji">
                    <div class="zj">
                        <span>总计:&nbsp;&nbsp;￥<?php echo ($money_info["total_price"]); ?></span>
                    </div>

                    <div class="sf">
                        <span>实付:&nbsp;&nbsp;￥<?php echo ($money_info["sf"]); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="zhuohao">
        <div class="hhao6">
            <div class="ben">
                <input type="text" placeholder="下单前,请填写座位号" name="seat" id="seat" value="">
            </div>

            <div class="nniu">
                <span>选择座位</span>
            </div>
        </div>
    </div>
<?php if($order_status == 20): ?><a id="qu" href="<?php echo U('Home/Index/index');?>">
    <div class="footer">
        <div class="qtj">
            <span >去别人家看看</span>
        </div>
    </div>   
</a>
<?php elseif($is_use == 1): ?>
<a href="<?php echo U('Home/Order/order_info');?>">
    <div class="footer">
        <div class="qtj">
            <span >已完成</span>
        </div>
    </div>  
</a>
<?php else: ?>
    <div class="footer">
        <div class="foot">
            <span>未入座，稍后下单</span>
        </div>

        <div class="food" id="xd">
            <span>已入座，立刻下单</span>
        </div>
    </div><?php endif; ?>
</body>
<script>
    $("#qx").click(function(){
        var order_id;
        var order_id = $("#order_id").val();
        var conf = confirm("您确定要取消吗?取消后购买金额将转入您的余额");
        if(conf == true){
            $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url:'<?php echo U("Home/Order/cancel_order");?>',
                    data:{order_id:order_id},
                    success: function (result) {
                        // console.log(result);return false;
                        if(result.code == 200){
                            // alert('取消成功');
                            window.location.reload();
                        }else{
                            alert(result.msg);
                        }
                    }
                })  
            return true;
        }else{
            // alert("您放弃了");
            return false;
        }

        
    });

    $("#xd").click(function(){
        var ordr_id,seat,store_id;

        order_id = $("#order_id").val();
        seat     = $('#seat').val();
        store_id = $('#store_id').val();
    
        if(!seat){
            alert('请填写座位号');
            return false;
        }else{
            $.ajax({
                type:'post',
                dataType: 'json',
                url:'<?php echo U("Home/Order/sub_mit");?>',
                data:{ store_id:store_id,order_id:order_id,seat:seat },
                success: function (result) {
                    if(result.code == 200){
                        // $('.hao').removeClass('cj').addClass('jc1');
                        // $('.shuzi span').html(result.data);
                        // $('#xd').remove();
                        // $('.foot').removeClass('foot').addClass('qtj').children().eq(0).html('已完成');
                        // $('#use').html('已使用');
                        // $('#wenben').remove();
                        window.location.reload();
 
                    }else{
                        alert(result.msg);

                    }
                }
            })

        }
    });

    $('.foot').click(function(){
        alert('点击后再看订单点击右下角我的-全部订单');
        $(location).attr('href', '<?php echo U("Home/Person/index");?>');
    })
</script>
</html>