<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
use think\facade\Request;
use app\admin\model\MarketingCouponModel;
class Marketing extends Common{
    /**
     * 优惠券
     */
    public function marketingcoupon(){
        Cookie('Coupon', request() -> url());
        $coupon_name = input("coupon_name");
        $re = config('paginate.list_rows');
        $where = array();
        if (!empty($coupon_name)) {
			$where[] = array('coupon_name','like', '%' . trim($coupon_name) . '%');
        }
        $data = Db::name('coupon c') -> where($where) -> order('id asc') ->paginate($re, false, array('query' => request() -> param()));
        $this -> assign("list",$data);
        return $this -> fetch();
    }
    /**
     * 优惠卷添加
     */
    public function addcoupon(){
        $data = input("post.");
        $data['create_time'] = date('Y-m-d h:i:s');
        $user = Db::name('user') -> select();
        $count = count($user);
        $model = new MarketingCouponModel();
        $res = $model -> allowField(true) -> save($data);
        $id = Db::name('coupon')->insertGetId($data);
        foreach($user as $k => $v){
            $coupon_by_user['coupon_id'] = $id;
            $coupon_by_user['user_id'] = $v['id'];
            $coupon_by_user['is_use'] = 0;
            $coupon_by_user['create_time'] = date('Y-m-d h:i:s');
            Db::name('coupon_by_user')->insert($coupon_by_user);
        }
        if($res){
            AjaxJson('操作成功', 0, 1, Cookie('Coupon'));
        } else {
            AjaxJson('操作失败');
        }
    }
    /**
     * 优惠券编辑
     */
    public function editcoupon(){
        $data = input("post.");
        $model = new MarketingCouponModel();
        $res = $model -> allowField(true) -> save ($data,array('id'=>$data['id']));
        if ($res) {
			AjaxJson('操作成功', 0, 1, Cookie('Coupon'));
		} else {
			AjaxJson('操作失败');
		}
    }
    /**
     * 优惠券删除
     */
    public function delcoupon(){
        $id = input("id");
        $model = new MarketingCouponModel();
        $res = Db::name('coupon') -> delete($id);
        if($res) {
            AjaxJson('删除成功', 0, 1, Cookie('Coupon'));
        } else {
            AjaxJson('删除失败');
        }
    }
}