<?php
namespace app\index\controller;
use app\index\model\think_user;
use think\Db;
use think\View;
use think\Controller;
class Regist extends Controller{
    public function index(){
        $view = new View();
        return $view->fetch('index');
     //   return $this->success('注册成功');
    }
    //用户注册
    public function regist(){
        //实例化User
        $user = new think_user;
        //接收前端表单提交的数据
        $user->user_name = input('post.UserName');
        $user->user_passwd = input('post.UserPasswd');
        //进行规则验证
        $result = $this->validate(
            [
                'name' => $user->user_name,
                'password' => $user->user_passwd,
            ],
            [
                'name' => 'require|max:10',
                'password' => 'require',
            ]);
        if (true !== $result) {
            $this->error($result);
        }
        //判断是否存在该用户名
        if(Db::table('think_user')->where('user_name',$user->user_name)->find()!=null){
            return $this->success('该用户名已存在，请重新注册');

        }
        //写入数据库
        if ($user->save()) {
            return $this->success('注册成功');
        } else {
            return $this->success('注册失败');
        }
    }
}

