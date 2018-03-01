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

    public function _initialize(){
       $this->user_id = \user_helper::get_user_id();
    }

    public function index(){
        $_SESSION = '';
        // $this->display('order_info');
    }
    //提交订单
    public function save_order(){
        $order_filter = array();
        $order_filter = $_POST;
        // dump($_POST);exit;
        if(!$_POST){
            return false;
        }
        // dump($_POST);exit;
        if(!$_SESSION['order_id'] || $_POST['store_id'] != uri('order',array('id'=>$_SESSION['order_id']),'store_id')){
            $order_filter['user_id'] = $this->user_id;
            $order_filter['order_code'] = date('ymdHis').sms_code(4);
            $order_filter['add_time'] = date('Y-m-d H:i:s',time());
            $order_id = 0;
            $order_id = M('order')->add($order_filter);
            if($order_id){
                $info = unserialize(stripslashes($_COOKIE['food_num']));
                foreach($info as $goods_k=>$goods_v){
                    if($_POST['store_id'] == $goods_v['shopid']){
                        $order_fu = array();
                        $order_fu['order_id'] = $order_id;
                        $order_fu['goods_id'] = $goods_v['foodid'];
                        $order_fu['goods_num'] = $goods_v['foodnum'];
                        $order_fu['store_id'] = $goods_v['shopid'];
                        $order_fu['goods_price'] = uri('food',array('id'=>$goods_v['foodid']),'jiage_youhui');
                        $order_fu_id = M('order_fu')->add($order_fu);
                        if(!$order_fu_id){
                            M('order')->where(array('id'=>$order_id))->delete();
                            $this->error('订单添加失败');
                        }  
                    }
                }
                // $order_goods_info = M('cart')->where(array('store_id'=>$_POST['store_id'],'user_id'=>$this->user_id,'status'=>1))->select();
                // foreach($order_goods_info as $goods_k=>$goods_v){
                //     $order_fu = array();
                //     $order_fu['order_id'] = $order_id;
                //     $order_fu['goods_id'] = $goods_v['goods_id'];
                //     $order_fu['goods_num'] = $goods_v['goods_num'];
                //     $order_fu['store_id'] = $goods_v['store_id'];
                //     $order_fu['goods_price'] = uri('food',array('id'=>$goods_v['goods_id']),'jiage_youhui');
                //     $order_fu_id = M('order_fu')->add($order_fu);
                //     if(!$order_fu_id){
                //         M('order')->where(array('id'=>$order_id))->delete();
                //         $this->error('订单添加失败');
                //     }

                // }
        
            $_SESSION['order_id'] = $order_id;
                
            }
        
        }else{
            $order_id = $_SESSION['order_id'];
            $res = M('order')->where(array('id'=>$order_id))->save($_POST);
            if($res){
                $info = unserialize(stripslashes($_COOKIE['food_num']));
                foreach($info as $goods_k=>$goods_v){
                    if($_POST['store_id'] == $goods_v['shopid']){
                        $order_fu = array();
                        $order_fu['order_id'] = $order_id;
                        $order_fu['goods_id'] = $goods_v['foodid'];
                        $order_fu['goods_num'] = $goods_v['foodnum'];
                        $order_fu['store_id'] = $goods_v['shopid'];
                        $order_fu['goods_price'] = uri('food',array('id'=>$goods_v['foodid']),'jiage_youhui');
                        $order_fu_id = M('order_fu')->add($order_fu);
                        // if(!$order_fu_id){

                        //     // M('order')->where(array('id'=>$order_id))->delete();
                        //     // $this->error('订单添加失败');
                        // }  
                        if(uri('order_fu',array('order_id'=>$order_id,'goods_id'=>$order_fu['goods_id'],'goods_num'))){
                        if(uri('order_fu',array('order_id'=>$order_id,'goods_id'=>$order_fu['goods_id']),'goods_num') == $order_fu['goods_num']){
                            continue;

                        }else{
                            $order_fu_id = M('order_fu')->where(array('order_id'=>$order_id,'goods_id'=>$order_fu['goods_id']))->save($order_fu);
                         
                            if(!$order_fu_id){
                                echo '修改数量失败';exit;
                                M('order')->where(array('id'=>$order_id))->delete();
                                $this->error('cart/save_cart?shopid='.$_POST['store_id'],'订单添加失败');
                            } 
                        }

                    }else{
                        M('order_fu')->add($order_fu);
                    }
                    }
                }


                // $order_goods_info = M('cart')->where(array('store_id'=>$_POST['store_id'],'user_id'=>$this->user_id,'status'=>1))->select();
                // foreach($order_goods_info as $goods_k=>$goods_v){
                //     $order_fu = array();
                //     $order_fu['order_id'] = $order_id;
                //     $order_fu['goods_id'] = $goods_v['goods_id'];
                //     $order_fu['goods_num'] = $goods_v['goods_num'];
                //     $order_fu['store_id'] = $goods_v['store_id'];
                //     $order_fu['goods_price'] = uri('food',array('id'=>$goods_v['goods_id']),'jiage_youhui');
                //     if(uri('order_fu',array('order_id'=>$order_id,'goods_id'=>$order_fu['goods_id'],'goods_num'))){
                //         if(uri('order_fu',array('order_id'=>$order_id,'goods_id'=>$order_fu['goods_id']),'goods_num') == $order_fu['goods_num']){
                //             continue;

                //         }else{
                //             $order_fu_id = M('order_fu')->where(array('order_id'=>$order_id,'goods_id'=>$order_fu['goods_id']))->save($order_fu);
                         
                //             if(!$order_fu_id){
                //                 echo '修改数量失败';exit;
                //                 M('order')->where(array('id'=>$order_id))->delete();
                //                 $this->error('cart/save_cart?shopid='.$_POST['store_id'],'订单添加失败');
                //             } 
                //         }

                //     }else{
                //         M('order_fu')->add($order_fu);
                //     }


                // }
            }
        }
        
        // setcookie("food_num",serialize($food_num),time()-10,"/");
        // $this->redirect('order/pay_info?order_id='.$order_id.'&store_id='.$_POST['store_id']);
        // $this->redirect("Home/Order/pay_info",array('order_id'=>$order_id,'store_id'=>$_POST['store_id']));
        $order_code = uri('order',array('id'=>$order_id),'order_code');
        $shopname = uri('shop',array('id'=>$_POST['store_id']),'mingch');
        $money = uri('user',array('id'=>$this->user_id),'money');
        $total_price = uri('order',array('id'=>$order_id),'total_price');
        $lj = $total_price * 0.03;
        $sf = $total_price - $lj;
        $this->assign('order_id',$order_id);
        $this->assign('money',$money);
        $this->assign('shopname',$shopname);
        $this->assign('order_code',$order_code);
        $this->assign('total_price',$total_price);
        $this->assign('lj',$lj);
        $this->assign('sf',$sf);
        $this->assign('store_id',$_POST['store_id']);

        $this->display('zhifuye');
        
     
    }
    //未支付前来支付
    public function pay_again(){
        $order_id = I('order_id');
        $order_info = uri('order',array('id'=>$order_id));
        $shopname = uri('shop',array('id'=>$order_info['store_id']),'mingch');
        $order_code = $order_info['order_code'];
        $total_price=$order_info['total_price'];
        $lj = $total_price * 0.03;
        $sf = $total_price - $lj;
        $money = uri('user',array('id'=>$this->user_id),'money');
        $this->assign('order_id',$order_id);
        $this->assign('money',$money);
        $this->assign('shopname',$shopname);
        $this->assign('order_code',$order_code);
        $this->assign('total_price',$total_price);
        $this->assign('lj',$lj);
        $this->assign('sf',$sf);
        $this->assign('store_id',$order_info['store_id']);

        $this->display('zhifuye');


    }
    //订单支付页面
    public function pay_info(){
        $user_id = \user_helper::get_user_id();
        $order_id = I('order_id');
        $store_id = I('store_id');
        $order_code = uri('order',array('id'=>$order_id),'order_code');
        $shopname = uri('shop',array('id'=>$store_id),'mingch');
        $money = uri('user',array('id'=>$user_id),'money');
        $total_price = uri('order',array('id'=>$order_id),'total_price');
        $lj = $total_price * 0.03;
        $sf = $total_price - $lj;
        $this->assign('order_id',$order_id);
        $this->assign('money',$money);
        $this->assign('shopname',$shopname);
        $this->assign('order_code',$order_code);
        $this->assign('total_price',$total_price);
        $this->assign('lj',$lj);
        $this->assign('sf',$sf);
        $this->assign('store_id',$store_id);
        $this->display('zhifuye');

        // echo $order_id;exit;
    }
    //支付
    public function to_pay(){
        // $user_id = \user_helper::get_user_id();
        // dump($_POST);exit;
        $total_price = I('post.total_price');
        $store_id = I('post.store_id');
        $lj = I('post.lj');
        $sf = I('post.sf');
        $order_id = I('order_id');
        // $order_in = uri('order',array('id'=>$order_id));
        // $total_price = $order_in['total_price'];
        // $store_id = $order_in['store_id'];
        // $lj = $total_price * 0.03;
        // $sf = $total_price - $lj;       
        // dump($_POST);exit;
        // 2为余额支付
        if($_POST['item'] == 2){
            $money = uri('user',array('id'=>$this->user_id),'money');
            if($sf > $money){
                $this->error('余额不足，请更换支付方式');
            }else{
                $filter = array(
                        'money'=>$money - $sf,
                    );
                // M('order')->where()
                $money_change = M('user')->where(array('id'=>$this->user_id))->save($filter);
                if($money_change){
                    M('order')->where(array('id'=>$order_id))->save(array('order_status'=>5,'pay_time'=>date('Y-m-d H:i:s'),time()));
                    $money_data = array();
                    $money_data = array(
                        'order_id'   =>$order_id,
                        'total_price'=>$total_price,
                        'sf'         =>$sf,
                        'pay_type'   =>2,
                        'lj'         =>$lj,
                        'pay_time'   =>date('Y-m-d H:i:s',time()),
                        );
                    M('money')->add($money_data);

                    // M('cart')->where(array('store_id'=>$store_id,'user_id'=>$this->user_id,'status'=>1))->save(array('status'=>0));

                    setcookie("food_num",serialize($food_num),time()-10,"/");
                    $_SESSION['order_id'] = '';
  
                }else{
                    $this->error('支付失败');
                }


            }
        $this->redirect('order/dingdanxiangqing?store_id='.$store_id.'&order_id='.$order_id);
        // $order_code = uri('order',array('id'=>$order_id),'order_code');
        // $order_status = uri('order',array('id'=>$order_id),'order_status');
        // $is_use = uri('order',array('id'=>$order_id),'is_use');
        // $goods_info = M('order_fu')->where(array('order_id'=>$order_id))->select();
        // foreach($goods_info as $k=>$v){
            // $goods_info[$k]['goodsname'] = uri('food',array('id'=>$v['goods_id']),'mingch');
        // }
        // $this->assign('order_code',$order_code);
        // $this->assign('order_status',$order_status);
        // $this->assign('is_use',$is_use);
        // $this->assign('goods_info',$goods_info);
        // $this->assign('order_id',$order_id);
        // $this->assign('store_id',$store_id);
        // $this->assign('total_price',$total_price);
        // $this->assign('sf',$sf);
        // $this->assign('lj',$lj);
        // $this->display('dingdanxiangqing');
        }
    



    }
    //订单详情
    public function dingdanxiangqing(){
        $order_id = I('order_id');
        $store_id = uri('order',array('id'=>$order_id),'store_id');
        // dump($store_id);exit;

        $order_code = uri('order',array('id'=>$order_id),'order_code');
        $order_status = uri('order',array('id'=>$order_id),'order_status');
        $is_use = uri('order',array('id'=>$order_id),'is_use');
        $seat = uri('order',array('id'=>$order_id),'seat');
        $goods_info = M('order_fu')->where(array('order_id'=>$order_id))->select();
        foreach($goods_info as $k=>$v){
            $goods_info[$k]['goodsname'] = uri('food',array('id'=>$v['goods_id']),'mingch');
        }
        $jc_code = uri('order_jc',array('order_id'=>$order_id),'jc_code');
        // dump($jc_code);exit;
        if($jc_code){
            $end_code = substr($jc_code,8);
            $this->assign('jc_code',$end_code);
        }
        $money_info = uri('money',array('order_id'=>$order_id));
        $repast_price = uri('shop',array('id'=>$store_id),'repast_price');
        $this->assign('money_info',$money_info);
        $this->assign('repast_price',$repast_price);
        $this->assign('seat',$seat);

        $this->assign('order_code',$order_code);
        $this->assign('order_status',$order_status);
        $this->assign('is_use',$is_use);
        $this->assign('goods_info',$goods_info);
        $this->assign('order_id',$order_id);
        $this->assign('store_id',$store_id);
        $this->display('dingdanxiangqing');
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
        $order_s = M('order')->where(array('user_id'=>$this->user_id,'is_use'=>0,'order_status'=>5))->select();
        foreach($order_s as $key_s=>$value_s){
            $order_s[$key_s]['shopname'] = uri('shop',array('id'=>$value['store_id']),'mingch');
            $order_s[$key_s]['logo'] = uri('shop',array('id'=>$value['store_id']),'logo');

        }
        $this->assign('order_s',$order_s);

        //已使用
        $where_use = array(
            'user_id' => $this->user_id,
            // 'is_use' => 1,
            'order_status' => array('in','10,11,12'),
            );
        $order_u = M('order')->where($where_use)->select();
        foreach($order_u as $key_u=>$value_u){
            $order_u[$key_u]['shopname'] = uri('shop',array('id'=>$value['store_id']),'mingch');
            $order_u[$key_u]['logo'] = uri('shop',array('id'=>$value['store_id']),'logo');

        }
        $this->assign('order_u',$order_u);

        //待评价
        // $order_p = M('order')->where(array('user_id'=>$this->user_id,'order_status'=>10))->select();
        // foreach($order_p as $key_p=>$value_p){
        //     $order_p[$key_p]['shopname'] = uri('shop',array('id'=>$value['store_id']),'mingch');
        //     $order_p[$key_p]['logo'] = uri('shop',array('id'=>$value['store_id']),'logo');

        // }
        // $this->assign('order_p',$order_p);
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
        $money_info = uri('money',array('order_id'=>$order_id));
        $this->assign('goods_info',$goods_info);
        $this->assign('info',$info);
        $this->assign('money_info',$money_info);
        $this->display('dingdanxiangqing');
    }
    //取消订单
    public function cancel_order(){
        $save_res = '';
        $order_save = '';
        $order_id = I('post.order_id');
        $order_status = uri('order',array('id'=>$order_id),'order_status');
        // $this->ajaxReturn(array('data'=>true,'code'=>100,'msg'=>'ceshi'));
        if($order_status == 5){
            $sf = uri('money',array('order_id'=>$order_id),'sf');
            $ye = uri('user',array('id'=>$this->user_id),'money');

            $order_save = M('order')->where(array('id'=>$order_id))->save(array('order_status'=>20));
            if(!$order_save){
                $this->ajaxReturn(array('data'=>false,'code'=>202,'msg'=>'订单状态修改失败'));

            }
            $data = array(
                'money' => $ye + $sf,
                ); 
            $save_res = M('user')->where(array('id'=>$this->user_id))->save($data);
            if($save_res){
                $this->ajaxReturn(array('data'=>true,'code'=>200,'msg'=>'取消成功'));

            }

        }else{
            $this->ajaxReturn(array('data'=>false,'code'=>201,'msg'=>'此订单不允许取消'));
        }



    }

    //用户去取消订单
    public function qqx_order(){
        $order_id = I('id');
        $res = M('order')->where(array('id'=>$order_id))->save(array('order_status'=>20));
        if($res){
            $this->ajaxReturn(array('data'=>true,'code'=>200,'msg'=>'取消成功'));

        }else{
            $this->ajaxReturn(array('data'=>false,'code'=>201,'msg'=>'取消失败'));

        }
    }
    //去提交订单
    public function sub_mit(){
        $store_id = I('store_id');
        $order_id = I('order_id');
        $seat = I('seat');
        $jch = '';
        $jc_info = M('order_jc')->where(array('store_id'=>$store_id))->order('id desc')->find();
        $jc_code = '';
        if($jc_info){
            $jch = $jc_info['jc_code'];
            $jc_code = createNum($jch);
            $end_jc_code = substr($jc_code,8);
            // $jc_id = M('order_jc')->add(array('store_id'=>$store_id,'order_id'=>$order_id,'jc_code'=>$jc_code,'seat'=>$seat));

            // $data=array(
            //     'data'=>$end_jc_code,
            //     'code'=>200,
            //     'msg'=>'今日已有',
            //     );
            // $this->ajaxReturn($data);
            // dump($this->createNum($jch));exit;

        }else{
            
            $cs = date('Ymd',time()-3600*24).'00';
            $jc_code = createNum($cs);

            $end_jc_code = substr($jc_code,8);

            // dump($this->createNum($jch));exit;
        }

        $jc_id = M('order_jc')->add(array('store_id'=>$store_id,'order_id'=>$order_id,'jc_code'=>$jc_code,'seat'=>$seat));
        if($jc_id){
            M('order')->where(array('id'=>$order_id))->save(array('is_use'=>1,'order_status'=>10,'use_time'=>date('Y-m-d H:i:s',time()),'table_no'=>$jc_code,'zhuo_hao'=>$seat));
            $data=array(
                'data'=>$end_jc_code,
                'code'=>200,
                'msg'=>'',
            );            
        }else{
            $data=array(
                'data'=>false,
                'code'=>300,
                'msg'=>'就餐号添加失败',
                );
        }

        $this->ajaxReturn($data);
    }




}