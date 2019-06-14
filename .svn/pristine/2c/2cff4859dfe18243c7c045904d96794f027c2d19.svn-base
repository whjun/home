<?php /*a:2:{s:71:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\index\index.html";i:1559631740;s:26:"./admin-layout/bottom.html";i:1559631735;}*/ ?>
<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="utf-8">
		<title><?php echo htmlentities($web_name); ?></title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!-- 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">

		<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>plugins/layui/font/iconfont.ttf" media="all" />
		<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>css/global.css" media="all">
		<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>plugins/font-awesome/css/font-awesome.min.css">

	</head>
	<style>
		.header-demo .layui-nav .layui-this{
			background: #FFFFFF;
		}
	</style>
	<body>
		<style>
			.fa {
				width: 18px;
			}
		</style>
		<div class="layui-layout layui-layout-admin" style="border-bottom: solid 5px #1aa094;">
			<div class="layui-header header header-demo">
				<div class="layui-main">
					<div class="admin-login-box" style="width:auto;">
						<a class="logo" style="left: 0;" href="#">
							<span style="font-size: 22px;"><?php echo htmlentities($web_name); ?></span>
						</a>
						<div class="admin-side-toggle" style="left:186px;">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</div>
						<div class="admin-side-full" style="left:230px;">
							<i class="fa fa-life-bouy" aria-hidden="true"></i>
						</div>
						<div class="admin-side-full" style="left:270px;background: none;top:30%;">
							<iframe style="height: 30px;" id="fancybox-frame" name="fancybox-frame1530149608356" frameborder="0" scrolling="no" hspace="0" src="http://i.tianqi.com/index.php?c=code&a=getcode&id=34&h=25&w=280"></iframe>
						</div>
					</div>
					<ul class="layui-nav admin-header-item">
						<li class="layui-nav-item">
							<a href="javascript:;" class="admin-header-user">
								<img src="<?php echo ADMIN_STYLE; ?>images/0.jpg" />
							</a>
							<dl class="layui-nav-child">
								<dd>
									<a href="javascript:;" onclick="window.editPass()"><i class="fa fa-user-circle" aria-hidden="true"></i> 修改密码</a>
								</dd>
								<dd>
									<a href="javascript:;" onclick="window.loginout()"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a>
								</dd>
							</dl>
						</li>
					</ul>
					<ul class="layui-nav admin-header-item-mobile">
						<li class="layui-nav-item">
							<a href="javascript:;" onclick="window.loginout()"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="layui-side layui-bg-black" id="admin-side">
				<div class="layui-side-scroll" id="admin-navbar-side" lay-filter="side"></div>
			</div>
			<div class="layui-body" style="bottom: 0;border-left: solid 2px #1AA094;" id="admin-body">
				<div class="layui-tab admin-nav-card layui-tab-brief" lay-filter="admin-tab">
					<ul class="layui-tab-title">
						<li class="layui-this">
							<i class="fa fa-home" aria-hidden="true"></i>
							<cite>首页</cite>
						</li>
					</ul>
					<div class="layui-tab-content" style="min-height: 150px; padding: 5px 0 0 0;">
						<div class="layui-tab-item layui-show">
							<iframe src="<?php echo url('main'); ?>"></iframe>
						</div>
					</div>
				</div>
			</div>
			<div class="layui-footer footer footer-demo" id="admin-footer">
				<div class="layui-main">
					<p><span class="year"></span> &copy;
						<a href="<?php echo htmlentities($real_url); ?>" target="_blank"><?php echo htmlentities($real_url); ?></a>
					</p>
				</div>
			</div>
			<div class="site-tree-mobile layui-hide">
				<i class="layui-icon">&#xe602;</i>
			</div>
			<div class="site-mobile-shade"></div>

			<!--锁屏模板 start-->
			<script type="text/template" id="lock-temp">
				<div class="admin-header-lock" id="lock-box">
					<div class="admin-header-lock-img">
						<img src="<?php echo ADMIN_STYLE; ?>images/0.jpg" />
					</div>
					<div class="admin-header-lock-name" id="lockUserName">beginner</div>
					<input type="text" class="admin-header-lock-input" value="输入密码解锁.." name="lockPwd" id="lockPwd" />
					<button class="layui-btn layui-btn-small" id="unlock">解锁</button>
				</div>
			</script>
		</div>
		<script src="<?php echo ADMIN_STYLE; ?>js/jquery.min.js"></script>
		<script src="<?php echo ADMIN_STYLE; ?>plugins/layui/layui.js"></script>
		<script type="text/javascript">
			nowtime = new Date();
			year = nowtime.getFullYear();
			$('.year').html(year);
		</script>
		<script type="text/javascript" src="<?php echo ADMIN_STYLE; ?>plugins/layui/layui.js"></script>
<script>
	var navs = JSON.parse('<?php echo app('session')->get('navs'); ?>');
	var path = "<?php echo ADMIN_STYLE; ?>";
</script>
<script src="<?php echo ADMIN_STYLE; ?>js/index.js"></script>
<script>
	layui.use(['layer', 'element', 'tab'], function() {
		var $ = layui.jquery,
			element = layui.element,
			layer = layui.layer;
		var tab = layui.tab({
			elem: '.admin-nav-card',
			contextMenu: true,
			onSwitch: function(data) {},
			closeBefore: function(obj) { //tab 关闭之前触发的事件
				if(obj.title === 'BTable') {
					layer.confirm('确定要关闭' + obj.title + '吗?', {
						icon: 3,
						title: '系统提示'
					}, function(index) {
						//因为confirm是非阻塞的，所以这里关闭当前tab需要调用一下deleteTab方法
						tab.deleteTab(obj.tabId);
						layer.close(index);
					});
					//返回true会直接关闭当前tab
					return false;
				} else if(obj.title === '表单') {
					layer.confirm('未保存的数据可能会丢失哦，确定要关闭吗?', {
						icon: 3,
						title: '系统提示'
					}, function(index) {
						tab.deleteTab(obj.tabId);
						layer.close(index);
					});
					return false;
				}
				return true;
			}
		});
		//修改密码
		window.editPass = function() {
			var type = $(this).data('type');
			layer.open({
				type: 2,
				offset: type,
				title: '修改密码',
				id: 'LAY_demo' + type,
				content: "<?php echo url('admin/index/editpass'); ?>",
				area: ['700px', '400px'],
				shade: 0.8
			});
		}
		//退出登录
		window.loginout = function() {
			layer.confirm('您确定要退出登录吗?', {
				icon: 3,
				title: '温馨提示'
			}, function(index) {
				$.ajax({
					url: "<?php echo url('admin/index/loginout'); ?>",
					type: "GET",
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
	});
</script>
</body>

</html>