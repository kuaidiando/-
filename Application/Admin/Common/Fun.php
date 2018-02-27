<?php
//测试公共方法
	function mastersel(){
		$user = M('drug_stock')->select();
		return $user;
	}