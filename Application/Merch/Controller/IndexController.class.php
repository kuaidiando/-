<?php
/**
 * 商家后台移动版控制器 IndexController.class.php
 * Author: 杨旭亚
 * Date: 2018年1月5日
*/
namespace Merch\Controller;
use Think\Controller;
class IndexController extends Controller {
	//商家首页
    public function index(){
    	/**
    	 * 商家基本信息
    	 * @var [type]
    	 */
    	$shopid = session("shopid");
    	$user = M('shop');
    	$where['id'] = $shopid;
    	$res = $user->where($where)->select();
    	// 获取总金额
    	$order = $this->order_total_info($shopid);
        // 数字 0 改为 0.00
        // if ($order['data']['num'] == 0) {
        //     $order['data']['num'] = "0.00";
        // }
        if ($order['data']['order_total_price'] == 0) {
            $order['data']['order_total_price'] = "0.00";
        }
    	// dump($order);die;
    	$this->assign("res",$res);//单条门店信息
    	$this->assign("order",$order);//订单信息
        $this->display();
    }
      //商家订单总额
    private function order_total_info($shopid){
        $store_id = $shopid;
        $order = M('order');
        $where['order_status'] = array('in','10,15'); 
        $where['store_id'] = $store_id;
        $order_ids = $order->where($where)->getField('id',true);
        $order_total_price = 0;
        $num =0;
        foreach($order_ids as $k=>$v){
            $order_total_price +=uri('money',array('order_id'=>$v),'sf');
            $num+=1;
        }
        $data = array(
            'data' => array('order_total_price'=>$order_total_price,'num'=>$num),
            'code'=> 200,
            'msg' => '',
            );
        return($data);
    }
}