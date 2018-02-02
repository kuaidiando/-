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
    public function _initialize()
    {
        // $_SESSION['userid'] = '';
        // exit;
    //     $this->get_data = get_json_data();
      
    //     if (!$this->user_id) {
    //         $data = array(
    //                 'data' => false,
    //                 'code' => 220,
    //                 'msg'  => '请登录',
    //         );

    //         $this->ajaxReturn($data);
    //     }

    //     $user_info = uri('user', $this->user_id);
    //     if (!$user_info) {
    //         $data = array(
    //                 'data' => false,
    //                 'code' => 221,
    //                 'msg'  => '请登录',
    //         );

    //         $this->ajaxReturn($data);
    //     }
        
    }
    public function index(){
        // $code = M('mobile_code');
        // $res = $code->where('mobile_code.id= sms_status.sms_id')
        //            ->field('mobile_code.tel,mobile.add_time,sms_status.id,sms_status.status,sms_status.type,sms_status.content,sms_status.uodate_time')
        //            ->join("left join sms_status on mobile_code.id = sms_status.sms_id")
        //            ->select();
        // $this->assign('codes',$res);
        // $this->display();
    }
 
   //保存购物车
    public function save_cart()
    {
        dump($_POST);
        dump(($_COOKIE['shop_cart_info']));
        exit;
        // $this->shopid = I('shopid');
        // $this->user_id = \user_helper::get_user_id();
        // // dump($this->user_id);exit;
        // if(!$this->user_id){
        //     $this->redirect('Home/Login/index?is_cart=1&shopid='.$this->shopid);
        // }else{
        //     $this->redirect('Home/Cart/save_cart/index?shopid='.$this->shopid);

        // }

        $info = array();
        $shop_id = I('shopid');
        $user_id = \user_helper::get_user_id();
        if(!$user_id){
            $this->redirect('Home/Login/index?is_cart=1&shopid='.$this->shopid);
        }else{
            $this->user_id = $user_id;
            // dump($this->user_id);exit;
        }
        $where = array(
            'userid'=>$user_id,
            'shopid'=>$shop_id,
            );
        $cart_y = M('cart')->where(array('user_id'=>$user_id,'store_id'=>$shop_id))->delete();
        //获取商品临时表里的数据
        $info = M("linshijj")->where($where)->select();
        // dump($info);exit;
        $cart = M('cart');
        // $store_id = 0;
        // $store_id = $cart->where(array('user_id'=>$user_id, 'status'=>1))->order('`id` DESC')->getField('store_id');
 
        if($info){
            foreach($info as $infok=>$infov){
                // if($store_id && $store_id != $infov['shopid']){
                //     $result = $cart->where(array('user_id'=>$user_id,'status'=>1))->save(array('status'=>0));
                //         if(!$result){
                //             $this->error("Index/detail","存在其他商家商品");
                //         }
                // }else{
                    $filter = array(
                        'user_id'  => $user_id,
                        'goods_id' => $infov['foodid'],
                        'status'   => 1,
                        'store_id' => $shop_id,
                    );
                    $cart_info = uri('cart',$filter);
                    if(!$cart_info){
                        $filter['goods_num'] = $infov['foodnum'];
                        $filter['goods_type'] = $infov['foodtypeid'];
                        $filter['add_time']  = date('Y-m-d H:i:s',time());
                        $filter['store_id']  = $shop_id;
                        $result = $cart->add($filter);
                        if (!$result) {
                      
                        $this->error("index/detail","保存失败请重试");
                        }
                    }else{
                        $info = array(
                            'goods_num' => $infov['foodnum'] + $cart_info['goods_num'],
                            'update_time'=> date('Y-m-d H:i:s',time()),
                        );

                        // if (!$cart_info['status']) {
                        //     $info['status'] = 1;
                        // }

                        $result = $cart->where(array('id'=>$cart_info['id']))->save($info);
                        if (!$result) {
                          
                            $this->error('index/detail','保存失败请重试');
                        }
                    }

                // }
            }
            // M('linshijj')->where($where)->delete();
        }
      
        $this->redirect('cart/diandan_info?store_id='.$shop_id);
        // $shopname = uri('shop',array('id'=>$shop_id),'mingch');
        // $end_cart_info = M('cart')->where(array('user_id'=>$user_id,'store_id'=>$shop_id,'status'=>1))->select();
        // $total_price = 0.00;

        // foreach($end_cart_info as $k=>$v){
        //     $end_cart_info[$k]['name'] = uri('food',array('id'=>$v['goods_id']),'mingch');
        //     $end_cart_info[$k]['price'] = uri('food',array('id'=>$v['goods_id']),'jiage_youhui');
        //     // $total_price = 
        //     $total_price += $v['goods_num'] * uri('food',array('id'=>$v['goods_id']),'jiage_youhui');
        // }
        // // dump($end_cart_info);exit;
        // $this->assign('total_price',$total_price);
        // $this->assign('shopid',$shop_id);
        // $this->assign('end_cart_info',$end_cart_info);
        // $this->assign('shopname',$shopname);
        // $this->display('cart/diandanye');
       
    }

    //显示diandanye
    public function diandan_info(){
        $store_id = I('store_id');
        // dump($this->user_id);exit;
        // dump($store_id);exit;
        // echo 'jkljhlk';exit;
        $user_id = \user_helper::get_user_id();
        $shopname = uri('shop',array('id'=>$store_id),'mingch');
        $cart = M('cart');
        $end_cart_info = $cart->where(array('user_id'=>$user_id,'store_id'=>$store_id,'status'=>1))->select();
        // echo $cart->getLastSql();exit;
        // dump($end_cart_info);exit;
        $total_price = 0.00;

        foreach($end_cart_info as $k=>$v){
            $end_cart_info[$k]['name'] = uri('food',array('id'=>$v['goods_id']),'mingch');
            $end_cart_info[$k]['price'] = uri('food',array('id'=>$v['goods_id']),'jiage_youhui');
            // $total_price = 
            $total_price += $v['goods_num'] * uri('food',array('id'=>$v['goods_id']),'jiage_youhui');
        }
        // dump($end_cart_info);exit;
        $this->assign('total_price',$total_price);
        $this->assign('shopid',$store_id);
        $this->assign('end_cart_info',$end_cart_info);
        $this->assign('shopname',$shopname);
        $this->display('cart/diandanye');
    }

     
}