<?php
/**
 * 目录处理类 Dir.class.php
 * ============================================================================
 * 版权所有 (C) 2015-2016 GoCMS内容管理系统
 * 官方网站:   http://www.gouguoyin.cn
 * 联系方式:   QQ:245629560
 * ----------------------------------------------------------------------------
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 勾国印 (phper@gouguoyin.cn)
 * Date: 2015-5-12 下午8:47:59
*/
namespace Common\Lib;
class Dir{
	/**
	 * 计算目录大小
	 * @param string $dir 目录
	 * @return number 字节
	 */
	static public function getDirSize($dir=null){
		if (!is_string($dir)) {
		    return('目录名必须为string类型！');
		}

		$size=0;
		$items=scandir($dir);
		foreach ($items as $item) {
			if (is_file($dir.'/'.$item)) {
				$size=$size+filesize($dir.'/'.$item);
			}elseif (is_dir($dir.'/'.$item)&&'.'!=$item&&'..'!=$item){
				$size=$size+$this->dirSize($dir.'/'.$item);
			}
		}
		return $size;
	}
	/**
	 * 判断文件或目录可读
	 * @param string $dir 目录名
	 * @return bool
	 */
	static function isReadable($dir) {
	if (!is_string($dir)) {
		    return('目录名必须为string类型！');
		}

		if (($frst=file_get_contents($dir))&&is_file($dir)) {
			return true;//是文件，并且可读
		}else {//是目录
			if (is_dir($dir)&&scandir($dir)) {
				return true;//目录可读
			}else {
				return false;
			}
		}
	}

	static function isWriteable($dir) {
	   if (!is_string($dir)) {
		    return('目录名必须为string类型！');
		}

		if (is_file($dir)) {//对文件的判断
			return is_writeable($dir);
		}elseif (is_dir($dir)) {
			//开始写入测试;
			$file='_______'.time().rand().'_______';
			$file=$dir.'/'.$file;
			if (file_put_contents($file, '//')) {
				unlink($file);//删除测试文件
				return true;
			}else {
				return false;
			}
		}else {
			return false;
		};
	}


	/*
	 * 获取指定目录下的子目录
	* @param string $path 指定目录路径
	* @return array
	*/
	static function getSubDir($path)
	{
	    if(!is_dir($path)){
	        return($path."目录不存在");
	    }
	    $handle = opendir($path);
	    while(($file = readdir($handle))!==false){
	        if($file=="."||$file=="..") {continue;}
	        if(is_dir($path."/".$file)){
	            $dir_list[] = iconv('gbk','utf-8',$file);
	        }
	    }
	    closedir($handle);
	    return $dir_list;
	}

	/*
	 * 获取指定目录下的子文件
	* @param string $path 指定目录路径,路径结尾不能含有'/'
	* @return array
	*/
	static function getSubFile($path, $suffix = null)
	{
	    if(!is_dir($path)){
	        return($path."目录不存在");
	    }
	    $handle = opendir($path);
	    while(($file = readdir($handle))!==false){
	        if($file=="."||$file=="..") {continue;}
	        if(is_file($path."/".$file)){
	            $path_info = pathinfo($path."/".$file);
	            if($suffix && $path_info['extension'] == $suffix){
	                $file_list[] = iconv('gbk','utf-8',$file);
	            }
	            if(!$suffix){
	                $file_list[] = $file;
	            }
	        }
	    }
	    closedir($handle);
	    return $file_list;
	}
	
	/*
	 * 删除指定目录下的文件
	 * @param string $path 指定目录路径,路径结尾不能含有'/'
	 * @return array
	 */
    static function delDir($path)
    {}

}