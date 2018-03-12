<?php
/**
 * 测试控制器 CeshiController.class.php
 * Author: 杨旭亚
 * Date: 2018年3月6日
*/
namespace Home\Controller;
use Think\Controller;
class CeshiController extends Controller {

    // public function __call($action = '', $params = array()){
    //     dump('1645');exit;
    // }
    
   
	//门店列表展示
    public function index(){
    	//微信定位
    	import("Org.Util.Jssdk");
        $jssdk  = new \Org\Util\Jssdk("wx30248bc4475fd353", "8545a863d7110282be8cd0014ed4cfc6");
        $signPackage = $jssdk->GetSignPackage();
        //dump($signPackage);die;
        $this->assign("signPackage",$signPackage);
        $this->display();
    }

}