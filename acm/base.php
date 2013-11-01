 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "acm模版 ~ Base";
	require BASE_INC . 'head.inc.php';
	?>
<link href="<?php echo MAIN_DOMAIN;?>css/main.css" rel="stylesheet">
<style type="text/css">
.section {
	border: 1px dotted greenyellow;
	margin: 5px;
	padding: 1px;
}

.subsection {
	margin-left: 20px;
	margin-right: 20px;
	border: 1px dotted rgb(102, 85, 85);
	margin-top: 5px;
}

.subsubsection {
	margin-left: 40px;
	margin-right: 40px;
	border: 1px dotted rgb(102, 85, 85);
	margin-top: 5px;
}
</style>
</head>
<script type="text/javascript">
var MAIN_DOMAIN = "<?php echo MAIN_DOMAIN; ?>";
</script>

<body>
	<header class="fixed-header">
		<div class="title">
			<a href="<?php echo MAIN_DOMAIN; ?>acm/">acm模版 </a>
		</div>
	</header>

	<section class="fixed-content">
		<div class="section">
			<div class="section-title">
				<h2>Base</h2>

			</div>
			<div class="section-content">
				<div class="subsection">
					<h3>头文件</h3>

					<pre class="prettyprint">
#include &lt;iostream&gt;
#include &lt;cstdio&gt;
#include &lt;cstdlib&gt;
#include &lt;cstring&gt;
#include &lt;algorithm&gt;
#include &lt;cmath&gt;
#include &lt;string&gt;
#include &lt;vector&gt;
#include &lt;queue&gt;
#include &lt;set&gt;
#include &lt;map&gt;
#include &lt;ctime&gt;
#include &lt;map&gt;
#include &lt;set&gt;
#include &lt;deque&gt;
#include &lt;stack&gt;
#include &lt;functional&gt;
using namespace std;

typedef long long LL;

const int inf = 0x3f3f3f3f;
const LL Inf = 0x3FFFFFFFFFFFFFFFLL
int main(){

    return 0;
}
</pre>

				</div>
				<div class="subsection">
					<h3>文件结束符</h3>
					<pre class="prettyprint c">
windows : ctrl-z
linux : ctrl-d
</pre>

				</div>
				<div class="subsection">
					<h3>codeblock配置终端</h3>
					<pre class="prettyprint c">
setting 
	-&gt; environment
	-&gt;gerneral setting:
	-&gt;Termial to lunch console programs:
	-&gt; gnome-terminal -x
</pre>

				</div>
				<div class="subsection">
					<h3>codeblock快捷键</h3>
					<pre class="prettyprint">
按住Ctrl滚滚轮，代码的字体大小。
在编辑区按住右键可拖动代码，省去拉滚动条之麻烦；相关设置：Mouse Drag Scrolling。 
Ctrl+D可复制当前行或选中块。
Ctrl+Shift+C注释掉当前行或选中块
Ctrl+Shift+X则解除注释。 
Tab缩进当前行或选中块,Shift+Tab减少缩进。
可拖动选中块使其移动到新位置，按住Ctrl则为复制到新位置。
按下Atl，再拖动鼠标，可以实现部分选择。
F2和Shift+F2分别可以显隐下方Logs \&amp; others栏和左方的Management栏。
</pre>

				</div>
				<div class="subsection">
					<h3>Faster_IO(G++ is better)</h3>
					<pre class="prettyprint">
inline int getint() {
	int ret = 0;
	char c;
	while (!isdigit(c = getchar()));
	do {
		ret = (ret &lt;&lt; 3) + (ret &lt;&lt; 1) + c - '0';	
	}while (isdigit(c = getchar()));
	return ret;
}

inline int nextInt() {
	char c = getchar();
	while (c != '-' &amp;&amp; (c &lt; '0' || c &gt; '9')) c = getchar();
	int ret = 0, neg = 0; if (c == '-') neg = 1, c = getchar();
	do ret = (ret &lt;&lt; 3) + (ret &lt;&lt; 1) + c - '0';
		while (isdigit(c = getchar()));
	return neg ? -ret : ret;
}
int A[20], k;
inline void printInt(int x) {
	if (x &lt; 0) putchar('-'), x = -x;
	else if (x == 0) { putchar('0'); return; }
	k = 0; while (x) A[k++] = x % 10, x /= 10;
	for (int i = k - 1; ~i; i--) putchar('0' + A[i]);
	putchar('\n');
}
inline double nextDouble() {
    char c; int i = 1;
    double ret = 0;
    do c = getchar();
   		while (c != '-' &amp;&amp; c != '.' &amp;&amp; (c &lt; '0' || c &gt; '9'));
    bool neg = false;
    if (c == '-') neg = true, c = getchar();
	do ret = ret * 10 + c - '0';
   		while (isdigit(c = getchar()));
    if(c != '.') return neg ? -ret : ret;
    c = getchar();
    do ret += (c - '0') / pow(10.0, i++);
		while (isdigit(c = getchar()));
    return neg ? -ret : ret;
}
</pre>


				</div>
				<div class="subsection">
					<h3>Notes</h3>
					<pre class="prettyprint">
double pi = 3.14159265358...; // no 'f' appended
#define maxn 200 + 20 // it's not safe
int const mod = 1000000007; // use "const" to accelerate
judge mp.find(x) != mp.end()" is better than ret += mp[x]" directly

0x3f3f3f3f   =   1061109567  (recommended)
0x7f7f7f7f   =   2139062143
0x3FFFFFFFFFFFFFFFLL    =   4611686018427387903    (recommended)
0x7FFFFFFFFFFFFFFFLL    =   9223372036854775807

//Increase the Stack Size(Only C++)
#pragma comment(linker, "/STACK:36777216")
//memset
memset(dpMin, 0x3f, sizeof(dpMin)); //  inf
memset(dpMax, 0xc0, sizeof(dpMax)); // -inf
//for_bit
for (int i = a ; i != 0 ; i = (i - 1) &amp; a)
//count bit
static int countbit[1024];
for (int i = 1; i &lt; 1024; ++i) countbit[i] = 1 + countbit[i - ((i ^ (i - 1)) &amp; i)];
//sort by lexicographic
int cmp(const void *a, const void *b) {
	char *x = (char *)a;
	char *y = (char *)b;
	return strcmp(x, y);
}
qsort(str, n, sizeof(str[0]), cmp);
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

