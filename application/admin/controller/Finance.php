<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
use think\facade\Request;
class Finance extends Common {
    /**
     * 资金流水
     * @return void
     */
    public function financeCapital() {
        return $this -> fetch();
    }
}