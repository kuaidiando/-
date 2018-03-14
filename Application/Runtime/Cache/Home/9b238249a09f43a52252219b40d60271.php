<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>根据地址查询经纬度</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <script src="/kuaidian/Public/home/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=T9Upu0sWr9Grt4EknLsa9DbU9emQlRYj"></script>
</head>
<body >
    <div style="width:730px;margin:auto;">   
        要查询的地址：<input id="text_" type="text" value="石家庄" style="margin-right:100px;"/>  <input type="button" value="查询" onclick="searchByStationName();"/>
        <br>
        查询结果(经度)：<input id="result_lng" type="text" />
        查询结果(纬度)：<input id="result_lat" type="text" />
      
        <div id="container" 
            style="position: absolute;
                margin-top:30px; 
                width: 730px; 
                height: 590px; 
                top: 50; 
                border: 1px solid gray;
                overflow:hidden;">
        </div>
    </div>
</body>
<script type="text/javascript">
    var map = new BMap.Map("container");
    map.centerAndZoom("石家庄", 15);
    /**
     * 点击效果
     * @param  {[type]} e){                     x [description]
     * @return {[type]}      [description]
     */
    map.addEventListener("onclick",function(e){
        x = e.point.lng;
        y = e.point.lat;
       
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
        map.centerAndZoom(poi.point, 13);
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
</html>