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
			<header style="text-align: center;">组合计数</header>

			<div class="section">
				<div>目录</div>
				<ul>
					<li>置换群</li>
					<li>组合数学基础</li>
					<li>生成函数</li>
					<li>等价类计数</li>
					<li>递推法</li>
				</ul>
			</div>

			<div class="section">
				<div>置换群</div>
				<ul>
					<li>\( 用置换\left(\begin{array}{cccc} 1 &amp; 2 &amp; \cdots &amp; n
						\\ a_{1} &amp; a_{2} &amp; \cdots &amp; a_{n} \end{array}\right)
						表示1被a_1取代, 2被a_2取代…n被a_n取代. \\ 其中a_1, a_2, …a_n是1~n的一个排列 \)</li>
					<li>置换群的元素是置换, 运算是置换的连接 \(\left(\begin{array}{cccc} 1 &amp; 2 &amp;
						3 &amp; 4 \\ 3 &amp; 1 &amp; 2 &amp; 4 \end{array}\right)
						\left(\begin{array}{cccc} 1 &amp; 2 &amp; 3 &amp; 4 \\ 4 &amp; 3
						&amp; 2 &amp; 1 \end{array}\right) = \left(\begin{array}{cccc} 1
						&amp; 2 &amp; 3 &amp; 4 \\ 3 &amp; 1 &amp; 2 &amp; 4
						\end{array}\right) \left(\begin{array}{cccc} 3 &amp; 1 &amp; 2
						&amp; 4 \\ 2 &amp; 4 &amp; 3 &amp; 1 \end{array}\right) =
						\left(\begin{array}{cccc} 1 &amp; 2 &amp; 3 &amp; 4 \\ 2 &amp; 4
						&amp; 3 &amp; 1 \end{array}\right)\) 可以验证置换群满足群的四个条件</li>
				</ul>
			</div>

			<div class="section">
				<div>定理</div>
				<ul>
					<li>\(设G是1…n的置换群, K是1…n的某个元素\)
						<ol>
							<li>\(G中使K保持不变的置换集合, 记为Z_k, 称为K不动置换类\)</li>
							<li>\(K在G作用下的轨迹记为Ek, 也就是通过置换G能变换到的元素集合\)</li>
						</ol>
					</li>
					<li>\(定理: |Ek| * |Zk| = |G| (证明略)\)</li>
				</ul>
			</div>

			<div class="section">
				<div>循环</div>
				<ul>
					<li>n阶循环 \(\left(\begin{array}{cccc} a_1 &amp; a_2 &amp; \cdots
						&amp; a_n \\ \end{array}\right) = \left(\begin{array}{cccc} a_1
						&amp; a_2 &amp; \cdots &amp; a_{n-1} &amp; a_n \\ a_2 &amp; a_3
						&amp; \cdots &amp; a_n &amp; a_1 \end{array}\right)\)</li>
					<li>每个置换都可以写若干互不相交的循环的乘积， 例如 \(\left(\begin{array}{cccc} 1 &amp; 2
						&amp; 3 &amp; 4 &amp; 5 \\ 3 &amp; 5 &amp; 1 &amp; 4 &amp; 2
						\end{array}\right)\) =(13)(25)(4)</li>
					<li>表示是唯一的. 置换的循环节数是上述表示中循环的个数, 上例的循环节数是3</li>
				</ul>
			</div>

			<div class="section">
				<div>同构计数</div>
				<ul>
					<li>一个竞赛图是这样的有向图
						<ol>
							<li>任两个不同的点u、v之间有且只有一条边</li>
							<li>不存在自环</li>
						</ol>
					</li>
					<li>用P表示对竞赛图顶点的一个置换。
						当任两个不同顶点u、v间直接相连的边的方向与顶点P(u)、P(v)间的一样时，称该图在置换P下同构</li>
					<li>对给定的置换P，我们想知道对多少种竞赛图在置换P下同构</li>
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

