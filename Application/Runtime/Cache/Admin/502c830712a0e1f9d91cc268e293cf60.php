<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<<<<<<< HEAD
<script type="text/javascript" src="/-/Public/jquery/jquery.js"></script>
=======
<script type="text/javascript" src="/kuaidian/Public/jquery/jquery.js"></script>
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
<script type="text/javascript">
$(document).ready(function(){
 $("dd").hide();
 $("dt a").click(function(){
 $(this).parent().toggleClass("bg");
 $(this).parent().prevAll("dt").removeClass("bg")
 $(this).parent().nextAll("dt").removeClass("bg")
 $(this).parent().next().slideToggle();
 $(this).parent().prevAll("dd").slideUp("slow");
 $(this).parent().next().nextAll("dd").slideUp("slow");
 return false;
});
});
</script>
<<<<<<< HEAD
<!-- <script type="text/javascript" src="/-/Public/admin/lib/jquery.cookie/jquery.cookie.js"></script>
 -->
<link rel="stylesheet" type="text/css" href="/-/Public/admin/static/h-ui/css/H-ui.min.css"/>
<link rel="stylesheet" type="text/css" href="/-/Public/admin/static/h-ui.admin/css/H-ui.admin.css"/>
<link rel="stylesheet" type="text/css" href="/-/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css"/>
<link rel="stylesheet" type="text/css" href="/-/Public/admin/lib/icheck/icheck.css"/>
<link rel="stylesheet" type="text/css" href="/-/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin"/>
<link rel="stylesheet" type="text/css" href="/-/Public/admin/static/h-ui.admin/css/style.css"/>
<!-- <link rel="stylesheet" type="text/css" href="/-/Public/css/hidTable.css"/> -->
<!-- 分页效果 -->
<!-- <link href="/-/Public/css/mypage.css" rel="stylesheet" type="text/css"/> -->
=======
<!-- <script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.cookie/jquery.cookie.js"></script>
 -->
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui/css/H-ui.min.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/css/H-ui.admin.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/lib/icheck/icheck.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/css/style.css"/>
<!-- <link rel="stylesheet" type="text/css" href="/kuaidian/Public/css/hidTable.css"/> -->
<!-- 分页效果 -->
<!-- <link href="/kuaidian/Public/css/mypage.css" rel="stylesheet" type="text/css"/> -->
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
<title>快点</title>
<style type="text/css">
    .tu{
        width:199px;
        height:50px;
        float:left;
        text-align: center;
        line-height: 50px
    }
    .tu img{
        width:130px;
        height: 50px;
    }
</style>
<div class="navbar navbar-fixed-top" >
   
    <div class="container-fluid cl">
        <!-- <div class="tu"> -->
<<<<<<< HEAD
        <!-- <img src="/-/Public/img/logo.png"> -->
