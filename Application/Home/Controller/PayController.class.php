<?php
/**
 *  PayController.class.php
 * ============================================================================
 
 * ----------------------------------------------------------------------------
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author:程文学
 * Date: 2018年3月6日
*/
namespace Home\Controller;
use Think\Controller;
//微信支付类
Vendor('WxPayPubHelper.WxPayPubHelper');
class PayController extends Controller {
    
    private $get_data;
    private $user_api;
    private $member_api;
    public function _initialize() {
        $this->get_data = get_json_data();
         if (ONDEV) {
             $this->user_api   = 'http://testyunge.ethank.com.cn';
             $this->member_api = 'http://testmember.ethank.com.cn';
         } else {
            $this->user_api   = 'http://yunge.ethank.com.cn';
            $this->member_api = 'http://member.ethank.com.cn';
         }
    }
	//获取access_token过程中的跳转uri，通过跳转将code传入jsapi支付页面
	public function index(){

	    //使用jsapi接口
	    $jsApi = new \JsApi_pub();
	    
	    //判断是否已经授权登录
	    $user_id = \user_helper::get_user_id();
	    
	    $openid = $_SESSION['openId'];//uri('weixin_user', array('user_id' => $user_id), 'openid');
	    
	    //勾国磊
	    //$openid = 'ox67SwPn83ZkHJnFi9wiPWUnqrhg';
	    //过木兰
	    //$openid= 'ox67SwGOgjrefwFmHBq93NTyrPmI';
	    
	    if (!$openid) {
	        $this->ajaxReturn(array('error_msg' => '该用户未授权'));
	    }
	    
	    //获取订单号
	    $order_id = I('order_id', '');
	    
	    if (isset($this->get_data['order_id']) && $this->get_data['order_id']) {
	        $order_id = $this->get_data['order_id'];
	    }
	     
	    $order_info = uri('order', array('trade_id' => $order_id));
	     
	    if(!$order_info) {
	        $this->ajaxReturn(array('error_msg' => '该订单不存在'));
	    }
	    
	    if(5 == $order_info['order_status']) {
	        $this->ajaxReturn(array('error_msg' => '该订单已付款，请不要重复付款'));
	    }
	    
	    if(10 == $order_info['order_status']) {
	        $this->ajaxReturn(array('error_msg' => '该订单已发货，无需支付'));
	    }
	    
	    if(15 == $order_info['order_status']) {
	        $this->ajaxReturn(array('error_msg' => '该订单已接收，无需支付'));
	    }
	    //检查库存
        $goods_list = M('order_goods')->where(array('order_id'=>$order_info['id']))->select();
        foreach ($goods_list as $g) {
            $gsi = $g['goods_snapshoot_id'];
            $gn = $g['goods_num'];
            //获取商品的库存
            $sql = 'select stock,title from ek_goods where id = (select goods_id from ek_goods_snapshoot where id = '.$gsi.')';
            $res = M()->query($sql);
            \Think\Log::record(json_encode($res),'INFO');
            if ($res[0]['stock'] < $gn) {
            	$this->ajaxReturn(array('error_msg' => $res[0]['title'].'库存不足'));
            }
        }
	    //使用统一支付接口，获取prepay_id
	    $unifiedOrder = new \UnifiedOrder_pub();
	    //设置统一支付接口参数
	    
	    //设置必填参数
	    $total_fee = \order_helper::get_order_total_price($order_id);
	    if ($total_fee == 0) {
	    	$this->ajaxReturn(array('error_msg' => '当前订单不符合支付要求'));
	    }
	    $total_fee = $total_fee * 100;
	    if (ONDEV) {
	  	$total_fee = 1;
	    }
	    
	    $body = "订单编号{$order_id}";
	    $unifiedOrder->setParameter("openid", "$openid");//用户标识
	    $unifiedOrder->setParameter("body", $body);//商品描述
	    //自定义订单号，此处仅作举例
	    $out_trade_no = $order_id;
	    $unifiedOrder->setParameter("out_trade_no", $out_trade_no);//商户订单号
	    $unifiedOrder->setParameter("total_fee", $total_fee);//总金额
	    //$unifiedOrder->setParameter("attach", "order_sn={$res['order_sn']}");//附加数据
	    //$unifiedOrder->setParameter("notify_url", \WxPayConf_pub::NOTIFY_URL);//通知地址
	    $unifiedOrder->setParameter("notify_url", C('WX_CONFIG.NOTIFY_URL'));//通知地址
	    $unifiedOrder->setParameter("trade_type", "JSAPI");//交易类型
	    
	    
	    //非必填参数，商户可根据实际情况选填
	    //$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号
	    //$unifiedOrder->setParameter("device_info","XXXX");//设备号
	    //$unifiedOrder->setParameter("attach","XXXX");//附加数据
	    //$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
	    //$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间
	    //$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记
	    //$unifiedOrder->setParameter("openid","XXXX");//用户标识
	    //$unifiedOrder->setParameter("product_id","XXXX");//商品ID
	    $prepay_id = $unifiedOrder->getPrepayId();
	    //通过prepay_id获取调起微信支付所需的参数
	    $jsApi->setPrepayId($prepay_id);
	    $jsApiParameters = $jsApi->getParameters();
	    
	    $wxconf = json_decode($jsApiParameters, true);
	    if ($wxconf['package'] == 'prepay_id=') {
	        $this->ajaxReturn(array('error_msg' => '当前订单存在异常，不能使用支付'));
	    }
	    
	    $this->ajaxReturn(array(
	        'status' => 'ok',
	        'wxconf' => $wxconf,
	    ));
	}
	
