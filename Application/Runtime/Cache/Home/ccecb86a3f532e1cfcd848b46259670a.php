<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <meta content="telephone=yes" name="format-detection" />
    <meta content="email=no" name="format-detection" />
    <title>订单提交</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="/-/Public/home/css/base.css">
    <link rel="stylesheet" href="/-/Public/home/css/text.css">
    <link rel="stylesheet" href="/-/Public/home/css/dingdan.css">
    <link rel="stylesheet" href="/-/Public/home/css/demo.css">
=======
    <link rel="stylesheet" href="/kuaidian/Public/home/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/dingdan.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/demo.css">
>>>>>>> 82915d42581279f07177dc506d383202ff0a965c
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
            <span><?php echo ($shopname); ?></span>
        </div>

        <div class="jia">
            <div class="jia2">
                <span>
                <a href="<?php echo U('Home/Index/detail',array('shopid'=>$shopid));?>">加菜</a>
                </span>
            </div>
        </div>
    </div>
    <form action="<?php echo U('Home/Order/save_order');?>" id="myform" name="myform" method="post">
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

        <div class="canwei">
            <div class="can">
                <span>餐位</span>
            </div>

            <div class="liang3">
                <span>X2</span>
            </div>

            <div class="jiage3">
                <span>￥24</span>
            </div>
        </div>

        <div class="jie">
            <div class="jine">
                <span>结算金额</span>
            </div>

            <div class="shi">
                <span>实付</span>
            </div>

            <div class="qqian">
                <span>￥<?php echo ($total_price); ?></span>
            </div>
        </div>
    </div>

    <div class="juti">
        <div class="aa">
            <div class="xxing">
                <span>姓名:</span>
            </div>

            <div class="mming">
                <input type="text" name="buyer_name" placeholder="请输入您的名字">
            </div>
        </div>

        <div class="wei">
            <div class="kou">
                <span>备注:</span>
            </div>

            <div class="ll">
                <input type="text" name="order_remark" placeholder="选填、口味、偏好、忌口等其他要求">
            </div>
        </div>
    </div>

    <div class="ddi">
        <div class="fen">
            <span>提交订单获取折扣</span>
        </div>

        <div class="zong">
            <span>￥<?php echo ($total_price); ?></span>
            <input type="hidden" name="total_price" value="<?php echo ($total_price); ?>">
            <input type="hidden" name="store_id" value="<?php echo ($shopid); ?>"/>
        </div>

        <div class="tj">
           <button >提交订单</button>
        </div>
    </div>
    </form>
</body>

</html>