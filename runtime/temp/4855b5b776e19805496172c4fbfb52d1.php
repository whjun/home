<?php /*a:2:{s:84:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\equipment\equipmentfault.html";i:1560507721;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
    #c{
    /* margin-left: 490px; */
    position: absolute;
    margin-top: -387px;
    /* margin-top: -11px; */
    }
    .layui-layer-page .layui-layer-content{
        overflow: unset;
    }
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
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr style="height: 70px">
                    <td colspan="11">
                        <span>保修单号：<?php echo htmlentities($v['oddnumbers']); ?></span>
                        <span style="margin-left: 97px;color: gray;"><?php echo htmlentities($v['create_time']); ?></span>
                        <span style="float: right;margin-right: 10px;">
                            <?php if($v['status'] == 0): ?>
                            <span style="color: red">保修处理中</span>
                            <?php endif; if($v['status'] == 1): ?>
                            <span>处理完成</span>
                            <?php endif; ?>
                        </span>
                    </td>
                </tr>
                <tr style="height: 70px">
                    <td><?php echo htmlentities($v['hospital_name']); ?></td>
                    <td><?php echo htmlentities($v['equipment_no']); ?></td>
                    <td><?php echo htmlentities($v['name']); ?></td>
                    <td><?php echo htmlentities($v['lock_name']); ?></td>
                    <td>
                        <?php if($v['fault_cause'] == 1): ?>
                        开锁失败
                        <?php endif; if($v['fault_cause'] == 2): ?>
                        开门失败
                        <?php endif; if($v['fault_cause'] == 3): ?>
                        物品损坏
                        <?php endif; if($v['fault_cause'] == 4): ?>
                        关门失败
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlentities($v['fault_desc']); ?></td>
                    <td><?php if(empty($v['user_name']) || (($v['user_name'] instanceof \think\Collection || $v['user_name'] instanceof \think\Paginator ) && $v['user_name']->isEmpty())): ?>\<?php endif; ?><?php echo htmlentities($v['user_name']); ?></td>
                    <td><?php if(empty($v['tel']) || (($v['tel'] instanceof \think\Collection || $v['tel'] instanceof \think\Paginator ) && $v['tel']->isEmpty())): ?>\<?php endif; ?><?php echo htmlentities($v['tel']); ?></td>
                    <td><?php echo htmlentities($v['charge_name']); ?></td>
                    <td><?php echo htmlentities($v['charge_phone']); ?></td>
                    <td>
                        <?php if($v['status'] == 0): ?>
                        <span style="color: #b3aeae">处理完成</span>
                        <?php endif; if($v['status'] == 1): ?>
                        <a href="<?php echo url('editfaultstatus',['id'=>$v['id'],'id'=>$v['status']]); ?>">处理完成</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div id="fault" style="display: none;">
            <div class="layui-input-inline">
                <label class="layui-form-label">设备地区</label>
                <input type="text" class="layui-input" style="width: 328px;margin-left: 14px;" name="filter" id="city" value="" placeholder="请选择省市区" autocomplete="off">
            </div>
            <label class="layui-form-label">设备编号</label>
            <div class="layui-input-inline" style="width: 328px;margin-left: 14px;">
                    <select name="equipment_no">
                        <option value="">选择设备编号</option>
                        <?php if(is_array($device) || $device instanceof \think\Collection || $device instanceof \think\Paginator): if( count($device)==0 ) : echo "" ;else: foreach($device as $key=>$vo): ?>
                        <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['equipment_no']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            <label class="layui-form-label">柜门编号</label>
            <div class="layui-input-inline" style="width: 328px;margin-left: 14px;">
                <select name="lock_num">
                    <option value="">选择问题柜门编号</option>
                    <?php if(is_array($lock) || $lock instanceof \think\Collection || $lock instanceof \think\Paginator): if( count($lock)==0 ) : echo "" ;else: foreach($lock as $key=>$vo): ?>
                    <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['lock_num']); ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo htmlentities($vo['lock_name']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <label class="layui-form-label">保修类型</label>
            <div class="layui-input-inline" style="width: 328px;margin-left: 14px;">
                <select name="fault_cause">
                    <option value="">请选择保修类型</option>
                    <option value="1">开锁失败</option>
                    <option value="2">开门失败</option>
                    <option value="3">物品损坏</option>
                    <option value="4">关门失败</option>
                </select>
            </div>
            <label class="layui-form-label">故障描述</label>
            <div class="layui-input-inline" style="width: 328px;margin-left: 14px;">
                <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
            <div style="display: none;" id="c">
                <div class="layui-input-inline" id="div" style="width: 100px;margin-left: 14px;">
                    <select name="data1" lay-filter="data1">
                        <?php if(is_array($region) || $region instanceof \think\Collection || $region instanceof \think\Paginator): if( count($region)==0 ) : echo "" ;else: foreach($region as $key=>$vo): ?>
                            <option value="<?php echo htmlentities($vo['id']); ?>" ><?php echo htmlentities($vo['name']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-input-inline" id="div1" style="display: none;width: 100px;margin-left: 0px;">
                    <select lay-filter="data2" name="data2" id="select2">
                    </select>
                </div>
                <div class="layui-input-inline" id="div2" style="display: none;width: 100px;margin-left: 0px;">
                    <select lay-filter="data3" name="select3" id="select3">
                    </select>
                </div>
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
        ,area: ['360px', '600px']
        ,shade: 0
        ,content: $('#fault')
        ,btn: ['确定', '取消']
        ,shade :0.8
        ,btnAlign: 'c'
        ,skin: 'open_class'
        ,yes: function(layero, index){
            var data1 = $("select[name='data1']").val();
            var data2 = $("select[name='data2']").val();
            var data3 = $("select[name='select3']").val();
            var equipment_no = $("select[name='equipment_no']").val();
            var lock_num = $("select[name='lock_num']").val();
            var fault_cause = $("select[name='fault_cause']").val();
            var desc = $("textarea[name='desc']").val();
            var field = {};
            field.data1 = data1;
            field.data2 = data2;
            field.data3 = data3;
            field.equipment_no = equipment_no;
            field.lock_num = lock_num;
            field.fault_cause = fault_cause;
            field.desc = desc;
            $.ajax({
                url: "<?php echo url('addfault'); ?>",
                data: field,
                type: "POST"
            }).done(function(data) {
                console.log(data);return;
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
    $("#city").on('click',function(){
        $('#c').show();
        // console.log($('#city').val().length);
        // if($('#city').val().length == 0){
        //     $("#city").removeAttr(disabled);
        // }else{
        //     $("#city").attr('disabled',"disabled");
        // }
    })
    $("#city").bind("input propertychange",function(){
        if($(this).val() == ''){
            $('#c').show();
        }
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