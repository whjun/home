<?php /*a:2:{s:87:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\equipment\equipmenthospital.html";i:1560569271;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
    <div class="layui-form">
        <blockquote class="layui-elem-quote">
            <div class="layui-form-item" style="margin-bottom: 0px;">
                <?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): if( count($menulist)==0 ) : echo "" ;else: foreach($menulist as $key=>$val): if($val['id'] == 135): ?>
				<div class="layui-input-inline" style="width: auto;">
					<button class="layui-btn layui-btn-normal" onclick="addhospital(<?php echo htmlentities($level); ?>,<?php echo htmlentities($pid); ?>)"><i class="layui-icon">&#xe608;</i><?php echo htmlentities($val['title']); ?></button>
					<?php if($level > 1): ?>
					<button class="layui-btn layui-btn-primary" onclick="javascript:history.go(-1)">返回</button> <?php endif; ?>
				</div>
				<?php endif; ?> <?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
        </blockquote>
        <table class="layui-table">
            <thead>
                <th>医院名称</th>
                <th>设备数量</th>
                <th>备注</th>
                <th>操作</th>
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($data['hospital_name']); ?></td>
                    <td><?php echo htmlentities($data['count']); ?></td>
                    <td><?php echo htmlentities($data['desc']); ?></td>
                    <td>
                        <!-- <?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): if( count($menulist)==0 ) : echo "" ;else: foreach($menulist as $key=>$val): if($val['id'] == 136): ?> -->
                        <button class="layui-btn layui-btn-xs layui-btn-normal" onclick="edithospital('<?php echo htmlentities($data['id']); ?>','<?php echo htmlentities($data['hospital_name']); ?>','<?php echo htmlentities($data['desc']); ?>')">编辑</button>
                        <!-- <?php endif; if($val['id'] == 137): ?> -->
                        <button type="button" class="layui-btn layui-btn-xs layui-btn-danger" onclick='Delete(<?php echo htmlentities($data['id']); ?>)'>删除</button> <?php endif; ?> 
                        <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div id="hospital" style="display: none">
            <input type="hidden" name="id" value="">
            <div class="layui-form-item">
                <label class="layui-form-label" style="width: 102px">医院名称</label>
                <div class="layui-input-inline" style="width: 390px;height: 25px;margin-left: 50px;">
                    <input type="text" name="hospital_name" required  lay-verify="required" placeholder="输入设备名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label" style="width: 76px">备注</label>
                <div class="layui-input-block" style="margin-left: 50px;">
                    <textarea name="desc" placeholder="请输入内容" class="layui-textarea" style="    height: 216px; width: 390px;"></textarea>
                </div>
            </div>
        </div>
        <div class="am-cf">
            <div class="am-fr over-h" id="rng">
                <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): else: ?> <?php echo $list; ?> <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    layui.use('form', function(){
        var form = layui.form;
        form.on('submit(formDemo)', function(data){
        layer.msg(JSON.stringify(data.field));
        return false;
        });
    });
    //增加
    function addhospital(){
        layer.open({
        type: 1
        ,title: '新增/编辑'
        ,area: ['450px', '500px']
        ,shade: 0
        ,content: $('#hospital')
        ,btn: ['确定', '取消']
        ,shade :0.8
        ,btnAlign: 'c'
        ,skin: 'open_class'
        ,yes: function(layero, index){
            var hospital_name = $("input[name='hospital_name']").val();
            var desc = $("textarea[name='desc']").val();
            if(!hospital_name){
                layer.msg('请输入医院名称');
                return false;
            }
            if(!desc){
                layer.msg("请输入备注")
            }
            var field = {};
            field.hospital_name = hospital_name;
            field.desc = desc;
            $.ajax({
                url: "<?php echo url('addhospital'); ?>",
                data: field,
                type: "POST"
            }).done(function(data) {
                if(data.result == 0){
                    layer.msg(data.message, {
                        icon: 1,
                        time: 3000
                    },function(){
                        location.href = data.url;
                    });
                }else{
                    layer.msg(data.message, {
                        icon: 2,
                        time: 3000
                    });
                }
            }).error(function(data) {
                layer.msg('错误', {
                    icon: 2,
                    content: '服务器错误'
                })
            })
        }
      });
    }
    //删除
    function Delete(id){
        layer.confirm('您确定要删除吗？', {
                icon: 3, 
                title:'温馨提示'
            }, function(index){
                $.ajax({
                    url: "<?php echo url('deletehospital'); ?>",
                    data: {id:id},
                    type: "GET",
                    dataType: "json"
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
                }).error(function(data){
                    layer.msg('错误', {
                        icon: 2,
                        content: '服务器错误'
                    });
                });
                layer.close(index);
        });
    }
    //编辑
    function edithospital(id,name,desc){
        $("input[name='id']").attr('disabled',true).val(id);
        $("input[name='hospital_name']").val(name);
        $("textarea[name='desc']").val(desc);
        layer.open({
        type: 1
        ,title: '新增/编辑'
        ,area: ['450px', '500px']
        ,shade: 0
        ,content: $('#hospital')
        ,btn: ['确定', '取消']
        ,shade :0.8
        ,btnAlign: 'c'
        ,skin: 'open_class'
        ,yes: function(layero, index){
            var id = $("input[name='id']").val();
            var hospital_name = $("input[name='hospital_name']").val();
            var desc = $("textarea[name='desc']").val();
            if(!hospital_name){
                layer.msg('请输入医院名称');
                return false;
            }
            if(!desc){
                layer.msg("请输入备注")
            }
            var field = {};
            field.id = id
            field.hospital_name = hospital_name;
            field.desc = desc;
            $.ajax({
                url: "<?php echo url('edithospital'); ?>",
                data: field,
                type: "POST"
            }).done(function(data) {
                if(data.result == 0){
                    layer.msg(data.message, {
                        icon: 1,
                        time: 3000
                    },function(){
                        location.href = data.url;
                    });
                }else{
                    layer.msg(data.message, {
                        icon: 2,
                        time: 3000
                    });
                }
            }).error(function(data) {
                layer.msg('错误', {
                    icon: 2,
                    content: '服务器错误'
                })
            })
        }
      });
    }
</script>