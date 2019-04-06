<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Login extends Model
{
	public function login($data)
	{
		$user = db('user')->where('name',$data['name'])->find();
		if ($user) {
			if ($user['password'] == md5($data['password'])) {
				session('id',$user['id']);
				session('name',$user['name']);
				return 2;
			}else{
				return 3;
			}
		}else{
			return 1;
		}
	}
}