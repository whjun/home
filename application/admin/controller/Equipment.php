<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Db;
use think\facade\Request;
use app\common\model\Lock;
use app\admin\model\EquipmentHospitalModel;
use app\api\controller\v1\LockApi;
class Equipment extends Common {

    /**
     * 设备列表
     */
    public function equipmentlist(){
        Cookie('Equipment', request() -> url());
        $re = config('paginate.list_rows');
        $equipment_no = input("equipment_no");
        $equipment_name = input("equipment_name");
        $charge_name = input("charge_name");
        $area_id3 = input("area_id3");
        $status = input("status");
        $hospital_id = input("hospital_id");
        $where = array();
        //设备编号
        if(!empty($equipment_no)) {
            $where[] = array('d.equipment_no','like','%' . trim($equipment_no) . '%');
            $this -> assign($equipment_no);
        }
        //设备名称
        if(!empty($equipment_name)) {
            $where[] = array('d.equipment_name','like','%' . trim($equipment_name) . '%');
            $this -> assign($equipment_name);
        }
        //负责人
        if(!empty($charge_name)) {
            $where[] = array('d.charge_name','like','%' . trim($charge_name) . '%');
            $this -> assign($charge_name);
        }
        //所在地区
        if(!empty($area_id3)) {
            $where[] = array('d.area_id','like','%' . trim($area_id3) . '%');
            $this -> assign($area_id3);
        }
        //状态
        if(!empty($status)) {
            $where[] = array('d.status','like','%' . trim($status) . '%');
            $this -> assign($status);
        }
        //所属医院
        if(!empty($hospital_id)) {
            $where[] = array('d.hospital_id','like','%' . trim($hospital_id) . '%');
            $this -> assign($hospital_id);
        }
        $region = Db::name('admin_region') -> where('pid',0) -> select();
        $hospital = Db::name('hospital') -> select();
        $data = Db::name('device d') -> field('d.id,d.device_id,d.equipment_no,d.equipment_name,d.area_id,h.hospital_name,d.model_num,d.charge_name,d.charge_phone,d.status,r.name')->join('hospital h','d.hospital_id = h.id','LEFT') -> join('admin_region r','d.area_id = r.id','LEFT') -> where($where) -> order('d.id asc') -> group('d.id') -> paginate($re, false, array('query' => request() -> param()));

        $this -> assign('region',$region);
        $this -> assign('hospital',$hospital);
        $this -> assign('list',$data);
        return $this -> fetch();
    }
    /**
     * 设备编辑
     * @return void
     */
    public function editequipment() {
        Cookie('EditequiPment',request() -> url());
        $id = input('id');
        $device_id = input('device_id');
        $re = config('paginate.list_rows');
        $data[] = Db::name('device d') ->where('d.id',$id) -> field('d.id,d.device_id,d.equipment_no,d.equipment_name,d.area_id,h.hospital_name,d.model_num,d.charge_name,d.charge_phone,d.status')->join('hospital h','d.hospital_id = h.id','LEFT') -> order('d.id asc') -> group('d.id') -> find();
        $hospital = Db::name('hospital') -> select();
        $lock = Db::name('lock') -> where('device_id',$id) ->order('lock_num asc') -> paginate($re, false, array('query' => request() -> param()));
        $region = Db::name('admin_region') -> where('pid',0) -> select();

        $this -> assign("list",$data);
        $this -> assign("hospital",$hospital);
        $this -> assign('lock',$lock);
        $this -> assign('region',$region);
        return $this -> fetch();
    }
    /**
     * 柜门编辑
     * @return void
     */
    public function editlock() {
        $data = input('post.');
        $lock = Lock::where(['id'=>$data['id'],'lock_id'=>$data['lock_id']]) -> find();
        $lock -> lock_name = $data['lock_name'];
        $lock -> status = $data['status'];
        $res = $lock -> save();
        if ($res) {
			AjaxJson('操作成功', 0, 1, Cookie('EditequiPment'));
		} else {
			AjaxJson('操作失败');
		}
    }
    /**
     * 地区三级联动
     * @return void
     */
    public function region() {
        $idea = input('idea');
        if($idea == 1) {
            $top_id = input('top_id');
            $region = Db::name('admin_region') -> where('pid', $top_id) -> select();
        } elseif($idea == 2) {
            $top_id = input('top_id');
            $id = input('id');
            $region = Db::name('admin_region') -> where('pid', $id) -> select();
        }
        return $region;
        // return json_encode($region,JSON_UNESCAPED_UNICODE);
    }
    /**
     * 保存编辑设备信息
     * @return void
     */
    public function edite() {
        Db::startTrans();
        $data = input('get.');
        // $area_id = $data['data1'] . ',' . $data['data2'] . ',' . $data['select3'];
        $device_money = $data['money'].'/'.$data['minute'];
        $device_data = [
            'equipment_name' => $data['equipment_name'],
            'hospital_id' => $data['hospital'],
            'charge_name' => $data['charge_name'],
            'charge_phone' => $data['charge_phone'],
            'free_time' => $data['free_time'],
            'area_id' => $data['select3'],
            'money' => $device_money
        ];
        $lock_id = input('l_id');
        $lock_name = input('lock_name');
        $count = count($lock_id);
        try {
                $device = Db::name('device') -> where(['id'=>$data['d_id'],'device_id'=>$data['device_id']]) -> update($device_data);
                if(!$device){
                    //抛出错误信息
                    throw new \Exception('修改失败!');
                }
                for($i = 0; $i < $count; $i++) {
                    $lock['id'] = $lock_id[$i];
                    $lock['lock_name'] = $lock_name[$i];
                    $lock_data = lock::update($lock);
                }
                if(!$lock_data){
                    throw new \Exception('修改失败!');
                }
                Db::commit(); //提交事务
            } catch (\PDOException $e) {
               Db::rollback(); //回滚事务
        }
        $this -> redirect(Cookie('Equipment'));
    }
    /**
     * 维修记录
     * @return void
     */
    public function equipmentfault(){
        Cookie('Fault', request() -> url());
        $re = config('paginate.list_rows');
        $hospital = Db::name('hospital') -> select();
        $region = Db::name('admin_region') -> where('pid',0) -> select();
        $lock = Db::name('lock') -> select();
        $device = Db::name('device') -> select();
        $data = Db::name('fault f') -> field('f.id,f.fault_cause,f.fault_desc,f.create_time,f.user_name,f.oddnumbers,f.tel,f.status,h.hospital_name,d.equipment_no,d.charge_name,d.charge_phone,l.lock_name,r.name') -> join('device d', 'f.d_id = d.id',"LEFT") -> join('hospital h', 'd.hospital_id = h.id','LEFT') -> join('lock l','f.lock_id = l.id','LEFT') -> join('admin_region r','f.region_id = r.id','LEFT') -> order('f.id asc') -> paginate($re, false, array('query' => request() -> param()));
        $this -> assign('list',$data);
        $this -> assign('device',$device);
        $this -> assign("lock",$lock);
        $this -> assign('region',$region);
        $this -> assign('hospital',$hospital);
        return $this -> fetch();
    }
    /**
     * 添加维修记录
     * @return void
     */
    public function addfault() {
        $data = input('post.');
        $datatime = date('Y-m-d h:i:s');
        $oddnumbers = date('YmdHis') . rand(10000000,99999999);
        $fault = [
            'region_id' => $data['data3'],
            'd_id' => $data['equipment_no'],
            'lock_id' => $data['lock_num'],
            'fault_cause' => $data['fault_cause'],
            'fault_desc' => $data['desc'],
            'create_time' => $datatime,
            'oddnumbers' => $oddnumbers,
        ];
        $res = Db::name('fault') -> insert($fault);
        dump($res);
    }
    /**
     * 医院管理
     */
    public function equipmenthospital() {
        Cookie('Equipmenthospital', request() -> url());
        $re = config();
        $level = input('level', 1);
        $id = input('id');
        $parentid = input('parentid', 0);
        $where = array();
        if(empty($id)){
            $where['level'] = $level;
            $this -> assign('level',$level);
         }else{
             $where['level'] = array('gt', $level);
             $where['pid'] = $id;
             $this -> assign('level', ++$level);
         }
         $list = Db::name('hospital') -> field('h.id,h.hospital_name,h.desc,count(d.hospital_id) count') -> alias('h') -> join('device d','h.id = d.hospital_id','LEFT') -> order('h.id asc') -> group('h.id') -> paginate($re, false, array('query' => request() -> param()));
         $this -> assign('pid', $parentid);
         $this -> assign('list', $list);
        return $this -> fetch();
    }
    /**
     * 添加医院
     */
    public function addhospital() {
        $data = input('post.');
        $model = new EquipmentHospitalModel();
        $res = $model -> allowField(true) -> save($data);
        if($res) {
            AjaxJson('操作成功', 0, 1, Cookie('Equipmenthospital'));
        } else {
            AjaxJson('操作失败');
        }
    }
    /**
     * 删除医院
     */
    public function deletehospital() {
        $id = input("id");
        $model = new EquipmentHospitalModel();
        $res = Db::name('hospital') -> delete($id);
        if($res) {
            AjaxJson('删除成功', 0, 1, Cookie('Equipmenthospital'));
        } else {
            AjaxJson('删除失败');
        }
    }
    /**
     * 编辑医院
     */
    public function edithospital() {
        $data = input('post.');
        $model = new EquipmentHospitalModel();
        $res = $model -> allowField(true) -> save ($data,array('id'=>$data['id']));
        if ($res) {
			AjaxJson('操作成功', 0, 1, Cookie('Equipmenthospital'));
		} else {
			AjaxJson('操作失败');
		}
    }
}