<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\facade\Request;
use think\facade\Session;
use think\facade\Cookie;
use JPush\Client as JPush;
use app\admin\model\AdminModel;

class Index extends Controller
{

    public function index()
    {

		$adminId = session('admin_id');   
	    if(empty($adminId)){
	        $this->redirect('login');
	    }
		$real_url = 'http://'.$_SERVER['HTTP_HOST'];
		$web_name = Db::name('admin_config')->where('name','web_name')->value('value');
		$this -> assign('web_name',$web_name);
		$this -> assign('real_url',$real_url);
        return $this->fetch();

    }
    
    public function main()
    {

 		$info = Db::name('admin_info')->where('id',session('admin_id'))->find();	
        $this -> assign('user',$info);
		$web_name = Db::name('admin_config')->where('name','web_name')->where('status',0)->value('value');
		$this -> assign('web_name',$web_name);
        return $this->fetch();
    
    }

    /*************************************2017年8月14日09:32:31  ********************************************/
    //用户登录
    public function login()
    {
        if (input('post.')) {
            if (input('post.rememberMe') == true) {
                Cookie::set('username', input('post.username'), 3600);
                Cookie::set('password', input('post.password'), 3600);
            }
            $username = Request::instance()->post('username');//获取用户名
            $password = md5(Request::instance()->post('password'));//获取用户密码
            $captcha = Request::instance()->post('captcha');
            if (!captcha_check($captcha, '')) {
                //验证失败
                AjaxJson('验证码错误或失效');
            };
            $where['password'] = md5($password);
            $where['username'] = $username;
            $User = Db::name('admin_info')->where($where)->find();
            if (empty($User)) {
                AjaxJson("账号或密码错误！");
            }
            if ($User['id'] != '') {
                if ($User['is_use'] == 1) {
                    AjaxJson("您的账号已被禁用，请联系管理员！");
                }
                if ($User['status'] == 1) {
                    AjaxJson("您的账号已被删除，请联系管理员！");
                }
                //获取登录ip
                $ip = Request()->ip();
                //当前用户权限
                $res = getPower($User['id']);
                if ($res['status'] == 1) {
                    session('admin_id', $User['id']);
                    session('userinfo', $User);
                    AjaxJson('登录成功', 0, 1, url('index'));
                } else {
                    AjaxJson($res['msg']);
                }
            }
        }
        return $this->fetch();
    }

    //密码修改
    public function editpass(Request $request)
    {
        if (request()->isGet()) {
            $adminId = session('admin_id'); // 获取某个session变量
            if (empty($adminId)) {
                $this->redirect('login');
            }
            $this->assign('info', session('userinfo'));
            return $this->fetch();
        } else {
            $data = input('post.');
            //检测密码
            if (!check_password($data['password'])) {
                AjaxJson('密码格式不正确');
            }
            //检测旧密码
            $admin_info = Db::name('admin_info')->where('id', session('admin_id'))->where('password', md5(md5(trim($data['password']))))->where('status', 0)->find();
            if (empty($admin_info)) {
                AjaxJson('旧密码不正确');
            }
            //检测旧密码跟新密码
            if ($data['password'] == $data['clearword']) {
                AjaxJson('新密码不能跟旧密码一致');
            }
            $data['password'] = md5(md5(trim($data['clearword'])));
            $model = new AdminModel();
            $r = $model->allowField(true)->save($data, array('id' => session('admin_id')));
            AjaxJson('操作成功', 0, 1);
        }
    }

    //用户退出
    public function loginout()
    {
        Session::clear();
        AjaxJson('操作成功', 0, 1, url('login'));
    }
    
    public function aa()
    {
        $s = Db::name('admin_power')->order('id asc')->select();
        $this->ss($s);
        pre($a);
    }

    function ss($array , $userpower){
        $items = array();
        foreach($array as $value){
            $items[$value['id']] = $value;
            $items[$value['select']] = 0;
        }
        $tree = array();
        foreach($items as $key => $value){
            if(isset($items[$value['pid']])){
                $items[$value['pid']]['son'][] = &$items[$key];
                pre($items);
            }else{
                $tree[] = &$items[$key];
            }
        }
        pre($tree);
    }


}
