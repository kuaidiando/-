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


  //订单列表

    public function index(){
     
        $order_info = M('order')->order('id desc')->select();
        foreach($order_info as $order_k=>$order_v){
            $order_info[$order_k]['shop_name'] = uri('shop',array('id'=>$order_v['store_id']),'mingch');
            $order_info[$order_k]['sf'] = uri('money',array('order_id'=>$order_v['id']),'sf');
        }
        $num = count($order_info);
        $this->assign('num',$num);
        $this->assign('order_info',$order_info);
     
        $this->display('index');
    }

    //获取订单菜品详情
    public function goods_info(){
        $order_id = I('id');
        $goods_info = M('order_fu')->where(array('order_id'=>$order_id))->order('id desc')->select();
        foreach($goods_info as $k=>$v){
            $goods_info[$k]['goods_name'] = uri('food',array('id'=>$v['goods_id']),'mingch');

        }

        $this->assign('goods_info',$goods_info);
        $this->display('goods_info');
    }

    //查看订单详情
    public function order_xq(){
        $order_id = I('id');
        $one_info = array();
        $user_info = array();
        $goods_xq = array();
        $one_info = M('order')->where(array('id'=>$order_id))->find();
        $one_info['shop_name'] = uri('shop',array('id'=>$one_info['store_id']),'mingch');
        $one_info['lj'] = $one_info['total_price'] * 0.03;
        $one_info['sf'] = $one_info['total_price'] - $one_info['lj'];
        $one_info['table_seat'] = uri('order_jc',array('order_id'=>$order_id),'seat');

        $user_info = M('user')->where(array('id'=>$one_info['user_id']))->find();
        $goods_xq = M('order_fu')->where(array('order_id'=>$order_id))->select();
        foreach($goods_xq as $k1=>$v1){
            $goods_xq[$k1]['goods_name'] = uri('food',array('id'=>$v1['goods_id']),'mingch');

        }
        $one_info['table_no'] = substr($one_info['table_no'],8);
        $money_info = uri('money',array('order_id'=>$order_id));
        $this->assign('money_info',$money_info);
        $this->assign('goods_xq',$goods_xq);
        $this->assign('user_info',$user_info);
        $this->assign('one_info',$one_info);
        $this->display('order_xq');




    }

    //商家订单总额
    public function order_total_info(){
        $store_id = I('store_id');
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
        $this->ajaxReturn($data);
    }
    
    //订单删除功能
    public function del(){
        $delete = M('order');
        $res = $delete->where('id='.I('post.id'))->find();

        if ($res['order_status'] == 1) {
          $delete->where('id='.I('post.id'))->delete();
          $this->ajaxReturn(array('status' => 0, 'msg' => '删除成功!'));
          
        } else {
          $this->ajaxReturn(array('status' => 1, 'msg' => '订单已经支付不允许删除!'));
        }   
    }
}