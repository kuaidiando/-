<?php
/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $count 要分页的总记录数
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage($count, $pagesize = 10) {
  $p = new Think\Page($count, $pagesize);
  $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
  $p->setConfig('prev', '上一页');
  $p->setConfig('next', '下一页');
  $p->setConfig('last', '末页');
  $p->setConfig('first', '首页');
  $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
  $p->lastSuffix = false;//最后一页不显示为总页数
  return $p;
}
/**
 * 调用存储过程生成删除文件
 * @access public
 * @param mixed $id 治疗指南code
 * @return html
 */
function myProcedure($id)
{
    $mod = M();
    $nid = str_replace('/','_',$id);
    $url = 'g:\php\\'.$nid.'.html';
//    $sql = "{call ReadFile('$id', '$url')}";
    $sql = "SET NOCOUNT ON
        DECLARE @return_value int
        EXEC  @return_value = [dbo].[ReadFile]
        @code = N'$id',
        @filename = N'$url'
        SELECT  'Return Value' = @return_value";
    $mod->query($sql);

    $word = file_get_contents("http://192.168.1.249:1234/$nid.html");
    //$sqlkill = "{call DeleteFile('$url')}";

    $sqlkill = "SET NOCOUNT ON 
        DECLARE @return_value int
        EXEC  @return_value = [dbo].[DeleteFile]
                @filename = N'$url'
        SELECT  'Return Value' = @return_value";
    $mod->query($sqlkill);
    return $word;
}
function myProcedure1($id)
{
    $mod = M();
    $nid = str_replace('/','_',$id);
    $url = 'g:\php\\'.$nid.'.html';
//    $sql = "{call ReadFile('$id', '$url')}";
    $sql = "SET NOCOUNT ON
        DECLARE @return_value int
        EXEC  @return_value = [dbo].[ReadFile]
        @code = N'$id',
        @filename = N'$url'
        SELECT  'Return Value' = @return_value";
    $mod->query($sql);

    $word = file_get_contents("http://192.168.1.249:1234/$nid.html");
    //$sqlkill = "{call DeleteFile('$url')}";

    $sqlkill = "SET NOCOUNT ON 
        DECLARE @return_value int
        EXEC  @return_value = [dbo].[DeleteFile]
                @filename = N'$url'
        SELECT  'Return Value' = @return_value";
    $mod->query($sqlkill);
    return $word;
}

