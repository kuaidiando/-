<?php
/**
 * 购物车控制器 CartController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月13日
*/
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {
    private $get_data;
    private $user_id;
    private $shopid;
 
 
 
   //保存购物车
    public function save_cart()
    {
        $info = array();
        // dump($_POST);exit;
        if(I('shopid')){
            $shop_id = I('shopid');
        }else{
            $shop_id = $_SESSION['store_id'];
        }
        $user_id = \user_helper::get_user_id();
        $seat = I('repast');
        if($seat){
            $_SESSION['seat'] = $seat;
        }else{
            $seat = $_SESSION['seat'];
        }
        // dump($_SESSION);exit;
        $info = unserialize(stripslashes($_COOKIE['food_num']));
        // dump($info);exit;

        if(!$user_id){
            $this->redirect('Home/Login/index?is_cart=1&shopid='.$shop_id.'&seat='.$seat);
        }else{
            $this->user_id = $user_id;
        }
        $where = array(
            'userid'=>$user_id,
            'shopid'=>$shop_id,
            );
        // $cart_y = M('cart')->where(array('user_id'=>$user_id,'store_id'=>$shop_id))->delete();
        //获取商品临时表里的数据
        // $cart = M('cart');
        // 
        $user_id = \user_helper::get_user_id();
        $shopname = uri('shop',array('id'=>$shop_id),'mingch');
        $total_price = 0.00;
        $end_cart_info = array();
        if($info){
            foreach($info as $infok=>$infov){
                if($shop_id == $infov['shopid']){

            $end_cart_info[$infok]['name'] = uri('food',array('id'=>$infov['foodid']),'mingch');
            $end_cart_info[$infok]['price'] = uri('food',array('id'=>$infov['foodid']),'jiage_youhui');
            $end_cart_info[$infok]['goods_num'] = $infov['foodnum'];
            $total_price += $infov['foodnum'] * uri('food',array('id'=>$infov['foodid']),'jiage_youhui');

                    //  $filter = array(
                    //     'user_id'  => $user_id,
                    //     'goods_id' => $infov['foodid'],
                    //     'status'   => 1,
                    //     'store_id' => $shop_id,
                    // );
                    // $cart_info = uri('cart',$filter);
                    // if(!$cart_info){
                    //     $filter['goods_num'] = $infov['foodnum'];
                    //     $filter['goods_type'] = $infov['foodtypeid'];
                    //     $filter['add_time']  = date('Y-m-d H:i:s',time());
                    //     $filter['store_id']  = $shop_id;
                    //     $result = $cart->add($filter);
                    //     if (!$result) {
                      
                    //     $this->error("index/detail","保存失败请重试");
                    //     }
                    // }else{
                    //     $info = array(
                    //         'goods_num' => $infov['foodnum'] + $cart_info['goods_num'],
                    //         'update_time'=> date('Y-m-d H:i:s',time()),
                    //     );

                    //     $result = $cart->where(array('id'=>$cart_info['id']))->save($info);
                    //     if (!$result) {
                          
                    //         $this->error('index/detail','保存失败请重试');
                    //     }
                    // }    
                }
               

            }
                $repast_price = uri('shop',array('id'=>$shop_id),'repast_price');
                $total_price += $repast_price*$seat;
                // dump($seat);
                // dump($repast_price);
                // dump($total_price);exit;
                $this->assign('total_price',$total_price);
                $this->assign('repast_price',$repast_price);
                $this->assign('shopid',$shop_id);
                $this->assign('seat',$seat);
                $this->assign('end_cart_info',$end_cart_info);
                $this->assign('shopname',$shopname);
                $this->display('cart/diandanye');
        }
      
        // $this->redirect('cart/diandan_info?store_id='.$shop_id);
       
    }

    //显示diandanye
    public function diandan_info(){
        if($_SESSION['order_id']){
            $this->assign('order_id',$order_id);
        }
        $store_id = I('store_id');
        // dump($store_id);exit;
        $user_id = \user_helper::get_user_id();
        $shopname = uri('shop',array('id'=>$store_id),'mingch');
        $cart = M('cart');
        $end_cart_info = $cart->where(array('user_id'=>$user_id,'store_id'=>$store_id,'status'=>1))->select();
        $total_price = 0.00;

        foreach($end_cart_info as $k=>$v){
            $end_cart_info[$k]['name'] = uri('food',array('id'=>$v['goods_id']),'mingch');
            $end_cart_info[$k]['price'] = uri('food',array('id'=>$v['goods_id']),'jiage_youhui');
            $total_price += $v['goods_num'] * uri('food',array('id'=>$v['goods_id']),'jiage_youhui');
        }
        $seat = $_SESSION['seat'];
        $repast_price = uri('shop',array('id'=>$store_id),'repast_price');
        $total_price += $repast_price*$seat;
        // dump($seat);
        // dump($repast_price);
        // dump($total_price);exit;
        $this->assign('total_price',$total_price);
        $this->assign('repast_price',$repast_price);
        $this->assign('shopid',$store_id);
        $this->assign('seat',$seat);
        $this->assign('end_cart_info',$end_cart_info);
        $this->assign('shopname',$shopname);
        $this->display('cart/diandanye');
    }

     public function del_cart(){
        $store_id = I('shopid');
        $user_id = \user_helper::get_user_id();
        // M('cart')->where(array('store_id'=>$store_id,'user_id'=>$user_id,'status'=>1))->save(array('status'=>0));

        setcookie("food_num",serialize($food_num),time()-10,"/");
        $this->ajaxReturn(array('data'=>true,'code'=>200,'msg'=>''));
     }
}