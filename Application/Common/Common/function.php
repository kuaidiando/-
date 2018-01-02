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
//后台店铺名称转换
function shopnamedo($code){
    $user = M('ceshi_fu');
    $where['id'] = $code;
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
//后台城市转换
function depchengshi($code)
{
  $user = M('chengshi');
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
    $result = $user->where($where)->field('name')->select();
    // echo $user->getLastsql();
    // dump($result);die;
  return $result[0]['name'];
}