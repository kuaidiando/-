<?php
/**
 * 菜品控制器 seatController.class.php
 * Author: 杨旭亚
 * Date: 2017年12月29日
*/
namespace Admin\Controller;

use Admin\Model\SysDmJxModel;
use Common\Controller\BasicController;  
use Think\Controller;
use Think\Page;

class SeatController extends BasicController
{
    public function index()
    {
        $menid = I('get.menid');
        // dump($id);die;
        $user = M('seat');
        $where['dep_shop'] = $menid;
        $data = $user->where($where)->select();
        $this->assign('data',$data);//查询菜品信息
        $this->assign('id',$menid);//门店id
        $this->display();
    }
    public function add(){
    	if (IS_POST) {
            /**
             *  向菜品表添加数据
             */
            $user = M("seat"); // 实例化User对象
            $data = I('post.');//添加数据
            $res = $user->add($data);
          
			$res == true ? $this->success('添加成功') : $this->error('添加失败');
    	}else{
            //座位类别
            $id = I('get.id');//门店id
            // dump($id);die;
            $user = M('seat_type');
            $rescaipinlb = $user->where($where)->select();
            // dump($rescaipinlb);die;
            $this->assign("id",$id);//门店id
            $this->assign("rescaipinlb",$rescaipinlb);//菜品类别
            $this->display();
    	}
    	
    }
    //修改菜品
    public function edit(){
        if (IS_POST) {
            $cpid = I('post.id');
            $User = M("seat"); // 实例化User对象
            $where['id'] = $cpid;
            $data = I('post.');//需要修改的数据
           
            // dump($data);die;
            $res = $User->where($where)->data($data)->save();
            

            $res == true ? $this->success('修改成功') : $this->error('修改失败');
            // $this->display();
        }else{
            $jxdm = I('get.id');//菜品id
            $user = M('seat_type');
            $rescaipinlb = $user->select();
            $this->assign("rescaipinlb",$rescaipinlb);//菜品类别

          
            $user = M('seat');
            $where['id'] = $jxdm;
            $data = $user->where($where)->select();//查询单条信息
            // dump($data);die();
            $this->assign('data',$data);//查询单条信息
            $this->display();
        }
    }
    //修改菜品份量
    public function editfenliang(){
    	if (IS_POST) {
    		$cpid = I('post.cpid');
            /**
             * 修改菜品表
             */
    		$User = M("seat"); // 实例化User对象
    		$where['id'] = $cpid;
            $data = I('post.');//需要修改的数据
            // dump($data);die;
            foreach ($data['fenliang'] as $k => $v) {
                //拼接 份量id
                $flid = $flid.$v.",";
            }
            //去除最后 的 “，”
            $flid = rtrim($flid,",");
            //将拼接好的份量id 拼接回去
            $data['flid'] = $flid;
             /**
             * 拼接口味
             */
              // 获取口味
            $kwid = "";
            foreach ($data['kouweishuru'] as $k => $v) {
                //拼接 份量id
                $kwid = $kwid.$v.",";
            }
            //去除最后 的 “，”
            $kwid = rtrim($kwid,",");
            $data['kwid'] = $kwid;
			$res = $User->where($where)->data($data)->save();
            /**
             * 删除菜品分量价格表对应 的菜品
             */
            $usercpfljg = M('cpfljiage');
            $wherecpfljg['cpcode'] = $cpid;
            $usercpfljg->where($wherecpfljg)->delete();
            /**
             * 添加对应的分量价格
             */
            foreach ($data['fenliang'] as $k => $v) {
                //拼接 份量id
                    $datafljiage['cpcode'] =$cpid;
                    $datafljiage['flcode'] =$v;
                    $datafljiage['cpfljiage'] =$data['fljiage'][$k];
                    // 执行添加
                    $rescgadd = $usercpfljg->add($datafljiage);
            }
        	// echo $User->getLastSql();die;

			$res == true ? $this->success('修改成功') : $this->error('修改失败');
    		// $this->display();
    	}else{
            $cpid = I('get.id');//菜品id
            /**
             * 分量拼接
             */
            $usercpfljg = M('cpfljiage');//分量对应价格表
            $whereflje['cpcode'] = $cpid;
            $rescpfljg = $usercpfljg->where($whereflje)->select();
            // dump($rescpfljg);die;
            // 判断是否存在
            if($rescpfljg){
                $data1 = array();
                // 遍历份量 及价格
                foreach($rescpfljg as $k=>$v){
                    // dump($v);die;
                    if($v['flcode']==1 && isset($v['flcode'])){
                        $data1['1']['cpfljiage'] = $v['cpfljiage'];
                        $data1['1']['flcode'] = 1;
                        // dump($data);exit;
                    }else{
                        if(!$data1['1']){
                        $data1['1']['cpfljiage'] = 0;
                        $data1['1']['flcode'] = 1;
                        }
                    }
                    if($v['flcode'] == 2 && isset($v['flcode'])){
                        $data1['2']['cpfljiage'] = $v['cpfljiage'];
                        $data1['2']['flcode'] = 2;
                        // dump($v['cpfljiage']);exit;
                        // dump($data1);exit;
                    }else{
                        if(!$data1['2']){
                        $data1['2']['cpfljiage'] = 0;
                        $data1['2']['flcode'] = 2;
                        }
                    }
                    if($v['flcode'] == 3 && isset($v['flcode'])){
                        // dump($v['flcode']);exit;
                        $data1['3']['cpfljiage'] = $v['cpfljiage'];
                        $data1['3']['flcode'] =3;
                    }else{
                        if(!$data1['3']){
                        $data1['3']['cpfljiage'] = 0;
                        $data1['3']['flcode'] = 3;
                        }
                    }
                }
            }else{
                
                    if (!isset($v['flcode'])) {
                        $data1['1']['cpfljiage'] = 0;
                        $data1['1']['flcode'] = 1;
                        $data1['2']['cpfljiage'] = 0;
                        $data1['2']['flcode'] = 2;
                        $data1['3']['cpfljiage'] = 0;
                        $data1['3']['flcode'] = 3;
                    }
            }

            $user = M('seat');
            $where['id'] = $cpid;
            $data = $user->where($where)->select();//查询单条信息
            /*
            * 拼接口味
             */ 
            $dokwid = explode(",",$data[0]['kwid']);//, 分隔口味id
            // dump($dokwid);die;
            // $this->assign("rescpfl",$rescpfl);//菜品份量
            $this->assign('cpid',$cpid);//菜品id
    		$this->assign('kwid',$dokwid);//口味
            $this->assign('data',$data);//查询单条信息
            $this->assign('data1',$data1);//查询份量对应价格
    		$this->display();
    	}
    }
    public function delete(){
    	$condition = I('post.id');
    	$where['id'] = $condition;
    	$res = M('seat')->where($where)->delete();
    	if ($res) {
            $this->ajaxReturn(array('status' => true, 'msg' => '删除成功!'));
        } else {
            $this->ajaxReturn(array('status' => false, 'msg' => '删除失败!'));
        }
    }
}