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
<form class="form form-horizontal" id="form-admin-add" action="<?php echo U('Admin/Seat/edit');?>" method="post" enctype="multipart/form-data">
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="text" class="input-text" value="<?php echo ($data["0"]["mingch"]); ?>" placeholder="" id="" name="mingch">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否发布：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <?php if(is_array($data)): foreach($data as $key=>$vo): if($vo["zhuangt"] == 1 ): ?>是&nbsp;&nbsp;
            <input type="radio" value="1" name="zhuangt" checked="checked">
                    否&nbsp;&nbsp;
            <input type="radio" value="2" name="zhuangt">
            <?php else: ?> 
                    是&nbsp;&nbsp;
            <input type="radio" value="1" name="zhuangt">
                    否&nbsp;&nbsp;
            <input type="radio" value="2" name="zhuangt" checked="checked"><?php endif; endforeach; endif; ?>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>座位类别：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <!-- 类别列表 -->
            <?php if(is_array($rescaipinlb)): foreach($rescaipinlb as $key=>$volb): ?><!-- 单条信息 -->
                <?php if(is_array($data)): foreach($data as $key=>$vodt): if($volb['id'] == $vodt['seat_type']): ?><input type="radio" name="seat_type" value="<?php echo ($volb["id"]); ?>" checked="checked" > <?php echo ($volb["mingch"]); ?> &nbsp;&nbsp;&nbsp;
                    <?php else: ?>
                    <input type="radio" name="seat_type" value="<?php echo ($volb["id"]); ?>"> <?php echo ($volb["mingch"]); ?> &nbsp;&nbsp;&nbsp;<?php endif; endforeach; endif; endforeach; endif; ?>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>座位人数：</label>
        <div class="formControls col-xs-8 col-sm-9">
        <!-- 最低人数实际 -->
        <input type="hidden" value="<?php echo ($data["0"]["zuoweiren_kai"]); ?>" class="yiczdrenn">
            <!-- 最低人数 -->
            <select name="zuoweiren_kai" class="select" style="width: 15%;" id="zuoweiren_kai">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6" >6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select>
                --

        <!-- 最高人数实际 -->
        <input type="hidden" value="<?php echo ($data["0"]["zuoweiren_zhong"]); ?>" class="zuigaoren">
            <!-- 最高人数 -->
            <select name="zuoweiren_zhong" class="select" style="width: 15%;" id="zuoweiren_zhong">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="20以上">20以上</option>
            </select>
        </div>
    </div>
    <!-- 菜品id -->
    <input type="hidden" value="<?php echo ($data["0"]["id"]); ?>" name='id'>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 修改</button>
            <button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
        </div>
    </div>
</form>
</article>
<script>
    //页面加载事件
    $(document).ready(function(){
        // 实际最低人数
        var sjzdr = $(".yiczdrenn").val();
        // 遍历所有最低人数
        $("#zuoweiren_kai option").each(function(){
            // 判断 最低人数与实际 最低人数 是否相等
            if ($(this).html() == sjzdr) {
                $(this).attr("selected",true);
            }
        });
        // 实际最高人数
        var zuigaoren = $(".zuigaoren").val();
        // 遍历所有最低人数
        $("#zuoweiren_zhong option").each(function(){
            // 判断 最低人数与实际 最低人数 是否相等
            if ($(this).html() == zuigaoren) {
                $(this).attr("selected",true);
            }
        });
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