	//异步通知url，商户根据实际开发过程设定
	public function notify() {
	    //使用通用通知接口
	    $notify = new \Notify_pub();
	    //存储微信的回调
	    $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
	    $notify->saveData($xml);
	    //验证签名，并回应微信。
	    //对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
	    //微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
	    //尽可能提高通知的成功率，但微信不保证通知最终能成功。
	    if($notify->checkSign() == FALSE){
	        $notify->setReturnParameter("return_code", "FAIL");//返回状态码
	        $notify->setReturnParameter("return_msg", "签名失败");//返回信息
	    }else{
	        $notify->setReturnParameter("return_code", "SUCCESS");//设置返回码
	    }
	    
	    // 订单号
	    $order_id         = $notify->data['out_trade_no'];
	    // 订单金额
	    $price            = $notify->data['total_fee'];
	    $price 			  = $price / 100; 
	    
	    
	    $returnXml = $notify->returnXml();
	    //==商户根据实际情况设置相应的处理流程，此处仅作举例=======
	    //以log文件形式记录回调信息
	    $log_name = ROOT_PATH."/notify_url.log";//log文件路径
	    \Think\Log::record("【接收到的notify通知】:\n".$xml."\n");
	    $parameter = $notify->xmlToArray($xml);
	    //$this->log_result($log_name, "【接收到的notify通知】:\n".$parameter."\n");
	    \Think\Log::record("【接收到的notify通知】:\n".json_encode($parameter)."\n");
	    if($notify->checkSign() == TRUE){
	        if ($notify->data["return_code"] == "FAIL") {
	            //此处应该更新一下订单状态，商户自行增删操作
	            \Think\Log::record("【return_code返回值为fail】:\n".$xml."\n");
	            //更新订单数据【通信出错】设为无效订单
	            
	            // 返回状态码
	            $notify->setReturnParameter("return_code","FAIL");
	            // 返回信息
	            $notify->setReturnParameter("return_msg","签名失败");
	        } else if($notify->data["result_code"] == "FAIL"){
	            //此处应该更新一下订单状态，商户自行增删操作
	            \Think\Log::record("【result_code返回值为fail】:\n".$xml."\n");
	            //更新订单数据【通信出错】设为无效订单
	            
	            // 返回状态码
	            $notify->setReturnParameter("return_code","FAIL");
	            // 返回信息
	            $notify->setReturnParameter("return_msg","签名失败");
	        } else{
	            \Think\Log::record("【支付成功】:\n".$xml."\n");
	            
	            //支付成功后的逻辑操作
	            
	            //订单号
	            $order_id         = $notify->data['out_trade_no'];
	            //微信交易号
	            $transaction_id   = $notify->data['transaction_id'];
	            
	            //openid
	            $openid   = $notify->data['openid'];
	            
	            //交易金额，单位分
	            $price            = $notify->data['total_fee'];
	            
	            //交易完成时间
	            $finish_time      = $notify->data['time_end'];
	            $finish_time      = date('Y-m-d H:i:s', strtotime($finish_time));
	            
	            //验证订单合法性
	            if(!$order_id) {
	                exit('缺少必要参数');
	            }
	            
	            $order_info = uri('order', array('trade_id' => $order_id));
	            if(!$order_info) {
	                exit('该订单不存在');
	            }
	            
	            // 订单已取消
	            if($order_info['order_status'] == 20) {
	                exit('该订单已取消');
	            }
	            
	            // 已经支付，无需再次支付
	            if($order_info['order_status'] == 5) {
	                exit('该订单已经支付');
	            }
	            
	            // 不是待支付状态
	            if($order_info['order_status'] != 1) {
	                exit('该订饭不是待支付状态');
	            }
	            
	            // 订单被删除
	            if($order_info['status'] == 0) {
	                exit('该订单已关闭');
	            }
	             
	           
	            $order_status = 15;
	            M('order')->where(array('trade_id' => $order_id))->save(array(
	                'order_status'=> $order_status,
	                'pay_time'    => $finish_time
	                
	            ));
	            
	            $price = $price/100;
	            
	            //将日志信息记录到wxpay_log表里
	            $log_data = array(
	                'order_id' => $order_id,
	                'openid'   => $openid,
	                'price'    => $price,
	                'transaction_id' => $transaction_id,
	                'pay_time' => $finish_time,
	                'data'     => serialize($notify->data),
	            );
	            
	            if(!uri('wxpay_log', array(' order_id' => $order_id))){
	                M('wxpay_log')->add($log_data);
	            }
	            
	            //增加销量
	            \order_helper::add_sale_num($order_id);
	            //减少库存
	            \order_helper::reduce_stock($order_id);

	            // 增加积分
	            $_SESSION['openId'] = M('weixin_user')->where(array('user_id'=>$order_info['user_id']))->getField('openid');
	            \Think\Log::record(json_encode($_SESSION));
				$tmpres = \kms_helper::addRewardsByMoney($price);	            
				\Think\Log::record(json_encode($tmpres));
	            //清空购物车
	           // \goods_helper::clear_cart($order_info['user_id']);
	            
	            $user_id = $order_info['user_id'];
	            //更新最近购买时间
	            M('user')->where(array('id' => $user_id))->save(array('last_buy_time' => $finish_time));
	            //更新购买次数
	            M('user')->where(array('id' => $user_id))->setInc('buy_times', 1);
	            
	            
	            //计算平均价格
	            \user_helper::get_user_order_average_price($user_id);
	            
	            $user_info = uri('user', $user_id);
	            
	            $store_id = $order_info['store_id'];
	            
	            M('store')->where(array('id' => $store_id))->setInc('money', $price);

	            //加入到收入记录中
	            \order_helper::add_order_records_for_expenditure($order_id);
	            
	            //send_sms($order_info['buyer_mobile'], '尊敬的商家，手机号为'.$user_name.'的会员在你的微店【'.uri('store', $store_id, 'title').'】购买了【'.$goods_snapshoot_title.'】，请注意查收');
	            $contact_mobile = uri('store', $store_id, 'contact_mobile');
	            send_sms($contact_mobile, '尊敬的商家，手机号为'.$user_info['mobile'].'的会员在'.uri('store', $order_info['store_id'], 'title').'已下单付款,请确认。');
	            
	            //购买的是优惠券
	            if(4 == $order_info['goods_type']){
	                //如果有优惠券，生成优惠券并手机发放
	                //获取优惠卡名字
	                $goods_snapshoot_id = uri('order_goods', array('order_id' => $order_info['id']), 'goods_snapshoot_id');
	                
	                $goods_snapshoot_title = uri('goods_snapshoot', $goods_snapshoot_id, 'title');

	                //优惠券价格
	                $couponprice = uri('goods_snapshoot', $goods_snapshoot_id, 'price');
	                
	                $site_name = \config_helper::get_site_name();
	                
	                $total_codes = '';
	                
	                //send_sms('13001274667', '1'.$goods_snapshoot_title);
	                for ($i = 1; $i <= $order_info['total_num']; $i++) {
	                    //入库操作
	                    $coupon_code = 'KC'.sms_code(10);
	                    
	                    //send_sms('13001274667', '2.0'.$coupon_code);
	                    $total_codes .= $coupon_code.',';
	                    
	                    //send_sms('13001274667', '2.1'.trim($total_codes));
	                    $code_info = array(
                            'store_id'  => $store_id,
	                        'coupon_code'  => $coupon_code,
	                        'coupon_title' => $goods_snapshoot_title,
	                        'user_id' => $user_id,
	                        'order_id' => $order_info['id'],
	                        'price' => $couponprice,
	                        'add_time' => date('Y-m-d H:i:s', time())
	                         
	                    );
	                    M('coupon')->add($code_info);
	                }
	                
	                $goods_snapshoot_groups = uri('goods_snapshoot', $goods_snapshoot_id,'group_ids');
	                //send_email('wangzhaoyi@ethank.com.cn', 'ww', C('GROUP_ID'));
	                if(in_array(C('GROUP_ID'), explode(',', $goods_snapshoot_groups))){
	                	// 关闭一元夺宝发送短信的功能 2016年6月29日
	                    // send_sms($order_info['buyer_mobile'], '尊敬的会员，感谢您参加开唱“一元夺宝活动”活动，您已成功支付'.$order_info['total_price'].'元，您的夺宝码为“'.trim($total_codes, ',').'”，请妥善保管。活动期间持续关注“开唱微商城”公证号，等待开奖。祝您好运！');
	                }else{
	                    //send_sms($order_info['buyer_mobile'], '尊敬的用户，您于'.$finish_time.'在'.$site_name.'商城 【'.uri('store', $store_id, 'title').'】 购买  【'.$goods_snapshoot_title.'】  '.$order_info['total_num'].'张，消费金额¥'.$price.'，团购码为'.trim($total_codes, ',').'，请您妥善保管，谢谢您对我们的支持');
	                    $pay_price = $order_info['total_price']-$order_info['fullcut_price'];
	                    send_sms($order_info['buyer_mobile'], '尊敬的会员，您在开唱'.uri('store', $order_info['store_id'], 'title').'已成功购买“'.$goods_snapshoot_title.'”'.$order_info['total_num'].'份，累计消费金额为'.$pay_price.'元，您的开唱码为'.trim($total_codes, ',').'，请到门店验证后消费。祝您欢唱愉快。');
	                }
	            }else if (5 == $order_info['goods_type']){
	                //如果有优惠券，生成优惠券并手机发放
	                 
	                //获取会员卡名字
	                $goods_snapshoot_id = uri('order_goods', array('order_id' => $order_info['id']), 'goods_snapshoot_id');
	                 
	                $goods_snapshoot_title = uri('goods_snapshoot', $goods_snapshoot_id, 'title');
	                
	                $card_type = uri('goods_snapshoot', $goods_snapshoot_id, 'card_type');
	                
	                if (3 == $card_type) {
	                    $user_type = '金卡会员';
	                    //将会员等级改为金卡会员
	                    if ($user_info['level'] != 3) {
	                        M('user')->where(array('id' => $user_info['id']))->save(array('level' => 3));
	                    }
	                } else if(2 == $card_type){
	                    $user_type = '银卡会员';
	                    //将会员等级改为银卡会员
	                    if ($user_info['level'] == 1 ) {
	                        M('user')->where(array('id' => $user_info['id']))->save(array('level' => 2));
	                    }
	                }
	                
	                $site_name = \config_helper::get_site_name();
	                 
	                //调用购买会员卡接口
	                $data = array(
	                    'cardLevelId' => $card_type,
	                    'onlineAccount' => $price,
	                    'phoneNum'  => $order_info['buyer_mobile']
	                );
	                
	                $data['sign'] = sign($data);
	                
	                $card_data = array();
	                
	                $card_json = go_curl($this->member_api.'/ethank-member-manager/memberCardExternalCall/buyCardFromMall.json', 'GET', $data);
	                
	                //$card_data = json_decode($card_json, true);
	                
	                send_sms($order_info['buyer_mobile'], '尊敬的用户，您于'.$finish_time.'在'.$site_name.'购买('.$goods_snapshoot_title.')，消费金额¥'.$price.'，您所注册的会员手机号为'.$order_info['buyer_mobile'].'，即日起您的账号将成为柚子会'.$user_type.'，谢谢您对我们的支持');
	                
	            }else{
	                //$goods_snapshoot_id = uri('order_goods', array('order_id' => $order_info['id']), 'goods_snapshoot_id');
	                //$goods_snapshoot_title = uri('goods_snapshoot', $goods_snapshoot_id, 'title');
	                $goods_snapshoot_id = M('order_goods')->where(array('order_id'=>$order_info['id']))->select();
	                if(count($goods_snapshoot_id) > 1){
	                    foreach ($goods_snapshoot_id as $v){
	                        $title = M('goods_snapshoot')->where(array('id'=>$v['goods_snapshoot_id']))->getField('title');
	                        //$goods_snapshoot_title .= $title.'、';
	                        $goods_snapshoot_title .= '“'.$title.'”'.$v['goods_num'].'份，';
	                    }

	                    //$goods_snapshoot_title = rtrim($goods_snapshoot_title,"、");
	                }else {
	                    $goods_snapshoot_title = '“'.uri('goods_snapshoot', $goods_snapshoot_id['0']['goods_snapshoot_id'], 'title').'”'.$order_info['total_num'].'份，';
	                }
	                $pay_price = $order_info['total_price']-$order_info['fullcut_price'];
	                send_sms($order_info['buyer_mobile'], '尊敬的会员，您在开唱'.uri('store', $order_info['store_id'], 'title').'成功购买了'.$goods_snapshoot_title.'累计消费金额为'.$pay_price.'元，请在您所在的包房('.str_replace(' ', '', $order_info['buyer_address']).')等候服务人员送餐。祝您欢唱愉快。');
	            }

	            //减少库存
	            //\order_helper::reduce_stock($order_id);
	            \Think\Log::record('SUCCESS');
	            //打印订单
	            $this->order_print($order_info);
	            $notify->setReturnParameter("return_code","SUCCESS");
	        }
	    } else {
	        \Think\Log::record('FAIL');

	        // 返回状态码
	        $notify->setReturnParameter("return_code","FAIL");
	        // 返回信息
	        $notify->setReturnParameter("return_msg","签名失败");
	    }
	    $return = $notify->returnXml();
	    \Think\Log::record($return,"INFO");
	    echo $return;
	}

	
	// 打印log
	public function log_result($file,$word)
	{
	    $fp = fopen($file,"a");
	    flock($fp, LOCK_EX) ;
	    fwrite($fp,"执行日期：".strftime("%Y-%m-%d-%H：%M：%S",time())."\n".$word."\n\n");
	    flock($fp, LOCK_UN);
	    fclose($fp);
	}


	public function order_print($order_info)
    {
        $trade_id = $order_info['trade_id'];
        $store_id = $order_info['store_id'];
        $printHtml = pointerHtml($trade_id);
        $ips = trim(M('store')->where(array('id'=>$store_id))->getField('pointer_ip'),",");
        $ip = explode(",", $ips)[0];
        if (!$ip) {
            return;
        }
        $a = \kms_helper::pointer($store_id,$ip,$printHtml,1);  
        \Think\Log::record($a);  
    }

}
?>
