<?php
/**
 * 公共业务方法
 * 2018年9月25日14:36:02
 * @author czg
 */
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
use \think\Db;
use app\admin\model\UserInfoModel;
//获取用户功能权限
function getPower($user_id) {
	$powerlist = array();
	$arr = Db::name('admin_power') -> select();
	foreach ($arr as $k => $val) {
		$powerlist[$val['id']] = $val;
	}
	$powerarr = Db::name('admin_role a') -> join('admin_info b', 'a.id=b.role_id') -> where('b.id', $user_id) -> where('a.status', 0) -> where('b.status', 0) -> value('a.power');
	//菜单权限
	$menulist = array();
	if (empty($powerarr)) {
		return array('status' => 0, 'msg' => '您没有任何权限，无法登陆');
	} else {
		//组成数组格式
		$powerarr = explode(',', $powerarr);
		$navs = array();
		foreach ($powerarr as $v) {
			$data['title'] = $powerlist[$v]['name'];
			$data['icon'] = $powerlist[$v]['icon'];
			$data['href'] = url($powerlist[$v]['url']);
			$data['url'] = $powerlist[$v]['url'];
			$data['spread'] = false;
			if ($powerlist[$v]['level'] == 1) {
				$navs[$v] = $data;
			} elseif ($powerlist[$v]['level'] == 2) {
				$navs[$powerlist[$v]['pid']]['children'][] = $data;
			} else {
				$data['id'] = $powerlist[$v]['id'];
				$menulist[] = $data;
			}
		}
		$navs = array_values($navs);
		session('navs', json_encode($navs));
		session('menus', json_encode($menulist));
		return array('status' => 1);
	}
}

/**
 * 检测字段唯一性
 * @param table数据表  field 数据字段 value字段值  id
 * @author czg
 */
function checkCode($table, $field, $value, $id = '') {
	if (empty($id)) {
		//新增
		$info = Db::name($table) -> where($field, $value) -> where('status', 0) -> find();
	} else {
		//编辑
		$info = Db::name($table) -> where($field, $value) -> where('id', 'neq', $id) -> where('status', 0) -> find();
	}
	if (empty($info)) {
		return true;
	} else {
		return false;
	}
}

//防xss攻击
function checkXss(&$data, $fields) {
	$fields = explode(',', $fields);
	foreach ($fields as $field) {
		if (!empty($data[$field])) {
			$data[$field] = htmlspecialchars($data[$field]);
		}
	}
}
//我的邀请码
function getCode($n){
	$chars = ["0","1","2","3","4","5","6","7","8","9",'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
	$x=true;
	do {
		$output = "";
	  	$charsLen = count($chars) - 1;
		shuffle($chars);
		for ($i=0; $i<$n; $i++){
			$output .= $chars[mt_rand(0, $charsLen)];
		}
		$user = Db::name('user_info')->where('code',$output)->find();
		if(empty($user)){
			$x=false;
		}
	} while ($x);
	return $output;
}
//验证用户是否正确存在
function verify_user($user_id,$token) {
	if(empty($user_id)){
		return array('msg'=>'用户ID不能为空','status'=>0);
	}
	if(empty($token)){
		return array('msg'=>'Token不能为空','status'=>0);
	}
	$userinfo = UserInfoModel::get(array('id'=>$user_id,'status'=>0));
	if(empty($userinfo)){
		return array('msg'=>'该用户不存在','status'=>0);
	}
	if($userinfo['token']!=$token){
		return array('msg'=>'当前账号在别的设备上已登录','status'=>0);
	}
	return array('msg'=>'验证通过','status'=>1,'userinfo'=>$userinfo);
}

/**
 * 王金增的调试方法
 * @return bool
 */

function pre()
{
    if (!true) {
        return false;
    }
    $args = func_get_args();
    $debugArr = debug_backtrace();
    $timeArr = explode(' ', microtime());
    echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    echo "<pre  style='color:red'><hr><hr>【调用文件】:", $debugArr[0]['file'], '<br/>【调用行号】:', $debugArr[0]['line'], '<br/>';
    echo '【调用时间】:', date('Y-m-d H:i:s ', $timeArr[1]), $timeArr[0], '<hr>';
    foreach ($args as $k => $v) {
        $getType = gettype($v);
        echo '【变量序号】:', $k + 1, '<br/>【变量类型】:', $getType, '<br/>';
        'boolean' == $getType ? var_dump($v) : print_r($v);
        echo '<hr>';
    }
    echo '<hr></pre>';
    exit;
}


?>