<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<<<<<<< HEAD
<script type="text/javascript" src="/-/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
=======
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
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
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
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
    <form class="form form-horizontal" id="form-article-add" action="<?php echo U('Admin/Shop/add');?>" method="post" enctype="multipart/form-data">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="mingch">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">LOGO：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="uploader-thum-container">
                    <input type="file" name="logo">
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">手机号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder=""  name="tel">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">人均消费：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="maney">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">营业时间：</label>
            <div class="formControls col-xs-8 col-sm-9" >
                <select name="time_kai" class="select" style="width: 25%;" id="">
                    <?php if(is_array($restime)): foreach($restime as $key=>$votime): ?><option value="<?php echo ($votime["id"]); ?>"><?php echo ($votime["name"]); ?></option><?php endforeach; endif; ?>
                </select>
                &nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;&nbsp;
                <select name="time_zhong" class="select" style="width: 25%;" id="">
                    <?php if(is_array($restime)): foreach($restime as $key=>$votime): ?><option value="<?php echo ($votime["id"]); ?>"><?php echo ($votime["name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属城市：</label>
            <!-- 省 -->
            <div class="formControls col-xs-8 col-sm-9" style="width: 25%;">
                <span class="select-box">
                <select name="depcsjlsheng"  class="select" id="selsheng">
                    <?php if(is_array($ressheng)): foreach($ressheng as $key=>$vocssheng): ?><option value="<?php echo ($vocssheng["code"]); ?>"><?php echo ($vocssheng["name"]); ?></option><?php endforeach; endif; ?>
                </select>
                </span>
            </div>
            <!-- 市 -->
            <div class="formControls col-xs-8 col-sm-9" id="jlshixianshi" style="width: 25%;">
                <!-- <span class="select-box">
                <select name="depcsjlshi"  class="select" id="selshi">
                        <option value=""></option>
                </select>
                </span> -->
            </div>
            <!-- 县区 -->
            <div class="formControls col-xs-8 col-sm-9" id="jlquxianshi" style="width: 25%;">
                <!-- <span class="select-box">
                <select name="depcsjlxian"  class="select" id="selqu">
                    <option ></option>
                </select>
                </span> -->
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否发布：</label>
            <div class="formControls col-xs-8 col-sm-9">
                是&nbsp;&nbsp;<input type="radio"  value="1" name="zhuangt" checked="checked">
                否&nbsp;&nbsp;<input type="radio"  value="2" name="zhuangt">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否在线：</label>
            <div class="formControls col-xs-8 col-sm-9">
                是&nbsp;&nbsp;<input type="radio"  value="1" name="line_type" checked="checked">
                否&nbsp;&nbsp;<input type="radio"  value="2" name="line_type">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>门店类别：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                <select name="type_shop" class="select">
                    <?php if(is_array($rescaipinlb)): foreach($rescaipinlb as $key=>$volb): ?><option value="<?php echo ($volb["id"]); ?>" ><?php echo ($volb["mingch"]); ?></option><?php endforeach; endif; ?>
                </select>
                </span>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">星图表数量：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="xingsl">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">详细地址：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="jutidizhi">
            </div>
        </div>
<<<<<<< HEAD
        
=======
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">佣金百分比：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="3" placeholder="" id="zuigaolij" name="zuigaolij">
            </div>
        </div>
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 添加</button><!-- 
                <button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
                <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button> -->
            </div>
        </div>
    </form>
</article>
<script type="text/javascript">
<<<<<<< HEAD
=======
    // 佣金比例
    $(document).on('input',"#zuigaolij",function(){
        var bili = $(this).val();
        if (bili) {
            if (bili < 3) {
                alert("佣金比例 最小为3%");
                $("#zuigaolij").val(3);
            }
        }
        
    });
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
    // 城市级联 省--》市
    $(document).on('click','#selsheng',function(){
        // alert(123);
        var codesheng = $(this).val();//获取省对应code
        var str = '<span class="select-box"><select name="depcsjlshi"  class="select" id="selshi">';//城市对应区域
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
                str += '</select></span>';
                //赋值区域 市
                $("#jlshixianshi").html(str);
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
<<<<<<< HEAD
<script type="text/javascript" src="/-/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.form/jquery.form.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/-/Public/admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/-/Public/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/-/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
=======
<script type="text/javascript" src="/kuaidian/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/icheck/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.form/jquery.form.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/kuaidian/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
>>>>>>> a773c09cb81c19af5caef62d4c594306911d4dc7
<script type="text/javascript">
    $("#menu_nav .menu_id").click(function () {
        var id = $(this).attr('data-id');
        $.cookie('active', id, {path: '/' });
    })
</script>
</body>
</html>