<?php
namespace app\index\model;
use think\Model;
use think\db;
class MenuModel extends Model
{
    public function getMenus($data,$page,$pageSize)
    {
        //用paginate结果返回会有跟分页相关的数据，table自动渲染时会出错
        //故直接使用limit()查询每一页的数据，前端渲染时table开启了page:true，传递了page和limit，只要在表格中查找对应的数据即可，不用再额外的使用paginate
        $offset = ($page - 1) * $pageSize;
        $ret = Db::table('think_user')->where($data)
            ->limit($offset,$pageSize)->order('user_name')->select();
        return $ret;
    }

    public function getMenusCount($data)
    {
        $ret = Db::table('think_user')->where($data)->count();
        return $ret;
    }

    public function getshangpin($data,$page,$pageSize)
    {
        $offset = ($page - 1) * $pageSize;
        $ret = Db::table('think_shangpin')->where($data)->where('yesno',1)->where('shuliang','>',0)
            ->limit($offset,$pageSize)->order('shangpin_id')->select();
        return $ret;
    }

    public function shangpin($data)
    {
        $ret = Db::table('think_shangpin')->where($data)->where('yesno',1)->where('shuliang','>',0)->count();
        return $ret;
    }

    public function getwodeshangpin($data,$page,$pageSize,$dat)
    {

        $offset = ($page - 1) * $pageSize;
        $ret = Db::table('think_shangpin')->where('user_name',$dat)->where('yesno',1)
            ->limit($offset,$pageSize)->order('shangpin_id')->select();
        return $ret;
    }

    public function wodeshangpin($data,$dat)
    {
        $ret = Db::table('think_shangpin')->where('user_name',$dat)->where('yesno',1)->count();
        return $ret;
    }

    public function deleteMenu($menu_id)
    {
        $ret = Db::table('think_shangpin')->where('shangpin_id',$menu_id)->delete();
        return $ret;
    }

    public function deleteyonghu($menu_id)
    {
        $ret = Db::table('think_user')->where('user_name',$menu_id)->delete();
        return $ret;
    }

    public function shanchudingdan($menu_id)
    {
        $ret = Db::table('dingdan')->where('dingdan_id',$menu_id)->delete();
        return $ret;
    }

    public function guanlifabu($data)
    {
        $ret = Db::table('think_shangpin')->where($data)->where('yesno',0)->count();
        return $ret;
    }

    public function getguanlifabu($data,$page,$pageSize)
    {
        $offset = ($page - 1) * $pageSize;
        $ret = Db::table('think_shangpin')->where($data)->where('yesno',0)
            ->limit($offset,$pageSize)->order('shangpin_id')->select();
        return $ret;
    }

    public function getwodedingdan($data,$page,$pageSize,$dat)
    {

        $offset = ($page - 1) * $pageSize;
        $ret = Db::table('dingdan')->where('mai3',$dat)
            ->limit($offset,$pageSize)->order('shangpin_id')->select();
        return $ret;
    }

    public function wodedingdan($data,$dat)
    {
        $ret = Db::table('dingdan')->where('mai3',$dat)->count();
        return $ret;
    }

    public function getdingdan($data,$page,$pageSize)
    {

        $offset = ($page - 1) * $pageSize;
        $ret = Db::table('dingdan')
            ->limit($offset,$pageSize)->order('shangpin_id')->select();
        return $ret;
    }

    public function dingdan($data)
    {
        $ret = Db::table('dingdan')->count();
        return $ret;
    }

    public function getwomaichu($data,$page,$pageSize,$dat)
    {

        $offset = ($page - 1) * $pageSize;
        $ret = Db::table('dingdan')->where('mai4',$dat)
            ->limit($offset,$pageSize)->order('shangpin_id')->select();
        return $ret;
    }

    public function womaichu($data,$dat)
    {
        $ret = Db::table('dingdan')->where('mai4',$dat)->count();
        return $ret;
    }

}

