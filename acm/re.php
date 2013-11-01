 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "acm模版 ~ 引用";
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
	<header class="fixed-header">
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>acm/">acm模版 </a>
		</div>
	</header>

	<section class="fixed-content">
		<div class="section">
			<div class="section-title">
				<h2>参考资料</h2>

			</div>
			<div>
				<pre class="prettyprint">
吉大模板
NENUCS 模板
NENUCS 张某人的模板
NENUCS 赵小舟的模板
历年来国家集训队论文
wiki http://en.wikipedia.org/wiki/Main_Page§
</pre>




			</div>
		</div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
</body>
</html>

