<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 $("dd").hide();
 $("dt a").click(function(){
 $(this).parent().toggleClass("bg");
 $(this).parent().prevAll("dt").removeClass("bg")
 $(this).parent().nextAll("dt").removeClass("bg")
 $(this).parent().next().slideToggle();
 $(this).parent().prevAll("dd").slideUp("slow");
 $(this).parent().next().nextAll("dd").slideUp("slow");
 return false;
});
});
</script>
<!-- <script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.cookie/jquery.cookie.js"></script>
 -->
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui/css/H-ui.min.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/css/H-ui.admin.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/lib/icheck/icheck.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/css/style.css"/>
<!-- <link rel="stylesheet" type="text/css" href="/kuaidian/Public/css/hidTable.css"/> -->
<!-- 分页效果 -->
<!-- <link href="/kuaidian/Public/css/mypage.css" rel="stylesheet" type="text/css"/> -->
<title>快点</title>
<script type="text/javascript">
    $(document).on("click",".shopin",function(){
        //获取城市对应id
        var chengshiid = $("#choose").val();
        // 页面跳转
        var url = $(this).attr("name")+"?id="+chengshiid;
        window.location.replace(url);
    });
</script>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        #l-map{height:300px;width:100%;}
        #r-result{width:100%;}
    </style>
</head>
<body>

