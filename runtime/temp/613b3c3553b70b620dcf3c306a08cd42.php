<?php /*a:2:{s:73:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\admin\addmenu.html";i:1560131814;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
	.layui-form-item .layui-input-inline {
		width: 250px;
	}
</style>
<div class="admin-main">
	<!--点击图片放大-->
	<div class="bigImg pos-fix">
		<img src="">
	</div>
	<!--点击图片放大结束-->
	<div class="layui-form">
		<div class="layui-form-item">
			<label class="layui-form-label">菜单名称</label>
			<div class="layui-input-inline">
				<input type="text" name="name" lay-verify="required" placeholder="请输入菜单名称" value="" autocomplete="off" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">控制器方法</label>
			<div class="layui-input-inline">
				<input type="text" name="url" placeholder="请输入控制器方法" value="" autocomplete="off" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">上级菜单：</label>
			<div class="layui-input-inline">
				<select name="cate1" id="cate1" lay-filter="cate1">
					<option value="">请选择</option>
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$val): ?>
					<option value="<?php echo htmlentities($val['id']); ?>" <?php if($ppid == $val['id']): ?> selected <?php endif; ?>><?php echo htmlentities($val['name']); ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
			<div class="layui-input-inline">
				<select name="cate2" id="cate2" lay-filter="cate2">
					<option value="">请选择</option>
					<?php echo htmlentities($pid); ?>
				</select>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">状态</label>
			<div class="layui-input-block">
				<input type="radio" name="status" value="0" title="显示" checked="checked">
				<input type="radio" name="status" value="1" title="隐藏">
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block" style="margin-left: 30px;text-align: center;margin-top:20px;">
				<button class="layui-btn layui-btn-sm layui-btn-normal" lay-submit="" lay-filter="submit">提交</button>
				<button type="button" class="layui-btn layui-btn-primary layui-btn-sm" onclick="javascript:history.go(-1)">返回</button>
			</div>
		</div>
	</div>
	<script>
		layui.use(['layer', 'form','upload'], function() {
			var $ = layui.jquery,
				form = layui.form,
				layer = layui.layer; //独立版的layer无需执行这一句
			//商品分类
			form.on('select(cate1)', function(data) {
				if(data.value) {
					$.ajax({
						url: "<?php echo url('get_menu'); ?>" + '?pid=' + data.value,
						type: "GET",
					}).done(function(data) {
						if(data.result == 0) {
							$('#cate2').html(data.resData);
							form.render('select');
						} else {
							layer.msg('请求失败', {
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
				}
			})
			//提交
			form.on('submit(submit)', function(data) {
				$.ajax({
					url: "<?php echo url('addmenu'); ?>",
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