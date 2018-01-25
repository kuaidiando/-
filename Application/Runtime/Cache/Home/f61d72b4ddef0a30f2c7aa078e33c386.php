<?php if (!defined('THINK_PATH')) exit();?><html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <link rel="stylesheet" href="/-/Public/home/css/base.css">
    <link rel="stylesheet" href="/-/Public/home/css/register.css">
    <script type="text/javascript" src="/-/Public/home/js/jquery.js"></script>


    <title>注册</title>
</head>
<body style="font-size: 12px">
<form action="form_action.asp" method="get">
    <div class="header">
        <span>注册</span>
    </div>

    <div class="zhuce">
        <span>新用户注册</span>
    </div>

    <div class="phone">
        <label class="tu">
            <img src="/-/Public/home/img/geren2.png" alt="">
        </label>

        <div class="text">
            <input type="text" id="tel" maxlength="11" placeholder="请输入您的手机号" >
            <span id="ts"></span>
        </div>
    </div>

    <div class="mima">
        <label class="tu2">
            <img src="/-/Public/home/img/mima.png" alt="">
        </label>

        <div class="text2">
            <input type="password" id="mi" placeholder="请设置您的密码">
            <span id="ts2"></span>
        </div>
    </div>

    <div class="shu">
        <div class="yan">
            <input type="text" id="send" placeholder="请输入短信验证码">
            <span id="ts3"></span>
        </div>

        <div class="send">
            <a href="#">
                <span>发送验证码</span>
            </a>
        </div>
    </div>



    <div class="hetong">
        <input type="checkbox" id="is_agree">
        <span class="yi">我已阅读并同意</span>
        <span class="xieyi">
            <a href="#">
                《用户注册协议》
            </a>
        </span>
    </div>

    <div class="footer">
        <a href="#">
            <span id="reg">立即注册</span>
        </a>
    </div>
</form>

</div>
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
                    data:{tel:tel,type:'register'},
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

        $("#reg").click(function(){
        var is_agree;
        var is_agree = $("#is_agree")
        if(is_agree.is(':checked')){
            var tel = $("#tel").val();
            var password = $("#mi").val();
            var yzm = $("#send").val();
            $.ajax({
                type:'post',
                dataType: 'json',
                url:'<?php echo U("Home/Register/register");?>',
                data:{tel:tel,password:password,yzm:yzm},
                success: function (result) {
                    if(result.code == 200){
                        $(location).attr('href', '<?php echo U("Home/Login/index");?>');  
                    }else{
                        alert(result.msg);
                    }
                   
                }

            })
        }else{
            alert("请阅读并同意用户协议");
        }
    });
    </script>

<script type="text/javascript">
    var tel,mi,send,reg;
        var tel = document.getElementById("tel");
        tel.onblur = function () {
            var reg = /^1[345678]\d{9}$/;
            var ts = document.getElementById("ts");
            if (reg.test(this.value)) {
                ts.innerText="";
            } else {
                ts.innerText = "请输入正确的手机号";
            }
        };

        var mi =  document.getElementById("mi");
        mi.onblur = function () {
            var reg = /^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,22}$/;
            var ts2 = document.getElementById("ts2");
            if (reg.test(this.value)) {
                ts2.innerText="";
            } else {
                ts2.innerText = "密码格式不对";
            }
        };

        var send = document.getElementById("send");
        send.onblur = function () {
            var reg = /^[0-9]{6}$/;
            var ts3 = document.getElementById("ts3");
            if (reg.test(this.value)) {
                ts3.innerText="";
            } else {
                ts3.innerText = "验证码不正确";
            }
        };



</script>

</body>
</html>