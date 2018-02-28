<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>商家首页</title>
    <link rel="stylesheet" href="/-/Public/merch/css/index.css">
    <link rel="stylesheet" href="/-/Public/merch/css/text.css">
    <link rel="stylesheet" href="/-/Public/merch/css/base.css">
    <script type="text/javascript" src="/-/Public/jquery/jquery.js"></script>
</head>
<body style="font-size: 12px">
    <div class="header">
        <div class="top">

            <div class="zuo">
                <div class="tu">
                    <img src="/-/Public/merch/images/qiehuan.png" alt="">
                </div>

                <div class="qie">
                    <span>切换门店</span>
                </div>
            </div>

            <a href="register.html">
                <div class="zhong">
                    <div class="tu2">
                        <img src="/-/Public/<?php echo ($res[0][logo]); ?>" alt="">
                    </div>
                </div>
            </a>

            <a href="<?php echo U('Merch/Shopset/index',array('shopid'=>$res[0][id]));?>">
                <div class="you">
                    <div class="tu3">
                        <img src="/-/Public/merch/images/shezhi.png" alt="">
                    </div>

                    <div class="er">
                        <span class="tiaozhuanmend">门店设置</span>
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
            
                <?php if($res[0][zhuangt] == 1): ?><div class="rz">
                        <span>已认证</span>
                    </div>
                <?php else: ?>
                     <div class="rz">
                        <span>未认证</span>
                    </div><?php endif; ?>
        </div>
    </div>

    <div class="dan">
        <div class="danz">
            <div class="ddan">
                <div class="top2">
                    <span>￥<?php echo ($order["data"]["order_total_price"]); ?></span>
                </div>

                <div class="xia">
                    <span>今日订单收入/元</span>
                </div>
            </div>
        </div>

        <div class="dany">
            <div class="shu">
                <div class="zi">
                    <span><?php echo ($order["data"]["num"]); ?></span>
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
                    <img src="/-/Public/merch/images/renzheng.png" alt="">
                </div>

                <div class="ziti">
                    <span class="tiaozrenzheng">认证</span>
                </div>

                <div class="time">
                    <span>截止:2018.12.30&nbsp;&nbsp;24时</span>
                </div>

                <div class="jian">
                    <img src="/-/Public/merch/images/youjiantou.png" alt="">
                </div>
            </div>
        </a>

        <a href="tixian.html">
            <div class="qian">
                <div class="qiantu">
                    <img src="/-/Public/merch/images/caiwu.png" alt="">
                </div>

                <div class="ke">
                    <span>财务/提现</span>
                </div>

                <div class="zong">
                    <span>￥8888.00</span>
                </div>

                <div class="jian">
                    <img src="/-/Public/merch/images/youjiantou.png" alt="">
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

        <div class="ll2" >

            <div class="she" id="shopguanli">
                <div class="sshe">
                    <div class="shetu">
                        <img src="/-/Public/merch/images/shangpin.png" alt="">
                    </div>

                    <div class="wenzi">
                        <span >商品管理</span>
                        <!-- 隐藏状态 基本信息 -->
                        <input type="text" name="jinbenxx" style="display: none;" class="jinbenxx" value="<?php echo ($res["0"]["jinbenxxtype"]); ?>">
                        <!-- 隐藏状态 认证信息 -->
                        <input type="text" name="renzhengxx" style="display: none;" class="renzhengxx" value="<?php echo ($res["0"]["zhuangt"]); ?>">
                    </div>
                </div>
            </div>


            <div class="she2">
               <div class="sshe">
                   <div class="shetu2">
                       <img src="/-/Public/merch/images/zuowei.png" alt="">
                   </div>

                   <div class="wenzi2">
                       <span>桌位管理</span>
                   </div>
               </div>
            </div>


            <div class="she3" id="staff_anage">
                <div class="sshe">
                    <div class="shetu3">
                        <img src="/-/Public/merch/images/yuangong.png" alt="">
                    </div>

                    <div class="wenzi3">
                        <span>员工管理</span>
                    </div>
                </div>
            </div>

            <div class="she3">
                <div class="sshe">
                    <div class="shetu3">
                        <img src="/-/Public/merch/images/fentang.png" alt="">
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
                        <img src="/-/Public/merch/images/yonghu.png" alt="">
                    </div>

                    <div class="wenzi">
                        <span>用户点评</span>
                    </div>
                </div>
            </div>


            <div class="she2">
                <div class="sshe">
                    <div class="shetu2">
                        <img src="/-/Public/merch/images/yingxiao.png" alt="">
                    </div>

                    <div class="wenzi2">
                        <span>营销团队</span>
                    </div>
                </div>
            </div>


            <div class="she3">
                <div class="sshe">
                    <div class="shetu3">
                        <img src="/-/Public/merch/images/xitong.png" alt="">
                    </div>

                    <div class="wenzi3">
                        <span>系统消息</span>
                    </div>
                </div>
            </div>

            <div class="she3">
                <div class="sshe">
                    <div class="shetu3">
                        <img src="/-/Public/merch/images/sheng.png" alt="">
                    </div>

                    <div class="wenzi3">
                        <span>提示音</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
    <a href="<?php echo U('Merch/Order/index',array('store_id'=>$res[0][id]));?>">

        <div class="foot">

        <!-- <audio id="mp3" src="/-/Public/aut/8868.wav">

        </audio> -->
        <audio controls="controls" id="mp3" loop="loop" style="display: none">
            <source src="/-/Public/aut/8868.wav" type="audio/ogg" />
            <!-- <source src="./assets/sound/music.ogg" type="audio/ogg" /> -->
        </audio>

        <input type="hidden" id="store_id" name="store_id" value="<?php echo ($res[0][id]); ?>">
            <div class="ftu">
                <img src="/-/Public/merch/images/diangdan.png" alt="">
            </div>
            <div class="quan">
                <div class="nm">
                    <span class="remind">0</span>
                </div>
            </div>

            <div class="dd">
                <span>门店订单</span>
            </div>
        </div>
    </a>

        <div class="foot2">
            <div class="ftu2">
                <img src="/-/Public/merch/images/dian.png" alt="">
            </div>
            <div class="dd2">
                <span>我的门店</span>
            </div>
        </div>
    </div>
