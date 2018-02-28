<?php
/**
 * 商家后台移动版
 * 菜品设置控制器 IndexController.class.php
 * Author: 杨旭亚
 * Date: 2018年1月5日
*/
namespace Merch\Controller;
use Think\Controller;
class FoodhoutaiController extends Controller {
	//设置首页
    public function index(){
    	$shopid = I("get.shopid");
        // $shopid = 1;
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
        $user = M('food');
        $wherefd['food.dep_shop'] = $shopid;//对应门店id
        // $wherefd['food.zhuangt'] = 1;//菜品状态
        $resfood = $user->where($wherefd)
                    ->join('left join food_type ON food_type.id = food.food_type')
                    ->join('left join cpdanwei ON cpdanwei.id = food.dwid')
                    ->field('food.id,food.zhuangt,food.mingch as cpmingch,food.food_type,food_type.mingch,food.kwid as kouwei,food.logo,food.jiage as yuanjia,food.jiage_youhui as shoujia,cpdanwei.mingch as danweimc,food.dwid')
                    ->order('food.id asc')
                    ->select();
                    // echo $user->getLastsql();
                    // dump($resfood);die;
        // dump($resft);
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
        $this->assign("resft",$resft);//菜品类别
        $this->assign("shopid",$shopid);//门店id
        $this->display();
    }
    //修改菜品
    public function editfood(){
        $shopid = I('get.shopid');//门店id
        $foodid = I('get.foodid');//菜品id
        /**
         * 获取菜品信息
         */
        $userfood = M('food');
        $where['id'] = $foodid;
        $resfood = $userfood->where($where)->select();
        /**
         * 获取菜品类别
         */
        $userfoodtype = M("food_type");
        $whereft['dep_type'] = $shopid;
        $resfoodtype = $userfoodtype->where($whereft)->select();
        /**
         * 获取菜品单位
         */
        $userdanw = M("cpdanwei");
        $resdanw = $userdanw->select();
        // dump($resfood);die;
        $this->assign("resfood",$resfood);//菜品信息
        $this->assign("resfoodtype",$resfoodtype);//菜品类别信息
        $this->assign("resdanw",$resdanw);//单位信息
        $this->display();
    }
    //执行修改
    public function doeditfood(){
        $shopid = I('post.shopid');//门店id
        $cpid = I('post.foodid');//菜品id
        $data = I('post.');//修改信息
        // dump($data);die;
        $user = M('food');
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
            $where['id'] = $cpid;
            $res = $user->where($where)->data($data)->save();
            // echo $user->getLastsql();
            if ($res) {
                // echo 123;die;
                $this->redirect('Merch/Foodhoutai/index',array('shopid'=>$shopid));//重定向
            }else{
                // echo 456;die;
                $this->redirect('Merch/Foodhoutai/editfood',array('shopid'=>$shopid,'foodid'=>$cpid));
            }
    }
    //商品描述
    public function shangpinmiaoshu(){
        $shopid = I('shopid');//门店id
        $foodid = I('foodid');//菜品id
         /**
         * 获取菜品信息
         */
        $userfood = M('food');
        $where['id'] = $foodid;
        $resfood = $userfood->where($where)->select();
        // dump($resfood);die;
        $this->assign("resfood",$resfood);        
        $this->display();
    }
    //执行修改描述
    public function doeditshangpinmiaoshu(){
         $shopid = I('post.shopid');//门店id
        $cpid = I('post.foodid');//菜品id
        $data = I('post.');//修改信息
        // dump($data);die;
        $user = M('food');
        
            $where['id'] = $cpid;
            $res = $user->where($where)->data($data)->save();
            // echo $user->getLastsql();die;
            if ($res) {
                // echo 123;die;
                $this->redirect('Merch/Foodhoutai/editfood',array('shopid'=>$shopid,'foodid'=>$cpid));//重定向
            }else{
                // echo 456;die;
                $this->redirect('Merch/Foodhoutai/shangpinmiaoshu',array('shopid'=>$shopid,'foodid'=>$cpid));
            }
    }
    //添加菜品
    public function addfood(){
        $shopid = I("shopid");
        //获取菜品类型id
        $foodtypeid = I("foodtypeid");
        if ($foodtypeid) {
            // echo 123;
        }else{
            $userft = M('food_type');
            $whereft['dep_type'] = $shopid;
            $resft = $userft->where($whereft)->select();
            $foodtypeid = $resft[0]['id'];
        }
        // dump($foodtypeid);die;
         /**
         * 获取菜品类别
         */
        $userfoodtype = M("food_type");
        $whereft['dep_type'] = $shopid;
        $resfoodtype = $userfoodtype->where($whereft)->select();
        /**
         * 获取菜品单位
         */
        $userdanw = M("cpdanwei");
        $resdanw = $userdanw->select();
        // dump($resfood);die;
        $this->assign("foodtypeid",$foodtypeid);//菜品类别信息
        $this->assign("resfoodtype",$resfoodtype);//菜品类别信息
        $this->assign("resdanw",$resdanw);//单位信息
        $this->assign("shopid",$shopid);//门店id
        $this->display();
    }
    //执行添加菜品
    public function doaddfood(){
        //获取跳转页面参数
        $typeid = I("post.typeid");//1 普通提交 2 保存并继续新建
        $shopid = I('post.dep_shop');//门店id
        // $cpid = I('post.foodid');//菜品id
        $data = I('post.');//修改信息
        // dump($data);die;
        $user = M('food');
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
            // echo $user->getLastsql();
            if ($res) {
                //判断跳转回哪个页面
                if ($typeid == 1) {
                    $this->redirect('Merch/Foodhoutai/index',array('shopid'=>$shopid));//重定向
                }else {
                    $this->redirect('Merch/Foodhoutai/addfood',array('shopid'=>$shopid));//重定向
                }
                // echo 123;die;
               
            }else{
                // echo 456;die;
                $this->redirect('Merch/Foodhoutai/addfood',array('shopid'=>$shopid));
            }
    }
    //执行删除
    public function delfood(){
        $foodid = I("foodid");
        $shopid =  I("shopid");
        $user = M("food");
        $where['id'] = $foodid;
        $res = $user->where($where)->delete();
        if ($res) {
            $this->redirect('Merch/Foodhoutai/index',array('shopid'=>$shopid,'foodid'=>$foodid));//重定向
        }else{
            $this->redirect('Merch/Foodhoutai/editfood',array('shopid'=>$shopid,'foodid'=>$foodid));
        }
    }
    //修改上架状态
    public function edittypeshangjia(){
        $foodid = I("post.foodid");//菜品id
        $typefd = I("post.typeid");//状态
        $user = M("food");
        $where['id'] = $foodid;
        if ($typefd == 1) {
            $data['zhuangt'] = 2;
        }else{
            $data['zhuangt'] =1;
        }
        $res = $user->where($where)->save($data);
        if ($res) {
           $this->ajaxReturn(1);
        }
        
    }
}