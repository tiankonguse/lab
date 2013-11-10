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
			<header style="text-align: center;">c </header>

			<div class="section">
				<div>令\(a_1 &gt;= a_2 &gt;=\ldots &gt;= a_n\)</div>
				<div>\(
				 \frac{1}{ x^{a_1} } + \frac{1}{ x^{a_2} }  + \ldots +  \frac{1}{ x^{a_n} } \\
				 = \frac{ 1 * x^{a_2} + x^{a_1} }{ x^{a_1} * x^{a_2} } + \frac{1}{ x^{a_3} }  +  \ldots +  \frac{1}{ x^{a_n} } \\
				 =  \frac{ x^{a_3 }* (1 * x^{a_2} + x^{a_1}) + x^{a_1} * x^{a_2} }{ x^{a_1} * x^{a_2} * x^{a_3} } +  \ldots +  \frac{1}{ x^{a_n} }\\
				 =  \vdots \\
				 =  \frac{ x^{a_n}*(x^{a_{n-1}} *(\ldots ) + x^{a_1} * x^{a_2} * \ldots * x^{a_{n-2}} ) + x^{a_1} * x^{a_2} * \ldots * x^{a_{n-1}} }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
				 =  x^{a_n} * \frac{ x^{a_{n-1}} *(\ldots ) + x^{a_1} * x^{a_2} * \ldots * x^{a_{n-2}}  + x^{a_1} * x^{a_2} * \ldots * x^{a_{n-1} - a_n} }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
				 =  x^{a_n} * \frac{ x^{a_{n-1}} *( x^{a_{n-2}} *(\ldots ) + x^{a_1} * x^{a_2} * \ldots * x^{a_{n-3}} ) + x^{a_1} * x^{a_2} * \ldots * x^{a_{n-2}} *(1 +  x^{a_{n-1} - a_n}) }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
				 =  x^{a_n} * x^{a_{n-1}} * \frac{  x^{a_{n-2}} *(\ldots ) + x^{a_1} * x^{a_2} * \ldots * x^{a_{n-3}} + x^{a_1} * x^{a_2} * \ldots * x^{a_{n-2} - a_{n-1}} *(1 +  x^{a_{n-1} - a_n}) }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
				 =  x^{a_n} * x^{a_{n-1}} * \frac{  x^{a_{n-2}} *(\ldots ) + x^{a_1} * x^{a_2} * \ldots * x^{a_{n-3}} + x^{a_1} * x^{a_2} * \ldots  *(x^{a_{n-2} - a_{n-1}} +  x^{a_{n-2} - a_n}) }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
				 = \vdots \\
				 =  x^{a_n} * x^{a_{n-1}}* \ldots * x^{a_{4}} * \frac{  x^{a_3} (x^{a_{2}} + x^{a_{1}})  + x^{a_1} * x^{a_2} + x^{a_1} * x^{a_2} * x^{a_3 - a_4} * (1 + x^{a_4 - a_5} +  x^{a_4 - a_6} + \ldots +  x^{a_4 - a_n} ) }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
 				 =  x^{a_n} * x^{a_{n-1}}* \ldots * x^{a_{4}} * \frac{  x^{a_3} (x^{a_{2}} + x^{a_{1}})  
 				 + x^{a_1} * x^{a_2} + x^{a_1} * x^{a_2} * ( x^{a_3 - a_4} + x^{a_3 - a_5} +  x^{a_3 - a_6} + \ldots +  x^{a_3 - a_n} ) }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
  				 =  x^{a_n} * x^{a_{n-1}}* \ldots * x^{a_{4}} * \frac{  x^{a_3} (x^{a_{2}} + x^{a_{1}})  
 				 + x^{a_1} * x^{a_2} * (1 +  x^{a_3 - a_4} + x^{a_3 - a_5} +  x^{a_3 - a_6} + \ldots +  x^{a_3 - a_n} ) }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
  				 =  x^{a_n} * x^{a_{n-1}}* \ldots * x^{a_{3}} * \frac{  x^{a_{2}} + x^{a_{1}} 
 				 + x^{a_1} * x^{a_2 - a_3} * (1 +  x^{a_3 - a_4} + x^{a_3 - a_5} +  x^{a_3 - a_6} + \ldots +  x^{a_3 - a_n} ) }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
  				 =  x^{a_n} * x^{a_{n-1}}* \ldots * x^{a_{3}} * \frac{  x^{a_{2}} + x^{a_{1}} 
 				 + x^{a_1}  * (x^{a_2 - a_3} +  x^{a_2 - a_4} + x^{a_2 - a_5} +  x^{a_2 - a_6} + \ldots +  x^{a_2 - a_n} ) }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
   				 =  x^{a_n} * x^{a_{n-1}}* \ldots * x^{a_{3}} * \frac{  x^{a_{2}} + x^{a_{1}}   * (1 + x^{a_2 - a_3} +  x^{a_2 - a_4} + x^{a_2 - a_5} +  x^{a_2 - a_6} + \ldots +  x^{a_2 - a_n} ) }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
    			 =  x^{a_n} * x^{a_{n-1}}* \ldots * x^{a_{3}} *x^{a_{2}} \frac{  1 + x^{a_{1} - a_2}   * (1 + x^{a_2 - a_3} +  x^{a_2 - a_4} + x^{a_2 - a_5} +  x^{a_2 - a_6} + \ldots +  x^{a_2 - a_n} ) }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
    			 =  x^{a_n} * x^{a_{n-1}}* \ldots * x^{a_{3}} *x^{a_{2}} \frac{ 1 +   x^{a_{1} - a_2} + x^{a_1 - a_3} +  x^{a_1 - a_4} + x^{a_1 - a_5} +  x^{a_1 - a_6} + \ldots +  x^{a_1 - a_n}  }{ x^{a_1} * x^{a_2} * \ldots * x^{a_n}} \\
     			 = \frac{ x^{a_n} * x^{a_{n-1}}* \ldots * x^{a_{3}} *x^{a_{2}} }{ x^{a_2} * \ldots * x^{a_n}} * \frac{  x^{a_1 - a_1} +   x^{a_{1} - a_2} + x^{a_1 - a_3} +  x^{a_1 - a_4} + x^{a_1 - a_5} +  x^{a_1 - a_6} + \ldots +  x^{a_1 - a_n}  }{ x^{a_1} } \\
 				 由于 a_1 &gt;= a_2 &gt;=\ldots &gt;= a_n \\
 				 故  1  &lt;= a_1 - a_2 &lt;= a_1 - a_3 <= \ldots &lt;= a_1 - a_n \\
 				 因此  1 &lt;= x^{a_1 - a_2} &lt;= x^{a_1 - a_3} &lt;= \ldots &lt;= x^{a-1 - a_n} \\
  				 
  				 我们现在的目标是求右边分式的公约数 \\
  				 我们第一步是统计分子中1的个数，假设是k,则 \\
                \frac{  x^{a_1 - a_1} +   x^{a_{1} - a_2} + x^{a_1 - a_3} +  x^{a_1 - a_4} + x^{a_1 - a_5} +  x^{a_1 - a_6} + \ldots +  x^{a_1 - a_n}  }{ x^{a_1} } \\
                =\frac{ k + x^{a_1 - a_{k+1}} +   \ldots +  x^{a_1 - a_n}  }{ x^{a_1} } (a_1 != a_{k+1} 或 k == n,即后面的不存在)\\
                我们只需要判断 k 与 x^{a_1 - a_{k+1}} 的公约数(若不存在a_{k+1}，则与 x^{a_1}求公约数。)。\\
				昨天没有注意到 x是素数，所以考虑复杂了。\\
				现在假设 x 是素数。则公约数要么是1，要么是 x 的倍数。\\
				若是 x 的倍数，我们提取出这个公约数，公约数小于 k, k &lt;=n，所以可以直接算。\\
				假设公约数是 x^{g_1} ，则 \\
                =\frac{ k /x^{g_1}+ x^{a_1 - a_{k+1} - {g_1}} +  \ldots +  x^{a_1 - a_n- {g_1}}  }{ x^{a_1 - g_1} } (a_1 != a_{k+1} 或 k == n,即后面的不存在)\\
                a_1 - a_{k+1} - {g_1} 又可能是 1，此时我们把是1的加到 k / x^{g_1} 上，然后循环不断的计算，提取公因式，最多循环n层。
				\)</div>
				
				<div>
			    \(
			        例如对于这组数据：\\
			        8 3\\
			        5 5 5 5 5 5 5 4\\
			        我们的式子是\\
			        \frac{1}{ 3^5 } + \frac{1}{ 3^5 }  +  \frac{1}{ 3^5 } +  \frac{1}{ 3^5 } +  \frac{1}{ 3^5 } +  \frac{1}{ 3^5 } +  \frac{1}{ 3^5 } +  \frac{1}{ 3^4 }   \\
			    \)
				</div>
				
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

