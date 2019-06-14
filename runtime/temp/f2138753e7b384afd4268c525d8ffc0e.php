<?php /*a:2:{s:74:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\admin\menulist.html";i:1560303011;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
<div class="admin-main">
	<div class="layui-form">
		<blockquote class="layui-elem-quote" style="font-size: 12px;">
			<form method="get" action="<?php echo url('menulist');; ?>">
				<div class="layui-form-item" style="margin-bottom: 0px;">
					<?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): if( count($menulist)==0 ) : echo "" ;else: foreach($menulist as $key=>$val): if($val['id'] == 109): ?>
					<div class="layui-input-inline" style="width:auto;">
						<a class="layui-btn layui-btn-normal" href='<?php echo url("addmenu"); ?>'><i class="layui-icon">&#xe608;</i><?php echo htmlentities($val['title']); ?></a>
					</div>
					<?php endif; ?> <?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</form>
		</blockquote>
		<table class="layui-table" id="list-table">
			<thead>
				<tr>
					<th style="text-align: center;" style="width:300px;">菜单名称</th>
					<th style="text-align: center;">控制器方法</th>
					<th style="text-align: center;">状态</th>
					<th style="text-align: center;">操作</th>
				</tr>
			</thead>
			<tbody class="viewer">
				<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
				<tr class="<?php echo htmlentities($data['level']); ?>" id="<?php echo htmlentities($data['level']); ?>_<?php echo htmlentities($data['id']); ?>">
					<td style="padding-left:<?php echo ($data['level'] * 5); ?>em">
						<?php if($data['child']): ?>
						<span class="glyphicon glyphicon-plus btn-warning" style="padding:2px;" id="icon_<?php echo htmlentities($data['level']); ?>_<?php echo htmlentities($data['id']); ?>" aria-hidden="false" onclick="rowClicked(this)"></span>&nbsp; <?php endif; ?>
						<span><?php echo htmlentities($data['name']); ?></span>
					</td>
					<td style="text-align: center;"><?php echo htmlentities($data['url']); ?></td>
					<td style="text-align: center;"><?php echo $data['status']==0 ? '显示' : '隐藏'; ?></td>
					<td style="text-align: center;">
						<a href='<?php echo url("addmenu",["pid" => $data['id']]); ?>' class="layui-btn layui-btn-xs layui-btn">添加子菜单</a>
						<?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): if( count($menulist)==0 ) : echo "" ;else: foreach($menulist as $key=>$val): if($val['id'] == 110): ?>
						<a class="layui-btn layui-btn-xs layui-btn-normal" href='<?php echo url("editmenu",["id" => $data['id']]); ?>'>编辑</a>
						<?php endif; if($val['id'] == 111): ?>
						<button type="button" class="layui-btn layui-btn-xs layui-btn-danger" onclick='Delete(<?php echo htmlentities($data['id']); ?>)'>删除</button>
						<?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
					</td>
				</tr>
				<?php if(is_array($data['child']) || $data['child'] instanceof \think\Collection || $data['child'] instanceof \think\Paginator): if( count($data['child'])==0 ) : echo "" ;else: foreach($data['child'] as $key=>$second): ?>
				<tr <?php if($second['level'] == 2): ?>style="display:none;" <?php endif; ?> class="<?php echo htmlentities($second['level']); ?>" id="<?php echo htmlentities($second['level']); ?>_<?php echo htmlentities($second['id']); ?>">
					<td style="padding-left:<?php echo ($second['level'] * 5); ?>em">
						<?php if($second['child']): ?>
						<span class="glyphicon glyphicon-plus btn-warning" style="padding:2px;" id="icon_<?php echo htmlentities($second['level']); ?>_<?php echo htmlentities($second['id']); ?>" aria-hidden="false" onclick="rowClicked(this)"></span>&nbsp; <?php endif; ?>
						<span><?php echo htmlentities($second['name']); ?></span>
					</td>
					<td style="text-align: center;"><?php echo htmlentities($second['url']); ?></td>
					<td style="text-align: center;"><?php echo $second['status']==0 ? '显示' : '隐藏'; ?></td>
					<td style="text-align: center;">
						<a href='<?php echo url("addmenu",["pid" => $second['id']]); ?>' class="layui-btn layui-btn-xs layui-btn">添加子菜单</a>
						<?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): if( count($menulist)==0 ) : echo "" ;else: foreach($menulist as $key=>$val): if($val['id'] == 110): ?>
						<a class="layui-btn layui-btn-xs layui-btn-normal" href='<?php echo url("editmenu",["id" => $second['id']]); ?>'>编辑</a>
						<?php endif; if($val['id'] == 111): ?>
						<button type="button" class="layui-btn layui-btn-xs layui-btn-danger" onclick='Delete(<?php echo htmlentities($second['id']); ?>)'>删除</button>
						<?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
					</td>
				</tr>
				<?php if(is_array($second['child']) || $second['child'] instanceof \think\Collection || $second['child'] instanceof \think\Paginator): if( count($second['child'])==0 ) : echo "" ;else: foreach($second['child'] as $key=>$third): ?>
				<tr <?php if($third['level'] == 3): ?>style="display:none;" <?php endif; ?> class="<?php echo htmlentities($third['level']); ?>" id="<?php echo htmlentities($third['level']); ?>_<?php echo htmlentities($third['id']); ?>">
					<td style="padding-left:<?php echo ($third['level'] * 5); ?>em">
						<span><?php echo htmlentities($third['name']); ?></span>
					</td>
					<td style="text-align: center;"><?php echo htmlentities($third['url']); ?></td>
					<td style="text-align: center;"><?php echo $third['status']==0 ? '显示' : '隐藏'; ?></td>
					<td style="text-align: center;">
						<?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): if( count($menulist)==0 ) : echo "" ;else: foreach($menulist as $key=>$val): if($val['id'] == 110): ?>
						<a class="layui-btn layui-btn-xs layui-btn-normal" href='<?php echo url("editmenu",["id" => $third['id']]); ?>'>编辑</a>
						<?php endif; if($val['id'] == 111): ?>
						<button type="button" class="layui-btn layui-btn-xs layui-btn-danger" onclick='Delete(<?php echo htmlentities($third['id']); ?>)'>删除</button>
						<?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?> <?php endforeach; endif; else: echo "" ;endif; ?> <?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>

	</div>
	<div class="am-cf">
		<div class="am-fr over-h" id="rng">
			<?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): else: ?> <?php echo $list->render(); ?> <?php endif; ?>
		</div>
	</div>
	<script>
		layui.use('layer', function() { //独立版的layer无需执行这一句
			var $ = layui.jquery,
				layer = layui.layer; //独立版的layer无需执行这一句

		});
		//图片预览
		$('.viewer').viewer();
		window.rowClicked = function(obj) {
			span = obj;

			obj = obj.parentNode.parentNode;

			var tbl = document.getElementById("list-table");

			var lvl = parseInt(obj.className);
			var fnd = false;

			var sub_display = $(span).hasClass('glyphicon-minus') ? 'none' : '' ? 'block' : 'table-row';
			if(sub_display == 'none') {
				$(span).removeClass('glyphicon-minus btn-info');
				$(span).addClass('glyphicon-plus btn-warning');
			} else {
				$(span).removeClass('glyphicon-plus btn-info');
				$(span).addClass('glyphicon-minus btn-warning');
			}

			for(i = 0; i < tbl.rows.length; i++) {
				var row = tbl.rows[i];

				if(row == obj) {
					fnd = true;
				} else {

					if(fnd == true) {
						var cur = parseInt(row.className);
						var icon = 'icon_' + row.id;
						if(cur > lvl) {
							row.style.display = sub_display;

							if(sub_display != 'none') {
								var iconimg = document.getElementById(icon);
								$(iconimg).removeClass('glyphicon-plus btn-info');
								$(iconimg).addClass('glyphicon-minus btn-warning');
							} else {
								$(iconimg).removeClass('glyphicon-minus btn-info');
								$(iconimg).addClass('glyphicon-plus btn-warning');
							}
						} else {
							fnd = false;
							break;
						}
					}
				}
			}

			for(i = 0; i < obj.cells[0].childNodes.length; i++) {

				var imgObj = obj.cells[0].childNodes[i];
				if(imgObj.tagName == "IMG") {

					if($(imgObj).hasClass('glyphicon-plus btn-info')) {
						$(imgObj).removeClass('glyphicon-plus btn-info');
						$(imgObj).addClass('glyphicon-minus btn-warning');
					} else {
						$(imgObj).removeClass('glyphicon-minus btn-warning');
						$(imgObj).addClass('glyphicon-plus btn-info');
					}
				}
			}
		}
		//删除
		function Delete(id) {
			layer.confirm('您确定要删除吗?', {
				icon: 3,
				title: '温馨提示'
			}, function(index) {
				$.ajax({
					url: "<?php echo url('delmenu'); ?>" + '?id=' + id,
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