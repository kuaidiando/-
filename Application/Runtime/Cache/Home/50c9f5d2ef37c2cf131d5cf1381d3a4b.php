<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <link rel="stylesheet" href="/-/Public/home/css/base.css">
    <link rel="stylesheet" href="/-/Public/home/css/text.css">
    <link rel="stylesheet" href="/-/Public/home/css/login.css">
    <script type="text/javascript" src="/-/Public/home/js/jquery-1.12.4.js"></script>

    <title>登录</title>
</head>
<body style="font-size: 12px">

    <div class="header">
        <span >登录</span>
    </div>

    <div class="denglu">
        <span>用户登录</span>
    </div>

    <div class="phone">
        <div class="lu">
            <img src="/-/Public/home/img/geren2.png" alt="">
        </div>

        <div class="text">
            <input id="tel" type="text" placeholder="请输入您的手机号">
            <input type="hidden" id="is_cart" name="is_cart" value="{is_cart}">
            <input type="hidden" id="shop" value="<?php echo ($shopid); ?>">
            <span id="sp"></span>
        </div>
    </div>

    <div class="mima">
        <div class="tu2">
            <img src="/-/Public/home/img/mima.png" alt="">
        </div>

        <div class="text2">
            <input id="mi" type="password" placeholder="请您输入密码">
            <span id="sp2"></span>
        </div>
    </div>

    <div class="foot">
        <a href="#">
            <span id="login">立即登录</span>
        </a>
    </div>

    <div class="footer">
        <div class="wang">
            <a href='<?php echo U("Home/Login/resetting");?>'>
                <span>忘记密码</span>
            </a>
        </div>

        <div class="yong">
            <a href='<?php echo U("Home/Register/index");?>'>
                <span>用户注册</span>
            </a>
        </div>
    </div>


    <script type="text/javascript">
        var tel = document.getElementById("tel");
        var mi = document.getElementById("mi");

        yanZheng(tel,/^1[345678]\d{9}$/);
        yanZheng(mi,/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,22}$/);


        function yanZheng(tel, reg) {
            tel.onblur = function () {
                var sp = document.getElementById("sp");
                if (reg.test(this.value)) {
                    sp.innerText = "";
                } else {
                    sp.innerText = "请输入正确的手机号";
                }
            };

            mi.onblur = function () {
                var sp2 = document.getElementById("sp2");
                if (reg.test(this.value)) {
                    sp2.innerText = "";
                } else {
                    sp2.innerText = "密码不正确";
                }
            };

        }

    </script>
    <script type="text/javascript">
        
        $("#login").click(function(){
        var tel,passwprd;
        
        var tel = $("#tel").val();
        var password = $("#mi").val();
        // alert(tel);
        // return false;
        var is_cart = $("#is_cart").val();
        var shop = $("#shop").val();
        if(!is_cart || !shop){
            var is_cart=0;
            var shop = 0;
        }
        $.ajax({
            type:'post',
            dataType: 'json',
            url:'<?php echo U("Home/Login/save_login");?>',
            data:{tel:tel,password:password,is_cart:is_cart,shop:shop},
            success: function (result) {
                if(result.code == 200){
                    $(location).attr('href', '<?php echo U("Home/Index/index");?>');
                }else if(result.code == 300){
                     $(location).attr('href', '<?php echo U("Home/Cart/index",array('shop'=>result.shop));?>');

                }else{
                    alert(result.msg);
                }
 
            }

        })
    });
    </script>

</body>
</html>