<?php
namespace app\index\controller;
use app\index\model\MenuModel;
use think\Controller;
use think\Db;
use think\Request;
class Menu extends Controller
{

    public function index()
    {
        $request=Request::instance();
        if ($request->isAjax()) {
            $data = array();
            $pagesize = $request->get('limit') ? $request->get('limit') : 10;//前端直接传过来的数据
            $page = $request->get('page') ? $request->get('page') : 1;//前端直接传过来的数据
            $menu = new MenuModel();//调用model的getMenusCount和getMenus方法
            $res['count'] = $menu->getMenusCount($data);
            $res['data'] = $menu->getMenus($data, $page, $pagesize);
            $res['code'] = 0;
            $res['msg'] = '';
            echo json_encode($res);//传递json格式的$res回后端，注意$res需要包含的四个部分（默认为count、data、code和msg，这样回传后才可以自动渲染，如需要修改key值可参考官方文档）
            exit;
        }
        return $this->fetch();
    }

    public function shangpin()
    {
        $request=Request::instance();
        if ($request->isAjax()) {
            $data = array();
            $pagesize = $request->get('limit') ? $request->get('limit') : 10;//前端直接传过来的数据
            $page = $request->get('page') ? $request->get('page') : 1;//前端直接传过来的数据
            $menu = new MenuModel();//调用model的getMenusCount和getMenus方法
            $res['count'] = $menu->shangpin($data);
            $res['data'] = $menu->getshangpin($data, $page, $pagesize);
            $res['code'] = 0;
            $res['msg'] = '';
            echo json_encode($res);
            exit;
        }
        return $this->fetch();
    }

    public function guanlifabu()
    {
        $request=Request::instance();
        if ($request->isAjax()) {
            $data = array();
            $pagesize = $request->get('limit') ? $request->get('limit') : 10;//前端直接传过来的数据
            $page = $request->get('page') ? $request->get('page') : 1;//前端直接传过来的数据
            $menu = new MenuModel();//调用model的getMenusCount和getMenus方法
            $res['count'] = $menu->guanlifabu($data);
            $res['data'] = $menu->getguanlifabu($data, $page, $pagesize);
            $res['code'] = 0;
            $res['msg'] = '';
            echo json_encode($res);
            exit;
        }
        return $this->fetch();
    }

    public function wodeshangpin()
    {
        $dat = session('user_name');
        $request=Request::instance();
        if ($request->isAjax()) {
            $data = array();
            $pagesize = $request->get('limit') ? $request->get('limit') : 10;//前端直接传过来的数据
            $page = $request->get('page') ? $request->get('page') : 1;//前端直接传过来的数据
            $menu = new MenuModel();//调用model的getMenusCount和getMenus方法
            $res['count'] = $menu->wodeshangpin($data,$dat);
            $res['data'] = $menu->getwodeshangpin($data, $page, $pagesize,$dat);
            $res['code'] = 0;
            $res['msg'] = '';
            echo json_encode($res);
            exit;
        }
        return $this->fetch();
    }

    public function wodedingdan()
    {
        $dat = session('user_name');
        $request=Request::instance();
        if ($request->isAjax()) {
            $data = array();
            $pagesize = $request->get('limit') ? $request->get('limit') : 10;//前端直接传过来的数据
            $page = $request->get('page') ? $request->get('page') : 1;//前端直接传过来的数据
            $menu = new MenuModel();//调用model的getMenusCount和getMenus方法
            $res['count'] = $menu->wodedingdan($data,$dat);
            $res['data'] = $menu->getwodedingdan($data, $page, $pagesize,$dat);
            $res['code'] = 0;
            $res['msg'] = '';
            echo json_encode($res);
            exit;
        }
        return $this->fetch();
    }

    public function dingdanguanli()
    {
        //$dat = session('user_name');
        $request=Request::instance();
        if ($request->isAjax()) {
            $data = array();
            $pagesize = $request->get('limit') ? $request->get('limit') : 10;//前端直接传过来的数据
            $page = $request->get('page') ? $request->get('page') : 1;//前端直接传过来的数据
            $menu = new MenuModel();//调用model的getMenusCount和getMenus方法
            $res['count'] = $menu->dingdan($data);
            $res['data'] = $menu->getdingdan($data, $page, $pagesize);
            $res['code'] = 0;
            $res['msg'] = '';
            echo json_encode($res);
            exit;
        }
        return $this->fetch();
    }

