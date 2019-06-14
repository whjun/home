<?php /*a:1:{s:71:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\index\login.html";i:1559631740;}*/ ?>
<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>登录</title>
		<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>css/login.css" />
	</head>

	<body class="beg-login-bg">
		<div class="beg-login-box">
			<header>
				<h1>后台管理系统</h1>
			</header>
			<div class="beg-login-main">
				<form action="" class="layui-form" method="" id="form">
					<input name="__RequestVerificationToken" type="hidden" value="fkfh8D89BFqTdrE2iiSdG_L781RSRtdWOH411poVUWhxzA5MzI8es07g6KPYQh9Log-xf84pIR2RIAEkOokZL3Ee3UKmX0Jc8bW8jOdhqo81" />
					<div class="layui-form-item">
						<label class="beg-login-icon">
                        <i class="layui-icon">&#xe612;</i>
                    </label>
						<input type="text" name='username' value="<?php echo htmlentities(app('request')->cookie('username')); ?>" lay-verify="userName" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
					</div>
					<div class="layui-form-item">
						<label class="beg-login-icon">
                        <i class="layui-icon">&#xe642;</i>
                    </label>
						<input type="password" name="password" value="<?php echo htmlentities(app('request')->cookie('password')); ?>" lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
					</div>
					<div class="layui-form-item">
						<div class="layui-inline">
							<div class="layui-input-inline" style="width:126px;">
								<label class="beg-login-icon">
			                        <i class="layui-icon">&#xe614;</i>
			                    </label>
								<input type="text" name="captcha" autocomplete="off" placeholder="验证码" class="layui-input">
							</div>
						</div>
						<div class="layui-inline" style="margin-right:0px;">
							<div class="layui-input-inline" style="width:120px;margin-right:0px;">
								<img src="<?php echo captcha_src(); ?>" style="width:120px;" id="captcha" style="cursor: pointer;" onclick="this.src='<?php echo captcha_src(); ?>?d='+Math.random();" title="点击刷新" alt="captcha" />
							</div>
						</div>
					</div>
					<div class="layui-form-item">
						<div class="beg-pull-left beg-login-remember">
							<label>记住帐号？</label>
							<input type="checkbox" name="rememberMe" value="true" lay-skin="switch" checked title="记住帐号">
						</div>
						<div class="beg-pull-right">

							<button class="layui-btn layui-btn-primary" type="submit" lay-submit lay-filter="login">
                            <i class="layui-icon">&#xe650;</i> 登录
                        </button>
						</div>
						<div class="beg-clear"></div>
					</div>
				</form>
			</div>
			<footer>
				<!--<p>Beginner © www.zhengjinfan.cn</p>-->
			</footer>
		</div>
		<script type="text/javascript" src="<?php echo ADMIN_STYLE; ?>plugins/layui/layui.js"></script>
		<script>
			layui.use(['layer', 'form'], function() {
				var layer = layui.layer,
					$ = layui.jquery,
					form = layui.form;

				form.on('submit(login)', function(data) {
					if(!data.field.username){
						layer.msg('请输入登录名');
						return false;
					}
					if(!data.field.password){
						layer.msg('请输入密码');
						return false;
					}
					if(!data.field.captcha){
						layer.msg('请输入验证码');
						return false;
					}
					layer.load(0, {
						time: 3 * 1000
					});
					$.ajax({
						type: "POST",
						dataType: "json",
						url: "<?php echo url('index/login'); ?>",
						async: false,
						data: new FormData($('#form')[0]),
						processData: false,
						contentType: false,
						success: function(data) {
							if(data.result == 0) {
								layer.msg(data.message, {
									time: 2000
								}, function() {
									location.href = data.url;
								})
							} else {
								layer.msg(data.message,function(){
									$('#captcha').click();
									$('input[name=captcha]').val('');
								});
							}
						},
						error: function(data) {
							layer.msg("提交出错");
						}
					});
					return false;
				});
			});
		</script>
	</body>

</html>