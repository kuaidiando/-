<?php
/**
 * 后台用户控制器 UserController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月8日
*/
namespace Admin\Controller;
use Think\Controller;
use Common\Controller\BasicController;
class UserController extends BasicController {
   
    public function _initialize()
    {
        //如果登录就调至后台的模块
        //$user_id = D('user')->get_user_id();
        // $user_id = \user_helper::get_admin_id();
        // $this->checkreg();
    }

    public function __call($action = '', $params = array())
    {
        $this->display('index');
    }

    //会员列表
    public function index(){
      $user = M('user');
      $where = array(
        'status' => 0,
      );
      $user_num = $user->where($where)->count();
      $user_info = $user->where($where)->select();
      // dump($user_info);exit;
      $this->assign('user_info',$user_info);
      $this->assign('user_num',$user_num);
      $this->display('index');
    }

  
}