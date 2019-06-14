<?php /*a:2:{s:74:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\admin\rolelist.html";i:1560303011;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
	
	.bigImg {
		display: none;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.3);
		left: 0;
		top: 0;
		z-index: 1000;
		position: fixed;
	}
</style>
<div class="admin-main">
	<!--点击图片放大-->
	<div class="bigImg pos-fix">
		<img src="">
	</div>
	<!--点击图片放大结束-->
	<div class="layui-form">
		<blockquote class="layui-elem-quote" style="font-size: 12px;">
				<div class="layui-form-item" style="margin-bottom: 0px;">
					<form method="get" action="<?php echo url('rolelist');; ?>">
						<div class="layui-input-inline" style="width:auto;">
							<input type="text" class="layui-input" style="display: inline;width:200px" name="filter" id="name" value="<?php echo htmlentities($filter); ?>" placeholder="输入角色名称" autocomplete="off">
							<button class="layui-btn" id="search" type='submit'>
								<i class="layui-icon">&#xe615;</i> 查询
							</button>
						</div>
					</form>
						<?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): if( count($menulist)==0 ) : echo "" ;else: foreach($menulist as $key=>$val): if($val['id'] == 7): ?>
						<div class="layui-input-inline" style="width: auto;">
						<a class="layui-btn layui-btn-normal" href='<?php echo url("addrole"); ?>'><i class="layui-icon">&#xe608;</i><?php echo htmlentities($val['title']); ?></a>
						</div>
						<?php endif; if($val['url'] == 'Admin/deleteroles'): ?>
						<div class="layui-input-inline" style="width: auto;">
							<button class="layui-btn layui-btn-danger" onclick="deleteroles()"><?php echo htmlentities($val['title']); ?></button>
						</div>
						<?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
		</blockquote>
		<table class="layui-table" id="list-table">
			<thead>
				<tr>
					<th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
					<th>序号</th>
					<th>角色名称</th>
					<th>描述</th>
					<th>创建时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
				<tr>
					<td><input type="checkbox" lay-filter="perselector" lay-skin="primary" data-id="<?php echo htmlentities($data['id']); ?>"></td>
					<td><?php echo htmlentities($data['ids']); ?></td>
					<td><?php echo htmlentities($data['name']); ?></td>
					<td><?php echo htmlentities($data['desc']); ?></td>
					<td><?php echo htmlentities($data['create_time']); ?></td>
					<td>
						<?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): if( count($menulist)==0 ) : echo "" ;else: foreach($menulist as $key=>$val): if($val['id'] == 8): ?>
							<a class="layui-btn layui-btn-xs layui-btn-normal" href='<?php echo url("editrole",["id"=>$data['id']]); ?>'><?php echo htmlentities($val['title']); ?></a>
							<?php endif; if($val['id'] == 9): ?>
							<button type="button" class="layui-btn layui-btn-xs layui-btn-danger" onclick='Delete(<?php echo htmlentities($data['id']); ?>)'><?php echo htmlentities($val['title']); ?></button>
							<?php endif; ?>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</td>
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
	layui.use(['layer', 'form'], function() { //独立版的layer无需执行这一句
		var $ = layui.jquery,
			form = layui.form,
			layer = layui.layer; //独立版的layer无需执行这一句
		form.on('checkbox(allChoose)', function(data) {
			var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
			child.each(function(index, item) {
				item.checked = data.elem.checked;
			});
			form.render('checkbox');
		});
	});
	//批量删除
	function deleteroles() {
		var noticeids = [];
		var length = $("input[lay-filter='perselector']:checked").length;
		if(length == 0) {
			layer.msg('请勾选列表');
			return false;
		} else {
			$("input[lay-filter='perselector']:checked").each(function() {
				noticeids.push($(this).attr('data-id'));
			})
			layer.confirm('您确定要删除吗?', {
				icon: 3,
				title: '温馨提示'
			}, function(index) {
				$.ajax({
					url: "<?php echo url('deleteroles'); ?>",
					type: "POST",
					data: {
						ids: noticeids,
					}
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
				layer.close(index);
			})
		}
	}
	//审核
	function Delete(id) {
		layer.confirm(
			'您确定要删除吗?', 
		{
			icon: 3,
			title: '温馨提示'
		}, function(index) {
			$.ajax({
				url: "<?php echo url('deleterole'); ?>" + '?id=' + id,
				type: "GET"
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
			layer.close(index);
		});
	}
</script>