<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>搜索</title>
    <link rel="stylesheet" href="/kuaidian/Public/home/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/css/sousuo.css">
    <!--<script type="text/javascript" src="js/my.js"></script>-->
</head>
<body style="font-size: 12px">
    <div class="header">
        <div class="head">
            <div class="look">
                <img src="/kuaidian/Public/home/img/loogup.png" alt="">
            </div>

            <div class="int">
                <input type="text" placeholder="请输入搜索内容">
            </div>
        </div>

        <div class="qx">
            <span>取消</span>
        </div>
    </div>

    <div class="re">
        <div class="rm">
            <span>热门搜索</span>
        </div>

        <div class="name">
            <div class="mz">
                <span>渝乡辣婆婆渝乡辣婆婆</span>
            </div>

            <div class="mz">
                <span>渝乡辣婆婆</span>
            </div>

            <div class="mz">
                <span>火锅</span>
            </div>

            <div class="mz">
                <span>麻辣烫</span>
            </div>

            <div class="mz">
                <span>渝乡辣婆婆渝乡辣婆婆</span>
            </div>

            <div class="mz">
                <span>火锅</span>
            </div>

            <div class="mz">
                <span>麻辣烫</span>
            </div>

            <div class="mz">
                <span>火锅</span>
            </div>

            <div class="mz">
                <span>麻辣烫</span>
            </div>
        </div>
    </div>

    <div id="li">
       <div class="lishi">
           <div class="ls">
               <span>历史搜索</span>
           </div>

           <div id="sc">
               <img src="/kuaidian/Public/home/img/qingkong.png" alt="">
           </div>
       </div>
        <div class="name">
            <div class="mz">
                <span>渝乡辣婆婆渝乡辣婆婆</span>
            </div>

            <div class="mz">
                <span>渝乡辣婆婆</span>
            </div>

            <div class="mz">
                <span>火锅</span>
            </div>

            <div class="mz">
                <span>麻辣烫</span>
            </div>


            <div class="mz">
                <span>火锅</span>
            </div>

            <div class="mz">
                <span>麻辣烫</span>
            </div>

            <div class="mz">
                <span>火锅</span>
            </div>

            <div class="mz">
                <span>麻辣烫</span>
            </div>

            <div class="mz">
                <span>渝乡辣婆婆渝乡辣婆婆</span>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="/kuaidian/Public/home/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
    var sc = document.getElementById('sc');
    var li = document.getElementById('li');
    sc.onclick = function(){
        li.innerHTML="";
    };
</script>

</html>