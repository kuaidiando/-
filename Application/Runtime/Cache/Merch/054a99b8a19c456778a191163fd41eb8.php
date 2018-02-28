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
            <div class="ming">
                <input type="text" name="jutidizhi" class="jutidizhi" value="<?php echo ($res["0"]["jutidizhi"]); ?>" placeholder="具体地址">
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

    <div class="kong"></div>

    <div class="kong2"></div>

    <div class="foot">
        <span id="submitadd">确认提交</span>
    </div>
</form>
</body>
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