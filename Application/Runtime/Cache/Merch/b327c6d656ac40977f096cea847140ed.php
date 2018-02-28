<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>编辑分类</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/bianji.css">
    <script type="text/javascript" src="/kuaidian/Public/merch/js/jquery-1.12.4.min.js"></script>
</head>
<body style="font-size: 12px">
<!-- 删除表单 -->
<form  action="<?php echo U('Merch/Foodshophoutai/delfoodtype');?>" id="shanchuleix" method="post">
<!-- 类型id -->
            <input type="text" name="ftid"  style="display: none;" value="<?php echo ($resft["0"]["id"]); ?>">
            <!-- 门店id -->
            <input type="text" name="shopid"  style="display: none;" value="<?php echo ($resft["0"]["dep_type"]); ?>">
</form>
<!-- 修改表单 -->
<form  action="<?php echo U('Merch/Foodshophoutai/doeditfoodtype');?>" id="tijiaoft" method="post" enctype="multipart/form-data">
    <div class="fen">
        <div class="lei">
            <!-- 类型id -->
            <input type="text" name="ftid"  style="display: none;" value="<?php echo ($resft["0"]["id"]); ?>">
            <!-- 门店id -->
            <input type="text" name="shopid"  style="display: none;" value="<?php echo ($resft["0"]["dep_type"]); ?>">

            <span>分类名称</span>
        </div>
    </div>

    <div class="dan">
        <div class="bian">
            <input type="text" class="mingch" name="mingch" value="<?php echo ($resft["0"]["mingch"]); ?>" placeholder="单品分类">
        </div>
    </div>

    <div class="miao">
        <div class="shu">
            <span>分类描述</span>
        </div>
    </div>

    <div class="text">
        <div class="txt">
            <textarea name="zhushi" style="width: 100%;" cols="100" rows="10" placeholder="请输入分类描述，最多200字"><?php echo ($resft["0"]["zhushi"]); ?></textarea>
        </div>
    </div>

    <div class="footer">
        <div class="foot">
            <span class="delfoodtype">删除</span>
        </div>

        <div class="foot2" >
            <span class="addfoodtype">保存</span>
        </div>
    </div>
</form>
</body>
    <script type="text/javascript">
        // 提交
        $(".addfoodtype").click(function(){
            var mingch = $('.mingch').val();
            if (mingch) {
                $("#tijiaoft").submit();
            }else{
                alert("分类名称不为空");
            }
            
        });
        //删除
        $(".delfoodtype").click(function(){
            $("#shanchuleix").submit();
        });
    </script>
</html>