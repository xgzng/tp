<?php
namespace app\index\controller;
use think\Db;
use think\Request;
use think\Session;
use think\View;
use think\Controller;
class Yonghu extends Controller
{
    public function _initialize()
    {
        //判断有无admin_username这个session，如果没有，跳转到登陆界面
        if(!session('user_name')){
            return $this->error('您没有登陆',url('Login/index'));
        }
    }

    public function input()
    {
        $view = new View();
//        $data = session('user_name');
//        $view->assign('data',$data);
        //return view('index');
        return $view->fetch('input');
    }

    public function womaichude()
    {
        $view = new View();
        $data = session('user_name');
        $view->assign('data',$data);
        //return view('index');
        return $view->fetch('womaichude');
    }


    public function dingdan()
    {
        $view = new View();
        $data = session('user_name');
        $view->assign('data',$data);
        //return view('index');
        return $view->fetch('dingdan');
    }

    public function index()
    {
        $view = new View();
        $data = session('user_name');
        $view->assign('data',$data);
        //return view('index');
        return $view->fetch('index');
    }

    public function wodefabu()
    {
        $view = new View();
        $data = session('user_name');
        $view->assign('data',$data);
        return $view->fetch('wodefabu');
    }

    public function fabu()
    {
        $view = new View();
        $data = session('user_name');
        $view->assign('data',$data);
        return $view->fetch('fabu');
    }

    public function xiugaimima()
    {
        $view = new View();
        $data = session('user_name');
        $view->assign('data',$data);
        return $view->fetch('xiugaimima');
    }

    public function gerenxinxi()
    {
        $view = new View();
        $data = session('user_name');
        $ddd=Db::table('think_user')->where('user_name',$data)->find();
//        Db::table('think_user')->where('user_name',$data)->select();
        $view->assign('sex',$ddd['sex']);
        $view->assign('qq',$ddd['qq']);
        $view->assign('zhuzhi',$ddd['address']);
        $view->assign('data',$data);
        return $view->fetch('gerenxinxi');
    }

    public function gaimima()
    {
        if (Request::instance()->isPost())
        {
            $yuanpwd = input('post.yuanpwd');//接收前台原密码
            $nowpwd = input('post.nowpwd');//接收前台现密码
            $nowqpwd = input('post.nowqpwd');//接收前台确认密码
            $data = session('user_name');

            //从数据库读取数据
            $admin_info = DB::name('think_user')
                ->where('user_name', $data)
                ->find();
            if ($yuanpwd != $admin_info['user_passwd']) {
                $this->error('密码不正确，请稍后再试', url('/index/yonghu/xiugaimima'));
            } else {
                if($nowpwd!=$nowqpwd)
                {
                    $this->error('两次密码不一致，请稍后再试', url('/index/yonghu/xiugaimima'));
                }
                else
                {
                    Db::table('think_user')->where('user_name', $data)->update(['user_passwd' => $nowqpwd]);
                    session(null);//退出清空session
                    $this->success("修改密码成功，请重新登录！", url('login/index'));
                }
            }

        }
    }

    public function liulan()
    {
        $view = new View();
        $data111 = session('user_name');
        $view->assign('data111',$data111);
        return $view->fetch('liulan');
    }

    public function genxin(){

        $sex = input('post.sex');//接收前台
        $qq = input('post.qq');//接收前台
        $address = input('post.address');//接收前台
        if(!$sex||!$qq||!$address)
        {
            $this->error('其中一项请不要为空，重新输入', url('/index/yonghu/gerenxinxi'));
        }
        else
        {
        if (Request::instance()->isPost()) {
            $data = session('user_name');
            //从数据库读取数据
            $admin_info = DB::name('think_user')
                ->where('user_name', $data)
                ->find();
            Db::table('think_user')->where('user_name', $data)->update(['sex' => $sex, 'qq' => $qq, 'address' => $address]);
            Db::table('think_shangpin')->where('user_name', $data)->update(['qq' => $qq]);
            $this->success("更新成功", url('yonghu/gerenxinxi'));
        }
        }

    }

    public function fabus(){

        $sp = input('post.sp');//接收前台
        $jg = input('post.jg');//接收前台
        $id = input('post.id');//接收前台
        $shuliang = input('post.shuliang');//接收前台
        $mulu = input('post.url');
       // $address = input('post.address');//接收前台确认密码
        if(!$sp||!$jg||!$id||!$mulu)
        {
            $this->error('其中一项请不要为空，重新输入', url('/index/yonghu/fabu'));
        }
        else
        {
            if (Request::instance()->isPost()) {
                $data = session('user_name');
                //从数据库读取数据
                $admin_info = DB::name('think_shangpin')
                    ->where('shangpin_id', $id)
                    ->find();

                if(empty($admin_info)){
                    $ddd=Db::table('think_user')->where('user_name',$data)->find();
                    $data = ['shangpin_id' => $id, 'shangpin_name' => $sp,'value' => $jg,'user_name' => $data
                    ,'qq'=>$ddd['qq'],'url'=>$mulu,'shuliang'=>$shuliang,'yesno'=>0];
                    Db::table('think_shangpin')->insert($data);
                    $this->success('提交成功，等待管理员审核', url('/index/yonghu/fabu'));
                }else{
                    $this->error('该商品ID已存在', url('/index/yonghu/fabu'));
                }

            }
        }
    }

}