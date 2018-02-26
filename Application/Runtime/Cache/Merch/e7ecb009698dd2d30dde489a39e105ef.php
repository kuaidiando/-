<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>门店设置</title>
    <link rel="stylesheet" href="/-/Public/merch/css/text.css">
    <link rel="stylesheet" href="/-/Public/merch/css/base.css">
    <link rel="stylesheet" href="/-/Public/merch/css/Settings.css">
</head>
<body style="font-size: 12px">
    <div class="head">
        <span>门店设置</span>
    </div>

    <a href="<?php echo U('Merch/Shopset/jibenxx',array('shopid'=>$shopid));?>">
        <div class="box">
            <div class="he">
                <div class="zi">
                    <span>基本信息</span>
                </div>

                <div class="qu">
                    <?php if($res[0][jinbenxxtype] == 1): ?><span>已完善</span>
                    <?php else: ?>
                     <span>去完善</span><?php endif; ?>
                </div>

                <div class="jian">
                    <img src="/-/Public/merch/images/youjiantou.png" alt="">
                </div>
            </div>
        </div>
    </a>

    <div class="box2">
        <div class="he2">
            <div class="zi">
                <span>员工管理</span>
            </div>

            <div class="qu">
                <span>去绑定</span>
            </div>

            <div class="jian">
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
            </div>
        </div>
    </div>

    <div class="box3">
        <div class="he3">
            <div class="zi3">
                <span>分堂出票</span>
            </div>

            <div class="bang">
                <span>(绑定员工可通过手机传输分票)</span>
            </div>

            <div class="qu">
                <span>去配置</span>
            </div>

            <div class="jian">
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
            </div>
        </div>
    </div>

    <div class="box2">
        <div class="he2">
            <div class="zi">
                <span>提示音设置</span>
            </div>

            <div class="qu">
                <span>去设置</span>
            </div>

            <div class="jian">
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
            </div>
        </div>
    </div>

</body>
</html>