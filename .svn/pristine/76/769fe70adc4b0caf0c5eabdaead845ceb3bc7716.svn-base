<?php
namespace app\admin\controller;
use app\common\lib\IAuth;
use think\Controller;
use think\facade\Request;
use think\facade\Session;
use think\Db;
/**
 * 
 * 管理员模块
 * 
 * 2017-8-15 09:31:21
 */

class Common extends Controller
{
	public function initialize(){
		 //判断用户是否已经登录
	    if (empty(session('admin_id'))) {
	        $this->error('对不起,您还没有登录!请先登录', url('index/login'), 1);
	    }
		$this -> assign('menulist',json_decode(session('menus'),true));
		
  	}
	
	 /**
     * 上传单张图片
     * @author lxy 2018-03-05 10:56:17
     * @param $file
     * @return string
     */
    public function upload($file){
    	$file = current($file);
		$url = $this -> uploadfile($file);
		return $url;
    }
	/**
     * 上传多图片
     * @author lxy 2018-03-05 10:56:17
     * @param $file
     * @return string
     */
    public function uploads($files){
    	$result = array();
    	foreach($files as $k => $file){
            // 上传文件验证
            if ($file != ''){
				$result[$k] = $this -> uploadfile($file);
            }
        }
		return $result;
    }
	/**
	 * 公共方法
	 */
    private function uploadfile($file){
    	//判断该图片是否上传过
    	$filemd5 = $file -> hash('md5');
		$res = Db::name('admin_upload') -> where('md5', $filemd5) -> find();
		if($res){
			return $res;
		}else{
			// 移动到框架应用根目录/public/uploads/ 目录下 10*1024*1024B(字节) = 100MB
			$extension = strtolower(pathinfo($file->getInfo('name'), PATHINFO_EXTENSION));
			$catalog = '/uploads/'.$extension.'/';
	        $re = $file->validate(['size'=>104857600,'ext'=>'jpg,png,gif,jpeg,bmp,rar,zip,7z,txt,doc,xls,ppt,pdf'])->move(ROOT_PATH . 'public'.$catalog);
	        if ($re) {
	            //上传成功
	            $url = $catalog.$re->getSaveName();
				$data = array(
					'name' => $re -> getInfo('name'),
					'path' => str_replace('\\','/',$url),
					'pathurl' => IMG_PATH . str_replace('\\','/',$url),
					'size' => $re -> getSize(),
					'ext' => $re -> getExtension(),
					'uid' => session('admin_id'),
					'type' => 1,
					'md5' => $filemd5,
					'create_time' => time(),
					'update_time' => time(),
				);
				$r = Db::name('admin_upload')->insert($data);
				if($r){
					return $data;
				}else{
					$this->error('图片存储失败');
				}
	        } else {
	            // 上传失败获取错误信息
	            $this->error($file->getError());
	        }
		}
    }
	public function video($file){
		$file = current($file);
		//判断该图片是否上传过
    	$filemd5 = $file -> hash('md5');
		$res = Db::name('file_upload') -> where('md5', $filemd5) -> find();
		if($res){
			return $res;
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
					'uid' => session('admin_id'),
					'md5' => $filemd5,
					'type' => 1,
					'create_time' => time(),
					'update_time' => time(),
				);
				$r = Db::name('file_upload')->insert($data);
				if($r){
					return $data;
				}else{
					$this->error('视频存储失败');
				}
	        } else {
	            // 上传失败获取错误信息
	            $this->error($file->getError());
	        }
		}
	}
    
}
