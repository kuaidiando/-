<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/26
 * Time: 8:58
 */
namespace Admin\Model;

use Think\Model;

class InterfaceAllModel extends Model
{
    protected $tableName = 'interface_all';

    public function getListByPage(Page $page)
    {
        return $this->limit($page->firstRow, $page->listRows)->select();
    }

    public function getCount()
    {
        return $this->count();
    }
	
	public function insertInter(array $data)
	{
		if ( !$this->create($data) ) {
			return $this->getError();
		}
		return $this->add() ? true : false;
	}
	
	public function getInfoById(array $condition)
	{
		return $this->where($condition)->find();
	}
	
	public function updateInter($condition, $data)
	{
		if ( !$this->create($data) ) {
			return $this->getError();
		}
		return $this->where($condition)->save($data) ? true : false;
	}
}