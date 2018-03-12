<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="user-scalable=no">
<title>商家</title>
<link rel="icon" href="/kuaidian/Public/home/img/logo1.png">
<link rel="stylesheet" href="/kuaidian/Public/home/css/base.css">
<link rel="stylesheet" href="/kuaidian/Public/home/css/text.css">
<link rel="stylesheet" href="/kuaidian/Public/home/css/detail.css">
</head>
<body style="font-size: 12px">
<form action="<?php echo U('Home/Cart/save_cart');?>" id="dateshangjia" style="display: none;" method="post">
    <input type="text" name="shopid" value="<?php echo ($resspdan["0"]["id"]); ?>">
    <input type="text" name="repast" id="repasttiaozhuan" value="">
</form>
<!--商家-->
<div class="he">
    <div class="shangjia">
        <div class="top">
            <div class="shang">
                <img src="/kuaidian/Public/<?php echo ($resspdan["0"]["logo"]); ?>" alt="">
            </div>
            <div class="you">
                <div class="name">
                    <span><?php echo ($resspdan["0"]["mingch"]); ?>
                    <!-- 商家id -->
                    <span id="shopid" style="display: none;"><?php echo ($resspdan["0"]["id"]); ?></span>
                    </span>
                    <img src="/kuaidian/Public/home/img/baixin.png" alt="" id="xin" onClick="change_pic()">
                </div>
                <div class="evaluate">
                    <!-- 遍历实心星星 -->
                    <?php if(is_array($xingxingshul)): foreach($xingxingshul as $key=>$voxingxingshul): ?><img src="/kuaidian/Public/home/img/quanstart.png" style="width:5%;" alt=""><?php endforeach; endif; ?>
                    <!-- 判断半个 星星 -->
                    <?php if($bangexing == 1): ?><img src="/kuaidian/Public/home/img/ban.png" style="width:5%;" alt="">
                    <?php else: endif; ?>
                    <!-- 遍历空心星星 -->
                    <?php if(is_array($kongxinshuliang)): foreach($kongxinshuliang as $key=>$vokongxinshuliang): ?><img src="/kuaidian/Public/home/img/wu.png" style="width:5%;" alt=""><?php endforeach; endif; ?>
                </div>
                <div class="tui">
                    <img src="/kuaidian/Public/home/img/tui.png" alt="">
                    <span class="gai">该商家已开通"微众代言",代言可获得</span>
                    <span class="red"><?php echo ($resspdan["0"]["zuigaolij"]); ?>%</span>
                </div>
            </div>
        </div>
        <div class="bottom">
            <img src="/kuaidian/Public/home/img/yin.png" alt="">
            <span>欢迎光临,用餐高峰期请提前下单,谢谢</span>
            <a href="../predetermine.html"><input type="button" value="订座/请客"></a>
        </div>
    </div>
