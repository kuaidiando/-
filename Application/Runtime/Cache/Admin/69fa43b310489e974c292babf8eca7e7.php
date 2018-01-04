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
</head>
<body>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>
    <?php
 array_pop($location); foreach ($location as $value) { echo $value['name']; ?>
    <span class="c-gray en">&gt;</span>
    <?php } ?>
    <?php echo ($active["name"]); ?>
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i>
    </a>
</nav>



<link rel="icon" type="image/png" href="/kuaidian/Public/xin/assets/i/favicon.png">
<link rel="apple-touch-icon-precomposed" href="/kuaidian/Public/xin/assets/i/app-icon72x72@2x.png">
<meta name="apple-mobile-web-app-title" content="Amaze UI"/>
<link rel="stylesheet" href="/kuaidian/Public/xin/assets/css/amazeui.min.css"/>
<link rel="stylesheet" href="/kuaidian/Public/xin/assets/css/admin.css">
<script src="/kuaidian/Public/xin/assets/js/jquery.min.js"></script>
<script src="/kuaidian/Public/xin/assets/js/app.js"></script>
	<div class="page-container">
		<div class="admin">
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
			<div class="admin-biaoge">
				<div class="xinxitj">
					信息概况
				</div>
				<table class="am-table">
				<thead>
				<tr>
					<th>
						团队统计
					</th>
					<th>
						全部会员
					</th>
					<th>
						全部未激活
					</th>
					<th>
						今日新增
					</th>
					<th>
						今日未激活
					</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>
						普卡
					</td>
					<td>
						普卡
					</td>
					<td>
						<a href="#">4534</a>
					</td>
					<td>
						+20
					</td>
					<td>
						 4534
					</td>
				</tr><tr>
					<td>
						普卡
					</td>
					<td>
						普卡
					</td>
					<td>
						<a href="#">4534</a>
					</td>
					<td>
						+20
					</td>
					<td>
						 4534
					</td>
				</tr>
				</tbody>
				</table>
				<table class="am-table">
				<thead>
				<tr>
					<th>
						团队统计
					</th>
					<th>
						全部会员
					</th>
					<th>
						全部未激活
					</th>
					<th>
						今日新增
					</th>
					<th>
						今日未激活
					</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>
						普卡
					</td>
					<td>
						普卡
					</td>
					<td>
						4534
					</td>
					<td>
						+50
					</td>
					<td>
						 4534
					</td>
				</tr>
				</tbody>
				</table>
				<table class="am-table">
				<thead>
				<tr>
					<th>
						资金统计
					</th>
					<th>
						账户总收入
					</th>
					<th>
						账户总支出
					</th>
					<th>
						账户余额
					</th>
					<th>
						今日收入
					</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>
						普卡
					</td>
					<td>
						普卡
					</td>
					<td>
						4534
					</td>
					<td>
						+20
					</td>
					<td>
						 4534
					</td>
				</tr>
				</tbody>
				</table>
			</div>
			<div class="shuju">
				<div class="shujuone">
					<dl>
						<dt>全盘收入：  1356666</dt>
						<dt>全盘支出：   5646465.98</dt>
						<dt>全盘利润：  546464</dt>
					</dl>
					<ul>
						<h2>26.83%</h2>
						<li>全盘拨出</li>
					</ul>
				</div>
				<div class="shujutow">
					<dl>
						<dt>全盘收入：  1356666</dt>
						<dt>全盘支出：   5646465.98</dt>
						<dt>全盘利润：  546464</dt>
					</dl>
					<ul>
						<h2>26.83%</h2>
						<li>全盘拨出</li>
					</ul>
				</div>
				<div class="slideTxtBox">
					<div class="hd">
						<ul>
							<li>其他信息</li>
							<li>工作进度表</li>
						</ul>
					</div>
					<div class="bd">
						<ul>
							<table width="100%" class="am-table">
							<tbody>
							<tr>
								<td width="7%" align="center">
									1
								</td>
								<td width="83%">
									工作进度名称
								</td>
								<td width="10%" align="center">
									<a href="#">10%</a>
								</td>
							</tr>
							<tr>
								<td align="center">
									1
								</td>
								<td>
									工作进度名称
								</td>
								<td align="center">
									<a href="#">10%</a>
								</td>
							</tr>
							<tr>
								<td align="center">
									1
								</td>
								<td>
									工作进度名称
								</td>
								<td align="center">
									<a href="#">10%</a>
								</td>
							</tr>
							<tr>
								<td align="center">
									1
								</td>
								<td>
									工作进度名称
								</td>
								<td align="center">
									<a href="#">10%</a>
								</td>
							</tr>
							<tr>
								<td align="center">
									1
								</td>
								<td>
									工作进度名称
								</td>
								<td align="center">
									<a href="#">10%</a>
								</td>
							</tr>
							<tr>
								<td align="center">
									1
								</td>
								<td>
									工作进度名称
								</td>
								<td align="center">
									<a href="#">10%</a>
								</td>
							</tr>
							<tr>
								<td align="center">
									1
								</td>
								<td>
									工作进度名称
								</td>
								<td align="center">
									<a href="#">10%</a>
								</td>
							</tr>
							</tbody>
							</table>
						</ul>
						<ul>
							<table class="am-table">
							<tbody>
							<tr>
								<td>
									普卡
								</td>
								<td>
									普卡
								</td>
								<td>
									<a href="#">4534</a>
								</td>
								<td>
									+20
								</td>
								<td>
									 4534
								</td>
							</tr>
							<tr>
								<td>
									银卡
								</td>
								<td>
									银卡
								</td>
								<td>
									4534
								</td>
								<td>
									+2
								</td>
								<td>
									 4534
								</td>
							</tr>
							<tr>
								<td>
									金卡
								</td>
								<td>
									金卡
								</td>
								<td>
									4534
								</td>
								<td>
									+10
								</td>
								<td>
									 4534
								</td>
							</tr>
							<tr>
								<td>
									钻卡
								</td>
								<td>
									钻卡
								</td>
								<td>
									4534
								</td>
								<td>
									+50
								</td>
								<td>
									 4534
								</td>
							</tr>
							<tr>
								<td>
									合计
								</td>
								<td>
									合计
								</td>
								<td>
									4534
								</td>
								<td>
									+50
								</td>
								<td>
									 4534
								</td>
							</tr>
							</tbody>
							</table>
						</ul>
					</div>
				</div>
				<script type="text/javascript">jQuery(".slideTxtBox").slide();</script>
			</div>
			<div class="foods">
				<ul>
					版权所有@2015 .模板收集自 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> -  More Templates<a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
				</ul>
				<dl>
					<a href="" title="返回头部" class="am-icon-btn am-icon-arrow-up"></a>
				</dl>
			</div>
		</div>
	</div>


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
<script type="text/javascript">
    $(function () {
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
        $.Huitab("#tab-system .tabBar span", "#tab-system .tabCon", "current", "click", "0");
    });

    /*增加*/
    function admin_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }

    function product_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
</script>