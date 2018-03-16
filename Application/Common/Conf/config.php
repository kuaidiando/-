<?php

//加载助手函数
load_helper();

return array(
	//数据库配置信息
'DB_TYPE'   => 'mysql', // 数据库类型
// 'DB_HOST'   => '127.0.0.1', // 服务器地址
// 'DB_NAME'   => 'kuaidian', // 数据库名
// 'DB_USER'   => 'root', // 用户名
// 'DB_PWD'    => 'root', // 密码 
'DB_HOST'   => '192.168.0.108', // 服务器地址
'DB_NAME'   => 'kuaidian', // 数据库名
'DB_USER'   => 'aa', // 用户名'
'DB_PWD'    => 'root', // 密码 

'DB_PORT'   => 3306, // 端口
// 'DB_PREFIX' => 'think_', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符集
'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
//加载配置函数
'LOAD_EXT_FILE'	=> "validate,develop,notice",
'URL_MODEL'             =>  1,

  // /* 微信开发配置*/
    'WX_CONFIG' => array(
        'APPID'     => 'wx30248bc4475fd353',//wx5db90f876d37c2bf
        'APPSECRET' => '8545a863d7110282be8cd0014ed4cfc6',
        //受理商ID，身份标识
        'MCHID'     => '1299142601',//1280273701
        //商户支付密钥Key
        'KEY'       => 'liuyanghaoqianqian85924897178952',//dkljuiuyDF1265DF09kidfjhuyFD89cd
        //JSAPI路径设置
        'JS_API_CALL_URL' => 'https://mk.365kdian.com/Home/Pay/index',
        //证书路径,注意应该填写物理绝对路径
        'SSLCERT_PATH'    => '/ThinkPHP/Library/Vendor/WxPayPubHelper/cacert/apiclient_cert.pem',
        'SSLKEY_PATH'     => '/ThinkPHP/Library/Vendor/WxPayPubHelper/cacert/apiclient_key.pem',
        //异步通知url
        'NOTIFY_URL'      => 'https://mk.365kdian.com/Home/Pay/notify',
        //curl请求超时时间，单位秒
        'CURL_TIMEOUT'    => 30,
    ),
);