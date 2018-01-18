<?php
/**
 * 门店列表控制器 IndexController.class.php
 * Author: 杨旭亚
 * Date: 2018年1月5日
*/
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	//门店列表展示
    public function index(){
    	$user = M('shop');
    	$where['zhuangt'] =  1;//是否上架 1--上架 2 --否
    	$res = $user->where($where)->field("id,mingch,maney,logo,juan")->select();
        $data = array();
        $data['data'] = $res;
        $data['code'] = 200;
        $data['msg'] = "";

        $this->ajaxReturn($data);
    }
    // 单条门店展示
    public function dantiaoshop(){
       $data = array();//返回数组
        // 获取门店id
        $shopid = I('post.shopid');
        $shopid = 1;
        //判断门店id是否存在
        if (empty($shopid)) {
            $data['data'] = "";
            $data['code'] = 300;
            $data['msg'] = "门店id有误";
            $this->ajaxReturn($data);
        }
        // 获取门店信息
        $user = M('shop');
        $where['id'] = $shopid;//对应门店id
        // $where['zhuangt'] = 1;//菜品状态
        $resfood = $user->where($where)
                ->field('id,mingch,maney,logo,juan,xingsl')
                ->select();
                // dump($resfood);die;
                // id 门店id
                // mingch 门店名称
                // maney 人均消费
                // logo 门店照片
                // juan 是否有优惠卷
                // xingsl 星图表数量
            // 拼接数组
            $data['data'] = $resfood;
            $data['code'] = 200;
            $data['msg'] = "对接成功";
            $this->ajaxReturn($data);
    }
    // 城市级联 - - 市 列表
    public function csjlshi(){
        $user = M('city');
        $res = $user->order('paix desc')->select();
        // id 市 的 id
        // code 对应县的id
        // name 市的名称
        // provincecode 对应县的id
        // paix 排序
        // dump($res);
          // 拼接数组
            $data['data'] = $res;
            $data['code'] = 200;
            $data['msg'] = "对接成功";
            $this->ajaxReturn($data);
    }
    // 菜品类别接口
    public function foodtype(){
        $data = array();//返回数组
        // 获取门店id
        $shopid = I('post.shopid');
        $shopid = 1;
        //判断门店id是否存在
        if (empty($shopid)) {
            $data['data'] = "";
            $data['code'] = 300;
            $data['msg'] = "门店id有误";
            $this->ajaxReturn($data);
        }
        // 获取菜品类别
        $user = M('food_type');
        $where['dep_shop'] = $shopid;//对应门店id
        $where['zhuangt'] = 1;//菜品状态
        $resfood = $user->where($where)
                ->order('paix asc')
                ->field('id,mingch,paix,zhushi')
                ->select();
                // dump($resfood);die;
            // 拼接数组
            $data['data'] = $resfood;
            $data['code'] = 200;
            $data['msg'] = "对接成功";
            $this->ajaxReturn($data);
    }
    // 菜品接口
    public function food(){
        // 获取门店id
        $shopid = I('post.shopid');
        $shopid = 1;
         //判断门店id是否存在
        if (empty($shopid)) {
            $data['data'] = "";
            $data['code'] = 300;
            $data['msg'] = "门店id有误";
            $this->ajaxReturn($data);
        }
        // 获取菜品
        $user = M('food');
        $where['food.dep_shop'] = $shopid;//对应门店id
        $where['food.zhuangt'] = 1;//菜品状态
        $resfood = $user->where($where)
                    ->join('food_type ON food_type.id = food.food_type')
                    ->join('cpdanwei ON cpdanwei.id = food.dwid')
                    ->field('food.id,food.mingch as cpmingch,food.food_type,food_type.mingch,food.kwid as kouwei,food.logo,food.jiage as yuanjia,food.jiage_youhui as shoujia,cpdanwei.mingch as danweimc,food.dwid')->select();
                    // dump($resfood);die;
        //拼接接口
        $data = array();
        $data['data'] = $resfood;
        $data['code'] = 200;
        $data['msg'] = "对接成功";
        // dump($data);die;
        $this->ajaxReturn($data);
    }
}