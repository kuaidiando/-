<?php
/**
 * 后台注册控制器 RegController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月3日
*/
namespace Home\Controller;
use Think\Controller;
class RegController extends Controller {
    public function _initialize()
    {
        //如果登录就调至前台的模块
       $this->checkreg($tel);
    }

    public function __call($action = '', $params = array())
    {
        $this->display('reg');
    }


    //注册用户
    public function save(){

        $user = M("user");

        $mobile     = I('tel', '', 'trim');
        $password   = I('password', '', 'trim');
        $repassword = I('repassword', '', 'trim');
        $status     = I('status','','trim');
        $ad_code    = I('code','','trim');

        if (!$password) {
            $this->error('请填写密码');
        }

        if (!$repassword) {
            $this->error('请填写重复密码');
        }

        if ($password != $repassword) {
            $this->error('重复密码与密码不一致');
        }

        if (!$mobile) {
            $this->error('请填写帐号');
        }

        $mobile_length = strlen($mobile);
        if ($mobile_length < 5 || $mobile_length > 30) {
            $this->error('账号长度要多于5个且少于30个字符');
        }
       

        //验证验证码
        $verify = new \Think\Verify();  
        if(!$verify->check($ad_code)){
           $this->error("验证码错误!","index",3);
        }

        $user_info = uri('user', array('tel'=>$mobile));
        if ($user_info) {
            $this->error('该用户已存在');
        }

        $data = array(
            'password' => md5($password),
            'tel'     => $mobile,
            'add_time'      => date('Y-m-d H:i:s'),
            // 'update_time'   => date('Y-m-d H:i:s'),
            // 'update_ip'     => get_client_ip(),
            'status'          => $status,
        );
        // dump($data);exit;

        $result = $user->add($data);

        if($result){
            $this->success('用户添加成功', U('home/login/index'));
            /*$group_result = M('auth_group_access')->add(array('user_id'=>$result, 'group_id'=>5));
            if ($group_result) {
                $this->success('用户添加成功', U('manage/index/index'));
            } else {
                $this->error('用户添加失败');
            }*/
        }else{
            $this->error('用户添加失败');
        }
    }
    //验证用户是否注册
    private function checkreg($tel){
        $where = array(
            'tel' => $tel,
            );
        $user = M('user')->where($where)->find();
        // dump($user);exit;
        if($user){
            redirect(U('home/index/index'));
        }
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