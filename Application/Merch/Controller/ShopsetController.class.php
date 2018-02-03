<?php
/**
 * 商家后台移动版
 * 门店设置控制器 IndexController.class.php
 * Author: 杨旭亚
 * Date: 2018年1月5日
*/
namespace Merch\Controller;
use Think\Controller;
class ShopsetController extends Controller {
	//设置首页
    public function index(){
    	$shopid = I("get.shopid");
    	$user = M('shop');
    	$where['id'] = $shopid;
    	$res = $user->where($where)->select();
    	// dump($res);die;
    	$this->assign("shopid",$shopid);//门店id
    	$this->assign("res",$res);//单条菜品信息
    	// dump($shopid);
        $this->display();
    }
    //基本信息
    public function jibenxx(){
    	$shopid = I("get.shopid");
    	$this->assign("shopid",$shopid);//门店id
    	// 时间表
    	$datatime = M('time_business');
    	$restime = $datatime->select();
    	// 菜品类型
    	$datatime = M('shop_type');
    	$resfoodtype = $datatime->select();
    	// dump($restime);die;
    	$this->assign("restime",$restime);//时间列表
    	$this->assign("resfoodtype",$resfoodtype);//菜品类型
    	$this->display();

    }
    //提交基本信息
    public function addjibenxx(){
    	$data = I('post.');//添加数据
    	$shopid = I('post.shopid');//门店id
    	// dump($data);die;
    	$user = M('shop');
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
            $where['id'] = $shopid;
            $res = $user->where($where)->data($data)->save();
            if ($res) {
            	$this->redirect('Merch/Index/index',array('shopid'=>$shopid));//重定向
            }else{
            	$this->redirect('Merch/Shopset/jibenxx',array('shopid'=>$shopid));
            }
    }
    // 高级信息
    public function renzhengxx(){

    	$shopid = I("get.shopid");

    	$this->assign("shopid",$shopid);//门店id
    	// echo 123;
    	$this->display();
    }
    //认证资质
    public function renzhengzizhi(){
    	$shopid = I("get.shopid");
    	
    	$this->assign("shopid",$shopid);//门店id
    	$this->display();
    }
}