<?php /*a:1:{s:70:"E:\phpstudy\PHPTutorial\WWW\PHP\application\admin\view\index\main.html";i:1559631740;}*/ ?>
<link href="<?php echo ADMIN_STYLE; ?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="<?php echo ADMIN_STYLE; ?>plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>plugins/layui/css/layui.css" media="all" />
<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>plugins/layui/font/iconfont.ttf" media="all" />
<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>css/global.css" media="all">
<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo ADMIN_STYLE; ?>/plugins/biaotou/public.css" media="all" />
<div class="admin-main">
	<div class="layui-form">
		<blockquote class="layui-elem-quote" style="font-size: 16px;background: #f2dede;color:#333;">
			<div id="nowTime">亲爱的<?php echo htmlentities($user['username']); ?>，<span class="times"></span>欢迎登录<?php echo htmlentities($web_name); ?>。当前时间为： <span class="nowtime"></span></div>
		</blockquote>
		
	</div>
</div>
<script src="<?php echo ADMIN_STYLE; ?>js/jquery.min.js"></script>
<script src="<?php echo ADMIN_STYLE; ?>js/bootstrap.min.js"></script>
<script>
	$(function() {
		getTime();
		var now = new Date(),
			hour = now.getHours();
		var times = '';
		if(hour < 6) {
			times = "凌晨好！";
		} else if(hour < 9) {
			times = "早上好！";
		} else if(hour < 12) {
			times = "上午好！";
		} else if(hour < 14) {
			times = "中午好！";
		} else if(hour < 17) {
			times = "下午好！";
		} else if(hour < 19) {
			times = "傍晚好！";
		} else if(hour < 22) {
			times = "晚上好！";
		} else {
			times = "夜里好！";
		}
		$('.times').html(times);
	})

	//取得系统当前时间
	function getTime() {
		nowtime = new Date();
		year = nowtime.getFullYear();
		month = nowtime.getMonth() + 1;
		date = nowtime.getDate();
		my_hours = nowtime.getHours();
		my_minutes = nowtime.getMinutes();
		my_seconds = nowtime.getSeconds();
		if(month < 10) {
			month = '0' + month;
		}
		if(my_hours < 10) {
			my_hours = '0' + my_hours;
		}
		if(my_seconds < 10) {
			my_seconds = '0' + my_seconds;
		}
		if(my_minutes < 10) {
			my_minutes = '0' + my_minutes;
		}
		var myddy = nowtime.getDay(); //获取存储当前日期
		var weekday = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
		$(".nowtime").html(year + "年" + month + "月" + date + "日 " + my_hours + ':' + my_minutes + ':' + my_seconds + '&nbsp;&nbsp;&nbsp;&nbsp;' + weekday[myddy]);
	}
	setInterval("getTime();", 1000); //每隔一秒运行一次
</script>