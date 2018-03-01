<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>我的</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="/-/Public/home/css/base.css">
    <link rel="stylesheet" href="/-/Public/home/css/text.css">
    <link rel="stylesheet" href="/-/Public/home/css/person.css">
=======
    <link rel="stylesheet" href="/kuaidian/Public/home/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/person.css">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
</head>
<body style="font-size: 12px">
<div class="header">
    <div class="top">
        <div class="kong">

        </div>

        <div class="person">
            <a href="#">
                <!-- <img src="images/person.jpg" alt=""> -->
<<<<<<< HEAD
                <?php if($user_info["photo"] == 'NULL'): ?><img src="/-/Public/<?php echo ($user_info["photo"]); ?>" alt="">
                <?php else: ?>
                <img src="/-/Public/<?php echo ($user_info["photo"]); ?>" alt=""><?php endif; ?>  
=======
                <?php if($user_info["photo"] == 'NULL'): ?><img src="/kuaidian/Public/<?php echo ($user_info["photo"]); ?>" alt="">
                <?php else: ?>
                <img src="/kuaidian/Public/<?php echo ($user_info["photo"]); ?>" alt=""><?php endif; ?>  
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </a>
        </div>

        <div class="shezhi">
            <a href="#">
<<<<<<< HEAD
                <img src="/-/Public/home/img/shezhi.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/shezhi.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </a>
        </div>
    </div>

    <div class="mingzi">
    <?php if($uid > 0): ?><div class="name">
                <span><?php echo ($user_info["nick_name"]); ?></span>
        </div>

    <?php else: ?>
        <a href="<?php echo U('Home/Login/index');?>">
            <div class="name">
                    <span>注册/登录</span>
            </div>

        </a><?php endif; ?>
        <div class="phone">
        <?php if($uid < 1): ?><span></span>
        <?php else: ?>    
            <span><?php echo ($user_info["tel"]); ?></span><?php endif; ?>    
        </div>
    </div>
</div>

<div class="money">
    <div class="pp">
        <div class="zuo">
            <div class="qian">
            <?php if($user_info["money"] < 1): ?><span>￥0.00</span>
            <?php else: ?>
                <span>￥<?php echo ($user_info["money"]); ?></span><?php endif; ?>
            </div>

            <div class="zhang">
                <span>账户余额</span>
            </div>
        </div>

        <div class="right">
            <div class="qian2">
            <?php if($user_info["toal_income"] < 1): ?><span>￥0.00</span>
            <?php else: ?>
                <span>￥<?php echo ($user_info["total_income"]); ?></span><?php endif; ?>
            </div>

            <div class="ru">
                <span>代言收入</span>
            </div>
        </div>
    </div>
</div>

<!-- <a href="mydingdan.html"> -->
<?php if($uid < 1): ?><a href="<?php echo U('Home/Login/index');?>">
<?php else: ?>
<a href="<?php echo U('Home/Order/order_info');?>"><?php endif; ?>
    <div class="all">
        <div class="tu">
<<<<<<< HEAD
            <img src="/-/Public/home/img/dinagdan.png" alt="">
=======
            <img src="/kuaidian/Public/home/img/dinagdan.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
        </div>

        <div class="quan">
            <span>全部订单</span>
        </div>

        <div class="you">
<<<<<<< HEAD
                <img src="/-/Public/home/img/youjiantou.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            <!-- </a> -->
        </div>
    </div>
</a>

<div class="di">
    <?php if($uid < 1): ?><a href="<?php echo U('Home/Login/index');?>">
    <?php else: ?>
    <a href="#"><?php endif; ?>
        <div class="qq">
            <div class="tu2">
<<<<<<< HEAD
                <img src="/-/Public/home/img/dianping.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/dianping.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </div>

            <div class="wo">
                <span>我的点评</span>
            </div>

            <div class="you2">
<<<<<<< HEAD
                <img src="/-/Public/home/img/youjiantou.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </div>
        </div>
    </a>
    <?php if($uid < 1): ?><a href="<?php echo U('Home/Login/index');?>">
    <?php else: ?>
    <a href="#"><?php endif; ?>
        <div class="qq2">
            <div class="tu3">
