<?php
namespace Admin\Controller;

use Admin\Model\SysDmJxModel;
use Common\Controller\BasicController;  
use Think\Controller;
use Think\Page;

class FoodController extends BasicController
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
        $menid = I('get.menid');
        // dump($id);die;
        $user = M('food');
        $where['dep_shop'] = $menid;
        $data = $user->where($where)->select();
        $this->assign('data',$data);//查询菜品信息
        $this->assign('id',$menid);//门店id
        $this->display();
    }
    public function add(){
    	if (IS_POST) {
            $user = M("food"); // 实例化User对象
            $data = I('post.');//添加数据
            // 执行图片上传
            $upload = new \Think\Upload();//实例化上传类
            $upload->maxSize = 3145728;//设置附件上传大小
            $upload->exts = array('jpg','jpeg','gif','png');//设置上传类型
            $upload->rootPath  ='./Public/img/';//附件上传根目录
            $upload->savePath  = '';//设置上传（子）目录
            //上传文件
            $info = $upload->upload();
            if ($info['logo']['savename']) {
                $data['logo'] = '/img/'.$info['logo']['savepath'].$info['logo']['savename'];
            }
            $res = $user->add($data);
			$res == true ? $this->success('添加成功') : $this->error('添加失败');
    		// $this->display();
    	}else{
            //获取菜品类别
            $id = I('get.id');
            // dump($id);die;
            $user = M('food_type');
            $where['dep_type'] = $id;//门店id
            $rescaipinlb = $user->where($where)->select();

            //获取菜品分量
            $userfl = M('cpfenliang');
            $resfl = $userfl ->select();
            //获取菜品口味
            $userfl = M('cpkouwei');
            $reskw = $userfl ->select();

            $this->assign("id",$id);//门店类别
            $this->assign("rescaipinlb",$rescaipinlb);//菜品类别
            $this->assign("resfl",$resfl);//菜品分量
            $this->assign("reskw",$reskw);//菜品分量
            $this->display();
    	}
    	
    }
    //修改菜品
    public function edit(){
        if (IS_POST) {
            $id = I('post.id');
            $User = M("food"); // 实例化User对象
            $where['id'] = $id;
            $data = I('post.');//需要修改的数据
             // 执行图片上传
            $upload = new \Think\Upload();//实例化上传类
            $upload->maxSize = 3145728;//设置附件上传大小
            $upload->exts = array('jpg','jpeg','gif','png');//设置上传类型
            $upload->rootPath  ='./Public/img/';//附件上传根目录
            $upload->savePath  = '';//设置上传（子）目录
            //上传文件
            $info = $upload->upload();
            if ($info['logo']['savename']) {
                $data['logo'] = '/img/'.$info['logo']['savepath'].$info['logo']['savename'];
            }
            // dump($data);die;
            $res = $User->where($where)->data($data)->save();
            // echo $User->getLastSql();die;

            $res == true ? $this->success('修改成功') : $this->error('修改失败');
            // $this->display();
        }else{
            $user = M('food_type');
            $rescaipinlb = $user->select();
            $this->assign("rescaipinlb",$rescaipinlb);//菜品类别
            $jxdm = I('get.id');
            // dump($jxdm);die;
            $user = M('food');
            $where['id'] = $jxdm;
            $data = $user->where($where)->select();//查询单条信息
            // dump($data);die();
            $this->assign('data',$data);
            $this->display();
        }
    }
    //修改菜品份量
    public function editfenliang(){
    	if (IS_POST) {
    		$cpid = I('post.cpid');
    		$User = M("food"); // 实例化User对象
    		$where['id'] = $cpid;
            $data = I('post.');//需要修改的数据
            
			$res = $User->where($where)->data($data)->save();
        	// echo $User->getLastSql();die;

			$res == true ? $this->success('修改成功') : $this->error('修改失败');
    		// $this->display();
    	}else{
            $cpid = I('get.id');//菜品id
            $flid = I('get.flid');//分量id
            $doflid = explode(",",$flid);//, 分隔分量id
            $kwid = I('get.kwid');//口味id
            $dokwid = explode(",",$kwid);//, 分隔口味id
            $user = M('cpfenliang');
            $rescpfl = $user->select();
            $this->assign("rescpfl",$rescpfl);//菜品份量

            $user = M('cpkouwei');
            $rescpkw = $user->select();
            $this->assign("rescpkw",$rescpkw);//菜品口味

            $this->assign('cpid',$cpid);//菜品id
            $this->assign('flid',$doflid);//分量id
    		$this->assign('kwid',$dokwid);//分量id
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