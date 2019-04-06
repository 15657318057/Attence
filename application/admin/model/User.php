<?php
namespace app\admin\model;
use think\Model;
use think\Db;
use think\Session;
class User extends Model
{
	public function getusers()
	{
		$data = Db::table('user')->select();
		return $data;
	}

	public function queryuser($id)
	{
		$data = Db::table("user")->where("id",$id)->select();
		return $data;
	}

	public function edituser($data)
	{
		if (empty($data['name'])) {
			return 2;
		}
		$data['password'] = md5($data['password']);
		if ($this->update($data)) {
			return 1;
		}else{
			return 0;
		}	
	}

	public function myaccount()
	{
		$id = Session::get('id');
		$data = db('user')->where('id',$id)->find();
		return $data;
	}

}