function getZhenDuanContent($id, $uid)
{
    $mod = M();
    $name = $id.'_'.$uid;
    $url = 'g:\php\\'.$name.'.html';
    $sql = "SET NOCOUNT ON
        DECLARE @return_value int
        EXEC  @return_value = [dbo].[ReadFile_LCZD]
    @UnitID = N'$uid',
    @id = N'$id',
    @filename = N'$url'
        SELECT  'Return Value' = @return_value";
    $mod->query($sql);
    $word = file_get_contents("http://192.168.1.249:1234/$name.html");
    // echo $word;die();
    // $sqlkill = "SET NOCOUNT ON 
    //     DECLARE @return_value int
    //     EXEC  @return_value = [dbo].[DeleteFile]
    //             @filename = N'$url'
    //     SELECT  'Return Value' = @return_value";
    // $mod->query($sqlkill);

    return $word;
}
//yxy
//后台城市转换 --市
function depchengshi($code)
{
  $user = M('city');
    $where['code'] = $code;
    $result = $user->where($where)->field('name')->select();
    // echo $user->getLastsql();
    // dump($result);die;
  return $result[0]['name'];
}
//后台城市转换 --县
function depjilianxian($code)
{
  $user = M('area');
    $where['code'] = $code;
    $result = $user->where($where)->field('name')->select();
    // echo $user->getLastsql();
    // dump($result);die;
  return $result[0]['name'];
}
//后台店铺类别
function shoptype($code){
    $user = M('shop_type');
    $where['id'] = $code;
    $result = $user->where($where)->field('mingch')->select();
    // echo $user->getLastsql();
    // dump($result);die;
  return $result[0]['mingch'];
}
//后台店铺名称转换
function shopnamedo($code){
    $user = M('shop');
    $where['id'] = $code;
    $result = $user->where($where)->field('mingch')->select();
    // echo $user->getLastsql();
    // dump($result);die;
  return $result[0]['mingch'];
}
//后台菜品类别
function foodtype($code){
    $user = M('food_type');
    $where['id'] = $code;
    $result = $user->where($where)->field('mingch')->select();
    // echo $user->getLastsql();
    // dump($result);die;
    return $result[0]['mingch'];
}
//后台座位类别
function seattype($code){
    $user = M('seat_type');
    $where['id'] = $code;
    $result = $user->where($where)->field('mingch')->select();
    // echo $user->getLastsql();
    // dump($result);die;
    return $result[0]['mingch'];
}
//后台菜品单位
function caipindanwei($code){
    $user = M('cpdanwei');
    $where['id'] = $code;
    $result = $user->where($where)->field('mingch')->select();
    // echo $user->getLastsql();
    // dump($result);die;
    return $result[0]['mingch'];
}
// yxy
// 菜品分量转换 
function fenliangdo($code){
    $user = M('cpfenliang');
    //判断是否为0
    if ($code == 0) {
        $data = "";
    }else{
        $fenl = explode(',',$code);//以 ，分隔成数组
        $where['id'] = $fenl[0];
        $res = $user->where($where)->select();
        $data = "菜量：".$res[0]['mingch']."...";
    }

    return $data;
}
// 菜品分量转化为汉子
function flhanzi($code){
    $user = M('cpfenliang');
    $where['id'] = $code;
    $res = $user->where($where)->select();

    return $res[0]['mingch'];
}
// 菜品口味转换
function kouweido($code){
    // dump($code);
    if (empty($code)) {
        $data = "";
    }else{
        $docode = explode(",",$code);//, 分隔口味
        $data ="口味：".$docode[0]."...";
    }
    return $data;
}
function fooddwzhuanhuan($code){
  $user = M('cpdanwei');
    $where['id'] = $code;
    $res = $user->where($where)->select();

    return $res[0]['mingch'];
}
//优惠卷数量
function youhuishul($code){
    $user = M('sale');
    $where['dep_type'] = $code;
    $result = $user->where($where)->count();
    if (!$result) {
        $result = "";
    }
    return $result;
}
//门店对应座位数目
function zuoweishu($code){
    $user = M('seat');
    $where['dep_shop'] = $code;
    $where['zhuangt'] = 1;
    $result = $user->where($where)->count();
    if($result == 0){
        $result = " ";
    }
    return $result;
}
//cookie 实现购物车
//加入购物车 
function addcart($goods_id,$goods_num){ 
  
$cur_cart_array = unserialize(stripslashes($_COOKIE['shop_cart_info'])); 
  if($cur_cart_array==""){ 
  
   $cart_info[0][] = $goods_id; 
   $cart_info[0][] = $goods_num; 
   
   setcookie("shop_cart_info",serialize($cart_info)); 
   
  }elseif($cur_cart_array<>""){ 
   
   //返回数组键名倒序取最大 
   $ar_keys = array_keys($cur_cart_array); 
   rsort($ar_keys); 
   $max_array_keyid = $ar_keys[0]+1; 
   
   //遍历当前的购物车数组 
   //遍历每个商品信息数组的0值，如果键值为0且货号相同则购物车存在相同货品 
   foreach($cur_cart_array as $goods_current_cart){ 
    foreach($goods_current_cart as $key=>$goods_current_id){ 
     if($key == 0 and $goods_current_id == $goods_id){ 
   echo "存在重复商品";
      exit(); 
     } 
    } 
   } 
   
   $cur_cart_array[$max_array_keyid][] = $goods_id; 
   $cur_cart_array[$max_array_keyid][] = $goods_num; 
   
   setcookie("shop_cart_info",serialize($cur_cart_array)); 
     
  } 
  
  
  
} 
  
//从购物车删除 
function delcart($goods_array_id){ 
  
$cur_goods_array = unserialize(stripslashes($_COOKIE['shop_cart_info'])); 
  
//删除该商品在数组中的位置 
  unset($cur_goods_array[$goods_array_id]); 
  setcookie("shop_cart_info",serialize($cur_goods_array)); 
  
} 
  
  
//修改购物车货品数量 
function update_cart($up_id,$up_num,$goods_ids){ 
  
  //先清空cookie,以便重新设置，传递过来三个数组参数 1数组的标识 2商品数量数组 3商品编号数组 
  //如果不清空cookie则无法处理数量为零的商品 
  setcookie("shop_cart_info",""); 
  foreach($up_id as $song){ 
  
   //先返回数组当前单元；再把指针向下移动一个位置 
   $goods_nums = current($up_num); 
   $goods_id = current($goods_ids); 
   next($up_num); 
   next($goods_ids); 
   
   //当商品数量为空的时候，注销此处的数组值并用continue 2 语句避开下面的操作，继续做foreach循环 
   while($goods_nums == 0){ 
    unset($song); 
    continue 2; 
   } 
   
   $cur_goods_array[$song][0] = $goods_id; 
   $cur_goods_array[$song][1] = $goods_nums; 
   
  } 
  }
  setcookie("shop_cart_info",serialize($cur_goods_array));
