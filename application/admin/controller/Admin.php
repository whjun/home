<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\AdminModel;
use app\admin\model\AdminPowerModel;
use app\admin\model\AdminRoleModel;
use app\admin\model\AdminRegionModel;
use think\Db;
use think\facade\Request;
class Admin extends Common {
	/**
	 * 通用
	 * 管理员管理
	 * 2018年9月15日14:36:02
	 */
	public function adminlist() {
		Cookie('Adminadminlist', request() -> url());
		//筛选参数
		$filter = input('filter');
		$re = config('paginate.list_rows');
		$page = request() -> param('page');
		//根据管理员名称和手机号
		$where = array();
		if (!empty($filter)) {
			$where['a.username|a.nickname|b.name'] = array('like', '%' . trim($filter) . '%', );
		}
		$where['a.status'] = 0;
		$list = Db::name('admin_info a') -> join('admin_role b', 'a.role_id=b.id') -> where($where) -> field('a.*,b.name') -> order('a.create_time desc') -> paginate($re, false, array('query' => request() -> param()));
		foreach ($list as $k => $val) {
			if ($page) {
				$val['ids'] = ($page - 1) * $re + $k + 1;
			} else {
				$val['ids'] = $k + 1;
			}
			checkXss($val, 'name,nickname');
			$list[$k] = $val;
		}
		$this -> assign('list', $list);
		$this -> assign('filter', $filter);
		return $this -> fetch();
	}

	/**
	 * 删除管理员
	 * @author czg
	 */
	public function admindel() {
		$id = input('id');
		$data['status'] = 1;
		$re = Db::name('admin_info') -> where('id', $id) -> update($data);
		if ($re) {
			AjaxJson('删除成功', 0, 1, Cookie('Adminadminlist'));
		} else {
			AjaxJson('操作失败');
		}
	}

	/**
	 * 批量删除角色
	 * @author czg
	 */
	public function deleteadmins() {
		$ids = input('ids/a');
		$data['status'] = 1;
		foreach ($ids as $val) {
			Db::name('admin_info') -> where('id', $val) -> update($data);
		}
		AjaxJson('删除成功', 0, 1, Cookie('Adminadminlist'));
	}

	/**
	 * 新增管理员
	 * @author czg
	 */
	public function adminadd() {
		if ( request() -> isGet()) {
			//获取角色
			$rolelist = Db::name('admin_role') -> where('status', 0) -> field('id,name') -> select();
			$this -> assign('rolelist', $rolelist);
			return $this -> fetch();
		} else {
			$data = input('post.');
			//检测账号格式
			if (!check_username($data['username'])) {
				AjaxJson('账号格式不正确');
			}
			//检测密码
			if (!check_password($data['password'])) {
				AjaxJson('密码格式不正确');
			}
			//检测账号唯一性
			if (!checkCode('admin_info', 'username', $data['username'])) {
				AjaxJson('管理员账号已经存在啦');
			}
			//检测确认密码
			if ($data['password'] != $data['clearword']) {
				AjaxJson('确认密码跟登录密码不一致');
			}
			$data['password'] = md5(md5($data['clearword']));
			$model = new AdminModel();
			$r = $model -> allowField(true) -> save($data);
			if ($r) {
				AjaxJson('操作成功', 0, 1, Cookie('Adminadminlist'));
			} else {
				AjaxJson('操作失败');
			}
		}
	}

