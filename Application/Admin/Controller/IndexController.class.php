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
<<<<<<< HEAD
        $name = I('post.username');
        $submit = I('post.submit');
        $user = M('user');
        // $where['code'] = $name;
        $where = array(
            'tel' => $name,
            'status' => 1
            );
        $sub = $user->where($where)->find();
        // var_dump($sub);
        // exit;
        $_SESSION['user_admin'] = $name;
        if ($sub['password'] == md5($submit)) {
=======
        $name = I('post.name');
        $submit = I('post.submit');
        $user = M('user_admin');
        $where['name'] = $name;
        $sub = $user->where($where)->find();
        if ($sub['submit'] == $submit) {
>>>>>>> b1ebaf69038ab64fc94e99530f0d03629693161e
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
