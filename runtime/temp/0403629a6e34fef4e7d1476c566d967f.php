<?php /*a:2:{s:73:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\user\userlist.html";i:1560302026;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
	.layui-form-switch i{
		width:18px;
		height: 18px;
		top:1px;
	}
	.layui-form-switch{
		width:40px;
		margin-top: 0px;
	}
</style>
<div class="admin-main">
    <div class="layui-form">
        <blockquote class="layui-elem-quote" style="font-size: 12px;">
            <div class="layui-form-item" style="margin-bottom: 0px;margin-left: 80px;">
                <form method="get" action="<?php echo url('userlist'); ?>">
                    <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                        <label class="layui-form-label">微信ID</label>
                        <input type="text" class="layui-input" value="<?php if(!(empty($oppen_id) || (($oppen_id instanceof \think\Collection || $oppen_id instanceof \think\Paginator ) && $oppen_id->isEmpty()))): ?><?php echo htmlentities($oppen_id); ?><?php endif; ?>" style="width:200px" name="oppen_id" id="name" placeholder="请输入微信ID搜索" autocomplete="off">
                    </div>
                    <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                        <label class="layui-form-label">支付宝ID</label>
                        <input type="text" class="layui-input" style="width:200px" name="ali_user_id" id="name" value="<?php if(!(empty($ali_user_id) || (($ali_user_id instanceof \think\Collection || $ali_user_id instanceof \think\Paginator ) && $ali_user_id->isEmpty()))): ?><?php echo htmlentities($ali_user_id); ?><?php endif; ?>" placeholder="请输入支付宝ID搜索" autocomplete="off">
                    </div>
                    <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                        <label class="layui-form-label" style="width: auto">押金状态</label>
                        <div class="layui-input-block" style="width: 101px;margin-left: 80px;">
                            <select name="balance" lay-verify="">
                                <option value="">全部</option>
                                <option value="1">已缴纳</option>
                                <option value="2">未缴纳</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="layui-btn layui-btn-normal" style="margin-left: 30px;"><i class="layui-icon">&#xe615;</i> 查询</button>
                </form>
            </div>
        </blockquote>
        <table class="layui-table">
            <thead>
                <tr>
                    <th>用户编号</th>
                    <th>用户昵称</th>
                    <th>微信ID</th>
                    <th>支付宝ID</th>
                    <th>押金状态</th>
                    <th>累计消费</th>
                    <th>启用</th>
                </tr>
            </thead>
            <tbody class="viewer">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($val['id']); ?></td>
                    <td><?php echo htmlentities($val['nike_name']); ?></td>
                    <td><?php if($val['oppen_id'] == 0): ?>/<?php else: ?><?php echo htmlentities($val['oppen_id']); ?><?php endif; ?></td>
                    <td><?php if($val['ali_user_id'] == 0): ?>/<?php else: ?><?php echo htmlentities($val['ali_user_id']); ?><?php endif; ?></td>
                    <td><?php if($val['balance'] == 0.00): ?><span style='color: red'>未缴纳</span><?php else: ?><span>已缴纳</span><?php endif; ?></td>
                    <td><?php if($val['consumption'] == NULL): ?>0<?php else: ?><?php echo htmlentities($val['consumption']); ?><?php endif; ?></td>
                    <td>
                        <input type="checkbox" value="<?php echo htmlentities($val['is_defriend']); ?>" data-id="<?php echo htmlentities($val['id']); ?>" name="is_defriend" <?php if($val['is_defriend'] == 0): ?> checked<?php endif; ?> lay-skin="switch" lay-filter="switchTest">
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <div class="am-cf">
        <div class="am-fr over-h" id="rng">
            <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): else: ?> <?php echo $list; ?> <?php endif; ?>
        </div>
    </div>
</div>
<script>
    layui.use(['layer', 'form'], function() { //独立版的layer无需执行这一句
		var $ = layui.jquery,
			form = layui.form,
			layer = layui.layer; //独立版的layer无需执行这一句
		form.on('checkbox(allChoose)', function(data) {
			var child = $(data.elem).parents('table').find('tbody input[lay-filter="perselector"]');
			child.each(function(index, item) {
				item.checked = data.elem.checked;
			});
			form.render('checkbox');
		});
		//图片预览
		$('.viewer').viewer();
		form.on('switch(switchTest)', function(data){
			var id = $(data.elem).attr('data-id');
			var is_defriend = data.elem.checked==true?0:1;
			$.ajax({
				url: "<?php echo url('changeStatus'); ?>?id="+id+"&is_defriend="+is_defriend,
				type: "GET",
			}).done(function(data) {
				if(data.result == 0) {
					layer.msg(data.message);
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