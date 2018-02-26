<?php
/**
 * 商家后台移动版
 * 订单控制器 OrderController.class.php
 * Author: 程文学
 * Date: 2018年2月24日
*/
namespace Merch\Controller;
use Think\Controller;
class OrderController extends Controller {
	//商家登录首页
    public function index(){
    	// dump($_SESSION);exit;
        $this->display('dingdanxiangqing');
    }
   


   public function sendOrderNotice(){
   		$order = M('order');
      $store_id = I('store_id');
   		$where = array(
   			'order_status' => 10,
        'store_id' => $store_id,
   			);
   		$NewOderCount = $order->where($where)->count();
		if ($NewOderCount) {
            echo json_encode($NewOderCount);
        } else {
            echo 0;
        }   		

   }
}