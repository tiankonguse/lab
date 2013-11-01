 <?php
	session_start ();
	require ("../inc/common.php");
	?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
 <?php
	$title = "acm模版 ~ DP";
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
				<h2>DP</h2>

			</div>
			<div></div>
			<div class="subsection">
				<h3>DP 分类</h3>
				<pre class="prettyprint">
f(i,j) =min{f(i,k) + f(k,j) + g(i,k,j) },(i&lt;=k&lt;=j)\\
一般，g(i,k,j)为一常数\\
分析：从 f(0,0)到 f(n,n)需要双重循环，在每次循环时又要花费 O(n)的时间去找最小值，故总复杂度O(n^3)\\
例如：矩阵连乘
</pre>

			</div>
			<div class="subsection">
				<h3>单调队列</h3>
				<pre class="prettyprint">
单调队列的方程为：\\
f(x)= opt( cost[i] ) * bound[x] &lt;=i&lt;x;\\
W[x,y] + w[x+1,y+1] &lt;= w[x, y+1] + w[x+1,y].\\
在这样一种状态量为 O(n)，决策量为 O(n)，直接求解复杂度为 O($n^2$)的动态规划问题中，如果状态 x 转移到状态 y 的代价为 w[x,y]，只要满足，那么这个动态规划的问题的决策就是单调的。这就是四边形不等式的原理。

另一种形式:\\
f[x] = max or min{g(k) | b[x] &lt;= k &lt; x} + w[x]\\
(其中 b[x]随 x 单调不降，即b[1]&lt;=b[2]&lt;=b[3]&lt;=...&lt;=b[n])\\
(g[k]表示一个和 k 或 f[k]有关的函数，w[x]表示一个和 x 有关的函数)
</pre>

			</div>
			<div class="subsection">
				<h3>排列组合</h3>
				<pre class="prettyprint">
A(n,r)=n(n-1)…(n-r+1)=n!/(n-r)!\\
C(n,r)=A(n,r)/r! = n! /((n-r)! r!)\\
C(n,r)=C(n,n-r)\\
C(n,r)=C(n-1,r)+C(n-1,r-1)\\
C(n+r+1,r)=C(n+r,r)+C(n+r-1,r-1)+…+C(n+1,1)+C(n,0)\\
C(n,k)C(k,r)=C(n,r)C(n-r,k-r)\\
重复排列：n^r\\
重复组合：C(n+r-1,r)\\
圆周排列：A(n,r)/r
</pre>


			</div>
			<div class="subsection">
				<h3>组合 C（m,n）</h3>
				<pre class="prettyprint">
const int N=100;
int str[N][N];//初始化为-1
int fun(int m,int n) {
    if(str[m][n]!=-1)return str[m][n];
    if(m==n || n==0)return str[m][n]=1;
    if(m&lt;n)return str[m][n]=0;
    return str[m][n]=fun(m-1,n-1)+fun(m-1,n);
}
</pre>

			</div>
			<div class="subsection">
				<h3>有 n 种物品，并且知道每种物品的数量</h3>
				<pre class="prettyprint">
可以用母函数,这里使用DP
</pre>


				<div class="subsubsection">
					<h4>选出 m 件物品的排列数</h4>
					<pre class="prettyprint">
