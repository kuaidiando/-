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
<!-- <link rel="stylesheet" type="text/css" href="/kuaidian/Public/css/hidTable.css"/> -->
<!-- 分页效果 -->
<!-- <link href="/kuaidian/Public/css/mypage.css" rel="stylesheet" type="text/css"/> -->
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
    <form class="form form-horizontal" id="form-admin-add" action="<?php echo U('Admin/Shop/editruzhu');?>" method="post" enctype="multipart/form-data">
        <!-- 基本信息 -->
        <div style="margin-top: 2%;width: 87%;margin-left: 4%;background-color: #F7F7F7;">
             <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="margin-left: -3%;"><b>认证信息</b></label>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;"><span class="c-red">*</span>门店名称：</label>
                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 50%;"><?php echo ($data["0"]["mingch"]); ?></label>
                
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">是否三证合一：</label>
                <div class="formControls col-xs-8 col-sm-9" style="width: 62%;">
                    是
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">营业执照照片：</label>
                <div class="formControls col-xs-8 col-sm-9" style="width: 62%;">
                    <img style="width: 30%;"src="/kuaidian/Public<?php echo ($data["0"]["ren_yingyelogo"]); ?>" alt="图片加载中。。。">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">营业执照号码：</label>
               
                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 50%;"><?php echo ($data["0"]["ren_yingyehaoma"]); ?></label>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">营业执照有效期：</label>
                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 50%;"><?php echo ($data["0"]["ren_cyxukeriqi"]); ?></label>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">餐饮服务许可证照片：</label>
                <div class="formControls col-xs-8 col-sm-9" style="width: 62%;">
                    <img style="width: 30%;"src="/kuaidian/Public<?php echo ($data["0"]["ren_cyxukelogo"]); ?>" alt="图片加载中。。。">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">餐饮服务许可证号码：</label>
                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 50%;"><?php echo ($data["0"]["ren_cyxukezhenghaom"]); ?></label>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">餐饮服务许可证有效日期：</label>
                 <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 50%;"><?php echo ($data["0"]["ren_cyxukeriqi"]); ?></label>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">门店详细地址：</label>
                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 50%;"><?php echo ($data["0"]["jutidizhi"]); ?></label>
            </div>
            <br>
        </div>
        <!-- 法人信息 -->
        <div style="margin-top: 2%;width: 87%;margin-left: 4%;background-color: #F7F7F7;">
             <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="margin-left: -3%;"><b>法人信息</b></label>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">联系人：</label>

                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 50%;"><?php echo ($data["0"]["faren_lianxiren"]); ?></label>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">联系电话：</label>

                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 50%;"><?php echo ($data["0"]["faren_tel"]); ?></label>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">身份证（正面/反面）：</label>
                <div class="formControls col-xs-8 col-sm-9" style="width: 62%;">
                    <img style="width: 30%;"src="/kuaidian/Public<?php echo ($data["0"]["faren_sfzzheng"]); ?>" alt="图片加载中。。。">&nbsp;&nbsp;
                    <img style="width: 30%;"src="/kuaidian/Public<?php echo ($data["0"]["faren_sfzfan"]); ?>" alt="图片加载中。。。">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">身份证有效期：</label>
                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 50%;"><?php echo ($data["0"]["faren_sfzyouq"]); ?></label>
            </div>
            <br>
        </div>
        <!-- 财务信息 -->
        <div style="margin-top: 2%;width: 87%;margin-left: 4%;background-color: #F7F7F7;">
             <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="margin-left: -3%;"><b>财务信息</b></label>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">联系人：</label>

                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 50%;"><?php echo ($data["0"]["caiwu_lianxiren"]); ?></label>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">联系电话：</label>

                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 50%;"><?php echo ($data["0"]["caiwu_tel"]); ?></label>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">身份证（正面/反面）：</label>
                <div class="formControls col-xs-8 col-sm-9" style="width: 62%;">
                    <img style="width: 30%;"src="/kuaidian/Public<?php echo ($data["0"]["caiwu_sfzzhegn"]); ?>" alt="图片加载中。。。">&nbsp;&nbsp;
                    <img style="width: 30%;"src="/kuaidian/Public<?php echo ($data["0"]["caiwu_sfzfan"]); ?>" alt="图片加载中。。。">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="width: 30%;">身份证有效期：</label>
                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 30%;"><?php echo ($data["0"]["caiwu_sfzyouq"]); ?></label>
                <label class="form-label col-xs-4 col-sm-2" style="text-align: left;width: 30%;">
                <!-- 驳回信息 -->
                <span class="bohuiyangshi" style="display: none;">
                    <input type="text" name="type_shijianshifouguoqi" style="border: 1px;" placeholder="驳回信息">
                </span>
                </label>
            </div>
            <br>
        </div>
           
        
        <!-- 隐藏id充当条件 -->
       <input type="hidden" value="<?php echo ($data["0"]["id"]); ?>" name='id'>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交</button>
                <button  class="btn btn-primary radius" type="button" id="bohui"><i class="Hui-iconfont">&#xe632;</i> 驳回</button>
                <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</article>

<script type="text/javascript">
    $(document).on('click','#bohui',function(){
        $(".bohuiyangshi").toggle();
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