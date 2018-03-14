<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>认证资质</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/xinxi.css">
    <script type="text/javascript" src="/kuaidian/Public/jquery/jquery.js"></script>
    <!-- 图片上传 -->
     <style type="text/css">
        #preview{
            width: 180px;
            height: 183px;
            overflow: hidden;
        }
        #imghead{
            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
        }
    </style>

    <script type="text/javascript">
        function previewImage(file) {
            var MAXWIDTH = 180;
            var MAXHEIGHT = 180;
            var div = document.getElementById('preview');
            if (file.files && file.files[0]) {
                div.innerHTML = '<img id=imghead>';
                var img = document.getElementById('imghead');
                img.onload = function () {
                    var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                    img.width = rect.width;
                    img.height = rect.height;
                    img.style.marginLeft = rect.left+'px';
                    img.style.marginTop = rect.top + 'px';
                }
                var reader = new FileReader();
                reader.onload = function (evt) {
                    img.src = evt.target.result;
                }
                reader.readAsDataURL(file.files[0]);
            }else{  //兼容IE
                var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
                file.select();
                var src = document.selection.createRange().text;
                div.innerHTML = '<img id=imghead>';
                var img = document.getElementById('imghead');
                img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
                div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
            }
        }

        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight ){
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                if( rateWidth > rateHeight ){
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else{
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
    </script>
</head>
<body style="font-size: 12px">
<form class="form form-horizontal" id="formadd" action="<?php echo U('Merch/Shopset/addjibenxx');?>" method="post" enctype="multipart/form-data">
    <div class="head">
        <!-- 门店id -->
        <input type="text" name="shopid" value="<?php echo ($shopid); ?>" style="display:none;">
        <!-- 隐藏基本信息状态 -->
        <input type="text" name="jinbenxxtype" style="display: none;" value="1">
        <span>基本信息</span>
    </div>

    <div class="big">

        <div class="ying">
            <div class="zhi">
                <span>基本信息</span>
            </div>
        </div>

        <div class="zhao">
            <div class="tet">
                <input type="text" style="width: 30%;" placeholder="门店照片">
                <!-- 图片上传 -->
                <input type="file" name="logo" style="position:absolute;opacity:0;width: 74%" onchange="previewImage(this)" />
            </div>
            
            <div class="tu" id="preview" style="margin-left: 13%;">
                <img id="imghead" border=0 src="/kuaidian/Public/<?php echo ($res["0"]["logo"]); ?>" />
            </div>

            <div class="fu2">
                <span>*</span>
            </div>
        </div>

        <div class="name2">
            <div class="ming">
                <input type="text" name="mingch" class="mingch" value="<?php echo ($res["0"]["mingch"]); ?>" placeholder="商家名称">
               

            </div>

            <div class="fu">
                <span>*</span>
            </div>
        </div>

        <div class="name">
            <div class="ming">
                <input type="tel" name="tel" class="tel" value="<?php echo ($res["0"]["tel"]); ?>" placeholder="餐厅服务电话">
            </div>

            <div class="fu">
                <span>*</span>
            </div>
        </div>

        <!-- <div class="name2">
            <div class="ming">
                <input type="text" placeholder="所属城市">
            </div>

            <div class="fu">
                <span>*</span>
            </div>
        </div> -->

        <div class="name2">
            <div class="ming" onclick="one()">
                <input type="text" name="jutidizhi" class="jutidizhi" value="<?php echo ($res["0"]["jutidizhi"]); ?>"  placeholder="具体地址">
            </div>

            <div class="fu">
                <span>*</span>
            </div>
        </div>

        <div class="name2">
            <div class="ming">
                 <select style="margin-left: 2%;" name="time_kai">
                    <option value="">开始时间</option>
                    <?php if(is_array($restime)): foreach($restime as $key=>$vorestime): if($vorestime["name"] == $res[0][time_kai]): ?><option value="<?php echo ($vorestime["name"]); ?>" selected="selected"><?php echo ($vorestime["name"]); ?></option>
                        <?php else: ?>
                            <option value="<?php echo ($vorestime["name"]); ?>"><?php echo ($vorestime["name"]); ?></option><?php endif; endforeach; endif; ?>
                </select>
                <select name="time_zhong">
                    <option value="">结束时间</option>
                     <?php if(is_array($restime)): foreach($restime as $key=>$vorestime): if($vorestime["name"] == $res[0][time_zhong]): ?><option value="<?php echo ($vorestime["name"]); ?>" selected="selected"><?php echo ($vorestime["name"]); ?></option>
                        <?php else: ?>
                            <option value="<?php echo ($vorestime["name"]); ?>"><?php echo ($vorestime["name"]); ?></option><?php endif; endforeach; endif; ?>
                </select>
            </div>

            <div class="fu">
                <span>*</span>
            </div>
        </div>

        <div class="name2">
        <div class="ming">
            <input type="text" placeholder="菜品类型" style="width: 48%;">
            <select name="type_shop">
                     <?php if(is_array($resfoodtype)): foreach($resfoodtype as $key=>$voresfoodtype): if($voresfoodtype["id"] == $res[0][type_shop]): ?><option value="<?php echo ($voresfoodtype["id"]); ?>" selected="selected"><?php echo ($voresfoodtype["mingch"]); ?>
                        <?php else: ?>
                            <option value="<?php echo ($voresfoodtype["id"]); ?>"><?php echo ($voresfoodtype["mingch"]); endif; ?>
                        </option><?php endforeach; endif; ?>
                </select>
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

        <div class="name2">
            <div class="ming">
                <input name="maney" type="tel" class="maney" value="<?php echo ($res["0"]["maney"]); ?>" placeholder="人均消费">
            </div>

            <div class="fu">
                <span>*</span>
            </div>
        </div>

    </div>
    <!-- 地图开 -->
    <div id="light" class="white_content" >
    <div class="int">
        <div class="tt">
            <input type="text" id="text_" placeholder="请输入您的城市">
        </div>

        <div class="cha">
            <div class="cz">
                <span onclick="searchByStationName();">查找</span>
            </div>
        </div>
        查询结果(经度)：<input id="result_lng" name="baidu_lng" type="text" />
        查询结果(纬度)：<input id="result_lat" name="baidu_lat" type="text" />
    </div>

    <div class="dt" id="container" ></div>
    <div class="sj"></div>
    <div class="dl" >
        <!-- <div class="dili">
            <span>鑫水园</span>
        </div> -->

        <!-- <div class="ddi">
            <div class="da">
                <span>绿色家园</span>
            </div>

            <div class="xiao">
                <span>河北省石家庄市长安区建明南路1</span>
            </div>
            <div style="margin-top: -10%;margin-left: 90%;display: none;">
                <img style="width: 80%;" src="/kuaidian/Public/home/img/dizhi.png">
            </div>
        </div> -->
    </div>
    <div class="qu" onclick="two()">
        <span>
            确定
        </span>
    </div>
</div>

<div id="fade" class="black_overlay"></div>
    <!-- 地图尾 -->
    <div class="kong"></div>

    <div class="kong2"></div>

    <div class="foot">
        <span id="submitadd">确认提交</span>
    </div>
</form>
</body>
<!-- 地图 -->
    <script src="/kuaidian/Public/home/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=T9Upu0sWr9Grt4EknLsa9DbU9emQlRYj"></script>
<script type="text/javascript">
    function one(){
        document.getElementById('light').style.display='block';
        document.getElementById('fade').style.display='block'
    };
    function two(){
        document.getElementById('light').style.display='none';
        document.getElementById('fade').style.display='none';
        var dtdizhi = $("#text_").val();
        // alert(dtdizhi);
        $(".jutidizhi").val(dtdizhi);
        return false;
    };
</script>
<!-- 附近商家 -->
<script type="text/javascript">
    //点击商家
    $(document).on("click",".ddi",function(){
        $(".shangjiatu").css("display","none");
        $(this).find(".shangjiatu").css("display","block");
        var sjdjlng = $(this).find(".sjdjlng").html();
        var sjdjlat = $(this).find(".sjdjlat").html();
        //赋值
        $("#result_lng").val(sjdjlng);
        $("#result_lat").val(sjdjlat);
        // alert(sjdjlat);
    });
    var map = new BMap.Map("container");
    map.centerAndZoom("石家庄", 20);
    /**
     * 点击效果
     * @param  {[type]} e){                     x [description]
     * @return {[type]}      [description]
     */
    map.addEventListener("onclick",function(e){
        x = e.point.lng;
        y = e.point.lat;
        // ajax 查询附近商家
        $.ajax({
            type:'post',
            dataType: 'json',
            url:'<?php echo U("Merch/Shopset/ajaxfjsj");?>',
            data:{"x":x,"y":y},
            success: function (dd) {
                console.log(dd);
                var str = "";
                $.each(dd.result.pois,function(index,item){
                    str += '<div class="ddi"><div class="da"><span>'+item.name+'</span></div><div class="xiao"><span>'+item.addr+'</span><span class="sjdjlng">'+item.point.x+'</span><span class="sjdjlat">'+item.point.y+'</span></div><div style="margin-top: -10%;margin-left: 90%;display: none;" class="shangjiatu"><img style="width: 80%;" src="/kuaidian/Public/home/img/dizhi.png"></div></div>'
                    // console.log(item.point);经纬度
                });
                $(".dl").html(str);
                // console.log(dd.result.pois.poiType);
                // console.log(dd.result.pois.point);
            }
        })
        var xiugai = confirm("经度修改为："+x + "\n维度修改为：" +y);
        if (xiugai) {
            //赋值经纬度
            document.getElementById("result_lng").value = x;
        document.getElementById("result_lat").value = y;
            //添加标注
            var point = new BMap.Point(e.point.lng, e.point.lat); //将标注点转化成地图上的点
            var marker = new BMap.Marker(point); //将点转化成标注点
            map.addOverlay(marker);  //将标注点添加到地图上
            //清除其他标注
            var allOverlay = map.getOverlays();
            for (var i = 0; i < allOverlay.length -1; i++){
                // alert(allOverlay[i].map.gf.lng);
                if(allOverlay[i].map.gf.lng != x){
                    map.removeOverlay(allOverlay[i]);
                    // return false;
                }
            }
        }
        // alert(e.point.lng + "," + e.point.lat);
    });
    map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
    map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用

    map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
    map.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
    map.addControl(new BMap.OverviewMapControl({ isOpen: true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT }));   //右下角，打开

    var localSearch = new BMap.LocalSearch(map);
    localSearch.enableAutoViewport(); //允许自动调节窗体大小
function searchByStationName() {
    map.clearOverlays();//清空原来的标注
    var keyword = document.getElementById("text_").value;
    localSearch.setSearchCompleteCallback(function (searchResult) {
        var poi = searchResult.getPoi(0);
        document.getElementById("result_lng").value = poi.point.lng;
        document.getElementById("result_lat").value = poi.point.lat;
        map.centerAndZoom(poi.point, 20);
        var marker = new BMap.Marker(new BMap.Point(poi.point.lng, poi.point.lat));  // 创建标注，为要查询的地方对应的经纬度
        map.addOverlay(marker);
        var content = document.getElementById("text_").value + "<br/><br/>经度：" + poi.point.lng + "<br/>纬度：" + poi.point.lat;
        var infoWindow = new BMap.InfoWindow("<p style='font-size:14px;'>" + content + "</p>");
        marker.addEventListener("click", function () { this.openInfoWindow(infoWindow); });
        // marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
    });
    localSearch.search(keyword);
} 
</script>
    <script type="text/javascript">
        // 提交表单
        $("#submitadd").click(function(){
            var mingch = $(".mingch").val();
            var tel = $(".tel").val();
            var jutidizhi = $(".jutidizhi").val();
            var maney = $(".maney").val();
            if (mingch && tel && jutidizhi && maney) {
                $("#formadd").submit();
            }else{
                alert("信息不完整");
            }
        })
        // $(document).on("click","#submitadd",function(){
        //     // 判断信息是否为空
        //     var mingch = $(".mingch").val();
        //     var tel = $(".tel").val();
        //     var jutidizhi = $(".jutidizhi").val();
        //     var maney = $(".maney").val();
        //     if (mingch && tel && jutidizhi && maney) {
        //         $("#formadd").submit();
        //     }else{
        //         alert("信息不完整");
        //     }
            
        // });
    </script>
</html>