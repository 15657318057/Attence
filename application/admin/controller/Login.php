<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
use app\admin\model\Login as LoginModel;

class Login extends Controller
{
    public function login()
    {       
        return view();
    }
    public function index()
    {
         if (request()->isPost()) {
            $admin = new LoginModel();
            $num = $admin->login(input("post."));
            if ($num == 1) {
                $this::error("用户不存在，请检查！");
            }
            if($num == 2){
                $this::success("登录成功~",url('user/index'));
            }
            if ($num == 3) {
                $this::error("密码错误！请检查~");
            }
            return;
        }
        return view("login");

    }
}