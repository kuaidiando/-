<?php
/**
 * 商家后台移动版
 * 提现控制器 EnchashmentController.class.php
 * Author: 杨旭亚
 * Date: 2018年2月28日
*/
namespace Merch\Controller;
use Think\Controller;
class EnchashmentController extends Controller {
	//设置首页
    public function index(){
        
    	// dump($shopid);
        $this->display();
    }
    public function zhuanghuguanli(){
        $this->display();
    }
}