=======
        <!-- <img src="/kuaidian/Public/img/logo.png"> -->
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
        <!-- </div> -->
            <a class="logo navbar-logo f-l mr-10 hidden-xs" href="<?php echo U('Admin/Index/zhuye');?>">首页</a>
            <a class="logo navbar-logo f-l mr-10 hidden-xs" style="text-decoration: none; " ><span class="shopin" name="<?php echo U('Admin/shop/index');?>">商户管理</span></a>
            <a class="logo navbar-logo f-l mr-10 hidden-xs" style="text-decoration: none; " ><span class="shopin" name="<?php echo U('Admin/User/index');?>">会员管理</span></a>
            <a class="logo navbar-logo f-l mr-10 hidden-xs" style="text-decoration: none; " ><span class="shopin" name="<?php echo U('Admin/code/index');?>">短信管理</span></a>
            <a class="logo navbar-logo f-l mr-10 hidden-xs" style="text-decoration: none; " ><span class="shopin" name="<?php echo U('Admin/order/index');?>">订单管理</span></a>
            <a class="logo navbar-logo f-l mr-10 hidden-xs" style="text-decoration: none; " ><span class="shopin" name="<?php echo U('Admin/config/index');?>">系统配置</span></a>
            <a class="logo navbar-logo f-l mr-10 hidden-xs" style="text-decoration: none; " ><span class="shopin" name="<?php echo U('Admin/money/index');?>">资金管理</span></a>
            <a class="logo navbar-logo f-l mr-10 hidden-xs" style="text-decoration: none; " ><span class="shopin" name="<?php echo U('Admin/operator/index');?>">运营商管理</span></a>

      

        <li class="dropDown dropDown_hover" style="margin-left: 30%;margin-top: 1%;">
        <div>
            <select name="choose" id="choose" style="width: 30%;" class="select">
                <?php if(is_array($res)): foreach($res as $key=>$vo): ?><option  value="<?php echo ($vo["code"]); ?>" <?php if($vo['code'] == $chengshiid): ?>selected="selected"<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
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
<div class="menu_dropdown bk_2" id="menu_nav">
    <?php if(CONTROLLER_NAME == Index): ?><dl>
        <dt><a href="#">主页</a></dt>
        <dd>
        <ul>
            <li><a class="shopin" name="<?php echo U('Admin/Index/zhuye');?>"><span id="clickzhuye">主页</span></a></li>
        </ul>
        </dd>
    </dl>
    <?php elseif(CONTROLLER_NAME == Shop || CONTROLLER_NAME == Shoptype || CONTROLLER_NAME == Danwei|| CONTROLLER_NAME == Seat || CONTROLLER_NAME == Sale || CONTROLLER_NAME == Food || CONTROLLER_NAME == Seattype || CONTROLLER_NAME == Foodtype): ?>
    <dl>
        <dt><a href="#">门店管理</a></dt>
        <dd>
        <ul>
           
            <li><a class="shopin" name="<?php echo U('Admin/Shop/index');?>">门店列表</a></li>
            <li><a class="shopin" name="<?php echo U('Admin/Shoptype/index');?>">门店类别</a></li>
            <li><a class="shopin" name="<?php echo U('Admin/Danwei/index');?>">单位管理</a></li>
            <li><a class="shopin" name="<?php echo U('Admin/Seattype/index');?>">座位类别</a></li>
        </ul>
        </dd>
    </dl>
    <dl>
        <dt><a href="#">商家入驻</a></dt>
        <dd>
        <ul>
           
            <li><a class="shopin" name="<?php echo U('Admin/Shop/settled');?>">入驻列表</a></li>
        </ul>
        </dd>
    </dl>
    <?php elseif(CONTROLLER_NAME == User): ?>
        <dl>
            <dt><a href="#">会员管理</a></dt>
            <dd>
            <ul>
                <li><a class="shopin" name="<?php echo U('Admin/User/index');?>">会员列表</a></li>
            </ul>
            </dd>
        </dl>
    <?php elseif(CONTROLLER_NAME == Code): ?>
        <dl>
            <dt><a href="#">短信管理</a></dt>
            <dd>
            <ul>
                <li><a class="shopin" name="<?php echo U('Admin/Code/index');?>">短信列表</a></li>
            </ul>
            </dd>
        </dl>
<<<<<<< HEAD
    <?php elseif(CONTROLLER_NAME == Event || CONTROLLER_NAME == Config || CONTROLLER_NAME == Yingxiao): ?>
=======
    <?php elseif(CONTROLLER_NAME == Event || CONTROLLER_NAME == Config): ?>
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
        <dl>
            <dt><a href="#">轮播图管理</a></dt>
            <dd>
            <ul>
                <li><a class="shopin" name="<?php echo U('Admin/Event/index');?>">轮播图列表</a></li>
            </ul>
            </dd>
        </dl>
