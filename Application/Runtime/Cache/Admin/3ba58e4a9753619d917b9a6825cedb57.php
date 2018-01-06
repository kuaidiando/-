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
    <form class="form form-horizontal" id="form-admin-add" action="<?php echo U('Admin/Food/editfenliang');?>" method="post" enctype="multipart/form-data">
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
        <!-- 菜品id -->
       <input type="hidden" value="<?php echo ($cpid); ?>" name='cpid'>
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