<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>认证</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/renzhneg.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
=======
    <link rel="stylesheet" href="/-/Public/merch/css/renzhneg.css">
    <link rel="stylesheet" href="/-/Public/merch/css/base.css">
    <link rel="stylesheet" href="/-/Public/merch/css/text.css">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
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
<<<<<<< HEAD
                    <!-- 判断认证状态 -->
                    <?php if($res[0][zhuangt] == 0 ): ?><span>去认证</span>
                    <?php elseif($res[0][zhuangt] == 2): ?>
                        <span>待审核</span>
                    <?php else: ?> 
                        <span>去认证</span><?php endif; ?>
                    
                </div>

                <div class="jian">
                    <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
=======
                    <span>去认证</span>
                </div>

                <div class="jian">
                    <img src="/-/Public/merch/images/youjiantou.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
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
<<<<<<< HEAD
                <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
=======
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
>>>>>>> 079121bc30ad9dfc9ba20ad13116347b48468068
            </div>
        </div>
    </div>
</body>
</html>