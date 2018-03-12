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
  
	//获取access_token过程中的跳转uri，通过跳转将code传入jsapi支付页面
	public function index(){
		// echo '123';exit;

	    //使用jsapi接口
	    $jsApi = new \JsApi_pub();
	     //通过code获得openid
		 // if (!isset($_GET['code']))
		 // {
		 // //触发微信返回code码
		 // $url = $jsApi->createOauthUrlForCode(WxPayConf_pub::JS_API_CALL_URL);
		 // Header("Location: $url"); 
		 // }else
		 // {
		 // //获取code码，以获取openid
		 //  $code = $_GET['code'];
		 // $jsApi->setCode($code);
		 // $openid = $jsApi->getOpenId();
		 // }
		 // echo $openid;exit;
	    //判断是否已经授权登录
	    $user_id = \user_helper::get_user_id();
	    // echo $user_id;exit;
	    
	    $openid = $_SESSION['openid'];//uri('weixin_user', array('user_id' => $user_id), 'openid');
	    // echo $openid;exit;
	    
	    if (!$openid) {
	        $this->ajaxReturn(array('error_msg' => '该用户未授权'));
	    }
	    
	    //获取订单号
	    $order_id = I('order_id', '');
	    
	    if (isset($this->get_data['order_id']) && $this->get_data['order_id']) {
	        $order_id = $this->get_data['order_id'];
	    }
	     
	    $order_info = uri('order', array('id' => $order_id));
	     
	    if(!$order_info) {
	        $this->ajaxReturn(array('error_msg' => '该订单不存在'));
	    }
	    
	    if(5 == $order_info['order_status']) {
	        $this->ajaxReturn(array('error_msg' => '该订单已付款，请不要重复付款'));
	    }
	    
	    if(10 == $order_info['order_status']) {
	        $this->ajaxReturn(array('error_msg' => '已入座，无需重复支付'));
	    }

	    if(11 == $order_info['order_status']) {
	        $this->ajaxReturn(array('error_msg' => '在制作，无需重复支付'));
	    }

	    if(12 == $order_info['order_status']) {
	        $this->ajaxReturn(array('error_msg' => '已完成，无需支付'));
	    }
	    
	    if(15 == $order_info['order_status']) {
	        $this->ajaxReturn(array('error_msg' => '该订单已完成，无需支付'));
	    }
	
	    //使用统一支付接口，获取prepay_id
	    $unifiedOrder = new \UnifiedOrder_pub();
	    // dump($unifiedOrder);exit;
	    //设置统一支付接口参数
	    
	    //设置必填参数
	    $total_fee = \order_helper::get_order_total_price($order_id);
	    if ($total_fee == 0) {
	    	$this->ajaxReturn(array('error_msg' => '当前订单不符合支付要求'));
	    }
	    $total_fee = $total_fee * 100;
	    // $order_code = uri('order',array('id'=>$order_id),'order_code');
	    $order_code = $order_info['order_code'];
	   //  if (ONDEV) {
	  	// $total_fee = 1;
	   //  }
	    $total_fee = 20;
	    $body = "订单编号{$order_code}";
	    $unifiedOrder->setParameter("openid", "$openid");//用户标识
	    $unifiedOrder->setParameter("body", $body);//商品描述
	    //自定义订单号，此处仅作举例
	    $out_trade_no = $order_code;
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
	    // dump($jsApiParameters);exit;

	    // $wxconf = json_decode($jsApiParameters, true);
	    // if ($wxconf['package'] == 'prepay_id=') {
	    //     $this->ajaxReturn(array('error_msg' => '当前订单存在异常，不能使用支付'));
	    // }
	    
	    // $this->ajaxReturn(array(
	    //     'status' => 'ok',
	    //     'wxconf' => $wxconf,
	    // ));

		 $this->assign('openid',$openId);
		 $this->assign('jsApiParameters',$jsApiParameters);
		$this->display('Home/Order/zhifuye');		 
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
	    $this->log_result($log_name, "【接收到的notify通知】:\n".$parameter."\n");
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
	             
	           
	            $order_status = 5;
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



}
?>
