<?php
/**
 * 前台个人中心控制器 PersonController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月20日
*/
namespace Home\Controller;
use Think\Controller;
class PersonController extends Controller {
    public function _initialize()
    {
        //如果登录就调至前台的模块
       // $this->checkreg($tel);
    }

    public function __call($action = '', $params = array())
    {

        $this->display('person');

    }
    public function index(){
        $per = M('user');
        $uid = \user_helper::get_user_id();
        // dump($uid);exit;
        $user_info = $per->where(array('id'=>$uid))->find();
        // dump($user_info);exit;
        $this->assign('user_info',$user_info);
        $this->display("person");
    }

     //判断用户是否登录
    public function get_user_status()
    {
        $user_id = \user_helper::get_user_id();

        if ($user_id) {
            $data['data'] = true;
        } else {
            $data['data'] = false;
        }

        $data['code'] = 200;
        $data['msg']  = '';

        $this->ajaxReturn($data);

    }
   
      //检查是否存在用户
    public function check_user()
    {
        $mobile = I('tel', '');

        if (isset($this->get_data['tel']) && $this->get_data['tel']) {
            $mobile = $this->get_data['mobile'];
        }

        $mobile_status = \user_helper::check_mobile($mobile);

        if (!$mobile_status) {
            return false;
        }
        $user_info = uri('user',array('tel' => $mobile));
        if ($user_info) {
            $data = array(
                    'data' => false,
                    'code' => 203,
                    'msg'  => '已存在该用户',
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
   
    
    //个人中心接口

    public function my_center(){
        // $a = check_mobile('13331385580');
        // dump($a);exit;
        $user_id = \user_helper::get_user_id();
        // dump($_SESSION);exit;
        if(!$user_id){
            $this->ajaxReturn(array(
                    'data' => false,
                    'code' => 307,
                    'msg' => '尚未登录',
                ));
        }else{
            $info = M('user')->where(array('id'=>$user_id))->find();
            $data = array(
                'data' => true,
                'code' => 200,
                'msg'  => json_encode($info),
            );
            $this->ajaxReturn($data);
        }

    }



}