<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>快点—智慧餐厅</title>
    <link rel="icon" href="/-/Public/home/img/logo1.png">
    <link rel="stylesheet" href="/-/Public/home/css/index.css">
    <link rel="stylesheet" href="/-/Public/home/css/swiper.min.css">

    <link rel="stylesheet" href="/-/Public/home/css/base-index.css">
    <link rel="stylesheet" href="/-/Public/home/css/base2.css">
    <link rel="stylesheet" href="/-/Public/home/css/fenlei.css">
    <script src="/-/Public/home/js/flexible.js"></script>
    <script src="/-/Public/home/js/jquery-1.12.4.js"></script>
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
        body{
            margin: 0 !important;
        }
        .swiper-container {
            width: 100%;
            height: 100%;

        }
        .swiper-slide {
            text-align: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
        .swiper-slide img{
            width: 100%;
            height: 350px;
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
                    <img src="/-/Public/home/img/jiantou2.png" alt="">
                </div>
            </div>


            <div class="lookup">
                <div class="look">
                    <div class="sou">
                        <img src="/-/Public/home/img/loogup.png" alt="">
                    </div>

                    <div class="tet">
                        <input type="text" id="sousuocite" placeholder="搜索商品或商家">
                    </div>
                </div>
            </div>

            <a href="<?php echo U('Home/Person/index');?>">
             <div class="person">
                <div class="tx">
                    <img src="<?php echo ($photo); ?>" alt="">
                </div>
            </div>               
            </a>

        </div>
    </header>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php if(is_array($event)): foreach($event as $key=>$one): ?><div class="swiper-slide">
                <a href="#">
                    <img src="/-/Public/<?php echo ($one); ?>" alt="">
                </a>
            </div><?php endforeach; endif; ?>
        </div>
    </div>
    <!-- Swiper JS -->
    <script src="/-/Public/home/js/swiper.min.js"></script>
    <!-- Initialize Swiper -->
    <script type="text/javascript">
        var swiper = new Swiper('.swiper-container', {
            // spaceBetween: 30,//图片之间的距离
            loop:true,//自动播放
            centeredSlides: true,
            speed:1300,
            autoplay: {
                delay: 3000,//多少秒切换
                disableOnInteraction: false,//手滚动离开之后依然可以自然滚动
            },
        });
    </script>

    <!--中间分类-->
    <div class="kong2" style="width: 100%;height: 120px;">
        <section class="nav">
            <div class="screening">
                <ul>
                    <li class="Sort">
                        <div class="ss">
                            <span>全部</span>
                        </div>

                        <div class="san">
                            <img src="/-/Public/home/img/sanjiao.png" alt="">
                        </div>
                    </li>
                    
                    <li class="Regional">
                        <div class="ss">
                            <span>附近</span>
                        </div>

                        <div class="san">
                            <img src="/-/Public/home/img/sanjiao.png" alt="">
                        </div>
                    </li>
                    
                    <li class="Brand">
                        <div class="ss">
                            <span>智能排序</span>
                        </div>

                        <div class="san">
                            <img src="/-/Public/home/img/sanjiao.png" alt="">
                        </div>
                    </li>
                </ul>
            </div>

            <div class="Sort-eject Sort-height">
                <ul class="Sort-Sort" id="Sort-Sort">
                    <li onclick="Sorts(this)">火锅</li>
                    <li onclick="Sorts(this)">烤鱼</li>
                    <li onclick="Sorts(this)">烤肉</li>
                    <li onclick="Sorts(this)">川菜</li>
                    <li onclick="Sorts(this)">东北菜</li>
                    <li onclick="Sorts(this)">甜点</li>
                </ul>
            </div>

            <div class="grade-eject">
                <ul class="grade-w" id="gradew">
                    <li onclick="grade1(this)">裕华区</li>
                    <li onclick="grade1(this)">长安区</li>
                    <li onclick="grade1(this)">桥西区</li>
                    <li onclick="grade1(this)">新华区</li>
                    <li onclick="grade1(this)">鹿泉区</li>
                    <li onclick="grade1(this)">栾城区</li>
                    <li onclick="grade1(this)">开发区</li>
                    <li onclick="grade1(this)">藁城区</li>
                    <li onclick="grade1(this)">正定新区</li>
                </ul>
                <ul class="grade-t" id="gradet">
                    <li onclick="gradet(this)">全河北</li>
                    <li onclick="gradet(this)">石家庄</li>
                    <li onclick="gradet(this)">唐山</li>
                    <li onclick="gradet(this)">秦皇岛</li>
                    <li onclick="gradet(this)">邢台</li>
                    <li onclick="gradet(this)">保定</li>
                    <li onclick="gradet(this)">张家口</li>
                    <li onclick="gradet(this)">承德</li>
                    <li onclick="gradet(this)">沧州</li>
                    <li onclick="gradet(this)">廊坊</li>
                    <li onclick="gradet(this)">衡水</li>
                </ul>
            </div>

            <div class="Category-eject">
                <ul class="Category-w" id="Categorytw">
                    <li onclick="Categorytw(this)"></li>
                    <li onclick="Categorytw(this)"></li>
                    <li onclick="Categorytw(this)"></li>
                    <li onclick="Categorytw(this)"></li>
                    <li onclick="Categorytw(this)"></li>
                </ul>
            </div>
        </section>
    </div>
    <script src="/-/Public/home/js/jquery-1.12.4.min.js"></script>
    <script src="/-/Public/home/js/demo.js"></script>

    
    <div class="jsbdapi">
    <!--中间商品部分-->
    <?php if(is_array($res)): foreach($res as $k=>$vores): ?><a href="<?php echo U('Home/Index/detail',array('shopid'=>$vores[id]));?>">
        <div class="shangpin">
            <div class="hezi">
                <div class="hz">
                    <div class="top">
                        <div class="tu">
                            <img src="/-/Public<?php echo ($vores["logo"]); ?>" alt="">
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
                                <?php $__FOR_START_6202__=0;$__FOR_END_6202__=$vores["shixinxing"];for($i=$__FOR_START_6202__;$i < $__FOR_END_6202__;$i+=1){ ?><img src="/-/Public/home/img/quanstart.png" style="width:13%;" alt=""><?php } ?>
                                <!-- 判断半个 星星 -->
                        <?php if($vores["bangexing"] == 1): ?><img src="/-/Public/home/img/ban.png" style="width:13%;" alt="">
                        <?php else: endif; ?>
                                <!-- 空心星数量 -->
                                <?php $__FOR_START_11499__=0;$__FOR_END_11499__=$vores["kongxinxing"];for($i=$__FOR_START_11499__;$i < $__FOR_END_11499__;$i+=1){ ?><img src="/-/Public/home/img/wu.png" style="width:13%;" alt=""><?php } ?>
                                    
                                </div>




                                <div class="juli">
                                    <span class="<?php echo ($vores["id"]); ?>"></span>
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
                                    <img src="/-/Public/home/img/quan2.png" alt="">
                                </div>

                                <div class="dian">
                                    <img src="/-/Public/home/img/dian.png" alt="">
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="xia">

                    <div class="bot">
                        <div class="tui">
                            <img src="/-/Public/home/img/tuiguang.png" alt="">
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
                    <?php if($vores["zuoweishu"] == 0): else: ?>
                        <div class="xia2">
                            <div class="zzuo">
                                <img src="/-/Public/home/img/jinri.png" alt="">
                            </div>

                            <div class="yyou">
                                <div class="xuan">
                                    <img src="/-/Public/home/img/dingzuo.png" alt="">
                                </div>

                                <div class="ke">
                                    <span>今日可订座</span>
                                </div>

                                <div class="renshu">
                                    <span><?php echo ($vores["zuoweishu"]); ?></span>
                                </div>

                                <div class="zhuo">
                                    <span>桌</span>
                                </div>
                            </div>
                        </div><?php endif; ?>
                </div>
            </div>
        </div>
    </a><?php endforeach; endif; ?>

    </div>





    <!--底部-->
<div class="foott">
    <a href="<?php echo U('Home/Index/index');?>">
        <div id="foot">
            <div id="ttu">
                <img src="/-/Public/home/img/shangjia2.png" alt="">
            </div>

            <div id="shou">
                <span>首页</span>
            </div>
        </div>
    </a>


    <a href="<?php echo U('Home/Order/order_info');?> ">
        <div id="foot2">
            <div id="ttu2">
                <img src="/-/Public/home/img/diangdan.png" alt="">
            </div>

            <div id="shou2">
                <span>订单</span>
            </div>
        </div>
    </a>

    <a href="<?php echo U('Home/Person/index');?>">
        <div id="foot3" onclick="location.href='person.html'">
            <div id="ttu3">
               <img src="/-/Public/home/img/geren.png" alt="">
            </div>

            <div id="shou3">
                <span>我的</span>
            </div>
        </div>
    </a>
</div>
<div id="allmap" style="display: none;"></div>
<!-- 百度地图定位 -->
<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=T9Upu0sWr9Grt4EknLsa9DbU9emQlRYj"></script>
<!-- 微信定位 -->
<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
   wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
        // 所有要调用的 API 都要加到这个列表中
        'checkJsApi',
        'openLocation',
        'getLocation'
      ]
});
wx.ready(function () {
  wx.checkJsApi({
    jsApiList: [
        'getLocation'
    ],
    success: function (res) {
        // alert(JSON.stringify(res));
        // alert(JSON.stringify(res.checkResult.getLocation));
        if (res.checkResult.getLocation == false) {
            alert('你的微信版本太低，不支持微信JS接口，请升级到最新的微信版本！');
            return;
        }
    }
});
  wx.getLocation({
    success: function (res) {
        var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
        var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
        var speed = res.speed; // 速度，以米/每秒计
        var accuracy = res.accuracy; // 位置精度
        y = res.latitude; // 纬度，浮点数，范围为90 ~ -90
        x = res.longitude; // 经度，浮点数，范围为180 ~ -180。
        // alert(JSON.stringify(res));
        /**
         * 转化为百度坐标
         * @type {BMap}
         */
        var ggPoint = new BMap.Point(x,y);

        //地图初始化
        var bm = new BMap.Map("allmap");
        // bm.centerAndZoom(ggPoint, 15);
        // bm.addControl(new BMap.NavigationControl());

        // //添加gps marker和label
        // var markergg = new BMap.Marker(ggPoint);
        // bm.addOverlay(markergg); //添加GPS marker
        // var labelgg = new BMap.Label("未转换的GPS坐标（错误）",{offset:new BMap.Size(20,-10)});
        // markergg.setLabel(labelgg); //添加GPS label

        //坐标转换完之后的回调函数
        translateCallback = function (data){
          if(data.status === 0) {
            // var marker = new BMap.Marker(data.points[0]);
            // bm.addOverlay(marker);
            // var label = new BMap.Label("转换后的百度坐标（正确）",{offset:new BMap.Size(20,-10)});
            // console.log(data);
             var zy = data.points['0'].lat;
             var zx = data.points['0'].lng;
             // alert(zx);
             // alert(zy);
             // 加载菜品 距离信息
              $.ajax({
                    type:"post",
                    dataType:'json',
                    async:false,
                    url:'<?php echo U("home/index/ajaxfoodjuli");?>',
                    data:{"lng":zx,"lat":zy},
                    success:function(dd){
                        console.log(dd);
                        var str = '';
                        $.each(dd,function(index,item){
                            //实心星星数量
                            var shixinxing = '';
                            var idd = item.id;
                            for ( var i=0; i<item.shixinxing; i++){
                                 shixinxing +='<img src="/-/Public/home/img/quanstart.png" style="width:13%;" alt="">';
                            }
                            //半个星星数量
                            var bangexing = '';
                            if (bangexing == 1) {
                                var bangexing = '<img src="/-/Public/home/img/ban.png" style="width:13%;" alt="">';
                            }
                            //实心星星数量
                            var kongxinxing = '';
                            for ( var i=0; i<item.kongxinxing; i++){
                                 kongxinxing +='<img src="/-/Public/home/img/wu.png" style="width:13%;" alt="">';
                            }
                            //座位数
                            if (item.zuoweishu == 0) {
                                var zuoweishu = '';
                            }else{
                                var zuoweishu = '<div class="xia2"><div class="zzuo"><img src="/-/Public/home/img/jinri.png" alt=""></div><div class="yyou"><div class="xuan"><img src="/-/Public/home/img/dingzuo.png" alt=""></div><div class="ke"><span>今日可订座</span></div><div class="renshu"><span>'+item.zuoweishu+'</span></div><div class="zhuo"><span>桌</span></div></div></div>';
                            }
                            //菜品内容
                            str += '<a href="http://mk.365kdian.com/index.php/Home/Index/detail/shopid/'+item.id+'"><div class="shangpin"><div class="hezi"><div class="hz"><div class="top"><div class="tu"><img src="/-/Public'+item.logo+'" alt=""></div><div class="you"><div class="top1"><div class="name"><span>'+item.mingch+'</span></div></div><div class="center"><div class="xing">'+shixinxing+bangexing+kongxinxing+'</div><div class="juli"><span>'+item.juli+'</span></div></div><div class="ttop"><div class="lei"><span>'+item.lbname+'</span></div><div class="fuhao"><span>￥</span></div><div class="qian"><span>'+item.maney+'</span></div><div class="wei"><span>/位</span></div><div class="quan"><img src="/-/Public/home/img/quan2.png" alt=""></div><div class="dian"><img src="/-/Public/home/img/dian.png" alt=""></div></div></div></div></div><div class="xia"><div class="bot"><div class="tui"><img src="/-/Public/home/img/tuiguang.png" alt=""></div><div class="jia"><span>已发起微众代言</span></div><div class="red"><span>'+item.zuigaolij+'</span></div><div class="bai"><span>%</span></div></div>'+zuoweishu+'</div></div></div></a>';
                        });
                        $(".jsbdapi").html(str);
                    }
                })
            // marker.setLabel(label); //添加百度label
            // bm.setCenter(data.points[0]);
          }
        }

        setTimeout(function(){
            var convertor = new BMap.Convertor();
            var pointArr = [];
            pointArr.push(ggPoint);
            convertor.translate(pointArr, 1, 5, translateCallback)
        }, 1000);
    },
    cancel: function (res) {
        alert('用户拒绝授权获取地理位置');
    }
});

});
  </script>
<!-- 城市选择 -->
<script type="text/javascript">

// <!-- 城市选择 -->
    $(".cs").click(function(){
        var url = '<?php echo U("Home/Index/cityxuanze");?>';
        window.location.replace(url);
    });
    //搜索商家
    $("#sousuocite").focus(function(){
        var url = '<?php echo U("Home/Index/citysousuo");?>';
        window.location.replace(url);
    });
</script>
</body>
</html>