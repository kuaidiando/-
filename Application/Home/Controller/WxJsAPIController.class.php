<?php

namespace Home\Controller;
use Think\Controller;

class WxJsAPIController extends Controller{
    public function _initialize()
    {
        //引入WxPayPubHelper
       vendor('Weixinpay.WxPayPubHelper');
    }   

    public function jsApiCall()
    {   

        //使用jsapi接口
        $jsApi = new \JsApi_pub();
        

        $openid = $_SESSION['openid'];
        $order_id = I('id','');
       $order_info = M('order')->where(array('id'=>$order_id))->find();
        // $order_info = uri('order', array('id' => $order_id));
        $order_code = $order_info['order_code'];
        $total_fee = \order_helper::get_order_total_price($order_id);
        $total_fee = $total_fee * 100;
        $body = "订单编号{$order_code}";
        $total_fee = 20;
        $out_trade_no = $order_code;
       

        //=========使用统一支付接口，获取prepay_id============
        //使用统一支付接口
        $unifiedOrder = new \UnifiedOrder_pub();

            /*此处做数据库的查询  这里操作数据库把产品信息显示出来*/

            /*此处做数据库的查询  这里操作数据库把产品信息显示出来*/


        //设置统一支付接口参数
        //设置必填参数
        //appid已填,商户无需重复填写
        //mch_id已填,商户无需重复填写
        //noncestr已填,商户无需重复填写
        //spbill_create_ip已填,商户无需重复填写
        //sign已填,商户无需重复填写
        //

        $NOTIFY_URL="https://mk.365kdian.com/index.php/Home/WxJsAPI/notify";

        $unifiedOrder->setParameter("openid",$openid);//openid
        // $unifiedOrder->setParameter("order_id",$order_id);//openid
        $unifiedOrder->setParameter("body",$body);//商品描述
        $unifiedOrder->setParameter("out_trade_no",$out_trade_no);//商户订单号
        $unifiedOrder->setParameter("total_fee",$total_fee);//总金额 微信的钱1*100等于1
        $unifiedOrder->setParameter("notify_url",$NOTIFY_URL);//通知地址
   

        $unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
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

       // echo $prepay_id;exit();
        //=========使用jsapi调起支付============
        $jsApi->setPrepayId($prepay_id);
        
        $jsApiParameters = $jsApi->getParameters();

        $WEB_HOST='https://mk.365kdian.com';//填写的话 如 http://nicaicai.imwork.net 最后面不用加 /
        $this->assign('HOSTS',$WEB_HOST);
        $this->assign('order_id',$order_id);
        $this->assign('jsApiParameters',$jsApiParameters);
        $this->display();
        //echo $jsApiParameters;

    }


    public function notify()
    {
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

            $notify->setReturnParameter("return_code","FAIL");//返回状态码
            $notify->setReturnParameter("return_msg","签名失败了啊");//返回信息
        }else{
            $notify->setReturnParameter("return_code","SUCCESS");//设置返回码

             
                     //订单号
                // $order_code         = $notify->data['out_trade_no'];
                // //微信交易号
                // $transaction_id   = $notify->data['transaction_id'];
                
                // //openid
                // $openid   = $notify->data['openid'];
                
                // //交易金额，单位分
                // $price            = $notify->data['total_fee'];
                
                // //交易完成时间
                // $finish_time      = $notify->data['time_end'];
                // $finish_time      = date('Y-m-d H:i:s', strtotime($finish_time));
                // $price = $price/100;
                // M('order')->where(array('order_code'=>$order_code))->save(array('order_status'=>5,'pay_time'=>date('Y-m-d H:i:s',time()),'sf'=>$price));
                // $money_data = array();
                // $money_data = array(
                //     'order_id'   =>$notify->data['order_id'],
                //     'total_price'=>$price,
                //     'sf'         =>$price*0.97,
                //     'pay_type'   =>2,
                //     'lj'         =>$price*0.03,
                //     'pay_time'   =>date('Y-m-d H:i:s',time()),
                //     );
                // M('money')->add($money_data);

                // // M('cart')->where(array('store_id'=>$store_id,'user_id'=>$this->user_id,'status'=>1))->save(array('status'=>0));

                // setcookie("food_num",serialize($food_num),time()-10,"/");
                // $_SESSION['order_id'] = '';
                 //将日志信息记录到wxpay_log表里
            //     $log_data = array(
            //         'order_id' => $order_id,
            //         'openid'   => $openid,
            //         'price'    => $price,
            //         'transaction_id' => $transaction_id,
            //         'pay_time' => $finish_time,
            //         'data'     => serialize($notify->data),
            //     );
            // M('wxpay_log')->add($log_data);
        }
        $returnXml = $notify->returnXml();
        echo $returnXml;
        
        //==商户根据实际情况设置相应的处理流程，此处仅作举例=======
        
        //以log文件形式记录回调信息
         // $log_ = new Log_();
        $log_name= __ROOT__."/Public/notify_url.log";//log文件路径
        
        
        if($notify->checkSign() == TRUE)
        {
            if ($notify->data["return_code"] == "FAIL") {


                //此处应该更新一下订单状态，商户自行增删操作
                log_result($log_name,"【通信出错】:\n".$xml."\n");
            }
            elseif($notify->data["result_code"] == "FAIL"){
        

                //此处应该更新一下订单状态，商户自行增删操作
                log_result($log_name,"【业务出错】:\n".$xml."\n");
            }
            else{ 

				/*查看支付成功的返回值请去 https://pay.weixin.qq.com/wiki/doc/api/jsapi.php?chapter=9_1 */

				$xmlss=$notify->data["out_trade_no"];//订单号
				$total_fee=$notify->data['total_fee'];//订单总金额，单位为分，详见支付金额
			    

			    /*更新订单状态这里写数据库的操作*/
			   
				/*更新订单状态这里写数据库的操作*/


                //此处应该更新一下订单状态，商户自行增删操作
                log_result($log_name,"【支付成功】:\n".$xml."\n");

            }
        
            //商户自行增加处理流程,
            //例如：更新订单状态
            //例如：数据库操作
            //例如：推送支付完成信息
             // $order_status = 5;
             //    M('order')->where(array('id' => $order_id))->save(array(
             //        'order_status'=> $order_status,
             //        'pay_time'    => $finish_time
                    
             //    ));


        }
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