<?php /*a:2:{s:83:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\equipment\equipmentlist.html";i:1560477900;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
.layui-btn layui-btn-xs{
    background-color: snow;color: blue;
}
</style>
<div class="admin-main">
    <div class="layui-form">
        <blockquote class="layui-elem-quote" style="font-size: 12px;">
            <div class="layui-form-item" style="margin-bottom: 0px;margin-left: 80px;">
                <form method="get" action="<?php echo url('equipmentlist'); ?>">
                    <div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                            <label class="layui-form-label">设备编号</label>
                            <input type="text" class="layui-input" style="width:200px" name="equipment_no" id="name" value="" placeholder="请输入设备编号搜索" autocomplete="off">
                        </div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                            <label class="layui-form-label">设备名称</label>
                            <input type="text" class="layui-input" style="width:200px" name="equipment_name" id="name" value="" placeholder="请输入设备名称搜索" autocomplete="off">
                        </div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                            <label class="layui-form-label">负责人</label>
                            <input type="text" class="layui-input" style="width:200px" name="charge_name" id="name" value="" placeholder="请输入负责人名称搜索" autocomplete="off">
                        </div>
                        <button class="layui-btn layui-btn-normal" style="margin-left: 30px;"><i class="layui-icon">&#xe615;</i> 查询</button>
                    </div>
                    <div style="float: left">
                        <label class="layui-form-label">所在地区</label>
                        <div class="layui-input-inline">
                            <input type="text" class="layui-input" style="display: none;width:200px" name="filter" id="city" value="" placeholder="请选择省市区" autocomplete="off">
                        </div>
                        <div style="display: inline;" id="c">
                            <div class="layui-input-inline" id="div">
                                <select name="area_id1" lay-filter="data1">
                                    <option value="">请选择省市区</option>
                                    <?php if(is_array($region) || $region instanceof \think\Collection || $region instanceof \think\Paginator): if( count($region)==0 ) : echo "" ;else: foreach($region as $key=>$v): ?>
                                        <option value="<?php echo htmlentities($v['id']); ?>" ><?php echo htmlentities($v['name']); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="layui-input-inline" id="div1" style="display: none;">
                                <select lay-filter="data2" name="area_id2" id="select2">
                                </select>
                            </div>
                            <div class="layui-input-inline" id="div2" style="display: none;">
                                <select lay-filter="data3" name="area_id3" id="select3">
                                </select>
                            </div>
                        </div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                            <label class="layui-form-label">状态</label>
                            <div class="layui-input-block" style="width: 101px;margin-left: 80px;">
                                <select name="status" lay-verify="">
                                    <option value="">全部</option>
                                    <option value="1">正常</option>
                                    <option value="2">不正常</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                            <label class="layui-form-label">所属医院</label>
                            <div class="layui-input-block" style="width: 200px;margin-left: 80px;">
                                <select name="hospital_id" lay-verify="">
                                    <option value="">请选择所属医院</option>
                                    <?php if(is_array($hospital) || $hospital instanceof \think\Collection || $hospital instanceof \think\Paginator): if( count($hospital)==0 ) : echo "" ;else: foreach($hospital as $key=>$val): ?>
                                    <option value="<?php echo htmlentities($val['id']); ?>"><?php echo htmlentities($val['hospital_name']); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </blockquote>
        <table class="layui-table">
            <thead>
                <th>设备编号</th>
                <th>设备名称</th>
                <th>设备地区</th>
                <th>所属医院</th>
                <th>柜门</th>
                <th>负责人</th>
                <th>负责人电话</th>
                <th>状态</th>
                <th>操作</th>
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($val['equipment_no']); ?></td>
                    <td><?php echo htmlentities($val['equipment_name']); ?></td>
                    <td><?php echo htmlentities($val['name']); ?></td>
                    <td><?php echo htmlentities($val['hospital_name']); ?></td>
                    <td><?php echo htmlentities($val['model_num']); ?></td>
                    <td><?php echo htmlentities($val['charge_name']); ?></td>
                    <td><?php echo htmlentities($val['charge_phone']); ?></td>
                    <td>
                        <?php if($val['status'] == 1): ?>
                        <span style="color: black;font-weight: bold;font-size: 14px;">正常</span>
                        <?php endif; if($val['status'] == 2): ?>
                        <span style="color: red;font-weight: bold;font-size: 14px;">不正常</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="layui-input-inline">
                            <a href='<?php echo url("editequipment",["id"=>$val['id'],"device_id"=>$val['device_id']]); ?>' class="layui-btn layui-btn-xs" style="background-color: snow;color: blue;" lay-event="edit">编辑</a>
                            <a href="" class="layui-btn layui-btn-xs" style="background-color: snow;color: blue;" lay-event="edit">启用</a>
                            <a href="" class="layui-btn layui-btn-xs" style="background-color: snow;color: blue;" lay-event="edit">一件开门</a>
                            <a href="" class="layui-btn layui-btn-xs" style="background-color: snow;color: blue;" lay-event="edit">生成二维码</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $("#city").bind("input propertychange",function(){
        if($(this).val() == ''){
            $("#city").hide();
            $('#c').show();
            $("#div1").hide();
            $("#div2").hide();
        }
        console.log($(this).val());
        
    });
    layui.use('form', function() {
        var form = layui.form;
        form.render('select');
        var top_id = '';
        var province_name = ''; //定义 省
        var city_name = '';
        var area_name = '';
        //下拉选择：省/市
        form.on('select(data1)', function(data) {
            top_id = data.value;
            var idea = 1;
            province_name = data.elem[data.elem.selectedIndex].text
            $("#div1").show();
            //alert(hosid);
            $.ajax({
                url : "<?php echo url('region'); ?>",
                data : {top_id:top_id,idea:idea},
                dataType : "json",
                success : function(d) {
                    console.log(d);
                    var tmp = '<option value="">--请选择--</option>';
                    //改变第三级下拉框回复原样
                    $("#select2").html(tmp);
                    $("#select3").html(tmp);
                    for ( var i in d) {
                        tmp += '<option value="'+d[i].id+'">' + d[i].name + '</option>';
                    }
                    $("#select2").html(tmp);
                    form.render();
                },
                error:function(){
                    layer.alert('请求失败，稍后再试', {icon: 5});
                }

            });
        });

        //下拉选择：市/区
        form.on('select(data2)', function(data) {
            var id   = data.value;
            second_id = id;
            var idea = 2;
            city_name = data.elem[data.elem.selectedIndex].text
            $("#div2").show();

            $.ajax({
                url : "<?php echo url('region'); ?>",
                data : {top_id:top_id,id:id,idea:idea},
                dataType : "json",
                success : function(d) {
                    var tmp = '<option value="">--请选择--</option>';
                    //改变第三级下拉框回复原样
                    $("#select3").html(tmp);
                    for ( var i in d) {
                        tmp += '<option value="'+d[i].id+'">' + d[i].name + '</option>';
                    }
                    $("#select3").html(tmp);
                    form.render();
                },
                error:function(){
                    layer.alert('请求失败，稍后再试', {icon: 5});
                }

            });
        });

        //下拉选择：乡/镇
        form.on('select(data3)', function(data) {
            area_name = data.elem[data.elem.selectedIndex].text
            area_id = data.value;
            $("#city").val(province_name+'/'+city_name+'/'+area_name)
            $("#city").show();
            $("#c").hide();
        });
        
    });
    
</script>