<?php
/**
 * 短信控制器 CodeController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月15日
*/
namespace Admin\Controller;
// use Think\Controller;
// use Common\Controller\BasicController;
use Common\Controller\BasicController;  
use Think\Controller;
use Think\Page;
class CodeController extends BasicController {
   
    // public function _initialize()
    // {
    //     //如果登录就调至后台的模块
    //     //$user_id = D('user')->get_user_id();
    //     // $user_id = \user_helper::get_admin_id();
    //     // $this->checkreg();
    // }

    public function __call($action = '', $params = array())
    {
        $this->display('index');
    }


  //轮播图列表

    public function index(){
     
        $code = M('mobile_code');
        $res = $code->where('mobile_code.is_del = 1')
                   ->field('mobile_code.tel,mobile_code.code,mobile_code.status as yz_status,mobile_code.add_time,sms_status.sms_id,sms_status.id,sms_status.status,sms_status.type,sms_status.update_time')
                   ->join("right join sms_status on mobile_code.id = sms_status.sms_id")
                   ->order('id desc')
                   ->select();
        $code_num = count($res);
        $this->assign('num',$code_num);  
        $this->assign('codes',$res);
        $this->display();
    }

    //验证码删除
     public function del(){
      $delete = M('mobile_code');
      $res = $delete->where('id='.I('get.id'))->find();
        if(!$res){
            $this->ajaxReturn(array('status' => 1, 'msg' => '无此信息!'));
          
        }else{
            $save = M('mobile_code')->where(array('id'=>$res['id']))->save(array('is_del'=>0));
            if(!$save){
                $this->ajaxReturn(array('status' => 1, 'msg' => '删除失败!'));

            }else{
                $this->ajaxReturn(array('status' => 0, 'msg' => '删除成功'));

            }
        }
   
    }

    

}