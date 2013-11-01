<?php
session_start ();
require ("./inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "tiankonguse's Laboratory";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
</head>

<body>
	<header>
		<div class="title">tiankonguse 的实验室</div>
	</header>

	<section>
		<div class="container">
			<h3>我们正在做的实验</h3>
			<ul class="item-list">
				<li><a target="_blank"
					href="<?php echo MAIN_DOMAIN; ?>createpw/index.php">密码生成器</a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>problems.pdf">成都站现场赛题目
				</a></li>				
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>problems2.pdf">杭州站站现场赛题目
				</a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>pdf/">pdf阅读器
				</a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>zoomImg/">放大图片
				</a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>latex/">latex学习
				</a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/">acm模版 </a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>earth/">
						canvas 画地球</a></li>

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
