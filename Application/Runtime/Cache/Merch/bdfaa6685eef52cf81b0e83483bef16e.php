<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>认证资质</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/zizhi.css">
    <script type="text/javascript" src="/kuaidian/Public/jquery/jquery.js"></script>
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

    <!-- 图片1 -->
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
</head>
<body style="font-size: 12px">
<div class="head">
    <span>认证资质</span>
</div>

<div class="big">
    <div class="ying">
        <div class="zhi">
            <span>营业执照<?php echo ($shopid); ?></span>
        </div>
    </div>

    <div class="name">
        <div class="ming">
            <input type="text" name="ren_yingyezhizmingch" placeholder="名称">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_yingyezhizjingyingz" placeholder="法定代表人/经营者">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_yingyehaoma" placeholder="营业执照注册号">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_jingyingdizhi" placeholder="经营地址">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_jingyingfanwei" placeholder="经营范围">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="zhao">
        <div class="tet">
            <input type="text" style="width: 41%;" placeholder="营业执照照片">
                <!-- 图片上传 -->
                <input type="file" name="ren_yingyelogo" style="position:absolute;opacity:0;width: 100%" onchange="previewImage(this)" />
        </div>

        <div class="tu" id="preview">
            <img id="imghead" border=0 src="/kuaidian/Public/merch/images/xinagji.png" alt="">
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
            <input type="text" name="ren_cyxukezhenghaom" placeholder="请填写许可证编号">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_fuwuxukezhengfaren" placeholder="请填写法定代表人">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_fuwuxukezhenggongsi" placeholder="请填写公司名称">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" name="ren_fuwuxukezhengdizhi" placeholder="请填写许可证件地址">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="zhao">
        <div class="tet">
            <input type="text" style="width: 41%;" placeholder="门店照片">
                <!-- 图片上传 -->
                <input type="file" name="logo" style="position:absolute;opacity:0;width: 100%" onchange="previewImage1(this)" />
        </div>

        <div class="tu" id="preview1">
            <img id="imghead1" border=0 src="/kuaidian/Public/merch/images/xinagji.png" alt="">
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
            <input type="text" placeholder="请填联系人">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" placeholder="请填写联系电话">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" placeholder="请填写身份证证件号">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="name2">
        <div class="ming">
            <input type="text" placeholder="请填写身份证有效期限">
        </div>

        <div class="fu">
            <span>*</span>
        </div>
    </div>

    <div class="zhao">
        <div class="tet">
            <input type="text" placeholder="法人手持身份证照片(点击图片上传)">
        </div>

        <div class="tu">
            <img src="/kuaidian/Public/merch/images/xinagji.png" alt="">
        </div>

        <div class="fu2">
            <span>*</span>
        </div>
    </div>
</div>
<div class="kong"></div>

<div class="kong2"></div>

<div class="foot">
    <span>确认提交</span>
</div>
</body>
</html>