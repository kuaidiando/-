<?php
/**
 * 商户认证控制器 AuthenticaController.class.php
 * Author: 杨旭亚
 * Date: 2018年1月4日
*/
namespace Admin\Controller;

use Admin\Model\SysDmJxModel;
use Common\Controller\BasicController;  
use Think\Controller;
use Think\Page;

class AuthenticaController extends BasicController
{
    public function index()
    {
    	$mdid = I('get.mdid');//门店id
    	$User = M("shop"); // 实例化User对象
		$where['id'] = $mdid;
		// dump($data);die;
		$res = $User->select();
    	$this->assign('mdid',$mdid);//门店id
    	$this->assign('res',$res);//门店单条信息
        $this->display();
    }
    public function edit(){
    	$mdid = I('post.mendianid');
		$User = M("shop"); // 实例化User对象
		$where['id'] = $mdid;
		$data = I('post.');
		// dump($data);die;
		$res = $User->where($where)->save($data);
    	// echo $User->getLastSql();die;

		$res ? $this->success('认证成功') : $this->error('认证失败');
    }
}