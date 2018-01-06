<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" href="favicon.ico">
    <title>商家注册——管理系统</title>
    <link rel="stylesheet" href="<?php echo ($smarty["const"]["PUBLIC_PATH"]); ?>/manage/css/bootstrap.min.css">
    
    
</head>
<body>
    <div class="mms-header">
        <nav class="navbar navbar-ethank navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                 
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                </div>
            </div>
        </nav>
    </div>


    <div class="mms-body">
      <div class="mms-main">
          <div class="content container-fluid">
              <div class="row">
                  <div class="col-md-10">

                      <!-- main begin -->
                      <div class="panel panel-ethank">
                        <div class="panel-heading">用户注册
                          
                        </div>
                        <div class="panel-body">
                          <form id="addform" action="<?php echo U('Home/Reg/save');?>" method="post" enctype="multipart/form-data" style="width:330px;margin: 0 auto;">

                         <!--    <div class="form-group">
                              <label for="theme_name">昵称：</label>
                              <div ><input type="text" name="nick_name" value="" placeholder="请填写昵称" datatype="*2-20" nullmsg="请填写昵称！" errormsg="请输入2-20个汉字或字符" class="w320 form-control" />
                              <span class="Validform_checktip"></span>
                              </div>
                            </div> -->

                            <div class="form-group">
                              <label for="theme_name">账号：</label>
                              <div ><input type="text" name="tel" value="" placeholder="请填写账号" datatype="*5-30" nullmsg="请填写账号！" errormsg="请填写至少5位,最多30位的字符串" class="w320 form-control" />
                              <span class="Validform_checktip"></span>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="theme_name">密码：</label>
                              <div ><input type="password" name="password" value="" placeholder="请填写密码" datatype="*6-20" nullmsg="请填写密码！" errormsg="请填写6-20个字符" class="w320 form-control" />
                              <span class="Validform_checktip"></span>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="theme_name">重复密码：</label>
                              <div ><input type="password" name="repassword" value="" placeholder="请填写重复密码" datatype="*" recheck="password" nullmsg="请填写重复密码！" errormsg="重复密码与密码不一致" class="w320 form-control" />
                              <span class="Validform_checktip"></span>
                              </div>
                            </div>

                               <div class="form-group">
                              <label for="theme_name">验证码：</label>
                                <input type="password" name="code" value="" placeholder="请填写验证码" datatype="*" recheck="password" class="w320 form-control" /> <img src="/-/index.php/Home/Reg/showcode"  onclick=this.src='/-/index.php/Home/Reg/showcode?d='+Math.random();>

                            <div class="form-group">
                              <img style="display:none;" src="<?php echo ($smarty["const"]["IMAGE_PATH"]); ?>/loading.gif" />
                              <button type="submit" class="btn btn-ethank-info js_submit">保存</button>
                            </div>
                          </form>
                        </div>
                      </div><!-- main end -->

                  </div>
              </div>
          </div>
      </div>

<script>
// $(function(){
//   // 提交表单合法性验证 
//     $("#addform").Validform({ 
//     tiptype:function(msg,o,cssctl){ 
//       if(!o.obj.is("form")){ 
//           var objtip=o.obj.siblings(".Validform_checktip");
//           cssctl(objtip,o.type);
//           objtip.text(msg); 
//       }
//     },
//     label:"label",
//   });

// })
</script>        

    </div>
</body>
</html>