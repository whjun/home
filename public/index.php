<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;
// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
//define('EXTEND_PATH','../extend/');
define('__PUBLIC__', __DIR__);
if ($_SERVER['SCRIPT_NAME'] == '/index.php') {
    define('ADMIN_STYLE', '/admin-layout/');
    define('IMG_PATH','http://'.$_SERVER['HTTP_HOST']);
} else {
    $HomePath = '';
    if ($_SERVER['SCRIPT_NAME'] != '/public/index.php') {
        $HomePath = str_replace('/public/index.php', '', $_SERVER['SCRIPT_NAME']);
    }
    $HomePath .= '/public';
    define('ADMIN_STYLE', $HomePath . '/admin-layout/');
    if ($HomePath == '/public' && $_SERVER['SCRIPT_NAME'] != '/public/index.php') {
        $HomePath = '';
    }
	//图片地址
    define('IMG_PATH',$HomePath);
}
define('VENDOR_PATH', __DIR__ . '/../vendor');

// 加载基础文件
require __DIR__ . '/../thinkphp/base.php';



// 支持事先使用静态方法设置Request对象和Config对象

// 执行应用并响应
Container::get('app')->run()->send();
