<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <meta content="telephone=yes" name="format-detection" />
    <meta content="email=no" name="format-detection" />
    <title>订单提交</title>
    <link rel="stylesheet" href="/-/Public/home/css/base.css">
    <link rel="stylesheet" href="/-/Public/home/css/text.css">
    <link rel="stylesheet" href="/-/Public/home/css/dingdan.css">
    <link rel="stylesheet" href="/-/Public/home/css/demo.css">
</head>
<body style="font-size: 12px">
    <div class="header">
        <span>确认订单</span>
    </div>

    <div class="shangjia">
        <span>商家名称</span>
    </div>

    <div class="name">
        <div class="dianming">
            <span>渝乡辣婆婆(万达店)</span>
        </div>

        <div class="jia">
            <div class="jia2">
                <span>加菜</span>
            </div>
        </div>
    </div>

    <div class="mingxi">
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
        <?php if(is_array($end_cart_info)): foreach($end_cart_info as $key=>$info): ?><div class="cai2">
                <div class="qq">
                    <span><?php echo ($info["name"]); ?></span>
                </div>

                <div class="liang">
                    <span>X<?php echo ($info["goods_num"]); ?></span>
                </div>

                <div class="jiage">
                    <span>￥<?php echo ($info["price"]); ?></span>
                </div>
            </div><?php endforeach; endif; ?>
           
        </div>

        <div class="jie">
            <div class="jine">
                <span>结算金额</span>
            </div>

            <div class="shi">
                <span>实付</span>
            </div>

            <div class="qqian">
                <span>￥72</span>
            </div>
        </div>
    </div>

    <div class="juti">
        <div class="renshu">
            <div class="ren">
                <span>人数:</span>
            </div>

            <div class="shu">
                <input type="text" placeholder="请填写就餐人数">
            </div>
        </div>

        <div class="aa">
            <div class="xxing">
                <span>姓名:</span>
            </div>

            <div class="mming">
                <input type="text" placeholder="请输入您的名字">
            </div>
        </div>

        <div class="wei">
            <div class="kou">
                <span>备注:</span>
            </div>

            <div class="ll">
                <input type="text" placeholder="选填、口味、偏好、忌口等其他要求">
            </div>
        </div>
    </div>

    <div class="ddi">
        <div class="fen">
            <span>提交订单获取折扣</span>
        </div>

        <div class="zong">
            <span>￥72</span>
        </div>

        <div class="tj">
            <span>提交订单</span>
        </div>
    </div>

</body>
</html>