<?php
/**
 * 商家后台移动版
 * 员工管理控制器 StaffController.class.php
 * Author: 杨旭亚
 * Date: 2018年2月26日
*/
namespace Merch\Controller;
use Think\Controller;
class StaffController extends Controller {
	//设置首页
    public function index(){
        $shopid = session("shopid");
        $user = M('Staff');
        $where['shopid'] = $shopid;
        $zongnum = $user->where($where)->count();
        $res = $user->where($where)->select();
        $this->assign("res",$res);
        $this->assign("num",$zongnum);
        // dump($res);die;
        $this->display();
    }
    //员工主页
    public function yuangongindex(){
        echo "员工页面";
    }
    //增加员工
    public function addyuangong(){
        $this->display();
    }
    //增加前厅员工
    public function addqianting(){
        
        $this->display();
    }
    //增加后厨员工
    public function addhoutai(){
        $user = M('food_type');
        $shopid = session("shopid");
        $where['dep_type'] = $shopid;
        $res = $user->where($where)->select();
        // dump($res);die;
        $this->assign("res",$res);
        $this->display();
    }
    //员工详情
    public function ygxiangqing(){
        $staffid = I("get.staffid");
        $user = M('staff');
        $where['id'] = $staffid;
        $res = $user->where($where)->select();
        // dump($staffid);
        $this->assign("res",$res);
        $this->display();
    }

    //ajax 执行添加员工
    public function ajaxaddqianting(){
        $shopid = session("shopid");
        //获取随机数
        $suijishu = yang_randomkeys(6);
        //判断随机数是否重复
        $quchongrand = diguirand($suijishu);
        $user = M('Staff');
        $data['name'] = I('post.name');
        $data['shopid'] = $shopid;
        $data['tel'] = I('post.tel');
        $data['password'] = md5(I('post.submit'));
        $data['weixinhao'] = I('post.weixinhao');
        $data['code'] = $quchongrand;
        $data['typeting'] = I('post.typeting');
        $data['typehou'] = I('post.typehou');
        $res = $user->add($data);
        if ($res) {
            $datafanhui = array(
                    'data' => true,
                    'code' => 200,
                    'msg'  => $quchongrand,
            );
        }else{
            $datafanhui = array(
                    'data' => false,
                    'code' => 208,
                    'msg'  => '添加失败',
            );
        }

        $this->ajaxReturn($datafanhui);
    }
    //del
    public function delstaff(){
        $staffid = I("post.staffid");
        $where['id'] = $staffid;
        $res = M('staff')->where($where)->delete();
        if ($res) {
            $data = array(
                'data' => true,
                'code' => 200,
                'msg' => "删除成功"
                );
        }else{
            $data = array(
                'data' => false,
                'code' => 201,
                'msg' => "删除失败"
                );
        }
        $this->ajaxReturn($data);
    }
}