<<<<<<< HEAD
                <img src="/-/Public/home/img/xin.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/xin.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </div>

            <div class="shou">
                <span>收藏</span>
            </div>

            <div class="you3">
<<<<<<< HEAD
                <img src="/-/Public/home/img/youjiantou.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </div>
        </div>
    </a>
    <?php if($uid < 1): ?><a href="<?php echo U('Home/Login/index');?>">
    <?php else: ?>
    <a href="#"><?php endif; ?>
        <div class="qq3">
            <div class="tu4">
<<<<<<< HEAD
                <img src="/-/Public/home/img/tui.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/tui.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </div>

            <div class="tui1">
                <span>推广商家</span>
                <span class="wei">微众代言</span>
            </div>

            <div class="you4">
<<<<<<< HEAD
                <img src="/-/Public/home/img/youjiantou.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </div>
        </div>
    </a>
</div>

<a href="<?php echo U('Merch/Login/index');?>">
    <div class="all">
        <div class="tu">
<<<<<<< HEAD
            <img src="/-/Public/home/img/woshi.png" alt="">
=======
            <img src="/kuaidian/Public/home/img/woshi.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
        </div>

        <div class="quan">
            <span>我是商家</span>
        </div>

        <div class="you">
<<<<<<< HEAD
            <img src="/-/Public/home/img/youjiantou.png" alt="">
=======
            <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
        </div>
    </div>
</a>
<!-- 退出 -->
<?php if($uid > 0): ?><a href="<?php echo U('Home/Person/tc');?>">
    <div class="all" id="tc">
        <!-- <div class="tu">
<<<<<<< HEAD
            <img src="/-/Public/home/img/woshi.png" alt="">
=======
            <img src="/kuaidian/Public/home/img/woshi.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
        </div> -->

        <div>
            <span style="width:100%;font-size:40.8px;text-align:center;display:block;color:red;">退&nbsp;出</span>
        </div>
    </div>
</a>
<?php else: endif; ?>
<!--底部-->
<!-- <div class="foott">
    <a href="<?php echo U('Home/Index/index');?>">
        <div class="foot">
            <div class="tupian6">
<<<<<<< HEAD
                <img src="/-/Public/home/img/shangjia.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/shangjia.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </div>

            <div class="shouye">
                <span>首页</span>
            </div>
        </div>
    </a>

    <a href="<?php echo U('Home/Order/order_info');?>">
        <div class="foot">
            <div class="tupian6">
<<<<<<< HEAD
                <img src="/-/Public/home/img/diangdan.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/diangdan.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </div>

            <div class="shouye">
                <span>订单</span>
            </div>
        </div>
    </a>

    <div class="foot">
        <div class="tupian6">
<<<<<<< HEAD
            <img src="/-/Public/home/img/geren.png" alt="">
=======
            <img src="/kuaidian/Public/home/img/geren.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
        </div>

        <div class="shouye">
            <span>我的</span>
        </div>
    </div>

</div> -->
<div class="foott">
    <a href="<?php echo U('Home/Index/index');?>">
        <div id="foot">
            <div id="ttu">
<<<<<<< HEAD
                <img src="/-/Public/home/img/shangjia.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/shangjia.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </div>

            <div id="shou">
                <span>首页</span>
            </div>
        </div>
    </a>


    <a href="<?php echo U('Home/Order/order_info');?> ">
        <div id="foot2">
            <div id="ttu2">
<<<<<<< HEAD
                <img src="/-/Public/home/img/diangdan.png" alt="">
=======
                <img src="/kuaidian/Public/home/img/diangdan.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </div>

            <div id="shou2">
                <span>订单</span>
            </div>
        </div>
    </a>

    <a href="<?php echo U('Home/Person/index');?>">
        <div id="foot3" onclick="location.href='person.html'">
            <div id="ttu3">
<<<<<<< HEAD
               <img src="/-/Public/home/img/geren3.png" alt="">
=======
               <img src="/kuaidian/Public/home/img/geren3.png" alt="">
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
            </div>

            <div id="shou3">
                <span>我的</span>
            </div>
        </div>
    </a>
</div>
</body>

</html>