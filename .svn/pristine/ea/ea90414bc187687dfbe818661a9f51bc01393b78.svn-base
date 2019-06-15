<?php
/**
 * Created by PhpStorm.
 * User: wangjinzeng
 * Date: 2019/6/14
 * Time: 10:23
 */

namespace app\api\controller\v1;


use app\common\model\Device;
use app\common\model\Lock;
use think\App;
use think\Controller;
use think\Db;

class Service extends Controller
{
    private $Dmodel;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->Dmodel = new Device();
    }

    public function register($data)
    {
        if ($data['device_model'] == 'MTK9531'){
            $model_num = 10;
        }
        Db::startTrans();
        $save_data = [
            'device_id'=>$data['device_id'],
            'device_model'=>$data['device_model'],
            'equipment_no'=>$data['device_id'],
            'model_num'=>$model_num,
            'status'=>2,
            'create_time'=>date('Y-m-d H:i:s',time())
        ];
        $res = $this->Dmodel->save($save_data);
        $devic_id = $this->Dmodel->getId();
//        pre($devic_id);
        if (!$res){
            return json_encode(['code'=>2,'reason'=>'注册失败']);
        }
        for ($i = 1;$i<$model_num + 1;$i++){
            $save_lock_data[] = [
                'device_id'=>$devic_id,
                'lock_num'=>$i,
                'status'=>4,
                'create_time'=>date('Y-m-d H:i:s',time())
            ];
        }

        $lock_res = (new Lock())->saveAll($save_lock_data);
        if (!$lock_res){
            return json_encode(['code'=>2,'reason'=>'注册失败']);
        }
        Db::commit();
        return json_encode(['code'=>1,'reason'=>'Success']);
    }

    public function online($data)
    {
        $device = $this->getDevice($data);
        if ($device['status'] != 1 ){
           $res =  $this->Dmodel->save(['status'=>1],['device_id'=>$data['device_id']]);
           if ($res){
               return json_encode(['code'=>1,'reason'=>'Success']);
           }
        }
    }

    public function offline($data)
    {
        $device = $this->getDevice($data);
        if ($device['status'] != 1 ){
            $res = $this->Dmodel->save(['status'=>2],['device_id'=>$data['device_id']]);
            if ($res){
                return json_encode(['code'=>1,'reason'=>'Success']);
            }
        }
    }

    public function lockClose()
    {

    }

    public function heartbeat($data)
    {
        $res = $this->getDevice($data);
        if (!$res){
            $this->register($data);
        }
    }

    public function getDevice($data)
    {
        try{
            $res = $this->Dmodel->where('device_id',$data['device_id'])->find();
            return $res;
        }catch (\Exception$e){
            return false;
        }
    }

}