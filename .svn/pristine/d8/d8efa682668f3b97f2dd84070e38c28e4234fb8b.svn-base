<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\AdminUploadModel;
use think\Db;
use think\facade\Request;

/**
 * 通用
 *
 * 上传文件控制器
 *
 * 2018年9月15日14:36:02
 */
class Upload extends Common {
	/**
	 * 后台上传单文件
	 * @author czg
	 */
	public function uploadFile() {
		$file = request() -> file();
		$file = current($file);
		$res = $this -> uploadFileBase($file);
		AjaxJson('上传成功', 0, $res, '');
	}
	
	/**
	 * 后台上传多文件
	 * @author czg
	 */
	public function uploadFiles() {
		$files = request() -> file();
		$result = array();
    	foreach($files as $k => $file){
            // 上传文件验证
            if ($file != ''){
				$result[$k] = $this -> uploadFileBase($file);
            }
        }
		AjaxJson('上传成功', 0, $result, '');
	}
	
	/**
	 * 文件上传通用方法
	 * @author czg
	 */
    private function uploadFileBase($file){
    	//判断该图片是否上传过
    	$filemd5 = $file -> hash('md5');
		$res = Db::name('admin_upload') -> where('md5', $filemd5)->where('ext','in',array('jpg,png,gif,jpeg,bmp')) -> find();
		if($res){
			return $res;
		}else{
			// 移动到框架应用根目录/public/uploads/ 目录下 10*1024*1024B(字节) = 100MB
			$extension = strtolower(pathinfo($file->getInfo('name'), PATHINFO_EXTENSION));
			$catalog = '/uploads/'.$extension.'/';
	        $re = $file->validate(['size'=>104857600,'ext'=>'jpg,png,gif,jpeg,bmp,rar,zip,7z,txt,doc,docx,xls,xlsx,csv,ppt,pptx,pdf,mp4,avi,flv,rmvb,mpg,3gp,mkv'])->move(ROOT_PATH . 'public'.$catalog);
	        if ($re) {
	            //上传成功
	            $url = $catalog.$re->getSaveName();
				$data = array(
					'name' => $re -> getInfo('name'),
					'path' => str_replace('\\','/',$url),
					'pathurl' => IMG_PATH . str_replace('\\','/',$url),
					'size' => $re -> getSize(),
					'ext' => $re -> getExtension(),
					'md5' => $filemd5,
					'create_time' => date('Y-m-d H:i:s'),
					'update_time' => date('Y-m-d H:i:s'),
				);
				$r = AdminUploadModel::create($data);
				if($r){
					return $data;
				}else{
					AjaxJson('图片存储失败');
				}
	        } else {
	            // 上传失败获取错误信息
	            AjaxJson($file->getError());
	        }
		}
    }
}



