<?php
/**
 * 微信授权控制器 IndexController.class.php
 * ============================================================================
 * ----------------------------------------------------------------------------
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * $Author: 程文学
 * $Date: 2018-3-1
*/
namespace Home\Controller;
use Think\Controller;
class WeichatController extends Controller {

    private $app_id;
    private $app_secret;
    private $callback;
    private $user_id;

    public function _initialize()
    {
        // echo SITE_URL;exit;
        header('Content-Type:text/html;charset=utf-8');
        $weixin_config      = C('WX_CONFIG');
        $this->app_id       = $weixin_config['APPID'];
        $this->app_secret   = $weixin_config['APPSECRET'];
        $this->callback     = SITE_URL."/home/weichat/callback";
        // echo $this->callback;exit;
        $this->user_id    = \user_helper::get_user_id();
        // var_dump($this->app_id,$this->app_secret,$this->callback);exit;
        // \Think\Log::record(json_encode($this->user_id),'WARN',true);
        if (!$this->app_id || !$this->app_secret || !$this->callback) {
            echo '微信账号设置有误';
            return false;
        }
    }

    public function __call($action = '', $params = array())
    {
        // echo '123';exit;
        //snsapi_userinfo
        // $scope      = I('scope', 'snsapi_base');
        $scope      = I('scope', 'snsapi_userinfo');
        $return_url = session('weixin_return_url');
        session('weixin_return_url', null);
        $return_url = base64_decode($return_url);
        $_SESSION['wx_oauth_return_url'] = $return_url;
        $state      = random_hash(6);
        $_SESSION['weixin_oauth2_state'] = $state;
        $callback = urlencode($this->callback);
        // echo $callback;exit;
        // if (!$this->user_id) {
        //     redirect($return_url);
        //     return false;
        // }

        // M('weixin_user')->where(array('user_id'=>$this->user_id))->save(array('user_id'=>0));

        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->app_id}&redirect_uri={$callback}&response_type=code&scope={$scope}&state={$state}#wechat_redirect";
        // $url = "https://www.365kdian.com?appid={$this->app_id}&redirect_uri={$callback}&response_type=code&scope={$scope}&state={$state}#wechat_redirect";
        // var_dump($url);exit;
        
