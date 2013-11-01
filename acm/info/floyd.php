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
			<header style="text-align: center;">Floyd 算法 </header>

			<div class="section">
				<ul>
					<li>通过一个图的权值矩阵求出它的每两点间的最短路径 矩阵。</li>
					<li>从图的带权邻接矩阵 A=[a(i,j)] n×n 开始,递归 地进行 n 次更新,即由矩阵 D(0)=A ,按一个公式,
						构造出矩阵 D(1) ;又用同样地公式由 D(1) 构造出 D(2) ;......;最后又用同样的公式由 D(n-1) 构造出
						矩阵 D(n) 。矩阵 D(n) 的 i 行 j 列元素便是 i 号顶点到 j 号顶点的最短路径长度,称 D(n) 为图的距离矩阵,
						同时还可引入一个后继节点矩阵 path 来记录两点间的 最短路径。</li>
					<li>采用的是松弛技术,对在 i 和 j 之间的所有其他点进行一次松弛。 所以时间复杂度为 O(n^3);</li>
					<li>其状态转移方程如下: map[i,j]:=min{map[i,k] +map[k,j],map[i,j]}</li>
					<li>map[i,j] 表示 i 到 j 的最短距离</li>
					<li>K 是穷举 i,j 的断点</li>
					<li>map[n,n] 初值应该为 0 ,或者按照题目意思来做。</li>
					<li>当然,如果这条路没有通的话,还必须特殊处理 , 比如没有 map[i,k] 这条路</li>
				</ul>
			</div>

			<div class="section">
				<h2>算法过程</h2>
				<ul>
					<li>把图用邻接矩阵 G 表示出来,如果从 Vi 到 Vj 有路可达,则 G[i,j]=d , d 表示该路的长度;否则
						G[i,j]= 空值。</li>
					<li>定义一个矩阵 D 用来记录所插入点的信息, D[i,j] 表示从 Vi 到 Vj 需要经过的点,初始化 D[i,j]=j 。
					</li>
					<li>把各个顶点插入图中,比较插点后的距离与原来的距离, G[i,j] = min( G[i,j], G[i,k]+G[k,j] )
						,如果 G[i,j] 的值变小,则 D[i,j]=k 。</li>
					<li>在 G 中包含有两点之间最短道路的信息,而在 D 中则包含了最短通 路径的信息。</li>
					<li>比如,要寻找从 V5 到 V1 的路径。根据 D ,假如 D(5,1)=3 则说 明从 V5 到 V1 经过 V3 ,路径为
						{V5,V3,V1} ,如果 D(5,3)=3 ,说 明 V5 与 V3 直接相连,如果 D(3,1)=1 ,说明 V3 与 V1
						直接相连。</li>
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

