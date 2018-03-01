<?php
/**
 * 商家后台移动版
 * 登录控制器 IndexController.class.php
 * Author: 杨旭亚
 * Date: 2018年2月10日
*/
namespace Merch\Controller;
use Think\Controller;
class LoginController extends Controller {
	//商家登录首页
    public function index(){
    	//判断是否登录
        $shopid = session("merchshopid"); 
        // session(null);
         // $_SESSION['shopid'] = 45;
        if ($shopid) {
            $this->redirect("Merch/Index/index");
        }
        $staffid = session("staffid"); 
        if ($staffid) {
            $this->redirect("Merch/Staff/yuangongindex");
        }
        $this->display();
    }
    //清空session 执行退出
    public function delsession(){
        $merchshopid = session("merchshopid");
        $wherezx['id'] = $merchshopid;
        $datazx['line_type'] = 2;
        M('shop')->where($wherezx)->save($datazx);
        unset($_SESSION['merchshopid']);
        $shopid = session("merchshopid");
        if ($shopid) {
            $data = array(
                'data' => false,
                'code' => 201,
                'msg' => "退出失败"
            );
        }
        $data = array(
            'data' =>true,
            'code' => 200,
            'msg' => "退出成功"
        );
        $this->ajaxReturn($data);
    }
    //注册页面
    public function register(){
    	$usersheng = M('province');//城市-省
        $ressheng = $usersheng->select();
        $this->assign("ressheng",$ressheng);//城市-省
    	$this->display();
    }
    //执行注册
    public function doregister(){
    	$user = M("shop");
    	$name = I("post.name");//名称
        $tel = I("post.tel");//电话
        $pass = I("post.pass");//密码
        $yanzheng = I("post.yanzheng");//验证码
        $selsheng = I("post.selsheng");//城市级联 --省
        $depcsjlshi = I("post.depcsjlshi");//城市级联 --市
        $depcsjlxian =I("post.depcsjlxian");//城市级联 --区
        //获取验证码
        $resyzm = uri("mobile_code",array('tel'=>$tel,"status"=>0),"code");
        // $this->ajaxReturn($resyzm);
        $data = array(
                    'data' => true,
                    'code' => 200,
                    'msg'  => '',
            );
        if ($resyzm == $yanzheng) {
            $user_info = $this->checkreg($tel);
            if(!$user_info){
                $info = array(
                        'mingch'  => $name,
                        'tel'       => $tel,
                        'password'  => md5($pass),
                        'depcsjlsheng'  => $selsheng,
                        'depcsjlshi'  => $depcsjlshi,
                        'depcsjlxian'  => $depcsjlxian,
                        // 'add_time'  => date('Y-m-d H:i:s')
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
                //修改验证码 状态
                $whereyzm['tel'] = $tel;
                $datayzm['status'] = 1;
                M('mobile_code')->where($whereyzm)->save($datayzm);
            }else{
                    $this->ajaxReturn(array(
                        'data' => false,
                        'code' => 311,
                        'msg' => '该会员已存在，无需重复注册'
                    ));
            }
        }else{
            $data = array(
                    'data' => true,
                    'code' => 201,
                    'msg'  => '验证码不正确',
            );
        }
        

        $this->ajaxReturn($data);
    }
    //执行登录
    public function dologin(){
        $tel = I("post.tel");//手机号
        $pass = I("post.pass");//密码
        $filter = array(
                'tel' => $tel
        );

        $user_info = uri('shop', $filter);
        if (!$user_info) {
            $data = array(
                    'data' => false,
                    'code' => 305,
                    'msg'  => '该用户未注册',
            );

            $this->ajaxReturn($data);
        } else {
            if ($user_info['password'] != md5($pass)) {
                $this->ajaxReturn(array(
                    'data' => false,
                    'code' => 306,
                    'msg' => '密码错误'
                ));
            }
        }
        // $_SESSION[$user_info['tel']] = true;
        $_SESSION['merchshopid'] = $user_info['id'];

       
         //改变在线状态
        $wherezx['tel'] = $tel;
        $datazx['line_type'] = 1;
        M('shop')->where($wherezx)->save($datazx);
        $data = array(
                'data' => true,
                'code' => 200,
                'msg'  => '',
        );

        $this->ajaxReturn($data);
    }
    //执行登录 员工
    public function dologinyuangong(){
        $tel = I("post.tel2");//手机号
        $pass = I("post.pass2");//密码
        $filter = array(
                'code' => $tel
        );
        // $this->ajaxReturn(123);
        $user_info = uri('staff', $filter);
        if (!$user_info) {
            $data = array(
                    'data' => false,
                    'code' => 305,
                    'msg'  => '该员工不存在',
            );

            $this->ajaxReturn($data);
        } else {
            if ($user_info['password'] != md5($pass)) {
                $this->ajaxReturn(array(
                    'data' => false,
                    'code' => 306,
                    'msg' => '密码错误'
                ));
            }
        }
        // $_SESSION[$user_info['tel']] = true;
        // 改变员工状态
        $_SESSION['staffid'] = $user_info['id'];
        $where['code'] = $tel;
        $data['typezhuangtai'] = 2;
        M('staff')->where($where)->save($data);
       
        $data = array(
                'data' => true,
                'code' => 200,
                'msg'  => '',
        );

        $this->ajaxReturn($data);
    }
    //忘记密码
    public function resetting(){
    	$this->display();
    }
    //执行重置密码
    public function doretting(){
    	$user = M("shop");
        $tel = I("post.tel");//电话
        $pass = I("post.pass");//密码
        
        $info = array(
                    'password'  => md5($pass),
            );
        	$where["tel"] = $tel;
            $result = $user->where($where)->save($info);
             if(!$result){
                $data = array(
                            'data' => false,
                            'code' => 304,
                            'msg'  => '用户修改失败',
                            );

                $this->ajaxReturn($data);
            }
    	
        $data = array(
                'data' => true,
                'code' => 200,
                'msg'  => '',
        );

        $this->ajaxReturn($data);
    }
    //验证码
    public function yanZheng(){
    	$mobile = I("post.tel");
    	$type   = I('type', 'register');
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
    	 //发送短信 send mail
            $content = "尊敬的客户：您的验证码是{$send_info['code']}，请正确输入验证码完成注册，请勿泄露验证码。";
            if ('repass' == $type) {
                $content = "尊敬的客户：您的验证码是{$send_info['code']}，请正确输入验证码完成密码重置，请勿泄露验证码。";
            }elseif ('order' == $type or 'bindMobile' == $type){
                $content = "您已成功获取验证码{$send_info['code']}";
            }
            $statusCode  = send_sms($mobile, $content);
            $this->ajaxReturn($statusCode);
        }
    }
    //验证用户是否注册
    private function checkreg($tel){
        $where = array(
            'tel' => $tel,
            );
        $user = M('shop')->where($where)->find();
        if($user){
            return true;
        }else{
            return false;
        }
        // dump($user);exit;
        // return $user;
    }
}