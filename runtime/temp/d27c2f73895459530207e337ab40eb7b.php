<?php /*a:2:{s:75:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\order\orderlist.html";i:1560586883;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="utf-8">
		<title>后台管理模板</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">

		<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>css/global.css" media="all">
		<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>plugins/font-awesome/css/font-awesome.min.css">

		<!-- 弹出框样式 -->
		<link href="<?php echo ADMIN_STYLE; ?>plugins/sweetAlert/sweetalert.css" rel="stylesheet">
		<script src="<?php echo ADMIN_STYLE; ?>plugins/sweetAlert/sweetalert.min.js"></script>
		<!-- Bootstrap Core CSS -->
		<script src="<?php echo ADMIN_STYLE; ?>js/jquery.min.js"></script>
		<script src="<?php echo ADMIN_STYLE; ?>js/bootstrap.min.js"></script>
		<link href="<?php echo ADMIN_STYLE; ?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="<?php echo ADMIN_STYLE; ?>plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
		<!-- Layui Core CSS -->
		<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>plugins/layui/font/iconfont.ttf" media="all" />
		<script src="<?php echo ADMIN_STYLE; ?>plugins/layui/layui.js"></script>
		<!-- 图片预览 -->
		<link rel="stylesheet" href="/PHP/public/static/js/viewer/viewer.css" />
		<script type="text/javascript" src="/PHP/public/static/js/viewer/viewer.js"></script>
		<!-- 图片预览 -->
		<!--方块表头-->
		<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>/plugins/biaotou/public.css" media="all" />
	</head>
	<style>
		#rng {
			text-align: center;
		}
		
		.pagination {
			float: none;
		}
		
		.inputFileWrapper label {
			display: block;
			float: left;
			position: relative;
		}
		
		.inputFileWrapper input[type="file"] {
			position: absolute;
			width: 1px;
			height: 1px;
			clip: rect(0, 0, 0, 0);
		}
		
		.inputFileWrapper .custorm-style {
			display: block;
			width: 390px;
			height: 50px;
		}
		
		.inputFileWrapper .custorm-style .left-button {
			width: 90px;
			line-height: 40px;
			background: #008ac7;
			color: #fff;
			display: block;
			text-align: center;
			float: left;
		}
		
		.inputFileWrapper .custorm-style .right-text {
			width: 300px;
			height: 40px;
			line-height: 50px;
			display: block;
			float: right;
			padding: 4px;
			border: 1px solid #008ac7;
			overflow: hidden;
			-ms-text-overflow: ellipsis;
			text-overflow: ellipsis;
			white-space: nowrap;
		}
		
		a:link,
		a:visited {
			text-decoration: none;
			/*超链接无下划线*/
		}
		
		.layui-layer {
			border-radius: 8px!important;
		}
		
		.layui-layer-title {
			border-radius: 8px 8px 0 0!important;
		}
		
		.layui-layer-content {
			height: auto!important;
		}
		
		body .open_class .layui-layer-btn a {
			height: 33px!important;
			line-height: 33px!important;
			padding: 0 18px!important;
			border-radius: 4px!important;
		}
		.layui-btn-disabled,
		.layui-btn-disabled:active,
		.layui-btn-disabled:hover {
			pointer-events: none;
		}
	</style>

	<body>
