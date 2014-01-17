<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
session_start ();
require ("../inc/common.php");
$title = "3D 测试";
require BASE_INC . 'head.inc.php';
?>
<script type="text/javascript">
	var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
	TK.loader.loadCSS({url:"<?php echo MAIN_PATH;?>css/main.css"});
</script>
</head>
<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>3d/"><?php echo $title;?> </a>
		</div>
	</header>
	<section>
		<div class="container">
			<img src="logo.png" id="bannerimg" width="1000" height="220" alt="" />
		</div>
	</section>
	<footer>
		<?php  require BASE_INC . 'footer.inc.php'; ?>
	</footer>
	<script type="text/javascript">
	TK.loader.loadJS({url:"<?php echo MAIN_PATH;?>3d/Three.js"});
	TK.loader.loadJS({url:"<?php echo MAIN_PATH;?>3d/3d.js"});
	</script>
</body>
</html>

