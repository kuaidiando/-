<?php
/**
 * 前台注册控制器 RegController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月3日
*/
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    private $get_data;

   

    public function __call($action = '', $params = array())
    {
        // dump($_SESSION);exit;
        $this->display('register');
    }


    //注册用户
    public function save(){

        $mobile     = I('tel', '', 'trim');
        $password   = I('password', '', 'trim');
        $status     = I('status','','trim');
        $code    = I('yzm','','trim');
        $openid = $_SESSION['openid'];

        $user = M("user");
        if (isset($this->get_data['tel']) && $this->get_data['tel']) {
            $mobile = $this->get_data['tel'];
        }
        if (isset($this->get_data['password']) && $this->get_data['password']) {
            $password = $this->get_data['password'];
        }
        if (isset($this->get_data['code']) && $this->get_data['code']) {
            $code = $this->get_data['code'];
        }

        if (!$password) {
            $data = array(
                    'data' => false,
                    'code' => 208,
                    'msg'  => '请填写登录密码',
            );

            $this->ajaxReturn($data);
        }
        $password_len = strlen($password);
        if (6 > $password_len || 32 < $password_len) {
            $data = array(
                    'data' => false,
                    'code' => 209,
                    'msg'  => '密码长度需大于6位且小于32位字符',
            );

            $this->ajaxReturn($data);
        }

        if (!$code) {
            $data = array(
                    'data' => false,
                    'code' => 300,
                    'msg'  => '请输入手机验证码',
            );
            $this->ajaxReturn($data);
        }

        

        $user_info = $this->checkreg($mobile);
        if(!$user_info){
            $info = array(
                    'password'  => md5($password),
                    'tel'       => $mobile,
                    'add_time'  => date('Y-m-d H:i:s'),
                    // 'update_time'   => date('Y-m-d H:i:s'),
                    // 'update_ip'     => get_client_ip(),
                    'status'    => $status,
                    'is_agree'  => 1,
                    'openid' => $openid,
            );

            $result = $user->add($info);

            if(!$result){
                $data = array(
                            'data' => false,
                            'code' => 304,
                            'msg'  => '注册用户失败',
                            );

                $this->ajaxReturn($data);
            }
            M('weixin_user')->where(array('openid'=>$openid))->save(array('user_id'=>$result));
        }else{
                $this->ajaxReturn(array(
                    'data' => false,
                    'code' => 311,
                    'msg' => '该会员已存在，无需重复注册'
                ));
        }
        $_SESSION['userid'] = $result;

        $data = array(
                'data' => true,
                'code' => 200,
                'msg'  => '',
        );

        $this->ajaxReturn($data);
    }
    //验证用户是否注册
    private function checkreg($tel){
        $where = array(
            'tel' => $tel,
            );
        $user = M('user')->where($where)->find();
        if($user){
            return true;
        }else{
            return false;
        }
        // dump($user);exit;
        // return $user;
    }

   //短信验证码注册
 public function register()
    {
        $mobile   = I('tel', '');
        $password = I('password', '');
        $code     = I('yzm', '');
        $status   = I('status','0');
        $type     = I('type','register');


        if (isset($this->get_data['tel']) && $this->get_data['tel']) {
            $mobile = $this->get_data['tel'];
        }
        if (isset($this->get_data['password']) && $this->get_data['password']) {
            $password = $this->get_data['password'];
        }
        if (isset($this->get_data['code']) && $this->get_data['code']) {
            $code = $this->get_data['code'];
        }

        $mobile_status = \user_helper::check_mobile($mobile);
        if (!$mobile_status) {
            return false;
        }


        if (!$password) {
            $data = array(
                    'data' => false,
                    'code' => 208,
                    'msg'  => '请填写登录密码',
            );

            $this->ajaxReturn($data);
        }

        $password_len = strlen($password);
        if (6 > $password_len || 32 < $password_len) {
            $data = array(
                    'data' => false,
                    'code' => 209,
                    'msg'  => '密码长度需大于6位且小于32位字符',
            );

            $this->ajaxReturn($data);
        }

        if (!$code) {
            $data = array(
                    'data' => false,
                    'code' => 300,
                    'msg'  => '请输入手机验证码',
            );
            $this->ajaxReturn($data);
        }

        $filter = array(
                'tel'   => $mobile,
                'res_name' => $type,
                'status'   => 0,
                'times'    => array('egt', time()),
        );

        $return_code = M('mobile_code')->where($filter)->order('`id` DESC')->find();
        // echo time();exit;
        // dump($return_code);exit;
        if (!$return_code) {
            $data = array(
                    'data' => false,
                    'code' => 302,
                    'msg'  => '您提交的手机验证码不正确或已过期,请重新发送！',
            );

            $this->ajaxReturn($data);
        }

        if ($return_code['code'] != $code) {
            $data = array(
                    'data' => false,
                    'code' => 306,
                    'msg'  => '您提交的手机验证码不正确！',
            );

            $this->ajaxReturn($data);
        }

        M('mobile_code')->where(array('id'=>$return_code['id']))->save(array('status'=>1));
        // $nick_name = preg_replace('/1(\d{3})\d{4}(\d{3})/', '1$1****$2', $mobile);
        $user_info = uri('user', array('tel'=>$mobile));
        if (!$user_info) {
            // $salt = random_hash(6);
            $info = array(
                    'tel'        => $mobile,
                    'password'   => md5($password),
                    // 'nick_name'     => $mobile,
                    //'user_id'       => $result['data']['userId'],
                    // 'user_name'     => $mobile,
                    // 'identifier'    => md5($salt . md5($mobile . $salt)),
                    // 'token'         => md5(uniqid(rand(), TRUE)),
                    // 'timeout'       => time() + 60 * 60 * 24 * 7,
                    'is_reg'     => 1,
                    'add_time'   => date('Y-m-d H:i:s'),
                    'status'     => $status,
                    'openid'     => $_SESSION['openid'],
                    // 'update_ip'     => get_client_ip(),
                    // 'update_time'   => date('Y-m-d H:i:s'),
            );

            $result = M('user')->add($info);
            if (!$result) {
                $data = array(
                        'data' => false,
                        'code' => 304,
                        'msg'  => '注册用户失败',
                );

                $this->ajaxReturn($data);
            }
            M('weixin_user')->where(array('openid'=>$_SESSION['openid']))->save(array('user_id'=>$result));
            $_SESSION['userid'] = $result;
            $user_info = uri('user', array('tel'=>$mobile));
        } else {
            $this->ajaxReturn(array(
                'data' => false,
                'code' => 311,
                'msg' => '该会员已存在，无需重复注册'
            ));
        }

        // setcookie('auth', $user_info['identifier'].":".$user_info['token'], $user_info['timeout'], '/');

        $data = array(
                'data' => true,
                'code' => 200,
                'msg'  => '',
        );

        $this->ajaxReturn($data);
    }

     //发送验证码
    public function send_code()
    {
        $mobile = I('tel', '');
        $type   = I('type', 'register');

        if (isset($this->get_data['tel']) && $this->get_data['tel']) {
            $mobile = $this->get_data['tel'];
        }

        if (isset($this->get_data['type']) && $this->get_data['type']) {
            $type = $this->get_data['type'];
        }

        $mobile_status = \user_helper::check_mobile($mobile);

        if (!$mobile_status) {
            return false;
        }

        if ('repass' == $type) {
            $user_info = uri('user',array('tel' => $mobile));
            if (!$user_info) {
                $data = array(
                    'data' => false,
                    'code' => 209,
                    'msg'  => '不存在该用户',
                );

                $this->ajaxReturn($data);
            }
        }

        $day                    = date('Y-m-d');
        $filter['tel']          = $mobile;
        $filter['add_time']     = array(array('egt', $day.' 00:00:00'), array('elt', $day.' 23:59:59'));

        $day_total = M('sms_status')->where($filter)->count();
        if ($day_total >= 10) {
            $data = array(
                'data'  => false,
                'code'  => 205,
                'msg'   => '今日验证次数超限，请明日再试',
            );

            $this->ajaxReturn($data);
        }

        $info  = array(
                'res_name' => $type,
                'tel'   => $mobile,
                'code'     => sms_code(),
                'times'    => time()+300,
                'add_time' => date('Y-m-d H:i:s'),
        );

        $send_filter = array(
                'tel'   => $mobile,
                'status'   => 0,
                'times'    => array('gt', time()+270),
        );

        $send_info = uri('mobile_code', $send_filter);
        if (!$send_info) {
            $send_id = M('mobile_code')->add($info);

            $send_info = uri('mobile_code', $send_id);
            if (!$send_info) {
                //return '请稍后再试';
                $data = array(
                    'data' => false,
                    'code' => 206,
                    'msg'  => '请稍后再试'
                );

                $this->ajaxReturn($data);
            }
            
            // $site_name = \config_helper::get_site_name();

            //发送短信 send mail
            $content = "尊敬的客户：您的验证码是{$send_info['code']}，请正确输入验证码完成注册，请勿泄露验证码。";
            if ('repass' == $type) {
                $content = "尊敬的客户：您的验证码是{$send_info['code']}，请正确输入验证码完成密码重置，请勿泄露验证码。";
            }elseif ('order' == $type or 'bindMobile' == $type){
                $content = "您已成功获取验证码{$send_info['code']}";
            }

            $statusCode  = send_sms($mobile, $content);

            $info = array(
                    'tel'      => $send_info['tel'],
                    'sms_id'      => $send_info['id'],
                    'type'        => $send_info['res_name'],
                    'content'     => $content,
                    'report_info' => addslashes($statusCode['result']),
                    'add_time'    => date('Y-m-d H:i:s')
            );
            M('sms_status')->add($info);
        }

        $data = array(
            'data' => array(
                        'tel' => $send_info['tel'],
                        'code'   => $send_info['code']
                    ),
            'code' => 200,
            'msg'  => '',
        );

        $this->ajaxReturn($data);

    }
 
}