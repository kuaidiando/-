<?php
/**
 *   config_helper.php
 * ============================================================================
 * ----------------------------------------------------------------------------
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * $Author: chengwenxue
 * $Date: 2018年1月9 
 * $Id$
*/
class config_helper
{
    /**
     * 获取网站名称
     */
    public static function get_site_name()
    {
        $config = M('config');
        $site_name = $config->where(array('field' => 'site_name'))->getField('value');
        if(!trim($site_name)){
            $site_name = 'GoCMS内容管理系统';
        }
        return $site_name;

    }

    /**
     * 获取网站版权信息
     */
    public static function get_site_copyright()
    {
        $config = M('config');
        $site_copyright = $config->where(array('field' => 'site_copyright'))->getField('value');

        return $site_copyright;

    }

    /**
     * 获取网站logo
     */
    public static function get_site_logo()
    {
        $config = M('config');
        $site_logo = uri('config', array('field' => 'site_logo'), 'value');

        if($site_logo){
            $site_logo = SITE_URL.$site_logo;
        }else{
        	$site_logo = '';
        }

        return $site_logo;

    }

    /**
     * 获取网站主题
     */
    public static function get_site_theme()
    {
        $config = M('config');
        $site_theme = uri('config', array('field' => 'site_theme'), 'value');

        if(!$site_theme){
            $site_theme = 'default';
        }
        return $site_theme;

    }


    public static function get_config_value($field)
    {
        if(!$field){
            return ;
        }
        $config = M('config');
        $config_info = $config->where(array('field' => $field))->find();
        if(!$config_info){
            return ;
        }else{
            return $config_info['value'];
        }

    }

}
?>