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
class EventController extends Controller {
   
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
          $post['pic'] = $pic;
          $post['addtime'] = date("y-m-d H:i:s",time());
          dump($post);exit;
           $mod = M("event");
           $res = $mod->data($post)->add();
          //执行添加
           if($res){
              $this->success("添加成功",U("event/index"));
           }else{
              $this->error("添加失败");
          }             
    }

    //图片删除操作
    public function delete(){
      $delete = M('event');

      // $res=$delete->where('status=0 and eid='.I('get.eid'))->delete();
      $res = $delete->where('eid='.I('get.eid'))->find();
      if($res['status']=='0'){
           $this->error('图片正在使用，不允许删除',U('Event/index'));
      }else{
          $delete->where('eid='.I('get.eid'))->delete();
          $this->success('您删除成功',U('Event/index'));
      }
    }

    //图片的编辑
    public function edit(){
      $edit = M('event');
      $res = $edit->where('eid='.I('get.eid'))->find();
      // dump($res);
      // die;
      $this->assign('row',$res);
      $this->display('edit') ;

    } 

    public function update(){
     // $update=M('event');
      $update = M('event');  
      $res = $update->where("status='0'")->count();
     
      if($res >=4 && I('post.status') =='0'){
        $this->error('不允许修改为使用状态，请先撤销部分');

      }
      $update->create();
      $res = $update->where('eid='.I('post.eid'))->save();

      if(!$res){
         $this->error('修改失败',U('Event/edit'));
       
      }else{

         $this->success('修改成功',U('Event/index'));
      }
      $this->display();

    }

}