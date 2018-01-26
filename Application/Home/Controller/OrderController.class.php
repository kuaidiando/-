<?php
/**
 * 订单控制器 OrderController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月25日
*/
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller {
    private $user_id;
    public function _initialize()
    {
       $this->user_id = \user_helper::get_user_id();
    }

    public function index(){
  
    }
    //提交订单
    public function save_order(){

        $order_filter = $_POST;
        $order_filter['user_id'] = $this->user_id;
        $order_filter['order_code'] = date('ymdHis').sms_code(4);
        $order_filter['add_time'] = date('Y-m-d H:i:s',time());
        // dump($order_filter);exit;
        $order_id = 0;
        $order_id = M('order')->add($order_filter);
        if($order_id){
        	$order_goods_info = M('cart')->where(array('store_id'=>$_POST['store_id'],'user_id'=>$this->user_id,'status'=>1))->select();
        	// dump($order_goods_info);exit;
        	foreach($order_goods_info as $goods_k=>$goods_v){
        		$order_fu = array();
        		$order_fu['order_id'] = $order_id;
        		$order_fu['goods_id'] = $goods_v['goods_id'];
        		$order_fu['goods_num'] = $goods_v['goods_num'];
        		$order_fu['store_id'] = $goods_v['store_id'];
        		$order_fu['goods_price'] = uri('food',array('id'=>$goods_v['goods_id']),'jiage_youhui');
        		$order_fu_id = M('order_fu')->add($order_fu);
        		if(!$order_fu_id){
        			M('order')->where(array('id'=>$order_id))->delete();
        			$this->error('cart/save_cart?shopid='.$_POST['store_id'],'订单添加失败');
        		}

        	}
            if(count($order_goods_info) == M('order_fu')->where(array('order_id'=>$order_id))->count()){
                M('linshijj')->where(array('userid'=>$this->user_id,'shopid'=>))->delete();
                M('cart')->where(array('store_id'=>$_POST['store_id'],'user_id'=>$this->user_id,'status'=>1))->save(array('status'=>0));
            }
        	
        }
        // dump($order_filter);exit;
        $order_res = M('order')->where(array('user_id'=>$this->user_id))->select();
        foreach($order_res as $key=>$value){
            $order_res[$key]['shopname'] = uri('shop',array('id'=>$value['store_id']),'mingch');
        }
        $this->assign('order_res',$order_res);
        $this->display('order/mydingdan');
    }
 
  
     
}