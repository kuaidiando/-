<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>我的店员</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/wodedianyuan.css">
    <script type="text/javascript" src="/kuaidian/Public/jquery/jquery.js"></script>
</head>
<body style="font-size: 12px">
    <div class="head">
        <div class="ren">
            <span>员工人数：</span>
        </div>

        <div class="wei">
            <span><?php echo ($num); ?>位</span>
        </div>
    </div>

    <div class="yg" >
        <?php if(is_array($res)): foreach($res as $key=>$vores): ?><a href="<?php echo U('Merch/Staff/ygxiangqing',array('staffid'=>$vores[id]));?>">
        <div class="yuan">
            <div class="zuo">
                <div class="name">
                    <div class="ming">
                        <span><?php echo ($vores["name"]); ?></span>
                        <span style="color: #097f7e;">&nbsp;&nbsp;工号：<?php echo ($vores["code"]); ?></span>
                    </div>

                    <div class="zhuang">
                        <div class="tai">
                            <span>状态：</span>
                        </div>

                        <div class="ss">
                            <span>
                                <?php if($vores["typezhuangtai"] == 2): ?>上班
                                <?php else: ?>
                                    下班<?php endif; ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="zhi">
                    <div class="kuang">
                        <span><?php echo ($vores["typehou"]); ?></span>
                    </div>
                </div>
            </div>

            <div class="you">
                <a href="tel:13716172720">
                    <div class="phone">
                    <a href="tel:<?php echo ($vores["tel"]); ?>"> <img src="/kuaidian/Public/home/img/phone.png" alt=""></a> 
                       
                    </div>
                </a>
            </div>
        </div>
        </a><?php endforeach; endif; ?>
    </div>

    <div id="footer">
        <button>添加员工</button>
    </div>
</body>
<script type="text/javascript">
    
    $("#footer").click(function(){
        window.location.href = "<?php echo U('Merch/Staff/addyuangong',array('shopid'=>1));?>";
    });
</script>
</html>