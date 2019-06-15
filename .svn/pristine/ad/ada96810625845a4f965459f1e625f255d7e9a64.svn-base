<?php
/**
 * Created by PhpStorm.
 * User: wangjinzeng
 * Date: 2019/6/11
 * Time: 11:07
 */

namespace app\common\model;

class Order extends BaseModel
{
    protected $name = 'hospital';

    /**
     * 获取个人订单
     * @param $user_id
     * @return bool
     */
    public function getOrderByUser($user_id)
    {
        $order = $this->where('user_id',$user_id)->where('status','<>',3)->find();
        if ($order){
            return $order;
        }
        return false;
    }

    public function getPayOrder($user_id)
    {
        return  $this->where('user_id',$user_id)->where('status',2)->value('id');

    }
}