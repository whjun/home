<?php /*a:2:{s:83:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\equipment\editequipment.html";i:1560577184;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
#c{
    margin-left: 490px;
    position: absolute;
    margin-top: -11px;
}
</style>
<div class="admin-main">
    <div class="layui-form">
        <form method="get" action="<?php echo url('edite'); ?>">
            <blockquote class="layui-elem-quote" style="font-size: 12px;">
                <div class="layui-form-item" style="margin-bottom: 0px;">
                    <table class="layui-table">
                        <thead>
                            <tr>
                                <th>设备编号</th>
                                <th>设备名称</th>
                                <th>设备地区</th>
                                <th>所属医院</th>
                                <th>柜门数量</th>
                                <th>负责人</th>
                                <th>负责人电话</th>
                                <th>状态</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #f1f1f1;">
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <input type="hidden" value="<?php echo htmlentities($v['device_id']); ?>" name="device_id">
                                <input type="hidden" value="<?php echo htmlentities($v['id']); ?>" name="d_id">
                                <td><?php echo htmlentities($v['equipment_no']); ?></td>
                                <td style="width: 200px;background: white;"><input type="text" name="equipment_name" style="width: 200px; height: 24px;border: snow;" value="<?php echo htmlentities($v['equipment_name']); ?>"></td>
                                <td style="width: 250px;background-color: white;">
                                    <input type="text" style="display: none" placeholder="请选择省市区" style="width: 250px;height: 24px;border: snow;">
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" style="width:200px" name="filter" id="city" value="" placeholder="请选择省市区" autocomplete="off">
                                    </div>
                                </td>
                                <td style="width: 200px;background: white;">
                                    <select name="hospital" id="" style="width: 24px">
                                        <option value="">请选择所属医院</option>
                                        <?php if(is_array($hospital) || $hospital instanceof \think\Collection || $hospital instanceof \think\Paginator): if( count($hospital)==0 ) : echo "" ;else: foreach($hospital as $key=>$vo): ?>
                                        <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['hospital_name']); ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </td>
                                <td><?php echo htmlentities($v['model_num']); ?></td>
                                <td style="width: 200px;background: white;"><input type="text" name="charge_name" value="<?php echo htmlentities($v['charge_name']); ?>" style="width: 200px; height: 24px;border: snow;"></td>
                                <td style="width: 200px;background: white;"><input type="text" name="charge_phone" value="<?php echo htmlentities($v['charge_phone']); ?>" style="width: 200px; height: 24px;border: snow;"></td>
                                <td>
                                    <?php if($v['status'] == 1): ?>
                                    正常
                                    <?php endif; if($v['status'] == 2): ?>
                                    不正常
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
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
            </blockquote>
            <blockquote class="layui-elem-quote" style="font-size: 12px;">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <label class="layui-form-label" style="width: auto">免费时长：</label>
                <button type="button" class="layui-btn layui-btn-primary layui-btn-sm" onclick="jian()" id="num1">-</button>
                <div class="layui-input-inline" style="width:auto;">
                    <input type="text" class="layui-input" style="width:80px" name="free_time" id="num" value="<?php echo htmlentities($v['free_time']); ?>" placeholder="选择时长" autocomplete="off">
                </div>
                <button type="button" class="layui-btn layui-btn-primary layui-btn-sm" onclick="jia()" id="num2">+</button>
                <span style="margin-right: 120px;">分钟</span>
                <div class="layui-input-inline" style="width:auto;margin-right: 90px;">
                <label class="layui-form-label" style="width: auto">计费金额：</label>
                <input type="text" style="width: 80px;display: inline;" class="layui-input" style="width:200px" name="money" id="name" value="<?php if(empty($v['money']) || (($v['money'] instanceof \think\Collection || $v['money'] instanceof \think\Paginator ) && $v['money']->isEmpty())): ?>0<?php endif; ?><?php echo htmlentities($v['money']); ?>" placeholder="金额" autocomplete="off">  
                元 / 
                <input type="text" style="width: 80px;display: inline;" class="layui-input" style="width:200px" name="minute" id="name" value="<?php if(empty($v['minute']) || (($v['minute'] instanceof \think\Collection || $v['minute'] instanceof \think\Paginator ) && $v['minute']->isEmpty())): ?>0<?php endif; ?><?php echo htmlentities($v['minute']); ?>" placeholder="时间" autocomplete="off">
                <span style="margin-right: 120px;">分钟</span>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </blockquote>
            <blockquote class="layui-elem-quote" style="font-size: 12px;">
                <table class="layui-table">
                    <thead>
                        <tr style="height: 57px;">
                            <th>柜门编号</th>
                            <th>柜门名称</th>
                            <th>柜门状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #f2f2f2;">
                        <?php if(is_array($lock) || $lock instanceof \think\Collection || $lock instanceof \think\Paginator): if( count($lock)==0 ) : echo "" ;else: foreach($lock as $key=>$val): ?>
                        <tr style="background-color: #f2f2f2;">
                            <input type="hidden" name="lock_id[]" value="<?php echo htmlentities($val['lock_num']); ?>">
                            <input type="hidden" name="l_id[]" value="<?php echo htmlentities($val['id']); ?>">
                            <td><?php echo htmlentities($val['lock_num']); ?></td>
                            <td style="width: 400px;background-color: white;"><input type="text" name="lock_name[]" style="width: 400px;border: snow;height: 38px;" value="<?php echo htmlentities($val['lock_name']); ?>" placeholder="请输入设备名称"></td>
                            <td>
                                <?php switch($val['status']): case "1": ?><span>借出</span><?php break; case "2": ?><span>未借出</span><?php break; case "3": ?><span style="color: red">损坏</span><?php break; case "4": ?><span style="color: red">闲置</span><?php break; default: ?>/
                                <?php endswitch; ?></td>
                            <td>
                                <button type="button" class="layui-btn layui-btn-xs layui-btn-normal" onclick="editlock('<?php echo htmlentities($val['id']); ?>','<?php echo htmlentities($val['lock_num']); ?>','<?php echo htmlentities($val['lock_name']); ?>','<?php echo htmlentities($val['status']); ?>')">编辑</button>
                                <button type="button" class="layui-btn layui-btn-xs layui-btn-normal" onclick="opendoor('<?php echo htmlentities($val['id']); ?>','<?php echo htmlentities($val['lock_num']); ?>','<?php echo htmlentities($val['lock_name']); ?>','<?php echo htmlentities($val['status']); ?>')">开门</button>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </blockquote>
            <center>
                    <button type="submit" style="width: 150px;" class="layui-btn layui-btn-normal">保存</button>
                    <a href="<?php echo url('equipmentlist'); ?>"><button type="button" style="width: 150px;" class="layui-btn layui-btn-primary">取消</button></a>
            </center>
        </form>
        <div class="layui-form-item" id="lock" style="display: none;margin-top: 25px;margin-bottom: 207px;">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="lock_id" value="">
            <div class="layui-input-inline" style="width:auto;">
                <label class="layui-form-label" style="width: auto;margin-left: 25px;">柜门名称</label>
                <input type="text" style="width: 254px;margin-left: 13px;" class="layui-input" name="lock_name" id="name" value="" placeholder="请输入柜门名称" autocomplete="off">
            </div>
            <div class="layui-input-inline" style="width:auto;margin-top: 20px;">
                <label class="layui-form-label" style="width: auto;margin-left: -4px;">选择柜门状态</label>
                <div class="layui-input-block" style="width: 121px;">
                    <select name="status" lay-verify="">
                        <option value="1">借出</option>
                        <option value="2">未借出</option>
                        <option value="3">维修中</option>
                        <option value="4">闲置</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#city").on('click',function(){
        $('#c').show();
    })
    //Demo
    layui.use('form', function(){
        var form = layui.form;
        
        //监听提交
        form.on('submit(formDemo)', function(data){
        layer.msg(JSON.stringify(data.field));
        return false;
        });
    });
    function FN(btnType) {
        if (btnType == 'plus') {
            $('#valShow').html(parseInt($('#valShow').html()) + 1)
        } else if (btnType == 'minus') {
            $('#valShow').html(parseInt($('#valShow').html()) - 1)
        }
    }
    //柜门编辑
    function editlock(id,lock_id,lock_name,status) {
        $("input[name='id']").attr('disabled',true).val(id);
        $("input[name='lock_id']").attr('disabled',true).val(lock_id);
        $("input[name='lock_name']").val(lock_name);
        $("input[name='status']").val(status);
        layer.open({
        type: 1
        ,title: '编辑'
        ,area: ['400px', '500px']
        ,shade: 0
        ,content: $('#lock')
        ,btn: ['确定', '取消']
        ,shade :0.8
        ,btnAlign: 'c'
        ,skin: 'open_class'
        ,yes: function(layero, index){
            var id = $("input[name='id']").val();
            var lock_id = $("input[name='lock_id']").val();
            var lock_name = $("input[name='lock_name']").val();
            var status = $("select[name='status']").val();
            if(!lock_name){
                layer.msg('请输入柜门名称');
                return false;
            }
            if(!status){
                layer.msg("请选择柜门状态");
                return false;
            }
            var field = {};
            field.id = id;
            field.lock_id = lock_id;
            field.lock_name = lock_name;
            field.status = status;
            $.ajax({
                url: "<?php echo url('editlock'); ?>",
                data: field,
                type: "POST"
            }).done(function(data) {
                console.log(data);
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
    //数字减
    function jian(){
        var num = $("#num").val();
        var num1 = parseInt(num) - 1;
        $("#num").val(num1);
    }
    //数字加
    function jia(){
        var num = $("#num").val();
        var num1 = parseInt(num) + 1;
        $("#num").val(num1);
    }
    //地区三级联动
    $("#city").bind("input propertychange",function(){
        if($(this).val() == ''){
            // $("#city").hide();
            $('#c').show();
            // $("#div1").hide();
            // $("#div2").hide();
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