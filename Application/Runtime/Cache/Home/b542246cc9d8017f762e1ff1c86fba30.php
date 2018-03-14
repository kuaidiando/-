<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
  
  </head>
  <body>
     <div id="allmap"></div>
  </body>
  <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
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
        console.log(JSON.stringify(res));
        // alert(x);
        // alert(y);
        /**
         * 转化为百度坐标114.5395238.03647
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
            console.log(data);
             console.log(data.points['0'].lat);
             console.log(data.points['0'].lng);
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
  <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=T9Upu0sWr9Grt4EknLsa9DbU9emQlRYj"></script>
    <!-- <script type="text/javascript">
    // 百度地图API功能
    //GPS坐标
    // var x = 114.53652;
    // var y = 38.037556;
    alert(123);
    var ggPoint = new BMap.Point(x,y);

    //地图初始化
    var bm = new BMap.Map("allmap");
    bm.centerAndZoom(ggPoint, 15);
    bm.addControl(new BMap.NavigationControl());

    //添加gps marker和label
    var markergg = new BMap.Marker(ggPoint);
    bm.addOverlay(markergg); //添加GPS marker
    var labelgg = new BMap.Label("未转换的GPS坐标（错误）",{offset:new BMap.Size(20,-10)});
    markergg.setLabel(labelgg); //添加GPS label

    //坐标转换完之后的回调函数
    translateCallback = function (data){
      if(data.status === 0) {
        var marker = new BMap.Marker(data.points[0]);
        bm.addOverlay(marker);
        var label = new BMap.Label("转换后的百度坐标（正确）",{offset:new BMap.Size(20,-10)});
        console.log(data);
         console.log(data.points['0'].lat);
         console.log(data.points['0'].lng);
        marker.setLabel(label); //添加百度label
        bm.setCenter(data.points[0]);
      }
    }

    setTimeout(function(){
        var convertor = new BMap.Convertor();
        var pointArr = [];
        pointArr.push(ggPoint);
        convertor.translate(pointArr, 1, 5, translateCallback)
    }, 1000);
</script> -->
  
</html>