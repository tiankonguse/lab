 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "浮层";
	require BASE_INC . 'head.inc.php';
	?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<style type="text/css">
html,body {
	min-height: 100%;
}

body {
	position: relative;
	/* needed if you position the pseudo-element absolutely */
}

body:after {
	content: "";
	display: block;
	position: fixed; /* could also be absolute */
	top: 0;
	left: 0;
	height: 100%;
	width: 100%;
	z-index: 10;
	background-color: rgba(0, 0, 0, 0.2);
}
</style>
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>
<body>

	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>">浮层 </a>
			<div class="sub-title">
				<a href="<?php echo MAIN_DOMAIN; ?>acm/info">WEB简单技术</a>
			</div>
		</div>


	</header>

	<section>
		<div class="container"></div>
	</section>
	<div class="overlay"></div>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
</body>
</html>

