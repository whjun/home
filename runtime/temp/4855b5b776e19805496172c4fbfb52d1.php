<?php /*a:2:{s:84:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\equipment\equipmentfault.html";i:1560484663;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
    a{text-decoration:none}
</style>
<div class="admin-main">
    <div class="layui-form">
        <blockquote class="layui-elem-quote" style="font-size: 12px;">
            <div class="layui-form-item" style="margin-bottom: 0px;margin-left: 80px;">
                <form method="get" action="">
                    <div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                            <label class="layui-form-label">设备编号：</label>
                            <input type="text" class="layui-input" style="width:200px" name="filter" id="name" value="" placeholder="请输入设备编号搜索" autocomplete="off">
                        </div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                            <label class="layui-form-label">设备名称：</label>
                            <input type="text" class="layui-input" style="width:200px" name="filter" id="name" value="" placeholder="请输入设备名称搜索" autocomplete="off">
                        </div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                            <label class="layui-form-label">负责人：</label>
                            <input type="text" class="layui-input" style="width:200px" name="filter" id="name" value="" placeholder="请输入支付宝ID搜索" autocomplete="off">
                        </div>
                        
                    </div>
                    <div style="float: left">
                        <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                            <label class="layui-form-label">所属医院：</label>
                            <div class="layui-input-block" style="width: 160px;margin-left: 90px;">
                                <select name="city" lay-verify="">
                                    <option value="">请选择所属医院</option>
                                    <?php if(is_array($hospital) || $hospital instanceof \think\Collection || $hospital instanceof \think\Paginator): if( count($hospital)==0 ) : echo "" ;else: foreach($hospital as $key=>$val): ?>
                                    <option value="<?php echo htmlentities($val['id']); ?>"><?php echo htmlentities($val['hospital_name']); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-input-inline">
                            <button class="layui-btn" style="margin-left: 90px"><i class="layui-icon">&#xe615;</i> 查询</button>
                        </div>
                        <div class="layui-input-inline">
                            <button type="button" class="layui-btn layui-btn-normal" onclick="addfault()"><i class="layui-icon">&#xe608;</i> 添加</button>
                        </div>
                    </div>
                </form>
                <!-- <?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): if( count($menulist)==0 ) : echo "" ;else: foreach($menulist as $key=>$val): if($val['url'] == 'Equipment/addfault'): ?> -->
                <!-- <div class="layui-input-inline" style="width: auto;">
                    <button class="layui-btn layui-btn-normal" onclick="addfault()"><i class="layui-icon">&#xe608;</i>添加</button>
                </div> -->
                <!-- <?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?> -->
            </div>
        </blockquote>
        <table class="layui-table">
            <thead>
                <tr>
                <th>所属医院</th>
                <th>设备编号</th>
                <th>设备地区</th>
                <th>柜门名称</th>
                <th>故障类型</th>
                <th>故障描述</th>
                <th>联系人</th>
                <th>联系人电话</th>
                <th>设备负责人</th>
                <th>负责人联系电话</th>
                <th>操作</th>
                </tr> 
            </thead>
            <tbody>
                <tr style="height: 70px">
                    <td colspan="11">
                        <span>保修单号：1009201804041298</span>
                        <span style="margin-left: 97px;color: gray;">2019-04-04 12：12：12</span>
                        <span style="float: right;margin-right: 10px;">报修处理中</span>
                    </td>
                </tr>
                <tr style="height: 70px">
                    <td>沂水人民医院</td>
                    <td>1009201804041298</td>
                    <td>山东省临沂市沂水县</td>
                    <td>沂水人民医院一楼1号柜门</td>
                    <td>无法开门</td>
                    <td>归还时柜门没有打开，无法关闭</td>
                    <td>小红</td>
                    <td>1566666666</td>
                    <td>周二</td>
                    <td>15666666666</td>
                    <td>处理完成</td>
                </tr>
            </tbody>
        </table>
        <div id="fault" style="display: none">
            <label class="layui-form-label">设备地区</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" style="width:200px" name="filter" id="city" value="" placeholder="请选择省市区" autocomplete="off">
            </div>
        </div>
        <div style="display: none;" id="c">
            <div class="layui-input-inline" id="div">
                <select name="data1" lay-filter="data1">
                    <?php if(is_array($region) || $region instanceof \think\Collection || $region instanceof \think\Paginator): if( count($region)==0 ) : echo "" ;else: foreach($region as $key=>$vo): ?>
                        <option value="<?php echo htmlentities($vo['id']); ?>" ><?php echo htmlentities($vo['name']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="layui-input-inline" id="div1" style="display: none;">
                <select lay-filter="data2" name="data2" id="select2">
                </select>
            </div>
            <div class="layui-input-inline" id="div2" style="display: none;">
                <select lay-filter="data3" name="select3" id="select3">
                </select>
            </div>
        </div>
    </div>
</div>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;
        
        //监听提交
        form.on('submit(formDemo)', function(data){
        layer.msg(JSON.stringify(data.field));
        return false;
        });
    });
    //添加
    function addfault(){
        layer.open({
        type: 1
        ,title: '新增/编辑'
        ,area: ['450px', '500px']
        ,shade: 0
        ,content: $('#fault')
        ,btn: ['确定', '取消']
        ,shade :0.8
        ,btnAlign: 'c'
        ,skin: 'open_class'
        ,yes: function(layero, index){
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
    </script>