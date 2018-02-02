<?php
/**
 * 商家后台移动版
 * 门店设置控制器 IndexController.class.php
 * Author: 杨旭亚
 * Date: 2018年1月5日
*/
namespace Merch\Controller;
use Think\Controller;
class ShopsetController extends Controller {
	//设置首页
    public function index(){
        $this->display();
    }
    //基本信息
    public function jibenxx(){
    	$shopid = 1;
    	$this->display();

    }
}