<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>我的订单</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="/kuaidian/Public/home/css/my%20dingdan.css">

    <script src="/kuaidian/Public/home/js/jquery-1.12.4.js"></script>
    <script src="/kuaidian/Public/home/js/jquery-1.12.4.min.js"></script>
    <script src="/kuaidian/Public/home/js/tab.js"></script>
    <script>
        $(function(){
            $(window).scroll(function() {
                if($(window).scrollTop()>1){
                    $(".nav").addClass("fixedNav");
                }else{
                    $(".nav").removeClass("fixedNav");
                }
            });
        });
    </script>
    <script>
        $(function(){
            $(window).scroll(function() {
                if($(window).scrollTop()>5){
                    $("nav2").addClass("fixedNav2");
                }else{
                    $(".nav2").removeClass("fixedNav2");
                }
            });
        });
    </script>
    <style>
        .fixedNav {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            z-index: 100000;
            _position: absolute;
            _top: expression(eval(document.documentElement.scrollTop));
        }
        .fixedNav2 {
            position: fixed;
            top: 120px;
            left: 0px;
            width: 100%;
            z-index: 100000;
            _position: absolute;
            _top: expression(eval(document.documentElement.scrollTop));
        }
    </style>
</head>
<body style="font-size: 12px">
<div class="tab" js-tab="1">
    <section class="nav">
        <div class="tab-title">
            <a href="javascript:;" class="item item-cur">订单</a>
            <a href="javascript:;" class="item">订座</a>
        </div>
    </section>
    <div class="tab-cont">
        <ul class="tab-cont__wrap">
            <li class="item">
                <div class="tab1" id="tab1">
                    <section class="nav2">
                        <div class="menu">
                            <ul>
                                <li id="one1" onclick="setTab('one',1)">全部</li>
                                <li id="one2" onclick="setTab('one',2)">待支付</li>
                                <li id="one3" onclick="setTab('one',3)">待使用</li>
                                <li id="one4" onclick="setTab('one',4)">已使用</li>
                                <li id="one5" onclick="setTab('one',5)">待评价</li>
                                <li id="one6" onclick="setTab('one',6)">取消单</li>
                            </ul>
                        </div>
                    </section>

                        <div class="menudiv">

                            <div id="con_one_1">
                            <?php if(is_array($order_res)): foreach($order_res as $key=>$res): ?><!-- <a href="dingdanxiangqing.html"> -->
=======
    <link rel="stylesheet" href="/-/Public/home/css/base.css">
    <link rel="stylesheet" href="/-/Public/home/css/text.css">
    <link rel="stylesheet" href="/-/Public/home/css/my%20dingdan.css">
</head>
<body style="font-size: 12px">
<div class="tab" js-tab="1">
    <div class="tab-title">
        <a href="javascript:;" class="item item-cur">订单</a>
        <a href="javascript:;" class="item">订座</a>
    </div>
    <div class="tab-cont">
        <ul class="tab-cont__wrap">
            <li class="item">
                <div class="tab">
                    <ul class="tabs2">
                        <li><a href="#">全部</a></li>
                        <li><a href="#">待支付</a></li>
                        <li><a href="#">待使用</a></li>
                        <li><a href="#">已使用</a></li>
                        <li><a href="#">待评价</a></li>
                        <li><a href="#">取消单</a></li>
                    </ul>
                    <!-- / tabs -->
                    <div class="tab_content">
                        <div class="tabs_item">
                             <?php if(is_array($order_res)): foreach($order_res as $key=>$res): ?><!-- <a href="dingdanxiangqing.html"> -->
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span><?php echo ($res["shopname"]); ?></span>
                                            </div>

                                            <div class="qu">
                                            <?php if($res["order_status"] == 1 || $res["order_status"] == 5): ?><span>取消订单</span>
                                            <?php elseif($res["order_status"] == 10): ?>    
                                                <span>去使用</span>
                                            <?php elseif($res["order_status"] == 15): ?>
                                                <span>去评价</span>
                                            <?php else: ?>
                                                <span></span><?php endif; ?>     
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
<<<<<<< HEAD
                                                <img src="/kuaidian/Public<?php echo ($res["logo"]); ?>" alt="">
=======
                                                <img src="/-/Public<?php echo ($res["logo"]); ?>" alt="">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            </div>

                                            <div class="hao">
                                                <div class="top">
                                                    <span>订单号:</span>
                                                </div>

                                                <div class="center">
                                                    <span><?php echo ($res["order_code"]); ?></span>
                                                </div>

                                                <div class="xia">
                                                    <div class="xiaz">
                                                        <span>订单金额:</span>
                                                    </div>

                                                    <div class="xiay">
                                                        <span>￥<?php echo ($res["total_price"]); ?></span>
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD
                                            <a href="<?php echo U('Home/Order/order_xq');?>" style="text-decoration:none">