INT dp(int n,int m) {
    if(str1[n][m]!=-1)return str1[n][m];
    if(m==0)return str1[n][m]=1;
    if(n==0)return str1[n][m]=0;
    INT ans=0;
    int end=min(str0[n],m);
    for(int i=0; i&lt;=end; i++) {
        ans+=dp(n-1,m-i)*fun(m,i);
    }
    return str1[n][m]=ans;
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>选出 m 件物品的组合数</h4>
					<pre class="prettyprint">
只需把上面的 fun(m,i)去掉即可
</pre>
				</div>



			</div>
			<div class="subsection">
				<h3>错排</h3>
				<pre class="prettyprint">
n 个不同的元素，重新排列，使的每个元素不在原来的位置。\\
分析：当 n 个编号元素放在 n 个编号位置，元素编号与位置编号不相同时，方法数记为 M(n).\\
第一步：把第 n 个元素放在一个位置，比如位置 k，共有 n-1 中方法；\\
第二步，放编号为 k 的元素，这是有两种情况：1.放到位置 n,那么，剩下的 n-2 个元素的方法数为 M(n-2)；\\
2.不把它放在位置 n，这是，对于这 n-2 个元素，有M(n-1)中方法。\\
故:M(n) = (n-1)( M(n-2) +M(n-1) ),M(1)=0,M(2)=1;
</pre>

			</div>
			<div class="subsection">
				<h3>整数拆分</h3>
				<pre class="prettyprint">
1.整数拆分成不同整数的和的拆分数等于拆分成奇数的拆分数。\\
2.N 被拆分成一些重复次数不超过 k 次的整数的和，棋拆分数等于被拆分成不被 k+1 除尽的数的和的拆分数。\\
3.整数 n 拆分成 k 个数的和的拆分数等于 n 拆分成最大数为 k 的拆分数。\\
4.整数 n 拆分成最多不超过 m 个数的和的拆分数等于n 拆分成最大不超过 m 的拆分数。\\
5.正整数 n 拆分成不超过 k 个数的和的拆分数，等于将 n+k 拆分成恰好 k 个数的拆分数。
//两种方法
//fun1(n,m)定义为整数 m 拆分的数最小为 n
int fun1(int n,int m) {
    if(str1[n][m]!=-1)return str1[n][m];
    if(n==m)return str1[n][m]=1;
    if(n&gt;m)return str1[n][m]=0;
    return str1[n][m]=fun1(n,m-n)+fun1(n+1,m);
    return str1[n][m];
}

// fun2(n,m)定义为整数 m 拆分的数最大为 n
int fun2(int n,int m) {
    if(str2[n][m]!=-1)return str2[n][m];
    if(m==0)return str2[n][m]=1;
    if(n==0)return str2[n][m]=0;

    if(n&gt;m)return str2[n][m]=fun2(m,m);
    return str2[n][m]=fun2(n,m-n)+fun2(n-1,m);
}

</pre>



			</div>
			<div class="subsection">
				<h3>球与盒子</h3>
				<pre class="prettyprint">
n个球 m个盒子
</pre>

				<div class="subsubsection">
					<h4>Place $n$ Balls into $m$ Boxes</h4>
					\begin{table}[h] \scriptsize \begin{tabular}{|c|c|c|l|} \hline
					Balls &amp; Boxes &amp; Empty Boxes &amp; Answer \\ \hline
					Different &amp; Different &amp; Yes &amp; $m^n$ \\ \hline Different
					&amp; Different &amp; No &amp; $m!S\left( {n,m} \right)$ \\ \hline
					Different &amp; Same &amp; Yes &amp; $S\left( {n,1} \right) +
					S\left( {n,2} \right) + \ldots + S\left( {n,\min \left( {n,m}
					\right)} \right)$ \\ \hline Different &amp; Same &amp; No &amp;
					$S\left( {n,m} \right)$ \\ \hline Same &amp; Different &amp; Yes
					&amp; $C\left( {n + m - 1,n} \right)$ \\ \hline Same &amp;
					Different &amp; No &amp; $C\left( {n - 1,m - 1} \right)$ \\ \hline
					Same &amp; Same &amp; Yes &amp; $F\left( {n,m} \right)$ \\ \hline
					Same &amp; Same &amp; No &amp; $F\left( {n - m,m} \right)$ \\
					\hline \end{tabular} \end{table} 
					
					\subsubsection{相同的球 相同的盒子 至少一个}
					<pre class="prettyprint">
整数拆分：分为第一个数是 1 和不是 1 \\
公式：S1 [n,m]= S1 [n-1,m-1]+ S1 [n-m,m]
</pre>
				</div>

				<div class="subsubsection">
					<h4>相同的球 相同的盒子 可以为空</h4>
					<pre class="prettyprint">
都放一个，就变为至少一个了。\\
公式：S1 [n+m,m]
</pre>
				</div>

				<div class="subsubsection">
					<h4>相同的球 不同的盒子 至少一个</h4>
					<pre class="prettyprint">
挡板法：C( n-1, m-1 )
</pre>
				</div>

				<div class="subsubsection">
					<h4>相同的球 不同的盒子 可以为空</h4>
					<pre class="prettyprint">
填球法：C( n+m-1,m-1 )
</pre>
				</div>

				<div class="subsubsection">
					<h4>不同的球 相同的盒子 至少一个</h4>
					<pre class="prettyprint">
分析：单独放于不单独放\\
S2[n,m]=m*S2[n-1 , m] + S2[m-1,m-1];
</pre>
				</div>

				<div class="subsubsection">
					<h4>不同的球 相同的盒子 可以为空</h4>
					<pre class="prettyprint">
方案数为：ANS[n,m] =ANS[n,m-1] + S2[n,m];
</pre>
				</div>

				<div class="subsubsection">
					<h4>不同的球 不同的盒子 至少一个</h4>
					<pre class="prettyprint">
方案数：m*S2[n,m]
</pre>
				</div>

				<div class="subsubsection">
					<h4>不同的球 不同的盒子 可以为空</h4>
					<pre class="prettyprint">
放于不放：m^n
</pre>
				</div>


			</div>
			<div class="subsection">
				<h3>最大 1 矩阵</h3>
				<pre class="prettyprint">
int a[N][N];
// a[1...m][1...n]
int n,m;
void mycol(int i,int* col) {
    for(int j=0,k; j&lt;n; ++j) {
        if(a[i][j]==0)col[j]=0;
        else if(i==0 || !a[i-1][j]) {
            for(k=i+1; k&lt;m &amp;&amp; a[k][j]; ++k);
            col[j]=k;
        }
    }
}
int Run() { //可以用单调队列优化
    int i,j,l, r, max = 0;
    int col[N];
    for(i=0; i &lt; m; ++i ) {
        mycol(i,col);
        for(j=0; j &lt; n; ++j )
            if( col[j] &gt; i ) {
                for( l=j-1; l &gt;=0 &amp;&amp; col[l] &gt;= col[j]; --l );
                for( r=j+1; r &lt; n &amp;&amp; col[r] &gt;= col[j]; ++r );
                int res = (r-l-1)*(col[j]-i);
                if( res &gt; max ) max = res;
            }
    }
    return max;
}
</pre>

			</div>
			<div class="subsection">
				<h3>最大子段和</h3>
				<pre class="prettyprint">
设当前位置为子段的最后一个，答案有两种情况：
1.如果当前位置的上一个为子段的最后一个的最优值小于等于 0，则当前位置单独为一个子段会更优。
2.否则，当前位置加上前一个的最优值就是当前的最优值。
int MSS(int*a,int n) {
    int tmp ,sum;
    tmp = sum = a[1];
    for(i = 2; i&lt;=n; i++) {
        if(tmp &gt;= 0) {
            tmp += a[i];
        } else {
            tmp = a[i];
        }
        if(tmp &gt; sum) {
            sum = tmp;
        }
    }
    return sum;
}
</pre>

			</div>
			<div class="subsection">
				<h3>最大 M 子段和</h3>
				<pre class="prettyprint">
给 n 个数，求着 n 个数划分成互不相交的 m 段的最大m 子段和。
经典的动态规划优化问题。
设 f(i,j)表示前 i 个数划分成 j 段，且包括第 i 个数的最大 j 段和，那么 dp 方程为：
f(i,j)=max(f(i-1,j),max {f(k,j-1)})+v[i];分析：第 i 个数要么和前一个数一起划分到第 j 段里，要么独自划分到第 j 段,也就是我们要找到 i 之前的数划分为 j-1 段的最优值，这个可以只需一个变量标记最大值岂可。
转移复杂度：O(1),总复杂度 O(n*m)
int g[N];
int max_m_sum(int* str,int n,int m) {
    memset(g,0,sizeof(g));
    int i,j,_max,tmp;
    for(i=1; i&lt;=m; i++) {
        _max = g[i-1];
        for(j=i; j&lt;=n; j++) {
            tmp = _max;
            _max = max(_max,g[j]);
            g[j] = max(g[j-1],tmp) + str[j];
        }
    }
    _max = g[m];
    for(i=m; i&lt;=n; i++) {
        _max = max(_max,g[i]);
    }
    return _max;
}
</pre>

			</div>
			<div class="subsection">
				<h3>最长公共递增子序列(记录路径)</h3>
				<pre class="prettyprint">
int f[N][N], dp[N];
// a[1…la], b[1…lb] O(n^2)
int gcis(int a*, int la, int b*, int lb, int ans*) {
    int i, j, k, mx;
    memset(f, 0, sizeof(f));
    memset(dp, 0, sizeof(dp));
    for (i = 1; i &lt;= la; i++) {
        memcpy(f[i], f[i-1], sizeof(f[0]));
        for (k = 0, j = 1; j &lt;= lb; j++) {
            if (b[j-1] &lt; a[i-1] &amp;&amp; dp[j] &gt; dp[k]) k = j;
            if (b[j-1] == a[i-1] &amp;&amp; dp[k] + 1 &gt; dp[j]) {
                dp[j] = dp[k] + 1,
                        f[i][j] = i * (lb + 1) + k;
            }
        }
    }
    for (mx = 0, i = 1; i &lt;= lb; i++)
        if (dp[i] &gt; dp[mx]) mx = i;
    for(i=la*lb+la+mx,j=dp[mx]; j; i=f[i/(lb+1)][i%
                                     (lb+1)],j--)
        ans[j-1] = b[i % (lb + 1) - 1];
    return dp[mx];
}
</pre>

			</div>
			<div class="subsection">
				<h3>最长公共子序列</h3>
				<pre class="prettyprint">
int LCS(const char *s1, const char *s2) {
    int m = strlen(s1), n = strlen(s2);
    int i, j;
    a[0][0] = 0;
    for( i=1; i &lt;= m; ++i ) a[i][0] = 0;
    for( i=1; i &lt;= n; ++i ) a[0][i] = 0;
    for( i=1; i &lt;= m; ++i )
        for( j=1; j &lt;= n; ++j ) {
            if(s1[i-1]==s2[j-1]) a[i][j] = a[i-1][j-1]+1;
            else if(a[i-1][j]&gt;a[i][j-1])a[i][j]= a[i-1][j];
            else a[i][j] = a[i][j-1];
        }
    return a[m][n];
}
</pre>

			</div>
			<div class="subsection">
				<h3>RMQ 问题</h3>
				<div class="subsubsection">
					<h4>题目描述</h4>
					<pre class="prettyprint">
RMQ 问题是求给定区间中的最值问题。
当然，最简单的算法是 O(n)的，但是对于查询次数很多（设置多大 100 万次），O(n)的算法效率不够。
可以用线段树将算法优化到 O（logn)（在线段树中保存线段的最值）。
不过，Sparse_Table 算法才是最好的：它可以在O(nlogn)的预处理以后实现 O(1)的查询效率。
思路分析：
下面把 Sparse Table 算法分成预处理和查询两部分来说明(以求最小值为例)。
</pre>
				</div>

				<div class="subsubsection">
					<h4>预处理</h4>
					<pre class="prettyprint">
