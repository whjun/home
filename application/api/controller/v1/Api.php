<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use think\Db;
use app\admin\model\UserInfoModel;
use app\admin\model\AdminCodeModel;
use app\admin\Controller\Pushtemplate;
use app\Sms;
use JPush\Client as JPush;
use wxsdk\wxsdk;
/**
 * @author czg
 * @date 2018-5-20
 */
class Api extends Controller
{
    public function _initialize(){
        //获取请求参数
        $request = Request::instance();
        $this->data = $request->param();
		if(!isset($this->data['open_id'])){
			$this -> ApiJson('没有传open_id参数值');
		}
		$this -> userinfo = Db::name('user_info')->where('openid_wap',$this->data['open_id'])->find();
		if(empty($this -> userinfo)){
			$this -> ApiJson('不存在此用户');
		}
    }

    /**
     * Api 接口数据返回
     * @param  $message 消息
     * @param  $resData 具体数据
     * @param  $result 0成功1失败
     * @return jsonRPCClient
     * @author lxy
     */
    static function ApiJson($message,$reData='',$result=0)
    {
        header('Content-Type:application/json; charset=utf-8');
        if ($reData == ''){
            $result = 1;
        }
        $value=array(
            'message'=>$message,
            'reData'=>$reData,
            'result'=>$result,
            'time'=>date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME'])
        );
        exit(json_encode($value));//转为json格式
    }
    /**
     * 检查验证码是否正确
     * @author czg
     * @param  $mobile 手机号
     * @date 2017-6-1 16:56:40
     */
    function CheckVerificationCode($mobile,$code){
        $result = Db::name('admin_code')->where('phone',$mobile)->where('code',$code)->find();
		if($result){
			Db::name('admin_code')->where('phone',$mobile)->where('code',$code)->delete();
			$deadline = $result['deadline'];
			if($deadline<time()){
	            $this->ApiJson('验证码已过期');
	        }
			return true;
		}else{
			$this->ApiJson('验证码错误');
		}
    }

