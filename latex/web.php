<?php
session_start ();
require ("../inc/common.php");
?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
<?php
$title = "latex 直接在 web 中使用";
require BASE_INC . 'head.inc.php';
?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">

</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN;?>";
</script>

<body>

	<header>
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>latex">latex 直接在 web 中使用 </a>
			<div class="sub-title">
				<strong>作者:</strong> tiankonguse <strong>电子邮件:</strong> <a
					href="mailto:i@tiankonguse.com">i@tiankonguse.com</a> <strong>主页:</strong>
				<a href="http://tiankonguse.com/">http://tiankonguse.com/</a>
			</div>
		</div>

	</header>

	<section>
		<div class="container">

			<blockquote>一些公式如下</blockquote>
			<pre>
$$\sin(x)=x^2$$
$$F=\frac{GMm}{r^2}$$
</pre>
			<blockquote>用起来很方便。再画些图看看</blockquote>
			<pre>\begin{graph}
width=300; height=200; xmin=-6.3; xmax=6.3; xscl=1;
axes();
plot(sin(x));
\end{graph}
\begin{graph}
width=480; height=640; xmin=-1; xmax=5; xscl=1;
axes();
plot(ln(x));
\end{graph}
</pre>
<blockquote>矩阵</blockquote>
<pre>	$$A=\left(\begin{array}{cccc}
		x_{00} &amp; x_{01} &amp; \cdots &amp; x_{0n} \\
		x_{10} &amp; x_{11} &amp; \cdots &amp; x_{1n} \\
		\vdots &amp; \vdots &amp; \vdots &amp; \vdots \\
		x_{n0} &amp; x_{n1} &amp; \cdots &amp; x_{nn} 
	\end{array}\right)
	$$ 
</pre>





		</div>
	</section>

	<script src="<?php echo DOMAIN_JS;?>jquery.js"></script>
	<footer>
		<?php  require BASE_INC . 'footer.inc.php'; ?>
	</footer>
	<script src="<?php echo DOMAIN_JS;?>main.js"></script>
	<script src="<?php echo DOMAIN_JS;?>ASCIIMathML.js"></script>
</body>
</html>

