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

    //会员编辑
    public function edit(){
      $uid = I('id','');
      $res = M('user')->where(array('id'=>$uid))->find();
      $this->assign('res',$res);
      $this->display();
    }

    //会员编辑保存
    public function update(){
      $user = M('user');
      $filter = array();
      $filter['password'] = md5($_POST['password']);
      $filter['tel'] = $_POST['tel'];
      $filter['del_status'] = $_POST['del_status'];
      $filter['real_name'] = $_POST['real_name'];
      $id = $_POST['id'];

      if($_POST['password'] != $_POST['repassword']){
        $this->ajaxReturn(array('status'=>0,'msg'=>'两次输入密码不一致!'));
      }
        $result = $user->where(array('id'=>$id))->save($filter);

        if(!$result){
          $this->ajaxReturn(array('status' => 0, 'msg' => '修改失败!'));
        }else{
          $this->ajaxReturn(array('status' => 1, 'msg' => '修改成功!'));
        }
     
    }
}