<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=T9Upu0sWr9Grt4EknLsa9DbU9emQlRYj"></script>
<article class="page-container">
    <form class="form form-horizontal" id="form-article-add" action="<?php echo U('Admin/Shop/add');?>" method="post" enctype="multipart/form-data">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="mingch">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">LOGO：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="uploader-thum-container">
                    <input type="file" name="logo">
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">手机号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder=""  name="tel">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">人均消费：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="maney">
            </div>
        </div>



        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">营业时间：</label>
            <div class="formControls col-xs-8 col-sm-9" >
                <select name="time_kai" class="select" style="width: 25%;" id="">
                    <?php if(is_array($restime)): foreach($restime as $key=>$votime): ?><option value="<?php echo ($votime["id"]); ?>"><?php echo ($votime["name"]); ?></option><?php endforeach; endif; ?>
                </select>
                &nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;&nbsp;
                <select name="time_zhong" class="select" style="width: 25%;" id="">
                    <?php if(is_array($restime)): foreach($restime as $key=>$votime): ?><option value="<?php echo ($votime["id"]); ?>"><?php echo ($votime["name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属城市：</label>
            <!-- 省 -->
            <div class="formControls col-xs-8 col-sm-9" style="width: 25%;">
                <span class="select-box">
                <select name="depcsjlsheng"  class="select" id="selsheng">
                    <?php if(is_array($ressheng)): foreach($ressheng as $key=>$vocssheng): ?><option value="<?php echo ($vocssheng["code"]); ?>"><?php echo ($vocssheng["name"]); ?></option><?php endforeach; endif; ?>
                </select>
                </span>
            </div>
            <!-- 市 -->
            <div class="formControls col-xs-8 col-sm-9" id="jlshixianshi" style="width: 25%;">
                <!-- <span class="select-box">
                <select name="depcsjlshi"  class="select" id="selshi">
                        <option value=""></option>
                </select>
                </span> -->
            </div>
            <!-- 县区 -->
            <div class="formControls col-xs-8 col-sm-9" id="jlquxianshi" style="width: 25%;">
                <!-- <span class="select-box">
                <select name="depcsjlxian"  class="select" id="selqu">
                    <option ></option>
                </select>
                </span> -->
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否发布：</label>
            <div class="formControls col-xs-8 col-sm-9">
                是&nbsp;&nbsp;<input type="radio"  value="1" name="zhuangt" checked="checked">
                否&nbsp;&nbsp;<input type="radio"  value="2" name="zhuangt">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否在线：</label>
            <div class="formControls col-xs-8 col-sm-9">
                是&nbsp;&nbsp;<input type="radio"  value="1" name="line_type" checked="checked">
                否&nbsp;&nbsp;<input type="radio"  value="2" name="line_type">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>门店类别：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                <select name="type_shop" class="select">
                    <?php if(is_array($rescaipinlb)): foreach($rescaipinlb as $key=>$volb): ?><option value="<?php echo ($volb["id"]); ?>" ><?php echo ($volb["mingch"]); ?></option><?php endforeach; endif; ?>
                </select>
                </span>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">星图表数量：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="xingsl">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">佣金百分比：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="3" placeholder="" id="zuigaolij" name="zuigaolij">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">详细地址：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="123" placeholder="" id="suggestId" name="jutidizhi">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">经度：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" name="baidu_lng" id="baidu_lng">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">维度：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" name="baidu_lat" id="baidu_lat">
            </div>
        </div>
        <!-- 百度地图 -->
         <div id="l-map" style="margin-left: 17.5%;margin-top: 20px;width: 74%;"></div>

    <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
        <!-- 百度地图经度 -->
        <!-- <input type="text" value=""  name="baidu_lng" id="baidu_lng"> -->
        <!-- 百度地图维度 -->
        <!-- <input type="text" value="" name="baidu_lat" id="baidu_lat"> -->

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 添加</button>
            </div>
        </div>
    </form>
</article>
<script type="text/javascript">
    // 佣金比例
    $(document).on('input',"#zuigaolij",function(){
        var bili = $(this).val();
        if (bili) {
            if (bili < 3) {
                alert("佣金比例 最小为3%");
                $("#zuigaolij").val(3);
            }
        }
        
    });
    // 城市级联 省--》市
    $(document).on('click','#selsheng',function(){
        // alert(123);
        var codesheng = $(this).val();//获取省对应code
        var str = '<span class="select-box"><select name="depcsjlshi"  class="select" id="selshi">';//城市对应区域
        $.ajax({
            type:'post',
            dataType: 'json',
            url:'<?php echo U("Admin/Ajax/shengdoshi");?>',
            data:{codesheng:codesheng},
            success: function (dd) {
                console.log(dd);
                // 获取区域名称
                $.each(dd,function(index,item){
                    str += '<option value="'+item.code+'">'+item.name+'</option>'; 
                })
                str += '</select></span>';
                //赋值区域 市
                $("#jlshixianshi").html(str);
                // 清空区
                $("#jlquxianshi").html("");
            }
        })
    });
    // 城市级联 市--》县/区
    $(document).on('click','#selshi',function(){
        var codesheng = $(this).val();//获取市对应code
        var str = '<span class="select-box"><select name="depcsjlxian"  class="select" id="selqu">';//城市对应区域
        $.ajax({
            type:'post',
            dataType: 'json',
            url:'<?php echo U("Admin/Ajax/index");?>',
            data:{codesheng:codesheng},
            success: function (dd) {
                // 获取区域名称
                $.each(dd,function(index,item){
                    str += '<option value="'+item.code+'">'+item.name+'</option>'; 
                })
                str += '</select></span>';
                //赋值区域
                $("#jlquxianshi").html(str);
            }
        })
    });
</script>
    <!-- // 百度地图API功能 -->
    <!-- 搜索 -->
<script type="text/javascript">

    // 百度地图API功能
    // 定位
    function G(id) {
        return document.getElementById(id);
    }

    var map = new BMap.Map("l-map");
    map.enableScrollWheelZoom(true); //启用地图滚轮放大缩小
    map.centerAndZoom("石家庄",15);                   // 初始化地图,设置城市和地图级别。
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
            $("#baidu_lng").val(x);
            $("#baidu_lat").val(y);
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
    /**
     * 搜索效果
     * @type {BMap}
     */
    var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
        {"input" : "suggestId"
        ,"location" : map
    });

    ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
    var str = "";
        var _value = e.fromitem.value;
        var value = "";
        if (e.fromitem.index > -1) {
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }    
        str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;
        
        value = "";
        if (e.toitem.index > -1) {
            _value = e.toitem.value;
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }    
        str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
        G("searchResultPanel").innerHTML = str;
    });

    var myValue;
    ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
        // console.log(e);
    var _value = e.item.value;
        myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;
        // console.log(_value);
        setPlace();
    });

    function setPlace(){
        map.clearOverlays();    //清除地图上所有覆盖物
        function myFun(){
            var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
            //赋值经纬度
            $("#baidu_lng").val(pp.lng);
            $("#baidu_lat").val(pp.lat);
            // alert(pp.lng);//经度
            // alert(pp.lat);//维度
            map.centerAndZoom(pp, 18);
            map.addOverlay(new BMap.Marker(pp));    //添加标注
        }
        var local = new BMap.LocalSearch(map, { //智能搜索
          onSearchComplete: myFun
        });
        local.search(myValue);
    }
    
</script>

<script type="text/javascript" src="/kuaidian/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.form/jquery.form.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
    $("#menu_nav .menu_id").click(function () {
        var id = $(this).attr('data-id');
        $.cookie('active', id, {path: '/' });
    })
</script>
</body>
</html>