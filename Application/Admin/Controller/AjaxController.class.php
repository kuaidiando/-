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
    // //份量 价格 添加
    // public function fljiageadd(){
    // 	//获取菜品id
    // 	$userfood = M('food');
    // 	$datafood = $userfood->Max('id');//获取表中最大id
    // 	$cpid = $datafood*1+1;//菜品id
    // 	$flid = rtrim(I('post.flid'),",");//份量id
    // 	$fljiage = rtrim(I('post.fljiage'),",");//份量对应价格
    // 	$doflid = explode(",",$flid);//, 分隔分量id
    // 	$dofljiage = explode(",",$fljiage);//, 分隔分量对应价格
    // 	//判断添加是否成功
    // 	$cgtype = 1;
    // 	foreach ($doflid as $k => $v) {
    // 		// 菜品价格表
    // 		$usercpfljg = M('cpfljiage');
    // 		$datafljiage['cpcode'] =$cpid;
    // 		$datafljiage['flcode'] =$v;
    // 		$datafljiage['cpfljiage'] =$dofljiage[$k];
    // 		// 执行添加
    // 		$rescgadd = $usercpfljg->add($datafljiage);
    // 		// 判断添加是否成功
    // 		if (!$rescgadd) {
    // 			$cgtype = 2;
    // 		}
    // 	}
    // 	$this->ajaxReturn($cgtype);
    // }
}