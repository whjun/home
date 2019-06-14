<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
use think\facade\Request;
class Order extends Common {
    /**
     * 订单列表
     * @return void
     */
    public function orderlist() {
        $hospital = Db::name('hospital') -> select();
        $this -> assign('hospital',$hospital);
        return $this -> fetch();
    }
}