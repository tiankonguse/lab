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
			<header style="text-align: center;">复杂度</header>
			<div class="section">
				<ul>
					<li>复杂度计算出来后有什么用？<br />估计程序能否在规定时间内处理题目指定规模的数据
					</li>
					<li>重要的事实：当代计算机1s内可做10^7左右次计算</li>
					<li>在这个限制下时间复杂度一定的算法存在能处理的规模上限 <pre class="prettyprint">
复杂度		数量级		最大规模
O(logN)		&gt;&gt;10^20	很大
O(N^1/2)	10^12		10^14
O(N)		10^6		10^7
O(NlogN)	10^5		10^6		
O(N^2)		1000		2500
O(N^3)		100		500
O(N^4)		50		50
O(2^N)		20		20
O(N!)		9		10
					</pre>
					</li>
					<li>无需过度优化
						<ol>
							<li>ICPC不是比谁的复杂度更低，谁的程序更快，而是比谁能够在给定的时间内把答案正确的计算出来</li>
							<li>复杂度足够好即可</li>
						</ol>
					</li>
					<li>空间复杂度(这个现场赛与OJ上的往往不同)</li>
					<li>两种常见空间溢出错误
						<ul>
							<li>栈溢出（递归程序）</li>
							<li>在函数里面开很大的数组</li>
						</ul>
					</li>
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
