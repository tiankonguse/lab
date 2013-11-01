 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "acm模版 ~ 博弈";
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
				<h2>博弈</h2>

			</div>
			<div></div>
			<div class="subsection">
				<h3>Combinatorial Game</h3>
				<pre class="prettyprint">
定义
1.有两个玩家；
2.游戏的操作状态是一个有限的集合（比如：限定大小的棋盘）；
3.游戏双方轮流操作；
4.双方的每次操作必须符合游戏规定；
5.当一方不能将游戏继续进行的时候，游戏结束，同时，对方为获胜方；
6.无论如何操作，游戏总能在有限次操作后结束

必败点和必胜点
必败点(P 点) :前一个选手(Previous player)将取胜的位置称为必败点。

必胜点(N 点) :下一个选手(Next player)将取胜的位置称为必胜点。 

必败(必胜)点属性
(1) 所有终结点是必败点（P 点）；
(2) 从任何必胜点（N 点）操作，至少有一种方法可以进入必败点（P 点）；
(3)无论如何操作，从必败点（P 点）都只能进入必胜点（N 点）.
这三点是组合游戏基本性质可用来判断一游戏是否是组合游戏

解决组合游戏问题的一般方法
步骤 1:将所有终结位置标记为必败点（P 点）；
步骤 2: 将所有一步操作能进入必败点（P 点）的位置标记为必胜点（N 点）
步骤 3:如果从某个点开始的所有一步操作都只能进入必胜点（N 点），则将该点标记为必败点（P 点）；
步骤 4: 如果在步骤 3 未能找到新的必败（P 点），则算法终止；否则，返回到步骤 2。

</pre>

			</div>
			<div class="subsection">
				<h3>第一类取石子（巴什博弈）</h3>
				<pre class="prettyprint">
只有一堆 n 个石子.
两个人轮流从这堆石子中取石子.
规定每次至少取一个，最多取 m 个
最后取光者得胜。

得出规律：n%(m+1)=0 时为 P 点，其他为 N 点

变形：减法游戏
只有一堆 n 个石子
两个人轮流从这堆石子中取物
规定每次取的个数只能为一集合中的元素
最后取光者得胜。

未变形的实际上是一个 1 到 n 的集合。
例如：集合是 2 的幂次（即：1，2，4，8，16…）
得出规律：n%3=0 为 P 点
</pre>

			</div>
			<div class="subsection">
				<h3>第二类取石子（威佐夫博弈）</h3>
				<pre class="prettyprint">
有两堆各若干个石子
两个人轮流从某一堆或同时从两堆中取同样多的石子
规定每次至少取一个，多者不限
最后取光者得胜

策略：寻找奇异局势
我们用（ak，bk）（ak≤ bk ,k=0，1，2，...,n)表示两堆石子的数量并称其为局势，如果甲面对（0，0），
那么甲已经输了，这种局势我们称为奇异局势。

前几个奇异局势是：（0，0）、（1，2）、（3，5）、（4，7）、（6，10）、（8，13）、（9，15）、（11，18）、（12，20）。

奇异局势性质
1、任何自然数都包含在一个且仅有一个奇异局势中由于 ak 是未在前面出现过的最小自然数，所以有ak&gt;ak-1 ，而 bk=ak+ k &gt;ak-1+ k-1 =bk-1 &gt;ak-1 。所以性质 1。成立。
2、任意操作都可将奇异局势变为非奇异局势事实上，若只改变奇异局势（ak，bk）的某一个分量，那么另一个分量不可能在其他奇异局势中，所以必然是非奇异局势。如果使（ak，bk）的两个分量同时减少，则由于其差不变，且不可能是其他奇异局势的差，因此也是非奇异局势。
3、采用适当的方法，可以将非奇异局势变为奇异局势

