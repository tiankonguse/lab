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
			<header style="text-align: center;">动态规划 理论</header>

			<div class="section">
				<div>目录</div>
				<ul>
					<li>动态规划的基本思想</li>
					<li>动态规划问题的特征</li>
				</ul>
			</div>

			<div class="section">
				<div>动态规划的基本思想</div>
				<div>如果各个子问题不是独立的，不同的子问题的个数只是多项式量级，
					如果我们能够保存已经解决的子问题的答案，而在需要的时候再找出已求得的答案，这样就可以避免大量的重复计算。
					由此而来的基本思路是，用一个表记录所有已解决的子问题的答案， 不管该问题以后是否被用到， 只要它被计算过， 就将其结果填入表中。</div>
			</div>

			<div class="section">
				<div>动态规划问题的特征</div>
				<div>
					<div>动态规划算法的有效性依赖于问题本身所具有的两个重要性质：</div>
					<ol>
						<li>最优子结构：当问题的最优解包含了其子问题的最优解时，称该问题具有最优子结构性质。</li>
						<li>重叠子问题：在用递归算法自顶向下解问题时，每次产生的子问题并不总是新问题，有些子问题被反复计算多次。
							动态规划算法正是利用了这种子问题的重叠性质，对每一个子问题只解一次，而后将其解保存在一个表格中，在以后尽可能多地利用这些子问题的解。</li>
					</ol>

				</div>
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

