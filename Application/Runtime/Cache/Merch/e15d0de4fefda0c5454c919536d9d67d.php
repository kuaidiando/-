<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>认证</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/renzhneg.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
</head>
<body style="font-size: 12px">
    <div class="head">
        <span>认证</span>
    </div>

    <a href="<?php echo U('Merch/Shopset/renzhengzizhi',array('shopid'=>$shopid));?>">
        <div class="box">
            <div class="he">
                <div class="zi">
                    <span>认证资质</span>
                </div>

                <div class="qu">
                    <span>去认证</span>
                </div>

                <div class="jian">
                    <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
                </div>
            </div>
        </div>
    </a>

    <div class="box2">
        <div class="he2">
            <div class="zi">
                <span>电子合同</span>
            </div>

            <div class="qu">
                <span>去签约</span>
            </div>

            <div class="jian">
                <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
            </div>
        </div>
    </div>
</body>
</html>