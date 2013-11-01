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
			<header style="text-align: center;">ACM入门</header>
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
			<div class="section">
				<div>如何比赛</div>
				<ul>
					<li>&lt;=3人组队</li>
					<li>可以携带诸如书、手册、 程序清单等参考资料；</li>
					<li>不能携带任何可用计算机处理的软件或数据、不能携带任何类型的通讯工具；</li>
				</ul>
			</div>
			<div class="section">
				<div>提交代码后的反馈信息</div>
				<ul>
					<li>Compile Error -- 程序不能通过编译。</li>
					<li>Run Time Error -- 程序运行过程中出现非正常中断</li>
					<li>Time Limit Exceeded -- 运行超过时限还没有得到输出结果。</li>
					<li>Wrong Answer  -- 答案错误。</li>
					<li>Presentation Error -- 输出格式不对，可检查空格、回车等等细节</li>
					<li>Accepted-- 恭喜恭喜！ </li>
				</ul>
			</div>
			<div class="section">
				<div>排名</div>
				<ul>
					<li>首先根据解题数目进行排名。</li>
					<li>如果多支队伍解题数量相同，则根据总用时加上惩罚时间进行排名。</li>
					<li>总用时和惩罚时间由每道解答正确的试题的用时加上惩罚时间而成。</li>
					<li>每道试题用时将从竞赛开始到试题解答被判定为正确为止，其间每一次错误的运行将被加罚20分钟时间，未正确解答的试题不记时。</li>
				</ul>
			</div>
			<div class="section">
				<div>比赛形式</div>
				<ul>
					<li>1支队伍1台机器（提供打印服务）</li>
					<li>上机编程解决问题（可带纸质资料）</li>
					<li>实时测试，动态排名</li>
					<li>发纸质试题，8-12题，全英文（可以带字典）</li>
					<li>时间：持续5个小时</li>
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