预处理使用 DP 的思想，f(i, j)表示[i, i+$2^j$ - 1]区间中的最小值，我们可以开辟一个数组专门来保存 f(i, j)的值。
例如，f(0, 0)表示[0,0]之间的最小值,就是 num[0], f(0,2)表示[0, 3]之间的最小值, f(2, 4)表示[2, 17]之间的最小值
注意, 因为 f(i, j)可以由 f(i, j - 1)和 f(i+$2^{j-1}$, j-1)导出,而递推的初值(所有的 f(i, 0) = i)都是已知的
所以我们可以采用自底向上的算法递推地给出所有符合条件的 f(i, j)的值。
</pre>
				</div>

				<div class="subsubsection">
					<h4>查询</h4>
					<pre class="prettyprint">
假设要查询从 m 到 n 这一段的最小值, 那么我们先求出一个最大的 k, 使得 k 满足 $2^k$ &lt;= (n - m + 1).
于是我们就可以把[m, n]分成两个(部分重叠的)长度为 $2^k$ 的区间: [m, m+$2^k$-1], [n-$2^k$+1, n];
而我们之前已经求出了 f(m, k)为[m, m+$2^k$-1]的最小值, f(n-$2^k$+1, k)为[n-$2^k$+1, n]的最小值
我们只要返回其中更小的那个, 就是我们想要的答案,这个算法的时间复杂度是 O(1)的.
例如, rmq(0, 11) = min(f(0, 3), f(4, 3))
</pre>
				</div>

				<div class="subsubsection">
					<h4>样例代码</h4>
					<pre class="prettyprint">
