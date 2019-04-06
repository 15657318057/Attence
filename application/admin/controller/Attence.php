<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\Attence as AttenceModel;

class Attence extends Common
{
	public function attencelist()
	{
		$attence = new AttenceModel();
		$res = $attence->queryattence();
		$this->assign('res',$res);
        return view();

	}

	public function queryattence()
	{
		if (request()->isPost()) {
			$data = input("post.");
			$sno = $data['sno'];
			session('sno',$sno);
		}	
		$res = Db::table('attence')->alias('a')->where('a.sno',session('sno'))->join('student s','a.sno = s.sno','LEFT')->order('time desc')->paginate(6);
		$this->assign('res',$res);
		return view("attencelist");

	}

	public function deletemore()
	{
		$data = input("get.data");
		$num = db('attence')->delete($data);
		if ($num) {
			$this->success("删除成功！",url('attencelist'));
		}
		return;
	}
	

}