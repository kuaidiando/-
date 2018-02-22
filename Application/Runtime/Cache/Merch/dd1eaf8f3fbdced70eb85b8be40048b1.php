<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>商家首页</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/index.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <script type="text/javascript" src="/kuaidian/Public/jquery/jquery.js"></script>
=======
    <link rel="stylesheet" href="/-/Public/merch/css/index.css">
    <link rel="stylesheet" href="/-/Public/merch/css/text.css">
    <link rel="stylesheet" href="/-/Public/merch/css/base.css">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
</head>
<body style="font-size: 12px">
    <div class="header">
        <div class="top">

            <div class="zuo">
                <div class="tu">
<<<<<<< HEAD
                    <img src="/kuaidian/Public/merch/images/qiehuan.png" alt="">
=======
                    <img src="/-/Public/merch/images/qiehuan.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                </div>

                <div class="qie">
                    <span>切换门店</span>
                </div>
            </div>

            <a href="register.html">
                <div class="zhong">
                    <div class="tu2">
<<<<<<< HEAD
                        <img src="/kuaidian/Public/<?php echo ($res[0][logo]); ?>" alt="">
=======
                        <img src="/-/Public/<?php echo ($res[0][logo]); ?>" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                    </div>
                </div>
            </a>

            <a href="<?php echo U('Merch/Shopset/index',array('shopid'=>$res[0][id]));?>">
                <div class="you">
                    <div class="tu3">
<<<<<<< HEAD
                        <img src="/kuaidian/Public/merch/images/shezhi.png" alt="">
                    </div>

                    <div class="er">
                        <span class="tiaozhuanmend">门店设置</span>
=======
                        <img src="/-/Public/merch/images/shezhi.png" alt="">
                    </div>

                    <div class="er">
                        <span>门店设置</span>
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                    </div>
                </div>
            </a>

        </div>

        <div class="center">
            <div class="name">
                <span><?php echo ($res[0][mingch]); ?></span>
            </div>
        </div>

        <div class="bot">
<<<<<<< HEAD
            
                <?php if($res[0][zhuangt] == 1): ?><div class="rz">
                        <span>已认证</span>
                    </div>
                <?php else: ?>
                     <div class="rza">
                        <span>未认证</span>
                    </div><?php endif; ?>
=======
            <div class="rz">
                <span>已认证</span>
            </div>
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
        </div>
    </div>

    <div class="dan">
        <div class="danz">
            <div class="ddan">
                <div class="top2">
<<<<<<< HEAD
                    <span>￥<?php echo ($order["data"]["order_total_price"]); ?></span>
=======
                    <span>￥8888.00</span>
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                </div>

                <div class="xia">
                    <span>今日订单收入/元</span>
                </div>
            </div>
        </div>

        <div class="dany">
            <div class="shu">
                <div class="zi">
<<<<<<< HEAD
                    <span><?php echo ($order["data"]["num"]); ?></span>
=======
                    <span>888</span>
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                </div>

                <div class="liang">
                    <span>今日订单量</span>
                </div>
            </div>
        </div>
    </div>

    <div class="qq">
        <a href="<?php echo U('Merch/Shopset/renzhengxx',array('shopid'=>$res[0][id]));?>">
            <div class="renz">
                <div class="rentu">
<<<<<<< HEAD
                    <img src="/kuaidian/Public/merch/images/renzheng.png" alt="">
                </div>

                <div class="ziti">
                    <span class="tiaozrenzheng">认证</span>
=======
                    <img src="/-/Public/merch/images/renzheng.png" alt="">
                </div>

                <div class="ziti">
                    <span>认证</span>
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                </div>

                <div class="time">
                    <span>截止:2018.12.30&nbsp;&nbsp;24时</span>
                </div>

                <div class="jian">
<<<<<<< HEAD
                    <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
=======
                    <img src="/-/Public/merch/images/youjiantou.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                </div>
            </div>
        </a>

        <a href="tixian.html">
            <div class="qian">
                <div class="qiantu">
<<<<<<< HEAD
                    <img src="/kuaidian/Public/merch/images/caiwu.png" alt="">
=======
                    <img src="/-/Public/merch/images/caiwu.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                </div>

                <div class="ke">
                    <span>财务/提现</span>
                </div>

                <div class="zong">
                    <span>￥8888.00</span>
                </div>

                <div class="jian">
<<<<<<< HEAD
                    <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
=======
                    <img src="/-/Public/merch/images/youjiantou.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                </div>
            </div>
        </a>
    </div>

    <div class="men">
        <div class="dian">
            <div class="xian">
                <div class="xxian"></div>
            </div>
            <div class="md">
                <span>门店管理</span>
            </div>
            <div class="xian">
                <div class="xxian"></div>
            </div>
        </div>

