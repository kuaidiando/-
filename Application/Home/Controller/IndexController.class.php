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
        //头像
        $user_id = \user_helper::get_user_id();
        $user_photo = uri("user",array('id'=>1,"del_status"=>0),"photo");
        $this->assign('user_photo',$user_photo);

        //门店列表
    	$user = M('shop');
    	$where['shop.zhuangt'] =  1;//是否上架 1--上架 2 --否
    	$res = $user->where($where)
                ->join('shop_type on shop.type_shop = shop_type.id')
                ->field("shop.id,shop.mingch,shop.maney,shop.logo,shop.juan,shop_type.mingch as lbname")->select();
        $this->assign('res',$res);
        // 门店类别
        $usermdlx = M('shop_type');
        $resmdlx = $usermdlx->where(array('zhuangt'=>1))->field('mingch')->select();
        $this->assign("resmdlx",$resmdlx);
        // dump($resrmdlx);die;
        $this->display();
    }
    //轮播图
    public function banner(){
        $event = M('event')->where(array('status'=>1))->getField('pic',true);
        // dump($event);die;
        $this->assign('event',$event);
        $this->display();
    }
    
    // 菜品列表
    public function detail(){
        $shopid = I('get.shopid');//门店id
        // dump($shopid);die;
        // 获取菜品分类
        $userfoodtype = M('food_type');
        $where['dep_type'] = $shopid;//对应门店id
        $resft = $userfoodtype->where($where)->order("paix desc")->select();
        // 区分菜品类别 那个是默认的
        foreach ($resft as $k => $v) {
            //判断是否是第一个
            if ($k == 0) {
                $resft[$k]['typefd'] = 1;
            }else{
                $resft[$k]['typefd'] = 2;
            }
        }
        // dump($resft);die;
        $this->assign("resft",$resft);
        //获取菜品类别最大的id
        $shoptypedaid = $resft[0]['id'];
        // dump($shoptypedaid);die;
        // 获取菜品
        $user = M('food');
        $where['food.dep_shop'] = $shopid;//对应门店id
        $where['food.zhuangt'] = 1;//菜品状态
        $where['food.food_type'] = $shoptypedaid;//最大菜品类别id
        $resfood = $user->where($where)
                    ->join('food_type ON food_type.id = food.food_type')
                    ->join('cpdanwei ON cpdanwei.id = food.dwid')
                    ->field('food.id,food.mingch as cpmingch,food.food_type,food_type.mingch,food.kwid as kouwei,food.logo,food.jiage as yuanjia,food.jiage_youhui as shoujia,cpdanwei.mingch as danweimc,food.dwid')->select();
                    // dump($resfood);die;
        $this->assign("resfood",$resfood);

        
        $this->display();
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
            dump($data);die;
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
        dump($data);die;
        $this->ajaxReturn($data);
    }
}