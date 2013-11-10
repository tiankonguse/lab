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
			<header style="text-align: center;">贪心</header>

			<div class="section">
				<div>贪心法(Greedy)</div>
				<ul>
					<li>枚举法的时间效率很低,贪心法恰恰与其相反。并且贪心法的程序也很好实现。</li>
					<li>无数论文都指责贪心法往往得不到问题的最优解。</li>
					<li>绝世高手与普通高手的差距所在。</li>
					<li>矩阵胚理论(详情请参考算法导论)</li>
				</ul>
			</div>

			<div class="section">

				<ul>
					<li>不同问题中的贪心
						<ol>
							<li>多阶段决策：每步选择让下一步尽量好的方法</li>
							<li>约束满足：每次选择最有可能得到解的方式给变量赋值</li>
							<li>子集优化：每次选择权最小的元素加入集合</li>
						</ol>
					</li>
					<li>多阶段决策问题通常考虑用动态规划</li>
					<li>约束满足问题通常考虑用回溯法</li>
					<li>对于特殊的问题，贪心法是正确的</li>
				</ul>
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