<<<<<<< HEAD
        <div class="ll2" id="shopguanli">

            <div class="she">
                <div class="sshe">
                    <div class="shetu">
                        <img src="/kuaidian/Public/merch/images/shangpin.png" alt="">
                    </div>

                    <div class="wenzi">
                        <span >商品管理</span>
                        <!-- 隐藏状态 基本信息 -->
                        <input type="text" name="jinbenxx" style="display: none;" class="jinbenxx" value="<?php echo ($res["0"]["jinbenxxtype"]); ?>">
                        <!-- 隐藏状态 认证信息 -->
                        <input type="text" name="renzhengxx" style="display: none;" class="renzhengxx" value="<?php echo ($res["0"]["zhuangt"]); ?>">
=======
        <div class="ll2">
            <div class="she">
                <div class="sshe">
                    <div class="shetu">
                        <img src="/-/Public/merch/images/shangpin.png" alt="">
                    </div>

                    <div class="wenzi">
                        <span>商品管理</span>
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                    </div>
                </div>
            </div>


            <div class="she2">
               <div class="sshe">
                   <div class="shetu2">
<<<<<<< HEAD
                       <img src="/kuaidian/Public/merch/images/zuowei.png" alt="">
=======
                       <img src="/-/Public/merch/images/zuowei.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                   </div>

                   <div class="wenzi2">
                       <span>桌位管理</span>
                   </div>
               </div>
            </div>


            <div class="she3">
                <div class="sshe">
                    <div class="shetu3">
<<<<<<< HEAD
                        <img src="/kuaidian/Public/merch/images/yuangong.png" alt="">
=======
                        <img src="/-/Public/merch/images/yuangong.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                    </div>

                    <div class="wenzi3">
                        <span>员工管理</span>
                    </div>
                </div>
            </div>

            <div class="she3">
                <div class="sshe">
                    <div class="shetu3">
<<<<<<< HEAD
                        <img src="/kuaidian/Public/merch/images/fentang.png" alt="">
=======
                        <img src="/-/Public/merch/images/fentang.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                    </div>

                    <div class="wenzi3">
                        <span>分堂出票</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="ll2">
            <div class="she">
                <div class="sshe">
                    <div class="shetu">
<<<<<<< HEAD
                        <img src="/kuaidian/Public/merch/images/yonghu.png" alt="">
=======
                        <img src="/-/Public/merch/images/yonghu.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                    </div>

                    <div class="wenzi">
                        <span>用户点评</span>
                    </div>
                </div>
            </div>


            <div class="she2">
                <div class="sshe">
                    <div class="shetu2">
<<<<<<< HEAD
                        <img src="/kuaidian/Public/merch/images/yingxiao.png" alt="">
=======
                        <img src="/-/Public/merch/images/yingxiao.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                    </div>

                    <div class="wenzi2">
                        <span>营销团队</span>
                    </div>
                </div>
            </div>


            <div class="she3">
                <div class="sshe">
                    <div class="shetu3">
<<<<<<< HEAD
                        <img src="/kuaidian/Public/merch/images/xitong.png" alt="">
=======
                        <img src="/-/Public/merch/images/xitong.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                    </div>

                    <div class="wenzi3">
                        <span>系统消息</span>
                    </div>
                </div>
            </div>

            <div class="she3">
                <div class="sshe">
                    <div class="shetu3">
<<<<<<< HEAD
                        <img src="/kuaidian/Public/merch/images/sheng.png" alt="">
=======
                        <img src="/-/Public/merch/images/sheng.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
                    </div>

                    <div class="wenzi3">
                        <span>提示音</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="foot">
            <div class="ftu">
<<<<<<< HEAD
                <img src="/kuaidian/Public/merch/images/diangdan.png" alt="">
=======
                <img src="/-/Public/merch/images/diangdan.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
            </div>
            <div class="dd">
                <span>门店订单</span>
            </div>
        </div>


        <div class="foot">
            <div class="ftu">
<<<<<<< HEAD
                <img src="/kuaidian/Public/merch/images/geren.png" alt="">
=======
                <img src="/-/Public/merch/images/geren.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
            </div>
            <div class="dd">
                <span>我的门店</span>
            </div>
        </div>
    </div>
</body>
<<<<<<< HEAD
    <script type="text/javascript">
        $("#shopguanli").click(function(){
            var jinbenxx = $(".jinbenxx").val();//基本信息
            var renzhengxx = $(".renzhengxx").val();//认证信息
            //判断基本信息状态
            if (jinbenxx == 0) {
                var con = confirm("基本信息未完善");
                // 点击确定页面跳转
                if (con) {
                    $(".tiaozhuanmend").click();//跳转基本信息
                }else{
                    // alert("页面不跳转");
                }
            }else{
                if (renzhengxx== 1) {
                    window.location.href = "<?php echo U('Merch/Foodhoutai/index',array('shopid'=>$res[0][id]));?>";
                }else{
                     var con = confirm("认证信息未完善");
                        // 点击确定页面跳转
                        if (con) {
                            $(".tiaozrenzheng").click();//跳转认证信息
                        }else{
                            // alert("页面不跳转");
                        }
                }
            }
        });
    </script>
=======
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
</html>