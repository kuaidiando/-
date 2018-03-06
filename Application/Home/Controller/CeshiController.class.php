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
    
    public function _initialize()
    {
       echo "aa";

    }
	//门店列表展示
    public function index(){
        
       
        $this->display();
    }
}