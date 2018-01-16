<?php  
 /**
 * Basic控制器 BasicController.class.php
 * Text: 后台公共控制器 
 * Author: 杨旭亚
 * Date: 2017年12月29日
*/
namespace Common\Controller;  
  
use Think\Controller;  
  
class BasicController extends Controller {  
  	// 城市级联 以及点击城市的 市id
    public function _initialize() {  
        //城市级联
        $user1 = M('city');
        $result1 = $user1->order("paix desc") ->select();//城市级联
        // dump($result1);exit;
        $this->assign('res',$result1);
        $this->assign('chengshiid',I('get.id'));//城市id
    }  
  
}  