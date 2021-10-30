<?php

namespace app\index\controller;

use think\Controller;
use think\Session;
use think\Request;
use think\Db;
use think\View;

class Login extends Controller{

    public function index(){
        $view = new View();
        return $view->fetch('index');
        //   return $this->success('注册成功');
    }

    public function login(){

        $xuanze = input('post.shenfen');//接收前台用户名
        if($xuanze==1) {
            if (Request::instance()->isPost()) {
                $admin_username = input('post.user_name');//接收前台用户名
                $admin_password = input('post.user_passwd');//接收前台密码

                if (empty($admin_username) || empty($admin_password)) {

                    $this->error("用户名或者密码不能为空！");
                }
                //从数据库读取数据
                $admin_info = DB::name('think_user')
                    ->where('user_name', $admin_username)
                    ->find();
                if (empty($admin_info)) {
                    $this->error('用户不存在，请重新登陆', url('Login/index'));
                } else {
                    if ($admin_password != $admin_info['user_passwd']) {
                        //var_dump($admin_password);
                        $this->error('密码不正确，请重新登陆', url('Login/index'));
                    } else {
                        Session::set('user_name', $admin_username);
                        $this->success("登录成功！", url('/index/yonghu/index'));
                    }
                }
            } else {//如果不是post，则返回登陆界面
                return view('login');
            }
        }
        else if($xuanze==2) {

            if (Request::instance()->isPost()) {
                $admin_username = input('post.user_name');//接收前台用户名
                $admin_password = input('post.user_passwd');//接收前台密码

                if (empty($admin_username) || empty($admin_password)) {

                    $this->error("用户名或者密码不能为空！");
                }
                //从数据库读取数据
                $admin_info = DB::name('think_admin')
                    ->where('admin_username', $admin_username)
                    ->find();

                if (empty($admin_info)) {
                    $this->error('用户不存在，请重新登陆', url('Login/index'));
                } else {
                    if ($admin_password != $admin_info['admin_passwd']) {

                        var_dump($admin_password);
                        $this->error('密码不正确，请重新登陆', url('Login/index'));
                    } else {
                        Session::set('admin_username', $admin_username);
                        $this->success("登录成功！", url('/index/guanli/index'));
                    }
                }

            } else {//如果不是post，则返回登陆界面
                return view('login');
            }
        }
        else{
            $this->error('必须选择一个身份', url('Login/index'));
        }
    }

    public function logout(){
        session(null);//退出清空session
        return $this->success('退出成功',url('Login/index'));//跳转到登录页面
    }
}