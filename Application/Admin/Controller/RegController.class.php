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
   
    public function _initialize()
    {
        //如果登录就调至后台的模块
        //$user_id = D('user')->get_user_id();
        // $user_id = \user_helper::get_admin_id();
        $this->checkreg();
    }

    public function __call($action = '', $params = array())
    {
        $this->display('reg');
    }


    //保存分类
    public function save(){

        $user = M("admin");

        $nick_name  = I('nick_name', '', 'trim');
        $mobile     = I('mobile', '', 'trim');
        $password   = I('password', '', 'trim');
        $repassword = I('repassword', '', 'trim');

        if (!$nick_name) {
            $this->error('请输入昵称');
        }

        $nick_name_length = strlen($nick_name);
        if ($nick_name_length < 2 || $nick_name_length > 20) {
            $this->error('昵称长度为2-20个字符');
        }

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
        /*if (!check_mobile($mobile)) {
            $this->error('手机号有误');
        }*/

        $user_info = uri('admin', array('user_name'=>$mobile));
        if ($user_info) {
            $this->error('该用户已存在');
        }

        $data = array(
            //'mobile'        => $mobile,
            'user_password' => md5($password),
            'nick_name'     => $nick_name,
            'user_name'     => $mobile,
            'add_time'      => date('Y-m-d H:i:s'),
            'update_time'   => date('Y-m-d H:i:s'),
            'update_ip'     => get_client_ip(),
            'type'          => 2
        );

        $result = $user->add($data);

        if($result){
            $this->success('用户添加成功', U('manage/index/index'));
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
            'tel' = $tel,
            );
        $user = M('user')->where($where)->find();
        if($user)(
            redirect(U('manage/index/index'));
        )
    }

}