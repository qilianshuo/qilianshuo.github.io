<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
      // $m=M('Message');
      $m=D('Message');
      $count=$m->count();
      $page=new \Think\Page($count,10);
      $show=$page->show();
      // $list=$m->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
      // $list=$m->limit($page->firstRow.','.$page->listRows)->join('__REPLY__ ON __REPLY__.gid=__MESSAGE__.id')->select();
      $list = $m->relation(true)->limit($page->firstRow.','.$page->listRows)->order('id desc')->Select();
      // var_dump($list);
      $this->assign('list',$list);
      $this->assign('data',$show);
      $this->display();
    }
    public function zan(){
      $m=M('Message');
      $n=M("Zan");
      $data['ip']=$_SERVER["REMOTE_ADDR"];
      $data['gid']=I("gid");
      $gid=$data['gid'];
      $che=$n->where($data)->count();
      $now=time();
      if($che>1){
        $del = $n->where($data)->delete();
        $che=0;
      }
      if($che==0){
        $che=1;
      }else{
        $che=$n->where($data)->getField('time');
      }
      $cha=$now-$che;
      if($cha>300){
        $data['time']=$now;
        $arr=$m->where("id=$gid")->setInc('zan');
        $arr2=$n->add($data);
      }else{
        $arr=-1;
      }
      $this->ajaxReturn($arr);
    }
    public function reply(){
      $email=session('email');
      if($email==null || $email=""){
        $this->ajaxReturn("-1");
      }else{
        $m=M('Reply');
        $data['email']=session('email');
        $data['nname']=session('nname');
        $data['gid']=I('gid');
        $data['reply']=I('co');
        $data['status']=0;
        $data['ttime']=date("Y-m-d H:i:s");
        $arr=$m->add($data);
        if($arr!=0){
          $this->ajaxReturn("1");
        }else{
          $this->ajaxReturn("-2");
        }
      }
      
    }
    public function reply2(){
      $m=M('Reply');
      $data['email']=I('email');
      $data['nname']=I('nname');
      $data['gid']=I('id');
      $data['reply']=I('reply');
      $data['status']=0;
      $data['ttime']=date("Y-m-d H:i:s");
      session('email',$data['email']);
      session('nname',$data['nname']);
      $arr=$m->add($data);
      if($arr!=0){
        $this->ajaxReturn("1");
      }else{
        $this->ajaxReturn("-1");
      }
    }
    public function ajaxreply(){
      $gid=I('gid');
      $m=M('Reply');
      $res=$m->where("gid=$gid")->order("id desc")->limit(10)->select();
      $this->ajaxReturn($res);
    }
    public function gaobai(){
      $m=M('Message');
      $realname=I('realname');
      $towho=I('towho');
      $content=I('content');
      $ip=$_SERVER["REMOTE_ADDR"];
      $data['ip']=$ip;
      $email=I('email');
      $qq=I('qq');
      if(empty($realname) || empty($towho) || empty($content) || empty($email)){
        $this->ajaxReturn("0");
      }else{
        $c=M('Ghistory');
        $now=time();
        $chong=$c->where($data)->count();
        if($chong!=0){
          $chong=$c->where($data)->getField('ttime');
        }
        $cha=$now-$chong;
        if($cha>1000){
          $d=M('Ghistory');
          $d->ip=$ip;
          $d->ttime=$now;
          $m->realname=$realname;
          $m->towho=$towho;
          $m->content=$content;
          $m->lastdate=date("Y-m-d H:i:s");
          $m->email=$email;
          $m->ip=$ip;
          $m->avatar=$qq;
          $m->zan=0;
          $res=$m->add();
          $res=$d->add();
          session('email',$email);
          session('nname',$realname);
          session('qq',$qq);
          if($res>0){
            $this->ajaxReturn("1");
          }else{
            $this->ajaxReturn("数据库连接失败，请检查数据库是否可用");
          }
        }else{
          $this->ajaxReturn("-2");
        }
      }
    }
    public function clear(){
      session('email',null);
      session('nname',null);
      session('qq',null);
    }

    public function search(){
      $key=I('sinput');
      $search=M('Message');
      $data['towho'] = array('like',"$key");
      $arr=$search->where($data)->order('id desc')->count();
      if($arr=0){
          $this->ajaxReturn("0");
      }else{
          $this->ajaxReturn("1");
          $this->assign('list',$arr);
          $this->display();
      }
    }
    public function dosearch(){
      $key=$_GET['s'];
      // var_dump($key);
      $search=M('Message');
      $data['towho'] = array('like',"%$key%");
      $arr=$search->where($data)->order('id desc')->select();
      $this->assign('list',$arr);
      $this->display();
    }
    public function about(){
      $res = M('Info')->where('id=1')->getField('about');
      $res = htmlspecialchars_decode($res);
      $this->assign('res',$res);
      $this->display();
    }
    public function nc(){
      $res = M('Info')->where('id=1')->getField('notic');
      $this->ajaxReturn($res);
    }
}
?>