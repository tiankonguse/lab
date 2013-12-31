<?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "图片切换";
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
			<a href="<?php echo MAIN_DOMAIN; ?>cutover/">图片切换</a>
		</div>
	</header>

	<section>
		<div class="container">
			<ul>
			<li><a href="<?php echo MAIN_DOMAIN; ?>cutover/demo1.php">最基础的图片切换;</a></li>
			<li><a href="<?php echo MAIN_DOMAIN; ?>cutover/demo2.php">简单效果的图片切换;</a></li>
			<li><a href="<?php echo MAIN_DOMAIN; ?>cutover/demo3.php">简单效果自动切换</a></li>
			<li><a href="<?php echo MAIN_DOMAIN; ?>cutover/demo4.php">上下切换;</a></li>
			<li><a href="<?php echo MAIN_DOMAIN; ?>cutover/demo5.php">自动上下切换;</a></li>
			<li><a href="<?php echo MAIN_DOMAIN; ?>cutover/demo6.php">左右切换;</a></li>
			<li><a href="<?php echo MAIN_DOMAIN; ?>cutover/demo7.php">自动左右切换;</a></li>
			<li><a href="<?php echo MAIN_DOMAIN; ?>cutover/demo8.php">半遮面切换;</a></li>
			<li><a href="<?php echo MAIN_DOMAIN; ?>cutover/demo9.php">平均显示切换;</a></li>
			</ul>
		</div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
		<?php  require BASE_INC . 'footer.inc.php'; ?>
	</footer>
</body>
</html>

