<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Attence extends Model
{
	public function queryattence()
	{
		$data = Db::table('attence')->alias('a')->join('student s','a.sno = s.sno','LEFT')->order('time desc')->paginate(8);
		return $data;
	}
}