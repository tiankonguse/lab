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
			<header style="text-align: center;">哈希表</header>
			<div class="section">
				<div>哈希表(Hash)</div>
				<ol>
					<li>理论上查找速度最快的数据结构之一</li>
					<li>
						<div>缺点：</div>
						<ol>
							<li>需要大量的内存</li>
							<li>需要构造Key</li>
						</ol>
					</li>
				</ol>
			</div>

			<div class="section">
				<div>Hash表的实现</div>
				<ol>
					<li>数组</li>
					<li>冲突解决法</li>
					<li>开散列法</li>
					<li>闭散列法</li>
					<li>STL</li>
				</ol>
			</div>

			<div class="section">
				<div>Hash Key的选取</div>
				<ul>
					<li>数值：
						<ol>
							<li>方法一：直接取余数（一般选取质数M最为除数）</li>
							<li>方法二：平方取中法，即计算关键值的平方，再取中间r位形成一个数。</li>
						</ol>
					</li>
					<li>字符串
											<ol>
							<li>方法一：
   折叠法：即把所有字符的ASCII码加起来</li>
							<li>方法二：ELFhash函数
							<pre class="prettyprint">
	int ELFhash( char* key ){
	    unsigned int h = 0;
	    while( *key ){
		   h = ( h &lt;&lt; 4 ) + *key++;
		   unsigned long g = h &amp; 0Xf0000000L;
		  if ( g ) h ^= g &gt;&gt; 24;
		   h &amp;= -g;
	  }
	  return h % M;
   }
							</pre>
							</li>
						</ol>
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
