<?php
/**
 * 短信控制器 OrderController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月15日
*/
namespace Admin\Controller;
use Common\Controller\BasicController;  
use Think\Controller;
use Think\Page;
class OrderController extends BasicController {
   
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
     
        $this->display();
    }

    

    

}