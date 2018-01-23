<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <link rel="stylesheet" href="/-/Public/home/css/base.css">
    <link rel="stylesheet" href="/-/Public/home/css/text.css">
    <link rel="stylesheet" href="/-/Public/home/css/resetting.css">
    <title>重置密码</title>

    <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
    <script type="text/javascript" src="/-/Public/home/js/jquery-1.12.4.js"></script>

    <script type="text/javascript">
        $(function  () {
            //获取短信验证码
            var validCode=true;
            $(".send").click (function  () {
                var tel;
                var tel = $("#tel").val();
                $.ajax({
                    type:'post',
                    dataType: 'json',
                    url:'<?php echo U("Home/User/send_code");?>',
                    data:{tel:tel,type:'repass'},
                    success: function (result) {
                        if(result.code == 205){
                            alert('今日验证次数超限，请明日再试');   
                        }else if(result.code == 206){
                            alert('请稍后再试');
                        }else if(result.code == 200){
                            return true;
                        }
                    }

                })
                var time=120;
                var code=$(this);
                if (validCode) {
                    validCode=false;
                    code.addClass("send1");
                    var t=setInterval(function  () {
                        time--;
                        code.html(time+"s");
                        if (time==0) {
                            clearInterval(t);
                            code.html("重新获取");
                            validCode=true;
                            code.removeClass("send1");

                        }
                    },1000)
                }
            })
        })
    </script>

</head>
<body style="font-size: 12px">

    <div class="header">
        <span>重置密码</span>
    </div>


    <div class="phone">
        <div class="tu">
            <img src="/-/Public/home/img/geren2.png" alt="">
        </div>

        <div class="text">
            <input id="tel" type="text" placeholder="请输入您的手机号">
            <span id="sp"></span>
        </div>
    </div>


        <div class="center">
            <div class="duan">
                <div class="xin">
                    <img src="/-/Public/home/img/duanxin.png" alt="">
                </div>

                <div class="tet">
                    <input id="send" type="text" placeholder="请输入短信验证码">
                    <span id="sp2"></span>
                </div>
            </div>

            <div class="send">
                <a href="#">
                    <span>发送验证码</span>
                </a>
            </div>
        </div>


    <div class="mima">
        <div class="tu2">
            <img src="/-/Public/home/img/mima.png" alt="">
        </div>

        <div class="text2">
            <input id="mi" type="password" placeholder="请输入新的密码">
            <span id="sp3"></span>
        </div>
    </div>
    
    <div class="footer">
        <a href="#">
            <span id="reset_password">重置密码</span>
        </a>
    </div>


    <script type="text/javascript">
        var tel = document.getElementById("tel");
        var send = document.getElementById("send");
        var mi = document.getElementById("mi");

        yanZheng(tel,/^1[345678]\d{9}$/);
        yanZheng(send,/^[0-9]{6}$/);
        yanZheng(mi,/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,22}$/);


        function yanZheng(tel, reg) {
            tel.onblur = function () {
                var sp = document.getElementById("sp");
                if (reg.test(this.value)) {
                    sp.innerText="";
                } else {
                    sp.innerText = "请输入正确的手机号";
                }
            };


            send.onblur = function () {
                var sp2 = document.getElementById("sp2");
                if (reg.test(this.value)) {
                    sp2.innerText="";
                } else {
                    sp2.innerText = "验证码不正确";
                }
            };



            mi.onblur = function () {
                var sp3 = document.getElementById("sp3");
                if (reg.test(this.value)) {
                    sp3.innerText="";
                } else {
                    sp3.innerText = "密码格式不对";
                }
            };

        }

    </script>
    <script type="text/javascript">
        $("#reset_password").click(function(){
            var tel = $("#tel").val();
            var password = $("#mi").val();
            var yzm = $("#send").val();
            $.ajax({
                type:'post',
                dataType: 'json',
                url:'<?php echo U("Home/Login/forget_password");?>',
                data:{tel:tel,password:password,yzm:yzm},
                success: function (result) {
                    // alert(result.msg);return false;
                    if(result.code == 200){
                        $(location).attr('href', '<?php echo U("Home/Login/index");?>');
                    }else{
                        alert(result);
                    }
                   
                }

            })
        
        });
    </script>

</body>
</html>