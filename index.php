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
			<ul class="item-list">
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>cloudLink/">网盘外链分析</a></li> 
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>kirichik/">扁平简历</a></li> 
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>girlfriend/index.php">女朋友</a></li> 
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>network/index.php">网络实验</a></li>
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/file/2013chengdu.pdf">成都站现场赛题目</a></li> 
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/file/2013hangzhou.pdf">杭州站现场赛题目 </a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/file/2013nanjing.pdf">南京站现场赛题目 </a></li>
				<li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/file/2013AizuAllProblems.pdf">会津大学现场赛题目 </a></li>
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>pdf/">pdf阅读器 </a></li> 
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>zoomImg/">放大图片 </a></li>
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>menu/">侧栏菜单 </a></li> 
                <li><a target="_blank" href="<?php echo DOMAIN; ?>/vatirk/">我的一个acm团队 </a></li> 
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>cutover/">图片切换 </a></li>
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>latex/">latex学习 </a></li> 
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>acm/">acm模版 </a> </li>
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>earth/"> canvas 画地球</a></li> 
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>rose/"> canvas 画玫瑰</a></li>
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>3d/"> 3D 测试</a></li> 
                <li><a target="_blank" href="<?php echo MAIN_DOMAIN; ?>createpw/index.php">密码生成器</a></li>
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
