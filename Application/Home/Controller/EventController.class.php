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
        header('Access-Control-Allow-Origin:*'); 
        //如果登录就调至前台的模块
       // $this->checkreg($tel);
    }
    public function index(){
        $res = M('event')->where(array('status'=>1))->select();
        if(!$res){
            $this->ajaxReturn(array('data'=>false,'code'=>201,'msg'=>'没有在使用的轮播图'));
        }else{
            $data = array(
                'data'=>$res,
                'code'=>200,
                'msg' => '',
                );
            $this->ajaxReturn($data);
        }
    }
 
   

  
   


   
     
}