<?php
/**
 * 订单助手函数 order_helper.php
 * ============================================================================

 * ----------------------------------------------------------------------------
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年3月7日
*/
class order_helper
{
    /**
     * 获取订单状态
     */
    public static function get_order_status($order_id)
    {
        if (!$order_id) {
            return;
        }

        $order_info = uri('order', $order_id);

        if (!$order_info) {
            return '该订单不存在';
        }

        $order_status = $order_info['order_status'];
        if(!$order_info['status']){
            return '已关闭';
        }else if (1 == $order_status ) {
            return '待支付';
        }else if (5 == $order_status) {
            return '已支付';
        }else if (10 == $order_status) {
            return '已入座';
        }else if (12 == $order_status) {
            return '已完成';
        }else if (20 == $order_status) {
            return '已取消';
        }

    }

    /**
     * 检测当前店铺是否有操作订单的权限
     */
    public static function check_order($order_id)
    {
        if(!$order_id){
            return false;
        }

        $order_info = uri('order', $order_id);

        if (!$order_info) {
            return false;
        }

        $store_id = \store_helper::get_store_id();

        $admin_type = \user_helper::get_admin_type();

        if (2 == $admin_type && $order_info['store_id'] != $store_id) {
            return false;;
        }

        return true;

    }

   
    //清除订单 api order使用
    public function clear_order($order_ids=array())
    {
        if (!$order_ids) {
            return 'ok';
        }

        $order = M('order');
        foreach ($order_ids as $k=>$v) {
            if (!$v) {
                continue;
            }

            $order_info = $order->where(array('id'=>$v))->find();
            if (!$order_info) {
                continue;
            }
            if (1 == $order_info['status']) {
                M('order')->where(array('id'=>$v))->save(array('status'=>0));
            }
        }

        return 'ok';
    }

   

   

   

   
   
    /**
     * 30分钟自动取消未支付订单
     */
    public static function cancel_order()
    {
        $limit_time = 30*60;

        $order = M('order');

        $filter = array();
        $filter = array(
            'status' => 1,
            'order_status' => 1
        );

        $order_list = $order->where($filter)->select();

        foreach ($order_list as $order_info) {
            $add_time = strtotime($order_info['add_time']);

            if (time() - $add_time >= $limit_time) {
                $order->where(array('id' => $order_info['id']))->save(array('order_status' => 20));
                //send_sms('18301331513', $order_info['id'].'超过30分钟未付款自动取消');
            }
        }

        //send_sms('18301331513', '30分钟自动取消订单');
    }

   

   

    //获取订单总价
    public function get_order_total_price($order_id)
    {
        $total_price = '0.00';
        if (!$order_id) {
            return '0.00';
        }

        $filter = array(
            'id'     => $order_id,
        );

        $total_price = M('order')->where($filter)->getField('total_price');
      

        // foreach ($order_list as $k=>$v) {
        //     if ($v['total_price'] - $v['fullcut_price'] <= 0) {
        //         return 0;
        //     }
        //     $total_price += sprintf('%.2f',$total_price + $v['total_price'] - $v['fullcut_price']);
        // }
        $sf = $total_price * 0.97;
        return $sf;
    }

   

   
    
    //根据订单交易id获取微信支付成功的交易单号, 
    public function get_wx_trade_id($trade_id){
        if(!$trade_id){
            return '缺少必要参数';
        }
    
        $order_type = $trade_id[0];
        if ('H' == $order_type) {
            $model = 'order_hotel';
        } else {
            $model = 'order';
        }
    
        $order_info = uri($model, array('trade_id' => $trade_id));
        if(!$order_info){
            return '该订单不存在';
        }
        $wxpay_log_info = uri('wxpay_log', array('order_id' => $trade_id));
        if($wxpay_log_info){
            return $wxpay_log_info['transaction_id'];
        }else{
            return '';
        }
    }

   
}
?>
