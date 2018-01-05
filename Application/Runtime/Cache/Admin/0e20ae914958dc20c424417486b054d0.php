<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.cookie/jquery.cookie.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/kuaidian/Public/admin/lib/html5.js"></script>
    <script type="text/javascript" src="/kuaidian/Public/admin/lib/respond.min.js"></script>
    <script type="text/javascript" src="/kuaidian/Public/admin/lib/PIE_IE678.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/lib/icheck/icheck.css"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/Public/css/hidTable.css"/>
    <!-- 分页效果 -->
    <link href="/kuaidian/Public/css/mypage.css" rel="stylesheet" type="text/css"/>
    <!-- 分页结束 -->
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>快点</title>
    <div class="navbar navbar-fixed-top">
    <div class="container-fluid cl">
        <a class="logo navbar-logo f-l mr-10 hidden-xs" href="#">快点LOGO</a>
        <a class="logo navbar-logo f-l mr-10 hidden-xs" style="text-decoration: none; " href="<?php echo U('Admin/Index/mokuaia');?>">模块a</a>
        <a class="logo navbar-logo f-l mr-10 hidden-xs" style="text-decoration: none; " href="">模块b</a>
        <li class="dropDown dropDown_hover" style="margin-left: 70%;margin-top: 1%;">
        <div>
            <select name="choose" id="choose" class="select">
                <?php if(is_array($res)): foreach($res as $key=>$vo): ?><option value="<?php echo ($vo["code"]); ?>"><?php echo ($vo["mingch"]); ?></option><?php endforeach; endif; ?>
            </select>
        </div>
        </li>
        <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
        <ul class="cl">
            <li><?php echo (session('uname')); ?></li>
            <li><a href="<?php echo U('Admin/Public/loginout');?>">退出</a></li>
        </ul>
        </nav>
    </div>
</div>
<aside class="Hui-aside"><input runat="server" id="divScrollValue" type="hidden" value=""/>
    <a  class="yincangzhuye" href="<?php echo U('Admin/Index/yinczhuye');?>">asdf</a>
</aside><header class="navbar-wrapper">

</header><aside class="Hui-aside"><input runat="server" id="divScrollValue" type="hidden" value=""/>
	<a  class="yincangzhuye" href="<?php echo U('Admin/Index/yinczhuye');?>">标题1</a><br>
	<a  class="yincangzhuye" href="<?php echo U('Admin/Index/biaoti2');?>">标题2</a>
	
</aside>
<div class="dislpayArrow hidden-xs">
	<a class="pngfix" href="javascript:;" onclick="displaynavbar(this)"></a>
</div>
<section class="Hui-article-box">
<div id="iframe_box" class="Hui-article">
	<div class="show_iframe">
		<div style="display:none" class="loading">
		</div>
		<!-- 主题内容 -->
		<link rel="icon" type="image/png" href="/kuaidian/Public/xin/assets/i/favicon.png">
			<link rel="apple-touch-icon-precomposed" href="/kuaidian/Public/xin/assets/i/app-icon72x72@2x.png">
			<meta name="apple-mobile-web-app-title" content="Amaze UI"/>
			<link rel="stylesheet" href="/kuaidian/Public/xin/assets/css/amazeui.min.css"/>
			<link rel="stylesheet" href="/kuaidian/Public/xin/assets/css/admin.css">
			<div class="admin-index">
				<dl data-am-scrollspy="{animation: 'slide-right', delay: 100}">
					<dt class="qs"><i class="am-icon-users"></i></dt>
					<dd>455</dd>
					<dd class="f12">团队数量</dd>
				</dl>
				<dl data-am-scrollspy="{animation: 'slide-right', delay: 300}">
					<dt class="cs"><i class="am-icon-area-chart"></i></dt>
					<dd>455</dd>
					<dd class="f12">今日收入</dd>
				</dl>
				<dl data-am-scrollspy="{animation: 'slide-right', delay: 600}">
					<dt class="hs"><i class="am-icon-shopping-cart"></i></dt>
					<dd>455</dd>
					<dd class="f12">商品数量</dd>
				</dl>
				<dl data-am-scrollspy="{animation: 'slide-right', delay: 900}">
					<dt class="ls"><i class="am-icon-cny"></i></dt>
					<dd>455</dd>
					<dd class="f12">全部收入</dd>
				</dl>
			</div>
	</div>
</div>
</section>
<script type="text/javascript">
	$(document).on("change","#choose",function(){
		// $('iframe').attr('src',"<?php echo U('Admin/Index/welcome');?>");
		$(".yincangzhuye").click();
		// console.log(aa);
		// alert(aa);
	});
</script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.form/jquery.form.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
    $("#menu_nav .menu_id").click(function () {
        var id = $(this).attr('data-id');
        $.cookie('active', id, {path: '/' });
    })
</script>
</body>
</html>