<<<<<<< HEAD
        <dl>
            <dt><a href="#">活动管理</a></dt>
            <dd>
            <ul>
                <li><a class="shopin" name="<?php echo U('Admin/Yingxiao/index');?>">微众营销</a></li>
                <li><a class="shopin" name="<?php echo U('Admin/Yingxiao/fenxiang');?>">分享立减</a></li>
            </ul>
            </dd>
        </dl>
=======
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
    <?php elseif(CONTROLLER_NAME == Order): ?>
        <dl>
            <dt><a href="#">订单管理</a></dt>
            <dd>
            <ul>
                <li><a class="shopin" name="<?php echo U('Admin/Order/index');?>">订单列表</a></li>
            </ul>
            </dd>
<<<<<<< HEAD
        </dl>
    <?php elseif(CONTROLLER_NAME == Money): ?>
        <dl>
            <dt><a href="#">报表</a></dt>
            <dd>
            <ul>
                <li><a class="shopin" name="<?php echo U('Admin/Money/index');?>">平台营收</a></li>
            </ul>
            </dd>
=======
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
        </dl><?php endif; ?>
   
</div>
</aside>
<script type="text/javascript">
    // 门店列表
    $(document).on("click",".shopin",function(){
        //获取城市对应id
        var chengshiid = $("#choose").val();
        // alert(chengshiid);
        // 页面跳转
        var url = $(this).attr("name")+"?id="+chengshiid;
        window.location.replace(url);
    });
    // 城市切换
    $(document).on("change","#choose",function(){
<<<<<<< HEAD
        // $("#clickzhuye").click();
        // alert(aa);
=======
        // alert(123);
        $("#clickzhuye").click();
        alert(aa);
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
    });
</script><header class="navbar-wrapper"></header>
<div class="dislpayArrow hidden-xs">
	<a class="pngfix" href="javascript:;" onclick="displaynavbar(this)"></a>
</div>
<section class="Hui-article-box">
<div id="iframe_box" class="Hui-article">
	<div class="show_iframe">
		<div style="display:none" class="loading">
		</div>
		<!-- 主题内容 -->
		<div>
<<<<<<< HEAD
			<link rel="icon" type="image/png" href="/-/Public/xin/assets/i/favicon.png">
			<link rel="apple-touch-icon-precomposed" href="/-/Public/xin/assets/i/app-icon72x72@2x.png">
			<meta name="apple-mobile-web-app-title" content="Amaze UI"/>
			<link rel="stylesheet" href="/-/Public/xin/assets/css/amazeui.min.css"/>
			<link rel="stylesheet" href="/-/Public/xin/assets/css/admin.css">
=======
			<link rel="icon" type="image/png" href="/kuaidian/Public/xin/assets/i/favicon.png">
			<link rel="apple-touch-icon-precomposed" href="/kuaidian/Public/xin/assets/i/app-icon72x72@2x.png">
			<meta name="apple-mobile-web-app-title" content="Amaze UI"/>
			<link rel="stylesheet" href="/kuaidian/Public/xin/assets/css/amazeui.min.css"/>
			<link rel="stylesheet" href="/kuaidian/Public/xin/assets/css/admin.css">
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
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
				</tr>
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
		</div>
	</div>
</div>
</section>
<<<<<<< HEAD
<script type="text/javascript">
=======
<!-- <script type="text/javascript">
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
	$(document).on("change","#choose",function(){
		// $('iframe').attr('src',"<?php echo U('Admin/Index/welcome');?>");
		$(".yincangzhuye").click();
		// console.log(aa);
		// alert(aa);
	});
<<<<<<< HEAD
</script>
<script type="text/javascript" src="/-/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.form/jquery.form.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/-/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
=======
</script> -->
<script type="text/javascript" src="/kuaidian/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.form/jquery.form.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
>>>>>>> 7da2a08c324a8696551fbe1cee4058db79e80886
<script type="text/javascript">
    $("#menu_nav .menu_id").click(function () {
        var id = $(this).attr('data-id');
        $.cookie('active', id, {path: '/' });
    })
</script>
</body>
</html>