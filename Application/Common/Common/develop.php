<?php
//自定义函数
//aes加密
function aes_encrypt($str)
{
    $key = "ShowMe\$The\$Money";

    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
        $str, MCRYPT_MODE_ECB,null);

    return base64_encode($ciphertext);
}

//aes解密
function aes_descrypt($str)
{
    $key = "ShowMe\$The\$Money";
    $ciphertext_dec = base64_decode($str);
    //$iv_dec         = substr($ciphertext_dec, 0, null);
    //$ciphertext_dec = substr($ciphertext_dec, null);

    return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
        $ciphertext_dec, MCRYPT_MODE_ECB, null);
}

/**
 * 会员接口签名函数
 *
 * @param array $argument 请求参数键值对，格式array($key1 => $value1, $key2 => $value2, ...)
 * @return string 返回签名字符串
 */
function sign($argument)
{
    //除去数组中的空值和签名参数
    $para_filter = array();
    while (list ($key, $val) = each ($argument)) {
        if ($val == "") {
            continue;
        } else	{
            $para_filter[$key] = $argument[$key];
        }
    }

    //排序
    ksort($para_filter);
    reset($para_filter);

    //拼接$key=$value格式字符串
    $arg  = "";
    while (list ($key, $val) = each ($para_filter)) {
        $arg.=$key."=".$val."&";
    }
    //去掉最后一个&字符
    $arg = substr($arg,0,count($arg)-2);
    //如果存在转义字符，那么去掉转义
    if(get_magic_quotes_gpc()){
        $arg = stripslashes($arg);
    }

    $sign_str = '';
    if (!$argument) {
        $sign_str = "key=ethank_business_develop";
    } else {
        $sign_str = $arg."&key=ethank_business_develop";
    }

    //return $sign_str;

    return md5($sign_str);
}

/**
 * 检测手机号是否正确
 * @param $mobile
 * @return boolean
 */
function check_mobile($mobile)
{
    if (!$mobile) {
        return false;
    }

    if(preg_match("/1[34578]{1}\d{9}$/",$mobile)){
        return true;
    }else{
        return false;
    }
}

/**
 * 验证码
 * @param $num
 * @return number
 */
function sms_code($num=6)
{
    if (!$num) {
        $num = 6;
    }

    $s_num = pow(10, $num-1);
    return mt_rand($s_num+1, $s_num*10-1);
}

//发送手机验证码
function send_sms($mobile, $content)
{
    if (!$mobile || !$content) {
        return false;
    }

    if (!check_mobile($mobile)) {
        return '手机号码有误';
    }

    $sn  = \config_helper::get_config_value('mobile_sms_sn');
    $pwd = \config_helper::get_config_value('mobile_sms_pwd');
    $url = \config_helper::get_config_value('mobile_sms_url');
    // var_dump($sn,$pwd);exit;
    if (!$sn || !$pwd) {
        return false;
    }

    $data = array(
        'userid'  => '',
        'account'      => $sn,
        'password'     => $pwd,
        'mobile'  => $mobile,
        'content' => '【快点APP】'.$content,
        // 'ext'     => '',
        'sendTime'   => '',
        'action'    => 'send',
        'extno'  => '',
    );
    // dump($data);exit;

    $result = go_curl($url,'POST',$data );
    // dump($result);exit;
    // \Think\Log::record(json_encode($result));
    return array('info'=>'发送成功', 'result'=>$result);

    //发送短信 send mail
    /*$soap = new SoapClient("http://sdk.entinfo.cn:8061/webservice.asmx?wsdl");
     $result = $soap->mdsmssend (array(
     'sn'      => $sn,
     'pwd'     => $pwd,
     'mobile'  => $mobile,
     'content' => $content,
     'ext'     => '',
     'stime'   => '',
     'rrid'    => '',
     'msgfmt'  => ''
     ));

    return array('info'=>'发送成功', 'result'=>json_encode($result));*/
}

/**
 * 验证是否授权 weixin
 */
function check_weixin_auth($return_url, $scope="snsapi_userinfo")
{
    
    $return_url = base64_encode($return_url);
    session('weixin_return_url', $return_url);
    redirect(U("home/weichat/auth", "scope={$scope}"));
    return false;
    // 
    
}

//获取前台提交来的json数据
function get_json_data()
{
    header('Content-Type: application/json; charset=utf-8');
    return json_decode(file_get_contents("php://input"), true);
}
 
//生成就餐号
function createNum($num){  
    $i=intval(substr($num,8));  
    $f=date('Ymd');  
    if(substr($num,0,8)<$f){  
        return $f.'0001';  
        }  
    else{  
        $i+=1;  
        if($i<10){  
            return $f.'000'.$i;  
        }else if($i<100){  
            return $f.'00'.$i;  
        }else if($i<1000){  
            return $f.'0'.$i;  
        }else{  
            return $f.$i;  
        }  
    }  

}  

/**
 * 随机产生A-Z, a-z, 0-9的字符串
 * @param int $length 随机数的长度
 * @return string
 */
function random_hash($length = 4)
{
    $salt = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
    $count = count($salt);
    $hash = '';
    for ($i = 0; $i < $length; $i++) {
        $hash .= $salt[mt_rand(0, $count-1)];
    }
    return $hash;
}


//是否微信端
function is_weixin()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if(stripos($user_agent, 'MicroMessenger') !== false) {
        return true;
    }
    return false;
}

