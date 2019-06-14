<?php /*a:2:{s:73:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\admin\addrole.html";i:1559631740;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
        <div class="layui-form-item">
            <label class="layui-form-label">角色名称：</label>
            <div class="layui-input-inline">
                <input type="text" name="name" lay-verify="required|username" placeholder="请输入角色名称" value="" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">角色描述：</label>
            <div class="layui-input-inline" style="width:600px">
                <textarea name="desc" style="resize:none" id="" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="float: initial;">权限分配：</label>
            <?php if(is_array($auth) || $auth instanceof \think\Collection || $auth instanceof \think\Paginator): $i = 0; $__LIST__ = $auth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$power): $mod = ($i % 2 );++$i;?>
            <div class="first" style="padding-left: 120px;">
                <input type="checkbox" class="firs" lay-filter="powers" name="power[]" value="<?php echo htmlentities($power['id']); ?>" title="<?php echo htmlentities($power['name']); ?>" <?php if($power['select'] == '1'): ?>checked="" <?php endif; ?>> <div class="layui-field-box">
                <?php if(is_array($power['children']) || $power['children'] instanceof \think\Collection || $power['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $power['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$second): $mod = ($i % 2 );++$i;?>
                <div class="layui-input-block parent" style="margin-left: 80px;">
                    <div class="layui-input-inline" style="width:auto;">
                        <input type="checkbox" class="pid" <?php if($second['level'] == 3): ?>lay-skin="primary" <?php endif; ?> lay-filter="power" name="power[]" value="<?php echo htmlentities($second['id']); ?>" title="<?php echo htmlentities($second['name']); ?>" <?php if($second['select'] == '1'): ?>checked="" <?php endif; ?>> </div> <?php if(isset($second['children'])): ?> <div class="layui-input-inline son" style="width:auto;">
                        <?php if(is_array($second['children']) || $second['children'] instanceof \think\Collection || $second['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $second['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                        <div style="margin: 2% 0 0 0;float: left;">
                            <input type="checkbox" lay-skin="primary" class="child" value="<?php echo htmlentities($child['id']); ?>" lay-filter="powerss" name="power[]" title="<?php echo htmlentities($child['name']); ?>" <?php if($child['select'] == '1'): ?>checked="" <?php endif; ?>> </div> <?php endforeach; endif; else: echo "" ;endif; ?> </div> <?php endif; ?> </div> <hr class="layui-bg-orange" width="90%" style="margin-left: 5%;"> <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block" style="margin-left: 30px;text-align: center;">
                        <button class="layui-btn layui-btn-sm layui-btn-normal" lay-submit="" lay-filter="submit">提交</button>
                        <button type="button" class="layui-btn layui-btn-primary layui-btn-sm" onclick="javascript:history.go(-1)">返回</button>
                    </div>
                </div>
            </div>
            <script>
                layui.use(['layer', 'form'], function () {
                    var $ = layui.jquery,
                        form = layui.form,
                        layer = layui.layer; //独立版的layer无需执行这一句
                    form.on('checkbox(power)', function (data) {
                        var child = $(data.elem).parents('.parent').find('.son input[type="checkbox"]');
                        child.each(function (index, item) {
                            item.checked = data.elem.checked;
                        });
                        var first = $(data.elem).parents('.first').find('.firs');
                        var length = $(data.elem).parents('.first').find('.child:checked').length;
                        if (length > 1) {
                            first.prop('checked', true);
                        } else {
                            if (!data.elem.checked && length == 1) {
                                first.prop('checked', true);
                            } else {
                                if ($(data.elem).parents('.first').find('.pid:checked').length > 0) {
                                    first.prop('checked', true);
                                } else {
                                    first.prop('checked', data.elem.checked);
                                }
                            }
                        }
                        form.render('checkbox');
                    });
                    form.on('checkbox(powers)', function (data) {
                        var child = $(data.elem).parents('.first').find('.layui-field-box input[type="checkbox"]')
                        child.each(function (index, item) {
                            item.checked = data.elem.checked;
                        });
                        form.render('checkbox');
                    });
                    form.on('checkbox(powerss)', function (data) {
                        var pid = $(data.elem).parents('.parent').find('.pid');
                        var first = $(data.elem).parents('.first').find('.firs');
                        var length = $(data.elem).parents('.parent').find('.child:checked').length;
                        var length1 = $(data.elem).parents('.first').find('.child:checked').length;
                        if (length1 >= 1) {
                            if (length >= 1) {
                                pid.prop('checked', true);
                            } else {
                                pid.prop('checked', data.elem.checked);
                            }
                            first.prop('checked', true);
                        } else {
                            if (length == 0) {
                                pid.prop('checked', data.elem.checked);
                            }
                            first.prop('checked', data.elem.checked);
                        }
                        form.render('checkbox');
                    });
                    //提交
                    form.on('submit(submit)', function (data) {
                        $.ajax({
                            url: "<?php echo url('addrole'); ?>",
                            type: "POST",
                            data: data.field,
                        }).done(function (data) {
                            if (data.result == 0) {
                                layer.msg(data.message, {
                                    icon: 1,
                                    time: 3000
                                }, function () {
                                    location.href = data.url;
                                });
                            } else {
                                layer.msg(data.message, {
                                    icon: 2,
                                    time: 3000
                                });
                            }
                        }).error(function (data) {
                            layer.msg('错误', {
                                icon: 2,
                                content: '服务器错误'
                            });
                        });
                    });
                });
            </script>