<?php
namespace app\api\controller\v1;
use think\Controller;
use app\admin\model\UserInfoModel;
use app\admin\controller\Pushtemplate;
use think\Request;
use think\Db;
use wxsdk\wxsdk;
use wxpay\wxpay;
use think\Log;
header("Content-type: json/html; charset=utf-8");
header("Access-Control-Allow-Origin:*");
define("TOKEN", "wechat");
class Wechat extends Controller {
	
	public function _initialize(){
        //获取请求参数
        $request = Request::instance();
        $this->data = $request->param();
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
	
	public function index() {
		$request = Request::instance();
		$param = $request -> param();
		//第一次验证token
		if ($this -> checkSignature() && isset($param["echostr"])) {
			echo $param["echostr"];
			exit ;
		}
		$msgparam = file_get_contents("php://input");
		$wxmsg = new wxsdk();
		$data = $wxmsg -> FromXml($msgparam);
		$type = $data['MsgType'];
		//事件推送
		if ($type == 'event') {
			$event = $data['Event'];
			if ($event == 'subscribe') {
				//关注事件
				$openid = $data['FromUserName'];
				$userinfo = Db::name('user_info') -> where('openid_wap', $openid) -> find();
				if (empty($userinfo)) {
					//添加新用户
					$info = $wxmsg -> getUserInfo($openid);
					$userinfo['nickname'] = base64_encode($info['nickname']);
					$userinfo['openid_wap'] = $info['openid'];
					$userinfo['sex'] = $info['sex'] == 1 ? 0 : 1;
					$userinfo['head_pic'] = $info['headimgurl'];
					$userinfo['country'] = $info['country'];
					$userinfo['city'] = $info['city'];
					$userinfo['province'] = $info['province'];
					$userinfo['unionid'] = isset($info['unionid']) ? $info['unionid'] : '';
					$model = new UserInfoModel();
					$model -> save($userinfo);
				}
				if (isset($data['EventKey']) && !empty($data['EventKey'])) {
					//扫码关注事件
					$userscene = substr($data['EventKey'], 8);
					$userarr = explode('_', $userscene);
					$scene = $userarr[0];
					$user_id = $userarr[1];
					//推广人id
					//可以进行一些事件推送
				}
				$wxmsg -> sendText($data, '你好，感谢您的关注！');
			} elseif ($event == 'SCAN') {
				//已关注的扫码事件
				if (isset($data['EventKey'])) {
					//扫码关注事件
					$userscene = substr($data['EventKey'], 8);
					$userarr = explode('_', $userscene);
					$scene = $userarr[0];
					$user_id = $userarr[1];
					//推广人id
					//可以进行一些事件推送
				}
			} elseif ($event == 'unsubscribe') {
				//取消关注
				Log::record('你怎么忍心取消关注');
			}
		} else {
//			if ($data['Content'] == '图片') {
//				$wxmsg -> sendImg($data);
//			}
//			if ($data['Content'] == '视频') {
//				$wxmsg -> sendVideo($data);
//			}
//			if ($data['Content'] == '语音') {
//				$wxmsg -> sendVoice($data);
//			}
//			if ($data['Content'] == '音乐') {
//				$wxmsg -> sendMusic($data);
//			}
//			if ($data['Content'] == '图文') {
//				$wxmsg -> sendImgText($data);
//			}
//			if ($data['Content'] == '二维码') {
//				$user_id = Db::name('user_info') -> where('openid_wap', $data['FromUserName']) -> value('id');
//				$wxmsg -> WxQrcode($data, 'user', $user_id);
//			}
//			if ($data['Content'] == '订单') {
//				Pushtemplate::buy_success(20);
//			}
//			if ($data['Content'] == '成功') {
//				Pushtemplate::refund_success(21);
//			}
//			if ($data['Content'] == '失败') {
//				Pushtemplate::refund_fail(22);
//			}
//			if ($data['Content'] == '发货') {
//				Pushtemplate::delivery_order(20);
//			}
//			if ($data['Content'] == '展览') {
//				Pushtemplate::appoint_exhibt();
//			}
			//文本消息
			$wxmsg -> sendText($data, '你好，感谢您的关注！');
		}
	}

	private function checkSignature() {

		$signature = $_GET["signature"];

		$timestamp = $_GET["timestamp"];

		$nonce = $_GET["nonce"];

		$token = TOKEN;

		$tmpArr = array($token, $timestamp, $nonce);

		sort($tmpArr);

		$tmpStr = implode($tmpArr);

		$tmpStr = sha1($tmpStr);

		if ($tmpStr == $signature) {

			return true;

		} else {

			return false;

		}

	}

	/**
	 * 授权
	 */
	public function GoAuth() {
		$this -> appid = 'wxa72808045ca703b2';
		$this -> secret = '10edd2d6a4294afebdecd1a5c8ad3156';
		$code = request() -> param('code', '');
		$redirect_url = 'http://'.$_SERVER['HTTP_HOST'].'/public/yishupin_web/index.html';//首页
		$type = request() -> param('type');
		$goods_id = request() -> param('goods_id');//商品详情页
		$exhibt_id = request() -> param('exhibt_id');//展览详情页
		$order_id = request() -> param('order_id');//订单详情页
		$art_id = request() -> param('art_id');//艺术家详情
		if ($type==1) {
			//品器云展
			$redirect_url = 'http://'.$_SERVER['HTTP_HOST'].'/public/yishupin_web/index.html';
		}else if($type==2){
			//品器商城
			$redirect_url = 'http://'.$_SERVER['HTTP_HOST'].'/public/yishupin_web/shop-index.html';
		}else if($type==3){
			//个人中心
			$redirect_url = 'http://'.$_SERVER['HTTP_HOST'].'/public/yishupin_web/me-index.html';
		}
		if(!empty($goods_id)){
			//商品详情页
			$redirect_url = 'http://'.$_SERVER['HTTP_HOST'].'/public/yishupin_web/shop-details.html?id='.$goods_id.'&type=2';
		}
		if(!empty($exhibt_id)){
			//展览详情页
			$redirect_url = "http://".$_SERVER['HTTP_HOST']."/public/yishupin_web/index-exh-details.html?id=".$exhibt_id."&type=3";
		}
		if(!empty($order_id)){
			//订单详情页
			$redirect_url = "http://".$_SERVER['HTTP_HOST']."/public/yishupin_web/me-order-details.html?order_id=".$order_id;
		}
		if(!empty($art_id)){
			//艺术家详情页
			$redirect_url = "http://".$_SERVER['HTTP_HOST']."/public/yishupin_web/artist-details.html?art_id=".$art_id;
		}
		if (empty($code)) {
			$backurl = request() -> url(true);
			$backurl = urlencode(iconv("gbk", "UTF-8", $backurl));
			$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $this -> appid . '&redirect_uri=' . $backurl . '&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
			$this -> redirect($url);
		} else {
			$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $this -> appid . '&secret=' . $this -> secret . '&code=' . $code . '&grant_type=authorization_code';
			$res = getJson($url);
			if (isset($res['errcode'])) {
				$this -> ApiJson('用户信息获取失败');
			} else {
				//获取用户信息
				$openid = $res['openid'];
				$accessToken = $res['access_token'];
				$url = "https://api.weixin.qq.com/sns/userinfo?access_token=$accessToken&openid=$openid&lang=zh_CN";
				$userInfo = getJson($url);
				if (isset($res['errcode'])) {
					$this -> ApiJson('用户信息获取失败');
				} else {
					$data['nickname'] = base64_encode($userInfo['nickname']);
					$data['openid_wap'] = $userInfo['openid'];
					$data['sex'] = $userInfo['sex'] == 1 ? 0 : 1;
					$data['head_pic'] = $userInfo['headimgurl'];
					$data['country'] = $userInfo['country'];
					$data['city'] = $userInfo['city'];
					$data['province'] = $userInfo['province'];
					$data['unionid'] = isset($userInfo['unionid']) ? $userInfo['unionid'] : '';
					//判断用户是否注册
					$info = Db::name('user_info') -> where('openid_wap', $data['openid_wap']) -> find();
					if (empty($info)) {
						//用户注册
						$model = new UserInfoModel();
						$r = $model -> save($data);
						if ($r) {
							$info['openid_wap'] = $data['openid_wap'];
							$info['id'] = $model -> id;
						} else {
							$this -> ApiJson('用户注册失败');
						}
					}
					//跳转地址
					if(!empty($goods_id)||!empty($exhibt_id)||!empty($order_id)||!empty($art_id)){
						$redirect_url = $redirect_url . '&user_id=' . $info['id'] . '&open_id=' . $info['openid_wap'];
					}else{
						$redirect_url = $redirect_url . '?user_id=' . $info['id'] . '&open_id=' . $info['openid_wap'];
					}
					$this -> redirect($redirect_url);
				}

			}
		}
	}

	/**
	 * 获取微信网页调用jsAPI的config签名
	 */
	public function getSignPackage() {
		$wxsdk = new wxsdk();
		$data = $this -> data;
		$url = $data['url'];
		$res = $wxsdk -> getSignPackage($url);
		$res['url'] = $url;
		\think\Log::record($res, 'wx_getuserinfo');
		$this -> ApiJson('请求成功', $res);
	}

	/*
	 * 定时任务
	 * @author czg
	 *
	 */
	public function timing() {
		$data = $this -> data;
		if (isset($data['token'])&&$data['token'] != 'YSP') {
			Log::record('不合法定时');
		}
		//展览预约推送
		Pushtemplate::appoint_exhibt();
		//更新展览状态
		updateExhibt();
	}

	/*
	 * 微信支付回调
	 */
	public function wx_notify() {
		//接受参数
		$data = $GLOBALS['HTTP_RAW_POST_DATA'];
		if (empty($data)) {
			$data = file_get_contents("php://input");
		}
		$wxpay = new wxpay();
		if (!empty($data)) {
			$data = $wxpay -> FromXml($data);
			//签名验证
			$check_res = $wxpay -> CheckSign($data);
			if ($data['return_code'] == 'SUCCESS' && $check_res) {
				//更改订单状态
				$order_sn = $data['out_trade_no'];
				$transaction_id = $data['transaction_id'];
				//微信订单号
				$orderinfo = Db::name('order_info') -> where('order_sn', $order_sn) -> where('order_status', 1) -> find();
				if (empty($orderinfo)) {
					die ;
				}
				Db::startTrans();
				try {
					//判断订单类型
					if ($orderinfo['pid'] == 0) {
						//更改主订单状态
						Db::name('order_info') -> where('id', $orderinfo['id']) -> update(array('pay_time' => date('Y-m-d H:i:s'), 'pay_code' => 'wxpay', 'order_status' => 2, 'transaction_id' => $transaction_id));
						//更改子订单状态
						$order_son = Db::name('order_info') -> where('pid', $orderinfo['id']) -> where('order_status', 1) -> select();
						foreach ($order_son as $val) {
							$param['order_status'] = 2;
							$param['transaction_id'] = $transaction_id;
							if ($val['type'] == 1 && floatval($val['total_price']) == 0) {
								Db::name('order_info') -> where('id', $val['id']) -> update($param);
							} else {
								$param['pay_code'] = 'wxpay';
								$param['pay_time'] = date('Y-m-d H:i:s');
								Db::name('order_info') -> where('id', $val['id']) -> update($param);
							}
							//商品减库存加销量
							$goods = Db::name('order_goods') -> where('order_id', $val['id']) -> select();
							foreach ($goods as $v) {
								$info = Db::name('goods_info') -> where('id', $v['goods_id']) -> field('stock,sales_num') -> find();
								if (!empty($info)) {
									$good['stock'] = (floatval($info['stock']) > floatval($v['goods_num'])) ? (floatval($info['stock']) - floatval($v['goods_num'])) : 0;
									$good['sales_num'] = floatval($info['sales_num']) + floatval($v['goods_num']);
									Db::name('goods_info') -> where('id', $v['goods_id']) -> update($good);
								}
							}
							//用户消费金额累加
							$userinfo = Db::name('user_info') -> where('id', $val['user_id']) -> find();
							//用户积分抵扣
							if ($val['type'] == 1) {
								$user['score'] = floatval($userinfo['score']) > floatval($val['score_num']) ? (floatval($userinfo['score']) - floatval($val['score_num'])) : 0;
								$rate = Db::name('admin_config') -> where('name', 'send_score') -> value('value');
								if (empty($rate)) {
									$rate = 0.1;
								}
								$user['score'] = ceil($user['score']) + ceil($val['total_price'] * floatval($rate));
							}
							$user['monetary'] = floatval($userinfo['monetary']) + $val['total_price'];
							Db::name('user_info') -> where('id', $val['user_id']) -> update($user);
							//推送信息
							Pushtemplate::buy_success($val['id']);
						}
					} else {
						//更改主订单状态
						Db::name('order_info') -> where('id', $orderinfo['id']) -> update(array('pay_time' => date('Y-m-d H:i:s'), 'pay_code' => 'wxpay', 'order_status' => 2, 'transaction_id' => $transaction_id));
						//商品减库存加销量
						$goods = Db::name('order_goods') -> where('order_id', $orderinfo['id']) -> select();
						foreach ($goods as $v) {
							$info = Db::name('goods_info') -> where('id', $v['goods_id']) -> field('stock,sales_num') -> find();
							if (!empty($info)) {
								$good['stock'] = (floatval($info['stock']) > floatval($v['goods_num'])) ? (floatval($info['stock']) - floatval($v['goods_num'])) : 0;
								$good['sales_num'] = floatval($info['sales_num']) + floatval($v['goods_num']);
								Db::name('goods_info') -> where('id', $v['goods_id']) -> update($good);
							}
						}
						//用户消费金额累加
						$userinfo = Db::name('user_info') -> where('id', $orderinfo['user_id']) -> find();
						//用户积分抵扣
						if ($orderinfo['type'] == 1) {
							$user['score'] = floatval($userinfo['score']) > floatval($orderinfo['score_num']) ? (floatval($userinfo['score']) - floatval($orderinfo['score_num'])) : 0;
							$rate = Db::name('admin_config') -> where('name', 'send_score') -> value('value');
							if (empty($rate)) {
								$rate = 0.1;
							}
							$user['score'] = ceil($user['score']) + ceil($orderinfo['total_price'] * floatval($rate));
						}
						$user['monetary'] = floatval($userinfo['monetary']) + $orderinfo['total_price'];
						Db::name('user_info') -> where('id', $orderinfo['user_id']) -> update($user);
						//推送信息
						Pushtemplate::buy_success($orderinfo['id']);
					}
					Db::commit();
				} catch(\Exception $e) {
					Db::rollback();
				}
			}
		}
	}

	/**
     * 分享
     * @author  czg
     * @date  2018-5-16 14:22:48
	 * param id(商品id|展览id) type(1普通页面  2商品详情  3展览详情 4艺术家详情) 
     */
    public function goods_share(){
    	$data = $this -> data;
		$id = $data['id'];
		$type = $data['type'];
		$info = array();
		if(empty($type)||empty($id)){
			//普通页面
			$info['name'] = Db::name('admin_config')->where('name','share_name')->value('value');
			$info['remark'] = Db::name('admin_config')->where('name','share_remark')->value('value');
			$info['cover'] = Db::name('admin_config')->where('name','share_logo')->value('value');
			$info['url'] = 'http://'.$_SERVER['HTTP_HOST'].'/public/index.php/v1/GoAuth?type=1';
			$info['cover'] = 'http://'.$_SERVER['HTTP_HOST'].'/public'.$info['cover'];
		}elseif($type==2&&!empty($id)){
			$info = Db::name('goods_info')->where('id',$id)->field('cover,name,id,remark')->find();
			$info['url'] = 'http://'.$_SERVER['HTTP_HOST'].'/public/index.php/v1/GoAuth?goods_id='.$info['id'];
			$info['cover'] = 'http://'.$_SERVER['HTTP_HOST'].'/public'.$info['cover'];
			unset($info['id']);
		}elseif($type==3&&!empty($id)){
			$info = Db::name('admin_exhibition')->where('id',$id)->field('id,cover,name,remark')->find();
			$info['remark'] = $info['name'].'期待您的参与';
			$info['url'] = 'http://'.$_SERVER['HTTP_HOST'].'/public/index.php/v1/GoAuth?exhibt_id='.$info['id'];
			$info['cover'] = 'http://'.$_SERVER['HTTP_HOST'].'/public'.$info['cover'];
			unset($info['id']);
		}elseif($type==4&&!empty($id)){
			$info = Db::name('art_info')->where('id',$id)->field('id,cover,name,remark')->find();
			$info['url'] = 'http://'.$_SERVER['HTTP_HOST'].'/public/index.php/v1/GoAuth?art_id='.$info['id'];
			$info['cover'] = 'http://'.$_SERVER['HTTP_HOST'].'/public'.$info['cover'];
			unset($info['id']);
		}
		$this->ApiJson("请求成功",$info);
    }

	/**
     * 记录分享次数
     * @author  czg
     * @date  2018-8-22 14:22:48
	 * param id(商品id|展览id) type(1普通页面  2商品详情  3展览详情) 
     */

}
?>