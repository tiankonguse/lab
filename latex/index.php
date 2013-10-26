 <?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
$title = "latex 学习笔记";
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
			<a href="<?php echo MAIN_DOMAIN; ?>">tiankonguse &amp; vincent 的实验室 </a>
		</div>
	</header>

	<section>
		<div class="container">
			<h3>latex 学习笔记</h3>
			<div>
			<pre>
	LATEX是一种排版系统,它非常适用于生成高印刷质量的科技和数学类文档。
	这个系统同样适用于生成从简单的信件到完整书籍的所有其他种类的文档。
	LATEX 使用 TEX 作为它的格式化引擎。
	
	对大多数计算机,从个人计算机(PC)和 Mac 到大型的 UNIX 和 AVMS 系统,LATEX 都有适用版本。
	
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
