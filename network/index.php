 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "网络的一些记录或实验";
	require BASE_INC . 'head.inc.php';
	?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">

</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>
<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>">tiankonguse 的实验室 </a>
		</div>
	</header>

	<section>
		<div class="container">
			<h3>网络的一些记录或实验</h3>
			<div>
				<ul class="">
					<li><a href="http://ping.eu/">Online Ping</a></li>
					<li><a href="https://code.google.com/p/ipv6-hosts/"> ipv6-hosts</a></li>
					<li><a href="http://www.geoiptool.com/zh/">查看我的IP信息</a></li>

				</ul>
			</div>
		</div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>

</body>
</html>
