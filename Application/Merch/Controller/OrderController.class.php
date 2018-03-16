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
    
      $store_id = I('store_id');
      $total_price = 0.00;
      $jx_total_price = 0.00;
      $order = M('order');
      //新订单
      $where = array(
        'store_id' => $store_id,
        'order_status' => 10,
        );
      $count = $order->where($where)->count();
      $order_info = $order->where($where)->select();
      foreach($order_info as $order_k=>$order_v){
        $order_info[$order_k]['jch'] = substr($order_v['table_no'],8);
        $order_info[$order_k]['tel'] = uri('user',array('id'=>$order_v['user_id']),'tel');
        $order_info[$order_k]['sf'] = uri('money',array('order_id'=>$order_v['id']),"sf");
        $order_info[$order_k]['lj'] = uri('money',array('order_id'=>$order_v['id']),"lj");
        $order_info[$order_k]['repast_price'] = uri('shop',array('id'=>$order_v['store_id']),'repast_price');
        $order_info[$order_k]['goods_info'] = M('order_fu')->where(array('order_id'=>$order_v['id']))->select();
        foreach($order_info[$order_k]['goods_info'] as $k=>$v){
          $order_info[$order_k]['goods_info'][$k]['goods_name'] = uri('food',array('id'=>$order_info[$order_k]['goods_info'][$k]['goods_id']),'mingch');
        }
        $total_price +=uri('money',array('order_id'=>$order_v['id']),'sf');

      }

      //进行中订单
      $where_jx = array(
        'store_id'=>$store_id,
        'order_status'=>11,
        'use_time' => array(array('egt',date('Y-m-d 00:00:00',time())),array('lt',date('Y-m-d 00:00:00',time()+3600*24)),'and'),
        );
      $jx_info = $order->where($where_jx)->select();
      // echo $order->getLastSql();exit;
      foreach($jx_info as $jx_k=>$jx_v){
        $jx_info[$jx_k]['jch'] = substr($jx_v['table_no'],8);
        $jx_info[$jx_k]['tel'] = uri('user',array('id'=>$jx_v['user_id']),'tel');

        $jx_info[$jx_k]['sf'] = uri('money',array('order_id'=>$jx_v['id']),"sf");
        $jx_info[$jx_k]['lj'] = uri('money',array('order_id'=>$jx_v['id']),"lj");
        $jx_info[$jx_k]['repast_price'] = uri('shop',array('id'=>$jx_v['store_id']),'repast_price');
        $jx_info[$jx_k]['goods_info'] = M('order_fu')->where(array('order_id'=>$jx_v['id']))->select();
        foreach($jx_info[$jx_k]['goods_info'] as $k1=>$v1){
          $jx_info[$jx_k]['goods_info'][$k1]['goods_name'] = uri('food',array('id'=>$v1['goods_id']),'mingch');

        }
        $jx_total_price +=uri('money',array('order_id'=>$jx_v['id']),'sf');


      }
      // dump($jx_info);exit;
      //厨师制作完成订单
      $where_wc = array(
        'store_id'=>$store_id,
        'order_status'=>12,
        'use_time' => array(array('egt',date('Y-m-d 00:00:00',time())),array('lt',date('Y-m-d 00:00:00',time()+3600*24)),'and'), 
        );
      $wc_count = $order->where($where_wc)->count();
      $wc_order = $order->where($where_wc)->select();
      foreach($wc_order as $wc_k=>$wc_v){
        $wc_order[$wc_k]['jch'] = substr($wc_v['table_no'],8);
        $wc_order[$wc_k]['tel'] = uri('user',array('id'=>$wc_v['user_id']),'tel');

        $wc_order[$wc_k]['sf'] = uri('money',array('order_id'=>$wc_v['id']),"sf");
        $wc_order[$wc_k]['lj'] = uri('money',array('order_id'=>$wc_v['id']),"lj");
        $wc_order[$wc_k]['repast_price'] = uri('shop',array('id'=>$wc_v['store_id']),'repast_price');
        $wc_order[$wc_k]['goods_info'] = M('order_fu')->where(array('order_id'=>$wc_v['id']))->select();
        foreach($wc_order[$wc_k]['goods_info'] as $k2=>$v2){
          $wc_order[$wc_k]['goods_info'][$k2]['goods_name'] = uri('food',array('id'=>$v2['goods_id']),'mingch');
          // dump($wc_order[$wc_k]['goods_info']);exit;

        }
        $wc_total_price +=uri('money',array('order_id'=>$wc_v['id']),'sf');


      }

      //今日取消单
      $where_qx = array(
        'store_id'=>$store_id,
        'order_status'=>20,
        'use_time' => array(array('egt',date('Y-m-d 00:00:00',time())),array('lt',date('Y-m-d 00:00:00',time()+3600*24)),'and'), 
        );
      $qx_count = $order->where($where_qx)->count();
      $qx_info = $order->where($where_qx)->select();
      foreach($qx_info as $qx_k=>$qx_v){
        $qx_info[$qx_k]['jch'] = substr($qx_v['table_no'],8);
        $qx_info[$qx_k]['tel'] = uri('user',array('id'=>$qx_v['user_id']),'tel');

        $qx_info[$qx_k]['sf'] = uri('money',array('order_id'=>$qx_v['id']),"sf");
        $qx_info[$qx_k]['lj'] = uri('money',array('order_id'=>$qx_v['id']),"lj");
        $qx_info[$qx_k]['repast_price'] = uri('shop',array('id'=>$qx_v['store_id']),'repast_price');
        $qx_info[$qx_k]['goods_info'] = M('order_fu')->where(array('order_id'=>$qx_v['id']))->select();
        foreach($qx_info[$qx_k]['goods_info'] as $k3=>$v3){
          $qx_info[$qx_k]['goods_info'][$k3]['goods_name'] = uri('food',array('id'=>$v3['goods_id']),'mingch');

        }
        $qx_total_price +=uri('money',array('order_id'=>$qx_v['id']),'sf');


      }

      //未使用订单
      $where_no = array(
        'store_id'=>$store_id,
        'order_status'=>5,
        // 'use_time' => array(array('egt',date('Y-m-d 00:00:00',time())),array('lt',date('Y-m-d 00:00:00',time()+3600*24)),'and'), 
      );

      $no_count = $order->where($where_no)->count();
      $no_info = $order->where($where_no)->order('id desc')->select();
      foreach($no_info as $no_k=>$no_v){
        $no_info[$no_k]['jch'] = substr($no_v['table_no'],8);
        $no_info[$no_k]['tel'] = uri('user',array('id'=>$no_v['user_id']),'tel');

        $no_info[$no_k]['sf'] = uri('money',array('order_id'=>$no_v['id']),"sf");
        $no_info[$no_k]['lj'] = uri('money',array('order_id'=>$no_v['id']),"lj");
        $no_info[$no_k]['repast_price'] = uri('shop',array('id'=>$no_v['store_id']),'repast_price');
        $no_info[$no_k]['goods_info'] = M('order_fu')->where(array('order_id'=>$no_v['id']))->select();
        foreach($no_info[$no_k]['goods_info'] as $k4=>$v4){
          $no_info[$no_k]['goods_info'][$k4]['goods_name'] = uri('food',array('id'=>$v4['goods_id']),'mingch');

        }
        $no_total_price +=uri('money',array('order_id'=>$no_v['id']),'sf');


      }




      $this->assign('count',$count);
      $this->assign('wc_count',$wc_count);
      $this->assign('qx_count',$qx_count);
      $this->assign('no_count',$no_count);
      $this->assign('total_price',$total_price);
      $this->assign('wc_total_price',$wc_total_price);
      $this->assign('qx_total_price',$qx_total_price);
      $this->assign('no_total_price',$no_total_price);
      $this->assign('store_id',$store_id);
      $this->assign('order_info',$order_info);
      $this->assign('qx_info',$qx_info);
      $this->assign('no_info',$no_info);
      $this->assign('wc_order',$wc_order);
      $this->assign('jx_info',$jx_info);

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

    //商家取消订单
    public function qx_order(){
        $save_res = '';
        $order_save = '';
        $sf = 0.00;
        $ye = 0.00;
        $order_id = I('post.order_id');
        $user_id = uri('order',array('id'=>$order_id),'user_id');
        // $order_status = uri('order',array('id'=>$order_id),'order_status');
        // if($order_status == 5){
            $sf = uri('money',array('order_id'=>$order_id),'sf');
            
            $ye = uri('user',array('id'=>$user_id),'money');

            $order_save = M('order')->where(array('id'=>$order_id))->save(array('order_status'=>20));
            if(!$order_save){
                $this->ajaxReturn(array('data'=>false,'code'=>202,'msg'=>'订单状态修改失败'));

            }
            $data = array(
                'money' => $ye + $sf,
                ); 
            $save_res = M('user')->where(array('id'=>$user_id))->save($data);
            if($save_res){
                $this->ajaxReturn(array('data'=>true,'code'=>200,'msg'=>'取消成功'));

            }

        // }else{
            // $this->ajaxReturn(array('data'=>false,'code'=>201,'msg'=>'此订单不允许取消'));
        // }     
    }

    //商家确认订单
    public function qr_order(){
      $order_id = I('post.order_id');
      $save = M('order')->where(array('id'=>$order_id))->save(array('order_status'=>11));
      if($save){
        $this->ajaxReturn(array('data'=>true,'code'=>200,'msg'=>''));
      }else{
        $this->ajaxReturn(array('data'=>false,'code'=>205,'确认失败'));
      }
    }
    //商家完成订单
    public function wc_order(){
      $order_id = I('post.order_id');
      $save = M('order')->where(array('id'=>$order_id))->save(array('order_status'=>12));
      if($save){
        $this->ajaxReturn(array('data'=>true,'code'=>200,'msg'=>''));
      }else{
        $this->ajaxReturn(array('data'=>false,'code'=>205,'确认失败'));
      }      
    }



}