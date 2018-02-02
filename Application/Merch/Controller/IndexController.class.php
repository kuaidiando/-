<?php
/**
 * 商家后台移动版控制器 IndexController.class.php
 * Author: 杨旭亚
 * Date: 2018年1月5日
*/
namespace Merch\Controller;
use Think\Controller;
class IndexController extends Controller {
	//商家首页
    public function index(){
        $this->display();
    }
}