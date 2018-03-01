<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>商品管理</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/shangpinguanli.css">
    <script type="text/javascript" src="/kuaidian/Public/merch/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //Default Action
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {
                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content
                var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active content
                return false;
            });

        });
    </script>
    <script src="/kuaidian/Public/merch/js/flexible.js"></script>
    <script src="/kuaidian/Public/merch/js/jquery-1.12.4.js"></script>
    <script    >
        $(function(){
            $(window).scroll(function() {
                if($(window).scrollTop()>1){
                    $(".nav").addClass("fixedNav");
                }else{
                    $(".nav").removeClass("fixedNav");
                }
            });
        });
    </script>
    <style>
        .fixedNav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100000;
            _position: absolute;
            _top: expression(eval(document.documentElement.scrollTop));
        }
    </style>
</head>
<body style="font-size: 12px">
<div class="container">
    <ul class="tabs">
    	<!-- 遍历菜品类型 -->
    	<?php if(is_array($resft)): foreach($resft as $key=>$voresft): ?><!-- 判断是否是第一个 -->
			<?php if($voresft["typefd"] == 1): ?><li class="active">
		            <a href="#<?php echo ($voresft["id"]); ?>"><?php echo ($voresft["mingch"]); ?></a>
		        </li>
	        <?php else: ?>
	        	<li>
		            <a href="#<?php echo ($voresft["id"]); ?>"><?php echo ($voresft["mingch"]); ?></a>
		        </li><?php endif; endforeach; endif; ?>
    </ul>
    <div class="tab_container">
    	<!-- 遍历菜品类别信息 -->
		<?php if(is_array($zuizhongfood)): foreach($zuizhongfood as $key=>$vozuizhongfood): ?><div id="<?php echo ($vozuizhongfood["id"]); ?>" class="tab_content" style="display: block; ">
            <section class="nav">
                <div class="dan">
                <div class="ddan">
                    <span><?php echo ($vozuizhongfood["zhushi"]); ?></span>
                </div>
            </div>
            </section>
            <div class="kong" style="width: 100%; height: 60px;"></div>
            <!-- 遍历菜品 -->
            <?php if(is_array($vozuizhongfood[foodxq])): foreach($vozuizhongfood[foodxq] as $key=>$vofoodxq): ?><div class="he">
                <div class="hhe">
                    <div class="top">
                        <div class="tu">
                            <img src="/kuaidian/Public<?php echo ($vofoodxq["logo"]); ?>" alt="">
                        </div>

                        <div class="you">
                            <div class="name">
                                <span><?php echo ($vofoodxq["cpmingch"]); ?></span>
                            </div>

                            <div class="kou">
                                <span>口味:<?php echo ($vofoodxq["kouwei"]); ?></span>
                            </div>

                            <div class="xia">
                                <div class="qian">
                                    <span>￥<?php echo ($vofoodxq["shoujia"]); ?></span>
                                </div>

                                <div class="yuan">
                                    <del>￥<?php echo ($vofoodxq["yuanjia"]); ?></del>
                                </div>

                                <div class="yue">
                                    <span>月售</span>
                                </div>

                                <div class="shu">
                                    <span>88</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bot">
                        <div class="bz">
                            <div class="xiao">
                                <span><a href="<?php echo U('Merch/Foodhoutai/editfood',array('shopid'=>$shopid,'foodid'=>$vofoodxq[id]));?>" style="color: #097f7e;">编辑</a></span>
                            </div>
                        </div>

                        <div class="bz">
                            <div class="xiao">
                                <!-- 隐藏菜品id -->
                                <input type="text" class="foodid" style="display: none;" value="<?php echo ($vofoodxq["id"]); ?>">
                                <!-- 隐藏状态 -->
                                <input type="text" class="foodzhuangt" style="display: none;" value="<?php echo ($vofoodxq["zhuangt"]); ?>">
                            	<?php if($vofoodxq["zhuangt"] == 1): ?><span class="typejia">下架</span>
                                <?php else: ?>
                                	<span class="typejia">上架</span><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><?php endforeach; endif; ?>
            <div style="width: 100%;height: 200px;"></div>
        </div><?php endforeach; endif; ?>
    </div>
</div>

<div class="footer">
    <div class="foot">
        <div class="ztu">
            <img src="/kuaidian/Public/merch/images/guan.png" alt="">
        </div>

        <div class="fen">
            <a href="<?php echo U('Merch/Foodshophoutai/index',array('shopid'=>$shopid));?>"><span>分类管理</span></a>
        </div>
    </div>

    <div class="foot2">
        <div class="xian">
            <div class="can">
                <span>餐位费管理</span>
            </div>
        </div>

        <div class="yy">
            <div class="xtu">
                <img src="/kuaidian/Public/merch/images/jia.png" alt="">
            </div>
            <div class="xin">
                <a href="<?php echo U('Merch/Foodhoutai/addfood',array('shopid'=>$shopid));?>"><span>新建商品</span></a>
            </div>
        </div>
    </div>
</div>

</body>
    <script type="text/javascript">
        $(".typejia").click(function(){
            //菜品id
            var foodid = $(this).parent().find(".foodid").val();//菜品状态
            var typeid = $(this).parent().find(".foodzhuangt").val();//菜品状态
            // alert(foodid);
            $.ajax({
                type:'POST',
                dataType: 'json',
                url:'<?php echo U("Merch/Foodhoutai/edittypeshangjia");?>',
                data:{"typeid":typeid,"foodid":foodid},
                success: function (result) {
                    if (result == 1) {
                        window.location.reload();
                    }
                   
                }
            })
        });
    </script>
</html>