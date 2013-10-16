
<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="zh-cn">
	<head>
		<?php
		$title = "别人的地球，借来学学";
		include_once('inc/index.header.php');
		?>
	</head>
	
	<body>
		<header>
			<?php include_once('inc/index.top.php'); ?>
		</header>

		<section>
			<?php include_once("inc/index.body.php") ?>	
		</section>

		<footer>
			<?php  include_once('inc/index.footer.php'); ?>
		</footer>
		
		<?php include_once("inc/index.backTop.php") ?>	

	<div style="clear:both;"></div>
	
	</body>
</html>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/log/zhizhu.php") ?>	

