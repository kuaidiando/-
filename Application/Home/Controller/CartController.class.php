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
    public function _initialize()
    {
        $this->get_data = get_json_data();
        $this->user_id = \user_helper::get_user_id();
        if (!$this->user_id) {
            $data = array(
                    'data' => false,
                    'code' => 220,
                    'msg'  => '请登录',
            );

            $this->ajaxReturn($data);
        }

        $user_info = uri('user', $this->user_id);
        if (!$user_info) {
            $data = array(
                    'data' => false,
                    'code' => 221,
                    'msg'  => '请登录',
            );

            $this->ajaxReturn($data);
        }
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
        // echo '123';exit;
        header('Access-Control-Allow-Origin:*'); 
        // $xmldata = file_get_contents("php://input"); 
        dump($_POST);exit;
        // dump($this->get_data);exit;

        $goods_id  = I('goods_id');
        $goods_num = I('goods_num');
        $goods_type = I('goods_type');

        if (isset($this->get_data['goods_id']) && $this->get_data['goods_id']) {
            $goods_id = $this->get_data['goods_id'];
        }

        if (isset($this->get_data['goods_num']) && $this->get_data['goods_num']) {
            $goods_num = $this->get_data['goods_num'];
        }

        if (isset($this->get_data['goods_type']) && $this->get_data['goods_type']) {
            $goods_type = $this->get_data['goods_type'];
        }


        $goods_id  = explode(',', trim($goods_id, ','));
        $goods_num = explode(',', trim($goods_num, ','));
        $goods_type = explode(',', trim($goods_type, ','));
        var_dump($this->get_data);exit;
        var_dump($goods_num);
        var_dump($goods_type);
        exit;

        if (!count($goods_id) || !count($goods_num) || !count($goods_type) || count($goods_num) != count($goods_id) || count($goods_type) != count($goods_id)) {
            $data = array(
                'data' => false,
                'code' => 226,
                'msg'  => '数据有误',
            );

            $this->ajaxReturn($data);
        }

        $cart = M('cart');

        $store_id = 0;
        $cart_goods_id = $cart->where(array('user_id'=>$this->user_id, 'status'=>1))->order('`id` DESC')->getField('goods_id');
        if ($cart_goods_id) {
            $store_id = M('food')->where(array('id'=>$cart_goods_id))->getField('dep_shop');
        }

        foreach ($goods_id as $k=>$v) {
            if (!$v || !is_numeric($v)) {
                $data = array(
                    'data' => false,
                    'code' => 227,
                    'msg'  => '数据有误',
                );

                $this->ajaxReturn($data);
            }

            if ($store_id) {
                $goods_store_id = uri('food', $v, 'dep_shop');
                if ($store_id != $goods_store_id) {
                    //如果购物车中已在其他店铺商品 清空购物车
                    $result = $cart->where(array('user_id'=>$this->user_id,'status'=>1))->save(array('status'=>0));
                    if(!$result){
                        $this->ajaxReturn(array(
                            'data' => false,
                            'code'=>230,
                            'msg'=>'数据有误'
                        ));
                    }
                    
                }
            }
        }

        foreach ($goods_num as $k=>$v) {
            if (!$v || !is_numeric($v)) {
                $data = array(
                    'data' => false,
                    'code' => 228,
                    'msg'  => '数据有误',
                );

                $this->ajaxReturn($data);
            }
        }

        foreach ($goods_type as $k=>$v) {
            if (!$v || !is_numeric($v)) {
                $data = array(
                        'data' => false,
                        'code' => 229,
                        'msg'  => '数据有误',
                );

                $this->ajaxReturn($data);
            }
        }

        foreach ($goods_id as $k=>$v) {
            if (!$v) {
                $data = array(
                        'data' => false,
                        'code' => 221,
                        'msg'  => '数据有误',
                );

                $this->ajaxReturn($data);
            }

            $goods_info = uri('food', (int)$v);
            if (!$goods_info) {
                $data = array(
                        'data' => false,
                        'code' => 222,
                        'msg'  => '不存在该商品',
                );

                $this->ajaxReturn($data);
            }

            if (1 != $goods_info['zhuangt']) {
                $data = array(
                        'data' => false,
                        'code' => 223,
                        'msg'  => '该商品未发布',
                );

                $this->ajaxReturn($data);
            }

            $filter = array(
                    'user_id'  => $this->user_id,
                    'goods_id' => $v,
                    'status'   => 1,
            );

            $cart_info = uri('cart', $filter);
            if (!$cart_info) {
                $filter['goods_num'] = $goods_num[$k];
                $filter['goods_type'] = $goods_type[$k];
                $filter['add_time']  = date('Y-m-d H:i:s',time());
                $result = $cart->add($filter);
                if (!$result) {
                    $data = array(
                            'data' => false,
                            'code' => 225,
                            'msg'  => '保存失败',
                    );

                    $this->ajaxReturn($data);
                }

                //后期加商品统计
            } else {
                $info = array(
                        'goods_num' => $goods_num[$k] + $cart_info['goods_num'],
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

            //更新加入购物车统计
            \goods_helper::goods_statistics_add($goods_info['id'], $goods_info['store_id'], 2);

        }

        $data = array(
                'data' => true,
                'code' => 200,
                'msg'  => '',
        );

        $this->ajaxReturn($data);
    }

   
   


   
     
}