<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>订单详情</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="/kuaidian/Public/home/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/dingdanxiangqing.css">
=======
    <link rel="stylesheet" href="/-/Public/home/css/base.css">
    <link rel="stylesheet" href="/-/Public/home/css/text.css">
    <link rel="stylesheet" href="/-/Public/home/css/dingdanxiangqing.css">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
</head>
<body style="font-size: 12px">
    <div class="header">
        <span>订单详情</span>
    </div>

    <div class="hao">
        <div class="dd">
            <div class="dd1">
                <span>D</span>
            </div>

            <div class="shuzi">
                <span>023</span>
            </div>
        </div>

        <div class="jiu">
            <span>就餐号</span>
        </div>

        <div class="an">
            <span>下单后自取小票&nbsp;或&nbsp;向服务员可对订单</span>
        </div>
    </div>

    <div class="ding0">
        <div class="dding">
            <div class="dan0">
                <span>订单号码:</span>
            </div>

            <div class="hhao">
<<<<<<< HEAD
                <span>88888888888888888888</span>
=======
                <span><?php echo ($info["order_code"]); ?></span>
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
            </div>
        </div>

        <div class="zhuang">
            <div class="tai">
<<<<<<< HEAD
                <span>支付状态:</span>
            </div>

            <div class="yi">
                <span>已支付</span>
            </div>
=======
                <span>订单状态:</span>
            </div>

            <div class="yi">
            <?php if($info["order_status"] == 1): ?><span>未支付</span>
            <?php elseif($info["order_status"] == 5): ?>
                <span>已支付</span>
            <?php elseif($info["order_status"] == 10): ?>
                <span>待评价</span>
            <?php elseif($info["order_status"] == 15): ?>
                <span>已完成</span>
            <?php elseif($info["order_status"] == 20): ?>
                <span>已取消</span>
            <?php else: ?>
                <span>未知</span><?php endif; ?>
            </div>

>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
        </div>

        <div class="aa">
            <div class="aa2">
<<<<<<< HEAD
                <span>订单状态:</span>
            </div>

            <div class="aa3">
                <span>待使用</span>
            </div>

=======
                <span>使用状态:</span>
            </div>

            <div class="aa3">
            <?php if($info["is_use"] == 0): ?><span>待使用</span>
            </div>   
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
            <div class="tet">
                <div class="wenben">
                    <span>取消订单</span>
                </div>
            </div>
<<<<<<< HEAD
=======
            <?php elseif($info["is_use"] == 1): ?>
                <span>已使用</span>
            </div>
            <div class="tet">
                <div class="wenben">
                    <span></span>
                </div>
            </div>    
            <?php else: endif; ?>    


>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
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
<<<<<<< HEAD

            <div class="cai2">
                <div class="qq">
                    <span>玉米鲜肉馄饨</span>
                </div>

                <div class="liang">
                    <span>X2</span>
                </div>

                <div class="jiage">
                    <span>￥24</span>
                </div>
            </div>

            <div class="cai3">
                <div class="qq2">
                    <span>酸辣土豆丝</span>
                </div>

                <div class="liang2">
                    <span>X2</span>
                </div>

                <div class="jiage2">
                    <span>￥24</span>
                </div>
            </div>

            <div class="cai4">
                <div class="qq3">
                    <span>酸辣土豆丝</span>
                </div>

                <div class="liang3">
                    <span>X2</span>
                </div>

                <div class="jiage3">
                    <span>￥24</span>
                </div>
            </div>
=======
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

>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41

            <div class="canju">
                <div class="ju">
                    <span>餐具</span>
                </div>

                <div class="ju2">
<<<<<<< HEAD
                    <span>X2</span>
                </div>

                <div class="ju3">
                    <span>￥2</span>
=======
                    <span>X<?php echo ($info["order_pnum"]); ?></span>
                </div>

                <div class="ju3">
                    <span>￥<?php echo ($info["order_pnum"]); ?></span>
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                </div>
            </div>
        </div>

        <div class="xiang">
            <div class="xxiang">
                <div class="sui">
                    <div class="ssui">
                        <span>分享随机立减</span>
                    </div>

                    <div class="jian">
                        <span>-&nbsp;￥8.88</span>
                    </div>
                </div>

                <div class="zongji">
                    <div class="zj">
<<<<<<< HEAD
                        <span>总计:&nbsp;&nbsp;￥128.0</span>
                    </div>

                    <div class="sf">
                        <span>实付:&nbsp;&nbsp;￥666.6</span>
=======
                        <span>总计:&nbsp;&nbsp;￥<?php echo ($info["payable"]); ?></span>
                    </div>

                    <div class="sf">
                        <span>实付:&nbsp;&nbsp;￥<?php echo ($info["total_price"]); ?></span>
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="zhuohao">
        <div class="hhao6">
            <div class="ben">
<<<<<<< HEAD
                <input type="text" placeholder="下单前,请填写座位号">
=======
                <input type="text" placeholder="下单前,请填写座位号" name="seat" value="">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
            </div>

            <div class="nniu">
                <span>选择座位</span>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="foot">
            <span>未入座，稍后下单</span>
        </div>

        <div class="food">
            <span>已入座，立刻下单</span>
        </div>
    </div>

</body>
</html>