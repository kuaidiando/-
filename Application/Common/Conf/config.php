<?php

//加载助手函数
load_helper();
return array(
	//数据库配置信息
'DB_TYPE'   => 'mysql', // 数据库类型
'DB_HOST'   => '192.168.0.104', // 服务器地址
'DB_NAME'   => 'kuaidian', // 数据库名
'DB_USER'   => 'root', // 用户名
'DB_PWD'    => 'root', // 密码
'DB_PORT'   => 3306, // 端口
// 'DB_PREFIX' => 'think_', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符集
'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
);