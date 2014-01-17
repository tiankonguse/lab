<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
session_start ();
require ("../inc/common.php");
$title = "gave my girlfriend's rose";
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
			<a href="<?php echo MAIN_DOMAIN; ?>"><?php echo $title;?> </a>
		</div>
	</header>
	<section>
		<div class="container" style="">
			<canvas style=" width: 800px; height: 800px; "></canvas>
		</div>
	</section>
	<footer>
		<?php  require BASE_INC . 'footer.inc.php'; ?>
	</footer>
	<script type="text/javascript">
	TK.loader.loadJS({url:"<?php echo MAIN_PATH;?>rose/paintRose.js"});
	</script>
</body>
</html>

