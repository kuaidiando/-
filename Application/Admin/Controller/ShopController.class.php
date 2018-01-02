<?php
namespace Admin\Controller;

use Admin\Model\SysDmJxModel;
use Think\Controller;
use Think\Page;

class ShopController extends Controller
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
            $result = $user ->select();
        }else{
            $user = M('shop');
            $where['depchengshi'] = $id;
            $result = $user->where($where)->select();
        }
        $this->assign('resshop',$result);
        $this->display();
    }
    public function add(){
    	if (IS_POST) {
            //获取机构编码
            $user = M("ceshi_fu"); // 实例化User对象
            $data['name'] = I('post.name');
            $data['code'] = I('post.code');
            $data['sub'] = I('post.sub');
            $data['photo'] = I('post.photo');
            $data['tel'] = I('post.tel');
            $data['maney'] = I('post.maney');
            $data['time'] = I('post.time');
            $data['time_zhong'] = I('post.time_zhong');
            $data['department'] = I('post.department');
            $data['type'] = I('post.type');
            $data['jutidz'] = I('post.jutidz');
            $data['zhuangt'] = I('post.zhuangt');

             // 图片上传
             $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/img/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录

            // 上传文件
            $info   =   $upload->upload();
            $aa = '/img/'.$info['photo']['savepath'].$info['photo']['savename'];
            $data['photo'] = $aa;
            // dump($data);die;
            $res = $user->add($data);
			$res == true ? $this->success('添加成功') : $this->error('添加失败');
    		// $this->display();
    	}else{
            $user = M('ceshi');
            $reschengs = $user->select();//城市信息
            $user = M('shop_type');
            $rescaipinlb = $user->select();//菜品类别
            $this->assign("reschengs",$reschengs);
            $this->assign("rescaipinlb",$rescaipinlb);
            $this->display();
    	}
    	
    }
    public function edit(){
    	if (IS_POST) {
    		$id = I('post.id');
    		$User = M("ceshi_fu"); // 实例化User对象
    		$where['id'] = $id;
			$data['name'] = I('post.name');
            $data['code'] = I('post.code');
            $data['sub'] = I('post.sub');
            $data['photo'] = I('post.photo');
            $data['maney'] = I('post.maney');
            $data['time'] = I('post.time');
            $data['time_zhong'] = I('post.time_zhong');
            $data['department'] = I('post.department');
            $data['type'] = I('post.type');
            $data['jutidz'] = I('post.jutidz');
            $data['zhuangt'] = I('post.zhuangt');
			// dump($data);die;
			$res = $User->where($where)->data($data)->save();
        	// echo $User->getLastSql();die;

			$res == true ? $this->success('修改成功') : $this->error('修改失败');
    		// $this->display();
    	}else{
            $user = M('ceshi');
            $reschengs = $user->select();//城市信息
            $user = M('shop_type');
            $rescaipinlb = $user->select();//菜品类别
            $this->assign("reschengs",$reschengs);
            $this->assign("rescaipinlb",$rescaipinlb);
    		$jxdm = I('get.id');
    		// dump($jxdm);die;
    		$user = M('ceshi_fu');
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
    	$res = M('ceshi_fu')->where($where)->delete();
    	if ($res) {
            $this->ajaxReturn(array('status' => true, 'msg' => '删除成功!'));
        } else {
            $this->ajaxReturn(array('status' => false, 'msg' => '删除失败!'));
        }
    }
}