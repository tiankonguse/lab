<?php
session_start ();
require ("../../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "acm算法讲解";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<link href="<?php echo MAIN_DOMAIN;?>acm/css/main.css" rel="stylesheet">
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN;?>";
</script>

<body>

	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>acm/info">acm算法讲解 </a>
			<div class="sub-title">
				<strong>作者:</strong> tiankonguse <strong>电子邮件:</strong> <a
					href="mailto:i@tiankonguse.com">i@tiankonguse.com</a> <strong>主页:</strong>
				<a href="http://tiankonguse.com/">http://tiankonguse.com/</a>
			</div>
		</div>

	</header>

	<section>
		<div class="container">
			<header style="text-align: center;">枚举</header>
			<div class="section">
				<div>枚举法</div>
				<ol>
					<li>又叫穷举法,它利用了计算机计算速度快且准确的特点,是最为朴素和有效的一种 算法。</li>
					<li>不是办法的办法</li>
					<li>但有时却是最好的办法</li>
				</ol>
			</div>

			<div class="section">
				<div>对简单模拟的一点理解</div>
				<ol>
					<li>共同的特点：数据量特别小</li>
					<li>共同的思想：尝试所有可能的元素</li>
					<li>核心：确定并枚举所有可能解的集合</li>
				</ol>
			</div>

			<div class="section">
				<div>对简单模拟的一点理解</div>
				<ol>
					<li>共同的特点：数据量特别小</li>
					<li>共同的思想：尝试所有可能的元素</li>
					<li>核心：确定并枚举所有可能解的集合</li>
				</ol>
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
