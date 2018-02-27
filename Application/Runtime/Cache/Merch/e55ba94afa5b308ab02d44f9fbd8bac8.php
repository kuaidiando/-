<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/login.css">
    <title>登录</title>
    <script type="text/javascript" src="/kuaidian/Public/merch/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.tabPanel ul li').click(function(){
                $(this).addClass('hit').siblings().removeClass('hit');
                $('.panes>div:eq('+$(this).index()+')').show().siblings().hide();
            })
        })
    </script>
</head>
<body style="font-size: 12px">


    <div class="kong">
        <img src="/kuaidian/Public/merch/images/logo2.png" alt="">
    </div>


    <div>
        <div class="tabPanel">
            <ul>
                <li class="hit">商家登录</li>
                <li>员工登录</li>
            </ul>
            <div class="panes">
                <div class="pane" style="display:block;">
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
                </div>

                <div class="pane">
                    <div class="phone">
                        <div class="lu">
                            <img src="/kuaidian/Public/merch/images/geren2.png" alt="">
                        </div>

                        <div class="text">
                            <input id="tel2" type="tel" placeholder="请输入您的工号 ">
                            <span id="sp5"></span>
                        </div>
                    </div>

                    <div class="mima">
                        <div class="tu2">
                            <img src="/kuaidian/Public/merch/images/mima.png" alt="">
                        </div>

                        <div class="text2">
                            <input id="mi2" type="password" placeholder="请您输入密码">
                            <span id="sp6"></span>
                        </div>
                    </div>

                    <div class="footyuangong">
                        <a href="#">
                            <span>立即登录</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        //商家登录
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
        //员工登录
        $(".footyuangong").click(function(){
            var tel2 = $("#tel2").val()//用户名
            var pass2 = $("#mi2").val()//密码
            if (tel2 && pass2) {
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url:'<?php echo U("Merch/Login/dologinyuangong");?>',
                    data:{"tel2":tel2,"pass2":pass2},
                    success: function (result) {
                        //判断登录
                        if(result.code == 200){
                            // alert(123);
                            window.location.href = "<?php echo U('Merch/Staff/yuangongindex');?>";
                        }else{
                            alert(result.msg);
                        };
                        console.log(result);
                    }
                })
            }else{
                alert("请输入账号和密码");
            }
        });
        //验证信息
        var tel = document.getElementById("tel");
        var mi = document.getElementById("mi");
        var mi2 = document.getElementById("mi2");

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
            mi2.onblur = function () {
                var sp6 = document.getElementById("sp6");
                if (reg.test(this.value)) {
                    sp6.innerText = "";
                } else {
                    sp6.innerText = "密码不正确";
                }
            };

        }
        //失去焦点事件
        $("#mi").keyup(function(){
            var zhi = $(this).val();
            if (zhi) {
                // alert(123);
                $(".foot").css("background-color","#ffae00");
            }else{
                // alert(456);
                $(".foot").css("background-color","#888");
            }
            // alert(zhi);
            
        });
        $("#mi2").keyup(function(){
            var zhi = $(this).val();
            if (zhi) {
                // alert(123);
                $(".footyuangong").css("background-color","#ffae00");
            }else{
                // alert(456);
                $(".footyuangong").css("background-color","#888");
            }
        });
    </script>

</body>
</html>