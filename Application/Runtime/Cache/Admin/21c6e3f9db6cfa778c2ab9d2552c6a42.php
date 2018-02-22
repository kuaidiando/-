<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="/-/Public/admin/css/xq.css"/>

</head>
<body>
 

    <div class="he">
      

        <div class="cai2">
            <div class="pin">
                <span>菜品信息</span>
            </div>
        </div>

        <div class="cai">
            <div class="nn2">
                <div class="hhe">
                    <div class="nn3">
                        <div class="ming">
                            <span>名称</span>
                        </div>
                    </div>
                    <div class="nn3">
                        <div class="ming">
                            <span>数量</span>
                        </div>
                    </div>
                    <div class="nn3">
                        <div class="ming">
                            <span>单价</span>
                        </div>
                    </div>
                </div>
            <?php if(is_array($goods_info)): foreach($goods_info as $key=>$goods): ?><div class="hhe2">
                <div class="nn3">
                    <div class="ming2">
                        <span><?php echo ($goods["goods_name"]); ?></span>
                    </div>
                </div>
                <div class="nn3">
                    <div class="ming2">
                        <span><?php echo ($goods["goods_num"]); ?>份</span>
                    </div>
                </div>
                <div class="nn3">
                    <div class="ming2">
                        <span>￥<?php echo ($goods["goods_price"]); ?></span>
                    </div>
                </div>
            </div><?php endforeach; endif; ?>
        </div>

       
    </div>

</body>
</html>