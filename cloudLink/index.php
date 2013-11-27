 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "百度网盘外链分析工具";
	require BASE_INC . 'head.inc.php';
	?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<style type="text/css">
.box {
	max-width: 630px;
	padding: 19px 29px 29px;
	margin: 0 auto 20px;
	background-color: #fff;
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
	-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
	box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
}

.box a {
	font-family: Courier;
	text-decoration: none;
	line-height: 20px;
	color: #08c;
	font-size: 13px;
}

.center {
	text-align: center;
}

.box-heading {
	text-align: center;
	margin-bottom: 20px;
}

.box-input {
	width: 550px;
}

.box-button {
	text-align: center;
	padding: 20px 0px 30px 0px;
}
</style>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>
</head>


<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>">tiankonguse的实验室 </a>
		</div>
	</header>

	<section>
		<div class="container">
			<form class="box" id="pan_form">
				<h2 class="box-heading">网盘外链分析工具</h2>

				分享地址： <input type="text" class="input-medium search-query box-input"
					id="inputurl" onmouseup="this.select()" /><br> 外链地址： <input
					type="text" class="input-medium search-query box-input"
					id="outputurl" onmouseup="this.select()" />

				<div class="box-button">
					<input type="button" class="btn" id="getlink" value="获取" /> <input
						type="reset" class="btn" value="清空" onclick="this.form.reset();" />
				</div>

				支持的网盘地址格式：<br> <a href="javascript:void(0)">http://pan.baidu.com/s/1koGu4</a><br />
				<a href="javascript:void(0)">http://pan.baidu.com/share/link?shareid=3719119439&uk=1915453531</a><br />
				<a href="javascript:void(0)">http://share.weiyun.com/37b92875f407f6d595c6eab92792d41a</a><br />
			</form>
		</div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<script>

	$(function() {
	    //ajax获取外链地址
	    $('#getlink').click(function() {
	        var url = encodeURIComponent($('#inputurl').val());
	        if (url == '') {
	            alert('分享地址不能为空！');
	            return;
	        }
	        $.get('link.php?url=' + url, function(data, status) {
	            var json = eval('('+data+')');
	            if (json.code == 0) {
	                var hostname = 'http://' + window.location.hostname;
	                var path = window.location.pathname.split("").reverse().join("").replace(/^([^/]*\/)/,"").split("").reverse().join("");
	                var url = hostname + path + json.link;
	                $('#outputurl').val(url);
	                alert('成功获取外链地址！');
	            } else {
	            	alert({
	                    '99'  : '未知错误！',
	                    '101' : '不支持的外链地址！',
	                    '102' : '地址错误或网络出错！',
	                    '103' : '获取不到文件扩展名，请检查地址是否有误！',
	                }[json.code]);
	            }
	        });
	    });

	});

	</script>
</body>
</html>
