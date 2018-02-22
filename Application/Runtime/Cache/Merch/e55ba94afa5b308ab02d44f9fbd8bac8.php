<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/login.css">
    <script type="text/javascript" src="/kuaidian/Public/merch/js/jquery-1.12.4.min.js"></script>
    <title>登录</title>
</head>
<body style="font-size: 12px">

    <div class="kong">
        <img src="/kuaidian/Public/merch/images/logo2.png" alt="">
    </div>

    <div class="denglu">
        <span>商家登录</span>
    </div>

    <div class="phone">
        <div class="lu">
            <img src="/kuaidian/Public/merch/images/geren2.png" alt="">
        </div>

        <div class="text">
            <input id="tel" type="tel" maxlength="11" placeholder="请输入您的手机号">
            <span id="sp"></span>
        </div>
    </div>

    <div class="mima">
        <div class="tu2">
            <img src="/kuaidian/Public/merch/images/mima.png" alt="">
        </div>

        <div class="text2">
            <input id="mi" type="password" placeholder="请您输入密码">
            <span id="sp2"></span>
        </div>
    </div>

    <div class="foot">
        <a href="#">
            <span>立即登录</span>
        </a>
    </div>

    <div class="footer">
        <div class="wang">
            <a href="<?php echo U('Merch/Login/resetting');?>">
                <span>忘记密码</span>
            </a>
        </div>

        <div class="yong">
            <a href="<?php echo U('Merch/Login/register');?>">
                <span>商家注册</span>
            </a>
        </div>
    </div>
    <script type="text/javascript">
        //登录
        $(".foot").click(function(){
            var tel = $("#tel").val()//用户名
            var pass = $("#mi").val()//密码
            if (tel && pass) {
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url:'<?php echo U("Merch/Login/dologin");?>',
                    data:{"tel":tel,"pass":pass},
                    success: function (result) {
                        //判断登录
                        if(result.code == 200){
                            window.location.href = "<?php echo U('Merch/Index/index');?>";
                        }else{
                            alert(result.msg);
                        };
                        // console.log(result);
                    }
                })
            }else{
                alert("请输入账号和密码");
            }
        });
        //验证信息
        var tel = document.getElementById("tel");
        var mi = document.getElementById("mi");

        yanZheng(tel,/^1[345678]\d{9}$/);
        yanZheng(mi,/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,18}$/);


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

</body>
</html>