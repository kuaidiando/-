<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>Title</title>
    <link rel="stylesheet" href="/-/Public/merch/css/text.css">
    <link rel="stylesheet" href="/-/Public/merch/css/base.css">
    <link rel="stylesheet" href="/-/Public/merch/css/dingdanmingxi.css">
</head>
<body style="font-size: 12px">
    <div class="header">
        <span>订单明细</span>
    </div>

    <div class="mm">
        <div class="top">
            <div class="time">
                <div class="tzuo">
                    <span><?php echo ($date); ?></span>
                </div>

                <div class="tyou">
                    <span>￥<?php echo ($total_price_sf); ?></span>
                </div>
            </div>

            <div class="ttop">
                <div class="kk">
                    <div class="kuang">
                        <span>待结算</span>
                    </div>
                </div>

                <div class="yu">
                    <span>预计结算日期<?php echo ($date_js); ?></span>
                </div>
            </div>
        </div>

        <div class="name">
            <div class="mc">
                <span>名称</span>
            </div>

            <div class="shu">
                <span>数量</span>
            </div>

            <div class="jie">
                <span>结算金额</span>
            </div>
        </div>

        <div class="hui">
            <div class="ding">
                <div class="dd">
                    <span>订单总额</span>
                </div>

                <div class="bi">
                    <span><?php echo ($order_num); ?>笔</span>
                </div>

                <div class="qian">
                    <span>￥<?php echo ($total_price); ?></span>
                </div>
            </div>

            <div class="ding">
                <div class="dd">
                    <span>订单退款</span>
                </div>

                <div class="bi">
                    <span>-<?php echo ($num_t); ?>笔</span>
                </div>

                <div class="qian">
                    <span>-￥<?php echo ($t_price); ?></span>
                </div>
            </div>

            <div class="ding">
                <div class="dd">
                    <span>活动立减</span>
                </div>

                <div class="bi">
                    <span></span>
                </div>

                <div class="qian">
                    <span>-￥<?php echo ($lj); ?></span>
                </div>
            </div>

            <div class="ding">
                <div class="dd">
                    <span>推广营销</span>
                </div>

                <div class="bi">
                    <span>0笔</span>
                </div>

                <div class="qian">
                    <span>-￥0.00</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bb">
        <div class="ri">
            <div class="rq">
                <span>时间/就餐号</span>
            </div>

            <div class="jiao">
                <span>交易类型</span>
            </div>

            <div class="jin">
                <span>金额</span>
            </div>
        </div>
        
        <div class="qi">
            <div class="shij">
                <span>10:55/8888</span>
            </div>

            <div class="lei">
                <span>堂食</span>
            </div>

            <div class="jine">
                <span>￥13.66</span>
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
            </div>
        </div>

        <div class="qi">
            <div class="shij">
                <span>10:55/8888</span>
            </div>

            <div class="lei">
                <span>堂食</span>
            </div>

            <div class="jine">
                <span>￥13.66</span>
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
            </div>
        </div>

        <div class="qi">
            <div class="shij">
                <span>10:55/8888</span>
            </div>

            <div class="lei">
                <span>堂食</span>
            </div>

            <div class="jine">
                <span>￥13.66</span>
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
            </div>
        </div>

        <div class="qi">
            <div class="shij">
                <span>10:55/8888</span>
            </div>

            <div class="lei">
                <span>堂食</span>
            </div>

            <div class="jine">
                <span>￥13.66</span>
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
            </div>
        </div>

        <div class="qi">
            <div class="shij">
                <span>10:55/8888</span>
            </div>

            <div class="lei">
                <span>堂食</span>
            </div>

            <div class="jine">
                <span>￥13.66</span>
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
            </div>
        </div>

        <div class="qi">
            <div class="shij">
                <span>10:55/8888</span>
            </div>

            <div class="lei">
                <span>堂食</span>
            </div>

            <div class="jine">
                <span>￥13.66</span>
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
            </div>
        </div>
    </div>
</body>
</html>