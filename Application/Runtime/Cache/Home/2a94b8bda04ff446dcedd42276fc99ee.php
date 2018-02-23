<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>快点—智慧餐厅</title>
    <link rel="icon" href="/kuaidian/Public/home/img/logo1.png">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/index.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/base-index.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/base2.css">
    <script src="/kuaidian/Public/home/js/flexible.js"></script>
    <script src="/kuaidian/Public/home/js/jquery-1.12.4.js"></script>
    <script>
        $(function(){
            $(window).scroll(function() {
                if($(window).scrollTop()>470){
                    $(".nav").addClass("fixedNav");
                }else{
                    $(".nav").removeClass("fixedNav");
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

    </style>
</head>
<div style="font-size: 12px">
    <!--头部-->
    <header>
        <div class="head">
            <div class="city">
                <div class="cs">
                    <span>
                        石家庄
                    </span>
                </div>
                
                <div class="xl">
                    <img src="/kuaidian/Public/home/img/jiantou2.png" alt="">
                </div>
            </div>


            <div class="lookup">
                <div class="look">
                    <div class="sou">
                        <img src="/kuaidian/Public/home/img/loogup.png" alt="">
                    </div>

                    <div class="tet">
                        <input type="text" placeholder="搜索商品或商家">
                    </div>
                </div>
            </div>


            <div class="person">
                <div class="tx">
                    <img src="/kuaidian/Public/<?php echo ($user_photo); ?>" alt="">
                </div>
            </div>
        </div>
    </header>

    <!--轮播图-->
    <div class="banner">
        <iframe name="toppage" width=100% height=100% marginwidth=0 marginheight=0 frameborder="no" border="0" src="<?php echo U('Home/Index/banner');?>" ></iframe>
    </div>


    <!--中间分类-->
    <section class="nav">
        <dl class="retrie">
            <dt>
                <a id="area" href="javascript:;">全部</a>
                <a id="wage" href="javascript:;">附近</a>
                <a id="zhi" href="javascript:;">智能</a>
            </dt>
            <dd class="area">
                <ul class="slide downlist">
                    <?php if(is_array($resmdlx)): foreach($resmdlx as $key=>$vomdlx): ?><li><a href="#"><?php echo ($vomdlx["mingch"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
            </dd>
            <dd class="wage">
                <ul class="slide downlist">
                    <li><a href="#">600m</a></li>
                    <li><a href="#">700m</a></li>
                    <li><a href="#">800m</a></li>
                    <li><a href="#">900m</a></li>
                    <li><a href="#">1000m</a></li>
                    <li><a href="#">1100m</a></li>
                    <li><a href="#">1200m</a></li>
                    <li><a href="#">1300m</a></li>
                    <li><a href="#">1400m</a></li>
                    <li><a href="#">1500m</a></li>
                    <li><a href="#">1600m</a></li>
                    <li><a href="#">6666m</a></li>
                </ul>
            </dd>
            <dd class="zhi">
                <ul class="slide downlist">
                    <li><a href="#">。。。</a></li>
                    <li><a href="#">。。。</a></li>
                    <li><a href="#">。。。</a></li>
                    <li><a href="#">。。。</a></li>
                    <li><a href="#">。。。</a></li>
                    <li><a href="#">。。。</a></li>
                    <li><a href="#">。。。</a></li>
                    <li><a href="#">。。。</a></li>
                    <li><a href="#">。。。</a></li>
                    <li><a href="#">。。。</a></li>
                    <li><a href="#">。。。</a></li>
                    <li><a href="#">。。。</a></li>
                </ul>
            </dd>
        </dl>
    </section>
    <script type="text/javascript" src="/kuaidian/Public/home/js/jquery.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.retrie dt a').click(function(){
                var $t=$(this);
                if($t.hasClass('up')){
                    $(".retrie dt a").removeClass('up');
                    $('.downlist').hide();
                    $('.mask').hide();
                }else{
                    $(".retrie dt a").removeClass('up');
                    $('.downlist').hide();
                    $t.addClass('up');
                    $('.downlist').eq($(".retrie dt a").index($(this)[0])).show();
                    $('.mask').show();
                }
            });
            $(".area ul li a:contains('"+$('#area').text()+"')").addClass('selected');
            $(".wage ul li a:contains('"+$('#wage').text()+"')").addClass('selected');
            $(".zhi ul li a:contains('"+$('#zhi').text()+"')").addClass('selected');
        });
    </script>



    <!--中间商品部分-->
    <?php if(is_array($res)): foreach($res as $k=>$vores): ?><a href="<?php echo U('Home/Index/detail',array('shopid'=>$vores[id]));?>">
        <div class="shangpin">
            <div class="hezi">
                <div class="hz">
                    <div class="top">
                        <div class="tu">
                            <img src="/kuaidian/Public/<?php echo ($vores["logo"]); ?>" alt="">
                        </div>

                        <div class="you">
                            <div class="top1">
                                <div class="name">
                                    <span><?php echo ($vores["mingch"]); ?></span>
                                </div>
                            </div>


                            <div class="center">
                                <div class="xing">
                                <!-- 实心星数量 -->
                                <?php $__FOR_START_1665168907__=0;$__FOR_END_1665168907__=$vores["shixinxing"];for($i=$__FOR_START_1665168907__;$i < $__FOR_END_1665168907__;$i+=1){ ?><img src="/kuaidian/Public/home/img/quanstart.png" style="width:13%;" alt=""><?php } ?>
                                <!-- 判断半个 星星 -->
                        <?php if($vores["bangexing"] == 1): ?><img src="/kuaidian/Public/home/img/ban.png" style="width:13%;" alt="">
                        <?php else: endif; ?>
                                <!-- 空心星数量 -->
                                <?php $__FOR_START_1288148395__=0;$__FOR_END_1288148395__=$vores["kongxinxing"];for($i=$__FOR_START_1288148395__;$i < $__FOR_END_1288148395__;$i+=1){ ?><img src="/kuaidian/Public/home/img/wu.png" style="width:13%;" alt=""><?php } ?>
                                    
                                </div>




                                <div class="juli">
                                    <span>666m</span>
                                </div>
                            </div>

                            <div class="ttop">
                                <div class="lei">
                                    <span><?php echo ($vores["lbname"]); ?></span>
                                </div>

                                <div class="fuhao">
                                    <span>￥</span>
                                </div>

                                <div class="qian">
                                    <span><?php echo ($vores["maney"]); ?></span>
                                </div>

                                <div class="wei">
                                    <span>/位</span>
                                </div>

                                <div class="quan">
                                    <img src="/kuaidian/Public/home/img/quan2.png" alt="">
                                </div>

                                <div class="dian">
                                    <img src="/kuaidian/Public/home/img/dian.png" alt="">
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="xia">

                    <div class="bot">
                        <div class="tui">
                            <img src="/kuaidian/Public/home/img/tuiguang.png" alt="">
                        </div>

                        <div class="jia">
                            <span>已发起微众代言</span>
                        </div>

                        <div class="red">
                            <span><?php echo ($vores["zuigaolij"]); ?></span>
                        </div>

                        <div class="bai">
                            <span>%</span>
                        </div>
                    </div>

                    <div class="xia2">
                        <div class="zzuo">
                            <img src="/kuaidian/Public/home/img/jinri.png" alt="">
                        </div>

                        <div class="yyou">
                            <div class="xuan">
                                <img src="/kuaidian/Public/home/img/dingzuo.png" alt="">
                            </div>

                            <div class="ke">
                                <span>今日可订座</span>
                            </div>

                            <div class="renshu">
                                <span><?php echo (zuoweishu($vores["id"])); ?></span>
                            </div>

                            <div class="zhuo">
                                <span>桌</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </a><?php endforeach; endif; ?>





    <!--底部-->
<div class="foott">
    <a href="<?php echo U('Home/Index/index');?>">
        <div id="foot">
            <div id="ttu">
                <img src="/kuaidian/Public/home/img/shangjia2.png" alt="">
            </div>

            <div id="shou">
                <span>首页</span>
            </div>
        </div>
    </a>


    <a href="<?php echo U('Home/Order/order_info');?> ">
        <div id="foot2">
            <div id="ttu2">
                <img src="/kuaidian/Public/home/img/diangdan.png" alt="">
            </div>

            <div id="shou2">
                <span>订单</span>
            </div>
        </div>
    </a>

    <a href="<?php echo U('Home/Person/index');?>">
        <div id="foot3" onclick="location.href='person.html'">
            <div id="ttu3">
               <img src="/kuaidian/Public/home/img/geren.png" alt="">
            </div>

            <div id="shou3">
                <span>我的</span>
            </div>
        </div>
    </a>
</div>
</body>
</html>