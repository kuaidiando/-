<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>添加后厨店员</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <!--<link rel="stylesheet" href="css/text.css">-->
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/houchu.css">
    <script type="text/javascript" src="/kuaidian/Public/jquery/jquery.js"></script>
    <script type="text/javascript">
        function one(){
            document.getElementById('light').style.display='block';
            document.getElementById('fade').style.display='block'
        }
        function two(){
            document.getElementById('light').style.display='none';
            document.getElementById('fade').style.display='none'
        }
    </script>
</head>
<body style="font-size: 12px">
    <div class="fen">
        <div class="fl">
            <div class="xuan">
                <span>分堂类别</span>
            </div>

            <div class="xz" onclick="one()">
                <span class="xuanzeleibie">请选择类别</span>
            </div>
            
            <div class="tu">
                <img src="/kuaidian/Public/merch/images/youjiantou.png" alt="">
            </div>
        </div>
    </div>

    <div id="light" class="white_content" >

        <div class="leib">
            <ul class="lb">
                <?php if(is_array($res)): foreach($res as $key=>$vores): ?><li><?php echo ($vores["mingch"]); ?> <input type="checkbox" name="ckb" value="<?php echo ($vores["mingch"]); ?>"></li><?php endforeach; endif; ?>
            </ul>
        </div>

        <div class="footer3">
            <div class="fot3" onclick="two()">
                <span>
                    <a href="javascript:void(0)">取消</a>
                </span>
            </div>

            <div class="foot3">
                <span>保存</span>
            </div>
        </div>
    </div>

    <div id="fade" class="black_overlay"></div>

    <div class="header">
        <div class="name">
            <div class="ming">
                <span>姓名</span>
            </div>

            <div class="zi">
                <span>小程程</span>
            </div>
        </div>

        <div class="phone">
            <div class="dian">
                <span>电话</span>
            </div>

            <div class="hao">
                <span>13716172720</span>
            </div>
        </div>

        <div class="mi">
            <div class="ma">
                <span>设置密码</span>
            </div>

            <div class="text2">
                <input id="mi" type="password" placeholder="请您输入密码">
                <span id="sp2"></span>
            </div>
        </div>
    </div>

    <div class="footer">
        <button>添加后厨人员</button>
    </div>
</body>

<script type="text/javascript">
    $(".foot3").click(function(){ 
        var str = "";    
        $("input[name='ckb']").each(function(){    
            if($(this).is(":checked")){    
                  str += $(this).val()+",";    
            }
        }); 
        str1 = str.substring(0,str.length-1);
        $(".xuanzeleibie").html(str1);
        two();
        // alert(str);
    });
    var mi = document.getElementById("mi");

    yanZheng(mi,/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,18}$/);

    function yanZheng(tel, reg) {
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

</html>