奇异局势公式
那么任给一个局势（a，b），怎样判断它是不是奇异局势呢？
我们有如下公式：ak=[k（1+√5）/2]，bk=ak+k （k=0，1，2，...,n）
注:（1+√5）/2 ≈1.618，k、ak、bk 满足黄金分割比
所有奇异局势可组成若干 Fibonacci 数列既 a= =(_{}_{}int64)((1.0+sqrt(5.0))/2*(b-a)时败
其中(1.0+sqrt(5.0))/2=1.618033989

若要输出赢的第一步策略，可以暴力搜索
（判断同时减一个数，a 减一个数,b 减一个数）。

例如：Euclid's Game
1、给出两个自然数 a,b
2、由两人轮流进行，可以将其中较大数减去较小数的任意倍，差必须是自然数
3、最终将一数减为 0 者取胜

1.可以打表找规律。
b/a&gt;=2 || b%a==0 时胜。
否则 b%=a;然后循环，判断奇偶性。

2.打表找公式 a!=b &amp;&amp; a!=1 &amp;&amp; a&gt;=(_{}_{}int64)((1.0+sqrt(5.0))/2*(b-a))时胜
</pre>

			</div>
			<div class="subsection">
				<h3>第三类取石子（尼姆博弈）</h3>
				<pre class="prettyprint">
取火柴问题
有三堆各若干个石子
两个人轮流从某一堆取任意多的石子
规定每次至少取一个，多者不限
最后取光者得胜

策略
我们用（a，b，c）表示某种局势。
首先（0，0，0）显然是奇异局势，无论谁面对奇异局势，都必然失败。
第二种奇异局势是（0，n，n），只要与对手拿走一样多的物品，最后都将导致（0，0，0）。
仔细分析一下，（1，2，3）也是奇异局势，无论对手如何拿，接下来都可以变为（0，n，n）的情形。

方法：异或“^”
任何奇异局势（a，b，c）都有 a^b^c=0。
延伸：任何奇异局势(a1, a2,… an)都满足 a1^a2^…^an=0

证明
欲证明此算法，只需证明 3 个命题：
1、这个判断将所有终结点为 P 点
2、这个判断的 N 点一定可以变换为 P 点
3、这个判断的 P 点无法变换为另一 P 点

通过二进制和异或的性质证
(Bouton's Theorem)对于一个 Nim 游戏的局面(a1,a2,...,an)，它是 P-position 当且仅当a1^a2^...^an=0，其中^表示异或(xor)运算。

根据定义，证明一种判断 position 的性质的方法的正确性，只需证明三个命题： 
1、这个判断将所有 terminal position 判为 P-position；
2、根据这个判断被判为 N-position 的局面一定可以移动到某个 P-position；
3、根据这个判断被判为 P-position 的局面无法移动到某个 P-position。
第一个命题显然，terminal position 只有一个，就是全0，异或仍然是 0。
第二个命题，对于某个局面(a1,a2,...,an)，若a1^a2^...^an!=0，一定存在某个合法的移动，将 ai 改变成 ai'后满足 a1^a2^...^ai'^...^an=0。
不妨设a1^a2^...^an=k，则一定存在某个 ai，它的二进制表示在 k 的最高位上是 1（否则 k 的最高位那个 1 是怎么得到的）。
这时 ai^k&lt;ai 一定成立。则我们可以将 ai 改变成 ai'=ai^k，此时 a1^a2^...^ai'^...^an=a1^a2^...^an^k=0。
第三个命题，对于某个局面(a1,a2,...,an)，若a1^a2^...^an=0，一定不存在某个合法的移动，将 ai改变成 ai'后满足 a1^a2^...^ai'^...^an=0。
因为异或运算满足消去率，由 a1^a2^...^an=a1^a2^...^ai'^...^an 可以得到 ai=ai'。
所以将 ai 改变成 ai'不是一个合法的移动。
证毕。

</pre>

			</div>
			<div class="subsection">
				<h3>Sprague-Grundy 函数</h3>
				<pre class="prettyprint">
将组合游戏抽象为有向图
每个位置为有向图的一个节点
每种可行操作为有向图的一条路径
我们就在有向图的顶点上定义 SG 函数
首先定义 mex(minimal excludant)运算，这是施加于一个集合的运算，表示最小的不属于这个集合的非负整数。
例如 mex{0,1,2,4}=3、mex{2,3,5}=0、mex{}=0。
对于一个给定的有向无环图，定义关于图的每个顶点的 Sprague-Garundy 函数 g 如下：g(x)=mex{ g(y) | y是 x 的后继 }。
</pre>

			</div>
			<div class="subsection">
				<h3>Sprague-Grundy 函数性质</h3>
				<pre class="prettyprint">
所有的终结点 SG 值为 0（因为它的后继集合是空集）
SG 为 0 的顶点，它的所有后继 y 都满足 SG 不为 0
对于一个 SG 不为 0 的顶点，必定存在一个后继满足SG 为 0
满足组合游戏性质 所有 SG 为 0 定点对应 P 点，SG大于 0 顶点对应 N 点
</pre>

			</div>
			<div class="subsection">
				<h3>Sprague-Grundy 函数意义</h3>
				<pre class="prettyprint">
每个 SG 值对应 Nim 游戏每堆石子的初始数量
将所有 SG 值异或，类同于将 Nim 游戏的所有初态异
或当 g(x)=k 时，表明对于任意一个 0&lt;=i&lt;k，都存在 x的一个后继 y 满足 g(y)=i。
也就是说，当某枚棋子的SG 值是 k 时，我们可以把它变成 0、变成 1、 、 …… 变成 k-1，但绝对不能保持 k 不变。

不知道你能不能根据这个联想到 Nim 游戏，Nim 游戏的规则就是：
每次选择一堆数量为 k 的石子，可以把它变成 0、变成 1、……、变成k-1，但绝对不能保持 k 不变。
这表明，如果将 n 枚棋子所在的顶点的 SG 值看作 n 堆相应数量的石子，那么这个 Nim 游戏的每个必胜策略都对应于原来这 n 枚棋子的必胜策略！

</pre>

			</div>
			<div class="subsection">
				<h3>SG 定理</h3>
				<pre class="prettyprint">
所以我们可以定义有向图游戏的和(Sum of Graph Games)：
设 G1、G2、 、 …… Gn 是 n 个有向图游戏，
定义游戏 G 是 G1、G2、 、 …… Gn 的和(Sum)，
游戏 G 的移动规则是：任选一个子游戏 Gi 并移动上面的棋子 。
Sprague-Grundy Theorem 就是：
g(G)=g(G1)^g(G2)^...^g(Gn)。也就是说，游戏的和的SG 函数值是它的所有子游戏的 SG 函数值的异或。
SG 定理（Sprague-Grundy Theorem）：g(G)=g(G1)^g(G2)^^g(Gn)。
游戏的和的 SG 函数值是它的所有子游戏的 SG 函数值的异或。
例如：
取(m 堆)石子游戏
1、m 堆石子,两人轮流取
2、只能在 1 堆中取任意个.取完者胜.
先取者负输出 No.先取者胜输出 Yes.然后输出先取者第 1 次取子的所有方法. 
分析：用异或进行判断，由异或基本性质（a^a=0）求出每个点的 P 点，依次比较即可
</pre>

			</div>
			<div class="subsection">
				<h3>求 SG 值的问题求 SG 算法</h3>
				<pre class="prettyprint">
1.直接 DFS
2.外加数组法（效率更高）
</pre>

				<div class="subsubsection">
					<h4>直接 DFS 算法</h4>
					<pre class="prettyprint">
const int N=10001;
int k,a[101]; //k 为节点数,a 数组为减数集合
int f[N]; //f 数组用来存储所有节点的 sg 值,初值为-1
int mex(int p) { //mex 为求 sg 的函数
    int i,t;
    bool g[101]= {0}; //定义布尔数组，初值为 0
    for(i=0; i&lt;k; i++) {
        t=p-a[i]; //t 为 p 当前遍历的后继
        if(t&lt;0) break; //后继最小是 0
        if(f[t]==-1)f[t]=mex(t);
        g[f[t]]=1; //布尔数组中赋这个 SG 值为
    }
    for(i=0;; i++) {
        if(!g[i]) return i;
    }
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>外接数组法</h3>
				<pre class="prettyprint">
int k,a[101]; //k 为节点数，a 为减数集合
int f[N],num[N]; //f 存储 sg 值,num 标记 sg 值是否存在
sg[0]=0;
for(i=1; i&lt;k; i++) {
    for(j=0; a[j]&lt;=i; j++)num[sg[i-a[j]]]=i;
    for(j=0; j&lt;=i; j++)
        if(num[j]!=i) {
            sg[i]=j;
            break;
        }
}
</pre>

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

