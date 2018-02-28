<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>自定义添加商品</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/zidingyi.css">
    <script type="text/javascript" src="/kuaidian/Public/merch/js/jquery-1.12.4.min.js"></script>
    <!-- 图片上传 -->
     <style type="text/css">
     /*图片一*/
        #preview{
            width: 180px;
            height: 150px;
            overflow: hidden;
        }
        #imghead{
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
</head>
<body style="font-size: 12px">
<!-- 删除表单 -->
<form  action="<?php echo U('Merch/Foodhoutai/delfood');?>" id="zhixingshanchu" method="post" enctype="multipart/form-data">
    <!-- 隐藏菜品id -->
    <input style="display: none;" type="text" name="foodid" value="<?php echo ($resfood["0"]["id"]); ?>">
    <input style="display: none;" type="text" name="shopid" value="<?php echo ($resfood["0"]["dep_shop"]); ?>">
</form>
<!-- 修改表单 -->
<form  action="<?php echo U('Merch/Foodhoutai/doeditfood');?>" id="zhixingxiugai" method="post" enctype="multipart/form-data">
    <div class="header">
        <div class="head">
            <div class="top" style="margin-top: 5px;">
                <div class="shang">
                    <!-- 隐藏菜品id -->
                    <input style="display: none;" type="text" name="foodid" value="<?php echo ($resfood["0"]["id"]); ?>">
                    <!-- 隐藏门店id -->
                    <input style="display: none;" type="text" name="shopid" value="<?php echo ($resfood["0"]["dep_shop"]); ?>">
                    <span>商品名称</span>
                </div>

                <div class="fu">
                    <span>*</span>
                </div>

                <div class="zi">
                    <input type="text" name="mingch" value="<?php echo ($resfood["0"]["mingch"]); ?>" placeholder="30字以内">
                </div>
            </div>

            <div class="center">
                <div class="ttop">
                    <div class="zuo">
                        <div class="she">
                            <span>图片设置</span>
                        </div>

                        <div class="tu">
                            <span>图片需大于600×450像素</span>
                        </div>
                    </div>
                    <!-- 图片上传 -->
                <input type="file" name="logo" style="position:absolute;opacity:0;width: 20%;height: 8%;" onchange="previewImage(this)" />
                    <div class="you">
                       <div class="tupian" id="preview">
                            <img id="imghead" border=0 src="/kuaidian/Public<?php echo ($resfood["0"]["logo"]); ?>"  alt="">
                       </div>
                    </div>
                </div>

                <div class="xia">
                    <div class="fen">
                        <span>商品分类</span>
                    </div>
                    
                    <div class="fu">
                        <span>*</span>
                    </div>
                    
                    <div class="dan">
                        <select class="rr" name="food_type">
                            <?php if(is_array($resfoodtype)): foreach($resfoodtype as $key=>$voresfoodtype): ?><option value="<?php echo ($voresfoodtype["id"]); ?>" <?php if($voresfoodtype['id'] == $resfood[0]['food_type']): ?>selected="selected"<?php endif; ?> ><?php echo ($voresfoodtype["mingch"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    
                    <div class="jian">
                        <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
                    </div>
                </div>
            </div>

            <div class="bot">
                <div class="miao">
                    <span>商品描述</span>
                </div>
                
                <div class="nei">
                    <span><a href="<?php echo U('Merch/Foodhoutai/shangpinmiaoshu',array('shopid'=>$resfood[0]['dep_shop'],'foodid'=>$resfood[0]['id']));?>"><?php echo ($resfood["0"]["miaoshu"]); ?></a></span>
                </div>
                
                <div class="jian">
                    <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="di">
        <div class="ddi">
            <div class="dis">
                <div class="jia">
                    <span>原价</span>
                </div>

                <div class="fu">
                    <span>*</span>
                </div>

                <div class="tian">
                    <input type="text" name="jiage" value="<?php echo ($resfood["0"]["jiage"]); ?>" placeholder="请填写价格">
                </div>
            </div>

            <div class="diz">
                <div class="yuan">
                    <span>售价</span>
                </div>

                <div class="yj">
                    <input type="text" name="jiage_youhui" value="<?php echo ($resfood["0"]["jiage_youhui"]); ?>" placeholder="请填写原价">
                </div>
            </div>

            <div class="did">
                <div class="wei">
                    <span>商品单位</span>
                </div>

                <div class="xuan">
                    <select class="rr" name="dwid">
                            <?php if(is_array($resdanw)): foreach($resdanw as $key=>$voresdanw): ?><option value="<?php echo ($voresdanw["id"]); ?>" <?php if($voresdanw['id'] == $resfood[0]['dwid']): ?>selected="selected"<?php endif; ?> ><?php echo ($voresdanw["mingch"]); ?></option><?php endforeach; endif; ?>
                        </select>
                </div>
            </div>
        </div>
    </div>



    <div class="footer">
        <div class="foot" style="color: red;">
            <span class="delfood">删除</span>
        </div>

        <div class="foot2">
            <span id="dodeit">保存</span>
        </div>
    </div>
</form>
</body>
    <script type="text/javascript">
        //执行修改
        $("#dodeit").click(function(){
            $("#zhixingxiugai").submit();
        });
        //执行删除
        $(".delfood").click(function(){
            $("#zhixingshanchu").submit();

        });
    </script>
</html>