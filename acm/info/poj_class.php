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
			<header style="text-align: center;">POJ 题目分类</header>
			<div class="section">
				<div>简单题</div>
				<ul>
					<li>1000</li>
					<li>1003</li>
					<li>1005</li>
					<li>1006</li>
					<li>1007</li>
					<li>1015（学会dp）</li>
					<li>1016</li>
					<li>1017</li>
					<li>1018</li>
					<li>1042（dp）</li>
					<li>1046（简单数学）</li>
					<li>1054（简单的剪枝）</li>
					<li>1062（dp）</li>
					<li>1068</li>
					<li>1095</li>
					<li>1113（凸包，但规模小，O(n^2)的也行）</li>
					<li>1125</li>
					<li>1127</li>
					<li>1152</li>
					<li>1154</li>
					<li>1183（用笔算算）</li>
					<li>1218</li>
					<li>1221</li>
					<li>1244</li>
					<li>1281</li>
					<li>1312</li>
					<li>1313（找找规律）</li>
					<li>1315（学会搜索）</li>
					<li>1321（同1315）</li>
					<li>1323(dp)</li>
					<li>1326</li>
					<li>1331</li>
					<li>1491</li>
					<li>1493（找规律）</li>
					<li>1503（高精度）</li>
					<li>1504</li>
					<li>1517</li>
					<li>1519</li>
					<li>1547</li>
					<li>1552</li>
					<li>1563（考虑仔细一点，还要注意精度）</li>
					<li>1650（不是好题）</li>
					<li>1651（dp）</li>
					<li>1656</li>
					<li>1657</li>
					<li>1658</li>
					<li>1663</li>
					<li>1675（计算几何）</li>
					<li>1681</li>
					<li>1702（三进制运算）</li>
					<li>1799</li>
					<li>1828</li>
					<li>1862（简单数学）</li>
					<li>1887</li>
					<li>1906（实战好题）</li>
					<li>1914</li>
					<li>1915（宽搜）</li>
					<li>1928</li>
					<li>1936</li>
					<li>1978</li>
					<li>1979</li>
					<li>2000</li>
					<li>2019（dp好题）</li>
					<li>2027（垃圾题）</li>
					<li>2028</li>
					<li>2078（不要重复搜索）</li>
					<li>2080</li>
					<li>2081</li>
					<li>2083</li>
					<li>2140</li>
					<li>2141</li>
					<li>2184（活用dp）</li>
					<li>2190</li>
					<li>2192</li>
					<li>2193</li>
					<li>2196</li>
					<li>2199</li>
					<li>2209</li>
					<li>2211</li>
					<li>2243</li>
					<li>2248（搜索）</li>
					<li>2260</li>
					<li>2261</li>
					<li>2262</li>
					<li>2291</li>
					<li>2301</li>
					<li>2304</li>
					<li>2309（找规律）</li>
					<li>2316</li>
					<li>2317</li>
					<li>2318</li>
					<li>2325</li>
					<li>2355</li>
					<li>2357</li>
					<li>2363</li>
					<li>2378（树的dp）</li>
					<li>2381</li>
					<li>2385</li>
					<li>2393</li>
					<li>2394</li>
					<li>2395</li>
					<li>2413（高精度基础）</li>
					<li>2418</li>
					<li>2419</li>
				</ul>
			</div>

			<div class="section">
				<div>经典</div>
				<ul>
					<li>1011（搜索好题）</li>
					<li>1012（学会打表）</li>
					<li>1013</li>
					<li>1019（它体现了很多此类问题的特点）</li>
					<li>1050（绝对经典的dp）</li>
					<li>1088（dp好题）</li>
					<li>1157（花店，经典的dp）</li>
					<li>1163（怎么经典的dp那么多呀？？？）</li>
					<li>1328（贪心）</li>
					<li>1458（最长公共子序列）</li>
					<li>1647（很好的真题，考临场分析准确和下手迅速）</li>
					<li>1654（学会多边形面积的三角形求法）</li>
					<li>1655（一类无根树的dp问题）</li>
					<li>1804（逆序对）</li>
					<li>2084（经典组合数学问题）</li>
					<li>2187（用凸包求最远点对，求出凸包后应该有O(N)的求法，可我就是调不出来）</li>
					<li>2195（二分图的最佳匹配）</li>
					<li>2242（计算几何经典）</li>
					<li>2295（等式处理）</li>
					<li>2353（dp，但要记录最佳路径）</li>
					<li>2354（立体解析几何）</li>
					<li>2362（搜索好题）</li>
					<li>2410（读懂题是关键）</li>
					<li>2411（经典dp）</li>
				</ul>
			</div>

			<div class="section">
				<div>趣味</div>
				<ul>
					<li>1067（很难的数学，但仔细研究，是一片广阔的领域）</li>
					<li>1147（有O(n)的算法，需要思考）</li>
					<li>1240（直到一棵树的先序和后序遍历，那么有几种中序遍历呢？dp）</li>
					<li>1426（是数论吗？错，是图论！）</li>
					<li>1648（别用计算几何，用整点这个特点绕过精度的障碍吧）</li>
					<li>1833（找规律）</li>
					<li>1844（貌似dp或是搜索，其实是道有趣的数学题）</li>
					<li>1922（贪心，哈哈）</li>
					<li>2231</li>
					<li>2305（不需要高精度噢）</li>
					<li>2328（要仔细噢）</li>
					<li>2356（数论知识）</li>
					<li>2359（约瑟夫问题变种）</li>
					<li>2392（有趣的问题）</li>
				</ul>
			</div>

			<div class="section">
				<div>很繁的题</div>
				<ul>
					<li>1001</li>
					<li>1008</li>
					<li>1087（构图很烦，还有二分图的最大匹配）</li>
					<li>1128（USACO）</li>
					<li>1245</li>
					<li>1329</li>
					<li>1550（考的是读题和理解能力）</li>
					<li>1649（dp）</li>
					<li>2200（字符串处理+枚举）</li>
					<li>2358（枚举和避免重复都很烦）</li>
					<li>2361（仔细仔细再仔细）</li>
				</ul>
			</div>

			<div class="section">
				<div>难题</div>
				<ul>
					<li>1014（数学证明比较难，但有那种想法更重要）</li>
					<li>1037（比较难的dp）</li>
					<li>1405（高精度算法也分有等级之分，不断改进吧）</li>
					<li>2002（不知道有没有比O(n^2*logn)更有的算法？）</li>
					<li>2054（极难，很强的思考能力）</li>
					<li>2085（组合数学）</li>
					<li>2414（dp，但要剪枝）</li>
					<li>2415（搜索）</li>
					<li>2423（计算几何+统计）</li>
				</ul>
			</div>

			<div class="section">
				<div>多解题</div>
				<ul>
					<li>1002（可以用排序，也可以用统计的方法）</li>
					<li>1338（搜索和dp都可以）</li>
					<li>1664（搜索和dp都练一练吧）</li>
					<li>2082（这可是我讲的题噢）</li>
					<li>2352（桶排和二叉树都行）</li>
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