	/**
	 * 编辑管理员
	 * @author czg
	 */
	public function adminedit() {
		if ( request() -> isGet()) {
			$id = input('id');
			$info = Db::name('admin_info') -> where('id', $id) -> find();
			//获取角色
			$rolelist = Db::name('admin_role') -> where('status', 0) -> field('id,name') -> select();
			$this -> assign('rolelist', $rolelist);
			$this -> assign('info', $info);
			return $this -> fetch();
		} else {
			$data = input('post.');
			//检测账号格式
			if (!check_username($data['username'])) {
				AjaxJson('账号格式不正确');
			}
			//检测密码
			if (!check_password($data['password'])) {
				AjaxJson('密码格式不正确');
			}
			//检测账号唯一性
			if (!checkCode('admin_info', 'username', $data['username'], $data['id'])) {
				AjaxJson('管理员账号已经存在啦');
			}
			//检测确认密码
			if ($data['password'] != $data['clearword']) {
				AjaxJson('确认密码跟重置密码不一致');
			}
			$data['password'] = md5(md5($data['password']));
			$model = new AdminModel();
			$r = $model -> allowField(true) -> save($data, array('id' => $data['id']));
			AjaxJson('操作成功', 0, 1, Cookie('Adminadminlist'));
		}
	}

	/**
	 * 启用
	 * @author czg
	 */
	public function changeStatus() {
		$id = input('id');
		$data['is_use'] = input('is_use');
		Db::name('admin_info') -> where('id', $id) -> update($data);
		AjaxJson('更改成功', 0, 1);
	}

	/**
	 * 角色列表
	 * @author czg
	 */
	public function rolelist() {
		Cookie('Adminrolelist', request() -> url());
		//筛选参数
		$filter = input('filter');
		$re = config('paginate.list_rows');
		$page = request() -> param('page');
		//根据角色名称
		$where = array();
		if (!empty($filter)) {
			$where['a.name'] = array('like', '%' . $filter . '%', );
		}
		$where['a.status'] = 0;
		$list = Db::name('admin_role a') -> where($where) -> order('a.create_time desc') -> paginate($re, false, array('query' => request() -> param()));
		foreach ($list as $k => $val) {
			if ($page) {
				$val['ids'] = ($page - 1) * $re + $k + 1;
			} else {
				$val['ids'] = $k + 1;
			}
			checkXss($val, 'name,desc');
			$list[$k] = $val;
		}
		$this -> assign('list', $list);
		$this -> assign('filter', $filter);
		return $this -> fetch();
	}

	/**
	 * 新增角色
	 * @author czg
	 */
	public function addrole() {
		if ( request() -> isGet()) {
			//获取权限
			$auth = $this -> getauth(array());
			$this -> assign('auth', $auth);
			return $this -> fetch();
		} else {
			$data = input('post.');
			if (isset($data['power']) && !empty($data['power'])) {
				$data['power'] = implode(',', $data['power']);
			}
			$model = new AdminRoleModel();
			$r = $model -> allowField(true) -> save($data);
			if ($r) {
				AjaxJson('操作成功', 0, 1, Cookie('Adminrolelist'));
			} else {
				AjaxJson('操作失败');
			}
		}
	}

	/**
	 * 编辑角色
	 * @author czg
	 */
	public function editrole() {
		if ( request() -> isGet()) {
			$id = input('id');
			$info = Db::name('admin_role') -> where('id', $id) -> find();
			//获取权限
			$auth = $this -> getauth(explode(',', $info['power']));
			$this -> assign('info', $info);
			$this -> assign('auth', $auth);
			return $this -> fetch();
		} else {
			$data = input('post.');
			if (isset($data['power']) && !empty($data['power'])) {
				$data['power'] = implode(',', $data['power']);
			}
			$model = new AdminRoleModel();
			$r = $model -> allowField(true) -> save($data, array('id' => $data['id']));
			if ($r && session('admin_id') == $data['id']) {
				//更新权限
				session('navs', null);
				session('menus', null);
				getPower(session('admin_id'));
			}
			AjaxJson('操作成功', 0, 1, Cookie('Adminrolelist'));
		}
	}

	/**
	 * 删除角色
	 * @author czg
	 */
	public function deleterole() {
		$id = input('id');
		$data['status'] = 1;
		$re = Db::name('admin_role') -> where('id', $id) -> update($data);
		if ($re) {
			AjaxJson('删除成功', 0, 1, Cookie('Adminrolelist'));
		} else {
			AjaxJson('操作失败');
		}
	}

