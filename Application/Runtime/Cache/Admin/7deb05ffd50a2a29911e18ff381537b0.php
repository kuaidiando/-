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
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i>
    <?php
 array_pop($location); foreach ($location as $value) { echo $value['name']; ?>
    <span class="c-gray en">&gt;</span>
    <?php } ?>
    <?php echo ($active["name"]); ?>
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont">&#xe68f;</i>
    </a>
</nav>


    <!-- 分页效果 -->
    <link href="/kuaidian/aa/thinkphp_3.2.3_full/Public/css/mypage.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/muban/assets/js/jquery.js"></script>
    <script type="text/javascript" src="/kuaidian/aa/thinkphp_3.2.3_full/Public/muban/assets/js/bootstrap.js"></script>
    <!-- 分页结束 -->
    <div class="page-container">
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
            <a href="javascript:;" onclick="admin_add('添加菜品类别','<?php echo U('Admin/Foodtype/add',array('id'=>"$id"));?>','800','500')"
               class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加菜品类别</a></span>
            <span class="r">共有数据：<strong><?php echo ($info["count"]); ?></strong> 条</span> </div>
        <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-responsive">
            <thead>
                <tr class="text-c">
                    <th width="80">编号</th>
                    <th width="80">名称</th>
                    <th width="80">门店名称</th>
                    <th width="60">发布状态</th>
                    <th width="60">顺序</th>
                    <th width="120">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr class="text-c">
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td><?php echo (shopnamedo($vo["dep"])); ?></td><!-- 
                            <td><?php echo (chengshizhuanh($vo["department"])); ?></td>
                            <td><?php echo (shoptype($vo["type"])); ?></td> -->
                            <td class="td-status">
                                <?php if($vo["zhuangt"] == 1 ): ?><span class="label label-success radius">已发布</span>
                                    <?php else: ?> 
                                    <span class="label label-danger radius">未发布</span><?php endif; ?>
                            </td>
                            <td><?php echo ($vo["paix"]); ?></td>
                             <td class="td-manage">
                            <a href="javascript:;"
                               onclick="admin_add('编辑详情','<?php echo U('Admin/Foodtype/edit', array('id' => $vo['id']));?>'
                               ,'800','500')">
                                <i class="Hui-iconfont">&#xe6df;</i>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="h-text-sc" id="<?php echo ($vo["id"]); ?>"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
                        </tr><?php endforeach; endif; ?>
                
            </tbody>
        </table>
        </div>
    </div>
    <!-- 分页效果 -->
    <div class="result page">
        <div class="pages">
            <?php echo ($info["page"]); ?>
        </div>
    </div>
    <script type="text/javascript">
        /*删除*/
        $(document).on("click", '.h-text-sc', function () {
            var op_obj = $(this).parents("tr");
            var id = $(this).attr('id');
            // alert(id);
            layer.confirm('确认要删除吗？',function(){
                $.ajax({
                    type:'POST',
                    dataType: 'json',
                    url:'<?php echo U("Admin/Foodtype/delete");?>',
                    data:{id:id},
                    success: function (result) {
                        if (result.status) {
                            op_obj.remove();
                            layer.msg(result.msg,{icon:1,time:1000});
                        } else {
                            layer.msg(result.msg,{icon:0,time:2000});
                        }
                    }
                })
            });
        });
    </script>


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
<script type="text/javascript">
    $(function () {
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
        $.Huitab("#tab-system .tabBar span", "#tab-system .tabCon", "current", "click", "0");
    });

    /*增加*/
    function admin_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }

    function product_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
</script>