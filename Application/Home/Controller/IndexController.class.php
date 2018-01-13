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
    	$res = $user->where($where)->field("mingch,maney,logo,juan")->select();
        $data = array();
        $data['data'] = $res;
        $data['code'] = 200;
        $data['msg'] = "";
    	$jsondata = json_encode($data);//转换为json数据
    	dump($jsondata);
    	echo "<br>";
    	dump(json_decode($jsondata));die;
    	$this->assign('data',$data);
        $this->display();
    }
}