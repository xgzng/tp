<?php
namespace app\index\controller;
use think\View;
use think\Controller;
class Guanli extends Controller
{
    public function _initialize()
    {
        //判断有无admin_username这个session，如果没有，跳转到登陆界面
        if(!session('admin_username')){
            return $this->error('您没有登陆',url('Login/index'));
        }
    }

    public function input()
    {
        $view = new View();
        return $view->fetch('input');
    }

    public function index()
    {
        $view = new View();
        return $view->fetch('index');
    }
    public function shangpin()
    {
        $view = new View();
        return $view->fetch('shangpin');
    }

    public function jiaoyiguanli()
    {
        $view = new View();
        return $view->fetch('jiaoyiguanli');
    }

    public function leibieguanli()
    {
        $view = new View();
        return $view->fetch('leibieguanli');
    }

    public function dingdanguanli()
    {
        $view = new View();
        return $view->fetch('dingdanguanli');
    }

}