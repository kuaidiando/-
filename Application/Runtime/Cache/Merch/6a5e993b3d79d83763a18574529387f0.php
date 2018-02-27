<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" style="font-size: 42.4px;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no">
    <title>店员详情</title>
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/base.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/text.css">
    <link rel="stylesheet" href="/kuaidian/Public/merch/css/dianyuanxiangqing.css">
    <script type="text/javascript" src="/kuaidian/Public/jquery/jquery.js"></script>
</head>
<body style="font-size: 12px">
    <div class="header">
        <div class="id">
            <div class="gong">
                <span>工号</span>
            </div>

            <div class="hao2">
                <span><?php echo ($res["0"]["code"]); ?></span>
            </div>
        </div>

        <div class="name">
            <div class="ming">
                <span>姓名</span>
            </div>

            <div class="zi">
                <span><?php echo ($res["0"]["name"]); ?></span>
            </div>
        </div>

        <div class="phone">
            <div class="dian">
                <span>电话</span>
            </div>

            <div class="hao">
                <span><?php echo ($res["0"]["tel"]); ?></span>
            </div>
        </div>

        

        <div class="zhi">
            <div class="wei">
                <span>职位</span>
            </div>

            <div class="qq">
                <span><?php echo ($res["0"]["typehou"]); ?></span>
            </div>
        </div>
    </div>

    <div class="footer">
        <input type="text" style="display: none;" class="staffid" value="<?php echo ($res["0"]["id"]); ?>">
        <span>删除店员</span>
    </div>
</body>
<script type="text/javascript">
    $(".footer").click(function(){
        var staffid = $(".staffid").val();
        // alert(staffid);
        $.ajax({
            type:'post',
            url:"<?php echo U('Merch/Staff/delstaff');?>",
            dataType: 'json',
            data:{"staffid":staffid},
            success:function (data) {
                if (data.code == 200) {
                    window.location.href = "<?php echo U('Merch/Staff/index');?>";
                }else{
                    alert(data.msg);
                }
            }
        })
    });
</script>
</html>