<?php
/**
 * 商家后台移动版
 * 类别设置控制器 IndexController.class.php
 * Author: 杨旭亚
 * Date: 2018年1月5日
*/
namespace Merch\Controller;
use Think\Controller;
class FoodshophoutaiController extends Controller {
	//设置后台商品类别首页
    public function index(){
    	$shopid = I("shopid");//门店id
        // dump($shopid);die;
        /**
         *  获取菜品分类
         * @var [type]
         */
        $userfoodtype = M('food_type');
        $whereft['dep_type'] = $shopid;//对应门店id
        $resft = $userfoodtype->where($whereft)->select();
        // 区分菜品类别 那个是默认的
        foreach ($resft as $k => $v) {
            //判断是否是第一个
            if ($k == 0) {
                $resft[$k]['typefd'] = 1;
            }else{
                $resft[$k]['typefd'] = 2;
            }
        }
        /**
         * 查找每个分类有几个菜品
         */
        $userfood = M('food');
        foreach ($resft as $k => $v) {
            $shopid = $v['dep_type'];//门店id
            $foodtypeid = $v['id'];//菜品类别id
            $whereco['dep_shop'] = $shopid;
            $whereco['food_type'] = $foodtypeid;
            $con = $userfood->where($whereco)->count();//每个分类有几个菜品
            $resft[$k]['foodcount'] = $con;
        }
        // dump($resft);die;
        // die;
        $this->assign("resft",$resft);//菜品类别
        $this->assign("shopid",$shopid);//门店id
        $this->display();
    }
    //添加分类
    public function addfoodtype(){
        $shopid = I("shopid");//门店id
        // dump($shopid);die;
        $this->assign("shopid",$shopid);
        $this->display();
    }
    //执行添加分类
    public function doaddfoodtype(){
        $shopid = I("dep_type");//门店id
        // dump($shopid);die;
        $data = I('post.');
        $userfoodtype = M('food_type');
        $res = $userfoodtype->add($data);
        if ($res) {
            $this->redirect('Merch/Foodshophoutai/index',array('shopid'=>$shopid));//重定向
        }else{
            $this->redirect('Merch/Foodshophoutai/addfoodtype',array('shopid'=>$shopid));
        }
    }
    //修改菜品分类
    public function editfoodtype(){
        $ftid = I('ftid');
        /**
         * 获取单个菜品类别
         */
        $userft = M('food_type');
        $whereft['id'] = $ftid;
        $resft = $userft->where($whereft)->select();
        // dump($resft);die;
        $this->assign("resft",$resft);
        $this->display();
    }
    //执行修改
    public function doeditfoodtype(){
        $ftid = I('post.ftid');
        $shopid = I('post.shopid');
        $data = I('post.');
        $where['id'] = $ftid;
        $userft = M('food_type');
        $resft = $userft->where($where)->save($data);
        if ($resft) {
            $this->redirect('Merch/Foodshophoutai/index',array('shopid'=>$shopid));//重定向
        }else{
            $this->redirect('Merch/Foodshophoutai/editfoodtype',array('shopid'=>$shopid));
        }
    }
    //执行删除
    public function delfoodtype(){
        $ftid = I('post.ftid');
        $shopid = I('post.shopid');
        $where['id'] = $ftid;
        $userft = M('food_type');
        $resft = $userft->where($where)->delete();
        if ($resft) {
            $this->redirect('Merch/Foodshophoutai/index',array('shopid'=>$shopid));//重定向
        }else{
            $this->redirect('Merch/Foodshophoutai/editfoodtype',array('shopid'=>$shopid));
        }
    }
}