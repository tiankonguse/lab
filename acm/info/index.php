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
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>

<body>
	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>acm/info">acm算法讲解 </a>
		</div>
	</header>

	<section>
		<div class="container">
			<ul>
				<li>前言</li>
				<li>目录</li>
				<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/feedback.php">反馈 </a></li>
				<li>
					<ol>
						<li>图论
							<ol>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/LCA.php">最近公共祖先(LCA)
								</a></li>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/LSP.php">最短路径 </a></li>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/dijkstra.php">Dijkstra
										算法</a></li>
								<li>A* 算法</li>
								<li>SPFA 算法</li>
								<li><a
									href="<?php echo MAIN_DOMAIN; ?>acm/info/Bellman-Ford.php">Bellman-Ford
										算法</a></li>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/floyd.php">Floyd-Warshall
										算法</a></li>
								<li>Johnson 算法</li>
							</ol>
						</li>

						<li>组合数学
							<ol>
								<li><a
									href="<?php echo MAIN_DOMAIN; ?>acm/info/CombinatorialMathematics.php">组合计数</a></li>
							</ol>
						</li>

						<li>DP
							<ol>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/dp_theory.php">DP理论</a></li>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/dp_problem.php">DP经典问题</a></li>
							</ol>
						</li>

						<li>数据结构
							<ol>
								<li><a
									href="<?php echo MAIN_DOMAIN; ?>acm/info/struct_factorial.php">阶乘</a></li>
								<li><a
									href="<?php echo MAIN_DOMAIN; ?>acm/info/struct_block_list.php">块状链表</a></li>
							</ol>
						</li>

						<li>STL
							<ol>
								<li>容器
									<ol>
										<li>概念
											<ol>
												<li><a
													href="<?php echo MAIN_DOMAIN; ?>acm/info/STL_Concepts_GeneralConcepts.php">一般的概念</a></li>
												<li><a
													href="<?php echo MAIN_DOMAIN; ?>acm/info/STL_Concepts_Sequence.php">顺序容器</a></li>
												<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/stl_set.php">关联容器</a></li>
											</ol>
										</li>
									</ol>
								</li>
							</ol>
						</li>

						<li>杂题
							<ol>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/acm_guide.php">ACM入门</a></li>
								<li><a
									href="<?php echo MAIN_DOMAIN; ?>acm/info/questions_class.php">问题分类</a></li>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/simulation.php">模拟</a></li>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/enumerate.php">枚举</a></li>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/hash.php">哈希</a></li>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/greedy.php">贪心</a></li>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/IO.php">输入与输出</a></li>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/complexity.php">复杂度</a></li>
								<li><a href="<?php echo MAIN_DOMAIN; ?>acm/info/poj_class.php">POJ题目分类</a></li>
								<li><a
									href="<?php echo MAIN_DOMAIN; ?>acm/info/networkResources.php">网络资源</a></li>
							</ol>
						</li>

					</ol>
				</li>

			</ul>

		</div>


	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
     <?php  require BASE_INC . 'footer.inc.php'; ?>
     </footer>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
</body>
</html>




