 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "acm模版";
	require BASE_INC . 'head.inc.php';
	?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<style type="text/css">
.section {
	border: 1px dotted greenyellow;
	margin: 5px;
	padding: 1px;
}

.subsection {
	margin-left: 20px;
	margin-right: 20px;
	border: 1px dotted rgb(102, 85, 85);
	margin-top: 5px;
}

.subsubsection {
	margin-left: 40px;
	margin-right: 40px;
	border: 1px dotted rgb(102, 85, 85);
	margin-top: 5px;
}
</style>
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>

<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>">acm模版 </a>
			<div class="sub-title">
				<a href="<?php echo MAIN_DOMAIN; ?>acm/info">目前正在整理算法的讲解内容，详见这里</a>
			</div>
		</div>


	</header>

	<section>
		<div class="container">
			<ul class="">
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/base.php">base
				</a></li>
				<li><a target="_blank"
					href="<?php echo MAIN_DOMAIN; ?>acm/struct.php">struct </a></li>
				<li><a target="_blank"
					href="<?php echo MAIN_DOMAIN; ?>acm/search.php">search </a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/dp.php">DP
				</a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/stl.php">stl
				</a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/game.php">博弈
				</a></li>
				<li><a target="_blank"
					href="<?php echo MAIN_DOMAIN; ?>acm/graph.php">图论 </a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/java.php">JAVA
				</a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/re.php">参考资料
				</a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/vici.php">小舟学长的模版
				</a></li>

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

