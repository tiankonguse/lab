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
	/* arbitrary styling */
	background-color: white;
	border-radius: 5px;
	box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
	height: 200px;
	width: 300px;
	/* change position to fixed if you want to prevent the dialog from scrolling away, and center it */
	position: fixed;
	top: 50%;
	left: 50%;
	margin-left: -150px;
	margin-top: -100px;
}
.overlay::backdrop{
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
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
	<dialog class="modal">This is the dialog!</dialog>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
</body>
</html>

