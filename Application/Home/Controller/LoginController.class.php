<?php
/**
 * 前台登录控制器 LoginController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月3日
*/
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    //后台登录页面
    public function index()
    {
    	$this->display('index');
    }

    //ajax检验用户登录是否正确
    public function check()
    {
        if(!IS_AJAX){
            $data = array(
                    'info' => '非法访问方式'
            );
        }
        $user_name     = I('user_name', '', 'trim');
        $user_password = I('user_password', '', 'trim');

        $user_password = md5($user_password);



        $filter = array(
        	'user_name'     => $user_name,
        	'user_password' => $user_password
        );

        $admin_info = M('user')->where($filter)->find();
        
        if($admin_info){
            // 更新登录ip
            // $info['update_ip'] = get_client_ip();
            //更新登录时间
            // $info['update_time'] = date('Y-m-d H:i:s', time());
            session('user_id',$admin_info['id']);
            session('user_name',$user_name);
            
            if($admin_info['type'] == 0){
                $callback = U('home/index/index');
            }else{
                $callback = U('home/index/index');
            }

            $data = array(
            	'info' => 'ok',
            	'callback' => $callback
            );
        }else{
            $data = array(
                    'info' => '登录失败，请检查登录名和密码是否正确'
            );

        }

        $this->ajaxReturn($data);
    }

}