    /**
     * 发送验证码
     * @author lxy
     * @param  $mobile 手机号
     * @param  $content 内容
     * @param  $code 验证码
     * @date 2017-6-1 18:03:56
     */
    function SendVerificationCode($mobile){

        //生成验证码
        $code = rand(100000,999999);

        $data['phone']=$mobile;
        $data['code']=$code;
		//3分钟过期
        $data['deadline']=time()+60*3;
		$model = new AdminCodeModel();
		$r = $model -> save($data);
		if($r){
			//发送短信
	        $sms = new Sms();
	        $re = @$sms->aliyun($mobile, $code);
			if ($re) {
	        	$this->ApiJson('发送成功',1);
	        }else{
	            $this->ApiJson('发送失败');
	        }
		}else{
			$this->ApiJson('发送失败');
		}

    }
    /**
     * 获取客户端ip
     * @return string
     */
    function getClientIP()
    {
        global $ip;
        if (getenv("HTTP_CLIENT_IP"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if(getenv("HTTP_X_FORWARDED_FOR"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if(getenv("REMOTE_ADDR"))
            $ip = getenv("REMOTE_ADDR");
        else $ip = "Unknow";
        return $ip;
    }

    /**
     * 获取邀请码
     * @author zrx 2017-7-3 09:27:113
     * @param $length 长度
     * @return string
     */
    function GetInviteCode( $length = 8 ) {
        // 字符集，可任意添加你需要的字符
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ( $i = 0; $i < $length; $i++ )
        {
            // 这里提供两种字符获取方式
            // 第一种是使用 substr 截取$chars中的任意一位字符；
            // 第二种是取字符数组 $chars 的任意元素
            // $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
            $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        //如果已有重新车生成
        if ($this->CheckInviteCode($password)){
            $this->GetInviteCode($length);
        }
        return $password;
    }

    /**
     * 获取商户标识
     * @author zrx 2017-8-3 14:14:40
     * @param $length 长度
     * @return string
     */
    function GetStoreCode( $length = 8 ) {
        // 字符集，可任意添加你需要的字符
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ( $i = 0; $i < $length; $i++ )
        {
            // 这里提供两种字符获取方式
            // 第一种是使用 substr 截取$chars中的任意一位字符；
            // 第二种是取字符数组 $chars 的任意元素
            // $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
            $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        //如果已有重新车生成
        if ($this->CheckStoreCode($password)){
            $this->GetStoreCode($length);
        }
        return $password;
    }

	 /**
     * 上传单张图片
     * @author lxy 2018-03-05 10:56:17
     * @param $file
     * @return string
     */
    public function upload($file,$uid=''){
//  	$file = current($file);
		$url = $this -> uploadfile($file,$uid);
		return $url;
    }
    /**
     * 上传单张图片
     * @author lxy 2018-03-05 10:56:17
     * @param $file
     * @return string
     */
    private function uploadfile($file,$uid=''){
    	if(!$uid){
    		$uid = session('admin_id');
    	}
    	//判断该图片是否上传过
    	$filemd5 = $file -> hash('md5');
		$res = Db::name('file_upload') -> where('md5', $filemd5) -> find();
		if($res){
			return $res['path'];
		}else{
			// 移动到框架应用根目录/public/uploads/ 目录下 10*1024*1024B(字节) = 10MB
	        $re = $file->validate(['size'=>10485760,'ext'=>'jpg,png,gif,jpeg,bmp'])->move(ROOT_PATH . 'public/uploads/imgs/');
	        if ($re) {
	            //上传成功
	            $url = '/uploads/imgs/'.$re->getSaveName();
                $data = array(
                    'name' => $re -> getInfo('name'),
                    'path' => str_replace('\\','/',$url),
                    'pathurl' => IMG_PATH . str_replace('\\','/',$url),
                    'size' => $re -> getSize(),
                    'ext' => $re -> getExtension(),
                    'uid' => $uid,
                    'md5' => $filemd5,
                    'create_time' => time(),
                    'update_time' => time(),
                );
                $r = Db::name('file_upload')->insert($data);
				if($r){
					return str_replace('\\','/',$url);
				}else{
					$this->error('图片存储失败');
				}
	        } else {
	            // 上传失败获取错误信息
	            $this->error($file->getError());
	        }
		}
    }

	public function video($file,$uid=''){
//		$file = current($file);
		if(!$uid){
    		$uid = session('admin_id');
    	}
		//判断该图片是否上传过
    	$filemd5 = $file -> hash('md5');
		$res = Db::name('file_upload') -> where('md5', $filemd5) -> find();
		if($res){
			return $res['path'];
		}else{
			// 移动到框架应用根目录/public/uploads/ 目录下 10*1024*1024B(字节) = 10MB
	        $re = $file->validate(['ext'=>'mp4,avi,flv,rmvb,mpg,3gp,mkv'])->move(ROOT_PATH . 'public/uploads/videos/');
	        if ($re) {
	            //上传成功
	            $url = '/uploads/videos/'.$re->getSaveName();
				$data = array(
					'name' => $re -> getInfo('name'),
					'path' => str_replace('\\','/',$url),
					'pathurl' => IMG_PATH . str_replace('\\','/',$url),
					'size' => $re -> getSize(),
					'ext' => $re -> getExtension(),
					'uid' => $uid,
					'md5' => $filemd5,
					'create_time' => time(),
					'update_time' => time(),
				);
				$r = Db::name('file_upload')->insert($data);
				if($r){
					return str_replace('\\','/',$url);
				}else{
					$this->error('视频存储失败');
				}
	        } else {
	            // 上传失败获取错误信息
	            $this->error($file->getError());
	        }
		}
	}

	/**
     * 上传多图片
     * @author lxy 2018-03-05 10:56:17
     * @param $file
     * @return string
     */
    public function uploads($files,$uid=''){
    	$results = array();
    	foreach($files as $k => $file){
            // 上传文件验证
            $result = $this->validate(['file' => $file], ['file'=>'require|image'],['file.require' => '请选择上传文件', 'file.image' => '非法图像文件']);
            if(true !== $result){
                //错误消息
                $this->error($result);
            }
            if ($file != ''){
				$results[$k] = $this -> uploadfile($file,$uid);
            }
        }
		return $results;
    }

    /*TODO**********************************高德地图Api开始*************************************/


















}

