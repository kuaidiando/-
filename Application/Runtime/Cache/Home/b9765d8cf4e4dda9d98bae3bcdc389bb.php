<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>轮播图</title>
    <script src="/-/Public/home/js/jquery-1.12.4.js"></script>
    <script src="/-/Public/home/js/bootstrap.min.js"></script>
    <link href="/-/Public/home/css/bootstrap.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/-/Public/home/js/html5shiv.min.js"></script>
    <script src="/-/Public/home/js/respond.min.js"></script>
    <![endif]-->
    <style>
        .m_imgBox{
            display: block;
            width: 100%;
        }
        .m_imgBox img{
            display: block;
            width: 100%;
        }
    </style>
</head>
<body>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="#" class="m_imgBox">
                <img src="/-/Public/<?php echo ($event["0"]); ?>" alt="">
            </a>
        </div>

        <div class="item">
            <a href="#" class="m_imgBox">
                <img src="/-/Public/<?php echo ($event["1"]); ?>" alt="">
            </a>
        </div>

        <div class="item">
            <a href="#" class="m_imgBox">
                <img src="/-/Public/<?php echo ($event["2"]); ?>" alt="">
            </a>
        </div>
    </div>
</div>

</body>
</html>