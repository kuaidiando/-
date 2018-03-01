<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>支付订单</title>
    <link rel="stylesheet" href="/-/Public/home/css/base.css">
    <link rel="stylesheet" href="/-/Public/home/css/zhifuye.css">
    <style>
        .qq {
            position: relative;
            line-height: 40px;
        }

        input[type="radio"] {
            width: 40px;
            height: 40px;
            opacity: 0;
        }

        label {
            position: absolute;
            left: 50px;
            top: 35px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #999;
        }

        /*设置选中的input的样式*/
        /* + 是兄弟选择器,获取选中后的label元素*/
        input:checked+label {
            background-color: #ffae00;
            border: 1px solid #ffae00;
        }

        input:checked+label::after {
            position: absolute;
            content: "";
            width: 15px;
            height: 30px;
            top: 6px;
            left: 16px;
            border: 4px solid #fff;
            border-top: none;
            border-left: none;
            transform: rotate(45deg)
        }
    </style>
</head>
<body style="font-size: 12px">
<div class="header">
    <span>支付订单</span>
</div>

<div class="top">
    <div class="top2">
        <div class="ding">
            <span>订单信息</span>
        </div>

        <div class="shang">
            <div class="jia">
                <span>商&nbsp;&nbsp;&nbsp;家:</span>
            </div>

            <div class="name">
                <span><?php echo ($shopname); ?></span>
            </div>
        </div>

        <div class="dan">
            <div class="ddh">
                <span>订单号:</span>
            </div>

            <div class="hao">
                <span><?php echo ($order_code); ?></span>
            </div>
        </div>
    </div>
</div>

<div class="center">
    <div class="center2">
        <div class="jin">
            <span>订单金额</span>
        </div>

        <div class="yuan">
            <div class="yj">
                <span>原价</span>
            </div>

            <div class="qian">
                <span>￥&nbsp;<?php echo ($total_price); ?></span>
            </div>
        </div>

        <div class="sui">
            <div class="li">
                <div class="tu">
                    <img src="/-/Public/home/img/jian.png" alt="">
                </div>

                <div class="jian">
                    <span>随机立减&nbsp;活动</span>
                </div>

                <div class="jqian">
                    <span>-￥&nbsp;<?php echo ($lj); ?></span>
                </div>
            </div>
        </div>

        <div class="ying">
            <div class="fu">
                <span>应付金额</span>
            </div>

            <div class="fuqian">
                <span>￥<?php echo ($sf); ?></span>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo U('Home/Order/to_pay');?>" name="myform" method="post">
    <div class="bot">
        <div class="bot2">
            <div class="wei">
                <div class="tu2">
                    <img src="/-/Public/home/img/weixin.png" alt="">
                </div>

                <div class="xin">
                    <span>微信支付</span>
                </div>
                <div class="yuqian">
                    <span></span>
                </div>
                <div class="fuxuan2">
                    <div class="qq">
                        <input id="item1" type="radio" name="item" value="1" checked>
                        <label for="item1"></label>
                    </div>
                </div>
            </div>


            <div class="yu">
                <div class="tu2">
                    <img src="/-/Public/home/img/yu.png" alt="">
                </div>

                <div class="yue">
                    <span>余额支付</span>
                </div>

                <div class="yuqian">
                    <span>￥&nbsp;<?php echo ($money); ?></span>
                </div>

                <div class="fuxuan2">
                    <div class="qq">
                        <input id="item2" type="radio" name="item" value="2">
                        <label for="item2"></label>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <button>
            去支付&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;￥<?php echo ($sf); ?>
            <input type="hidden" name="sf" value="<?php echo ($sf); ?>">
            <input type="hidden" name="lj" value="<?php echo ($lj); ?>">
            <input type="hidden" name="order_id" value="<?php echo ($order_id); ?>">
            <input type="hidden" name="total_price" value="<?php echo ($total_price); ?>">
            <input type="hidden" name="store_id" value="<?php echo ($store_id); ?>">

        </button>
    </div>
</form>

</body>
</html>