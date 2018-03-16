<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<link href="css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="images/main/favicon.ico" />
    <script src="/-/Public/home/js/jquery-1.12.4.js"></script>

    <script src="/-/Public/home/js/jquery-1.12.4.min.js"></script>
    <script src="/-/Public/home/js/jquery.qrcode.min.js"></script>

<style>

</style>
</head>
<body>
<div class="two-dimensionCode-state text-center">
            <div id="qrcode"></div>
            <div class="form-group">
             可截图分享或用手机扫描二维码查看
             </div>
 </div>

</body>
<script>

  var path="http://mk.365kdian.com/index.php/Home/Index/detail/shopid/80";
  var realPath=toUtf8(path);
  $("#qrcode").qrcode({
      text : realPath,  //设置二维码内容  
      render : "canvas",//设置渲染方式  
      width : 256,     //设置宽度,默认生成的二维码大小是 256×256
      height : 256,     //设置高度  
      typeNumber : -1,      //计算模式  
      // correctLevel : QRErrorCorrectLevel.H,//纠错等级  
      background : "#ffffff",//背景颜色  
      foreground : "#000000", //前景颜色  
  });

// $("#qrcode").qrcode({
//   render: "table", //table方式
//   width: 200, //宽度
//   height:200, //高度
//   text: "http://www.baidu.com" //任意内容
// });
function toUtf8(str) {   //地址中可用中文字符 
     var out, i, len, c;    
     out = "";    
     len = str.length;    
     for(i = 0; i < len; i++) {    
         c = str.charCodeAt(i);    
         if ((c >= 0x0001) && (c <= 0x007F)) {    
             out += str.charAt(i);    
         } else if (c > 0x07FF) {    
             out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));    
             out += String.fromCharCode(0x80 | ((c >>  6) & 0x3F));    
             out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));    
         } else {    
             out += String.fromCharCode(0xC0 | ((c >>  6) & 0x1F));    
             out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));    
         }    
     }    
     return out;    
 };
</script>
</html>