</div>
<!--Tab栏-->
<div class="tab" js-tab="1">
    <div class="tab-title">
        <a href="javascript:;" class="item item-cur">点餐</a>
        <a href="javascript:;" class="item"><span id="wushopdianji">商家</span></a>
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
                    <div class="right-con con-active">
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
                                    <img src="/kuaidian/Public<?php echo ($vofoodxq["logo"]); ?>" alt="">
                                    <!-- 判断是否上架 -->
                                        <?php if($vofoodxq[zhuangt] == 1): else: ?>
                                            <img class="yis" src="/kuaidian/Public/home/img/yishou.png" alt=""><?php endif; ?>
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
                                        <span>
                                        <span class="caiprice"><?php echo ($vofoodxq["shoujia"]); ?></span>
                                        <span style="margin-left:2%;font-size: 50%;color: #888 ;font-weight:300;">/<?php echo (fooddwzhuanhuan($vofoodxq["dwid"])); ?></span>
                                                            &nbsp;&nbsp;
                                        </span>
                                    </div>
                                    <!--  <div class="danwei">
                                    <span>/份</span>
                                </div>
                                 -->
                                <div class="yuanjia">
                                    <?php if($vofoodxq[yuanjia] > 0): ?><del>￥<?php echo ($vofoodxq["yuanjia"]); ?></del>
                                    <?php else: ?>
                                        <!-- <del>￥<?php echo ($vofoodxq["yuanjia"]); ?></del> --><?php endif; ?>
                                </div>
                            </div>
                            <div class="btn">
                                <!-- 判断是否上架 -->
                                <?php if($vofoodxq[zhuangt] == 1): ?><!-- 判断是否有数量 -->
                                <?php if($vofoodxq["foodnum"] == null): ?><button class="minus">
                                        <strong>
                                        <img src="/kuaidian/Public/home/img/jianhao.png" alt="">
                                        </strong>
                                        </button>
                                        <i class="caipinfenshu">0</i>
                                        <button class="add">
                                        <strong>
                                        <img src="/kuaidian/Public/home/img/jiahao.png" alt="">
                                        </strong>
                                        </button><i class="price"><?php echo ($vofoodxq["shoujia"]); ?></i>
                                    <?php else: ?>
                                        <button class="minus" style="display: inline-block;">
                                        <strong>
                                        <img src="/kuaidian/Public/home/img/jianhao.png" alt="">
                                        </strong>
                                        </button>
                                        <i style="display: inline-block;" class="caipinfenshu"><?php echo ($vofoodxq["foodnum"]); ?></i>
                                        <button class="add">
                                        <strong>
                                        <img src="/kuaidian/Public/home/img/jiahao.png" alt="">
                                        </strong>
                                        </button><i class="price"><?php echo ($vofoodxq["shoujia"]); ?></i><?php endif; ?>
                                <?php else: endif; ?>
                            </div>
                        </div>
                        </li>
                    </ul><?php endforeach; endif; ?>
                </div>
            </div><?php endforeach; endif; ?>
            <!-- 判断总份数是否存在 -->
            <!-- 总份数为0下一步为灰色 切不能点击下一步 -->
            <?php if($zfsjg['zfshu'] == 0): ?><div class="footer">
                <div class="gou" onclick="toshare()">
                    <img src="/kuaidian/Public/home/img/gouwuche.png" alt="">
                    <div class="ii" style="display: none;">
                        <span id="totalcountshow">0</span>
                    </div>
                </div>
                <div class="left">
                    <span id="cartN" style="color: #fff;">
                                            ￥
                    <span id="totalpriceshow" style="color: #fff;">0.00</span>
                    </span>
                </div>
                <div class="right" onclick="toshare2()">
                    <a id="btnselect" class="xhlbtn disable" href="javascript:void(0)">下一步</a>
                </div>
            </div>
            <?php else: ?>
            <div class="footer">
                <div class="gou" onclick="toshare()">
                    <img src="/kuaidian/Public/home/img/gouwuche2.png" alt="">
                    <div class="ii">
                        <span id="totalcountshow"><?php echo ($zfsjg['zfshu']); ?></span>
                    </div>
                </div>
                <div class="left">
                    <span id="cartN">
                                            ￥
                    <span id="totalpriceshow"><?php echo ($zfsjg["zjiage"]); ?></span>
                    </span>
                </div>
                <div class="right" onclick="toshare2()">
                    <a id="btnselect" class="xhlbtn " href="javascript:void(0)">下一步</a>
                </div>
            </div><?php endif; ?>
            <!-- <script type="text/javascript" src="/kuaidian/Public/home/js/jquery.js"></script> -->
            
            </li>
            <li class="item">
            <div class="address">
                <div class="dizhi">
                    <div class="tt">
                        <img src="/kuaidian/Public/home/img/dizhi.png" alt="">
                    </div>
                    <div class="zz">
                        <span>
                                    <?php echo ($resspdan["0"]["jutidizhi"]); ?>
                        </span>
                    </div>
                </div>
                <div class="phone">
                    <div class="iphone">
                        <a href="tel:<?php echo ($resspdan["0"]["tel"]); ?>"><img src="/kuaidian/Public/home/img/phone.png" alt=""></a>
                    </div>
                </div>
            </div>
            <!--微众代言-->
            <div class="hezi2">
                <div class="you6">
                    <img src="/kuaidian/Public/home/img/tui2.png" alt="">
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
                        <span><?php echo ($resspdan["0"]["zuigaolij"]); ?>%</span>
                    </div>
                </div>
                <div class="tu3">
                    <img src="/kuaidian/Public/home/img/youjiantou.png" alt="">
                </div>
            </div>
            <!--优惠-->
            <div class="youhui">
                <div class="quan">
                    <div class="quan3">
                        <img src="/kuaidian/Public/home/img/quan2.png" alt="">
                    </div>
                    <span>优惠券</span>
                </div>
                <div class="xia2">
                    <div class="q1">
                        <img src="/kuaidian/Public/<?php echo ($resspdan["0"]["logo"]); ?>" alt="">
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
                    <span>营业时间：<?php echo ($resspdan["0"]["time_kai"]); ?>-<?php echo ($resspdan["0"]["time_zhong"]); ?></span>
                </div>
                <div class="he3">
                    <span class="shishizhuangt">实时状态：
                    <?php if($resspdan[0][line_type] == 1): ?>在线
                    <?php else: ?>
                                        <span style="color: red;">未在线</span><?php endif; ?>
                    </span>
                </div>
                <div class="he4">
                    <div class="tt1">
                        <img src="/kuaidian/Public/home/img/tan.png" alt="">
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
                        <img src="/kuaidian/Public/home/img/dian.png" alt="">
                        </a>
                    </div>
                    <div class="zai">
                        <a href="#">
                        <span>在线点菜下单,立减活动,最高立减50%</span>
                        </a>
                    </div>
                </div>
                <?php if($resspdan[0][zuoweishu] == 0): else: ?>
                <div class="ding">
                    <div class="aa">
                        <a href="#">
                        <img src="/kuaidian/Public/home/img/ding.png" alt="">
                        </a>
                    </div>
                    <div class="zhi">
                        <a href="#">
                        <span>支持在线预订座位</span>
                        </a>
                    </div>
                </div><?php endif; ?>
                <div class="fu">
                    <div class="vv">
                        <a href="#">
                        <img src="/kuaidian/Public/home/img/fu.png" alt="">
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
<!--购物车遮罩层-->
<div class="am-share">
    <ul class="am-share-sns">
        <div class="gg">
            <div class="gang">
            </div>
            <div class="yx">
                <span>已选商品</span>
            </div>
            <div class="qingtu">
                <img src="/kuaidian/Public/home/img/qingkong.png" alt="">
            </div>
            <div class="qing">
                <span>清空</span>
            </div>
        </div>
        <!-- 购物车商品 js添加 -->
        <div class="ajaxaddgsfood">
            
        </div>
    </ul>
    <div class="kong">
    </div>
