<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/css/xq.css"/>

</head>
<body>
    <div class="shanghe">
        <div class="shanghe2">
            <div class="yong">
                <span>订单信息</span>
            </div>

            <div class="ding">
                <span>订单号:</span>
            </div>

            <div class="hao">
                <span><?php echo ($one_info["order_code"]); ?></span>
            </div>
        </div>
    </div>

    <div class="he">
        <div class="big">
            <div class="he2">
                <div class="he3">
                    <div class="name">
                        <span>姓名</span>
                    </div>

                    <div class="name2">
                        <span><?php echo ($one_info["buyer_name"]); ?></span>
                    </div>
                </div>

                <div class="he3">
                    <div class="name">
                        <span>电话</span>
                    </div>

                    <div class="name2">
                        <span><?php echo ($user_info["tel"]); ?></span>
                    </div>
                </div>

                <div class="he3">
                    <div class="name">
                        <span>订单状态</span>
                    </div>

                    <div class="name2">
                    <?php if($one_info["is_use"] == 1): ?><span>已使用</span>
                    <?php elseif($one_info["is_use"] == 0): ?>
                        <span>未使用</span>
                    <?php else: endif; ?>
                    </div>
                </div>

                <div class="he3">
                    <div class="name">
                        <span>支付状态</span>
                    </div>

                    <div class="name2">
                    <?php if($one_info["order_status"] == 1): ?><span>未支付</span>
                    <?php elseif($one_info["order_status"] == 5): ?>
                        <span>已支付</span>
                    <?php elseif($one_info["order_status"] == 10): ?>
                        <span>已支付</span>
                    <?php elseif($one_info["order_status"] == 15): ?>
                        <span>已支付</span>
                    <?php elseif($one_info["order_status"] == 20): ?>
                        <span>已取消</span>
                    <?php else: endif; ?>
                    </div>
                </div>

                <div class="he3">
                    <div class="name">
                        <span>座位信息</span>
                    </div>

                    <div class="name2">
                    <?php if($one_info["seat"] == 0): ?><span>未订座</span>
                    <?php else: ?>
                        <span><?php echo ($one_info["seat"]); ?>号桌</span><?php endif; ?>
                    </div>
                </div>

                <div class="he3">
                    <div class="name">
                        <span>就餐号</span>
                    </div>

                    <div class="name2">
                    <?php if($one_info["table_no"] == 0): ?><span>未下单</span>
                    <?php else: ?>
                        <span><?php echo ($one_info["table_no"]); ?></span><?php endif; ?>
                    </div>
                </div>

                <div class="he3">
                    <div class="name">
                        <span>人数</span>
                    </div>

                    <div class="name2">
                        <span><?php echo ($one_info["order_pnum"]); ?>人</span>
                    </div>
                </div>
            </div>

            <div class="yu">
                <div class="yu2">
                    <div class="yudian">
                        <span>预点时间：</span>
                    </div>

                    <div class="time">
                        <span><?php echo ($one_info["add_time"]); ?></span>
                    </div>
                </div>

                <div class="yu2">
                    <div class="yudian">
                        <span>下单时间：</span>
                    </div>
                    <div class="time">
                    <?php if($one_info["is_use"] == 1): ?><span><?php echo ($one_info["use_time"]); ?></span>
                    <?php else: ?>
                        <span>未下单</span><?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

        <div class="cai2">
            <div class="pin">
                <span>菜品信息</span>
            </div>
        </div>

        <div class="cai">
            <div class="nn2">
                <div class="hhe">
                    <div class="nn3">
                        <div class="ming">
                            <span>名称</span>
                        </div>
                    </div>
                    <div class="nn3">
                        <div class="ming">
                            <span>数量</span>
                        </div>
                    </div>
                    <div class="nn3">
                        <div class="ming">
                            <span>单价</span>
                        </div>
                    </div>
                </div>
            <?php if(is_array($goods_xq)): foreach($goods_xq as $key=>$goods): ?><div class="hhe2">
                <div class="nn3">
                    <div class="ming2">
                        <span><?php echo ($goods["goods_name"]); ?></span>
                    </div>
                </div>
                <div class="nn3">
                    <div class="ming2">
                        <span><?php echo ($goods["goods_num"]); ?>份</span>
                    </div>
                </div>
                <div class="nn3">
                    <div class="ming2">
                        <span>￥<?php echo ($goods["goods_price"]); ?></span>
                    </div>
                </div>
            </div><?php endforeach; endif; ?>
        </div>

        <div class="bot">
            <div class="bot2">
                <div class="li">
                    <div class="jian">
                        <span>立减</span>
                    </div>

                    <div class="ll">
                        <span>-￥<?php echo ($one_info["lj"]); ?></span>
                    </div>
                </div>

                <div class="li">
                    <div class="jian">
                        <span>佣金</span>
                    </div>

                    <div class="ll">
                        <span>-￥6.66</span>
                    </div>
                </div>

                <div class="li2">
                    <div class="li3">
                        <div class="ji">
                            <span>总计：</span>
                        </div>

                        <div class="qian">
                            <span>￥<?php echo ($one_info["total_price"]); ?></span>
                        </div>
                    </div>
                    <div class="li3">
                        <div class="ji">
                            <span>实付：</span>
                        </div>

                        <div class="qian">
                            <span>￥<?php echo ($one_info["total_price"]); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>