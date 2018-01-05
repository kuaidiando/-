<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<<<<<<< HEAD
<html>
<head>
  <title></title>
</head>
<body>
前台页面
=======
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>快点—智慧餐厅</title>
    <link rel="icon" href="/kuaidian/Public/home/kdyd/images/logo1.png">
    <link rel="stylesheet" href="/kuaidian/Public/home/kdyd/css/index.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/kdyd/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/home/kdyd/css/base2.css">
</head>
<body>
    <!--头部-->
    <header>
        <div class="head">
            <div class="city">
                <div class="ee">
                    <span>北京</span>
                    <img src="/kuaidian/Public/home/kdyd/images/jiantou2.png" alt="">
                </div>
            </div>


            <div class="lookup">
                <div class="rr">
                    <a href="#">
                        <img src="/kuaidian/Public/home/kdyd/images/loogup.png" alt="">
                        <div class="zz">
                            <input type="text" class="search-txt" placeholder="搜索商家名称"/>
                        </div>
                    </a>
                </div>
            </div>


            <div class="person">
                <div class="ww">
                    <img src="images/person.JPG" alt="">
                </div>
            </div>
        </div>
    </header>

    <!--中间广告-->
    <section class="ad_pic">
        <img src="/kuaidian/Public/home/kdyd/images/shangpintu.png" alt="">
    </section>

    <!--中间分类-->
    <section class="job-module"> 
      <dl class="retrie">
        <dt>
          <a id="area" href="javascript:;">全部</a>
          <a id="wage" href="javascript:;">附近</a>
          <a id="zhi" href="javascript:;">智能</a>
        </dt>
        <dd class="area">
          <ul class="slide downlist">
            <li><a href="#">火锅</a></li>
            <li><a href="#">烤鱼</a></li>
            <li><a href="#">甜点</a></li>
            <li><a href="#">川菜</a></li>
            <li><a href="#">鲁菜</a></li>
            <li><a href="#">东北菜</a></li>
          </ul>
        </dd>
        <dd class="wage">
          <ul class="slide downlist">
            <li><a href="#">600m</a></li>
            <li><a href="#">700m</a></li>
            <li><a href="#">800m</a></li>
            <li><a href="#">900m</a></li>
            <li><a href="#">1000m</a></li>
            <li><a href="#">1100m</a></li>
            <li><a href="#">1200m</a></li>
            <li><a href="#">1300m</a></li>
            <li><a href="#">1400m</a></li>
            <li><a href="#">1500m</a></li>
            <li><a href="#">1600m</a></li>
            <li><a href="#">6666m</a></li>
          </ul>
        </dd>
        <dd class="zhi">
          <ul class="slide downlist">
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
            <li><a href="#">。。。</a></li>
          </ul>
        </dd>
    </dl>
</section>
<script type="text/javascript" src="/kuaidian/Public/home/kdyd/js/jquery.js"></script> 
<script type="text/javascript">
  $(function(){ 
    $('.retrie dt a').click(function(){
      var $t=$(this);
      if($t.hasClass('up')){
        $(".retrie dt a").removeClass('up');
        $('.downlist').hide();
        $('.mask').hide();
      }else{
        $(".retrie dt a").removeClass('up');
        $('.downlist').hide();
        $t.addClass('up');
        $('.downlist').eq($(".retrie dt a").index($(this)[0])).show();
        $('.mask').show();
      }
    });
    $(".area ul li a:contains('"+$('#area').text()+"')").addClass('selected');
    $(".wage ul li a:contains('"+$('#wage').text()+"')").addClass('selected');
    $(".zhi ul li a:contains('"+$('#zhi').text()+"')").addClass('selected');
  });
</script> 



    <!--中间商品部分-->
    <div style="position:absolute; height:60%; width: 100%; overflow:auto">
    	
    <?php if(is_array($data)): foreach($data as $key=>$voshop): ?><div class="zhongjian">
	        <div class="shangpin">
	            <div class="hezi">
	               <div class="he">
	                   <div class="tp">
	                       <img src="/kuaidian/Public/<?php echo ($voshop["logo"]); ?>" alt="图片加载中。。。">
	                   </div>
	                   <div class="seller">
	                       <div class="dianming">
	                           <span class="mingzi"><?php echo ($voshop["mingch"]); ?>(<?php echo ($voshop["mingch"]); ?>)</span>
	                           <span class="juli">666m</span>
	                       </div>

	                       <div class="evaluate">
	                           <a href="#" class="start"> <img src="/kuaidian/Public/home/kdyd/images/start.png" alt=""> </a>
	                           <span class="consume">￥<?php echo ($voshop["maney"]); ?>/人</span>
	                           <?php if($voshop["juan"] == 1): ?><a href="#" class="quan"> <img src="/kuaidian/Public/home/kdyd/images/quan.png" alt=""> </a>
	                           	<elseif><?php endif; ?>
	                           
	                           <a href="#" class="dian"> <img src="/kuaidian/Public/home/kdyd/images/dian.png" alt=""> </a>
	                           <a href="#" class="ding"> <img src="/kuaidian/Public/home/kdyd/images/ding.png" alt=""> </a>
	                       </div>

	                       <div class="activity">
	                           <img src="/kuaidian/Public/home/kdyd/images/tui.png" alt="">
	                           <span class="shang">商家已发起“微众代言”可获得 <span class="red">5.0%</span> </span>
	                       </div>
	                   </div>
	               </div>
	            </div>
	        </div>
	    </div><?php endforeach; endif; ?>
    </div>
	    

    <!--底部-->
    <footer>
        <div class="foot">
            <img src="images/shangjia2.png" alt="">
            <a href="#"> <p>商家</p> </a>
        </div>

        <div class="food">
            <img src="images/geren2.png" alt="">
            <a href="#"> <p>我的</p> </a>
        </div>
    </footer>
>>>>>>> d7d238f8d701d7016b1fe2320075da5f62bf89bc
</body>
</html>