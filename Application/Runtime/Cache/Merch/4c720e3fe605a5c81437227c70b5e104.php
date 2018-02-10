<?php if (!defined('THINK_PATH')) exit();?><html lang="en" data-dpr="1" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/register.css">
    <script type="text/javascript" src="/kuaidian/Public/merch/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(function () {
            //获取短信验证码
            var validCode=true;
            $(".send").click (function  () {
                //页面特效
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
                     //功能触发
                    var tel = $("#tel").val();
                    // alert(tel);
                    $.ajax({
                        type:'POST',
                        dataType: 'json',
                        url:'<?php echo U("Merch/Login/yanZheng");?>',
                        data:{"tel":tel},
                        success: function (result) {
                            alert(result);
                            console.log(result);
                        }
                    })
                }
               
            })
        })
    </script>
    <title>注册</title>
</head>
<body style="font-size: 12px">

<div class="logo">
    <img src="/kuaidian/Public/merch/images/logo2.png" alt="">
</div>

<div class="zhuce">
    <span>商家注册</span>
</div>

<form action="form_action.asp" method="get">

    <div class="phone">
        <div class="tu">
            <img src="/kuaidian/Public/merch/images/dian.png" alt="">
        </div>

        <div class="text">
            <input type="text" id="sjname" placeholder="请填写商家名称" >
        </div>
    </div>


    <div class="dizhi">
        <label class="ditu">
            <img src="/kuaidian/Public/merch/images/dizhi.png" alt="">
        </label>

        <div class="text8">
            <!-- <select>
                <option value="volvo">选择省</option>
                <option value="saab">北京</option>
                <option value="opel">河北</option>
                <option value="audi">天津</option>
            </select> -->
            <select name="depcsjlsheng"  class="select" id="selsheng">

                <option value="">选择省</option>
                <?php if(is_array($ressheng)): foreach($ressheng as $key=>$vocssheng): ?><option value="<?php echo ($vocssheng["code"]); ?>"><?php echo ($vocssheng["name"]); ?></option><?php endforeach; endif; ?>
            </select>
            <select name="depcsjlshi" class="depcsjlshi">
                <option value="volvo">选择市</option>
            </select>

            <select name="depcsjlxian" class="depcsjlxian">
                <option value="volvo">选择区</option>
                <option value="saab">东城区</option>
                <option value="opel">长安区</option>
                <option value="audi">裕华区</option>
            </select>
        </div>
    </div>


    <div class="phone">
        <label class="tu">
            <img src="/kuaidian/Public/merch/images/geren2.png" alt="">
        </label>

        <div class="text">
            <input type="tel" id="tel" maxlength="11" placeholder="请输入您的手机号" >
            <span id="ts"></span>
        </div>
    </div>

    <div class="mima">
        <label class="tu2">
            <img src="/kuaidian/Public/merch/images/mima.png" alt="">
        </label>

        <div class="text2">
            <input type="password" id="mi" placeholder="请设置6-18位密码">
            <span id="ts2"></span>
        </div>
    </div>

    <div class="shu">
        <div class="yan">
            <input type="tel" id="send" placeholder="请输入短信验证码">
            <span id="ts3"></span>
        </div>

        <div class="send">
            <a href="#">
                <span>发送验证码</span>
            </a>
        </div>
    </div>



    <div class="hetong">
        <div class="fu">
            <input type="checkbox">
        </div>

       <div class="yi">
           <span>我已阅读并同意</span>
       </div>

        <div class="xieyi">
            <span class="xieyi">
                《用户注册协议》
            </span>
        </div>
    </div>

    <div class="footer">
        <a href="#">
            <span id="zhu">立即注册</span>
        </a>
    </div>
</form>

</div>

<script type="text/javascript">
    //注册
    $("#zhu").click(function(){
        // 获取数据
        var name = $("#sjname").val();//名称
        var tel = $("#tel").val();//电话
        var pass = $("#mi").val();//密码
        var yanzheng = $("#send").val();//验证码
        var selsheng = $("#selsheng").val();//城市级联 --省
        var depcsjlshi = $(".depcsjlshi").val();//城市级联 --市
        var depcsjlxian = $(".depcsjlxian").val();//城市级联 --区
         $.ajax({
            type:'POST',
            dataType: 'json',
            url:'<?php echo U("Merch/Login/doregister");?>',
            data:{"name":name,"tel":tel,"pass":pass,"yanzheng":yanzheng,"selsheng":selsheng,"depcsjlshi":depcsjlshi,"depcsjlxian":depcsjlxian},
            success: function (result) {
                //判断注册
                if(result.code == 200){
                    window.location.href = "<?php echo U('Merch/Login/index');?>";
                }else{
                    alert(result.msg);
                };
                // console.log(result);
            }
        })
    });
     // 城市级联 省--》市
    $("#selsheng").change(function(){
        var codesheng = $(this).val();//获取省对应code
        // alert(codesheng);
        var str = '';//城市对应区域
        $.ajax({
            type:'post',
            dataType: 'json',
            url:'<?php echo U("Admin/Ajax/shengdoshi");?>',
            data:{codesheng:codesheng},
            success: function (dd) {
                // console.log(dd);
                // 获取区域名称
                $.each(dd,function(index,item){
                    str += '<option value="'+item.code+'">'+item.name+'</option>'; 
                })
                //赋值区域 市
                $(".depcsjlshi").html(str);
                // 清空区
                $(".depcsjlxian").html("");
            }
        })
    });
    // 城市级联 市--》县/区
    $(".depcsjlshi").change(function(){
        var codesheng = $(this).val();//获取市对应code
        var str = '';//城市对应区域
        $.ajax({
            type:'post',
            dataType: 'json',
            url:'<?php echo U("Admin/Ajax/index");?>',
            data:{codesheng:codesheng},
            success: function (dd) {
                // 获取区域名称
                $.each(dd,function(index,item){
                    str += '<option value="'+item.code+'">'+item.name+'</option>'; 
                })
                //赋值区域
                $(".depcsjlxian").html(str);
            }
        })
    });
    //验证信息
    var tel = document.getElementById("tel");
    var mi = document.getElementById("mi");
    var send = document.getElementById("send");

    yanZheng(tel,/^1[345678]\d{9}$/);
    yanZheng(mi,/^[A-Za-z]+[0-9]+[A-Za-z0-9]*|[0-9]+[A-Za-z]+[A-Za-z0-9]*$/g);
    yanZheng(send,/^[0-9]{6}$/);


    function yanZheng(tel, reg) {
        tel.onblur = function () {
            var ts = document.getElementById("ts");
            if (reg.test(this.value)) {
                ts.innerText="";
            } else {
                ts.innerText = "请输入正确的手机号";
            }
        };

        mi.onblur = function () {
            var ts2 = document.getElementById("ts2");
            if (reg.test(this.value)) {
                ts2.innerText="";
            } else {
                ts2.innerText = "密码格式不对";
            }
        };


        send.onblur = function () {
            var ts3 = document.getElementById("ts3");
            if (reg.test(this.value)) {
                ts3.innerText="";
            } else {
                ts3.innerText = "验证码不正确";
            }
        };

    }

</script>

</body>
</html>