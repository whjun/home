<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

//发送验证码
Route::rule(':version/sendcode', 'api/:version.Register/sendCode');//ok
//首页统计
Route::rule(':version/home_page', 'api/:version.HomePage/statistics');//ok
////登陆注册
Route::rule(':version/register', 'api/:version.Register/register');//ok

////设置密码
Route::rule(':version/setpassword', 'api/:version._personal/setPassword');//ok
//忘记密码
Route::rule(':version/forget_password','api/:version.Register/forgetPassword');//ok

//工程师注册
Route::rule(':version/engineer', 'api/:version.Engineer/registerEngineer');//ok
//我的消息
Route::rule(':version/message', 'api/:version._personal/getMessage');
//上产头像
Route::rule(':version/up_head_portrait', 'api/:version._personal/setHeadPortrait');
//去回访
Route::rule(':version/ticket', 'api/:version.ReturnTicket/saveTicket');//ok
//设置修改支付密码
Route::rule(':version/up_password', 'api/:version._personal/upPayPassword');
//个人中心首页
Route::rule(':version/isndex_s', 'api/:version._personal/index');//ok
//回访单详情
Route::rule(':version/return_ticket_details', 'api/:version.ReturnTicket/getReturnTicket');//ok
//回访单列表
Route::rule(':version/t_list', 'api/:version.ReturnTicket/ticketList');//ok
//重新注册
Route::rule(':version/reregister', 'api/:version.Engineer/reRegister');
//知识库详情
Route::rule(':version/article_info', 'api/:version._personal/articleInfo');//ok
//知识库列表
Route::rule(':version/article_list', 'api/:version._personal/articleList');//pk
//个人资料
Route::rule(':version/my_info', 'api/:version._personal/myInfo');//ok
//修改手机号
Route::rule(':version/up_phone', 'api/:version._personal/upPhone');
//修改登陆密码
Route::rule(':version/up_login_password', 'api/:version._personal/upPassword');//ok
//删除消息
Route::rule(':version/del_message', 'api/:version._personal/deMessage');
//修改生日
Route::rule(':version/up_birthday', 'api/:version._personal/upBirthday');//ok
//设置身份证号
Route::rule(':version/set_id_number', 'api/:version._personal/setIdNumber');//ok
//设置名字
Route::rule(':version/up_name', 'api/:version._personal/upName');//ok
//修改性别
Route::rule(':version/up_sex', 'api/:version._personal/upSex');//ok
//修改地址
Route::rule(':version/up_address', 'api/:version._personal/upAddress');//ok
//设置支付密码
Route::rule(':version/up_pay', 'api/:version._personal/upPayPassword');
//找回支付密码
Route::rule(':version/find_pay', 'api/:version._personal/findPayPassword');
//绑定支付宝账号
Route::rule(':version/band_pay', 'api/:version._personal/bandAliForUser');
//解绑支付宝账号
Route::rule(':version/relieve_pay', 'api/:version._personal/relieve');
//发起提现
Route::rule(':version/withdraw_deposit', 'api/:version._personal/withdrawDeposit');
//抢单列表
Route::rule(':version/order_receiving', 'api/:version.Indent/getOrder');
////订单详情
Route::rule(':version/oinfo', 'api/:version.Indent/orderInfo');
////接单
Route::rule(':version/affirm', 'api/:version.Indent/affirmOrder');
//配件表
Route::rule(':version/accessories_list', 'api/:version.Indent/getAccessories');
//发起提现
Route::rule(':version/cash', 'api/:version.Cash/withdrawDeposit');
//改约
Route::rule(':version/alfer', 'api/:version.Indent/alfer');
//开始维修
Route::rule(':version/arrive_place', 'api/:version.Indent/arrivePlace');
//维修类别
Route::rule(':version/service_type', 'api/:version.Indent/serviceType');
//完成订单
Route::rule(':version/finish_service', 'api/:version.Indent/service');
//使用配件
Route::rule(':version/save_accessory', 'api/:version.Indent/saveAccessory');
//评论
Route::rule(':version/evaluate', 'api/:version.Indent/evaluate');
//收款
Route::rule(':version/finish_pay', 'api/:version.Indent/pay');
//开发票
Route::rule(':version/invoice', 'api/:version.Invoice/setInvoice');
//我的评分
Route::rule(':version/my_evaluate', 'api/:version.Indent/my_evaluate');
//公司
Route::rule(':version/company_ss', 'api/:version._personal/company');
//订单流水
Route::rule(':version/order_water', 'api/:version.Indent/orderLists');
//获取订单
Route::rule(':version/get_order_from_soap', 'api/:version.Order/getOrderFromSoap');

Route::rule(':version/getAccess', 'api/:version.Invoice/getAccess');
//上单
Route::rule(':version/sendRequest', 'api/:version.Invoice/sendRequest');
// 发票信息上传
Route::rule(':version/search_invoice', 'api/:version.Invoice/searchInvoice');
//
//产品分类
Route::rule(':version/model_type', 'api/:version.Indent/ModelType');
//余额
Route::rule(':version/balance', 'api/:version.Cash/getBalance');

//公告详情
Route::rule(':version/messinfo', 'api/:version._personal/messageInfo');

Route::rule(':version/ss', 'api/:version.Index/send');
//
Route::rule(':version/get_finish_order', 'api/:version.Indent/finishOrder');

Route::rule(':version/jsi', 'api/:version.Indent/jsi');


Route::rule(':version/getInventory', 'api/:version.Register/getInventory');