        // $res = go_curl($url,'POST');
        // dump($res);exit;
        redirect($url);
    }


    // public function callback(){
    //     $return_url = SITE_URL;
    //     return $return_url;
    // }
    public function callback()
    {
        // retutn 
        //用户登录 判断是否是微信  微信
        //var_dump($_REQUEST, $_SERVER);
        $code  = I('code', '');
        $state = I('state', '');
        // var_dump($code, $state);exit;

        if (!$code && !$state) {
            if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']) {
                $request_str = explode('?', $_SERVER['REQUEST_URI']);

                if (isset($request_str[1]) && stripos($request_str[1], '&')) {
                    $request_data = explode('&', $request_str[1]);
                    $new_request_data = array();
                    foreach ($request_data as $k=>$v) {
                        $new_request_data[$k] = explode('=', $v);

                        if ($new_request_data[$k][0] == 'code') {
                            $code = $new_request_data[$k][1];
                        } elseif ($new_request_data[$k][0] == 'state') {
                            $state = $new_request_data[$k][1];
                        }
                    }
                }
            }
        }

        if (!$code) {
            return '对不起，授权信息错误[1]';
        }

        if (empty($_SESSION['weixin_oauth2_state']) || $_SESSION['weixin_oauth2_state'] != $state) {
            return '授权失败[2]';
        }

        $return_url = SITE_URL;
        // $return_url = "www.365kdian.com";
        // dump($return_url);exit;
        if(!empty($_SESSION['wx_oauth_return_url'])) {
            $return_url = urldecode($_SESSION['wx_oauth_return_url']);
        }

        try {

            $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->app_id}&secret={$this->app_secret}&code={$code}&grant_type=authorization_code";
            // $url = $return_url."?appid={$this->app_id}&secret={$this->app_secret}&code={$code}&grant_type=authorization_code";
            $request_info = json_decode(go_curl($url, 'GET'), true);
            // dump($request_info);exit;

            if (isset($request_info['errcode']) && $request_info['errcode']) {
                return '授权失败[4]';
            }

            $expires_time = $request_info['expires_in'] + time();

            $new_weixin_user_info = array(
                    'openid'        => $request_info['openid'],
                    'access_token'  => $request_info['access_token'],
                    'refresh_token' => $request_info['refresh_token'],
                    'scope'         => $request_info['scope'],
                    'expires_time'  => $expires_time,
            );

            if (isset($request_info['unionid'])) {
                $new_weixin_user_info['unionid'] = $request_info['unionid'];
            }

            if ('snsapi_userinfo' == $request_info['scope']) {
                $user_info = $this->get_user_info($request_info['access_token'], $request_info['openid']);
                // dump($user_info);exit;
                if (isset($user_info['errcode'])) {
                    return '授权失败[5]';
                }

                $new_weixin_user_info['nickname'] = preg_replace('/[\x{10000}-\x{10FFFF}]/u', ' ', $user_info['nickname']);
                $new_weixin_user_info['sex']      = $user_info['sex'];
                $new_weixin_user_info['province'] = $user_info['province'];
                $new_weixin_user_info['city']     = $user_info['city'];
                $new_weixin_user_info['photo']   = preg_replace('/\/\d+$/', '/0', $user_info['headimgurl']);
            }

            $weixin_user = M('weixin_user');
            $weixin_user_info = uri('weixin_user', array('openid'=>$request_info['openid']));
            $new_weixin_user_info['user_id'] = $this->user_id;
            // dump($weixin_user_info);exit;
            if (!$weixin_user_info) {

                $new_weixin_user_info['add_time'] = date('Y-m-d H:i:s');

                $weixin_user_id = $weixin_user->add($new_weixin_user_info);
                $weixin_user_info = uri('weixin_user', $weixin_user_id);
                if (!$weixin_user_info) {
                    echo '数据有误';
                    return false;
                }

            } else {

                // $result = $weixin_user->where(array('id'=>$weixin_user_info['id']))->save($new_weixin_user_info);
                // $weixin_user_info = uri('weixin_user', $weixin_user_info['id']);
                // if (!$weixin_user_info) {
                //     echo '数据有误';
                //     return false;
                // }
                $_SESSION['openid'] = $request_info['openid'];
                // redirect($return_url);
                
            }
            $update_info = array(
                    'sex' => $weixin_user_info['sex'],
            );

            if ($weixin_user_info['nickname']) {
                $update_info['nick_name'] = $weixin_user_info['nickname'];
            }

            if ($weixin_user_info['photo']) {
                $update_info['photo'] = $weixin_user_info['photo'];
            }

            M('user')->where(array('id'=>$this->user_id))->save($update_info);

            //var_dump($return_url);
            redirect($return_url);
        } catch(Exception $e) {
            echo $e->getMessage();
            return '授权失败[3]';
        }
    }

    private function get_user_info($access_token, $openid)
    {
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN";

        $request_info = go_curl($url, 'GET');

        return json_decode($request_info, true);
    }

    // public function check_user(){
    //     $return_url = SITE_URL;
    //     // dump($return_url);exit;
    //     // return $return_url;
    //     $state      = random_hash(6);
    //     $scope      = I('scope', 'snsapi_base');
    //     // urlencode($this->callback)
    //     $callback = urlencode($return_url."/home/weichat/getcode");
    //     // dump($collback);exit;
    //     $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->app_id}&redirect_uri={$callback}&response_type=code&scope={$scope}&state={$state}#wechat_redirect";
    //     // redirect($url);
    //     header("Location:".$url);
    //     // $a = file_get_contents($url);
    //     // dump($a);exit;
    //     // $code = $this->getcode();
    //     // dump($code);exit;
   

    // }

    // public function getcode(){
    //     $code = I('code');
    //       if (!$code && !$state) {
    //         if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']) {
    //             $request_str = explode('?', $_SERVER['REQUEST_URI']);

    //             if (isset($request_str[1]) && stripos($request_str[1], '&')) {
    //                 $request_data = explode('&', $request_str[1]);
    //                 $new_request_data = array();
    //                 foreach ($request_data as $k=>$v) {
    //                     $new_request_data[$k] = explode('=', $v);

    //                     if ($new_request_data[$k][0] == 'code') {
    //                         $code = $new_request_data[$k][1];
    //                     } elseif ($new_request_data[$k][0] == 'state') {
    //                         $state = $new_request_data[$k][1];
    //                     }
    //                 }
    //             }
    //         }
    //     }
    //     // dump($code);exit;
    //     $urlcode = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->app_id}&secret={$this->app_secret}&code=".$code."&grant_type=authorization_code";
    //     // $weixin=file_get_contents($urlcode);//通过code换取网页授权access_token
    //     $weixin = json_decode(go_curl($urlcode, 'GET'), true);

    //     // dump($weixin);exit;
    //     // $jsondecode=json_decode($weixin); //对JSON格式的字符串进行编码
    //     // $array = get_object_vars($weixin);//转换成数组
    //     $openid = $weixin['openid'];//输出openid
    //     return $openid;
    // }

}