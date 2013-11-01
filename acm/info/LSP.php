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
			<header style="text-align: center;"> 最短路径 </header>
			<div class="section">
				<h1>问题</h1>
				<div>最短路径问题是图论研究中的一个经典算法问题, 旨在寻找图(由结点和路径组成的)中两结点之间的最短路径。</div>
			</div>

			<div class="section">
				<h2>算法具体的形式包括</h2>
				<ul>
					<li>
						<div>确定起点的最短路径问题</div>
						<div>即已知起始结点,求最短路径的问题。</div>
					</li>
					<li>
						<div>确定终点的最短路径问题</div>
						<div>
							与确定起点的问题相反,该问题是已知终结结点,求最短路径的问题。<br />
							在无向图中该问题与确定起点的问题完全等同,在有向图中该问题等同于把所有路径方向反转的确定起点的问题。
						</div>
					</li>
					<li>
						<div>确定起点终点的最短路径问题</div>
						<div>即已知起点和终点,求两结点之间的最短路径。</div>
					</li>
					<li>
						<div>全局最短路径问题</div>
						<div>求图中所有的最短路径。</div>
					</li>
				</ul>
			</div>
			<div class="section">
				<h2>常用算法</h2>
				<ul>
					<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/dijkstra.php">Dijkstra
							算法</a></li>
					<li>A* 算法</li>
					<li>SPFA 算法</li>
					<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/Bellman-Ford.php">Bellman-Ford
							算法</a></li>
					<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/floyd.php">Floyd-Warshall
							算法</a></li>
					<li>Johnson 算法</li>
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

