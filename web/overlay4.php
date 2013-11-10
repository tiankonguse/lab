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
.modal {
	/* some styles to position the modal at the center of the page */
	position: fixed;
	top: 50%;
	left: 50%;
	width: 300px;
	line-height: 200px;
	height: 200px;
	margin-left: -150px;
	margin-top: -100px;
	background-color: #f1c40f;
	text-align: center;
	/* needed styles for the overlay */
	z-index: 10; /* keep on top of other elements on the page */
	outline: 9999px solid rgba(0, 0, 0, 0.5);
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
	<div class="modal">I'm the Modal Window!</div>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
</body>
</html>

