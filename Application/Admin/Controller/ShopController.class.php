<?php
/**
 * AJAX控制器 AJAXController.class.php
 * Author: 杨旭亚
 * Date: 2017年12月29日
*/
namespace Admin\Controller;

use Admin\Model\SysDmJxModel;
use Common\Controller\BasicController;  
use Think\Controller;
use Think\Page;

class ShopController extends BasicController
{
	 // protected function _initialize()
  //   {
  //       parent::_initialize();
  //       $this->mod = new SysDmJxModel();
  //   }
    public function index()
    {
        // $param = I('get.');
        // $where = array();
        // //获取机构编码
        // $department = session('did');
        // // $where['department'] = $department;
        // // $where['department'] = 1;
        // // $where['_logic'] = 'or';
        // $where['department'] = array(array('eq',1),array('eq',$department), 'or') ;
        // // (!empty($param)) && $where['name'] = array('like',"%{$param['name']}%");
        // //总条数
        // $count = $this->mod->getCount($where);
        // $page = new Page($count, C('PAGE_SIZE'));
        // //列表信息
        // $res = $this->mod->getListFromPage($where, $page);
        // // dump($res);die;
        // // echo $this->mod->getLastSql();
        // $this->assign('info', array('list' => $res,'count' => $count, 'page' => $page->show()));
        $id = I('get.id');
        if ($id == 1) {
            $user = M('shop');
            $resmend = $user ->select();
        }else{
            $user = M('shop');
            $where['depcsjlshi'] = $id;
            $resmend = $user->where($where)->select();
        }
        /**
         * 查询该门店有无优惠卷 
         */
        // dump($resmend);die;
        // foreach ($resmend as $k => $v) {
        //     dump($v['id']);die;
        // }
        $this->assign('resshop',$resmend);//门店信息
       
        $this->display();
    }
    public function add(){
    	if (IS_POST) {
            //获取机构编码
            $user = M("shop"); // 实例化User对象
            $data = I('post.');//数据

             // 图片上传
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/img/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录

            // 上传文件
            $info   =   $upload->upload();
            // 判断图片是否存在
            if ($info['logo']['savename']) {
                $logolujing = '/img/'.$info['logo']['savepath'].$info['logo']['savename'];
                $data['logo'] = $logolujing;
            }
            
            // dump($data);die;
            $res = $user->add($data);
			$res == true ? $this->success('添加成功') : $this->error('添加失败');
    		// $this->display();
    	}else{
            $user = M('city');//城市-市
            $result = $user ->select();
            $this->assign('shopchengshi',$result);//城市信息
            $user = M('shop_type');
            $rescaipinlb = $user->select();//门店类别
            $this->assign("reschengs",$reschengs);
            $this->assign("rescaipinlb",$rescaipinlb);
            $this->display();
    	}
    	
    }
    public function edit(){
    	if (IS_POST) {
    		$id = I('post.id');
    		$User = M("shop"); // 实例化User对象
    		$where['id'] = $id;
			$data = I('post.');//更改数据
              // 图片上传
             $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/img/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录

            // 上传文件
            $info   =   $upload->upload();
            // 判断图片是否存在
            if ($info['logo']['savename']) {
                $logolujing = '/img/'.$info['logo']['savepath'].$info['logo']['savename'];
                $data['logo'] = $logolujing;
            }
			// dump($data);die;
			$res = $User->where($where)->data($data)->save();
        	// echo $User->getLastSql();die;

			$res == true ? $this->success('修改成功') : $this->error('修改失败');
    		// $this->display();
    	}else{
            $user = M('city');//城市-市
            $result = $user ->select();
            $this->assign('shopchengshi',$result);//城市信息 -市

            $user = M('shop_type');
            $rescaipinlb = $user->select();//门店类别
            $this->assign("rescaipinlb",$rescaipinlb);

            // 查询门店信息
    		$jxdm = I('get.id');
    		// dump($jxdm);die;
    		$user = M('shop');
    		$where['id'] = $jxdm;
    		$data = $user->where($where)->select();
    		// dump($data);die();
    		$this->assign('data',$data);// 查询门店信息
    		$this->display();
    	}
    }
    //详情
    public function xiangqing(){
        // 查询门店信息
            $jxdm = I('get.id');
            // dump($jxdm);die;
            $user = M('shop');
            $where['id'] = $jxdm;
            $data = $user->where($where)->select();
            // dump($data);die();
            $this->assign('data',$data);// 查询门店信息
            $this->display();
    }
    public function delete(){
    	$condition = I('post.id');
    	$where['id'] = $condition;
    	$res = M('shop')->where($where)->delete();
    	if ($res) {
            $this->ajaxReturn(array('status' => true, 'msg' => '删除成功!'));
        } else {
            $this->ajaxReturn(array('status' => false, 'msg' => '删除失败!'));
        }
    }
}