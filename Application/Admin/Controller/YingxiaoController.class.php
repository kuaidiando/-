<?php
/**
 * 后台活动控制器 YingxiaoController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月4日
*/
namespace Admin\Controller;
// use Think\Controller;
// use Common\Controller\BasicController;
use Common\Controller\BasicController;  
use Think\Controller;
use Think\Page;
class YingxiaoController extends BasicController {
   
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
    
    public function weizhong(){
      $this->display();
    }

    public function fenxiang(){
      $fx = uri('config',array('field'=>'fenxiang'),'value');
      $this->assign('fx',$fx);
      $this->display();
    }

    //修改分享立减比例
    public function fx_submit(){
      $value = I('post.value');
      $config = M('config');
      $res = $config->where(array('field'=>"fenxiang"))->save(array('value'=>$value));
      if($res){
        $this->ajaxReturn(array('data'=>true,'code'=>200,'msg'=>'修改成功'));
      }else{
        $this->ajaxReturn(array('data'=>false,'code'=>201,'msg'=>'修改失败'));
      }
    }



}