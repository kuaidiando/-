<?php
namespace Admin\Controller;

use Admin\Model\SysDmJxModel;
use Common\Controller\BasicController;  
use Think\Controller;
use Think\Page;

class FoodtypeController extends BasicController
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
        $id = I('get.menid');
        // dump($id);die;
        $user = M('food_type');
        $where['dep_type'] = $id;
        $data = $user->where($where)->select();
        $this->assign('data',$data);//查询菜品类别信息
        $this->assign('id',$id);//门店代码
        $this->display();
    }
    public function add(){
    	if (IS_POST) {
            //获取机构编码
            $user = M("food_type"); // 实例化User对象
            $data = I('post.');//数据
            $res = $user->add($data);
			$res == true ? $this->success('添加成功') : $this->error('添加失败');
    		// $this->display();
    	}else{
            $id = I('get.id');
            $this->assign('id',$id);//门店id
            $this->display();
    	}
    	
    }
    public function edit(){
    	if (IS_POST) {
    		$id = I('post.id');
    		$User = M("food_type"); // 实例化User对象
    		$where['id'] = $id;
            $data = I('post.');
			// dump($data);die;
			$res = $User->where($where)->data($data)->save();
        	// echo $User->getLastSql();die;

			$res == true ? $this->success('修改成功') : $this->error('修改失败');
    		// $this->display();
    	}else{
    		$user = M('food_type');
    		$where['id'] = I('get.id');
    		$data = $user->where($where)->select();
    		// dump($data);die();
    		$this->assign('data',$data);
    		$this->display();
    	}
    }
    public function delete(){
    	$condition = I('post.id');
    	$where['id'] = $condition;
    	$res = M('Food_type')->where($where)->delete();
    	if ($res) {
            $this->ajaxReturn(array('status' => true, 'msg' => '删除成功!'));
        } else {
            $this->ajaxReturn(array('status' => false, 'msg' => '删除失败!'));
        }
    }
}