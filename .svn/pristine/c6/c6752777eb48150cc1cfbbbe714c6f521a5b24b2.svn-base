<?php
/**
 * Created by PhpStorm.
 * User: wangjinzeng
 * Date: 2019/6/12
 * Time: 9:26
 */

namespace app\api\controller\v1;


use app\common\model\Coupon;
use app\common\model\CouponUser;
use app\common\model\Device;
use app\common\model\Order;
use app\common\model\User;
use think\App;

class Index extends BaseController
{
    public $orderModel;
    public $couponModel;
    public $LModel;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->userModel = new User();
        $this->orderModel = new Order();
        $this->couponModel = new CouponUser();
        $this->LModel = new Device();
    }

    public function index()
    {
        try{
            $userinfo = $this->userModel->where('id',$this->input['user_id'])->find();
            $order = $this->orderModel->getOrderByUser($this->input['user_id']);
            $coupon = $this->couponModel->getUserCouponList($this->input['user_id']);
            if ($order){
                $status = $order['status'];
            }else{
                $status = 0;
            }
            $return_data = [
                'nike_name'=>$userinfo['nike_name'],
                'sex'=>$userinfo['sex'],
                'head_img'=>$userinfo['head_img'],
                'balance'=>$userinfo['balance'],
                'order_status'=>$status,
                'coupon_list'=>$coupon
            ];
            return returnMessage(0,'Success',$return_data);
        }catch (\Exception$e){

        }
    }

    /**
     * 租借
     */
    public function lease()
    {
        $order = $this->orderModel->getPayOrder($this->input['user_id']);
        if ($order){
            return returnMessage(1,'请先支付上一单',['order_id'=>$order]);
        }
//        $this->dModel
    }


}