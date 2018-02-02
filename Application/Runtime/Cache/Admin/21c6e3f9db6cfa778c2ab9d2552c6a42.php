<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<header class="navbar-wrapper">
    <link rel="stylesheet" type="text/css" href="/-/Public/admin/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/-/Public/admin/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="/-/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="/-/Public/admin/lib/icheck/icheck.css"/>
    <link rel="stylesheet" type="text/css" href="/-/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="/-/Public/admin/static/h-ui.admin/css/style.css"/>
</header>
<body>
<div id="iframe_box" class="Hui-article">
    <div class="show_iframe">
        <div style="display:none" class="loading">
        </div>
        <!-- 主题内容 -->
        <div>
            <div class="page-container">
      
        <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-responsive">
            <thead>
                <tr class="text-c">
                    <th width="80">菜品名称</th>
                    <th width="80">菜品数量</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($goods_info)): foreach($goods_info as $key=>$one): ?><tr class="text-c">
                            <td><?php echo ($one["goods_name"]); ?></td>
                            <td><?php echo ($one["goods_num"]); ?></td>
                            
                        </tr><?php endforeach; endif; ?>
                
            </tbody>
        </table>
        </div>
    </div>
        </div>
    </div>
</div>
</body>
</html>