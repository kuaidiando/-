<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>商家</title>
    <link rel="icon" href="/-/Public/home/img/logo1.png">
    <link rel="stylesheet" href="/-/Public/home/css/base.css">
    <link rel="stylesheet" href="/-/Public/home/css/text.css">
    <link rel="stylesheet" href="/-/Public/home/css/detail.css">
</head>
<body style="font-size: 12px">
    <form action="<?php echo U('Home/Cart/save_cart');?>" id="dateshangjia" style="display: none;" method="post">
        <input type="text" name="shopid" value="123">
    </form>
    <!--商家-->
    <div class="he">
            <div class="shangjia">
                <div class="top">
                    <div class="shang">
                        <img src="/-/Public/home/img/person.jpg" alt="">
                    </div>
                    <div class="you">
                        <div class="name">
                            <span>山西肉夹馍
                            <!-- 商家id -->
                            <span id="shopid" style="display: none;"><?php echo ($resspdan["0"]["id"]); ?></span>
                            </span>
                            <img src="/-/Public/home/img/baixin.png" alt="">
                        </div>
                        <div class="evaluate">
                            <img src="/-/Public/home/img/start.png" alt="">
                        </div>
                        <div class="tui">
                            <img src="/-/Public/home/img/tui.png" alt="">
                            <span class="gai">该商家已开通"微众代言",代言可获得</span>
                            <span class="red">5.0%</span>
                        </div>
                    </div>
                </div>

                <div class="bottom">
                    <img src="/-/Public/home/img/yin.png" alt="">
                    <span>欢迎光临,用餐高峰期请提前下单,谢谢</span>
                    <a href="../predetermine.html"><input type="button" value="订座/请客"></a>
                </div>
            </div>
        </div>


    <!--Tab栏-->
    <div class="tab" js-tab="1">
            <div class="tab-title">
                <a href="javascript:;" class="item item-cur">点餐</a>
                <a href="javascript:;" class="item">商家</a>
                <a href="javascript:;" class="item">评价</a>
            </div>
            <div class="tab-cont">
                <ul class="tab-cont__wrap">
                    <li class="item">
                        <div class="main">
                            <div class="left-menu">
                                <!-- 菜品列表 -->
                                <ul>
                                    <?php if(is_array($resft)): foreach($resft as $key=>$voresft): ?><!-- 判断是否是第一个 -->
                                        <?php if($voresft["typefd"] == 1): ?><li class="active"><?php echo ($voresft["mingch"]); ?><span class="num-price"></span></li>
                                        <?php else: ?>
                                            <li><?php echo ($voresft["mingch"]); ?></li><?php endif; endforeach; endif; ?>
                                </ul>
                            </div>
                            <!-- 菜品详情 -->
                            <!-- 遍历新数组菜品类别 -->
                            <?php if(is_array($zuizhongfood)): foreach($zuizhongfood as $key=>$vozuizhongfood): ?><div class="con">
                                    <div class="right-con con-active" >
                                        <div class="tit">
                                            <span><?php echo ($vozuizhongfood["zhushi"]); ?></span>
                                        </div>
                                        <!-- 遍历菜品详情 -->
                                        <?php if(is_array($vozuizhongfood['foodxq'])): foreach($vozuizhongfood['foodxq'] as $key=>$vofoodxq): ?><ul>
                                            <li>
                                            <div class="menu-txt">
                                            <!-- 隐藏菜品id 菜品类型  -->
                                                    <span style="display: none;" class="caipinleix"><?php echo ($vozuizhongfood["id"]); ?></span>
                                                    <span style="display: none;" class="caipinid"><?php echo ($vofoodxq["id"]); ?></span>
                                                <div class="tu">
                                                    <img src="/-/Public<?php echo ($vofoodxq["logo"]); ?>" alt="">
                                                </div>
                                                <div class="youbian">
                                                    <div class="biao">
                                                        <span><?php echo ($vofoodxq["cpmingch"]); ?></span>
                                                    </div>
                                                    <div class="center">
                                                        <span>口味:<?php echo ($vofoodxq["kouwei"]); ?></span>
                                                    </div>
                                                    <div class="fuhao">
                                                        <span>￥</span>
                                                    </div>
                                                    <div class="qqian">
                                                        <span><?php echo ($vofoodxq["shoujia"]); ?></span>
                                                    </div>
                                                    <div class="danwei">
                                                        <span>/份</span>
                                                    </div>
                                                    <div class="yuanjia">
                                                        <del>￥<?php echo ($vofoodxq["yuanjia"]); ?></del>
                                                    </div>
                                                </div>
                                                <div class="btn">
                                                    
                                                    <!-- 判断是否有数量 -->
                                                    <?php if($vofoodxq["foodnum"] == null): ?><button class="minus" >
                                                        <strong>
                                                            <img src="/-/Public/home/img/jianhao.png" alt="">
                                                        </strong>
                                                        </button>
                                                        <i  class="caipinfenshu">0</i>
                                                        <button class="add">
                                                        <strong>
                                                            <img src="/-/Public/home/img/jiahao.png" alt="">
                                                        </strong>
                                                        </button><i class="price"><?php echo ($vofoodxq["shoujia"]); ?></i>
                                                    <?php else: ?>
                                                         <button class="minus" style="display: inline-block;">
                                                        <strong>
                                                            <img src="/-/Public/home/img/jianhao.png" alt="">
                                                        </strong>
                                                        </button>
                                                        <i style="display: inline-block;" class="caipinfenshu"><?php echo ($vofoodxq["foodnum"]); ?></i>
                                                        <button class="add">
                                                        <strong>
                                                            <img src="/-/Public/home/img/jiahao.png" alt="">
                                                        </strong>
                                                        </button><i class="price"><?php echo ($vofoodxq["shoujia"]); ?></i><?php endif; ?>
                                                </div>
                                            </div>
                                            </li>
                                        </ul><?php endforeach; endif; ?>
                                    </div>
                                </div><?php endforeach; endif; ?>
                            <!-- 判断总份数是否存在 -->
                            <?php if($zfsjg['zfshu'] == 0): ?><div class="footer">
                                    <div class="gou">
                                        <img src="/-/Public/home/img/gouwuche.png" alt="">
                                    </div>

                                    <div class="left">
    		                        <span id="cartN">
                                        <span id="totalcountshow">0</span>份　总计：￥
                                        <span id="totalpriceshow">0</span>
                                    </span>元
                                    </div>

                                    <div class="right">
                                        <a id="btnselect" class="xhlbtn  disable" href="javascript:void(0)">下一步</a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="footer">
                                    <div class="gou">
                                        <img src="/-/Public/home/img/gouwuche.png" alt="">
                                    </div>

                                    <div class="left">
                                    <span id="cartN">
                                        <span id="totalcountshow"><?php echo ($zfsjg['zfshu']); ?></span>份　总计：￥
                                        <span id="totalpriceshow"><?php echo ($zfsjg['zjiage']); ?></span>
                                    </span>元
                                    </div>

                                    <div class="right">
                                        <a id="btnselect" class="xhlbtn" href="javascript:void(0)">下一步</a>
                                    </div>
                                </div><?php endif; ?>


                            <script type="text/javascript" src="/-/Public/home/js/jquery.min.js"></script>
                            <script type="text/javascript">
                                $(function () {
                                    //加的效果
                                   
                                    // yxy 优化
                                    $(document).on("click",".add",function(){
                                        $(this).prevAll().css("display", "inline-block");
                                        var n = $(this).prev().text();
                                        var num = parseInt(n) + 1;
                                        if (num == 0) { return; }
                                        $(this).prev().text(num);
                                        var danjia = $(this).next().text();//获取单价
                                        var a = $("#totalpriceshow").html();//获取当前所选总价
                                        $("#totalpriceshow").html((a * 1 + danjia * 1).toFixed(2));//计算当前所选总价

                                        var nm = $("#totalcountshow").html();//获取数量
                                        $("#totalcountshow").html(nm*1+1);
                                        jss();//<span style='font-family: Arial, Helvetica, sans-serif;'></span>   改变按钮样式
                                        /**
                                         *  yxy改变数据库-增加
                                         */
                                        // 获取门店id -shopid
                                        var shopid = $("#shopid").html();
                                        // 获取菜品类型id
                                        var foodtypeid = $(this).parent().parent().find('.caipinleix').html();
                                        // 获取菜品id
                                        var caipinid = $(this).parent().parent().find('.caipinid').html();
                                        // 获取菜品份数
                                        var caipinfenshu = $(this).parent().find(".caipinfenshu").html();
                                        //ajax更改数据库
                                        $.ajax({
                                            type:'POST',
                                            dataType: 'json',
                                            url:'<?php echo U("Home/Index/ajaxaddlinshijj");?>',
                                            data:{"shopid":shopid,"foodtypeid":foodtypeid,"caipinid":caipinid,"caipinfenshu":caipinfenshu},
                                            success: function (result) {
                                                if (result == 2) {
                                                    alert("操作失败");
                                                }
                                            }
                                        })
                                    });
                                    //减的效果 yxy 优化
                                    $(document).on("click",".minus",function(){
                                        var n = $(this).next().text();
                                        var num = parseInt(n) - 1;

                                        $(this).next().text(num);//减1

                                        var danjia = $(this).nextAll(".price").text();//获取单价
                                        var a = $("#totalpriceshow").html();//获取当前所选总价
                                        $("#totalpriceshow").html((a * 1 - danjia * 1).toFixed(2));//计算当前所选总价

                                        var nm = $("#totalcountshow").html();//获取数量
                                        $("#totalcountshow").html(nm * 1 - 1);
                                        //如果数量小于或等于0则隐藏减号和数量
                                        if (num <= 0) {
                                            $(this).next().css("display", "none");
                                            $(this).css("display", "none");
                                            jss();//改变按钮样式
                                            // return
                                        }
                                        /**
                                         *  yxy改变数据库-减号
                                         */
                                        // 获取门店id -shopid
                                        var shopid = $("#shopid").html();
                                        // 获取菜品类型id
                                        var foodtypeid = $(this).parent().parent().find('.caipinleix').html();
                                        // 获取菜品id
                                        var caipinid = $(this).parent().parent().find('.caipinid').html();
                                        // 获取菜品份数
                                        var caipinfenshu = $(this).parent().find(".caipinfenshu").html();
                                        // alert(caipinfenshu);
                                        //ajax更改数据库
                                        $.ajax({
                                            type:'POST',
                                            dataType: 'json',
                                            url:'<?php echo U("Home/Index/ajaxdellinshijj");?>',
                                            data:{"shopid":shopid,"foodtypeid":foodtypeid,"caipinid":caipinid,"caipinfenshu":caipinfenshu},
                                            success: function (result) {
                                                // alert(result);
                                                if (result == 2) {
                                                    alert("操作失败");
                                                }
                                            }
                                        })
                                    });
                                    // 下一步
                                    $(document).on("click","#btnselect",function(){
                                        //提交表单
                                        $("#dateshangjia").submit();
                                    });
                                    function jss() {
                                        var m = $("#totalcountshow").html();
                                        if (m > 0) {
                                            $(".right").find("a").removeClass("disable");
                                        } else {
                                            $(".right").find("a").addClass("disable");
                                        }
                                    };
                                    //选项卡
                                    $(".con>div").hide();
                                    $(".con>div:eq(0)").show();

                                    $(".left-menu li").click(function(){
                                        $(this).addClass("active").siblings().removeClass("active");
                                        var n = $(".left-menu li").index(this);
                                        $(".left-menu li").index(this);
                                        $(".con>div").hide();
                                        $(".con>div:eq("+n+")").show();
                                    });
                                });
                            </script>
                    </li>

                    <li class="item">
                        <div class="address">
                            <div class="dizhi">
                                <div class="tt">
                                    <img src="/-/Public/home/img/dizhi.png" alt="">
                                </div>

                                <div class="zz">
                                    <span>石家庄市裕华区体育大街与槐安路交叉口东行两站地路北</span>
                                </div>
                            </div>

                            <div class="phone">
                                <div class="iphone">
                                    <img src="/-/Public/home/img/phone.png" alt="">
                                </div>
                            </div>
                        </div>

                        <!--微众代言-->
                        <div class="hezi2">
                            <div class="you6">
                                <img src="/-/Public/home/img/tui2.png" alt="">
                            </div>

                            <div class="zhongjian">
                                <div class="daiyan2">
                                    <span>微众代言</span>
                                </div>

                                <div class="wenzi">
                                    <span>老陕北抿节&nbsp;邀您推广赚佣金</span>
                                </div>
                            </div>

                            <div class="you8">
                                <div class="shou">
                                    <span>收入比例</span>
                                </div>
                                <div class="red2">
                                    <span>5.0%</span>
                                </div>
                            </div>

                            <div class="tu3">
                                <img src="/-/Public/home/img/youjiantou.png" alt="">
                            </div>
                        </div>

                        <!--优惠-->
                        <div class="youhui">
                            <div class="quan">
                                <div class="quan3">
                                    <img src="/-/Public/home/img/quan2.png" alt="">
                                </div>
                                <span>优惠券</span>
                            </div>

                            <div class="xia2">
                                <div class="q1">
                                    <img src="/-/Public/home/img/person.jpg" alt="">
                                </div>

                                <div class="youhe">
                                    <div class="jin">
                                        <span>仅需52元的单人自助餐/单人自</span>
                                    </div>

                                    <div class="qian">
                                        <div class="qian1">
                                            <span>￥52.0</span>
                                        </div>

                                        <div class="qian2">
                                            <del>
                                                ￥98.0
                                            </del>
                                        </div>

                                        <div class="yi">
                                            <span>已使用2678</span>
                                        </div>
                                    </div>

                                    <div class="dixia">
                                        <span>(无需在线支付,出示即可使用)</span>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!--信息-->
                        <div class="xin">
                            <div class="he1">
                                <span>商家信息</span>
                            </div>

                            <div class="he2">
                                <span>营业时间：09:00-22:00</span>
                            </div>

                            <div class="he3">
                                <span>实时状态：在线</span>
                            </div>

                            <div class="he4">
                                <div class="tt1">
                                    <img src="/-/Public/home/img/tan.png" alt="">
                                </div>

                                <div class="zz1">
                                    <span>商家未在线时无法接受下单,请联系商家</span>
                                </div>
                            </div>
                        </div>

                        <!--底部-->
                        <div class="dibu">
                            <div class="dian">
                                <div class="ww">
                                    <a href="#">
                                        <img src="/-/Public/home/img/dian.png" alt="">
                                    </a>
                                </div>

                                <div class="zai">
                                    <a href="#">
                                        <span>在线点才下单,立减活动,最高立减50%</span>
                                    </a>
                                </div>
                            </div>

                            <div class="ding">
                                <div class="aa">
                                    <a href="#">
                                        <img src="/-/Public/home/img/ding.png" alt="">
                                    </a>
                                </div>

                                <div class="zhi">
                                    <a href="#">
                                        <span>支持在线预订座位</span>
                                    </a>
                                </div>
                            </div>

                            <div class="fu">
                                <div class="vv">
                                    <a href="#">
                                        <img src="/-/Public/home/img/fu.png" alt="">
                                    </a>
                                </div>

                                <div class="gai2">
                                    <a href="#">
                                        <span>该商家支持在线支付,微信支付等</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="item">
                        点评
                    </li>
                </ul>
            </div>
        </div>

    <script src="/-/Public/home/js/jquery.js"></script>
    <script src="/-/Public/home/js/tab.js"></script>
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