=======
                                            <a href="<?php echo U('Home/Order/order_xq', array('order_id' => $res['id']));?>" style="text-decoration:none">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            <div class="dai">
                                                <div class="yong">
                                                <?php if($res["order_status"] == 1 ): ?><span>未支付</span>
                                                <?php elseif($res["order_status"] == 5): ?>
                                                    <span>已支付</span>
                                                    <?php elseif($res["order_status"] == 10): ?>
                                                    <span>待评价</span>
                                                    <?php elseif($res["order_status"] == 15): ?>
                                                    <span>已完成</span>
                                                    <?php elseif($res["order_status"] == 20): ?>
                                                    <span>已取消</span>
                                                    <?php else: ?>
                                                    <span>未知</span><?php endif; ?>
                                                </div>

                                                <div class="jian">
<<<<<<< HEAD
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
=======
                                                    <img src="/-/Public/home/img/youjiantou.png" alt="">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                                </div>

                                            </div>
                                            </a>    

                                        </div>
                                    </div>
<<<<<<< HEAD
                                <!-- </a> --><?php endforeach; endif; ?>    

                            </div>



                            <div id="con_one_2" style="display:none;">
=======
                                <!-- </a> --><?php endforeach; endif; ?> 
                        </div>   

                        <div class="tabs_item hezi3">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                            <?php if(is_array($order_n)): foreach($order_n as $key=>$resn): ?><!-- <a href="dingdanxiangqing.html"> -->
                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span><?php echo ($resn["shopname"]); ?></span>
                                            </div>

                                            <div class="qu">
                                                <span>取消订单</span>
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
<<<<<<< HEAD
                                                <img src="/kuaidian/Public<?php echo ($resn["logo"]); ?>" alt="">
=======
                                                <img src="/-/Public<?php echo ($resn["logo"]); ?>" alt="">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            </div>

                                            <div class="hao">
                                                <div class="top">
                                                    <span>订单号:</span>
                                                </div>

                                                <div class="center">
                                                    <span><?php echo ($resn["order_code"]); ?></span>
                                                </div>

                                                <div class="xia">
                                                    <div class="xiaz">
                                                        <span>订单金额:</span>
                                                    </div>

                                                    <div class="xiay">
                                                        <span>￥<?php echo ($resn["total_price"]); ?></span>
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD

=======
                                            <a href="<?php echo U('Home/Order/order_xq', array('order_id' => $res['id']));?>" style="text-decoration:none">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            <div class="dai">
                                                <div class="yong">
                                                    <span>未支付</span>
                                                    
                                                </div>

                                                <div class="jian">
<<<<<<< HEAD
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </a> --><?php endforeach; endif; ?>    
                            </div>

                            <div id="con_one_3" style="display:none;">
=======
                                                    <img src="/-/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                <!-- </a> --><?php endforeach; endif; ?>    
                        </div>

                        <div class="tabs_item hezi3">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                            <?php if(is_array($order_s)): foreach($order_s as $key=>$ress): ?><!-- <a href="dingdanxiangqing.html"> -->
                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span><?php echo ($ress["shopname"]); ?></span>
                                            </div>

                                            <div class="qu">
                                                <span>取消订单</span>
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
<<<<<<< HEAD
                                                <img src="/kuaidian/Public<?php echo ($ress["logo"]); ?>" alt="">
=======
                                                <img src="/-/Public<?php echo ($ress["logo"]); ?>" alt="">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            </div>

                                            <div class="hao">
                                                <div class="top">
                                                    <span>订单号:</span>
                                                </div>

                                                <div class="center">
                                                    <span><?php echo ($ress["order_code"]); ?></span>
                                                </div>

                                                <div class="xia">
                                                    <div class="xiaz">
                                                        <span>订单金额:</span>
                                                    </div>

                                                    <div class="xiay">
                                                        <span>￥<?php echo ($ress["total_price"]); ?></span>
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD

=======
                                            <a href="<?php echo U('Home/Order/order_xq', array('order_id' => $res['id']));?>" style="text-decoration:none">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            <div class="dai">
                                                <div class="yong">
                                                <?php if($ress["order_status"] == 1 ): ?><span>未支付</span>
                                                <?php elseif($ress["order_status"] == 5 ): ?>
                                                    <span>已支付</span>    
                                                <?php else: ?>
                                                    <span></span><?php endif; ?>
                                                    
                                                </div>

                                                <div class="jian">
