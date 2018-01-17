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
