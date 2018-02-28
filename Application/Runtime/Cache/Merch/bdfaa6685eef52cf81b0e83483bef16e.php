<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>认证资质</title>
    <link rel="stylesheet" href="/-/Public/merch/css/base.css">
    <link rel="stylesheet" href="/-/Public/merch/css/text.css">
    <link rel="stylesheet" href="/-/Public/merch/css/zizhi.css">
    <script type="text/javascript" src="/-/Public/jquery/jquery.js"></script>
    <!-- 图片上传 -->
     <style type="text/css">
     /*图片一*/
        #preview{
            width: 180px;
            height: 183px;
            overflow: hidden;
        }
        #imghead{
            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
        }
        /*图片二*/
        #preview1{
            width: 180px;
            height: 183px;
            overflow: hidden;
        }
        #imghead1{
            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
        }
        /*图片三*/
        #preview2{
            width: 180px;
            height: 183px;
            overflow: hidden;
        }
        #imghead2{
            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
        }
    </style>
    <!-- 图片1 -->
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

    <!-- 图片2 -->
    <script type="text/javascript">
        function previewImage1(file) {
            var MAXWIDTH = 180;
            var MAXHEIGHT = 180;
            var div = document.getElementById('preview1');
            if (file.files && file.files[0]) {
                div.innerHTML = '<img id=imghead1>';
                var img = document.getElementById('imghead1');
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
                div.innerHTML = '<img id=imghead1>';
                var img = document.getElementById('imghead1');
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
    <!-- 图片3 -->
    <script type="text/javascript">
        function previewImage2(file) {
            var MAXWIDTH = 180;
            var MAXHEIGHT = 180;
            var div = document.getElementById('preview2');
            if (file.files && file.files[0]) {
                div.innerHTML = '<img id=imghead2>';
                var img = document.getElementById('imghead2');
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
                div.innerHTML = '<img id=imghead2>';
                var img = document.getElementById('imghead2');
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
<body style="font-size: 12px">
<form class="form form-horizontal" id="formadd" action="<?php echo U('Merch/Shopset/addgaojixx');?>" method="post" enctype="multipart/form-data">
<div class="head">
    <span>认证资质</span>
    <!-- 门店id -->
        <input type="text" name="shopid" value="<?php echo ($shopid); ?>" style="display:none;">
        <!-- 隐藏基本信息状态 -->
        <input type="text" name="zhuangt" style="display: none;" value="1">
</div>

<div class="big">
    <div class="ying">
        <div class="zhi">
            <span>营业执照</span>
        </div>
    </div>

    <div class="name">
        <div class="ming">
            <input type="text" name="ren_yingyezhizmingch" value="<?php echo ($res["0"]["ren_yingyezhizmingch"]); ?>" placeholder="名称">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_yingyezhizjingyingz" value="<?php echo ($res["0"]["ren_yingyezhizjingyingz"]); ?>" placeholder="法定代表人/经营者">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_yingyehaoma" value="<?php echo ($res["0"]["ren_yingyehaoma"]); ?>" placeholder="营业执照注册号">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_jingyingdizhi" value="<?php echo ($res["0"]["ren_jingyingdizhi"]); ?>" placeholder="经营地址">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_jingyingfanwei" value="<?php echo ($res["0"]["ren_jingyingfanwei"]); ?>" placeholder="经营范围">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="zhao">
        <div class="tet">
            <input type="text" style="width: 41%;" placeholder="营业执照照片">
                <!-- 图片上传 -->
                <input type="file" name="ren_yingyelogo" style="position:absolute;opacity:0;width: 60%" onchange="previewImage(this)" />
        </div>

        <div class="tu" id="preview">
            <img id="imghead" border=0 src="/-/Public<?php echo ($res["0"]["ren_yingyelogo"]); ?>" alt="">
        </div>

        <div class="fu2">
            <span>*</span>
        </div>
    </div>
</div>
<div class="kong"></div>

<div class="geren">
    <div class="ying">
        <div class="zhi">
            <span>餐饮服务许可证</span>
        </div>
    </div>

    <div class="name">
        <div class="ming">
            <input type="text" name="ren_cyxukezhenghaom" value="<?php echo ($res["0"]["ren_cyxukezhenghaom"]); ?>" placeholder="请填写许可证编号">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_fuwuxukezhengfaren" value="<?php echo ($res["0"]["ren_fuwuxukezhengfaren"]); ?>"  placeholder="请填写法定代表人">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_fuwuxukezhenggongsi" value="<?php echo ($res["0"]["ren_fuwuxukezhenggongsi"]); ?>" placeholder="请填写公司名称">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_fuwuxukezhengdizhi" value="<?php echo ($res["0"]["ren_fuwuxukezhengdizhi"]); ?>" placeholder="请填写许可证件地址">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="zhao">
        <div class="tet">
            <input type="text" style="width: 41%;" placeholder="许可证照片">
                <!-- 图片上传 -->
                <input type="file" name="ren_cyxukelogo" style="position:absolute;opacity:0;width: 60%" onchange="previewImage1(this)" />
        </div>

        <div class="tu" id="preview1">
            <img id="imghead1" border=0 src="/-/Public<?php echo ($res["0"]["ren_cyxukelogo"]); ?>" alt="">
        </div>

        <div class="fu2">
            <span>*</span>
        </div>
    </div>
</div>
<div class="kong"></div>

<div class="geren">
    <div class="ying">
        <div class="zhi">
            <span>法人信息</span>
        </div>
    </div>

    <div class="name">
        <div class="ming">
            <input type="text" name="faren_lianxiren" value="<?php echo ($res["0"]["faren_lianxiren"]); ?>"  placeholder="请填联系人">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="faren_tel" value="<?php echo ($res["0"]["faren_tel"]); ?>"  placeholder="请填写联系电话">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="faren_sfzzhengjianhao" value="<?php echo ($res["0"]["faren_sfzzhengjianhao"]); ?>" placeholder="请填写身份证证件号">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="faren_sfzyouq" value="<?php echo ($res["0"]["faren_sfzyouq"]); ?>"  placeholder="请填写身份证有效期限">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="zhao">
        <div class="tet">
            <input type="text" style="width: 41%;" placeholder="身份证照片">
                <!-- 图片上传 -->
                <input type="file" name="faren_sfzzheng" style="position:absolute;opacity:0;width: 60%" onchange="previewImage2(this)" />
        </div>

        <div class="tu" id="preview2">
            <img id="imghead2" border=0 src="/-/Public<?php echo ($res["0"]["faren_sfzzheng"]); ?>" alt="">
        </div>

        <div class="fu2">
            <span>*</span>
        </div>
    </div>
</div>
<div class="kong"></div>

<div class="kong2"></div>

<div class="foot">
    <button>确认提交</button>
    <!-- <span id="submitadd">确认提交</span> -->
</div>
</form>
</body>
     <script type="text/javascript">
        // 提交表单
        $(document).on("click","#submitadd",function(){
            $("#formadd").submit();
        });
    </script>
</html>