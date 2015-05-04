<?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "本地储存";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
var basepath = "<?php echo DOMAIN;?>";
</script>
<script src="<?php echo MAIN_DOMAIN;?>localStorage/load.js"></script>
<script type="text/javascript">
TK.loader.loadJS({url:"/lab/localStorage/main.js",v:"1.02"});
TK.loader.loadCSS({url:"/lab/localStorage/main.css"});
</script>



<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>localStorage/"><?php echo $title;?>
			</a>
		</div>
	</header>

	<section>
		<div class="container"></div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
		<?php  require BASE_INC . 'footer.inc.php'; ?>
	</footer>
</body>
</html>

