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
    <form class="form form-horizontal" id="form-admin-add" action="<?php echo U('Admin/Food/edit');?>" method="post" enctype="multipart/form-data">
       <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($data["0"]["mingch"]); ?>" placeholder="" id="" name="mingch">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">LOGO：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="uploader-thum-container">
                    <img style="width:20%;" src="/kuaidian/Public<?php echo ($data["0"]["logo"]); ?>" alt="图片加载中。。。">
                    <input type="file" name="logo">
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>价格：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($data["0"]["jiage"]); ?>" placeholder="" id="" name="jiage">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>优惠价：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($data["0"]["jiage"]); ?>" placeholder="" id="" name="jiage_youhui">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否发布：</label>
            <div class="formControls col-xs-8 col-sm-9">
                 <?php if(is_array($data)): foreach($data as $key=>$vo): if($vo["zhuangt"] == 1 ): ?>是&nbsp;&nbsp;<input type="radio"  value="1" name="zhuangt" checked="checked">
                        否&nbsp;&nbsp;<input type="radio"  value="2" name="zhuangt">
                        <?php else: ?>
                        是&nbsp;&nbsp;<input type="radio"  value="1" name="zhuangt">
                        否&nbsp;&nbsp;<input type="radio"  value="2" name="zhuangt" checked="checked"><?php endif; endforeach; endif; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>类别：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                <select name="food_type" class="select">
                <!-- 查询单条数据 -->
                <?php if(is_array($data)): foreach($data as $key=>$votype): ?><!-- 所有类别 -->
                     <?php if(is_array($rescaipinlb)): foreach($rescaipinlb as $key=>$volb): ?><option value="<?php echo ($volb["id"]); ?>" <?php if($volb['id'] == $votype['food_type']): ?>selected="selected"<?php endif; ?>><?php echo ($volb["mingch"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
                   
                </select>
                </span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>单位：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                <select name="dwid" class="select">
                <!-- 查询单条数据 -->
                <?php if(is_array($data)): foreach($data as $key=>$votype): ?><!-- 所有类别 -->
                     <?php if(is_array($resdpdw)): foreach($resdpdw as $key=>$vodw): ?><option value="<?php echo ($vodw["id"]); ?>" <?php if($vodw['id'] == $votype['dwid']): ?>selected="selected"<?php endif; ?>><?php echo ($vodw["mingch"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
                   
                </select>
                </span>
            </div>
        </div>
        <!-- 菜品介绍 -->
        <div style="margin-top: 2%;width: 87%;margin-left: 4%;background-color: #F7F7F7;">
             <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2" style="margin-left: -3%;"><b>菜品介绍</b></label>
            </div>
            <div class="row cl" style="margin-left: -5%;">
                <label class="form-label col-xs-4 col-sm-2">食材：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo ($data["0"]["shicai"]); ?>" placeholder="" id="" name="shicai">
                </div>
            </div>
            <div class="row cl" style="margin-left: -5%;">
                <label class="form-label col-xs-4 col-sm-2">口感：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="<?php echo ($data["0"]["kougan"]); ?>" placeholder="" id="" name="kougan">
                </div>
            </div><br>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>规格：</label>
            <div class="formControls col-xs-8 col-sm-9">
                 <?php if(is_array($data)): foreach($data as $key=>$vo): if($vo["guige"] == 1 ): ?>有&nbsp;&nbsp;<input type="radio"  value="1" name="guige" checked="checked">
                        无&nbsp;&nbsp;<input type="radio"  value="2" name="guige">
                        <?php else: ?>
                        有&nbsp;&nbsp;<input type="radio"  value="1" name="guige">
                        无&nbsp;&nbsp;<input type="radio"  value="2" name="guige" checked="checked"><?php endif; endforeach; endif; ?>
            </div>
        </div>
        <!-- 菜品id -->
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>菜品份量：</label>
            <div class="formControls col-xs-8 col-sm-9">
            <!-- 真实菜品分量 -->
                <input type="hidden" value="0" name="flid" id="Jszzdm">
                <!-- 分量列表 -->
                <?php if(is_array($rescpfl)): foreach($rescpfl as $k=>$vofl): if($vofl["id"] == $flid[$k]): echo ($vofl["mingch"]); ?><input type="checkbox" value="<?php echo ($vofl["id"]); ?>" name="fenliang" checked="checked">&nbsp;&nbsp;
                    <?php else: ?>
                    <?php echo ($vofl["mingch"]); ?><input type="checkbox" value="<?php echo ($vofl["id"]); ?>" name="fenliang" >&nbsp;&nbsp;<?php endif; endforeach; endif; ?>
            </div>
        </div>
         <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>菜品口味：</label>
            <div class="formControls col-xs-8 col-sm-9">
            <!-- 真实菜品口味 -->
                <input type="hidden" value="0" name="kwid" id="kwid">
                <!-- 分量列表 -->
                <?php if(is_array($rescpkw)): foreach($rescpkw as $k=>$vokw): if($vokw["id"] == $kwid[$k]): echo ($vokw["mingch"]); ?><input type="checkbox" value="<?php echo ($vokw["id"]); ?>" name="kouwei" checked="checked">&nbsp;&nbsp;
                    <?php else: ?>
                    <?php echo ($vokw["mingch"]); ?><input type="checkbox" value="<?php echo ($vokw["id"]); ?>" name="kouwei" >&nbsp;&nbsp;<?php endif; endforeach; endif; ?>
            </div>
        </div>
       <input type="hidden" value="<?php echo ($data["0"]["id"]); ?>" name='id'>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 修改</button>
                <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</article>
<script>
// 复选框勾选添加到隐藏框中 --分量
  $('input[name=fenliang]').change(function(){
    $('#Jszzdm').val($('input[name=fenliang]:checked').map(function(){return this.value}).get().join(','))
  })

// 复选框勾选添加到隐藏框中 --口味
  $('input[name=kouwei]').change(function(){
    $('#kwid').val($('input[name=kouwei]:checked').map(function(){return this.value}).get().join(','))
  })
  //页面一进来加载事件
  $(document).ready(function(){ 
　　$('#Jszzdm').val($('input[name=fenliang]:checked').map(function(){return this.value}).get().join(','));
    $('#kwid').val($('input[name=kouwei]:checked').map(function(){return this.value}).get().join(','))
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