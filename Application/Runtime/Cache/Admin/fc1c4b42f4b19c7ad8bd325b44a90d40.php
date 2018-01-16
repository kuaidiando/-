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
    <form class="form form-horizontal" id="form-admin-add" action="<?php echo U('Admin/Shop/edit');?>" method="post" enctype="multipart/form-data">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($data["0"]["mingch"]); ?>"  name="mingch">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>LOGO：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <img src="/kuaidian/Public<?php echo ($data["0"]["logo"]); ?>" alt="图片加载中。。。">
                <div class="uploader-thum-container">
                    <input type="file" name="logo">
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span id="scerweim">二维码：</span></label>
            <div class="formControls col-xs-8 col-sm-9">
                <img src="<?php echo ($data["0"]["erweima"]); ?>" alt="二维码生成中。。。" >
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">手机号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($data["0"]["tel"]); ?>" placeholder="" id="" name="tel">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">人均消费：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($data["0"]["maney"]); ?>" placeholder="" id="" name="maney">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">营业时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <select name="time_kai" class="select" style="width: 25%;" id="">
                <!-- 单条信息城市 -->
                <?php if(is_array($data)): foreach($data as $key=>$vosscs): ?><!-- 所有时间 -->
                    <?php if(is_array($restime)): foreach($restime as $key=>$votime): ?><option value="<?php echo ($votime["id"]); ?>" <?php if($votime['id'] == $vosscs['time_kai']): ?>selected="selected"<?php endif; ?> ><?php echo ($votime["name"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
                </select>
                &nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;&nbsp;
                <select name="time_zhong" class="select" style="width: 25%;" id="">
                    <!-- 单条信息城市 -->
                <?php if(is_array($data)): foreach($data as $key=>$vosscs): ?><!-- 所有时间 -->
                    <?php if(is_array($restime)): foreach($restime as $key=>$votime): ?><option value="<?php echo ($votime["id"]); ?>" <?php if($votime['id'] == $vosscs['time_zhong']): ?>selected="selected"<?php endif; ?> ><?php echo ($votime["name"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
                </select>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属城市：</label>
            <!-- 省 -->
            <div class="formControls col-xs-8 col-sm-9" style="width: 25%;">
                <span class="select-box">
                <select name="depcsjlsheng" class="select"  id="selsheng">
                <!-- 单条信息城市 -->
                <?php if(is_array($data)): foreach($data as $key=>$vosscs): ?><!-- 所有城市  市 -->
                    <?php if(is_array($ressheng)): foreach($ressheng as $key=>$vocssheng): ?><option value="<?php echo ($vocssheng["code"]); ?>" <?php if($vocssheng['code'] == $vosscs['depcsjlsheng']): ?>selected="selected"<?php endif; ?> ><?php echo ($vocssheng["name"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
                </select>
                </span>
            </div>
            <!-- 市 -->
            <div class="formControls col-xs-8 col-sm-9" style="width: 25%;">
                <span class="select-box">
                <select name="depcsjlshi" class="select"  id="selshi">
                <!-- 单条信息城市 -->
                        <option value="<?php echo ($data["0"]["depcsjlshi"]); ?>"><?php echo (depchengshi($data["0"]["depcsjlshi"])); ?></option>
                </select>
                </span>
            </div>
                <!-- 区 （县） -->
            <div class="formControls col-xs-8 col-sm-9" id="jlquxianshi" style="width: 25%;">
                <span class="select-box">
                <select name="depcsjlxian" class="select"  id="selqu">
                <!-- 单条信息城市 -->
                        <option value="<?php echo ($data["0"]["depcsjlxian"]); ?>"><?php echo (depjilianxian($data["0"]["depcsjlxian"])); ?></option>
                </select>
                </span>
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
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否在线：</label>
            <div class="formControls col-xs-8 col-sm-9">
                 <?php if(is_array($data)): foreach($data as $key=>$vo): if($vo["line_type"] == 1 ): ?>是&nbsp;&nbsp;<input type="radio"  value="1" name="line_type" checked="checked">
                    否&nbsp;&nbsp;<input type="radio"  value="2" name="line_type">
                    <?php else: ?> 
                    是&nbsp;&nbsp;<input type="radio"  value="1" name="line_type">
                    否&nbsp;&nbsp;<input type="radio"  value="2" name="line_type" checked="checked"><?php endif; endforeach; endif; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>类别：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                <select name="type_shop" class="select">
                <!-- 单条信息 -->
                <?php if(is_array($data)): foreach($data as $key=>$void): ?><!-- 所有信息 -->
                    <?php if(is_array($rescaipinlb)): foreach($rescaipinlb as $key=>$volb): ?><option value="<?php echo ($volb["id"]); ?>"<?php if($volb['id'] == $void['type_shop']): ?>selected="selected"<?php endif; ?>><?php echo ($volb["mingch"]); ?></option><?php endforeach; endif; endforeach; endif; ?>
                </select>
                </span>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">星图表数量：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($data["0"]["xingsl"]); ?>" placeholder="" id="" name="xingsl">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">详细地址：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($data["0"]["jutidizhi"]); ?>" placeholder="" id="" name="jutidizhi">
            </div>
        </div>
        <!-- 隐藏id充当条件 -->
       <input type="hidden" value="<?php echo ($data["0"]["id"]); ?>" name='id'>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 修改</button>
                <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</article>

<script type="text/javascript">
    // 城市级联 省--》市
    $(document).on('click','#selsheng',function(){
        var codesheng = $(this).val();//获取省对应code
        var str = '';//城市对应区域
        $.ajax({
            type:'post',
            dataType: 'json',
            url:'<?php echo U("Admin/Ajax/shengdoshi");?>',
            data:{codesheng:codesheng},
            success: function (dd) {
                console.log(dd);
                // 获取区域名称
                $.each(dd,function(index,item){
                    str += '<option value="'+item.code+'">'+item.name+'</option>'; 
                })
                //赋值区域
                $("#selshi").html(str);
                // 清空区
                $("#jlquxianshi").html("");
            }
        })
    });
    // 城市级联 市--》县/区
    $(document).on('click','#selshi',function(){
        var codesheng = $(this).val();//获取市对应code
        var str = '<span class="select-box"><select name="depcsjlxian"  class="select" id="selqu">';//城市对应区域
        $.ajax({
            type:'post',
            dataType: 'json',
            url:'<?php echo U("Admin/Ajax/index");?>',
            data:{codesheng:codesheng},
            success: function (dd) {
                // 获取区域名称
                $.each(dd,function(index,item){
                    str += '<option value="'+item.code+'">'+item.name+'</option>'; 
                })
                str += '</select></span>';
                //赋值区域
                $("#jlquxianshi").html(str);
            }
        })
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