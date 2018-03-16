<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>门店设置</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="/-/Public/merch/css/text.css">
    <link rel="stylesheet" href="/-/Public/merch/css/base.css">
    <link rel="stylesheet" href="/-/Public/merch/css/Settings.css">
    <script type="text/javascript" src="/-/Public/jquery/jquery.js"></script>
=======
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/Settings.css">
    <script type="text/javascript" src="/kuaidian/Public/jquery/jquery.js"></script>
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
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
<<<<<<< HEAD
                    <img src="/-/Public/merch/images/youjiantou.png" alt="">
=======
                    <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
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
<<<<<<< HEAD
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
=======
                <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
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
<<<<<<< HEAD
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
=======
                <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
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
<<<<<<< HEAD
                <img src="/-/Public/merch/images/youjiantou.png" alt="">
=======
                <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
            </div>
        </div>
    </div>
<div class="foot" style="width: 100%;
    height: 110px;
    background-color: #fff;
    position: fixed;
    bottom: 0;
    border-top: 1.2px #dedede solid;
    line-height: 110px;
    text-align: center;">
        <span id="delsession" style="font-size: 40px;
    color: red;">退出登录</span>
    </div>
</body>
<script type="text/javascript">
    $("#delsession").click(function(){
        $.ajax({
            type:'POST',
            dataType: 'json',
            url:'<?php echo U("Merch/Login/delsession");?>',
            data:{},
            success: function (result) {
                if (result.code == 200) {
                    window.location.href = "<?php echo U('Merch/Login/index');?>";
                }else{
                    alert(result.msg);
                }
            }
        })
    });
</script>
</html>