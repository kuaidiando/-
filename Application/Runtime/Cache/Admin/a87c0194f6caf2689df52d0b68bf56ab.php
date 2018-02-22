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
    <form class="form form-horizontal" id="form-article-add" action="<?php echo U('Admin/Food/add');?>" method="post" enctype="multipart/form-data">
    <!-- 对应门店id -->
        <input type="hidden" name="dep_shop" value="<?php echo ($id); ?>">
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
                    <div id="fileList" class="uploader-list"></div>
                    <input type="file" name="logo">
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>原价：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="jiage">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>售价：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="jiage_youhui">
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
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>菜品类别：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                <select name="food_type" class="select">
                    <?php if(is_array($rescaipinlb)): foreach($rescaipinlb as $key=>$volb): ?><option value="<?php echo ($volb["id"]); ?>" ><?php echo ($volb["mingch"]); ?></option><?php endforeach; endif; ?>
                </select>
                </span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>菜品单位：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                <select name="dwid" class="select">
                    <?php if(is_array($resdw)): foreach($resdw as $key=>$vodw): ?><option value="<?php echo ($vodw["id"]); ?>" ><?php echo ($vodw["mingch"]); ?></option><?php endforeach; endif; ?>
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
                    <input type="text" class="input-text" value="" placeholder="" id="" name="shicai">
                </div>
            </div>
            <div class="row cl" style="margin-left: -5%;">
                <label class="form-label col-xs-4 col-sm-2">口感：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="" name="kougan">
                </div>
            </div><br>
        </div>
        <div class="row cl">
            <label  class="form-label col-xs-4 col-sm-2">规格：</label>
            <div class="formControls col-xs-8 col-sm-9">
                &nbsp;&nbsp;<input type="checkbox"  value="1" name="guige" id="guige">
                如添加规格请选择
            </div>
        </div>
        <!-- 隐藏规格 -->
        <div style="display: none;" id="guigechuf">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">菜品份量：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <div style="margin-top: 1%;">
                        <input type="checkbox" name="fenliang[1]" value="1" />&nbsp;&nbsp;大&nbsp;&nbsp;
                        <input type="text" name="fljiage[1]" class="input-text" placeholder="售价" style="width: 30%;"/><br>
                    </div>
                    <div style="margin-top: 1%;">
                        <input type="checkbox" name="fenliang[2]" value="2" />&nbsp;&nbsp;中&nbsp;&nbsp;
                        <input type="text" name="fljiage[2]" class="input-text" placeholder="售价" style="width: 30%;"/><br>
                    </div>
                    <div style="margin-top: 1%;">
                        <input type="checkbox" name="fenliang[3]" value="3" />&nbsp;&nbsp;小&nbsp;&nbsp;
                        <input type="text" name="fljiage[3]" class="input-text" placeholder="售价" style="width: 30%;"/><br>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">菜品口味：</label>
                <div class="formControls col-xs-8 col-sm-9">
                <!-- 口味 -->
                <div>
                    <!-- 单个 -->
                    <span class="kouweik">
                        <span style="margin-right: 5%;">
                            <input type="text" class="input-text" value="" name="kouweishuru[]" maxlength="5" style="width: 20%;">
                            <span class="delkouwei" style="margin-left: -5%;color: #ddd; cursor: pointer;">
                                <b><i class="Hui-iconfont">&#xe6a6;</i></b>
                            </span>
                        </span>
                    </span>
                    <!-- 添加按钮 -->
                    <span id="addkouwei" style="color: #5A98DD;font-size: 20px; cursor: pointer;">
                        <b><i class="Hui-iconfont">&#xe604;</i></b>
                    </span>
                </div>
                    
                <!-- 真实菜品口味 -->
                    <!-- <input type="hidden" value="0" name="kwid" id="kwid">
                    <?php if(is_array($reskw)): foreach($reskw as $key=>$vokw): echo ($vokw["mingch"]); ?><input type="checkbox" value="<?php echo ($vokw["id"]); ?>" name="kouwei">&nbsp;&nbsp;<?php endforeach; endif; ?> -->
                </div>
            </div>
        </div>
        
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> <span id="submittijia">添加</span></button>
            </div>
        </div>
    </form>
</article>
<script>
    // 显示隐藏
    $(document).on("click","#guige",function(){
        $("#guigechuf").toggle();
    });
    //点击添加口味
    $(document).on("click","#addkouwei",function(){
        var dgkw = '<span style="margin-right:5%"><input type="text" class="input-text"  name="kouweishuru[]" value="" style="width:20%"> <span class="delkouwei" style="margin-left:-5%;color:#ddd;cursor:pointer"><b><i class="Hui-iconfont">&#xe6a6;</i></b></span></span>';
        // alert(dgkw);
        $(".kouweik").append(dgkw);
    });
    // 点击删除口味
    $(document).on("click",".delkouwei",function(){
        $(this).parent().remove();
    });
    // 复选框勾选添加到隐藏框中 --分量
    // $('input[name=fenliang]').change(function(){
    //     $('#Jszzdm').val($('input[name=fenliang]:checked').map(function(){return this.value}).get().join(','))
    // })
    // 复选框勾选添加到隐藏框中 --口味
    // $('input[name=kouwei]').change(function(){
    //     $('#kwid').val($('input[name=kouwei]:checked').map(function(){return this.value}).get().join(','))
    // })
    // 点击提交
    // $(document).on("click","#submittijia",function(){
    //     //获取分量 选中的分量
    //     var flid = "";//分量id
    //     var fljiage = "";//分量对应售价
    //     var cpid = "";//菜品id
    //     $("input[name=fenliang]:checked").each(function(){
    //         flid += $(this).val()+",";//分量id
    //         fljiage += $(this).parent().find(".flshoujia").find("input").val()+",";//分量对应售价
    //         // alert(fljiage);
    //     });
    //     //ajax 添加分量 及价格
    //     $.ajax({
    //         type:"post",
    //         dataType:"json",
    //         url:'<?php echo U("Admin/Ajax/fljiageadd");?>',
    //         data:{flid:flid,fljiage:fljiage},
    //         success:function(dd){
    //             if (dd == 1) { 
    //                 // 提交表单
    //                 $("form").submit();
    //             }else{
    //                 alert("失败了");
    //             }
    //         }
    //     });
       
    // });
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