</body>
    <script type="text/javascript">
        //商品管理
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
        //员工管理
         $("#staff_anage").click(function(){
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
                    window.location.href = "<?php echo U('Merch/Staff/index',array('shopid'=>$res[0][id]));?>";
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
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        // var remind = 0;
        var mp3 = $("#mp3")[0];
        // var play= 0;
        var store_id = $('#store_id').val();
        $('.nm').hide();
        // alert(store_id);
       
        // if(sessionStorage.num){
        //     $(".remind").text(sessionStorage.num);
        // }

        // $.ajax({
        //     type:'post',
        //     url:"<?php echo U('Merch/Order/sendOrderNotice');?>",
        //     dataType: 'json',
        //     data:{store_id:store_id},
        //     success:function (data) {
        //         sessionStorage.num = data;
        //         $(".remind").text(data);
        //         remind = data;play=data;
        //         remind<=0?$(".remind").hide():$(".remind").show();

        //     }
        // })


        setInterval(function () {
            $.ajax({
                type:'post',
                url:"<?php echo U('Merch/Order/sendOrderNotice');?>",
                dataType: 'json',
                data:{store_id:store_id},              
                success:function (data) {
                    if(data > 0){
                        $('.nm').show();
                        $('.remind').text(data);
                        mp3.play();
                        // play=remind;                      
                    }else{
                        $('.nm').hide();

                    }
                    // remind = data;
                    // sessionStorage.num = data;
                    // if(play==remind){
                    //     remind<=0?$(".nm").hide():$(".nm").show()
                    // }else{
                    //     $(".nm").show();
                    //     $('.remind').text(remind);
                    //     mp3.play();
                    //     play=remind;
                    // } 


                }
            })
        },10000)      

    </script>
</html>