	/**
	 * 批量删除角色
	 * @author czg
	 */
	public function deleteroles() {
		$ids = input('ids/a');
		$data['status'] = 1;
		foreach ($ids as $val) {
			Db::name('admin_role') -> where('id', $val) -> update($data);
		}
		AjaxJson('删除成功', 0, 1, Cookie('Adminrolelist'));
	}

	/**
	 * 获取权限
	 * @author czg
	 */
	private function getauth($userpower) {
		$allpower = Db::name('admin_power') -> order('id asc') -> select();
		$allfuth = array();
		foreach ($allpower as $k => $val) {
			$allpower[$k]['select'] = 0;
			foreach ($userpower as $v) {
				if ($v == $val['id']) {
					$allpower[$k]['select'] = 1;
				}
			}
			if ($val['level'] == 1) {
				$children = Db::name('admin_power') -> where('pid', $val['id']) -> order('id') -> select();
				if (!empty($children)) {
					foreach ($children as &$vv) {
						$vv['select'] = 0;
						foreach ($userpower as $vvv) {
							if ($vv['id'] == $vvv) {
								$vv['select'] = 1;
							}
						}
						$child = Db::name('admin_power') -> where('pid', $vv['id']) -> order('id') -> select();
						if (!empty($child)) {
							foreach ($child as &$vl) {
								$vl['select'] = 0;
								foreach ($userpower as $vvvv) {
									if ($vl['id'] == $vvvv) {
										$vl['select'] = 1;
									}
								}
							}
							$vv['children'] = $child;
						} else {
							$vv['children'] = array();
						}
					}
					$allpower[$k]['children'] = $children;
				} else {
					$allpower[$k]['children'] = array();
				}
			} else {
				unset($allpower[$k]);
			}
		}
		return $allpower;
	}

	/**
	 * 管理员日志
	 * @author czg
	 */
	public function adminlog() {
		Cookie('Adminadminlog', request() -> url());
		//筛选参数
		$filter = input('filter');
		$re = config('paginate.list_rows');
		//根据管理员名称和手机号
		$where = array();
		if (!empty($filter)) {
			$where['a.nickname|a.phone|a.username'] = array('like', '%' . $filter . '%', );
		}
		$list = Db::name('admin_log a') -> join('admin_info b', 'a.admin_id=b.id') -> where($where) -> field('a.id,a.title,a.content,a.create_time,b.nickname,b.username') -> order('a.create_time desc') -> paginate($re, false, array('query' => request() -> param()));
		$this -> assign('list', $list);
		$this -> assign('filter', $filter);
		return $this -> fetch();
	}

	/**
	 * 地址列表
	 * @author czg
	 */
	public function region() {
		Cookie('Adminregion', request() -> url());
		$re = config('paginate.list_rows');
		$level = input('level', 1);
		$id = input('id');
		$parentid = input('parentid', 0);
		$where = array();
		if (empty($id)) {
			$where['level'] = $level;
			$this -> assign('level', $level);
		} else {
			$where['level'] = array('gt', $level);
			$where['pid'] = $id;
			$this -> assign('level', ++$level);
		}
		$list = Db::name('admin_region') -> where($where) -> order('id asc') -> paginate($re, false, array('query' => request() -> param()));
		// dump($list);die;
		$this -> assign('list', $list);
		$this -> assign('pid', $parentid);
		return $this -> fetch();
	}

	/**
	 * 新增地址
	 * @author czg
	 */
	public function addregion() {
		$data = input('post.');
		//检测ID唯一性
		$res = validate('admin/Region') -> check($data);
		if (true !== $res) {
			AjaxJson( validate('admin/Region') -> getError());
		}
		$model = new AdminRegionModel();
		$r = $model -> allowField(true) -> save($data);
		if ($r) {
			AjaxJson('操作成功', 0, 1, Cookie('Adminregion'));
		} else {
			AjaxJson('操作失败');
		}
	}

