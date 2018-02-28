<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>管理分类</title>
    <link rel="stylesheet" href="/-/Public/merch/css/base.css">
    <link rel="stylesheet" href="/-/Public/merch/css/text.css">
    <link rel="stylesheet" href="/-/Public/merch/css/guanlifenlei.css">
     <script type="text/javascript" src="/-/Public/merch/js/jquery-1.12.4.min.js"></script>
</head>
<body style="font-size: 12px">
    <div class="header">
        <div class="head">
            <?php if(is_array($resft)): foreach($resft as $key=>$voresft): ?><div class="top">
                    <div class="topz">
                        <div class="dan">
                            <span><?php echo ($voresft["mingch"]); echo ($voresft["zhushi"]); ?></span>
                        </div>

                        <div class="jige">
                            <span><?php echo ($voresft["foodcount"]); ?>个商品</span>
                        </div>
                    </div>

                    <div class="topy">
                        <div class="kuang">
                            <a href="<?php echo U('Merch/Foodshophoutai/editfoodtype',array('ftid'=>$voresft[id]));?>"><span>编辑</span></a>
                        </div>
                    </div>

                    <div class="topy">
                        <div class="kuang">
                            <a href="<?php echo U('Merch/Foodhoutai/addfood');?>"><span>新建商品</span></a>
                        </div>
                    </div>
                </div><?php endforeach; endif; ?>
        </div>
    </div>

    <div class="footer">
        <a href="<?php echo U('Merch/Foodshophoutai/addfoodtype',array('shopid'=>$shopid));?>"><span>+&nbsp;新建分类</span></a>
    </div>
</body>
</html>