<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>测试</title>
    <script src="/Public/home/js/jquery-1.12.4.js"></script>
</head>
<body>
	<div class="aa">
		<span class="123">123</span>
	</div>
	<div class="bb">
		<span class="456">456</span>
	</div>
</body>
<script type="text/javascript">
	var aa = $(".aa > .123").html(456);
	var bb = $(".bb > .456").html();
	alert(bb);
</script>
</html>