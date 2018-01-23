<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>我的</title>
    <link rel="stylesheet" href="/kuaidian/Public/home/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/person.css">
</head>
<body style="font-size: 12px">
    <div class="header">
        <div class="top">
            <div class="kong">

            </div>

            <div class="person">
                <a href="#">
<<<<<<< HEAD
                    <?php if($user_info["photo"] == ''): ?><img src="/-/Public/<?php echo ($user_info["photo"]); ?>" alt="">
                    <?php else: ?>
                    <img src="/-/Public/<?php echo ($user_info["photo"]); ?>" alt=""><?php endif; ?>
=======
                    <?php if($user_info["photo"] == ''): ?><img src="/kuaidian/Public/home/img/person.jpg" alt="">
                    <?php else: ?>
                    <img src="/kuaidian/Public/home/img/<?php echo ($user_info["photo"]); ?>" alt=""><?php endif; ?>
>>>>>>> 3b8a54b355dd85928808fa6731a063768d2785ab

                </a>
            </div>


            <div class="shezhi">
                <a href="#">
                    <img src="/kuaidian/Public/home/img/shezhi.png" alt="">
                </a>
            </div>
        </div>

       <div class="mingzi">
           <div class="name">
               <a href="login.html">
                   <span><?php echo ($user_info["nick_name"]); ?></span>
               </a>
           </div>

           <div class="phone">
               <span><?php echo ($user_info["tel"]); ?></span>
           </div>
       </div>
    </div>

    <div class="money">
        <div class="pp">
            <div class="zuo">
                <div class="qian">
                    <span>￥<?php echo ($user_info["money"]); ?></span>
                </div>

                <div class="zhang">
                    <span>账户余额</span>
                </div>
            </div>

            <div class="right">
                <div class="qian2">
                    <span>￥<?php echo ($user_info["total_income"]); ?></span>
                </div>

                <div class="ru">
                    <span>代言收入</span>
                </div>
            </div>
        </div>
    </div>

    <a href="mydingdan.html">
        <div class="all">
            <div class="tu">
                    <img src="/kuaidian/Public/home/img/dinagdan.png" alt="">
                </div>

            <div class="quan">
                    <span>全部订单</span>
                </div>

            <div class="you">
                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                </div>
        </div>
    </a>

    <div class="di">
        <div class="qq">
            <div class="tu2">
                <img src="/kuaidian/Public/home/img/dianping.png" alt="">
            </div>

            <div class="wo">
                <span>我的点评</span>
            </div>

            <div class="you2">
                <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
            </div>
        </div>

        <div class="qq2">
            <div class="tu3">
                <img src="/kuaidian/Public/home/img/xin.png" alt="">
            </div>

            <div class="shou">
                <span>收藏</span>
            </div>

            <div class="you3">
                <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
            </div>
        </div>


        <div class="qq3">
            <div class="tu4">
                <img src="/kuaidian/Public/home/img/tui.png" alt="">
            </div>

            <div class="tui1">
                <span>推广商家</span>
                <span class="wei">微众代言</span>
            </div>

            <div class="you4">
                <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
            </div>
        </div>
    </div>

    <!--底部-->
    <footer>
        <div class="foot">
            <a href="index.html">
                <img src="/kuaidian/Public/home/img/shangjia.png" alt="">
                <p>首页</p>
            </a>
        </div>

        <div class="dan">
            <a href="#">
                <img src="/kuaidian/Public/home/img/diangdan.png" alt="">
                <p>订单</p>
            </a>
        </div>

        <div class="food">
            <a href="#">
                <img src="/kuaidian/Public/home/img/geren.png" alt="">
                <p>我的</p>
            </a>
        </div>
    </footer>
</body>
</html>