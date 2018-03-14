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
        // dump(session("shopid"));
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
    //ajax 查询附近商家
    public function ajaxfjsj(){
        $x = I("post.x");
        $y = I("post.y");
        $url = "http://api.map.baidu.com/geocoder/v2/?location=$y,$x&output=json&pois=1&ak=T9Upu0sWr9Grt4EknLsa9DbU9emQlRYj";
        $res = file_get_contents($url);

        $res = json_decode($res);
        $this->ajaxReturn($res);
    }
    //基本信息
    public function jibenxx(){
    	$shopid = I("get.shopid");
    	$this->assign("shopid",$shopid);//门店id
    	// 时间表
    	$datatime = M('time_business');
    	$restime = $datatime->select();
    	// 门店类型
    	$datatime = M('shop_type');
    	$resfoodtype = $datatime->select();
    	//门店信息
    	$user = M('shop');
    	$where['id'] = $shopid;
    	$res = $user->where($where)->select();
    	// dump($res);die;
    	$this->assign("res",$res);//门店信息

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
    	$user = M('shop');
    	$where['id'] = $shopid;
    	$res = $user->where($where)->select();
    	$this->assign("res",$res);//单条门店信息
    	$this->assign("shopid",$shopid);//门店id
    	// echo 123;
    	$this->display();
    }
    //认证资质
    public function renzhengzizhi(){
    	$shopid = I("get.shopid");
    	$user = M('shop');
    	$where['id'] = $shopid;
    	$res = $user->where($where)->select();
    	$this->assign("res",$res);//门店信息
    	$this->assign("shopid",$shopid);//门店id
    	$this->display();
    }
    //提交高级信息
    public function addgaojixx(){
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
            //营业执照照片
            if ($info['ren_yingyelogo']['savename']) {
                $data['ren_yingyelogo'] = '/img/'.$info['ren_yingyelogo']['savepath'].$info['ren_yingyelogo']['savename'];
            }
            //许可证照片
            if ($info['ren_cyxukelogo']['savename']) {
                $data['ren_cyxukelogo'] = '/img/'.$info['ren_cyxukelogo']['savepath'].$info['ren_cyxukelogo']['savename'];
            }
            // 身份证照片
            if ($info['faren_sfzzheng']['savename']) {
                $data['faren_sfzzheng'] = '/img/'.$info['faren_sfzzheng']['savepath'].$info['faren_sfzzheng']['savename'];
            }
            // dump($data);
            // dump($info);die;
            $where['id'] = $shopid;
            $res = $user->where($where)->data($data)->save();
            if ($res) {
            	$this->redirect('Merch/Index/index',array('shopid'=>$shopid));//重定向
            }else{
            	$this->redirect('Merch/Shopset/renzhengzizhi',array('shopid'=>$shopid));
            }
    }
}