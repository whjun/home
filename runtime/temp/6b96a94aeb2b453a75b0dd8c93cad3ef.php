<?php /*a:2:{s:75:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\admin\adminedit.html";i:1559631740;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
﻿<!DOCTYPE HTML>
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
	.layui-form-label {
		width: 120px;
	}
	.layui-form-item .layui-input-inline{
		width:250px;
	}
</style>
<div class="admin-main">
	<div class="layui-form">
		<div class="layui-form-item">
			<label class="layui-form-label">账号：</label>
			<div class="layui-input-inline">
				<input type="hidden" name="id" value="<?php echo htmlentities($info['id']); ?>" />
				<input type="text" name="username" lay-verify="required|username" placeholder="请输入账号" value="<?php echo htmlentities($info['username']); ?>" autocomplete="off" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux">* 管理员登录后台的账号，请填写英文字母，数字或下划线，在4-20个字符之间</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">重置密码：</label>
			<div class="layui-input-inline">
				<input type="password" name="password" lay-verify="required|pass" placeholder="请输入重置密码" value="<?php echo htmlentities($info['clearword']); ?>" autocomplete="new-password" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux">* 管理员登录后台的密码，请填写英文字母，数字或下划线，在6-20个字符之间</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">确认密码：</label>
			<div class="layui-input-inline">
				<input type="password" name="clearword" lay-verify="required|pass" placeholder="请输入确认密码" value="<?php echo htmlentities($info['clearword']); ?>" autocomplete="new-password" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux">	* 重复输入管理员登录后台的密码</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">名称：</label>
			<div class="layui-input-inline">
				<input type="text" name="nickname" lay-verify="required" placeholder="请输入名称" value="<?php echo htmlentities($info['nickname']); ?>" autocomplete="off" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux">* 管理员名称</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">手机号：</label>
			<div class="layui-input-inline">
				<input type="number" name="phone" lay-verify="required|phone" placeholder="请输入手机号" value="<?php echo htmlentities($info['phone']); ?>" autocomplete="off" class="layui-input">
			</div>
			<div class="layui-form-mid layui-word-aux">* 管理员手机号</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">角色：</label>
			<div class="layui-input-inline">
				<select name="role_id" id="">
					<?php if(is_array($rolelist) || $rolelist instanceof \think\Collection || $rolelist instanceof \think\Paginator): if( count($rolelist)==0 ) : echo "" ;else: foreach($rolelist as $key=>$val): ?>
					<option value="<?php echo htmlentities($val['id']); ?>" <?php if($val['id'] == $info['role_id']): ?>selected<?php endif; ?>><?php echo htmlentities($val['name']); ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
			<div class="layui-form-mid layui-word-aux">* 只能选择一个角色</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block" style="margin-left: 30px;text-align: center;">
				<button class="layui-btn layui-btn-sm layui-btn-normal" lay-submit="" lay-filter="submit">提交</button>
				<button type="button" class="layui-btn layui-btn-primary layui-btn-sm" onclick="javascript:history.go(-1)">返回</button>
			</div>
		</div>
	</div>
	<script>
		layui.use(['layer', 'form'], function() {
			var $ = layui.jquery,
				form = layui.form,
				layer = layui.layer; //独立版的layer无需执行这一句
			form.verify({
				username: function(value, item){ //value：表单的值、item：表单的DOM对象
				    if(!(/^[A-Za-z0-9]{4,20}$/g).test(value)){
				      	return '账号格式不正确';
				    }
				    if(/(^\_)|(\__)|(\_+$)/.test(value)){
				      	return '账号首尾不能出现下划线\'_\'';
				    }
				    if(/^\d+\d+\d$/.test(value)){
				      	return '账号不能全为数字';
				    }
				},
				  //我们既支持上述函数式的方式，也支持下述数组的形式
				  //数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
				pass: [
				    /^[\S]{6,20}$/
				    ,'密码必须6到20位，且不能出现空格'
				],
				phone:[
					/^0?1[3|4|5|6|7|8][0-9]\d{8}$/
				    ,'手机号格式不正确'
				]
			});     
			//提交
			form.on('submit(submit)', function(data) {
				$.ajax({
					url: "<?php echo url('adminedit'); ?>",
					type: "POST",
					data: data.field,
				}).done(function(data) {
					if(data.result == 0) {
						layer.msg(data.message, {
							icon: 1,
							time: 3000
						}, function() {
							location.href = data.url;
						});
					} else {
						layer.msg(data.message, {
							icon: 2,
							time: 3000
						});
					}
				}).error(function(data) {
					layer.msg('错误', {
						icon: 2,
						content: '服务器错误'
					});
				});
			});
		});
	</script>