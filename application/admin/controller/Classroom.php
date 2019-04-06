<?php
namespace app\admin\controller;
use app\admin\model\Classroom as ClassroomModel;

class Classroom extends Common
{
	public function classroomlist()
	{
		$classroom = new ClassroomModel();
		$res = $classroom->queryrooms();
		$this::assign('res',$res);
		return view();

	}

	public function queryclassroom()
	{
		if (request()->isPost()) {
			$data = input("post.");
			$roomname = $data['roomname'];
			$res = db('classroom')->where('roomname',$roomname)->paginate(6);
		}	
		$this->assign('res',$res);
		return view("classroomlist");

	}

	public function addclassroom()
	{

		if (request()->isPost()) {
			$classroom = new ClassroomModel();
			$res = $classroom->addclassroom(input("post."));
			if ($res) {
				$this->success("添加成功~",url('classroomlist'));
			}else{
				$this->error("添加失败！");
			}
			return;
		}

		return view();
	}

	public function editclassroom($id)
	{
		if (request()->isPost()) {
			$classroom = new ClassroomModel();
			$res = $classroom->editclassroom(input("post."));
			if ($res == 2) {
				$this->error("教室位置不能为空");
			}
			if ($res) {
				$this->success("修改成功~",url('classroomlist'));
			}else{
				$this->error("修改失败！");
			}
			return;
		}
		$classrooms = db('classroom')->find($id);
		if (!$classrooms) {
			$this->error("该教室不存在！请检查~");
		}
		$this->assign("res",$classrooms);
		return view();

	}

	public function deleteclassroom($id)
	{
		$classroom = new ClassroomModel();
		$res = $classroom->deleteclassroom($id);
		
		if ($res) {
			$this->success("删除成功~",url('classroomlist'));
		}else{
			$this->error("删除失败！");
		}
		return;	

	}

	public function deletemore()
	{
		$data = input("get.data");
		$num = db('classroom')->delete($data);
		if ($num) {
			$this->success("删除成功！",url('classroomlist'));
		}
		return;
	}

}