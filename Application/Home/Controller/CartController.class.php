<?php
/**
 * 购物车控制器 CartController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月13日
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
        $code = M('mobile_code');
        $res = $code->where('mobile_code.id= sms_status.sms_id')
                   ->field('mobile_code.tel,mobile.add_time,sms_status.id,sms_status.status,sms_status.type,sms_status.content,sms_status.uodate_time')
                   ->join("left join sms_status on mobile_code.id = sms_status.sms_id")
                   ->select();
        $this->assign('codes',$res);
        $this->display();
    }
 
   

  
   


   
     
}