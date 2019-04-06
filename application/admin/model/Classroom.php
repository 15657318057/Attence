<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Classroom extends Model
{
	public function queryrooms()
	{
		return $this::paginate(6);
	}

	public function addclassroom($data)
	{
		if (empty($data) || !is_array($data)) {
			return false;
		}
		if ($this->save($data)) {
			return true;
		}else{
			return false;
		}
		
	}

	public function editclassroom($data)
	{
		if (empty($data['roomname'])) {
			return 2;
		}
		if ($this->update($data)) {
			return 1;
		}else{
			return 0;
		}	
	}


	public function deleteclassroom($id)
	{
		if ($this::destroy($id)) {
			return true;
		}else{
			return false;
		}

	}
}