/**
 * 统一资源定位
 * @param string $model 数据表名
 * @param array/int 过滤条件,类型为int时必须是主键
 * @param string $field 查询字段，为空时返回数组
 * @return array/string
 */
function uri($model, $filter, $field = null)
{
    if(!$filter){
        return ;
    }
    if($filter && is_numeric($filter)){
        $filter  = array("id" => $filter);
    }else if($filter && is_array($filter)){
        $filter = $filter;
    }else{
        return ;
    }

    if(!$field){
        $info = M($model)->where($filter)->find();
    }else{
        $info = M($model)->where($filter)->getField($field);
    }
    return $info;
}
/**
 * 验证码
 * @param $num
 * @return number
 */
// function sms_code($num=6)
// {
//     if (!$num) {
//         $num = 6;
//     }

//     $s_num = pow(10, $num-1);
//     return mt_rand($s_num+1, $s_num*10-1);
// }


//获取前台提交来的json数据
// function get_json_data()
// {
//     header('Content-Type: application/json; charset=utf-8');
//     return json_decode(file_get_contents("php://input"), true);
// }

/**
 * 加载助手函数
 * @param string $helper_name 助手函数名，如config，为空则加载helper目录下的所有助手函数
 * @return max
 */ 
function load_helper($helper_name = null)
{

    $helper_dir = COMMON_PATH.'Helper/';
    
    if ($helper_name) {
        require_cache($helper_dir.$helper_name.'_helper.php');
    } else {
        $dir = new Common\Lib\Dir;
        $helper_list = $dir->getSubFile($helper_dir);
    
        foreach ($helper_list as $helper_file) {
            if (stripos($helper_file, '_helper.php', 0) > -1) {
                require_cache($helper_dir.$helper_file);
            }
        }
    }
    
    
} 


/**
 * curl 函数
 * @param string $url 请求的地址
 * @param string $type POST/GET/post/get
 * @param array $data 要传输的数据
 * @param string $err_msg 可选的错误信息（引用传递）
 * @param int $timeout 超时时间
 * @param array 证书信息
 * @author 程文学
 */
function go_curl($url, $type, $data = false, &$err_msg = null, $timeout = 20, $cert_info = array())
{
    $type = strtoupper($type);
    if ($type == 'GET' && is_array($data)) {
        $data = http_build_query($data);
    }

    $option = array();

    if ( $type == 'POST' ) {
        $option[CURLOPT_POST] = 1;
    }
    if ($data) {
        if ($type == 'POST') {
            $option[CURLOPT_POSTFIELDS] = $data;
        } elseif ($type == 'GET') {
            $url = strpos($url, '?') !== false ? $url.'&'.$data :  $url.'?'.$data;
        }
    }

    $option[CURLOPT_URL]            = $url;
    $option[CURLOPT_FOLLOWLOCATION] = TRUE;
    $option[CURLOPT_MAXREDIRS]      = 4;
    $option[CURLOPT_RETURNTRANSFER] = TRUE;
    $option[CURLOPT_TIMEOUT]        = $timeout;

    //设置证书信息
    if(!empty($cert_info) && !empty($cert_info['cert_file'])) {
        $option[CURLOPT_SSLCERT]       = $cert_info['cert_file'];
        $option[CURLOPT_SSLCERTPASSWD] = $cert_info['cert_pass'];
        $option[CURLOPT_SSLCERTTYPE]   = $cert_info['cert_type'];
    }

    //设置CA
    if(!empty($cert_info['ca_file'])) {
        // 对认证证书来源的检查，0表示阻止对证书的合法性的检查。1需要设置CURLOPT_CAINFO
        $option[CURLOPT_SSL_VERIFYPEER] = 1;
        $option[CURLOPT_CAINFO] = $cert_info['ca_file'];
    } else {
        // 对认证证书来源的检查，0表示阻止对证书的合法性的检查。1需要设置CURLOPT_CAINFO
        $option[CURLOPT_SSL_VERIFYPEER] = 0;
    }

    $ch = curl_init();
    curl_setopt_array($ch, $option);
    $response = curl_exec($ch);
    $curl_no  = curl_errno($ch);
    $curl_err = curl_error($ch);
    curl_close($ch);

    // error_log
    if($curl_no > 0) {
        if($err_msg !== null) {
            $err_msg = '('.$curl_no.')'.$curl_err;
        }
    }
    return $response;
}