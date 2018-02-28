<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>编辑分类</title>
    <link rel="stylesheet" href="/-/Public/merch/css/base.css">
    <link rel="stylesheet" href="/-/Public/merch/css/text.css">
    <link rel="stylesheet" href="/-/Public/merch/css/bianji.css">
    <script type="text/javascript" src="/-/Public/merch/js/jquery-1.12.4.min.js"></script>
</head>
<body style="font-size: 12px">
<form  action="<?php echo U('Merch/Foodshophoutai/doaddfoodtype');?>" id="tijiaoft" method="post" enctype="multipart/form-data">
    <div class="fen">
        <div class="lei">
            <input type="text" name="dep_type"  style="display: none;" value="<?php echo ($shopid); ?>">
            <span>分类名称</span>
        </div>
    </div>

    <div class="dan">
        <div class="bian">
            <input type="text" class="mingch" name="mingch" placeholder="单品分类">
        </div>
    </div>

    <div class="miao">
        <div class="shu">
            <span>分类描述</span>
        </div>
    </div>

    <div class="text">
        <div class="txt">
            <textarea name="zhushi" style="width: 100%;"cols="100" rows="10" placeholder="请输入分类描述，最多200字"></textarea>
        </div>
    </div>

    <div class="footer">
        <!-- <div class="foot">
            <span>删除</span>
        </div> -->

        <div class="foot2" style="width: 100%;color: #fff; background-color: #097f7e;">
            <span class="addfoodtype">保存</span>
        </div>
    </div>
</form>
</body>
    <script type="text/javascript">
        $(".addfoodtype").click(function(){
            var mingch = $('.mingch').val();
            if (mingch) {
                $("#tijiaoft").submit();
            }else{
                alert("分类名称不为空");
            }
            
        });
    </script>
</html>