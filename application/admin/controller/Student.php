<?php
namespace app\admin\controller;
use app\admin\model\Student as StudentModel;
use PHPExcel_IOFactory;
use PHPExcel;

class Student extends Common
{	
	public function studentlist()
	{
		$student = new StudentModel();
        $res = $student->getstudents();
        $this->assign('res',$res);
        return view();
	}

	public function querystudent()
	{
		if (request()->isPost()) {
			$data = input("post.");
			$sno = $data['sno'];
			$res = db('student')->where('sno',$sno)->paginate(6);
		}	
		$this->assign('res',$res);
		return view("studentlist");

	}

	public function addstudent()
	{

		if (request()->isPost()) {
			$student = new StudentModel();
			$res = $student->addstudent(input("post."));
			if ($res) {
				$this->success("添加成功~",url('studentlist'));
			}else{
				$this->error("添加失败！");
			}
			return;
		}

		return view();
	}

	public function editstudent($id)
	{
		
		if (request()->isPost()) {
			$student = new StudentModel();
			$res = $student->editstudent(input("post."));
			if ($res == 2) {
				$this->error("姓名不能为空");
			}
			if ($res) {
				$this->success("修改成功~",url('studentlist'));
			}else{
				$this->error("修改失败！");
			}
			return;
		}
		$students = db('student')->find($id);
		if (empty($students)) {
			$this->error("该学生不存在！请检查~");
		}
		$this->assign("res",$students);
		return view();

	}

	public function deletestudent($id)
	{
		$student = new StudentModel();
		$res = $student->deletestudent($id);
		
		if ($res) {
			$this->success("删除成功~",url('studentlist'));
		}else{
			$this->error("删除失败！");
		}
		return;	

	}

	public function deletemore()
	{
		$data = input("get.data");
		$num = db('student')->delete($data);
		if ($num) {
			$this->success("删除成功！",url('studentlist'));
		}
		return;		
	}

   public function addstudents() 
   {
        $request = \think\Request::instance();
        $file = $request->file('excel');

        $save_path = ROOT_PATH . 'uploads/';
        $info = $file->move($save_path);

        $filename=$save_path . DIRECTORY_SEPARATOR . $info->getSaveName();
	    if(file_exists($filename)) 
	    {
          	 	Vendor('phpexcel.PHPExcel');
				$phpExcel = PHPExcel_IOFactory::load($filename);
				 
				$phpExcel->setActiveSheetIndex(0);
				// 获取行数
				$row = $phpExcel->getActiveSheet()->getHighestRow();

	           $sheet = $phpExcel->getActiveSheet(0);//获得sheet

	           $total = 0;

			 	for($j=2;$j<$row;$j++){
			        //从A列读取数据
			        $data = array();
			        $data['sno'] = $sheet->getCell("A$j")->getValue();
			        $data['name'] = $sheet->getCell("B$j")->getValue();
			        $data['phone'] = $sheet->getCell("C$j")->getValue();
			        $data['class'] = $sheet->getCell("D$j")->getValue();
			        $data['academy'] = $sheet->getCell("E$j")->getValue();
			        $data['mac_address'] = $sheet->getCell("F$j")->getValue();
			        $num = db('student')->insert($data);
			        $total += $num;
			    }
				$this->success("成功导入{$total}条数据！",url('studentlist'));				
		}
   
   }

}
