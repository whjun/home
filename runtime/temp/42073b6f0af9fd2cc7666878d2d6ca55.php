<?php /*a:2:{s:85:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\marketing\marketingcoupon.html";i:1560154003;s:26:"./admin-layout/header.html";i:1559631735;}*/ ?>
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
        <blockquote class="layui-elem-quote" style="font-size:12px;">
            <div class="layui-form-item" style="margin-bottom: 0px;">
                <form method="get" action="<?php echo url('marketingcoupon');; ?>">
                    <div class="layui-input-inline" style="width:auto;">
                        <label class="layui-form-label" style="width: 102px">优惠卷名称</label>
                        <input type="text" class="layui-input" style="display: inline;width:200px" name="coupon_name" id="name" value="" placeholder="输入优惠卷名称搜索" autocomplete="off">
                        <button class="layui-btn" id="search" type='submit'>
                            <i class="layui-icon">&#xe615;</i> 查询
                        </button>
                    </div>
                </form>
                <?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): if( count($menulist)==0 ) : echo "" ;else: foreach($menulist as $key=>$val): if($val['url'] == 'Marketing/addcoupon'): ?>
                <div class="layui-input-inline" style="width: auto;">
                <button class="layui-btn layui-btn-normal" onclick="addcoupon()"><i class="layui-icon">&#xe608;</i><?php echo htmlentities($val['title']); ?></button>
                </div>
                <?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </blockquote>
        <table class="layui-table">
            <thead>
                <th>序号</th>
                <th>优惠卷名称</th>
                <th>规则</th>
                <th>生效时间</th>
                <th>过期时间</th>
                <th>状态</th>
                <th>操作</th>
            </thead>
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$data): ?>
                <tr>
                    <td><?php echo htmlentities($data['id']); ?></td>
                    <td><?php echo htmlentities($data['coupon_name']); ?></td>
                    <td>应付金额满<?php echo htmlentities($data['max_money']); ?>元，优惠金额<?php echo htmlentities($data['cut_money']); ?>元</td>
                    <td><?php echo htmlentities($data['start_time']); ?></td>
                    <td><?php echo htmlentities($data['end_time']); ?></td>
                    <td>
                        <?php if($data['status'] == 1): ?>
                        未过期
                        <?php endif; if($data['status'] == 0): ?>
                        已过期
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(is_array($menulist) || $menulist instanceof \think\Collection || $menulist instanceof \think\Paginator): if( count($menulist)==0 ) : echo "" ;else: foreach($menulist as $key=>$val): if($val['id'] == 139): ?>
                        <button class="layui-btn layui-btn-xs layui-btn-normal" onclick="edithospital('<?php echo htmlentities($data['id']); ?>','<?php echo htmlentities($data['coupon_name']); ?>','<?php echo htmlentities($data['max_money']); ?>','<?php echo htmlentities($data['cut_money']); ?>','<?php echo htmlentities($data['start_time']); ?>','<?php echo htmlentities($data['end_time']); ?>')"><?php echo htmlentities($val['title']); ?></button>
                        <?php endif; if($val['id'] == 140): ?>
                        <button type="button" class="layui-btn layui-btn-xs layui-btn-danger" onclick='Delete(<?php echo htmlentities($data['id']); ?>)'><?php echo htmlentities($val['title']); ?></button> <?php endif; ?> 
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div id="coupon" style="display: none">
            <input type="hidden" name="id" value="">
            <div class="layui-form-item" style="margin-top: 25px;">
                <div class="layui-inline">
                    <label class="layui-form-label" style="width: auto">优惠券名称：</label>
                    <input type="text" name="coupon_name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" style="width: auto">
                </div>
                <div class="layui-inline" style="margin-left: 42px;">
                    <label class="layui-form-label" style="width: auto">规则：</label>
                    <div class="layui-input-inline" style="width: 100px;">
                        <input type="text" name="max_money" placeholder="￥" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid">-</div>
                    <div class="layui-input-inline" style="width: 100px;">
                        <input type="text" name="cut_money" placeholder="￥" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline" style="margin-left: 13px;">
                    <label class="layui-form-label" style="width: auto">生效日期：</label>
                    <div class="layui-input-inline">
                        <input type="text" name="start_time" class="layui-input" id="test1" placeholder="请选择日期">
                    </div>
                </div>
                <div class="layui-inline" style="margin-left: 13px;">
                    <label class="layui-form-label" style="width: auto">失效日期：</label>
                    <div class="layui-input-inline">
                        <input type="text" name="end_time" class="layui-input" id="test2" placeholder="请选择日期">
                    </div>
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
        
        //监听提交
        form.on('submit(formDemo)', function(data){
        layer.msg(JSON.stringify(data.field));
        return false;
        });
    });
    layui.use('laydate', function(){
        var laydate = layui.laydate;
  
        //执行一个laydate实例
        laydate.render({
            elem: '#test1' //指定元素
        });
        laydate.render({
            elem: '#test2' //指定元素
        });
    });
    //添加
    function addcoupon(){
        layer.open({
            type: 1
            ,title: '添加/编辑'
            ,area: ['400px', '363px']
            ,shade: 0
            ,content: $('#coupon')
            ,btn: ['确定', '取消']
            ,shade :0.8
            ,btnAlign: 'c'
            ,skin: 'open_class'
            ,yes: function(layero, index){
                var coupon_name = $("input[name='coupon_name']").val();
                var max_money = $("input[name='max_money']").val();
                var cut_money = $("input[name='cut_money']").val();
                var start_time = $("input[name='start_time']").val();
                var end_time = $("input[name='end_time']").val();
                if(!coupon_name){
                    layer.msg('优惠券名称不能为空！');
                    return false;
                }
                if(!max_money){
                    layer.msg('规则不能为空！');
                    return false;
                }
                if(!cut_money){
                    layer.msg('规则不能为空！');
                    return false;
                }
                if(!start_time){
                    layer.msg('开始时间不能为空！');
                    return false;
                }
                if(!end_time){
                    layer.msg('失效时间不能为空！');
                    return false;
                }
                var field = {};
                field.coupon_name = coupon_name;
                field.max_money = max_money;
                field.cut_money = cut_money;
                field.start_time = start_time;
                field.end_time = end_time;
                $.ajax({
                    url: "<?php echo url('addcoupon'); ?>",
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
        })
    }
    //编辑
    function edithospital(id,coupon_name,max_money,cut_money,start_time,end_time) {
        $("input[name='id']").attr('disabled',true).val(id);
        $("input[name='coupon_name']").val(coupon_name);
        $("input[name='max_money']").val(max_money);
        $("input[name='cut_money']").val(cut_money);
        $("input[name='start_time']").val(start_time);
        $("input[name='end_time']").val(end_time);
        layer.open({
            type: 1
            ,title: '添加/编辑'
            ,area: ['400px', '363px']
            ,shade: 0
            ,content: $('#coupon')
            ,btn: ['确定', '取消']
            ,shade :0.8
            ,btnAlign: 'c'
            ,skin: 'open_class'
            ,yes: function(layero, index){
                var coupon_name = $("input[name='coupon_name']").val();
                var max_money = $("input[name='max_money']").val();
                var cut_money = $("input[name='cut_money']").val();
                var start_time = $("input[name='start_time']").val();
                var end_time = $("input[name='end_time']").val();
                if(!coupon_name){
                    layer.msg('优惠券名称不能为空！');
                    return false;
                }
                if(!max_money){
                    layer.msg('规则不能为空！');
                    return false;
                }
                if(!cut_money){
                    layer.msg('规则不能为空！');
                    return false;
                }
                if(!start_time){
                    layer.msg('开始时间不能为空！');
                    return false;
                }
                if(!end_time){
                    layer.msg('失效时间不能为空！');
                    return false;
                }
                var field = {};
                if(id){
                    field.id = id
                }
                field.coupon_name = coupon_name;
                field.max_money = max_money;
                field.cut_money = cut_money;
                field.start_time = start_time;
                field.end_time = end_time;
                $.ajax({
                    url: "<?php echo url('editcoupon'); ?>",
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
        })
    }
    //删除
    function Delete(id) {
        layer.confirm('您确定要删除吗？', {
            icon: 3,
            title: '温馨提示'
        },function(index){
            $.ajax({
                url: "<?php echo url('delcoupon'); ?>",
                data: {id:id},
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
            }).error(function(data){
                layer.msg('错误', {
                    icon: 2,
                    content: '服务器错误'
                });
            });
            layer.close(index);
        })
    }
</script>