<<<<<<< HEAD
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </a> --><?php endforeach; endif; ?>  
                            </div>
                            <div id="con_one_4" style="display:none;">
                            <?php if(is_array($order_u)): foreach($order_u as $key=>$resu): ?><!-- <a href="dingdanxiangqing.html"> -->
=======
                                                    <img src="/-/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                <!-- </a> --><?php endforeach; endif; ?>  
                        </div>

                        <div class="tabs_item hezi3">
                           <?php if(is_array($order_u)): foreach($order_u as $key=>$resu): ?><!-- <a href="dingdanxiangqing.html"> -->
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span><?php echo ($resu["shopname"]); ?></span>
                                            </div>

                                            <div class="qu">
                                            <?php if($resu["order_status"] == 10 ): ?><span>去评价</span>
                                            <?php else: ?>
                                                <span></span><?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
<<<<<<< HEAD
                                                <img src="/kuaidian/Public<?php echo ($resu["logo"]); ?>" alt="">
=======
                                                <img src="/-/Public<?php echo ($resu["logo"]); ?>" alt="">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            </div>

                                            <div class="hao">
                                                <div class="top">
                                                    <span>订单号:</span>
                                                </div>

                                                <div class="center">
                                                    <span><?php echo ($resu["order_code"]); ?></span>
                                                </div>

                                                <div class="xia">
                                                    <div class="xiaz">
                                                        <span>订单金额:</span>
                                                    </div>

                                                    <div class="xiay">
                                                        <span>￥<?php echo ($resu["total_price"]); ?></span>
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD

=======
                                            <a href="<?php echo U('Home/Order/order_xq', array('order_id' => $res['id']));?>" style="text-decoration:none">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            <div class="dai">
                                                <div class="yong">
                                                <?php if($resu["order_status"] == 10 ): ?><span>待评价</span>
                                                <?php elseif($resu["order_status"] == 15 ): ?>
                                                    <span>已完成</span>
                                                <?php elseif($resu["order_status"] == 20 ): ?>
                                                    <span>已取消</span>
                                                <?php else: ?>
                                                    <span></span><?php endif; ?>
                                                    
                                                </div>

                                                <div class="jian">
<<<<<<< HEAD
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </a> --><?php endforeach; endif; ?> 
                            </div>
                            <div id="con_one_5" style="display:none;">
=======
                                                    <img src="/-/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                <!-- </a> --><?php endforeach; endif; ?> 
                        </div>

                        <div class="tabs_item hezi3">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                            <?php if(is_array($order_p)): foreach($order_p as $key=>$resp): ?><!-- <a href="dingdanxiangqing.html"> -->
                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span><?php echo ($resp["shopname"]); ?></span>
                                            </div>

                                            <div class="qu">
                                                <span>去评价</span>
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
<<<<<<< HEAD
                                                <img src="/kuaidian/Public<?php echo ($resp["logo"]); ?>" alt="">
=======
                                                <img src="/-/Public<?php echo ($resp["logo"]); ?>" alt="">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            </div>

                                            <div class="hao">
                                                <div class="top">
                                                    <span>订单号:</span>
                                                </div>

                                                <div class="center">
                                                    <span><?php echo ($resp["order_code"]); ?></span>
                                                </div>

                                                <div class="xia">
                                                    <div class="xiaz">
                                                        <span>订单金额:</span>
                                                    </div>

                                                    <div class="xiay">
                                                        <span>￥<?php echo ($resp["total_price"]); ?></span>
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD

=======
                                            <a href="<?php echo U('Home/Order/order_xq', array('order_id' => $res['id']));?>" style="text-decoration:none">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            <div class="dai">
                                                <div class="yong">
                                                    <?php if($resp["is_use"] == 1 ): ?><span>已使用</span>
                                                    <?php else: ?>
                                                    <span>未使用</span><?php endif; ?>
                                                    
                                                </div>

                                                <div class="jian">
<<<<<<< HEAD
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </a> --><?php endforeach; endif; ?> 
                            </div>
                            <div id="con_one_6" style="display:none;">
=======
                                                    <img src="/-/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                <!-- </a> --><?php endforeach; endif; ?> 
                        </div>

                        <div class="tabs_item hezi3">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                            <?php if(is_array($order_x)): foreach($order_x as $key=>$resx): ?><!-- <a href="dingdanxiangqing.html"> -->
                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span><?php echo ($resx["shopname"]); ?></span>
                                            </div>

                                            <div class="qu">
                                                <span></span>
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
<<<<<<< HEAD
                                                <img src="/kuaidian/Public<?php echo ($resx["logo"]); ?>" alt="">
