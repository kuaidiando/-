<?php
namespace Admin\Controller;

use Admin\Model\SysDmJxModel;
use Think\Controller;
use Think\Page;

class FoodController extends Controller
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
        // dump($id);die;
        $user = M('food');
        $where['dep_shop'] = $id;
        $data = $user->where($where)->select();
          //城市级联
        $user = M('chengshi');
        $result = $user ->select();
        $this->assign('res',$result);//城市信息
        $this->assign('data',$data);//查询菜品信息
        $this->assign('id',$id);//门店id
        $this->display();
    }
    public function add(){
    	if (IS_POST) {
            //获取机构编码
             $user = M("food"); // 实例化User对象
            $data['name'] = I('post.name');
            $data['price'] = I('post.price');
            $data['price'] = I('post.price');
            $data['food_type'] = I('post.food_type');
            $data['dep'] = I('post.id');
            $data['zhuangt'] = I('post.zhuangt');
            $res = $user->add($data);
			$res == true ? $this->success('添加成功') : $this->error('添加失败');
    		// $this->display();
    	}else{
            $id = I('get.id');
            // dump($id);die;
            $user = M('food_type');
            $rescaipinlb = $user->select();//菜品类别
            $this->assign("id",$id);
            $this->assign("rescaipinlb",$rescaipinlb);
            $this->display();
    	}
    	
    }
    public function edit(){
    	if (IS_POST) {
    		$id = I('post.id');
    		$User = M("food"); // 实例化User对象
    		$where['id'] = $id;
            $data['name'] = I('post.name');
            $data['price'] = I('post.price');
			$data['food_type'] = I('post.food_type');
            $data['zhuangt'] = I('post.zhuangt');
			// dump($data);die;
			$res = $User->where($where)->data($data)->save();
        	// echo $User->getLastSql();die;

			$res == true ? $this->success('修改成功') : $this->error('修改失败');
    		// $this->display();
    	}else{
            $user = M('food_type');
            $rescaipinlb = $user->select();//菜品类别
            $this->assign("rescaipinlb",$rescaipinlb);
    		$jxdm = I('get.id');
    		// dump($jxdm);die;
    		$user = M('food');
    		$where['id'] = $jxdm;
    		$data = $user->where($where)->select();
    		// dump($data);die();
    		$this->assign('data',$data);
    		$this->display();
    	}
    }
    public function delete(){
    	$condition = I('post.id');
    	$where['id'] = $condition;
    	$res = M('food')->where($where)->delete();
    	if ($res) {
            $this->ajaxReturn(array('status' => true, 'msg' => '删除成功!'));
        } else {
            $this->ajaxReturn(array('status' => false, 'msg' => '删除失败!'));
        }
    }
}