<?php
namespace app\admin\model;

use think\Model;
use think\Session;

class AdminConfig extends Model{

    // 设置数据表（不含前缀）
    protected $name = 'admin_config';
}