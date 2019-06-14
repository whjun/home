<?php
namespace app\admin\model;

use think\Model;
use think\Session;
use think\Db;

class AdminPowerModel extends Model{

    // 设置数据表（不含前缀）
    protected $name = 'admin_power';

	public function getTree($list){
		foreach($list as $k=>$val){
			$val['child'] = Db::name('admin_power')->where('pid',$val['id'])->select();
			foreach($val['child'] as &$v){
				$v['child'] = Db::name('admin_power')->where('pid',$v['id'])->select();
			}
			$list[$k] = $val;
		}
		return $list;
	}

}