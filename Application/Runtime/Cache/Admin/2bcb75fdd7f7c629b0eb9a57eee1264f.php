<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<script type="text/javascript" src="/-/Public/jquery/jquery.js"></script>
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
        <!-- <img src="/-/Public/img/logo.png"> -->
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
    <?php elseif(CONTROLLER_NAME == Event || CONTROLLER_NAME == Config || CONTROLLER_NAME == Yingxiao): ?>
        <dl>
            <dt><a href="#">轮播图管理</a></dt>
            <dd>
            <ul>
                <li><a class="shopin" name="<?php echo U('Admin/Event/index');?>">轮播图列表</a></li>
            </ul>
            </dd>
        </dl>
        <dl>
            <dt><a href="#">活动管理</a></dt>
            <dd>
            <ul>
                <li><a class="shopin" name="<?php echo U('Admin/Yingxiao/index');?>">微众营销</a></li>
                <li><a class="shopin" name="<?php echo U('Admin/Yingxiao/fenxiang');?>">分享立减</a></li>
            </ul>
            </dd>
        </dl>
    <?php elseif(CONTROLLER_NAME == Order): ?>
        <dl>
            <dt><a href="#">订单管理</a></dt>
            <dd>
            <ul>
                <li><a class="shopin" name="<?php echo U('Admin/Order/index');?>">订单列表</a></li>
            </ul>
            </dd>
        </dl>
    <?php elseif(CONTROLLER_NAME == Money): ?>
        <dl>
            <dt><a href="#">报表</a></dt>
            <dd>
            <ul>
                <li><a class="shopin" name="<?php echo U('Admin/Money/index');?>">平台营收</a></li>
            </ul>
            </dd>
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
        // $("#clickzhuye").click();
        // alert(aa);
    });
</script>
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



<script type="text/javascript" src="/-/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.form/jquery.form.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/-/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
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
        // layer_show(title, url, w, h);
     parent.layer.open({
            type: 2,
            title: title,
            shadeClose: false, //点击遮罩关闭
            shade: 0.8,
            area: [w, h],
            maxmin: true,
            closeBtn: 1,
            content: [url, 'yes'], //iframe的url，yes是否有滚动条
            //yes: function (index, layero) {
            //    alert(index);
            //    alert(layero);
            //},
            end: function () {
                layer.close;
                location.reload();
            }

        });
    }

    function product_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
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
            <div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray mt-20"> 
            <span class="l">订单列表

            <!-- <a href="javascript:;" onclick="admin_add('添加轮播图','<?php echo U('Admin/Event/add');?>','800','500')"
               class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加轮播图</a> -->
           </span>
            <span class="r">共有数据：<strong><?php echo ($num); ?></strong> 条</span> </div>
        <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-responsive">
            <thead>
                <tr class="text-c">
                    <th width="30">编号</th>
                    <th width="80">订单号</th>
                    <th width="80">商户名称</th>
                    <th width="80">订单金额</th>
                    <th width="40">在线支付</th>
                    <th width="60">商户获利</th>
                    <th width="40">平台获利</th>
                    <th width="40">业务员所得佣金</th>
                    <th width="120">支付时间</th>
                    <!-- <th width="50">订单状态</th> -->
                    <!-- <th width="80">操作</th> -->
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($money_info)): foreach($money_info as $key=>$one_money_info): ?><tr class="text-c">
                            <td><?php echo ($one_money_info["id"]); ?></td>
                            <td><?php echo ($one_money_info["order_code"]); ?></td>
                            <td><?php echo ($one_money_info["shopname"]); ?></td>
                            <td><?php echo ($one_money_info["total_price"]); ?></td>
                            <td><?php echo ($one_money_info["sf"]); ?></td>
                          
                            <td><?php echo ($one_money_info["sf"]); ?></td>
                            <td>无</td>
                            <td>无</td>
                            <td><?php echo ($one_money_info["pay_time"]); ?></td>
                          


                           <!--  <?php if($one_money_info["order_status"] == 1): ?><td>
                                <?php if($one_money_info["add_time"] < date('Y-m-d H:i:s',time()-60*15)): ?><span class="label label-danger radius">
                                        <a href="#" style="text-decoration: none;color:#fff;">支付超时
                                        </a>  
                                    </span>
                                <?php else: ?>
                                    <span class="label label-danger radius">
                                            <a href="#" style="text-decoration: none;color:#fff;">未支付
                                            </a>
                                    </span><?php endif; ?>                           
                                </td>
                            <?php elseif($one_money_info["order_status"] == 5): ?>
                            <td>
                                <span class="label label-success radius">
                                         <a href="#" style="text-decoration: none;color:#ffae00;">已支付
                                        </a>
                                </span>                          
                                                            
                            </td>
                            <?php elseif($one_money_info["order_status"] == 10): ?>
                            <td>
                                <span class="label label-success radius">
                                         <a href="#" style="text-decoration: none;color:#1160BA;">待评价
                                        </a>
                                </span>                          
                                                            
                            </td>
                            <?php elseif($one_money_info["order_status"] == 15): ?>
                            <td>
                                <span class="label label-success radius">
                                         <a href="#" style="text-decoration: none;color:#fff;">已完成
                                        </a>
                                </span>                          
                                                            
                            </td>
                            <?php elseif($one_money_info["order_status"] == 20): ?>
                            <td>
                                <span class="label label-success radius">
                                         <a href="#" style="text-decoration: none;color:#B300FF;">已退款
                                        </a>
                                </span>                          
                                                            
                            </td>
                            <?php else: ?>
                            <td>未知</td><?php endif; ?> -->

                           
                          <!--   <td class="td-manage" style="text-align: center;">
                                <a style="margin-left: -8%;margin-right: 10%;" href="javascript:;"
                                       onclick="admin_add('订单详情','<?php echo U('Admin/Order/order_xq', array('id' => $one_order_info['id']));?>'
                                       ,'800px','500px')">
                                        <i class="Hui-iconfont">&#xe6df;</i>
                                    查看订单</a>
                                    <a class="h-text-sc" id="<?php echo ($one_money_info["id"]); ?>"><i class="Hui-iconfont">&#xe6e2;</i></a>
                              

                            </td> -->
                        </tr><?php endforeach; endif; ?>
                
            </tbody>
        </table>
        </div>
    </div>
        </div>
    </div>
</div>
</section>
<script type="text/javascript">
 // 门店列表
    $(document).on("click",".shop",function(){
        //获取对应id
        var uid;
        var uid = $(this).attr('id');
        // 页面跳转
        var url = $(this).attr("name")+"?uid="+uid;
        window.location.replace(url);
    });

        /*删除*/
        $(document).on("click", '.h-text-sc', function () {
            var op_obj = $(this).parents("tr");
            var id = $(this).attr('id');
            // alert(id);exit;
            layer.confirm('确认要删除吗？',function(){
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url:'<?php echo U("Admin/Order/del");?>',
                    data:{id:id},
                    success: function (result) {
                        if (result.status) {
                            layer.msg(result.msg,{icon:1,time:1000});
                        } else {
                            op_obj.remove();

                            layer.msg(result.msg,{icon:0,time:2000});

                        }
                    }
                })
            });
        });
    </script>
<script type="text/javascript" src="/-/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.form/jquery.form.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/-/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
    $("#menu_nav .menu_id").click(function () {
        var id = $(this).attr('data-id');
        $.cookie('active', id, {path: '/' });
    })
</script>
</body>
</html>