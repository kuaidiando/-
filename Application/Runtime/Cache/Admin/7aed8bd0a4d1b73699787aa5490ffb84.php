<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/jquery.cookie/jquery.cookie.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/html5.js"></script>
    <script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/respond.min.js"></script>
    <script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/PIE_IE678.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/icheck/icheck.css"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/static/h-ui.admin/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/kuaidian/aa/thinkphp_3.2.3_full/Public/css/hidTable.css"/>
    <!-- 分页效果 -->
    <link href="/kuaidian/aa/thinkphp_3.2.3_full/Public/css/mypage.css" rel="stylesheet" type="text/css"/>
    <!-- 分页结束 -->
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>快点</title>
</head>
<body>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add" action="<?php echo U('Admin/Shoptype/edit');?>" method="post">
        <input type="hidden" name="id" value="<?php echo ($data["0"]["id"]); ?>">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($data["0"]["name"]); ?>" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>状态：</label>
            <div class="formControls col-xs-8 col-sm-9">
            <?php if(is_array($data)): foreach($data as $key=>$vo): if($vo["zhuangt"] == 1 ): ?>有效&nbsp;&nbsp;<input type="radio"  value="1" name="zhuangt" checked="checked">
                    无效&nbsp;&nbsp;<input type="radio"  value="2" name="zhuangt">
                    <?php else: ?> 
                    有效&nbsp;&nbsp;<input type="radio"  value="1" name="zhuangt">
                    无效&nbsp;&nbsp;<input type="radio"  value="2" name="zhuangt" checked="checked"><?php endif; endforeach; endif; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>排序：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($data["0"]["paix"]); ?>"  name="paix">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 修改</button>
                <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</article>
<script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/jquery.form/jquery.form.js"></script>
<script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
    $("#menu_nav .menu_id").click(function () {
        var id = $(this).attr('data-id');
        $.cookie('active', id, {path: '/' });
    })
</script>
</body>
</html>