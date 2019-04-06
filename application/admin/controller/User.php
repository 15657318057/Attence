<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\Login;
use app\admin\model\User as UserModel;

class User extends Common
{ 
    public function index()
    {
        $res = Db::table("student")->field("academy")->Distinct(true)->select();
        $this->assign('res',$res);
        return view();
    }

    public function myaccount()
    {
        $user = new UserModel();
        $data = $user->myaccount();
        $this->assign('res',$data);
        return view();
    }
 
    public function edituser()
    {        
        if (request()->isPost()) {
            $user = new UserModel();
            $res = $user->edituser(input("post."));
            if ($res == 2) {
                $this->error("姓名不能为空");
            }
            if ($res) {
                $this->success("修改成功~",url('myaccount'));
            }else{
                $this->error("修改失败！");
            }
            return;
        }
        return view("myaccount");

    }

    public function layout()
    {
        session(null);
        $this::success("退出成功！",url('login/login'));
    }

    public function academymon()
    {
        $xaxis1 = Db::table("attence")->field("MONTH(time) as mon")->Distinct(true)->select();
        $x1 = array();
        foreach ($xaxis1 as $key => $value) {
            $x1[] = $value['mon'];
        }
        $xaxis2 = Db::table('attence')->alias('a')->join('student s','a.sno = s.sno')->field("academy")->Distinct(true)->select();
        $x2 = array();
        foreach ($xaxis2 as $key => $value) {
            $x2[] = $value['academy'];
        }
        
        $data = array();
        $data[0] = $x1;
        $data[1] = $x2;
        foreach ($x2 as $key => $value) {

            $temp = array();
            $temp = Db::query("SELECT mon,IFNULL(count1,0) as count FROM (SELECT DISTINCT(MONTH(time)) as mon from attence) a LEFT JOIN(SELECT MONTH(time) as mon1,COUNT(*)  as count1 FROM attence LEFT JOIN student on attence.sno = student.sno WHERE academy='{$value}' and is_late = 1 GROUP BY MONTH(time)) t on a.mon=t.mon1");
            
            foreach ($temp as  $value) {

                $data[$key+2][] = $value['count'];
            }
        }
        return json_encode($data);
    }

    public function getclassattence()
    {
        if (request()->isPost()) {
            $academy = input("post.academy");
        }
        $data = Db::query("SELECT class,COUNT(*)  as count FROM attence LEFT JOIN student on attence.sno = student.sno WHERE academy='{$academy}' and is_late = 1 GROUP BY class");
        return json_encode($data);
    }
    
    
}
