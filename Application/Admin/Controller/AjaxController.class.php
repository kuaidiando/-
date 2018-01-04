<?php
/**
 * AJAX控制器 AJAXController.class.php
 * Author: 杨旭亚
 * Date: 2018年1月4日
*/
namespace Admin\Controller;

use Think\Controller;
use Think\Page;

class AjaxController extends Controller
{
	// 城市级联 市->县（区）
    public function index()
    {
    	$user = M('area');//区(县)
    	$where['citycode'] = I('post.codesheng');//市的code
    	$data = $user->where($where)->select();
        $this->ajaxReturn($data);
    }
}