int st[20][N], ln[N], val[N];
void initrmq(int n) {
    int i, j, k, sk;
    ln[0] = ln[1] = 0;
    for (i = 0; i &lt; n; i++) st[0][i] = val[i];
    for (i = 1, k = 2; k &lt; n; i++, k &lt;&lt;= 1) {
        for (j = 0, sk = (k &gt;&gt; 1); j &lt; n; ++j, ++sk) {
            st[i][j] = st[i-1][j];
            if (sk &lt; n &amp;&amp; st[i][j] &gt; st[i-1][sk])
                st[i][j] = st[i-1][sk];
        }
        for (j=(k&gt;&gt;1)+1; j &lt;= k; ++j) ln[j] = ln[k&gt;&gt;1] + 1;
    }
    for (j=(k&gt;&gt;1)+1; j &lt;= k; ++j) ln[j] = ln[k&gt;&gt;1] + 1;
}
int query(int x, int y) { // min of { val[x] ... val[y] }
    int bl = ln[y - x + 1];
    return min(st[bl][x], st[bl][y-(1&lt;&lt;bl)+1]);
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>LCA 问题</h3>
				<pre class="prettyprint">
对于该问题，最容易想到的算法是分别从节点 u 和 v回溯到根节点，获取 u 和 v 到根节点的路径P1，P2，其中 P1 和 P2 可以看成两条单链表，这就转换成常见的一道面试题：【判断两个单链表是否相交，如果相交，给出相交的第一个点。】。\\
该算法总的复杂度是 O（n）（其中 n 是树节点个数）。\\
本节介绍了两种比较高效的算法解决这个问题，其中一个是在线算法（DFS+ST），另一个是离线算法（Tarjan 算法）。\\
实际上还有一个最简单的方法，先求出两个点的高度，然后根据高度来向上找到公共祖先。\\
复杂度是两个高度之和。
</pre>

				<div class="subsubsection">
					<h4>在线算法 DFS+ST</h4>
					<pre class="prettyprint">
(思想是：将树看成一个无向图，u 和 v 的公共祖先一定在 u 与 v 之间的最短路径上)：\\
（1）DFS：从树 T 的根开始，进行深度优先遍历（将树 T 看成一个无向图），并记录下每次到达的顶点。\\
第一个的结点是 root(T)，每经过一条边都记录它的端点。由于每条边恰好经过 2 次，因此一共记录了2n-1 个结点，用 E[1, ... , 2n-1]来表示。\\
（2）计算 R：用 R[i]表示 E 数组中第一个值为 i 的元素下标，即如果 R[u] &lt; R[v]时，DFS 访问的顺序是E[R[u], R[u]+1, …, R[v]]。\\
虽然其中包含 u 的后代，但深度最小的还是 u 与 v 的公共祖先。\\
（3）RMQ：当 R[u] ≥ R[v]时，LCA[T, u, v] = RMQ(L, R[v], R[u])；否则 LCA[T, u, v] = RMQ(L, R[u], R[v])，计算 RMQ。\\
由于 RMQ 中使用的 ST 算法是在线算法，所以这个算法也是在线算法。

//代码实现

const int N = 10001; // 1&lt;&lt;20;
int pnt[N], next[N], head[N]; // 邻接表
int e; // 边数
bool visited[N]; // 初始为 0，从根遍历
int id;
int dep[2*N+1], E[2*N+1], R[N]; // dep:dfs 遍历节点深度, E:dfs 序列, R:第一次被遍历的下标
void DFS(int u, int d);
int d[20], st[2*N+1][20];
int n;
void InitRMQ(const int &amp;id) {
    int i, j;
    for( d[0]=1, i=1; i &lt; 20; ++i ) d[i] = 2*d[i-1];
    for( i=0; i &lt; id; ++i ) st[i][0] = i;
    int k = int( log(double(n))/log(2.0) ) + 1;
    for( j=1; j &lt; k; ++j )
        for( i=0; i &lt; id; ++i ) {
            if( i+d[j-1]-1 &lt; id ) {
                st[i][j] = dep[ st[i][j-1] ] &gt; dep[ st[i+d[j-1]][j-1]] ? st[i+d[j-1]][j-1] : st[i][j-1];
            } else break; // st[i][j] = st[i][j-1];
        }
}

int Query(int x, int y) {
    int k; // x, y 均为下标:0...n-1
    k = int( log(double(y-x+1))/log(2.0) );

    return dep[ st[x][k] ] &gt; dep[ st[y-d[k]+1][k] ] ? st[y-d[k]+1][k] : st[x][k];
}
void Answer(void) {
    int i, Q;
    scanf("%d", &amp;Q);
    for( i=0; i &lt; Q; ++i ) {
        int x, y;
        scanf("%d%d", &amp;x, &amp;y); // 查询 x,y 的 LCA
        x = R[x];
        y = R[y];
        if( x &gt; y ) {
            int tmp = x;
            x = y;
            y = tmp;
        }
        printf("%d\n", E[ Query(x, y) ]);
    }
}
void DFS(int u, int d) {
    visited[u] = 1;
    R[u] = id;
    E[id] = u;
    dep[id++] = d;
    for( int i=head[u]; i != -1; i=next[i] )
        if( visited[ pnt[i] ] == 0 ) {
            DFS(pnt[i], d+1);
            E[id] = u;
            dep[id++] = d;
        }
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>离线算法（Tarjan 算法）</h4>
					<pre class="prettyprint">
所谓离线算法，是指首先读入所有的询问（求一次LCA 叫做一次询问），然后重新组织查询处理顺序以便得到更高效的处理方法。\\
Tarjan 算法是一个常见的用于解决 LCA 问题的离线算法，它结合了深度优先遍历和并查集，整个算法为线性处理时间。\\
Tarjan 算法是基于并查集的，利用并查集优越的时空复杂度，可以实现 LCA 问题的 O(n+Q)算法，这里 Q表示询问 的次数。\\
同上一个算法一样，Tarjan 算法也要用到深度优先搜索，算法大体流程如下：\\
对于新搜索到的一个结点，首先创建由这个结点构成的集合，再对当前结点的每一个子树进行搜索，每搜索完一棵子树，则可确定子树内的 LCA 询问都已解决。\\
其他的 LCA 询问的结果必然在这个子树之外，这时把子树所形成的集合与当前结点的集合合并，并将当前结点设为这个集合的祖先。\\
之后继续搜索下一棵子树，直到当前结点的所有子树搜索完。\\
这时把当前结点也设为已被检查过的，同时可以处理有关当前结点的 LCA 询问，如果有一个从当前结点到结点 v 的询问，且 v 已被检查过，则由于进行的是深度优先搜索，当前结点与 v 的最近公共祖先一定还没有被检查，而这个最近公共祖先的包涵 v 的子树一定已经搜索过了，那么这个最近公共祖先一定是 v 所在集合的祖先。

//代码实现

int id[N];//初始化-1
int lcs[N][N],
int g[N][N];//邻接矩阵
int get(int i) {
    if (id[i] == i) return i;
    return id[i] = get(id[i]);
}
void unin(int i, int j) {
    id[get(i)] = get(j);
}
void dfs(int rt, int n) {
    int i;
    id[rt] = rt;
    for (i = 0; i &lt; n; ++i) if (g[rt][i] &amp;&amp; -1 == id[i]) {
            dfs(i, n);
            unin(i, rt);
        }
    for (i = 0; i &lt; n; ++i) if (-1 != id[i])
            lcs[rt][i] = lcs[i][rt] = get(i);
}
 
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>矩阵相乘 DP</h3>
				<div class="subsubsection">
					<h4>求矩阵状态</h4>
					<pre class="prettyprint">

bool state[513];
int _map[513];
int _map_num;
int str[513][513];
int _val_map[513];
//第 bit 位置为 1 val,val 可以是 0 或 1，bit 是 1~8
void setBit(int&amp; now,int bit,int val = 1) {
    bit--;
    if(val == 1) {
        now |= (1&lt;&lt;bit);
    } else {
        now &amp;= ~(1&lt;&lt;bit);
    }
}
//得到第 bit 位的值
int getBit(int now,int bit) {
    bit--;
    return (now&gt;&gt;bit)&amp;1;
}
//输出 c 的二进制
void outputState(int c) {
    printf(",\"");
    for(int i=8; i; i--) {
        printf("%d",getBit(c,i));
    }
    printf("\"\n");
}
//添加状态 c
int addState(int c) {
    if(state[c] == false) {
        state[c] = true;
        _map[_map_num] = c;
        _val_map[c] = _map_num;
        _map_num++;
    }
    return _val_map[c];
}
//判断 now 是否全 1
bool isPutAll(int now) {
    return now == 255;
}
//深搜得到状态
void dfs(int lev,int now,int next) {
    int nextState,i;
    if(isPutAll(now)) {
        nextState = addState(next);
        str[lev][nextState]++;
        return ;
    }
//视情况修改
    if(getBit(now,8) == 0 &amp;&amp; getBit(now,1) == 0) {
        setBit(now,8,1);
        setBit(now,1,1);
        dfs(lev,now,next);
        setBit(now,8,0);
        setBit(now,1,0);
    }
    for(i=8; i&gt;0; i--) {
        if(getBit(now,i) == 0) {
            setBit(now,i,1);
            setBit(next,i,1);
            dfs(lev,now,next);
            setBit(now,i,0);
            setBit(next,i,0);
            break;
        }
    }
    for(i=8; i&gt;1; i--) {
        if(getBit(now,i) == 0) {
            if(getBit(now,i-1) == 0) {
                setBit(now,i,1);
                setBit(now,i-1,1);
                dfs(lev,now,next);
                setBit(now,i,0);
                setBit(now,i-1,0);
            }
            break;
        }
    }
}
//生成状态
void bornState() {
    memset(state,false,sizeof(state));
    _map_num = 0;
    memset(str,0,sizeof(str));
    addState(0);
    for(int i=0; i&lt;_map_num; i++) {
        dfs(i,_map[i],0);
    }
}
</pre>
				</div>

				<div class="subsubsection">
					<h4>使用矩阵幂求答案</h4>
					<pre class="prettyprint">
bornState();
sz = _map_num;
Matrix matrix,ans;
int n,m;
matrix.init(str);//矩阵需要添加这个函数
while(scanf("%d%d",&amp;n,&amp;m),n) {
    MOD = m;
    ans = matrix.pow(n);
    printf("%d\n",ans.a[0][0]);
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>DFA+DP</h3>
				<div class="subsubsection">
					<h4>区间个数询问</h4>
					<pre class="prettyprint">
//对于一个数字，首先把这个数字存在数组中
typedef long long LL;
int str[100];
LL _sum[100][30][30];
int len;
int x,y;
LL dfs(int pos, int x_num, int y_num, bool yes) {
    if(pos &lt; 0) {//判断是否结束
        return x_num == x &amp;&amp; y_num == y;
    }
    if(x_num &gt; x || y_num &gt; y) {
        return 0;//判断是否已经不满足条件
    }
//判断是否已经是 999 且已经计算过。
    if(yes &amp;&amp; _sum[pos][x_num][y_num] != -1) {
        return _sum[pos][x_num][y_num];
    }
//没计算过，开始计算
    LL ans = 0;
    int _max = yes ? 9 : str[pos];
    for(int i=0; i&lt;=_max; i++) {
        ans += dfs(pos-1, x_num + (i == 4), y_num +
                   (i == 7), yes || i&lt;str[pos]);
    }
//保存计算过的
    if(yes) {
        _sum[pos][x_num][y_num] = ans;
    }
    return ans;
}
//查询，一般是用[0, val]
LL query(LL val) {
    if(val &lt; 0) {
        return 0;
    }
    len = 0;
    if(val == 0) {
        str[len++] = val;
    } else {
        while(val) {
            str[len++] = val%10;
            val /= 10;
        }
    }
    return dfs(len-1,0,0,false);
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>区间内第 k 个满足条件的</h3>
				<div class="subsubsection">
					<h4>二分查找</h4>
					<pre class="prettyprint">
LL query(LL left, LL right, LL k) {
    LL ans_num = query(left-1) + k;
    LL mid, mid_num;
    while(left &lt; right) {
        mid = (left + right)/2;
        mid_num = query(mid);
        if(mid_num == ans_num) {
            right = mid;
        } else if(mid_num &gt; ans_num) {
            right = mid - 1;
        } else {
            left = mid + 1;
        }
    }
    return left;
}
</pre>
				</div>

			</div>
			<div class="subsection">
				<h3>DFA 查找</h3>
				<pre class="prettyprint">
//按位查找，从最高位开始确定应该是那个数字
//调用前 ans = 0;
//调用 dfs(len-1,0,0,false,query(left-1) + k);
void dfs(int pos, int x_num, int y_num, bool yes, LL k) {
    if(pos &lt; 0)return ;
    int _max = yes ? 9 : str[pos];
    LL tmp;
    for(int i=0; i&lt;=_max; i++) {
        tmp = dfs(pos-1, x_num+(i == 4), y_num + (i == 7), yes
                  || i&lt;str[pos]);
        if(tmp&gt;=k) {
            ans = ans*10+i;
            dfs(pos-1,x_num + (i == 4), y_num + (i == 7),
                yes || i&lt;str[pos],k);
            return;
        } else {
            k -= tmp;
        }
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

