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
                ->field("shop.id,shop.mingch,shop.maney,shop.logo,shop.xingsl,shop.juan,shop_type.mingch as lbname")->select();
        $this->assign('res',$res);
        // 拼接星星数量
        foreach ($res as $kres => $vres) {
            // dump($vres['xingsl']);
            $xingxingshul = array();
            // 星星数量转数组
            for ($i=0; $i < $vres['xingsl']; $i++) { 
                $xingxingshul[$i] = 1;
            }
            // 将星数组拼接回原来的数组
            $res[$kres]['xingshuliang'] = $xingxingshul;
        }
        // dump($res);die;
        
        // 门店类别
        $usermdlx = M('shop_type');
        $resmdlx = $usermdlx->where(array('zhuangt'=>1))->field('mingch')->select();
        $this->assign("resmdlx",$resmdlx);
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
        $userid = session('userid');//获取用户id
        // dump($userid);die;
        $shopid = I('get.shopid');//门店id
        /**
         * 获取单条信息
         */
        $userspdan = M('shop');
        $wherespdan['id'] = $shopid;
        $resspdan = $userspdan->where($wherespdan)
                ->select();
        // dump($resspdan);die;
        // 判断是否有座位
        $user = M('seat');
        $wherezws['dep_shop'] = $shopid;
        $wherezws['zhuangt'] = 1;
        $zuoweishu = $user->where($wherezws)->count();
        //将座位数量拼接进原数组中
        $resspdan[0]['zuoweishu'] = $zuoweishu;
        $xingxingshul = array();
        // 星星数量转数组
        for ($i=0; $i < $resspdan[0]['xingsl']; $i++) { 
            $xingxingshul[$i] = 1;
        }
        // dump($xingxingshul);die;
        $this->assign("xingxingshul",$xingxingshul);//星星数量
        $this->assign("resspdan",$resspdan);//单条信息
        /**
         *  获取菜品分类
         * @var [type]
         */
        $userfoodtype = M('food_type');
        $whereft['dep_type'] = $shopid;//对应门店id
        $resft = $userfoodtype->where($whereft)->order("paix desc")->select();
        // 区分菜品类别 那个是默认的
        foreach ($resft as $k => $v) {
            //判断是否是第一个
            if ($k == 0) {
                $resft[$k]['typefd'] = 1;
            }else{
                $resft[$k]['typefd'] = 2;
            }
        }
        // dump($resft);
        $this->assign("resft",$resft);
        /**
         * 获取菜品优化
         */


        // $user = M('food');
        // // $wherefd['food.dep_shop'] = 1;//对应门店id
        // $wherefd['food.zhuangt'] = 1;//菜品状态
        // // $wherefd['linshijj.userid'] = 1;//临时表用户id
        // $resfood = $user->where($wherefd)
        //             ->join('left join food_type ON food_type.id = food.food_type')
        //             ->join('left join cpdanwei ON cpdanwei.id = food.dwid')
        //             ->join("left join linshijj ON food.id = linshijj.foodid")
        //             ->field('food.id,food.mingch as cpmingch,food.food_type,food_type.mingch,food.kwid as kouwei,food.logo,food.jiage as yuanjia,food.jiage_youhui as shoujia,cpdanwei.mingch as danweimc,food.dwid,linshijj.foodnum')
        //             ->order('food.id desc')
        //             ->select();
        //             echo $user->getLastsql();
        //             dump($resfood);die;
                    //sql 语句运行
                    $user = M();
        $sqlcp = "SELECT food.id,food.mingch as cpmingch,food.food_type,food_type.mingch,food.kwid as kouwei,food.logo,food.jiage as yuanjia,food.jiage_youhui as shoujia,cpdanwei.mingch as danweimc,food.dwid,linshijj.foodnum FROM `food` left join food_type ON food_type.id = food.food_type left join cpdanwei ON cpdanwei.id = food.dwid left join linshijj ON (food.id = linshijj.foodid AND linshijj.userid = ".$userid.") WHERE food.dep_shop = ".$shopid." AND food.zhuangt = '1' ORDER BY food.id asc" ;
                    $resfood = $user ->query($sqlcp);
                    // echo $user->getLastsql();
        // dump($resfood);die;
        /**
         * 拼接总分数总价格
         */
        $zfsjg = array();
        $zfshu = 0;
        $zjiage = 0;
        foreach ($resfood as $kzf => $vzf) {
            // 判断 foodnum 是否为空
            if(!$vzf['foodnum'] == null){
                // 获取总份数
                $zfshu = $vzf['foodnum']+$zfshu;
                // 整理总价格
                $zjiage = $vzf['foodnum']*$vzf['shoujia']+$zjiage;//单个菜品总价格
                // dump($zjiage);
            }
        }
        $zfsjg['zfshu'] = $zfshu;
        $zfsjg['zjiage'] = $zjiage;

        $this->assign("zfsjg",$zfsjg);//总分数总价格
        /**
         * 拼接菜品数组
         */
        $zuizhongfood = array();
        //遍历菜品类别
        foreach ($resft as $kft => $vft) {
            foreach ($resfood as $kfd => $vfd) {
                // 判断resfood菜品类型id  是否  等于resft菜品类型id
                // 将菜品详情拼接到菜品类别里
                if($vft['id'] == $vfd['food_type']){
                    $vft['foodxq'][]= $vfd;
                }
            }
            //将菜品类别拼接到新数组中
            $zuizhongfood[] = $vft;
            // dump($vft);echo 123;
        }
        // dump($zuizhongfood);die;
        $this->assign("zuizhongfood",$zuizhongfood);//菜品详情

        
        $this->display();
    }
    //ajax add 菜品份数
    public function ajaxaddlinshijj(){
        $userid = session('userid');//获取用户id
        //获取数据
        $shopid = I('post.shopid');//，门店id
        $foodtypeid = I('post.foodtypeid');// 菜品类型id
        $foodid = I('post.caipinid');// 菜品id
        $foodnum = I('post.caipinfenshu');// 菜品份数
        $user = M('linshijj');
        // 判断份数是否是 第一份
        if($foodnum == 1){
            //执行添加
            $data['shopid'] = $shopid;
            $data['foodtypeid'] = $foodtypeid;
            $data['foodid'] = $foodid;
            $data['foodnum'] = $foodnum;
            $data['userid'] = $userid;
            $res = $user->add($data);
        }else{
            //执行修改
            $where['shopid'] = $shopid;
            $where['foodtypeid'] = $foodtypeid;
            $where['foodid'] = $foodid;
            $where['userid'] = $userid;
            $data['foodnum'] = $foodnum;
            $res = $user->where($where)->data($data)->save();
        }
        // 判断是否添加成功
        if ($res) {
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(2);
        }
        
    }
    //ajax del 菜品份数
    public function ajaxdellinshijj(){
        $userid = session('userid');//获取用户id
        //获取数据
        $shopid = I('post.shopid');//，门店id
        $foodtypeid = I('post.foodtypeid');// 菜品类型id
        $foodid = I('post.caipinid');// 菜品id
        $foodnum = I('post.caipinfenshu');// 菜品份数
        $user = M('linshijj');
        // 判断份数是否是 第一份
        if($foodnum == 0){
            // $this->ajaxReturn(123);
            //执行删除
            $where['shopid'] = $shopid;
            $where['foodtypeid'] = $foodtypeid;
            $where['foodid'] = $foodid;
            $where['userid'] = $userid ;
            $res = $user->where($where)->delete(); 
        }else{
            // $this->ajaxReturn(456);
            //执行修改
            $where['shopid'] = $shopid;
            $where['foodtypeid'] = $foodtypeid;
            $where['foodid'] = $foodid;
            $where['userid'] = $userid;
            $data['foodnum'] = $foodnum;
            $res = $user->where($where)->data($data)->save();
        }
        // 判断是否添加成功
        if ($res) {
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(2);
        }
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