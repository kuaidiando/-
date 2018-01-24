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
    // public function _initialize()
    // {
    //     $this->get_data = get_json_data();
    //     $this->user_id = \user_helper::get_user_id();
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
    // }
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
        $info = array();
        $shop_id = 1;// I('post.shopid');
        $user_id = \user_helper::get_user_id();
        $where = array(
            'userid'=>$user_id,
            'shopid'=>$shop_id,
            );

        //获取商品临时表里的数据
        $info = M("linshijj")->where($where)->select();
        $cart = M('cart');
        $store_id = 0;
        $store_id = $cart->where(array('user_id'=>$user_id, 'status'=>1))->order('`id` DESC')->getField('store_id');
 
        if($info){
            foreach($info as $infok=>$infov){
                if($store_id && $store_id != $infov['shopid']){
                    // if($store_id != $infov['shopid']){
                    //如果购物车中已存在其他店铺商品 清空购物车
                    $result = $cart->where(array('user_id'=>$user_id,'status'=>1))->save(array('status'=>0));
                        if(!$result){
                            $this->ajaxReturn(array(
                                'data' => false,
                                'code'=>230,
                                'msg'=>'数据有误'
                            ));
                        }
                    // }
                }else{
                    $filter = array(
                        'user_id'  => $user_id,
                        'goods_id' => $infov['foodid'],
                        'status'   => 1,
                    );
                    $cart_info = uri('cart',$filter);
                    if(!$cart_info){
                        $filter['goods_num'] = $infov['foodnum'];
                        $filter['goods_type'] = $infov['foodtypeid'];
                        $filter['add_time']  = date('Y-m-d H:i:s',time());
                        $filter['store_id']  = $shop_id;
                        $result = $cart->add($filter);
                        if (!$result) {
                            $data = array(
                                    'data' => false,
                                    'code' => 225,
                                    'msg'  => '保存失败',
                            );

                        $this->ajaxReturn($data);
                        }
                    }else{
                        $info = array(
                            'goods_num' => $infov['foodnum'] + $cart_info['goods_num'],
                            'update_time'=> date('Y-m-d H:i:s',time()),
                        );

                        if (!$cart_info['status']) {
                            $info['status'] = 1;
                        }

                        $result = $cart->where(array('id'=>$cart_info['id']))->save($info);
                        if (!$result) {
                            $data = array(
                                    'data' => false,
                                    'code' => 225,
                                    'msg'  => '保存失败'
                            );

                            $this->ajaxReturn($data);
                        }
                    }

                }
            }
        }else{
            $this->ajaxReturn(array('data'=>false,'code'=>201,'msg'=>'无数据'));
        }
        $data = array(
                'data' => true,
                'code' => 200,
                'msg'  => '',
        );

        $this->ajaxReturn($data);

       
    }

   
     


   
     
}