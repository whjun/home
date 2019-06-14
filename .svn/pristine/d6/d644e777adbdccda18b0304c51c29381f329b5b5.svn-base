<?php
namespace app\admin\validate;

use think\Validate;

/**
 * 用户验证器
 */
class Config extends Validate
{
    //定义验证规则
    protected $rule = [
    	'name|配置参数名'   => 'unique:admin_config',
    ];

    //定义验证提示
    protected $message = [
    	'name.unique'     => '配置参数名不能重复',
    ];
}
