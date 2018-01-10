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
class RegController extends Controller {
    private $get_data;

    public function _initialize()
    {
        $this->get_data = get_json_data();
        //如果登录就调至前台的模块
       // $this->checkreg($tel);
    }

    public function __call($action = '', $params = array())
    {
        $mobile = '13331385580';
        $mobile_status = \user_helper::check_mobile($mobile);
        dump($mobile_status);exit;
        // $this->display('index');
    }


    //注册用户
    public function save(){


        $mobile     = I('tel', '', 'trim');
        $password   = I('password', '', 'trim');
        $status     = I('status','','trim');
        // $ad_code    = I('code','','trim');

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

        //验证验证码
        // $verify = new \Think\Verify();  
        // if(!$verify->check($ad_code)){
        //    $this->error("验证码错误!","index",3);
        // }

        // $user_info = uri('user', array('tel'=>$mobile));
        // if ($user_info) {
        //     $this->error('该用户已存在');
        // }

      
        $user_info = $this->checkreg($mobile);
        if(!$user_info){
            $info = array(
                    'password' => md5($password),
                    'tel'     => $mobile,
                    'add_time'      => date('Y-m-d H:i:s'),
                    // 'update_time'   => date('Y-m-d H:i:s'),
                    // 'update_ip'     => get_client_ip(),
                    'status'          => $status,
            );

            $result = $user->add($data);
            if(!$result){
                $data = array(
                            'data' => false,
                            'code' => 304,
                            'msg'  => '注册用户失败',
                            );

                $this->ajaxReturn($data);
            }
        }else{
                $this->ajaxReturn(array(
                    'data' => false,
                    'code' => 311,
                    'msg' => '该会员已存在，无需重复注册'
                ));
        }
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
        if($uesr){
            return true;
        }else{
            return false;
        }
        // dump($user);exit;
        // return $user;
    }

     //生成验证码方法
    public function showCode(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 16;
        $Verify->length   = 3;
        $Verify->imageW   = "90px";
        $Verify->imageH = "40px";
        $Verify->useNoise = false;
        $Verify->useCurve = false;
        $Verify->entry();
    }
}