</div>
<!--选择就餐人数遮罩层-->
<div class="am-share2">
    <ul class="am-share-sns2">
        <div class="jiucan">
            <span>请选择就餐人数</span>
        </div>
        <div class="zhong">
            <div id="subtraction" onclick="subtraction()">
                <img src="/kuaidian/Public/home/img/jianhao.png" alt="">
            </div>
            <div class="tet">
                <input type="text" value="0" id="number" onblur="number()">
            </div>
            <div id="add" onclick="add()">
                <img src="/kuaidian/Public/home/img/jiahao.png" alt="">
            </div>
        </div>
        <div class="bot">
            <div id="qu">
                <span id="guan">取消</span>
            </div>
            <div id="que">
                <span style="color: #fff;">确定</span>
            </div>
        </div>
    </ul>
</div>
<script src="/kuaidian/Public/home/js/jquery.js"></script>
<script src="/kuaidian/Public/home/js/tab.js"></script>
<script type="text/javascript">
                $(function () {
                    //小购物车加功能
                    $(document).on("click",".add2",function(){
                        //页面样式
                        $(this).prevAll().css("display", "inline-block");
                        var n = $(this).prev().text();
                        var num = parseInt(n) + 1;
                        if (num == 0) { return; }
                        $(this).prev().text(num);
                        jss();//<span style='font-family: Arial, Helvetica, sans-serif;'></span>   改变按钮样式
                        //触发主页面菜品的加减
                        //获取小购物车菜品id
                        var foodid_xiaogwc = $(this).parent().parent().parent().find(".foodidxiaogouwuc").html();
                        $.each($(".caipinid"),function(){
                            //主页面菜品id
                            var foodid_zhuyemcp = $(this).html();//主页面菜品id
                            // 判断主页面菜品id = 购物车菜品id
                            if (foodid_xiaogwc == foodid_zhuyemcp) {
                                $(this).parent().find(".add").click();//改变主页面菜品份数
                            }
                        })
                    });
                    //小购物车 减的功能
                    $(document).on("click",".minus2",function(){
                        var n = $(this).next().text();
                        var num = parseInt(n) - 1;
                        $(this).next().text(num);//减1
                        //如果数量小于或等于0则隐藏减号和数量
                        if (num <= 0) {
                            //删除本行
                            $(this).parents(".nnei").remove();
                        }
                        //触发主页面菜品的加减
                        //获取小购物车菜品id
                        var foodid_xiaogwc = $(this).parent().parent().parent().find(".foodidxiaogouwuc").html();
                        $.each($(".caipinid"),function(){
                            //主页面菜品id
                            var foodid_zhuyemcp = $(this).html();//主页面菜品id
                            // 判断主页面菜品id = 购物车菜品id
                            if (foodid_xiaogwc == foodid_zhuyemcp) {
                                $(this).parent().find(".minus").click();//改变主页面菜品份数
                            }
                        })
                    });
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
                        // alert(nm);
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
                        // 获取菜品名称
                        var caipname = $(this).parents(".menu-txt").find(".biao").find("span").html();
                        // 获取菜品价格
                        var caiprice = $(this).parents(".menu-txt").find(".caiprice").html();
                        // alert(caiprice);return;
                        //ajax更改cookie
                        //判断 份数是不是 1
                        if (caipinfenshu == 1) {
                            //执行添加
                             $.ajax({
                                type:'POST',
                                dataType: 'json',
                                async:false,
                                url:'<?php echo U("Home/Index/ajaxaddlinshijj");?>',
                                data:{"shopid":shopid,"foodtypeid":foodtypeid,"caipinid":caipinid,"caipinfenshu":caipinfenshu,"caipname":caipname,"caiprice":caiprice},
                                success: function (result) {
                                    // if (result == 2) {
                                    //     alert("操作失败");
                                    // }
                                }
                            })
                        }else{
                            // 执行修改
                             $.ajax({
                                type:'POST',
                                dataType: 'json',
                                async:false,
                                url:'<?php echo U("Home/Index/ajaxeditfoodshuliang");?>',
                                data:{"shopid":shopid,"foodtypeid":foodtypeid,"caipinid":caipinid,"caipinfenshu":caipinfenshu,"caipname":caipname,"caiprice":caiprice},
                                success: function (result) {
                                    // if (result == 2) {
                                    //     alert("操作失败");
                                    // }
                                }
                            })
                        }
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
                         // 获取菜品名称
                        var caipname = $(this).parents(".menu-txt").find(".biao").find("span").html();
                        // 获取菜品价格
                        var caiprice = $(this).parents(".menu-txt").find(".caiprice").html();
                        // alert(caipinfenshu);
                        //ajax更改 COOkie 
                        //判断 份数 是否是0
                        if (caipinfenshu == 0) {
                            //执行删除
                            $.ajax({
                                type:'POST',
                                dataType: 'json',
                                async:false,
                                url:'<?php echo U("Home/Index/ajaxdellinshijj");?>',
                                data:{"shopid":shopid,"foodtypeid":foodtypeid,"caipinid":caipinid,"caipinfenshu":caipinfenshu,"caipname":caipname,"caiprice":caiprice},
                                success: function (result) {
                                    // alert(result);
                                }
                            })
                        }else{
                            //执行修改
                              $.ajax({
                                type:'POST',
                                dataType: 'json',
                                async:false,
                                url:'<?php echo U("Home/Index/ajaxeditfoodshuliang");?>',
                                data:{"shopid":shopid,"foodtypeid":foodtypeid,"caipinid":caipinid,"caipinfenshu":caipinfenshu,"caipname":caipname,"caiprice":caiprice},
                                success: function (result) {
                                    // if (result == 2) {
                                    //     alert("操作失败");
                                    // }
                                }
                            })
                        }
                    });
                    // 下一步
                    $(document).on("click","#btnselect",function(){
                        //判断有无菜品
                        var zfens = $(this).parent().parent().find("#totalcountshow").html();
                        if (zfens == 0) {
                        }else{
                            //提交表单
                            // $("#dateshangjia").submit();
                        }
                    });
                    //购物车 确定跳转页面
                    $("#que").click(function(){

                        //获取总人数
                        var m = $("#totalpriceshow,#totalpriceshow2").html();
                        //获取总就餐人数
                        var num = $("#number").val();
                        if (num >0 && m >0) {
                            $("#dateshangjia").submit();
                        }
                    });
                    function jss() {
                        //控制下一步
                        var m = $("#totalpriceshow,#totalpriceshow2").html();
                        if (m > 0) {
                            //改变购物车 状态
                            $(".right").find("a").removeClass("disable");
                            $("#totalpriceshow").css("color","#ffae00");
                            $("#cartN").css("color","#ffae00");
                        } else {
                            $(".right").find("a").addClass("disable");

                            $("#totalpriceshow").css("color","#fff");
                            $("#cartN").css("color","#fff");
                        }
                        //控制小购物车的样式
                        var zongnum = $("#totalcountshow").html();
                        // alert(zongnum);
                        // 判断为 0 和 1
                        if (zongnum == 1 || zongnum == undefined) {
                            //购物车亮
                            var str = '<img src="/kuaidian/Public/home/img/gouwuche2.png" alt=""><div class="ii"><span id="totalcountshow">1</span></div>';
                            $(".gou").html(str);
                        }else if(zongnum == 0){
                            //购物车 暗
                            var str = '<img src="/kuaidian/Public/home/img/gouwuche.png" alt="">';
                            $(".gou").html(str);
                        }else{}
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
<!--购物车遮罩层-->
<script type="text/javascript">
        //情空购物车
        $(".qing").click(function () {
            //样式
            $('.am-share').hide();
            $(".sharebg-active").removeClass("sharebg-active");
            //获取商家id
            // 获取门店id -shopid
            var shopid = $("#shopid").html();
            // alert(shopid);
            $.ajax({
                type:"post",
                dataType:'json',
                async:false,
                url:'<?php echo U("home/cart/del_cart");?>',
                data:{"shopid":shopid},
                success:function(dd){
                    if (dd.code == 200) {
                        //清空购物车成功刷新页面
                        window.location.reload();
                    }else{
                        alert("情况购物车失败");
                    }
                }
            })
            
        });
        //触发购物车
        function toshare(){
            if($('.sharebg').hasClass("sharebg-active")){;
                $(".sharebg").removeClass("sharebg-active");
                $('.am-share').hide();
                return false;
            }
            $(".am-share").addClass("am-modal-active");
            $('.am-share').show();
            if($(".sharebg").length>0){
                $(".sharebg").addClass("sharebg-active");
            }else{
                $("body").append('<div class="sharebg"></div>');
                $(".sharebg").addClass("sharebg-active");
            }
            //ajax 铺取数据
             $.ajax({
                type:'POST',
                dataType: 'json',
                async:false,
                url:'<?php echo U("Home/Index/ajaxgsfood");?>',
                data:{},
                success: function (result) {
                    var str = "";
                    $.each(result,function(index,item){
                        str += '<div class="nnei"><div class="neirong"><span class="foodidxiaogouwuc" style="display:none;">'+item.foodid+'</span><div class="neirong2"><div class="mmingzi"><span>'+item.caipname+'</span></div><div class="left2"><span id="cartN2">￥ <span id="totalpriceshow2">'+item.caiprice+'</span></span></div><div class="btn2"><button class="minus2" style="display:inline-block"><strong><img src="/kuaidian/Public/home/img/jianhao.png" alt=""></strong></button> <i style="display:inline-block">'+item.foodnum+'</i> <button class="add2"><strong><img src="/kuaidian/Public/home/img/jiahao.png" alt=""></strong></button> <i class="price2">18.5</i></div></div></div></div>';
                    });
                    $(".ajaxaddgsfood").html(str);
                    // console.log(result);
                }
            })
        }
    </script>
<!--选择人数遮罩层-->
<script type="text/javascript">
        // 点击下一步 触发就餐人数
        function toshare2(){
            //获取总人数
            var m = $("#totalpriceshow,#totalpriceshow2").html();
            if (m > 0) {
                $(".am-share2").addClass("am-modal-active2");
                if($(".sharebg2").length>0){
                    $(".sharebg2").addClass("sharebg-active2");
                }else{
                    $("body").append('<div class="sharebg2"></div>');
                    $(".sharebg2").addClass("sharebg-active2");
                }
                $("#qu,.share_btn2,.sharebg-active2").click(function(){
                    $(".am-share2").removeClass("am-modal-active2");
                    setTimeout(function(){
                        $(".sharebg-active2").removeClass("sharebg-active2");
                        $(".sharebg2").remove();
                    },150);
                })
            } 
            
        }
    </script>
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
<script>
    //购物车减 功能
        function subtraction(){
            //获取-号按钮
            var subtraction = document.getElementById("subtraction");
            var que = document.getElementById("que");
            //获取文本框
            var number = document.getElementById("number");
            if (number.value<=1) {
                //如果文本框的值小于0,则设置值为0
                number.value = 0;
                que.style.backgroundColor="#888";
            }else {
                number.value = number.value - 1;
            }
            //修改就餐人数
            var num = $("#number").val();
            editrepast(num);
        };
        function number(){
            var number = document.getElementById("number");
            var value = number.value;
            //如果文本值为空,设置为0
            if (value==""){
                number.value = 0;
            }
            //如果文本值为非纯数字,设置为1
            //isNaN()是否为非法数字
            if (isNaN(value)) {
                number.value = 1;
            }
            //如果文本值小于0,设置为0
            if (parseInt(value)<=0) {
                number.value = 0;
            }
        };
        //小购物车加 功能
        function add(){
            var add = document.getElementById("add");
            var number = document.getElementById("number");
            var que = document.getElementById("que");
            //parseInt() 将数值型字符串转换为数值
            number.value = parseInt(number.value)+1;
            if(number.value>0){
                que.style.backgroundColor="#ffae00";
            }
            //修改就餐人数
            var num = $("#number").val();
            editrepast(num);
        };
        //修改就餐人数 跳转页面
        function editrepast(num){
            $("#repasttiaozhuan").val(num);
        }
    </script>

    <script type="text/javascript">
        //页面加载提示
        $(document).ready(function(){
            var shopid = $("#shopid").html();
            
             //ajax 铺取数据
             $.ajax({
                type:'POST',
                dataType: 'json',
                async:false,
                url:'<?php echo U("Home/Index/ajaxzaixianzhuangt");?>',
                data:{"shopid":shopid},
                success: function (result) {
                    if (result != 1) {
                        alert("当前商家未在线\n请联系商家接收订单");  
                    }
                }
            })
            //跳转商家详情
            var caipinid = $(".caipinid").html();
            if (caipinid) {}else{
                $("#wushopdianji").click();
            }
        })
        //在线状态
        setInterval(function(){
            // 获取门店id -shopid
            var shopid = $("#shopid").html();
            
             //ajax 铺取数据
             $.ajax({
                type:'POST',
                dataType: 'json',
                async:false,
                url:'<?php echo U("Home/Index/ajaxzaixianzhuangt");?>',
                data:{"shopid":shopid},
                success: function (result) {
                    if (result == 1) {
                        var str = '实时状态：在线';
                    }else{
                        var str = '实时状态：<span style="color: red;">未在线</span>';
                    }
                    //赋值
                    $(".shishizhuangt").html(str);
                   // alert(result);
                    // console.log(result);
                }
            })
        },1000);
        function change_pic(){
            var imgObj = document.getElementById("xin");
            if(imgObj.getAttribute("src",2)=="/kuaidian/Public/home/img/baixin.png"){
                imgObj.src="/kuaidian/Public/home/img/hxin.png";
            }else{
                imgObj.src="/kuaidian/Public/home/img/baixin.png";
            }
        };
    </script>
</body>
</html>