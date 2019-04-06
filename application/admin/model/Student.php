<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Student extends Model
{
	public function getstudents()
	{
		return $this::paginate(6);
	}

	public function addstudent($data)
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

	public function editstudent($data)
	{
		// dump($data);
		// die;
		if (!$data['name']) {
			return 2;
		}
		if ($this->update($data)) {
			return 1;
		}else{
			return 0;
		}	
	}

	public function deletestudent($id)
	{
		if ($this::destroy($id)) {
			return true;
		}else{
			return false;
		}

	}

}