    public function womaichu()
    {
        $dat = session('user_name');
        $request=Request::instance();
        if ($request->isAjax()) {
            $data = array();
            $pagesize = $request->get('limit') ? $request->get('limit') : 10;//前端直接传过来的数据
            $page = $request->get('page') ? $request->get('page') : 1;//前端直接传过来的数据
            $menu = new MenuModel();//调用model的getMenusCount和getMenus方法
            $res['count'] = $menu->womaichu($data,$dat);
            $res['data'] = $menu->getwomaichu($data, $page, $pagesize,$dat);
            $res['code'] = 0;
            $res['msg'] = '';
            echo json_encode($res);
            exit;
        }
        return $this->fetch();
    }

    public function delete()
    {
        $request=Request::instance();
        if($request->isAjax())
        {
            $menu_id = $request->post('shangpin_id');
            $menu = new MenuModel();
            $result = $menu->deleteMenu($menu_id);
            if($result) {
                return 1;
            } else {
                return 0;
            }
        }
        return $this->fetch();
    }


    public function zhuangtai()
    {
        $request=Request::instance();
        if($request->isAjax())
        {
            $menu_id = $request->post('dingdan_id');
            $result=Db::table('dingdan')->where('dingdan_id', $menu_id)->update(['zhuangtai' => "已完成"]);
            if($result) {
                return 1;
            } else {
                return 0;
            }
        }
        return $this->fetch();
    }


    public function shanchudingdan()
    {
        $request=Request::instance();
        if($request->isAjax())
        {
            $menu_id = $request->post('dingdan_id');
            $menu = new MenuModel();
            $result = $menu->shanchudingdan($menu_id);
            if($result) {
                return 1;
            } else {
                return 0;
            }
        }
        return $this->fetch();
    }

    public function deleteyonghu()
    {
        $request=Request::instance();
        if($request->isAjax())
        {
            $menu_id = $request->post('user_name');
            $menu = new MenuModel();
            $result = $menu->deleteyonghu($menu_id);
            if($result) {
                return 1;
            } else {
                return 0;
            }
        }
        return $this->fetch();
    }

    public function tongyi()
    {
        $request=Request::instance();
        if($request->isAjax())
        {
            $menu_id = $request->post('shangpin_id');
            $result=Db::table('think_shangpin')->where('shangpin_id', $menu_id)->update(['yesno' => 1]);
            if($result) {
                return 1;
            } else {
                return 0;
            }
        }
        return $this->fetch();
    }

    public function goumai()
    {
        $request=Request::instance();
        if($request->isAjax())
        {
            $mai3 = session('user_name');
            $mai_info = DB::table('think_user')
                ->where('user_name',$mai3)
                ->find();
            $menu_id = $request->post('shangpin_id');
            $shuliang = $request->post('shuliang');
            $admin_info = DB::table('think_shangpin')
                ->where('shangpin_id',$menu_id)
                ->find();
            $tmp=$admin_info['shuliang']-$shuliang;
            $result=Db::table('think_shangpin')->where('shangpin_id', $menu_id)->update(['shuliang' => $tmp]);
            $order_sn = time().rand(1111,9999);
            $data = ['mai3' => $mai3, 'mai4' => $admin_info['user_name'],'shangpin_id'=>$admin_info['shangpin_id']
            ,'shangpin_name'=>$admin_info['shangpin_name'],'url'=>$admin_info['url'],'value'=>$admin_info['value'],
                'qq'=>$admin_info['qq'],'shuliang'=>$shuliang,'dingdan_id'=>$order_sn,'mai3qq'=>$mai_info['qq'],
                'zhuangtai'=>'等待卖家同意'
            ];
            Db::table('dingdan')->insert($data);
            if($result) {
                return 1;
            } else {
                return 0;
            }
        }
        return $this->fetch();
    }

}