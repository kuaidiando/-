<?php

//加载助手函数
load_helper();
define('SITE_URL', 'https://'.$_SERVER['HTTP_HOST'].__ROOT__);

return array(
	//数据库配置信息
'DB_TYPE'   => 'mysql', // 数据库类型
// 'DB_HOST'   => '127.0.0.1', // 服务器地址
// 'DB_NAME'   => 'kuaidian', // 数据库名
// 'DB_USER'   => 'root', // 用户名
// 'DB_PWD'    => 'root', // 密码 营业执照 卫生许可证 法人身份正反面图片 法人联系方式
'DB_HOST'   => '192.168.0.107', // 服务器地址
'DB_NAME'   => 'kuaidian', // 数据库名
'DB_USER'   => 'aa', // 用户名
'DB_PWD'    => 'root', // 密码 营业执照 卫生许可证 法人身份正反面图片 法人联系方式
'DB_PORT'   => 3306, // 端口
// 'DB_PREFIX' => 'think_', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符集
'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
//加载配置函数
'LOAD_EXT_FILE'	=> "develop,notice",
'URL_MODEL'             =>  1,


    // /* 微信开发配置*/
    'WX_CONFIG' => array(
        'APPID'     => 'wx30248bc4475fd353',//wx5db90f876d37c2bf
        'APPSECRET' => '8545a863d7110282be8cd0014ed4cfc6',//f96a4d66384e05ad141d1ad021e01054
        //curl请求超时时间，单位秒
        // 'CURL_TIMEOUT'    => 30
    ),
);