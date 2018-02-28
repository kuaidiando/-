<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>我的订单</title>
    <link rel="stylesheet" href="/kuaidian/Public/home/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/my%20dingdan.css">
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
                        <li><a href="#">退款单</a></li>
                    </ul>
                    <!-- / tabs -->
                    <div class="tab_content">
                        <div class="tabs_item">
                            <?php if(is_array($order_res)): foreach($order_res as $key=>$res): ?><!-- <a href="dingdanxiangqing.html"> -->
                            <?php if($res["order_status"] == 1): ?><a href="<?php echo U('Home/Order/pay_again', array('order_id' => $res['id']));?>" style="text-decoration:none">
                            <?php else: ?>
                                <a href="<?php echo U('Home/Order/dingdanxiangqing', array('order_id' => $res['id']));?>" style="text-decoration:none"><?php endif; ?>

                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span><?php echo ($res["shopname"]); ?></span>
                                            </div>

                                            <div class="qu">
                                           <!--  <?php if($res["order_status"] == 1 || $res["order_status"] == 5): ?><span>取消订单</span>
                                            <?php elseif($res["order_status"] == 10): ?>    
                                                <span>去使用</span>
                                            <?php elseif($res["order_status"] == 15): ?>
                                                <span>去评价</span>
                                            <?php else: ?>
                                                <span></span><?php endif; ?>      -->
                                            <span></span>
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
                                                <img src="/kuaidian/Public<?php echo ($res["logo"]); ?>" alt="">
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

                                            <div class="dai">
                                                <div class="yong">
                                                <?php if($res["order_status"] == 1 ): ?><span>待支付</span>
                                                <?php elseif($res["order_status"] == 5): ?>
                                                    <span>待使用</span>
                                                    <?php elseif($res["order_status"] == 10): ?>
                                                    <span>待评价</span>
                                                    <?php elseif($res["order_status"] == 15): ?>
                                                    <span>已完成</span>
                                                    <?php elseif($res["order_status"] == 20): ?>
                                                    <span>退款单</span>
                                                    <?php else: ?>
                                                    <span>未知</span><?php endif; ?>
                                                </div>

                                                <div class="jian">
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                                                </div>

                                            </div>
                                            <!-- </a>     -->

                                        </div>
                                    </div>
                                </a><?php endforeach; endif; ?> 
                        </div>   

                        <div class="tabs_item hezi3">
                            <?php if(is_array($order_n)): foreach($order_n as $key=>$resn): ?><!-- <a href="dingdanxiangqing.html"> -->
                                <a href="<?php echo U('Home/Order/pay_again', array('order_id' => $res['id']));?>" style="text-decoration:none">
                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span><?php echo ($resn["shopname"]); ?></span>
                                            </div>

                                            <div class="qu">
                                                <!-- <span>取消订单</span> -->
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
                                                <img src="/kuaidian/Public<?php echo ($resn["logo"]); ?>" alt="">
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

                                            <div class="dai">
                                                <div class="yong">
                                                    <span>待支付</span>
                                                    
                                                </div>

                                                <div class="jian">
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </a><?php endforeach; endif; ?>    
                        </div>

                        <div class="tabs_item hezi3">
                            <?php if(is_array($order_s)): foreach($order_s as $key=>$ress): ?><a href="<?php echo U('Home/Order/dingdanxiangqing', array('order_id' => $ress['id']));?>" style="text-decoration:none">
                                <!-- <a href="dingdanxiangqing.html"> -->
                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span><?php echo ($ress["shopname"]); ?></span>
                                            </div>

                                            <div class="qu">
                                                <!-- <span>取消订单</span> -->
                                                <span></span>
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
                                                <img src="/kuaidian/Public<?php echo ($ress["logo"]); ?>" alt="">
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

                                            <div class="dai">
                                                <div class="yong">
                                                <span>待使用</span>
                                                <!-- <?php if($ress["order_status"] == 1 ): ?><span>未支付</span>
                                                <?php elseif($ress["order_status"] == 5 ): ?>
                                                    <span>已支付</span>   
                                                <?php elseif($ress["order_status"] == 10 ): ?>
                                                    <span>已支付</span>
                                                <?php elseif($ress["order_status"] == 15 ): ?>
                                                    <span>已支付</span>
                                                <?php elseif($ress["order_status"] == 20 ): ?>
                                                    <span>已取消</span>
                                                <?php else: ?>
                                                    <span></span><?php endif; ?> -->
                                                    
                                                </div>

                                                <div class="jian">
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                </a><?php endforeach; endif; ?>  
                        </div>

                        <div class="tabs_item hezi3">
                           <?php if(is_array($order_u)): foreach($order_u as $key=>$resu): ?><a href="<?php echo U('Home/Order/dingdanxiangqing', array('order_id' => $resu['id']));?>" style="text-decoration:none">
                                <!-- <a href="dingdanxiangqing.html"> -->
                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span><?php echo ($resu["shopname"]); ?></span>
                                            </div>

                                            <div class="qu">
                                            <?php if($resu["order_status"] == 10 ): ?><span></span>
                                            <?php else: ?>
                                                <span></span><?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
                                                <img src="/kuaidian/Public<?php echo ($resu["logo"]); ?>" alt="">
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

                                            <div class="dai">
                                                <div class="yong">
                                              <!--   <?php if($resu["order_status"] == 10 ): ?><span>待评价</span>
                                                <?php elseif($resu["order_status"] == 15 ): ?>
                                                    <span>已完成</span>
                                                <?php elseif($resu["order_status"] == 20 ): ?>
                                                    <span>已取消</span>
                                                <?php else: ?>
                                                    <span></span><?php endif; ?> -->
                                                    <span>已使用</span>
                                                </div>

                                                <div class="jian">
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                </a><?php endforeach; endif; ?> 
                        </div>

                        <div class="tabs_item hezi3">
                            <?php if(is_array($order_p)): foreach($order_p as $key=>$resp): ?><a href="<?php echo U('Home/Order/dingdanxiangqing', array('order_id' => $resp['id']));?>" style="text-decoration:none">
                                <!-- <a href="dingdanxiangqing.html"> -->
                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span><?php echo ($resp["shopname"]); ?></span>
                                            </div>

                                            <div class="qu">
                                                <!-- <span>去评价</span> -->
                                                <span></span>
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
                                                <img src="/kuaidian/Public<?php echo ($resp["logo"]); ?>" alt="">
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

                                            <div class="dai">
                                                <div class="yong">
                                                <!--     <?php if($resp["is_use"] == 1 ): ?><span>已使用</span>
                                                    <?php else: ?>
                                                    <span>未使用</span><?php endif; ?> -->
                                                    <span>待评价</span>
                                                    
                                                </div>

                                                <div class="jian">
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                </a><?php endforeach; endif; ?> 
                        </div>

                        <div class="tabs_item hezi3">
                            <?php if(is_array($order_x)): foreach($order_x as $key=>$resx): ?><a href="<?php echo U('Home/Order/dingdanxiangqing', array('order_id' => $resx['id']));?>" style="text-decoration:none">
                                <!-- <a href="dingdanxiangqing.html"> -->
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
                                                <img src="/kuaidian/Public<?php echo ($resx["logo"]); ?>" alt="">
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

                                            <div class="dai">
                                                <div class="yong">
                                                    <span>退款单</span>
                                                
                                                    <!-- <?php if($resx["is_use"] == 1 ): ?>-->
                                                    <!-- <else> -->
                                                    <!-- <span>未使用</span> -->
                                                    <!--<?php endif; ?> -->
                                                    
                                                </div>

                                                <div class="jian">
                                                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                </a><?php endforeach; endif; ?>
                        </div>
                    </div>

                </div>
                <script src='/kuaidian/Public/home/js/jquery.js'></script>
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
            </li>
        </ul>
    </div>
</div>


<script src="/kuaidian/Public/home/js/jquery-1.12.4.min.js"></script>
<script src="/kuaidian/Public/home/js/tab.js"></script>
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
<div class="foott">
    <a href="<?php echo U('Home/Index/index');?>">

    <div id="foot">
        <div id="ttu">
            <img src="/kuaidian/Public/home/img/shangjia.png" alt="">
        </div>

        <div id="shou">
            <span>首页</span>
        </div>
    </div>
    </a>
    <div id="foot2" >
    <a href="<?php echo U('Home/Order/order_info');?> ">

        <div id="ttu2">
            <img src="/kuaidian/Public/home/img/dingdan2.png" alt="">
        </div>

        <div id="shou2">
            <span>订单</span>
        </div>
    </div>
    </a>
    <div id="foot3" >
    <a href="<?php echo U('Home/Person/index');?>">

        <div id="ttu3">
            <img src="/kuaidian/Public/home/img/geren.png" alt="">
        </div>

        <div id="shou3">
            <span>我的</span>
        </div>
    </a>
    </div>
</div>
</body>
</html>