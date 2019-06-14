<?php /*a:2:{s:71:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\admin\basic.html";i:1560303011;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
	.layui-form-label {
		width: 120px;
	}
</style>
<div class="admin-main">
	<div class="layui-form">
		<table class="layui-table" id="list-table">
			<thead>
				<tr>
					<th>参数名</th>
					<th>配置描述</th>
					<th>值</th>
					<th>更新时间</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
				<tr>
					<td><?php echo htmlentities($data['name']); ?></td>
					<td>
						<?php echo htmlentities($data['title']); ?>
					</td>
					<td>
						<?php if($data['id'] == 1||$data['id'] == 5||$data['id'] == 6): ?>
						<input type="text" class="layui-input" value="<?php echo htmlentities($data['value']); ?>" style="width: 400px;" onchange="ajaxUpdateField('admin_config','id','<?php echo htmlentities($data['id']); ?>','value',this);">
						<?php elseif($data['id'] == 2||$data['id'] == 3||$data['id'] == 4): ?>
						<input type="number" class="layui-input" value="<?php echo htmlentities($data['value']); ?>" style="width: 400px;" onchange="ajaxUpdateField('admin_config','id','<?php echo htmlentities($data['id']); ?>','value',this);">
						<?php elseif($data['id'] == 7): if($data['value']): ?>
						<span class="box">
						<a href="<?php echo IMG_PATH; ?><?php echo htmlentities($data['value']); ?>">
						<i class="layui-icon" style="font-size: 20px;">&#xe621;</i>
						</a></span>
						<button class="layui-btn layui-btn-xs upload_file" option-id="<?php echo htmlentities($data['id']); ?>" type="button" style="border:none;background-color: rgba(0,0,0,0);color:blue">上传</button>
						<?php else: ?>
						<span class="box"></span>
						<button class="layui-btn layui-btn-xs upload_file" option-id="<?php echo htmlentities($data['id']); ?>" type="button" style="border:none;background-color: rgba(0,0,0,0);color:blue">上传</button>
						<?php endif; ?>
						<?php endif; ?>
					</td>
					<td><?php echo htmlentities($data['update_time']); ?></td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
	<div class="am-cf">
		<div class="am-fr over-h" id="rng">
			<?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): else: ?> <?php echo htmlentities($list->render()); ?> <?php endif; ?>
		</div>
	</div>
</div>
<script>
	layui.use(['layer', 'form','upload'], function() { //独立版的layer无需执行这一句
		var $ = layui.jquery,
			form = layui.form,
			upload = layui.upload,
			layer = layui.layer; //独立版的layer无需执行这一句
		//上传文件
		$('.upload_file').each(function(e) {
			var obj = $('.upload_file').eq(e);
			var optionid = obj.attr('option-id');
			upload.render({
			    elem: obj,
			    url: "<?php echo url('Upload/uploadFile'); ?>",
			    accept: 'file',
			    exts:'apk',
			    done: function(res){
			      	$.ajax({
						url: "<?php echo url('changeTableVal'); ?>",
						type: "POST",
						data: {
							'table': 'admin_config',
							'id_name': 'id',
							'id_value': optionid,
							'field': 'value',
							'value': res.resData.path,
						}
					}).done(function(data) {
						if(data.result == 0) {
							layer.msg('上传成功');
							var newhtml = '<a href="'+res.resData.pathurl+'"><i class="layui-icon" style="font-size: 20px;">&#xe621;</i></a>';
							obj.parent().find('.box').html(newhtml);
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
			    }
			});
		})

	});
	window.ajaxUpdateField = function(table, id_name, id_value, field, obj) {
		var value = obj.value;
		$.ajax({
			url: "<?php echo url('changeTableVal'); ?>",
			type: "POST",
			data: {
				'table': table,
				'id_name': id_name,
				'id_value': id_value,
				'field': field,
				'value': value
			}
		}).done(function(data) {
			if(data.result == 0) {
				layer.msg('修改成功');
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
	}
</script>