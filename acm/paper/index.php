 <?php
	session_start ();
	require ("../../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "acm论文";
	require BASE_INC . 'head.inc.php';
	?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<link href="<?php echo MAIN_DOMAIN;?>acm/css/main.css" rel="stylesheet">
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>

<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>acm/paper"><?php echo $title;?> </a>
		</div>
	</header>

	<section>
		<div class="container">
			<ul>
				<li><a
					href="<?php echo MAIN_DOMAIN; ?>pdf/viewer.html?url=<?php echo MAIN_DOMAIN; ?>acm/paper/2013中国国家队候选队员论文集.pdf">2013中国国家队候选队员论文集</a>
				</li>
				<li><a
					href="<?php echo MAIN_DOMAIN; ?>pdf/viewer.html?url=<?php echo MAIN_DOMAIN; ?>acm/paper/统计的力量——线段树详细教程.pdf">统计的力量——线段树详细教程</a>
				</li>
			</ul>

		</div>


	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
</body>
</html>
