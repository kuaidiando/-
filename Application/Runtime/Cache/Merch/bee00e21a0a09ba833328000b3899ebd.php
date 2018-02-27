<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>选择店员职位</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/zhiwei.css">
    <script type="text/javascript" src="/kuaidian/Public/jquery/jquery.js"></script>
</head>
<body style="font-size: 12px">
    <div id="top">
        <div class="tu">
            <img src="/kuaidian/Public/home/img/qianting.png" alt="">
        </div>

        <div class="you">
            <div class="qian">
                <span>啦啦啦啦阿拉啦啦啦</span>
            </div>

            <div class="aa">
                <span>啦啦啦啦阿拉啦啦啦啦啦啦啦阿拉</span>
            </div>
        </div>
    </div>

    <div id="bot">
        <div class="tu2">
            <img src="/kuaidian/Public/home/img/houchu.png" alt="">
        </div>

        <div class="you2">
            <div class="hou">
                <span>啦啦啦啦阿拉啦啦啦</span>
            </div>

            <div class="bb">
                <span>啦啦啦啦阿拉啦啦啦啦啦啦啦阿拉</span>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $("#top").click(function(){
        window.location.href = "<?php echo U('Merch/Staff/addqianting');?>";
    });
    $("#bot").click(function(){
        window.location.href = "<?php echo U('Merch/Staff/addhoutai');?>";
    });
</script>
</html>