<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>我的订单</title>
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
                <div class="tab1" id="tab1">
                        <div class="menu">
                            <ul>
                                <li id="one1" onclick="setTab('one',1)">全部</li>
                                <li id="one2" onclick="setTab('one',2)">待支付</li>
                                <li id="one3" onclick="setTab('one',3)">待使用</li>
                                <li id="one4" onclick="setTab('one',4)">已使用</li>
                                <li id="one5" onclick="setTab('one',5)">待评价</li>
                                <li id="one6" onclick="setTab('one',6)">退款</li>
                            </ul>
                        </div>
                        <div class="menudiv">
                            <div id="con_one_1">
                                <a href="dingdanxiangqing.html">
                                    <div class="hezi">
                                        <div class="name">
                                            <div class="dian">
                                                <span>渝乡辣婆婆(亦庄店)</span>
                                            </div>

                                            <div class="qu">
                                                <span>取消订单</span>
                                            </div>
                                        </div>

                                        <div class="hezi2">
                                            <div class="tu">
                                                <img src="/-/Public/home/img/person.jpg" alt="">
                                            </div>

                                            <div class="hao">
                                                <div class="top">
                                                    <span>订单号:</span>
                                                </div>

                                                <div class="center">
                                                    <span>88888888888888</span>
                                                </div>

                                                <div class="xia">
                                                    <div class="xiaz">
                                                        <span>订单金额:</span>
                                                    </div>

                                                    <div class="xiay">
                                                        <span>￥888.8</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="dai">
                                                <div class="yong">
                                                    <span>待使用</span>
                                                </div>

                                                <div class="jian">
                                                    <img src="/-/Public/home/img/youjiantou.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div id="con_one_2" style="display:none;">哈哈哈哈哈哈</div>
                            <div id="con_one_3" style="display:none;">啦啦啦啦啦啦</div>
                            <div id="con_one_4" style="display:none;">不知道不知道</div>
                            <div id="con_one_5" style="display:none;">哼哼哼哼哼哼</div>
                            <div id="con_one_6" style="display:none;">略略略略略略</div>
                        </div>
                    </div>

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
//                                this.onmouseout=function(){
//                                    iIntervalId = setInterval(Next,ScrollTime);;
//                                }
                            }
                        }
                        document.getElementById("con_"+name_0+"_"+links_len).parentNode.onmouseover=function(){
//                            clearInterval(iIntervalId);
                            this.onmouseout=function(){
                                iIntervalId = setInterval(Next,ScrollTime);;
                            }
                        }
//                        setTab(name_0,cursel_0);
//                        iIntervalId = setInterval(Next,ScrollTime);
                    }
                </script>


            </li>

            <li class="item">
                啦啦啦啦啦啦阿拉啦啦爱啦啦爱啦啦
            </li>
        </ul>
    </div>
</div>

<script src="/-/Public/home/js/jquery.min.js"></script>
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