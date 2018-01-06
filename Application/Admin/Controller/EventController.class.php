<?php
/**
 * 后台轮播图控制器 RegController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: 程文学
 * Date: 2018年1月4日
*/
namespace Admin\Controller;
use Think\Controller;
use Common\Controller\BasicController;
class EventController extends BasicController {
   
    public function _initialize()
    {
        //如果登录就调至后台的模块
        //$user_id = D('user')->get_user_id();
        // $user_id = \user_helper::get_admin_id();
        // $this->checkreg();
    }

    public function __call($action = '', $params = array())
    {
        $this->display('index');
    }


  //轮播图列表

    public function index(){
       $event = M('event');
        $res = $event->select();
        // dump($res);exit;
        $num = $event->count('id');
        // dump($num);exit;
        $this->assign('num',$num);
        $this->assign('event',$res);
        $this->display();
    }
//添加轮播图页面
    public function add(){
        $this->display('add');
    }
        //图片的插入
    public function insert(){
        
      $upload = new \Think\Upload();
      $upload->maxSize = 1400000;//图片的大小
      $upload->exts = array("jpg","jpeg","png","gif");//图片的大小
      $upload->rootPath = "./Public/img/";//上传路径
      // $upload->autoSub = false;
      $upload->savePath  =     ''; // 设置附件上传（子）目录
      $info=$upload->upload();
      if(!$info){
            $this->error($upload->getError());
        }else{
            foreach($info as $file){
               $pic = $file['savepath'].$file['savename'];
            }
              
          }
          $post = I('post.');
          // dump($post);
          // die;
          $post['pic'] = '/img/'.$pic;
          $post['addtime'] = date("y-m-d H:i:s",time());
          // dump($post);exit;
           $mod = M("event");
           $res = $mod->data($post)->add();
          //执行添加
           if($res){
              // echo "<script>layer_close();</script>";
              $this->success("添加成功",U("event/add"));
           }else{
              $this->error("添加失败");
          }             
    }

    //图片删除操作
    public function del(){
      $delete = M('event');
      $res = $delete->where('id='.I('get.id'))->find();

      if (!$res['status']) {
          $delete->where('id='.I('get.id'))->delete();
          $this->ajaxReturn(array('status' => 0, 'msg' => '删除成功!'));
          
        } else {
          $this->ajaxReturn(array('status' => 1, 'msg' => '正在使用不允许删除!'));
        }
   
    }

    //图片的编辑
    public function edit(){
      // echo md5('123456');exit;
      // dump($_GET);exit;
      $edit = M('event');
      $res = $edit->where('id='.I('get.id'))->find();
      // dump($res);
      // die;
      $this->assign('row',$res);
      $this->display('edit') ;

    } 

    public function update(){
     // $update=M('event');
      $update = M('event');  
      $res = $update->where(array('status'=>1))->count();
      // dump($res);exit;
     
      if($res >=3 && I('post.status') =='1'){
          $this->ajaxReturn(array('status' => 0, 'msg' => '不允许修改为使用状态，请先撤销部分'));

        // $this->error('不允许修改为使用状态，请先撤销部分');

      }
      $update->create();
      $post =$_POST;
      // dump($post);exit;
      $res = $update->where('id='.I('post.id'))->save($post);

      if(!$res){
         // $this->error('修改失败',U('Event/edit'));
          $this->ajaxReturn(array('status' => 0, 'msg' => '修改失败!'));

        // $this->ajaxReturn
       
      }else{
          $this->ajaxReturn(array('status' => 1, 'msg' => '修改成功!'));

         // $this->success('修改成功',U('Event/edit'));
      }
      $this->display();

    }

}