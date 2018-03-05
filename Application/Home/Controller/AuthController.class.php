<?php

namespace Home\Controller;
use Think\Controller;
class AuthController extends Controller {
    //授权
    public function index(){
        $return_url = I('return_url');
    	if(!$return_url){
    	    $return_url = base64_decode($_SESSION['return_url']);
            // dump($return_url);exit;
            unset($_SESSION['return_url']);
    	}	
        if (!$return_url) {
	        $request_data = explode('=', $_SERVER["REQUEST_URI"]);
            $return_url   = isset($request_data[1]) ? $request_data[1] : '';
            // dump($return_url);exit;
        }

        if (!$return_url) {
            $return_url = SITE_URL;
            // dump($return_url);exit;

        }
        $return_url = htmlspecialchars_decode($return_url);
        if (is_weixin()) {

            $return_url = base64_encode($return_url);
            // check_weixin_auth($return_url, 'snsapi_base');

            session('weixin_return_url', $return_url);
            // // dump($return_url);exit;
            // $a = U("Home/weichat/auth", "scope=snsapi_userinfo");
            redirect("home/weichat/auth");
            // redirect($a);
            return false;
        }

        redirect($return_url);
    }


    

  
}
