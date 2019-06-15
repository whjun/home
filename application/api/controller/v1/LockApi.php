<?php
/**
 * Created by PhpStorm.
 * User: wangjinzeng
 * Date: 2019/6/13
 * Time: 9:20
 */

namespace app\api\controller\v1;


use think\App;
use think\Controller;


class LockApi extends Controller
{
    private $psk = 'be6f68a6dc33';
    private $http = 'http://e.epplink.com:9500';
    private $service;

    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->service = new Service();
    }

    /**
     * 通知接口
     * @return string
     */
    public function deviceEvent()
    {
        $data = input();
        $event = json_decode(html_entity_decode($data['event']), true);
        switch ($event['event']) {
            case 'register':
                return $this->service->register($event['data']);
                break;
            case 'online':
                return $this->service->online($event['data']);
                break;
            case 'offline':
                return $this->service->offline($event['data']);
                break;
            case 'lock_close':
                return $this->service->lockClose();
                break;
            case 'heartbeat':
                return $this->service->heartbeat($event['data']);
                break;
        }
    }

    /**
     * 生成access_token
     * @return string
     */
    private function getAccessToken()
    {
        return md5($this->psk . time());
    }

    /**
     * 生成妙计时间戳
     * @return int
     */
    public function getTimeStamp()
    {
        return time();
    }

    /**
     * 检测设备是否在线
     * @param $device_id
     * @param int $lock_id
     * @return bool
     */
    private function deviceStatus($device_id)
    {
        /**
         * 调用此接口时 先检测设备id是否正常 在检查锁是否正常
         */
        $url = $this->http . "/api/v1/device_status?timestamp=" . $this->getTimeStamp() . "&access_token=" . $this->getAccessToken();
        $data = ['device_id' => $device_id];
        $res = $this->returnData($url, $data);
        if ($res['code'] != 1) {
            return false;
        }
        return true;
    }

    /**
     * 检测锁状态
     * @param $device_id
     * @param $lock_id
     * @return mixed
     */
    private function lockStatus($device_id, $lock_id)
    {
        $url = $this->http . "/api/v1/lock_status?timestamp=" . $this->getTimeStamp() . "&access_token=" . $this->getAccessToken();
        $data = [
            'device_id' => $device_id,
            'lock_id' => $lock_id
        ];
        $res = $this->returnData($url, $data);
        if ($res['code'] != 1) {
            return false;
        }
        return true;
    }

    /**
     * @param $device_id
     * @param $lock_id
     * @return array|bool
     */
    public function lockOpen($device_id, $lock_id)
    {
        $device_status = $this->deviceStatus($device_id);
        if ($device_status === false) {
            $msg = ['code' => 0, 'msg' => '设备不在线'];
            return $msg;
        }
        $lock_status = $this->lockStatus($device_id, $lock_id);
        if ($lock_status === false) {
            $msg = ['code' => 0, 'msg' => '锁状态错误'];
            return $msg;
        }

        $url = $this->http . "/api/v1/lock_open?timestamp=" . $this->getTimeStamp() . "&access_token=" . $this->getAccessToken();
        $data = [
            'device_id' => $device_id,
            'lock_id' => $lock_id
        ];
        $res = $this->returnData($url, $data);
        if ($res['code'] == 1) {
            return true;
        }
        return false;
    }


    public function returnData($url, $data)
    {
        $data = json_encode($data);
        $res = $this->doCurl($url, $type = 1, $data);
        return $res;
    }


    function doCurl($url, $type = 0, $data = [])
    {
        # 初始化curl
        $ch = curl_init();
        # 设置选项
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:application/json;charset=utf-8', 'Content-Type:application/x-www-form-urlencoded', 'charset=utf-8'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        if ($type == 1) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }
        # 执行并获取
        $res = curl_exec($ch);
        pre($res);
        # 释放句柄s
        curl_close($ch);
        return json_decode($res, true);
    }

}