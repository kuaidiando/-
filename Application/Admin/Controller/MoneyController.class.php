<?php
/**
 * 短信控制器 MoneyController.class.php
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
class MoneyController extends BasicController {
   
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


  //订单列表

    public function index(){
     
        $money_info = M('money')->order('id desc')->select();
       // dump($money_info);exit;

        foreach($money_info as $k=>$v){
            $order_info = array();
            $order_info = uri('order',array('id'=>$v['order_id']));

            $money_info[$k]['order_code'] = $order_info['order_code'];
            $money_info[$k]['shopname'] = uri('shop',array('id'=>$order_info['store_id']),'mingch');
            $money_info[$k]['total_price'] = $order_info['total_price'];


        }
       // dump($money_info);exit;
        $num = count($money_info);
        $this->assign('num',$num);
        $this->assign('money_info',$money_info);
     
        $this->display('index');
    }

   
}