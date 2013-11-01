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
			<header style="text-align: center;"> 最近公共祖先(LCA)</header>
			<div class="section">
				<h1>问题</h1>
				<div>给一棵树T，设计在线算法, 对于询问(u, v), 回答u和v的最近公共祖先</div>
			</div>

			<div class="section">
				<h1>算法一: O(nlogn)-O(log2n)</h1>
				<ul>
					<li>
						<div>预处理</div>
						<ul>
							<li>DFS求出每个结点的level. O(n)</li>
							<li>递推得每个结点的2i级直接祖先, O(nlogn)</li>
						</ul>
					</li>
					<li>
						<div>询问</div>
						<ul>
							<li>二分LCA的层次</li>
							<li>每次用倍增法求该层次上的父亲</li>
							<li>询问是O(log2n)的</li>
						</ul>
					</li>
				</ul>
			</div>

			<div class="section">
				<h1>算法二: DFS求Euler序列</h1>
				<div>DFS求Euler序列, 即E[1…2n-1], 设R[i]为i第一次出现的下标,
					L[i]为E[i]的深度,则LCA转化为RMQ, 存在O(nlogn)-O(1)算法</div>
				<ul>
					<li>若R[u]&lt;R[v], LCA(T,u,v) = RMQ(L,R[u],R[v])</li>
					<li>若R[u]&gt;R[v], LCA(T,u,v) = RMQ(L,R[v],R[u])</li>
				</ul>
			</div>

			<div class="section">
				<h1>算法三:In-RMQ</h1>
				<ul>
					<li>
						<div>注意到L满足±1性质</div>
						<ul>
							<li>把A划分成每部分为L=log2n/2的小块</li>
							<li>一共有2n/log2n块</li>
							<li>用O(n)求出每个小块的最小值A’[i]</li>
							<li>A’上的RMQ预处理: O(n), 询问O(1)</li>
						</ul>
					</li>
					<li>
						<div>问题转化为询问In-RMQ(x, a, b), 即第x个块的第a个元素到第b个元素的最小值</div>
						<ul>
							<li>最多只有2L=n1/2种本质不同的数组</li>
							<li>最多只有L2=log2n/4种不同的询问</li>
							<li>完全递推, 在O(n1/2log2n)的时间完成, 则In-RMQ是简单的查表工作, 是O(1)的</li>
						</ul>
					</li>
					<li><div>这个算法是O(n)-O(1)的复杂度</div></li>
				</ul>
			</div>


			<div class="section">
				<h1>快速离线算法(Tarjan)</h1>
				<ul>
					<li>
						<div>L(u)&lt;=L(v)时, 根据LCA(u, v)把结点分成等价类</div>
						<ul>
							<li>u的子树上结点v: LCA(u,v)=u</li>
							<li>u兄弟的子树上的结点v: LCA(u,v)=f[u]</li>
							<li>u的”叔叔”(父亲的兄弟)的子树结点v: LCA(u,v) = f[f[u]]</li>
						</ul>
					</li>
					<li>
						<div>所有结点初始为WHITE, 对于所有询问LCA(u, v), 把v保存在集合Q[u]中</div>
						<div>
							<pre class="prettyprint">
void LCA(u) {
    MAKE-SET(u);
    ancestor[FIND-SET(u)] = u;
    for v = every son of u {
    LCA(v);
        UNION(u, v);
        ancestor[FIND-SET(u)] = u;
    }
    color[u] = BLACK;
    for v = every element in Q[u] {
        if(color[v] == BLACK)
            ans[u,v] = ancestor[FIND-SET(v)];
    }
}
					</pre>
						</div>
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

