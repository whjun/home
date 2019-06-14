<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
use think\facade\Request;
class User extends Common {
    public function userlist() {
        Cookie('Userlist', request() -> url());
        $re = config('paginate.list_rows');
        $oppen_id = input('oppen_id');
        $ali_user_id = input('ali_user_id');
        $balance = input('balance');
        $where = array();
        if(!empty($oppen_id)){
            $where[] = array('u.oppen_id', 'like', '%' . trim($oppen_id) . '%');
            $this -> assign('oppen_id',$oppen_id);
        }
        if(!empty($ali_user_id)){
            $where[] = array('u.ali_user_id','like','%' . trim($ali_user_id) . '%');
            $this -> assign('ali_user_id',$ali_user_id);
        }
        if($balance) {
            if($balance == 2){
                $where[] = array('balance','eq',0);
                $this -> assign('balance',2);
            }elseif($balance == 1){
                $where[] = array('balance','neq',0);
                $this -> assign('balance',1);
            }
        }
        $data = Db::name('user') -> where($where) -> alias('u') -> field('u.id,u.nike_name,u.oppen_id,u.ali_user_id,u.platform_type,u.is_defriend,u.balance,sum(o.price) as consumption') -> join('order o','u.id = o.user_id','LEFT') -> order('u.id asc') -> group('u.id') -> paginate($re, false, array('query' => request() -> param()));
        $this -> assign('list',$data);
        return $this->fetch();
    }
    /**
     * 启用
     */
    public function changeStatus(){
        $id = input('id');
        $data['is_defriend'] = input('is_defriend');
        Db::name('user') -> where('id',$id) -> update($data);
        AjaxJson('更改成功', 0, 1);
    }
}