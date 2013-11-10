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
			<header style="text-align: center;">STL 之 set </header>

			<div class="section">
				<div>set功能</div>
				<ul>
					<li>Set，顾名思义，就是集合的意思</li>
					<li>它支持插入，删除，查找，首元素，末元素等操作，就像一个集合一样．</li>
					<li>而且所有的操作都是在严格logn时间之内完成，效率非常高．对于动态维护可以说是很理想的选择</li>
					<li>Set是一个有序的容器，里面的元素都是排好序的</li>
				</ul>
			</div>

			<div class="section">
				<div>set实现简介</div>
				<ul>
					<li>set的实现是通过２叉排序树来实现，就是将所有的元素用一个树来存储，根元素大于左子树的元素，小于右子树的元素，所有的操作都是基于这个树，通过判断元素的大小来选择对左子树操作还是右子树操作，这样操作数量和树的层数成正比．</li>
					<li>这样树就有可能退化成一条线，所以set用一种平衡的二叉排序树－－红黑树实现．</li>
				</ul>
			</div>

			<div class="section">
				<div>set对元素的要求</div>
				<ul>
					<li>set中的元素可以是任意类型的，但是由于需要排序，所以元素必须有一个序，即大小的比较关系，比如整数可以用 &gt; 比较．</li>
					<li>比较关系是有要求的，必须和实数的＜类似，下面说明对比较关系＜的要求
						<ol>
							<li>如果a &gt; b, b &gt; c 则有a &gt; c，即比较关系必须满足传递性</li>
							<li>a &gt; b和b&gt; c不能同时成立</li>
						</ol>
					</li>
					<li>如果元素类型有比较关系，并且比较关系满足以上２个条件，那么这个类型的元素就可以作为Set中的元素来存储</li>
				</ul>
			</div>

			<div class="section">
				<div>自定义元素类型set代码</div>
				<ul>
					<li>头文件及类型<pre class="prettyprint">
#include &lt;set&gt;
typedef struct{ 
	//定义类型　
}myStruct;//类型名
</pre></li>
					<li>重载运算符~重载&lt; <pre class="prettyprint">
bool operator &lt; ( const myStruct &amp; a, const myStruct &amp;b ) {
	//定义比较关系(必须满足上一页２个要求)
}
</pre>
					</li>
					<li>使用 <pre class="prettyprint">
set &lt;myStruct&gt; mySet; //创建一个元素类型是 myStruct,名字是 mySet的set 
</pre>
					</li>
					<li>注：定义了 &lt;，＝＝和＞以及
						&gt;＝，&lt;＝就都确定了，STL的比较关系都是用&lt;来确定的，所以必须通过定义&lt; －－“严格弱小于”来确定比较关系
					</li>
				</ul>
			</div>


			<div class="section">
				<div>set的操作~以 mySet为例说明set的操作</div>
				<ul>
					<li>clear <pre class="prettyprint">mySet.clear();//清空 mySet</pre></li>
					<li>insert<pre class="prettyprint"> mySet.insert( a ); //插入元素a</pre></li>
					<li>erase<pre class="prettyprint"> mySet.erase( a ) ;//删除元素a,如果a是迭代器,就删除迭代器指向的元素</pre></li>
					<li>顺序查找<pre class="prettyprint"> mySet.lower_bound( a ); //顺序查找 &gt;=a的第一个元素,返回迭代器</pre></li>
					<li>size<pre class="prettyprint"> mySet.size(); //求容器里元素的数量，返回整数</pre></li>
					<li>empty<pre class="prettyprint"> mySet.empty(); //判断容器是否是空，空返回true,否则返回false;</pre></li>
					<li>find<pre class="prettyprint"> mySet.find( a ); //查找元素a,如果查到了，返回指向a的迭代器，否则返回容器末尾迭代器，即 mySet.end();</pre></li>
					<li>count<pre class="prettyprint"> mySet.count( a ); //查找元素a的数量，返回整数</pre></li>
				</ul>
			</div>

			<div class="section">
				<div>set 和 multiset</div>
				<div>Set要求容器里的元素在定义的比较关系下都是不同的，如果已经有，那么insert是无效的，如果必须在容器中放入相同的元素就要使用multiset</div>
				<div>multiset和set有几点不同：</div>
				<ul>
					<li>创建 multiset &lt; myStruct &gt; myMultiSet;</li>
					<li>删除：如果删除元素a,那么在定义的比较关系下和 a 相等的所有元素都会被删除</li>
					<li>mySet.count( a )：set能返回０或者１，multiset是有多少个返回多少个．</li>
					<li>set 和 multiset 都是引用&lt;set &gt;头文件,复杂度都是\(log_2^n\)</li>
				</ul>
			</div>

			<div class="section">
				<div>对于内置类型自定义比较关系</div>
				<div>
					对于内置的数据类型，如int , double等是不能重载 &lt; 的，如果想自定义比较关系 &lt;
					可以用以下格式实现,以int为例：
					<pre class="prettyprint"> 
struct cmp{ // cmp这个名字可以用其他的
	bool operator()( const int &amp; a, const int &amp;b ) const{
	// 定义比较关系 &lt;
	}
};
set &lt;int,cmp&gt; mySet;
				</pre>
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

