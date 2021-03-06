<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>城市选择</title>
    <link rel="stylesheet" href="/kuaidian/Public/home/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/city.css">
</head>
<body style="font-size: 12px">
<!--搜索城市-->
<div class="souu">
    <div class="int">
        <input type="text" placeholder="请输入您的城市">
    </div>
</div>

<!--当前城市-->
<div class="dd">
    <div class="dq">
        <span>当前城市:</span>
    </div>

    <div class="dc">
        <span>石家庄市</span>
    </div>
</div>

<!--热门城市-->
<div class="re">
    <div class="rm">
        <span>热门城市:</span>
    </div>

    <div class="css">
        <div class="cs">
            <?php if(is_array($rmcs)): foreach($rmcs as $key=>$vormcs): ?><div class="kuang">
                    <span><?php echo ($vormcs["name"]); ?></span>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
</div>

<!--显示点击的是哪一个字母-->
<div id="showLetter" class="showLetter">
    <span>A</span>
</div>

<!--城市索引查询-->
<div class="letter">
    <ul>
        <li><a href="javascript:;">A</a></li>
        <li><a href="javascript:;">B</a></li>
        <li><a href="javascript:;">C</a></li>
        <li><a href="javascript:;">D</a></li>
        <li><a href="javascript:;">E</a></li>
        <li><a href="javascript:;">F</a></li>
        <li><a href="javascript:;">G</a></li>
        <li><a href="javascript:;">H</a></li>
        <li><a href="javascript:;">J</a></li>
        <li><a href="javascript:;">K</a></li>
        <li><a href="javascript:;">L</a></li>
        <li><a href="javascript:;">M</a></li>
        <li><a href="javascript:;">N</a></li>
        <li><a href="javascript:;">P</a></li>
        <li><a href="javascript:;">Q</a></li>
        <li><a href="javascript:;">R</a></li>
        <li><a href="javascript:;">S</a></li>
        <li><a href="javascript:;">T</a></li>
        <li><a href="javascript:;">W</a></li>
        <li><a href="javascript:;">X</a></li>
        <li><a href="javascript:;">Y</a></li>
        <li><a href="javascript:;">Z</a></li>
    </ul>
</div>

<!--城市列表-->
<div class="container">
    <div class="city">
            <div class="kong" style="width: 100%;height: 10px;"></div>
        <!-- <div class="city-list">
            <span class="city-letter" id="A">A</span>
            <p data-id="210300">鞍山市</p>
            <p data-id="152900">阿拉善盟</p>
            <p data-id="340800">安庆市</p>
            <p data-id="410500">安阳市</p>
            <p data-id="542500">阿里地区</p>
        </div>
        <div class="city-list">
            <span class="city-letter" id="B">B</span>
            <p data-id="220800">白城市</p>
            <p data-id="150200">包头市</p>
            <p data-id="150800">巴彦淖尔市</p>
        </div> -->
        <?php if(is_array($pinyincs)): foreach($pinyincs as $k=>$vopinyincs): ?><div class="city-list">
                <span class="city-letter" id="<?php echo ($vopinyincs["zimu"]); ?>"><?php echo ($vopinyincs["zimu"]); ?></span>
                <?php if(is_array($pinyincs[$k]['cszm'])): foreach($pinyincs[$k]['cszm'] as $key=>$vocszm): ?><p data-id="220800">
                        <span class="csmingchengdianji"><?php echo ($vocszm["name"]); ?></span>
                        <span class="csid"><a href="<?php echo U('Home/Index/index',array('csmc'=>$vocszm['name']));?>" style="display: none;"></a></span>
                    </p><?php endforeach; endif; ?>
            </div><?php endforeach; endif; ?>
    </div>
</div>
</body>
<div id="allmap" style="display: none;"></div>
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script src="/kuaidian/Public/home/js/jquery-1.12.4.js"></script>
    <!-- 百度地图api -->
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=T9Upu0sWr9Grt4EknLsa9DbU9emQlRYj"></script>
<script type="text/javascript">
    $(function () {
        //加载城市事件
        $('.container').show();
//选择城市 start
        $(document).on('click', '.csmingchengdianji', function () {
            var csmc = $(this).html();
            alert(csmc);
            var url = $(this).parent().find(".csid a").attr("href");
            // alert(url);
            // var url = '<?php echo U("Home/Index/index");?>';
            window.location.replace(url);
        });
        //点击索引查询城市
        $('body').on('click', '.letter a', function () {
            var s = $(this).html();
            $(window).scrollTop($('#' + s).offset().top);
            $("#showLetter span").html(s);
            $("#showLetter").show().delay(500).hide(0);
        });
        //中间的标记显示
        $('body').on('onMouse', '.showLetter span', function () {
            $("#showLetter").show().delay(500).hide(0);
        });

    });
</script>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(116.331398,39.897445);
    map.centerAndZoom(point,12);

    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function(r){
        //赋值
        $(".dc").html("<span>"+r.address.city+"</span>");
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
            var mk = new BMap.Marker(r.point);
            map.addOverlay(mk);
            map.panTo(r.point);
            // alert('您的位置：'+r.point.lng+','+r.point.lat);
        }
        else {
            alert('failed'+this.getStatus());
        }        
    },{enableHighAccuracy: true})
</script>
</html>