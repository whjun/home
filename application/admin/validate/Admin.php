<?php
namespace app\admin\validate;

use think\Validate;

/**
 * 用户验证器
 */
class Admin extends Validate
{
    //定义验证规则
    protected $rule = [
    	'username|账号'   => 'unique:admin_info',
    ];

    //定义验证提示
    protected $message = [
    	'username.unique'     => '该账号已经注册过啦',
    ];
}
