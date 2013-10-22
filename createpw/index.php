 <?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
$title = "生成随机数";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<link href="<?php echo MAIN_DOMAIN;?>/createpw/createpw.css" rel="stylesheet">
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>
<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>">tiankonguse &amp; vincent 的实验室 </a>
		</div>
	</header>

	<section>
		<div class="container">
			<h3>密码生成器</h3>
			<div class="create-pw-content">
				<div class="create-pw-box clearfix">
					<div class="create-pw-box-title left">密码长度：</div>
					<div class="create-pw-box-content left">
						<input id="create-pw-length" value="6">&nbsp;&nbsp;(6-31位,默认6位)
					</div>
				</div>
				<div class="create-pw-box clearfix">
					<div class="create-pw-box-title left">密码类型：</div>
					<div class="create-pw-box-content left">
						<div class="create-pw-box-content-char">
							<input type="checkbox" value="" checked="checked"
								id="create-pw-char-number">只包含数字
						</div>
						<div class="create-pw-box-content-char">
							<input type="checkbox" value="" checked="checked"
								id="create-pw-char-bigAlphabet">只包含大写字母
						</div>
						<div class="create-pw-box-content-char">
							<input type="checkbox" value="" checked="checked"
								id="create-pw-char-smallAlphabet">只包含小写字母
						</div>
						<div class="create-pw-box-content-char">
							<input type="checkbox" value="" checked="checked"
								id="create-pw-char-other">只包含特殊字符
						</div>
					</div>
				</div>
				<div class="create-pw-box clearfix">
					<div class="create-pw-box-title left">你的密码：</div>
					<div class="create-pw-info left"></div>
				</div>
				<div class="handcursor create-pw-button">生成密码</div>
			</div>
		</div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<div class="create-pw-load-outter hide">
		<div class="create-pw-load-inner">
			正在生成密码 <br /> <img
				src="./loading.gif"
				style="height: 30px;" />
		</div>
	</div>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
	<script src="<?php echo MAIN_DOMAIN;?>/createpw/createpw.js"></script>


</body>
</html>
