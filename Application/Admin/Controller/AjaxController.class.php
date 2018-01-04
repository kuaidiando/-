<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Page;

class AjaxController extends Controller
{
    public function index()
    {
        $this->ajaxReturn(123);
    }
}