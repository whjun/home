<?php
/**
 * Created by PhpStorm.
 * User: wangjinzeng
 * Date: 2019/6/14
 * Time: 16:50
 */

namespace app\common\model;


use think\Model;

class CouponUser extends Model
{
    protected $name = 'coupon_by_user';

    public function getUserCouponList($user_id)
    {
        $list = $this->alias('A')
            ->join('zdc_coupon B','A.coupon_id=B.id')
            ->where('A.user_id',$user_id)
            ->where('A.is_use',0)
            ->field('A.id,B.coupon_name,B.max_money,B.cut_money,B.end_time')
            ->select();
        return $list;
    }
}