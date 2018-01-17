<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    //登录
    public function index()
    {
        $this->display();
    }
    //执行登录
    public function dodenglu(){
        $name = I('post.name');
        $submit = I('post.submit');
        $user = M('user_admin');
        $where['name'] = $name;
        $sub = $user->where($where)->find();
        if ($sub['submit'] == $submit) {
            $this->redirect('Index/zhuye');
        }else{
            $this->assign('id',1);
            $this->display("Index/index");
        }
    }
    //主页
    public function zhuye(){
        $user = M('city');
        $result = $user ->order('paix desc')->select();
        $this->assign('res',$result);//城市信息
        $this->assign('chengshiid',I('get.id'));//城市id
        $this->display();
    }
    //标题2
    public function biaoti2(){
        // $user = M('chengshi');
        // $result = $user ->select();
        // $this->assign('res',$result);
        $this->display();
    }
    public function welcome()
    {
        $this->display();
    }
}
