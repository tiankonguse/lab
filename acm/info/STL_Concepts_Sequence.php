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
			<header style="text-align: center;">顺序容器</header>

			<div class="section">
				<div>描述</div>
				<ul>
					<li>一个顺序容器是一个大小可变的容器。</li>
					<li>它的元素严格的在线性顺序下变化</li>
					<li>它支持插入和删除元素</li>
				</ul>
			</div>
			<div class="section">
				<div>表达式</div>
\(\begin{array}{c|c|c|c} 
Name &amp; Expression &amp; 参数解释 &amp; Return type 
\\ \hline 
填充构造 &amp; X(n, t) &amp;   &amp;   X
\\ \hline 
填充构造 &amp; X a(n, t); &amp;   &amp;   
\\ \hline 
默认填充构造 &amp; X(n) &amp; t将使用默认值 &amp;  X 
\\ \hline 
默认填充构造 &amp; X a(n); &amp;  t将使用默认值 &amp;   
\\ \hline 
范围构造 &amp; X(i, j) &amp; i和j是Input Iterators，值将转化为相应类型  &amp;  X 
\\ \hline 
范围构造 &amp; X a(i, j) &amp; i和j是Input Iterators，值将转化为相应类型  &amp;
\\ \hline 
头部 &amp; a.front() &amp;   &amp;  reference if a is mutable, const_reference otherwise. 
\\ \hline 
插入 &amp; a.insert(p, t) &amp;   &amp;   X::iterator
\\ \hline 
填充插入 &amp; a.insert(p, n, t) &amp; a is mutable  &amp;   void
\\ \hline 
范围插入 &amp; a.insert(p, i, j) &amp; i and j are Input Iterators whose value type is convertible to T [1]. a is mutable  &amp;   void
\\ \hline 
删除 &amp; a.erase(p) &amp; a is mutable  &amp;   iterator
\\ \hline 
范围删除 &amp; a.erase(p,q) &amp; a is mutable  &amp;   iterator
\\ \hline 
清空 &amp; a.clear() &amp; a is mutable  &amp;   void
\\ \hline 
重置大小 &amp; a.resize(n, t)	 &amp; a is mutable  &amp;   void
\\ \hline 
重置大小 &amp; a.resize(n) &amp; a is mutable  &amp;   void
\end{array}\)
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

