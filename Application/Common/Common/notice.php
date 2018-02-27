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
?>