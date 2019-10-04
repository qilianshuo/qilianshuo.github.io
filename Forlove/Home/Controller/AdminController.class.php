<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function _before_admin(){
      if(session('iriguchi')!="hai"){
        $this->error("您还未登录","index");
      }
    }
    public function _before_del(){
      if(session('iriguchi')!="hai"){
        $this->error("您还未登录","index");
      }
    }
    public function _before_ping(){
      if(session('iriguchi')!="hai"){
        $this->error("您还未登录","index");
      }
    }
    public function _before_replydel(){
      if(session('iriguchi')!="hai"){
        $this->error("您还未登录","index");
      }
    }
    public function _before_siteconfig(){
      if(session('iriguchi')!="hai"){
        $this->error("您还未登录","index");
      }
    }
    public function _before_doinfo(){
      if(session('iriguchi')!="hai"){
        $this->error("您还未登录","index");
      }
    }
    public function index(){
      $this->display("iriguchi");
    }
    public function iriguchi(){
      $this->display();
    }
    public function login(){
      $map['sitename']=I('username');
      $map['notic']=I('password');
      $res = M('Info')->where($map)->find();
      if($res!=0){
        session("iriguchi","hai");
        $this->success("登陆成功","admin");
      }else{
        $this->error("登陆失败","index");
      }
    }
    public function admin(){
      $m=M('Message');
      $count=$m->count();
      $page=new \Think\Page($count,20);
      $show=$page->show();
      $list=$m->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
      $this->assign('list',$list);
      $this->assign('data',$show);
      $this->display();
    }
    public function del(){
      $id=I('id');
      $n=M('Reply');
      $m=M('Message');
      $res=$m->where("id=$id")->delete();
      $res2=$n->where("gid=$id")->delete();
      if($res!=0){
        $this->success("删除成功");
      }else{
        $this->error("删除失败");
      }
    }
    public function ping(){
      $id=I('id');
      $n=M('Reply');
      $res=$n->where("gid=$id")->select();
      $this->assign('data',$res);
      $this->assign('id',$id);
      $this->display();
    }
    public function replydel(){
      $id=I('id');
      $n=M('Reply');
      $res=$n->where("id=$id")->delete();
      if($res!=0){
        $this->success("删除成功");
      }else{
        $this->error("删除失败");
      }
    }

    public function siteconfig(){
      $minfo = M('Info');
      $res = $minfo->where('id=0')->find();
      $res2 = $minfo->where('id=1')->find();
      $this->assign('res',$res);
      $this->assign('res2',$res2);
      $this->display();
    }

    public function doinfo(){
      $data['sitename'] = I('sitename');
      $data['noticflag'] = I('noticflag');
      $data2['notic'] = I('notic');
      $data2['about'] = I('about');
      $minfo = M('Info');
      $res = $minfo->where('id=0')->save($data);
      $res2 = $minfo->where('id=1')->save($data2);
      if($res!=0||$res2!=0){
        $this->success('保存成功');
      }else{
        $this->error('保存失败');
      }
    }
}
?>