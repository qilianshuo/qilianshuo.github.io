<?
namespace Home\Widget;
use Think\Controller;

class InfoWidget extends Controller{
	public function test(){
		$this->show('111');
	}
	public function info($paramname){
		$info = M('Info')->where('id=0')->find();
		return $info[$paramname];
	}
}
