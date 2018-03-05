<?php
/**
 * 前台轮播图显示控制器 EventController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月10日
*/
namespace Home\Controller;
use Think\Controller;
class EventController extends Controller {
    public function _initialize()
    {
        //如果登录就调至前台的模块
       // $this->checkreg($tel);
    }
    public function index(){
        $user_id = \user_helper::get_user_id();
        $user_photo = uri("user",array('id'=>$user_id,"del_status"=>0),"photo");
        $this->assign('user_photo',$user_photo);
        // dump($user_photo);exit;
        $event = M('event')->where(array('status'=>1))->getField('pic',true);
        $this->assign('event',$event);
        // dump($res);exit;
        
    }
    public function detail(){
        $type_info = M('food_type')->where(array('dep_type'=>1))->select();
        // dump($type_info);exit;
        $food_info = M('food')->where(array('dep_shop'=>1))->select();
        // dump($food_info);exit;
        $this->assign('type_info',$type_info);
        $this->assign('food_info',$food_info);
        $this->display("detail");
    }
 
   public function aa(){
    
        $this->display();
   }

  
   


   
     
}