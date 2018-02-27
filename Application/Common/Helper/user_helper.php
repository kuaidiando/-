<?php
use Common\Lib\Auth;
/**
 * 会员模块助手函数 user_helper.php
 * ============================================================================
 * ----------------------------------------------------------------------------
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: chengwenxue
 * Date: 2018-01-09
*/

class user_helper
{
    /**
     * 获取当前登录的用户id
     * @return int
     */


    // public static function get_user_id(){
    //     @$openid = $_SESSION['openId'];
    //     if (!$openid) {
    //         $user_id = 0;
    //     }else{
    //         $redis = $GLOBALS['redisClass'];
    //         $info = $redis->hGet('OpenId&UserInfo',$openid);
    //         if ($info) {
    //             $user_id = json_decode($info,true)['user_id'];
    //         }else{
    //             $user_id = M('weixin_user')->where(array('openid'=>$openid))->getField('user_id');
    //             if ($user_id) {
    //                 $user_mobile = M('user')->where(array('id'=>$user_id))->getField('mobile');
    //                 $user_info = array(
    //                     'user_id' => $user_id,
    //                     'mobile'  => $user_mobile
    //                 );
    //                 $redis->hSet('OpenId&UserInfo',$openid,json_encode($user_info));
    //             }else{
    //                 $user_id = 0;
    //             }
    //         }
    //     }
    //     return $user_id;
    // }
    public static function get_user_id(){
        $user_id = $_SESSION['userid'];
        if($user_id){
            return $user_id;
        }else{
            $user_id = 0;
            return $user_id;
        }
    }

    /**
     * 获取用户昵称
     */
    public static function get_nick_name($user_id = '')
    {
        if ($user_id == '') {
            $user_id = session('user_id');
        }

        $user_info = array();
        $nick_name = '';

        $user_info = uri('user', (int)$user_id);

        $nick_name = $user_info['nick_name'];

        return $nick_name;
    }


    /**
     * 获取用户手机号
     */
    public static function get_user_mobile($user_id = 0)
    {
        if ($user_id == '') {
            $user_id = user_helper::get_user_id();
        }

        $mobile = uri('user', $user_id, 'mobile');
        return $mobile;
    }


    /**
     * 获取当前登录的admin_id
     * @return int
     */
    public static function get_admin_id()
    {
        static $static_get_admin_id = NULL;
        if ($static_get_admin_id === NULL) {
            $static_get_admin_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : 0;
        }
        return $static_get_admin_id;
    }

    /**
     * 获取后台商家手机号
     */
    public static function get_admin_mobile($admin_id = 0)
    {
        if ($admin_id == '') {
            $admin_id = user_helper::get_admin_id();
        }
    
        $mobile = uri('admin', $admin_id, 'user_name');
        return $mobile;
    }
    
    
    /**
     * 获取后台用户的类型（1：管理员 2：商家）add 勾国磊 2015/8/4
     * @return int
     */
    public static function get_admin_type()
    {
        $admin_id = user_helper::get_admin_id();

        $admin_type = uri('admin', $admin_id, 'type');

        return $admin_type;
    }


    /**
     * 取得用户的信息，如果不传$user_id，刚取当前登陆用户
     * @param int $user_id
     * @return array
     */
    public static function get_user_info($user_id = 0)
    {
        if (!$user_id) {
            $user_id = user_helper::get_user_id();
            if (!$user_id) {
                return array();
            }
        }

        return uri('user', $user_id);
    }

    /**
     * 密码加密
     */
    public static function md5_password($password, $hash)
    {
        $md5_password = md5(md5($password).$hash);
        return $md5_password;
    }

    /**
     * 第三方密码加密
     */
    public static function auth_md5_password($id){
        $md5id = md5($id);
        $newstr = substr($md5id, 2, 8);
        return $newstr;
    }



    /**
     * 获取用户所属权限组id
     * @param int|array $user_id 用户id或者id数组
     * @param string $order 排序以及LIMIT限制，默认所有角色id
     * @return array
     */
    public static function get_group_id($user_id)
    {
        if (empty($user_id)) {
            return '';
        }

        if(!uri('user', $user_id)){
        	return '';
        }

        $group_id = uri('auth_group_access', array('user_id' => $user_id), 'group_id');

        return $group_id;
    }

    /**
     * 获取用户所属权限组名称
     * @param int|array $user_id 用户id或者id数组
     * @param string $order 排序以及LIMIT限制，默认所有角色id
     * @return array
     */
    public static function get_group_title($user_id)
    {
        $group_id = self::get_group_id($user_id);

        if($group_id){
        	$group_title = uri('auth_group', $group_id, 'title');
        }else{
            $group_title = '';
        }

        return $group_title;
    }

    /**
     * 获取用户拥有的所有权限
     * @param int|array $user_id 用户id或者id数组
     * @param string $order 排序以及LIMIT限制，默认所有角色id
     * @return array
     */
    public static function get_user_rules($user_id)
    {
        if (empty($user_id)) {
            return array();
        }

        $role_list = array();
        $filter = array('user_id'=>$user_id);

        $group_ids = M('auth_group_access')->where(array('user_id' => $user_id))->getField('group_id',true);

        $group_ids = array_unique($group_ids);

        foreach ($group_ids as $group_id) {
            $rules .= self::get_rules_by_group_id($group_id).'、';
        }

        return rtrim($rules, '、');
    }

