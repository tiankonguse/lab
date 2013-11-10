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
			<header style="text-align: center;">模拟</header>


			<div class="section">
				<div>对简单模拟的一点理解</div>
				<div>
					简单模拟题是相对简单一些的题目，对于编程初学者可以说是练习代码实现能力和代码打字能力的题目，它基本上涉及不到什么太难的算法，这种题不需要太多的思考，有的简单模拟也很麻烦。
					<br />如果在ACM比赛中能遇上简单模拟，那基本就是最简单的题了。
				</div>

			</div>

			<div class="section">
				<div>下面介绍几个相关的题目</div>
				<ol>
					<li>POJ Problem 1191 贪食蛇问题</li>
					<li>POJ Problem 1657 字符串处理</li>
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