<style>
.layui-form-label{
    width: auto;
}
</style>
<div class="admin-main">
    <div class="layui-form">
        <blockquote class="layui-elem-quote" style="font-size: 12px;">
            <div class="layui-form-item" style="margin-bottom: 0px;margin-left: 80px;">
                <form method="get" action="<?php echo url('orderlist'); ?>">
                    <div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 120px;">
                            <label class="layui-form-label">订单状态：</label>
                            <div class="layui-input-block" style="width: 101px;margin-left: 90px;">
                                <select name="status" lay-verify="">
                                    <option value="">全部</option>
                                    <option value="1">租借中</option>
                                    <option value="2">已完成</option>
                                    <option value="3">等待付款</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 120px;">
                            <label class="layui-form-label">支付方式：</label>
                            <div class="layui-input-block" style="width: 101px;margin-left: 90px;">
                                <select name="payment" lay-verify="">
                                    <option value="">全部</option>
                                    <option value="1">支付宝</option>
                                    <option value="2">微信</option>
                                    <option value="3">押金抵扣</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 120px;">
                            <label class="layui-form-label">所属医院：</label>
                            <div class="layui-input-block" style="width: 101px;margin-left: 90px;">
                                <select name="hospital" lay-verify="">
                                    <option value="">全部</option>
                                    <?php if(is_array($hospital) || $hospital instanceof \think\Collection || $hospital instanceof \think\Paginator): if( count($hospital)==0 ) : echo "" ;else: foreach($hospital as $key=>$v): ?>
                                    <option value="<?php echo htmlentities($v['id']); ?>"><?php echo htmlentities($v['hospital_name']); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 120px;">
                            <label class="layui-form-label">时间范围：</label>
                            <input type="text" style="width: 200px" class="layui-input" id="test1">
                        </div>
                    </div>
                    <div style="float: left">
                        <div class="layui-input-inline" style="width:auto;margin-right: 90px;margin-left: 11px;">
                            <label class="layui-form-label">订单号：</label>
                            <input type="text" class="layui-input" value="<?php if(!(empty($oppen_id) || (($oppen_id instanceof \think\Collection || $oppen_id instanceof \think\Paginator ) && $oppen_id->isEmpty()))): ?><?php echo htmlentities($oppen_id); ?><?php endif; ?>" style="width:200px" name="oppen_id" id="name" placeholder="输入订单号搜索" autocomplete="off">
                        </div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                            <label class="layui-form-label">借出设备名称：</label>
                            <input type="text" class="layui-input" value="<?php if(!(empty($oppen_id) || (($oppen_id instanceof \think\Collection || $oppen_id instanceof \think\Paginator ) && $oppen_id->isEmpty()))): ?><?php echo htmlentities($oppen_id); ?><?php endif; ?>" style="width:200px" name="oppen_id" id="name" placeholder="输入设备名称搜索" autocomplete="off">
                        </div>
                        <button class="layui-btn layui-btn-normal" style="margin-left: 30px;"><i class="layui-icon">&#xe615;</i> 查询</button>
                    </div>
                </form>
            </div>
        </blockquote>
        <table class="layui-table" id="demo" lay-filter="test">
            <thead>
                <tr>
                    <th>订单号</th>
                    <th>租借时间</th>
                    <th>所属医院</th>
                    <th>计费规则</th>
                    <th>使用时长</th>
                    <th>收费方式</th>
                    <th>租金金额</th>
                    <th>优惠金额</th>
                    <th>应付金额</th>
                    <th>用户编号</th>
                    <th>订单状态</th>
                    <th>归还地点</th>
                    <th>实付金额</th>
                    <th>操作</th>
                </tr>
            </thead>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        </table>
    </div>
</div>
<script>
    layui.use('form', function(){
        var form = layui.form;
        
        //监听提交
        form.on('submit(formDemo)', function(data){
        layer.msg(JSON.stringify(data.field));
        return false;
        });
    });
    layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
            elem: '#test1' //指定元素
        });
        });
    //     layui.use('table', function(){
    //     var table = layui.table;
        
    //     //第一个实例
    //     table.render({
    //         elem: '#demo'
    //         ,height: 312
    //         ,width: '100%'
    //         ,url: '/demo/table/user/' //数据接口
    //         ,page: true //开启分页
    //         ,cols: [[ //表头
    //         {field: 'id', title: '订单号', fixed: 'left',}
    //         ,{field: 'username', title: '租借时间',}
    //         ,{field: 'sex', title: '所属医院',}
    //         ,{field: 'city', title: '计费规则',} 
    //         ,{field: 'sign', title: '使用时长',}
    //         ,{field: 'experience', title: '收费方式',}
    //         ,{field: 'score', title: '租金金额',}
    //         ,{field: 'classify', title: '优惠金额',}
    //         ,{field: 'wealth', title: '应付金额',}
    //         ,{field: 'wealth', title: '用户编号',}
    //         ,{field: 'wealth', title: '订单状态',}
    //         ,{field: 'wealth', title: '归还地点',}
    //         ,{field: 'wealth', title: '实付金额',}
    //         ,{field: 'wealth', title: '操作',}
    //         ]]
    //     });
    
    // });
</script>