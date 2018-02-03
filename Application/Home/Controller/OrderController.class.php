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
        $order_id = 0;
        $order_id = M('order')->add($order_filter);
        if($order_id){
        	$order_goods_info = M('cart')->where(array('store_id'=>$_POST['store_id'],'user_id'=>$this->user_id,'status'=>1))->select();
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
                M('linshijj')->where(array('userid'=>$this->user_id,'shopid'=>$_POST['store_id']))->delete();
                M('cart')->where(array('store_id'=>$_POST['store_id'],'user_id'=>$this->user_id,'status'=>1))->save(array('status'=>0));
            }
        	
        }
        setcookie("food_num",serialize($food_num),time()-10,"/");
        $this->redirect('order/order_info');
     
    }
    //订单列表
    public function order_info(){
        //全部订单
        $order_res = M('order')->where(array('user_id'=>$this->user_id))->select();
        foreach($order_res as $key=>$value){
            $order_res[$key]['shopname'] = uri('shop',array('id'=>$value['store_id']),'mingch');
            $order_res[$key]['logo'] = uri('shop',array('id'=>$value['store_id']),'logo');

        }

        $this->assign('order_res',$order_res);

        //待支付订单
        $order_n = M('order')->where(array('user_id'=>$this->user_id,'order_status'=>1))->select();
        foreach($order_n as $key_n=>$value_n){
            $order_n[$key_n]['shopname'] = uri('shop',array('id'=>$value['store_id']),'mingch');
            $order_n[$key_n]['logo'] = uri('shop',array('id'=>$value['store_id']),'logo');

        }
        $this->assign('order_n',$order_n);

        //待使用
        $order_s = M('order')->where(array('user_id'=>$this->user_id,'is_use'=>0))->select();
        foreach($order_s as $key_s=>$value_s){
            $order_s[$key_s]['shopname'] = uri('shop',array('id'=>$value['store_id']),'mingch');
            $order_s[$key_s]['logo'] = uri('shop',array('id'=>$value['store_id']),'logo');

        }
        $this->assign('order_s',$order_s);

        //已使用
        $order_u = M('order')->where(array('user_id'=>$this->user_id,'is_use'=>1))->select();
        foreach($order_u as $key_u=>$value_u){
            $order_u[$key_u]['shopname'] = uri('shop',array('id'=>$value['store_id']),'mingch');
            $order_u[$key_u]['logo'] = uri('shop',array('id'=>$value['store_id']),'logo');

        }
        $this->assign('order_u',$order_u);

        //待评价
        $order_p = M('order')->where(array('user_id'=>$this->user_id,'order_status'=>10))->select();
        foreach($order_p as $key_p=>$value_p){
            $order_p[$key_p]['shopname'] = uri('shop',array('id'=>$value['store_id']),'mingch');
            $order_p[$key_p]['logo'] = uri('shop',array('id'=>$value['store_id']),'logo');

        }
        $this->assign('order_p',$order_p);
        //取消单
        $order_x = M('order')->where(array('user_id'=>$this->user_id,'order_status'=>20))->select();
        foreach($order_x as $key_x=>$value_x){
            $order_x[$key_x]['shopname'] = uri('shop',array('id'=>$value['store_id']),'mingch');
            $order_x[$key_x]['logo'] = uri('shop',array('id'=>$value['store_id']),'logo');

        }

        $this->assign('order_x',$order_x);
        $this->display('order/mydingdan');

    }
 //订单详情
    public function order_xq(){

        $order_id = I('order_id');
        $info = M('order')->where(array('id'=>$order_id))->find();
        $goods_info = M('order_fu')->where(array('order_id'=>$order_id))->select();
        // dump($goods_info);exit;
        foreach($goods_info as $goods_k=>$goods_v){
            $goods_info[$goods_k]['goodsname'] = uri('food',array('id'=>$goods_v['goods_id']),'mingch');
        }

        // dump($order_id);exit;
        $this->assign('goods_info',$goods_info);
        $this->assign('info',$info);
        $this->display('dingdanxiangqing');
    }
  
     
}