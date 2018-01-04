<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.png">
    <link href="<?php echo ($smarty["const"]["PUBLIC_PATH"]); ?>/manage/css/boot_v3.3.5.css" rel="stylesheet">
    <link href="<?php echo ($smarty["const"]["PUBLIC_PATH"]); ?>/manage/css/base.css" rel="stylesheet">
    <link href="<?php echo ($smarty["const"]["PUBLIC_PATH"]); ?>/manage/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo ($smarty["const"]["PUBLIC_PATH"]); ?>/css/logincss/DB_tabMotionBanner.css" rel="stylesheet">
    <script type="text/javascript" src="/-/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .loginHeader{ height: 80px;width: 100%;}
        .loginHeaderLeft{ float:left;margin-left: 10%;height:100%;}
        .loginHeaderLeft img{ height: 48px;width:68px;float: left;margin-top: 16px;}
        .loginHeaderLeft strong{ font-size: 20px;margin-top:28px;margin-left:10px;float: left;color: #2d3958;}
        .loginMain{ height: 480px;width: 100%;}
        .item img{ width: 100%!important;  }
        .loginInput{ width: 360px;height: 330px;background: #fff;position: absolute;top:165px;right: 10%;border-radius: 3px;}
        input[type='text']{ height:40px;line-height: 25px;}
        input[type='password']{ height:40px;line-height: 25px;}
        .input-group-addon i{ width: 12px;}
        .input-group-addon .fa{ margin:0px;}
        .form-control-feedback{ height:40px;line-height:38px;}
        .passwordLeft{ float: left;margin-left: 42px;font-size: 14px;color: #a6a6a6;cursor: pointer;}
        .passwordLeft>i{ width: 12px;color: #343e57;}
        .passwordLeft>i:before{ width: 12px;}
        .passwordRight{ float: right;margin-right: 42px;font-size: 14px;color: #a6a6a6;cursor: pointer;}
        .footerCenter{ width: 100%;margin-top: 26px;}
        .footerCenter p{ width: 100%;text-align: center;margin-top: 5px;font-size: 14px;color:#333;}
    </style>
</head>
<body>
    <div class="outbox" style="min-width:1300px;width:100%;position:absolute;">
       
        <div class="loginMain">
            
            <div class="loginInput">
                <form class="form-inline">
                    <div class="form-group  has-feedback" style="margin-left: 42px;margin-top: 53px;">
                        <div class="input-group"  style="width: 276px;">
                            <span class="input-group-addon"><i class="fa fa-lg fa-user"></i></span>
                            账号<input type="text" class="form-control" id="user_name" name="user_name"  placeholder="请输入手机号登录"  aria-describedby="inputGroupSuccess3Status">
                        </div>
                        <span class="glyphicon  form-control-feedback" aria-hidden="true"><i class="fa fa-check"></i></span>

                    </div>
                    <div class="form-group  has-feedback" style="margin-left: 42px;margin-top:20px;">
                        <div class="input-group"  style="width: 276px;">
                            <span class="input-group-addon"><i class="fa fa-lg fa-lock"></i></span>
                            密码<input type="password" class="form-control" id="user_password" name="user_password"  placeholder="密码"  aria-describedby="inputGroupSuccess3Status">
                        </div>
                        <span class="glyphicon  form-control-feedback" aria-hidden="true"><i class="fa fa-close"></i></span>

                    </div>
                    <div class="form-group  has-feedback" style="margin-top:20px;padding-bottom:20px;width: 100%;">
                    
                    </div>
                    <div class="form-group  has-feedback" style="margin-left: 42px;margin-bottom:10px;">
                       <div class="btn btn-primary js_login" style="width: 276px;height: 40px;line-height:30px;">登录</div>
                       
                    </div>
                    
               
                </form>
            </div>
        </div>
        
    </div>
</body>
<script type="text/javascript" src="<?php echo ($smarty["const"]["PUBLIC_PATH"]); ?>/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo ($smarty["const"]["PUBLIC_PATH"]); ?>/manage/js/bootstrap_v2.min.js"></script>
<script type="text/javascript" src="<?php echo ($smarty["const"]["PUBLIC_PATH"]); ?>/manage/js/base.js"></script>
<script type="text/javascript" src="<?php echo ($smarty["const"]["PUBLIC_PATH"]); ?>/js/loginjs/jquery.DB_tabMotionBanner.min.js"></script>
<script>
    if ($(".outbox").height() < window.innerHeight) {
        $(".outbox").height(window.innerHeight) ;
    }
    $(".passwordLeft").click(function(){
        if($(".passwordLeft i").hasClass("fa-square-o")){
            $(".passwordLeft i").removeClass("fa-square-o");
            $(".passwordLeft i").addClass("fa-check-square")
        }
        else if($(".passwordLeft i").hasClass("fa-check-square")){
            $(".passwordLeft i").removeClass("fa-check-square")
            $(".passwordLeft i").addClass("fa-square-o");
        }
    });
    $(function(){
        $('.js_login').click(function(){
          var userName=$("#user_name").val();
          var userPassword=$("#user_password").val();
          // alert(userPassword);exit;
          if(userPassword==""||userName==""){
              alert('登录名与密码不能为空 ');
              $("#user_name").focus();
              return false;
          }else{
              var url = "<?php echo U('Home/Login/check');?>";
              // alert(url);exit;
              $.post(url, { user_name:userName, user_password:userPassword} , function(msg){
              if(msg.info == 'ok') {
                //alert('登录成功，正在转向后台主页！');
                window.location.href = msg.callback;
              } else {
                alert(msg.info);
              }
            }, 'json').error(function(){
              alert("网络连接错误，请稍后再试");
            });

          }
        })
        
        $('.js_reg').click(function(){
          var regUrl = "{U('reg/index')}";
          window.open(regUrl);
        });
        
        //enter回车登录
        $('input').bind('keypress',function(event){
              if(event.keyCode == "13")    
              {
                  $('.btn').trigger('click');
              }
        });

      });
 
</script>

</html>