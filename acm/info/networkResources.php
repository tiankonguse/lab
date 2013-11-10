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
			<header style="text-align: center;">网络资源 </header>
			<div class="section">
				<div>简单题</div>
				<ul>
					<li><a target="_blank" href="http://acm.zju.edu.cn" >http://acm.zju.edu.cn</a></li>
					<li><a target="_blank" href="http://acm.timus.ru" >http://acm.timus.ru</a></li>
					<li><a target="_blank" href="http://acm.sgu.ru" >http://acm.sgu.ru</a></li>
					<li><a target="_blank" href="http://ace.delos.com/usacogate" >http://ace.delos.com/usacogate</a></li>
					<li><a target="_blank" href="http://www.google.com" >http://www.google.com</a></li>
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
