<?php
/**
 * 商家后台移动版
 * 提现控制器 EnchashmentController.class.php
 * Author: 杨旭亚
 * Date: 2018年2月28日
*/
namespace Merch\Controller;
use Think\Controller;
class EnchashmentController extends Controller {
	//设置首页
    public function index(){
        
    	// dump($shopid);
        $this->display();
    }
    public function zhuanghuguanli(){
        $this->display();
    }

        //今日订单明细
    public function merch_info(){
    	// echo sprintf('%.2f', 3.1465);exit;
    	$date = date('Y-m-d');
    	$date_js = date('Y-m-d',time()+3600*24);
    	$where = array(
    		'order_status' => 10,
    		'use_time' => array(array('egt',date('Y-m-d 00:00:00',time())),array('lt',date('Y-m-d 00:00:00',time()+3600*24))),
    		);
    	$order = M('order');
    	$order_info = $order->where($where)->select();
    	$total_price_sf = 0.00;
    	foreach($order_info as $k=>$v){
    		$total_price_sf += uri('money',array('order_id'=>$v['id']),'sf');
    	}
    	$total_price_sf = sprintf('%.2f', $total_price_sf);
    	$where_total = array(
    		// 'order_status' =>array('in',array(5,10,11,12,20)),
    		'pay_time' => array(array('egt',date('Y-m-d 00:00:00',time())),array('lt',date('Y-m-d 00:00:00',time()+3600*24))),
    		);
    	//支付过的所有订单
    	$res = $order->where($where_total)->select();
    	$total_price = 0.00;
    	foreach($res as $k1=>$v1){
    		$total_price += $v1['total_price'];
    	}
    	$total_price = sprintf('%.2f', $total_price);
    	$order_num = count($res);
    	//退单情况
    	$where_t = array(
    			'order_status' => 20,
    			'pay_time' => array(array('egt',date('Y-m-d 00:00:00',time())),array('lt',date('Y-m-d 00:00:00',time()+3600*24))),
    		);
    	$res_t = $order->where($where_t)->select();
    	foreach($res_t as $kt=>$vt){
    		$t_price += $vt['total_price'];
    	}
    	$t_price = sprintf('%.2f', $t_price);
    	$num_t = count($res_t);
    	$lj = ($total_price - $t_price)*0.05;
    	$lj = sprintf('%.2f', $lj);
    	// echo $order->getLastSql();exit;

    	$this->assign('total_price_sf',$total_price_sf);
    	$this->assign('total_price',$total_price);
    	$this->assign('t_price',$t_price);
    	$this->assign('num_t',$num_t);
    	$this->assign('lj',$lj);

        $this->assign('date',$date);
        $this->assign('order_num',$order_num);
        $this->assign('date_js',$date_js);
        $this->display('merch_info');
    }

}