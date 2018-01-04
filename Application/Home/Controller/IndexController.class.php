<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$user = M('shop');
    	$data = $user->select();
    	$this->assign('data',$data);
        $this->display();
    }
}