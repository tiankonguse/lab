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
			<header style="text-align: center;">输入与输出</header>
			<div class="section">
				<ul>
					<li>什么是标准输入、标准输出？
						<ol>
							<li>标准输入(stdin)：键盘(scanf, cin)</li>
							<li>标准输出(stdout)：屏幕(printf, cout)</li>
						</ol>
					</li>
					<li>建议程序中只使用stdin和stdout</li>
					<li>要打开文件怎么办？
						<ol>
							<li>读入文件<pre class="prettyprint">freopen(“input.txt”, “r”, stdin);</pre></li>
							<li>输出文件<pre class="prettyprint">freopen(“output.txt”, “w”, stdout);</pre></li>
						</ol>
					</li>
					<li>ACM/ICPC中基本上都是要求从键盘输入，屏幕输出</li>
					<li>所以，严格按照题目描述来进行输入输出，不要打印任何题目未做要求的信息</li>
				</ul>
			</div>
			<div class="section">
				<div>ACM/ICPC的输入输出特点</div>
				<ul>
					<li>ACM/ICPC的输入输出特点：流式、ASCII</li>
					<li>顺序输入、输出，避免使用文件定位函数（如：fseek)</li>
					<li>不需要把所有的输出放在一处进行，随时都可以输出，只要顺序是对的，因为只有当你的程序终止了，与正确答案的比较才会开始</li>
					<li>字符格式，12345是5个字符‘1’,’2’,’3’,’4’,’5’构成</li>
					<li>所以，C中只能使用处理ACSII文件的输入输出函数(getchar,putchar,scanf,printf,gets,fgets,puts)</li>
				</ul>
			</div>

			<div class="section">
				<div>使用C++进行输入输出</div>
				<ul>
					<li>cin,cout</li>
					<li>
						<div>优点</div>
						<ol>
							<li>数据类型自识别，使用简单</li>
						</ol>
					</li>
					<li>
						<div>缺点</div>
						<ol>
							<li>速度慢！</li>
							<li>ACM/ICPC的测试数据规模非常大，cin/cout在这种情况下会成为性能瓶颈，引发超时</li>
							<li>除非输入规模小，否则不推荐使用cin!</li>
							<li>输出规模相对较小，在某些情况下使用cout会很方便，但是cout控制输出格式不如printf灵活</li>
						</ol>
					</li>
					<li>
						<div>注意</div>
						<ol>
							<li>不要在一个程序中同时使用cin和C输入函数（如：scanf)</li>
							<li>也不要同时使用cout和C输出函数（如：printf)</li>
							<li>但是，可以C输入函数和cout搭配使用，反之亦然</li>
						</ol>
					</li>

				</ul>
			</div>

			<div class="section">
				<div>scanf函数简介</div>
				<ul>
					<li>输入格式: %d %lld %c %s %lf</li>
					<li>对每种格式搞清楚一个重要问题:是否自动跳过前导空白？</li>
					<li>什么是空白：空格，TAB，回车</li>
					<li>%d %lld %lf自动扫描前导空格</li>
					<li>%lld用于输入和输出长整数(long long,64位)</li>
					<li>%lf用于输入输出double</li>
					<li>%s 读一个字符串，自动扫描前导空白，读到空白结束</li>
					<li>%c读一个字符，但是不扫描前导空白
						<div>强制扫描空白:在%c前面加上一个空格表示“强制扫描前导空白”</div>
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
