<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>商品描述</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <script type="text/javascript" src="/kuaidian/Public/merch/js/jquery-1.12.4.min.js"></script>
    <style type="text/css">
        .text{
            width: 100%;
            background-color: #fff;
        }
        .txt{
            width: 90%;
            margin-left: 5%;
        }
        .txt textarea{
            font-size: 33.6px;
            margin-top: 50px;
        }
        .footer{
            width: 100%;
            height: 100px;
            position: fixed;
            bottom: 0;
            line-height: 100px;
            text-align: center;
            background-color: #097f7e;
        }
        .footer span{
            font-size: 33.6px;
            color: #fff;
        }
    </style>
</head>
<body>
<form  action="<?php echo U('Merch/Foodhoutai/doeditshangpinmiaoshu');?>" id="zhixingxiugai" method="post" enctype="multipart/form-data">
    <div class="text">
        <!-- 隐藏菜品id -->
        <input style="display: none;" type="text" name="foodid" value="<?php echo ($resfood["0"]["id"]); ?>">
        <!-- 隐藏门店id -->
        <input style="display: none;" type="text" name="shopid" value="<?php echo ($resfood["0"]["dep_shop"]); ?>">
        <div class="txt">
            <textarea  name="miaoshu" id="" cols="100" rows="10" placeholder="介绍一下你的产品吧,200字以内就可以呦~"><?php echo ($resfood["0"]["miaoshu"]); ?></textarea>
        </div>
    </div>

    <div class="footer">
        <span class="baocun">保存</span>
    </div>
</form>
</body>
    <script type="text/javascript">
        $(".baocun").click(function(){
            $("#zhixingxiugai").submit();
        });
    </script>
</html>