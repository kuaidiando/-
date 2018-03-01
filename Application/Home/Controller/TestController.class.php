<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {

    private $app_id;
    private $app_secret;
    private $callback;
    private $user_id;

    // public function _initialize()
    // {
    //     // echo 'http://'.$_SERVER['HTTP_HOST'].__ROOT__;exit;
    //     dump($_SERVER);exit;

    // }

    public function index(){
        dump($_SERVER);exit;
    	
        // echo random_hash(6);exit;
        // echo createNum(14864434696);exit;

    }
        

    
}