	/**
	 * 编辑地址
	 * @author czg
	 */
	public function editregion() {
		$data = input('post.');
		$model = new AdminRegionModel();
		$r = $model -> allowField(true) -> save($data, array('id' => $data['id']));
		AjaxJson('操作成功', 0, 1, Cookie('Adminregion'));
	}

	/**
	 * 删除地址
	 * @author czg
	 */
	public function deleteregion() {
		$id = input('id');
		$data['status'] = 1;
		$re = Db::name('admin_region') -> where('id|pid', $id) -> delete();
		if ($re) {
			AjaxJson('删除成功', 0, 1, Cookie('Adminregion'));
		} else {
			AjaxJson('操作失败');
		}
	}

	/**
	 * 基本配置
	 * @author czg
	 */
	public function basic() {
		Cookie('Adminbasic', request() -> url());
		$re = config('paginate.list_rows');
		$list = Db::name('admin_config') -> paginate($re, false, array('query' => request() -> param()));
		$this -> assign('list', $list);
		return $this -> fetch();
	}

	/**
	 * ajax 修改指定表数据字段  一般修改状态 比如 是否推荐 是否开启 等 图标切换的
	 * table,id_name,id_value,field,value
	 */
	public function changeTableVal() {
		$table = input('table');
		// 表名
		$id_name = input('id_name');
		// 表主键id名
		$id_value = input('id_value');
		// 表主键id值
		$field = input('field');
		// 修改哪个字段
		$value = input('value');
		// 修改字段值
		$res = Db::name($table) -> where($id_name, $id_value) -> update(array($field => $value));
		// 根据条件保存修改的数据
		AjaxJson('操作成功', 0, 1, Cookie('Adminbasic'));
	}

	public function menulist() {
		Cookie('Menulist', request() -> url());
		//筛选参数
		$re = config('paginate.list_rows');
		$where['a.level'] = 1;
		$list = Db::name('admin_power a') -> where($where) -> order('a.create_time asc') -> paginate($re, false, array('query' => request() -> param()));
		//根据分类名称
		$Menu = new AdminPowerModel();
		$list = $Menu -> getTree($list);
		$this -> assign('list', $list);
		return $this -> fetch();
	}

	/**
	 * 新增菜单
	 * @author lxy
	 */
	public function addmenu() {
		if ( request() -> isGet()) {
			//是否有上级id
			$ppid = '';
			$pid = input('pid');
			if ($pid) {
				$pInfo = Db::name('admin_power') -> where('id', $pid) -> find();
				if ($pInfo['level'] == 2) {
					$list1 = Db::name('admin_power') -> where('status', 0) -> where('pid', $pInfo['pid']) -> field('id,name') -> order('create_time asc') -> select();
					$pid = '';
					foreach ($list1 as $val) {
						if ($val['id'] == input('pid')) {
							$pid .= '<option value="' . $val['id'] . '" selected>' . $val['name'] . '</option>';
						} else {
							$pid .= '<option value="' . $val['id'] . '" >' . $val['name'] . '</option>';
						}

					}
					$ppid = $pInfo['pid'];
				} else {
					$ppid = $pid;
					$pid = '';
				}
			}
			//菜单
			$list = Db::name('admin_power') -> where('status', 0) -> where('level', 1) -> field('id,name') -> order('create_time asc') -> select();
			$this -> assign('ppid', $ppid);
			$this -> assign('pid', $pid);
			$this -> assign('list', $list);
			return $this -> fetch();
		} else {
			$data = input('post.');
			if (empty($data['cate1'])) {
				$data['pid'] = 0;
				$data['level'] = 1;
			} elseif (empty($data['cate2'])) {
				$data['pid'] = $data['cate1'];
				$data['level'] = 2;
			} else {
				$data['pid'] = $data['cate2'];
				$data['level'] = 3;
			}
			if ($data['level'] == 1) {
				$data['icon'] = 'fa-list-ul';
			} else {
				$data['icon'] = 'fa-asterisk';
			}
			$model = new AdminPowerModel();
			$r = $model -> allowField(true) -> save($data);
			if ($r) {
				AjaxJson('操作成功', 0, 1, Cookie('Menulist'));
			} else {
				AjaxJson('操作失败');
			}
		}
	}

