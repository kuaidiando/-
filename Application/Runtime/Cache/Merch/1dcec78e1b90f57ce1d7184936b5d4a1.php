<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>订单详情</title>
    <link rel="stylesheet" href="/-/Public/merch/css/text.css">
    <link rel="stylesheet" href="/-/Public/merch/css/base.css">
    <link rel="stylesheet" href="/-/Public/merch/css/dingdanxiangqing.css">
    <script src="/-/Public/merch/js/jquery-1.12.4.min.js"></script>
</head>
<body style="font-size: 12px">
    <div class="header">
        <div class="head">
            <div class="zuo">
                <input type="text" placeholder="订单号/手机号">
            </div>

            <div class="you">
                <button>检索</button>
            </div>
        </div>
    </div>

    <div class="tabPanel">
        <ul class="ul">
            <li class="hit">新订单</li>
            <li>进行中</li>
            <li>已完成</li>
            <li>取消单</li>
        </ul>
        <div class="panes">
            <div class="pane" style="display:block;">
                <div class="xin">
                    <span>新订单&nbsp;5&nbsp;单,总额&nbsp;1810.1&nbsp;元</span>
                </div>

                <div class="he">
                    <div class="top">
                        <div class="jiu">
                            <div class="can">
                                <span>就餐号</span>
                            </div>

                            <div class="hh">
                                <span>0108</span>
                            </div>
                        </div>

                        <div class="hao">
                            <span>订单号:1893029183762783</span>
                        </div>
                    </div>

                    <div class="name">
                        <div class="sex">
                            <span>周女士</span>
                        </div>
                        
                        <div class="tel">
                            <span>13800000000</span>
                        </div>
                        
                        <div class="tu">
                            <div class="ttu">
                                <a href="tel:13716172720">
                                    <img src="/-/Public/merch/images/phone.png" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="zw">
                            <div class="wei">
                                <span>座位</span>
                            </div>

                            <div class="hha">
                                <span>15号</span>
                            </div>
                        </div>
                    </div>

                    <div class="navMenubox">
                        <div id="slimtest1">
                            <ul class="navMenu">
                                <li>
                                    <a href="javascript:;" class="afinve">
                                        <div class="pp">
                                            <div class="zz">
                                                <span>商品</span>
                                            </div>

                                            <div class="yy">
                                                <span onclick="javascript:this.innerHTML=(this.innerHTML=='展开'?'收起':'展开');">展开</span>
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="javascript:;">
                                                <div class="hee">
                                                    <div class="cai">
                                                        <span>酸辣土豆丝</span>
                                                    </div>

                                                    <div class="ll">
                                                        <span>X2</span>
                                                    </div>

                                                    <div class="qian2">
                                                        <span>18.0</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="hee">
                                                    <div class="cai">
                                                        <span>酸辣土豆丝</span>
                                                    </div>

                                                    <div class="ll">
                                                        <span>X2</span>
                                                    </div>

                                                    <div class="qian2">
                                                        <span>18.0</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="hee">
                                                    <div class="cai">
                                                        <span>酸辣土豆丝</span>
                                                    </div>

                                                    <div class="ll">
                                                        <span>X2</span>
                                                    </div>

                                                    <div class="qian2">
                                                        <span>18.0</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="hee">
                                                    <div class="cai">
                                                        <span>酸辣土豆丝</span>
                                                    </div>

                                                    <div class="ll">
                                                        <span>X2</span>
                                                    </div>

                                                    <div class="qian2">
                                                        <span>18.0</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="hee">
                                                    <div class="cai">
                                                        <span>酸辣土豆丝</span>
                                                    </div>

                                                    <div class="ll">
                                                        <span>X2</span>
                                                    </div>

                                                    <div class="qian2">
                                                        <span>18.0</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <script src="/-/Public/merch/js/jquery-1.12.4.min.js"></script>
                    <script src="/-/Public/merch/js/jquery.slimscroll.min.js"></script>
                    <script type="text/javascript">
                        $(function(){
                            // nav收缩展开
                            $('.navMenu li a').on('click',function(){
                                var parent = $(this).parent().parent();//获取当前页签的父级的父级
                                var labeul =$(this).parent("li").find(">ul")
                                if ($(this).parent().hasClass('open') == false) {
                                    //展开未展开
                                    parent.find('ul').slideUp(300);
                                    parent.find("li").removeClass("open")
                                    parent.find('li a').removeClass("active").find(".arrow").removeClass("open")
                                    $(this).parent("li").addClass("open").find(labeul).slideDown(300);
                                    $(this).addClass("active").find(".arrow").addClass("open")
                                }else{
                                    $(this).parent("li").removeClass("open").find(labeul).slideUp(300);
                                    if($(this).parent().find("ul").length>0){
                                        $(this).removeClass("active").find(".arrow").removeClass("open")
                                    }else{
                                        $(this).addClass("active")
                                    }
                                }

                            });
                        });
                    </script>

                    <div class="xiao">
                        <div class="ji">
                            <span>小计</span>
                        </div>

                        <div class="qqian">
                            <span>￥&nbsp;54.0</span>
                        </div>
                    </div>

                    <div class="fen">
                        <div class="ttop">
                            <div class="fen2">
                                <span>分享随机立减</span>
                            </div>

                            <div class="jj">
                                <span>-￥&nbsp;4.2</span>
                            </div>
                        </div>

                        <div class="ttop">
                            <div class="fen2">
                                <span>推广佣金</span>
                            </div>

                            <div class="jj">
                                <span>-￥&nbsp;3.6</span>
                            </div>
                        </div>
                    </div>

                    <div class="ben">
                        <div class="dan">
                            <span>本单预计收入</span>
                        </div>

                        <div class="zai">
                            <span>(在线支付)</span>
                        </div>

                        <div class="kk">
                            <span>￥&nbsp;66.6</span>
                        </div>
                    </div>

                    <div class="bz">
                        <div class="bb">
                            <span>备注：</span>
                        </div>

                        <div class="int">
                            <span>不吃辣,少放盐，五分钟到</span>
                        </div>
                    </div>

                    <div class="xd">
                        <div class="dd">
                            <span>下单：18.01.23&nbsp;18:06</span>
                        </div>

                        <div class="q">
                            <div class="qx">
                                <button>取消订单</button>
                            </div>
                        </div>

                        <div class="ren">
                            <div class="qr">
                                <button>确定</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="pane">

            </div>

            <div class="pane">

            </div>
        </div>
    </div>


    <div class="footer">
        <div class="foot" onclick="location.href='index.html'">
            <div class="ftu">
                <img src="/-/Public/merch/images/dingdan2.png" alt="">
            </div>
            <div class="de">
                <span>门店订单</span>
            </div>
        </div>


        <div class="foot2" onclick="location.href='index.html'">
            <div class="ftu2">
                <img src="/-/Public/merch/images/dian2.png" alt="">
            </div>
            <div class="de2">
                <span>我的门店</span>
            </div>
        </div>
    </div>

</body>
<!--tab栏-->
<script type="text/javascript">
    $(function(){
        $('.tabPanel .ul li').click(function(){
            $(this).addClass('hit').siblings().removeClass('hit ');
            $('.panes>div:eq('+$(this).index()+')').show().siblings().hide();
        })
    })
</script>


</html>