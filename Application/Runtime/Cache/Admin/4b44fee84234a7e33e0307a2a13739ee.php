<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<script type="text/javascript" src="/-/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
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
    <form class="form form-horizontal" id="form-admin-add"  method="post" enctype="multipart/form-data">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($row["ename"]); ?>"  id="ename"name="ename">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <img width="100" height="50" src="/-/Public<?php echo ($row["pic"]); ?>" alt="图片加载中。。。">
                <div class="uploader-thum-container">
                    <input type="file" name="pic">
                </div>
            </div>
        </div>
        
        
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否发布：</label>
            <div class="formControls col-xs-8 col-sm-9" id="statuss">

                <?php if($row["status"] == 1 ): ?>使用&nbsp;&nbsp;<input type="radio"  value="1" name="status" class= "status" checked="checked">
                    不使用&nbsp;&nbsp;<input type="radio" class= "status" value="0" name="status" >
                    <?php else: ?> 
                    使用&nbsp;&nbsp;<input type="radio" class= "status" value="1" name="status" >
                    不使用&nbsp;&nbsp;<input type="radio" class= "status" value="0" name="status" checked="checked"><?php endif; ?>
            </div>
        </div>
        

       
        <!-- 隐藏id充当条件 -->
       <input type="hidden" value="<?php echo ($row["id"]); ?>" name='id'>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <button  class="edit btn btn-primary radius" id = "<?php echo ($row["id"]); ?>"type="submit"><i class="Hui-iconfont ">&#xe632;</i> 修改</button>
                <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</article>

<script type="text/javascript">
        /*编辑轮播图*/
        $(document).on("click", '.edit', function () {
            var id,isAutoSend,status,ename;
            var id = $(this).attr('id');
            var isAutoSend = document.getElementsByName('status');
            for (var i = 0; i < isAutoSend.length; i++) {
                if (isAutoSend[i].checked == true) {
                    var status = isAutoSend[i].value;
                }
            }
            var ename = document.getElementById('ename').value;
            // var flag = false;
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url:'<?php echo U("Admin/Event/update");?>',
                    data:{id:id,status:status,ename:ename},
                    success: function (result) {
                        // if(result){
                        //     var flag = true;
                        // }else{
                        //     var flag = false;
                        // }
                        if (result.status == 1) {
                            layer.msg(result.msg,{icon:1,time:3000});
                            layer_close();
                            
                        } else {

                            layer.msg(result.msg,{icon:0,time:2000});


                        }
                    }
                })
                // if(flag){
                //     layer.msg(result.msg,{icon:1,time:3000});
                //             layer_close();
                // }else{
                //     layer.msg(result.msg,{icon:0,time:2000});
                // }
        });
    </script>

<script type="text/javascript">
    $(document).on('change','#selsheng',function(){
        var codesheng = $(this).val();//获取市对应code
        var str = '';//城市对应区域
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
                //赋值区域
                $("#selshi").html(str);
            }
        })
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