=======
                                                <img src="/-/Public<?php echo ($resx["logo"]); ?>" alt="">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            </div>

                                            <div class="hao">
                                                <div class="top">
                                                    <span>订单号:</span>
                                                </div>

                                                <div class="center">
                                                    <span><?php echo ($resx["order_code"]); ?></span>
                                                </div>

                                                <div class="xia">
                                                    <div class="xiaz">
                                                        <span>订单金额:</span>
                                                    </div>

                                                    <div class="xiay">
                                                        <span>￥<?php echo ($resx["total_price"]); ?></span>
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD

=======
                                            <a href="<?php echo U('Home/Order/order_xq', array('order_id' => $res['id']));?>" style="text-decoration:none">
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
                                            <div class="dai">
                                                <div class="yong">
                                                    <span>已取消</span>
                                                
                                                    <!-- <?php if($resx["is_use"] == 1 ): ?>-->
                                                    <!-- <else> -->
                                                    <!-- <span>未使用</span> -->
                                                    <!--<?php endif; ?> -->
                                                    
                                                </div>

                                                <div class="jian">
<<<<<<< HEAD
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </a> --><?php endforeach; endif; ?>
                            </div>
                        </div>
                </div>

                <!-- <script src="/kuaidian/Public/home/js/jquery-1.12.4.js"></script> -->

                <!-- <script src="/kuaidian/Public/home/js/jquery-1.12.4.min.js"></script> -->
                <!-- <script src="/kuaidian/Public/home/js/tab.js"></script> -->
                <script>
                    function setTab(name,cursel){
                        cursel_0=cursel;
                        for(var i=1; i<=links_len; i++){
                            var menu = document.getElementById(name+i);
                            var menudiv = document.getElementById("con_"+name+"_"+i);
                            if(i==cursel){
                                menu.className="off";
                                menudiv.style.display="block";
                            }
                            else{
                                menu.className="";
                                menudiv.style.display="none";
                            }
                        }
                    }
                    function Next(){
                        cursel_0++;
                        if (cursel_0>links_len)cursel_0=1
                        setTab(name_0,cursel_0);
                    }
                    var name_0='one';
                    var cursel_0=1;
                    var links_len,iIntervalId;
                    onload=function(){
                        var links = document.getElementById("tab1").getElementsByTagName('li')
                        links_len=links.length;
                        for(var i=0; i<links_len; i++){
                            links[i].onmouseover=function(){
                                clearInterval(iIntervalId);
                            }
                        }
                        document.getElementById("con_"+name_0+"_"+links_len).parentNode.onmouseover=function(){
                            this.onmouseout=function(){
                                iIntervalId = setInterval(Next,ScrollTime);;
                            }
                        }
                    }
                </script>


            </li>

            <li class="item">
                啦啦啦啦啦啦阿拉啦啦爱啦啦爱啦啦
=======
                                                    <img src="/-/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                <!-- </a> --><?php endforeach; endif; ?>
                        </div>
                    </div>

                </div>
                <script src='/-/Public/home/js/jquery.js'></script>
                <script>
                    $(document).ready(function() {

                        (function ($) {
                            $('.tab ul.tabs2').addClass('active').find('> li:eq(0)').addClass('current');

                            $('.tab ul.tabs2 li a').click(function (g) {
                                var tab = $(this).closest('.tab'),
                                        index = $(this).closest('li').index();

                                tab.find('ul.tabs2 > li').removeClass('current');
                                $(this).closest('li').addClass('current');

                                tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
                                tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();

                                g.preventDefault();
                            } );
                        })(jQuery);

                    });
                </script>
            </li>

            <li class="item">
                Cont2
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
            </li>
        </ul>
    </div>
</div>


<<<<<<< HEAD
=======
<script src="/-/Public/home/js/jquery-1.12.4.min.js"></script>
<script src="/-/Public/home/js/tab.js"></script>
>>>>>>> e952ca8486b6fba99506e802a7bb248db5449a41
<script>
    $(function () {

        /**
         =========== 参数说明 ============
         curDisplay: 当前显示哪张
         mouse: 鼠标事件 (click/over)
         changeMethod: 切换方式 (default/vertical/horizontal/opacity)
         autoPlay: 自动播放 (true/false)
         */

        // 多个元素同一个变化方式
        /*$('.tab').each(function () {
         $(this).tab({
         curDisplay: 5,
         mouse: 'over',
         changeMethod: 'vertical'
         });
         });*/

        // 多个元素不同变化方式（需要在HTML中加入js-tab）
        $('[js-tab=1]').tab();

        $('[js-tab=2]').tab({
            curDisplay: 2,
            changeMethod: 'horizontal'
        });

    });
</script>

</body>
</html>