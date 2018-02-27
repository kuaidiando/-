<?php
/**
 * 商家后台移动版
 * 员工管理控制器 StaffController.class.php
 * Author: 杨旭亚
 * Date: 2018年2月26日
*/
namespace Merch\Controller;
use Think\Controller;
class StaffController extends Controller {
	//设置首页
    public function index(){
    	$shopid = I("get.shopid");
        // dump($shopid);die;
        $this->display();
    }
}