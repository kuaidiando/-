<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	
    <script src="/kuaidian/Public/home/js/jquery-1.12.4.js"></script>
	<title>设置点的新图标</title>
</head>
<body>
	<div id="allmap"><button>啊啊</button></div>
</body>
</html>
<script type="text/javascript">
	$("#allmap").click(function(){
		$.ajax({
            type:'post',
            dataType: 'json',
            url:'<?php echo U("Home/Ceshi/ajax");?>',
            data:{codesheng:1},
            success: function (dd) {
                console.log(dd);
                $.each(dd.result.pois,function(index,item){
                	console.log(item.name);
                	console.log(item.point);
                });
                // console.log(dd.result.pois.poiType);
                // console.log(dd.result.pois.point);
            }
        })
	});
</script>