    /**
     * 获取某个权限组下的所有权限
     * @param $group_id 权限组id
     * @return string
     */
    public function get_rules_by_group_id($group_id)
    {
        $rules = M('auth_group')->where(array('id' => $group_id))->getField('rules');

        $rule_list = explode(',', $rules);;

        foreach ($rule_list as $rule_id) {
        	$rule_title .= uri('auth_rule', $rule_id, 'title').'、';
        }

        return rtrim($rule_title, '、');

    }

    /**
     * 获取某个权限组下的用户数量
     * @param $group_id 权限组id
     * @return int
     */
    public static function get_user_num_by_group_id($group_id)
    {
        $auth = new Auth();
        $user_num = $auth->getUserNum($group_id);

        return $user_num;

    }


    /**
     * 通过用户id获取对应的openid
     * @param unknown $user_id
     *
     * return string
     */
    public static function get_user_open_id($user_id)
    {
        if (!$user_id) {
            return '';
        }

        $user_info = uri('user', $user_id);
        if (!$user_info) {
            return '';
        }

        return uri('weixin_user', array('user_id'=>$user_id), 'openid');
    }

    /**
     * 获取用户最近购买时间
     * @param $user_id
     *
     * return string
     */
    public static function get_user_last_buy_time($user_id)
    {
        if (!$user_id) {
            return '';
        }

        $user_info = uri('user', $user_id);
        if (!$user_info) {
            return '';
        }

        $filter = array(
            'user_id' => $user_id,
            'status'  => 1
        );

        $last_order = M('order')->where($filter)->order(' `id` DESC ')->find();
        if (!$last_order) {
            return '';
        }

        return $last_order['add_time'];
    }

    /**
     * 获取用户购买次数
     * @param $user_id
     *
     * return num
     */
    public static function get_user_buy_times($user_id)
    {
        if (!$user_id) {
            return 0;
        }

        $user_info = uri('user', $user_id);
        if (!$user_info) {
            return 0;
        }

        $filter = array(
            'user_id' => $user_id,
            'status'  => 1
        );

        return M('order')->where($filter)->count();
    }

    /**
     * 获取用户消费均价
     * @param $user_id
     *
     * return num
     */
    public static function get_user_order_average_price($user_id)
    {
        if (!$user_id) {
            return 0.00;
        }

        $user_info = uri('user', $user_id);
        if (!$user_info) {
            return 0.00;
        }

        $buy_total = self::get_user_buy_times($user_id);
        if (!$buy_total) {
            return 0.00;
        }

        $filter = array(
            'user_id' => $user_id,
            'status'  => 1
        );

        $order_list = get_list('order', $filter);
        $total_price = 0.00;
        foreach ($order_list as $k=>$v) {
            $order_goods_filter = array(
                'order_id'  => $v['id'],
                'status'    => 1
            );

            $order_goods_list = get_list('order_goods', $order_goods_filter);
            foreach ($order_goods_list as $k1=>$v1) {
                $order_goods_price = uri('goods_snapshoot', array('id'=>$v1['goods_snapshoot_id'], 'status'=>1), 'price');

                $total_price += $order_goods_price * $v1['goods_num'];
            }
        }

        return $total_price / $buy_total;
    }

    //检查手机号
    public static function check_mobile($mobile)
    {
        if (!$mobile) {
            $data = array(
                    'data' => false,
                    'code' => 201,
                    'msg'  => '请填写手机号',
            );

            echo json_encode($data);
            return false;
        }

        if (!check_mobile($mobile)) {
            $data = array(
                    'data' => false,
                    'code' => 202,
                    'msg'  => '手机号格式有误',
            );

            echo json_encode($data);
            return false;
        }

        return true;
    }
    
    //通过手机号删除会员
    public static function delete_user($mobile)
    {
        if (!$mobile) {
            return false;
        }
        
        //调用接口
        $data = array(
            'phoneNum' => $mobile,
        );
        //$result = json_decode(go_curl('http://testyunge.ethank.com.cn/ethank-user-server/user/delete.json?v=1.0&param='.aes_encrypt(http_build_query($data)), 'GET'), true);
        $result = json_decode(go_curl('http://testyunge.ethank.com.cn/ethank-user-server/user/delete.json?phoneNum='.$mobile, 'GET'), true);
        //http://testyunge.ethank.com.cn/ethank-user-server/user/delete.json?phoneNum=13212121210

        if ($result['code']) {
            return $result['message'];
        } else {
            //删除本地数据库会员
            $user_id = uri('user', array('mobile' => $mobile), 'id');
            if ($user_id) {
                M('user')->delete($user_id);
                M('weixin_user')->where(array('user_id' => $user_id))->delete();
            } else {
                return '本地数据库不存在该会员';
            }
        }
    
        return true;
    }

    //获取用户积分
    public static function get_user_integral($user_id)
    {
        if (!$user_id) {
            return 0;
        }

        $user_info = uri('user', $user_id);
        if (!$user_info) {
            return 0;
        }

        if (stripos($_SERVER['HTTP_HOST'], '192.168.1.225', 0) > -1 ) {
            return $user_info['integral'];
        }

        if (ONDEV) {
            $member_api = 'http://testmember.ethank.com.cn';
        } else {
            $member_api = 'http://member.ethank.com.cn';
        }

        $info = array(
                'phoneNum' => $user_info['mobile'],
        );

        $info['sign'] = sign($info);
        $result = json_decode(go_curl($member_api.'/ethank-member-manager/memberCardExternalCall/queryMemberById.json', 'GET', $info), true);
        if (!$result || $result['code']) {
            return 0;
        }

        return $result['data']['rewardsNum'];
    }
   
}
?>