<?php
session_start ();
require ("../../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "acm论文";
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
			<a href="<?php echo MAIN_DOMAIN; ?>acm/paper"><?php echo $title;?></a>
			<div class="sub-title">
				<strong>作者:</strong> tiankonguse <strong>电子邮件:</strong> <a
					href="mailto:i@tiankonguse.com">i@tiankonguse.com</a> <strong>主页:</strong>
				<a href="http://tiankonguse.com/">http://tiankonguse.com/</a>
			</div>
		</div>

	</header>

	<section>
		<div class="container">
			<header style="text-align: center;">登顶计划</header>
			<div class="section">
				湖南师范大学附属中学 彭天翼
			</div>
			<div class="section">
				<div>ACM是什么？</div>
				<ul>
					<li>ACM主办的国际大学生程序设计竞赛 (International Collegiate Programming
						Contest)，简称ACM / ICPC</li>
					<li>1977年开始至今已经连续举办37届。其宗旨是提供一个让大学生向IT界展示自己分析问题和解决问题的能力的绝好机会，让下一代IT天才可以接触到其今后工作中将要用到的各种软件。</li>
					<li>现在，ACM / ICPC已成为世界各国大学生中最具影响力的国际计算机赛事。（<span class="red">非官方</span>）
					</li>
				</ul>
			</div>
			<div class="section">
				<div>预期赛事</div>
				<ul>
					<li>4月，举行校内大赛</li>
					<li>6月，参加吉林省大学生程序设计大赛</li>
					<li>6月，东北四省赛</li>
					<li>9～10月，亚洲区网络赛</li>
					<li>10~12月, 亚洲区现场赛</li>
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
