<?php
/**
 * 前台登录控制器 LoginController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月3日
*/
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    //前台登录页面
    public function index()
    {
        $is_cart = I('is_cart');
        $shopid = I('shopid');
        // dump($is_cart);dump($shopid);exit;
        if($is_cart){
            $this->assign('shopid',$shopid);
            $this->assign('is_cart',$is_cart);
        }
    	$this->display('login');
    }

    //前提登录接口
     public function save_login()
    {
        $mobile   = I('tel', '');
        $password = I('password', '');
        $is_cart = I('is_cart',0);
        $shop    = I('shop',0);
        
        if (isset($this->get_data['mobile']) && $this->get_data['mobile']) {
            $mobile = $this->get_data['mobile'];
        }
        if (isset($this->get_data['password']) && $this->get_data['password']) {
            $password = $this->get_data['password'];
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

        $filter = array(
                'tel' => $mobile
        );

        $user_info = uri('user', $filter);
        if (!$user_info) {
            $data = array(
                    'data' => false,
                    'code' => 305,
                    'msg'  => '该用户未注册',
            );

            $this->ajaxReturn($data);
        } else {
            if ($user_info['password'] != md5($password)) {
                $this->ajaxReturn(array(
                    'data' => false,
                    'code' => 306,
                    'msg' => '密码错误'
                ));
            }
        }
        $_SESSION[$user_info['tel']] = true;
        $_SESSION['userid'] = $user_info['id'];

        if($is_cart){
            $_SESSION['is_cart'] = $is_cart;
            $_SESSION['store_id'] = $shop;

            $this->ajaxReturn(array('data'=>true,'code'=>300,'shop'=>$shop,'msg'=>"",));
        }

        $data = array(
                'data' => true,
                'code' => 200,
                'msg'  => '',
        );

        $this->ajaxReturn($data);
    }
    //ajax检验用户登录是否正确
    public function check()
    {
        if(!IS_AJAX){
            $data = array(
                    'info' => '非法访问方式'
            );
        }
        $user_name     = I('user_name', '', 'trim');
        $user_password = I('user_password', '', 'trim');

        $user_password = md5($user_password);



        $filter = array(
        	'user_name'     => $user_name,
        	'user_password' => $user_password
        );

        $admin_info = M('user')->where($filter)->find();
        
        if($admin_info){
            // 更新登录ip
            // $info['update_ip'] = get_client_ip();
            //更新登录时间
            // $info['update_time'] = date('Y-m-d H:i:s', time());
            session('user_id',$admin_info['id']);
            session('user_name',$user_name);
            
            if($admin_info['type'] == 0){
                $callback = U('home/index/index');
            }else{
                $callback = U('home/index/index');
            }

            $data = array(
            	'info' => 'ok',
            	'callback' => $callback
            );
        }else{
            $data = array(
                    'info' => '登录失败，请检查登录名和密码是否正确'
            );

        }

        $this->ajaxReturn($data);
    }

    public function resetting(){
        // echo time();exit;

        $this->display('resetting');
    }
     //忘记密码
    public function forget_password()
    {
        $mobile   = I('tel', '');
        $code     = I('yzm', '');
        $password = I('password','');
        $type     = I('type','repass');

        if (isset($this->get_data['tel']) && $this->get_data['tel']) {
            $mobile = $this->get_data['tel'];
        }
        if (isset($this->get_data['code']) && $this->get_data['code']) {
            $code = $this->get_data['code'];
        }
        if (isset($this->get_data['password']) && $this->get_data['password']) {
            $code = $this->get_data['password'];
        }

        $mobile_status = \user_helper::check_mobile($mobile);
        if (!$mobile_status) {
    
            $this->ajaxReturn(array('data'=>false,'code'=>522,'msg'=>'手机格式不对'));
        }

        if (!$code) {
            $data = array(
                    'data' => false,
                    'code' => 300,
                    'msg'  => '请输入手机验证码',
            );
            $this->ajaxReturn($data);
        }
          if (!$password) {
            $data = array(
                    'data' => false,
                    'code' => 301,
                    'msg'  => '请输入密码',
            );
            $this->ajaxReturn($data);
        }

        $filter = array(
                'tel'   => $mobile,
                'res_name' => 'repass',
                'status'   => 0,
                'times'    => array('egt', time()),
        );

        $return_code = M('mobile_code')->where($filter)->order('`id` DESC')->find();
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
        $save = array(
            'password' => md5($password),
            );
        M('mobile_code')->where(array('id'=>$return_code['id']))->save(array('status'=>1));
        $userr = M('user');
        $ress = $userr->where(array('tel'=>$mobile,'is_reg'=>1))->save($save);
        // $this->ajaxReturn($userr->getLastSql());exit;
        if(!$ress){
            $this->ajaxReturn(array('data'=>false,'code'=>307,'msg'=>'修改密码失败'));
        }

       

        $data = array(
                'data' => true,
                'code' => 200,
                'msg'  => '成功',
        );

        $this->ajaxReturn($data);
    }
}