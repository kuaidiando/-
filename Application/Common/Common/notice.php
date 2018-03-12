<?php
	/**
 * 公共函数
 */
	/**
	 * **获取随机数函数
	 * @param  integer $length 随机数字 位数
	
	 */
	
	function yang_randomkeys($length)
	{
		// $aa = rand(0,9);
		// return $aa;
		$output='';
		for ($a = 0; $a < $length; $a++) {
		$output .= mt_rand(0, 9); //生成php随机数
		}
		return $output;
	}
	/**
	 * 递归查询数字是否存在
	 * @param  [type] $rand [description]
	 * @return [type]       [description]
	 */
	function diguirand($rand){
		$user = M('Staff');
		$where['code'] = $rand;
		$res = $user->where($where)->find();
		if ($res) {
			$xinrand = yang_randomkeys(6);
			$rand = diguirand($xinrand);
			return $rand;
		}else{
			return $rand;
		}
	}
	/**
	 * 计算两点地理坐标之间的距离
	 * @param Decimal $longitude1 起点经度
	 * @param Decimal $latitude1 起点纬度
	 * @param Decimal $longitude2 终点经度 
	 * @param Decimal $latitude2 终点纬度
	 * @param Int   $unit    单位 1:米 2:公里
	 * @param Int   $decimal  精度 保留小数位数031103626583
	 * @return Decimal
	 */
	function getDistance($longitude1, $latitude1, $longitude2, $latitude2, $unit=2, $decimal=2){
	 
	  $EARTH_RADIUS = 6370.996; // 地球半径系数
	  $PI = 3.1415926;
	 
	  $radLat1 = $latitude1 * $PI / 180.0;
	  $radLat2 = $latitude2 * $PI / 180.0;
	 
	  $radLng1 = $longitude1 * $PI / 180.0;
	  $radLng2 = $longitude2 * $PI /180.0;
	 
	  $a = $radLat1 - $radLat2;
	  $b = $radLng1 - $radLng2;
	 
	  $distance = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1) * cos($radLat2) * pow(sin($b/2),2)));
	  $distance = $distance * $EARTH_RADIUS * 1000;
	 
	  if($unit==2){
	    $distance = $distance / 1000;
	  }
	 
	  return round($distance, $decimal);
	 
	}
	/**
	 * 米数转化
	 * @param  [type] $danwei [description]
	 * @return [type]         [description]
	 */
	function cvrmkm($danwei){
		if ($danwei < 1000) {
			$danwei = $danwei;
			$houdanwei = "m";
		}else{
			$danwei = $danwei/1000;
			$houdanwei = "km";
		}
		return round($danwei,1).$houdanwei;
	}
	/**
	 * $arrUsers => 二维数组
	 * $field => 按字段排序
	 * @param  [type] $array [description]
	 * @return [type]        [description]
	 */
	function erweipaixin($arrUsers,$field){
		// $arrUsers = array(  
		//     array(  
		//             'id'   => 1,  
		//             'name' => '张三',  
		//             'age'  => 25,  
		//     ),  
		//     array(  
		//             'id'   => 2,  
		//             'name' => '李四',  
		//             'age'  => 23,  
		//     ),  
		//     array(  
		//             'id'   => 3,  
		//             'name' => '王五',  
		//             'age'  => 40,  
		//     ),  
		//     array(  
		//             'id'   => 4,  
		//             'name' => '赵六',  
		//             'age'  => 31,  
		//     ),  
		//     array(  
		//             'id'   => 5,  
		//             'name' => '黄七',  
		//             'age'  => 20,  
		//     ),  
		// );   
		  
		  
		$sort = array(  
		        'direction' => 'SORT_ASC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序  
		        'field'     => $field,       //排序字段  
		);  
		$arrSort = array();  
		foreach($arrUsers AS $uniqid => $row){  
		    foreach($row AS $key=>$value){  
		        $arrSort[$key][$uniqid] = $value;  
		    }  
		}  
		if($sort['direction']){  
		    array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arrUsers);  
		}  
		  
		return $arrUsers;
	}
?>