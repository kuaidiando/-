<?php
/**
 * 门店列表控制器 IndexController.class.php
 * Author: 杨旭亚
 * Date: 2018年1月5日
*/
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    // public function __call($action = '', $params = array()){
    //     dump('1645');exit;
    // }
    
    public function _initialize()
    {
        // $_SESSION['openid'] = '';exit;
      // dump($_SESSION['openid']);exit;
        if(is_weixin()){
            if(!$_SESSION['openid']){

                redirect(U('Home/Auth/index'));
            }
        }

    }
	//门店列表展示
    public function index(){
        
        //头像
        $openid = $_SESSION['openid'];
        $photo = M('weixin_user')->where(array('openid'=>$openid))->getField('photo');
        $this->assign('photo',$photo);

        //门店列表
    	$user = M('shop');
    	$where['shop.zhuangt'] =  1;//是否上架 1--上架 2 --否
        $where['shop.depcsjlshi'] = 130100;//石家庄市
    	$res = $user->where($where)
                ->join('shop_type on shop.type_shop = shop_type.id')
                ->field("shop.id,shop.mingch,shop.maney,shop.logo,shop.xingsl,shop.juan,shop_type.mingch as lbname,shop.zuigaolij,shop.depcsjlshi,shop.baidu_lng,shop.baidu_lat")->select();
                // dump($res);die;
        // 拼接星星数量
        
        // // 起点坐标
        $longitude1 = 114.548983;
        $latitude1 = 38.043896;
        foreach ($res as $kres => $vres) {
             /**
             * 转换星星
             * 
             */
            $a = $vres['xingsl'];;//星星评分
            $shixinxing = 0; //实心星星
            $kongxinxing = 0; //空心星星
            $bangexing = 0; // 半个星星
            //判断数字是否是整数
            if (is_int($a)) {
                $shixinxing = $a;//赋值实心星
                $kongxinxing = 5-$a;//赋值空心星
            }else{
                //解决小数点
                $y=explode(".",$a);
                if ($y[1] == 0) {
                    $shixinxing = $a;//赋值实心星
                    $kongxinxing = 5-$a;//赋值空心星
                }else{
                    $zhengshubufen = $y[0];//整数部分
                    $shixinxing = $zhengshubufen;//赋值实心星
                    $bangexing = 1;//赋值半个
                    $kongxinxing = 5-1-$shixinxing;//赋值空心星
                }
                    
            }
             // 将实心星数组拼接回原来的数组
            $res[$kres]['shixinxing'] = $shixinxing;//实心星星
            $res[$kres]['kongxinxing'] = $kongxinxing;//空心星星
            $res[$kres]['bangexing'] = $bangexing;//半个心星星
            /**
             * 拼接座位号
             * @var [type]
             */
            $zuoweishu = $this->zuoweihao($vres['id']);
            $res[$kres]['zuoweishu'] = $zuoweishu;//座位数
            /**
             * 获取距离数
             */
            // 终点坐标
            $longitude2 = $vres['baidu_lng'];
            $latitude2 = $vres['baidu_lat'];
            //获得距离
            $distance = getDistance($longitude1, $latitude1, $longitude2, $latitude2, 1);
            //转化为 km
            $dodistance = cvrmkm($distance);
            //拼会原数组
            $res[$kres]['juli'] = $dodistance;//距离--单位
            // echo $dodistance;
            // echo "<br>";
        }
        // dump($res);die;
        $this->assign('res',$res);//菜品信息
        $event = M('event')->where(array('status'=>1))->getField('pic',true);
        // dump($event);die;
        $this->assign('event',$event);
        // $this->display();
        // 门店类别
        $usermdlx = M('shop_type');
        $resmdlx = $usermdlx->where(array('zhuangt'=>1))->field('mingch')->select();
        $this->assign("resmdlx",$resmdlx);
        $this->display();
    }
    //ajax 获取菜品信息
    public function ajaxfoodjuli(){
         //门店列表
        $user = M('shop');
        $where['shop.zhuangt'] =  1;//是否上架 1--上架 2 --否
        $where['shop.depcsjlshi'] = 130100;//石家庄市
        $res = $user->where($where)
                ->join('shop_type on shop.type_shop = shop_type.id')
                ->field("shop.id,shop.baidu_lng,shop.baidu_lat")->select();
                // dump($res);die;
        // 拼接星星数量
        
        // // 起点坐标
        $longitude1 = I("post.lng");
        $latitude1 = I("post.lat");
        foreach ($res as $kres => $vres) {
            
            /**
             * 获取距离数
             */
            // 终点坐标
            $longitude2 = $vres['baidu_lng'];
            $latitude2 = $vres['baidu_lat'];
            //获得距离
            $distance = getDistance($longitude1, $latitude1, $longitude2, $latitude2, 1);
            //转化为 km
            $dodistance = cvrmkm($distance);
            //拼会原数组
            $res[$kres]['juli'] = $dodistance;//距离--单位
            // echo $dodistance;
            // echo "<br>";
        }
        $this->ajaxReturn($res);
    }
    //获取桌位号
    private function zuoweihao($shopid){
        $where['dep_shop'] = $shopid;
        $reszw = M('seat')->where($where)->count();
        return $reszw;
    }
    //轮播图
    // public function banner(){
    //     $event = M('event')->where(array('status'=>1))->getField('pic',true);
    //     // dump($event);die;
    //     $this->assign('event',$event);
    //     $this->display();
    // }
    
    // 菜品列表
    public function detail(){

        $userid = session('userid');//获取用户id
        // dump($userid);die;
        $shopid = I('get.shopid');//门店id
        // dump($shopid);die;
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
        /**
         * 转换星星
         * 
         */
        $a = $resspdan[0]['xingsl'];//星星评分
        $shixinxing = 0; //实心星星
        $kongxinxing = 0; //空心星星
        $bangexing = 0; // 半个星星
        //判断数字是否是整数
        if (is_int($a)) {
            $shixinxing = $a;//赋值实心星
            $kongxinxing = 5-$a;//赋值空心星
        }else{
            //解决小数点
            $y=explode(".",$a);
            if ($y[1] == 0) {
                $shixinxing = $a;//赋值实心星
                $kongxinxing = 5-$a;//赋值空心星
            }else{
                $zhengshubufen = $y[0];//整数部分
                $shixinxing = $zhengshubufen;//赋值实心星
                $bangexing = 1;//赋值半个
                $kongxinxing = 5-1-$shixinxing;//赋值空心星
            }
                
        }
        // dump($shixinxing);
        // dump($kongxinxing);
        // dump($bangexing);
        // dump($a);die;
        $xingxingshul = array();
        // 实心星星数量转数组
        for ($i=0; $i < $shixinxing; $i++) { 
            $xingxingshul[$i] = 1;
        }
        // dump($xingxingshul);die;
        $this->assign("xingxingshul",$xingxingshul);//实心星星数量
        // 空心星星数量转数组
        $kongxinshuliang = array();
        for ($i=0; $i < $kongxinxing; $i++) { 
            $kongxinshuliang[$i] = 1;
        }
        // dump($xingxingshul);die;
        $this->assign("kongxinshuliang",$kongxinshuliang);//空心星星数量
        $this->assign("bangexing",$bangexing);//半个星星数量
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
         * 获取菜品
         */


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
        // 获取cookie的值
        $food_num = unserialize(stripslashes($_COOKIE['food_num']));
       
        // 遍历菜品
        foreach ($resfood as $kref => $vkref) {
            // 遍历菜品分类
            foreach ($food_num as $kfnum => $vfnum) {
                //判断菜品id 与类型id是否一样
                if ($vkref['id'] == $vfnum['foodid'] && $vkref['food_type'] == $vfnum['foodtypeid']) {
                    
                    $resfood[$kref]['foodnum'] = $vfnum['foodnum'];
                    break;
                }else{
                    
                    $resfood[$kref]['foodnum'] = null;
                }
            }
                
        }
        // dump($food_num);
        // dump($resfood);die;
                    //sql 语句运行18931946118
                    // $user = M();
        // $sqlcp = "SELECT food.id,food.zhuangt,food.mingch as cpmingch,food.food_type,food_type.mingch,food.kwid as kouwei,food.logo,food.jiage as yuanjia,food.jiage_youhui as shoujia,cpdanwei.mingch as danweimc,food.dwid,linshijj.foodnum FROM `food` left join food_type ON food_type.id = food.food_type left join cpdanwei ON cpdanwei.id = food.dwid left join linshijj ON (food.id = linshijj.foodid AND linshijj.userid = 18) WHERE food.dep_shop = ".$shopid." ORDER BY food.id asc" ;
                    // $resfood = $user ->query($sqlcp);
                    // echo $user->getLastsql();
        // dump($resfood);
        // die;
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
    //购物车商品
    public function ajaxgsfood(){
        $user = M("food");
         // 获取cookie的值
        $food_num = unserialize(stripslashes($_COOKIE['food_num']));
        // /**
        //  * 购物车商品
        //  */
        // $gsfood = array();
        // // dump($food_num); 
        // foreach ($food_num as $gsk => $gsv) {
        //     // dump($gsv);die;
        //     $gswhere['id'] = $gsv['foodid'];
        //     // dump($gswhere);die;
        //     $gsres = $user->where($gswhere)->find();
        //     $gsfood[$gsk]['foodid'] = $gsres['shopid'];//菜品id
        //     $gsfood[$gsk]['name'] = $gsres['mingch'];//名称
        //     $gsfood[$gsk]['shou_price'] = $gsres['jiage_youhui'];//售价
        //     $gsfood[$gsk]['num'] = $gsv['foodnum'];//数量
        //     // dump($gsres); die;
        // }
        // dump($gsfood);die;
        // $this->assign("gsfood",$gsfood);//购物车商品
        $this->ajaxReturn($food_num);
    }
    //ajax add 菜品份数
    public function ajaxaddlinshijj(){
        //cookie实现
           // //获取数据
        $shopid = I('post.shopid');//，门店id
        $foodtypeid = I('post.foodtypeid');// 菜品类型id
        $foodid = I('post.caipinid');// 菜品id
        $foodnum = I('post.caipinfenshu');// 菜品份数
        $caipname = I('post.caipname');// 菜品名称
        $caiprice = I('post.caiprice');// 菜品售价
        // addcart($shopid,$foodid,$foodnum);
        $food_num = unserialize(stripslashes($_COOKIE['food_num'])); 
        // dump($food_num);die;
        // 判断是否存在
        if(!empty($food_num)){
            $ar_keys = array_keys($food_num); 
            rsort($ar_keys); 
            $max_array_keyid = $ar_keys[0]+1;  
            // dump($max_array_keyid);die;
            $food_num[$max_array_keyid]['shopid'] = $shopid; // ，门店id
            $food_num[$max_array_keyid]['foodtypeid'] = $foodtypeid;// 菜品类型id 
            $food_num[$max_array_keyid]['foodid'] = $foodid; // 菜品id
            $food_num[$max_array_keyid]['foodnum'] = $foodnum; // 菜品份数
            $food_num[$max_array_keyid]['caipname'] = $caipname; // 菜品名称
            $food_num[$max_array_keyid]['caiprice'] = $caiprice; // 菜品售价
            setcookie("food_num",serialize($food_num),time()+3600,"/"); 
        }else{
            // 添加
            $cart_info[0]['shopid'] = $shopid; // ，门店id
            $cart_info[0]['foodtypeid'] = $foodtypeid; // 菜品类型id
            $cart_info[0]['foodid'] = $foodid; // 菜品id
            $cart_info[0]['foodnum'] = $foodnum; // 菜品份数
            $cart_info[0]['caipname'] = $caipname; // 菜品名称
            $cart_info[0]['caiprice'] = $caiprice; // 菜品名称
            setcookie("food_num",serialize($cart_info),time()+3600,"/"); 
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
        //  // 获取 cookie
        $food_num = unserialize(stripslashes($_COOKIE['food_num'])); 
        foreach($food_num as $kfood=>$vfood){ 
            //判断是否是一份菜品
            if ($vfood['shopid'] == $shopid && $vfood['foodid'] == $foodid && $vfood['foodtypeid'] && $foodtypeid  ) {
                // $food_num[$kfood]['foodnum'] = $foodnum;//修改份数
                 unset($food_num[$kfood]);//删除份数
            }
        } 
        
        setcookie("food_num",serialize($food_num),time()+3600,"/");
    }
     //ajax edit 菜品份数
    public function ajaxeditfoodshuliang(){
        //cookie实现
           // //获取数据
        $shopid = I('post.shopid');//，门店id
        $foodtypeid = I('post.foodtypeid');// 菜品类型id
        $foodid = I('post.caipinid');// 菜品id
        $foodnum = I('post.caipinfenshu');// 菜品份数
        // 获取 cookie
        $food_num = unserialize(stripslashes($_COOKIE['food_num'])); 
        foreach($food_num as $kfood=>$vfood){ 
            //判断是否是一份菜品
            if ($vfood['shopid'] == $shopid && $vfood['foodid'] == $foodid && $vfood['foodtypeid'] && $foodtypeid  ) {
                // $vfood['foodnum'] = $foodnum;//修改份数
                $food_num[$kfood]['foodnum'] = $foodnum;//修改份数
            }
        } 
        
        setcookie("food_num",serialize($food_num),time()+3600,"/"); 
        
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
    //商家状态
    public function ajaxzaixianzhuangt(){
        $shopid = I('post.shopid');
        $zhuangt = uri('shop',array('id'=>$shopid),'line_type');
        $this->ajaxReturn($zhuangt);
    }
}