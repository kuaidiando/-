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
    public function latlngdw(){
    	$this->display();
    }
    public function aa(){
    	$this->display();
    }
    public function ajax(){
    	$url = "http://api.map.baidu.com/geocoder/v2/?location=38.046932,114.443498&output=json&pois=1&ak=T9Upu0sWr9Grt4EknLsa9DbU9emQlRYj";
    	$res = file_get_contents($url);

    	$res = json_decode($res);
    	$this->ajaxReturn($res);
    }
}