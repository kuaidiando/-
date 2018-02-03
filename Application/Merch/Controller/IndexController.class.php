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
    	$user = M('shop');
    	$where['id'] = 31;
    	$res = $user->where($where)->select();
    	// dump($res);die;
    	$this->assign("res",$res);//单条菜品信息
        $this->display();
    }
}