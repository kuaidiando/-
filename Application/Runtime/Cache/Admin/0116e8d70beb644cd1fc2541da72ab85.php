<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
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
<!-- <script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.cookie/jquery.cookie.js"></script>
 -->
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui/css/H-ui.min.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/css/H-ui.admin.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/lib/icheck/icheck.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/admin/static/h-ui.admin/css/style.css"/>
<link rel="stylesheet" type="text/css" href="/kuaidian/Public/css/hidTable.css"/>
<!-- 分页效果 -->
<link href="/kuaidian/Public/css/mypage.css" rel="stylesheet" type="text/css"/>
<title>快点</title>
<script type="text/javascript">
    $(document).on("click",".shopin",function(){
        //获取城市对应id
        var chengshiid = $("#choose").val();
        // 页面跳转
        var url = $(this).attr("name")+"?id="+chengshiid;
        window.location.replace(url);
    });
</script>
</head>
<body>
<article class="page-container">
    <!-- //CSS部分 -->
<style>
*{padding:0;margin:0;list-style:none;}
.tab {width:100%;height:100%;background:red;margin:0 auto;}
.tab ol{float:left;width:300px;height:50px;background:blue;}
.tab ol li{float:left;width:100px;height:50px;background:green;text-align:center;line-height:50px;}
.tab ol li.active{background:yellow;}

.tab ul{float:left;width:100%;height:100%;border:1px #ddd solid;}
.tab ul li{float:left;width:100%;height:100%;background:#fff;display:none;text-align:right;line-height:60px;font-size:40px;}
.tab ul li.cur{display:block;}
</style>
<!-- //HTML部分 -->
<body>
    <div id="tab" class="tab">
        <ol>
            <li class="active">热点</li>
            <li>时政</li>
            <li>财经</li>
        </ol>
        <ul>
        <!-- 卡一 -->
            <li class="cur">
            <!-- 内容 -->
                 <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2" style="margin-top: 5px;"><span class="c-red">*</span>名称：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo ($data["0"]["mingch"]); ?>"  name="mingch">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2" style="margin-top: 5px;"><span class="c-red">*</span>LOGO：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <img src="/kuaidian/Public<?php echo ($data["0"]["logo"]); ?>" alt="图片加载中。。。">
                        <div class="uploader-thum-container">
                            <input type="file" name="logo">
                        </div>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2" style="margin-top: 5px;">手机号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo ($data["0"]["tel"]); ?>" placeholder="" id="" name="tel">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2" style="margin-top: 5px;">人均消费：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo ($data["0"]["maney"]); ?>" placeholder="" id="" name="maney">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2" style="margin-top: 5px;">营业时间：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="time" class="input-text" value="06:00" style="width: 20%" value="<?php echo ($data["0"]["time_kai"]); ?>" name="time_kai">&nbsp;
                        &nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="time" class="input-text" value="18:00" style="width: 20%" value="<?php echo ($data["0"]["time_zhong"]); ?>" name="time_zhong">
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2" style="margin-top: 5px;">星图表数量：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo ($data["0"]["xingsl"]); ?>" placeholder="" id="" name="xingsl">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2" style="margin-top: 5px;">详细地址：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo ($data["0"]["jutidizhi"]); ?>" placeholder="" id="" name="jutidizhi">
                    </div>
                </div>
            </li>
            <!-- 卡二 -->
            <li>时政</li>
            <!-- 卡三 -->
            <li>财经</li>
        </ul>
    </div>
</body>
<!-- //JS部分 -->
<!-- <script src="http://apps.bdimg.com/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script> -->
<!-- //简易选项卡 -->
<script>
$(function(){
    $("#tab ol li").click(function(){
        now=$(this).index();
        tab();
    });
    function tab(){
        $("#tab ol li").eq(now).addClass('active').siblings().removeClass('active');
        $("#tab ul li").eq(now).addClass('cur').siblings().removeClass('cur');
    }
})
</script>
</article>

<script type="text/javascript">
   
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