	/**
	 * 店铺列表
	 * @author czg
	 */
	public function storelist() {
		Cookie('Adminstorelist', request() -> url());
		//筛选参数
		$filter = input('filter');
		$re = config('paginate.list_rows');
		//根据店铺名称/负责人
		$where = array();
		if (!empty($filter)) {
			$where['name|leader'] = array('like', '%' . $filter . '%', );
		}
		$where['status'] = 0;
		$where['check_status'] = 2;
		//已通过的
		$list = Db::name('store_info') -> where($where) -> order('create_time desc') -> paginate($re, false, array('query' => request() -> param()));
		$this -> assign('list', $list);
		$this -> assign('filter', $filter);
		return $this -> fetch();
	}

	/**
	 * 编辑菜单
	 * @author lxy
	 */
	public function editmenu() {
		if ( request() -> isGet()) {
			$id = input('id');
			$info = Db::name('admin_power') -> where('id', $id) -> find();
			$cate1 = Db::name('admin_power') -> where('status', 0) -> where('level', 1) -> order('create_time asc') -> select();
			$cate2 = array();
			$info['first'] = '';
			$info['second'] = '';
			if ($info['level'] == 2) {
				$info['first'] = $info['pid'];
			} elseif ($info['level'] == 3) {
				$info['second'] = $info['pid'];
				$info['first'] = Db::name('admin_power') -> where('id', $info['pid']) -> value('pid');
				$cate2 = Db::name('admin_power') -> where('pid', $info['first']) -> where('status', 0) -> select();
			}
			$this -> assign('cate1', $cate1);
			$this -> assign('cate2', $cate2);
			$this -> assign('info', $info);
			return $this -> fetch();
		} else {
			$data = input('post.');
			if (empty($data['cate1'])) {
				$data['pid'] = 0;
				$data['level'] = 1;
			} elseif (empty($data['cate2'])) {
				$data['pid'] = $data['cate1'];
				$data['level'] = 2;
			} else {
				$data['pid'] = $data['cate2'];
				$data['level'] = 3;
			}
			if ($data['pid'] == $data['id']) {
				AjaxJson('上级分类不能选择它本身');
			}
			$model = new AdminPowerModel();
			$r = $model -> allowField(true) -> save($data, array('id' => $data['id']));
			if ($r) {
				AjaxJson('操作成功', 0, 1, Cookie('Menulist'));
			} else {
				AjaxJson('操作失败');
			}
		}
	}

	/**
	 * 删除菜单
	 * @author lxy
	 */
	public function delmenu() {
		$id = input('id');
		$model = new AdminPowerModel();
		//判断是否有人员有此权限
		$where[] = array('exp', 'FIND_IN_SET(' . $id . ',power)');
		$info = Db::name('admin_role') -> where($where) -> find();
		if ($info) {
			AjaxJson('请先取消使用该菜单的角色权限');
		}
		$re = $model -> where('id', $id) -> delete();
		$model -> where('pid', $id) -> delete();
		if ($re) {
			AjaxJson('删除成功', 0, 1, Cookie('Menulist'));
		} else {
			AjaxJson('删除失败');
		}
	}

	/**
	 * 获取下级菜单
	 * @author lxy
	 */
	public function get_menu() {
		$id = input('pid');
		$list = Db::name('admin_power') -> where('status', 0) -> where('pid', $id) -> field('id,name') -> order('create_time asc') -> select();
		$html = '<option value="">请选择</option>';
		foreach ($list as $val) {
			$html .= '<option value="' . $val['id'] . '" >' . $val['name'] . '</option>';
		}
		AjaxJson('请求成功', 0, $html);
	}

}
