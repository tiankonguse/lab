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
			<header style="text-align: center;">DP 经典问题</header>

			<div class="section">
				<div>目录</div>
				<ul>
					<li>数塔问题</li>
					<li>最长有序子序列</li>
					<li>最长公共子序列</li>
					<li>矩阵连乘</li>
					<li>0-1背包</li>
				</ul>
			</div>
			<div class="section">
				<div>数塔问题</div>
				<div>
					有形如下图所示的数塔，从顶部出发，在每一结点可以选择向下走或是向右走，一直走到底层，要求找出一条路径，使路径上的值最大。
					<pre class="prettyprint">
                09
            12      15
        10      06      08
    02      18      09      05
19      07      10      04      16
					</pre>
					<div>用暴力的方法，可以吗？</div>
					<div>
						试想一下：
						<div>这道题如果用枚举法（暴力思想），在数塔层数稍大的情况下（如31），则需要列举出的路径条数将是一个非常庞大的数目（2^30=
							1024^3 &gt; 10^9=10亿）。</div>
					</div>
					<div>
						<div>考虑一下：</div>
						<div>
							从顶点出发时到底向左走还是向右走应取决于是从左走能取到最大值还是从右走能取到最大值，只要左右两道路径上的最大值求出来了才能作出决策。
							同样，下一层的走向又要取决于再下一层上的最大值是否已经求出才能决策。<br />这样一层一层推下去，直到倒数第二层时就非常明了。
							如数字2，只要选择它下面较大值的结点19前进就可以了。<br />所以实际求解时，可从底层开始，层层递进，最后得到最大值。
						</div>
						<div>结论：自顶向下的分析，自底向上的计算。</div>
					</div>

					<div>
						<div>方程</div>
						<div>\(str[ i ] [ j ] = \left\{ \begin{array}{ll} str[i][j] +
							str[i–1][j] &amp; \textrm{(j == 1)}\\ str[i][j] +
							max(str[i–1][j], str[i-1][j-1] ) &amp; \textrm{(j != 1 &amp;&amp;
							j != i)}\\ str[i][j] + str[i–1][j-1] &amp; \textrm{(j == i)}
							\end{array} \right.\)</div>
					</div>


				</div>
			</div>

			<div class="section">
				<div>最长有序子序列</div>
				<div>\(\begin{array}{c|c|c|c|c|c|c|c} i &amp; 0 &amp; 1 &amp; 2
					&amp; 3 &amp; 4 &amp; 5 &amp; 6 &amp; 7 &amp; 8 \\ \hline num[i]
					&amp; 1 &amp; 4 &amp; 7 &amp; 2 &amp; 5 &amp; 8 &amp; 3 &amp; 6
					&amp; 9 \end{array}\)</div>
				<div>
					<div>请回答：</div>
					<div>穷举（暴力）方法的时间复杂度是多少？</div>
				</div>
				<div>
					<div>解决方案</div>
					<div>\(\begin{array}{c|c|c|c|c|c|c|c} i &amp; 0 &amp; 1 &amp; 2
						&amp; 3 &amp; 4 &amp; 5 &amp; 6 &amp; 7 &amp; 8 \\ \hline num[i]
						&amp; 1 &amp; 4 &amp; 7 &amp; 2 &amp; 5 &amp; 8 &amp; 3 &amp; 6
						&amp; 9 \\ \hline F[i] &amp; 1 &amp; 2 &amp; 3 &amp; 2 &amp; 3
						&amp; 4 &amp; 3 &amp; 4 &amp; 5 \end{array}\)</div>
				</div>
				<div>
					<div>DP分析：</div>
					<div>状态定义：设MaxLen (k)表示以ak做为"终点"的最长上升子序列的长度。</div>
					<div>状态转移方程：MaxLen (k) = Max { MaxLen (i): 1 &lt;i &lt; k 且 ai &lt;
						ak且 k≠1 } + 1; MaxLen (1) = 1.</div>
				</div>
			</div>

			<div class="section">
				<div>最长公共子序列</div>
				<div>
					<div>pku--1458</div>
					<pre>
Sample Input

abcfbc abfcab
programming contest 
abcd mnp 

Sample Output

4
2
0
					</pre>
				</div>
				<div>
					<div>辅助空间变化示意图</div>
					<div>\(\begin{array}{c|cccccc} &amp; a &amp; b &amp; c &amp; f
						&amp; b &amp; c \\ \hline a &amp; 1 &amp; 1 &amp; 1 &amp; 1 &amp;
						1 &amp; 1 \\ b &amp; 1 &amp; 2 &amp; 2 &amp; 2 &amp; 2 &amp; 2 \\
						f &amp; 1 &amp; 2 &amp; 2 &amp; 3 &amp; 3 &amp; 3 \\ c &amp; 1
						&amp; 2 &amp; 3 &amp; 3 &amp; 3 &amp; 4 \\ a &amp; 1 &amp; 2 &amp;
						3 &amp; 3 &amp; 3 &amp; 4 \\ b &amp; 1 &amp; 2 &amp; 3 &amp; 3
						&amp; 4 &amp; 4 \\ \end{array}\)</div>
				</div>
				<div>
					<div>子结构特征</div>
					<div>\(f(i, j)= \left\{ \begin{array}{ll} f(i-1, j-1)+1 &amp;
						\textrm{(a[i] == b[j])}\\ max(f(i-1, j), f(i,j-1)) &amp;
						\textrm{(a[i] != b[j])} \end{array} \right.\)</div>
					<div>由于f(i,j)只和f(i-1,j-1), f(i-1,j)和f(i,j-1)有关, 而在计算f(i,j)时,
						只要选择一个合适的顺序, 就可以保证这三项都已经计算出来了, 这样就可以计算出f(i,j).
						这样一直推到f(len(a),len(b))就得到所要求的解了.</div>
				</div>



			</div>

			<div class="section">
				<div>矩阵连乘</div>
				<div>给定n个矩阵｛A1,A2,…An｝，其中Ai与A i+1是可乘的，i=1，2…，n-1。考察这n个矩阵的连乘积A1A2…An。
					矩阵A和B可乘的条件是矩阵A的列数等于矩阵B的行数。
					若A是一个p×q矩阵，B是一个q×r矩阵，则其乘积C=AB是一个p×r矩阵,需要pqr次数乘。</div>
				<div>由于矩阵乘法满足结合律，故计算矩阵的连乘积可以有许多不同的计算次序。</div>
				<div>例如，设3个矩阵{A1,A2,A3}的维数分别为10×100，100×5，和5×50。
					若按加括号方式((A1A2)A3)计算，3个矩阵连乘积需要的数乘次数为10×100×5+10×5×50=7500。
					若按加括号方式(A1(A2A3))计算，3个矩阵连乘积总共需要10×5×50+10×100×50=75000次数乘。
					由此可见，在计算矩阵连乘积时，加括号方式，即计算次序对计算量有很大影响。</div>
				<div>矩阵连乘积的最优计算次序问题，即对于给定的相继n个矩阵｛A1,A2,…An｝(其中矩阵Ai的维数为pi-1×p，i=1,2，…，n)，确定计算矩阵连乘积A1,A2,…An的计算次序，使得依此次序计算矩阵连乘积需要的数乘次数最少。
				</div>
				<div>
					<div>DP分析</div>
					<div>设计算 A[i:j], 1 ≤ i ≤ j ≤ n ，所需要的最少数乘次数 m[i,j];</div>
					<div>\(m[i, j] = \left\{ \begin{array}{ll} 0 &amp;
						\textrm{(i&gt;=j)}\\ m[ i, k] + m[k+1, j] +p_{i-1}*p_k*p_j &amp;
						\textrm{(i&lt;j)}\\ \end{array} \right.\)</div>
				</div>
			</div>

			<div class="section">
				<div>0-1背包</div>
				<div>有N件物品和一个容量为V的背包。第i件物品的体积是c[i]，价值是w[i]。 求解将哪些物品装入背包可使价值总和最大。</div>
				<div>
					<div>DP分析：</div>
					<div>
						<div>这是最基础的背包问题，特点是：每种物品仅有一件，可以选择放或不放。</div>
						<div>用子问题定义状态：即f[i][v]表示前i件物品恰放入一个容量为v的背包可以获得的最大价值。则其状态转移方程便是：</div>
						<div>f[i][v]=max{f[i-1][v],f[i-1][v-c[i]]+w[i]}</div>
						<div>"将前i件物品放入容量为v的背包中”这个子问题，若只考虑第i件物品的策略（放或不放），那么就可以转化为一个只牵扯前i-1件物品的问题。
							如果不放第i件物品，那么问题就转化为"前i-1件物品放入容量为v的背包中”，价值为f[i-1][v]；如果放第i件物品，那么问题就转化为“前i-1件物品放入剩下的容量为v-c[i]的背包中"，此时能获得的最大价值就是f[i-1][v-c[i]]再加上通过放入第i件物品获得的价值w[i]。
						</div>
					</div>
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

