<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Wopop</title>
<<<<<<< HEAD
<link href="/-/Public/xin/admin/login/Wopop_files/style_log.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/-/Public/xin/admin/login/Wopop_files/style.css">
<link rel="stylesheet" type="text/css" href="/-/Public/xin/admin/login/Wopop_files/userpanel.css">
<link rel="stylesheet" type="text/css" href="/-/Public/xin/admin/login/Wopop_files/jquery.ui.all.css">
<!-- <link rel="stylesheet" href="/-/Public/muban/assets/css/bootstrap.css"> -->
    <script type="text/javascript" src="/-/Public/muban/assets/js/jquery.js"></script>
    <script type="text/javascript" src="/-/Public/muban/assets/js/bootstrap.js"></script>
=======
<link href="/kuaidian/Public/xin/admin/login/Wopop_files/style_log.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/xin/admin/login/Wopop_files/style.css">
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/xin/admin/login/Wopop_files/userpanel.css">
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/xin/admin/login/Wopop_files/jquery.ui.all.css">
<!-- <link rel="stylesheet" href="/kuaidian/Public/muban/assets/css/bootstrap.css"> -->
    <script type="text/javascript" src="/kuaidian/Public/muban/assets/js/jquery.js"></script>
    <script type="text/javascript" src="/kuaidian/Public/muban/assets/js/bootstrap.js"></script>
>>>>>>> d7d238f8d701d7016b1fe2320075da5f62bf89bc

</head>

<body class="login" mycollectionplug="bind">
<div class="login_m">

<<<<<<< HEAD
<div class="login_logo"><img src="/-/Public/xin/admin/login/Wopop_files/logo.png" width="196" height="46"></div>
=======
<div class="login_logo"><img src="/kuaidian/Public/xin/admin/login/Wopop_files/logo.png" width="196" height="46"></div>
>>>>>>> d7d238f8d701d7016b1fe2320075da5f62bf89bc

<?php if($id == 1 ): ?><div style=" margin-left: 40%;margin-top: 10px;color:red;">账户名密码有误
</div>
    <?php else: endif; ?>
<div class="login_boder">


	
<div class="login_padding" id="login_model">
<form id="#mainForm1" class="mainForm mainForm1" action="<?php echo U('Admin/Index/dodenglu');?>" method="post" enctype="multipart/form-data">
  <h2>USERNAME</h2>
  <label>
    <input type="text" name="username" class="txt_input txt_input2" onfocus="this.select();" value="Your name">
  </label>
  <h2>PASSWORD</h2>
  <label>
    <input type="password" name="submit" id="userpwd" class="txt_input" onfocus="this.select();"  value="******">
  </label>
 
 

 
  <p class="forgot"><a id="iforget" href="javascript:void(0);">Forgot your password?</a></p>
  <div class="rem_sub">
  <div class="rem_sub_l">
   </div>
    <!-- <label>
      <input type="button" class="sub_button"  id="zhuc" value="注册" style="margin-left:20%;opacity: 0.7;">
    </label> -->
    <label>
      <input type="submit" class="sub_button"  id="button" value="登录" style="opacity: 0.7;">
    </label>
  </div>
</div>
</form>
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

<div id="forget_model" class="login_padding" style="display:none">
<br>

   <h1>Forgot password</h1>
   <br>
   <div class="forget_model_h2">(Please enter your registered email below and the system will automatically reset users’ password and send it to user’s registered email address.)</div>
    <label>
    <input type="text" id="usrmail" class="txt_input txt_input2">
   </label>

 
  <div class="rem_sub">
  <div class="rem_sub_l">
   </div>
    <label>
     <input type="submit" class="sub_buttons" name="button" id="Retrievenow" value="Retrieve now" style="opacity: 0.7;">
     　　　
     <input type="submit" class="sub_button" name="button" id="denglou" value="Return" style="opacity: 0.7;">　　
    
    </label>
  </div>
</div>






<!--login_padding  Sign up end-->
</div><!--login_boder end-->
</div><!--login_m end-->



</body>
<script type="text/javascript">
	$(document).on("click","#zhuc",function(){
		window.location.replace("<?php echo U('Index/zhuce');?>");
	});
</script>
</html>